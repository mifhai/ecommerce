
@extends('frontend.layouts.design')
@section('judul')
    Paradisestore | History Orders
@endsection
@section('css')
<style>
    .copyright{
        position: relative;
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
        .modal-body .order{
            font-size: 24px;
            font-weight: bold;
        }
</style>
@endsection



@section('content')
@if (count($cart) > 0)
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">History</li>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading" align="center">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No Order</th>
                            <th>Pembayaran</th>
                            <th>Grand Total</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Status Pembayaran</th>
                            <th>Proses Orderan</th>
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
                                <td>{{ $midtrans->session_id }}</td>
                                <td>{{ $midtrans->bank_name }}</td>
                                <td>Rp {{ number_format($midtrans->total_pembayaran) }}</td>
                                <td>{{ date('d-M-Y', strtotime($midtrans->created_at)) }}</td>
                                @if ($midtrans->bank_name == 'MIDTRANS')
                                    @if ($midtrans->status == 'pending')
                                        <td align="center">
                                            <button class="btn btn-warning btn-sm" onclick="snap.pay('{{ $midtrans->snap_token }}')">Complete Payment</button>
                                        </td>
                                    @elseif($midtrans->status == 'cancel')
                                        <td align="center">
                                            <span href="" class="btn btn-danger btn-sm">Cancel</span>
                                        </td>
                                    @else
                                        <td align="center">
                                            <span href="" class="btn btn-success btn-sm"> Success</span>
                                        </td>
                                    @endif

                                @else
                                    @if ($midtrans->status == 'pending')
                                        <td align="center">
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal-{{$midtrans->id}} ">Complete Payment</button>
                                        </td>
                                    @elseif($midtrans->status == 'cancel')
                                        <td align="center">
                                            <span href="" class="btn btn-danger btn-sm">Cancel</span>
                                        </td>
                                    @else
                                        <td align="center">
                                            <span href="" class="btn btn-success btn-sm"> Success</span>
                                        </td>
                                    @endif
                                @endif

                                <td align="center">
                                    <a href="{{ url('/post-midtrans/'.$midtrans->id)}}" class="btn btn-primary btn-sm">Proses Product</a>
                                </td>
                            </tr>
                            @endforeach

                        {{-- @foreach ($orders as $order)
                        @if ($order_nomor != $order->id)
                            <tr>
                                <td>{{ $order->session_id }}</td>
                                <td>{{ $order->bank_name }}</td>
                                <td>Rp {{ number_format($order->total_pembayaran) }}</td>
                                <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                                @if ($order->bank_name == 'MIDTRANS')
                                    @if ($order->status == 'pending')
                                        <td align="center">
                                            <button class="btn btn-warning btn-sm" onclick="snap.pay('{{ $order->snap_token }}')">Complete Payment</button>
                                        </td>
                                    @elseif($order->status == 'cancel')
                                        <td align="center">
                                            <span href="" class="btn btn-danger btn-sm">Cancel</span>
                                        </td>
                                    @else
                                        <td align="center">
                                            <span href="" class="btn btn-success btn-sm"> Success</span>
                                        </td>
                                    @endif

                                @else
                                    @if ($order->status == 'pending')
                                        <td align="center">
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal-{{$order->id}} ">Complete Payment</button>
                                        </td>
                                    @elseif($order->status == 'cancel')
                                        <td align="center">
                                            <span href="" class="btn btn-danger btn-sm">Cancel</span>
                                        </td>
                                    @else
                                        <td align="center">
                                            <span href="" class="btn btn-success btn-sm"> Success</span>
                                        </td>
                                    @endif
                                @endif

                                <td align="center">
                                    <a href="{{ url('/post-midtrans/'.$order->id)}}" class="btn btn-primary btn-sm">Proses Product</a>
                                </td>
                            </tr>
                        @endif
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </section><!--/#do_action-->
@endif
@endsection

@section('script')
    <script src="{{ asset ('js/frontend_js/shop/jquery.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/main.js') }}"></script>
    @include('frontend.checkout._script_midtrans')
@endsection
