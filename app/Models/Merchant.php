<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    //
    protected $table = 'merchant';
    // public $timestamps = false;
     public function merchantdetai()
    {
        return $this->hasOne('App\Models\Details','merchant_id','id');
    }
}
