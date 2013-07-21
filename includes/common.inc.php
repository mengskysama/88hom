<?php
require 'config.inc.php';
require 'ecms.inc.php';
require 'util.inc.php';

//
$magic_quotes_gpc = get_magic_quotes_gpc();

$_COOKIE = c_addslashes($_COOKIE);
$_POST 	 = c_addslashes($_POST);
$_GET 	 = c_addslashes($_GET);

if(!$magic_quotes_gpc) {
	$_FILES = c_addslashes($_FILES);
}
//$webset=require ECMS_PATH_CONF.'web/web_'.LANG.'.cfg.php';
$webset=require ECMS_PATH_CONF.'web/web.cfg.php';
$cfg['web_keywords']='';
$cfg['web_keywords_str']='';
if($webset['keywords']!=''){
	$cfg['web_keywords']=explode(",", $webset['keywords']);
	for($i=0;$i<count($cfg['web_keywords']);$i++){
		$cfg['web_keywords_str'].=$cfg['web_keywords'][$i].'_';
	}
}

$cfg['web_user']='';
if(!empty($_SESSION['Web_User'])){
	$cfg['web_user']=$_SESSION['Web_User'];
}

define("USER_TYPE_SHOP",3);
define("USER_TYPE_AGENT",2);
define("USER_TYPE_USER",1);

define("ERR_CODE_REGISTER_SUCCESS",100);
define("ERR_MESSAGE_REGISTER_SUCCESS","");

define('ECMS_MAIL_MAILER', 'smtp');//分别为"mail", "sendmail", "qmail", or "smtp").
define('ECMS_MAIL_HOST', 'smtp.sina.com');
define('ECMS_MAIL_USERNAME', 'internet_midland@sina.com');
define('ECMS_MAIL_PASSWORD', 'midland');

//导航中文名称
$cfg['nav']['cname']['1']='星河首页';										
$cfg['nav']['cname']['2']='关于我们';									
$cfg['nav']['cname']['3']='核心业务';									
$cfg['nav']['cname']['4']='项目概览';									
$cfg['nav']['cname']['5']='新闻中心';									
$cfg['nav']['cname']['6']='客户服务';									
$cfg['nav']['cname']['7']='人力资源';						
$cfg['nav']['cname']['8']='联系我们';		

//导航对应目录
$cfg['nav']['ename']['1']='';											
$cfg['nav']['ename']['2']='about';										
$cfg['nav']['ename']['3']='business';										
$cfg['nav']['ename']['4']='project';										
$cfg['nav']['ename']['5']='news';									
$cfg['nav']['ename']['6']='service';										
$cfg['nav']['ename']['7']='job';	
$cfg['nav']['ename']['8']='contact';	

//导航对应URL
$cfg['nav']['url']['1']=ECMS_WEB_URL; 						    	
$cfg['nav']['url']['2']=ECMS_WEB_URL.$cfg['nav']['ename']['2'].'/'; 		
$cfg['nav']['url']['3']=ECMS_WEB_URL.$cfg['nav']['ename']['3'].'/'; 						
$cfg['nav']['url']['4']=ECMS_WEB_URL.$cfg['nav']['ename']['4'].'/index-14.htm'; 					 			
$cfg['nav']['url']['5']=ECMS_WEB_URL.$cfg['nav']['ename']['5'].'/index-16.htm'; 	
$cfg['nav']['url']['6']=ECMS_WEB_URL.$cfg['nav']['ename']['6'].'/'; 	
$cfg['nav']['url']['7']=ECMS_WEB_URL.$cfg['nav']['ename']['7'].'/'; 			
$cfg['nav']['url']['8']=ECMS_WEB_URL.$cfg['nav']['ename']['8'].'/'; 

//加载语言包
require ECMS_PATH_LANG.LANG.'/common.lang.php';
require ECMS_PATH_LANG.LANG.'/header.lang.php';
require ECMS_PATH_LANG.LANG.'/footer.lang.php';

//加载FCK编辑工具
require ECMS_PATH_FCK.'ckeditor/ckeditor.php';


//数据库连接
require ECMS_PATH_APPS.'db/DBForMySql.class.php';
$db=null;
if(ECMS_DB_PROVIDER=='mysql'){
	$db=new DBForMySql(ECMS_DB_HOST, ECMS_DB_USER, ECMS_DB_PW, ECMS_DB_NAME, ECMS_DB_CHARSET);
}

//友情链接
//$link=require ECMS_PATH_CONF.'link/link_'.LANG.'.php';
$link=require ECMS_PATH_CONF.'link/link_zh_CN.php';

//smarty模板引擎设置
require ECMS_PATH_SMARTY.'libs/Smarty.class.php';
$smarty = new Smarty();															//创建模板对象
$smarty->setTemplateDir(ECMS_SMARTY_TEMPLATES);									//设置模板目录
$smarty->setCompileDir(ECMS_SMARTY_TEMPLATES_C);								//设置编译目录
$smarty->setCacheDir(ECMS_SMARTY_CACHES);										//设置缓存目录
$smarty->setConfigDir(ECMS_SMARTY_CONFIGS);										//设置配置文件目录，可用$tpl->config_load()方法来调用配置文件
$smarty->compile_check=ECMS_SMARTY_COMPILE_CHECK;								//即在每次输出模板的时候检查当前模板是否有过改变,如果有那么重新编译
$smarty->caching=ECMS_SMARTY_CACHING;											//设置缓存状态true:缓存,false:不缓存
$smarty->debugging=ECMS_SMARTY_DEBUGGING;										//是否允许调试
$smarty->cache_lifetime=ECMS_SMARTY_CACHE_LIFETIME;								//设置缓存时间，单位为秒
$smarty->left_delimiter=ECMS_SMARTY_LEFT_DELIMITER;								//设置左边界符号
$smarty->right_delimiter=ECMS_SMARTY_RIGHT_DELIMITER;							//设置右边界符号

//smarty引用赋值
$smarty->assignByRef('cfg', $cfg);
$smarty->assignByRef('LANG', $LANG);
$smarty->assignByRef('link', $link);
$smarty->assignByRef('webset', $webset);

//html页面js和css加载类
require ECMS_PATH_CLASSES.'Html.class.php';
$html=new Html($smarty);

//自动载入apps,classes,lang
function __autoload($name) {
	if (file_exists(ECMS_PATH_DAO . $name . '.class.php')) {
		//echo 'fuck';
		require ECMS_PATH_DAO . $name . '.class.php';
	}
	if (file_exists(ECMS_PATH_SERVICE . $name . '.class.php')) {
		//echo 'you';
		require ECMS_PATH_SERVICE . $name . '.class.php';
	}
	if (file_exists(ECMS_PATH_MODEL . $name . '.class.php')) {
		//echo 'sb';
		require ECMS_PATH_MODEL . $name . '.class.php';
	}
	if(file_exists(ECMS_PATH_CLASSES . $name . '.class.php')){
		//echo '!!!';
		require ECMS_PATH_CLASSES . $name . '.class.php';
	}
	return true;
}
spl_autoload_register("__autoload");
?>