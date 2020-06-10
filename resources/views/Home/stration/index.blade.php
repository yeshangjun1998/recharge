@extends('Home.common.index')
@section('common')
<style type="text/css">
	.stration{
		padding:20px;
	}
	.stration-header i:nth-child(2){
		float:right;
		color:red;
	}
	.stration-bt{
		margin-top:20px;
	}
	.stration-bt a:nth-child(1){
		display:-webkit-inline-box;
		width:80px;
		height:40px;
		line-height:40px;
		color:white;
		background:#F86539;
	}
	.stration-bt a:nth-child(2){
		display:-webkit-inline-box;
		width:80px;
		height:40px;
		line-height:40px;
		color:black;
		background:#f2f2f2;
	}
	.stration hr{
		width:100%;
		margin:0px;
		background:#e5e5e5;
	}
	.stration .stration-mode{
		margin-top:10px;
	}
	.stration .stration-pay{
		width:100%;
		margin-top:5px;
		display:flex;
		
	}
	.stration .stration-pay a{
		color:black;
		line-height:0px;
	}
	.stration .stration-body{
		width:100%;
		height:130px;
		border:1px solid #ededed;
		margin-bottom:10px;
		/*float:left;*/
		flex:1;
	}
	.stration .stration-img{
		text-align:center;
	}
	.stration .stration-img img{
		width:250px;
		height:100px;
	}
	.stration .stration-text{
		text-align:center;
	}
	.stration .stration-jl{
		margin-top:10px;

	}
	.stration .table{
		border-color:#e5e5e5;
		border:1px solid #e5e5e5;
	}
</style>
	<div class="stration">
		<div class="stration-header">
			<i>安全快捷</i>
			<i>加款热线：13393051081（微信同号）</i>
		</div>
		<div class="stration-bt">
			<a href="/payment/stration">加款方式</a>
			<a href="/payment/record">加款记录</a>
		</div>
		<hr>
		<div class="stration-mode">
			<label class="stration-title">选择加款方式</label>
			<div class="stration-pay">
				<a href="/alipay/index">
					<div class="stration-body">
						<div class="stration-img"><img src="/Static/images/zhifubao.jpg" alt=""></div>
						<div class="stration-text">支付宝支付</div>
					</div>
				</a>
				<a href="/wechat/index">
					<div class="stration-body">
						<div class="stration-img"><img src="/Static/images/wechat.png" alt=""></div>
						<div class="stration-text">微信支付</div>
					</div>
				</a>
				<a href="/wechat/index">
					<div class="stration-body">
						<div class="stration-img"><img src="/Static/images/wechat.png" alt=""></div>
						<div class="stration-text">银行支付</div>
					</div>
				</a>
				<!-- <a href="/">
				<div class="stration-body">
					<div class="stration-img"><img src="/Static/images/zhifubao.jpg" alt=""></div>
					<div class="stration-text">支付宝支付</div>
				</div>
				</a> -->
			</div>
		</div>
		<div class="stration-jl">
			<label class="stration-title">最近加款记录</label>
			<table width="100%" class="table" border="1px solid #e5e5e5"  cellspacing="0">
				<tr>
					<th>加款方式</th>
					<th>加款金额</th>
					<th>时间</th>
					<th>状态</th>
				</tr>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
				</tr>
			</table>
		</div>
	</div>
@endsection
@section('title','加款管理')