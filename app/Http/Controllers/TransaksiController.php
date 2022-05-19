<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\transaksi;

class TransaksiController extends Controller
{
    
    public function prosesInput(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('d-m-y H:i:s');
        $request->validate([
            'kode' => 'required',
            'tanggal_trans' => 'required',
            'userfk' => 'required',
            'type_trans' => 'required|max:20',
        ]);
        $trans = new transaksi([
            /* database                      namefield */
            'kode'=> 'out'+$date,
            'tanggal_trans'=> $request->input('tanggalkeluar'),
            'userfk'=> 'user01',
            'type_trans'=> 'out'
        ]);
        $trans->save();
        // return response()->json('success', 200);
        return redirect('/barang/list')->with('success','data berhasil keluar!');
    }
}
