@extends('backend.layout.master')

@section('css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
    p{
        font-size: 20px;
    }
    span{
        font-weight: bold;
    }
    .modal-content{
        width: max-content;
        left: -100px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid col-md-10" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('promotion') }}">Promotions</a></li>
        </ol>
    </div>

    <!-- Four directions -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h2 class="m-0 font-weight-bold text-primary">Promo {{ $promotion->title }} </h2>
        </div>
        <div class="card-body">
            <p> Masa Promosi dari <span>{{ date('d-m-Y', strtotime($promotion->date_start)) }} | {{ $promotion->time_start }}</span> sampai <span> {{ date('d-m-Y', strtotime($promotion->date_finish)) }} | {{ $promotion->time_finish }} </span></p>
        </div>
    </div>

    @if( Session::has('flash_message_error'))
        <div class="alert alert-error alert-block" style="background: red;">
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

    @if(count($productpromotions) > 0)

        <form action=" {{ route('product.promotion.fix') }} " method="POST">
            {{ csrf_field() }}
        <!-- Datatables -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                <a href=" " class="m-0 font-weight-bold btn btn-success" style="color:white;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle" style="margin-right:10px;"></i>Product</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            {{-- <th><input type="checkbox" class="selectall1"></th> --}}
                            <th>Images</th>
                            <th>Nama Product</th>
                            <th>Harga Awal</th>
                            <th>Harga Jual</th>
                            <th>Diskon (%)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="tabel-product">
                        @foreach ($productpromotions as $item)
                        @php
                            $prod = $product->where('id', $item->product_id);
                        @endphp
                            @foreach ($prod as $pro)
                                <tr>
                                    <input type="hidden" name="promotion_id[]" value=" {{ $item->promotion_id }} ">
                                    <input type="hidden" name="product_id[]" value=" {{ $item->product_id }} ">
                                    {{-- <td>
                                        <input type="checkbox" class="form-check-input selectbox1" name="product_checkbox1[]" value="  " style="margin-left: 0px;">
                                    </td> --}}
                                    <td>
                                        @if(!empty($pro->image))
                                        <center><img src="{{ asset ('/images/backend_images/products/large/'.$pro->image) }}" style="width:50px;"></center>
                                        @endif

                                        <input type="hidden" name="images[]" value=" {{ $pro->image }} ">

                                    </td>
                                    <td>
                                        {{ $pro->name_product }}
                                        <input type="hidden" name="name[]" value=" {{ $pro->name_product }} ">
                                    </td>
                                    <td>
                                            @if (empty($pro->diskon))
                                                Rp {{number_format($pro->price)}}
                                            @else
                                                Rp {{number_format($pro->diskon)}}
                                            @endif

                                            @if (empty($pro->diskon))
                                                <input type="hidden" class="price" name="price[]" value=" {{ $pro->price }} ">
                                            @else
                                                <input type="hidden" class="price" name="price[]" value=" {{ $pro->diskon }} ">
                                            @endif

                                    </td>
                                    <td>
                                        @if(empty($item->diskon))
                                            <input type="text"  class="form-control diskon" name="diskon[]" placeholder="Rp">
                                        @else
                                            <input type="text"  class="form-control diskon" name="diskon[]" value=" {{ $item->diskon }} " readonly>
                                        @endif
                                    </td>
                                    <td>
                                        @if(empty($item->persen))
                                            <input type="text" class="form-control persen" name="persen[]" readonly>
                                        @else
                                            <input type="text"  class="form-control diskon" name="persen[]" value=" {{ $item->persen }} " readonly>
                                        @endif

                                    </td>
                                    <td>
                                        <center>
                                            <a rel="{{ $item->product_id }}" rel1="delete_product_promotion" href="javascript:" class="btn btn-danger btn-mini deleteRecord" id="delProd" title="Hapus product"><i class="fas fa-trash-alt"></i></a>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="font-weight-bold btn btn-warning" style="color:white; width:100%; margin-top:10px;"><i class="fas fa-check"></i> &nbsp; Selesai</button>
            </div>
        </div>
        <!-- DataTable with Hover -->
    </form>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action=" {{ url('/add/promotion') }} " method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <!-- Datatables -->
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Product</h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable1">
                                        <thead class="thead-light">
                                            <tr>
                                                <th><input type="checkbox" class="selectall2"></th>
                                                <th>Images</th>
                                                <th>Nama Product</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product as $pro)
                                                <tr>
                                                    <input type="hidden" name="promotion_id" value=" {{ $promotion->id }} ">
                                                    <td>
                                                        <input type="checkbox" class="form-check-input selectbox2" name="product_checkbox2[]" value=" {{ $pro->id }} " style="margin-left: 0px;">
                                                    </td>
                                                    <td>
                                                        @if(!empty($pro->image))
                                                        <center><img src="{{ asset ('/images/backend_images/products/large/'.$pro->image) }}" style="width:50px;"></center>
                                                        @endif
                                                    </td>
                                                    <td> {{ $pro->name_product }} </td>
                                                    <td>
                                                        @if (empty($pro->diskon))
                                                            Rp {{number_format($pro->price)}}
                                                        @else
                                                            Rp {{number_format($pro->diskon)}}
                                                        @endif
                                                    </td>
                                                    <td> {{ $pro->stok }} </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- DataTable with Hover -->
                            <button type="submit" class="btn btn-success btn-mini" style="float:right">Konfirmasi</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float:right;margin-right:10px;">Batalkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @else

    <div class="card mb-4">
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper" style="padding: 10rem 0 10rem 0;">
            <div class="text-center">
            <img src="https://deo.shopeemobile.com/shopee/shopee-seller-live-id/rootpages/static/modules/discount/image/sprite.src.components.NoResult.a8656ec.png" style="max-height: 160px;" class="mb-3"><br>
            <a href="" class="btn btn-success btn-mini" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle" style="margin-right:10px;"></i> Product</a>
            </div>
        </div>
        <!---Container Fluid-->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action=" {{ url('/add/promotion') }} " method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- Datatables -->
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Product</h6>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush" id="dataTable1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><input type="checkbox" class="selectall2"></th>
                                            <th>Images</th>
                                            <th>Nama Product</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $pro)
                                            <tr>
                                                <input type="hidden" name="promotion_id" value=" {{ $promotion->id }} ">
                                                <td>
                                                    <input type="checkbox" class="form-check-input selectbox2" name="product_checkbox2[]" value=" {{ $pro->id }} " style="margin-left: 0px;">
                                                </td>
                                                <td>
                                                    @if(!empty($pro->image))
                                                    <center><img src="{{ asset ('/images/backend_images/products/large/'.$pro->image) }}" style="width:50px;"></center>
                                                    @endif
                                                </td>
                                                <td> {{ $pro->name_product }} </td>
                                                <td>
                                                    @if (empty($pro->diskon))
                                                        Rp {{number_format($pro->price)}}
                                                    @else
                                                        Rp {{number_format($pro->diskon)}}
                                                    @endif
                                                </td>
                                                <td> {{ $pro->stok }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- DataTable with Hover -->
                        <button type="submit" class="btn btn-success btn-mini" style="float:right">Konfirmasi</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float:right;margin-right:10px;">Batalkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endif



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
   <script>
       $(document).ready(function () {
       $('#dataTable1').DataTable(); // ID From dataTable
       $('#dataTableHover').DataTable(); // ID From dataTable with Hover
       });
   </script>
       <script type="text/javascript">
        $('.selectall1').click(function(){
            $('.selectbox1').prop('checked', $(this).prop('checked'));
        });
        $('.selectbox1').change(function(){
            var total = $('.selectbox1').length();
            var number = $('.selectbox1:checked').length();
            if(total == number){
                $('.selectall1').prop('checked', true);
            }else{
                $('.selectall1').prop('checked', false);
            }
        })
    </script>
       <script type="text/javascript">
        $('.selectall2').click(function(){
            $('.selectbox2').prop('checked', $(this).prop('checked'));
        });
        $('.selectbox2').change(function(){
            var total = $('.selectbox2').length();
            var number = $('.selectbox2:checked').length();
            if(total == number){
                $('.selectall2').prop('checked', true);
            }else{
                $('.selectall2').prop('checked', false);
            }
        })
    </script>
    <script type="text/javascript">
        $('.tabel-product').delegate('.price,.diskon','keyup', function(){
            var tr=$(this).parent().parent();
            var price=tr.find('.price').val();
            var diskon=tr.find('.diskon').val();
            var persen=Math.floor(((diskon-price)/price)*100);
            tr.find('.persen').val(persen);
        });
    </script>
@endsection

