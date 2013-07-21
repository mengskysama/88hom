<?PHP 
//改demo的功能是群发短信和发单条短信。（传一个手机号就是发单条，多个手机号既是群发）

//您把序列号和密码还有手机号，填上，直接运行就可以了

//如果您的系统是utf-8,请转成GB2312 后，再提交、
//请参考 'content'=>iconv( "UTF-8", "gb2312//IGNORE" ,$content),//短信内容

$flag = 0; 
        //要post的数据 
$argv = array( 
         'sn'=>'SDK-111-010-01964', ////替换成您自己的序列号
		 'pwd'=>strtoupper(md5('SDK-111-010-01964'.'933769')), //此处密码需要加密 加密方式为 md5(sn+password) 32位大写  此处为百度md5直接加密工具：http://www.baidu.com/s?wd=md5&rsv_spt=1&issp=1&rsv_bp=0&ie=utf-8&tn=baiduhome_pg
		 'mobile'=>'15820437227',//手机号 多个用英文的逗号隔开 post理论没有长度限制.推荐群发一次小于等于10000个手机号
		 'content'=>iconv( "UTF-8", "gb2312//IGNORE" ,'欢迎申请注册房不胜房,您的手机验证码为:136108,24小时内有效。【房不胜房】'),//短信内容
		 'ext'=>'',
		 'rrid'=>'',//默认空 如果空返回系统生成的标识串 如果传值保证值唯一 成功则返回传入的值
		 'stime'=>''//定时时间 格式为2011-6-29 11:09:21
		 ); 
//构造要post的字符串 
foreach ($argv as $key=>$value) { 
          if ($flag!=0) { 
                         $params .= "&"; 
                         $flag = 1; 
          } 
         $params.= $key."="; $params.= urlencode($value); 
         $flag = 1; 
          } 
         $length = strlen($params); 
                 //创建socket连接 
        $fp = fsockopen("sdk105.entinfo.cn",8060,$errno,$errstr,10) or exit($errstr."--->".$errno); 
         //构造post请求的头 
         $header = "POST /webservice.asmx/mt HTTP/1.1\r\n"; 
         $header .= "Host:sdk105.entinfo.cn\r\n"; 
         $header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
         $header .= "Content-Length: ".$length."\r\n"; 
         $header .= "Connection: Close\r\n\r\n"; 
         //添加post的字符串 
         $header .= $params."\r\n"; 
         //发送post的数据 
         fputs($fp,$header); 
         $inheader = 1; 
          while (!feof($fp)) { 
                         $line = fgets($fp,1024); //去除请求包的头只显示页面的返回数据 
                         if ($inheader && ($line == "\n" || $line == "\r\n")) { 
                                 $inheader = 0; 
                          } 
                          if ($inheader == 0) { 
                                // echo $line; 
                          } 
          } 
		  //<string xmlns="http://tempuri.org/">-5</string>
	       $line=str_replace("<string xmlns=\"http://tempuri.org/\">","",$line);
	       $line=str_replace("</string>","",$line);
		   $result=explode("-",$line);
		    if(count($result)>1)
			echo '发送失败返回值为:'.$line;
			else
			echo '发送成功 返回值为:'.$line;  
?>
