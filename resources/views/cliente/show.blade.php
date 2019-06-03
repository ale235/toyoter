@extends ('layouts.admin')
@section ('contenido')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Ver Cliente</h3>
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
            <form role="form" action="{{ url('cliente',$cliente->id) }}" method="POST" id="form-post" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Usuario</label><em>*</em>
                            <input disabled type="text" name="username" id="username" class="form-control" value="{{ old('username') ? old('username'):@$cliente->username }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Razón Social</label><em>*</em>
                            <input disabled type="text" name="razon_social" id="razon_social" class="form-control" value="{{ old('razon_social') ? old('razon_social'):@$cliente->razon_social }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Mail</label><em>*</em>
                            <input disabled type="text" name="mail" id="mail" class="form-control" value="{{ old('mail') ? old('mail'):@$cliente->mail }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Teléfono</label><em>*</em>
                            <input disabled type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') ? old('telefono'):@$cliente->telefono }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>CUIT</label><em>*</em>
                            <input disabled type="text" name="cuit" id="cuit" class="form-control" value="{{ old('cuit') ? old('cuit'):@$cliente->cuit }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Posición frente al IVA</label><em>*</em>
                            <input disabled type="text" name="iva" id="iva" class="form-control" value="{{ old('iva') ? old('iva'):@$cliente->iva }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>CHASIS</label><em>*</em>
                            <input disabled type="text" name="chasis" id="chasis" class="form-control" value="{{ old('chasis') ? old('chasis'):@$cliente->chasis }}">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Rol</label><em>*</em>
                            <select disabled  name="role" class="form-control roles">
                                <option selected>{{ $role }}</option>
                                @foreach($roles as $rol)
                                    <option>{{$rol->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Provincia</label><em>*</em>
                            <input disabled type="text" name="domicilio" id="domicilio" class="form-control" value="{{ old('domicilio') ? old('domicilio'):@$cliente->provincia }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Localidad</label><em>*</em>
                            <input disabled type="text" name="domicilio" id="domicilio" class="form-control" value="{{ old('domicilio') ? old('domicilio'):@$cliente->localidad }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Dirección (Calle/Número/Piso)</label><em>*</em>
                            <input disabled type="text" name="domicilio" id="domicilio" class="form-control" value="{{ old('domicilio') ? old('domicilio'):@$cliente->calleynumero }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Código Postal</label><em>*</em>
                            <input disabled type="text" name="codigopostal" id="codigopostal" class="form-control" value="{{ old('codigopostal') ? old('codigopostal'):@$cliente->codigopostal }}">
                        </div>
                    </div>

                    <div class="row form-group logoempresaclase">
                        <div class="col-md-9">
                            <label>Logo Empresa</label><em>*</em>
                            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{asset($cliente->logoempresa)}}">
                        </div>
                    </div>



                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        if ($(".roles").val() == "cliente_mayorista") {
            $('.logoempresaclase').css('display','block');
        } else {
            $('.logoempresaclase').css('display','none');
        }

    });

</script>
@endpush