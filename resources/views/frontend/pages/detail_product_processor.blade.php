@extends('frontend.layouts.design')
@section('judul')
    Product {{ $processorDetails->name }}
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/frontend_css/shop_styles.css') }}">
    @if (count($productsAllProcessor) > 2)
        <style>
            @media only screen and (max-width: 600px) {
                .copyright{
                    position: relative;
                }
            }
        </style>
    @else
        <style>
            @media only screen and (max-width: 600px) {
                .copyright{
                    position: absolute;
                    bottom: 0;
                }
            }
        </style>
    @endif
@endsection

@section('content')
<style type="text/css">
    .notfound{
        text-align: center;
        color: #856404;
        width: 50%;
        margin: auto;
        margin-top: 20px;
    }
    .cart_icon img{
        width: 70%;
    }

</style>
	    <!-- Home -->

        <div id="carouselExampleSlidesOnly" class="carousel slide slider_product" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/frontend_images/shop_background.jpg') }}" class="d-block w-100" alt="...">
            </div>
            </div>
        </div>

        <!-- Shop -->

        <div class="shop">
            <div class="container">
                <div class="row">
                    @include('frontend.pages.sidebar')

                    <div class="col-lg-9">

                        <!-- Shop Content -->

                        <div class="shop_content">
                            <div class="shop_bar clearfix">
                                <div class="shop_product_count"><span> {{ $productsAllProcessor->count() }} </span> products found</div>
                                <div class="show_media filter-media">
                                    <span style="font-size:20px;">Filter Product<a href="" data-toggle="modal" data-target="#exampleModal" style="color:black; float:right;"><i class="fas fa-th-list"></i></a></span>
                                </div>
                            </div>

                            @foreach ($productsAllProcessor as $productmobile)
                                <!-- Shop Content mobile-->
                                <div class="card show_media category-mobile text-center">
                                    @if (empty($productmobile->image))
                                        <img src="http://placehold.it/100x100" class="card-img-top" alt=" {{ $productmobile->name_product }} ">
                                    @endif
                                        <a href="{{ $productmobile->product() }}"><img src="{{ asset ('/images/backend_images/products/large/'.$productmobile->image) }}" class="card-img-top" alt=" {{ $productmobile->name_product }} "></a>
                                    <div class="card-body">
                                        <a href="{{ $productmobile->product() }}"><p class="card-text"> {{ $productmobile->name_product }} </p></a>
                                        @php
                                            $promo = $productpromotion->where('product_id', $productmobile->id)->first();
                                            $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                                        @endphp

                                        @if (!empty($promo))
                                            @if (!empty($timepromo))
                                                <div class="price">Rp {{ number_format ($promo->diskon)}}</div>
                                                <div class="diskon">Rp {{ number_format ($promo->price)}}</div>
                                            @elseif(empty($productmobile->diskon))
                                                <div class="price">Rp {{ number_format ($productmobile->price)}}</div>
                                            @elseif(!empty($productmobile->diskon))
                                                <div class="price">Rp {{ number_format ($productmobile->diskon)}}</div>
                                                <div class="diskon">Rp {{ number_format ($productmobile->price)}}</div>
                                            @endif
                                        @else
                                            @if (empty($productmobile->diskon))
                                                <div class="price">Rp {{ number_format ($productmobile->price)}}</div>
                                            @else
                                                <div class="price">Rp {{ number_format ($productmobile->diskon)}}</div>
                                                <div class="diskon">Rp {{ number_format ($productmobile->price)}}</div>
                                            @endif
                                        @endif
                                        <a href=" {{ $productmobile->product() }} " class="btn btn-primary">BELI</a>
                                    </div>
                                </div>
                            @endforeach

                            <div class="product_grid hidden_media">
                                <div class="product_grid_border"></div>

                                @if(count($productsAllProcessor) < 1)
                                <div class="alert notfound">
                                  <strong>Product Not Found...</strong>
                                </div>
                                @else

                                @foreach ($productsAllProcessor as $product)
                                    @if($product->status=="1")
                                        <!-- Product Item -->
                                        <div class="product_item is_new">
                                            <div class="product_border"></div>

                                            @if(!empty($product->image))
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href=" {{ $product->product() }} "><img src="{{ asset ('/images/backend_images/products/large/'.$product->image) }}" alt="{{ $product->name_product }}"></a>
                                                </div>
                                            @else
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href=" {{ $product->product() }} "><img src="http://placehold.it/300x300" alt=""></a>
                                                </div>
                                            @endif

                                            <div class="product_content">
                                                <a href=" {{ $product->product() }} " tabindex="0">
                                                    <div class="product_name">{{ $product->name_product }}</div>
                                                </a>

                                                @php
                                                    $promo = $productpromotion->where('product_id', $product->id)->first();
                                                    $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                                                @endphp

                                                @if (!empty($promo))
                                                    @if (!empty($timepromo))
                                                        <div class="product_price">Rp {{ number_format ($promo->diskon) }} </div>
                                                        <div class="product_diskon">Rp {{ number_format ($promo->price) }} </div>
                                                    @elseif(empty($product->diskon))
                                                        <div class="product_price">Rp {{ number_format ($product->price) }} </div>
                                                    @elseif(!empty($product->diskon))
                                                        <div class="product_price">Rp {{ number_format ($product->diskon) }} </div>
                                                        <div class="product_diskon">Rp {{ number_format ($product->price) }} </div>
                                                    @endif
                                                @else
                                                    @if (empty($product->diskon))
                                                        <div class="product_price">Rp {{ number_format ($product->price) }} </div>
                                                    @else
                                                        <div class="product_price">Rp {{ number_format ($product->diskon) }} </div>
                                                        <div class="product_diskon">Rp {{ number_format ($product->price) }} </div>
                                                    @endif
                                                @endif

                                            </div>
                                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                                            {{-- <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul> --}}
                                        </div>
                                    @else
                                        <div class="alert notfound">
                                            <strong>Product Not Found...</strong>
                                        </div>
                                    @endif
                                @endforeach
                                @endif
                            </div>

                            <!-- Shop Page Navigation -->
                            <div style="float:right; margin-top:30px" class="hidden_media">
                                {{ $productsAllProcessor->links() }}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Recently Viewed -->

        <div class="viewed hidden_media">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">Produk Yang Disarankan</h3>
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
                                                <a href=" {{ $item->product()}} "><img src="{{ asset ('/images/backend_images/products/large/'.$item->image) }}" alt="{{ $item->name_product }}"></a>
                                            </div>
                                        @endif

                                            <div class="viewed_content text-center">
                                                <div class="viewed_price" >Rp {{ number_format($item->price) }} </span></div>
                                                <div class="viewed_name"><a href="#"> {{ $item->name_product }} </a></div>
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
@endsection
