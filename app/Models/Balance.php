<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balance';

 	public function balancemerchant()
    {
        return $this->belongsTo('App\Models\Merchant','merchant_id','phone');
    }   
}
