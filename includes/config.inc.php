<?php
//全程开启session
session_start();

require 'phpini.inc.php';

define('SERVER_NAME', $_SERVER ['SERVER_NAME']);
define('HTTP_HOST', $_SERVER ['HTTP_HOST']);
if(SERVER_NAME=='localhost'||SERVER_NAME=='127.0.0.1'||SERVER_NAME=='192.168.0.27'){
	define('ECMS_PATH', '/88hom/');
}else{
	define('ECMS_PATH', '/');
}
//数据库配置信息
if(SERVER_NAME=='localhost'||SERVER_NAME=='192.168.0.27'){
	define('ECMS_DB_HOST', 'localhost'); //数据库服务器主机地址
	define('ECMS_DB_USER', '88hom'); //数据库帐号
	define('ECMS_DB_PW', '123456'); //数据库密码
	define('ECMS_DB_NAME', '88hom'); //数据库名
	define('ECMS_DB_PRE', 'ecms_'); //数据库表前缀，同一数据库安装多套Phpcms时，请修改表前缀
	define('ECMS_DB_CHARSET', 'utf8'); //数据库字符集
	define('ECMS_DB_PCONNECT', 0); //0 或1，是否使用持久连接
	define('ECMS_DB_PROVIDER', 'mysql'); //数据库类型
	define('LANG', 'zh_CN');
}else{
	define('ECMS_DB_HOST', '118.123.13.251:53406'); //数据库服务器主机地址
	define('ECMS_DB_USER', '88hom'); //数据库帐号
	define('ECMS_DB_PW', '88hom110'); //数据库密码
	define('ECMS_DB_NAME', '88hom'); //数据库名
	define('ECMS_DB_PRE', 'ecms_'); //数据库表前缀，同一数据库安装多套Phpcms时，请修改表前缀
	define('ECMS_DB_CHARSET', 'utf8'); //数据库字符集
	define('ECMS_DB_PCONNECT', 0); //0 或1，是否使用持久连接
	define('ECMS_DB_PROVIDER', 'mysql'); //数据库类型
	define('LANG', 'zh_CN');
}
$cfg['web_type']='http';
$userAgent=$_SERVER['HTTP_USER_AGENT'];
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad')){
	$cfg['web_type']='iPhone&iPad';
}
if(strpos($userAgent,"iPhone")||strpos($userAgent,"iPad")||strpos($userAgent,"iPod")||strpos($userAgent,"iOS")){
	$cfg['web_type']='iPhone';
}else if(strpos($userAgent,"Android")){
	$cfg['web_type']='Android';
}else{
	$cfg['web_type']='http';
}

define('ECMS_WEB_URL', 'http://'.SERVER_NAME.ECMS_PATH);
$cfg['web_url']=ECMS_WEB_URL;
$cfg['web_code_admin']=ECMS_WEB_URL.'common/libs/api/codeadmin.php';
$cfg['web_code_web']=ECMS_WEB_URL.'common/libs/api/codeweb.php';
$cfg['web_code_line']=ECMS_WEB_URL.'common/libs/api/line_captcha.php';

//smarty模板基本配置
define('ECMS_SMARTY_TEMPLATES', ECMS_PATH_ROOT.'templates/');//模板物理路径
define('ECMS_SMARTY_TEMPLATES_C', ECMS_PATH_ROOT.'templates_c/');//html缓存物理路径
define('ECMS_SMARTY_CACHES', ECMS_PATH_ROOT.'caches/');//数据缓存物理路径
define('ECMS_SMARTY_CONFIGS', ECMS_PATH_ROOT.'configs/');//smarty全局配置文件物理路径
define('ECMS_SMARTY_CACHING', false);//是否开启数据缓存
define('ECMS_SMARTY_COMPILE_CHECK', true);//是否开启html检查
define('ECMS_SMARTY_DEBUGGING', false);//是否开启debug
define('ECMS_SMARTY_CACHE_LIFETIME', 600);//数据缓存死亡周期600秒
define('ECMS_SMARTY_LEFT_DELIMITER', '<!--{');//设置左边界符号
define('ECMS_SMARTY_RIGHT_DELIMITER', '}-->');//设置右边界符号

//Sphinx服务器配置
define('SPHINX_SERVER_HOST','118.123.13.251');//sphinx服务器IP地址
define('SPHINX_SERVER_PORT',53407);//端口号
define('SPHINX_LIMIT_OFFSET',0);//查询偏移量
define('SPHINX_LIMIT_LIMIT',10);//查询返回匹配条目限制
define('SPHINX_LIMIT_MAX_MATCHES',1000);//当前查询结果集大限
define('SPHINX_LIMIT_CUTOFF',500);//阀值，当匹配数超过阀值时将停止检查
define('SPHINX_MAXQUERYTIME',3000);//检索查询最大时间限制，单位毫秒
define('SPHINX_CONNECTTIMEOUT',5000);//设置超时时间,单位毫秒
define('SPHINX_ARRAYRESULT',true);//设置结果返回格式,true为普通数组，false为hash格式

//网站相应文件夹物理路径配置
define('ECMS_PATH_COMMON', ECMS_PATH_ROOT.'common/'); //公共类库目录
define('ECMS_PATH_LIBS', ECMS_PATH_COMMON.'libs/'); //通用类库目录
define('ECMS_PATH_FONT', ECMS_PATH_LIBS.'font/');
define('ECMS_PATH_CLASSES', ECMS_PATH_LIBS.'classes/');
define('ECMS_PATH_SMARTY', ECMS_PATH_LIBS.'smarty/'); //通用smarty类库目录
define('ECMS_PATH_APPS', ECMS_PATH_COMMON.'apps/'); //通用apps目录
define('ECMS_PATH_ACTION', ECMS_PATH_APPS.'action/'); //通用程序action目录
define('ECMS_PATH_SERVICE', ECMS_PATH_APPS.'service/'); //通用程序service目录
define('ECMS_PATH_DAO', ECMS_PATH_APPS.'dao/'); //通用程序dao目录
define('ECMS_PATH_MODEL', ECMS_PATH_APPS.'model/'); //通用程序model目录
define('ECMS_PATH_DATA', ECMS_PATH_ROOT.'data/'); //通用数据目录
define('ECMS_PATH_UPLOADS', ECMS_PATH_ROOT.'uploads/'); //通用数据目录
define('ECMS_PATH_ERROR', ECMS_PATH_DATA.'error/');//数据库错误日志
define('ECMS_PATH_SPIDER', ECMS_PATH_DATA.'spider/'); //通用spider文本数据目录
define('ECMS_PATH_OUTLINK', ECMS_PATH_DATA.'outlink/'); //通用outlink文本数据目录
define('ECMS_PATH_SITEMAP', ECMS_PATH_DATA.'sitemap/'); //通用sitemap文本数据目录
define('ECMS_PATH_UPFILE', ECMS_PATH.'upfile/video/'); //通用video目录
define('ECMS_PATH_CONF', ECMS_PATH_DATA.'conf/');
define('ECMS_PATH_LANG', ECMS_PATH_ROOT.'languages/'); //通用语言包目录
define('ECMS_PATH_FCK', ECMS_PATH_LIBS.'fck/');//通用ckeditor编辑器
define('ECMS_PATH_CSS', ECMS_PATH.'templates/css/'); //通用css目录
define('ECMS_PATH_IMAGES', ECMS_PATH.'templates/images/'); //通用images目录
define('ECMS_PATH_JS', ECMS_PATH.'templates/js/'); //通用js目录


define('ECMS_PATH_AD_FILE', ECMS_PATH_ROOT.'uploads/ad/'); //广告文件目录
define('ECMS_PATH_AD_URL', ECMS_WEB_URL.'uploads/ad/'); //广告文件Web目录

$cfg['web_path'] = ECMS_PATH;
$cfg['web_css'] = ECMS_PATH_CSS;
$cfg['web_images'] = ECMS_PATH_IMAGES;
$cfg['web_js'] = ECMS_PATH_JS;
$cfg['web_common'] = ECMS_PATH.'templates/common/';

$cfg['arr_pic']=require_once 'pic.inc.php';//公共数据
$cfg['arr_build']=require_once 'build.inc.php';//公共数据
$cfg['arr_info']=require_once 'info.inc.php';//公共数据

$cfg['file_path_upload']=ECMS_PATH_UPLOADS;//后台上传文件目录物理路径
$cfg['web_url_upload'] = ECMS_PATH.'uploads/';//台前上传文件目录url
//其他一般配置
define('ECMS_TIME',time());
$cfg['web_charset']='UTF-8';
$cfg['line_tag'] = "\r\n";
if (PHP_OS == 'Linux') { //判断服务器操作系统
	$cfg['line_tag'] = "\n"; //linux系统下文件写入换行的标示，注意要用双引号
} else {
	$cfg['line_tag'] = "\r\n"; //window系统下文件写入换行的标示，注意要用双引号
}
$cfg['web_useragent'] = 'LiuMang+Mozilla/5.0 (Windows NT 5.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1';//

//Session配置
define('ECMS_SESSION_STORAGE', 'files'); //Session 存储方式（files, mysql, apc, eaccelerator, memcache, shmop）
define('ECMS_SESSION_TTL', 60); //Session 生命周期（秒）
define('ECMS_SESSION_SAVEPATH', ECMS_PATH_ROOT.'data/sessions/'); //Session 保存路径（files）
define('ECMS_SESSION_N', 0); //Session 文件分布的目录深度（files）

//登陆密匙配置
define('ECMS_KEY_ADMIN', 'ecms_admin');//后台密匙
define('ECMS_KEY_WEB', 'ecms_web');//前台密匙

define('ECMS_SYSTEM_ADMIN', '1'); //网站创始人ID，多个ID逗号分隔

//MemCache服务器配置
define('MEMCACHE_HOST', 'localhost'); //MemCache服务器主机
define('MEMCACHE_PORT', 11211); //MemCache服务器端口
define('MEMCACHE_TIMEOUT', 1); //S，MemCache服务器连接超时


//Sphinx常量配置内容
//
// $Id$
//

//
// Copyright (c) 2001-2011, Andrew Aksyonoff
// Copyright (c) 2008-2011, Sphinx Technologies Inc
// All rights reserved
//
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License. You should have
// received a copy of the GPL license along with this program; if you
// did not, you can find it at http://www.gnu.org/
//

/////////////////////////////////////////////////////////////////////////////
// PHP version of Sphinx searchd client (PHP API)
/////////////////////////////////////////////////////////////////////////////

/// known searchd commands
define ( "SEARCHD_COMMAND_SEARCH",		0 );
define ( "SEARCHD_COMMAND_EXCERPT",		1 );
define ( "SEARCHD_COMMAND_UPDATE",		2 );
define ( "SEARCHD_COMMAND_KEYWORDS",	3 );
define ( "SEARCHD_COMMAND_PERSIST",		4 );
define ( "SEARCHD_COMMAND_STATUS",		5 );
define ( "SEARCHD_COMMAND_FLUSHATTRS",	7 );

/// current client-side command implementation versions
define ( "VER_COMMAND_SEARCH",		0x119 );
define ( "VER_COMMAND_EXCERPT",		0x103 );
define ( "VER_COMMAND_UPDATE",		0x102 );
define ( "VER_COMMAND_KEYWORDS",	0x100 );
define ( "VER_COMMAND_STATUS",		0x100 );
define ( "VER_COMMAND_QUERY",		0x100 );
define ( "VER_COMMAND_FLUSHATTRS",	0x100 );

/// known searchd status codes
define ( "SEARCHD_OK",				0 );
define ( "SEARCHD_ERROR",			1 );
define ( "SEARCHD_RETRY",			2 );
define ( "SEARCHD_WARNING",			3 );

/// known match modes
define ( "SPH_MATCH_ALL",			0 );
define ( "SPH_MATCH_ANY",			1 );
define ( "SPH_MATCH_PHRASE",		2 );
define ( "SPH_MATCH_BOOLEAN",		3 );
define ( "SPH_MATCH_EXTENDED",		4 );
define ( "SPH_MATCH_FULLSCAN",		5 );
define ( "SPH_MATCH_EXTENDED2",		6 );	// extended engine V2 (TEMPORARY, WILL BE REMOVED)

/// known ranking modes (ext2 only)
define ( "SPH_RANK_PROXIMITY_BM25",	0 );	///< default mode, phrase proximity major factor and BM25 minor one
define ( "SPH_RANK_BM25",			1 );	///< statistical mode, BM25 ranking only (faster but worse quality)
define ( "SPH_RANK_NONE",			2 );	///< no ranking, all matches get a weight of 1
define ( "SPH_RANK_WORDCOUNT",		3 );	///< simple word-count weighting, rank is a weighted sum of per-field keyword occurence counts
define ( "SPH_RANK_PROXIMITY",		4 );
define ( "SPH_RANK_MATCHANY",		5 );
define ( "SPH_RANK_FIELDMASK",		6 );
define ( "SPH_RANK_SPH04",			7 );
define ( "SPH_RANK_EXPR",			8 );
define ( "SPH_RANK_TOTAL",			9 );

/// known sort modes
define ( "SPH_SORT_RELEVANCE",		0 );
define ( "SPH_SORT_ATTR_DESC",		1 );
define ( "SPH_SORT_ATTR_ASC",		2 );
define ( "SPH_SORT_TIME_SEGMENTS", 	3 );
define ( "SPH_SORT_EXTENDED", 		4 );
define ( "SPH_SORT_EXPR", 			5 );

/// known filter types
define ( "SPH_FILTER_VALUES",		0 );
define ( "SPH_FILTER_RANGE",		1 );
define ( "SPH_FILTER_FLOATRANGE",	2 );

/// known attribute types
define ( "SPH_ATTR_INTEGER",		1 );
define ( "SPH_ATTR_TIMESTAMP",		2 );
define ( "SPH_ATTR_ORDINAL",		3 );
define ( "SPH_ATTR_BOOL",			4 );
define ( "SPH_ATTR_FLOAT",			5 );
define ( "SPH_ATTR_BIGINT",			6 );
define ( "SPH_ATTR_STRING",			7 );
define ( "SPH_ATTR_MULTI",			0x40000001 );
define ( "SPH_ATTR_MULTI64",			0x40000002 );

/// known grouping functions
define ( "SPH_GROUPBY_DAY",			0 );
define ( "SPH_GROUPBY_WEEK",		1 );
define ( "SPH_GROUPBY_MONTH",		2 );
define ( "SPH_GROUPBY_YEAR",		3 );
define ( "SPH_GROUPBY_ATTR",		4 );
define ( "SPH_GROUPBY_ATTRPAIR",	5 );
?>