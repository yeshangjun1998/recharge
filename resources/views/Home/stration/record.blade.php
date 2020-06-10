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
	.stration-bt a:nth-child(2){
		display:-webkit-inline-box;
		width:80px;
		height:40px;
		line-height:40px;
		color:white;
		background:#F86539;
	}
	.stration-bt a:nth-child(1){
		display:-webkit-inline-box;
		width:80px;
		height:40px;
		line-height:40px;
		color:black;
		background:#f2f2f2;
	}
	.stration-mode{
		margin-top:10px;
	}
	.stration-body{
		margin-top:10px;
	}
	.stration .stration-body .table{
		border-color:#e5e5e5;
		border:1px solid #e5e5e5;
	}
	.stration-mode a{
		/*padding:0px;*/
		margin-right:10px;
		display:-webkit-inline-box;
		width:80px;
		height:30px;
		line-height:30px;
		/*border:1px solid ;*/
		background-image:url('/Static/images/1.png');
		background-size:100px 30px;
		color:black;
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
		<div class="stration-mode">
			<label>加款方式：</label>
			<a href="#">全部</a>
			<a href="#">支付宝</a>
			<a href="#">微信</a>
		</div>
		<div class="stration-body">
			<table class="table" width="100%" border="1px solid #e5e5e5"  cellspacing="0">
				<tr>
					<th>订单号</th>
					<th>加款方式</th>
					<th>加款金额</th>
					<th>时间</th>
					<th>状态</th>
				</tr>
				<tr>
					<td>1</td>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
				</tr>
			</table>
		</div>
	</div>
@endsection
@section('title','加款记录')