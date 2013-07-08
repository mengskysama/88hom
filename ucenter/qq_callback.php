<?php
require_once("../common/libs/QQAPI/qqConnectAPI.php");
$qc = new QC();

$qw_user['openID'] = $qc->get_openid();
$qw_user['channel'] = 'QQ';
$_SESSION['QW_USER'] = $qw_user;	
echo 'openid->'.$qc->get_openid();
print_r($qw_user);	
header("Location:callback_handler.php");
?>