@extends('Admin.common.index')
@section('common')
	<style type="text/css">
		a,a:link,a:visited,a:hover,a:active{
			text-decoration:none
		}
		.search{
			height:40px;
		}
		.neirong{
			padding:5px 0 0 5px;
		}
		.search-body input{
			height:30px;
		}
		.anniu a{
			margin-top:10px;
			float:left;
			display:black;
			margin-left:10px;
			width:60px;
			height:40px;
			text-align:center;
			line-height:40px;
			border:1px solid #d9534f;
			border-radius:4px;
			background:#d43f3a;
			color:#fff;
		}
		.anniu .frozen{
			background:#5bc0de;
			border-color:#46b8da;
		}
		.anniu .transfer{
			width:130px;
			background-color: #f0ad4e;
    		border-color: #eea236;
		}		
		.merchant-table table{
			width:100%;
			border-collapse: collapse;
		}
		.merchant-details{
			float:left;
			display:block;
			width:50px;
			height:30px;
			text-align:center;
			line-height:30px;
			background:#5bc0de;
			border-radius:3px;
			border-color: #46b8da;
		}
	</style>
	<link rel="stylesheet" href="/Static/Home/fenye.css">
	<div class="neirong">
		<h4>订单列表</h4>
		<div class="search">
			<div class="search-body">
				输入号码：<input type="text" name="nickname" placeholder="商户名称">			
			</div>
			<br>
		</div>
		<br>
		<div class="merchant-table">
			<table border="1" >
				<tr>
					<td>订单号</td>
					<td>充值号码</td>
					<td>扣款金额</td>
					<td>创建时间</td>
					<td>完成时间</td>
					<td>店铺名称</td>
					<td>状态</td>
					<!-- <td>开户时间</td> -->
				</tr>
				@foreach($order as $k=>$v)
				<tr>
					<td>{{$v['order']}}</td>
					<td>{{$v['phone']}}</td>
					<td>{{$v['face']}}</td>
					<td>{{$v['created_at']}}</td>
					<td>{{$v['updated_at']}}</td>
					<td>{{$v->ordermerchant['nickname']}}</td>
					<td>@if($v['state'] == 1)充值成功@elseif($v['state'] == 3)正在充值 @else 充值失败@endif</td>
				</tr>
				@endforeach
			</table>
			{{ $order->links() }}
		</div>
	</div>
	<script type="text/javascript">
		$('.title-biaoti:eq(1)').next().css('display','block');
		$('.title-biaoti:eq(1)').next().children().children().eq(0).css('background','#CCC');
		// $("input[type='checkbox']").eq(1).attr('checked',true);
	</script>

@endsection
@section('title','商户列表');