<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

 Route::group(['middleware' => 'login'], function () {
        // 需要通过 admin 中间件才能访问的路由
		// 首页
	Route::get('/','Home\IndexController@index');
    // 充值页面
	Route::get('/phone/pay','Home\PayController@phone');
	// 输入支付密码
	Route::get("/phone/paypass",'Home\PayController@paypass');
	// 提交充值
	Route::post('/phone/story','Home\PayController@story');
	// 批量充值
	Route::get('/phone/batch','Home\PayController@batch');
	// 删除批量上传的模板
	Route::get('/phone/deletefile','Home\PayController@deletefile');
	// 手机归属地查询API
	Route::get('/ownership','Home\PayController@ownership');
	// 下载批量导入模板
	Route::get('/LaravelExcel','Home\LaravelExcelControlle@LaravelExcel');
	// 上传批量导入模板
	Route::post("/UpdateloadFile",'Home\LaravelExcelControlle@UpdateloadFile');
	// 正在批量充值
	Route::post("/phone/recharging",'Home\PayController@recharging');
	// 订单页面
	Route::get("/phone/order","Home\OrderController@order");
	// 安全中心
	Route::get("/security",'Home\SecurityController@index');
	// 加款页面
	Route::get("/payment/stration",'Home\StrationController@index');
	// 加款记录
	Route::get("/payment/record",'Home\StrationController@record');
	// 阿里云支付加款
	Route::get("/alipay/index",'Home\AliyunController@index');
	// 微信支付加款 
	Route::get("/wechat/index",'Home\WechatController@index');
	// 微信返回接口
	
	// 视频会员
	Route::get('/video/index','Home\VideoController@index');
	// 购买视频页面
	Route::get("/video/purchase/{id}",'Home\VideoController@purchase');
	// 执行购买视频页面
	Route::post("/video/purchase/store",'Home\VideoController@store');
	// 视频订单
	Route::get('/video/order','Home\VideoController@order');
	// 充值加款
	Route::post("/wechat/chongzhijk",'Home\WechatController@chongzhijk');
	// 执行添加加款
	Route::post("/wechat/store",'Home\WechatController@store');
});
// 登录页面
Route::get('/login','Home\LoginController@index');
// 执行登录
Route::post("/login/store",'Home\LoginController@store');
// 退出
Route::get('/logout','Home\LoginController@logout');
// 生成二维码
Route::get("/wechat/grcode",'Home\WechatController@grcode');






// 后台 ======
// 后台登录
Route::get("/admin/login",'Admin\LoginController@index');
// 执行登录
Route::post("/admin/login/store",'Admin\LoginController@store');
// 后台瑞出
Route::get('/admin/outlogin','Admin\LoginController@outlogin');
Route::group(['middleware' => 'adminlogin'], function () {
	// 后台首页
	Route::get("/admin",'Admin\IndexController@index');
	// 商户管理
	Route::get("/admin/merchant",'Admin\MerchantController@index');
	// 新增商户
	Route::get("/admin/merchant/create",'Admin\MerchantController@create');
	// 执行添加
	Route::post("/admin/merchant/story",'Admin\MerchantController@story');
	// 执行冻结
	Route::get("/admin/merchant/frozen",'Admin\MerchantController@frozen');

	// 人工加款
	Route::get("/admin/finance/artificial",'Admin\FinanceController@artificial');
	// 提交
	Route::post("/admin/artificial/story",'Admin\FinanceController@story');
	// 加款列表
	Route::get("/admin/finance",'Admin\FinanceController@finance');
	// 加款详情
	Route::get('/admin/finance/auditing/{id}','Admin\FinanceController@auditing');
	// 加款审核
	Route::post("/admin/finance/examine",'Admin\FinanceController@examine');
	// 视频订单查询
	Route::get("/admin/order/index",'Admin\OrderController@index');
	// 视频订单
	Route::get("/admin/video/order/index",'Admin\OrderController@video');

	// 视频商品列表
	Route::get("/admin/commodity/index","Admin\CommodityController@index");
	// 添加视频商品
	Route::get("/admin/commodity/create",'Admin\CommodityController@create');
	// 执行添加视频商品
	Route::post("/admin/commodity/story",'Admin\CommodityController@story');
	// 上下架处理
	Route::get("/admin/commodity/caozuo/{id}",'Admin\CommodityController@caozuo');
	// 话费商品列表
	Route::get("/admin/commodity/phoneindex",'Admin\CommodityController@phoneindex');
});

