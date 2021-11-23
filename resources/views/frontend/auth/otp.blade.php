@extends('frontend.layouts.design')
@section('judul')
    Login Paradisestore
@endsection

@section('css')
<style>
    .otp{
        padding-top: 200px;
    }
    .copyright{
        position: absolute;
        bottom: 0;
    }
</style>

@endsection

@section('content')
<div class="container otp">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">OTP</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url ('activation-otp') }}" id="otp" name="otp">
                            @csrf


                            @if( Session::has('flash_message_error'))
                                <div class="alert alert-error alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <center><strong style="color:red;">{!! session('flash_message_error') !!}</strong></center>
                                </div>
                            @endif
                            @if( Session::has('flash_message_success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <center><strong style="color:green;">{!! session('flash_message_success') !!}</strong></center>
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="token_activation" class="col-md-4 col-form-label text-md-right">OTP</label>

                                <div class="col-md-6">
                                    <input id="token_activation" type="token_activation" class="form-control" name="token_activation" value="insert your OTP" required autocomplete="token_activation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        OKE
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
