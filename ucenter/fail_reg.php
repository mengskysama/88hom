<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'fail_reg.tpl';

$userType = getParameter("userType","GET");
$destURL = $userType == 2 ? "agent_register.php" : "user_register.php";
$err_msg = $_SESSION['ERR_MSG_FAIL_TO_REG'];

$html->addJs('ucenter_register.js');
$html->addJs("ucenter_city.js");
$html->addJs("ucenter_register_email.js");
$html->addJs("ucenter_register_agent.js");
$html->addCss("ucenter/city.css");
$html->show();
$smarty->assign("err_msg",$err_msg);
$smarty->assign("destURL",$destURL);
$smarty->display($tpl_name);
?>