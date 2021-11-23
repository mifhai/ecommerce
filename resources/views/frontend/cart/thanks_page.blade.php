@extends('frontend.layouts.design')
@section('judul')
    Thanks For Order
@endsection
@section('css')
<style>
    .copyright{
        position: relative;
    }
    #cart_items{
        padding-top: 150px;
    }
    #do_action{
        padding-bottom: 60px;
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
        .heading{
            box-shadow: rgba(49, 53, 59, 0.12) 0px 1px 10px 3px;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .attention{
            width: 50%;
            text-align: center;
            background: #e6ee9c;
            border: 1px solid #ffcc80;
            border-radius: 10px;
            padding: 10px;
        }
        .attention p{
            font-size: 16px;
        }
        .no_rek{
            font-size: 25px;
        }
        .no_rek img{
            margin-right: 10px;
        }
        #do_action label{
            font-size: 30px;
            color: red;
        }
        .jumbotron{
            width: 50%;
        }
        .jumbotron p{
            color: black;
            font-size: 20px;
        }
        .jumbotron ul{
            font-size: 16px;
        }
        .detail-pembayaran a{
            width: 50%;
            border: 1px solid;
            padding: 15px 10px 15px 10px;
            font-size: 20px;
        }
        .no-order{
            width: 50%;
            background: #ccff90;
            padding: 20px 10px 20px 10px;
            border-radius: 10px;
            border: 1px solid blue;
        }
        .img img{
            width: 7%;
        }
        @media only screen and (max-width: 600px){
            #cart_items{
                padding-top: 60px;
            }
            .jumbotron{
                width: 90%;
            }
            .detail-pembayaran a{
                width: 90%;
            }
            .no-order{
                width: 90%;
            }
            .attention{
                width: 90%;
            }
            .no_rek {
                font-size: 20px;
            }
            .img img {
                width: 15%;
            }
            .viewed_title{
                font-size: 12px;
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
              <li class="active">Thanks</li>
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
            <div class="img mb-3">
                <img src=" {{ asset('images/parko1.png') }} " alt="">
            </div>
            <h3>Terimakasih Telah Melakukan Pembelian Di Toko Kami</h3>
            <h4 class="mt-3 no-order">Berikut No Order Kamu :<b> {{Session::get('order_id')}}</b></h4>
            <h4 class="mb-3 mt-5">Segera selesaikan pembayaran anda sebelum stok habis.</h4>
            <div class="attention mb-3">
                <p>Pastikan memasukkan No Rekening dengan benar dan cek nama penerima PT XDC INDONESIA sebelum melakukan proses transfer</p>
            </div>
            {{-- <p>Silahkan Lakukan Pembayaran Via Transfer Sebesar Rp {{number_format(Session::get('grand_total'))}} ke BANK {{Session::get('bank_name')}} {{Session::get('kode_bank')}}  </p> --}}
            <p>Transfer pembayaran ke :</p>
            @if (Session::get('bank_name') == 'BCA')
                <p class="no_rek"><img src=" {{ asset('images/bca.jpg') }} " alt="BCA"> {{Session::get('kode_bank')}}</p>
                <a href="" style="text-decoration-line: underline;">salin nomor rekening</a>
            @elseif(Session::get('bank_name') == 'MANDIRI')
                <p class="no_rek"><img src="{{ asset('images/mandiri.png') }}" alt="MANDIRI"> {{Session::get('kode_bank')}}</p>
                <a href="" style="text-decoration-line: underline;">salin nomor rekening</a>
            @else
                <p class="no_rek"><img src="{{ asset('images/midtrans.png') }}" alt="banktransfer" style="box-shadow: rgba(49, 53, 59, 0.12) 0px 1px 10px 3px;"> {{Session::get('kode_bank')}}</p>
            @endif

            <p class="mt-3">Jumlah Yang Harus Dibayar :</p>
            <label>Rp {{number_format(Session::get('grand_total'))}}</label>
            <br>
            <div class="jumbotron text-left">
                @if (Session::get('bank_name') == 'BCA')
                    <p>Panduan Pembayaran Melalui ATM BCA</p>
                    <ul>
                        <li>1. Pilih menu transaksi lainnya</li>
                        <li>2. Pilih menu Transfer</li>
                        <li>3. Pilih menu ke Rekening Mandiri</li>
                        <li>4. Masukan nomor rekening tujuan (pilih Benar)</li>
                        <li>5. masukan jumlah uang yang akan ditransfer (pilih Benar)</li>
                        <li>6. Perhatikan konfirmasi transfer, jika benar pilih Benar</li>
                        <li>7. Transaksi anda telah selesai, pilih Keluar</li>
                        <li>8. atau tekan Cancel.</li>
                    </ul>
                @elseif(Session::get('bank_name') == 'MANDIRI')
                    <p>Panduan Pembayaran Melalui ATM MANDIRI</p>
                    <ul>
                        <li>1. Pilih menu transaksi lainnya</li>
                        <li>2. Pilih menu Transfer</li>
                        <li>3. Pilih menu ke Rekening Mandiri</li>
                        <li>4. Masukan nomor rekening tujuan (pilih Benar)</li>
                        <li>5. masukan jumlah uang yang akan ditransfer (pilih Benar)</li>
                        <li>6. Perhatikan konfirmasi transfer, jika benar pilih Benar</li>
                        <li>7. Transaksi anda telah selesai, pilih Keluar</li>
                        <li>8. atau tekan Cancel.</li>
                    </ul>
                @else
                    <p class="text-center">Segera Selesaikan pembayaran sesuai dengan type pembayaran yang anda pilih melalui MIDTRANS</p>
                @endif
            </div>
            <br>
            <div class="detail-pembayaran">
                <a class="btn" href=" {{ url('/history-order') }} ">Cek Status Pembayaran</a>
            </div>
            <div class="detail-pembayaran mt-3">
                <a class="btn btn-success" href=" {{ url('/') }} ">Yuk, Belanja Lagi</a>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
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
                                @else
                                    <div class="viewed_image">
                                        <a href=" {{ $item->product()}} "><img src="http://placehold.it/300x300" alt=""></a>
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
@endsection

@section('script')
    {{-- <script src="{{ asset ('js/frontend_js/shop/jquery.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/main.js') }}"></script> --}}
@endsection

<?php
// Session::forget('grand_total');
// Session::forget('order_id');
// Session::forget('bank_name');
// Session::forget('kode_bank');
?>

