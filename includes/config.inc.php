<?php
//
define('SERVER_NAME', $_SERVER ['SERVER_NAME']);
define('HTTP_HOST', $_SERVER ['HTTP_HOST']);
if(SERVER_NAME=='localhost'||SERVER_NAME=='127.0.0.1'||SERVER_NAME=='192.168.0.27'){
	define('ECMS_PATH', '/88hom/');
}else{
	define('ECMS_PATH', '/');
}
//数据库配置信息
if(SERVER_NAME=='localhost'||SERVER_NAME=='192.168.0.27'){
	define('ECMS_DB_HOST', '127.0.0.1'); //数据库服务器主机地址
	define('ECMS_DB_USER', '88hom'); //数据库帐号
	define('ECMS_DB_PW', '123456'); //数据库密码
	define('ECMS_DB_NAME', '88hom'); //数据库名
	define('ECMS_DB_PRE', 'ecms_'); //数据库表前缀，同一数据库安装多套Phpcms时，请修改表前缀
	define('ECMS_DB_CHARSET', 'utf8'); //数据库字符集
	define('ECMS_DB_PCONNECT', 0); //0 或1，是否使用持久连接
	define('ECMS_DB_PROVIDER', 'mysql'); //数据库类型
	define('LANG', 'zh_CN');
}else{
	define('ECMS_DB_HOST', 'localhost'); //数据库服务器主机地址
	define('ECMS_DB_USER', 'g-cre'); //数据库帐号
	define('ECMS_DB_PW', 'g-cre110'); //数据库密码
	define('ECMS_DB_NAME', 'g-cre'); //数据库名
	define('ECMS_DB_PRE', 'ecms_'); //数据库表前缀，同一数据库安装多套Phpcms时，请修改表前缀
	define('ECMS_DB_CHARSET', 'gbk'); //数据库字符集
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
define('ECMS_PATH_AD_URL', ECMS_WEB_URL.'uploads/ad/'); //广告文件目录

$cfg['web_path'] = ECMS_PATH;
$cfg['web_css'] = ECMS_PATH_CSS;
$cfg['web_images'] = ECMS_PATH_IMAGES;
$cfg['web_js'] = ECMS_PATH_JS;
$cfg['web_common'] = ECMS_PATH.'templates/common/';

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
define('ECMS_SESSION_TTL', 20); //Session 生命周期（秒）
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
?>