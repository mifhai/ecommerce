<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Imports\ProductImport;
use App\Exports\ProductsExport;
use App\Product;
use App\Processor;
use App\Model\Disk;
use App\Category;
use App\Brand;
use App\ProductsImage;
use App\Model\Layar;
use Image;
use Auth;
use Session;
use DB;
use Excel;


class ProductController extends Controller
{

    public function daftarProduct(Request $request)
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view ('backend.products.index', compact ('products'));
    }

    public function addProduct(Request $request)
    {

        $brands = Brand::where('status', true)->orderBy('brand_name', 'ASC')->get();
        $categories = Category::where('status', true)->orderBy('name', 'ASC')->get();
        $processors = Processor::where('status', true)->orderBy('name', 'ASC')->get();
        $disks = Disk::where('status', true)->orderBy('name', 'ASC')->get();
        $layars = Layar::where('status', true)->orderBy('name', 'ASC')->get();


        return view ('backend.products.add', compact ('categories', 'brands', 'processors', 'disks', 'layars'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
                  'image' => 'required|max:1028|',
                  'images' => 'required|max:1028|'
              ]);

        $data = $request->all();

        if(empty($request->status)){
            $status = 0;
        }else {
            $status = 1;
        }

        if(empty($request->recomended)){
            $recomended = 0;
        }else {
            $recomended = 1;
        }

        if(empty($request->preorder)){
            $preorder = 0;
        }else {
            $preorder = 1;
        }

        $product = new Product;
        $product->name_product = $data['name'];
        $product->brands = $data['brands'];
        $product->category_product = $data['category'];
        $product->processor = $data['processor'];
        $product->storage = $data['disk'];
        $product->layar = $data['layar'];
        $product->short_desc = $data['description'];
        $product->description = $data['overview'];
        $product->price = $data['harga'];
        $product->diskon = $data['harga_promo'];
        $product->stok = $data['stok'];
        $product->sku = $data['sku'];
        $product->berat = $data['berat'];
        $product->status = $status;
        $product->recomended = $recomended;
        $product->preorder = $preorder;
        $product->preorder = $preorder;

        if($request->hasFile('image')){
            $image_temp = Input::file('image');
            if($image_temp->isValid()){

                $extension = $image_temp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $banner_path_small = 'images/backend_images/products/large/'.$filename;

                //Resize images
                Image::make($image_temp)->resize(300,300)->save($banner_path_small);
                $product->image = $filename;
            }
        }
        $product->save();

        $lastid = $product->id;

        if($request->hasFile('images')){

            $image_array = $request->file('images');
            $array_len = count($image_array);

            for($i=0; $i<$array_len; $i++){

                $extension = $image_array[$i]->getClientOriginalExtension();
                $filename_new_images = rand(111,99999).'.'.$extension;
                $banner_path_small = 'images/backend_images/products/small/'.$filename_new_images;

                //Resize images
                Image::make($image_array[$i])->resize(300,300)->save($banner_path_small);

                ProductsImage::insert([
                    'product_id' => $lastid,
                    'image' => $filename_new_images
                ]);
            }
        }

        return redirect ('daftar_product')->with('flash_message_success', 'Produk Berhasil Ditambahkan');

    }

    public function editProduct(Request $request, $id=null)
    {
        $product = Product::where('id',$id)->first();

        // dd($product);

        $brands = Brand::where(['brand_name'=>$product->brands])->first();
        $categories = Category::where(['name'=>$product->category_product])->first();
        $processors = Processor::where(['name'=>$product->processor])->first();
        $disks = Disk::where(['name'=>$product->storage])->first();
        $layars = Layar::where(['name'=>$product->layar])->first();

        $brandsall = Brand::where('status', true)->orderBy('brand_name', 'ASC')->get();
        $categoriesall = Category::where('status', true)->orderBy('name', 'ASC')->get();
        $processorsall = Processor::where('status', true)->orderBy('name', 'ASC')->get();
        $disksall = Disk::where('status', true)->orderBy('name', 'ASC')->get();
        $layarsall = Layar::where('status', true)->orderBy('name', 'ASC')->get();

        $image_attr = ProductsImage::where('product_id',$id)->get();
        // dd($image_attr);

        return view ('backend.products.edit', compact('product', 'categories', 'brands', 'processors', 'disks', 'layars','categoriesall', 'brandsall', 'processorsall', 'disksall', 'layarsall', 'image_attr'));
    }

    public function update(Request $request, $id)
    {
        $data =$request->all();

        $this->validate($request, [
            'image' => 'max:1028|',
            'images' => 'max:1028|'
        ]);

        if(empty($request->status)){
            $status = 0;
        }else {
            $status = 1;
        }

        if(empty($request->recomended)){
            $recomended = 0;
        }else {
            $recomended = 1;
        }

        if(empty($request->preorder)){
            $preorder = 0;
        }else {
            $preorder = 1;
        }

        //update images utama
        if($request->hasFile('image')){
            $image_temp = Input::file('image');
            if($image_temp->isValid()){

                $extension = $image_temp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $banner_path_small = 'images/backend_images/products/large/'.$fileName;

                //Resize images
                Image::make($image_temp)->resize(300,300)->save($banner_path_small);
            }
        }elseif(!empty($data['current_image'])){
            $fileName = $data['current_image'];
        }else {
            $fileName = '';
        }

        //update product
        Product::where(['id'=>$id])->update([
            'name_product' => $data['name'],
            'brands' => $data['brands'],
            'category_product' => $data['category'],
            'processor' => $data['processor'],
            'storage' => $data['disk'],
            'layar' => $data['layar'],
            'short_desc'=> $data['description'],
            'description' => $data['overview'],
            'price' => $data['harga'],
            'diskon' => $data['harga_promo'],
            'stok' => $data['stok'],
            'sku' => $data['sku'],
            'berat' => $data['berat'],
            'status' => $status,
            'image'=>$fileName,
            'status' => $status,
            'recomended' => $recomended,
            'preorder' => $preorder
        ]);

        //update Image Attribute
        if($request->hasFile('images')){

            $image_array = $request->file('images');
            $array_len = count($image_array);

            ProductsImage::where(['product_id'=>$id])->delete();

            for($i=0; $i<$array_len; $i++){

                $extension = $image_array[$i]->getClientOriginalExtension();
                $filename_new_images = rand(111,99999).'.'.$extension;
                $banner_path_small = 'images/backend_images/products/small/'.$filename_new_images;

                //Resize images
                Image::make($image_array[$i])->resize(300,300)->save($banner_path_small);

                ProductsImage::insert([
                    'product_id' => $id,
                    'image' => $filename_new_images
                ]);
            }
        }else{
            if($request->hasFile('current_images1')){
                $image_arrays = $request->file('current_images1');
                $array_lens = count($image_arrays);

                for($i=0; $i<$array_lens; $i++){

                    $extensions = $image_arrays[$i]->getClientOriginalExtension();
                    $filename_current= rand(111,99999).'.'.$extensions;
                    $banner_path_smalls = 'images/backend_images/products/small/'.$filename_current;

                    //Resize images
                    Image::make($image_arrays[$i])->resize(300,300)->save($banner_path_smalls);

                    ProductsImage::where(['product_id'=>$id])->delete();
                    ProductsImage::insert([
                        'product_id' => $id,
                        'image' => $filename_current
                    ]);
                }
            }
        }

        return redirect ('daftar_product')->with('flash_message_success', 'Produk Berhasil Diupdate');

    }

    public function deleteProduct($id=null)
    {
        Product::where(['id'=>$id])->delete();
        ProductsImage::where(['product_id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product Telah Berhasil Terhapus!!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('product_checkbox');
        $dbs = DB::delete('delete from products where id in ('.implode(",",$ids).')');
        $dbs = DB::delete('delete from products_images where product_id in ('.implode(",",$ids).')');
        return redirect()->back()->with('flash_message_success', 'Produk Pilihan Berhasil DiHapus');
    }

    public function duplicate($id)
    {
        $product = Product::find($id);
        $newProduct = $product->replicate();
        $newProduct->save();

        return redirect()->back()->with('flash_message_success', 'Produk Berhasil DiSalin');
    }

    public function import(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:xls,xlsx'
		]);

        Excel::import(new ProductImport,request()->file('file'));

        Session::flash('sukses','Data Product Berhasil Diimport!');

        return back();

    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'Products.xlsx');
    }

    public function active($id)
    {
        $product = Product::where('id', $id)->first();
        // dd($product);
        if ($product->status == 1) {
            DB::table('products')->where(['id'=>$product->id])->update([
                'status'=>0
            ]);
        }else{
            DB::table('products')->where(['id'=>$product->id])->update([
                'status'=>1
            ]);
        }
        return redirect()->back()->with('flash_message_success', 'Produk Berhasil Diupdate');
    }
}
