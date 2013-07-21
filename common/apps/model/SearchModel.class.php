<?php
/**
 * 搜索参数模型类
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-07-13
 */
class SearchModel{
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
	public $openPriceStart='';//起始价格
	public $openPriceEnd='';//最终价格
	public $room='';//室
	public $hall='';//厅
	public $toilet='';//卫
	public $kitchen='';//厨房
	public $balcoy='';//阳台
	public $buildAreaStart='';//建筑面积开始
	public $buildAreaEnd='';//建筑面积结束
	public $useAreaStart='';//使用面积开始
	public $useAreaEnd='';//使用面积结束
	public $rentAreaStart='';//出租面积开始
	public $rentAreaEnd='';//出租面积结束
	public $type='';//房屋类型(例如住宅：普通住宅，高档住宅)
	public $forward='';//朝向
	public $fitment='';//装修程度
	public $baseService='';//基础设施
	public $floor='';//当前楼层
	public $floorStart='';//楼层起始
	public $floorEnd='';//楼层结束
	public $allFloor='';//总楼层
	public $buildYear='';//建筑年限
	public $buildYearStart='';//建筑年限起始
	public $buildYearEnd='';//建筑年限结束
	public $lookTime='';//看房时间
	public $payInfo='';//产权性质
	public $rentType='';//租赁方式
	public $rentRoomType='';//合租房间类型
	public $rentDetail='';//合租性别要求
	public $payMent='';//支付方式
	public $payDetailY='';//押多少
	public $payDetailF='';//付多少
	public $sellRentType='';//租售类型
	public $updateTimeStart='';//房源更新时间开始
	public $updateTimeEnd='';//房源更新时间结束
	public $rentPriceUnit='';//租金单位
	public $division='';//是否可分割
	public $includeFee='';//是否包含物业管理费
	public $propFee='';//物业管理费
	public $level='';//写字楼等级
	public $cellar='';//是否有地下室
	public $garden='';//是否有花园
	public $garage='';//是否有车库
	public $officeAreaStart='';//办公面积开始
	public $officeAreaEnd='';//办公面积结束
	public $workshopAreaStart='';//车间面积开始
	public $workshopAreaEnd='';//车间面积结束
	public $orderPrice='';//价格排序
	public $orderArea='';//面积排序
	public $st='';//查询过滤条件（1=>'全部房源',1=>'急售房源',3=>'网营推荐',4=>'个人房源'）
	
	public function __construct(){
		
	}
}
?>