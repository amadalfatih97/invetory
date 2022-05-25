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
    /* show barang masuk */
    public function index(Request $request){
        $keyword = $request->get('key');
        $trans = DB::table('detail_trans')
        ->select('detail_trans.trans_fk','transaksis.tanggal_trans')
        ->selectRaw('COUNT(detail_trans.trans_fk) AS jumlah')
        ->leftJoin('transaksis', 'detail_trans.trans_fk', '=', 'transaksis.kode')
        // ->where('namabarang', 'LIKE', '%'.$keyword.'%')
        ->groupBy('detail_trans.trans_fk')
        ->get();
        // dd($trans);
        return view('keluar.list',compact('trans'));
    }
    
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
