<?php 
use App\Http\Controllers\Controller;
$catProducts = Controller::CatProducts();
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Commerce') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Scripts -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
</head>
<body>
        <div class="col-md-3 mb-5">
            <section id="sect" class="bg-warning p-1">
                <div class="section-title pl-4 text-white">
                    <h5><i class="fa fa-play mr-2"></i>Kitchenware And Utensils</h5>
                </div>
            </section>
            <div class="nav-side-menu">
                    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
                    <div class="menu-list">
                        <ul id="menu-content" class="menu-content collapse out">
                            @foreach($categories as $cat)
                                <li data-toggle="collapse" data-target="#catID{{$cat->id}}" class="collapsed">
                                <a href="{{$cat->url}}"><i class="fa fa-gift fa-lg"></i>{{$cat->name}}<span class="arrow"></span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
</body>
</html>