@extends('Home.common.index')
@section('common')
<link rel="stylesheet" href="/Static/Home/Index/batch.css">
<style type="text/css">
	.tou-anniu a:nth-child(2){
		background: #ccc;
    	color: black;
	}
	.tou-anniu a:nth-child(3){
		background: white;
    	color: blue;
	}
	.order-body{
		padding:10px 20px 0 20px;
	}
	.order-body form{
		padding-bottom:10px;
	}
	.order-body form input{
		width:100px;
		height:28px;
		margin-right:10px;
	}
	.order-body form button{
		width:80px;
		height:35px;
		background:#F86539;
		color:#fff;
		margin-left:10px;
	}
	.order-body form a{
		color:black;
		display: -webkit-inline-box;
		border:1px solid #ccc;
		padding:0px;
		width:80px;
		height:30px;
		text-align:-webkit-center;
		background:url('/Static/images/1.png');
		background-size:80px 30px;
		/*margin-right:10px;*/
	}
</style>
	<div>
		<div class="tou-anniu">
			<a href="/phone/pay">手机充值</a>
			
			<a href="/phone/batch">批量充值</a>
			<a href="/phone/order">订单查询</a>
			
		</div>

		<div class="order-body">
			<form action="#" method="post">
				充值号码：<input type="text" maxlength='11' placeholder="充值号码" name="phone">
				状态：
				<a href="javascript:;">全部</a>
				<a href="javascript:;">充值成功</a>
				<a href="javascript:;">充值失败</a>
				<a href="javascript:;">充值中</a>
				<button>查询</button>
			</form>
			<div>
				<table width="100%" border="1px solid black" cellspacing="0">
					<tr>
						<th>订单号</th>
						<th>手机号码</th>
						<th>时间</th>
						<th>运营商</th>
						<th>状态</th>
						<th>充值金额</th>
						<th>扣费金额</th>
					</tr>
					@foreach($order as $k=>$v)
					<tr>
						<td>{{$v['order']}}</td>
						<td>{{$v['phone']}}</td>
						<td>{{$v['updated_at']}}</td>
						<td>{{ownership($v['phone'])}}</td>
						<td>
							@if($v['state'] == 3)
								正在充值
							@elseif($v['state'] == 2)
								充值失败
							@else
								充值成功
							@endif
						</td>
						<td>{{$v['face']}}</td>
						<td>1</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
		
		
	</div>
	<script type="text/javascript">
	
	</script>

@endsection
@section('title','手机充值')