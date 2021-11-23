
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
        padding-top: 120px;
    }
    #do_action{
        padding-bottom: 120px;
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
        @media only screen and (max-width: 600px){
            .copyright{
                display: none;
            }
            #do_action{
                padding-bottom: 100px;
            }
            #cart_items {
                padding-top: 60px;
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
</style>
@endsection



@section('content')

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
            <h4 class="mb-3">History Pembelian</h4>
            <table>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Order</th>
                    {{-- <th scope="col">Nama Product</th> --}}
                    <th scope="col">Pembayaran</th>
                    <th scope="col">Grand Total</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Status Pengiriman</th>
                    <th scope="col">No Resi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    @php
                        $order_product = $orderproduct->where('session_id', $order->order_id);
                        $order_product_all = $orderproduct->where('order_id', $order->id)->first();
                    @endphp
                        <tr>
                            <td data-label="No">{{ $loop->iteration }}</td>
                            <td data-label="No Order">{{ $order->session_id }}</td>
                            {{-- <td>
                                @foreach ($order->productorders as $item)
                                    --{{ $item->product_name }}<br>
                                @endforeach
                            </td> --}}
                            <td data-label="Pembayaran">{{ $order->bank_name }}</td>
                            <td data-label="Grand Total">Rp {{ number_format($order->total_pembayaran) }}</td>
                            <td data-label="Tanggal Pemesanan">{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                                @if ($order->bank_name == 'MIDTRANS')
                                    @if ($order->status == 'pending')
                                        <td data-label="Status Pembayaran" align="center">
                                            <button class="btn btn-warning btn-sm" onclick="snap.pay('{{ $order->snap_token }}')">Complete Payment</button>
                                        </td>
                                    @elseif($order->status == 'cancel')
                                        <td data-label="Status Pembayaran" align="center">
                                            <span href="" class="btn btn-danger btn-sm">Cancel</span>
                                        </td>
                                    @else
                                        <td data-label="Status Pembayaran" align="center">
                                            <span href="" class="btn btn-success btn-sm"> Success</span>
                                        </td>
                                    @endif

                                @else
                                    @if ($order->status == 'pending')
                                        <td data-label="Status Pembayaran" align="center">
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal-{{$order->id}} ">Complete Payment</button>
                                        </td>
                                    @elseif($order->status == 'cancel')
                                        <td data-label="Status Pembayaran" align="center">
                                            <span href="" class="btn btn-danger btn-sm">Cancel</span>
                                        </td>
                                    @else
                                        <td data-label="Status Pembayaran" align="center">
                                            <span href="" class="btn btn-success btn-sm"> Success</span>
                                        </td>
                                    @endif
                                @endif
                            <td data-label="Status Pengiriman">
                                @if ($order->delivery_status == 'pending')
                                    <span class="btn btn-warning btn-sm">pending</span>
                                @elseif($order->status == 'cancel')
                                    <span class="btn btn-danger btn-sm">cancel</span>
                                @else
                                    <span class="btn btn-success btn-sm">Delivery</span>
                                @endif
                            </td>
                            <td data-label="No Resi">
                                @if (empty($order->no_resi))
                                    --
                                @else
                                    {{ $order->no_resi }}
                                @endif
                            </td>
                            @if ($order->bank_name == 'MIDTRANS')
                                @if ($order->status == 'pending')
                                    <td data-label="Action" align="center">
                                        <a href="{{ url('/history-order-details/'.$order->id)}}" class="btn btn-primary btn-sm">Details</a>
                                        <a href="{{ url('/invoice/'.$order->session_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                                    </td>
                                @elseif($order->status == 'cancel')
                                    <td data-label="Action" align="center">
                                        <a href="{{ url('/history-order-details/'.$order->id)}}" class="btn btn-primary btn-sm"> Details</a>
                                        <a href="{{ url('/invoice/'.$order->session_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                                    </td>
                                @else
                                    <td data-label="Action" align="center">
                                        <a href="{{ url('/history-order-details/'.$order->id)}}" class="btn btn-primary btn-sm"> Details</a>
                                        <a href="{{ url('/invoice/'.$order->session_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                                    </td>
                                @endif
                            @else
                                @if ($order->status == 'pending')
                                    <td data-label="Action" align="center">
                                        <a href="{{ url('/history-order-details/'.$order->id)}}" class="btn btn-primary btn-sm">Details</a>
                                        <a href="{{ url('/invoice/'.$order->session_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                                    </td>
                                @elseif($order->status == 'cancel')
                                    <td data-label="Action" align="center">
                                        <a href="{{ url('/history-order-details/'.$order->id)}}" class="btn btn-primary btn-sm"> Details</a>
                                        <a href="{{ url('/invoice/'.$order->session_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                                    </td>
                                @else
                                    <td data-label="Action" align="center">
                                        <a href="{{ url('/history-order-details/'.$order->id)}}" class="btn btn-primary btn-sm"> Details</a>
                                        <a href="{{ url('/invoice/'.$order->session_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</section><!--/#do_action-->

@foreach ($orders as $order)
<!-- Modal bukti pembayaran-->
<div class="modal fade" id="exampleModal-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action=" {{ url('/upload-pembayaran') }} " method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <span class="order">No Order : {{ $order->session_id }} </span>
              <div class="form-group mt-3 mb-5">
                <label>Bukti Pembayaran</label>
                <input type="file" name="images" class="form-control" required>
                <small class="form-text text-muted"><button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal1">Example</button> Klik Disini Untuk melihat contoh Bukti Pembayaran </small>
              </div>
              <input type="hidden" name="nomor_order" value="{{ $order->session_id }}">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endforeach

<!-- Modal example-->
<div class="modal fade" id="exampleModal1" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contoh Bukti Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src=" {{ asset('/images/bukti.jpg') }} " alt="bukti pembayaran" width="100%">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
    <script src="{{ asset ('js/frontend_js/shop/jquery.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/main.js') }}"></script>
    @include('frontend.checkout._script_midtrans')
@endsection
