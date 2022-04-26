<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\masuk;

class MasukController extends Controller
{
    /* show barang masuk */
    public function index(Request $request){
        $keyword = $request->get('key');
        // $barangs = Barang::all();
        // $barangs = Barang::paginate(2);
        $masuks = DB::table('masuks')
        ->select('masuks.id','idbarang','namabarang', 'namasatuan', 'qty', 'tanggalmasuk')
        ->rightJoin('barangs', 'masuks.idbarang', '=', 'barangs.id')
        ->rightJoin('satuans', 'barangs.idsatuan', '=', 'satuans.id')
        ->where('namabarang', 'LIKE', '%'.$keyword.'%')
        ->orderBy('masuks.tanggalmasuk','desc')
        ->get();
        // echo $masuks;
        return view('masuk.list',compact('masuks'));
    }

    // form barang masuk
    public function barangmasuk(Request $request){
        $satuans = satuan::all();
        $barangs = Barang::all();
        return view('masuk.input', compact('satuans','barangs'));
    }

    //proses input brang masuk
    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'idbarang' => 'required|max:3',
            'qty' => 'required|max:4',
            'tanggalmasuk' => 'required',
        ]);
        $idbarang = $request->input('idbarang');
        
        /* proses input */
        $masuk = new masuk([
            /* database                      namefield */
            'idbarang'=> $idbarang,
            'qty'=> $request->input('qty'),
            'tanggalmasuk'=> $request->input('tanggalmasuk'),
        ]);
        $barang = barang::find($idbarang);
        $updateStok= ($barang->stok) + ($request->input('qty'));
        $barang->stok = $updateStok ;
        $barang->save();
        $masuk->save();
        return redirect('/barang/list')->with('success','data berhasil disimpan!');
    }

    public function dataById($id){
        $barang = barang::find($id);
        $satuans = satuan::all();
        return view('barang.edit',compact('barang','satuans'));
        // return $id;
    }
}
