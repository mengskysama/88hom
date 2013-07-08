<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'success_reg_mobile.tpl';

$userType = getParameter("userType","GET");
$destURL = $userType == 2 ? "index.php?userType=2" : "index.php";

$html->addJs('ucenter_register.js');
$html->addJs("ucenter_city.js");
$html->addJs("ucenter_register_email.js");
$html->addJs("ucenter_register_agent.js");
$html->addCss("ucenter/city.css");
$html->show();
$smarty->assign("destURL",$destURL);
$smarty->display($tpl_name);
?>