<?php
require_once("../common/libs/QQAPI/qqConnectAPI.php");
$qc = new QC();
echo "access_token->".$qc->qq_callback();
echo "<br>";
echo "openid->".$qc->get_openid();
?>