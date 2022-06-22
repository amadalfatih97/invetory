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
    /* show barang keluar */
    public function index(Request $request){
        // $datenow = date('Y-m-d');
        // $month1ago = date('Y-m-d', strtotime('-1 month', strtotime( $datenow ))); 

        // $startdate = $request->get('startdate') ? $request->get('startdate') : $month1ago;
        // $enddate = $request->enddate ? $request->enddate : $datenow;

        // $keyword = $request->get('key');

        // $trans = DB::table('detail_trans')
        // ->select('detail_trans.trans_fk','transaksis.tanggal_trans','transaksis.user_fk')
        // ->selectRaw('COUNT(detail_trans.trans_fk) AS jumlah')
        // ->leftJoin('transaksis', 'detail_trans.trans_fk', '=', 'transaksis.kode')
        // // ->where('namabarang', 'LIKE', '%'.$keyword.'%')
        // ->whereBetween('transaksis.tanggal_trans', [$startdate, $enddate])
        // ->groupBy('detail_trans.trans_fk')
        // ->orderBy('tanggal_trans','DESC')
        // ->get();
        // // dd($trans);
        return view('keluar.list');
    }

    public function Outdetail($id){
        $kode = $id;
        $trans = transaksi::where('kode', $kode)->firstOrFail();
        // ->get();
        
        $detail = DB::table('detail_trans')
        ->select('detail_trans.trans_fk','detail_trans.barang_fk','detail_trans.quantity',
                    'barangs.namabarang','satuans.namasatuan')
        ->leftJoin('barangs','detail_trans.barang_fk','=','barangs.kode')
        ->leftJoin('satuans','barangs.idsatuan','=','satuans.id')
        ->where('detail_trans.trans_fk', 'LIKE', '%'.$kode.'%')
        ->get();
        // dd($trans);
        return view('keluar.detail', compact('trans','detail'));
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

    public function reportOutDetail($id){
        $kode = $id;
        $trans = transaksi::where('kode', $kode)->firstOrFail();
        // ->get();
        
        $detail = DB::table('detail_trans')
        ->select('detail_trans.trans_fk','detail_trans.barang_fk','detail_trans.quantity',
                    'barangs.namabarang','satuans.namasatuan')
        ->leftJoin('barangs','detail_trans.barang_fk','=','barangs.kode')
        ->leftJoin('satuans','barangs.idsatuan','=','satuans.id')
        ->where('detail_trans.trans_fk', 'LIKE', '%'.$kode.'%')
        ->get();
        // dd($trans);
        return view('keluar.report.detail', compact('trans','detail'));
    }
}
