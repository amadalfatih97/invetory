<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
class BarangController extends Controller
{
    public function index(){
        $barangs = Barang::all();
        return view('barang.list',compact('barangs'));
    }

    public function create(Request $request){
        
    }
}
