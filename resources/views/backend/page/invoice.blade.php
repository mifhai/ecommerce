<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/css/ruang-admin.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .tombol-transaction button{
            float: right;
        }
        .tombol-transaction a{
            float: right;
            margin-right: 10px;
        }
        .tombol-transaction{
            padding-right: 40px;
        }
        .informasi{
            font-family: cursive;
            font-weight: bold;
            border-bottom: 1px solid;
            padding-bottom: 10px;
        }
        .resi{
            display: none;
        }
        .card{
            padding: 40px;
        }
        .form-group{
            margin-bottom: 0;
        }
        .form-control-plaintext{
            padding: 0;
        }
        label{
            margin-bottom: 0;
        }
        .col{
            padding: 0;
        }
        .card .table td, .card .table th{
            padding-left: 10px !important;
        }
        td{
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container" id="container-wrapper">
        <!-- Row -->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header col-md-12">
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="d-flex flex-row align-items-center justify-content-between">
                                            <img src="{{ asset('images/logopds.png')}}" alt="invoice-{{$orders->session_id}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-6" style="font-size:20px;font-weight: bold;">No Invoice #</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $orders->session_id }} " style="font-size:20px;font-weight: bold;">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-6">Created</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ date('d-M-Y', strtotime($orders->updated_at)) }} ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col">
                                    <h5 class="mt-3 informasi">PARADISE STORE INDONESIA</h5>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-6">Status Pembayaran</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $orders->status }} ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-6">Status Pengiriman</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $orders->delivery_status }} ">
                                        </div>
                                    </div>
                                    @if (empty($orders->no_resi))
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-6">No Resi</label>
                                            <div class="col-sm-6">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": - ">
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-6">No Resi</label>
                                            <div class="col-sm-6">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $orders->no_resi }} ">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col text-right">
                                    <h5 class="mt-3 informasi">Informasi Pengiriman</h5>
                                    <span> {{ $orders->name }} </span><br>
                                    <span> {{ $orders->alamat_lengkap }} </span><br>
                                    <span> {{ $district->name_district }} </span> |
                                    <span> {{ $city->name_city }} </span> |
                                    <span> {{ $province->name_province }} </span> |
                                    <span> {{ $orders->kode_pos }}</span> <br>
                                    <span> Email : {{ $orders->user_email }} </span><br>
                                    <span> Phone : {{ $orders->phone }} </span><br>
                                    <span> KTP : {{ $user->ktp }} </span><br><br>
                                </div>
                            </div>
                            {{-- payment --}}
                            <div class="row">
                                <div class="col">
                                    <h4 class="informasi">Payment Method</h4>
                                    <span> Payment Method : {{ $orders->bank_name }} </span><br>
                                </div>
                                <div class="col text-right">
                                    <h4 class="informasi">Total Transfer</h4>
                                    <span>Rp {{ number_format($orders->total_pembayaran) }} </span><br>
                                </div>
                            </div>
                            {{-- shipping --}}
                            <div class="row mt-5 mb-3">
                                <div class="col">
                                    <h4 class="informasi">Shipping Method</h4>
                                    <span> Shipping Info : {{ $orders->courier }} | {{ $orders->service }}</span><br>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>qty</th>
                                    <th style="text-align:right;">Harga Produk</th>
                                    <th style="text-align:right;">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_amount = 0; ?>
                                @foreach ($orderproducts as $orderdetail)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td style="width:100px !important;">{{ $orderdetail->product_name }}</td>
                                        <td>{{ $orderdetail->qty }}</td>
                                        <td style="text-align:right;">Rp {{ number_format($orderdetail->product_price) }}</td>
                                        <td style="text-align:right;">Rp {{ number_format($orderdetail->product_price*$orderdetail->qty) }} </td>
                                    </tr>
                                <?php $total_amount = $total_amount + ($orderdetail->product_price*$orderdetail->qty); ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align:right;">Total Pembelian</td>
                                <td style="text-align:right;">Rp {{ number_format($total_amount) }}  </td>
                                <tr>
                                    <td style="border:none;"></td>
                                    <td style="border:none;"></td>
                                    <td style="border:none;"></td>
                                    <td style="text-align:right;">Diskon</td>
                                    @if (empty($orders->nilai_coupon))
                                        <td style="text-align:right;">Rp 0</td>
                                    @else
                                        <td style="text-align:right;">Rp {{ number_format($orders->nilai_coupon) }}</td>
                                        {{-- &nbsp; / &nbsp; ({{ ($orders->nilai_coupon/$total_amount)*100 }}%) --}}
                                    @endif

                                </tr>
                                <tr>
                                    <td style="border:none;"></td>
                                    <td style="border:none;"></td>
                                    <td style="border:none;"></td>
                                    <td style="text-align:right;">Ongkir</td>
                                    <td style="text-align:right;">Rp {{ number_format($orders->ongkir) }} </td>
                                </tr>
                                <tr>
                                    <td style="border:none;"></td>
                                    <td style="border:none;"></td>
                                    <td style="border:none;"></td>
                                    <td style="text-align:right;">Total Pembayaran</td>
                                    @if (empty($orders->nilai_coupon))
                                        <td style="text-align:right;">Rp {{ number_format($total_amount) }} </td>
                                    @else
                                        <td style="text-align:right;">Rp {{ number_format(($total_amount-$orders->nilai_coupon)+ $orders->ongkir) }}</td>
                                    @endif

                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        <!--Row-->
    </div>
</body>
</html>



