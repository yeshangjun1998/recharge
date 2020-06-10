@extends('Admin.common.index')
@section('common')
<style type="text/css">
	.finance-artificial{
		margin:20px;
	}
	.finance-artificial .creates{
		margin:20px 0;
	}
	label{
		display:inline-block;
		width:80px;
		height:30px;
		font-weight: 600;
		text-align:right;
	}
	.finance-artificial input{
		width:200px;
	    height: 34px;
	    padding: 6px 12px;
	    font-size: 14px;
	    line-height: 1.42857143;
	    color: #555;
	    background-color: #eee;
	    background-image: none;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    cursor: no-drop;
	}

	.artificial-button{
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
	.creates select{
		width:200px;
		height:34px;
	    font-size: 14px;
	}
	.creates select option{
		height:34px;
	}
</style>

	<div class="finance-artificial">
		<!-- <h4>新增用户</h4> -->
		<form action="/admin/finance/examine" method="post">
		@csrf
			<input type="text" name="id" value="{{$balance['id']}}" style="display:none">
			<div class="creates">
				<label class="create-jiakan">
					会员账户：
				</label><br>
				<input type="text" readonly value="{{$balance['merchant_id']}}" name="phone"  >
			</div>
			<div class="creates">
				<label class="create-jiakan">
					充值金额：
				</label><br>
				<input type="text" readonly value="{{$balance['jine']}}" name="jine"  >
			</div>
			<div class="creates">
				<label class="create-jiakan">
					申请时间：
				</label><br>
				<input type="text" readonly value="{{$balance['created_at']}}" name="created_at"  >
			</div>
			<div class="creates">
				<label class="create-jiakan">
					转账方式：
				</label><br>
				<input type="text" readonly value="@if($balance['type'] == 1)后台申请@elseif($balance['type'] == 2) 支付宝 @else 微信 @endif">
			</div>
			@if($balance['static'] == 2)
			<div class="creates">
				<label class="create-jiakan">
					审核状态：
				</label><br>
				<select name="chengorbai" id="static">
					<option value="0">审核通过</option>
					<option value="1">审核失败</option>
				</select>
			</div>
			<button class="artificial-button">通过</button>
			@else
			<div class="creates">
				<label class="create-jiakan">
					审核状态：
				</label><br>
				<input type="text" readonly value="@if($balance['static'] == 1)审核成功@elseif($balance['static'] == 3)审核失败 @endif">
			</div>
			@endif
		</form>
	</div>
<script type="text/javascript">
	$('.title-biaoti:eq(4)').next().css('display','block');
	// $('.title-biaoti:eq(3)').next().children().children().eq(1).css('background','#CCC');

</script>
@endsection
@section('title','添加商户');