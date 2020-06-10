<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class V_Order extends Model
{
    protected $table = 'v_order';

    // 属于商户
    public function v_ordermerchant()
    {
    	return $this->belongsTo('App\Models\Merchant','m_id','id');
    }

    // 属于商品
    public function v_ordercommodity()
    {
    	return $this->belongsTo('App\Models\Commodity','spid','spid');
    }

}
