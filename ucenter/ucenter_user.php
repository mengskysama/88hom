<?php
require 'path.inc.php';
require 'check_login.php';

$tpl_name = $tpl_dir.'ucenter_user.tpl';

$html->show();
$smarty->display($tpl_name);
?>