<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;

class KeluarController extends Controller
{
    /* view input */
    public function barangkeluar(Request $request){
        $barangs = Barang::all();
        return view('keluar.input', compact('barangs'));
    }
}
