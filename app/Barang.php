<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = [
        'kode','namabarang','idsatuan','stok','lokasi','ket','aktif' 
    ];//field table database
}
