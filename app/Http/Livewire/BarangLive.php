<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
use App\masuk;
use Livewire\WithPagination;

class BarangLive extends Component
{
    use WithPagination;
    public $keyword = '';
    public function render()
    {
        // $barangs = Barang::all();
        // $barangs = Barang::paginate(2);
        $barangs = DB::table('barangs')
        ->select('barangs.id','namabarang', 'namasatuan', 'stok', 'lokasi', 'ket')
        ->leftJoin('satuans', 'barangs.idsatuan', '=', 'satuans.id')
        ->where('barangs.aktif', '=', '1')
        ->where(function ($query) {
            $query->where('namabarang', 'LIKE', '%'.$this->keyword.'%')
            ->orWhere('namasatuan', 'LIKE', '%'.$this->keyword.'%');
        })
        ->orderBy('barangs.namabarang','asc')
        ->paginate(3);

        // if ($keyword) {
        //     $barangs = Barang::where("namabarang","LIKE","%$keyword%")->get();
        // }
        return view('livewire.barang-live',compact('barangs'));
    }
}
