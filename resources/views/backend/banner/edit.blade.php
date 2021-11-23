@extends('backend.layout.master')

@section('css')

@endsection

@section('content')

<div class="container-fluid col-md-10" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Banner</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('banner') }}">Banners</a></li>
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
            <form enctype="multipart/form-data" method="post" action="{{ url('/admin_edit_banner/'.$bannerDetails->id) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label">Position</label>
                        <select name="position" class="form-control" required>
                            <option value="">--Pilih Position--</option>
                            <option value="top">Top</option>
                            <option value="center">Center</option>
                            <option value="bottom">Bottom</option>
                        </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Title</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="title" id="title" value="{{ $bannerDetails->title}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Start Date</label>
                    <div class="controls">
                        <input type="date" class="form-control" name="start_date" value="{{ $bannerDetails->start_date}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">End Date</label>
                    <div class="controls">
                        <input type="date" class="form-control" name="end_date" value="{{ $bannerDetails->end_date}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Link</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="link" id="link" value="{{ $bannerDetails->link}}">
                    </div>
                </div>

                <div class="form-group mt-4">
                    <input type="file" name="image" id="image" class="form-control">
                    <input type="hidden" name="current_image" value="{{ $bannerDetails->image}}">
                    @if(!empty($bannerDetails->image))
                    <img style="width:80px;" src="{{ asset('/images/backend_images/banners/'.$bannerDetails->image)}}" alt=""><br>
                    @endif
                    <span class="help-block">position top & bottom : 1900 x 480 px</span><br>
                    <span class="help-block">position center : 1900 x 240 px</span>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" @if($bannerDetails->status=='1') checked @endif name="status" id="status" value="1">
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

