@extends('frontend.layouts.design')
@section('judul')
    Order Review
@endsection
@section('css')
    <style>
        .cart_info{
            width:65%;
        }
        .payment-options{
            margin: 0;
        }
        .cart_total{
            border-right: 1px solid;
        }
        .image{
            width:15%;
        }
        .description{
            width:30%;
        }
        .cart_description a{
            font-size:15px;
        }
        .bayar{
            position: absolute;
            top: 40px;
            right: 30px;
        }
        .wishlist_cart .cart {
            margin: 0;
            margin-right: 25px;
        }
        .form-one1{
            width: 100%;
        }
        .form-one1 p{
            font-weight: bold;

        }
        .ringkasan{
            font-size: 20px;
        }
        input[type=checkbox] {
            display: none;
        }
        /*pure cosmetics:*/
        img {
            width: fit-content;
            height: fit-content;
        }

        p img{
            box-shadow: 0px 0px 5px 0px rgba(214,211,214,1);
            border-radius: 10px;
        }
        .card{
            float: left;
            margin-right: 10px;
        }
        #pembayaran .midtrans{
            border: 1px solid deepskyblue;
            padding: 5px 0px 0px 0px;
            height: 62px;
            margin-left: 10px;
            border-radius: 5px;
        }
        #bank_pengiriman{
            display: none;
        }
        .midtrans_pembayaran{
            display: none;
        }
        .bank .card{
            width: 30%;
            margin-bottom: 10px;
        }
        .pembayaran-container{
            padding-top: 50px;
        }
        .breadcrumbs .breadcrumb{
            margin: 0;
        }
        .copyright{
            position: absolute;
            bottom: 0;
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
        .row-1{
            margin-top: 20px;
        }
        .form-check-label{
            padding: 0;
        }
        .form-check{
            width: fit-content;
            float: left;
        }
        #paymentForm{
            height: 310px;
        }
        .submit_pembayaran{
            position: absolute;
            top: 135px;
            width: 100%;
        }
        .submit_pembayaran .btn{
            width: 100%;
        }
        .form-check-input{
            position: absolute;
            left: 24px;
            z-index: 1;
        }
        .copyright{
            display: none;
        }
        #submit{
            width: 100%;
            position: absolute;
            top: -150px;
        }
        .header_main{
        display: none;
        }
        .navbar{
            min-height: 80px;
            background-color: #e3f2fd;
        }
        @media only screen and (max-width: 600px){
            .navbar-bottom {
                position: fixed;
                bottom: 0;
                z-index: 5;
                width: 100%;
                background: #063040;
                padding: 0.5rem 0rem;
                z-index: 4;
                min-height: 0;
            }
            .pembayaran-container{
                padding-top: 0;
            }
            .ringkasan-pembelanjaan{
                position: absolute;
                box-shadow: rgba(49, 53, 59, 0.12) 0px 1px 10px 3px;
                width: 95%;
                margin: 10px;
                padding-top: 20px;
            }
            .type-pembayaran{
                position: absolute;
                top: 155px;
            }
            .col-form-label{
                width: 50%;
            }
            .grand-total{
                width: 50%;
            }
            .navbar-bottom .navbar-brand{
                padding: 0px 32px 0px 30px;
            }
            .navbar img{
                width: 100%;
            }
            .navbar{
                min-height: 40px;
            }
            .card-subtitle{
                font-size: 12px;
            }
            p{
                font-size: 10px;
            }
            .submit_pembayaran .btn{
                width: 100%;
                float: left;
            }
            .submit_pembayaran{
                position: relative;
                top: 0;
            }
            #submit{
                width: 100%;
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
            text-align: center;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
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
        }
        #do_action{
            top: 500px;
            padding-bottom: 100px;
        }
    </style>
@endsection

@section('content')
<nav class="navbar navbar-expand-lg navbar-light">
    <a href=" {{ url('/') }} "><img src="{{ asset('images/logopds.png')}}" alt="paradisestore.id"></a>
</nav>
<div class="container pembayaran-container">
        <div class="row row-1">
            @if( Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color: #F08080">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <center><strong>{!! session('flash_message_error') !!}</strong></center>
                </div>
            @endif
            <div class="col-md-8 type-pembayaran">
                <div class="">
                    <form action="{{ url('payment-method')}}" method="POST" id="paymentForm">
                        {{ csrf_field() }}
                        <div class="payment-options">
                            <input type="hidden" name="grand_total" value="{{$cart_order->total_pembayaran}}">
                            <label class="btn btn-primary mb-3"> Pilih Metode Pembarayan </label>
                            <div id="pembayaran">
                                <input type="checkbox" id="bank_transfer" name="bank_transfer" value=""/>
                                <label for="bank_transfer">
                                    <img src="{{ asset('images/transfer.png') }}">
                                </label>

                                <input type="checkbox" id="midtrans" name="midtrans" value="midtrans"/>
                                <label for="midtrans">
                                    <img src="{{ asset('images/midtrans.png') }}" class="midtrans">
                                </label>
                            </div>
                        </div>
                        <div id="bank_pengiriman" class="text-center">
                            <div class="form-check">
                                <input class="form-check-input exampleRadios1" type="radio" name="transfer" id="exampleRadios1" value="BCA">
                                <input class="form-check-input selectbox" type="checkbox" name="kode" value="5440-305-310">
                                <label class="form-check-label" for="exampleRadios1">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-2 text-muted">BANK BCA</h6>
                                            <p class="card-text">5440-305-310</p>
                                            <p class="card-text">KCP BIAK JAKPUS</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input exampleRadios2" type="radio" name="transfer" id="exampleRadios2" value="MANDIRI">
                                <input class="form-check-input selectbox1" type="checkbox" name="kode" value="12-100-5910-5910">
                                <label class="form-check-label" for="exampleRadios2">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-2 text-muted">BANK MANDIRI</h6>
                                            <p class="card-text">12-100-5910-5910</p>
                                            <p class="card-text">KCP. A.M SANGAJI JAKPUS</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            {{-- <div class="form-check">
                                <input class="form-check-input exampleRadios3" type="radio" name="transfer" id="exampleRadios3" value="PERMATA">
                                <input class="form-check-input selectbox2" type="checkbox" name="kode" value="012345678">
                                <label class="form-check-label" for="exampleRadios3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-2 text-muted">Bank PERMATA</h6>
                                            <p class="card-text">012345678</p>
                                            <p class="card-text">KCP METRO JABABEKA</p>
                                        </div>
                                    </div>
                                </label>
                            </div> --}}
                            <div class="form-group submit_pembayaran">
                                <button type="submit" class="btn btn-primary">Bayar</button>
                            </div>
                        </div>
                    </form>
                    <div class="midtrans_pembayaran">
                        <form class="form-horizontal" id="donation" onsubmit="return submitForm();">
                            <input type="hidden" id="email" class="email" name="email" value="{{ $userDetails->email }}"><br>
                            <input type="hidden" id="name" class="name" name="name" value="{{ $userDetails->name }}"><br>
                            <input type="hidden" id="alamat_lengkap" class="alamat_lengkap" name="alamat_lengkap" value="{{ $userDetails->alamat_lengkap }}"><br>
                            <input type="hidden" id="provinsi" class="provinsi" name="provinsi" value="{{ $province->name_province }}"><br>
                            <input type="hidden" id="kota" class="kota" name="kota" value="{{ $city->name_city }}"><br>
                            <input type="hidden" id="kecamatan" class="kecamatan" name="kecamatan" value="{{ $district->name_district }}"><br>
                            <input type="hidden" id="kode_pos" class="kode_pos" name="kode_pos" value="{{ $userDetails->kode_pos }}"><br>
                            <input type="hidden" id="phone" class="phone" name="phone" value="{{ $userDetails->phone }}"><br>
                            <input type="hidden" id="ongkir" class="ongkir" name="ongkir" value="{{ $cart_order->ongkir }}"><br>

                            @if(!empty(Session::get('CouponCode')))
                                <input type="hidden" name="kode_coupon" id="kode_coupon" value="{{Session::get('CouponCode')}}"><br>
                            @else
                                <input type="hidden" name="kode_coupon" id="kode_coupon" value="0"><br>
                            @endif

                            @if(!empty(Session::get('CoupunAmount')))
                                <input type="hidden" name="nilai_coupon" id="nilai_coupon" value="{{Session::get('CoupunAmount')}}"><br>
                            @else
                                <input type="hidden" name="nilai_coupon" id="nilai_coupon" value="0"><br>
                            @endif

                            <input type="hidden" id="order_status" class="order_status" name="order_status" value="NEW"><br>
                            <input type="hidden" id="bank_name" class="bank_name" name="bank_name" value="MIDTRANS"><br>
                            <input type="hidden" id="kode_pembayaran" class="kode_pembayaran" name="kode_pembayaran" value="BELANJA"><br>

                            <input type="hidden" id="total_pembayaran" class="total_pembayaran" name="total_pembayaran" value="{{ $cart_order->total_pembayaran }}"><br>
                            <input type="hidden" id="session_id" class="session_id" name="session_id" value=" {{Session::get('session_id')}} "><br>
                            <input type="hidden" id="courier" class="courier" name="courier" value="{{ $cart_order->courier }}"><br>
                            <input type="hidden" id="service" class="service" name="service" value="{{ $cart_order->service }}"><br>
                            <button id="submit" class="btn btn-success">Pay</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ringkasan-pembelanjaan">
                <div class="bill-to">
                    <div class="form-one1">
                        <p>Ringkasan Pembelanjaan</p>
                        <div class="form-group row ringkasan">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Grand Total</label>
                            <div class="col-sm-2 grand-total">
                                <input type="text" name="grand_total" id="grand_total" readonly value="Rp {{number_format($cart_order->total_pembayaran)}}" class="form-control-plaintext" style="width:100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@if (count($orders) > 0)
    <section id="do_action">
        <div class="container">
            <div class="heading" align="center">
                <h4 class="mb-3">History Pembelian</h4>
                <table>
                    <thead>
                      <tr>
                        <th scope="col">No Order</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Grand Total</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Proses Orderan</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderproduct as $item)
                            @php
                                $order = $orders->where('id', '!=' , $item->order_id);
                            @endphp
                        @endforeach
                            @foreach ($order as $midtrans)
                            <tr>
                                <td data-label="No Order">{{ $midtrans->session_id }}</td>
                                <td data-label="Type Pembayaran">{{ $midtrans->bank_name }}</td>
                                <td data-label="Total Pembayaran">Rp {{ number_format($midtrans->total_pembayaran) }}</td>
                                <td>{{ date('d-M-Y', strtotime($midtrans->created_at)) }}</td>
                                @if ($midtrans->bank_name == 'MIDTRANS')
                                    @if ($midtrans->status == 'pending')
                                        <td data-label="Status Pembayaran">
                                            <button class="btn btn-warning btn-sm" onclick="snap.pay('{{ $midtrans->snap_token }}')">Complete Payment</button>
                                        </td>
                                    @elseif($midtrans->status == 'cancel')
                                        <td data-label="Status Pembayaran">
                                            <span href="" class="btn btn-danger btn-sm">Cancel</span>
                                        </td>
                                    @else
                                        <td data-label="Status Pembayaran">
                                            <span href="" class="btn btn-success btn-sm"> Success</span>
                                        </td>
                                    @endif

                                @else
                                    @if ($midtrans->status == 'pending')
                                        <td data-label="Status Pembayaran">
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal-{{$midtrans->id}} ">Complete Payment</button>
                                        </td>
                                    @elseif($midtrans->status == 'cancel')
                                        <td data-label="Status Pembayaran">
                                            <span href="" class="btn btn-danger btn-sm">Cancel</span>
                                        </td>
                                    @else
                                        <td data-label="Status Pembayaran">
                                            <span href="" class="btn btn-success btn-sm"> Success</span>
                                        </td>
                                    @endif
                                @endif

                                <td data-label="Proses Orderan">
                                    <a href="{{ url('/post-midtrans/'.$midtrans->id)}}" class="btn btn-primary btn-sm">Proses Product</a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </section><!--/#do_action-->
@endif
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#bank_transfer").click(function(){
            $("#bank_pengiriman").toggle();
            $(".midtrans_pembayaran").hide();
        });
        $("#midtrans").click(function(){
            $(".midtrans_pembayaran").toggle();
            $("#bank_pengiriman").hide();
        });
    });
    $('.exampleRadios1').click(function(){
        $('.selectbox').prop('checked', $(this).prop('checked'));
    });
    $('.exampleRadios2').click(function(){
        $('.selectbox1').prop('checked', $(this).prop('checked'));
    });
    $('.exampleRadios3').click(function(){
        $('.selectbox2').prop('checked', $(this).prop('checked'));
    });
</script>
@include('frontend.checkout._script_midtrans')
@endsection
