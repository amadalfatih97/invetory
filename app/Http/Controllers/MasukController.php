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
        ->select('masuks.id','kodebarang','namabarang', 'namasatuan', 'qty', 'tanggalmasuk')
        ->rightJoin('barangs', 'masuks.kodebarang', '=', 'barangs.kode')
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
        $data = DB::table('barangs')->latest('id')->first();
        $last = isset($data->id) ? $data->id : 0;
        return view('masuk.input', compact('satuans','barangs','last'));
    }

    //proses input brang masuk
    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'kodebarang' => 'required|max:12',
            'qty' => 'required|max:4',
            'tanggalmasuk' => 'required',
        ]);
        $kodebarang = $request->input('kodebarang');
        
        /* proses input */
        $masuk = new masuk([
            /* database                      namefield */
            'kodebarang'=> $kodebarang,
            'qty'=> $request->input('qty'),
            'tanggalmasuk'=> $request->input('tanggalmasuk'),
        ]);
        /* $barang = DB::table('barangs')
                    ->where('kode', '=', $kodebarang)
                    ->first(); */
        
        $barang = Barang::where('kode', $kodebarang)->firstOrFail();
        // ->update(['stok' => + 2]);
        $updateStok= ($barang->stok) + ($request->input('qty'));
        // $barang->stok = $updateStok ;
        // $barang->save();
        $barang->update(['stok' => $updateStok]);
        $masuk->save();
        return redirect('/barang-masuk/list')->with('success','data berhasil disimpan!');
    }

    public function dataById($id){
        $barang = barang::find($id);
        $satuans = satuan::all();
        return view('barang.edit',compact('barang','satuans'));
        // return $id;
    }
}
