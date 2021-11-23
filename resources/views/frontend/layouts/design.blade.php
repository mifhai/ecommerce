<!DOCTYPE html>
<html lang="id">
<head>
<title>@yield('judul')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/frontend_css/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset ('plugin/plugin_frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset ('plugin/plugin_frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('plugin/plugin_frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('plugin/plugin_frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('plugin/plugin_frontend/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/frontend_css/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/frontend_css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('plugin/plugin_frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/frontend_css/shop_responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/frontend_css/easyzoom.css') }}" />
<link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Spartan' rel='stylesheet'>
<style>
    body{
        font-family: 'Spartan';
    }
    .masuk{
        border: 1px solid;
        padding: 5px 10px 5px 10px;
        border-radius: 10px;
        margin-left: 10px;
        color: #0e8ce4;
    }
    .masuk:hover{
        background: #0e8ce4;
        color: white;
    }
    .masuk a:hover{
        color: white;
    }
    .category-dropdown{
        padding-left: 25px;
        margin-top: 65%;
    }
    .dropdown-menu.show{
        margin-top: 15px;
    }
    .category-1{
        margin-top: 25%;
        border-right: 1px solid grey;
        padding-right: 20px;
    }
    .dropdown-item:hover{
        background: #7ad8fb;
    }
    .dropdown-item .fas{
        float: right;
        margin-top: 4px;
    }
    .dropdown-item{
        padding: 20px 20px 20px 20px;
    }
    .dropdown-menu{
        min-width: 15rem;
    }
    .wishlist_cart .cart{
        margin-right: 25px;
    }
    .wishlist_cart .margin{
        margin-right: 30px;
    }
    .quality{
        float: right;
    }
    .footer-area-widget ul li{
        margin: 10px 0 10px 0;
    }
    .footer-area-widget ul li a{
        color: black;
    }
    .footer-area-widget{
        font-size: 12px;
    }
    .pembayaran div{
        background: white;
        padding: 12px 9px 12px 9px;
        display: inline;

    }
    .footer p{
        font-size: 10px;
    }
    .footer-area-widget p{
        color: black;
        font-weight: bold;
    }
    .header_main{
        position: fixed;
        width: 100%;
        background: white;
        top: 0;
        -webkit-box-shadow: 0px 5px 6px -3px rgba(238,238,238,1);
        -moz-box-shadow: 0px 5px 6px -3px rgba(238,238,238,1);
        box-shadow: 0px 5px 6px -3px rgba(238,238,238,1);
    }
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (max-width: 600px) {
        .hidden_media{
            display: none;
        }
        .logo{
            position: relative;
            right: 98px;
            top: -14px !important;
        }
        .logo a img{
            width: 50%;
            margin-bottom: 17px;
            margin-left: 15px;
        }
        .logo_container{
            z-index: 1;
            position: absolute;
        }
        .logo-pds{
            border-bottom: 1px solid rgba(0,0,0,0.12);
            height: 50px;
            background: radial-gradient(circle, rgba(225,248,249,1) 0%, rgba(238,242,251,1) 100%);
            border-radius: 5px;
        }
        .dropdown-nav-media{
            position: absolute;
            bottom: 10px;
            left: 25px;
            font-size: 20px;
            z-index: 2;
        }
        .dropdown-nav-media .dropdown-menu{
            transform: translate3d(-26px, 24px, 0px) !important;
            height: 600px;
        }
        .cart_mobile{
            position: absolute;
            font-size: 9px;
            right: 5px;
            bottom: -13px;
        }
        .wishlist_cart .cart{
            margin-right: 22px;
        }
        .dropdown-item{
            padding: 10px 20px 10px 20px !important;
            border-bottom: 1px solid rgba(0,0,0,0.12);
            font-size: 12px;
        }
        .navbar-bottom{
            position: fixed;
            bottom: 0;
            z-index: 5;
            width: 100%;
            background: #063040;
            padding: 0.5rem 0rem;
            z-index: 4;
        }
        .navbar-bottom .navbar-brand{
            margin: 0;
            padding: 0px 35px 0px 30px;
        }
        .header_search_input{
            padding: 0;
            width: -webkit-fill-available;
        }
        .header_search_input::placeholder{
            font-size: 10px !important;
        }
        .navbar-bottom .fas{
            color: white;
        }
        .cart_count_mobile{
            background: #0e8ce4;
            color: white;
            padding: 0px 5px 0px 5px;
            position: absolute;
            border-radius: 100%;
            right: 115px;
            bottom: 25px;
            font-size: 12px;
        }
        .cart_count_mobile span{
            font-size: 10px;
        }
    }
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
        .logo a img{
            width: 100%;
        }
        .show_media{
            display: none;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        .logo a img{
            width: 100%;
        }
        .show_media{
            display: none;
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .logo a img{
            width: 100%;
        }
        .show_media{
            display: none;
        }
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .logo a img{
            width: 100%;
        }
        .show_media{
            display: none;
        }
    }

    </style>


@yield('css')
</head>
<body>

@include('frontend.layouts.header')

@yield('content')

@include('frontend.layouts.footer')

<script src="{{ asset ('js/frontend_js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset ('css/frontend_css/bootstrap4/popper.js') }}"></script>
<script src="{{ asset ('css/frontend_css/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/slick-1.8.0/slick.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/easing/easing.js') }}"></script>
<script src="{{ asset ('js/frontend_js/custom.js') }}"></script>
<script src="{{ asset ('js/frontend_js/shop_custom.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset ('plugin/plugin_frontend/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset ('js/frontend_js/jquery.validate.js') }}"></script>
<script src="{{ asset ('js/frontend_js/easyzoom.js') }}"></script>
<script src="{{ asset ('js/frontend_js/autoNumeric.js') }}"></script>
@yield('script')


</body>

</html>
