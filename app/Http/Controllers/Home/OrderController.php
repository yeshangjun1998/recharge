<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Merchant;

class OrderController extends Controller
{
    // 订单页面
    public function order()
    {
    	$time = date('Y-m-d');
    	$order = Order::where('created_at','like',"$time%")->get()->toArray();
    	// var_dump($order);
    	return view('Home.order.index')->with('order',$order);
    }

}
