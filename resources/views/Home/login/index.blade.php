<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户登录</title>
	<script src="https://cdn.bootcss.com/jquery/3.5.0/jquery.js"></script>
	<style type="text/css">
		  .message-box-wrapper {
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            text-align: center;
            background-color: rgba(0, 0, 0, .3)
        }
        
        .message-box-wrapper::after {
            content: "";
            display: inline-block;
            height: 100%;
            width: 0;
            vertical-align: middle;
        }
        
        .message-box {
            display: inline-block;
            vertical-align: middle;
            position: relative;
            /*width: 150px;*/
            height: 60px;
            background: #ffffff;
            border-radius:2px;
            line-height:60px;
        }
        
        .message-box-content {
            padding:0 20px ;
        }
		html{
			height:100%;
			background:#f7f9fb;
		}
		body{
			height:80%;
			padding:0px;
			margin:0px;
			position:relative;
		}
		.logo{
			position:absolute;
			left:35%;
			top:-40%;
			width:90px;
			height:90px;
			/*background:#ccc;*/
		}
		.logo img{
			width:100%;
			height:100%;
		}
		.login{
			height:350px;
			width:330px;
			position:absolute;
			left:38%;
			top:30%;
			background:#fff;
			padding:10px 25px;
		}
		.login-input{
			margin:20px 0 ;
		}
		.login-input label{
			display: block;
			padding-bottom:6px;
		}
		.login-input input{
			width:300px;
			height:40px;
			border:1px solid #ccc;
			padding-left:10px;
		}

		.login-body button{
			margin: 0;
			padding: 0;
			border: 1px solid transparent;
			border-radius:3px;
			outline: none;    
			width:300px;
			height:40px;

			background-color: #007bff;
    		border-color: #007bff;
		}

	</style>
</head>
<body>
<!-- 整个页面 -->
	<div class="login">
		<!-- logo -->
		<div class="logo"><img src="/Static/images/2.png" alt=""></div>
		<div class="login-body">
			<form action="/login/store" method="post">
			@csrf
				<h2>登录</h2>
				<div class="login-input">
					<label for="">手机号：</label>
					<input type="text" maxlength="11" name="phone">
				</div>
				<div class="login-input">
					<label for="">密码：</label>
					<input type="password" maxlength="8" name="password">
				</div>
				<button>登录</button>
			</form>
		</div>
	</div>
	@if(!empty(session('success')))
      	<div class="message-box-wrapper">
	        <div class="message-box">
	            <div class="message-box-header"></div>
	            <div class="message-box-content">{{session('success')}}</div>
	        </div>
	    </div> 
      
    @endif
    @if(!empty(session('error')))
      	<div class="message-box-wrapper">
	        <div class="message-box">
	            <div class="message-box-header"></div>
	            <div class="message-box-content">{{session('error')}}</div>
	        </div>
	    </div> 
      
    @endif
    <script type="text/javascript">
		$('.message-box-wrapper').click(function(){
			$(this).css('display','none');
		})
	</script>
</body>
</html>