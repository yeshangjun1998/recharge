@extends('Admin.common.index')
@section('common')
	<style type="text/css">
		a,a:link,a:visited,a:hover,a:active{
			text-decoration:none
		}
		.search{
			height:80px;
		}
		.neirong{
			padding:5px 0 0 5px;
		}
		.search-body input{
			height:30px;
		}	
		.merchant-table table{
			width:100%;
			border-collapse: collapse;
		}
		.merchant-table table td:nth-child(2){
			width:650px;
		}
		.merchant-table table td:nth-child(1){
			width:30px;
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
		.merchant-table tr td a{
			float:left;
			display:black;
			margin-left:10px;
			width:50px;
			height:30px;
			text-align:center;
			line-height:30px;
			border:1px solid #d9534f;
			border-radius:4px;
			background:#46b8da;
			color:#fff;
		}
		nav{
			width:100%;
		}
		nav ul{
			width:100%;
			text-align:center;
		}
		nav ul li{
			margin:10px 5px;
			
			width:50px;
			height:30px;
			line-height:30px;
			background:#ccc;
			float:left;
		}
		nav ul li .page-link{
			font-weight:900;
			font-size:20px;
			display:block;
			width:100%;
			height:100%;

		}
		nav ul li .page-item{
			font-weight:900;
			font-size:20px;
			display:block;
			width:100%;
			height:100%;

		}
		nav ul .disabled{
			cursor: not-allowed;
		}
		.videophone{
			width:260px;
			height:30px;
			display:flex;
		}
		.videophone a{
			margin-left:10px;
			flex:1;
			line-height:25px;
			text-align:center;
			background:#ccc;
			color:black;
			border:2px solid #ccc;
		}
	</style>
	<div class="neirong">
		<div class="search">
			<div class="videophone">
				<a href="javascript:;" class="video">视频列表</a>
				<a href="javascript:;" class="phone">话费列表</a>
			</div>
			<br>
			<div class="search-body">
				商户名称：<input type="text" name="nickname" placeholder="商品名称">
			</div>
			<br>
		</div>
		<br>
		<div class="merchant-table">
			<table border="1" >
				<tr>
					<td><input type="checkbox" class="0"></td>
					
					<td>商品名称</td>
					<td>商品编号</td>
					<td>商品详情</td>
					<td>商品价格</td>
					
					<td>商品类型</td>
					<td>商品状态</td>
					<!-- <td>开户时间</td> -->
					<td>操作</td>
				</tr>
				@foreach($commodity as $k=>$v)
				<tr>
					<td><input type="checkbox" class="0"></td>
					
					<td>{{$v['title']}}</td>
					<td>{{$v['spid']}}</td>
					<td>{{$v['detail']}}</td>
					<td>{{$v['price']}}</td>
					<td>
						@if($v['type'] == 1)
							卡密
						@else
							代充
						@endif	
					</td>
					<td>
						@if($v['static'] == 1)
						上架
						@else
						下架
						@endif
					</td>
					<td>
						@if($v['static'] == 1)
							<a href="/admin/commodity/caozuo/{{$v['id']}}">上架</a>
						@else
							<a href="/admin/commodity/caozuo/{{$v['id']}}">下架</a>
						@endif
							<a href="/admin/commodity/delete/{{$v['id']}}">删除</a>

					</td>
				</tr>
				@endforeach
			</table>
			{{ $commodity->links() }}
		</div>
	</div>
	<script type="text/javascript">
		$('.title-biaoti:eq(3)').next().css('display','block');
		$('.title-biaoti:eq(3)').next().children().children().eq(0).css('background','#CCC');

		$('.active').css('background','#ffff00');

	</script>
@endsection
@section('title','商户列表');