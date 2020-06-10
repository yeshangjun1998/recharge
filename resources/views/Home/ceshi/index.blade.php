<html>
<head>
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<button type="button" id="order" class="btn btn-secondary btn-block">
    扫码支付
</button>

<!-- 二维码, 随便放在当前页面的那里都可以,我这里用jquery从后台请求过来的-->
<div class="modal fade" id="qrcode" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bg-transparent" style="border:none">
            <div class="modal-body align-items-center text-center">
                <p class="modal-title" id="exampleModalLabel" style="color:white">微信扫码支付</p>
                <br>
                {{--生成的二维码会放在这里--}}
                <div id="qrcode2"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#order').click(function () {
        $.get('/ceshi',function (data) {
            if (data['code'] == 200)
            {
               // alert(12);
                $(#qrcode2).html(data['html'])
            }
                })
    })
</script>
</html>