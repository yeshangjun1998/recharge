<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commodity;
use App\Models\V_Order;
use App\Models\Merchant;
use Cookie;

class VideoController extends Controller
{
	function xmlToArray($xml)
    {
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }

    // 视频首页
	public function index()
	{
		$data = Commodity::orderBy('id','desc')->paginate(10);
 
		return view('Home.video.index')->with('data',$data);
	}

	// 购买页面
	public function purchase($id)
	{
		$data = Commodity::where("id",$id)->first();
		return view('Home.video.purchase')->with('data',$data);
	}

	// 执行充值 
	// 代充需要 	$spid,$num,$money,$account,$pass  商品id,数量，金额，账号，密码
	// 卡密需要		$spid,$num,$money  商品id，数量，金额
	// 返回值   	{"study":1,"code":8888,"order":"API-DC202005291454243004305","money":7.3}
	public function store(Request $request)
	{
		$merchant_id = Cookie::get('merchant');
		$data = $request->except('_token');
		$merchant = Merchant::where('id',$merchant_id)->first();
		if($data['money'] > $merchant['balance']){
			return back()->with('error','金额不足');
		}
		
		if($data['type'] == 2){
			$fanhui = daichong($data['spid'],$data['num'],$data['money'],$data['account'],$data['password']);
		}else{
			$fanhui = kami($data['spid'],$data['num'],$data['money']);
		}
		$fanhui = json_decode($fanhui,true);

		$fanhui['study'] = '1';
		$fanhui['code'] = '8888';
		$fanhui['order'] = "API-DC202005291454243004305";
		if($fanhui['study'] == '1'){
			if($fanhui['code'] == '8888'){
				$tianjia = array(
					'v_order' => $fanhui['order'],
					'num' => $data['num'],
					'money' => $data['money'],
					'spid' => $data['spid'],
					'm_id' => $merchant_id,
					'beizhu_name' => $data['account'],
					'beizhu_pass' => $data['password'],
					'type' => $data['type'],
					'static' => '1',
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
				);
				$v_order = V_Order::insert($tianjia);
				$balance['balance'] = $merchant['balance'] - $data['money'];
				$xiugai = Merchant::where('id',$merchant_id)->update($balance);
				if($v_order){
					return redirect('/video/order')->with('success','已下单'); 
				}
			}else if($fanhui['code'] == '4004'){
				return back()->with('error','商品库存不足'); 
			}else if($fanhui['code'] == '4003'){
				return back()->with('error','商品不存在或已下架，或者余额不足');
			}else{
				return back()->with('error','系统错误，请联系客服维护');
			}
		}else{
			return back()->with('error','系统错误，请联系客服维护');
		}
	}

	// 视频订单页面
	public function order()
	{
		$merchant_id = Cookie::get('merchant');
		$data1 = V_Order::where('m_id',$merchant_id)->where('static','1')->get();
		foreach($data1 as $k=>$v){
			$query = query($v['v_order']);
			$query = json_decode($query,true);
			if($query['stduy'] == '4'){
				$xiugai = array('static' => 2);
				$data = V_Order::where('v_order',$v['v_order'])->update($xiugai);
			}
		}
		$data = V_Order::where('m_id',$merchant_id)->get();
		return view('/Home/video/order')->with('order',$data);
	}


	// 充值执行 查询用户  代充
	// public function store(Request $request)
	// {
	// 	// 代充
	// 	$postdata = array('code'=>100);
	// 	$p['user'] = '13393051081';
	// 	$p['pass'] = 'qa123456';
	// 	$beizhu[0]='15530811252';//QQ账号 
	// 	$beizhu[1]='yeshangjun1998';//QQ密码
	// 	$beizhu = base64_encode(json_encode($beizhu));
	// 	$p['api'] = 'http://6666vip.waa.cn/home/api/';
	// 	$token = md5('user='.$p['user'].'&&pass='.md5($p['pass']).'');


	// 	$postdata['user'] = $p['user'];
	// 	$postdata['pass'] = md5($p['pass']);
	// 	$postdata['spid'] = '166';
	// 	$postdata['mun'] = '1';
	// 	$postdata['money'] = '8';
	// 	$postdata['order'] = time().mt_rand(1111,9999);
	// 	$postdata['code'] = '102';
	// 	$postdata['beizhu'] = $beizhu;
	// 	$postdata['token'] = $token;
	// 	$postdata['yibu'] = '1';
 // 		var_Dump($postdata);
	// 	$fdata = curl_post_https($p['api'],$postdata);
		
	// 	echo $fdata;
	// }


	// 查询 
	// public function store(Request $request)
	// {
	// 	$api = 'http://6666vip.waa.cn/home/api/';
	// 	$postdata = array(
	// 		'user' => '13393051081',
	// 		'pass' => md5('qa123456'),
	// 		'order' => 'API-DC202005291454243004305',
	// 		'code' => '1010',
	// 	);
	// 	$postdata['token'] = md5('user='.$postdata['user'].'&&pass='.$postdata['pass'].'');

	// 	$fdata = curl_post_https($api,$postdata);
	// 	echo $fdata;

	// }

}



