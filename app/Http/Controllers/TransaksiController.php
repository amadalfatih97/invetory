<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\transaksi;
use App\detailTrans;

class TransaksiController extends Controller
{
    
    public function prosesInput(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $notrans = 'OUT'.date('ymd-His');
        $request->validate([
            // 'kode' => 'required',
            'tanggalkeluar' => 'required',
            // 'userfk' => 'required',
            // 'type_trans' => 'required|max:20',
        ]);
        $trans = new transaksi([
            /* database                      namefield */
            'kode'=> $notrans,
            'tanggal_trans'=> $request->input('tanggalkeluar'),
            'user_fk'=> 'user01',
            'type_trans'=> 'out'
        ]);
        $trans->save();
        foreach ($request->kodebrg as $item => $value) {
            $datas = array(
                'trans_fk' => $trans->kode,
                'barang_fk' => $request->kodebrg[$item],
                'quantity' => $request->qty[$item]
            );
            detailTrans::create($datas);
        }

        return redirect('/barang/list')->with('success','data berhasil keluar!');
    }
}
