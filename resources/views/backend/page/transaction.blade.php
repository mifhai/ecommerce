@extends('backend.layout.master')

@section('css')
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
        }
        .resi{
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Transaction </li>
        </ol>
    </div>

    <!-- Row -->
    <form action=" {{ url('/admin/transaction/post/'.$orders->session_id) }} " method="POST">
        {{ csrf_field() }}
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Transaction Information</h6>
                    </div>
                    <div class="card-header col-md-12">
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">No Order</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $orders->session_id }} ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Pembeli</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $orders->name }} ">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <select class="custom-select" id="validationCustom04" name="status" required>
                                        <option selected value="{{ $orders->status }}"> {{ $orders->status }} </option>
                                        <option value="pending">Pending</option>
                                        <option value="cancel">Cancel</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <select class="custom-select select-delivery" name="delivery" onchange="showDiv('hidden_div', this)" required>
                                    @if (empty($orders->no_resi))
                                        <option selected value=""> Status Pengiriman </option>
                                    @else
                                        <option selected value="{{ $orders->delivery_status }}"> {{ $orders->delivery_status }} </option>
                                    @endif
                                        <option value="pending">Pending</option>
                                        <option value="delivery">Delivery</option>
                                    </select>
                                </div>
                                @if (empty($orders->no_resi))
                                    <div class="form-group row resi" id="hidden_div">
                                        <input type="text" name="resi" class="form-control" id="exampleFormControlInput1" placeholder="No Resi">
                                    </div>
                                @else
                                    <div class="form-group row" id="hidden_div">
                                        <input type="text" name="resi" class="form-control" id="exampleFormControlInput1" value=" {{ $orders->no_resi }} ">
                                    </div>
                                @endif

                            </div>
                        </div>
                        <h5 class="mt-3 informasi">Informasi Pengiriman</h5>
                        <span> {{ $orders->alamat_lengkap }} </span><br>
                        <span> {{ $district->name_district }} </span> |
                        <span> {{ $city->name_city }} </span> |
                        <span> {{ $province->name_province }} </span><br>
                        <span> {{ $orders->kode_pos }}</span><br><br>
                        <span> Email : {{ $orders->user_email }} </span><br>
                        <span> Phone : {{ $orders->phone }} </span><br>
                        <span> KTP : {{ $user->ktp }} </span><br><br>
                        <span> Payment Method : {{ $orders->bank_name }} </span><br>
                        @if (empty($imagestransfer->images))
                            <span style="color:red;"> Bukti Transfer : - </span><br>
                        @else
                            <span> Bukti Transfer : <a href="" data-toggle="modal" data-target="#exampleModal"><img src=" {{ asset('images/frontend_images/bukti_transfer/'.$imagestransfer->images) }} " alt="$orders->session_id" width="30px"></a></span><br>
                        @endif

                        <span> Invoice Date : {{ date('d-M-y', strtotime($orders->created_at)) }} </span><br>
                        <span> Shipping Info : {{ $orders->courier }} | {{ $orders->service }}</span><br>
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
                                    <td>{{ $orderdetail->product_name }}</td>
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
                    <div class="tombol-transaction col-md-12 mb-5">
                        <button type="submit" class="btn btn-success btn-sm" style="width:fit-content;">Submit <i class="far fa-arrow-alt-circle-right"></i></button>
                        <a href=" {{ route('dashboard') }} " class="btn btn-secondary btn-sm" style="width:fit-content;"><i class="far fa-hand-point-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Row-->
</div>

@if (!empty($imagestransfer->images))
<!-- Modal Bukti Transfer-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{ asset('images/frontend_images/bukti_transfer/'.$imagestransfer->images) }}" alt=" {{ $orders->session_id }} " width="100%">
        </div>
      </div>
    </div>
</div>
@endif


@endsection
@section('script')
<script>
    function showDiv(divId, element)
        {
            document.getElementById(divId).style.display = element.value == 'delivery' ? 'block' : 'none';
        }
</script>
@endsection
