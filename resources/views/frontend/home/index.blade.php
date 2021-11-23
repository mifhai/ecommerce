@extends('frontend.layouts.design')
@section('judul')
    Paradisestore
@endsection
@section('content')
@section('css')
    @include('frontend.home.style_home')
@endsection

    <!-- Banner -->

    <div id="carouselExampleIndicators" class="carousel slide slide-banner  " data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner banner-top">
            @foreach ($topbanners as $key => $banners)
                @if ($banners->status == true)
                <div class="carousel-item @if($key==0) active @endif">
                    <img src=" {{ asset('/images/backend_images/banners/'.$banners->image) }} " class="carousel-images" alt=" {{ $banners->image }} ">
                </div>
                @else
                <div class="carousel-item @if($key==0) active @endif">
                    <img src="http://placehold.it/1920x480" alt="">
                </div>
                @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner banner-top">
            @foreach ($centerbanners as $key => $banners)
                @if ($banners->status == true)
                <div class="carousel-item @if($key==0) active @endif">
                    <img src=" {{ asset('/images/backend_images/banners/center/'.$banners->image) }} " class="carousel-images" alt=" {{ $banners->image }} ">
                </div>
                @else
                <div class="carousel-item @if($key==0) active @endif">
                    <img src="http://placehold.it/1920x240" alt="">
                </div>
                @endif
            @endforeach
        </div>
    </div>

<div class="super_container">

	<!-- Characteristics -->

	{{-- <div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('images/frontend_images/char_1.png') }}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Pengiriman Cepat</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('images/frontend_images/char_2.png') }}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Garansi Resmi</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('images/frontend_images/char_3.png') }}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Dijamin ORI</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('images/frontend_images/char_4.png') }}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Murah Meriah</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div> --}}

    {{-- Category mobile --}}
    <div class="container show_media category-media" style="padding:0; margin: 10px 0 10px 0">
        <section id="demos" style="background: white;padding-top:10px;">
            <div class="row" style="margin: 5px 10px 5px 10px; display: block;">
                <div class="large-12 columns">
                    <div class="owl-carousel">
                        @foreach ($category as $cat)
                        <div class="item text-center item-category">
                            <a href="{{ $cat->categories() }}">
                                <div class="popular_category_image"><i class="fas fa-{{$cat->icon}} fa-2x" style="color:black;"></i></div>
                                <div class="popular_category_text" style="color:black;"> {{ $cat->name }} </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

	{{-- card media product --}}
    <div class="container show_media">
        <div class="row card_media text-center">
            {{-- show media product --}}
            @foreach ($productphones as $productphone)
                <div class="card card_media_product">
                    <a href="{{ $productphone->product() }}"><img src=" {{ asset('images/backend_images/products/large/'.$productphone->image) }} " class="card-img-top" alt=" {{ $productphone->name_product }} "></a>
                    <div class="card-body">
                    {{-- <h5 class="card-title">Card title</h5> --}}
                    <a href="{{ $productphone->product() }}"><p class="card-text">{{ $productphone->name_product }}</p></a>

                    @php
                        $promo = $productpromotion->where('product_id', $productphone->id)->first();
                        $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                    @endphp

                    @if (!empty($promo))
                        @if (!empty($timepromo))
                            <span class="price_media">Rp {{ number_format($promo->diskon) }}</span><br>
                            <span class="price_media price_diskon">Rp {{ number_format($promo->price) }}</span>
                        @elseif(empty($productphone->diskon))
                            <span class="price_media">Rp {{ number_format($productphone->price) }}</span>
                        @elseif(!empty($productphone->diskon))
                            <span class="price_media">Rp {{ number_format($productphone->diskon) }}</span><br>
                            <span class="price_media price_diskon">Rp {{ number_format($productphone->price) }}</span>
                        @endif
                    @else
                        @if (empty($productphone->diskon))
                            <span class="price_media">Rp {{ number_format($productphone->price) }}</span>
                        @else
                            <span class="price_media">Rp {{ number_format($productphone->diskon) }}</span><br>
                            <span class="price_media price_diskon">Rp {{ number_format($productphone->price) }}</span>
                        @endif
                    @endif


                    <a href=" {{ $productphone->product() }} " class="btn btn-primary">BELI</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Deals of the week -->
	<div class="deals_featured mt-2">
		<div class="container deals-container">
			<div class="row">

				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

					<!-- Deals -->
					<div class="deals">
						<div class="deals_title">Promo Saat Ini</div>
						<div class="deals_slider_container">
                            {{-- <img src="{{ asset('images/promo.png') }}" alt="promo.png"> --}}
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
                                <!-- Deals Item -->
                                @foreach ($productrecomended as $diskon)
                                @php
                                    $cat = $category->where('name', $diskon->category_product)->first();
                                @endphp
                                    <div class="owl-item deals_item">
                                        <div class="deals_image">
                                            <a href=" {{ $diskon->product() }} "><img src="{{ asset('images/backend_images/products/large/'.$diskon->image) }}" alt=""></a>
                                        </div>
                                        <div class="deals_content">
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_category">
                                                    <a href=" {{ $cat->categories() }} "> {{ $cat->name }} </a>
                                                </div>
                                            </div>
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <a href="{{ $diskon->product() }}"><div class="deals_item_name"> {{ $diskon->name_product }} </div></a>
                                            </div>
                                            @php
                                                $promo = $productpromotion->where('product_id', $diskon->id)->first();
                                                $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                                            @endphp

                                            @if (!empty($promo))
                                                @if (!empty($timepromo))
                                                    <div class="deals_info_line d-flex flex-row justify-content-start mt-2">
                                                        <div class="deals_item_price_a">Rp {{ number_format($promo->price) }} </div>
                                                    </div>
                                                    <div class="deals_info_line d-flex flex-row justify-content-start sale-product mt-2 mb-2">
                                                        <div class="deals_item_category">Rp {{ number_format($promo->diskon) }}</div>
                                                    </div>
                                                @else
                                                    <div class="deals_info_line d-flex flex-row justify-content-start mt-2">
                                                        <div class="deals_item_price_a">Rp {{ number_format($diskon->price) }} </div>
                                                    </div>
                                                    <div class="deals_info_line d-flex flex-row justify-content-start sale-product mt-2 mb-2">
                                                        <div class="deals_item_category">Rp {{ number_format($diskon->diskon) }}</div>
                                                    </div>
                                                @endif
                                            @else
                                                @if (empty($diskon->diskon))
                                                    <div class="deals_info_line d-flex flex-row justify-content-start sale-product mt-2 mb-2">
                                                        <div class="deals_item_category">Rp {{ number_format($diskon->price) }}</div>
                                                    </div>
                                                @else
                                                    <div class="deals_info_line d-flex flex-row justify-content-start mt-2">
                                                        <div class="deals_item_price_a">Rp {{ number_format($diskon->price) }} </div>
                                                    </div>
                                                    <div class="deals_info_line d-flex flex-row justify-content-start sale-product mt-2 mb-2">
                                                        <div class="deals_item_category">Rp {{ number_format($diskon->diskon) }}</div>
                                                    </div>
                                                @endif
                                            @endif

                                            <div>
                                                <div class="available_line d-flex flex-row justify-content-start">
                                                    <div class="available_title">Tersedia: <span> {{ $diskon->stok }} </span></div>
                                                    {{-- <div class="sold_title ml-auto">Terjual: <span>28</span></div> --}}
                                                </div>
                                                <div class="available_bar"><span style="width:17%"></span></div>
                                            </div>
                                            {{-- <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                                <div class="deals_timer_title_container">
                                                    <div class="deals_timer_title">Hurry Up</div>
                                                    <div class="deals_timer_subtitle">Offer ends in:</div>
                                                </div>
                                                <div class="deals_timer_content ml-auto">
                                                    <div class="deals_timer_box clearfix" data-target-time="">
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                            <span>hours</span>
                                                        </div>
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                            <span>mins</span>
                                                        </div>
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                            <span>secs</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                @endforeach


							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>

					<!-- Featured -->
					<div class="featured hidden_media">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Terbaru</li>
									<li>Rekomendasi</li>
									<li>Laptop</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">

									@foreach($productsAll as $product)
									@if($product->status=="1")
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">

											@if(!empty($product->image))
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
												<a href=" {{ $product->product() }} "><img src="{{ asset ('/images/backend_images/products/large/'.$product->image) }}" alt="{{ $product->name_product }}"></a>
                                                </div>
                                            @else
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
												<a href=" {{ $product->product() }} "><img src="http://placehold.it/300x300" alt="{{ $product->name_product }}"></a>
                                                </div>
											@endif
											<div class="product_content">
                                                <a href="{{ $product->product() }}">
                                                    <div class="product_name">{{ $product->name_product }}</div>
                                                </a>

                                                @php
                                                    $promo = $productpromotion->where('product_id', $product->id)->first();
                                                    $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                                                @endphp

                                                @if (!empty($promo))
                                                    @if (!empty($timepromo))
                                                        <div class="product_price">Rp {{ number_format ($promo->diskon)}}</div>
                                                        <div class="discount-product">Rp {{ number_format ($promo->price)}}</div>
                                                    @elseif(empty($product->diskon))
                                                        <div class="product_price">Rp {{ number_format ($product->price)}}</div>
                                                    @elseif(!empty($product->diskon))
                                                        <div class="product_price">Rp {{ number_format ($product->diskon)}}</div>
                                                        <div class="discount-product">Rp {{ number_format ($product->price)}}</div>
                                                    @endif
                                                @else
                                                    @if (empty($product->diskon))
                                                        <div class="product_price">Rp {{ number_format ($product->price)}}</div>
                                                    @else
                                                        <div class="product_price">Rp {{ number_format ($product->diskon)}}</div>
                                                        <div class="discount-product">Rp {{ number_format ($product->price)}}</div>
                                                    @endif
                                                @endif

                                                <div class="product_extras">
													<a href="{{ $product->product() }}" class="product_cart_button"> BELI</a>
												</div>
											</div>
											{{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
											{{-- <ul class="product_marks">
												<li class="product_mark product_discount">-25%</li>
												<li class="product_mark product_new">new</li>
											</ul> --}}
										</div>
									</div>
									@endif
									@endforeach

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach($productsCode as $code)
										<div class="featured_slider_item">
											<div class="border_active"></div>
											<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">

											@if(!empty($code->image))
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<a href=" {{ $code->product() }} "><img src="{{ asset ('/images/backend_images/products/large/'.$code->image) }}" alt="{{ $code->name_product }}"></a>
                                                </div>
                                            @else
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <a href=" {{ $code->product() }} "><img src="http://placehold.it/300x300" alt="{{ $code->name_product }}"></a>
                                                </div>
											@endif

												<div class="product_content">

                                                    <a href="{{ $code->product() }}">
                                                        <div class="product_name">{{ $code->name_product }}</div>
                                                    </a>

                                                    @php
                                                        $promo = $productpromotion->where('product_id', $code->id)->first();
                                                        $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                                                    @endphp

                                                    @if (!empty($promo))
                                                        @if (!empty($timepromo))
                                                            <div class="product_price">Rp {{ number_format ($promo->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($promo->price)}}</div>
                                                        @elseif(empty($code->diskon))
                                                            <div class="product_price">Rp {{ number_format ($code->price)}}</div>
                                                        @elseif(!empty($code->diskon))
                                                            <div class="product_price">Rp {{ number_format ($code->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($code->price)}}</div>
                                                        @endif
                                                    @else
                                                        @if (empty($code->diskon))
                                                            <div class="product_price">Rp {{ number_format ($code->price)}}</div>
                                                        @else
                                                            <div class="product_price">Rp {{ number_format ($code->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($code->price)}}</div>
                                                        @endif
                                                    @endif

													<div class="product_extras">
														<a href="{{ $code->product() }}" class="product_cart_button">BELI</a>
													</div>
												</div>
												{{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
												{{-- <ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul> --}}
											</div>
										</div>
									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->

									@foreach($productsCat as $cat)
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">

											@if(!empty($cat->image))
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<a href=" {{ $cat->product() }} "><img src="{{ asset ('/images/backend_images/products/large/'.$cat->image) }}" alt="{{ $cat->name_product }}"></a>
                                                </div>
                                            @else
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<a href=" {{ $cat->product() }} "><img src="http://placehold.it/300x300" alt="{{ $cat->name_product }}"></a>
												</div>
											@endif

											<div class="product_content">

                                                <a href="{{ $cat->product() }}">
                                                    <div class="product_name">{{ $cat->name_product }}</div>
                                                </a>

                                                @php
                                                    $promo = $productpromotion->where('product_id', $cat->id)->first();
                                                    $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                                                @endphp

                                                @if (!empty($promo))
                                                    @if (!empty($timepromo))
                                                        <div class="product_price">Rp {{ number_format ($promo->diskon)}}</div>
                                                        <div class="discount-product">Rp {{ number_format ($promo->price)}}</div>
                                                    @elseif(empty($cat->diskon))
                                                        <div class="product_price">Rp {{ number_format ($cat->price)}}</div>
                                                    @elseif(!empty($cat->diskon))
                                                        <div class="product_price">Rp {{ number_format ($cat->diskon)}}</div>
                                                        <div class="discount-product">Rp {{ number_format ($cat->price)}}</div>
                                                    @endif
                                                @else
                                                    @if (empty($cat->diskon))
                                                        <div class="product_price">Rp {{ number_format ($cat->price)}}</div>
                                                    @else
                                                        <div class="product_price">Rp {{ number_format ($cat->diskon)}}</div>
                                                        <div class="discount-product">Rp {{ number_format ($cat->price)}}</div>
                                                    @endif
                                                @endif

												<div class="product_extras">

													<a href="{{ $cat->product() }}" class="product_cart_button">BELI</a>
												</div>
											</div>
											{{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
											{{-- <ul class="product_marks">
												<li class="product_mark product_discount">-25%</li>
												<li class="product_mark product_new">new</li>
											</ul> --}}
										</div>
									</div>
									@endforeach

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories hidden_media">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Categories</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
						<div class="popular_categories_link"><a href="#">full category</a></div>
					</div>
				</div>

				<!-- Popular Categories Slider -->

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">
                            <!-- Popular Categories Item -->
                            @foreach ($category as $categories)
                                <div class="owl-item">
                                    <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <a href="{{ $categories->categories() }}">
                                            <div class="popular_category_image"><i class="fas fa-{{$categories->icon}} fa-5x" style="color:black;"></i></div>
                                            <div class="popular_category_text" style="color:black;"> {{ $categories->name }} </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

    {{-- category gaming zone media --}}
    <div class="container show_media mt-3" style="background: white;height: 230px; padding-top:10px;">
        <span>Gaming Zone</span>
        @foreach ($categorygaming as $catgaming)
            <a href=" {{ $catgaming->categories() }} "><span style="float:right;">Lihat Semua <i class="far fa-arrow-alt-circle-right"></i></span></a>
        @endforeach
        <div class="row mt-2">
            @foreach ($productgaming as $gaming)
            @php
                $cat = $category->where('name', $gaming->category_product)->first();
            @endphp
                <div class="card img-gaming" style="width:31%; margin-left:6px;">
                    @if (empty($gaming->image))
                        <img src="http://placehold.it/100X100" class="card-img-top" alt=" {{ $gaming->name_product }} ">
                    @else
                        <a href="{{ $gaming->product() }}"><img src="{{ asset('images/backend_images/products/large/'.$gaming->image) }}" class="card-img-top" alt=" {{ $gaming->name_product }} "></a>
                    @endif
                    <div class="card-body body-gaming text-center">
                        <a href="{{ $gaming->product() }}"><p class="name-gaming"> {{ $gaming->name_product }} </p></a>

                        @php
                            $promo = $productpromotion->where('product_id', $gaming->id)->first();
                            $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                        @endphp

                        @if (!empty($promo))
                            @if (!empty($timepromo))
                                <span class="price_media">Rp {{ number_format($promo->diskon) }}</span><br>
                                <span class="price_media price_diskon">Rp {{ number_format($promo->price) }}</span>
                            @elseif(empty($gaming->diskon))
                                <span class="price_media">Rp {{ number_format($gaming->price) }}</span>
                            @elseif(!empty($gaming->diskon))
                                <span class="price_media">Rp {{ number_format($gaming->diskon) }}</span><br>
                                <span class="price_media price_diskon">Rp {{ number_format($gaming->price) }}</span>
                            @endif
                        @else
                            @if (empty($gaming->diskon))
                                <span class="price_media">Rp {{ number_format($gaming->price) }}</span>
                            @else
                                <span class="price_media">Rp {{ number_format($gaming->diskon) }}</span><br>
                                <span class="price_media price_diskon">Rp {{ number_format($gaming->price) }}</span>
                            @endif
                        @endif

                        <a href=" {{ $gaming->product() }} " class="btn btn-gaming btn-primary">BELI</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Banner -->
    @if (count($bottombanners) > 0)
    <div class="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner banner-top">
                @foreach ($bottombanners as $key => $banners)
                    @if ($banners->status == true)
                    <div class="carousel-item @if($key==0) active @endif">
                        <img src=" {{ asset('/images/backend_images/banners/'.$banners->image) }} " class="carousel-images" alt=" {{ $banners->image }} ">
                    </div>
                    @else
                    <div class="carousel-item @if($key==0) active @endif">
                        <img src="http://placehold.it/1920x480" alt="">
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- category all in one media --}}
    <div class="container show_media" style="background: white;height: 230px; padding-top:10px;">
        <span>All In One</span>
        @foreach ($categoryallinone as $catallin)
            <a href=" {{ $catallin->categories() }} "><span style="float:right;">Lihat Semua <i class="far fa-arrow-alt-circle-right"></i></span></a>
        @endforeach
        {{-- @foreach ($productallinone as $catall)
            <a href=" {{ $catall->categories() }} "><span style="float:right;">Lihat Semua <i class="far fa-arrow-alt-circle-right"></i></span></a>
        @endforeach --}}
        <div class="row mt-2">
            @foreach ($productallinone as $catall)
                <div class="card img-allinone" style="width:31%; margin-left:6px;">
                    @if (empty($catall->image))
                        <img src="http://placehold.it/100X100" class="card-img-top" alt=" {{ $catall->name_product }} ">
                    @else
                        <a href="{{ $catall->product() }}"><img src="{{ asset('images/backend_images/products/large/'.$catall->image) }}" class="card-img-top" alt=" {{ $catall->name_product }} "></a>
                    @endif
                    <div class="card-body body-gaming text-center">
                        <a href="{{ $catall->product() }}"><p class="name-gaming"> {{ $catall->name_product }} </p></a>

                        @php
                            $promo = $productpromotion->where('product_id', $catall->id)->first();
                            $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                        @endphp

                        @if (!empty($promo))
                            @if (!empty($timepromo))
                                <span class="price_media">Rp {{ number_format($promo->diskon) }}</span><br>
                                <span class="price_media price_diskon">Rp {{ number_format($promo->price) }}</span>
                            @elseif(empty($catall->diskon))
                                <span class="price_media">Rp {{ number_format($catall->price) }}</span>
                            @elseif(!empty($catall->diskon))
                                <span class="price_media">Rp {{ number_format($catall->diskon) }}</span><br>
                                <span class="price_media price_diskon">Rp {{ number_format($catall->price) }}</span>
                            @endif
                        @else
                            @if (empty($catall->diskon))
                                <span class="price_media">Rp {{ number_format($catall->price) }}</span>
                            @else
                                <span class="price_media">Rp {{ number_format($catall->diskon) }}</span><br>
                                <span class="price_media price_diskon">Rp {{ number_format($catall->price) }}</span>
                            @endif
                        @endif

                        <a href="{{ $catall->product() }}" class="btn btn-gaming btn-primary">BELI</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

	<!-- Hot New Arrivals -->
	<div class="new_arrivals hidden_media">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Produk Pilihan Terbaik</div>
							<ul class="clearfix">
								<li class="active">Gaming Zone</li>
								<li>All In One</li>
								<li>Laptops</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">
										@foreach ($gamingzone as $item)

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">

											@if(!empty($item->image))
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<a href=" {{ $item->product() }} "><img src="{{ asset ('/images/backend_images/products/large/'.$item->image) }}" alt="{{ $item->name_product }}"></a>
                                                </div>
                                            @else
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<a href=" {{ $item->product() }} "><img src="http://placehold.it/300x300" alt="{{ $item->name_product }}"></a>
												</div>
											@endif

												<div class="product_content">

                                                    <a href="{{ $item->product() }}"><div class="product_name new-arrivals"> {{ $item->name_product }} </div></a>

                                                    @php
                                                        $promo = $productpromotion->where('product_id', $item->id)->first();
                                                        $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                                                    @endphp

                                                    @if (!empty($promo))
                                                        @if (!empty($timepromo))
                                                            <div class="product_price">Rp {{ number_format ($promo->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($promo->price)}}</div>
                                                        @elseif(empty($item->diskon))
                                                            <div class="product_price">Rp {{ number_format ($item->price)}}</div>
                                                        @elseif(!empty($item->diskon))
                                                            <div class="product_price">Rp {{ number_format ($item->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($item->price)}}</div>
                                                        @endif
                                                    @else
                                                        @if (empty($item->diskon))
                                                            <div class="product_price">Rp {{ number_format ($item->price)}}</div>
                                                        @else
                                                            <div class="product_price">Rp {{ number_format ($item->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($item->price)}}</div>
                                                        @endif
                                                    @endif

													<div class="product_extras">
														<a href="{{ $item->product() }}" class="product_cart_button">BELI</a>
													</div>
												</div>
												{{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
												{{-- <ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul> --}}
											</div>
										</div>

										@endforeach

									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">
										@foreach ($allinone as $allin)

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">

											@if(!empty($allin->image))
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<a href=" {{ $allin->product() }} "><img src="{{ asset ('/images/backend_images/products/large/'.$allin->image) }}" alt="{{ $allin->name_product }}"></a>
                                                </div>
                                            @else
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<a href=" {{ $allin->product() }} "><img src="http://placehold.it/300x300" alt="{{ $allin->name_product }}"></a>
												</div>
											@endif

												<div class="product_content">

                                                    <a href="{{ $allin->product() }}"><div class="product_name new-arrivals"> {{ $allin->name_product }} </div></a>

                                                    @php
                                                        $promo = $productpromotion->where('product_id', $allin->id)->first();
                                                        $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                                                    @endphp

                                                    @if (!empty($promo))
                                                        @if (!empty($timepromo))
                                                            <div class="product_price">Rp {{ number_format ($promo->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($promo->price)}}</div>
                                                        @elseif(empty($allin->diskon))
                                                            <div class="product_price">Rp {{ number_format ($allin->price)}}</div>
                                                        @elseif(!empty($allin->diskon))
                                                            <div class="product_price">Rp {{ number_format ($allin->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($allin->price)}}</div>
                                                        @endif
                                                    @else
                                                        @if (empty($allin->diskon))
                                                            <div class="product_price">Rp {{ number_format ($allin->price)}}</div>
                                                        @else
                                                            <div class="product_price">Rp {{ number_format ($allin->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($allin->price)}}</div>
                                                        @endif
                                                    @endif

													<div class="product_extras">
														<a href="{{ $allin->product() }}" class="product_cart_button">BELI</a>
													</div>
												</div>
												{{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
												{{-- <ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul> --}}
											</div>
										</div>

										@endforeach

									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">
										@foreach ($laptops as $laptop)

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">

											@if(!empty($laptop->image))
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<a href=" {{ $laptop->product() }} "><img src="{{ asset ('/images/backend_images/products/large/'.$laptop->image) }}" alt="{{ $laptop->name_product }}"></a>
                                                </div>
                                            @else
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<a href=" {{ $laptop->product() }} "><img src="http://placehold.it/300x300" alt="{{ $laptop->name_product }}"></a>
												</div>
											@endif

												<div class="product_content">

                                                    <a href="{{ $laptop->product() }}"><div class="product_name new-arrivals"> {{ $laptop->name_product }} </div></a>

                                                    @php
                                                        $promo = $productpromotion->where('product_id', $laptop->id)->first();
                                                        $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                                                    @endphp

                                                    @if (!empty($promo))
                                                        @if (!empty($timepromo))
                                                            <div class="product_price">Rp {{ number_format ($promo->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($promo->price)}}</div>
                                                        @elseif(empty($laptop->diskon))
                                                            <div class="product_price">Rp {{ number_format ($laptop->price)}}</div>
                                                        @elseif(!empty($laptop->diskon))
                                                            <div class="product_price">Rp {{ number_format ($laptop->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($laptop->price)}}</div>
                                                        @endif
                                                    @else
                                                        @if (empty($laptop->diskon))
                                                            <div class="product_price">Rp {{ number_format ($laptop->price)}}</div>
                                                        @else
                                                            <div class="product_price">Rp {{ number_format ($laptop->diskon)}}</div>
                                                            <div class="discount-product">Rp {{ number_format ($laptop->price)}}</div>
                                                        @endif
                                                    @endif


													<div class="product_extras">
														<a href=" {{ $laptop->product() }} " class="product_cart_button">BELI</a>
													</div>
												</div>
												{{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
												{{-- <ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul> --}}
											</div>
										</div>

										@endforeach

									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
    </div>

    <!-- Brands -->
    <div class="container hidden_media">
            <div class="brand">
                <span>Brands</span>
            </div>
            <div>
                <ul class="brand-inline text-center">
                    {{-- <li class="card brand-card">
                        <img src=" http://placehold.it/100x100 " class="card-img-top" alt="">
                    </li> --}}
                    @foreach ($productsBrand as $item)
                    <li class="card brand-card">
                        <a href=" {{ $item->brand() }} ">
                            <img src="{{ asset ('/images/backend_images/brands/small/'.$item->image) }}" class="card-img-top" alt=" {{ $item->brand_name }} ">
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
    </div>

    {{-- brands media --}}
    <div class="container show_media mt-3" style="padding:0;">
        <section id="demos" style="background: white; padding-top:10px; padding-bottom:10px;">
            <div class="row" style="margin: 5px 10px 5px 10px; display: block;">
                <div class="large-12 columns">
                    <div class="owl-carousel">
                        @foreach ($productsBrand as $item)
                        <div class="item text-center item-category brand-mobile">
                            <a href="{{ $item->brand() }}">
                                <img src="{{ asset ('/images/backend_images/brands/small/'.$item->image) }}" class="card-img-top" alt=" {{ $item->brand_name }} ">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- All Product mobile--}}
    <div class="container show_media mt-3">
        <div class="row mt-2" style="background: white;padding-top:10px;">
            @foreach ($productsAll as $product)
                <div class="card product-all" style="width:47%; margin-left:6px;margin-bottom: 10px;">
                    @if (empty($product->image))
                        <img src="http://placehold.it/100X100" class="card-img-top" alt=" {{ $product->name_product }} ">
                    @else
                        <a href="{{ $product->product() }}"><img src="{{ asset('images/backend_images/products/large/'.$product->image) }}" class="card-img-top" alt=" {{ $product->name_product }} "></a>
                    @endif
                    <div class="card-body body-gaming all-product text-center">
                        <a href="{{ $product->product() }}"><p class="name-product-all"> {{ $product->name_product }} </p></a>

                        @php
                            $promo = $productpromotion->where('product_id', $product->id)->first();
                            $timepromo = $promotion->whereIn('id', $promo['promotion_id'])->first();
                        @endphp

                        @if (!empty($promo))
                            @if (!empty($timepromo))
                                <span class="price_media">Rp {{ number_format($promo->diskon) }}</span><br>
                                <span class="price_media price_diskon">Rp {{ number_format($promo->price) }}</span>
                            @elseif(empty($product->diskon))
                                <span class="price_media">Rp {{ number_format($product->price) }}</span>
                            @elseif(!empty($product->diskon))
                                <span class="price_media">Rp {{ number_format($product->diskon) }}</span><br>
                                <span class="price_media price_diskon">Rp {{ number_format($product->price) }}</span>
                            @endif
                        @else
                            @if (empty($product->diskon))
                                <span class="price_media">Rp {{ number_format($product->price) }}</span>
                            @else
                                <span class="price_media">Rp {{ number_format($product->diskon) }}</span><br>
                                <span class="price_media price_diskon">Rp {{ number_format($product->price) }}</span>
                            @endif
                        @endif

                        <a href=" {{ $product->product() }} " class="btn btn-gaming btn-primary" style="padding:5px;">BELI</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

	<!-- youtube -->
    <section class="youtube1" style="margin-bottom: 5%;">
        <div class="container" style="background:white;padding-bottom: 10px;">
         <div class="brand">
            <span>Youtube</span>
         </div>
          <div id="ypt_wrapper" style="border-radius: 10px;">
             <div class="video">
              <div id="player" data-pl="UUux9foDr1wvog1ljq0RTOUw"></div>
            </div>
            <ul id="ypt_thumbs"></ul>
        </div>
        </div>
    </section>

	{{-- <div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Recently Viewed</h3>
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
											<a href=" {{ url ('/product/'.$item->id)}} "><img src="{{ asset ('/images/backend_images/products/medium/'.$item->image) }}" alt=""></a>
										</div>
									@endif

										<div class="viewed_content text-center">
											<div class="viewed_price">Rp {{ number_format ($item->price) }} </span></div>
											<div class="viewed_name"><a href="#"> {{ $item->product_name }} </a></div>
										</div>
										<ul class="item_marks">
											<li class="item_mark item_discount">-25%</li>
											<li class="item_mark item_new">new</li>
										</ul>
									</div>
								</div>
								@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
    </div> --}}

</div>

@endsection

@section('script')
<script type="text/javascript">
    /*JS FOR SCROLLING THE ROW OF THUMBNAILS*/
    $(document).ready(function () {
      $('.vid-item').each(function(index){
        $(this).on('click', function(){
          var current_index = index+1;
          $('.vid-item .thumb').removeClass('active');
          $('.vid-item:nth-child('+current_index+') .thumb').addClass('active');
        });
      });
    });

    // Load Youtube IFrame Player API code asynchronously. This boat is going nowhere without it.
    var tag = document.createElement('script'); //Add a script tag
    tag.src = "https://www.youtube.com/iframe_api"; //Set the SRC to get the API
    var firstScriptTag = document.getElementsByTagName('script')[0]; //Find the first script tag in the html
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag); //Put this script tag before the first one

    var player; //The Youtube API player
    var ypt_player = document.getElementById('player');
    var playlistID = ypt_player.getAttribute('data-pl');
    var ypt_thumbs = document.getElementById('ypt_thumbs');
    var nowPlaying = "ypt-now-playing"; //For marking the current thumb
    var nowPlayingClass = "." + nowPlaying;
    var ypt_index = 0; //Playlists begin at the first video by default

    function getPlaylistData(playlistID, video_list, page_token) { //Makes a single request to Youtube Data API
    var apiKey = 'AIzaSyC1pqHLwn1UbjBO9mWAqMN1z3gNLvfwDfk';
    var theUrl =
    'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet' +
    '&maxResults='+ 50 + //Can be anything from 1-50
    '&playlistId=' + playlistID +
    '&key=' + apiKey
    ;
    if(page_token){ theUrl +=('&pageToken=' + page_token );} //If there is page token, start there
    var xmlHttp = null;
    xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "Get", theUrl, true);
    xmlHttp.send( null );
    xmlHttp.onload = function (e) { //when the request comes back
        buildJSON(xmlHttp.responseText, video_list, playlistID); //send the data to buildJSON
    };
    }

    function buildJSON(response, list, playlistID){ //Takes the text response and adds it to any existing JSON data
    var results = JSON.parse(response); //Parse it
    if(!list){ list = []; } //If there is no list to add to, make one
    list.push.apply(list,results.items); //Add JSON data to the list
    if(results.nextPageToken){ //If the results included a page token
        getPlaylistData(playlistID, list, results.nextPageToken); //Create another data API request including the current list and page token
    } else { //If there is not a next-page token
        buildHTML(list); //Send the JSON data to buildHTML
    }
    }

    function buildHTML(data){ //Turns JSON data into HTML elements
    var list_data = ''; //A string container
    for(i = 0; i < data.length; i++){ //Do this to each item in the JSON list
        var item = data[i].snippet; //Each Youtube playlist item snippet
        if(!item.thumbnails){continue;} //private videos do no reveal thumbs, so skip them
        list_data += '<li data-ypt-index="'+ i +'"><p>' + item.title + '</p><span><img alt="'+ item.title +'" src="'+ item.thumbnails.medium.url +'"/></span></li>'; //create an element and add it to the list
    }
    ypt_thumbs.innerHTML = list_data; //After the for loop, insert that list of links into the html
    }

    function yptThumbHeight(){
    ypt_thumbs.style.height = document.getElementById('player').clientHeight + 'px'; //change the height of the thumb list
    //breaks if ypt_player.clientHeight + 'px';
    }

    function onPlayerReady(event) { //Once the player is ready...
    yptThumbHeight(); //Set the thumb containter height
    }

    getPlaylistData(playlistID);

    //Once the Youtube Iframe API is ready...
    window.onYouTubeIframeAPIReady = function() { // Creates an <iframe> (and YouTube player) after the API code downloads. must be globally available
  player = new YT.Player('player', {
    height: '360',
    width: '640',
    playerVars:
    {
      listType:'playlist',
      list: playlistID
    },
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });

  // When the player does something...
  function onPlayerStateChange(event) {

    //Let's check on what video is playing
    var currentIndex = player.getPlaylistIndex();
    var the_thumbs = ypt_thumbs.getElementsByTagName('li');
    var currentThumb = the_thumbs[currentIndex];

        if (event.data == YT.PlayerState.PLAYING) { //A video is playing

            for (var i = 0; i < the_thumbs.length; i++) { //Loop through the thumbs
                the_thumbs[i].className = ""; //Remove nowplaying from each thumb
            }

        currentThumb.className = nowPlaying; //this will also erase any other class belonging to the li
        //need to do a match looking for now playing
        }

        //if a video has finished, and the current index is the last video, and that thumb already has the nowplaying class
        if (event.data == YT.PlayerState.ENDED && currentIndex == the_thumbs.length - 1 && the_thumbs[currentIndex].className == nowPlaying){
        jQuery.event.trigger('playlistEnd'); //Trigger a global event
        }
    } //function onPlayerStateChange(event)

    //When the user changes the window size...
    window.addEventListener('resize', function(event){
        yptThumbHeight(); //change the height of the thumblist
    });

    //When the user clicks an element with a playlist index...
    jQuery(document).on('click','[data-ypt-index]:not(".ypt-now-playing")',function(e){ //click on a thumb that is not currently playing
        ypt_index = Number(jQuery(this).attr('data-ypt-index')); //Get the ypt_index of the clicked item
        if(navigator.userAgent.match(/(iPad|iPhone|iPod)/g)){ //if IOS
        player.cuePlaylist({ //cue is required for IOS 7
            listType: 'playlist',
            list: playlistID,
            index: ypt_index,
            suggestedQuality: 'hd720' //quality is required for cue to work, for now
            // https://code.google.com/p/gdata-issues/issues/detail?id=5411
        }); //player.cuePlaylist
        } else { //yay it's not IOS!
        player.playVideoAt(ypt_index); //Play the new video, does not work for IOS 7
        }
    jQuery(nowPlayingClass).removeClass(nowPlaying); //Remove "now playing" from the thumb that is no longer playing
    //When the new video starts playing, its thumb will get the now playing class
    }); //jQuery(document).on('click','#ypt_thumbs...
    };
</script>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            margin:5,
            loop:true,
            autoWidth:true,
            items:4
        });
    });
  </script>
@endsection
