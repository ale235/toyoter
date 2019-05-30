@extends('layouts.guest')

@section('card')
    <meta name="description" content="{{$repuesto->descripcion}}" />


    <meta name="twitter:card" value="summary">


    <meta property="og:title" content="{{$repuesto->descripcion}}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{url('/guest')}}/{{$repuesto->id}}" />
    <meta property="og:image" content="{{asset('/images/noimg.jpg')}}" />
    <meta property="og:description" content="{{$repuesto->descripcion}}" />

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="container-fliud">
                        <div class="wrapper row">
                            <div class="preview col-md-6">

                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-1"><img src="/images/noimg.jpg" /></div>
                                    <div class="tab-pane" id="pic-2"><img src="/images/noimg.jpg" /></div>
                                    <div class="tab-pane" id="pic-3"><img src="/images/noimg.jpg" /></div>
                                    <div class="tab-pane" id="pic-4"><img src="/images/noimg.jpg" /></div>
                                    <div class="tab-pane" id="pic-5"><img src="/images/noimg.jpg" /></div>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="/images/noimg.jpg" /></a></li>
                                    <li><a data-target="#pic-2" data-toggle="tab"><img src="/images/noimg.jpg" /></a></li>
                                    <li><a data-target="#pic-3" data-toggle="tab"><img src="/images/noimg.jpg" /></a></li>
                                    <li><a data-target="#pic-4" data-toggle="tab"><img src="/images/noimg.jpg" /></a></li>
                                    <li><a data-target="#pic-5" data-toggle="tab"><img src="/images/noimg.jpg" /></a></li>
                                </ul>

                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">Código repuesto: {{$repuesto->codigo}}</h3>
                                <p class="product-description">{{$repuesto->descripcion}}</p>
                                @role('admin')
                                <h4 class="price">Precio Sugerido: <span>${{$repuesto->precio_sugerido}}</span></h4>
                                <h4 class="price">Precio Mayorista: <span>${{$repuesto->precio_mayorista}}</span></h4>
                                <h4 class="price">Precio Minorista: <span>${{$repuesto->precio_minorista}}</span></h4>
                                @endrole
                                @role('cliente_minorista')
                                <h4 class="price">Precio Minorista: <span>${{$repuesto->precio_minorista}}</span></h4>
                                @endrole
                                @role('cliente_mayorista')
                                <h4 class="price">Precio Mayorista: <span>${{$repuesto->precio_mayorista}}</span></h4>
                                @endrole
                                {{--<h4 class="price">Precio: <span>${{$repuesto->precio_minorista}}</span></h4>--}}
                                <p class="vote">Marca del Repuesto: {{$repuesto->marca_repuesto}}</p>
                                <p class="vote">Marca del Vehículo: {{$repuesto->marca_vehiculo}}</p>
                                <p class="vote">Sección: {{$repuesto->seccion}}</p>

                                <div class="action">
                                    {{--https://wa.me/número?text=mensaje--}}
                                    <a href="https://wa.me/5493424232136?text={{Request::url()}}" class="botao-wpp">
                                        {{--<a href="whatsapp://send?text={{Request::url()}}" class="botao-wpp">--}}
                                            <!-- ícone -->
                                            <i class="fa fa-whatsapp"></i>
                                            Enviar
                                        </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    img {
        max-width: 100%; }

    .preview {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column; }
    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px; } }

    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; }

    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px; }
    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block; }
    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0; }

    .tab-content {
        overflow: hidden; }
    .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s; }

    .card {
        margin-top: 50px;
        background: #343a40;
        padding: 3em;
        line-height: 1.5em; }

    @media screen and (min-width: 997px) {
        .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex; } }

    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column; }

    .product-title, .price {
        color: #F0F0F0;
        text-transform: UPPERCASE;
        font-weight: bold; }

    .product-title, .product-description, .price, .vote{
        color: #F0F0F0;
        margin-bottom: 15px; }

    .product-title {
        margin-top: 0; }

    .add-to-cart, .like {
        background: #ff9f1a;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        -webkit-transition: background .3s ease;
        transition: background .3s ease; }
    .add-to-cart:hover, .like:hover {
        background: #b36800;
        color: #fff; }

    @-webkit-keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3); }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1); } }

    @keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3); }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1); } }

    .botao-wpp {
        text-decoration: none;
        color: #eee;
        display: inline-block;
        background-color: #25d366;
        font-weight: bold;
        padding: 1rem 2rem;
        border-radius: 3px;
    }
    .botao-details {
        text-decoration: none;
        color: #eee;
        display: inline-block;
        background-color: #1a2226;
        font-weight: bold;
        padding: 1rem 2rem;
        border-radius: 3px;
    }

    .botao-wpp:hover {
        background-color: darken(#25d366, 5%);
    }

    .botao-wpp:focus {
        background-color: darken(#25d366, 15%);
    }
</style>
@endpush
@endsection
