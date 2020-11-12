<?php 
use App\Http\Controllers\Controller;
$navCats = Controller::navCats();
$products = Controller::products();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
</head>
<body>
    <div id="app">
        <div class="container" style="background-color: #B6A08B;">
            <div class="row">
                <div class="col-md-7 m-auto">
                    <a class="navbar-brand" href="/"><img src="images/rkhotel.png" alt="" width="290px"></a>
                </div>
                <div class="col-md-5" style="margin: 20px auto;">
                    <div class="row">
                        <div class="mr-3" style="display: flex;">
                            <div class="round-shape" data-toggle="modal" data-target="#myModaltwo">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="square-shape" data-toggle="modal" data-target="#myModaltwo">
                                <span class="phone"><strong>Call +91-8048763677</strong></span> <br>
                                <span class="rate text-right">83% Response Rate</span>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="right-square-shape" data-toggle="modal" data-target="#myModaltwo">
                                <span class="phone text-light"><strong>SEND EMAIL</strong></span> <br>
                            </div>
                            <div class="right-round-shape" data-toggle="modal" data-target="#myModaltwo">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <form class="form" style="width: 360px;">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Search" aria-label="Search" style="padding-left: 20px; border-radius: 40px; position: relative;" id="mysearch">
                                    <div class="input-group-addon" style="position: absolute;right: 23px;top: -4px; z-index: 3; border-radius: 40px; background-color: transparent; border:none;">
                                        <button class="btn btn-warning btn-sm" type="submit" style="border-radius: 20px;" id="search-btn"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <section id="navigation" style="background-color: #2f2015;">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav" style="width: 100%; justify-content: space-between;">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ABOUT US</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products & Services</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($navCats as $cat)
                                    <a class="dropdown-item" href="/{{$cat->url}}">{{$cat->name}}</a>
                                @endforeach
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pages.contact') }}">CONTACT US</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </section>
            <div class="row">
                <div class="container">
                    @if ($success = Session::get('flash_message_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $success }}</strong>
                        </div>
                    @endif</div>
            </div>
            @yield('content')
            <section id="showcase" style="background-color: #5B422A; padding: 15px 25px;">
                <h4 class="text-warning">Showcase Gallery</h4>
                <div id="showcase-carousel">
                    <div class="owl-carousel owl-theme">
                        @foreach($products as $product)
                            <div class="item m-2">
                                <div class="product-img">
                                    <img src="/images/products/{{$product->product_img}}" alt="">
                                </div>
                                <a href="#{{$product->slug}}" class="product-tilr text-center text-warning" style="padding-top: 10px !important; text-align: center !important;">{{$product->product_name}}</a>
                            </div>
                        @endforeach
                    </div>
            </section>
            <br><br>
            <section id="contact">
                <div class="bg-default p-3" style="max-width: 120px;"><a href="" style="color: #000; font-weight: 700; font-siize: 20px;">Contact Us</a></div>
                <div id="contact-info-box" style="border: 1px solid; padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-9">
                            <span><strong>Vineet Juneja (CEO)</strong></span>
                            <span>Metal Kraft</span> <br>
                            <span>4623, 1st Floor, Deputy Ganj, Sadar Bazaar <br> New Delhi - 110006, Delhi, India</span>
                            <br>
                            <div class="mr-3 mt-3" style="display: flex;">
                                <div class="round-shape" data-toggle="modal" data-target="#myModaltwo">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="square-shape" data-toggle="modal" data-target="#myModaltwo">
                                    <span class="phone"><strong>Call +91-8048763677</strong></span> <br>
                                    <span class="rate text-right">83% Response Rate</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="btnGroupAddon">@</div>
                                </div>
                                <button class="btn btn-default">Contact Via E-mail</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="share-us pt-3" style="border: 1px solid; border-top: none; text-align: center;">
                    <p style="display: inline-block"><i class="fa fa-share-alt" aria-hidden="true"></i> Share Us: </p>
                    <div style="display: inline-block">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                </div>
            </section>
    <style>
        .round-shape{width: 65px;height: 65px;background-image: linear-gradient(to bottom right, #ffcb00, #ffcb00);border-radius: 50%;cursor: pointer;}
        .round-shape i{font-size: 35px;text-align: center;margin: 20px;}
        .square-shape{height: 50px;background-image: linear-gradient(to bottom right, #ffcb00, #ffcb00);margin-left: -14px;margin-top: 6px;width: 165px;border-radius: 0 5px 5px 0;padding: 6px 10px;box-sizing: border-box;cursor: pointer;}
        .right-round-shape{width: 65px;height: 65px;background-color:#2f2015;border-radius: 50%;cursor: pointer;}
        .right-round-shape i{font-size: 30px;text-align: center;margin: 17px 20px; color: #fff;}
        .right-square-shape{height: 50px;background-color:#2f2015;margin-right: -18px; margin-top: 6px;width: 115px;border-radius: 5px 5px 5px 5px;padding: 15px 10px;box-sizing: border-box;cursor: pointer;}
        #mysearch:focus + .input-group-addon {z-index: 10;}
        #search-btn:hover {cursor: pointer;background-color: #ffc107;}
        .navbar-brand {height: auto;}
        .navbar, .navbar-collapse{padding: 0;}
        .navbar-nav>li {border-right: 1px solid;border-left: 1px solid;width: 100%;text-align: center;}
        .navbar-nav>li:hover{background-color: #E37603;}
        .small{color: #111 !important;}
        #showcase-carousel .owl-carousel .owl-stage {transition-timing-function: linear !important;}
        img {max-width: 100%;}
        #contact .col-md-3 .input-group{display: flex;flex-wrap: nowrap;}
        .dropdown-menu{background-color: rgb(91, 66, 42); padding: 0;}
        .dropdown-menu .dropdown-item{padding: .5rem 1.5rem; color: #fff;}
        .dropdown-item:focus, .dropdown-item:hover {
            color: #111;
            text-decoration: none;
            background-color: rgb(217, 92, 2);
        }
    </style>
    <div class="modal" id="myModaltwo" tabindex="-1" role="dialog" aria-labelledby="myModaltwo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Contact Us Quickly</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('request.contact.create') }}" id="contact-form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                        <div class="form-group">
                            <textarea class="form-control" id="description" tabindex="1" placeholder="Describe your buying requirements in detail:" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="S_mobile" name="S_mobile" tabindex="3" placeholder="Enter your number:" maxlength="10">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter your name:" id="fullname" name="fullname" tabindex="4">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Contact Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function() {
            $("#home-carousel .owl-carousel").owlCarousel({
                stagePadding: 50,
                items: 4,
                loop: true,
                autoPlay: true,
                margin: 10,
                dots: false,
                nav: true,
                pagination :false,
            });
            $("#latest-news-carousel .owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                autoPlay: true,
                margin: 0,
                pagination :false,
            });

            $("#showcase-carousel .owl-carousel").owlCarousel({
                items: 6,
                loop: true,
                dots: false,
                nav: true,
                pagination :false,
                autoPlay:true,
                autoPlayTimeout:1000,
                autoplayHoverPause:true
            });

            $('ul li.dropdown').hover(function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn(100);
                }, function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut(100);
            });
        });
    </script>
</body>
</html>
