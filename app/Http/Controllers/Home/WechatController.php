<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use App\Models\Balance;
use App\Models\Merchant;
use QrCode;

class WechatController extends Controller
{
    public  function arrayToXml($arr){ 
        $xml = "<root>"; 
        foreach ($arr as $key=>$val){ 
        if(is_array($val)){ 
        $xml.="<".$key.">".arrayToXml($val)."</".$key.">"; 
        }else{ 
        $xml.="<".$key.">".$val."</".$key.">"; 
        } 
        } 
        $xml.="</root>"; 
        return $xml; 
    }

    function xmlToArray($xml)
    {
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }

    // 微信加款页面
    public function index()
    {
    	return view('Home.stration.wechat');
    }

    public function chongzhijk(Request $request)
    {
      $apiurl = 'https://api.mch.weixin.qq.com/pay/unifiedorder';

      $merchant_id = Cookie::get('merchant');
      // $merchant = Merchant::where('id','=',$merchant_id)->first();
      $jiakuan = $request->except('_token');
      // var_dump($data);
      // 微信接口连接
      // 获取统一下单数据
      $params = tongyidingdan($jiakuan);
      // 转换xml格式
      $xmlData = $this->arrayToXml($params);
      // 使用curl 传输
      $data3 = curlhttpstj($apiurl,$xmlData);
      // 将获取的数据转换为数组
      $arr = $this-> xmlToArray($data3);


      if($arr['return_code'] == 'SUCCESS'){
        $arr = QrCode::size(200)->generate(url($arr['code_url']));
        
      var_dump($params);
      $erweima = array(
        'arr' => $arr,
        'out_trade_no' =>$params['out_trade_no'],
        'total_fee' => $params['total_fee']/100,
      );
      
      return view("Home.stration.wechatczjk")->with("data",$erweima);
      }else{
        return back()->with('error','二维码获取失败');
      }
      var_Dump($data['success']['code_url']);
      
        
    }

    // 微信执行加款
    public function store(Request $request)
    {
      $apiurl = 'https://api.mch.weixin.qq.com/pay/orderquery';
      $merchant_id = Cookie::get('merchant');
      $merchant = Merchant::where('id',$merchant_id)->first();
      $data = $request->except('_token');
      // var_dump($data);
      $data1 = array(
            'merchant_id' => $merchant['phone'], 
            'jine' => $data['total_fee'],
            'type' => '3',
            'out_trade_no' => $data['out_trade_no'],
            'static' => '4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        // var_dump($arr);
      $balance = Balance::insertGetId($data1);
      if($balance){
          // 微信查询订单
        $params = dingdanchaxun($data);

        $xmlData = $this->arrayToXml($params);


        $data3 = curlhttpstj($apiurl,$xmlData);

        $arr = $this-> xmlToArray($data3);


        var_dump($arr);
        if($arr['return_code'] == 'SUCCESS'){
            if(array_key_exists('trade_state_desc',$arr)){
              if($arr['trade_state_desc'] == '支付成功'){ 
                $jiakuan = array(
                  'jine' => $arr['total_fee'] /100,
                  'static' => '1',
                );
                $jk = Balance::where('id',$balance)->update($jiakuan);
                if($jk){

                  $shanghu = array(
                    'balance' => $arr['total_fee'] /100+$merchant['balance'],
                  );
                  $chenggong = Merchant::where('id',$merchant_id)->update($shanghu);
                  if($chenggong){
                    return redirect('/wechat/index')->with('success','加款成功');
                  }

                }else{
                  return redirect('/wechat/index')->with('error','如果已经支付请联系管理员审核,给您手动加款');
                }
              }else{
                return redirect('/wechat/index')->with('error','您的订单没有支付,请重新下单支付');
              }
            }else{
              return redirect('//wechat/index')->with('error','您没有付款,没有找到付款订单，如果您已经支付请联系管理员');
            }
        }else{
          return redirect('/wechat/index')->with('error','系统错误,请联系管理员维护');
        }

      }else{ 
        return redirect('/wechat/index')->with('error','联系管理员充值');
      }
    }

    public function grcode()
    {   
      // 订单号
      $data = erweima(2);
      // $url = 'weixin://wxpay/bizpayurl?'.$data;
      return QrCode::size(200)->generate(url($data));
    }


    public function huidiao(Request $request)
    {


    }
}
