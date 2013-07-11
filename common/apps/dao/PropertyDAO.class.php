<?php
/**
 * 
 * 新盘（新房）
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-06-09
 */
class PropertyDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布新盘
	public function release($property){
		$sql="insert into ecms_property(propertyName,propertyOpenTime,propertyCheckInTime,propertyIsHouseType,propertyIsBusinessType,propertyIsOfficeType,
										propertyIsVillaType,propertyCompanyFee,propertyBuildingType,propertyFitmentStatus,propertyCompany,
										propertyCompanyAddress,propertyCompanyWebsite,propertySellAddress,propertyDevCompany,propertyDevCompanyAddress,
										propertyDevCompanyWebsite,propertyPreSellPermits,propertyTraffic,propertyPeriInfo,propertyMapX,
										propertyMapY,propertyVolRate,propertyGreenRate,propertyBuildArea,propertyLandArea,propertyProxyCompany,
										propertyParkingSpaces,propertyHouseholds,propertyOpenPrice,propertyOpenPriceRemark,propertyMainHouseModel,
										propertyMortgageBank,propertyRight,propertyHotline,propertyFeature,propertyIntroduction,propertyStartingTime,
										propertyEndingTime,propertyWorksProgramme,propertyClickCount,propertyProvince,propertyCity,
										propertyDistrict,propertyArea,propertyIsHot,propertyIsBusiness,propertyIsSmallAmt,propertyIsSubwayLine,
										propertyIsPark,propertyIsInvestment,propertyIsRecommend,propertyIsFine,propertyIsGbuy,
										propertyIsGbuyTop,propertyGbuyPrice,propertyGbuyTitle,propertyGbuyTime,propertyIsDiscounts,
										propertyDiscountsPrice,propertyDiscountsTitle,propertyIsPreferential,propertyPreferentialPrice,
										propertyPreferentialTitle,propertyState,propertyUserId,propertyCreateTime,propertyUpdateTime) 
										values('".(empty($property['propertyName'])?'':$property['propertyName'])."',
										'".(empty($property['propertyOpenTime'])?'':$property['propertyOpenTime'])."',
										'".(empty($property['propertyCheckInTime'])?'':$property['propertyCheckInTime'])."',
										".(empty($property['propertyIsHouseType'])?0:$property['propertyIsHouseType']).",
										".(empty($property['propertyIsBusinessType'])?0:$property['propertyIsBusinessType']).",
										".(empty($property['propertyIsOfficeType'])?0:$property['propertyIsOfficeType']).",
										".(empty($property['propertyIsVillaType'])?0:$property['propertyIsVillaType']).",
										".(empty($property['propertyCompanyFee'])?0:$property['propertyCompanyFee']).",
										'".(empty($property['propertyBuildingType'])?'':$property['propertyBuildingType'])."',
										'".(empty($property['propertyFitmentStatus'])?'':$property['propertyFitmentStatus'])."',
										'".(empty($property['propertyCompany'])?'':$property['propertyCompany'])."',
										'".(empty($property['propertyCompanyAddress'])?'':$property['propertyCompanyAddress'])."',
										'".(empty($property['propertyCompanyWebsite'])?'':$property['propertyCompanyWebsite'])."',
										'".(empty($property['propertySellAddress'])?'':$property['propertySellAddress'])."',
										'".(empty($property['propertyDevCompany'])?'':$property['propertyDevCompany'])."',
										'".(empty($property['propertyDevCompanyAddress'])?'':$property['propertyDevCompanyAddress'])."',
										'".(empty($property['propertyDevCompanyWebsite'])?'':$property['propertyDevCompanyWebsite'])."',
										'".(empty($property['propertyPreSellPermits'])?'':$property['propertyPreSellPermits'])."',
										'".(empty($property['propertyTraffic'])?'':$property['propertyTraffic'])."',
										'".(empty($property['propertyPeriInfo'])?'':$property['propertyPeriInfo'])."',
										".(empty($property['propertyMapX'])?0:$property['propertyMapX']).",
										".(empty($property['propertyMapY'])?0:$property['propertyMapY']).",
										".(empty($property['propertyVolRate'])?0:$property['propertyVolRate']).",
										".(empty($property['propertyGreenRate'])?0:$property['propertyGreenRate']).",
										".(empty($property['propertyBuildArea'])?0:$property['propertyBuildArea']).",
										".(empty($property['propertyLandArea'])?0:$property['propertyLandArea']).",
										'".(empty($property['propertyProxyCompany'])?'':$property['propertyProxyCompany'])."',
										'".(empty($property['propertyParkingSpaces'])?'':$property['propertyParkingSpaces'])."',
										'".(empty($property['propertyHouseholds'])?'':$property['propertyHouseholds'])."',
										".(empty($property['propertyOpenPrice'])?0:$property['propertyOpenPrice']).",
										'".(empty($property['propertyOpenPriceRemark'])?'':$property['propertyOpenPriceRemark'])."',
										'".(empty($property['propertyMainHouseModel'])?'':$property['propertyMainHouseModel'])."',
										'".(empty($property['propertyMortgageBank'])?'':$property['propertyMortgageBank'])."',
										".(empty($property['propertyRight'])?0:$property['propertyRight']).",
										'".(empty($property['propertyHotline'])?'':$property['propertyHotline'])."',
										'".(empty($property['propertyFeature'])?'':$property['propertyFeature'])."',
										'".(empty($property['propertyIntroduction'])?'':$property['propertyIntroduction'])."',
										'".(empty($property['propertyStartingTime'])?'':$property['propertyStartingTime'])."',
										'".(empty($property['propertyEndingTime'])?'':$property['propertyEndingTime'])."',
										'".(empty($property['propertyWorksProgramme'])?'':$property['propertyWorksProgramme'])."',
										".(empty($property['propertyClickCount'])?0:$property['propertyClickCount']).",
										".(empty($property['propertyProvince'])?0:$property['propertyProvince']).",
										".(empty($property['propertyCity'])?0:$property['propertyCity']).",
										".(empty($property['propertyDistrict'])?0:$property['propertyDistrict']).",
										".(empty($property['propertyArea'])?0:$property['propertyArea']).",
										".(empty($property['propertyIsHot'])?0:$property['propertyIsHot']).",
										".(empty($property['propertyIsBusiness'])?0:$property['propertyIsBusiness']).",
										".(empty($property['propertyIsSmallAmt'])?0:$property['propertyIsSmallAmt']).",
										".(empty($property['propertyIsSubwayLine'])?0:$property['propertyIsSubwayLine']).",
										".(empty($property['propertyIsPark'])?0:$property['propertyIsPark']).",
										".(empty($property['propertyIsInvestment'])?0:$property['propertyIsInvestment']).",
										".(empty($property['propertyIsRecommend'])?0:$property['propertyIsRecommend']).",
										".(empty($property['propertyIsFine'])?0:$property['propertyIsFine']).",
										".(empty($property['propertyIsGbuy'])?0:$property['propertyIsGbuy']).",
										".(empty($property['propertyIsGbuyTop'])?0:$property['propertyIsGbuyTop']).",
										'".(empty($property['propertyGbuyPrice'])?'':$property['propertyGbuyPrice'])."',
										'".(empty($property['propertyGbuyTitle'])?'':$property['propertyGbuyTitle'])."',
										".(empty($property['propertyGbuyTime'])?0:$property['propertyGbuyTime']).",
										".(empty($property['propertyIsDiscounts'])?0:$property['propertyIsDiscounts']).",
										'".(empty($property['propertyDiscountsPrice'])?'':$property['propertyDiscountsPrice'])."',
										'".(empty($property['propertyDiscountsTitle'])?'':$property['propertyDiscountsTitle'])."',
										".(empty($property['propertyIsPreferential'])?0:$property['propertyIsPreferential']).",
										'".(empty($property['propertyPreferentialPrice'])?'':$property['propertyPreferentialPrice'])."',
										'".(empty($property['propertyPreferentialTitle'])?'':$property['propertyPreferentialTitle'])."',
										".(empty($property['propertyState'])?1:$property['propertyState']).",
										".(empty($property['propertyUserId'])?0:$property['propertyUserId']).",
										".time().",
										".time().")";
//			echo $sql;
//			exit;
			return $this->db->getQueryExecute($sql);						
	}
	//修改楼盘
	public function modify($property){
		$sql="update ecms_property set 
			  propertyName='".(empty($property['propertyName'])?'':$property['propertyName'])."',
			  propertyOpenTime='".(empty($property['propertyOpenTime'])?'':$property['propertyOpenTime'])."',
			  propertyCheckInTime='".(empty($property['propertyCheckInTime'])?'':$property['propertyCheckInTime'])."',
			  propertyIsHouseType=".(empty($property['propertyIsHouseType'])?0:$property['propertyIsHouseType']).",
			  propertyIsBusinessType=".(empty($property['propertyIsBusinessType'])?0:$property['propertyIsBusinessType']).",
			  propertyIsOfficeType=".(empty($property['propertyIsOfficeType'])?0:$property['propertyIsOfficeType']).",
			  propertyIsVillaType=".(empty($property['propertyIsVillaType'])?0:$property['propertyIsVillaType']).",
			  propertyCompanyFee=".(empty($property['propertyCompanyFee'])?0:$property['propertyCompanyFee']).",
			  propertyBuildingType='".(empty($property['propertyBuildingType'])?'':$property['propertyBuildingType'])."',
			  propertyFitmentStatus='".(empty($property['propertyFitmentStatus'])?'':$property['propertyFitmentStatus'])."',
			  propertyCompany='".(empty($property['propertyCompany'])?'':$property['propertyCompany'])."',
			  propertyCompanyAddress='".(empty($property['propertyCompanyAddress'])?'':$property['propertyCompanyAddress'])."',
			  propertyCompanyWebsite='".(empty($property['propertyCompanyWebsite'])?'':$property['propertyCompanyWebsite'])."',
			  propertySellAddress='".(empty($property['propertySellAddress'])?'':$property['propertySellAddress'])."',
			  propertyDevCompany='".(empty($property['propertyDevCompany'])?'':$property['propertyDevCompany'])."',
			  propertyDevCompanyAddress='".(empty($property['propertyDevCompanyAddress'])?'':$property['propertyDevCompanyAddress'])."',
			  propertyDevCompanyWebsite='".(empty($property['propertyDevCompanyWebsite'])?'':$property['propertyDevCompanyWebsite'])."',
			  propertyPreSellPermits='".(empty($property['propertyPreSellPermits'])?'':$property['propertyPreSellPermits'])."',
			  propertyTraffic='".(empty($property['propertyTraffic'])?'':$property['propertyTraffic'])."',
			  propertyPeriInfo='".(empty($property['propertyPeriInfo'])?'':$property['propertyPeriInfo'])."',
			  propertyMapX=".(empty($property['propertyMapX'])?0:$property['propertyMapX']).",
			  propertyMapY=".(empty($property['propertyMapY'])?0:$property['propertyMapY']).",
			  propertyVolRate=".(empty($property['propertyVolRate'])?0:$property['propertyVolRate']).",
			  propertyGreenRate=".(empty($property['propertyGreenRate'])?0:$property['propertyGreenRate']).",
			  propertyBuildArea=".(empty($property['propertyBuildArea'])?0:$property['propertyBuildArea']).",
			  propertyLandArea=".(empty($property['propertyLandArea'])?0:$property['propertyLandArea']).",
			  propertyProxyCompany='".(empty($property['propertyProxyCompany'])?'':$property['propertyProxyCompany'])."',
			  propertyParkingSpaces='".(empty($property['propertyParkingSpaces'])?'':$property['propertyParkingSpaces'])."',
			  propertyHouseholds='".(empty($property['propertyHouseholds'])?'':$property['propertyHouseholds'])."',
			  propertyOpenPrice=".(empty($property['propertyOpenPrice'])?0:$property['propertyOpenPrice']).",
			  propertyOpenPriceRemark='".(empty($property['propertyOpenPriceRemark'])?'':$property['propertyOpenPriceRemark'])."',
			  propertyMainHouseModel='".(empty($property['propertyMainHouseModel'])?'':$property['propertyMainHouseModel'])."',
			  propertyMortgageBank='".(empty($property['propertyMortgageBank'])?'':$property['propertyMortgageBank'])."',
			  propertyRight=".(empty($property['propertyRight'])?0:$property['propertyRight']).",
			  propertyHotline='".(empty($property['propertyHotline'])?'':$property['propertyHotline'])."',
			  propertyFeature='".(empty($property['propertyFeature'])?'':$property['propertyFeature'])."',
			  propertyIntroduction='".(empty($property['propertyIntroduction'])?'':$property['propertyIntroduction'])."',
			  propertyStartingTime='".(empty($property['propertyStartingTime'])?'':$property['propertyStartingTime'])."',
			  propertyEndingTime='".(empty($property['propertyEndingTime'])?'':$property['propertyEndingTime'])."',
			  propertyWorksProgramme='".(empty($property['propertyWorksProgramme'])?'':$property['propertyWorksProgramme'])."',
			  propertyClickCount=".(empty($property['propertyClickCount'])?0:$property['propertyClickCount']).",
			  propertyProvince=".(empty($property['propertyProvince'])?0:$property['propertyProvince']).",
			  propertyCity=".(empty($property['propertyCity'])?0:$property['propertyCity']).",
			  propertyDistrict=".(empty($property['propertyDistrict'])?0:$property['propertyDistrict']).",
			  propertyArea=".(empty($property['propertyArea'])?0:$property['propertyArea']).",
			  propertyIsHot=".(empty($property['propertyIsHot'])?0:$property['propertyIsHot']).",
			  propertyIsBusiness=".(empty($property['propertyIsBusiness'])?0:$property['propertyIsBusiness']).",
			  propertyIsSmallAmt=".(empty($property['propertyIsSmallAmt'])?0:$property['propertyIsSmallAmt']).",
			  propertyIsSubwayLine=".(empty($property['propertyIsSubwayLine'])?0:$property['propertyIsSubwayLine']).",
			  propertyIsPark=".(empty($property['propertyIsPark'])?0:$property['propertyIsPark']).",
			  propertyIsInvestment=".(empty($property['propertyIsInvestment'])?0:$property['propertyIsInvestment']).",
			  propertyIsRecommend=".(empty($property['propertyIsRecommend'])?0:$property['propertyIsRecommend']).",
			  propertyIsFine=".(empty($property['propertyIsFine'])?0:$property['propertyIsFine']).",
			  propertyIsGbuy=".(empty($property['propertyIsGbuy'])?0:$property['propertyIsGbuy']).",
			  propertyIsGbuyTop=".(empty($property['propertyIsGbuyTop'])?0:$property['propertyIsGbuyTop']).",
			  propertyGbuyPrice='".(empty($property['propertyGbuyPrice'])?'':$property['propertyGbuyPrice'])."',
			  propertyGbuyTitle='".(empty($property['propertyGbuyTitle'])?'':$property['propertyGbuyTitle'])."',
			  propertyGbuyTime=".(empty($property['propertyGbuyTime'])?0:$property['propertyGbuyTime']).",
			  propertyIsDiscounts=".(empty($property['propertyIsDiscounts'])?0:$property['propertyIsDiscounts']).",
			  propertyDiscountsPrice='".(empty($property['propertyDiscountsPrice'])?'':$property['propertyDiscountsPrice'])."',
			  propertyDiscountsTitle='".(empty($property['propertyDiscountsTitle'])?'':$property['propertyDiscountsTitle'])."',
			  propertyIsPreferential=".(empty($property['propertyIsPreferential'])?0:$property['propertyIsPreferential']).",
			  propertyPreferentialPrice='".(empty($property['propertyPreferentialPrice'])?'':$property['propertyPreferentialPrice'])."',  
			  propertyPreferentialTitle='".(empty($property['propertyPreferentialTitle'])?'':$property['propertyPreferentialTitle'])."',  
			  propertyState=".(empty($property['propertyState'])?0:$property['propertyState']).",
			  propertyUpdateTime=".time()." 
			  where propertyId=".$property['propertyId'];				
//		echo $sql;
//		exit;				
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
	public function getPropertyById($where) {
		$sql="select * from ecms_property as property 
			  inner join ecms_user as user on property.propertyUserId=user.userId $where";
		return $this->db->getQueryValue($sql);
	}
	public function getPropertyPicList($where){
		$sql="select * from ecms_property as property 
			  inner join ecms_user as user on property.propertyUserId=user.userId 
			  inner join ecms_pic as pic on property.propertyId=pic.picBuildId $where";
		return $this->db->getQueryArray($sql);
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
	public function getPropertyListByUser($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_property as property 
			  inner join ecms_user as user on property.propertyUserId=user.userId $where $order $limit";
//		echo $sql;
//		exit;
		return $this->db->getQueryArray($sql);
	}
	public function getPropertyListByUserAndPic(){
		
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
	 * 点击统计
	 * @param string $id 信息ID
	 * @return boolean
	 **/
	public function clickCount($id){
		$sql="update ecms_property set propertyClickCount=propertyClickCount+1 where propertyId=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 计算楼盘源信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countPropertyByUser($where = ''){
		$sql="select count(*) as counts from ecms_property as property 
			  inner join ecms_user as user on property.propertyUserId=user.userId $where";
		return $this->db->getQueryValue($sql);
	}
	public function countPropertyByUserAndPic($where = ''){
		
	}
	public function getPropertyListBySearch($where='',$order='',$limit=''){
		$sql="SELECT propertyId AS id,propertyId,propertyName,propertyIsHouseType,propertyIsBusinessType, 
			  propertyIsOfficeType,propertyIsVillaType,propertyBuildingType,propertyFitmentStatus,propertyCompany,propertyCompanyAddress, 
			  propertyCompanyFee,propertySellAddress,propertyDevCompany,propertyDevCompanyAddress,propertyPreSellPermits, 
			  propertyMapX,propertyMapY,propertyVolRate,propertyGreenRate,propertyBuildArea,propertyLandArea,propertyProxyCompany, 
			  propertyParkingSpaces,propertyHouseholds,propertyOpenPrice,propertyOpenPriceRemark,propertyMainHouseModel, 
			  propertyMortgageBank,propertyHotline,propertyFeature,propertyProvince,propertyCity,propertyDistrict,propertyArea, 
			  propertyIsHot,propertyIsBusiness,propertyIsSmallAmt,propertyIsSubwayLine,propertyIsPark,propertyIsInvestment, 
			  propertyIsRecommend,propertyIsFine,propertyIsGbuy,propertyIsGbuyTop,propertyIsDiscounts,propertyIsPreferential, 
			  propertyState,propertyUserId,propertyCreateTime,propertyUpdateTime,picUrl,picThumb,picInfo,picState,picLayer 
			  FROM ecms_property 
			  LEFT JOIN (SELECT * FROM ecms_pic WHERE picBuildFatherType=2 AND pictypeId=3 GROUP BY picBuildId ORDER BY picLayer DESC) AS t_pic 
			  ON propertyId=picBuildId 
			  $where
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	public function getPropertyCountBySearch($where=''){
		$sql="SELECT count(*) AS counts
			  FROM ecms_property 
			  LEFT JOIN (SELECT * FROM ecms_pic WHERE picBuildFatherType=2 AND pictypeId=3 GROUP BY picBuildId ORDER BY picLayer DESC) AS t_pic 
			  ON propertyId=picBuildId 
			  $where";
		return $this->db->getQueryValue($sql);
	}
}


?>