<?php 
	
	function tongyidingdan($jiakuan)
	{
      $params = array(
        'appid' => getenv('APPID'),     // 公众号id
        'body' => "商户加款",     // 商品描述 自己的商品
        'mch_id' => getenv('MCH_ID'),     //商户号
        'nonce_str' => rand(111111, 999999),  //随机字符串
        'notify_url' => "www.yesj.vip.ngrok2.xiaomiqiu.cn",  // 外网地址
        'out_trade_no' => time().rand(111, 999), // 商户id
        'spbill_create_ip' => '192.168.0.109', //终端ip
        'total_fee' => $jiakuan['jiakuanjine'] * 100 ,  //金额
        // 'total_fee' => '1',  //金额
        'trade_type' => 'NATIVE'   //交易类型
      );

      $stringA = http_build_query($params);
      $stringA = urldecode( $stringA);
      $stringSignTemp = $stringA."&key=".getenv('API_KEY'); //注：key为商户平台设置的密钥key
      $sign=MD5($stringSignTemp);
      $params['sign'] = strtoupper($sign);
      return $params;


     
	}


 ?>