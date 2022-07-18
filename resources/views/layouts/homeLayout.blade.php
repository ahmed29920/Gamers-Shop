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

    <title>{{ trans('main.gamers_shop')}}</title>


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
    <link type="text/css" href="{{ asset('css/side.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link type="text/css" href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

</head>
<style>
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
                                        Register
                                    </span>

                                </a>
                                <a href="{{ route('login') }}" class="account-link">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>
                                        Login
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
                                                <a href="{{ route('profile.edit') }}" class="dropLink">Profile</a>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" type="button">
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="{{ route('dashboard') }}" class="dropLink">Dashboard</a>
                                                @else
                                                    <a href="{{ route('home') }}" class="dropLink">Home</a>
                                                @endif
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" type="button">
                                                @if (Auth())
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <a href="{{ route('logout') }}" class="dropLink"
                                                        onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
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
                            <span>
                                {{ trans('main.gamers_shop')}}
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
                                    <a class="nav-link " href="{{ route('home') }}">{{trans('main.home')}} <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item {{ 'about' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('about') }}"> {{trans('main.about')}}</a>
                                </li>
                                <li class="nav-item {{ 'shop' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('shop') }}">{{trans('main.shop')}}</a>
                                </li>
                                <li class="nav-item {{ 'contact' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('contact.index') }}">{{trans('main.contact')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link cartLink" href="#">{{trans('main.cart')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cartList') }}">{{trans('main.checkout')}}</a>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropBtn dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-bs-toggle="dropdown">
                                            <i class="fa fa-language" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu dropMenu" id="personDrop"
                                            aria-labelledby="dropdownMenu2">
                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <li>
                                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        {{ $properties['native'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
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
        <aside>
            <h1 id="close"> Shopping Cart <i class="fa fa-close" style="float : right ; padding-right :5px"></i></h1>
            <nav>
                <ul class="cartList">

                </ul>
            </nav>
            <div class="vertical-line"></div>
            <span class="total"></span> <br>
            <a class="btn btn-info btn-sm mt-3" Type="submit" href="{{route('cartList')}}" style="width:90%">View Cart</a> <br>
            <a class="btn btn-success btn-sm mt-2 mb-4" Type="submit" href="#" style="width:90%">Checkout</a>
        </aside>

            @yield('content')
        </div>
        <!-- info section -->
        <section class="info_section ">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info_contact">
                            <h5>
                                <a href="" class="navbar-brand">
                                    <span>
                                        Gamers Shop
                                    </span>
                                </a>
                            </h5>
                            <p>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                Cairo, Egypt
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
                                Information
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
                                Useful Link
                            </h5>
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}">
                                        About
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('shop') }}">
                                        Products
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Cart
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cartList') }}">
                                        Checkout
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
            $().ready(function(){
                
                    $('div.alert').delay(3000);
                    $('div.alert').hide(2000);
            });
        </script>
        <script>
            $('.cartLink').on('click', function(event) {
                event.preventDefault()
                $.ajax({
                    method: 'GET',
                    url: '/cartSide/' ,
                    cache: false,
                    data: {
                    },
                    success: function(data) {
                        $('.cartList').children().remove();
                        $('aside').show();
                        const products = JSON.parse(data);
                        console.log(products);
                        var lis = $('.cartList li').length;
                        var len = products.length;
                        console.log(products[0].id)
                        for (var i = 0; i <= len; i++) {
                            var li = $("<li></li>");
                            li.append(' <img src=" {{ asset("upload/products/ ' + products[i].image + ' ") }} " width="50px" class="imamamg"  /> ');
                            li.append('<span style="padding-left : 10%"> ' + products[i].title + '</sapn>');
                            if (products[0].discount) {
                                li.append('<p style="padding-left : 4% ; border-bottom: 1px solid #eee; width:90%"> ' + products[i].amount + 'X' +  products[i].discount + ' EGB   = <span class="productPrice"> '  +  products[i].amount *  products[i].discount  + ' EGB </span> </p>');
                            }
                            else{
                                li.append('<p style="padding-left : 4% ; border-bottom: 1px solid #eee;width:90%"> ' + products[i].amount + 'X' +  products[i].price + ' EGB   = <span class="productPrice"> '  +  products[i].amount *  products[i].price  + ' EGB </span> </p>');
                            }
                            li.append('<a  class="btn btn-danger remove btn-sm" style="float : right ; margin-right :20px ; margin-top :-55px" data-cartproduct="' + products[i].id + ' "> <i class="fa fa-close"></i> </a>');
                            $(".cartList").append(li);
                            var sum = 0;
                            $('.productPrice').each(function(){
                                sum += parseFloat($(this).text());
                            });
                            if (sum) {
                                $('.total').text('subtotal    :   ' + sum + '      EGB');
                            }
                        }
                    },
                })
            });

            $(document).on('click', '.remove', function(e) {
            e.preventDefault()
            var li = $(this).parent().remove();
            productId = e.target.dataset['cartproduct'];
            counter = $('.cart-counter').text();
            count = Number(counter);
            console.log(productId)
            $.ajax({
                method: 'GET',
                url: '/remove-cart/' + productId,
                cache: false,
                data: {
                    cart_id: productId ,
                },
                success: function(data) {
                    $('#DangerAlert').show();
                    $('#DangerAlert').delay(5000).show().fadeOut('slow');
                    $('aside').show();
                    $('.cart-counter').text(count - 1);
                    const products = JSON.parse(data);
                    console.log(products);
                    for (var i = 0; i <= products.length; i++) {
                        var li = $("<li></li>");
                        li.append('<img src="{{ asset("upload/products/ ' + products[i].image + ' ") }}" width="50px" />');
                        li.append('<span style="padding-left : 10%"> ' + products[i].title + '</sapn>');
                        if (products[0].discount) {
                            li.append('<p style="padding-left : 4% ; border-bottom: 1px solid #eee;"> ' + products[i].amount + 'X' +  products[i].discount + ' EGB   = <span class="productPrice mb-1"> '  +  products[i].amount *  products[i].discount  + ' EGB </span> </p>');
                        }
                        else{
                            li.append('<p style="padding-left : 4% ; border-bottom: 1px solid #eee;"> ' + products[i].amount + 'X' +  products[i].price + ' EGB   = <span class="productPrice mb-1"> '  +  products[i].amount *  products[i].price  + ' EGB </span> </p>');
                        }
                        li.append('<a class="btn btn-danger remove btn-sm" style="float : right ; margin-right :20px" data-productid="' + products[i].product_id + ' "> <i class="fa fa-close remove"></i> </a>');
                        var sum = 0;
                        $('.productPrice').each(function(){
                            sum += parseFloat($(this).text());
                        });
                        if (sum) {
                            $('.total').text('subtotal    :   ' + sum + '      EGB');
                        }
                        $(".cartList").append(li);
                    }
                },
            })
        });

        $('#close').on('click', function(event) {
            $('aside').show().fadeOut('slow'); 
        });
        </script>
</body>

</html>
