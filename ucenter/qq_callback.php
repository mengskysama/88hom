<?php
require_once("../common/libs/QQAPI/qqConnectAPI.php");
$qc = new QC();
$qc->qq_callback();
$qw_user['openID'] = $qc->get_openid();
$qw_user['channel'] = 'QQ';
$_SESSION['QW_USER'] = $qw_user;
header("Location:callback_handler.php");
?>