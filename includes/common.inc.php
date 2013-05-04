<?php
set_include_path(ECMS_PATH_ROOT.'includes/');
require 'config.inc.php';
require 'phpini.inc.php';

//全程开启session
session_start();

$magic_quotes_gpc = get_magic_quotes_gpc();

require 'ecms.inc.php';
require 'util.inc.php';

//
$_COOKIE = c_addslashes($_COOKIE);
$_POST 	 = c_addslashes($_POST);
$_GET 	 = c_addslashes($_GET);
if(!$magic_quotes_gpc) {
	$_FILES = c_addslashes($_FILES);
}
//$webset=require ECMS_PATH_CONF.'web/web_'.LANG.'.cfg.php';
$webset=require ECMS_PATH_CONF.'web/web_zh_CN.cfg.php';
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
//$link=require ECMS_PATH_CONF.'link/link_zh_CN.php';

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
	if(file_exists(ECMS_PATH_CLASSES . $name . '.class.php')){
		//echo '!!!';
		require ECMS_PATH_CLASSES . $name . '.class.php';
	}
	return true;
}
spl_autoload_register("__autoload");





//define('PHPCMS_ROOT', str_replace("\\", '/', substr(dirname(__FILE__), 0, -7)));
//define('MICROTIME_START', microtime());
//define('IN_PHPCMS', TRUE);
//define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
//define('TIME', time());
//set_include_path(PHPCMS_ROOT.'include/');
//set_magic_quotes_runtime(0);
//unset($LANG, $HTTP_ENV_VARS, $HTTP_POST_VARS, $HTTP_GET_VARS, $HTTP_POST_FILES, $HTTP_COOKIE_VARS);
//
//require 'config.inc.php';
//require 'global.func.php';
//require 'dir.func.php';
//require 'url.func.php';
//require 'output.class.php';
//require 'priv_group.class.php';
//require 'times.class.php';
//require PHPCMS_ROOT.'languages/'.LANG.'/phpcms.lang.php';
//
//ERRORLOG ? set_error_handler('phpcms_error') : error_reporting(E_ERROR | E_WARNING | E_PARSE);
//
//define('IP', ip());
//define('HTTP_REFERER', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
//define('SCRIPT_NAME', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : preg_replace("/(.*)\.php(.*)/i", "\\1.php", $_SERVER['PHP_SELF']));
//define('QUERY_STRING', safe_replace($_SERVER['QUERY_STRING']));
//define('PATH_INFO', isset($_SERVER['PATH_INFO']) ? safe_replace($_SERVER['PATH_INFO']) : '');
//define('DOMAIN', isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : preg_replace("/([^:]*)[:0-9]*/i", "\\1", $_SERVER['HTTP_HOST']));
//define('SCHEME', $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://');
//define('SITE_URL', SCHEME.$_SERVER['HTTP_HOST'].PHPCMS_PATH);
//define('RELATE_URL', isset($_SERVER['REQUEST_URI']) ? safe_replace($_SERVER['REQUEST_URI']) : SCRIPT_NAME.(QUERY_STRING ? '?'.QUERY_STRING : PATH_INFO));
//define('URL', SCHEME.$_SERVER['HTTP_HOST'].RELATE_URL);
//define('RELATE_REFERER',urlencode(RELATE_URL));
//define('CACHE_FORM', PHPCMS_ROOT.'data/formguide/');
//
//if(function_exists('date_default_timezone_set')) date_default_timezone_set(TIMEZONE);
//header('Content-type: text/html; charset='.CHARSET);
//
//if(CACHE_PAGE && !defined('IN_ADMIN')) cache_page_start();
//if(GZIP && function_exists('ob_gzhandler'))
//{
//	ob_start('ob_gzhandler');
//}
//else
//{
//	ob_start();
//}
//
//$dbclass = 'db_'.DB_DATABASE;
//require $dbclass.'.class.php';
//
//$db = new $dbclass;
//$db->connect(DB_HOST, DB_USER, DB_PW, DB_NAME, DB_PCONNECT, DB_CHARSET);
//
//require 'session_'.SESSION_STORAGE.'.class.php';
//$session = new session();
//session_set_cookie_params(0, COOKIE_PATH, COOKIE_DOMAIN);
//
//if($_REQUEST)
//{
//	if(MAGIC_QUOTES_GPC)
//	{
//		$_REQUEST = new_stripslashes($_REQUEST);
//		if($_COOKIE) $_COOKIE = new_stripslashes($_COOKIE);
//		extract($db->escape($_REQUEST), EXTR_SKIP);
//	}
//	else
//	{
//		$_POST = $db->escape($_POST);
//		$_GET = $db->escape($_GET);
//		$_COOKIE = $db->escape($_COOKIE);
//		@extract($_POST,EXTR_SKIP);
//		@extract($_GET,EXTR_SKIP);
//		@extract($_COOKIE,EXTR_SKIP);
//	}
//	if(!defined('IN_ADMIN')) $_REQUEST = filter_xss($_REQUEST, ALLOWED_HTMLTAGS);
//	if($_COOKIE) $db->escape($_COOKIE);
//}
//if(QUERY_STRING && strpos(QUERY_STRING, '=') === false && preg_match("/^(.*)\.(htm|html|shtm|shtml)$/", QUERY_STRING, $urlvar))
//{
//	parse_str(str_replace(array('/', '-', ' '), array('&', '=', ''), $urlvar[1]));
//}
//
//$CACHE = cache_read('common.php');
//if(!$CACHE)
//{
//	require_once 'cache.func.php';
//	cache_all();
//	$CACHE = cache_read('common.php');
//}
//extract($CACHE);
//unset($CACHE);
//
//if($PHPCMS['enable_ipbanned'] && ip_banned(IP)) showmessage($LANG['administrator_banned_this_IP']);
//if(!defined('IN_ADMIN'))
//{
//	if(FILTER_ENABLE && filter_word()) showmessage('The content including illegal information: '.ILLEGAL_WORD.' .');
//    if($PHPCMS['minrefreshtime'])
//	{
//		$cc = new times();
//		$cc->set('cc', $PHPCMS['minrefreshtime'], 1);
//		if($cc->check()) showmessage('Do not refresh the page in '.$PHPCMS['minrefreshtime'].' seconds!');
//		$cc->add();
//		unset($cc);
//	}
//    if(!isset($forward)) $forward = HTTP_REFERER;
//}
//
//$M = $TEMP = array();
//if(!isset($mod)) $mod = 'phpcms';
//if($mod != 'phpcms')
//{
//	isset($MODULE[$mod]) or exit($LANG['module_not_exists']);
//	$langfile = defined('IN_ADMIN') ? $mod.'_admin' : $mod;
//	@include PHPCMS_ROOT.'languages/'.LANG.'/'.$langfile.'.lang.php';
//	$M = cache_read('module_'.$mod.'.php');
//}
//
//$_userid = 0;
//$_username = '';
//$_groupid = 3;
//$phpcms_auth = get_cookie('auth');
//if($phpcms_auth)
//{
//	$auth_key = md5(AUTH_KEY.$_SERVER['HTTP_USER_AGENT']);
//	list($_userid, $_password) = explode("\t", phpcms_auth($phpcms_auth, 'DECODE', $auth_key));
//	$_userid = intval($_userid);
//	$sql_member = "SELECT * FROM `".DB_PRE."member_cache` WHERE `userid`=$_userid";
//	$r = $db->get_one($sql_member);
//	if(!$r && cache_member())
//	{
//		$r = $db->get_one($sql_member);
//	}
//	if($r && $r['password'] === $_password)
//	{
//		if($r['groupid'] == 2)
//		{
//			set_cookie('auth', '');
//			showmessage($LANG['userid_banned_by_administrator']);
//		}
//		@extract($r, EXTR_PREFIX_ALL, '');
//	}
//	else
//	{
//		$_userid = 0;
//		$_username = '';
//		$_groupid = 3;
//		set_cookie('auth', '');
//	}
//	unset($r, $phpcms_auth, $phpcms_auth_key, $_password, $sql_member);
//}
//$G = cache_read('member_group_'.$_groupid.'.php');
//$priv_group = new priv_group();
//define('SKIN_PATH', 'templates/'.TPL_NAME.'/skins/'.TPL_CSS.'/');
//define('PASSPORT_ENABLE', ($PHPCMS['uc'] || $PHPCMS['enablepassport'] || $PHPCMS['enableserverpassport']) ? 1 : 0);
//
//if($PHPCMS['publish']) {
//	$content_publisharr = cache_read('publish.php');
//	if(is_array($content_publisharr)) {
//		foreach($content_publisharr as $k=>$v) {
//			if($v < TIME) {
//				$tmp_contentid[] = $k;
//				unset($content_publisharr[$k]);
//			}
//		}
//	}
//	if(isset($tmp_contentid)) {
//		require_once 'admin/content.class.php';
//		require_once 'attachment.class.php';
//		$attachment = new attachment($mod, 0);
//		$c = new content();
//		$res = $c->status($tmp_contentid, 99, 1);
//		cache_write('publish.php', $content_publisharr);	
//		unset($c);
//		unset($attachment);
//		unset($tmp_contentid);
//	}
//	unset($content_publisharr);
//}
?>