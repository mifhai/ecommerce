<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Model\Layar;

class LayarController extends Controller
{
    public function index()
    {
        $layars = Layar::orderBy('name', 'ASC')->get();

        return view ('backend.products.layar.index', compact('layars'));
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

            $layar = new Layar;
            $layar->name = $data['layar'];
            $layar->status = $status;
            $layar->save();

            return redirect()->back()->with('flash_message_success', 'Ukuran Layar Berhasil Ditambahkan!!');
        }
    }

    public function edit(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }

            Layar::where(['id'=>$id])->update([
                'name'=>$data['layar'],
                'status'=>$status
            ]);
            return redirect()->back()->with('flash_message_success', 'Ukuran Layar Berhasil DiUpdate!!');
        }
    }

    public function delete($id)
    {
        Layar::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Ukuran Layar Berhasil Dihapus');
    }
}
