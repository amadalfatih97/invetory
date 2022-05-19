<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    public $timestamps = false;
    protected $fillable = ['namasatuan','aktif'/*,stok,dll  */];//field table database
};
