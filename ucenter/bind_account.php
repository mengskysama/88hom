<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'bind_account.tpl';
//mock 
$qw_user_mock['openID'] = '123456';
$qw_user_mock['channel'] = 'QQ';
$_SESSION['QW_USER'] = $qw_user_mock;

if(!isset($_SESSION['QW_USER'])){
	header("Location:index.php");
	exit;
}

$qw_user = $_SESSION['QW_USER'];
$login_channel = $qw_user['channel'];
$html->show();
$smarty->assign('login_channel',$login_channel);
$smarty->display($tpl_name);
?>