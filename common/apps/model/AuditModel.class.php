<?php
/**
 * 什么参数模型类
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-07-15
 */
class AuditModel{
	public $search='';//查询关键字
	public $begin=0;//查询起始位置
	public $step=20;//查询跨度
	public $p='';//省
	public $c='';//市
	public $d='';//区
	public $a='';//片区
	public $isHouseType='';//小区、新盘是否为住宅
	public $isBusinessType='';//小区、新盘是否为商铺
	public $isOfficeType='';//小区、新盘是否为写字楼
	public $isVillaType='';//小区、新盘是否为别墅
	public $openPriceStart='';
	public $openPriceEnd='';
	public $state='';
	public $uId='';
	public $bId='';
	public $ids='';
	public $areaIndex='';
	public $picTypeId='';
	public $picBuildFatherType='';
	public $picBuildType='';
	public $picSellRent='';
	public $isSellRent='';
	public function __construct(){
		
	}
}
?>