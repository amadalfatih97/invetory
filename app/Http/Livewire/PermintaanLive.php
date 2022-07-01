<?php

namespace App\Http\Livewire;

use App\Barang;
use App\detailTrans;
use App\transaksi;
use Livewire\Component;

class PermintaanLive extends Component
{
    public $kodebrg=[],$qty,$tglkeluar;
    public function render()
    {
        $barangs =  Barang::select('*')
                    ->where('aktif', '=', '1')
                    ->orderBy('namabarang', 'ASC')->get();
        return view('livewire.permintaan.permintaan-live',compact('barangs'));
    }

    public function eventAdd(){
        $this->dispatchBrowserEvent('openAddModal');
    }

    public function save(){
        // $this->validate([
        //     'kodebrg'=>'required',
        //     'qty'=>'required'
        // ]);
        date_default_timezone_set('Asia/Jakarta');
        $notrans = 'OUT'.date('ymd-His');

        // $trans = new transaksi([
        //     /* database                      namefield */
        //     'kode'=> $notrans,
        //     'tanggal_trans'=> $this->tglkeluar,
        //     'user_fk'=> 'inputuser',
        //     'type_trans'=> 'out',
        //     'status'=> 'pending'
        // ]);
        // $trans->save();
        // foreach ($this->kodebrg as $item => $value) {
        //     $datas = array(
        //         'trans_fk' => $trans->kode,
        //         'barang_fk' => $this->kodebrg[$item],
        //         'quantity' => $this->qty[$item]
        //     );
        //     detailTrans::create($datas);
        // }
        $this->dispatchBrowserEvent('saveSuccessed', [
            'brg'=>json_encode($this->kodebrg)
        ]);

        // return redirect('/barang-keluar/list')->with('success','data berhasil diinput!');
    }
}
