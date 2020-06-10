@extends('Home.common.index')
@section('common')
<link rel="stylesheet" href="/Static/Home/Index/phone.css">
<style type="text/css">
	.phoneorder{
		padding:0 20px 10px 20px;
	}
</style>
	<div>
		<div class="tou-anniu">
			<a href="/phone/pay">手机充值</a>
			<a href="/phone/batch">批量充值</a>
			<a href="/phone/order">订单查询</a>
		</div>
		<br>
		<div class="pay-form">
			<form action="/phone/story" method="post">
			@csrf
                <div class="control-group">
                  	<label class="control-label" maxlength="11" for="focusedInput">支付密码：</label>
                  	<div class="controls">
                    	<input type="password" name="zhifu" autocomplete="off"  placeholder="支付密码"> 
                  	</div>
                  	 
                </div>
                <input type="text" name="phone" style="display:none" value="{{$data['phone']}}">
                <input type="text" style="display:none" value="{{$data['jine']}}" name="jine">
				<div class="tijao">
					<button>提交充值</button> <!-- <a href="" style="color:red">重新输入</a><br> -->
				</div>
				<div class="wenxin">
					温馨提示：请仔细核对信息，订单充值后无法退款。
					
				</div>
			</form>
		</div>
		<!-- 最近订单查询 -->
		
	</div>
@endsection
@section('title','输入支付密码');