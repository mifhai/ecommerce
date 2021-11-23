@extends('backend.layout.master')

@section('css')
<style>
    .promo{
        margin: auto;
    }
    .submit-btn{
        float: right;
    }
</style>
@endsection

@section('content')

<!-- Container Fluid-->
<div class="container-fluid col-md-10 promo" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-tags" style="color:#ff9800"></i> Buat Promo Diskon Terbaru</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
            <li class="breadcrumb-item"><a href=" {{ route('promotion') }} ">Promotion</a></li>
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-body">
            <form enctype="multipart/form-data" method="post" action=" {{ route('post.promotion') }} ">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="control-label">Title</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="title" value=" {{ old ('title') }} " required>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label class="control-label">Image</label>
                    <input type="file" class="form-control" name="image" required>
                    <span class="help-block">Size : 300 x 300 px</span>
                </div>

                <div class="form-group mt-4">
                    <label class="control-label">Banner Promotions</label>
                    <input type="file" class="form-control" name="banner" required>
                    <span class="help-block">Size : 1900 x 480 px</span>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Start Date</label>
                      <input type="date" class="form-control" name="date_start" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Jam</label>
                      <input type="time" class="form-control" name="jam_start" required>
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                      <label>Finish Date</label>
                       <input type="date" class="form-control" name="date_finish" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Jam</label>
                      <input type="time" class="form-control" name="jam_finish" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="status" id="status" value="1">
                        <label class="custom-control-label" for="customControlAutosizing">Status</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success submit-btn">Submit  &nbsp; <i class="fas fa-arrow-circle-right"></i></button>
                <a href="{{ route('promotion') }}" type="submit" class="btn btn-secondary submit-btn" style="margin-right: 10px;"><i class="fas fa-arrow-circle-left"></i> &nbsp; Back</a>
            </form>
        </div>
    </div>
</div>
<!---Container Fluid-->

@endsection

@section('script')

@endsection
