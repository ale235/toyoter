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
                        {{--<th>Precio Sugerido</th>--}}
                        {{--<th>Precio Mayorista</th>--}}
                        {{--<th>Precio Minorista</th>--}}
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
//                    {data: 'id'},
                    {data: 'descripcion'},
                    {data: 'codigo'},
//                    {data: 'precio_id_sugerido'},
//                    {data: 'precio_id_mayorista'},
//                    {data: 'precio_id_minorista'},
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
//                var item = $(e.currentTarget).parent().parent().children()[1].textContent;
                var item = $(e.currentTarget).parent().parent().children()[1].textContent;
                var bandera = 0;
                event.preventDefault();
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('sessions')!!}',
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
                                '<td data-th="Product">' +
                                '<div class="row">' +
                                '<div class="col-sm-12">' +
                                '<h4 class="nomargin codigotabla">'+data[0].codigo+'</h4>' +
                                '<p>'+data[0].descripcion+'</p>' +
                                '</div>' +
                                '</div>' +
                                '</td>' +
                                '<td data-th="Price">$'+data[0].precio+'' +
                                '</td>' +
                                '<td data-th="Quantity">' +
                                '<input type="number" min="1" step="1" class="form-control text-center cantidadtabla" value="1">' +
                                '</td>' +
                                '<td data-th="Subtotal" class="text-center">1.99' +
                                '</td>' +
                                '<td class="actions" data-th="">' +
                                '<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>' +
                                '<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>' +
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
        $(document).on('change', '.cantidadtabla', function(e) {
            // Does some stuff and logs the event to the console
            var item = $(e.currentTarget).parent().parent().children()[1].textContent;
        });
</script>
@endpush
@endsection
