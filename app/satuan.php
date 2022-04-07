<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    public $timestamps = false;
    protected $fillable = ['namasatuan'/*,stok,dll  */];//field table database
}
