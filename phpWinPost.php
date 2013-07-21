<?php

$uid="88hom"; //
$pwd="88hom168" ;//
$mob="15820437227"; //
$content= "这是一条测试短信";
$content= urlencode(iconv("UTF-8","GB2312",$content)); //

//===========================

$sendurl=" http://service.winic.org:8009/sys_port/gateway/?";
$sdata="id=".$uid."&pwd=".$pwd."&to=".$mob."&content=".$content."&time=";

$xhr=new COM("MSXML2.XMLHTTP");   
$xhr->open("POST",$sendurl,false);
$xhr->setRequestHeader ("Content-type:","text/xml;charset=GB2312");
$xhr->setRequestHeader ("Content-type","application/x-www-form-urlencoded");
$xhr->send($sdata);   
echo $xhr->responseText;

?> 