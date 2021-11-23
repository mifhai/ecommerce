<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Model\Disk;

class DiskController extends Controller
{
    public function index()
    {
        $disk = Disk::all();

        return view ('backend.products.disk.index', compact('disk'));
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }

            $disk = new Disk;
            $disk->name = $data['disk'];
            $disk->status = $status;
            $disk->save();

            return redirect()->back()->with('flash_message_success', 'Penyimpanan Berhasil Ditambah');
        }
    }

    public function edit(Request $request, $id)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();

            if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }

            Disk::where(['id'=>$id])->update([
                        'name'=>$data['disk'],
                        'status'=>$status
                    ]);

            return redirect()->back()->with('flash_message_success', 'Update Penyimpanan Berhasil!!');
        }
    }

    public function delete($id)
    {
        Disk::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Penyimpanan Berhasil Dihapus');
    }
}
