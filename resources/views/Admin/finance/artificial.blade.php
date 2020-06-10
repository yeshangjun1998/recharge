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
	    background-color: #fff;
	    background-image: none;
	    border: 1px solid #ccc;
	    border-radius: 4px;
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
	.zhuanzhang{
			cursor:no-drop;
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
		<form action="/admin/artificial/story" method="post">
		@csrf
			<div class="creates">
				<label class="create-jiakan">
					商户：
				</label>
				<select name="merchant_id" id="">
					@foreach($merchant as $k=>$v)
					<option value="{{$v['phone']}}">M{{$v['id']}}  {{$v['nickname']}}  {{$v['phone']}}</option>
					@endforeach
				</select>
			</div>
			<div class="creates">
				<label class="create-jiakan">
					充值金额：
				</label>
				<input type="text" name="jine"  >
			</div>
			<div class="creates">
				<label class="create-jiakan">
					转账方式
				</label>
				<input type="text" class="zhuanzhang" readonly value="后台申请">
			</div>
			<button class="artificial-button">提交</button>
		</form>
	</div>
<script type="text/javascript">
	$('.title-biaoti:eq(4)').next().css('display','block');
	$('.title-biaoti:eq(4)').next().children().children().eq(1).css('background','#CCC');

</script>
@endsection
@section('title','添加商户');