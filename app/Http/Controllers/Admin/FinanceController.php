<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Balance;

class FinanceController extends Controller
{
	// 加款列表
	public function finance()
	{
		$balance = Balance::orderBy('created_at','desc')->paginate(10);
		return view('Admin.finance.index')->with('balance',$balance);
	}
	// 加款详情
	public function auditing($id)
	{
		$balance = Balance::where('id',$id)->first();
		return view('Admin.finance.auditing')->with('balance',$balance);
	}

	// 加款审核
	public function examine(Request $request)
	{
		$balance = $request->except('_token');
		if($balance['chengorbai'] == 0){
			// var_dump($id);

			$merchant = Merchant::where("phone",$balance['phone'])->first();
			$users['static'] = '1';
			$user['balance'] = $merchant['balance'] + $balance['jine']; 
			if(Balance::where("id",$balance['id'])->update($users)){
				$id = Merchant::where("phone",$balance['phone'])->update($user);
				if($id){
					return redirect('/admin/finance/')->with('success','加款成功');
				}
			}
			$error = '加款失败,联系客服13393051081(微信同号)';
		}else{
			$users['static'] = '3';
			if(Balance::where("id",$balance['id'])->update($users)){
				return redirect('/admin/finance/')->with('success','审核不通过');
			}
			$error = '审核不通过';
		}

	}

    // 人工加款
    public function artificial()
    {	
 		$merchant = Merchant::get()->toArray();
 		// var_dump($merchant);
    	return view('Admin.finance.artificial')->with('merchant',$merchant);
    }

    // 提交加款
    public function story(Request $request)
    {
    	$merchant = $request->except('_token');
    	// Balance::where('phone',)
    	$merchant['static'] = '2';
    	$merchant['type'] = '1';
    	$merchant['created_at'] = date('Y-m-d H:i:s');
    	$merchant['updated_at'] = date('Y-m-d H:i:s');
    	// var_dump($merchant);
    	// die;
    	$data = Balance::insert($merchant);
    	// dd($data);
    	// $data = Merchant::where(data'phone','=',$merchant['phone'])->update($merchant);
    	if($data){
    		return redirect('/admin/finance')->with('success','提交成功');
    	}else{
    		return back()->with('error','提交失败');
    	}
    }
}
