<?php

namespace App\Http\Controllers;
use App\satuan;

use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('key');
        // $satuans = satuan::where("aktif","=","1")->get();

        // if ($keyword) {
            $satuans = satuan::where("namasatuan","LIKE","%$keyword%")
            ->where("aktif","=","1")
            ->get();
        // }
        return view('satuan.list',compact('satuans'));
    }

    public function input(Request $request){
        return view('satuan.input');
    }

    

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'namasatuan' => 'required|max:30'
            //,other
        ]);
        
        /* proses input */
        $satuan = new satuan([
            /* database                      namefield */
            'namasatuan'=> $request->input('namasatuan')
            /* , 'namasatuan'=> $request->input('namasatuan') */
            /* , 'namasatuan'=> $request->input('namasatuan') */
        ]);
        $satuan->save();
        return redirect('/satuan/list')->with('success','data berhasil disimpan!');
    }

    public function dataById($id){
        $satuan = satuan::find($id);
        return view('satuan.edit',compact('satuan'));
        // return $id;
    }

    public function prosesUpdate(Request $request, $id){
        $satuan = satuan::find($id);
        /* validation */
        $request->validate([
            'namasatuan' => 'required|max:30'
            //,other
        ]);
        
        /* proses update */
        // echo var_dump($request->input());
        $satuan->namasatuan = $request->input('namasatuan');
        $satuan->save();
        return redirect('/satuan/list')->with('success','data berhasil diupdate!');;
    }

    public function prosesDelete($id){
        // return $id;
        $satuan = satuan::find($id);
        $satuan->aktif = 0;
        $satuan->save();
        // $satuan->delete();
        return redirect('/satuan/list')->with('success','data berhasil dihapus!');;
    }
}
