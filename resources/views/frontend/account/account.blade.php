@extends('frontend.layouts.design')
@section('judul')
    Account
@endsection
@section('css')
    @include('frontend.auth._style')
    <style>
        @media only screen and (max-width: 600px) {
            .copyright{
                position: relative;
            }
        }
    </style>
@endsection

@section('content')
<div class="container account">
    <div class="row">
        @include('frontend.account._sidebar_account')
        <div class="col-md-9 profil">
            <div class="desc">
                <p class="profil-saya">Profil Saya</p>
                <label>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</label>
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
            {{-- Image --}}
            @if (empty($userDetails->images))
                <img src="http://placehold.it/100x100" class="mr-3" alt="{{ $userDetails->name }}">
            @else
                <img src=" {{ asset('images/user/'.$userDetails->images) }} " class="mr-3" alt="{{ $userDetails->name }}" width="20%">
            @endif

            <div class="mt-5 mb-5 alamat">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $userDetails->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $userDetails->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": xxxxxxxxxxxxxx">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">KTP</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $userDetails->ktp }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">No HP/Telp</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $userDetails->phone }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" @if(empty($province->name_province)) value=":" @else value=": {{ $province->name_province }}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" @if(empty($city->name_city)) value=":" @else value=": {{ $city->name_city }}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" @if(empty($district->name_district)) value=":" @else value=": {{ $district->name_district }}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Kode Pos</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $userDetails->kode_pos }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": {{ $userDetails->alamat_lengkap }}">
                    </div>
                </div>
                <a href="" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal" style="background:#0e8ce4; color:white;"> Update Profil</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    @include('frontend.account.script_address');
@endsection


