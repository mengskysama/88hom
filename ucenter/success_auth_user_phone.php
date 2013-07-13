<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'success_auth_user_phone.tpl';

$html->addJs('ucenter_register.js');
$html->addJs("ucenter_city.js");
$html->addJs("ucenter_register_email.js");
$html->addJs("ucenter_register_agent.js");
$html->addCss("ucenter/city.css");
$html->show();
$smarty->display($tpl_name);
?>