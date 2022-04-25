<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\satuan;
class BarangController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('key');
        // $barangs = Barang::all();
        // $barangs = Barang::paginate(2);
        $barangs = DB::table('barangs')
        ->select('barangs.id','namabarang', 'namasatuan', 'stok', 'lokasi', 'ket')
        ->rightJoin('satuans', 'barangs.idsatuan', '=', 'satuans.id')
        ->where('namabarang', 'LIKE', '%'.$keyword.'%')
        ->orderBy('barangs.namabarang','asc')
        ->get();

        // if ($keyword) {
        //     $barangs = Barang::where("namabarang","LIKE","%$keyword%")->get();
        // }
        return view('barang.list',compact('barangs'));
    }
    
    public function join(){
        $data = DB::table('barangs')
        ->select('barangs.id','namabarang', 'namasatuan', 'stok')
        ->rightJoin('satuans', 'barangs.idsatuan', '=', 'satuans.id')
            ->where('namabarang', 'LIKE', '%pul%')
            ->orderBy('barangs.namabarang','desc')
            ->get();
        echo($data);
    }

    public function input(Request $request){
        $satuans = satuan::all();
        return view('barang.input', compact('satuans'));
    }

    public function prosesInput(Request $request){
        /* validation */
        $request->validate([
            'namabarang' => 'required|max:30',
            'idsatuan' => 'required|max:3',
            'stok' => 'required|max:4',
            'lokasi' => 'required|max:100',
            'ket' => 'required|max:250',
        ]);
        
        /* proses input */
        $barang = new Barang([
            /* database                      namefield */
            'namabarang'=> $request->input('namabarang'),
            'idsatuan'=> $request->input('idsatuan'),
            'stok'=> $request->input('stok'),
            'lokasi'=> $request->input('lokasi'),
            'ket'=> $request->input('ket'),
        ]);
        $barang->save();
        return redirect('/barang/list')->with('success','data berhasil disimpan!');
    }

    public function dataById($id){
        $barang = barang::find($id);
        $satuans = satuan::all();
        return view('barang.edit',compact('barang','satuans'));
        // return $id;
    }

    public function prosesUpdate(Request $request, $id){
        $barang = barang::find($id);
        /* validation */
        $request->validate([
            'namabarang' => 'required|max:30',
            'idsatuan' => 'required|max:3',
            'stok' => 'required|max:4',
            'lokasi' => 'required|max:220',
            'ket' => 'required|max:220',
        ]);
        
        /* proses update */
        $barang->namabarang = $request->input('namabarang');
        $barang->idsatuan = $request->input('idsatuan');
        $barang->stok = $request->input('stok');
        $barang->lokasi = $request->input('lokasi');
        $barang->ket = $request->input('ket');
        $barang->save();
        return redirect('/barang/list')->with('success','data berhasil diupdate!');;
    }

    public function prosesDelete($id){
        // return $id;
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang/list')->with('success','data berhasil dihapus!');;
    }

    public function barangmasuk(Request $request){
        $satuans = satuan::all();
        $barangs = Barang::all();
        return view('barang.masuk', compact('satuans','barangs'));
    }
}
