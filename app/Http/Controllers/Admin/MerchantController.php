<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use Illuminate\Support\Facades\Hash;
class MerchantController extends Controller
{
    // 商户管理首页
	public function index()
	{
		$merchant = Merchant::where("static",'!=','3')->get()->toArray();
		return view("Admin.merchant.index")->with('merchant',$merchant);
	}

	// 冻结用户
	public function frozen(Request $request)
	{
		$url = $request->all();
		dd($url);
		// foreach($request->get('checks') as $k=>$v){
			// var_dump($v);

		// }
	}

	// 新增商户
	public function create()
	{
		return view("Admin.merchant.create");
	}

	// 执行添加
	public function story(Request $request)
	{
		$data = $request->except('_token');
		$merchant =  Merchant::where('phone','=',$data['phone'])->first();
		if(!$merchant){
				$user = array(
				'static' => '2',
				'balance' => '0',
				'group_id' => '1',
				'phone' => $data['phone'],
	 			'name' => $data['name'],
	  			'nickname' => $data['nickname'],
	  			'password' => Hash::make($data['password']),
	  			'created_at' => date("Y-m-d H:i:s"),
	  			'updated_at' => date("Y-m-d H:i:s"),
			);
			if(Merchant::insert($user)){
				return redirect('/admin/merchant');
			}else{
				return back();
			}
		}else{
			return back()->with('error','手机号码已存在');
		}
		
	}

	// 带审核页面
	public function examine()
	{
		$merchant = Merchant::where('static','=','3')->get()->toArray();
		return view("Admin.merchant.examine");
	}

}
