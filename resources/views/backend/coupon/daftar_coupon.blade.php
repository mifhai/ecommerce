@extends('backend.layout.master')

@section('css')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Daftar Coupon</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Coupon</h6>
            <a href="{{ url('admin_add_coupon') }}" class="m-0 font-weight-bold btn btn-success" style="color:white;"><i class="fas fa-plus-circle" style="margin-right:10px;"></i>Coupon</a>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Kode Coupon</th>
                    <th>Nilai Coupon (Rp) or (%)</th>
                    <th>Type Coupon</th>
                    <th>start</th>
                    <th>Expired</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($detailCoupon as $coupon)
                        <tr class="gradeX">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coupon -> coupon_code}}</td>
                            <td>
                                @if ($coupon->amount_type=='percentage')
                                    {{$coupon -> amount}} %
                                @else
                                Rp  {{number_format($coupon -> amount)}}
                                @endif

                            </td>
                            <td>{{$coupon -> amount_type}}</td>
                            <td>{{$coupon -> created_at}}</td>
                            <td>{{$coupon -> expired_date}}</td>
                            <td><center>

                                @if($coupon->status=='1')
                                <span class="btn btn-primary btn-mini"><i class="far fa-check-circle"></i></span>
                                @else
                                <span class="btn btn-danger btn-mini"><i class="fas fa-ban"></i></span>
                                @endif

                              </center>
                            </td>
                            <td class="center">
                            <center>
                                <a href="{{ url('/admin_edit_coupon/'.$coupon->id) }}" class="btn btn-primary btn-mini"><i class="far fa-edit"></i></a>
                                <a rel="{{ $coupon->id }}" rel1="delete_coupon" href="javascript:" class="btn btn-danger btn-mini deleteRecord" id="delCoup" title="Hapus coupon"><i class="fas fa-trash-alt"></i></a>
                            </center>
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
<!---Container Fluid-->

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



