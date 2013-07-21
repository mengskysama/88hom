<?php
/**
 * @author Sam(semovy@gmail.com)
 * @since 2013-06-26
 * 信息
 */
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();//登陆是否期
$permissionsState=sysPermissionsChecking('info');//是否有对信息管理的权限
if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');

$action=empty($_REQUEST['action'])?'list':$_REQUEST['action'];

$tpl = null;
$info = null;
$infoList = null;
$infoTypeList = null;
$infoDAO = new InfoDAO($db);
$infoTypeDAO = new InfoTypeDAO($db);
//$infoService = new InfoService($db);

if($action == 'add'){//初始化插入
	$timestamp=time();
	$token=md5('unique_salt' . $timestamp);

	$smarty->assign('timestamp',$timestamp);
	$smarty->assign('token',$token);
	
	$infoSummary=createCKeditor('infoSummary',0,700,80,'');//信息摘要
	$infoContent=createCKeditor('infoContent',1,700,400,'');//信息内容
	$smarty->assign('infoSummary',$infoSummary);
	$smarty->assign('infoContent',$infoContent);
	$tpl = $tpl_dir.'info_add.tpl';
}
elseif ($action == 'update'){//初始化更新
	$timestamp=time();
	$token=md5('unique_salt' . $timestamp);

	$smarty->assign('timestamp',$timestamp);
	$smarty->assign('token',$token);
	
	$info = $infoDAO->getInfoById($_REQUEST['id']);
	$infoSummary=createCKeditor('infoSummary',0,700,80,$info['infoSummary']);
	$infoContent=createCKeditor('infoContent',1,700,400,$info['infoContent']);
	$infoTypeList = $infoTypeDAO->getInfoTypeListByInfoId($_REQUEST['id']);
	$smarty->assign('info',$info);
	$smarty->assign('infoTypeList',$infoTypeList);
	$smarty->assign('infoSummary',$infoSummary);
	$smarty->assign('infoContent',$infoContent);
	$tpl = $tpl_dir.'info_update.tpl';
}
elseif ($action == 'doAdd'){//提交插入
	$_REQUEST['infoUserId'] = $_SESSION['Admin_User']['userId'];
	$infoDAO->release($_REQUEST);//插入新闻
	$infoId = mysql_insert_id();

	for($i=0;$i<count($_REQUEST['infoType']);$i++)
	{
		$type = explode('-', $_REQUEST['infoType'][$i]);
		$infoTypeDAO->release(//插入一条或多条新闻类别
			array(
				'infoId'=>$infoId,
				'infotypeId'=>$type[0],
				'infotypeSubId'=>$type[1]
			)
		);
	}
	toList();	
}
elseif ($action == 'doUpdate'){//提交更新
	$_REQUEST['infoUserId'] = $_SESSION['Admin_User']['userId'];
	
	$info = $infoDAO->getInfoById($_REQUEST['infoId']);//修改前
	if($info['infoPicThumb'] != $_REQUEST['infoPicThumb']){//如果外观图改变，则删除旧图
		if($info['infoPic']!='' && file_exists(ECMS_PATH_UPLOADS.$info['infoPic']))
			unlink(ECMS_PATH_UPLOADS.$info['infoPic']);//删除大图文件
		if($info['infoPicThumb']!='' && file_exists(ECMS_PATH_UPLOADS.$info['infoPicThumb']))
			unlink(ECMS_PATH_UPLOADS.$info['infoPicThumb']);//删除缩略图文件
	}
	$infoDAO->modify($_REQUEST);//修改新闻
	
	$infoTypeDAO->delInfoTypeByInfoId($_REQUEST['infoId']);//删除旧的类别
	for($i=0;$i<count($_REQUEST['infoType']);$i++)//插入新的类别
	{
		$type = explode('-', $_REQUEST['infoType'][$i]);
		$infoTypeDAO->release(//插入一条或多条新闻类别
			array(
				'infoId'=>$_REQUEST['infoId'],
				'infotypeId'=>$type[0],
				'infotypeSubId'=>$type[1]
			)
		);
	}
	
	$info = $infoDAO->getInfoById($_REQUEST['infoId']);//修改后转到详细
	$infoTypeList = $infoTypeDAO->getInfoTypeListByInfoId($_REQUEST['infoId']);

	$smarty->assign('infoTypeList',$infoTypeList);
	$smarty->assign('info',$info);
	$tpl = $tpl_dir.'info_detail.tpl';
}
elseif ($action == 'delete'){//执行删除
	$info = $infoDAO->getInfoById($_REQUEST['id']);
	if($info['infoPic']!='' && file_exists(ECMS_PATH_UPLOADS.$info['infoPic']))
		unlink(ECMS_PATH_UPLOADS.$info['infoPic']);//删除大图文件
	if($info['infoPicThumb']!='' && file_exists(ECMS_PATH_UPLOADS.$info['infoPicThumb']))
		unlink(ECMS_PATH_UPLOADS.$info['infoPicThumb']);//删除缩略图文件
	$infoDAO->delInfoById($_REQUEST['id']);
	$infoTypeDAO->delInfoTypeByInfoId($_REQUEST['id']);//删除对应的类别记录
	toList();
}
elseif ($action == 'detail'){//详细
	$info = $infoDAO->getInfoById($_REQUEST['id']);
	$infoTypeList = $infoTypeDAO->getInfoTypeListByInfoId($_REQUEST['id']);

	$smarty->assign('infoTypeList',$infoTypeList);
	$smarty->assign('info',$info);
	$tpl = $tpl_dir.'info_detail.tpl';
}
else{//管理列表
	toList();
}
$html->show();
$smarty->display($tpl);

function toList(){//列表
	global $action,$infoList,$infoDAO,$infoTypeDAO,$tpl,$smarty,$tpl_dir;
	
	$infoTitle = (!isset($_REQUEST['infoTitle'])||isset($_REQUEST['infoTitle'])&&empty($_REQUEST['infoTitle']))?'':$_REQUEST['infoTitle'];
	$infoType = (!isset($_REQUEST['infoType'])||isset($_REQUEST['infoType'])&&empty($_REQUEST['infoType']))?'':$_REQUEST['infoType'];
	$infoSuggest = (!isset($_REQUEST['infoSuggest'])||isset($_REQUEST['infoSuggest'])&&empty($_REQUEST['infoSuggest']))?'':$_REQUEST['infoSuggest'];
	
	if($action == 'doAdd' || $action == 'doUpdate')//不过虑
	{
		$infoTitle = '';
		$infoType = '';
		$infoSuggest = '';
	}
	
	$where = '';
	$pageStr = '';
	
	if($infoTitle != ''){
		$where .= " and infoTitle like '%".$infoTitle."%' ";
		$pageStr .= "&infoTitle=".$infoTitle;
	}
	else {
		$pageStr .= "&infoTitle=";
	}
	if($infoSuggest != ''){
		$where .= " and infoSuggest=1 ";
		$pageStr .= "&infoSuggest=1";
	}
	else {
		$pageStr .= "&infoSuggest=";
	}
	if($infoType != '')
	{
		$where .= " and (";
		$temp = '';
		if(!empty($_REQUEST['page'])){//翻页方式不同
			$infoTypeArr = explode('-', $_REQUEST['infoType']);
			for($i=0;$i<count($infoTypeArr);$i++)
				{
					if($i!=count($infoTypeArr)-1)
					{
						$where .= " ecms_info_type.infotypeSubId=".$infoTypeArr[$i]." or ";
						$temp .= $infoTypeArr[$i]."-";
					}	
					else 
					{
						$where .= " ecms_info_type.infotypeSubId=".$infoTypeArr[$i]." ";
						$temp .= $infoTypeArr[$i];
					}
				}
		}
		else{
			for($i=0;$i<count($_REQUEST['infoType']);$i++)
			{
				if($i!=count($_REQUEST['infoType'])-1)
				{
					$where .= " ecms_info_type.infotypeSubId=".$_REQUEST['infoType'][$i]." or ";
					$temp .= $_REQUEST['infoType'][$i]."-";
				}	
				else 
				{
					$where .= " ecms_info_type.infotypeSubId=".$_REQUEST['infoType'][$i]." ";
					$temp .= $_REQUEST['infoType'][$i];
				}
			}
		}
		
		$where .= " )";

		$pageStr .= "&infoType=".$temp;
		$infoType = $temp;//搜索的类别
	}
	else{
		$pageStr .= "&infoType=";
	}

	if($pageStr == '')
		$pageStr .= 'page';
	else 
		$pageStr .= '&page';
		
	$pageSize = 10;//每页10条
	$page = empty($_REQUEST['page'])?1:$_REQUEST['page'];
	$limit = ' limit '.(($page-1)*$pageSize).','.$pageSize;

	$where = ' ,ecms_info_type,ecms_user where ecms_info.infoId=ecms_info_type.infoId and ecms_info.infoUserId=ecms_user.userId  '.$where;
	$infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoClickCount,infoSuggest,infoLayer,infoState,infoUpdateTime, userUsername,
				(select count(*) from ecms_info_reply r where r.infoId=ecms_info.infoId and inforeplyState=1) as passReplyCount ,
				(select count(*) from ecms_info_reply r where r.infoId=ecms_info.infoId and inforeplyState=0) as noPassReplyCount '
				,$where,' order by noPassReplyCount desc,infoLayer desc,infoUpdateTime desc ',$limit);
	$temp = array();
	for($i=0;$i<count($infoList);$i++)//每条新闻对应的类别
	{
		$temp[$i] = array(
			'info'=>$infoList[$i],
			'infoType'=>$infoTypeDAO->getInfoTypeListByInfoId($infoList[$i]['infoId'])
		);
	}
	
	$totalNum = $infoDAO->countInfo($where);
	$pageHtml = $totalNum[0]>0?sysAdminPageInfo($totalNum[0],$pageSize,$page,'info_manager.php?'.$pageStr,''):'';//分页html

	$smarty->assign('infoList',$temp);
	$smarty->assign('infoTitle',$infoTitle);
	$smarty->assign('infoType',$infoType);
	$smarty->assign('infoSuggest',$infoSuggest);
	$smarty->assign('pageHtml',$pageHtml);
	$tpl = $tpl_dir.'info_list.tpl';
}
