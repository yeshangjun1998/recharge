<?php 
	
	function store($spid,$num,$money)
	{
		$api = 'http://6666vip.waa.cn/home/api/';
		$postdata = array(
			'user' => '13393051081',
			'pass' => md5('qa123456'),
			'spid' => $spid, // 商品id
			'mun' => $num,
			'money' => $money,  //商品价格
			'code' => '101',
			'order' => time().mt_rand(1111,9999),
		);
		$postdata['token'] = md5('user='.$postdata['user'].'&&pass='.$postdata['pass'].'');


		$fdata = curl_post_https($api,$postdata);
		return $fdata;
	}


?>