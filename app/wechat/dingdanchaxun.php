<?php 

	function dingdanchaxun($data)
	{

        $params = array(
          'appid' => getenv('APPID'),     // 公众号id
          'mch_id' => getenv('MCH_ID'),     //商户号
          'nonce_str' => rand(111111, 999999),  //随机字符串
          'out_trade_no' => $data['out_trade_no'], // 商户id
          // 'out_trade_no' => '603523', // 商户id
        );
         $stringA = http_build_query($params);
        $stringA = urldecode( $stringA);
        $stringSignTemp = $stringA."&key=".getenv('API_KEY'); //注：key为商户平台设置的密钥key
        $sign=MD5($stringSignTemp);
        $params['sign'] = strtoupper($sign);
        return $params;

        // var_dump($xmlData);
       
	}

?>