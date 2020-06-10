<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	　<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<style type="text/css">
		body{
			padding:0px;
			margin:0px;
		}
		ul,li{ padding:0;margin:0;list-style:none}
		.header{
			width:100%;
			height:40px;
			background:red;
			color:white;
			line-height:40px;
		}
		.nicheng{
			float:right;
		}
		.nicheng div{
			text-align:center;
			width:80px;
			float:left;
			margin-right:20px;
		}
		.nicheng a{
			/*display:block;*/
			width:50px;
			height:40px;
			color:white;
			text-decoration:none
		}
		.nicheng div:hover{
			background:black;
		}
		.body-left{
			width:10%;
			float:left;
			margin-right:20px;
		}
		.body-left a{
			text-decoration:none;	
			color:black;
		}
		.title{
			width:100%;
			line-height:40px;
			/*padding-left:15px;	*/
			background:-webkit-gradient(linear, left bottom, left top, color-stop(0, #efeff0), color-stop(1, #ffffff));	

		}
		.title .title-biaoti{
			padding-left:15px;
			height:40px;
			border:1px solid black;
		}
		.title .title-select ul li{
			padding-left:15px;
		}
		.body{
			width:88%;
			float:right;
			margin-top:20px;
			background:-webkit-gradient(linear, left bottom, left top, color-stop(0, #efeff0), color-stop(1, #ffffff));
			border:1px solid #ccc;
			
		}
	</style>
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
</head>
<body>
	<div>
		<div class="header">
			<div class="nicheng">
				<div>51冲冲</div>
				<div>
					
					<a href="/admin/outlogin">安全退出</a>
				</div>
			</div>
		</div>
		<div class="body-left">
			<div class="title">
				<div class="title-biaoti">
					<a href="/admin">首页</a>
				</div>
			</div>
			<div class="title">
				<div class="title-biaoti">
					<a href="javascript:;">订单查询</a>
				</div>
				<div class="title-select" style="display:none;">
					<ul>
						<li><a href="/admin/order/index">话费订单</a></li>
						<li><a href="/admin/video/order/index">视频订单</a></li>
						<!-- <li><a href="/admin/merchant/group">商户组别</a></li> -->
					</ul>
				</div>
			</div>
			<div class="title">
				<div class="title-biaoti">
					<a href="javascript:;">商户管理</a>
				</div>
				<div class="title-select" style="display:none;">
					<ul>
						<li><a href="/admin/merchant">商户列表</a></li>
						<li><a href="/admin/merchant/create">新增</a></li>
						<li><a href="/admin/merchant/group">商户组别</a></li>
					</ul>
				</div>
			</div>
			<div class="title">
				<div class="title-biaoti">
					<a href="javascript:;">商品管理</a>
				</div>
				<div class="title-select" style="display:none;">
					<ul>
						<li><a href="/admin/commodity/index">商品列表</a></li>
						<li><a href="/admin/commodity/create">新增视频商品</a></li>
						<li><a href="/admin/commodity/phone/create">新增话费商品</a></li>

						<!-- <li><a href="/admin/merchant/group">商户组别</a></li> -->
					</ul>
				</div>
			</div>
		<!-- 	<div class="title">
				<div class="title-biaoti">
					<a href="javascript:;">话费商品管理</a>
				</div>
				<div class="title-select" style="display:none;">
					<ul>
						<li><a href="/admin/commodity/phone/index">话费列表</a></li>
						<li><a href="/admin/merchant/group">商户组别</a></li> 
					</ul>
				</div> 
			</div>--> 			
			<div class="title">
				<div class="title-biaoti">
					<a href="javascript:;">财务管理</a>
				</div>
				<div class="title-select" style="display:none;">
					<ul>
						<li><a href="/admin/finance">加款列表</a></li>
						<li><a href="/admin/finance/artificial">人工加款</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="body">
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
</body>
<script type="text/javascript">
	$('.message-box-wrapper').click(function(){
		$(this).css('display','none');
	})
	
</script>

<script type="text/javascript">

	$('.title-biaoti').each(function(){
		$(this).click(function(){
			var ziji = $(this).next().css('display');
			$('.title-select').css('display','none');
			ziji == 'none' ? $(this).next().css('display','block') : $(this).next().css('display','none');

			// console.log($(this).next().css('display');
			// if($(this).next().css('display') ==  'none'){
			// 	$('.title-select').css('display','none');
			// 	$(this).next().css('display','block');
			// }else{
			// 	// $('.title-select').css('display','none');
			// 	$(this).next().css('display','none');
			// }
		})
	})
	
</script>
</html>