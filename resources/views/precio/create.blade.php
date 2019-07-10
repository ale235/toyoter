@extends ('layouts.admin')
@section ('contenido')
    <div class="col-md-12">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#minoristaModal">Actualizar Porcentaje - Precio Minorista</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#mayoristaModal">Actualizar Porcentaje - Precio Mayorista</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tallerModal">Actualizar Porcentaje - Precio Taller</button>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-dark" style="width:100%">
                    <thead>
                    <tr>
                        {{--<th>ID</th>--}}
                        <th>Descripción</th>
                        <th>Código</th>
                        <th>Precio Sugerido</th>
                        <th>Precio Mayorista</th>
                        <th>Precio Minorista</th>
                        <th>Precio Taller</th>
                        <th>Acción</th>
                        <th>Sección</th>
                        <th>Marca Repuesto</th>
                        <th>Marca Vehículo</th>
                    </tr>
                    </thead>
                </table>
            </div>
    <!-- Modal -->
    <div class="modal fade" id="minoristaModal" tabindex="-1" role="dialog" aria-labelledby="minoristaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="minoristaModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{--<form action="{{ url('precio/create') }}" method="POST" enctype="multipart/form-data">--}}
                <form action="{{ url('actualizarpreciominorista') }}" method="POST" enctype="multipart/form-data">
                {{--<form method="POST" enctype="multipart/form-data">--}}
                @csrf
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">%</span>
                            <input type="number" name="coeficienteminorista" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                            <label>
                                Ingresá el porcentaje que querés aumentar al Precio Sugerido para tus Clientes Minoristas.
                            </label>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submitminorista" class="btn btn-primary">Save changes</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mayoristaModal" tabindex="-1" role="dialog" aria-labelledby="mayoristaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mayoristaModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{--<form action="{{ url('precio/create') }}" method="POST" enctype="multipart/form-data">--}}
                <form action="{{ url('actualizarpreciomayorista') }}" method="POST" enctype="multipart/form-data">
                    {{--<form method="POST" enctype="multipart/form-data">--}}
                    @csrf
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">%</span>
                            <input type="number" name="coeficientemayorista" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                        <label>
                            Ingresá el porcentaje que querés aumentar al Precio Sugerido para tus Clientes Mayoristas.
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="submitminorista" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tallerModal" tabindex="-1" role="dialog" aria-labelledby="tallerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tallerModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{--<form action="{{ url('precio/create') }}" method="POST" enctype="multipart/form-data">--}}
                <form action="{{ url('actualizarpreciotaller') }}" method="POST" enctype="multipart/form-data">
                    {{--<form method="POST" enctype="multipart/form-data">--}}
                    @csrf
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">%</span>
                            <input type="number" name="coeficientetaller" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                        <label>
                            Ingresá el porcentaje que querés aumentar al Precio Sugerido para tus Clientes Taller.
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="submittaller" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@push('scripts')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
        $(document).ready(function() {
            $('#example').DataTable({
//                columnDefs: [ {
//                    targets: 0,
//                    render: $.fn.dataTable.render.ellipsis(25)
//                } ],
                "serverSide": true,
                "processing": true,
                "ajax": "{{url('api/buscarRepuestosBackendPrecio')}}",
                "columns": [
//                    {data: 'id'},
                    {data: 'descripcion'},
                    {data: 'codigo'},
                    {data: 'precio_id_sugerido'},
                    {data: 'precio_id_mayorista'},
                    {data: 'precio_id_minorista'},
                    {data: 'precio_id_taller'},
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
        } );
        $.fn.dataTable.render.ellipsis = function ( cutoff, wordbreak, escapeHtml ) {
            var esc = function ( t ) {
                return t
                    .replace( /&/g, '&amp;' )
                    .replace( /</g, '&lt;' )
                    .replace( />/g, '&gt;' )
                    .replace( /"/g, '&quot;' );
            };

            return function ( d, type, row ) {
                // Order, search and type get the original data
                if ( type !== 'display' ) {
                    return d;
                }

                if ( typeof d !== 'number' && typeof d !== 'string' ) {
                    return d;
                }

                d = d.toString(); // cast numbers

                if ( d.length < cutoff ) {
                    return d;
                }

                var shortened = d.substr(0, cutoff-1);

                // Find the last white space character in the string
                if ( wordbreak ) {
                    shortened = shortened.replace(/\s([^\s]*)$/, '');
                }

                // Protect against uncontrolled HTML input
                if ( escapeHtml ) {
                    shortened = esc( shortened );
                }

                return '<span class="ellipsis" title="'+esc(d)+'">'+shortened+'&#8230;</span>';
            };
        };
</script>
@endpush
@endsection
