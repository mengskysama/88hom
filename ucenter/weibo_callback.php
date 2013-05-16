<?php
require 'path.inc.php';
include_once('../common/libs/weiboAPI/config.php');
include_once('../common/libs/weiboAPI/saetv2.ex.class.php');

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

if(isset($_REQUEST['code'])){
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	$token = $o->getAccessToken( 'code', $keys ) ;
}

if(empty($token)){
	header("Location:index.php");
	exit;
}

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token'] );
$ms = $c->home_timeline(); // done
$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
		
$userService = new UserService($db);
$user = $userService->getUserByUOpenID($uid);
if($user != ""){
	$_SESSION['UCUser'] = $user;
	$next_page = "";
}else{
	$_SESSION['weibo_uid'] = $uid;
	$next_page = "bind_account.php";
}
header("Location:".$nextPage);
?>
