@extends('frontend.layouts.design')
@section('judul')
    Login Paradisestore
@endsection
@section('css')
    @include('frontend.auth._style')
    <style>
        .copyright{
            position: absolute;
            bottom: 0;
        }
        @media only screen and (max-width: 600px) {
            .copyright{
                position: relative;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container login-padding">
        <div class="row">
            <div class="col-md-5 login">
            <div class="login-text">Masuk</div>

                @if( Session::has('error'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <center><strong style="color:red;">{!! session('error') !!}</strong></center>
                    </div>
                @endif

                <form class="mt-5 form-login" action="{{ url ('user_login') }}" method="POST">
                    {{ csrf_field() }}
                    <span>Selamat Datang Kembali !! Silahkan Login Untuk Mulai Belanja</span>

                    <div class="form-group mt-5">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <a href="{{ url('resend-activation') }}">
                            Resend OTP
                        </a>
                        <a href="{{ url('resend-activation') }}" style="float:right;">
                            Forgot Password
                        </a>
                    </div>

                    <button type="submit" class="btn btn-primary btn-login">Masuk</button>
                </form>
            </div>
            <div class="col-md-6 registrasi">
                <span class="atau">Atau</span>
                <div class="registrasi-text">Daftar</div>

                @if( Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <center><strong style="color:green;">{!! session('flash_message_success') !!}</strong></center>
                </div>
                @endif
                @if( Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background:#69f0ae;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <center><strong style="color:red;">{!! session('flash_message_error') !!}</strong></center>
                </div>
                @endif

                <form class="mt-5 form-registrasi" action="{{ url('register_user') }}" method="POST">
                    {{ csrf_field() }}
                    <span>Buat akun baru hari ini untuk mendapatkan diskon dan pengalaman seru di Paradisestore.id</span>

                    <div class="form-group text-name">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group text-name">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group text-name">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Saya Telah Membaca dan Menyetujui
                            <a href="">Kebijakan Privasi </a>dan
                            <a href="">Syarat dan Ketentuan </a>yang berlaku
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-daftar">Daftar</button>

                </form>
            </div>
        </div>
    </div>
@endsection


