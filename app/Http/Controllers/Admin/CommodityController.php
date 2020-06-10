<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commodity;

class CommodityController extends Controller
{
    // 商品列表
    public function index()
    {
    	$data = Commodity::orderBy('id','desc')->paginate(10);
 
    	return view('admin.commodity.index')->with('commodity',$data);
    }

    // 添加商品
    public function create()
    {
    	return view('admin.commodity.create');
    }

    // 执行商品
    public function story(Request $request)
    {
    	$data = $request->except('_token');
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');
    	$commodity = Commodity::insert($data);
    	if($commodity){
    		return redirect('/admin/commodity/index')->with('success','添加成功');
    	}else{
    		return back()->with('error','添加失败');
    	}
    }

    // 上下架操作
    public function caozuo($id)
    {
    	$commodity = Commodity::where('id',$id)->first();
    	if($commodity['static'] == '1'){
    		$data['static'] = 2;
    	}else{
    		$data['static'] = 1;
    	}
    	var_Dump($data);
    	$id = Commodity::where('id',$id)->update($data);
    	if($id){
    		return redirect('/admin/commodity/index')->with('success','操作成功');
    	}else{
    		return back()->with('error','操作失败');
    	}
    }

    // 视频列表
    public function phoneindex()
    {
        echo 1;
    }
}
