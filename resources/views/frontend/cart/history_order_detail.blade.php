@extends('frontend.layouts.design')
@section('judul')
    Paradisestore | History Orders Details
@endsection
@section('css')
<style>
    .copyright{
        position: absolute;
        bottom: 0;
    }
    #cart_items{
        padding-top: 150px;
    }
    .breadcrumb>li{
        display: inline-block;
    }
    .breadcrumbs .breadcrumb{
        background: transparent;
        padding-left: 0;
    }
    .breadcrumb{
        padding: 8px 15px;
        margin-bottom: 20px;
        list-style: none;
        background-color: #f5f5f5;
        border-radius: 4px
    }
    .breadcrumbs .breadcrumb li a {
        background: #0e8ce4;
        color: #FFFFFF;
        padding: 3px 7px;
        margin-right: 10px;
    }
    .breadcrumbs .breadcrumb li a:after {
        content: "";
        height: auto;
        width: auto;
        border-width: 8px;
        border-style: solid;
        border-color: transparent transparent transparent #0e8ce4;
        position: absolute;
        top: 11px;
        left: 48px;
    }
    @media only screen and (max-width: 600px){
        .copyright{
            display: none;
        }
        #cart_items {
            padding-top: 60px;
        }
        #do_action {
            padding-bottom: 60px;
        }
    }
    table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }
        .gambar{
            width: 7%;
        }
        .nama-product{
            width: 50%;
        }
        .qty{
            width: 5%;
        }
        .total{
            text-align: right;
        }
        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
                overflow: hidden;
            }

            table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
            .total-pembelian{
                display: none;
            }
        }
</style>
@endsection



@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{url('history-order')}}">Orders</a></li>
              <li class="active">Order Detail</li>
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
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading" align="center">
            <h4 class="mb-3">Detail Pembelian</h4>
            <table>
                <thead>
                  <tr>
                    <th scope="col" class="gambar">Gambar</th>
                    <th scope="col"  class="nama-product">Nama Product</th>
                    <th scope="col" class="qty">Qty</th>
                    <th scope="col">Harga Product (/item)</th>
                    <th scope="col" class="total">Total Harga</th>
                  </tr>
                </thead>
                    <tbody>
                        <?php $total_amount = 0; ?>
                        @foreach ($orderDetails as $orderdetail)
                             <tr>
                                <td data-label="Gambar"><img src=" {{ asset ('/images/backend_images/products/large/'.$orderdetail->images) }} " alt="{{$orderdetail->product_name}}" width="50px"></td>
                                <td data-label="Nama Product">{{ $orderdetail->product_name }}</td>
                                <td data-label="Qty">{{ $orderdetail->qty }}</td>
                                <td data-label="Harga (/Item)">Rp {{ number_format($orderdetail->product_price) }}</td>
                                <td data-label="Total Harga" class="text-right">Rp {{ number_format($orderdetail->product_price*$orderdetail->qty) }} </td>
                            </tr>
                        <?php $total_amount = $total_amount + ($orderdetail->product_price*$orderdetail->qty); ?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td class="total-pembelian" style="border:none;"></td>
                        <td class="total-pembelian" style="border:none;"></td>
                        <td class="total-pembelian" style="border:none;"></td>
                        <td class="total-pembelian">Total Pembelian</td>
                        <td data-label="Total Pembelian" class="text-right">Rp {{ number_format($total_amount) }}  </td>
                        <tr>
                            <td class="total-pembelian" style="border:none;"></td>
                            <td class="total-pembelian" style="border:none;"></td>
                            <td class="total-pembelian" style="border:none;"></td>
                            <td class="total-pembelian">Diskon</td>
                            @if (empty($order->nilai_coupon))
                                <td data-label="Diskon" class="text-right">Rp 0</td>
                            @else
                                <td data-label="Diskon" class="text-right">Rp {{ number_format($order->nilai_coupon) }}</td>
                            @endif

                        </tr>
                        <tr>
                            <td class="total-pembelian" style="border:none;"></td>
                            <td class="total-pembelian" style="border:none;"></td>
                            <td class="total-pembelian" style="border:none;"></td>
                            <td class="total-pembelian">Ongkir</td>
                            <td data-label="Ongkir" class="text-right">Rp {{ number_format($order->ongkir) }} </td>
                        </tr>
                        <tr>
                            <td class="total-pembelian" style="border:none;"></td>
                            <td class="total-pembelian" style="border:none;"></td>
                            <td class="total-pembelian" style="border:none;"></td>
                            <td class="total-pembelian">Total Pembayaran</td>
                            @if (empty($order->nilai_coupon))
                                <td data-label="Total Pembayaran" class="text-right">Rp {{ number_format($total_amount+$order->ongkir) }} </td>
                            @else
                                <td data-label="Total Pembayaran" class="text-right">Rp {{ number_format(($total_amount-$order->nilai_coupon)+ $order->ongkir) }}</td>
                            @endif

                        </tr>
                    </tfoot>
              </table>
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
