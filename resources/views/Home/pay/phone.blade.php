@extends('Home.common.index')
@section('common')
<link rel="stylesheet" href="/Static/Home/Index/phone.css">
<style type="text/css">
	.phoneorder{
		padding:0 20px 10px 20px;
	}
</style>
	<div>
		<div class="tou-anniu">
			<a href="/phone/pay">手机充值</a>
			<a href="/phone/batch">批量充值</a>
			<a href="/phone/order">订单查询</a>
		</div>
		<br>
		<div class="pay-form">
			<form action="/phone/paypass" method="get">
			<!-- @csrf -->
                <div class="control-group">
                  	<label class="control-label" maxlength="11" for="focusedInput">充值号码：</label>
                  	<div class="controls">
                    	<input type="text" name="phone" autocomplete="off"  class="phone" placeholder="充值号码"> <a href=""><button>查询余额</button></a><a class="ownership" style="color:red"></a>
                  	</div>
                  	 
                </div>

				<div class="control-group">
                  	<label class="control-label" for="focusedInput">充值金额：</label>
                  	<div class="chong-jine">
                    	<a href="javascript:;">10</a>
						<a href="javascript:;">20</a>
						<a href="javascript:;">30</a>
						<a href="javascript:;">50</a>
						<a href="javascript:;">100</a>
						<a href="javascript:;">200</a><br>
                  	</div>
                </div>
				<div class="control-group">
                  	<label class="control-label" for="focusedInput">其他金额：</label>
                  	<div class="qita-jine">
                    	<input type="text"  maxlength='3' class="jine" placeholder="其他金额" name="jine">元<br>
                  	</div>
                </div>
					
				<div class="tijao">
					<button>提交充值</button> <!-- <a href="" style="color:red">重新输入</a><br> -->
				</div>
				<div class="wenxin">
					温馨提示：请仔细核对信息，订单充值后无法退款。
					
				</div>
			</form>
		</div>
		<!-- 最近订单查询 -->
		
	</div>
	<br><hr><br>
	<div class="phoneorder">
		<div>最近充值记录：</div>
		<table width="100%" border="1px solid black"  bgcolor="#ccc" class="table" cellspacing="0">
			<tr>
				<th>手机号</th>
				<th>时间</th>
				<th>状态</th>
				<th>运营商</th>
				<th>充值金额</th>
			</tr>
			@if($order != '')
			@foreach($order as $k => $v)
			<tr>
				<td>{{$v['phone']}}</td>
				<td>{{$v['created_at']}}</td>
				<td>@if($v['state'] == 1)
				充值成功
				@elseif($v['state'] == 3)
				正在充值 
				@else
				充值失败
				@endif</td>
				<td>{{ownership($v['phone'])}}</td>
				<td>{{$v['face']}}</td>
			</tr>
			@endforeach
			@endif
		</table>
	</div>
	<script type="text/javascript">
		Phone = false;Jine = false;
		// 验证手机号
		function isPhoneNo(phone) { 
		 	var pattern = /^1[34578]\d{9}$/; 
		 	return pattern.test(phone); 
		}
		$('.phone').keyup(function(){

			if($(this).val().length==11){
				
				var phone1 = $(this).val();
				if(isPhoneNo(phone1) == false){
					$(this).blur();
					$('.ownership').html('手机号不正确');
				}else{
					Phone = true;
					$(".jine").focus();
					// 手机归属地API接口
					$.ajax({
					    url: "/ownership",
					    data: {phone: phone1},
					    type: "get",
					    dataType: "json",
					    success: function(data) {
					    	var ownership = data['result']['province']+data['result']['company'];
					        $('.ownership').html(ownership);
					    }
					})
					// $('.ownership').html('河北联通');
				}
						
			}
		})

		$('.chong-jine a').each(function(){
			$(this).click(function(){
				
				var ownership = $('.ownership').html();
				if(ownership == "" || ownership == '手机号不正确' || ownership == '请输入手机号'){
					$('.phone').focus();
					$('.ownership').html('请输入手机号');
				}else{
					$('.chong-jine a').css("background",'white');
					var anniu = $(this);
					var a = anniu.html();
					$(".jine").val(a);	
					anniu.css("background","#6495ED");
				}
			});
		});
		$(".jine").focus(function(){
			var ownership = $('.ownership').html();
			if(ownership == "" || ownership == '手机号不正确' || ownership == '请输入手机号'){
				$('.phone').focus();
				$('.ownership').html('请输入手机号');
			}else{
				jine = $('.jine').val()
			}
			
		});
		
		$('.jine').blur(function(){
			var qjine = $('.jine').val();
			if(typeof(jine)==="undefined"){

			}else if(qjine != ''){
				Jine = true;
				// alert(qjine);
				if(qjine != jine){
					$('.chong-jine a').css("background",'white');
				}
				
			}
			
		})
		$('.tijao').click(function(){
			if(!Phone && !Jine){
				return false;
			}
		})
	</script>



@endsection
@section('title','手机充值')