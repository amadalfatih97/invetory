<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailTrans extends Model
{
    protected $fillable = [
        'trans_fk','barang_fk','quantity' 
    ];
}
