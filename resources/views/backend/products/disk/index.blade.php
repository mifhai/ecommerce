@extends('backend.layout.master')

@section('css')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Daftar Penyimpanan</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            <a href="" class="m-0 font-weight-bold btn btn-success" style="color:white;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle" style="margin-right:10px;"></i>Penyimpanan</a>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Penyimpanan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($disk as $item)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $item->name }} </td>
                        <td>
                            <center>

                                @if($item->status=='1')
                                <span class="btn btn-primary btn-mini"><i class="far fa-check-circle"></i></span>
                                @else
                                <span class="btn btn-danger btn-mini"><i class="fas fa-ban"></i></span>
                                @endif

                            </center>
                        </td>
                        <td>
                            <center>
                                <a href="" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#exampleModal1-{{ $item->id }}"><i class="far fa-edit"></i></a>
                                <a rel=" {{ $item->id }} " rel1="delete_disk" href="javascript:" class="btn btn-danger btn-mini deleteRecord" id="delBan"><i class="fas fa-trash-alt"></i></a>
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

<!-- Modal Add-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action=" {{ route('add.penyimpanan') }} " method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Type Penyimpanan</label>
                    <input type="text" class="form-control" name="disk" required>
                </div>
                <div class="controls" style="margin-bottom:20px;">
                    <label> Status</label>
                    <input type="checkbox" name="status" value="1"/>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@foreach ($disk as $disks)
<!-- Modal Edit-->
<div class="modal fade" id="exampleModal1-{{ $disks->id }}" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action=" {{ url('/admin_edit_disk/'.$disks->id) }} " method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Type Penyimpanan</label>
                    <input type="text" class="form-control" name="disk" value=" {{ $disks->name }} " required>
                </div>
                <div class="controls" style="margin-bottom:20px;">
                    <label> Status</label>
                    <input type="checkbox" name="status" @if($disks->status=='1') checked @endif value="1"/>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endforeach

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


