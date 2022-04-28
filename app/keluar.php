<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keluar extends Model
{
    protected $fillable=[
        'kode','iduser','kodebarang','qty','status','tanggalkeluar'
    ];
};
