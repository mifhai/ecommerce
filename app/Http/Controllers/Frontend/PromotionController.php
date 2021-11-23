<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Promotion;
use App\Model\Cart;
use App\Category;
use App\Model\ProductPromotion;
use Auth;


class PromotionController extends Controller
{
    public function index()
    {
        // $promotions = Promotion::where('status', true)->get();
        $promotions = Promotion::where('status', true)
        ->whereRaw(\DB::raw('\''.date('Y-m-d').'\' <= `date_finish`'))
        ->orderBy('created_at','desc')
        ->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.promotion.index', compact('promotions', 'category', 'cart'));
    }

    public function detail($id)
    {
        $promotiondetail = Promotion::where('status', true)->where('id', $id)->first();
        $promotionproduct = ProductPromotion::where('promotion_id', $id)->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view('frontend.promotion.detail_promotion', compact('promotiondetail', 'promotionproduct', 'category', 'cart'));
    }
}
