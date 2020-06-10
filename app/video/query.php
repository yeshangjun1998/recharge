<?php 

	function query($order)
	{
		$api = 'http://6666vip.waa.cn/home/api/';
		$postdata = array(
			'user' => '13393051081',
			'pass' => md5('qa123456'),
			'order' => $order,
			'code' => '1010',
		);
		$postdata['token'] = md5('user='.$postdata['user'].'&&pass='.$postdata['pass'].'');

		$fdata = curl_post_https($api,$postdata);
		return $fdata;

	}

?>