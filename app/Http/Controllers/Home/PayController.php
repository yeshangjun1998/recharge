<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
// use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\Merchant;
use Cookie;
use Hash;

class PayController extends Controller
{
    // 手机充值
    public function phone()
    {
        $merchant_id = Cookie::get('merchant');
        $chaorder = Order::where('merchant_id','=',$merchant_id)->where('state','=','3')->get();
        foreach($chaorder as $k=>$v){
        
            $chaxun = chaxun($v['order']);
            if($chaxun['state'] == '1'){
                $data['state'] = '1';
            }else if($chaxun['state'] == '2'){
                $data['state'] = '2';
            }else{
                $data['state'] = '3';   
            }

            $update = Order::where('order','=',$v['order'])->update($data);
        }
        $order = Order::where('merchant_id','=',$merchant_id)->orderBy('created_at','desc')->take('3')->get();
    	return view("Home.pay.phone")->with('order',$order);
    }

    //手机归属地查询
    public function ownership(Request $request)
    {
        // 判断商户金额是否够
        $phone = $request['phone'];     

        // header('Content-type:text/html;charset=utf-8');
        $apiurl = 'http://apis.juhe.cn/mobile/get';
        $params = array(
          'key' => '7040e2e70d1c9309f70d5052b1b79d1a', //您申请的手机号码归属地查询接口的appkey
          'phone' => $phone //要查询的手机号码
        );
         
        
        $paramsString = http_build_query($params);
         
        $content = @file_get_contents($apiurl.'?'.$paramsString);
        echo $content;
    } 

    // 输入充值密码的页面
    public function paypass(Request $request)
    {
        $data = $request->except('_token');
        return view('/Home/pay/paypass')->with('data',$data);
    }

    public function story(Request $request)
    {  
        $merchant_id = Cookie::get('merchant');
        $merchant = Merchant::where('id',$merchant_id)->first();
        $data1 = $request->except('_token');
        if(Hash::check($merchant['paypswd'],$data1['zhifu'])){
            return back()->with('error','支付密码错误');
        }
        if($merchant['balance'] - $data1['jine'] >= 0){
            $array = chongzhiphone($data1);
            
          
            if($array['error'] == '0'){ 
                $orders = array(
                    'order' => $array['orderid'],
                    'face' => $array['face'],
                    'phone' => $array['account'],
                    'state' => '3',
                    'merchant_id' => $merchant_id,  //需要改
                    'created_at' => $array['starttime'], 
                    'updated_at' => $array['starttime'], 
                 );
                $user = Order::insert($orders);
                $balance['balance'] = $merchant['balance'] - $data1['jine'];
                // $balance = array('balance'=>$array['face']);
                $xiugai = Merchant::where('id',$merchant_id)->update($balance);
                return redirect('/phone/pay')->with('success','已提交');
            }else{
                return back()->with('error','充值失败,请联系客服18333874033微信同号');
            }
        // var_dump($array);
    
        }else{
            return back()->with('error','充值失败,余额不足');
        }

    }

    // 删除批量充值模板
    public function deletefile()
    {
        $merchant_id = Cookie::get('merchant');
        $file = is_file(public_path().'/Static/batch/'.$merchant_id.'/batch.csv');
        if($file){
            unlink(public_path().'/Static/batch/'.$merchant_id.'/batch.csv');
            return redirect('/phone/batch')->with('error','清除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }

    // 批量充值
    public function batch()
    {
        $merchant_id = Cookie::get('merchant');
        $file = is_file(public_path().'/Static/batch/'.$merchant_id.'/batch.csv');
        if($file){

            $data = Excel::toArray(new UsersImport, public_path().'/Static/batch/'.$merchant_id.'/batch.csv');
            // unset($data[0][0]);
            unset($data[0][0]);
            unset($data[0][1]);
        }else{
            $data[0] =1;
        }
    	return view("Home.pay.batch")->with('shuju',$data[0]);
    }
    
    // 正在充值
    public function recharging(Request $request,Excel $excel)
    {
        $merchant_id = Cookie::get('merchant');
        $merchant = Merchant::where('id',$merchant_id)->first();
        $paypswd = $request->except('_token');
        if($merchant['paypswd'] != $paypswd['paypswd']){
            return redirect('/phone/batch')->with('error','支付密码错误');
        }

        $file = is_file(public_path().'/Static/batch/'.$merchant_id.'/batch.csv');
        if(!$file){
            return back()->with('上传的文件失效,请重新上传');
        }
        $data =  $excel::toArray(new UsersImport,public_path().'/Static/batch/'.$merchant_id.'/batch.csv');
        unset($data[0][0]);
        unset($data[0][1]);
        $shibai = 0;
        $tijiao = 0;
        foreach($data[0] as $k=>$v){
            $merchant = Merchant::where('id',$merchant_id)->first();
            // var_dump($v[1]);
            if($merchant['balance'] - $v[1] >= 0){
                $data1['phone'] = $v[0];
                $data1['jine'] = $v[1];
                $array = chongzhiphone($data1);
            
          
                if($array['error'] == '0'){ 
                    $orders = array(
                        'order' => $array['orderid'],
                        'face' => $array['face'],
                        'phone' => $array['account'],
                        'state' => '3',
                        'merchant_id' => $merchant_id,  //需要改
                        'created_at' => $array['starttime'], 
                        'updated_at' => $array['starttime'], 
                     );
                    $user = Order::insert($orders);
                    $balance['balance'] = $merchant['balance'] - $data1['jine'];
                    // $balance = array('balance'=>$array['face']);
                    $xiugai = Merchant::where('id',$merchant_id)->update($balance);
                    $tijiao++;
                    if(!$xiugai){
                        $shibai++;
                    }
                }else{
                    return back()->with('error','充值失败,请联系客服18333874033微信同号');
                }
            }else{
                unlink(public_path().'/Static/batch/'.$merchant_id.'/batch.csv');
                return back()->with('error','余额不足。已经提交'.$tijiao.'次');
            }
        }

        if($shibai == 0 ){
            unlink(public_path().'/Static/batch/'.$merchant_id.'/batch.csv');
            return redirect('/phone/batch')->with('success','提交成功');
        }else{
            return back()->with('error','提交失败'.$shibai.'个');
        }
    }

}
