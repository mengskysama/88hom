<?php
require 'path.inc.php';
require ECMS_PATH_LIBS.'api/sphinxapi.php';

$limit_offset=(1-1)*SPHINX_LIMIT_LIMIT;
$limit_offset=0;

//$search=new Search($query);
$sphinx=new SphinxClient();
$sphinx->SetServer(SPHINX_SERVER_HOST,SPHINX_SERVER_PORT);
$sphinx->SetConnectTimeout(SPHINX_CONNECTTIMEOUT);//设置连接超时时间
$sphinx->SetMaxQueryTime(SPHINX_MAXQUERYTIME);//设置最大查询时间
//$sphinx->SetRetries(3,1000);//失败重试次数/间隔时间,分布式
$sphinx->SetArrayResult(SPHINX_ARRAYRESULT);//设置结果返回格式,true为普通数组，false为hash格式
$sphinx->SetLimits($limit_offset,SPHINX_LIMIT_LIMIT,SPHINX_LIMIT_MAX_MATCHES,SPHINX_LIMIT_CUTOFF);//通用搜索设置
$sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);//设置查询模式
//$sphinx->SetRankingMode(SPH_RANK_SPH04);//设置评分模式
//$sphinx->SetSortMode(SPH_SORT_EXTENDED,"@weight DESC,update_time DESC");
//$sphinx->SetFieldWeights(array('title'=>100));//设置字段权重
//$sphinx->SetFilter('state', array(1),false);//设置属性过滤
echo 'fuck';

echo $sphinx->IsConnectError();
if($sphinx->IsConnectError()===false){
	echo '连接失败';
}else{
	echo '连接成功';
}

//过滤属性
//$sphinx->SetFilter('info_delete_state', array(1),true);
//更新文档属性
//$sphinx->UpdateAttributes('index_cms_info', array('info_delete_state'), array(83=>array(1)));
//$status=$sphinx->FlushAttributes();
//echo $status;
//exit;
$wd='深圳市';
$arr_words=$sphinx->BuildKeywords($wd, 'index_ecms_community_main' , false);//获取搜索关键字分词
echo '<pre>';
print_r($arr_words);
echo '</pre>';
//echo $sphinx->GetLastError();
//echo $sphinx->GetLastWarning();
//exit;
$str_words='';
for($i=0;$i<count($arr_words);$i++){
	$str_words=$str_words.$arr_words[$i]['tokenized']."_";
}
//
echo $str_words.'<br/>';

$rs=$sphinx->Query($wd,'index_ecms_community_main');//只对字段title进行匹配查询

echo $sphinx->GetLastError();
echo $sphinx->GetLastWarning();

echo '<pre>';
print_r($rs);
echo '</pre>';
echo '<pre>';
print_r($sphinx);
echo '</pre>';

exit;
//$arr_id=$rs['matches'];
$search_total=$rs['total'];
$search_total_found=$rs['total_found'];
$search_time=$rs['time'];
//
//$pg_total=ceil($search_total/$cfg['sphinx']['limit']['limit']);
//echo 'pg_total='.$pg_total.'<br/>';
//<p id="page">
//<span>1</span> 
//<a href="javascript:void('0');">[2]</a> 
//<a href="javascript:void('0');" class="n">下一页</a> 
//</p>
//$div_page='';
//$pg_pre_step=5;
//$pg_next_step=4;
//
//if($pg_total>1){
//	if($pg==1){
//		$div_page.='<span>'.$pg.'</span> ';
//		if(($pg+$pg_next_step)>=$pg_total){
//			$pg_i=$pg_i+1;
//			for($pg_i;$pg_i<=$pg_total;$pg_i++){
//				$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_i.'">['.$pg_i.']</a> ';
//			}
//		}else{
//			$pg_i=$pg_i+1;
//			for($pg_i;$pg_i<=($pg+$pg_next_step);$pg_i++){
//				$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_i.'">['.$pg_i.']</a> ';
//			}
//		}
//		$pg_next=$pg+1;
//		$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_next.'" class="n">下一页</a>';
//	}else if($pg==$pg_total){
//		$pg_pre=$pg-1;
//		$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_pre.'" class="n">上一页</a> ';
//		if(($pg-$pg_pre_step)<=1){
//			$pg_i=1;
//			for($pg_i;$pg_i<$pg;$pg_i++){
//				$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_i.'">['.$pg_i.']</a> ';
//			}
//		}else{
//			$pg_i=$pg_i-$pg_pre_step;
//			for($pg_i;$pg_i<$pg;$pg_i++){
//				$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_i.'">['.$pg_i.']</a> ';
//			}
//		}
//		$div_page.='<span>'.$pg.'</span>';
//	}else{
//		$pg_pre=$pg-1;
//		$pg_next=$pg+1;
//		$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_pre.'" class="n">上一页</a> ';
//		if($pg-$pg_pre_step<=1){
//			$pg_i=1;
//			for($pg_i;$pg_i<$pg;$pg_i++){
//				$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_i.'">['.$pg_i.']</a> ';
//			}
//		}else{
//			$pg_i=$pg-$pg_pre_step;
//			for($pg_i;$pg_i<$pg;$pg_i++){
//				$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_i.'">['.$pg_i.']</a> ';
//			}
//		}
//		$div_page.='<span>'.$pg.'</span> ';
//		$pg_i=$pg;
//		if($pg+$pg_next_step>=$pg_total){
//			$pg_i=$pg+1;
//			for($pg_i;$pg_i<=$pg_total;$pg_i++){
//				$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_i.'">['.$pg_i.']</a> ';
//			}
//		}else{
//			$pg_i=$pg+1;
//			for($pg_i;$pg_i<=$pg+$pg_next_step;$pg_i++){
//				$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_i.'">['.$pg_i.']</a> ';
//			}
//		}
//		$div_page.='<a href="search.php?wd='.$wd.'&pg='.$pg_next.'" class="n">下一页</a>';
//	}
//}else{
//	$div_page='';
//}
//
//$str_id="'";
//if(count($arr_id)>0){
//	for($i=0;$i<count($arr_id);$i++){
//		if($i==(count($arr_id)-1)){
//			$str_id=$str_id.$arr_id[$i]['id']."'";
//		}else{
//			$str_id=$str_id.$arr_id[$i]['id']."','";
//		}
//	}	
//}else{
//	$str_id='';
//}

//$result=$search->getInfoListByIdStr($str_id);
//echo microtime().'<br/>';
//$result=$search->getInfoListByIdArr($arr_id);
//echo microtime().'<br/>';
//
$title_opts = array
(
	"before_match"		=> "<em>",
	"after_match"		=> "</em>",
	"chunk_separator"	=> " ... ",
	"limit"				=> 50,
	"around"			=> 3,
	"exact_phrase"		=> false,
	"allow_empty"		=> true
);
//
$content_opts = array
(
	"before_match"		=> "<em>",
	"after_match"		=> "</em>",
	"chunk_separator"	=> " ... ",
	"limit"				=> 200,
	"around"			=> 50,
	"exact_phrase"		=> false,
	"allow_empty"		=> true,
	"html_strip_mode"	=> "strip",
	//"force_all_words"   => true,
	"single_passage"    => true
);

$docs=$rs['matches'];
$docs_id=array();
$docs_title=array();
$docs_content=array();
for($i=0;$i<count($docs);$i++){
	$docs_id[]=$docs[$i]['attrs']['info_id'];
	$docs_title[]=$docs[$i]['attrs']['title'];
	$docs_content[]=$docs[$i]['attrs']['text_content'];
}
//
//$docs_id=array();
//$docs_title=array();
//$docs_content=array();
//
//for($i=0;$i<count($result);$i++){
//	$docs_id[$i]=$result[$i]['info_id'];
//	$docs_title[$i]=$result[$i]['info_title'];
//	$docs_content[$i]=$result[$i]['info_content'];
//}
//
if($str_words==""){
	
}else{
	$docs_title=$sphinx->BuildExcerpts($docs_title, 'index_info_main', $str_words,$title_opts);
	$docs_content=$sphinx->BuildExcerpts($docs_content, 'index_info_main', $str_words,$content_opts);
}
//
$search_result=array();
for($i=0;$i<count($docs);$i++){
	$search_result[$i]['id']=$docs_id[$i];
	$search_result[$i]['title']=$docs_title[$i];
	$search_result[$i]['content']=$docs_content[$i];
}


//$smarty->assign('url',$url);
//$smarty->assign('web_url',$web_url);
//
//$smarty->assign("wd",$wd);
//$smarty->assign("result",$search_result);
//$smarty->assign("total",$search_total);
//$smarty->assign("total_found",$search_total_found);
//$smarty->assign("time",$search_time);
//$smarty->assign("div_page",$div_page);

//$html->show();
//$smarty->display($tpl_name);
//spiderCount();
?>