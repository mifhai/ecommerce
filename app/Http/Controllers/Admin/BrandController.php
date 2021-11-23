<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Brand;
use Image;
use Auth;
use Session;


class BrandController extends Controller
{
    public function addBrand(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }

            $brand = new Brand;
            $brand->brand_name = $data ['brand_name'];
            $brand->url = $data ['brand_name'];

            //upload images
            if($request->hasFile('image')){
                $image_temp = Input::file('image');
                if($image_temp->isValid()){

                    $extension = $image_temp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/brands/large/'.$filename;
                    $medium_image_path = 'images/backend_images/brands/medium/'.$filename;
                    $small_image_path = 'images/backend_images/brands/small/'.$filename;

                    //Resize images
                    Image::make($image_temp)->save($large_image_path);
                    Image::make($image_temp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_temp)->resize(70,70)->save($small_image_path);

                    $brand->image = $filename;
                }
            }
            //upload images banner
            if($request->hasFile('image_banner')){
                $image_temp = Input::file('image_banner');
                if($image_temp->isValid()){

                    $extension = $image_temp->getClientOriginalExtension();
                    $filename_banner = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/brands/banner/'.$filename_banner;
                    $small_image_path = 'images/backend_images/brands/banner/small/'.$filename_banner;

                    //Resize images
                    Image::make($image_temp)->resize(1920,480)->save($large_image_path);
                    Image::make($image_temp)->resize(100,80)->save($small_image_path);

                    $brand->images_banner = $filename_banner;
                }
            }

            $brand->status = $status;
            $brand->save();

            return redirect()->back()->with('flash_message_success', 'Product Berhasil Ditambahkan!!');
        }

        return view ('backend.brands.add');
    }

    public function editBrand(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }

            //images
            if($request->hasFile('image')){
                $image_temp = Input::file('image');
                if($image_temp->isValid()){

                    $extension = $image_temp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/brands/large/'.$filename;
                    $medium_image_path = 'images/backend_images/brands/medium/'.$filename;
                    $small_image_path = 'images/backend_images/brands/small/'.$filename;

                    //Resize images
                    Image::make($image_temp)->save($large_image_path);
                    Image::make($image_temp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_temp)->resize(70,70)->save($small_image_path);

                }
            }else {
                $filename = $data['current_image'];
            }

            //images banner
            if($request->hasFile('image_banner')){
                $image_temp = Input::file('image_banner');
                if($image_temp->isValid()){

                    $extension = $image_temp->getClientOriginalExtension();
                    $filename_banner = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/brands/banner/'.$filename;
                    $small_image_path = 'images/backend_images/brands/banner/small/'.$filename_banner;

                    //Resize images
                    Image::make($image_temp)->resize(1920,480)->save($large_image_path);
                    Image::make($image_temp)->resize(100,80)->save($small_image_path);

                }
            }else {
                $filename_banner = $data['current_image_banner'];
            }

            Brand::where(['id'=>$id])->update([
                        'brand_name'=>$data['brand_name'],
                        'url'=>$data['brand_name'],
                        'status'=>$status,
                        'image'=>$filename,
                        'images_banner'=>$filename_banner,
                    ]);

            return redirect('daftar_brands')->with('flash_message_success', 'Brands Berhasil DiUpdate!!');
        }



        $brandDetails = Brand::where(['id'=>$id])->first();

        return view ('backend.brands.edit', compact('brandDetails'));

    }

    public function deleteBrand($id=null)
    {
        Brand::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Brands Telah Berhasil Terhapus!!');
    }

    public function daftarBrand()
    {
        $brand = Brand::get();
        return view ('backend.brands.daftar_brand', compact ('brand'));
    }
}
