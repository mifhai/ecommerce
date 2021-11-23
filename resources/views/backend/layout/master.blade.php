<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('images/parko.png') }}" rel="icon">
    <title>Admin | Paradisestore</title>
        <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/css/ruang-admin.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
         @yield('css')
         <style>
             label{
                font-family: cursive;
                font-weight: bold;
             }
         </style>
    </head>
    <body id="page-top">

    @include('backend.layout.sidebar')

    @include('backend.layout.header')

    @yield('content')

    @include('backend.layout.footer')

    <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('admin/js/ruang-admin.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(".deleteRecord").click( function(){
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                title: 'Apakah Kamu yakin?',
                text: "Setelah di Hapus Tidak Dapat Dikembalikan Lagi!!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok, Hapus!'
            },
            function(){
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });
    </script>
    @yield('script')
    </body>
</html>
