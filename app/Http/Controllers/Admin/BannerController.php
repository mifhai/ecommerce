<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Banner;
use Image;

class BannerController extends Controller
{
    public function daftarBanner()
    {
        $banner = Banner::get();

        return view ('backend.banner.daftar_banner', compact('banner'));
    }

    public function addBanner(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            // echo "<pre>" ; print_r($data); die;
            // dd($data);

            $banner = new Banner;

            $banner->position = $data ['position'];
            $banner->title = $data ['title'];
            $banner->start_date = $data ['start_date'];
            $banner->end_date = $data ['end_date'];
            $banner->link = $data ['link'];

            if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }

            //upload images
            if($request->hasFile('image')){
                $image_temp = Input::file('image');
                if($image_temp->isValid()){

                    $extension = $image_temp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $banner_path = 'images/backend_images/banners/'.$filename;
                    $banner_center_path = 'images/backend_images/banners/center/'.$filename;

                    //Resize images
                    Image::make($image_temp)->resize(1900,480)->save($banner_path);
                    Image::make($image_temp)->resize(1900,240)->save($banner_center_path);
                    $banner->image = $filename;
                }
            }

            $banner->status = $status;
            $banner->save();
            return redirect()->back()->with('flash_message_success', 'Banner Berhasil Ditambahkan!!');
        }
        return view ('backend.banner.add');
    }

    public function editBanner(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>" ; print_r($data); die;

            if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }

            if(empty($data['position'])){
                $data['position'] = '';
            }

            if(empty($data['start_date'])){
                $data['start_date'] = '';
            }

            if(empty($data['end_date'])){
                $data['end_date'] = '';
            }

            if(empty($data['link'])){
                $data['link'] = '';
            }

            //upload images
            if($request->hasFile('image')){
                $image_temp = Input::file('image');
                if($image_temp->isValid()){

                    $extension = $image_temp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $banner_path = 'images/backend_images/banners/'.$fileName;
                    $banner_center_path = 'images/backend_images/banners/center/'.$fileName;

                    //Resize images
                    Image::make($image_temp)->resize(1900,480)->save($banner_path);
                    Image::make($image_temp)->resize(1900,240)->save($banner_center_path);
                }
            }elseif(!empty($data['current_image'])){
                $fileName = $data['current_image'];
            }else {
                $fileName = '';
            }

            Banner::where('id', $id)->update([
                        'status'=>$status,
                        'position'=>$data['position'],
                        'title'=>$data['title'],
                        'start_date'=>$data['start_date'],
                        'end_date'=>$data['end_date'],
                        'link'=>$data['link'],
                        'image'=>$fileName
                    ]);

            return redirect('daftar_banner')->with('flash_message_success', 'Banner Berhasil di Update');

        }


        $bannerDetails = Banner::where('id', $id)->first();

        return view ('backend.banner.edit', compact('bannerDetails'));
    }

    public function deleteBanner($id=null)
    {
        Banner::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Banner Telah Berhasil Dihapus!!');
    }
}
