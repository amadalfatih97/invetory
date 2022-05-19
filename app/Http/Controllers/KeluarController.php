<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\transaksi;

class KeluarController extends Controller
{
    /* view input */
    public function barangkeluar(Request $request){
        $barangs = Barang::all();
        return view('keluar.input', compact('barangs'));
    }

    /* find stok */
    public function findstok(Request $request){
        // $stok=Barang::select('stok')->where('kode', $request->id)->first();
        $detail=Barang::select('kode','namabarang','namasatuan','stok')
        ->rightJoin('satuans', 'barangs.idsatuan', '=', 'satuans.id')
        ->where('kode', 'LIKE', $request->id)
        ->get()
        ->first();
        return response()->json($detail,200);
    }

}
