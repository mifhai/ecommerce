{{-- @extends('backend.layouts.design')
@section('judul')
    Edit Kategori
@endsection
@section('content')


<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Category</a> <a href="#" class="current">Edit Category</a> </div>
      <h1>Category</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Edit Category</h5>
            </div>
            <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin_edit_category/'.$categoryDetail->id) }}" name="edit_category" id="edit_category" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="control-group">
                  <label class="control-label">Category Name</label>
                  <div class="controls">
                    <input type="text" name="category_name" id="category_name" value="{{ $categoryDetail->name }}">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Description</label>
                  <div class="controls">
                    <textarea type="text" name="desc" id="desc">{{ $categoryDetail->description }}</textarea>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">URL</label>
                  <div class="controls">
                    <input type="text" name="url" id="url" value="{{ $categoryDetail->url }}">
                  </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Active</label>
                    <div class="controls">
                      <input type="checkbox" name="status" id="status" @if($categoryDetail->status=='1') checked @endif value="1">
                    </div>
                  </div>

                <div class="form-actions">
                  <input type="submit" value="Edit Category" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection --}}
@extends('backend.layout.master')

@section('css')

@endsection

@section('content')

<div class="container-fluid col-md-10" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Category Product</h1>
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
            <form enctype="multipart/form-data" method="post" action="{{ url('/admin_edit_category/'.$categoryDetail->id) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="control-label">Nama Category</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="category_name" value="{{ $categoryDetail->name }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Icon</label>
                      <input type="text" name="icon" class="form-control" value=" {{ $categoryDetail->icon }} " >
                      <span>Ex: mobile-alt &nbsp;>>> &nbsp;<i class="fas fa-mobile-alt"></i></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label></label>
                        <p style="margin-top:20px;"><a href="https://fontawesome.com/icons?d=gallery">Klik Disini</a> Untuk Cek Daftar Icon </p>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label class="control-label">Banner Category</label>
                    <input type="file" class="form-control" name="image">
                    <input type="hidden" name="current_image" value="{{ $categoryDetail->images}}">
                    @if(!empty($categoryDetail->images))
                    <img class="mt-3" src="{{ asset('/images/backend_images/category/small/'.$categoryDetail->images)}}" alt=""><br>
                    @endif
                    <span class="help-block">Size : 1900 x 480 px</span>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" @if($categoryDetail->status=='1') checked @endif name="status" id="status" value="1">
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

