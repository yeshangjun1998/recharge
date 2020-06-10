@extends('Admin.common.index')
@section('common')
	<style type="text/css">
		a,a:link,a:visited,a:hover,a:active{
			text-decoration:none
		}
		.search{
			height:80px;
		}
		.neirong{
			padding:5px 0 0 5px;
		}
		.search-body input{
			height:30px;
		}
		.anniu a{
			margin-top:10px;
			float:left;
			display:black;
			margin-left:10px;
			width:60px;
			height:40px;
			text-align:center;
			line-height:40px;
			border:1px solid #d9534f;
			border-radius:4px;
			background:#d43f3a;
			color:#fff;
		}
		.anniu .frozen{
			background:#5bc0de;
			border-color:#46b8da;
		}
		.anniu .transfer{
			width:130px;
			background-color: #f0ad4e;
    		border-color: #eea236;
		}		
		.merchant-table table{
			width:100%;
			border-collapse: collapse;
		}
		.merchant-details{
			float:left;
			display:block;
			width:50px;
			height:30px;
			text-align:center;
			line-height:30px;
			background:#5bc0de;
			border-radius:3px;
			border-color: #46b8da;
		}
	</style>
	<div class="neirong">
		<div class="search">
			<div class="search-body">
				商户名称：<input type="text" name="nickname" placeholder="商户名称">
				商户状态：<select name="static" id="static">
								<option value="0">全部</option>
								<option value="1">正常</option>
								<option value="2">冻结</option>
							</select>
				商户组别：<select name="static" id="static">
								<option value="0">全部</option>
								<option value="1">99折</option>
								<option value="2">98折</option>
							</select>
			</div>
			<div class="anniu">
				<a href="javascript:;" class="frozen">冻结</a>
				<a href="javascript:;" class="thaw">解冻</a>
				<a href="javascript:;" class="transfer">批量转移用户</a>
				<a href="javascript:;" class="account">销户</a>
			</div>
			<br>
		</div>
		<br>
		<div class="merchant-table">
			<table border="1" >
				<tr>
					<td><input type="checkbox" class="0"></td>
					<td>商户编号</td>
					<td>商户账号</td>
					<td>商户名称</td>
					<td>商户余额</td>
					<td>商户状态</td>
					<td>商户组别</td>
					<!-- <td>开户时间</td> -->
					<td>操作</td>
				</tr>
				@foreach($merchant as $k=>$v)
				<tr>
					<td><input type="checkbox" class={{$v['id']}}></td>
					<td>M{{$v['id']}}</td>
					<td>{{$v['phone']}}</td>
					<td>{{$v['nickname']}}</td>
					<td>{{$v['balance']}}</td>
					<td>
						@if($v['static'] == 1)
						正常
						@else
						冻结
						@endif
					</td>
					<td>{{$v['group_id']}}</td>
					<!-- <td>{{$v['created_at']}}</td> -->
					<td><a href="" class="merchant-details">详情</a></td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	<script type="text/javascript">
		$("input[type='checkbox']").eq(0).click(function(){
			var check = $(this).is(':checked');
			if(check){
				$("input[type='checkbox']").prop('checked',true);
			}else{
				$("input[type='checkbox']").prop('checked',false);
			}
			
		})
		$('.frozen').click(function(){
			var arr=[];
			$("input[type='checkbox']").each(function(){
				var check = $(this).is(':checked');
				if(check){
					if($(this).attr('class') != 0){
						arr.push($(this).attr('class'));
					}
				}
			})
			// arr.shift();
			console.log(arr);
			if(arr.length != '0'){
				$.ajax({
             	type: "GET",
             	url: "/admin/merchant/frozen",
             	data: 
             	{'checks':arr},
             	traditional: true,
             	// dataType: "json",
             	success: function(data){
                        console.log(data);
                    }
         		});
			}
		})
		// $("input[type='checkbox']").eq(1).attr('checked',true);
	</script>
	<script type="text/javascript">
		$('.title-biaoti:eq(2)').next().css('display','block');
		$('.title-biaoti:eq(2)').next().children().children().eq(0).css('background','#CCC');
	</script>
@endsection
@section('title','商户列表');