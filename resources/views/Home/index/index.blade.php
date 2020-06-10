@extends('Home.common.index')
@section('common')
	<link rel="stylesheet" href="/Static/Home/Index/index.css">
	
		
	<div class="user">
		<font>用户昵称：{{$merchant['nickname']}}</font>
		<font>当前余额：￥{{$merchant['balance']}}</font>
		<a href="#"><button>账号充值</button></a>
	</div>
	<hr>
	<div class="shop">
		<c>店铺基本信息</c>
		<a href="">完善信息</a><br>
		<font class="xinxi">店铺信息：{{$merchant['nickname']}}</font>
		<font class="dianhua">联系电话：{{$merchant['phone']}}</font><br>
		<font class="dizhi">店铺地址：{{$merchant->merchantdetai['address']}}</font>
		<font class="renyuan">联系人员：{{$merchant['name']}}</font>
	</div>
		

@endsection
@section('title','51充值')