<?php
/**
 * 测试我的选房单2我浏览过的房源
 * @author Max(maxyellow@vip.qq.com)
 * @since 2013-07-16
 */
require 'path.inc.php';
//用户ID
$userId=40;
//记录类型，1我的选房单2我浏览过的房源。 
$mType=1;
//房屋类型，1是1手，2是2手。
$hand=1;
//房源类型，1住宅，2商铺，3写字楼，4别墅,5厂房
$houseType=1;
//创建时间
$currentTime=time();

$arr=array("userId"=>$userId,"mType"=>$mType,"hand"=>$hand,"houseType"=>$houseType,"create_time"=>$currentTime);
$userCriteria=new UserCriteriaDAO($db);
$msg=$userCriteria->releaseMemory($arr);
echo $msg;
?>