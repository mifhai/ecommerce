<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Image;
use App\Model\Promotion;
use App\Model\ProductPromotion;
use App\Product;
Use DB;


class PromotionController extends Controller
{
    public function index()
    {

        $comingsoonpromotion = Promotion::where('status',true)->whereRaw(\DB::raw('\''.date('Y-m-d').'\' <= `date_start`'))
        ->orderBy('created_at','desc')
        ->get();
        $finishpromotion = Promotion::where('status',true)->whereRaw(\DB::raw('\''.date('Y-m-d').'\' > `date_finish`'))
        ->orderBy('created_at','desc')
        ->get();

        // $startpromotion = Promotion::where('status',true)->orderBy('created_at','asc')->where('date_start', '>=', date('Y-m-d').' 00:00:00')->get();
        $startpromotion = Promotion::where('status',true)->orderBy('created_at', 'ASC')->whereRaw(\DB::raw('\''.date('Y-m-d').'\' BETWEEN `date_start` AND `date_finish`'))->get();

        return view ('backend.promotion.index', compact('comingsoonpromotion', 'startpromotion', 'finishpromotion'));
    }

    public function addPromotion()
    {
        return view ('backend.promotion._name_promotion');
    }

    public function postPromotion(Request $request)
    {

        $this->validate($request, [
            'image' => 'required|max:1028|',
            'banner' => 'required|max:1028|'
        ]);

        $data = $request->all();
        // dd($data);

        if(empty($data['status'])){
            $status = 0;
        }else {
            $status = 1;
        }

        $promotion = new Promotion;
        $promotion->title = $data['title'];
        $promotion->date_start = $data['date_start'];
        $promotion->date_finish = $data['date_finish'];
        $promotion->time_start = $data['jam_start'];
        $promotion->time_finish = $data['jam_finish'];
         //upload images
         if($request->hasFile('image')){
            $image_temp = Input::file('image');
            if($image_temp->isValid()){

                $extension = $image_temp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $banner_path_large = 'images/backend_images/promotion/image/'.$filename;

                //Resize images
                Image::make($image_temp)->resize(300,300)->save($banner_path_large);
                $promotion->images = $filename;
            }
        }
         //upload images
         if($request->hasFile('banner')){
            $image_temps = Input::file('banner');
            if($image_temps->isValid()){

                $extensions = $image_temps->getClientOriginalExtension();
                $filenames = rand(111,99999).'.'.$extensions;
                $banner_path_larges = 'images/backend_images/promotion/banner/'.$filenames;

                //Resize images
                Image::make($image_temps)->resize(1900,480)->save($banner_path_larges);
                $promotion->banner = $filenames;
            }
        }
        $promotion->status = $status;
        $promotion->save();
        return redirect('/admin/promotion')->with('flash_message_success', 'Promotions Berhasil Ditambahkan');
    }

    public function addProduct($id)
    {
        $promotion = Promotion::where('id',$id)->first();
        $productpromotions = ProductPromotion::where('promotion_id',$id)->get();
        $product = Product::all();
        $products = ProductPromotion::all();

        return view ('backend.promotion._product_promotion', compact('promotion', 'productpromotions', 'product', 'products'));
    }

    public function addProductPromotion(Request $request)
    {

        // $pro = $request->get('product_checkbox2');
        if(count($request->product_checkbox2) > 0){
            foreach($request->product_checkbox2 as $item =>$v){
                $data2=array(
                    'promotion_id'=>$request->get('promotion_id'),
                    'product_id'=>$request->product_checkbox2[$item],
                    'product_name'=>null,
                    'images'=>null,
                    'price'=>null,
                    'diskon'=>null,
                    'persen'=>null
                );
                // dd($data2);
                ProductPromotion::insert($data2);
                // if(ProductPromotion::where('product_id', '=', Input::get('product_checkbox2'))->exists()){
                //     return redirect()->back()->with('flash_message_error', 'Product Promotions Sudah Ditambahkan silahkan cek kembali');
                // }else{
                //     ProductPromotion::insert($data2);
                //     return redirect()->back()->with('flash_message_success', 'Product Promotions Berhasil Ditambahkan');
                // }
            }

        }
        return redirect()->back()->with('flash_message_success', 'Product Promotions Berhasil Ditambahkan');

    }

    public function addProductFix(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        if(count($request->images) > 0){
            ProductPromotion::where(['promotion_id'=>$request->promotion_id])->delete();
            foreach($request->images as $item =>$v){
                $data2=array(
                    'promotion_id'=>$request->promotion_id[$item],
                    'product_id'=>$request->product_id[$item],
                    'product_name'=>$request->name[$item],
                    'images'=>$request->images[$item],
                    'price'=>$request->price[$item],
                    'diskon'=>$request->diskon[$item],
                    'persen'=>$request->persen[$item]
                );
                // dd($data2);
                ProductPromotion::insert($data2);
            }

        }
        return redirect('admin/promotion')->with('flash_message_success', 'Product Promotions Berhasil Ditambahkan');

    }

    public function deleteProductPromotion($id)
    {
        ProductPromotion::where(['product_id'=>$id])->first()->delete();
        return redirect()->back()->with('flash_message_success', 'Product Promotions Berhasil Dihapus');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('product_checkbox');
        $dbs = DB::delete('delete from promotions where id in ('.implode(",",$ids).')');
        $dbs = DB::delete('delete from product_promotions where promotion_id in ('.implode(",",$ids).')');
        return redirect()->back()->with('flash_message_success', 'Produk Pilihan Berhasil DiHapus');
    }
}
