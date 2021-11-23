@extends('backend.layout.master')

@section('css')

@endsection

@section('content')

<div class="container-fluid col-md-10" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Setting</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
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
            <form enctype="multipart/form-data" method="post" action="{{ url('admin_update_password') }}">
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


                <hr>
                <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function(){
    $('#pwd_baru').click(function(){
        var pwd_lama = $('#pwd_lama').val();
            $.ajax({
                type : 'get',
                url :'admin_login/check-pwd',
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

