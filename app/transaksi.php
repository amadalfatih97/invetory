<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = [
        'kode_trans','tanggal_trans','user_fk','type_trans' 
    ]
}
