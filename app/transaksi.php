<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = [
        'kode','tanggal_trans','user_fk','type_trans','status' 
    ];
};
