<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = [
        'namabarang','idsatuan','stok','lokasi','ket' 
    ];//field table database
}
