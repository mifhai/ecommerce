<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Session;

class AdminController extends Controller
{
    public function getLogin(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->input();

            if (Auth::attempt(['email' => $data ['email'], 'password' => $data['password'],'admin'=>true])) {
                // echo "Succes"; die;
                // Session::put('adminSession', $data['email']);

                return redirect ('admin/dashboard');
            }else{
                // echo "Failed"; die;
                return redirect ('admin/login')->with('flash_message_error', 'Username atau Password Salah!!');
            }
        }

        return view ('backend.auth.login');
    }

    public function logout()
    {
        Session::flush();

        return redirect ('admin/login')->with('flash_message_success', 'Anda telah Keluar, trimakasih');
    }

    public function setting()
    {
        return view ('backend.auth.setting');
    }

    public function checkPassword(Request $request)
    {
        $data = $request->all();
        $password_lama = $data['pwd_lama'];
        $check_password = User::where(['admin'=>'1'])->first();

        if(Hash::check($password_lama, $check_password->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>";print_r($data); die;
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $password_lama = $data['pwd_lama'];
            if(Hash::check($password_lama, $check_password->password)){
                $password = bcrypt($data['pwd_baru']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('admin_setting')->with('flash_message_success', 'Update Password Berhasil!!');
            }else{
                return redirect('admin_setting')->with('flash_message_error', 'Update Password Gagal, Coba Lagi!!');
            }
        }
    }
}
