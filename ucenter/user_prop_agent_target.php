<?php
require 'path.inc.php';
require '../includes/area.inc.php';
require 'check_user_login.php';
$tpl_name = $tpl_dir.'user_prop_agent_target.tpl';

$propId = getParameter("propId","GET");
$txType = getParameter("txType","GET");
$companyId = getParameter("company");
$agentName = getParameter("agentName");

$imcpService = new ImcpService($db);
$companyList = $imcpService->getAgentCompanyList();

$districtId = getParameter("district");
$districtId = $districtId == "" ? -1 : $districtId;
$districtList = $D[4][8];
$areaList = $A[4][8];

$destNo = getParameter("destNo");
$pageNo = getParameter("pageNo");
$pageNo = $destNo == "" ? ($pageNo == "" ? 1 : $pageNo) : $destNo;
$condition['company'] = $companyId;
$condition['district'] = $districtId;
$condition['agentName'] = $agentName;
$condition['company'] = $companyId; 
$condition['currentPageNo'] = $pageNo;
$condition['propId'] = $propId;
$userService = new UserService($db);
$agents = $userService->getAgentList($condition);
$agentList = $agents['data'];
$pagination = $agents['pagination'];

$html->addJs('jquery-ui-1.8.21.custom.min.js');
$html->addJs('ucenter_property_input.js');
$html->addCss('ucenter/jquery-ui.css');
$html->addCss('ucenter/public.css');
$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign('companyList',$companyList);
$smarty->assign('companyId',$companyId);
$smarty->assign('districtList',$districtList);
$smarty->assign('districtId',$districtId);
$smarty->assign('agentList',$agentList);
$smarty->assign('areaList',$areaList);
$smarty->assign('propId',$propId);
$smarty->assign('txType',$txType);
$smarty->assign('pageNo',$pageNo);
$smarty->assign("destNo",$destNo);
$smarty->assign('pagination',$pagination);
$smarty->assign('agentName',$agentName);
$smarty->display($tpl_name);
?>