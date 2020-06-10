<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use Hash;
use Cookie;

class LoginController extends Controller
{
    // login首页
    public function index()
    {
    	return view("Admin.login.index");
    }

    // 执行登录
    public function store(Request $request)
    {
    	// 获取form表单传过来得到数据
 		$user = $request->except('_token');
 		$merchant = Merchant::where('phone','=',$user['phone'])->where('state','=','0')->first();

 		$hashed = Hash::check($user['password'], $merchant['password']);
 		if($hashed){
 			Cookie::queue('adminuser',$merchant['id']);
 			return redirect('/admin')->with('success','登录成功');
 		}else{
 			return redirect('/admin/login')->with('error','登录失败');
 		}
    }

    public function outlogin()
    {
    	$merchant = Cookie::queue('adminuser',null);
    	if(!$merchant){
    		return redirect('/admin/login')->with('success','成功退出');
    	}else{
    		return back()->with('error',"退出失败");
    	}

    }

}
