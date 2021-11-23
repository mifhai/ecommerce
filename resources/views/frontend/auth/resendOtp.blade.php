@extends('frontend.layouts.design')
@section('judul')
    Resend OTP Paradisestore
@endsection

@section('css')
    <style>
        .resend{
            padding-top: 190px;
        }
        .copyright{
            position: absolute;
            bottom: 0;
        }
    </style>
@endsection

@section('content')
<div class="container resend">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Resend Activation Email</div>

                <div class="card-body">
                    <form method="POST" action=" {{ url('resend-activation')}} " id="loginForm" name="loginForm">
                        @csrf


                        @if( Session::has('error'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <center><strong style="color:red;">{!! session('error') !!}</strong></center>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Resend
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


