@extends('Home.common.index')
@section('common')
<link rel="stylesheet" href="/Static/Home/Index/batch.css">
<style type="text/css">
	.security{
		padding:20px;
	}
	.security-tb{
		float:left;
		margin:0px 10px;
	}
	.security-first{
		/*width:80%;*/
		height:50px;
	}
	.security-title{
		float:left;
		line-height:30px;
	}
	.security-content{
		float:left;
		width:65%;
		line-height:30px;
	}
	.security a{
		display:-webkit-inline-box;
		width:60px;
		height:30px;

		border:1px solid #ccc;
		color:black;
	}
</style>
	<div>
		<div class="security">
			<div class="security-first">
				<i class="security-tb"><img src="/Static/images/2.png" alt=""></i>
				<div class="security-title"><b>登录密码：　</b></div>
				<div class="security-content"> 用于平台账号登录时所需密码</div>
				<a href="#">修改</a>
			</div>
			<div class="security-first">
				<i class="security-tb"><img src="/Static/images/2.png" alt=""></i>
				<div class="security-title"><b>支付密码：　</b></div>
				<div class="security-content"> 用于账户资金支付和交易时所需密码</div>
				<a href="#">修改</a>
			</div>
			<div class="security-first">
				<i class="security-tb"><img src="/Static/images/2.png" alt=""></i>
				<div class="security-title"><b>账号注销：　</b> </div>
				<div class="security-content"> 用于注销当前账号</div>
				<a href="#">注销</a>
			</div>
		</div>
@endsection
@section('title','手机充值')