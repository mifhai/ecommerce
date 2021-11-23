    @if(Request::segment(1) == '')
    {{-- quality --}}
    <div class="viewed mt-3 hidden_media">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="col-md-3 col-xs-6 quality">
                        <p style="color: black;font-weight: bold;">
                            <img src=" {{ asset('images/pengiriman.png') }} " alt="pengiriman" class="mb-3" ><br>
                            Jaminan Pengiriman <br>
                            <p style="padding: 0 20px 0 20px;font-size: 10px;">Pengiriman aman dilengkapi dengan asuransi dan extra packing kayu</p>
                        </p>
                    </div>
                    <div class="col-md-3 col-xs-6 quality" style="border-right: 1px solid rgba(0,0,0,0.12); height: 170px;">
                        <p style="color: black;font-weight: bold;">
                            <img src=" {{ asset('images/keamanan.png') }} " alt="keamanan" class="mb-3"><br>
                            Jaminan Keamanan <br>
                            <p style="padding: 0 20px 0 20px;font-size: 10px;">Transaksi aman dengan 3D Secure. dilengkapi beberapa pilihan cara pembayaran</p>
                        </p>
                    </div>
                    <div class="col-md-3 col-xs-6 quality" style="border-right: 1px solid rgba(0,0,0,0.12);height: 170px;">
                        <p style="color: black;font-weight: bold;">
                            <img src=" {{ asset('images/kepuasan.png') }} " alt="kepuasan" class="mb-3"><br>
                            Jaminan Kepuasan <br>
                            <p style="padding: 0 20px 0 20px;font-size: 10px;">Garansi 7 hari penggantian unit baru, setelah penerimaan barang</p>
                        </p>
                    </div>
                    <div class="col-md-3 col-xs-6 quality" style="border-right: 1px solid rgba(0,0,0,0.12);height: 170px;">
                        <p style="color: black;font-weight: bold;">
                            <img src=" {{ asset('images/keaslian.png') }} " alt="keaslian" class="mb-3"><br>
                            Jaminan Keaslian <br>
                            <p style="padding: 0 20px 0 20px;font-size: 10px;">Produk terbaik dengan garansi resmi dan didukung service center resmi</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- quality mobile--}}
    <div class="viewed mt-3 show_media">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="quality">
                        <p style="color: black;font-weight: bold;">
                            <img src=" {{ asset('images/pengiriman.png') }} " alt="pengiriman" style="margin-bottom:18px;" width="30%"><br>
                            Jaminan Pengiriman
                        </p>
                    </div>
                    <div class="quality" style="border-right: 1px solid rgba(0,0,0,0.12);">
                        <p style="color: black;font-weight: bold;">
                            <img src=" {{ asset('images/keamanan.png') }} " alt="keamanan" class="mb-3" width="32%"><br>
                            Jaminan Keamanan
                        </p>
                    </div>
                    <div class="quality" style="border-top: 1px solid rgba(0,0,0,0.12);">
                        <p style="color: black;font-weight: bold;">
                            <img src=" {{ asset('images/kepuasan.png') }} " alt="kepuasan" class="mb-3" width="30%"><br>
                            Jaminan Kepuasan
                        </p>
                    </div>
                    <div class="quality" style="border-top: 1px solid rgba(0,0,0,0.12);border-right: 1px solid rgba(0,0,0,0.12);">
                        <p style="color: black;font-weight: bold;">
                            <img src=" {{ asset('images/keaslian.png') }} " alt="keaslian" class="mb-3" width="30%"><br>
                            Jaminan Keaslian
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}
    <div class="viewed">
        <div class="container">
            <div class="row footer-area-widget">
                <div class="col-md-3 pembayaran mb-4 hidden_media">
                    <p>Metode Pembayaran</p>
                    <div class="col-xs-6"><img src="{{ asset('images/vostpay.jpg') }}" alt=""></div>
                    <div class="col-xs-6"><img src="{{ asset('images/gopays.jpg') }}" alt=""></div>
                    <div class="col-xs-6"><img src="{{ asset('images/alto.png') }}" alt="" ></div>
                    <div class="col-xs-6"><img src="{{ asset('images/atm-bersama.png') }}" alt=""></div>
                    <div class="col-xs-6"><img src="{{ asset('images/kredivo.png') }}" alt=""></div>
                    <div class="col-xs-6"><img src="{{ asset('images/masterCard.png') }}" alt=""></div>
                    <div class="col-xs-6"><img src="{{ asset('images/prima.png') }}" alt=""></div>
                    <div class="col-xs-6"><img src="{{ asset('images/visa.png') }}" alt=""></div>
                </div>
                <div class="col-md-3 pembayaran mb-4 hidden_media">
                    <p>Keamanan Berbelanja</p>
                    <div class="col-xs-6"><img src="{{ asset('images/idea.png') }}" alt=""></div>
                    <div class="col-xs-6"><img src="{{ asset('images/masterCardSecure.png') }}" alt=""></div>
                    <div class="col-xs-6"><img src="{{ asset('images/verifiedVisa.png') }}" alt="" ></div>
                    <div class="col-xs-6"><img src="{{ asset('images/midtrans.jpg') }}" alt="" ></div>
                    <p class="mt-3">Jenis Pengiriman</p>
                    <div class="col-xs-6"><img src="{{ asset('images/jne.png') }}" alt=""></div>
                    <div class="col-xs-6"><img src="{{ asset('images/jt.png') }}" alt="" ></div>
                </div>
                <div class="col-md-2">
                    <p> Informasi</p>
                    <ul>
                        <li><a href="">Tracking</a></li>
                        <li><a href="">Cek Garansi</a></li>
                        <li><a href="">Konfirmasi Pembayaran</a></li>
                        <li><a href="">Panduan</a></li>
                        <li><a href="">Hubungi Kami</a></li>
                        <li><a href="">Toko</a></li>
                        <li><a href="">Gallery</a></li>
                        <li><a href="http://paradisestore.org/">Blog</a></li>
                        <li><a href="">Service Center</a></li>
                        <li><a href="">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <p>Kontak Informasi</p>
                    <ul>
                        <li><a href="https://www.google.com/maps/place/6%C2%B009'36.7%22S+106%C2%B048'48.2%22E/@-6.160182,106.8111923,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d-6.160182!4d106.813381"><i class="fas fa-map-marker-alt"></i> &nbsp;&nbsp;&nbsp;Paradisestore Indonesia</li></a>
                        <li><i class="far fa-comments"></i> &nbsp;+6281296334456 (Call & Whatsapp)</li>
                        <li><i class="fas fa-phone-volume"></i> &nbsp;&nbsp; +62 21 29 82 83 84 (Ext. 422)</li>
                        <li><i class="fas fa-envelope-open-text"></i> &nbsp;&nbsp;info@paradisestore.id</li>
                        <li>
                            <img src=" {{ asset('images/cti.png') }} " alt="">
                        </li>
                    </ul>
                </div>
                <div style="padding-left: 10px;">
                    <p>Sosial Media</p>
                    <ul>
                        <li><a href=""><i class="fab fa-facebook"></i> &nbsp;Facebook</a></li>
                        <li><a href=""><i class="fab fa-instagram"></i> &nbsp;Instagram</a></li>
                        <li><a href=""><i class="fab fa-twitter-square"></i> &nbsp;Twitter</a></li>
                        <li><a href=""><i class="fas fa-at"></i> &nbsp;Email</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer viewed hidden_media">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src=" {{ asset('images/parko1.png') }} " alt="parko.png" width="70%">
                </div>

                <div class="col-md-10 text-justify">
                    <p style="font-size: 18px;font-weight: bold;color: black;">Situs Belanja Online Terpercaya di Indonesia</p>
                    <p>Paradisestore.id adalah situs belanja online (e-commerce) terpercaya di Indonesia yang bernaung dibawah CTI Group. Kami memberikan fasilitas pelayanan yang terbaik untuk mendukung Anda belanja online dengan aman, nyaman dan terpercaya .</p>
                    <p>Paradisestore.id menawarkan beragam kemudahan untuk bertransaksi, seperti transfer antar bank, cicilan kartu kredit, O2O (Online-to-Offline), cicilan tanpa kartu kredit, pembayaran via gerai alfamart, alfamidi, Klikpay BCA, E-pay BRI, Kredivo dan metode lainnya.</p>
                    <p>Paradisestore.id menyediakan ratusan pilihan produk dengan harga terbaik dari segala kebutuhan IT (Teknologi), mulai dari notebook, laptop, kamputer, pc, desktop pc, pc all-in-one, layar, monitor, mouse, gaming gear, headset, earphone, smartphone, android phone, gadget dan masih banyak lagi; yang berasal dari brand ternama dunia seperti Lenovo, HP, Dell, Asus, BenQ, Logitech, Razer, HyperX, JBL, Mcafee,Microsoft,MSI, Gigabyte, Oppo, Remax, Samsung, Sandisk, Sennheiser, Targus, Xiaomi, Zowie, dan akan terus bertambah. Kami juga menawarkan 24 jam non-stop discount dan promo menarik setiap harinya, serta berbagai voucher diskon yang bekerjasama dengan vendor ternama seperti Gojek (Go-Point). Dengan begini, belanja online murah, aman dan berkuaalitas bisa jadi pilihan menarik yang sayang jika Anda lewatkan.</p>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer -->
    <footer class="footer viewed show_media" style="padding:0;">
        <div class="container">
            <div class="row">
                <div class="media text-justify m-3">
                    <div class="media-body">
                        <img src="{{ asset('images/parko1.png') }} " alt="parko.png" width="30%" style="float:left; margin-right:10px;"><p style="font-size: 18px;font-weight: bold;color: black; text-align:justify;">Situs Belanja Online Terpercaya di Indonesia</p>
                        <p>Paradisestore.id adalah situs belanja online (e-commerce) terpercaya di Indonesia yang bernaung dibawah CTI Group. Kami memberikan fasilitas pelayanan yang terbaik untuk mendukung Anda belanja online dengan aman, nyaman dan terpercaya .</p>
                        <p>Paradisestore.id menawarkan beragam kemudahan untuk bertransaksi, seperti transfer antar bank, cicilan kartu kredit, O2O (Online-to-Offline), cicilan tanpa kartu kredit, pembayaran via gerai alfamart, alfamidi, Klikpay BCA, E-pay BRI, Kredivo dan metode lainnya.</p>
                        <p>Paradisestore.id menyediakan ratusan pilihan produk dengan harga terbaik dari segala kebutuhan IT (Teknologi), mulai dari notebook, laptop, kamputer, pc, desktop pc, pc all-in-one, layar, monitor, mouse, gaming gear, headset, earphone, smartphone, android phone, gadget dan masih banyak lagi; yang berasal dari brand ternama dunia seperti Lenovo, HP, Dell, Asus, BenQ, Logitech, Razer, HyperX, JBL, Mcafee,Microsoft,MSI, Gigabyte, Oppo, Remax, Samsung, Sandisk, Sennheiser, Targus, Xiaomi, Zowie, dan akan terus bertambah. Kami juga menawarkan 24 jam non-stop discount dan promo menarik setiap harinya, serta berbagai voucher diskon yang bekerjasama dengan vendor ternama seperti Gojek (Go-Point). Dengan begini, belanja online murah, aman dan berkuaalitas bisa jadi pilihan menarik yang sayang jika Anda lewatkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @endif

    <!-- Just an image -->
    <nav class="navbar navbar-light show_media navbar-bottom">
        @if(Auth::check())
        <a class="navbar-brand" href="{{ url('account')}}" style="border-right: 1px solid white;">
            <i class="fas fa-user"></i>
        </a>
        @else
        <a class="navbar-brand" href="{{ url ('userLogin') }}" style="border-right: 1px solid white;">
            <i class="fas fa-user"></i>
        </a>
        @endif
        <a class="navbar-brand" href="#" data-toggle="modal" data-target="#exampleModal1" style="border-right: 1px solid white;">
            <i class="fas fa-search"></i>
        </a>
        <a class="navbar-brand" href="{{ url('/cart-order')}}" style="border-right: 1px solid white;">
            <i class="fas fa-cart-plus"></i>
        </a>
        @if(Auth::check())
        <div class="cart_count_mobile"><span> {{ count($cart) }} </span></div>
        @else
        <div class="cart_count_mobile"><span> 0 </span></div>
        @endif
        <a class="navbar-brand" href=" {{ url('/') }} ">
            <i class="fas fa-home"></i>
        </a>
    </nav>

    <!-- Modal search-->
    <div class="modal fade" id="exampleModal1" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action=" {{ route('search') }} " class="header_search_form clearfix">
                        <input type="text" name="search" required="required" class="header_search_input" placeholder=" Cari Produk Yang Kamu Inginkan . . . . ">
                        <button type="submit" class="header_search_button trans_300" value="Submit"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="copyright_container align-items-center justify-content-start text-center" >
                        <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> paradisestore.id | All Right Reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
