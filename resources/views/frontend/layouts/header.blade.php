	<!-- Header -->
    <style>
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
        padding-left: 45px;
        margin-top: 65%;
    }
    .dropdown-menu.show{
        margin-top: 15px;
    }
    .category-1{
        margin-top: 25%;
        padding-right: 20px;
    }
    .category-1 .dropdown-item{
        font-size: 12px;
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
        padding: 0 !important;
    }
    .logo_container .logo{
        width: fit-content;
        margin: auto;
    }
    .header_search_button img{
        width: 30%;
    }
    .custom_dropdown{
        position: absolute;
        right: 30px;
        top: 27px;
        margin-right: 30px;
    }
    .header_main .dropdown{
        top: 12px;
    }
    .header_main .dropdown1{
        top: 15px;
    }
    .cart_count{
        right: -10px;
        width: 16px;
        height: 16px;
    }
    .cart_count span{
        line-height: 16px;
        font-size: 10px;
    }
    @media only screen and (max-width: 991px){
        .custom_dropdown {
            text-align: left;
            display: none;
        }
    }
    @media only screen and (max-width: 660px){
        .sosial-media{
            display: none !important;
        }
        .wishlist_cart{
            font-size: 9px !important;
        }
    }
    .sosial-media{
        display: flex;
        position: absolute;
        left: 30px;
        margin-left: 30px;
        top: 32px;
    }
    .sosial-media li{
        margin: 5px;
        font-size: 16px;
    }
    .wishlist_cart{
        font-size: 10px;
    }
    .custom_dropdown::before{
        left: -51px;
        top: 45%;
    }
    .custom_dropdown a{
        position: absolute;
        top: 14px;
    }
    .modal-menu{
        position: absolute;
        width: 50%;
        left: 133%;
        top: 11px;
    }
    .user-name{
        position: relative;
        top: -10px;
        font-size: 16px;
    }
    </style>

	<header class="header">
        <!-- Header Main -->
        <div class="header_main">
            <ul class="sosial-media">
                <li><a href="https://www.facebook.com/ParadiseStoreid/"><i class="fab fa-facebook-square"></i></a></li>
                <li><a href="https://twitter.com/ParadiseStoreid"><i class="fab fa-twitter-square" style="color:#42a5f5;"></i></a></li>
                <li><a href="https://www.instagram.com/paradisestore.id/"><i class="fab fa-instagram" style="color:#ec407a;"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCux9foDr1wvog1ljq0RTOUw"><i class="fab fa-youtube" style="color:red;"></i></a></li>
            </ul>
            <div class="container">

                <div class="row">

                    <div class="dropdown show_media dropdown-nav-media">
                        <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;">
                            <i class="fas fa-bars"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href=" {{ route('promotion-frontend') }} ">Promo</a>
                          <a class="dropdown-item" href=" {{ url('/product') }} ">Product</a>
                          <a class="dropdown-item" href="#">Konfirmasi Pembayaran</a>
                          <a class="dropdown-item" href="#">Hubungi Kami</a>
                          @if(Auth::check())
                          <a class="dropdown-item" href="{{ url('account')}}">Hi, {{ Auth::user()->name }}</a>
                          <a class="dropdown-item" href="{{ url('user_logout')}}">Logout</a>
                          @else
                          <a class="dropdown-item" href="{{ url ('userLogin') }}">Masuk</a>
                          @endif
                        </div>
                    </div>
                    <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="logo_container">
                            <div class="logo">
                                <a href=" {{ url('/')}} "><img src=" {{ asset('images/logopds.png')}} " alt="paradisestore.id"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Logo -->
                    <div class="col-lg-3 col-sm-3 order-1 logo-pds">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action=" {{ route('search') }} " class="header_search_form clearfix">
                                        <input type="text" name="search" required="required" class="header_search_input" placeholder=" Cari Produk . . . . ">
                                        <button type="submit" class="header_search_button trans_300" value="Submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Wishlist -->
                    <div class="col-lg-3 col-9 order-lg-3 order-2 text-lg-left text-right cart_mobile">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">

                            <!-- Wishlist -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <a href="{{ url('history-order')}}"><i class="far fa-heart fa-2x" style="color:black;"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Wishlist -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <a href="{{ url('cart-order')}}"><i class="far fa-bell fa-2x" style="color:black;"></i></a>
                                        <div class="cart_count"><span> 0 </span></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cart -->
                            @if(empty(Auth::check()))
                            <div class="cart margin hidden_media">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <a href="{{ url('/cart-order')}}"><i class="fa fa-cart-plus fa-2x" style="color:black;"></i></a>
                                        <div class="cart_count"><span> 0 </span></div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="cart margin hidden_media">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <a href="{{ url('/cart-order')}}"><i class="fas fa-cart-plus fa-2x" style="color:black;"></i></a>
                                        <div class="cart_count"><span> {{count($cart)}} </span></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- Cart -->
                            @if(empty(Auth::check('isVerified', false)))
                            <div class="cart hidden_media" >
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <div class="masuk"><a href="{{ url ('userLogin') }}">Masuk</a></div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="dropdown hidden_media">
                                <a class="dropdown-toggle user-name" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin: 5px;">
                                    Hi, {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('account')}}">Account</a>
                                    <a class="dropdown-item" href="{{ url('user_logout')}}">Logout</a>
                                </div>
                            </div>
                            @endif



                        </div>
                    </div>

                </div>
            </div>
            {{-- <div class="custom_dropdown">
                <div class="dropdown dropdown1">
                    <a class="category-dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href=" {{ route('promotion-frontend') }} " style="background: #FFFF00;"><i class="fas fa-bullhorn" style="color:black;float:left;"></i>&nbsp;&nbsp;&nbsp; <span>Promo</span></a>
                        @foreach ($category as $cat)
                        <a class="dropdown-item" href=" {{ $cat->categories() }} "><i class="fas fa-{{$cat->icon}}" style="color:black;float:left;"></i>&nbsp;&nbsp;&nbsp; <span>{{ $cat->name }}</span></a>
                        @endforeach

                    </div>
                </div>
            </div> --}}
            <div class="custom_dropdown">
                <a href="" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </header>
    </div>
   <!-- Modal -->
   <div class="modal fade" id="exampleModal2" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content modal-menu">
        <div class="modal-body">
        <ul>
            <li><a class="dropdown-item" href=" {{ route('promotion-frontend') }} " style="background: #FFFF00;"><i class="fas fa-bullhorn" style="color:black;float:left;"></i>&nbsp;&nbsp;&nbsp; <span>Promo</span></a></li>
            @foreach ($category as $cat)
            <li><a class="dropdown-item" href=" {{ $cat->categories() }} "><i class="fas fa-{{$cat->icon}}" style="color:black;float:left;"></i>&nbsp;&nbsp;&nbsp; <span>{{ $cat->name }}</span></a></li>
            @endforeach
        </ul>
        </div>
    </div>
    </div>
</div>
