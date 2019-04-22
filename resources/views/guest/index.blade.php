@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 table-responsive" style="overflow-x:auto;">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-dark" style="width:100%">
                    <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Código</th>
                        <th>Acción</th>
                        <th>Sección</th>
                        <th>Marca Repuesto</th>
                        <th>Marca Vehículo</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@push('scripts')
<script>
        $(document).ready(function() {
            $('#example').DataTable({
                "serverSide": true,
                "processing": true,
                "ajax": "{{url('api/buscarRepuestos')}}",
                "columns": [
                    {data: 'descripcion'},
                    {data: 'codigo'},
                    {data: 'btn'},
                    {data: 'seccion_id'},
                    {data: 'marca_repuesto_id'},
                    {data: 'marca_vehiculo_id'},
                ],
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "<span style='color: #fff'>Mostrar _MENU_ registros</span>",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "<span style='color: #fff'>Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros</span>",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "<span style='color: #fff'>Buscar:</span>",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },

            });
            $('#example tbody').on('click', '.shop', function (e){
                //todo
                event.preventDefault();
                var item;
                if($(e.currentTarget).closest('tr').hasClass('child')){
                    item = $(e.currentTarget).closest('tr').children().children().children().children()[1].textContent
                }
                else {
                    item = $(e.currentTarget).closest('tr').children()[1].textContent;
                }
                var bandera = 0;
                event.preventDefault();
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('addtosessions')!!}',
                    data:{'codigo':item},
                    success:function(data){
                        //Controla que se muestre el resto del formulario.
                        console.log(data);

                        $('#cart tr').each(function() {
                            if($($($(this).children().children().children().children())[0]).text() == data[0].codigo && bandera == 0){
                                var ant = parseInt($($(this).children()[2]).children()[0].defaultValue);
                                $($(this).children()[2]).children()[0].defaultValue = ant + 1;
                                bandera = 1;
                            }
                        });
                        if(bandera == 0){
                            $('#cart').prepend(
                                '<tr>' +
                                '<td data-th="Producto">' +
                                '<div class="row">' +
                                '<div class="col-sm-12">' +
                                '<h4 class="nomargin codigotabla">'+data[0].codigo+'</h4>' +
                                '<p>'+data[0].descripcion+'</p>' +
                                '</div>' +
                                '</div>' +
                                '</td>' +
                                '<td data-th="Precio" class="preciotabla">$'+data[0].precio+'' +
                                '</td>' +
                                '<td data-th="Cantidad">' +
                                '<input type="number" min="1" step="1" readonly class="form-control text-center cantidadtabla" value="1">' +
                                '</td>' +
                                '<td data-th="Subtotal" class="text-center subtotaltabla">$'+data[0].precio+'' +
                                '</td>' +
                                '<td class="actions" data-th="">' +
                                '<div class="btn-group" role="group" aria-label="Basic example">' +
                                '<button class="btn btn-info btn-sm minus"><a><i class="fa fa-minus"></i></a></button>' +
                                '<button class="btn btn-info btn-sm plus"><a><i class="fa fa-plus"></i></a></button>' +
                                '<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>' +
                                '</div>' +
                                '</td>' +
                                '</tr>');
                            bandera = 1
                        }

                    },
                    error:function(){
                        console.log("aca");
                    }
                });
            });
        } );
        $('.plus').on('click', function(e) {
            e.stopPropagation();
            var item = $(e.currentTarget).closest('tr').find('.codigotabla')[0].textContent;

            var precio = $(e.currentTarget).closest('tr').find('.preciotabla')[0].textContent;

            var cantidad = parseInt($(e.currentTarget).closest('tr').find('.cantidadtabla').val()) + 1;
            $(e.currentTarget).closest('tr').find('.cantidadtabla').val(cantidad);


            $(e.currentTarget).closest('tr').find('.subtotaltabla')[0].textContent ="$" + Math.trunc(parseFloat(precio.substring(1)) * parseFloat(cantidad));

            $.ajax({
                type:'get',
                url:'{!!URL::to('addtosessions')!!}',
                data:{'codigo':item},
                success:function(data){

                    console.log(data);
                },
                error:function(){
                    console.log("aca");
                }
            });
        });
        $('.minus').on('click', function(e) {
            e.stopPropagation();
            var item = $(e.currentTarget).closest('tr').find('.codigotabla')[0].textContent;

            var precio = $(e.currentTarget).closest('tr').find('.preciotabla')[0].textContent;

            var cantidad = parseInt($(e.currentTarget).closest('tr').find('.cantidadtabla').val()) - 1;
            $(e.currentTarget).closest('tr').find('.cantidadtabla').val(cantidad);


            $(e.currentTarget).closest('tr').find('.subtotaltabla')[0].textContent ="$" + Math.trunc(parseFloat(precio.substring(1)) * parseFloat(cantidad));

            $.ajax({
                type:'get',
                url:'{!!URL::to('removeitemtosessions')!!}',
                data:{'codigo':item},
                success:function(data){

                    console.log(data);
                },
                error:function(){
                    console.log("aca");
                }
            });
        });
</script>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>
@endpush
@endsection
