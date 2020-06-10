@extends('Home.common.index')
@section('common')
	<style type="text/css">
		.video{
			width:100%;
			height:100%;
		}
		.product{
			width:100%;
			/*float:left;*/
		}
		.product table{
			width:100%;
			float:right;
			text-align:center;
			border:1px solid #707070;
		}
		.product table th{
			background:#9a9a9a;
			height:40px;
			color:#FFFFFF;
			border-radius:1px;
			/*border:0px;*/
		}
		.product table td{
			height:40px;
			border-top:1px dashed #ccc;

		}
		.product table tr a{
			display:block;
			width:80%;
			height:80%;
			padding:0px;
			background:#1B9AF7;
			color:#FFF;
			border-radius:4px;
		}
		.content-right a:nth-child(1) {
		    color: #FFF;
		}
	</style>

	<div class="video">
		<!-- <div class="business">
			qq: <br>
			微信：13393051081
		</div> -->
		<div class="product">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th>商品名称</th>
					<th>零售价</th>
					<th>库存</th>
					<th>操作</th>
				</tr>
				@foreach($data as $k=>$v)
				<tr>
					<td style="text-align:left;padding-left:20px;width:40%;"><div style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;width:450px;">【@if($v['type']==1) 卡密  @else 代充 @endif】{{$v['title']}}</div></td>
					<td>{{$v['price']}}</td>
					<td style="text-align:left;padding-left:20px; width:300px"><div style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;width:200px;">{{$v['detail']}}</div></td>
					<td><a href="/video/purchase/{{$v['id']}}">购买</a></td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection
@section('title','加款管理')