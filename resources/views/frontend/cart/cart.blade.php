
@extends('frontend.layouts.design')
@section('judul')
    Cart-Order
@endsection
@section('css')
    <link href="{{ asset ('css/frontend_css/shop/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/animate.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/main.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/responsive.css') }}" rel="stylesheet">
    @include('frontend.cart._style')
@endsection



@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{url('/')}}">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
            @if( Session::has('flash_message_error'))
            <div class="alert alert-error alert-block" style="background-color:#f2dfd0;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <center><strong>{!! session('flash_message_error') !!}</strong></center>
            </div>
            @endif
            @if( Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <center><strong>{!! session('flash_message_success') !!}</strong></center>
                </div>
            @endif
        <div class="table-responsive cart_info hidden_media">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td class="delete"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_amount = 0; ?>
                    @foreach ($userCart as $carts)
                    <tr>
                        <td class="cart_product" style="width: 174px">
                            <img style="width:100px" src="{{ asset ('/images/backend_images/products/large/'.$carts->image) }}" alt="{{ $carts->product_name }}">
                        </td>
                        <td class="cart_description" style="width: 46% !important;">
                            <p>{{ $carts->product_name }}</p>
                        </td>
                        <td class="cart_price">
                            <p>Rp {{ number_format($carts->price) }} </p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                                @if ($carts->qty>1)
                                    <a class="cart_quantity_down" href="{{ url('cart/update_product/'.$carts->id.'/-1')}}"><i class="fas fa-minus-square fa-2x" style="color:#f0ad4e;"></i></a>
                                @endif
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $carts->qty }}" autocomplete="off" size="2" readonly>
                                <a class="cart_quantity_up" href="{{ url('cart/update_product/'.$carts->id.'/1')}}"><i class="fas fa-plus-square fa-2x" style="color:#47a447;"></i></a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">Rp {{ number_format($carts->price*$carts->qty) }} </p>
                        </td>
                        <td class="cart_delete" style="position: relative; top:-5px; right:10px;">
                            <a class="cart_quantity_delete btn btn-danger" href="{{ url('/cart/delete_product/'.$carts->id)}}"><i class="fas fa-trash-alt" style="color:red;"></i></a>
                        </td>
                    </tr>
                    <?php $total_amount = $total_amount + ($carts->price*$carts->qty); ?>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        {{-- <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div> --}}
        <div class="row">
            {{-- cart mobile --}}
            <div class="col-sm-6 show_media mb-5">
                @foreach ($userCart as $carts)
                <div class="media mb-3 mt-3">
                    <img src="{{ asset ('/images/backend_images/products/large/'.$carts->image) }}" class="mr-3" alt="{{ $carts->product_name }}" width="30%">
                    <div class="media-body">
                      <p class="mt-0">{{ $carts->product_name }}</p>
                      Rp {{ number_format($carts->price) }}
                    </div>

                    <div class="cart_delete_product">
                        <a class="cart_quantity_delete btn btn-danger" href="{{ url('/cart/delete_product/'.$carts->id)}}"><i class="fas fa-trash-alt" style="color:red;"></i></a>
                    </div>

                    <div class="cart_quantity_button">
                        @if ($carts->qty>1)
                            <a class="cart_quantity_down" href="{{ url('cart/update_product/'.$carts->id.'/-1')}}"> <i class="fas fa-minus-circle" style="color:#0e8ce4;"></i> </a>
                        @endif
                        <input class="cart_quantity_input" type="text" name="quantity" value="{{ $carts->qty }}" autocomplete="off" size="2">
                        <a class="cart_quantity_up" href="{{ url('cart/update_product/'.$carts->id.'/1')}}"> <i class="fas fa-plus-circle" style="color:#0e8ce4;"></i> </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-sm-6 area-coupon">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <label>Use Coupon Code</label>
                            <form action="{{ url('cart_apply_coupon')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="coupon_code" class="form-control col-md-4">
                                <input type="submit" value="Apply" class="btn btn-success submit_coupon">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        @if(!empty(Session::get('CoupunAmount')))
                            <li class="form-control" >Sub Total <span>Rp {{number_format($total_amount)}}</span></li>
                            <li class="form-control" style="background-color:#7CFC00;" >Coupon Diskon <span>Rp {{number_format(Session::get('CoupunAmount'))}}</span></li>
                            <li class="form-control">Grand Total <span>Rp {{number_format($total_amount - Session::get('CoupunAmount'))}}</span></li>
                        @else
                            <li class="form-control">Grand Total <span>Rp {{number_format($total_amount)}}</span></li>

                        @endif
                    </ul>
                        <a class="btn btn-primary update" href=" {{ url('/') }} "><i class="fas fa-arrow-circle-left"></i> &nbsp; Lanjutkan Belanja</a>
                        <a class="btn btn-primary check_out" href=" {{ url('checkout')}} ">Check Out &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection

@section('script')
    <script src="{{ asset ('js/frontend_js/shop/jquery.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/main.js') }}"></script>
@endsection

