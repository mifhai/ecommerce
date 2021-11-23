<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Image;
use App\Category;

class CategoryController extends Controller
{

    public function daftarCategory()
    {
        $categories = Category::get();
        return view ('backend.category.daftar_category', compact('categories'));
    }

    public function addCategory(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }

            $category = new Category;
            $category->name = $data['category_name'];
             //upload images
             if($request->hasFile('image')){
                $image_temp = Input::file('image');
                if($image_temp->isValid()){

                    $extension = $image_temp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $banner_path_large = 'images/backend_images/category/large/'.$filename;
                    $banner_path_small = 'images/backend_images/category/small/'.$filename;

                    //Resize images
                    Image::make($image_temp)->resize(1900,480)->save($banner_path_large);
                    Image::make($image_temp)->resize(100,80)->save($banner_path_small);
                    $category->images = $filename;
                }
            }
            $category->url = $data['category_name'];
            $category->icon = $data['icon'];
            $category->save();
            return redirect ('daftar_category')->with('flash_message_success', 'Category Produk Berhasil Ditambahkan');
        }

        $subCategory = Category::all();

        return view ('backend.category.add', compact ('subCategory'));
    }

    public function editCategory(Request $request, $id = null)
    {

        if($request->isMethod('post'))
        {
            $data = $request->all();

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
                    $fileName = rand(111,99999).'.'.$extension;
                    $banner_path_large = 'images/backend_images/category/large/'.$fileName;
                    $banner_path_small = 'images/backend_images/category/small/'.$fileName;

                    //Resize images
                    Image::make($image_temp)->resize(1900,480)->save($banner_path_large);
                    Image::make($image_temp)->resize(100,80)->save($banner_path_small);
                }
            }elseif(!empty($data['current_image'])){
                $fileName = $data['current_image'];
            }else {
                $fileName = '';
            }

            Category::where(['id'=>$id])->update([
                        'name'=>$data['category_name'],
                        'images'=>$fileName,
                        'url'=>$data['category_name'],
                        'icon'=>$data['icon'],
                        'status'=>$status
                    ]);

            return redirect ('daftar_category')->with('flash_message_success', 'Update Category Berhasil!!');
        }

        $categoryDetail = Category::where(['id'=>$id])->first();
        return view ('backend.category.edit', compact ('categoryDetail', 'subCategory'));
    }

    public function deleteCategory($id = null)
    {
        if(!empty($id)){
            Category::where(['id'=> $id])->delete();
            return redirect()->back()->with('flash_message_success', 'Category telah Dihapus!!');
        }
    }
}
