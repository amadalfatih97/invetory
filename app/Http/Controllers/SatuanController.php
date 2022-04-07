<?php

namespace App\Http\Controllers;
use App\satuan;

use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index(){
        $satuans = satuan::all();
        return view('satuan.list',compact('satuans'));
    }

    public function input(Request $request){
        return view('satuan.input');

    }

    /* @param return \Illuminate\Http\Response */

    public function prosesInput(Request $request){
        $satuan = new satuan([
            //database                      //namefield
            'namasatuan'=> $request->input('namasatuan')
            //, 'namasatuan'=> $request->input('namasatuan')
            //, 'namasatuan'=> $request->input('namasatuan')
        ]);
        $satuan->save();
        return redirect('/satuan/list');
    }

    public function dataById($id){
        $satuan = satuan::find($id);
        return view('satuan.edit',compact('satuan'));
        // return $id;
    }
}
