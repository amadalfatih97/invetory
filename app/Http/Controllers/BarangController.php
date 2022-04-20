<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\satuan;
class BarangController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('key');
        $barangs = Barang::all();

        if ($keyword) {
            $barangs = Barang::where("namabarang","LIKE","%$keyword%")->get();
        }
        return view('barang.list',compact('barangs'));
    }

    public function input(Request $request){
        $satuans = satuan::all();
        return view('barang.input', compact('satuans'));
    }

    

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'namabarang' => 'required|max:30',
            'idsatuan' => 'required|max:3',
            'stok' => 'required|max:4',
            'lokasi' => 'required|max:100',
            'ket' => 'required|max:250',
        ]);
        
        /* proses input */
        $barang = new Barang([
            /* database                      namefield */
            'namabarang'=> $request->input('namabarang'),
            'idsatuan'=> $request->input('idsatuan'),
            'stok'=> $request->input('stok'),
            'lokasi'=> $request->input('lokasi'),
            'ket'=> $request->input('ket'),
        ]);
        $barang->save();
        return redirect('/barang/list')->with('success','data berhasil disimpan!');
    }

    // public function dataById($id){
    //     $satuan = satuan::find($id);
    //     return view('satuan.edit',compact('satuan'));
    //     // return $id;
    // }

    // public function prosesUpdate(Request $request, $id){
    //     $satuan = satuan::find($id);
    //     /* validation */
    //     $request->validate([
    //         'namasatuan' => 'required|max:30'
    //         //,other
    //     ]);
        
    //     /* proses update */
    //     // echo var_dump($request->input());
    //     $satuan->namasatuan = $request->input('namasatuan');
    //     $satuan->save();
    //     return redirect('/satuan/list')->with('success','data berhasil diupdate!');;
    // }

    // public function prosesDelete($id){
    //     // return $id;
    //     $satuan = satuan::find($id);
    //     $satuan->delete();
    //     return redirect('/satuan/list')->with('success','data berhasil dihapus!');;
    // }
}
