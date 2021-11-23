@extends('frontend.layouts.design')

@section('judul')
    Promotion {{ $promotiondetail->title }}
@endsection

@section('css')
    <style>
        .banner-promo{
            padding-top:100px;
            margin: 5px;
        }
        .banner-promo img{
            border-radius: 10px;
        }
        .product-promo{
            width: 102%;
            margin: auto;
        }
        .card_images{
            width: 60%;
            margin: auto;
            margin-top: 20px;
        }
        .card-body p{
            margin-bottom: 0;
        }
        .card-title{
            font-size: 18px;
            height: 50px;
            overflow: hidden;
            padding: 10px 20px 10px 20px;
            margin-top: 15px;
        }
        .price{
            text-decoration: line-through;
            color: red;
            font-size: 10px;
        }
        .diskon{
            font-size: 20px;
            font-weight: bold;
            color: black;
            margin-top: 20px;
        }
        .persen{
            width: 24%;
            border: 1px solid red;
            color: red;
            border-radius: 100%;
            padding: 3px;
            position: absolute;
            top: 10px;
            left: 5px;
        }
        .card-body{
            padding: 0;
        }
        .card-body a{
            width: 75%;
            position: relative;
            bottom: -20px;
            font-size: 12px;
        }
        .card-promo{
            width: 18%;
            margin: 10px;
            margin-bottom: 40px;
        }
        #clockdiv{
            width: 20%;
            margin: auto;
        }
        .smalltext{
            float: right;
        }
        .jam{
            border: 1px solid rgba(0,0,0,0.12);
            padding: 10px;
            background-color: #42a5f5;
            border-radius: 10px;
        }
        .coming{
            border: 1px solid rgba(0,0,0,0.12);
            padding: 10px;
            background-color: red;
            border-radius: 10px;
            color: white;
        }
        .jam-1{
            position: relative;
            right: 170%;
        }
        .jam-2{
            position: relative;
            bottom: 43px;
            right: 60%;
        }
        .jam-3{
            position: relative;
            bottom: 85px;
            left: 50%;
        }
        .jam-4{
            bottom: 128px;
            left: 160%;
        }
        .promo-jam{
            width: 25%;
            border: 1px solid rgba(0,0,0,0.12);
            padding-top: 50px;;
            position: relative;
            left: 38%;
            height: 140px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .pulse {
            display: block;
            cursor: pointer;
            animation: pulse 1s infinite;
        }
        .pulse:hover {
            animation: none;
        }

        @-webkit-keyframes pulse {
            0% {
                -webkit-box-shadow: 0px 0px 5px 0px rgba(227,242,253,1);
            }
            70% {
                -webkit-box-shadow: 0px 0px 5px 5px rgba(227,242,253,1);
            }
            100% {
                -webkit-box-shadow: 0px 0px 5px 10px rgba(227,242,253,1);
            }
        }
        @keyframes pulse {
            0% {
                -moz-box-shadow: 0px 0px 5px 0px rgba(227,242,253,1);
                box-shadow: 0px 0px 5px 0px rgba(227,242,253,1);
            }
            70% {
                -moz-box-shadow: 0px 0px 5px 5px rgba(227,242,253,1);
                box-shadow: 0px 0px 5px 5px rgba(227,242,253,1);
            }
            100% {
                -moz-box-shadow:  0px 0px 5px 10px rgba(227,242,253,1);
                box-shadow: 0px 0px 5px 10px rgba(227,242,253,1);
            }
        }

        .coming-soon{
            font-size: 12px;
            background-color: red;
        }
        h3{
            text-align: center;
            color: #00aeef;
            font-size: 40px;
            margin-top:30px;
        }

        @media only screen and (max-width: 600px) {
            .promo-jam{
                left: 8%;
                width: 93%;
                padding-top: 90px;
                bottom: 19px;
                margin: 0;
            }
            .jam{
                padding: 5px;
            }
            .jam-1{
                position: relative;
                right: 181%;
                bottom: 40px;
            }
            .jam-2{
                position: relative;
                bottom: 73px;
                right: 40px;
            }
            .jam-3{
                position: relative;
                bottom: 106px;
                left: 41px;
            }
            .jam-4{
                position: relative;
                bottom: 139px;
                left: 120px;
            }
            #clockdiv{
                width: 20%;
            }
            .card-promo{
                width: 43%;
                height: 222px;
            }
            .persen{
                width: 33%;
            }
            .banner-promo{
                padding-top: 50px;
            }
            .jam-diskon1{
                position: relative;
                right: 181%;
                bottom: 40px;
            }
            .jam-diskon2{
                position: relative;
                bottom: 73px;
                right: 40px;
            }
            .jam-diskon3{
                position: relative;
                bottom: 107px;
                left: 38px;
            }
            .jam-diskon4{
                position: absolute;
                bottom: 107px;
                left: 120px;
                width: 100%;
            }
            h3{
                font-size: 20px;
            }
            .coming{
                padding: 5px;
            }
            .card-title{
                font-size: 12px;
                margin: 0;
                height: 40px;
                margin-bottom: 5px;
            }
            .diskon{
                margin: 0;
                font-size: 16px;
            }
            .card-body a{
                bottom: -5px;
            }
        }
    </style>
@endsection

@section('content')

    <div id="carouselExampleSlidesOnly" class="carousel slide banner-promo" data-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
                @if (empty($promotiondetail->banner))
                    <img src="http://placehold.it/1920x480" class="d-block w-100" alt="{{ $promotiondetail->title }}">
                @else
                    <img src=" {{ asset('images/backend_images/promotion/banner/'.$promotiondetail->banner) }} " class="d-block w-100" alt="{{ $promotiondetail->title }}">
                @endif
        </div>
        </div>
    </div>

    @if (new DateTime() > new DateTime($promotiondetail->date_start.' '.$promotiondetail->time_start))
    <h3>SEDANG BERLANGSUNG</h3><br>
        @if($promotiondetail->time_start != NULL && $promotiondetail->time_finish != NULL)
            <div class="row mt-3" style="width: 100%;">
                <div class="promo-jam pulse">
                    <div id="clockdiv">
                        <div class="jam jam-1">
                            <span class="days"></span>
                            <div class="smalltext">Hari</div>
                        </div>
                        <div class="jam jam-2">
                            <span class="hours"></span>
                            <div class="smalltext">Jam</div>
                        </div>
                        <div class="jam jam-3">
                            <span class="minutes"></span>
                            <div class="smalltext">Menit</div>
                        </div>
                        <div class="jam jam-4">
                            <span class="seconds"></span>
                            <div class="smalltext">Detik</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="container mb-5 mt-3">
            <div class="row product-promo text-center">
                @foreach ($promotionproduct as $product)
                <div class="card card-promo">
                    @if (empty($product->images))
                        <img src="http://placehold.it/300x300" class="card-img-top" alt=" {{ $product->product_name }} ">
                    @else
                        <img src=" {{ asset('images/backend_images/products/large/'.$product->images) }} " class="card_images" alt=" {{ $product->product_name }} ">
                    @endif
                    <p class="persen"> {{ $product->persen }}% </p>
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->product_name }}</h5>
                      <p class="card-text diskon">Rp {{ number_format($product->diskon) }} </p>
                      <p class="card-text price">Rp {{ number_format($product->price) }} </p>
                      <a href=" {{ $product->product() }} " class="btn btn-primary">BELI</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <h3>AKAN DATANG</h3><br>
        @if($promotiondetail->time_start != NULL && $promotiondetail->time_finish != NULL)
            <div class="row" style="width: 100%;">
                <div class="promo-jam pulse">
                    <div id="clockdiv">
                        <div class="coming jam-1 jam-diskon1">
                            <span class="days"></span>
                            <div class="smalltext">Hari</div>
                        </div>
                        <div class="coming jam-2 jam-diskon2">
                            <span class="hours"></span>
                            <div class="smalltext">Jam</div>
                        </div>
                        <div class="coming jam-3 jam-diskon3">
                            <span class="minutes"></span>
                            <div class="smalltext">Menit</div>
                        </div>
                        <div class="coming jam-4 jam-diskon4">
                            <span class="seconds"></span>
                            <div class="smalltext">Detik</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="container mb-5 mt-3">
            <div class="row product-promo text-center">
                @foreach ($promotionproduct as $product)
                <div class="card card-promo">
                    @if (empty($product->images))
                        <img src="http://placehold.it/300x300" class="card-img-top" alt=" {{ $product->product_name }} ">
                    @else
                        <img src=" {{ asset('images/backend_images/products/large/'.$product->images) }} " class="card_images" alt=" {{ $product->product_name }} ">
                    @endif
                    <p class="persen"> {{ $product->persen }}% </p>
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->product_name }}</h5>
                      <p class="card-text diskon">Rp {{ number_format($product->diskon) }} </p>
                      <p class="card-text price">Rp {{ number_format($product->price) }} </p>
                      <a href="#" class="btn btn-primary coming-soon">COMING SOON</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection

@section('script')
<script type="text/javascript">
    function getTimeRemaining(endtime) {
      var t = Date.parse(endtime) - Date.parse(new Date());
      var seconds = Math.floor((t / 1000) % 60);
      var minutes = Math.floor((t / 1000 / 60) % 60);
      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
      var days = Math.floor(t / (1000 * 60 * 60 * 24));
      return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
      };
    }

    function initializeClock(id, endtime) {
      var clock = document.getElementById(id);
      var daysSpan = clock.querySelector('.days');
      var hoursSpan = clock.querySelector('.hours');
      var minutesSpan = clock.querySelector('.minutes');
      var secondsSpan = clock.querySelector('.seconds');

      function updateClock() {
        var t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
          @if (new DateTime() > new DateTime($promotiondetail->date_start.' '.$promotiondetail->time_finish))
              window.location = "{{ route('promotion-frontend') }}";
          @else
              location.reload();
          @endif

        }
      }

      updateClock();
      var timeinterval = setInterval(updateClock, 1000);

      //var expired = window.setInterval(function(){ if($("*:contains('00:00')").length > 0){ document.location.reload(true); } }, 1000);
    }

    @if (new DateTime() > new DateTime($promotiondetail->date_start.' '.$promotiondetail->time_start))
        @if($promotiondetail->time_start != NULL && $promotiondetail->time_finish != NULL)
            // var deadline_old = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
            var deadline = new Date({{ strtotime($promotiondetail->date_finish.' '.$promotiondetail->time_finish)*1000 }});
            initializeClock('clockdiv', deadline);
        @endif
    @else
        @if($promotiondetail->time_start != NULL && $promotiondetail->time_finish != NULL)
            // var deadline_old = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
            var deadline = new Date({{ strtotime($promotiondetail->date_start.' '.$promotiondetail->time_start)*1000 }});
            initializeClock('clockdiv', deadline);
        @endif
    @endif


</script>
@endsection
