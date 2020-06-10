<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use App\Models\Merchant;
use Hash;
use EasyWeChat\Factory;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class IndexController extends Controller
{
    private function payment()
    {
        $config = [
            // 必要配置, 这些都是之前在 .env 里配置好的
            'app_id' => config('wechat.payment.default.app_id'),
            'mch_id' => config('wechat.payment.default.mch_id'),
            'key'    => config('wechat.payment.default.key'),   // API 密钥
            'notify_url' => config('wechat.payment.default.notify_url'),   // 通知地址
        ];
        // 这个就是 easywechat 封装的了, 一行代码搞定, 照着写就行了
        $app = Factory::payment($config);

        return $app;
    }

    // 首页
    public function index()
    {
        $user = Cookie::get('merchant');
    	// Cookie::queue('merchant','15');
    	$merchant = Merchant::where('id','=',$user)->first();
        // view()->share('merchant', Post::recent());
    	return view("Home.index.index")->with('merchant',$merchant);

    }

  



}
