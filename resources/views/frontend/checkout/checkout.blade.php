@extends('frontend.layouts.design')
@section('judul')
    Checkout Barang
@endsection
@section('css')
    <link href="{{ asset ('css/frontend_css/shop/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/animate.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/main.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/frontend_css/shop/font-awesome.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Spartan' rel='stylesheet'>
    @include('frontend.checkout.style')
@endsection

@section('content')
<nav class="navbar navbar-expand-lg navbar-light">
    <a href=" {{ url('/') }} "><img src="{{ asset('images/logopds.png')}}" alt="paradisestore.id"></a>
</nav>
<div class="container checkout">
    <div class="row justify-content-center">
        <div class="shopper-informations col-md-12">
            <form action=" {{ url('delivery_address')}} " method="POST">
                {{ csrf_field() }}
                @if( Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="background-color: #F08080">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <center><strong>{!! session('flash_message_error') !!}</strong></center>
                    </div>
                @endif
                <div class="page-checkout col-md-8">
                    <p class="judul">Checkout</p>
                    <br>
                    <label>Alamat Pengiriman</label>
                    <hr>
                    <label> {{ $userDetails->name }} </label>
                    <p class="alamat-customer">
                        {{ $userDetails->alamat_lengkap }},
                        @if (empty($city->name_city))
                            -
                        @else
                        {{ $city->name_city }},
                        @endif

                        @if (empty($district->name_district))
                            -
                        @else
                        {{ $district->name_district }},
                        @endif
                        &nbsp;{{ $userDetails->kode_pos }}<br>
                        {{ $userDetails->phone }}
                    </p>
                    <hr>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Update Alamat Pengiriman</a>
                    <hr style="border-top: 5px solid #eee;">
                    @foreach ($cart_count_harga as $item)
                        <div class="media">
                            <img src=" {{ asset ('/images/backend_images/products/large/'.$item->image) }} " class="mr-5" alt="{{ $item->product_name }}" width="50px">
                            <div class="media-body">
                            <label class="mb-3">{{ $item->product_name }}</label>
                            <p style="margin:0;">Rp {{ number_format($item->price) }}</p>
                            <p> {{ $item->qty }} Barang ({{ $item->berat }} gram)</p>
                            </div>
                        </div>
                        <hr>
                        <p>Subtotal <label class="subtotal">Rp {{ number_format($item->qty*$item->price) }} </label></p>
                        <hr style="border-top: 5px solid #eee;">
                    @endforeach
                    <label class="btn btn-primary"><input type="radio" id="pilih_pengiriman" name="pilih_pengiriman" value="" required> Pilih Pengiriman</label>
                    <p style="display:none;" id="ekspedisi" class="mt-3">
                        <input type="checkbox" id="jne" name="courier" value="JNE"/>
                        <label for="jne">
                            <img src="{{ asset('images/jne1.png') }}">
                        </label>

                        <input type="checkbox" id="jnt" name="courier" value="J&T"/>
                        <label for="jnt">
                            <img src="{{ asset('images/jnt.png') }}">
                        </label>
                    </p>
                    <p class="ongkir"></p>
                </div>
                <div class="col-md-4 detail-belanja">
                    <p class="judul"> Ringkasan Belanja </p>
                    <?php $total_amount = 0; ?>
                    @foreach ($cart_count_harga as $carts)
                    <?php $total_amount = $total_amount + ($carts->price*$carts->qty); ?>
                    @endforeach
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-6 col-form-label">Total Harga Barang</label>
                        <div class="col-sm-2 col-form-price">
                            @if(!empty(Session::get('CoupunAmount')))
                                <input type="text" name="total_harga" readonly class="form-control-plaintext total" value="{{number_format($total_amount- Session::get('CoupunAmount'))}}">
                                <input type="hidden" name="total_harga" id="total" readonly class="form-control-plaintext total" value="{{$total_amount- Session::get('CoupunAmount')}}">
                            @else
                                <input type="text" name="total_harga" readonly class="form-control-plaintext total" value="Rp {{number_format($total_amount)}}">
                                <input type="hidden" name="total_harga" id="total" readonly class="form-control-plaintext total" value="{{$total_amount}}">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-6 col-form-label">Ongkos Kirim</label>
                        <div class="col-sm-2 col-form-price">
                          <input type="text" name="ongkir" id="ongkir_customer1" readonly class="form-control-plaintext ongkir">
                          <input type="hidden" name="ongkir" id="ongkir_customer" readonly class="form-control-plaintext ongkir">
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <label for="staticEmail" class="col-sm-6 col-form-label">Total Pembayaran</label>
                        <div class="col-sm-2 col-form-price">
                          <input type="text" name="pembayaran1" readonly class="form-control-plaintext grand_total" id="pembayaran1" value="">
                          <input type="hidden" name="pembayaran" readonly class="form-control-plaintext grand_total" id="pembayaran" value="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"> Pembayaran </button>
                </div>

            </form>

            <p id="service"></p>

        </div>
    </div>
</div>

@include('frontend.checkout._update_address')
@endsection

@section('script')
    <script src="{{ asset ('js/frontend_js/shop/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset ('js/frontend_js/shop/main.js') }}"></script>
    @include('frontend.account.script_address')
    <script>
        $(document).ready(function(){
          $("#jne").click(function(){
            $(".ongkir").html('<p>Service JNE</p><table class="table table-striped"><thead><tr><th></th><th scope="col">Service</th><th scope="col">Harga</th><th scope="col">Estimasi Waktu</th></tr></thead><tbody><?php for($i=0; $i<count($array_result["rajaongkir"]["results"][0]["costs"]); $i++){ ?><tr><td><input type="radio" name="price" class="price" id="price" onclick="displayResult(this.form)" value="<?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?>"></td><input type="hidden" name="service" class="service" value="<?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["service"] ?>"><td><?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["service"] ?></td><td><?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?></td><td><?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"] ?> Hari</td></tr><?php } ?></tbody></table><p>Note* : Jika ingin melakukan penambahan packing kayu dan asuransi silahkan hubungi atau chat customer service paradisestore.id</p>');
          });
          $("#jnt").click(function(){
            $(".ongkir").html('<p>Service JNT</p><table class="table table-striped"><thead><tr><th></th><th scope="col">Service</th><th scope="col">Harga</th><th scope="col">Estimasi Waktu</th></tr></thead><tbody><?php for($i=0; $i<count($array_result_jnt["rajaongkir"]["results"][0]["costs"]); $i++){ ?><tr><td><input type="radio" name="price" class="price" id="price" onclick="displayResult(this.form)" value="<?php echo $array_result_jnt["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?>"></td><input type="hidden" name="service" class="service" value="<?php echo $array_result_jnt["rajaongkir"]["results"][0]["costs"][$i]["service"] ?>"><td><?php echo $array_result_jnt["rajaongkir"]["results"][0]["costs"][$i]["service"] ?></td><td><?php echo $array_result_jnt["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?></td><td><?php echo $array_result_jnt["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"] ?> Hari</td></tr><?php } ?></tbody></table><p>Note* : Jika ingin melakukan penambahan packing kayu dan asuransi silahkan hubungi atau chat customer service paradisestore.id</p>');
          });
          $("#pilih_pengiriman").click(function(){
            $("#ekspedisi").show();
          });
        });
    </script>
    <script>
        function displayResult(frm){
            var selectedongkir="";
            var total = document.getElementById("total").value;
                for (i = 0; i < frm.price.length; i++){
                    if (frm.price[i].checked){
                        selectedongkir +=frm.price[i].value;
                    }
                }
                document.getElementById("ongkir_customer1").value="Rp "+(selectedongkir).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                document.getElementById("ongkir_customer").value=selectedongkir;
                document.getElementById("pembayaran1").value="Rp "+ (parseInt(selectedongkir)+parseInt(total)).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                document.getElementById("pembayaran").value=parseInt(selectedongkir)+parseInt(total);
            }
    </script>
    <script>
        $(document).ready(function(){
            $('.price').click(function(){
                $('.service').prop('checked', $(this).prop('checked'));
            });
        });
    </script>
@endsection
