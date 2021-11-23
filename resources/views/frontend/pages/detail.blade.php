@extends('frontend.layouts.design')
@section('judul')
	Product {{ $detailProduct->product_name }}
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset ('css/frontend_css/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/frontend_css/product_responsive.css') }}">
<style>
    .cart_icon img{
        width: 70%;
    }
    .name_product{
        overflow: hidden;
    }
</style>
@endsection

@section('content')
<style type="text/css">
.product_name{
	font-size: 18px;
    color: black;
    position: absolute;
    bottom: 5px;
    left: 25%;
    border-left: 1px solid rgba(0,0,0,0.12);
}

.processor{
	padding: 9px;
	border-radius: 5px;
	border: 1px solid #ced4da;
}

.layar{
	padding: 9px;
	border-radius: 5px;
	border: 1px solid #ced4da;
}
.qty{
	padding: 9px;
	border-radius: 5px;
	border: 1px solid #ced4da;
}
@media (max-width: 991px){
	.processor{
		width:max-content;
	}
}
.product_text_ready{
    border-bottom: 1px solid rgba(0,0,0,0.12);
    border-top: 1px solid rgba(0,0,0,0.12);
    padding: 15px 0 15px 0;
}
.cart_button{
    width: 100%;
}
.product_text_color p{
    margin-bottom: 0;
}
.share a{
    float: right;
    margin-left: 20px;
}
.share{
    border-top: 1px solid rgba(0,0,0,0.12);
    border-bottom: 1px solid rgba(0,0,0,0.12);
    position: relative;
    left: -13px;
    width: 103%;
    padding: 10px 0 10px 0;
}
.name_product{
    font-size: 26px;
    color: black;
    font-weight: bold;
    margin-bottom: 10px;
}
.fa-star{
    color: #ffc107;
}
.diskon{
    text-decoration: line-through;
    margin-top: 1rem;
    font-size: 20px;
    margin-bottom: 0;
}
.product_price p{
    margin-top: 0;
    font-size: 45px;
    color: red;
    margin-bottom: 0;
}
.product_price{
    margin-top: 0;
    width: 100%;
}
.product_name_sku{
    position: absolute;
    top: 25px;
    font-size: 13px;
    right: 97px;
    padding: 0 10px 0 48px;
    border-left: 1px solid rgba(0,0,0,0.12);
}
.reviews{
    margin-bottom: 100px;
}
@media only screen and (max-width: 600px) {
    .share{
        left: 0;
        width: 100%;
    }
    .product_name_sku{
        top: 12px;
        right: 30px;
    }
    .name_product{
        margin-top: 10px;
    }
    .cart_button{
        position: absolute;
        bottom: -20px;
        left: 0;
    }
    .reviews{
        margin: 0;
    }
    .tab-pane p{
        text-align: justify;
    }
    .persen{
        top: -90%;
    }
    .single_product{
        padding-top: 55px;
    }
    .viewed_title{
        font-size: 20px;
    }
}
.persen{
    border: 1px solid rgba(0,0,0,0.12);
    width: fit-content;
    padding: 3%;
    border-radius: 100%;
    color: red;
    border-color: red;
    font-size: 20px;
    position: relative;
    bottom: 74%;
    z-index: 1;
    right: 40%;
}
.diskon-product{
    text-decoration: line-through;
    font-size: 10px;
}
</style>
<div class="super_container">

    <!-- Single Product -->
@if (!empty($productpromotion))
    @if (!empty($promotion))
        <div class="single_product">
            <div class="container">
                    @if( Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="background-color:#f2dfd0;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <center><strong>{!! session('flash_message_error') !!}</strong></center>
                    </div>
                    @endif
                <div class="row">

                    <!-- Images -->
                    <div class="col-lg-2 order-lg-1 order-2">
                        <ul class="image_list thumbnails">

                            <li>
                                <a href="{{ asset ('/images/backend_images/products/large/'.$productpromotion->images) }}" data-standard="{{ asset ('/images/backend_images/products/large/'.$productpromotion->images) }}">
                                    <img src="{{ asset ('/images/backend_images/products/large/'.$productpromotion->images) }}" alt="" />
                                </a>
                            </li>

                            @foreach ($productsImage as $image)
                            <li>
                                <a href="{{ asset ('/images/backend_images/products/small/'.$image->image) }}" data-standard="{{ asset ('/images/backend_images/products/small/'.$image->image) }}">
                                    <img src="{{ asset ('/images/backend_images/products/small/'.$image->image) }}" alt="" />
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    <!-- Selected Image -->
                    <div class="col-lg-5 order-lg-2 order-1">
                        <div class="image_selected">
                            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                <a href="{{ asset ('/images/backend_images/products/large/'.$productpromotion->images) }}">
                                    <img src="{{ asset ('/images/backend_images/products/large/'.$productpromotion->images) }}" alt="" style="width:100%;">
                                </a>
                            </div>
                            <p class="persen"> {{ $productpromotion->persen }}% </p>
                        </div>
                        <div class="share mt-3">Share :
                            <a href=""><i class="fab fa-facebook"></i></a>
                            <a href=""><i class="fab fa-whatsapp" style="color: #00e676;"></i></a>
                            <a href=""><i class="fab fa-twitter-square" style="color: #03a9f4"></i></a>
                            <a href=""><i class="fab fa-google-plus-square" style="color: #ef5350"></i></a>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-lg-5 order-3">
                        <form action=" {{ url('add_cart')}} " name="addcart" id="addcart" method="POST">
                        {{ csrf_field() }}
                        <div class="product_description">
                            {{-- <input type="hidden" name="product_id" value=" {{$productpromotion->product_id}} ">
                            <input type="hidden" name="product_name" value=" {{$productpromotion->product_name}} ">
                            <input type="hidden" name="price" id="price" value=" {{$productpromotion->diskon}} "> --}}
                            <div class="name_product">{{ $productpromotion->product_name }}</div>

                            <div class="product_category">
                                <img src="{{ asset ('/images/backend_images/brands/large/'.$brands->image) }}" width="20%" alt="" />
                                <div class="product_name_sku">
                                    <div class="product_sku">SKU: {{ $detailProduct->sku }} </div>
                                    <div><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                            </div>
                            <div class="product_text_color mt-3 mb-3">{!! $detailProduct->short_desc !!}</div>
                            <div class="product_text_ready">
                                <b>Stok Product &nbsp;:&nbsp;</b>
                                <span  id="availability">
                                    @if ($total_stok>0)
                                    Ready Stok &nbsp;<i class="fas fa-check" style="color:blue"></i>
                                    @else
                                    Stok Kosong &nbsp;<i class="fas fa-exclamation-circle" style="color:red"></i>
                                    @endif
                                </span>
                            </div>

                            <div class="price">
                                    <p class="diskon">Rp {{number_format($productpromotion->price)}}</p>
                                <div class="product_price text-center" style="color: red;">
                                    <p> Rp {{number_format($productpromotion->diskon)}}</p>
                                </div>
                            </div>



                            <div class="button_container">
                                @if($total_stok>0)
                                    <button type="submit" class="button cart_button" id="btnBeli">BELI</button>
                                @else
                                    <button type="button" class="cart_button btn-danger" id="stokKosong" style="border-radius:10px;">Stok Kosong</button>
                                @endif
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="single_product">
            <div class="container">
                    @if( Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="background-color:#f2dfd0;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <center><strong>{!! session('flash_message_error') !!}</strong></center>
                    </div>
                    @endif
                <div class="row">

                    <!-- Images -->
                    <div class="col-lg-2 order-lg-1 order-2">
                        <ul class="image_list thumbnails">

                            <li>
                                <a href="{{ asset ('/images/backend_images/products/large/'.$detailProduct->image) }}" data-standard="{{ asset ('/images/backend_images/products/large/'.$detailProduct->image) }}">
                                    <img src="{{ asset ('/images/backend_images/products/large/'.$detailProduct->image) }}" alt="" />
                                </a>
                            </li>

                            @foreach ($productsImage as $image)
                            <li>
                                <a href="{{ asset ('/images/backend_images/products/small/'.$image->image) }}" data-standard="{{ asset ('/images/backend_images/products/small/'.$image->image) }}">
                                    <img src="{{ asset ('/images/backend_images/products/small/'.$image->image) }}" alt="" />
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    <!-- Selected Image -->
                    <div class="col-lg-5 order-lg-2 order-1">
                        <div class="image_selected">
                            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                <a href="{{ asset ('/images/backend_images/products/large/'.$detailProduct->image) }}">
                                    <img src="{{ asset ('/images/backend_images/products/large/'.$detailProduct->image) }}" alt="" style="width:100%;">
                                </a>
                            </div>
                        </div>
                        <div class="share mt-3">Share :
                            <a href=""><i class="fab fa-facebook"></i></a>
                            <a href=""><i class="fab fa-whatsapp" style="color: #00e676;"></i></a>
                            <a href=""><i class="fab fa-twitter-square" style="color: #03a9f4"></i></a>
                            <a href=""><i class="fab fa-google-plus-square" style="color: #ef5350"></i></a>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-lg-5 order-3">
                        <form action=" {{ url('add_cart')}} " name="addcart" id="addcart" method="POST">
                        {{ csrf_field() }}
                        <div class="product_description">
                            {{-- <input type="hidden" name="product_id" value=" {{$detailProduct->id}} ">
                            <input type="hidden" name="product_name" value=" {{$detailProduct->name_product}} ">
                            <input type="hidden" name="price" id="price" value=" {{$detailProduct->price}} "> --}}
                            <div class="name_product">{{ $detailProduct->name_product }}</div>

                            <div class="product_category">
                                <img src="{{ asset ('/images/backend_images/brands/large/'.$brands->image) }}" width="20%" alt="" />
                                <div class="product_name_sku">
                                    <div class="product_sku">SKU: {{ $detailProduct->sku }} </div>
                                    <div><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                            </div>
                            <div class="product_text_color mt-3 mb-3">{!! $detailProduct->short_desc !!}</div>
                            <div class="product_text_ready">
                                <b>Stok Product &nbsp;:&nbsp;</b>
                                <span  id="availability">
                                    @if ($total_stok>0)
                                    Ready Stok &nbsp;<i class="fas fa-check" style="color:blue"></i>
                                    @else
                                    Stok Kosong &nbsp;<i class="fas fa-exclamation-circle" style="color:red"></i>
                                    @endif
                                </span>
                            </div>
                            @if (empty($detailProduct->diskon))
                            <div class="price">
                                <div class="product_price text-center" style="color: red;">
                                    <p> Rp {{number_format($detailProduct->price)}}</p>
                                </div>
                            </div>
                            @else
                            <div class="price">
                                    <p class="diskon">Rp {{number_format($detailProduct->price)}}</p>
                                <div class="product_price text-center" style="color: red;">
                                    <p> Rp {{number_format($detailProduct->diskon)}}</p>
                                </div>
                            </div>
                            @endif


                            <div class="button_container">
                                @if($total_stok>0)
                                    <button type="submit" class="button cart_button" id="btnBeli">BELI</button>
                                @else
                                    <button type="button" class="cart_button btn-danger" id="stokKosong" style="border-radius:10px;">Stok Kosong</button>
                                @endif
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    <div class="single_product">
        <div class="container">
                @if( Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color:#f2dfd0;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <center><strong>{!! session('flash_message_error') !!}</strong></center>
                </div>
                @endif
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list thumbnails">

                        <li>
                            <a href="{{ asset ('/images/backend_images/products/large/'.$detailProduct->image) }}" data-standard="{{ asset ('/images/backend_images/products/large/'.$detailProduct->image) }}">
                                <img src="{{ asset ('/images/backend_images/products/large/'.$detailProduct->image) }}" alt="" />
                            </a>
                        </li>

                        @foreach ($productsImage as $image)
                        <li>
                            <a href="{{ asset ('/images/backend_images/products/small/'.$image->image) }}" data-standard="{{ asset ('/images/backend_images/products/small/'.$image->image) }}">
                                <img src="{{ asset ('/images/backend_images/products/small/'.$image->image) }}" alt="" />
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected">
                        <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                            <a href="{{ asset ('/images/backend_images/products/large/'.$detailProduct->image) }}">
                                <img src="{{ asset ('/images/backend_images/products/large/'.$detailProduct->image) }}" alt="" style="width:100%;">
                            </a>
                        </div>
                    </div>
                    <div class="share mt-3">Share :
                        <a href=""><i class="fab fa-facebook"></i></a>
                        <a href=""><i class="fab fa-whatsapp" style="color: #00e676;"></i></a>
                        <a href=""><i class="fab fa-twitter-square" style="color: #03a9f4"></i></a>
                        <a href=""><i class="fab fa-google-plus-square" style="color: #ef5350"></i></a>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <form action=" {{ url('add_cart')}} " name="addcart" id="addcart" method="POST">
                    {{ csrf_field() }}
                    <div class="product_description">
                        <input type="hidden" name="product_id" value=" {{$detailProduct->id}} ">
                        <input type="hidden" name="product_name" value=" {{$detailProduct->name_product}} ">
                        @if (empty($detailProduct->diskon))
                            <input type="hidden" name="price" id="price" value=" {{$detailProduct->price}} ">
                        @else
                            <input type="hidden" name="price" id="price" value=" {{$detailProduct->diskon}} ">
                        @endif
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="berat" value=" {{$detailProduct->berat}} ">
                        <input type="hidden" name="images" value=" {{$detailProduct->image}} ">


                        <div class="name_product">{{ $detailProduct->name_product }}</div>

                        <div class="product_category">
                            <img src="{{ asset ('/images/backend_images/brands/large/'.$brands->image) }}" width="20%" alt="" />
                            <div class="product_name_sku">
                                <div class="product_sku">SKU: {{ $detailProduct->sku }} </div>
                                <div><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            </div>
                        </div>
                        <div class="product_text_color mt-3 mb-3">{!! $detailProduct->short_desc !!}</div>
                        <div class="product_text_ready">
                            <b>Stok Product &nbsp;:&nbsp;</b>
                            <span  id="availability">
                                @if ($total_stok>0)
                                Ready Stok &nbsp;<i class="fas fa-check" style="color:blue"></i>
                                @else
                                Stok Kosong &nbsp;<i class="fas fa-exclamation-circle" style="color:red"></i>
                                @endif
                            </span>
                        </div>
                        @if (empty($detailProduct->diskon))
                        <div class="price">
                            <div class="product_price text-center" style="color: red;">
                                <p> Rp {{number_format($detailProduct->price)}}</p>
                            </div>
                        </div>
                        @else
                        <div class="price">
                                <p class="diskon">Rp {{number_format($detailProduct->price)}}</p>
                            <div class="product_price text-center" style="color: red;">
                                <p> Rp {{number_format($detailProduct->diskon)}}</p>
                            </div>
                        </div>
                        @endif


                        <div class="button_container text-center">
                            @if($total_stok>0)
                                <button type="submit" class="button cart_button" id="btnBeli">BELI</button>
                                {{-- <a href=" {{ url('/add-to-cart/'.$detailProduct->id) }} " class="button cart_button"> BELI </a> --}}
                            @else
                                <button type="button" class="cart_button btn-danger" id="stokKosong" style="border-radius:10px;">Stok Kosong</button>
                            @endif
                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endif




    <div class="reviews" style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col">

                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px;">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Description</a>
                        </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> {!! $detailProduct->description !!} </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">  {!! $detailProduct->short_desc !!}</div>
                        </div>

                </div>
            </div>
        </div>
    </div>

	<!-- Reviews -->

    {{-- <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="reviews_title_container">
                        <h3 class="reviews_title">Latest Reviews</h3>
                        <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                    </div>

                    <div class="reviews_slider_container">

                        <!-- Reviews Slider -->
                        <div class="owl-carousel owl-theme reviews_slider">

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('images/frontend_images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('images/frontend_images/review_2.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('images/frontend_images/review_3.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('images/frontend_images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('images/frontend_images/review_2.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('images/frontend_images/review_3.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="reviews_dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

	<!-- Recently Viewed -->

    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Product Yang Disarankan</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">

                                @foreach ($productsCode as $item)
                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">

                                    @if(!empty($item->image))
                                        <div class="viewed_image">
                                            <a href=" {{ $item->product()}} "><img src="{{ asset ('/images/backend_images/products/large/'.$item->image) }}" alt=""></a>
                                        </div>
                                    @endif

                                        <div class="viewed_content text-center">
                                            <div class="viewed_name"><a href="#"> {{ $item->name_product }} </a></div>

                                            @if (empty($item->diskon))
                                                <div class="viewed_price" >Rp {{ number_format($item->price) }} </span></div>
                                            @else
                                                <div class="viewed_price" >Rp {{ number_format($item->diskon) }} </span></div>
                                                <div class="diskon-product" >Rp {{ number_format($item->price) }} </span></div>
                                            @endif

                                        </div>
                                        {{-- <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul> --}}
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset ('js/frontend_js/product_custom.js') }}"></script>
<script>
		// Instantiate EasyZoom instances
		var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);

			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});

		// Setup toggles example
		var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

		$('.toggle').on('click', function() {
			var $this = $(this);

			if ($this.data("active") === true) {
				$this.text("Switch on").data("active", false);
				api2.teardown();
			} else {
				$this.text("Switch off").data("active", true);
				api2._init();
			}
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#getPrice').autoNumeric('init');
		});
	</script>

@endsection
