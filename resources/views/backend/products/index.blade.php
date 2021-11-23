@extends('backend.layout.master')

@section('css')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style>
        .import{
            position: absolute;
            right: 236px;
        }
        .export{
            position: absolute;
            right: 133px;
        }
    </style>
@endsection

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Daftar Product</h1>
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

    {{-- notifikasi form validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- notifikasi sukses --}}
    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-success alert-block text-center">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $sukses }}</strong>
    </div>
    @endif

    <form action=" {{ url('/delete/product/selection') }} " method="POST">
        {{ csrf_field() }}
    <div class="row">
      <!-- Datatables -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div>
                <button type="submit" class="btn btn-danger btn-mini" id="deleteProduct">Hapus Pilihan</button>
            </div>
            <button type="button" class="m-0 font-weight-bold btn btn-warning import" data-toggle="modal" data-target="#exampleModal" style="color:white;"><i class="fas fa-file-upload"></i>&nbsp; Import</button>
            <a href=" {{ route('export') }} " class="m-0 font-weight-bold btn btn-info export" style="color:white;"><i class="fas fa-download"></i>&nbsp; Export</a>
            <a href=" {{ url('/admin_add_product') }} " class="m-0 font-weight-bold btn btn-success" style="color:white;"><i class="fas fa-plus-circle" style="margin-right:10px;"></i>Product</a>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                    <th><input type="checkbox" class="selectall"></th>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Product</th>
                    <th>Brands</th>
                    <th>Category</th>
                    <th style="width: 110px;">Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" class="form-check-input selectbox" name="product_checkbox[]" value=" {{ $product->id }} ">
                        </td>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if(!empty($product->image))
                            <center><img src="{{ asset ('/images/backend_images/products/large/'.$product->image) }}" style="width:50px;" alt="{{$product->name_product}}"></center>
                            @endif
                        </td>
                        <td>{{$product->name_product}}</td>
                        <td>{{$product->brands}}</td>
                        <td>{{$product->category_product}}</td>
                        <td>
                            @if (empty($product->diskon))
                                Rp {{number_format($product->price)}}
                            @else
                                Rp {{number_format($product->diskon)}}
                            @endif

                        </td>
                        <td>{{$product->stok}}</td>
                        <td>
                            <center>
                            @if($product->status=='1')
                                <a href=" {{ url('/admin/active/'.$product->id) }} " class="btn btn-primary btn-mini"><i class="far fa-check-circle"></i></a>
                            @else
                                <a href="{{ url('/admin/active/'.$product->id) }}" class="btn btn-danger btn-mini"><i class="fas fa-ban"></i></a>
                            @endif
                            </center>

                        </td>
                        <td>
                            <center>
                                <a href="{{ url('/admin_duplicate_product/'.$product->id) }}" class="btn btn-primary btn-mini" title="Duplicate Product"><i class="far fa-copy"></i></a>
                                <a href="{{ url('/admin_edit_product/'.$product->id) }}" class="btn btn-primary btn-mini" title="Edit Product"><i class="far fa-edit"></i></a>
                                <a rel="{{ $product->id }}" rel1="delete_product" href="javascript:" class="btn btn-danger btn-mini deleteRecord" id="delProd" title="Hapus product"><i class="fas fa-trash-alt"></i></a>
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

    </form>

    <!--Row-->


<!-- Modal Import Excel-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action=" {{ url('admin_import_product') }} " method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" class="form-control" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>


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
    <script type="text/javascript">
        $('.selectall').click(function(){
            $('.selectbox').prop('checked', $(this).prop('checked'));
        });
        $('.selectbox').change(function(){
            var total = $('.selectbox').length();
            var number = $('.selectbox:checked').length();
            if(total == number){
                $('.selectall').prop('checked', true);
            }else{
                $('.selectall').prop('checked', false);
            }
        })
    </script>
@endsection
