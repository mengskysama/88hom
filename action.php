<?php
require 'path.inc.php';
if(isset($_REQUEST['action'])&&!empty($_REQUEST['action'])){
	$action=$_REQUEST['action'];
}else{
	$action='';
}
if(isset($_REQUEST['search'])&&!empty($_REQUEST['search'])){
	$search=$_REQUEST['search'];
}else{
	$search='';
}

$sphinxSearch=new SphinxSearch($db);
switch ($action){
	case 'searchForCommunity':
		$result=null;
//		$result=array(
//			0=>array(
//				'id'=>231,
//				'weight'=>200585,
//				'attrs'=>array(
//					'communityid'=>231,
//					'communityname'=>'翠海花园（翠海花园一期、振业翠海花园）',
//					'communityaddress'=>'深圳市,福田区香蜜湖侨香路与农园路交汇'
//				)
//			),
//			1=>array(
//				'id'=>357,
//				'weight'=>200581,
//				'attrs'=>array(
//					'communityid'=>357,
//					'communityname'=>'东海花园（东海花园一期）',
//					'communityaddress'=>'深圳市福田区香林路与农轩路交汇处'
//				)
//			),
//			2=>array(
//				'id'=>384,
//				'weight'=>200581,
//				'attrs'=>array(
//					'communityid'=>384,
//					'communityname'=>'香榭里花园（香榭里花园一期）',
//					'communityaddress'=>'深圳市福田区农科中心农园路与春田路交汇西'
//				)
//			)
//		);
		
//		echo json_encode($result);
//		exit;
		//$searchInfo['search']=$search;
		$searchModel=new SearchModel();
		$searchModel->search=$search;
		$result=$sphinxSearch->getCommunityForAutoComplete($searchModel);
		echo json_encode($result);
	break;
}
?>