<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Brand;
use App\Banner;
use App\Processor;
use Carbon\Carbon;
use App\Model\Disk;
use App\Model\Layar;
use App\Model\ProductPromotion;
use App\Model\Promotion;
use App\Model\Cart;
use Auth;

class PageController extends Controller
{
    public function index()
    {
        //sort berdasarkan di upload terakhir
        $productsAll = Product::where('status', true)->orderBy('created_at', 'DESC')->limit(8)->get();
        //sort berdasarkan category_id
        $productsCat = Product::where('status', true)->orderBy('category_product', 'DESC')->limit(8)->get();
        //sort berdasarkan Random Product
        $productsCode = Product::where('status', true)->where('recomended', true)->limit(8)->get();
        // brand
        $productsBrand = Brand::orderBy('brand_name', "ASC")->get();
        //sort berdasarkan brand_id
        $productsAllBrand = Product::where('status', true)->orderBy('brands', 'ASC')->get();
        // product terbaru
        $productNew = Product::where('status', true)->orderBy('created_at', 'DESC')->get();
        //category
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        //category
        $categorygaming = Category::where('name', 'Gaming Zone')->get();
        //category gaming
        $categoryallinone = Category::where('name', 'All In One')->get();
        //product diskon
        // $productdiskon = Product::where('status', true)->where('diskon', '>', 0)->orderBy('updated_at', 'DESC')->get();
        $productrecomended = Product::where('status', true)->where('recomended', true)->orderBy('created_at', 'DESC')->get();
        //card-product-phone
        $productphones = Product::where('status', true)->where('diskon', '>', 0)->orderBy('updated_at', 'DESC')->limit(4)->get();
        //product gaming zone
        $productgaming = Product::where('status', true)->where('category_product', 'Gaming Zone')->orderBy('created_at', 'DESC')->limit(3)->get();
        //all in One
        $productallinone = Product::where('status', true)->where('category_product', 'All In One')->orderBy('created_at', 'DESC')->limit(3)->get();
        //all in One
        $allinone = Product::where('status', true)->where('category_product', 'All In One')->orderBy('created_at', 'DESC')->limit(10)->get();
        //laptop
        $laptops = Product::where('status', true)->where('category_product', 'Laptop')->orderBy('created_at', 'DESC')->limit(10)->get();
        //gaming zone
        $gamingzone = Product::where('status', true)->where('category_product', 'Gaming Zone')->orderBy('created_at', 'DESC')->limit(10)->get();

        //promotion
        $productpromotion = ProductPromotion::all();
        if(!empty($productpromotion)){
            $promotion = promotion::whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `date_start` AND `date_finish`'))->get();
        }
        //Banner top
        $topbanners = Banner::where('status',true)->where('position','top')->orderBy('created_at','asc')->whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `start_date` AND `end_date`'))->get();
        //banner center
        $centerbanners = Banner::where('status',true)->where('position','center')->orderBy('created_at','asc')->whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `start_date` AND `end_date`'))->get();
        //banner bottom
        $bottombanners = Banner::where('status',true)->where('position','bottom')->orderBy('created_at','asc')->whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `start_date` AND `end_date`'))->get();

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }

        return view ('frontend.home.index', compact ('productsAll', 'productsCat', 'productsCode', 'productsAll', 'productsBrand', 'productsAllBrand', 'productNew', 'topbanners','centerbanners','bottombanners', 'category', 'productrecomended', 'productphones', 'productgaming', 'categorygaming', 'productpromotion', 'promotion', 'allinone', 'laptops', 'gamingzone', 'productallinone', 'categoryallinone'));
    }

    public function product()
    {
        $productsAll = Product::orderBy('created_at', 'DESC')->paginate(25);
        $productsCode = Product::inRandomOrder()->get();
        $categories = Category::where('status', true)->orderBy('name', "ASC")->get();
        $productsBrand = Brand::where('status', true)->orderBy('brand_name', "ASC")->get();
        $processors = Processor::where('status', true)->orderBy('name', "ASC")->get();
        $disks = Disk::where('status', true)->orderBy('name', "ASC")->get();
        $layars = Layar::where('status', true)->orderBy('name', "ASC")->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        //promotion
        $productpromotion = ProductPromotion::all();
        if(!empty($productpromotion)){
            $promotion = promotion::whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `date_start` AND `date_finish`'))->get();
        }

        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.pages.product', compact ('productsBrand', 'categories', 'productsCode', 'productsAll', 'processors', 'disks', 'layars', 'category', 'productpromotion', 'promotion', 'cart'));
    }
}
