@extends('backend.layout.master')

@section('css')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Order Transaction</li>
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
                        <th>Status Pembayaran</th>
                        <th>Status Pengiriman</th>
                        <th>No Resi</th>
                        <th>Total Pembayaran</th>
                        <th>Tanggal Order</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td>
                                {{ $order->session_id }}
                            </td>
                            <td> {{ $order->name }} </td>
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
                                @if ($order->delivery_status == 'pending')
                                    <span class="badge badge-warning">pending</span>
                                @elseif($order->status == 'cancel')
                                    <span class="badge badge-danger">cancel</span>
                                @else
                                    <span class="badge badge-success">Delivery</span>
                                @endif

                            </td>
                            <td> {{ $order->no_resi }} </td>
                            <td>Rp {{ number_format($order->total_pembayaran) }} </td>
                            <td> {{ date('d-M-y', strtotime($order->created_at)) }} </td>
                            <td>
                                <a href="{{ url('/admin/transaction/'.$order->session_id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('/invoice/'.$order->session_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                            </td>
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
