<?php 

function chongzhiphone($data1)
    {
        $data = date('YmdHis');  
            for($i = 1;$i< 32-strlen($data);$i++){
                // echo mt_rand(1,9);
                $data = "$data".mt_rand(1,9);
            }

            // // var_dump($data);      
            // header('Content-type:text/html;charset=utf-8');
            $apiurl = 'http://api.ejiaofei.net:11140';
            // 充值接口
            $params = array(
                'userid' => '18333874033',
                'pwd' => '93071AC0F2FDC08703A2F9125DEA23F9',
                'orderid' => $data,
                'account' => $data1['phone'],
                'face' => $data1['jine'],
                'amount' => '1',
                // 'operator' => 
                // 'userkey' => "(useridxxxpwdxxxorderidxxxfacexxxaccountxxxamount1key)MD5"
            );

            $params['userkey'] = md5("userid".$params['userid']."pwd".$params['pwd']."orderid".$params['orderid']."face".$params['face']."account".$params['account']."amount1C7AC770469EA75DB38A591103A7045CB");
            
            // 查询
            // $params = array(
            //  'userid'=> '18333874033',
            //  'pwd' => '93071AC0F2FDC08703A2F9125DEA23F9',
            //  'userkey' => md5("userid18333874033pwd93071AC0F2FDC08703A2F9125DEA23F9C7AC770469EA75DB38A591103A7045CB"),
            // );

            $params['userkey'] = strtoupper($params['userkey']);
            // $params['userkey'] = md5($params['userkey']);
            // 整理参数
            $paramsString = http_build_query($params);
            // var_dump($apiurl.'/chongzhi_jkorders.do?'.$paramsString);
            // var_dump($paramsString);
            // 使用充值接口
            $content = @file_get_contents($apiurl.'/chongzhi_jkorders.do?'.$paramsString);
            $array = (array)(simplexml_load_string($content));
            // $time = date('Y-m-d H:i:s');
            // $array = array( 
            //     'userid' =>  '18333874033' ,
            //     'Porderid' =>  '3343466464' ,
            //     'orderid' =>  '20200429011326965325438',
            //     'account' =>  '13393051081',
            //     'face' =>  $data1['jine'],
            //     'amount' =>  '1' ,
            //     'starttime' =>  $time,
            //     'state' =>  '8' ,
            //     'endtime' =>  '2020-05-02 09:13:28',
            //     'error' =>  '0' ,
            // );
            return $array;
    }
