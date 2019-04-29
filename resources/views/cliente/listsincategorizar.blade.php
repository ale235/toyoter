@extends ('layouts.admin')
@section ('contenido')
    <div class="col-md-12">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-dark" style="width:100%">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>CUIT</th>
                <th>Acción</th>
            </tr>
            </thead>
        </table>
    </div>
@push('scripts')
<script>
        $(document).ready(function() {
            $('#example').DataTable({
                "serverSide": true,
                "processing": true,
                "ajax": "{{url('api/listarClientesSinCategorizar')}}",
                "columns": [
//                    {data: 'id'},
                    {data: 'razon_social'},
                    {data: 'name'},
                    {data: 'cuit'},
//                    {data: 'role'},
                    {data: 'btn'},
                ],
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "<span style='color: #000'>Mostrar _MENU_ registros</span>",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "<span style='color: #000'>Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros</span>",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "<span style='color: #000'>Buscar:</span>",
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
        } );
</script>
@endpush
@endsection
