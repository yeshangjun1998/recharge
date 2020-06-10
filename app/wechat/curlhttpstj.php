<?php   

        function curlhttpstj($apiurl,$xmlData)
        {
                $ch = curl_init();
                //设置超时
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch,CURLOPT_URL, $apiurl);
                curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
                curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
                //设置header
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                //要求结果为字符串且输出到屏幕上
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                //post提交方式
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
                //运行curl
                $data = curl_exec($ch);
                // var_dump($data);
                //返回结果
                return $data;

                // 统一订单
                 // $ch = curl_init();
                 //      //设置超时
                 //      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                 //      curl_setopt($ch,CURLOPT_URL, $apiurl);
                 //      curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
                 //      curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
                 //      //设置header
                 //      curl_setopt($ch, CURLOPT_HEADER, FALSE);
                 //      //要求结果为字符串且输出到屏幕上
                 //      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                 //      // if($useCert == true){
                 //      //     //设置证书
                 //      //     //使用证书：cert 与 key 分别属于两个.pem文件
                 //      //     curl_setopt($ch,CURLOPT_SSLCERTTYPE,app_path().'apiclient_cert.pem');
                 //      //     //curl_setopt($ch,CURLOPT_SSLCERT, WxPayConfig::SSLCERT_PATH);
                 //      //     curl_setopt($ch,CURLOPT_SSLKEYTYPE,app_path().'apiclient_key.pem');
                 //      //     //curl_setopt($ch,CURLOPT_SSLKEY, WxPayConfig::SSLKEY_PATH);
                 //      // }
                 //      //post提交方式
                 //      curl_setopt($ch, CURLOPT_POST, TRUE);
                 //      curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
                 //      //运行curl
                 //      $data = curl_exec($ch);
                 //      // var_dump($data);
                 //      //返回结果
                 //      return $data;
        }


?>