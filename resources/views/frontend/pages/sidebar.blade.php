<style>
    .shop_sidebar span{
        font-size: 24px;
        font-weight: 500;
    }
    .product_diskon{
        text-decoration: line-through;
        font-size: 10px;
        color: red;
        position: absolute;
        right: 35%;
    }
    .product_price{
        margin-top: 10px
    }
    @media only screen and (max-width: 600px) {
        .header_search_input::placeholder{
            font-size: 10px !important;
        }
        .header_search_input{
            padding: 0;
            width: -webkit-fill-available;
        }
        .shop{
            padding: 0;
        }
        .filter-media{
            background: #eff6fa;
            width: 100%;
            padding: 10px 60px 10px 60px;
            margin-top: 30px;
            height: 46px;
        }
        .filter-media .filter{
            font-size: 16px;
        }
        .shop_content{
            margin-top: 20px;
        }
        .category-mobile{
            width: 48%;
            float: left;
            margin-right: 6px;
            position: relative;
            left: 2px;
            margin-bottom: 6px;
            height: 240px;
        }
        .shop_bar{
            border: none;
        }
        .card-body .card-text{
            height: 40px;
            overflow: hidden;
        }
        .category-mobile img{
            width: 80%;
            margin: auto;
        }
        .category-mobile .price{
            margin: 0;
            font-size: 16px;
            color: #007bff;
            font-weight: 500;
            margin-top: 10px;
        }
        .category-mobile .diskon{
            margin: 0;
            font-size: 10px;
            text-decoration: line-through;
            color: red;
            position: absolute;
            bottom: 30px;
            right: 47px;
        }
        .category-mobile .btn{
            width: 100%;
            padding: 0;
            font-size: 12px;
            z-index: 1;
            margin-top: 10px;
            background: linear-gradient(0deg, rgba(11,241,230,1) 0%, rgba(45,137,253,1) 100%);
            color: black;
        }
        .category-mobile .card-body{
            padding: 0 10px 10px 10px;
        }
        .slider_product{
            padding-top: 53px;
        }
        .brand-img img{
            position: absolute;
            right: 25px;
            bottom: 30%;
        }
        .processor img{
            position: absolute;
            right: 25px;
            top: 55%;
        }
        .storage img{
            position: absolute;
            right: 25px;
            top: 55%;
        }
        .layar img{
            position: absolute;
            right: 25px;
            top: 65%;
        }
        .cat img{
            position: absolute;
            right: 25px;
            top: 50%;
        }

    }
        /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
        .show_media{
            display: none;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        .show_media{
            display: none;
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .show_media{
            display: none;
        }
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .show_media{
            display: none;
        }
    }
</style>

<div class="col-lg-3 hidden_media">
    <!-- Shop Sidebar -->
    <div class="shop_sidebar">

        <span>Filter By :</span>

        <div class="sidebar_section mt-3">
            <div class="sidebar_title">Brands</div>
            <ul class="brands_list">
                @foreach ($productsBrand as $brand)
                    @if($brand->status=="1")
                        <li class="brand"><a href="{{ $brand->brand() }}"> {{ $brand->brand_name }} </a></li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="sidebar_section mt-3">
            <div class="sidebar_title mb-3">Processor</div>
            <ul class="colors_list">
                @foreach ($processors as $processor)
                    <li class="brand"><a href=" {{ $processor->processors() }} " style="color:rgba(0,0,0,0.5)"> {{ $processor->name }} </a></li>
                @endforeach
            </ul>
        </div>

        <div class="sidebar_section mt-3">
            <div class="sidebar_title mb-3">Storage</div>
            <ul class="colors_list">
                @foreach ($disks as $disk)
                    <li class="brand"><a href=" {{ $disk->storage() }} " style="color:rgba(0,0,0,0.5)"> {{ $disk->name }} </a></li>
                @endforeach
            </ul>
        </div>

        <div class="sidebar_section mt-3">
            <div class="sidebar_title mb-3">Ukuran Layar</div>
            <ul class="colors_list">
                @foreach ($layars as $layar)
                    <li class="brand"><a href=" {{ $layar->layars() }} " style="color:rgba(0,0,0,0.5)"> {{ $layar->name }} </a></li>
                @endforeach
            </ul>
        </div>

        <div class="sidebar_section mt-3">
            <div class="sidebar_title mb-3">Categories</div>
            <ul>
                @foreach ($categories as $item)
                    @if($item->status=="1")
                        <li class="brand"><a href="{{ $item->categories() }}" style="color:rgba(0,0,0,0.5)"> {{ $item->name }} </a></li>
                    @endif
                @endforeach
            </ul>
        </div>

    </div>
</div>

<!-- Modal Category-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <span>Filter By :</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="sidebar_section brand-img" style="border-top: 1px solid #e5e5e5; padding-top:10px; margin-top: 10px;">
                    <img src=" {{ asset('images/brand.jpg') }} " alt="brandlaptop">
                    <div class="sidebar_title">Brands</div>
                    <ul class="brands_list">
                        @foreach ($productsBrand as $brand)
                            @if($brand->status=="1")
                                <li class="brand"><a href="{{ $brand->brand() }}"> {{ $brand->brand_name }} </a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar_section processor mt-3">
                    <div class="sidebar_title mb-3">Processor</div>
                    <img src=" {{ asset('images/processor.jpg') }} " alt="processorlaptop">
                    <ul class="colors_list">
                        @foreach ($processors as $processor)
                            <li class="brand"><a href=" {{ $processor->processors() }} " style="color:rgba(0,0,0,0.5)"> {{ $processor->name }} </a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar_section storage mt-3">
                    <div class="sidebar_title mb-3">Storage</div>
                    <img src=" {{ asset('images/storage.png') }} " alt="storagelaptop">
                    <ul class="colors_list">
                        @foreach ($disks as $disk)
                            <li class="brand"><a href=" {{ $disk->storage() }} " style="color:rgba(0,0,0,0.5)"> {{ $disk->name }} </a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar_section layar mt-3">
                    <div class="sidebar_title mb-3">Ukuran Layar</div>
                    <img src=" {{ asset('images/layar.jpg') }} " alt="storagelaptop">
                    <ul class="colors_list">
                        @foreach ($layars as $layar)
                            <li class="brand"><a href=" {{ $layar->layars() }} " style="color:rgba(0,0,0,0.5)"> {{ $layar->name }} </a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar_section cat mt-3">
                    <div class="sidebar_title mb-3">Categories</div>
                    <img src=" {{ asset('images/cat.jpg') }} " alt="storagelaptop">
                    <ul>
                        @foreach ($categories as $item)
                            @if($item->status=="1")
                                <li class="brand"><a href="{{ $item->categories() }}" style="color:rgba(0,0,0,0.5)"> {{ $item->name }} </a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
