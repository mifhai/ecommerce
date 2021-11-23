<!DOCTYPE html>
<html lang="id">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Back Office | Paradisestore</title>
  <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('admin/css/ruang-admin.css')}}" rel="stylesheet">
  <style>
    .bg-gradient-login{
        background-image: url('https://cdn.pixabay.com/photo/2016/04/21/13/27/computer-1343393_1280.jpg');
        background-size: cover;
    }

    .card{
      top: 31%;
    }

  </style>

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm my-5">
            <div class="card-body p-0">
                <div class="row">
                <div class="col-lg-12">
                    <div class="login-form">
                    <div class="text-center">
                        <img src=" {{ asset('images/logo_pds.png')}} " alt="">
                        <h1 class="h5 text-gray-900 mb-4 mt-4">Login Session</h1>
                    </div>
                    @if( Session::has('flash_message_error'))
                        <div class="alert alert-error alert-block" style="background:#69f0ae;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <center><strong style="color:red;">{!! session('flash_message_error') !!}</strong></center>
                        </div>
                    @endif
                    @if( Session::has('flash_message_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <center><strong>{!! session('flash_message_success') !!}</strong></center>
                        </div>
                    @endif
                    <form class="user" method="POST" action="{{ url('admin/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                            placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember
                                Me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Login">
                        </div>
                        <div class="text-center mt-5">
                            <p class="font-weight-bold small">Paradise Store Indonesia &copy; <script>document.write(new Date().getFullYear());</script><br> All RIGHT RESERVED.</p>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
  <!-- Login Content -->
  <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('admin/js/ruang-admin.min.js')}}"></script>
</body>

</html>
