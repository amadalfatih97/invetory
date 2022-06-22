<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\masuk;

class BarangLive extends Component
{
    public $keyword = '';
    public function render()
    {
        // $barangs = Barang::all();
        // $barangs = Barang::paginate(2);
        $barangs = DB::table('barangs')
        ->select('barangs.id','namabarang', 'namasatuan', 'stok', 'lokasi', 'ket')
        ->rightJoin('satuans', 'barangs.idsatuan', '=', 'satuans.id')
        ->where('namabarang', 'LIKE', '%'.$this->keyword.'%')
        ->where('barangs.aktif', '=', '1')
        ->orderBy('barangs.namabarang','asc')
        ->get();

        // if ($keyword) {
        //     $barangs = Barang::where("namabarang","LIKE","%$keyword%")->get();
        // }
        return view('livewire.barang-live',compact('barangs'));
    }
}
