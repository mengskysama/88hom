<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'info.tpl';
//家居指南
$infoDAO = new InfoDAO($db);
$furnitureStoreDAO = new FurnitureStoreDAO($db);//家居卖场
$redian_infoList = null;//卖场热点
$furnitureStoreList_sort = null;//家居卖场排名列表
$infoList = null;//信息列表

//卖场资讯
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=710)   and ecms_info.infoState=1  ';
$maichang_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,13');

//卖场热点
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=703)  and ecms_info.infoState=1  ';
$redian_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,8');

$furnitureStoreList_sort = $furnitureStoreDAO->getFurnitureStoreList('*','where state=1',' order by orderNum desc ','limit 0,10');

$pageStr = '';

$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId  and ecms_info.infoState=1 ';	
$infoType = (!isset($_REQUEST['infoType'])||isset($_REQUEST['infoType'])&&empty($_REQUEST['infoType']))?'':$_REQUEST['infoType'];	//类别
$infoTypeCode = $infoType;
if($infoType != '')
{
		$where .= " and (";
		$infoTypePage = '';
		$infoTypeStr = '';
		$infoTypeArr = explode('-', $_REQUEST['infoType']);
			for($i=0;$i<count($infoTypeArr);$i++)
				{
					$infoTypeArr1 = explode('|', $infoTypeArr[$i]);
					if($i!=count($infoTypeArr)-1)
					{
						$where .= " ecms_info_type.infotypeSubId=".$infoTypeArr1[1]." or ";
						$infoTypePage .= $infoTypeArr1[0]."|".$infoTypeArr1[1]."-";//类别下标
						$infoTypeStr .= $cfg['arr_info']['infoType'][$infoTypeArr1[0]]['subType'][$infoTypeArr1[1]]."/";//类别名称
					}	
					else 
					{
						$where .= " ecms_info_type.infotypeSubId=".$infoTypeArr1[1]." ";
						$infoTypePage .= $infoTypeArr1[0]."|".$infoTypeArr1[1];//类别下标
						$infoTypeStr .= $cfg['arr_info']['infoType'][$infoTypeArr1[0]]['subType'][$infoTypeArr1[1]];//类别名称
					}
				}

		$where .= " )";

		$pageStr .= "&infoType=".$infoTypePage;//翻页时类别id
		$infoType = $infoTypeStr;//页面上显示的类别名称
}
	
if($pageStr == '')
	$pageStr .= 'page';
else 
	$pageStr .= '&page';
	

$pageSize = 20;//每页15条
$page = empty($_REQUEST['page'])?1:$_REQUEST['page'];
$limit = ' limit '.(($page-1)*$pageSize).','.$pageSize;
	
$infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoUpdateTime',$where,' order by infoLayer desc,infoUpdateTime desc ',$limit);//信息列表
	
$totalNum = $infoDAO->countInfo($where);
$pageHtml = $totalNum[0]>0?sysAdminPageInfo($totalNum[0],$pageSize,$page,'info.php?'.$pageStr,''):'';//分页html

$smarty->assign('infoType',$infoType);
$smarty->assign('infoTypeCode',$infoTypeCode);
$smarty->assign('infoList',$infoList);
$smarty->assign('pageHtml',$pageHtml);
$smarty->assign('furnitureStoreList_sort',$furnitureStoreList_sort);
$smarty->assign('redian_infoList',$redian_infoList);
$html->show();
$smarty->display($tpl_name);

?>