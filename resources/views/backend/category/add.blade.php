@extends('backend.layout.master')

@section('css')

@endsection

@section('content')

<div class="container-fluid col-md-10" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Category Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('category') }}">Category</a></li>
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
    <!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-body">
            <form enctype="multipart/form-data" method="post" action="{{ url('admin_add_category') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="control-label">Nama Category</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="category_name" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Icon</label>
                      <input type="text" name="icon" class="form-control" >
                      <span>Ex: mobile-alt &nbsp;>>> &nbsp;<i class="fas fa-mobile-alt"></i></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label></label>
                        <p style="margin-top:20px;"><a href="https://fontawesome.com/icons?d=gallery">Klik Disini</a> Untuk Cek Daftar Icon </p>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label class="control-label">Upload Banner Category</label>
                    <input type="file" class="form-control" name="image">
                    <span class="help-block">Size : 1900 x 480 px</span>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="status" id="status" value="1">
                        <label class="custom-control-label" for="customControlAutosizing">Status</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
