<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\transaksi;
use App\detailTrans;

class TransaksiList extends Component
{
    public $date1 = '' ;
    public $date2 = '';
    public $search ='' ;
    public function render(Request $request)
    {
            $datenow = date('Y-m-d');
            $month1ago = date('Y-m-d', strtotime('-1 month', strtotime( $datenow ))); 
    
            $this->date1 = $this->date1 ? $this->date1 : $month1ago;
            $this->date2 = $this->date2 ? $this->date2 : $datenow;
    
            $keyword = $request->get('key');
    
            $trans = DB::table('detail_trans')
            ->select('detail_trans.trans_fk','transaksis.tanggal_trans','transaksis.user_fk')
            ->selectRaw('COUNT(detail_trans.trans_fk) AS jumlah')
            ->leftJoin('transaksis', 'detail_trans.trans_fk', '=', 'transaksis.kode')
            // ->where('transaksis.tanggal_trans', 'LIKE', '%'.$this->search.'%')
            ->whereBetween('transaksis.tanggal_trans', [$this->date1, $this->date2])
            ->groupBy('detail_trans.trans_fk')
            ->orderBy('tanggal_trans','DESC')
            ->get();
            // dd($trans);
            // return view('keluar.list',compact('trans','startdate'));
        return view('livewire.keluar.transaksi-list',compact('trans'));
    }
}
