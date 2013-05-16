<?php
require_once("../common/libs/QQAPI/qqConnectAPI.php");
$qc = new QC();

$_SESSION['UOpenID'] = $qc->get_openid();
header("Location:callback_handler.php");
?>