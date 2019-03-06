@extends('layouts.guest')

@section('content')
    {{--<a href="https://wa.me/+5493424232136/?text=hola">ddddddddd</a>--}}
    <a href="https://api.whatsapp.com/send?text=Hola Loca&phone=5493434669886">Send Message</a>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-dark" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Marca Repuesto</th>
                        <th>Marca Vehículo</th>
                        <th>Sección</th>
                        {{--<th>&nbsp;</th>--}}
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    {{--<div class="title m-b-md">--}}
        {{--Buscar Repuesto--}}
    {{--</div>--}}
    {{--<div class="container">--}}
        {{--<div class="justify-content-center">--}}
            {{--<div class="searchbar">--}}
                {{--<input class="search_input" type="text" name="" placeholder="Ingresá: Código, nombre, descripción, marca, etc.">--}}
                {{--<a href="#" class="search_icon"><i class="fas fa-search"></i></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


    {{--<div class="row">--}}
        {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">--}}
            {{--<h3>--}}
                {{--Nuevo Venta--}}
            {{--</h3>--}}
            {{--@if(count($errors)>0)--}}
                {{--<div class="alert alert-danger">--}}
                    {{--<u>--}}
                        {{--@foreach($errors->all() as $error)--}}
                            {{--<li>{{$error}}</li>--}}
                        {{--@endforeach--}}
                    {{--</u>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">--}}
        {{--<input name="_token" value="{{csrf_token()}}" type="hidden">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label>Código del artículo</label>--}}
                    {{--<div class="input-group">--}}
                        {{--<span class="input-group-addon"><i class="fa fa-barcode"></i></span>--}}
                        {{--<input type="text" name="pidarticulo" id="pidarticulo" class="form-control typeahead"/>--}}
                    {{--</div>--}}
                    {{--<label id="nombretemporal"></label>--}}
                    {{--<input type="hidden" class="form-control" name="pidarticulonombre" id="pidarticulonombre"/>--}}
                    {{--<input type="hidden" class="form-control" name="pidarticuloidarticulo" id="pidarticuloidarticulo"/>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">--}}
                {{--<div class="input-group">--}}
                    {{--<label for="cantidad">Cantidad</label>--}}
                    {{--<input type="number" name="pcantidad" id="pcantidad" class="form-control" onkeyup="actualizar()" onkeypress="return event.keyCode != 13;"--}}
                           {{--placeholder="Cantidad">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">--}}
                {{--<div class="input-group">--}}
                    {{--<label for="precio_venta">Precio por Unidad</label>--}}
                    {{--<input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control"--}}
                           {{--onkeypress="return valida(event)" onkeyup="actualizar()" placeholder="Precio de Venta">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">--}}
                {{--<div class="inpu-group">--}}
                    {{--<label for="pprecio_venta_cantidad">Precio * Cantidad</label>--}}
                    {{--<input type="number" name="pprecio_venta_cantidad" id="pprecio_venta_cantidad" class="form-control"--}}
                           {{--placeholder="Precio * Cantidad" disabled>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label>Agregar Producto</label>--}}
                    {{--<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">--}}
                {{--<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">--}}
                    {{--<thead style="background-color: #a94442">--}}
                    {{--<th>Opciones</th>--}}
                    {{--<th>Artículo</th>--}}
                    {{--<th>Cantidad</th>--}}
                    {{--<th>Precio Venta</th>--}}
                    {{--<th>Subtotal</th>--}}
                    {{--</thead>--}}
                    {{--<tfoot>--}}
                    {{--<th>TOTAL</th>--}}
                    {{--<th></th>--}}
                    {{--<th></th>--}}
                    {{--<th></th>--}}
                    {{--<th><h4 id="total">$ 0.00</h4> <input type="hidden" name="total_venta" id="total_venta"></th>--}}
                    {{--</tfoot>--}}
                    {{--<tbody>--}}

                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}

            {{--<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">--}}
                {{--<div class="form-group">--}}
                    {{--<button class="btn btn-primary" type="submit">Guardar</button>--}}
                    {{--<button class="btn btn-danger" type="reset">Reset</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}



@push('scripts')





    {{--<script type="text/javascript" src={{asset('js/jQuery-2.1.4.min.js')}}></script>--}}
    {{--<script src={{asset('js/bootstrap3-typeahead.js')}}></script>--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">--}}
    {{--<style>--}}
        {{--.title {--}}
            {{--color: #F5F5F5;--}}
            {{--font-family: 'Raleway', sans-serif;--}}
            {{--font-weight: 900;--}}
            {{--font-size: 84px;--}}
        {{--}--}}
        {{--.m-b-md {--}}
            {{--margin-bottom: 350px;--}}
            {{--position: relative;--}}
        {{--}--}}

        {{--.container{--}}
            {{--position: absolute;--}}
            {{--margin-top: -90px--}}
        {{--}--}}

        {{--.searchbar{--}}
            {{--margin-bottom: auto;--}}
            {{--margin-top: auto;--}}
            {{--height: 60px;--}}
            {{--background-color: #353b48;--}}
            {{--border-radius: 30px;--}}
            {{--padding: 10px;--}}
        {{--}--}}

        {{--.search_input{--}}
            {{--color: white;--}}
            {{--border: 0;--}}
            {{--outline: 0;--}}
            {{--background: none;--}}
            {{--width: 0;--}}
            {{--caret-color:transparent;--}}
            {{--line-height: 40px;--}}
            {{--transition: width 0.4s linear;--}}
        {{--}--}}

        {{--.searchbar > .search_input{--}}
            {{--padding: 0 10px;--}}
            {{--width: 450px;--}}
            {{--caret-color:red;--}}
            {{--transition: width 0.4s linear;--}}
        {{--}--}}

        {{--.searchbar .search_icon{--}}
            {{--background: white;--}}
            {{--color: #e74c3c;--}}
        {{--}--}}

        {{--.search_icon{--}}
            {{--height: 40px;--}}
            {{--width: 40px;--}}
            {{--float: right;--}}
            {{--display: flex;--}}
            {{--justify-content: center;--}}
            {{--align-items: center;--}}
            {{--border-radius: 50%;--}}
            {{--color:white;--}}
        {{--}--}}
    {{--</style>--}}
    <script>
        {{--$(document).ready(function () {--}}
            {{--var path ="{{ route('autocomplete') }}";--}}
            {{--$("#pidarticulo").typeahead({--}}
                {{--minLength: 3,--}}
                {{--autoSelect: true,--}}
                {{--dataType: 'json',--}}
                {{--source: function (query, process) {--}}

                    {{--return $.get(path, {query:query}, function (data) {--}}
                        {{--var nombres = data.map(function (item) {--}}

                            {{--return item.codigo + ' ' + item.descripcion--}}
                        {{--});--}}
                        {{--return process(nombres);--}}
                    {{--})--}}
                {{--},--}}
                {{--updater:function (item,data) {--}}
                    {{--console.log(item)--}}
                    {{--//item = selected item--}}
                    {{--var input = item.split(' ')--}}

                    {{--$.ajax({--}}
                        {{--type:'get',--}}
                        {{--url:'{!!URL::to('buscarPrecioArticuloVentasPorCodigo')!!}',--}}
                        {{--data:{'codigo':input[0]},--}}
                        {{--success:function(data){--}}
                            {{--//console.log('success');--}}

                            {{--console.log(data);--}}

                            {{--$('#pprecio_venta').val(data[0].precio_venta);--}}
                            {{--$('#pidarticulo').val(data.codigo);--}}
                            {{--$('#pidarticuloidarticulo').val(data.idarticulo);--}}
                            {{--$('#pidarticulonombre').val(data.nombre);--}}

                            {{--$('#nombretemporal').text(data.nombre);--}}

                        {{--},--}}
                        {{--error:function(){--}}

                        {{--}--}}
                    {{--});--}}

                {{--}--}}
            {{--});--}}
        {{--});--}}

        $(document).ready(function() {
            $('#example').DataTable({
                "serverSide": true,
//                "processing": true,
                "ajax": "{{url('api/repuestos')}}",
                "columns": [
                    {data: 'id'},
                    {data: 'codigo'},
                    {data: 'descripcion'},
                    {data: 'marca_repuesto_id'},
                    {data: 'marca_vehiculo_id'},
                    {data: 'seccion_id'},
//                    {data: 'btn'},
                ],
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
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
                }
            });
        } );

        {{--$(document).ready(function() {--}}
            {{--$('#example').DataTable({--}}
                {{--"serverSide": true,--}}
                {{--"processing": true,--}}
                {{--"ajax": "{{url('api/repuestos')}}",--}}
                {{--"columns": [--}}
                    {{--{data: 'id', name: 'repuestos.id'},--}}
                    {{--{data: 'codigo', name: 'repuestos.codigo'},--}}
                    {{--{data: 'descripcion', name: 'repuestos.descripcion'},--}}
                    {{--{data: 'marca_repuesto', name: 'marca_repuesto.nombre'},--}}
                    {{--{data: 'marca_vehiculo', name: 'marca_vehiculo.nombre'},--}}
                    {{--{data: 'seccion', name: 'secciones.nombre'},--}}
{{--//                    {data: 'btn'},--}}
                {{--]--}}
            {{--});--}}
        {{--} );--}}

    </script>
@endpush
@endsection
