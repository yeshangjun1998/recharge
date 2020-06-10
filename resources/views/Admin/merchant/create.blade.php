@extends('Admin.common.index')
@section('common')
<style type="text/css">
	label{
		display:inline-block;
		width:80px;
		height:30px;
		font-weight: 600;
	}
	.merchant-create input{
		width:200px;
	    height: 34px;
	    padding: 6px 12px;
	    font-size: 14px;
	    line-height: 1.42857143;
	    color: #555;
	    background-color: #fff;
	    background-image: none;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	}
	.merchant-create table tr td{
		padding:10px;
	}
	.merchant-button{
		margin-left: 80px;
		color: #fff;
	    background-color: #47a447;
	    border-color: #398439;
	    display: inline-block;
	    padding: 6px 12px;
	    margin-bottom: 0;
	    font-size: 14px;
	    font-weight: normal;
	    line-height: 1.42857143;
	    text-align: center;
	    white-space: nowrap;
	    vertical-align: middle;
	    cursor: pointer;
	    border: 1px solid transparent;
    	border-radius: 4px;
	}
</style>

	<div class="merchant-create">
		<h4>新增用户</h4>
		<form action="/admin/merchant/story" method="post">
		@csrf
			<table>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">
								登录账号：
							</label>
							<input type="text" name="phone" maxlength="11" class="phone" placeholder="手机号码">
						</div>
					</td>
					<td>
						<div class="creates">
							<label class="create-tishi">
								商户姓名：
							</label>
							<input type="text" name="name" maxlength="6" class="name" placeholder="商户姓名"><br>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">
								商户名称：
							</label>
							<input type="text" name="nickname" maxlength="6" class="nickname" placeholder="商户名称"><br>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">            
								登录密码：
							</label>
							<input type="password" name="password" maxlength="8" class="password" placeholder="登录密码">
						</div>					
					</td>
					<td>
						<div class="creates">
							<label class="create-tishi">            
								确认密码：
							</label>
							<input type="password" name="repassword" maxlength="8" class="repassword" placeholder="确认密码">
						</div>						
					</td>
				</tr>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">
								QQ号码：
							</label>
							<input type="text" name="QQ" class="qq" placeholder="QQ号码">
						</div>
					</td>
					<td>
						<div class="creates">
							<label class="create-tishi">
								微信号码：
							</label>
							<input type="text" name="wechat" class="wechat" placeholder="微信号码"><br>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">
								电子邮箱：
							</label>
							<input type="text" name="email" class="email" placeholder="电子邮箱"><br>
						</div>
					</td>
					<td>
						<div class="creates">
							<label class="create-tishi">
								详细地址：
							</label>
							<input type="text" name="address" class="address" placeholder="详细地址"><br>
						</div>					
					</td>
				</tr>
			</table>
			<button class="merchant-button">增加用户</button>
		</form>
	</div>
	<script type="text/javascript">
		Phone = false;Name = false;NickName = false;PassWord = false; RePassWord = false;
		$('.phone').change(function(){
			var phone = $(this).val();
			var pattern = /^1[34578]\d{9}$/; 
			if(!pattern.test(phone)){
				alert('请输入手机号码');
			}else{
				Phone = true;
			}
		})
		$('.name').blur(function(){
			var name = $(this).val();
			if(name == '商户姓名不能为空'){
				alert(1);
			}else{
				Name = true;
			}
		})
		$('.nickname').blur(function(){
			var nickname = $(this).val();
			if(nickname == ''){
				alert('商户名称不能为空');
			}else{
				NickName = true;
			}
		})
		$('.password').blur(function(){
			var password = $(this).val();
			var pattern = /^[a-zA-Z]{1}\w{7}$/; 
			if(password == ''){
				alert('密码不能为空');
			}else if(pattern.test(password)){
				PassWord = true;
			}else{
				alert('第一位必须是字母的8位');
			}
		})
		$('.repassword').blur(function(){
			var repassword = $(this).val();
			var password = $('.password').val();
			if(repassword == ''){
				alert('密码不能为空');
			}else if(repassword == repassword){
				RePassWord = true;
			}else{
				alert('密码不一致');
			}
		})
		$('.merchant-button').click(function(){
			if(Phone == false && Name == false && NickName == false && PassWord == false && RePassWord == false){
				event.preventDefault();
			}
		})
		
	</script>
<script type="text/javascript">
	$('.title-biaoti:eq(2)').next().css('display','block');
	$('.title-biaoti:eq(2)').next().children().children().eq(1).css('background','#CCC');

</script>
@endsection
@section('title','添加商户');