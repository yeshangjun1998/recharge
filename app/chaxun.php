<?php 

function chaxun($data)
{

    $apiurl = 'http://api.ejiaofei.net:11140/query_jkorders.do';
    // 充值接口
    $params = array(
        'userid' => '18333874033',
        'pwd' => '93071AC0F2FDC08703A2F9125DEA23F9',
        'orderid' => $data,
    
        // 'userkey' => "(useridxxxpwdxxxorderidxxxfacexxxaccountxxxamount1key)MD5"
    );

    $params['userkey'] = md5("userid".$params['userid']."pwd".$params['pwd']."orderid".$params['orderid']."C7AC770469EA75DB38A591103A7045CB");

    
    $params['userkey'] = strtoupper($params['userkey']);
    // $params['userkey'] = md5($params['userkey']);
    // 整理参数
    $paramsString = http_build_query($params);
    // var_dump($apiurl.'/chongzhi_jkorders.do?'.$paramsString);
    // var_dump($paramsString);
    // 使用充值接口
    $content = @file_get_contents($apiurl.'?'.$paramsString);
    $array = (array)(simplexml_load_string($content));

    return $array;
}

