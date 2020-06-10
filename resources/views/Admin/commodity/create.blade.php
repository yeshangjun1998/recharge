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
	.merchant-create .static{
		width:15px;
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
		<h4>添加商品</h4>
		<form action="/admin/commodity/story" method="post">
		@csrf
			<table>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">
								商品名称：
							</label>
							<input type="text" name="title" class="title" placeholder="商品名称">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">
								商品编号：
							</label>
							<input type="text" name="spid" class="title" placeholder="商品编号">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">
								金额：
							</label>
							<input type="text" name="price" class="price" placeholder="商品金额"><br>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">
								状态：
							</label>
							<input type="radio" name="static" value="1" style="height:15px;" checked class="static" placeholder="商户名称">上架
							<input type="radio" name="static" value="2" style="height:15px;" class="static" placeholder="商户名称">下架
							<br>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">
								状态：
							</label>
							<input type="radio" name="type" value="1" style="height:15px;" checked class="static" placeholder="商户名称">卡密
							<input type="radio" name="type" value="2" style="height:15px;" class="static" placeholder="商户名称"> 代充
							<br>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="creates">
							<label class="create-tishi">            
								商品详情：
							</label>
							<input type="text" name="detail" class="detail" placeholder="商品详情">
						</div>						
					</td>
				</tr>
			</table>
			<button class="merchant-button">增加商品</button>
		</form>
	</div>

<script type="text/javascript">
	$('.title-biaoti:eq(3)').next().css('display','block');
	$('.title-biaoti:eq(3)').next().children().children().eq(1).css('background','#CCC');

</script>
@endsection
@section('title','添加商户');