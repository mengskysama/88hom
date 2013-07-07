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
$propRoom = $propRoom == "" ? 0 : $propRoom;
$propKind = getParameter("propKind");
$propKind = $propKind == "" ? 'vv' : $propKind;
$propOrder = getParameter("propOrder");
$propOrder = $propOrder == "" ? 0 : $propOrder;
$propName = getParameter("propName");
$destNo = getParameter("destNo");
$pageNo = getParameter("pageNo");
$pageNo = $destNo == "" ? ($pageNo == "" ? 1 : $pageNo) : $destNo;
$txType = 1;

$secondPropertyService = new SecondHandPropertyService($db);
$unlivePropsCount = $secondPropertyService->countPropertiesByState($userId,0,$txType);
$livePropsCount = $secondPropertyService->countPropertiesByState($userId,1,$txType);
$expiredPropsCount = $secondPropertyService->countPropertiesByState($userId,3,$txType);
$illegalPropsCount = $secondPropertyService->countPropertiesByState($userId,4,$txType);
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
$condition['txType'] = $txType;
$props = $secondPropertyService->getSellPropertyList($condition);
$propList = $props['data'];
$pagination = $props['pagination'];

$html->addJs("ucenter_property_input.js");
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

$smarty->assign("propNum",$propNum);
$smarty->assign("propPriceFrom",$propPriceFrom);
$smarty->assign("propPriceTo",$propPriceTo);
$smarty->assign("propRoom",$propRoom);
$smarty->assign("propKind",$propKind);
$smarty->assign("propOrder",$propOrder);
$smarty->assign("destNo",$destNo);
$smarty->assign("propName",$propName);
$smarty->display($tpl_name);
?>