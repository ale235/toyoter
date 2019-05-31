@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrarse') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                                <input id="nombreapellidorazonsocial" type="text" class="form-control{{ $errors->has('nombreapellidorazonsocial') ? ' is-invalid' : '' }}" name="nombreapellidorazonsocial" value="{{ old('nombreapellidorazonsocial') }}" required>

                                @if ($errors->has('nombreapellidorazonsocial'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreapellidorazonsocial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <hr>
                        <details>
                            <summary>
                                <div class="">Click (aquí) para completar datos opcionales</div>
                            </summary>

                            <br>

                            <div class="form-group row">
                                <label for="cuit" class="col-md-4 col-form-label text-md-right">{{ __('CUIT') }}</label>

                                <div class="col-md-6">
                                    <input id="cuit" type="number" class="form-control{{ $errors->has('cuit') ? ' is-invalid' : '' }}" name="cuit" value="{{ old('cuit') }}">

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
                                    <input id="condicioniva" type="text" class="form-control{{ $errors->has('condicioniva') ? ' is-invalid' : '' }}" name="condicioniva" value="{{ old('condicioniva') }}">

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
                                    <input id="provincia" type="text" class="form-control{{ $errors->has('provincia') ? ' is-invalid' : '' }}" name="provincia" value="{{ old('provincia') }}">

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
                                    <input id="localidad" type="text" class="form-control{{ $errors->has('localidad') ? ' is-invalid' : '' }}" name="localidad" value="{{ old('localidad') }}">

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
                                    <input id="codigopostal" type="text" class="form-control{{ $errors->has('codigopostal') ? ' is-invalid' : '' }}" name="codigopostal" value="{{ old('codigopostal') }}">

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
                                    <input id="calleynumero" type="text" class="form-control{{ $errors->has('calleynumero') ? ' is-invalid' : '' }}" name="calleynumero" value="{{ old('callenumero') }}">

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
                                    <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}">

                                    @if ($errors->has('telefono'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                        </details>

                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <style>
        details summary::-webkit-details-marker {
            display:none;
        }
    </style>
@endsection
