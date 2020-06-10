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
		<h4>视频订单列表</h4>
		<div class="merchant-table">
			<table border="1" >
				<tr>
					<th>订单号</th>
					<th>商品</th>
					<th>数量</th>
					<th>金额</th>
					<th>商户</th>
					<th>用户账号</th>
					<th>用户密码</th>
					<th>类型</th>
					<th>状态</th>
					<th>创建时间</th>
					<!-- <td>开户时间</td> -->
				</tr>
				@foreach($order as $k=>$v)
				<tr>
					<td>{{$v['v_order']}}</td>
						<td><div style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;width:300px;">{{$v->v_ordercommodity['title']}}</div></td>
						<td>{{$v['num']}}</td>
						<td>{{$v['money']}}</td>
						<td>{{$v->m_id}}</td>
						<td>{{$v['beizhu_name']}}</td>
						<!-- <td class="passw">********</td> -->
						<td class="password" >{{$v['beizhu_pass']}}</td>
						<td>
							@if($v['type'] == 1)
								卡密
							@elseif($v['type'] == 2)
								代充
							@endif
						</td>
						<td>
							@if($v['static'] == 1)
								已付款
							@elseif($v['static'] == 2)
								已发货
							@endif
						</td>
						<td>{{$v['created_at']}}</td>
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