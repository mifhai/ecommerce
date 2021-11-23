<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Events\Auth\UserActivationEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Image;
use App\User;
use App\Brand;
use App\Province;
use App\Model\City;
use App\Model\District;
use App\Model\Cart;
use App\Category;
use Session;
use Auth;
use DB;

class UserController extends Controller
{
    //menampilkan halaman login dan register
    public function userGetLogin()
    {

        $productsBrand = Brand::orderBy('created_at', "DESC")->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.auth.login', compact ('productsBrand', 'category', 'cart'));
    }

    //masuk login
    public function login(Request $request)
    {
        $this->validateLogin($request); //-> aktivasi email

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>" ; print_r($data); die;
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
                Session::put('FrontSession', $data['email']);
                $session_id = Session::get('session_id');
                if(!empty($session_id)){
                    $user_email = Auth::user()->email;
                    DB::table('carts')->where('session_id', $session_id)->update([
                        'user_email'=>$user_email
                    ]);
                }
                return redirect('/cart-order');
            }else{
                return redirect()->back()->with('error', 'Email Atau Password Salah!!');
            }
        }
    }


    public function username()
    {
        return 'email';
    }

    //cek aktivasi email
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => [
                'required',
                Rule::exists('users')->where(function ($query){
                    $query->where('isVerified', true);
                })
            ],
            'password' => 'required',
        ], [
            $this->username(). '.exists' => 'Email Belum Aktif Silahkan Aktivasi Terlebih Dahulu'
        ]);
    }

    //register
    public function register(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $usersCount = User::where('email', $data['email'])->count();
            if($usersCount>0){
                return redirect()->back()->with('flash_message_error', 'Email Sudah Digunakan, Silahkan gunakan email lain!!');
            }else{
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->isVerified = false;
                $user->token_activation = rand(100000, 999999);
                $user->save();

                //sending email
                event(new UserActivationEmail($user));

                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    Session::put('FrontSession', $data['email']);
                    return redirect('activation')->with('flash_message_success', 'Registrasi berhasil, silahkan cek email untuk aktivasi!!');
                }

            }

        }


    }

    public function account(Request $request)
    {
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        $province = Province::where(['province_id'=>$userDetails->provinsi])->first();
        $city = City::where(['city_id'=>$userDetails->kabupaten])->first();
        $district = District::where(['district_id'=>$userDetails->kecamatan])->first();

        $provinsi = Province::pluck('name_province', 'province_id');
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.account.account', compact ('category', 'userDetails', 'provinsi', 'province', 'city', 'district', 'cart'));
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name_city', 'city_id');
        return json_encode($city);
    }

    public function getDistrict($id)
    {
        $district = District::where('city_id', $id)->pluck('name_district', 'district_id');
        return json_encode($district);
    }

    //update account
    public function update(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            //upload images
            if($request->hasFile('image')){
                $image_temp = Input::file('image');
                if($image_temp->isValid()){

                    $extension = $image_temp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $banner_path_large = 'images/user/'.$fileName;

                    //Resize images
                    Image::make($image_temp)->resize(300,300)->save($banner_path_large);
                }
            }elseif(!empty($data['current_image'])){
                $fileName = $data['current_image'];
            }else {
                $fileName = '';
            }

            User::where(['id'=>$id])->update([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'alamat_lengkap'=>$data['alamat_lengkap'],
                'provinsi'=>$data['province_origin'],
                'kabupaten'=>$data['city_origin'],
                'kecamatan'=>$data['district_origin'],
                'kode_pos'=>$data['kode_pos'],
                'phone'=>$data['phone'],
                'ktp'=>$data['ktp'],
                'images'=>$fileName
            ]);

            return redirect()->back()->with('flash_message_success', 'Terimakasih!! Akun Anda Telah Berhasil Diupdate!!');
        }

    }

    //update password
    public function updatePassword()
    {
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);

        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        $provinsi = Province::pluck('name_province', 'province_id');

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.account.update_password', compact('category', 'userDetails', 'provinsi', 'cart'));
    }

    //check password
    public function updatePass(Request $request)
    {
        $data = $request->all();
        // echo "<pre>" ; print_r($data); die;
        $current_password = $data['pwd_lama'];
        $user_id = Auth::user()->id;
        $checkPass = User::where('id', $user_id)->first();
        if(Hash::check($current_password,$checkPass->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    //update Password
    public function updatePassUser(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>" ; print_r($data); die;
            $pass_lama = User::where('id', Auth::User()->id)->first();
            $current_password = $data['pwd_lama'];

            if(Hash::check($current_password,$pass_lama->password)){
                $new_pass = bcrypt($data['pwd_baru']);
                User::where('id', Auth::User()->id)->update(['password'=>$new_pass]);
                return redirect()->back()->with('flash_message_success', 'Selamat, Update Password Berhasil');
            }else {
                return redirect()->back()->with('flash_message_error', 'Update Password Gagal, coba kembali!!');
            }
        }
    }

    //check email register
    public function checkEmail(Request $request)
    {
            $data = $request->all();
            $usersCount = User::where('email', $data['email'])->count();
            if($usersCount>0){
                echo "false";
            }else{
                echo "true"; die;
            }
    }

    //logout
    public function logout()
    {
        Auth::logout();
        Session::forget('FrontSession');
        return redirect('/');
    }

}
