<?php
use App\Http\Controllers\ProductsController;
$cart = 0;
if (Auth::check()) {
    $cart = ProductsController::cartItems();
    $user = 1;
} else {
    $user = 0;
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>{{ trans('main.gamers_shop') }}</title>


    <!-- bootstrap core css -->
    <link type="text/css" rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />

    <!-- fonts style -->
    <link type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- range slider -->

    <!-- font awesome style -->
    <link type="text/css" href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('css/dark.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template  public\css\style.scss-->
    <link type="text/css" href="{{ asset('black/css/black-dashboard.css.map') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('black/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link type="text/css" href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&family=Vibes&display=swap" rel="stylesheet">

</head>
<style>
    body {
        font-family: 'Cairo', sans-serif;

    }

    .scroll {
        position: relative;
    }

    .sticky {
        position: fixed;
        top: 0;
        z-index: 9999;
        background-color: #313958 !important;
        width: 100%;
    }
</style>

<body>

    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="header_top">
                <div class="container">
                    <div class="top_nav_container">
                        <div class="contact_nav">
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call : +20 106 839 1260
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    Email : mail@gamers-shop.net
                                </span>
                            </a>
                        </div>
                        <form action="{{ route('search') }}" method="GET" role="search" autocomplete="off"
                            class="search_form">
                            <input type="text" class="form-control" name="search"
                                placeholder="Search for product here...">
                            <button class="" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                        <div class="user_option_box">
                            @guest
                                <a href="{{ route('register') }}" class="account-link">
                                    <i class="fa fa-laptop" aria-hidden="true"></i>
                                    <span>
                                        {{ trans('main.register') }}
                                    </span>

                                </a>
                                <a href="{{ route('login') }}" class="account-link">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>
                                        {{ trans('main.login') }}
                                    </span>

                                </a>
                            @endguest
                            @Auth
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropBtn dropdown-toggle" type="button"
                                        id="dropdownMenu2" data-bs-toggle="dropdown">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu dropMenu" id="personDrop" aria-labelledby="dropdownMenu2">
                                        <li>
                                            <button class="dropdown-item" type="button">
                                                <a href="{{ route('editProfile') }}"
                                                    class="dropLink">{{ trans('main.profile') }}</a>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" type="button">
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="{{ route('dashboard') }}"
                                                        class="dropLink">{{ trans('main.dashboard') }}</a>
                                                @else
                                                    <a href="{{ route('home') }}"
                                                        class="dropLink">{{ trans('main.home') }}</a>
                                                @endif
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" type="button">
                                                @if (Auth())
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <a href="{{ route('logout') }}" class="dropLink"
                                                        onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ trans('main.logout') }}</a>
                                                @endif
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            @endAuth
                            <a href="{{ route('cartList') }}" class="cart-link">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                (<span class="cart-counter">{{ $cart }}</span> )
                            </a>


                        </div>
                    </div>

                </div>
            </div>
            <div class="header_bottom" id="scroll">
                <div class="container">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="">
                            <span class="h1" style="font-family: 'Vibes', cursive;">
                                {{ trans('main.gamers_shop') }}
                            </span>
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ">
                                <li class="nav-item {{ '/' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('home') }}">{{ trans('main.home') }}
                                        <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item {{ 'about' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('about') }}">
                                        {{ trans('main.about') }}</a>
                                </li>
                                <li class="nav-item {{ 'shop' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('shop') }}">{{ trans('main.shop') }}</a>
                                </li>
                                <li class="nav-item {{ 'contact' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link"
                                        href="{{ route('contact.index') }}">{{ trans('main.contact') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('cartList') }}">{{ trans('main.cart') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">{{ trans('main.checkout') }}</a>
                                </li>
                                <li class="">
                                    <div class="pt-2 d-felx ">
                                        <input type="checkbox" class="checkbox" id="darkSwitch">
                                        <label for="darkSwitch" class="label ">
                                            <i class="fas fa-moon"></i>
                                            <i class='fas fa-sun'></i>
                                            <div class='ball'>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropBtn dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-bs-toggle="dropdown">
                                            {{-- <i class="fa fa-language" aria-hidden="true"></i> --}}
                                                <img src="{{ asset('images/lang/ae.svg') }}" alt="">
                                        </button>
                                        <ul class="dropdown-menu dropMenu" id="personDrop"
                                            aria-labelledby="dropdownMenu2">
                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <li>
                                                    
                                                    <a class="dropdown-item" rel="alternate"
                                                        hreflang="{{ $localeCode }}"
                                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        {{ $properties['native'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- end header section -->

        <!-- Messenger Chat Plugin Code -->
        <div id="fb-root"></div>

        <!-- Your Chat Plugin code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "304028856416013");
            chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version: 'v14.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <div class="content">
            @yield('content')
        </div>
        <!-- info section -->
        <section class="info_section ">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info_contact">
                            <h5>
                                <a href="{{ route('home') }}" class="navbar-brand">
                                    <span class="h1" style="font-family: 'Vibes', cursive;">
                                        {{ trans('main.gamers_shop') }}
                                    </span>
                                </a>
                            </h5>
                            <p>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ trans('main.cairo_egypt') }}
                            </p>
                            <p>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                +20 106 839 1260
                            </p>
                            <p>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                mail@gamers-shop.net
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_info">
                            <h5>
                                {{ trans('main.information') }}
                            </h5>
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_links">
                            <h5>
                                {{ trans('main.useful_link') }}
                            </h5>
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">
                                        {{ trans('main.home') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}">
                                        {{ trans('main.about') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('shop') }}">
                                        {{ trans('main.shop') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cartList') }}">
                                        {{ trans('main.cart') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        {{ trans('main.checkout') }}
                                    </a>
                                </li>
                                {{-- <li>
                <a href="testimonial.html">
                  Testimonial
                </a>
              </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_form ">
                            <h5>
                                Newsletter
                            </h5>
                            <form action="">
                                <input type="email" placeholder="Enter your email">
                                <button>
                                    Subscribe
                                </button>
                            </form>
                            <div class="social_box">
                                <a href="https://www.facebook.com/GaamersShop/">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-youtube" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end info_section -->
        <!-- footer section -->
        <footer class="footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a class="text-warning" href="http://mohamed-ali.rf.gd/">Mohamed Ali</a> & <a
                        class="text-warning" href="https://www.linkedin.com/in/ahmed-ashraf-4b7359222/">Ahmed
                        Ashraf</a>
                </p>
            </div>
        </footer>
        <!-- footer section -->
        <!-- jQery -->
        <script src="{{ asset('black/js/core/jquery.min.js') }}"></script>
        <script src="{{ asset('black/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('black/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js.custom.js') }}"></script>


        {{-- <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script> --}}
        {{-- <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="{{asset('js/ion.rangeSlider.min.js')}}"></script>
  <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <script src="{{asset('js/jquery.validate.js')}}"></script>
  <script src="{{asset('js/navbar.js')}}"></script>
  <script src="{{asset('js/plugin.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script> --}}

        <!-- bootstrap js -->
        {{-- <script src="{{asset('js/bootstrap.js')}}"></script> --}}
        <script>
            $(document).ready(function() {
                $('.dropBtn').on("click", function() {
                    $(this).next('ul').toggle();
                    e.stopPropagation();
                    e.preventDefault();
                    // alert('ccc')
                });
            });
        </script>
        <!-- custom js -->
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/dark.js') }}"></script>
        {{-- <script src="{{asset('js/ion.rangeSlider.min.js')}}"></script> --}}
        <script>
            var yourNavigation = $("#scroll");
            stickyDiv = "sticky";
            yourHeader = $('.header_top').height();

            $(window).scroll(function() {
                if ($(this).scrollTop() > yourHeader) {
                    yourNavigation.addClass(stickyDiv);
                } else {
                    yourNavigation.removeClass(stickyDiv);
                }
            });
        </script>
        <script>
            // $("#alert").delay(1000).hide();

            $().ready(function() {

                $('div.alert').delay(3000);
                $('div.alert').hide(2000);
            });
        </script>
</body>

</html>
