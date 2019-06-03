@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Editar Información') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('guest/' . $cliente->user_id) }}" novalidate>
                            <input type="hidden" name="_method" value="PATCH">
                            @csrf
                            <hr>
                            <sup class="">Datos Obligatorios</sup>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$cliente->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$cliente->email}}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombreapellidorazonsocial" class="col-md-4 col-form-label text-md-right">{{ __('Nombre y Apellido / Razón Social') }}</label>

                                <div class="col-md-6">
                                    <input id="nombreapellidorazonsocial" type="text" class="form-control{{ $errors->has('nombreapellidorazonsocial') ? ' is-invalid' : '' }}" name="nombreapellidorazonsocial" value="{{$cliente->razon_social}}" required>

                                    @if ($errors->has('nombreapellidorazonsocial'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreapellidorazonsocial') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <hr>
                            <sup class="">Datos Opcionales</sup>

                            <div class="form-group row">
                                <label for="cuit" class="col-md-4 col-form-label text-md-right">{{ __('CUIT') }}</label>

                                <div class="col-md-6">
                                    <input id="cuit" type="number" class="form-control{{ $errors->has('cuit') ? ' is-invalid' : '' }}" name="cuit" value="{{$cliente->cuit}}">

                                    @if ($errors->has('cuit'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cuit') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="condicioniva" class="col-md-4 col-form-label text-md-right">{{ __('Condición IVA') }}</label>

                                <div class="col-md-6">
                                    <input id="condicioniva" type="text" class="form-control{{ $errors->has('condicioniva') ? ' is-invalid' : '' }}" name="condicioniva" value="{{$cliente->iva}}">

                                    @if ($errors->has('condicioniva'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('condicioniva') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="provincia" class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>

                                <div class="col-md-6">
                                    <input id="provincia" type="text" class="form-control{{ $errors->has('provincia') ? ' is-invalid' : '' }}" name="provincia" value="{{$cliente->provincia}}">

                                    @if ($errors->has('provincia'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('provincia') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="localidad" class="col-md-4 col-form-label text-md-right">{{ __('Localidad') }}</label>

                                <div class="col-md-6">
                                    <input id="localidad" type="text" class="form-control{{ $errors->has('localidad') ? ' is-invalid' : '' }}" name="localidad" value="{{$cliente->localidad}}">

                                    @if ($errors->has('localidad'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('localidad') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cp" class="col-md-4 col-form-label text-md-right">{{ __('Código Postal') }}</label>

                                <div class="col-md-6">
                                    <input id="codigopostal" type="text" class="form-control{{ $errors->has('codigopostal') ? ' is-invalid' : '' }}" name="codigopostal" value="{{$cliente->codigopostal}}">

                                    @if ($errors->has('codigopostal'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('codigopostal') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="calleynumero" class="col-md-4 col-form-label text-md-right">{{ __('Dirección (Calle/Número/Piso))') }}</label>

                                <div class="col-md-6">
                                    <input id="calleynumero" type="text" class="form-control{{ $errors->has('calleynumero') ? ' is-invalid' : '' }}" name="calleynumero" value="{{$cliente->calleynumero}}">

                                    @if ($errors->has('calleynumero'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('calleynumero') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{$cliente->telefono}}">

                                    @if ($errors->has('telefono'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="chasis" class="col-md-4 col-form-label text-md-right">{{ __('Chasis') }}</label>

                                <div class="col-md-6">
                                    <input id="chasis" type="text" class="form-control{{ $errors->has('chasis') ? ' is-invalid' : '' }}" name="chasis" value="{{$cliente->chasis}}">

                                    @if ($errors->has('chasis'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('chasis') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            @role('cliente_mayorista')
                            <div class="form-group row">
                                <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo de la Empresa') }}</label>

                                <div class="col-md-6">
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
                            @endrole
                            {{--<hr>--}}
                            {{--<sup class="">Dejar en Blanco si no se desea cambiar la Contraseña.</sup>--}}

                            {{--<div class="form-group row">--}}
                                {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row">--}}
                                {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <br>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary ">
                                        {{ __('Editar') }}
                                    </button>
                                </div>
                            </div>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                            </a>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
    <style>
        html, body {
            /*background-color: #fff;*/
            background-image:  url("../../images/toyoterlanding.jpg");
            /*background-size: 100%;*/
            background-size: 100%;
        }
    </style>
@endpush
@endsection
