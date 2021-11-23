@extends('frontend.layouts.design')

@section('judul')
    Account
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

<div class="container account">
    <div class="row">
        @include('frontend.account._sidebar_account')
        <div class="col-md-9 profil">
            <div class="desc">
                <p class="profil-saya">Update Password</p>
                <label>Update Password Anda Secara Berkala Untuk Menghidari Hal Yang Tidak Diinginkan</label>
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

            <form class="update-password col-md-6" enctype="multipart/form-data" method="post" action=" {{ url('/update-password-user') }} ">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="control-label">Password Lama</label>
                    <div class="controls">
                        <input type="password" class="form-control" name="pwd_lama" id="pwd_lama" required>
                        <span id="chkPwd"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Password Baru</label>
                    <div class="controls">
                        <input type="password" class="form-control" name="pwd_baru" id="pwd_baru" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Confirm Password</label>
                    <div class="controls">
                        <input type="password" class="form-control" name="pwd_confirm" id="pwd_confirm" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
@include('frontend.account.script_address');
<script>
    $(document).ready(function(){
        $('#pwd_baru').click(function(){
            var pwd_lama = $('#pwd_lama').val();
                $.ajax({
                    type : 'get',
                    url :'/update-password',
                    data : {pwd_lama:pwd_lama},
                    success:function(resp){
                        // alert (resp);
                        if(resp == "false"){
                            $('#chkPwd').html("<font color='red'>Password Salah, Silahkan Masukkan Password Yang Benar!!</font>");
                        }else if(resp == "true"){
                            $('#chkPwd').html("<font color='green'>Password Benar!!</font>");
                        }
                    }, error:function(){
                        alert ('Error');
                    }
            });
        });
    });
    </script>
@endsection


