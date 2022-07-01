<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function index(Request $request){
        
        return view('Permintaan.list');
    }
}
