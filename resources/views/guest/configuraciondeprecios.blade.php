@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Configuración de Precios') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{'/guest/preciocliente'}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Porcentaje al Precio de Venta') }}</label>

                            <div class="col-md-6">
                                <input id="porcentaje" type="number" class="form-control{{ $errors->has('porcentaje') ? ' is-invalid' : '' }}" name="porcentaje" value="{{ old('porcentaje') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <details>
                            <summary>
                                <div class="">Click (aquí) para configurar la visualización en el presupuesto</div>
                            </summary>

                            <br>

                            <div class="form-group row">
                                <label for="vercosto" class="col-md-4 col-form-label text-md-right">{{ __('Exportar Presupuesto con el Costo') }}</label>

                                <div class="col-md-6">
                                    <label class="switch">
                                        {{--<input class="estado" type="checkbox" @if($galeria->estado) checked @endif>--}}
                                        <input name="vercosto" class="estado" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="verdatostoyoter" class="col-md-4 col-form-label text-md-right">{{ __('Imprimir Presupuesto con Datos de Toyoter') }}</label>

                                <div class="col-md-6">
                                    <label class="switch">
                                        {{--<input class="estado" type="checkbox" @if($galeria->estado) checked @endif>--}}
                                        <input name="verdatostoyoter" class="estado" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                        </details>
                        <br>
                        <input style="display: none" name="cliente" class="estado" type="text" value="{{Auth::id()}}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Confirmar Configuración') }}
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
<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
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
@endsection
