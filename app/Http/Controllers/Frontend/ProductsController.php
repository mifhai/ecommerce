<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Category;
use App\Product;
use App\Brand;
use App\ProductsImage;
use App\ProductsAttribute;
use App\Coupon;
use App\User;
use App\Province;
use App\DeliveryAddress;
use App\Order;
use App\OrderProduct;
use App\Processor;
use App\Model\ProductPromotion;
use App\Model\Promotion;
use App\Model\Disk;
use App\Model\Layar;
use App\Model\Cart;
use App\Model\SessionOrder;
use App\Model\MidtransPayment;
use App\Model\BuktiTransfer;
use App\Model\City;
use App\Model\District;
use DB;
use Auth;
use Image;
use Session;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;

class ProductsController extends Controller
{
    public function category($id)
    {
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productBrand = Brand::orderBy('created_at', "DESC")->get();
        $categoryDetails = Category::where('id',$id)->first();
        $productsAll = Product::where('status', true)->where(['category_product'=> $categoryDetails->name])->paginate(25);
        $productsCode = Product::inRandomOrder()->get();
        $categories = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productsBrand = Brand::where('status', true)->orderBy('brand_name', "ASC")->get();
        $processors = Processor::where('status', true)->orderBy('name', "ASC")->get();
        $disks = Disk::where('status', true)->orderBy('name', "ASC")->get();
        $layars = Layar::where('status', true)->orderBy('name', "ASC")->get();
        $productpromotion = ProductPromotion::all();
        if(!empty($productpromotion)){
            $promotion = promotion::whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `date_start` AND `date_finish`'))->get();
        }

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.pages.detail_product_category', compact ('categoryDetails', 'categories', 'productsAll', 'productBrand', 'productsCode','productsBrand', 'processors', 'disks', 'layars', 'category', 'productpromotion', 'promotion', 'cart'));
    }

    public function brand($id)
    {
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productBrand = Brand::orderBy('created_at', "DESC")->get();
        $brandDetails = Brand::where('id', $id)->first();
        $productsAllBrand = Product::where('status', true)->where(['brands'=> $brandDetails->brand_name])->paginate(25);
        $productsCode = Product::inRandomOrder()->get();
        $categories = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productsBrand = Brand::where('status', true)->orderBy('brand_name', "ASC")->get();
        $processors = Processor::where('status', true)->orderBy('name', "ASC")->get();
        $disks = Disk::where('status', true)->orderBy('name', "ASC")->get();
        $layars = Layar::where('status', true)->orderBy('name', "ASC")->get();
        $productpromotion = ProductPromotion::all();
        if(!empty($productpromotion)){
            $promotion = promotion::whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `date_start` AND `date_finish`'))->get();
        }

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.pages.detail_product_brand', compact ('brandDetails', 'categories', 'productsAllBrand', 'productBrand', 'productsCode', 'productsBrand', 'processors', 'disks', 'layars', 'category', 'productpromotion', 'promotion', 'cart'));
    }

    public function processor($id)
    {
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productBrand = Brand::orderBy('created_at', "DESC")->get();
        $processorDetails = Processor::where('id', $id)->first();
        $productsAllProcessor = Product::where('status', true)->where(['processor'=> $processorDetails->name])->paginate(25);
        $productsCode = Product::inRandomOrder()->get();
        $categories = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productsBrand = Brand::where('status', true)->orderBy('brand_name', "ASC")->get();
        $processors = Processor::where('status', true)->orderBy('name', "ASC")->get();
        $disks = Disk::where('status', true)->orderBy('name', "ASC")->get();
        $layars = Layar::where('status', true)->orderBy('name', "ASC")->get();
        $productpromotion = ProductPromotion::all();
        if(!empty($productpromotion)){
            $promotion = promotion::whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `date_start` AND `date_finish`'))->get();
        }

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.pages.detail_product_processor', compact ('processorDetails', 'categories', 'productsAllProcessor', 'productBrand', 'productsCode', 'productsBrand', 'processors', 'disks', 'layars', 'category', 'productpromotion', 'promotion', 'cart'));
    }

    public function layar($id)
    {
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productBrand = Brand::orderBy('created_at', "DESC")->get();
        $layarDetails = Layar::where('id', $id)->first();
        $productsAllLayar = Product::where('status', true)->where(['layar'=> $layarDetails->name])->paginate(25);
        $productsCode = Product::inRandomOrder()->get();
        $categories = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productsBrand = Brand::where('status', true)->orderBy('brand_name', "ASC")->get();
        $processors = Processor::where('status', true)->orderBy('name', "ASC")->get();
        $disks = Disk::where('status', true)->orderBy('name', "ASC")->get();
        $layars = Layar::where('status', true)->orderBy('name', "ASC")->get();
        $productpromotion = ProductPromotion::all();
        if(!empty($productpromotion)){
            $promotion = promotion::whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `date_start` AND `date_finish`'))->get();
        }

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.pages.detail_product_layar', compact ('layarDetails', 'categories', 'productsAllLayar', 'productBrand', 'productsCode', 'productsBrand', 'processors', 'disks', 'layars', 'category', 'productpromotion', 'promotion', 'cart'));
    }

    public function storage($id)
    {
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productBrand = Brand::orderBy('created_at', "DESC")->get();
        $storageDetails = Disk::where('id', $id)->first();
        $productsAllStorage = Product::where('status', true)->where(['storage'=> $storageDetails->name])->paginate(25);
        $productsCode = Product::inRandomOrder()->get();
        $categories = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productsBrand = Brand::where('status', true)->orderBy('brand_name', "ASC")->get();
        $processors = Processor::where('status', true)->orderBy('name', "ASC")->get();
        $disks = Disk::where('status', true)->orderBy('name', "ASC")->get();
        $layars = Layar::where('status', true)->orderBy('name', "ASC")->get();
        $productpromotion = ProductPromotion::all();
        if(!empty($productpromotion)){
            $promotion = promotion::whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `date_start` AND `date_finish`'))->get();
        }

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.pages.detail_product_storage', compact ('storageDetails', 'categories', 'productsAllStorage', 'productBrand', 'productsCode', 'productsBrand', 'processors', 'disks', 'layars', 'category', 'productpromotion', 'promotion', 'cart'));
    }

    public function productDetail($id=null)
    {
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $product = Product::where('id', $id)->first();
        $total_stok = Product::where('id', $id)->sum('stok');
        $productsImage = ProductsImage::where('product_id', $id)->get();
        $productsCode = Product::inRandomOrder()->get();
        $detailProduct = Product::where('id',$id)->first();
        $categories = Category::with('category')->where(['name'=>$product->category_product])->first();
        $brands = Brand::where(['brand_name'=>$product->brands])->first();
        $productpromotion = ProductPromotion::where(['product_id'=> $product->id])->first();

        if(!empty($productpromotion)){
            $promotion = Promotion::where(['id'=>$productpromotion->promotion_id])->whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `date_start` AND `date_finish`'))->first();
        }

        // $productpromotion = json_decode(json_encode($productpromotion));
        // echo "<pre>" ; print_r($productpromotion); die;

        $productsBrand = Brand::orderBy('created_at', "DESC")->get();

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.pages.detail', compact ('detailProduct', 'productsBrand', 'productsCode', 'productsImage', 'total_stok', 'categories', 'brands', 'productpromotion', 'promotion', 'category', 'cart'));
    }

    public function search(Request $request)
    {
        // menangkap data pencarian
        $search = $request->get('search');

        // mengambil data dari table pegawai sesuai pencarian data
        $productsAll = Product::where('name_product','like','%'.$search.'%')->paginate(15);


        // dd($productsAll);
        $productsCode = Product::inRandomOrder()->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $categories = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productsBrand = Brand::where('status', true)->orderBy('brand_name', "ASC")->get();
        $processors = Processor::where('status', true)->orderBy('name', "ASC")->get();
        $disks = Disk::where('status', true)->orderBy('name', "ASC")->get();
        $layars = Layar::where('status', true)->orderBy('name', "ASC")->get();
        $productpromotion = ProductPromotion::all();
        if(!empty($productpromotion)){
            $promotion = promotion::whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `date_start` AND `date_finish`'))->get();
        }

        // mengirim data pegawai ke view index
        $user_email = Auth::user()->email;
        $cart = Cart::where('user_email',$user_email)->get();
        return view('frontend.pages.search_product',compact('productsAll', 'categories', 'productsBrand', 'processors', 'disks', 'layars', 'productpromotion', 'promotion', 'productsCode', 'category', 'cart'));
    }

    public function getProductPrice(Request $request)
    {
        $data = $request->all();
        // echo "<pre>" ; print_r($data); die;
        $proArr = explode("-",$data['idPro']);
        // echo $proArr[0];echo $proArr[1]; die;
        $proAtrr = ProductsAttribute::where(['product_id'=>$proArr[0], 'processor'=>$proArr[1]])->first();
        echo $proAtrr->price;
        echo "#";
        echo $proAtrr->stok;
    }

    //add to cart
    public function addCart(Request $request)
    {

        Session::forget('CoupunAmount');
        Session::forget('CouponCode');

        $data = $request->all();

        // dd($data);
        $session_id = Session::get('session_id');
        if(empty($session_id)){
            $session_id = str_random(8);
            Session::put('session_id', $session_id);
        }

        if(empty(Auth::user()->email)){
            $data['user_email'] = '';
        }else {
            $data['user_email'] = Auth::user()->email;
        }

        $countProduct = DB::table('carts')->where(['product_id'=>$data['product_id']])->count();

        if($countProduct>0){

            return redirect()->back()->with('flash_message_error', 'Product yang anda pilih telah ada dikeranjang belanja!!');
            // return redirect('cart-order')->with('flash_message_error', 'Product yang anda pilih telah ada dikeranjang belanja!!');

        }else {

            DB::table('carts')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'qty'=>$data['qty'], 'price'=>$data['price'],'berat'=>$data['berat'], 'image'=>$data['images'], 'user_email'=>$data['user_email'], 'session_id'=>$session_id]);

        }


        return redirect('cart-order')->with('flash_message_success', 'Product Berhasil ditambahkan ke Keranjang!!');
    }


    public function cartOrder(Request $request)
    {

        if(Auth::check()){
            $user_email = Auth::user()->email;
            $userCart  = DB::table('carts')->where(['user_email'=>$user_email])->get();
        }else {
            $session_id = Session::get('session_id');
            $userCart  = DB::table('carts')->where(['session_id'=>$session_id])->get();
        }

        foreach($userCart as $key=>$product){
            $detailProduct = Product::where('id', $product->product_id)->first();
            $userCart[$key]->image = $detailProduct->image;
        }
        // echo "<pre>" ; print_r($userCart); die;
        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        $productsBrand = Brand::orderBy('created_at', "DESC")->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        return view ('frontend.cart.cart', compact ('productsBrand', 'userCart', 'category', 'cart'));
    }

    public function deleteCartOrder($id=null)
    {
        Session::forget('CoupunAmount');
        Session::forget('CouponCode');

        DB::table('carts')->where('id',$id)->delete();
        return redirect('cart-order')->with('flash_message_success', 'Product Berhasil Dihapus!!');
    }

    public function qtyCartOrder($id=null, $qty=null)
    {

        Session::forget('CoupunAmount');
        Session::forget('CouponCode');

        $getCartDetails = DB::table('carts')->where('id', $id)->first();
        $product = Product::where(['id'=>$getCartDetails->product_id])->first();

        $update_qty = $getCartDetails->qty+$qty;
        if($product->stok >= $update_qty){
            DB::table('carts')->where('id', $id)->increment('qty', $qty);
            $cart_count = DB::table('carts')->where('id', $id)->first();
            $berat = $cart_count->qty * $product->berat;
            // $price = $cart_count->qty * $product->price;
            DB::table('carts')->where('id', $id)->update([
                'berat'=>$berat
            ]);
            return redirect('cart-order')->with('flash_message_success', 'Qty Product telah diubah!!');
        }else{
            return redirect('cart-order')->with('flash_message_error', 'Qty Product melebihi stok yang tersedia!!');
        }


    }

    public function applyCoupon(Request $request)
    {

        Session::forget('CoupunAmount');
        Session::forget('CouponCode');

        $data = $request->all();
        // echo "<pre>" ; print_r($data); die;
        $couponCount = Coupon::where('coupon_code', $data['coupon_code'])->count();
        if($couponCount == 0){
            return redirect()->back()->with('flash_message_error', 'Kode Voucher Tidak Ditemukan atau Salah, Cek Kembali!!');
        }else{
            $couponDetails = Coupon::where('coupon_code', $data['coupon_code'])->first();

            if($couponDetails->status == 0){
                return redirect()->back()->with('flash_message_error', 'Kode Voucher Yang Anda Masukkan Saat Ini Tidak Aktif!!');
            }

            $expired_date = $couponDetails->expired_date;
            $current_date = date('Y-m-d');
            if($expired_date < $current_date){
                return redirect()->back()->with('flash_message_error', 'Kode Voucher Yang Anda Masukkan Telah Expired!!');
            }

            $session_id = Session::get('session_id');

            if(Auth::check()){
                $user_email = Auth::user()->email;
                $userCart  = DB::table('carts')->where(['user_email'=>$user_email])->get();
            }else {
                $session_id = Session::get('session_id');
                $userCart  = DB::table('carts')->where(['session_id'=>$session_id])->get();
            }

            $total_amount = 0;
            foreach($userCart as $item){
                $total_amount = $total_amount + ($item->price * $item->qty);
            }



            if($couponDetails->amount_type=="fixed"){
                $couponAmount = $couponDetails->amount;
            }else {
                $couponAmount = $total_amount * ($couponDetails->amount/100);
            }

            Session::put('CoupunAmount', $couponAmount);
            Session::put('CouponCode', $data['coupon_code']);

            return redirect()->back()->with('flash_message_success', 'Selamat Anda Berhasil Mendapatkan Discount!!');

        }
    }

    public function checkout(Request $request)
    {

        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);
        $province = Province::where(['province_id'=>$userDetails->provinsi])->first();
        $city = City::where(['city_id'=>$userDetails->kabupaten])->first();
        $district = District::where(['district_id'=>$userDetails->kecamatan])->first();
        $cart_count = Cart::where('user_email',$user_email)->sum('berat');
        $cart_count_harga = Cart::where('user_email',$user_email)->get();

        if(empty($userDetails->kecamatan)){
            $userDetails->kecamatan = '151';
        }


        $provinsi = Province::pluck('name_province', 'province_id');

        //jne
        $client = new Client;

        try{
            $response = $client->request('POST','https://pro.rajaongkir.com/api/cost',[
                'body' => 'origin=151&originType=city&destination='.$userDetails->kecamatan.'&destinationType=subdistrict&weight='.$cart_count.'&courier=jne',
                    'headers' => [
                        'key' => '70db0e83ef5785684d31c3c0fa7655a4',
                        'content-type' => 'application/x-www-form-urlencoded'
                    ]
                ]
            );
        } catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();

        $array_result = json_decode($json, true);


        //jnt
        $clientjnt = new Client;

        try{
            $response = $clientjnt->request('POST','https://pro.rajaongkir.com/api/cost',[
                'body' => 'origin=151&originType=city&destination='.$userDetails->kecamatan.'&destinationType=subdistrict&weight='.$cart_count.'&courier=jnt',
                    'headers' => [
                        'key' => '70db0e83ef5785684d31c3c0fa7655a4',
                        'content-type' => 'application/x-www-form-urlencoded'
                    ]
                ]
            );
        } catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json_jnt = $response->getBody()->getContents();

        $array_result_jnt = json_decode($json_jnt, true);


        $cart = Cart::where('user_email',$user_email)->get();
        $productsBrand = Brand::orderBy('created_at', "DESC")->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        return view ('frontend.checkout.checkout', compact('productsBrand', 'userDetails', 'province', 'provinsi', 'city', 'district','userDetails', 'shippingDetails', 'category', 'array_result', 'array_result_jnt', 'cart', 'cart_count_harga'));
    }

    //delivery address
    public function delivery(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);
        $province = Province::where(['province_id'=>$userDetails->provinsi])->first();
        $city = City::where(['city_id'=>$userDetails->kabupaten])->first();
        $district = District::where(['district_id'=>$userDetails->kecamatan])->first();
        $session_order = SessionOrder::where('user_email', $user_email)->first();

        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(empty($session_order)){
                $order = new SessionOrder;
                $order->user_email = $user_email;
                $order->ongkir = $data['ongkir'];
                $order->total_pembayaran = $data['pembayaran'];
                $order->courier = $data['courier'];
                $order->service = $data['service'];
                $order->save();
            }else{
                DB::table('session_orders')->where(['user_email'=>$user_email])->update([
                    'ongkir'=>$data['ongkir'],
                    'total_pembayaran'=>$data['pembayaran'],
                    'courier'=>$data['courier'],
                    'service'=>$data['service']
                ]);
            }
            return redirect('/order-review');
        }

    }

    public function orderReview(Request $request)
    {
        $session_id = Session::get('session_id');
        if(empty($session_id) || !empty($session_id)){
            Session::forget('session_id');
            $session_id = str_random(8);
            Session::put('session_id', $session_id);
        }

        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::where('id', $user_id)->first();
        $userDetail = User::find($user_id);

        $orders = Order::where('user_email', $user_email)->where('bank_name', 'MIDTRANS')->get();
        //  echo "<pre>" ; print_r($orders); die;
        $orderproduct = OrderProduct::get();

        $province = Province::where(['province_id'=>$userDetail->provinsi])->first();
        $city = City::where(['city_id'=>$userDetail->kabupaten])->first();
        $district = District::where(['district_id'=>$userDetail->kecamatan])->first();
        $cart = Cart::where('user_email',$user_email)->get();
        $cart_order = SessionOrder::where('user_email', $user_email)->first();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        return view ('frontend.checkout.order_review', compact ('cart_order', 'category', 'cart', 'userDetails', 'province', 'city', 'district', 'orderproduct', 'orders'));
    }

    public function paymentMethod(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>" ; print_r($data); die;
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $userDetails = User::find($user_id);
            $province = Province::where(['province_id'=>$userDetails->provinsi])->first();
            $city = City::where(['city_id'=>$userDetails->kabupaten])->first();
            $district = District::where(['district_id'=>$userDetails->kecamatan])->first();

            if(empty(Session::get('CouponCode'))){
                $coupon_code = '';
            }else {
                $coupon_code = Session::get('CouponCode');
            }

            if(empty(Session::get('CoupunAmount'))){
                $coupon_amount = '';
            }else {
                $coupon_amount = Session::get('CoupunAmount');
            }

            $session_id = Session::get('session_id');
            if(empty($session_id) || !empty($session_id)){
                Session::forget('session_id');
                $session_id = str_random(8);
                Session::put('session_id', $session_id);
            }

            $session_order = SessionOrder::where(['user_email'=>$user_email])->first();
            // echo "<pre>" ; print_r($session_order); die;
            $order = new Order;
            $order->user_email = $user_email;
            $order->name = $userDetails->name;
            $order->alamat_lengkap = $userDetails->alamat_lengkap;
            $order->provinsi = $province->name_province;
            $order->kota = $city->name_city;
            $order->kecamatan = $district->name_district;
            $order->kode_pos = $userDetails->kode_pos;
            $order->phone = $userDetails->phone;
            $order->ongkir = $session_order->ongkir;
            $order->kode_coupon = $coupon_code;
            $order->nilai_coupon = $coupon_amount;
            $order->order_status = 'NEW';
            $order->bank_name = $data['transfer'];
            $order->kode_pembayaran = $data['kode'];
            $order->total_pembayaran = $session_order->total_pembayaran;
            $order->session_id = $session_id;
            $order->courier = $session_order->courier;
            $order->service = $session_order->service;
            $order->save();

            $last_id = DB::getPDO()->lastInsertId();

            $cartProducts = DB::table('carts')->where('user_email', $user_email)->get();
            foreach ($cartProducts as $pro) {
                $cartPro = new OrderProduct;
                $cartPro->user_id = $user_id;
                $cartPro->order_id = $last_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_name = $pro->product_name;
                $cartPro->qty = $pro->qty;
                $cartPro->product_price = $pro->price;
                $cartPro->images = $pro->image;
                $cartPro->save();
            }

            $cartProducts = DB::table('carts')->where('user_email', $user_email)->get();
            foreach ($cartProducts as $value) {
                $minusqty = Product::where('id', $value->product_id)->get();
                foreach ($minusqty as $mqty) {
                    $datas = $mqty->stok-$value->qty;
                    DB::table('products')->where(['id'=>$mqty->id])->update([
                        'stok'=>$datas
                    ]);
                }
            }


            // Session::put('id', $last_id);
            Session::put('order_id', $session_id);
            Session::put('grand_total', $data['grand_total']);
            Session::put('bank_name', $data['transfer']);
            Session::put('kode_bank', $data['kode']);
            // Session::put('session_id', $cartProducts->session_id);

            return redirect('thanks-page');
            // echo "<pre>" ; print_r($shippingDetails); die;
        }

    }

    public function thanksPage(Request $request)
    {
        $productsCode = Product::get();
        $user_email = Auth::user()->email;
        DB::table('carts')->where('user_email', $user_email)->delete();
        DB::table('session_orders')->where('user_email', $user_email)->delete();

        $productsBrand = Brand::orderBy('created_at', "DESC")->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $cart = Cart::where('user_email',$user_email)->get();
        return view ('frontend.cart.thanks_page', compact('productsBrand', 'category', 'cart', 'productsCode'));
    }

    public function history(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $orders = Order::with('productorders')->where('user_email', $user_email)->get();
        //  echo "<pre>" ; print_r($orders); die;
        $orderproduct = OrderProduct::get();

        $productsBrand = Brand::orderBy('created_at', "DESC")->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $cart = Cart::where('user_email',$user_email)->get();
        return view ('frontend.cart.history_order', compact ('productsBrand', 'orders', 'category', 'cart', 'orderproduct'));
    }

    public function historyDetails($id)
    {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $orderDetails = orderProduct::where('order_id', $id)->get();
        // echo "<pre>" ; print_r($orderDetails); die;
        $countproduct = orderProduct::where('order_id', $id)->sum('product_price');
        $order = Order::where('id', $id)->first();
        // dd($order);
        // $product = Product::with('productorder')->where(['id'=>$orderDetails->product_id])->get();
        // $product = json_decode(json_encode($product));
        // echo "<pre>" ; print_r($product); die;
        $productsBrand = Brand::orderBy('created_at', "DESC")->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $cart = Cart::where('user_email',$user_email)->get();
        return view ('frontend.cart.history_order_detail', compact ('productsBrand', 'orderDetails', 'category', 'cart', 'order', 'countproduct', 'product'));
    }

    public function upload(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $this->validate($request, [
            'images' => 'required|max:1028|'
        ]);

        $payment = New BuktiTransfer;
        $payment->nomor_order = $data['nomor_order'];

        if($request->hasFile('images')){
            $image_temp = Input::file('images');
            if($image_temp->isValid()){

                $extension = $image_temp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $banner_path_small = 'images/frontend_images/bukti_transfer/'.$filename;

                //Resize images
                Image::make($image_temp)->resize(300,300)->save($banner_path_small);
                $payment->images = $filename;
            }
        }
        $payment->save();
        return redirect()->back()->with('flash_message_success', 'Terimakasih !!, Data Telah Kami Terima Dan Akan Segera di Proses');
    }

    public function historyMidtrans()
    {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $orders = Order::with('productorders')->where('user_email', $user_email)->where('bank_name', 'MIDTRANS')->get();
        //  echo "<pre>" ; print_r($orders); die;
        $orderproduct = OrderProduct::get();
        // foreach ($orderproduct as $key => $value) {
        //     $order_nomor = $value->order_id;
        // }

        $productsBrand = Brand::orderBy('created_at', "DESC")->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $cart = Cart::where('user_email',$user_email)->get();
        return view ('frontend.cart.history_order_midtrans', compact ('productsBrand', 'orders', 'category', 'cart', 'orderproduct', 'order_nomor'));
    }

    public function postMidtrans($id)
    {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);

        $orderProducts = DB::table('orders')->where('id', $id)->first();
        // dd($orderProducts->session_id);
        $cartProducts = DB::table('carts')->where('user_email', $user_email)->get();
        foreach ($cartProducts as $pro) {
            $cartPro = new OrderProduct;
            $cartPro->user_id = $user_id;
            $cartPro->order_id = $id;
            $cartPro->product_id = $pro->product_id;
            $cartPro->product_name = $pro->product_name;
            $cartPro->qty = $pro->qty;
            $cartPro->product_price = $pro->price;
            $cartPro->images = $pro->image;
            $cartPro->save();
        }

        $cartProducts = DB::table('carts')->where('user_email', $user_email)->get();
        foreach ($cartProducts as $value) {
            $minusqty = Product::where('id', $value->product_id)->get();
            foreach ($minusqty as $mqty) {
                $datas = $mqty->stok-$value->qty;
                DB::table('products')->where(['id'=>$mqty->id])->update([
                    'stok'=>$datas
                ]);
            }
        }

        // Session::put('id', $last_id);
        Session::put('order_id', $orderProducts->session_id);
        Session::put('grand_total', $orderProducts->total_pembayaran);
        Session::put('bank_name', $orderProducts->bank_name);

        return redirect('thanks-page');

    }

}
