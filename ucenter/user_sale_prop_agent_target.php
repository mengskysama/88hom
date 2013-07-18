<?php
require 'path.inc.php';
require 'check_user_login.php';
$tpl_name = $tpl_dir.'user_sale_prop_agent_target.tpl';

$propId = getParameter("propId","GET");

$imcpService = new ImcpService($db);
$agentCompany = $imcpService->getAgentCompanyList();

$html->addJs('jquery-ui-1.8.21.custom.min.js');
$html->addJs('ucenter_property_input.js');
$html->addCss('ucenter/jquery-ui.css');
$html->addCss('ucenter/public.css');
$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('agentCompany',$agentCompany);
$smarty->display($tpl_name);
?>