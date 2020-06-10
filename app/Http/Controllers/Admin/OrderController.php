<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\V_Order;

class OrderController extends Controller
{
    //
    public function index()
    {
    	$time = date('ymd') - 6;
    	// var_dump($time);
        $order = Order::orderBy('created_at','desc')->take('200')->paginate(10);
        // var_dump($order);
    	return view('Admin.order.index')->with('order',$order);
    }

    // 视频订单
    public function video()
    {
    	$order = V_Order::orderBy('created_at','desc')->take('200')->paginate(10);
        // var_dump($order);
    	return view('Admin.order.video')->with('order',$order);
    }
}
