<?php 
	// $id  为加款的商户id
	function erweima($id)
	{
		$apiurl = 'weixin://wxpay/bizpayurl';   

        $params = array(
            'appid' => getenv('APPID'),
            'mch_id' => getenv('MCH_ID'),
            'nonce_str' =>  rand(111111, 999999),
            'product_id' => $id,
            'time_stamp' => time(),
        );

        
       //  var_dump($params);

        $stringA = http_build_query($params);
        $stringSignTemp = $stringA."&key=".getenv('API_KEY'); //注：key为商户平台设置的密钥key
        $sign=MD5($stringSignTemp);
        $sign = strtoupper($sign);
       //  var_dump($sign);
        $params['sign'] = $sign;
 
        $paramsString = http_build_query($params);
        $url = $apiurl.'?'.$paramsString;
        return $url;
	}

