@extends ('layouts.admin')
@section ('contenido')
    <!-- Input addon -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Nuevo Artículo</h3>
        </div>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <u>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </u>
            </div>
        @endif
        <div class="box box-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
            </form>
        </div>
    </div>
@endsection

@push ('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">

</script>
<script>
    $("#barcode").keypress(function(event){
        if (event.which == '10' || event.which == '13') {
            event.preventDefault();
        }
    });
    $("#codigo").keypress(function(event){
        if (event.which == '10' || event.which == '13') {
            event.preventDefault();
        }
    });

    var options =  {
        onComplete: function(cep) {
            var cat_id=cep;
            console.log(cat_id);
            $.ajax({
                type:'get',
                url:'{!!URL::to('existeArticulo')!!}',
                data:{'barcode':cat_id},
                success:function(data){
                    //Si se activa este IF quiere decir que se va a EDITAR el artículo.
                    if(!(Object.keys(data).length === 0 && data.constructor === Object)){

                        //Controla que se muestre el resto del formulario.
                        $('.second-part-form').css('display','block');
                        $('.switch').css('display','none');

                        $('#barcode').attr('readonly', true);
                        $('#nombre').attr('readonly', true);
                        $('#codigo').attr('readonly', true);
                        $("#codigo").val(data.codigo);
                        $('#nombre').val(data.nombre);
                        $('#barcode').val(data.barcode);
                        $("#idcategoria").val(data.idcategoria);
                        $("#idcategoriasolo").val(data.idcategoria);
                        $("#idproveedores").val(data.idpersona);
                        $("#idcategoria").attr('disabled', 'disabled');
                        $("#idproveedores").attr('disabled', 'disabled');
                        $("#existencia").text(data.stock);
                        $("#inputdelexistencia").show();
                        $('#pprecio_compra_costo').val(data.precio_compra);
                        $('#pporcentaje_venta').val(data.porcentaje);
                        $('#pprecio_venta_esperado').val(data.precio_venta);
                        $('#idproveedorsolo').val(data.idpersona);
                        $("#idproveedor").val(data.proveedor);
                        var res = '{{asset('imagenes/articulos')}}'.concat('/'+data.imagen);
                        $("#imagen-thumb").attr('src',res);
                        $("#imagen-module").css('display','none');

                        $($('#codigo').parent()).addClass('has-success');
                        $($('#barcode').parent()).addClass('has-success');
                        $($('#codigo').parent()).removeClass('has-error');
                        $($('#idcategoria').parent()).addClass('has-success');
                        $($('#idproveedores').parent()).addClass('has-success');
                        $($('#nombre').parent()).addClass('has-success');
                    }
                    else{
//                        $('#codigo').val('');
//                        $($('#codigo').parent()).removeClass('has-error');
//                        $('#modal-default').modal("show");
                    }

                },
                error:function(){
                    console.log("aca");
                }
            });
        },
        onKeyPress: function(cep, event, currentField, options){
            console.log('A key was pressed!:', cep, ' event: ', event,
                'currentField: ', currentField, ' options: ', options);
        },
        onChange: function(cep){
            $($('#codigo').parent()).addClass('has-error');
        },
        onInvalid: function(val, e, f, invalid, options){
            var error = invalid[0];
            console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
        },
        translation: {
            'A': {pattern: /[A-Za-z]/},
            'Y': {pattern: /[0-9]/}
        }
    };
    $('#codigo').mask('AAAAAYYYYY', options);


    $(document).ready(function () {
        $(document).on('change','#toogle-switch',function(){
            if ($('#toogle-switch').is(':checked')) {
                $('#toogle-switch').attr('checked',true);
                $('.barcode').css('display','');
//                $('#codigo').css('display','none');
//                $('#atajo').css('display','none');
                $('.first-part-form').css('display','none');
            } else {
                $('#toogle-switch').attr('checked',false);
                $('.barcode').css('display','none');
//                $('#codigo').css('display','block');
//                $('#atajo').css('display','block');
                $('.first-part-form').css('display','block');
            }

        });

        $(document).on('change','#barcode,#atajo',function(){
            var cat_id=$(this).val();
            $.ajax({
                type:'get',
                url:'{!!URL::to('existeArticulo')!!}',
                data:{'barcode':cat_id},
                success:function(data){
                    //Controla que se muestre el resto del formulario.
                    $('.second-part-form').css('display','block');
                    $('.switch').css('display','none');

                    //Si se activa este IF quiere decir que se va a EDITAR el artículo.
                    if(!(Object.keys(data).length === 0 && data.constructor === Object)){
                        $('#barcode').attr('readonly', true);
                        $('#nombre').attr('readonly', true);
                        $('#codigo').attr('readonly', true);
                        $("#codigo").val(data.codigo);
                        $('#nombre').val(data.nombre);
                        $('#barcode').val(data.barcode);
                        $("#idcategoria").val(data.idcategoria);
                        $("#idcategoriasolo").val(data.idcategoria);
                        $("#idproveedores").val(data.idpersona);
                        $("#idcategoria").attr('disabled', 'disabled');
                        $("#idproveedores").attr('disabled', 'disabled');
                        $("#existencia").text(data.stock);
                        $("#inputdelexistencia").show();
                        $('#pprecio_compra_costo').val(data.precio_compra);
                        $('#pporcentaje_venta').val(data.porcentaje);
                        $('#pprecio_venta_esperado').val(data.precio_venta);
                        $('#idproveedorsolo').val(data.idpersona);
                        $("#idproveedor").val(data.proveedor);
                        var res = '{{asset('imagenes/articulos')}}'.concat('/'+data.imagen);
                        $("#imagen-thumb").attr('src',res);
                        $("#imagen-module").css('display','none');

                        $($('#codigo').parent()).addClass('has-success');
                        $($('#barcode').parent()).addClass('has-success');
                        $($('#idcategoria').parent()).addClass('has-success');
                        $($('#idproveedores').parent()).addClass('has-success');
                        $($('#nombre').parent()).addClass('has-success');
                        $($('#pporcentaje_venta').parent()).addClass('has-success');
                        $($('#pprecio_compra_costo').parent()).addClass('has-success');
//                        $($('#nombre').parent()).addClass('has-success');
//                        $($('#idcategoria').parent()).addClass('has-success');


                    }

                },
                error:function(){
                    console.log("aca");
                }
            });

        });
//
//        $(document).on('change','#codigo',function(){
//            var cod = $('#idproveedores').val()+$('#codigo').val();
//            for(var i = 0; i<art.length;i++){
//                if(art[i].codigo == cod){
//                    alert('El código ya existe');
//                    $('#codigo').val(' ');
//                }
//            }
//
//        });
        $(document).on('change','#idproveedores',function(){

            var cat_id=$(this).val();
            var cat_text=$("#idproveedores option:selected").text();
            $.ajax({
                type:'get',
                url:'{!!URL::to('buscarProveedor')!!}',
                data:{'idpersona':cat_id},
                success:function(data){
                    $('#idproveedorsolo').val(data[0].idpersona);
                    $('#idproveedor').val(data[0].codigo)

                },
                error:function(){

                }
            });
            $.ajax({
                type:'get',
                url:'{!!URL::to('buscarUltimoId')!!}',
                data:{'codigo':cat_text},
                success:function(data){
                    if (data.codigo == null) {
                        var d = ajustar(5, 1);
                        $('#codigo').val(d);
                    }
                    else {
                        var a = data.codigo.substr(data.codigo.length - 5);
                        var a2 = $('#idproveedor').val();
                        var b = parseInt(a) + 1;
                        var c = ajustar(5, b);
                        $('#codigo').val(a2.concat(c));
                        $('.second-part-form').css('display','block');
                        $($('#codigo').parent()).addClass('has-success');
                        $($('#barcode').parent()).addClass('has-success');
                        $($('#codigo').parent()).removeClass('has-error');
                        $($('#idcategoria').parent()).addClass('has-success');
                        $($('#idproveedores').parent()).addClass('has-success');
                        $($('#nombre').parent()).addClass('has-success');
                    }

                },
                error:function(){

                }
            });

        });

        $(document).on('change','#pcantidad,#pprecio_compra_costo,#pporcentaje_venta',function(){
            //$($('#codigo').parent()).addClass('has-success');
            $(this).parent().addClass('has-success');
        });

    });

    function ajustar(tam, num) {
        if (num.toString().length < tam) return ajustar(tam, "0" + num)
        else return num;
    }
    function actualizar() {
        var a =  $('#pprecio_compra_costo').val();
        var b =  $('#pporcentaje_venta').val()/100 + 1;
        var cantidad =  $('#pcantidad').val();
        $('#pprecio_venta_esperado').val(a*b);
    }
    function valida(e){
        tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }

        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }

    $( "#form-articulo" ).submit(function( event ) {
        if(!($($('#codigo').parent()).hasClass('has-success') &&
            $($('#barcode').parent()).hasClass('has-success') &&
            $($('#nombre').parent()).hasClass('has-success') &&
            $($('#idcategoria').parent()).hasClass('has-success') &&
            $($('#nombre').parent()).hasClass('has-success') &&
            $($('#idproveedores').parent()).hasClass('has-success') &&
            $($('#pcantidad').parent()).hasClass('has-success') &&
            $($('#pporcentaje_venta').parent()).hasClass('has-success') &&
            $($('#pprecio_compra_costo').parent()).hasClass('has-success')))
        {
            event.preventDefault();
        }

    });


</script>
<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;

        /*margin: -7px 3px -7px 0px;*/
    }

    /* Hide default HTML checkbox */
    .switch input {display:none;}

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
@endpush