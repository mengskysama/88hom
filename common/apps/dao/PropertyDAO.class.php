<?php
/**
 * 
 * 楼盘
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-09
 */
class PropertyDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布厂房
	public function release($property){
		$sql="insert into ecms_property(propertyName,propertyOpenTime,propertyCheckInTime,propertyCompanyType,propertyCompanyFee,propertyBuildingType,
										propertyFitmentStatus,propertyCompany,propertyCompanyAddress,propertyCompanyWebsite,propertySellAddress,propertyArea,
										propertyDevCompany,propertyDevCompanyWebsite,propertyPreSellPermits,propertyTraffic,propertyPeriInfo,propertyMapX,
										propertyMapY,propertyVolRate,propertyGreenRate,propertyBuildArea,propertyLandArea,propertyProxyCompany,
										propertyParkingSpaces,propertyHouseholds,propertyOpenPrice,propertyMainHouseModel,propertyRight,propertyHotline,
										propertyIntroduction,propertyClickCount,propertyType,propertyState,propertyCreateTime,propertyUpdateTime) values('"
										.empty($property['propertyName'])?'':$property['propertyName']
										."','".empty($property['propertyOpenTime'])?'':$property['propertyOpenTime']
										."','".empty($property['propertyCheckInTime'])?'':$property['propertyCheckInTime']
										."','".empty($property['propertyCompanyType'])?'':$property['propertyCompanyType']
										."',".empty($property['propertyCompanyFee'])?0:$property['propertyCompanyFee']
										.",'".empty($property['propertyBuildingType'])?'':$property['propertyBuildingType']
										."','".empty($property['propertyFitmentStatus'])?'':$property['propertyFitmentStatus']
										."','".empty($property['propertyCompany'])?'':$property['propertyCompany']
										."','".empty($property['propertyCompanyAddress'])?'':$property['propertyCompanyAddress']
										."','".empty($property['propertyCompanyWebsite'])?'':$property['propertyCompanyWebsite']
										."','".empty($property['propertySellAddress'])?'':$property['propertySellAddress']
										."','".empty($property['propertyArea'])?'':$property['propertyArea']
										."','".empty($property['propertyDevCompany'])?'':$property['propertyDevCompany']
										."','".empty($property['propertyDevCompanyWebsite'])?'':$property['propertyDevCompanyWebsite']
										."','".empty($property['propertyPreSellPermits'])?'':$property['propertyPreSellPermits']
										."','".empty($property['propertyTraffic'])?'':$property['propertyTraffic']
										.",'".empty($property['propertyPeriInfo'])?'':$property['propertyPeriInfo']
										."',".empty($property['propertyMapX'])?0:$property['propertyMapX']
										.",".empty($property['propertyMapY'])?0:$property['propertyMapY']
										.",".empty($property['propertyVolRate'])?0:$property['propertyVolRate']
										.",".empty($property['propertyGreenRate'])?0:$property['propertyGreenRate']
										.",".empty($property['propertyBuildArea'])?0:$property['propertyBuildArea']
										."','".empty($property['propertyLandArea'])?'':$property['propertyLandArea']
										."','".empty($property['propertyProxyCompany'])?'':$property['propertyProxyCompany']
										."',".empty($property['propertyParkingSpaces'])?0:$property['propertyParkingSpaces']
										.",".empty($property['propertyHouseholds'])?0:$property['propertyHouseholds']
										.",".empty($property['propertyOpenPrice'])?0:$property['propertyOpenPrice']
										.",'".empty($property['propertyMainHouseModel'])?'':$property['propertyMainHouseModel']
										.",".empty($property['propertyRight'])?0:$property['propertyRight']
										.",'".empty($property['propertyHotline'])?'':$property['propertyHotline']
										."','".empty($property['propertyIntroduction'])?'':$property['propertyIntroduction']
										."',".empty($property['propertyClickCount'])?0:$property['propertyClickCount']
										.",".empty($property['propertyType'])?0:$property['propertyType']
										."',".empty($property['propertyState'])?0:$property['propertyState']
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改楼盘
	public function modify($property){
		$sql="update ecms_property set propertyName='"
			.empty($property['propertyName'])?'':$property['propertyName']
			."',propertyOpenTime='".empty($property['propertyOpenTime'])?'':$property['propertyOpenTime']
			."',propertyCheckInTime='".empty($property['propertyCheckInTime'])?'':$property['propertyCheckInTime']
			."',propertyCompanyType=".empty($property['propertyCompanyType'])?'':$property['propertyCompanyType']
			.",propertyCompanyFee=".empty($property['propertyCompanyFee'])?0:$property['propertyCompanyFee']
			.",propertyBuildingType='".empty($property['propertyBuildingType'])?'':$property['propertyBuildingType']
			."',propertyFitmentStatus='".empty($property['propertyFitmentStatus'])?'':$property['propertyFitmentStatus']
			."',propertyCompany='".empty($property['propertyCompany'])?'':$property['propertyCompany']
			."',propertyCompanyAddress='".empty($property['propertyCompanyAddress'])?'':$property['propertyCompanyAddress']
			."',propertyCompanyWebsite='".empty($property['propertyCompanyWebsite'])?'':$property['propertyCompanyWebsite']
			."',propertySellAddress='".empty($property['propertySellAddress'])?'':$property['propertySellAddress']
			."',propertyArea='".empty($property['propertyArea'])?'':$property['propertyArea']
			."',propertyDevCompany='".empty($property['propertyDevCompany'])?'':$property['propertyDevCompany']
			."',propertyDevCompanyWebsite='".empty($property['propertyDevCompanyWebsite'])?'':$property['propertyDevCompanyWebsite']
			."',propertyPreSellPermits='".empty($property['factoryDormitory'])?'':$property['propertyPreSellPermits']
			."',propertyTraffic='".empty($property['propertyTraffic'])?'':$property['propertyTraffic']
			."',propertyPeriInfo='".empty($property['propertyPeriInfo'])?'':$property['propertyPeriInfo']
			."',propertyMapX=".empty($property['propertyMapX'])?0:$property['propertyMapX']
			.",propertyMapY=".empty($property['propertyMapY'])?0:$property['propertyMapY']
			.",propertyVolRate=".empty($property['propertyVolRate'])?0:$property['propertyVolRate']
			.",propertyGreenRate=".empty($property['propertyGreenRate'])?0:$property['propertyGreenRate']
			.",propertyBuildArea=".empty($property['propertyBuildArea'])?0:$property['propertyBuildArea']
			.",propertyLandArea=".empty($property['propertyLandArea'])?0:$property['propertyLandArea']
			.",propertyProxyCompany='".empty($property['propertyProxyCompany'])?'':$property['propertyProxyCompany']
			."',propertyParkingSpaces=".empty($property['propertyParkingSpaces'])?0:$property['propertyParkingSpaces']
			.",propertyHouseholds=".empty($property['propertyHouseholds'])?0:$property['propertyHouseholds']
			.",propertyOpenPrice=".empty($property['propertyOpenPrice'])?0:$property['propertyOpenPrice']
			.",propertyMainHouseModel='".empty($property['propertyMainHouseModel'])?'':$property['propertyMainHouseModel']
			.",propertyRight=".empty($property['propertyRight'])?0:$property['propertyRight']
			.",propertyHotline='".empty($property['propertyHotline'])?'':$property['propertyHotline']
			."',propertyIntroduction='".empty($property['propertyIntroduction'])?'':$property['propertyIntroduction']
			."',propertyClickCount=".empty($property['propertyClickCount'])?0:$property['propertyClickCount']
			.",propertyType=".empty($property['propertyType'])?0:$property['propertyType']
			.",propertyState=".empty($property['propertyState'])?0:$property['propertyState']
			.",propertyUpdateTime=".time()
			." where propertyId=".$property['propertyId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除楼盘
	public function delPropertyById($id){
		$sql="delete from  ecms_property where propertyId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取楼盘信息详情
	 * @param string $where 
	 * @return array
	 */
	public function getPropertyById($id) {
		$sql="select * from ecms_property where propertyId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取楼盘源信息列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getPropertyList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_property $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改楼盘源信息状态
	 * @param string $state 状态
	 * @param string $propertyId	主键
	 * @return boolean
	 */
	public function changeState($state,$propertyId){
		$sql="update ecms_property set propertyState=$state,propertyUpdateTime=".time()." where propertyId=$propertyId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 计算楼盘源信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countProperty($where = ''){
		$sql="select count(*) as counts from ecms_property $where";
		return $this->db->getQueryValue($sql);
	}
}


?>