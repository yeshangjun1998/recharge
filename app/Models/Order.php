<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function ordermerchant()
    {
    	return $this->belongsTo('App\Models\Merchant','merchant_id','id');
    }
}
