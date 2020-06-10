<?php 

	function daichong($spid,$num,$money,$account,$pass){
		// 代充
		$beizhu[0]=$account;//QQ账号 
		$beizhu[1]=$pass;//QQ密码
		$beizhu = base64_encode(json_encode($beizhu));
		$urlapi = 'http://6666vip.waa.cn/home/api/';

		$postdata = array(
			'code' => '102',
			'user' => '13393051081',
			'pass' => md5('qa123456'),
			'spid' => $spid,
			'money' => $money,
			'mun' => $num,
			'beizhu' => $beizhu,
			'yibu' => '1',
			'order' => time().mt_rand(1111,9999),
		);
		$postdata['token'] = md5('user='.$postdata['user'].'&&pass='.$postdata['pass'].'');
		

		$fdata = curl_post_https($urlapi,$postdata);
		
		return $fdata;
	}
?>

