<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\Merchant;
use Cookie;

class LoginController extends Controller
{
	// 登录首页
 	public function index()
 	{
 		// $merchant_id = Cookie::get('merchant');
 		// Cookie::queue('merchant','null');
 		// if($merchant_id){
 		// 	echo 1;
 		// }else{
 		// 	echo 2;
 		// }
 		$user = Cookie::get('merchant');
 		// var_dump($merchant_id);
 		return view('home.login.index');
 	}

 	// 执行登录
 	public function store(Request $request)
 	{
 		// 获取form表单传过来得到数据
 		$user = $request->except('_token');
 		// return $user;
 		$merchant = Merchant::where('phone','=',$user['phone'])->where('static','=','1')->first();

	 		$hashed = Hash::check($user['password'], $merchant['password']);
	 		if($hashed){
	 			Cookie::queue('merchant',$merchant['id']);
	 			// return $merchant;
	 			return redirect('/')->with('success','登录成功');
	 		}else{
	 			return redirect('/login')->with('error','登录失败');
	 		}
 		
 	}

 	// 退出
 	public function logout(Request $request)
 	{
 		$file = is_file(public_path().'/Static/batch/batch.csv');
        if($file){
            unlink(public_path().'/Static/batch/batch.csv');
        }
 		Cookie::queue('merchant',null);
 		return redirect('/login')->with('success','退出成功');
 	}
}
