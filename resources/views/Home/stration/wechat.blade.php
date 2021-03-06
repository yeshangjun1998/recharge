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
	.stration-bt a:nth-child(1){
		display:-webkit-inline-box;
		width:80px;
		height:40px;
		line-height:40px;
		color:white;
		background:#F86539;
	}
	.stration-bt a:nth-child(2){
		display:-webkit-inline-box;
		width:80px;
		height:40px;
		line-height:40px;
		color:black;
		background:#f2f2f2;
	}
	.stration hr{
		width:100%;
		margin:0px;
		background:#e5e5e5;
	}
	.stration .stration-mode{
		margin-top:10px;
	}
	.stration .stration-pay{
		width:100%;
		margin-top:5px;
		display:flex;
		
	}
	.stration-pay a:nth-child(1){
		color:black;
	}
	.stration-pay a{
		display:-webkit-inline-box;
		height:60px;
		padding:0 20px;
		line-height:60px;
		border:1px solid #ccc;
		color:black;
		font-size:20px;
		margin-right:10px;
		border-radius:10px;
	}
	.stration-mode img{
		margin:30px 30px 30px 100px;
		width:300px;
		height:350px;
	}
	.tsyu{
		margin-left:100px;
		color:red;
	}
	.stration button{
		width:90px;
		height:40px;
		margin-left:180px;
		margin-top:30px;
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
		<hr>
		<form action="/wechat/chongzhijk" method="post">
		@csrf
		<div class="stration-mode">

			<label class="stration-title">微信加款</label>
			<div class="stration-pay">
				<a href="javascript:;">10</a>
				<a href="javascript:;">20</a>
				<a href="javascript:;">50</a>
				<a href="javascript:;">100</a>
				<a href="javascript:;">200</a>
				<a href="javascript:;">500</a>
				<a href="javascript:;">1000</a>
			</div>
			<!-- <input type="text" class="jine" name="jine" style="display:none"> -->
			<input type="text" name="jiakuanjine" id="jiakuanjine" value="10" style="display:none">
			<!-- <img class="jkje" src="/static/images/10.png" alt=""> -->
		</div>
		<label class="tsyu" for="">支付完成先提交, 后联系13393051081(微信同号)。</label>
		<br>
		<button>提交</button>
		</form>
	</div>

	<script type="text/javascript">
		$('.stration-pay').children().click(function(){
			$('.stration-pay').children().css('background','white')
			var jkje = $(this).html();
			$(".jine").val(jkje);
			$("#jiakuanjine").val(jkje);
			$(this).css('background','orange');
			// alert($(this).html());
		});
	</script>
@endsection
@section('title','微信加款')