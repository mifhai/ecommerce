<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Processor;

class ProcessorController extends Controller
{
    public function index()
    {
        $processor = Processor::all();

        return view ('backend.products.processor.index', compact('processor'));
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

            $processor = new Processor;
            $processor->name = $data['processor'];
            $processor->status = $status;
            $processor->save();

            return redirect()->back()->with('flash_message_success', 'Processor Berhasil Ditambah');
        }

        return view ('backend.products.processor.add');
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

            Processor::where(['id'=>$id])->update([
                        'name'=>$data['processor'],
                        'status'=>$status
                    ]);

            return redirect()->back()->with('flash_message_success', 'Update Processor Berhasil!!');
        }
    }

    public function delete($id)
    {
        Processor::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Processor Berhasil Dihapus');
    }
}
