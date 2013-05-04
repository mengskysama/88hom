<?php
ini_set('date.timezone', 'Asia/Shanghai');//设置服务器时间为上海区时
ini_set('magic_quotes_runtime',0);//PHP将会为所有的溢出字符，当遇到反斜杆、单引号，将会自动加上一个反斜杆，保护系统和数据库的安全 ! 0为off,1为on!
//ini_set('magic_quotes_gpc',0);
ini_set('memory_limit','128M');// 最大单线程的独立内存使用量。也就是一个web请求，给予线程最大的内存使用量的定义。默认为128M
ini_set('max_execution_time',0);//PHP程序执行时间，设置为0即永不超时，默认为30秒
ini_set('max_input_time',0);//PHP一个表单提交的最长时间，设置为0即永不超时，默认为60秒
ini_set('error_reporting',E_ALL);//错误报告，0为禁用错误报告，E_ALL为所有的错误报告
ini_set('session.save_handler',ECMS_SESSION_STORAGE);//设置session文件的存储方式
ini_set('session.gc_maxlifetime',ECMS_SESSION_TTL);//设置session的过期时间
ini_set('session.save_path',ECMS_SESSION_SAVEPATH);//设置session的保存路径
?>