@extends('guest')

@section('content')
    <div class="title m-b-md">
        Buscar Repuesto
    </div>
    <div class="container">
        <div class="justify-content-center">
            <div class="searchbar">
                <input class="search_input" type="text" name="" placeholder="Ingresá: Código, nombre, descripción, marca, etc.">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
        </div>
    </div>
@push('scripts')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
        .title {
            color: #F5F5F5;
            font-family: 'Raleway', sans-serif;
            font-weight: 900;
            font-size: 84px;
        }
        .m-b-md {
            margin-bottom: 350px;
            position: relative;
        }

        .container{
            position: absolute;
            margin-top: -90px
        }

        .searchbar{
            margin-bottom: auto;
            margin-top: auto;
            height: 60px;
            background-color: #353b48;
            border-radius: 30px;
            padding: 10px;
        }

        .search_input{
            color: white;
            border: 0;
            outline: 0;
            background: none;
            width: 0;
            caret-color:transparent;
            line-height: 40px;
            transition: width 0.4s linear;
        }

        .searchbar > .search_input{
            padding: 0 10px;
            width: 450px;
            caret-color:red;
            transition: width 0.4s linear;
        }

        .searchbar .search_icon{
            background: white;
            color: #e74c3c;
        }

        .search_icon{
            height: 40px;
            width: 40px;
            float: right;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            color:white;
        }
    </style>
@endpush
@endsection
