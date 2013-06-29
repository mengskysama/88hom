<?php
require 'path.inc.php';
require 'check_login.php';
$tpl_name = $tpl_dir.'sell_property_list.tpl';

$propState = getParameter("propState");
$propState = $propState == "" ? 1 : $propState;
$propNum = getParameter("propNum");
$propPriceFrom = getParameter("propPriceFrom");
$propPriceTo = getParameter("propPriceTo");
$propRoom = getParameter("propRoom");
$propKind = getParameter("propKind");
$propOrder = getParameter("propOrder");
$propName = getParameter("propName");
$pageNo = getParameter("pageNo");
$pageNo = $pageNo == "" ? 1 : $pageNo;

$secondPropertyService = new SecondHandPropertyService($db);
$unlivePropsCount = $secondPropertyService->countPropertiesByState($userId,0);
$livePropsCount = $secondPropertyService->countPropertiesByState($userId,1);
$expiredPropsCount = $secondPropertyService->countPropertiesByState($userId,3);
$illegalPropsCount = $secondPropertyService->countPropertiesByState($userId,4);
//fill the condition
$condition['userId'] = $userId;
$condition['propState'] = $propState;
$condition['propNum'] = $propNum;
$condition['propPriceFrom'] = $propPriceFrom;
$condition['propPriceTo'] = $propPriceTo;
$condition['propRoom'] = $propRoom;
$condition['propKind'] = $propKind;
$condition['propOrder'] = $propOrder;
$condition['propName'] = $propName;
$condition['currentPageNo'] = $pageNo;
$props = $secondPropertyService->getSellPropertyList($condition);
$propList = $props['data'];
$pagination = $props['pagination'];

$html->show();
$smarty->assign('ucenter_user_left_menu',$tpl_dir.'ucenter_user_left_menu.tpl');
$smarty->assign("unlivePropsCount",$unlivePropsCount);
$smarty->assign("livePropsCount",$livePropsCount);
$smarty->assign("expiredPropsCount",$expiredPropsCount);
$smarty->assign("illegalPropsCount",$illegalPropsCount);
$smarty->assign("propList",$propList);
$smarty->assign("pagination",$pagination);
$smarty->assign("propState",$propState);
$smarty->assign("pageNo",$pageNo);
$smarty->display($tpl_name);
?>