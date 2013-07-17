<?php
require 'path.inc.php';
$tpl_name = $tpl_dir.'agent_register.tpl';

$html->addJs('ucenter_mobile.js');
$html->addJs('ucenter_register.js');
$html->addJs("ucenter_city.js");
$html->addJs("ucenter_register_email.js");
$html->addJs("ucenter_register_agent.js");
$html->addCss("ucenter/city.css");
$html->show();
$smarty->display($tpl_name);
?>