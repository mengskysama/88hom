<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'info_detail.tpl';
//家居指南
$infoDAO = new InfoDAO($db);
$furnitureStoreDAO = new FurnitureStoreDAO($db);//家居卖场
$redian_infoList = null;//卖场热点
$furnitureStoreList_sort = null;//家居卖场排名列表
$info = null;
$preNextPageList = null;

//卖场热点
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=703)  and infoState=1  ';
$redian_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,8');

$furnitureStoreList_sort = $furnitureStoreDAO->getFurnitureStoreList('*',' where state=1 ',' order by orderNum desc ','limit 0,10');

$id = $_REQUEST['id'];
$info = $infoDAO->getInfoByIdForPage($id);//信息详细，含一个类别
$infoTypeCode = $_REQUEST['infoTypeCode'];
$infoTypeSql = '';
$infoTypeStr = '';
$infoTypeArr = explode('-', $infoTypeCode);
for($i=0;$i<count($infoTypeArr);$i++)
{
		$infoTypeArr1 = explode('|', $infoTypeArr[$i]);
		if($i!=count($infoTypeArr)-1)
		{
				$infoTypeSql .= " ecms_info_type.infotypeSubId=".$infoTypeArr1[1]." or ";
				$infoTypeStr .= $cfg['arr_info']['infoType'][$infoTypeArr1[0]]['subType'][$infoTypeArr1[1]]."/";//类别名称
		}	
		else 
		{
				$infoTypeSql .= " ecms_info_type.infotypeSubId=".$infoTypeArr1[1]." ";
				$infoTypeStr .= $cfg['arr_info']['infoType'][$infoTypeArr1[0]]['subType'][$infoTypeArr1[1]];//类别名称
		}
}

	
$preNextPageList = $infoDAO->getInfoPrevNextPage($id, 'ecms_info,ecms_info_type','ecms_info.infoId=ecms_info_type.infoId and ('.$infoTypeSql
	.')  and infoState=1 ', ' order by infoLayer desc,infoUpdateTime desc ','distinct ecms_info.infoId,infoTitle');//上一条，下一条列表

$infoDAO->clickInfoById($id);//点击记数

$smarty->assign('info',$info);
$smarty->assign('infoTypeCode',$infoTypeCode);
$smarty->assign('infoTypeStr',$infoTypeStr);
$smarty->assign('preNextPageList',$preNextPageList);//上一条，下一条列表
$smarty->assign('furnitureStoreList_sort',$furnitureStoreList_sort);
$smarty->assign('redian_infoList',$redian_infoList);
$html->show();
$smarty->display($tpl_name);
//相信未来，热爱生命
//坚持下去不是因为我很坚强，而是因为我别无选择
?>