<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'info.tpl';
//资讯列表
$infoDAO = new InfoDAO($db);
$infoList = null;//信息列表

$pageStr = '';
$infoTypeStr = '';//类别名称
$infoMainTypeCode ='';
$infoMainTypeName = '';
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId  and ecms_info.infoState=1 ';
$type = (!isset($_REQUEST['type'])||isset($_REQUEST['type'])&&empty($_REQUEST['type']))?1:$_REQUEST['type'];	//类别方式，1以父类方式，2子类方式
$infoType = (!isset($_REQUEST['infoType'])||isset($_REQUEST['infoType'])&&empty($_REQUEST['infoType']))?'':$_REQUEST['infoType'];	//类别

if($type == 1)
{
	$where .= " and (ecms_info_type.infotypeId=".$infoType.")";
	$pageStr .= "&type=1&infoType=".$infoType;//翻页时类别id
	$infoTypeStr = $cfg['arr_info']['infoType'][$infoType]['caption'];//页面上显示的类别名称
}
else 
{
	if($infoType != '')
	{
			$where .= " and (";
			$infoTypePage = '';

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
	
			$pageStr .= "&type=2&infoType=".$infoTypePage;//翻页时类别id
			$temp = explode('|', $infoTypeArr[0]);
			$infoMainTypeCode =$temp[0];
			$infoMainTypeName = $cfg['arr_info']['infoType'][$temp[0]]['caption'];;
	}
}
	
if($pageStr == '')
	$pageStr .= 'page';
else 
	$pageStr .= '&page';
	

$pageSize = 24;//每页15条
$page = empty($_REQUEST['page'])?1:$_REQUEST['page'];
$limit = ' limit '.(($page-1)*$pageSize).','.$pageSize;
	
$infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoUpdateTime',$where,' order by infoLayer desc,infoUpdateTime desc ',$limit);//信息列表
	
$totalNum = $infoDAO->countInfo($where);
$pageHtml = $totalNum[0]>0?sysAdminPageInfo($totalNum[0],$pageSize,$page,'info.php?'.$pageStr,''):'';//分页html

//资讯排行榜
$where = '  where infoState=1 ';
$zixunpaihang_infoList = $infoDAO->getInfoList('ecms_info.infoId,infoTitle',$where,' order by infoClickCount desc,infoLayer desc,infoUpdateTime desc ','limit 0,8');

//热点专题
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=600) and infoState=1 ';
$redianzhuanti_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,4');

$smarty->assign('type',$type);
$smarty->assign('infoType',$infoType);
$smarty->assign('infoTypeStr',$infoTypeStr);
$smarty->assign('infoList',$infoList);
$smarty->assign('infoMainTypeName',$infoMainTypeName);
$smarty->assign('infoMainTypeCode',$infoMainTypeCode);
$smarty->assign('zixunpaihang_infoList',$zixunpaihang_infoList);//资讯排行榜
$smarty->assign('redianzhuanti_infoList',$redianzhuanti_infoList);//热点专题
$smarty->assign('pageHtml',$pageHtml);

$html->show();
$smarty->display($tpl_name);

?>