<?php 
require_once 'path.inc.php';
$tpl_name = $tpl_dir.'houseSellSearch.tpl';
$html->title=$cfg['web_keywords_str'].$webset['siteName'];//վ标题
$html->keyword=$webset['keywords'];					//关键字
$html->description=$webset['description'];			//描述简介

$html->addCss('web/public.css');
$html->addCss('web/esf.css');

$area=new Area();//省市级联对照类表

if(isset($_REQUEST['search'])&&!empty($_REQUEST['search'])){//关键字
	$search=$_REQUEST['search'];
}else{
	$search='';
}
if(isset($_REQUEST['page'])&&!empty($_REQUEST['page'])){//页码
	$page=$_REQUEST['page'];
}else{
	$page=1;
}
if(isset($_REQUEST['pt'])&&!empty($_REQUEST['pt'])){//价格区间号
	$pt=$_REQUEST['pt'];
}else{
	$pt='';
}
if(isset($_REQUEST['price'])&&!empty($_REQUEST['price'])){//价格
	$price=$_REQUEST['price'];
}else{
	$price='';
}
if(isset($_REQUEST['t'])&&!empty($_REQUEST['t'])){//1：住宅      2：商铺      3：写字楼        4：别墅         5：厂房        默认1住宅
	$t=$_REQUEST['t'];
}else{
	$t=1;
}
if(isset($_REQUEST['p'])){//省编号
	$p=$_REQUEST['p'];
}else{
	$p='';
}
if(isset($_REQUEST['c'])){//市编号
	$c=$_REQUEST['c'];
}else{
	$c='';
}
if(isset($_REQUEST['d'])){//区域编号
	$d=$_REQUEST['d'];
}else{
	$d='';
}
if(isset($_REQUEST['a'])){//商圈编号
	$a=$_REQUEST['a'];
}else{
	$a='';
}
if(isset($_REQUEST['bt'])){//房源类型（普通住宅/高档住宅）
	$bt=$_REQUEST['bt'];
}else{
	$bt='';
}
if(isset($_REQUEST['rt'])){//居室数区间号
	$rt=$_REQUEST['rt'];
}else{
	$rt='';
}
if(isset($_REQUEST['room'])){//居室数
	$room=$_REQUEST['room'];
}else{
	$room='';
}
if(isset($_REQUEST['at'])){//面积区间号
	$at=$_REQUEST['at'];
}else{
	$at='';
}
if(isset($_REQUEST['st'])){//查询过滤条件（1=>'全部房源',1=>'急售房源',3=>'网营推荐',4=>'个人房源'）
	$st=$_REQUEST['st'];
}else{
	$st=1;
}
if(isset($_REQUEST['bArea'])){//面积数
	$bArea=$_REQUEST['bArea'];
}else{
	$bArea='';
}
if(isset($_REQUEST['bYear'])){//房龄区间
	$bYear=$_REQUEST['bYear'];
}else{
	$bYear='';
}
if(isset($_REQUEST['floor'])){//楼层区间
	$floor=$_REQUEST['floor'];
}else{
	$floor='floor';
}
if(isset($_REQUEST['fitment'])){//装修
	$fitment=$_REQUEST['fitment'];
}else{
	$fitment='fitment';
}
if(isset($_REQUEST['forward'])){//朝向
	$forward=$_REQUEST['forward'];
}else{
	$forward='';
}
if(isset($_REQUEST['fitment'])){//装修
	$fitment=$_REQUEST['fitment'];
}else{
	$fitment='fitment';
}
if(isset($_REQUEST['orderPrice'])){//装修
	$orderPrice=$_REQUEST['orderPrice'];
}else{
	$orderPrice='';
}
if(isset($_REQUEST['orderArea'])){//装修
	$orderArea=$_REQUEST['orderArea'];
}else{
	$orderArea='';
}
$srh='';//base64解码后的内容
$arr_words=null;
$str_words=null;
$IsHighlight=true;//判断是否启用高亮
$sphinx=new SphinxClient();
$sphinx->SetServer(SPHINX_SERVER_HOST,SPHINX_SERVER_PORT);
$sphinx->SetConnectTimeout(SPHINX_CONNECTTIMEOUT);//设置连接超时时间
$sphinx->SetMaxQueryTime(SPHINX_MAXQUERYTIME);//设置最大查询时间
if(!empty($search)){
	$search=str_replace(' ', '+', $search);
	$srh=$search;
	$search=base64_decode($search);
	$arr_words=$sphinx->BuildKeywords($search, 'index_ecms_house_main' , false);//获取搜索关键字分词
	if($arr_words==false){
		$IsHighlight=false;
	}else{
		for($i=0;$i<count($arr_words);$i++){
			$str_words=$str_words.$arr_words[$i]['tokenized']."_";
		}
	}
}else{
	$IsHighlight=false;
}

$title_opts = array(
	"before_match"		=> "<span class='link14' style='color: red;'>",
	"after_match"		=> "</span>",
	"chunk_separator"	=> " ... ",
	"limit"				=> 50,
	"around"			=> 5,
	"exact_phrase"		=> false,
	"allow_empty"		=> true
);
$content_opts = array(
	"before_match"		=> "<span style='color: red;'>",
	"after_match"		=> "</span>",
	"chunk_separator"	=> " ... ",
	"limit"				=> 50,
	"around"			=> 5,
	"exact_phrase"		=> false,
	"allow_empty"		=> true,
	"html_strip_mode"	=> "strip",
	"single_passage"    => true
);

$sphinxSearch=new SphinxSearch($db);
$searchModel=new SearchModel();
$searchModel->search=$search;
$searchModel->step=10;
$searchModel->begin=($page-1)*$searchModel->step;
$searchModel->type=$bt;//房源类型（普通住宅/高档住宅）
$searchModel->orderPrice=$orderPrice;
$searchModel->orderArea=$orderArea;
$searchModel->st=$st;

$searchModel->p=$p===''?4:$p;//省
if(isset($area->P[$searchModel->p])&&$area->P[$searchModel->p]=='不限'){
	$searchModel->p=4;
}else if(!isset($area->P[$searchModel->p])){
	$searchModel->p=4;
}
$searchModel->c=$c===''?8:$c;//市
if(isset($area->C[$searchModel->p][$searchModel->c])&&$area->C[$searchModel->p][$searchModel->c]=='不限'){
	$searchModel->c=8;
}else if(!isset($area->C[$searchModel->p][$searchModel->c])){
	$searchModel->c=8;
}
$searchModel->d=$d;//区
if(isset($area->D[$searchModel->p][$searchModel->c][$searchModel->d])&&$area->D[$searchModel->p][$searchModel->c][$searchModel->d]=='不限'){
	$searchModel->d='';
}else if(!isset($area->D[$searchModel->p][$searchModel->c][$searchModel->d])){
	$searchModel->d='';
}
$searchModel->a=$a;//商圈
if(isset($area->A[$searchModel->p][$searchModel->c][$searchModel->d][$searchModel->a])&&$area->A[$searchModel->p][$searchModel->c][$searchModel->d][$searchModel->a]=='不限'){
	$searchModel->a='';
}else if(!isset($area->C[$searchModel->p][$searchModel->c])){
	$searchModel->a='';
}
$fileName='';
$infoList=null;
$infoCount=null;
$searchBuildType=null;
$searchPrice=null;
$ptList=null;
$rtList=null;
$atList=null;
$forwardList=null;
$bYearList=null;
$floorList=null;
$fitmentList=null;
$stList=null;
if($t==1){
	$tpl_name = $tpl_dir.'houseSellSearch.tpl';
	$houseType=$cfg['arr_build']['2handHouseType'];
	$forwardList=$cfg['arr_build']['2handHouseForward'];
	$fitmentList=$cfg['arr_build']['2handHouseFitment'];
	$searchPrice=array(''=>'价格范围',1=>'100万以下',2=>'100万－150万',3=>'150万－200万',4=>'200万－300万',5=>'300万－500万',6=>'500万－1000万',7=>'1000万以上');
	$ptList=array(''=>'不限',1=>'100万以下',2=>'100万－150万',3=>'150万－200万',4=>'200万－300万',5=>'300万－500万',6=>'500万－1000万',7=>'1000万以上');
	$rtList=array(''=>'不限',1=>'一居',2=>'二居',3=>'三居',4=>'四居',5=>'五居',6=>'五居以上');
	$atList=array(''=>'不限',1=>'50平米以下',2=>'50-70平米',3=>'70-90平米',4=>'90-110平米',5=>'110-130平米',6=>'130-150平米',7=>'150-200平米',8=>'200-300平米',9=>'300平米以上');
	$bYearList=array(1=>'2年以下',2=>'2-5年',3=>'5-10年',4=>'10年以上');
	$floorList=array(1=>'地下',2=>'1层',3=>'6层以下',4=>'6-12层',5=>'12层以上');
	$stList=array(1=>'全部房源',2=>'急售房源',3=>'网营推荐',4=>'个人房源');
	if($pt!=''){
		if($pt==1){
			$searchModel->openPriceStart=0;
			$searchModel->openPriceEnd=100;
		}else if($pt==2){
			$searchModel->openPriceStart=100;
			$searchModel->openPriceEnd=150;
		}else if($pt==3){
			$searchModel->openPriceStart=150;
			$searchModel->openPriceEnd=200;
		}else if($pt==4){
			$searchModel->openPriceStart=200;
			$searchModel->openPriceEnd=300;
		}else if($pt==5){
			$searchModel->openPriceStart=300;
			$searchModel->openPriceEnd=500;
		}else if($pt==6){
			$searchModel->openPriceStart=500;
			$searchModel->openPriceEnd=1000;
		}else if($pt==7){
			$searchModel->openPriceStart=1000;
			$searchModel->openPriceEnd='';
		}
	}else if($price!=''){
		if($price>0&&$price<=100){
			$searchModel->openPriceStart=0;
			$searchModel->openPriceEnd=100;
			$pt=1;
		}else if($price>100&&$price<=150){
			$searchModel->openPriceStart=100;
			$searchModel->openPriceEnd=150;
			$pt=2;
		}else if($price>150&&$price<=200){
			$searchModel->openPriceStart=150;
			$searchModel->openPriceEnd=200;
			$pt=3;
		}else if($price>200&&$price<=300){
			$searchModel->openPriceStart=200;
			$searchModel->openPriceEnd=300;
			$pt=4;
		}else if($price>300&&$price<=500){
			$searchModel->openPriceStart=300;
			$searchModel->openPriceEnd=500;
			$pt=5;
		}else if($price>500&&$price<=1000){
			$searchModel->openPriceStart=500;
			$searchModel->openPriceEnd=1000;
			$pt=6;
		}else if($price>1000){
			$searchModel->openPriceStart=1000;
			$searchModel->openPriceEnd='';
			$pt=7;
		}
	}
	if($rt!=''){
		if($rt==1){
			$searchModel->room=$rt;
		}else if($rt==2){
			$searchModel->room=$rt;
		}else if($rt==3){
			$searchModel->room=$rt;
		}else if($rt==4){
			$searchModel->room=$rt;
		}else if($rt==5){
			$searchModel->room=$rt;
		}else if($rt==6){
			$searchModel->room=$rt;
		}
	}else if($room!=''){
		if($room==1){
			$searchModel->room=$room;
		}else if($room==2){
			$searchModel->room=$room;
		}else if($room==3){
			$searchModel->room=$room;
		}else if($room==4){
			$searchModel->room=$room;
		}else if($room==5){
			$searchModel->room=$room;
		}else if($room>=6){
			$searchModel->room=6;
		}
	}
	if($at!=''){
		if($at==1){
			$searchModel->buildAreaStart=0;
			$searchModel->buildAreaEnd=50;
		}else if($at==2){
			$searchModel->buildAreaStart=50;
			$searchModel->buildAreaEnd=70;
		}else if($at==3){
			$searchModel->buildAreaStart=70;
			$searchModel->buildAreaEnd=90;
		}else if($at==4){
			$searchModel->buildAreaStart=90;
			$searchModel->buildAreaEnd=110;
		}else if($at==5){
			$searchModel->buildAreaStart=110;
			$searchModel->buildAreaEnd=130;
		}else if($at==6){
			$searchModel->buildAreaStart=130;
			$searchModel->buildAreaEnd=150;
		}else if($at==7){
			$searchModel->buildAreaStart=150;
			$searchModel->buildAreaEnd=200;
		}else if($at==8){
			$searchModel->buildAreaStart=200;
			$searchModel->buildAreaEnd=300;
		}else if($at==9){
			$searchModel->buildAreaStart=300;
			$searchModel->buildAreaEnd='';
		}
	}else if($bArea!=''){
		if($bArea>0&&$bArea<=50){
			$searchModel->buildAreaStart=0;
			$searchModel->buildAreaEnd=50;
			$at=1;
		}else if($bArea>50&&$bArea<=70){
			$searchModel->buildAreaStart=50;
			$searchModel->buildAreaEnd=70;
			$at=2;
		}else if($bArea>70&&$bArea<=90){
			$searchModel->buildAreaStart=70;
			$searchModel->buildAreaEnd=90;
			$at=3;
		}else if($bArea>90&&$bArea<=110){
			$searchModel->buildAreaStart=90;
			$searchModel->buildAreaEnd=110;
			$at=4;
		}else if($bArea>110&&$bArea<=130){
			$searchModel->buildAreaStart=110;
			$searchModel->buildAreaEnd=130;
			$at=5;
		}else if($bArea>130&&$bArea<=150){
			$searchModel->buildAreaStart=130;
			$searchModel->buildAreaEnd=150;
			$at=6;
		}else if($bArea>150&&$bArea<=200){
			$searchModel->buildAreaStart=150;
			$searchModel->buildAreaEnd=200;
			$at=7;
		}else if($bArea>200&&$bArea<=300){
			$searchModel->buildAreaStart=200;
			$searchModel->buildAreaEnd=300;
			$at=8;
		}else if($bArea>300){
			$searchModel->buildAreaStart=300;
			$searchModel->buildAreaEnd='';
			$at=9;
		}
	}
	if($forward!=''&&$forward>=1&&$forward<=10){
		$searchModel->forward=$forward;
	}
	if($bYear!=''){
		if($bYear==1){
			$searchModel->buildYearStart=date('Y')-2;
			$searchModel->buildYearEnd=date('Y');
		}else if($bYear==2){
			$searchModel->buildYearStart=date('Y')-5;
			$searchModel->buildYearEnd=date('Y')-2;
		}else if($bYear==3){
			$searchModel->buildYearStart=date('Y')-10;
			$searchModel->buildYearEnd=date('Y')-5;
		}else if($bYear==4){
			$searchModel->buildYearStart='';
			$searchModel->buildYearEnd=date('Y')-10;
		}
	}
	if($floor!=''){
		if($floor==1){
			$searchModel->floorStart='';
			$searchModel->floorEnd=0;
		}else if($floor==2){
			$searchModel->floorStart=0;
			$searchModel->floorEnd=1;
		}else if($floor==3){
			$searchModel->floorStart=1;
			$searchModel->floorEnd=6;
		}else if($floor==4){
			$searchModel->floorStart=6;
			$searchModel->floorEnd=12;
		}else if($floor==5){
			$searchModel->floorStart=12;
			$searchModel->floorEnd='';
		}
	}
	if($fitment!=''&&$fitment>=1&&$fitment<=5){
		$searchModel->fitment=$fitment;
	}
	
	$infoList=$sphinxSearch->getHouseSellListForSearch($searchModel);
	$infoCount=$sphinxSearch->getHouseSellCountForSearch($searchModel);
	if($IsHighlight==true&&$infoCount>0){
		$docs_title=null;
		$docs_content=null;
		for($i=0;$i<count($infoList);$i++){
			$docs_title[]=sysCnSubStr($infoList[$i]['houseTitle'], 50,'...','UTF-8');
			$docs_content[]=sysCnSubStr($infoList[$i]['communityAddress'], 50,'...','UTF-8');
		}
		$docs_title=$sphinx->BuildExcerpts($docs_title, 'index_ecms_house_main', $search,$title_opts);
		$docs_content=$sphinx->BuildExcerpts($docs_content, 'index_ecms_house_main', $search,$content_opts);
		for($i=0;$i<count($infoList);$i++){
			$infoList[$i]['houseTitleHL']=$docs_title[$i];
			$infoList[$i]['communityAddressHL']=$docs_content[$i];
		}
	}else{
		for($i=0;$i<count($infoList);$i++){
			$infoList[$i]['houseTitleHL']=sysCnSubStr($infoList[$i]['houseTitle'], 50,'...','UTF-8');
			$infoList[$i]['communityAddressHL']=sysCnSubStr($infoList[$i]['communityAddress'], 50,'...','UTF-8');
		}
	}
}else if($t==2){
	$tpl_name = $tpl_dir.'shopsSellSearch.tpl';
}else if($t==3){
	$tpl_name = $tpl_dir.'officeSellSearch.tpl';
}else if($t==4){
	$tpl_name = $tpl_dir.'villaSellSearch.tpl';
}else if($t==5){
	$tpl_name = $tpl_dir.'factorySellSearch.tpl';
}

$fileName='sellSearch.php?p='.$searchModel->p.'&c='.$searchModel->c.'&d='.$searchModel->d.'&a='.$searchModel->a.'&t='.$t.'&pt='.$pt.'&price='.$price.'&search='.$srh.'&page';

$divPage='';
if(!empty($infoCount)&&$infoCount>0){
	$divPage=sysAdminPageInfo($infoCount,$searchModel->step,$page,$fileName,'');
}else{
	$divPage='';
}

$searchAreaNav=null;
$searchAreaNav['']='区域';
$searchAreaNav_=$area->D[$searchModel->p][$searchModel->c];
if(!empty($searchAreaNav_)){
	foreach ($searchAreaNav_ as $key=>$val){
		$searchAreaNav[$key]=$val;
	}
}
$searchArea=null;
$searchArea['']='不限';
$searchArea_=$area->D[$searchModel->p][$searchModel->c];
if(!empty($searchArea_)){
	foreach ($searchArea_ as $key=>$val){
		$searchArea[$key]=$val;
	}
}

$searchBuildType=array(1=>'住宅',2=>'商铺',3=>'写字楼',4=>'别墅',5=>'厂房');

if($search==''){
	$search='搜索小区名、楼盘名、地址等';
}

$searchModel=(array)$searchModel;

$smarty->assign('infoList',$infoList);
$smarty->assign('infoCount',$infoCount);
$smarty->assign('searchModel',$searchModel);
$smarty->assign('searchArea',$searchArea);
$smarty->assign('searchAreaNav',$searchAreaNav);
$smarty->assign('searchBuildType',$searchBuildType);
$smarty->assign('searchPrice',$searchPrice);
$smarty->assign('search',$search);
$smarty->assign('houseType',$houseType);
$smarty->assign('forwardList',$forwardList);
$smarty->assign('fitmentList',$fitmentList);
$smarty->assign('ptList',$ptList);
$smarty->assign('rtList',$rtList);
$smarty->assign('atList',$atList);
$smarty->assign('bYearList',$bYearList);
$smarty->assign('floorList',$floorList);
$smarty->assign('stList',$stList);
$smarty->assign('t',$t);
$smarty->assign('pt',$pt);
$smarty->assign('at',$at);
$smarty->assign('st',$st);
$smarty->assign('bYear',$bYear);
$smarty->assign('floor',$floor);
$smarty->assign('orderPrice',$orderPrice);
$smarty->assign('orderArea',$orderArea);
$smarty->assign('divPage',$divPage);
$html->show();
$smarty->display($tpl_name);
?>