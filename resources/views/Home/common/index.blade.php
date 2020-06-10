<!doctype html>
<html lang="en">
  	<head>
    <!-- Required meta tags -->
   		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="/Static/Home/Index/common.css">
		<script src="https://cdn.bootcss.com/jquery/3.5.0/jquery.js"></script>
    <!-- Bootstrap CSS -->
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
        
/*        .message-box-btns {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50px;
        }*/
        

    	</style>
    	<title>@yield('title')</title>
  	</head>
  	<body>
	  	<div class="container">
			<div class="row"  >
				<div class="logo"><img src="" alt=""></div>
			  	<div>
				  	<div class="nav-header" >
				 		<a href="#">用户名：{{merchant(Cookie::get('merchant'))['nickname']}}　</a>
				 		<a href="#">余额：{{merchant(Cookie::get('merchant'))['balance']}}　</a>
				 		<a href=""><button>刷新余额</button></a>
				 		<a href=""><button>账户充值</button></a>
				 		<a href="/logout"><button>安全退出</button></a>
		 			</div>
		 		</div>
			</div>
		 	<div class="nav-body">
		 		<div class="dropdown">
		 			<a href="/">系统首页</a>
		 			<a href="/phone/pay">缴费中心</a>
		 			<a href="/phone/order">订单中心</a>
		 			<a href="/video/index">视频会员</a>
		 			<a href="/video/order">视频订单</a>
		 			<a href="/payment/stration">加款管理</a>
		 			<a href="/security">安全中心</a>
		 		</div>
		 	</div>
		 	<div class="content">
		 		<!-- <div class="content-left">
		 			<a href="/phone/pay">手机充值</a>
			 		<a href="#">固话充值</a>
			 		<a href="#">流量充值</a>
			 		<a href="#">腾讯充值</a>
			 		<a href="#">生活缴费</a>
			 		<a href="#">游戏充值</a>
		 		</div> -->
		 		<div class="content-right">
					<!-- 公告 -->
					<div class="notice">
						<a href="#">查看详情</a>
						<a href="#">12.22河北移动省内全国流量维护公告</a>
						<a href="#" class="time">2017/10/23 9:13:25</a>
					</div>
					<div class="neirong">
			 		@section('common')
			 		@show
			 		
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
			 		</div>
			 	</div>
		 	</div>
		</div>
		<script type="text/javascript">
			$('.message-box-wrapper').click(function(){
				$(this).css('display','none');
			})
		</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  	</body>
</html>

