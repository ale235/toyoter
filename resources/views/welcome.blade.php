@extends('layouts.guest')

@section('card')


    <meta name="twitter:card" value="summary">


    <meta property="og:title" content="Repuestos Toyoter" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.toyoter.com.ar" />
    <meta property="og:image" itemprop="image" content="{{asset('/photos/shares/noimg.jpg')}}" />
    <meta property="og:description" content="Repuestos Toyoter" />

@section('content')
    <div class="content">
        <div class="title m-b-md">
            <img src="{{ asset('images/toyoterlogo.png') }}" alt="Smiley face" width="50%">
        </div>

        {{--<div class="links">--}}
        {{--<a href="https://laravel.com/docs">Documentation</a>--}}
        {{--<a href="https://laracasts.com">Laracasts</a>--}}
        {{--<a href="https://laravel-news.com">News</a>--}}
        {{--<a href="https://nova.laravel.com">Nova</a>--}}
        {{--<a href="https://forge.laravel.com">Forge</a>--}}
        {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
        {{--</div>--}}
        <div class="footer-social-icons">
            <ul class="social-icons">
                <li><a href="https://www.facebook.com/repuestostoyoter" class="social-icon"> <i class="fab fa-facebook fa-3x"></i></a></li>
                <li><a href="" class="social-icon"> <i class="fab fa-youtube fa-3x"></i></a></li>
                <li><a href="" class="social-icon"> <i class="fab fa-twitter fa-3x"></i></a></li>
            </ul>
        </div>
    </div>
@endsection
