<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'index.tpl';

$infoDAO = new InfoDAO($db);
$taotiao_infoList = null;//今日头条
$jujiao_infoList = null;//焦点，聚焦，公告，活动..
$bendi_infoList = null;//本地要闻
$gounei_infoList = null;//国内要闻
$zhuzaijiaoyiqingbao_infoList = null;//住宅交易情报
$tudijiaoyiqingbao_infoList = null;//土地交易情报
$loushikuaidi_infoList = null;//楼市快递
$redianzhuanti_infoList = null;//热点专题
$wangyingdiaocha_infoList = null;//网营调查
$zhuzaijiaoyifenxi_infoList = null;//住宅交易分析
$zhengcejiedu_infoList = null;//政策解读
$shichang_infoList = null;//市场
$zhengce_infoList = null;//政策

$fangqijianche_infoList = null;//房企监测
$tudijiaoyifenxi_infoList = null;//土地交易分析
$yueneishengyin_infoList = null;//业内声音

$gongsi_infoList = null;//公司
$tudi_infoList = null;//土地
$jinrong_infoList = null;//金融

$dahuadichan_infoList = null;//大话地产
$gaoduanfangtan_infoList = null;//高端访谈

$shangyuedichanzhuanti_infoList = null;//商业地产专题
$xianmu_infoList = null;//项目
$ershoufangdongtai_infoList = null;//二手房动态
$zhangxiubang_infoList = null;//装修帮
$xueziluoshangpu_infoList = null;//写字楼 商铺
$bieshu_infoList = null;//别墅
$ershoufang_infoList = null;//二手房
$zhangxiu_infoList = null;//装修
$zixunpaihang_infoList = null;//资讯排行榜

//今日头条
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=100) and infoState=1 ';
$taotiao_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,15');

//焦点，聚焦，公告，活动..
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeId=9) and infoState=1 ';
$jujiao_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infotypeId,infotypeSubId',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,3');

//本地要闻
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=200) and infoState=1 ';
$bendi_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infotypeId,infotypeSubId',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,12');

//国内要闻
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=201) and infoState=1 ';
$gounei_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infotypeId,infotypeSubId',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,12');


//住宅交易情报
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=400) and infoState=1 ';
$zhuzaijiaoyiqingbao_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,7');

//土地交易情报
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=401) and infoState=1 ';
$tudijiaoyiqingbao_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,7');

//楼市快递
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=402) and infoState=1 ';
$loushikuaidi_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,4');

//热点专题
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=600) and infoState=1 ';
$redianzhuanti_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,6');

//网营调查
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=407) and infoState=1 ';
$wangyingdiaocha_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,7');

//住宅交易分析
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=403) and infoState=1 ';
$zhuzaijiaoyifenxi_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,6');

//政策解读
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=300) and infoState=1 ';
$zhengcejiedu_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,3');

//市场
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=404) and infoState=1 ';
$shichang_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,8');

//政策
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=301) and infoState=1 ';
$zhengce_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,5');

//房企监测
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=500) and infoState=1 ';
$fangqijianche_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,3');

//土地交易分析
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=405) and infoState=1 ';
$tudijiaoyifenxi_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,3');

//业内声音
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=502) and infoState=1 ';
$yueneishengyin_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,3');

//公司
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=501) and infoState=1 ';
$gongsi_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,5');
//土地
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=406) and infoState=1 ';
$tudi_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,5');
//金融
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=503) and infoState=1 ';
$jinrong_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,5');

//大话地产
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=601) and infoState=1 ';
$dahuadichan_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,5');

//高端访谈
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=504) and infoState=1 ';
$gaoduanfangtan_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,5');

//商业地产专题
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=602) and infoState=1 ';
$shangyuedichanzhuanti_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,3');

//项目
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=204) and infoState=1 ';
$xianmu_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,6');

//二手房动态
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=206) and infoState=1 ';
$ershoufangdongtai_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,4');

//装修帮
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=700) and infoState=1 ';
$zhangxiubang_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle,infoSummary,infoPicThumb',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,4');

//写字楼 商铺
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=203) and infoState=1 ';
$xueziluoshangpu_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,6');

//别墅
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=501) and infoState=1 ';
$bieshu_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,7');

//二手房
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=207) and infoState=1 ';
$ershoufang_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,7');

//装修
$where = ' ,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and (ecms_info_type.infotypeSubId=701) and infoState=1 ';
$zhangxiu_infoList = $infoDAO->getInfoList('distinct ecms_info.infoId,infoTitle',$where,' order by infoLayer desc,infoUpdateTime desc ','limit 0,7');

//资讯排行榜
$where = '  where infoState=1 ';
$zixunpaihang_infoList = $infoDAO->getInfoList('ecms_info.infoId,infoTitle',$where,' order by infoClickCount desc,infoLayer desc,infoUpdateTime desc ','limit 0,7');


$smarty->assign('taotiao_infoList',$taotiao_infoList);//今日头条
$smarty->assign('jujiao_infoList',$jujiao_infoList);//焦点，聚焦，公告，活动..
$smarty->assign('bendi_infoList',$bendi_infoList);//本地要闻
$smarty->assign('gounei_infoList',$gounei_infoList);//国内要闻
$smarty->assign('zhuzaijiaoyiqingbao_infoList',$zhuzaijiaoyiqingbao_infoList);//住宅交易情报
$smarty->assign('tudijiaoyiqingbao_infoList',$tudijiaoyiqingbao_infoList);//土地交易情报
$smarty->assign('loushikuaidi_infoList',$loushikuaidi_infoList);//楼市快递
$smarty->assign('redianzhuanti_infoList',$redianzhuanti_infoList);//热点专题
$smarty->assign('wangyingdiaocha_infoList',$wangyingdiaocha_infoList);//网营调查
$smarty->assign('zhuzaijiaoyifenxi_infoList',$zhuzaijiaoyifenxi_infoList);//住宅交易分析
$smarty->assign('zhengcejiedu_infoList',$zhengcejiedu_infoList);//政策解读
$smarty->assign('shichang_infoList',$shichang_infoList);//市场
$smarty->assign('zhengce_infoList',$zhengce_infoList);//政策
$smarty->assign('fangqijianche_infoList',$fangqijianche_infoList);//房企监测
$smarty->assign('tudijiaoyifenxi_infoList',$tudijiaoyifenxi_infoList);//土地交易分析
$smarty->assign('yueneishengyin_infoList',$yueneishengyin_infoList);//业内声音
$smarty->assign('gongsi_infoList',$gongsi_infoList);//公司
$smarty->assign('tudi_infoList',$tudi_infoList);//土地
$smarty->assign('jinrong_infoList',$jinrong_infoList);//金融

$smarty->assign('dahuadichan_infoList',$dahuadichan_infoList);//大话地产
$smarty->assign('gaoduanfangtan_infoList',$gaoduanfangtan_infoList);//高端访谈

$smarty->assign('shangyuedichanzhuanti_infoList',$shangyuedichanzhuanti_infoList);//商业地产专题
$smarty->assign('xianmu_infoList',$xianmu_infoList);//项目
$smarty->assign('ershoufangdongtai_infoList',$ershoufangdongtai_infoList); //二手房动态
$smarty->assign('zhangxiubang_infoList',$zhangxiubang_infoList);//装修帮
$smarty->assign('xueziluoshangpu_infoList',$xueziluoshangpu_infoList); //写字楼 商铺
$smarty->assign('bieshu_infoList',$bieshu_infoList);//别墅
$smarty->assign('ershoufang_infoList',$ershoufang_infoList); //二手房
$smarty->assign('zhangxiu_infoList',$zhangxiu_infoList); //装修
$smarty->assign('zixunpaihang_infoList',$zixunpaihang_infoList); //资讯排行榜
$html->show();
$smarty->display($tpl_name);

?>