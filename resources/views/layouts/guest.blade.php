<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <title>TOYOTER | REPUESTOS TOYOTA, MARCAS JAPONESAS y COREANAS</title>
        <!-- Tell the browser to be responsive to screen width -->
        @yield('card')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


        <!-- Styles -->
        <style>
            html, body {
                /*background-color: #fff;*/
                background-image: url("../images/toyoterlanding.jpg");
                /*background-size: 100%;*/
                background-size: 100%;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            ul {
                padding:0;
                list-style: none;
            }
            .footer-social-icons {
                width: 350px;
                display:block;
                margin: 0 auto;
            }
            .social-icon {
                color: #fff;
            }
            ul.social-icons {
                margin-top: 10px;
            }
            .social-icons li {
                vertical-align: top;
                display: inline;
                height: 100px;
            }
            .social-icons a {
                color: #fff;
                text-decoration: none;
            }
            .fa-facebook {
                padding:10px 14px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                /*background-color: #322f30;*/
            }
            .fa-facebook:hover {
                background-color: #3d5b99;
            }
            .fa-twitter {
                padding:10px 12px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                /*background-color: #322f30;*/
            }
            .fa-twitter:hover {
                background-color: #00aced;
            }
            .fa-youtube {
                padding:10px 14px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                /*background-color: #322f30;*/
            }
            .fa-youtube:hover {
                background-color: #e64a41;
            }

        </style>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="clearfix-xs">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/toyoterlogo.png') }}" alt="Smiley face" class="img-fluid" width="15%" style=" min-width: 100px;">
                </a>
                <button class="navbar-toggler float-right" type="button" style="    margin-top: -40px;" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse text-right" id="navbarsExample02" >
                <ul class="navbar-nav ml-auto">
                    @role('cliente_minorista|admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fas fa-shopping-cart" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span style="">Imprimir Presupuesto</span>
                        </a>
                        <div class="dropdown-menu" style="left: -700px;" aria-labelledby="navbarDropdown">
                            <form id="table-form" action="{{ url('presupuesto') }}" method="POST">
                                {{csrf_field()}}
                                <table id="cart" class="table table-hover table-condensed">
                                    <thead>
                                    <tr>
                                        <th style="width:50%">Producto</th>
                                        <th style="width:10%">Precio</th>
                                        <th style="width:8%">Cantidad</th>
                                        <th style="width:22%" class="text-center">Subtotal</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sessions as $repuesto)
                                        <tr>
                                            <td data-th="Producto">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h4 class="nomargin codigotabla">{{$repuesto[0]->codigo}}</h4>
                                                        <p>{{$repuesto[0]->descripcion}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Precio" class="preciotabla">${{$repuesto[0]->precio}}</td>
                                            <td data-th="Cantidad">
                                                <input type="number" readonly class="form-control text-center cantidadtabla" value="{{$repuesto['cantidad']}}">
                                            </td>
                                            <td data-th="Subtotal" class="text-center subtotaltabla">${{$repuesto[0]->precio * $repuesto['cantidad']}}</td>
                                            <td class="actions" data-th="">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button class="btn btn-info btn-sm minus"><a><i class="fa fa-minus"></i></a></button>
                                                    <button class="btn btn-info btn-sm plus"><a><i class="fa fa-plus"></i></a></button>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="2" class="hidden-xs"></td>
                                        <td> <button type="submit" class="btn btn-danger btn-sm"> <a  class="btn btn-success btn-block">Imprimir Presupuesto</a></button></td>
                                        <td class="hidden-xs text-center"><strong>Total {{$total}}</strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </form>

                        </div>
                    </li>
                    {{--<i class="nav-item">--}}
                        {{--<a class="nav-link" href=""><li class="fas fa-shopping-cart"></li></a>--}}
                    {{--</i>--}}
                    @endrole
                    <li class="nav-item"><a class="nav-link" href="{{ url('/buscar') }}"><strong><p>Buscar</p></strong></a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                        @role('admin')
                        <li class="nav-item active"><a class="nav-link" href="{{ url('/home') }}"><strong>Admin</strong></a>
                        </li>
                        @endrole
                        <li>
                            <a class="nav-link " href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <strong>Ingresar</strong>
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </header>
    <div class="container" style="padding-top: 10px;">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
        @stack('scripts')

    <style>
        .table>tbody>tr>td, .table>tfoot>tr>td{
            vertical-align: middle;
        }
        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control{
                width:20%;
                display: inline !important;
            }
            .actions .btn{
                width:36%;
                margin:1.5em 0;
            }

            .actions .btn-info{
                float:left;
            }
            .actions .btn-danger{
                float:right;
            }

            table#cart thead { display: none; }
            table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
            table#cart tbody tr td:first-child { background: #333; color: #fff; }
            table#cart tbody td:before {
                content: attr(data-th); font-weight: bold;
                display: inline-block; width: 8rem;
            }



            table#cart tfoot td{display:block; }
            table#cart tfoot td .btn{display:block;}

        }
        @media(max-width:768px){.clearfix-xs:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }
        }
    </style>
    </body>
</html>
