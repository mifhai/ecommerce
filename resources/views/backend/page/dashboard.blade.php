@extends('backend.layout.master')

@section('css')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

    @if( Session::has('flash_message_error'))
    <div class="alert alert-error alert-block">
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

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Product</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $product }} </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-primary"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Total Penjualan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($productsum) }},00 </div>
                  {{-- <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span>Since last years</span>
                  </div> --}}
                </div>
                <div class="col-auto">
                  <i class="fas fa-shopping-cart fa-2x text-success"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Total User</div>
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{ $user }} </div>
                  {{-- <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                    <span>Since last month</span>
                  </div> --}}
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-info"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Pembayaran</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($productpending) }},00 </div>
                  {{-- <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span>Since yesterday</span>
                  </div> --}}
                </div>
                <div class="col-auto">
                  <i class="fas fa-shopping-cart fa-2x text-warning"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Order Product</h6>
            </div>
            <div class="table-responsive p-3">
            <table class="table align-items-center table-flush" id="dataTable">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nomor Order</th>
                        <th>Nama Pembeli</th>
                        <th>Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status Pengiriman</th>
                        <th>Tanggal Order</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    @php
                        $transfer = $buktitransfer->where('nomor_order', $order->session_id)->first();
                    @endphp
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td>
                                <a href="{{ url('/admin/transaction/'.$order->session_id) }}">{{ $order->session_id }}</a>
                            </td>
                            <td> {{ $order->name }} </td>
                            <td> {{ $order->bank_name }} </td>
                            <td>
                                @if ($order->status == 'pending')
                                    <span class="badge badge-warning">pending</span>
                                @elseif($order->status == 'cancel')
                                    <span class="badge badge-danger">cancel</span>
                                @else
                                    <span class="badge badge-success">paid</span>
                                @endif
                            </td>
                            <td>
                                @if (empty($transfer->images))
                                    <span class="badge badge-danger"><i class="far fa-times-circle fa-2x"></i></span>
                                @else
                                    <span class="badge badge-success"><i class="far fa-check-circle fa-2x"></i></span>
                                @endif
                            </td>
                            <td>
                                @if ($order->delivery_status == 'pending')
                                    <span class="badge badge-warning">pending</span>
                                @elseif($order->status == 'cancel')
                                    <span class="badge badge-danger">cancel</span>
                                @else
                                    <span class="badge badge-success">paid</span>
                                @endif
                            </td>
                            <td> {{ date('d-M-y', strtotime($order->created_at)) }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    <!--Row-->
</div>
@endsection
@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
@endsection
