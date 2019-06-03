@extends ('layouts.admin')
@section ('contenido')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Cliente</h3>
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
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') ? old('username'):@$cliente->username }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Razón Social</label><em>*</em>
                            <input type="text" name="razon_social" id="razon_social" class="form-control" value="{{ old('razon_social') ? old('razon_social'):@$cliente->razon_social }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Mail</label><em>*</em>
                            <input type="text" name="mail" id="mail" class="form-control" value="{{ old('mail') ? old('mail'):@$cliente->mail }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Teléfono</label><em>*</em>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') ? old('telefono'):@$cliente->telefono }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>CUIT</label><em>*</em>
                            <input type="text" name="cuit" id="cuit" class="form-control" value="{{ old('cuit') ? old('cuit'):@$cliente->cuit }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Posición frente al IVA</label><em>*</em>
                            <input type="text" name="iva" id="iva" class="form-control" value="{{ old('iva') ? old('iva'):@$cliente->iva }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>CHASIS</label><em>*</em>
                            <input type="text" name="chasis" id="chasis" class="form-control" value="{{ old('chasis') ? old('chasis'):@$cliente->chasis }}">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Rol</label><em>*</em>
                            <select name="role" class="form-control roles">
                                <option value="{{ $role }}" selected>{{ $role }}</option>
                                 @foreach($roles as $rol)
                                    @if($rol->name != 'admin' && $rol->name != 'cliente_personalizado')
                                        <option value="{{$rol->name}}">{{$rol->name}}</option>
                                    @endif
                                 @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Provincia</label><em>*</em>
                            <input type="text" name="provincia" id="provincia" class="form-control" value="{{ old('provincia') ? old('provincia'):@$cliente->provincia }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Localidad</label><em>*</em>
                            <input type="text" name="localidad" id="localidad" class="form-control" value="{{ old('localidad') ? old('localidad'):@$cliente->localidad }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Dirección</label><em>*</em>
                            <input type="text" name="calleynumero" id="calleynumero" class="form-control" value="{{ old('calleynumero') ? old('calleynumero'):@$cliente->calleynumero }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Código Postal</label><em>*</em>
                            <input type="text" name="codigopostal" id="codigopostal" class="form-control" value="{{ old('codigopostal') ? old('codigopostal'):@$cliente->codigopostal }}">
                        </div>
                    </div>

                    <div class="row form-group logoempresaclase" style="display: none">
                        <div class="col-md-9">
                            <label>Logo Empresa</label><em>*</em>
                            <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Elegir
                                            </a>
                                        </span>
                                <input id="thumbnail" class="form-control" type="text" name="filepath" value="{{$cliente->logoempresa}}">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{asset($cliente->logoempresa)}}">
                        </div>
                    </div>

                    {{--<div class="row form-group">--}}
                    {{--<div class="col-md-9">--}}
                    {{--<label>Password</label><em>*</em>--}}
                    {{--<input type="text" name="password" id="password" class="form-control" value="{{ old('password') ? old('password'):@$cliente->password }}">--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="row form-group">--}}
                    {{--<div class="col-md-9">--}}
                    {{--<label>Confirmar Password</label><em>*</em>--}}
                    {{--<input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$post->title }}">--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="row form-group">
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="box box-body">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push ('scripts')
<script>
    $(document).ready(function () {
        if($('.roles').val() == 'cliente_mayorista'){
            $('.logoempresaclase').css('display','block');
        }
        $(document).on('change','.roles',function(e){

            if ((this.value ) == "cliente_mayorista") {
                $('.logoempresaclase').css('display','block');
            } else {
                $('.logoempresaclase').css('display','none');
            }

        });

    });
</script>
@endpush