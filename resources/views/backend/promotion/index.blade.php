@extends('backend.layout.master')

@section('css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
    .promotion{
        position: absolute;
        right: 27px;
    }

</style>
@endsection

@section('content')
<!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Promotion</h1>
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
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sedang Berlangsung</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Akan Datang</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Berakhir</a>
                <a href=" {{ route('add.promotion') }} " class="btn btn-success btn-mini promotion"><i class="fas fa-plus-circle" style="margin-right:10px;"></i> Promotion</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <!-- Row -->
                <form action=" {{ url('/delete/promotion/selection') }} " method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                    <!-- Datatables -->
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <button type="submit" class="btn btn-danger btn-mini" id="deleteProduct">Hapus Pilihan</button>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable1">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center" style="padding-right: 50px;"><input type="checkbox" class="selectall"></th>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Start Date</th>
                                                <th>Finish Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($startpromotion as $start)
                                                <tr>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input selectbox" name="product_checkbox[]" value=" {{ $start->id }} "></td>
                                                    <td> {{ $loop->iteration }} </td>
                                                    <td> {{ $start->title }} </td>
                                                    <td> {{ date('d-m-Y', strtotime($start->date_start)) }} | {{ $start->time_start }}</td>
                                                    <td> {{ date('d-m-Y', strtotime($start->date_finish)) }} | {{ $start->time_finish }}</td>
                                                    <td>
                                                        <center>
                                                            <a href=" {{ url('/admin/add/product/promotion/'.$start->id) }} " class="btn btn-primary btn-mini">Detail</a>
                                                        </center>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <!-- DataTable with Hover -->
                    </div>
                </form>
                <!--Row-->
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <!-- Row -->
                <form action=" {{ url('/delete/promotion/selection') }} " method="POST">
                    {{ csrf_field() }}
                <div class="row">
                <!-- Datatables -->
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <button type="submit" class="btn btn-danger btn-mini" id="deleteProduct">Hapus Pilihan</button>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush" id="dataTable2">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center" style="padding-right: 50px;"><input type="checkbox" class="selectall2"></th>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Start Date</th>
                                            <th>Finish Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comingsoonpromotion as $soon)
                                            <tr>
                                                <td class="text-center"><input type="checkbox" class="form-check-input selectbox2" name="product_checkbox[]" value=" {{ $soon->id }} "></td>
                                                <td> {{ $loop->iteration }} </td>
                                                <td> {{ $soon->title }} </td>
                                                <td> {{ date('d-m-Y H:i:s', strtotime($soon->date_start)) }} </td>
                                                <td> {{ date('d-m-Y H:i:s', strtotime($soon->date_start)) }} </td>
                                                <td>
                                                    <center>
                                                        <a href="{{ url('/admin/add/product/promotion/'.$soon->id) }}" class="btn btn-primary btn-mini">Detail</a>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- DataTable with Hover -->
                </div>
            </form>
                <!--Row-->
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <!-- Row -->
                <form action=" {{ url('/delete/promotion/selection') }} " method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                    <!-- Datatables -->
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <button type="submit" class="btn btn-danger btn-mini" id="deleteProduct">Hapus Pilihan</button>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable3">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center" style="padding-right: 50px;"><input type="checkbox" class="selectall3"></th>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Start Date</th>
                                                <th>Finish Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($finishpromotion as $finish)
                                                <tr>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input selectbox3" name="product_checkbox[]" value=" {{ $finish->id }} "></td>
                                                    <td> {{ $loop->iteration }} </td>
                                                    <td> {{ $finish->title }} </td>
                                                    <td> {{ date('d-m-Y H:i:s', strtotime($finish->date_start)) }} </td>
                                                    <td> {{ date('d-m-Y H:i:s', strtotime($finish->date_finish)) }} </td>
                                                    <td>
                                                        <center>
                                                            <a href="{{ url('/admin/add/product/promotion/'.$finish->id) }}" class="btn btn-primary btn-mini">Detail</a>
                                                        </center>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <!-- DataTable with Hover -->
                    </div>
                </form>
                <!--Row-->
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
        $('#dataTable1').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
    <script>
        $(document).ready(function () {
        $('#dataTable2').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
    <script>
        $(document).ready(function () {
        $('#dataTable3').DataTable(); // ID From dataTable
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
    <script type="text/javascript">
        $('.selectall2').click(function(){
            $('.selectbox2').prop('checked', $(this).prop('checked'));
        });
        $('.selectbox').change(function(){
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
        $('.selectall3').click(function(){
            $('.selectbox3').prop('checked', $(this).prop('checked'));
        });
        $('.selectbox3').change(function(){
            var total = $('.selectbox3').length();
            var number = $('.selectbox3:checked').length();
            if(total == number){
                $('.selectall3').prop('checked', true);
            }else{
                $('.selectall3').prop('checked', false);
            }
        })
    </script>
@endsection
