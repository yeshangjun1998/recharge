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
	.passw{
		cursor:pointer;
	}
	.password{
		cursor:pointer;
	}
</style>
	<div>
		<div class="order-body">
			<div>
				<table width="100%" border="1px solid black" cellspacing="0">
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
					</tr>
					@foreach($order as $k=>$v)
					<tr>
						<td>{{$v['v_order']}}</td>
						<td><div style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;width:300px;">{{$v->v_ordercommodity['title']}}</div></td>
						<td>{{$v['num']}}</td>
						<td>{{$v['money']}}</td>
						<td>{{$v->v_ordermerchant['nickname']}}</td>
						<td>{{$v['beizhu_name']}}</td>
						<td class="passw">********</td>
						<td class="password" style="display:none">{{$v['beizhu_pass']}}</td>
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
			</div>
		</div>
		
		
	</div>
	<script type="text/javascript">
		$('.passw').click(function(){
			$(this).css('display','none');
			$(this).next().css('display','block');
		});

		$('.password').click(function(){
			$('.password').css('display','none');
			$('.passw').css('display','block');
		});
	</script>

@endsection
@section('title','手机充值')