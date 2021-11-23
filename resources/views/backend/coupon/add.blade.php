@extends('backend.layout.master')

@section('css')

@endsection

@section('content')

<div class="container-fluid col-md-10" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Coupon</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('coupon') }}">Coupons</a></li>
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
            <form enctype="multipart/form-data" method="post" action="{{ url('admin_add_coupon') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="control-label">Coupon Code</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="coupon_code" minlength="5" maxlength="15" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Nilai Coupon</label>
                    <div class="controls">
                        <input type="number" class="form-control" min="0" name="amount" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Amount Type</label>
                    <select name="amount_type" class="form-control" required>
                        <option>--Type--</option>
                        <option value="percentage">Percentage (%)</option>
                            <option value="fixed">Fixed (Rp)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Expired Date</label>
                    <div class="controls">
                        <input type="date" name="expired_date" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="status" id="status" value="1">
                        <label class="custom-control-label" for="customControlAutosizing">Status</label>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
