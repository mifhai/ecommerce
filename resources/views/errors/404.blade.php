<!DOCTYPE html>
<html>
<head>
    <title>Page not found - 404</title>
    <style>
        .row{
            width: fit-content;
            margin: auto;
        }
        h1{
            position: absolute;
            top: 30%;
            right: 28%;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <img src=" {{ asset('images/4040.png') }} " alt="notfound">
            <h1>Back To <a href=" {{ url('/') }} ">Home</a></h1>
        </div>
    </div>
</body>
</html>
