@extends('Home.common.index')
@section('common')
<link rel="stylesheet" href="/Static/Home/Index/batch.css">
<style type="text/css">
	.batch-body{
		margin-left:50px;
		color:red;
	}
	.batch-body a{
		display:block;
		width:120px;
		height:40px;
		float:left;
		border-radius:10px;
		line-height:40px;
		background:#6495ED;
	}
	.batch-body a:nth-child(2){
		margin-right:10px;
	}
	.batch-body a:nth-child(3){
		background:#00BFFF;
	}
	.batch-body a:nth-child(2):hover{
		background:#4169E1;
	}
	.batch-body a:nth-child(3):hover{
		background:#87CEFA;
	}
	.batch-body form{
		height:100px;
	}
	.batch-table{
		padding:0 50px;
		
		text-align:left;
	}
	.batch-table hr{
		width:100%;
		margin-left:-8px;
	}
	.batch-table .table{
		width:100%;

	}
	.batch-table .table tr{
		width:100%;
		display:flex;
		/*text-align:center;*/
	}

	.batch-table .table th{
		flex:1;
		border:1 solid #ccc;
	}
	.batch-table .table td{
		height:40px;
		line-height:40px;
		flex:1;
		border:1 solid #ccc;
	}
	.batch-table h3{
		margin-bottom:0px;
	}
	.batch-table a{
		float:right;
		margin-bottom:5px;
		padding:0px;
		color:black;
		text-align:center;
		line-height:40px;
		width:80px;
		height:40px;
		background:#ccc;
		
		border-radius:4px;
	}
	.paybutton{
		margin-top:30px;
	}
	.paybutton input{
		height:25px;
	}
	.paybutton button{
		width:80px;
		height:40px;
		background:red;
		color:white;
	}
</style>
	<div>
		<div class="tou-anniu">
			<a href="/phone/pay">手机充值</a>
			
			<a href="/phone/batch">批量充值</a>
			<a href="/phone/order">订单查询</a>
			
		</div>

		<div class="batch-body">
			<form id="signupListImportForm" action="/UpdateloadFile" id="updateloadForm" method="post" enctype="multipart/form-data">
			@csrf
				<p>注意：请先下载模版，按照实例输入号码、充值金额，填写之后导入数据，核对无误后提交充值。</p>			
				<a href="javascript:$('#file').click()">导入充值模板</a>
				<input type="file" style="display:none" id="file" accept="application/vnd.ms-excel,application/vnd.ms-excel,application/vnd.ms-excel,application/vnd.ms-excel,application/vnd.ms-excel,.csv,.xlsx" name="file">
				<a href="/LaravelExcel">下载充值模板</a>
				<button id="submit" style="display:none"></button>

			</form>
		</div>
		<div class="batch-table">
		<hr>
			<h3>导入列表</h3>
			<form action="/phone/recharging" method="post"  enctype ="multipart/form-data" >
			@csrf
			<a href="/phone/deletefile">清空列表</a>
				<table width="100%" border="1px solid black"  bgcolor="#ccc" class="table" cellspacing="0">
					<tr>
						<th>序号</th>
						<th>充值号码</th>
						<th>充值金额</th>
					</tr>
					@if($shuju != 1)
					@foreach($shuju as $k=>$v)
					<tr>
						<td>{{$k-1}}</td>
						<td>{{$v[0]}}</td>
						<td>{{$v[1]}}</td>
					</tr>
					@endforeach
					@endif
				</table>
			<div class="paybutton">
				支付密码：<input type="password" maxlength='6' name="paypswd" class="paypassword">
				<button class="paytj">提交充值</button>
			</div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		Paypswd = false;
		$('#file').change(function(){
			$("#submit").click();

		})
		$('.paytj').click(function(){
			if(!Paypswd){
				return false;
			}
		})
		function isPayPassNo(phone) { 
		 	var pattern = /^\d{6}$/; 
		 	return pattern.test(phone); 
		}
		$('.paypassword').keyup(function(){
			if($(this).val().length==6){
				var paypass = $(this).val();
				if(isPayPassNo(paypass) == false){
					$(this).blur();
					alert('请输入6位数字的支付密码')
				}else{
					Paypswd = true;
				}
			}
		})
	</script>

@endsection
@section('title','手机充值')