<?php 

	function ownership($phone)
	{
		    // header('Content-type:text/html;charset=utf-8');
        $apiurl = 'http://apis.juhe.cn/mobile/get';
        $params = array(
          'key' => '7040e2e70d1c9309f70d5052b1b79d1a', //您申请的手机号码归属地查询接口的appkey
          'phone' => $phone //要查询的手机号码
        );
         
        
        $paramsString = http_build_query($params);
         
        $content = @file_get_contents($apiurl.'?'.$paramsString);
        // return $content->result->company;
        $content = json_decode($content,true);
        return $content['result']['province'].$content['result']['company'];
	}
