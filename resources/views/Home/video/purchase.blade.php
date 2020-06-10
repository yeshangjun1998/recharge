@extends('Home.common.index')
@section('common')
	<style type="text/css">
		.video{
			width:100%;
			height:100%;
		}

		.purchase-title div{
			height:40px;
			line-height:40px;
			background:#f0f1f1;
			padding-left:20px;
		}
		.purchase-title .title{
		    font-size: 24px;
		}

		.content-right a:nth-child(1) {
		    color: #FFF;
		}
		.form{
			width:100%;
			height:50px;
			line-height:50px;
		}
		.form .input-title{
			width:150px;
			text-align:right;
			float:left;
			font-size:18px;
		}
		.form .input-kuang{
			width:400px;
			height:50px;
			float:left;
		}
		.form .input-kuang input{
			height:28px;
			padding-left:2%;
			text-align:center;
		}
		.canshu{
			width:100%;
			height:300px;
		}
		.form .input-title button{
			margin-top:15px;
			width:100px;
			height:40px;
			background:#1B9AF7;
			border-radius:8px;
			color:#fff;
			/*border:1px solid #1B9AF7;*/
		}	
		.form .input-kuang a{
			margin-top:15px;
			margin-left:15px;
			padding:0px;
			display:block;
			width:90px;
			background:#ccc;
			height:40px;
			line-height:40px;
			text-align:center;
			color:black;
			background:#e59501;
			border:1px solid #e59501;
			border-radius:8px;
		}
		.commodity{
			display:block;
			width:100%;
			line-height:50px;
			border:1px solid #fff;
		}
		.commodity .introduce{
			height:50px;
			padding-left:20px;
			border-radius:3px;
			background:#ccc;
		}

		.commodity .introduce-title{
			margin-top:20px;
			padding-left:20px;
		}
		.commodity .introduce-content{
			margin-top:20px;
			padding-left:20px;
		}
	</style>

	<div class="video">
		<div class="purchase">
			<div class="purchase-title">
				<div class="title">{{$data['title']}}</div>
				<div class="price">零售单价：￥{{$data['price']}}</div>

			</div>
			<div class="canshu">
				@if($data['type'] == 2)
				<form action="/video/purchase/store" method="post">
				@csrf
					<input type="text" name="spid" value="{{$data['spid']}}" style="display:none">
					<input type="text" name="money" value="{{$data['price']}}" style="display:none">
					<input type="text" name="type" value="{{$data['type']}}" style="display:none">
					<input type="text" name="num" value="1" style="display:none">
					<div class="form">
						<div class="input-title">账号 ：</div>
						<div class="input-kuang"><input type="text" name="account"></div>
					</div>
					@if($data['demand'] == 1) 
					<div class="form">
						<div class="input-title">密码 ：</div>
						<div class="input-kuang"><input type="text" name="password"></div>
					</div>
					@else
					<input type="text" name="password" value="1" style="display:none">
					@endif
					<div class="form">
						<div class="input-title" style="width:200px"><button>购买</button></div>
						<div class="input-kuang"><a href="/video/index">返回</a></div>
					</div>
					
				</form>
				@else
				<form action="/video/purchase/store" method="post">
				@csrf
					<input type="text" name="spid" value="{{$data['spid']}}" style="display:none">
					<input type="text" name="money" value="{{$data['price']}}" style="display:none">
					<input type="text" name="type" value="{{$data['type']}}" style="display:none">
					<input type="text" name="num" value="1" style="display:none">
					<input type="text" name="password" value="1" style="display:none">
					<div class="form">
						<div class="input-title">联系号码 ：</div>
						<div class="input-kuang"><input type="text" name="account"></div>
					</div>
					<div class="form">
						<div class="input-title" style="width:200px"><button>购买</button></div>
						<div class="input-kuang"><a href="/video/index">返回</a></div>
					</div>
					
				</form>
				@endif
			</div>
			<div class="commodity">
				<div class="introduce">商品介绍</div>
				<div class="introduce-title">
					购买后不会使用，请查看下方的详细说明，或者联系售后<br>
					微信添加： 13393051081   QQ：362591270
				</div>
				<div class="introduce-content">
					<b>产品介绍：</b><br>
					{{$data['detail']}}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('title','加款管理')