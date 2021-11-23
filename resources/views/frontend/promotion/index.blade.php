@extends('frontend.layouts.design')

@section('judul')
    Promotions
@endsection

@section('css')
<style>
    .judul-promo{
        width: fit-content;
        margin: auto;
        font-size: 20px;
    }
    .display-promo{
        width: 50%;
        margin: auto;
    }
    .card-img-top{
        width: 90%;
        margin: auto;
        margin-top: 15px;
    }
    .card-title{
        font-size: 20px;
        height: 26px;
        overflow: hidden;
    }
    .copyright{
        position: absolute;
        bottom: 0;
    }
    .card{
        width: 30%;
        margin: 10px;
    }
    .promotion-list{
        padding-top: 80px;
    }
    @media only screen and (max-width: 600px) {
        .card{
            width: 48%;
            margin: 2px;
        }
        .display-promo{
            width: 100%;
            margin: auto;
        }
        .card-text{
            height: 65px;
        }
        .promotion-list{
            padding-top: 20px;
        }
    }

</style>
@endsection

@section('content')
@if (count($promotions) > 2)
    <style>
        @media only screen and (max-width: 600px) {
            .copyright{
                position: relative;
            }
        }
    </style>
@else
    <style>
        @media only screen and (max-width: 600px) {
            .copyright{
                position: absolute;
                bottom: 0;
            }
        }
    </style>
@endif

    <div class="container mt-5 mb-5 promotion-list">
        <div class="judul-promo mb-3">
            <span>Saat Ini Tersedia {{ $promotions->count() }} Promotion  </span>
        </div>
        <div class="row display-promo text-center">
            @foreach ($promotions as $promotion)
            <div class="card">
                @if (empty($promotion->images))
                    <img src="http://placehold.it/300x300" class="card-img-top" alt="{{ $promotion->name }}">
                @else
                    <img src=" {{ asset('images/backend_images/promotion/image/'.$promotion->images) }} " class="card-img-top" alt="{{ $promotion->name }}">
                @endif

                <div class="card-body">
                  <h5 class="card-title"> {{ $promotion->title }} </h5>
                  <p class="card-text" style="font-size:10px;"><i class="far fa-clock"></i> {{ $promotion->date_start }} | {{ $promotion->time_start }} <br> s/d <br><i class="far fa-clock"></i> {{ $promotion->date_finish }} | {{ $promotion->time_finish }}</p>
                  <a href=" {{ $promotion->promotion() }} " class="btn btn-primary" style="width:100%; font-size:12px;">DETAIL</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection

@section('script')

@endsection
