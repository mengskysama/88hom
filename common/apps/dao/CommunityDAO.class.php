<?php
/**
 * 
 * 小区
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-24
 */
class CommunityDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布小区
	public function release($community){
		$sql="insert into ecms_community(communityName,communityRefPrice,communityIsHouseType,communityIsBusinessType,communityIsOfficeType,communityIsVillaType,communityBuildType,communityManagerFee,
										communityAddress,communityProjectFeatures,communityFitmentStatus,communityCompany,communityCompanyAddress,communityDevCompany,communityDevCompanyAddress,
										communitySellHouseAddress,communityTraffic,communityPeriInfo,communityMapX,communityMapY,communityVolRate,communityGreenRate,communityBuildArea,
										communityLandArea,communityBuildInfo,communityParkingSpaces,communityHouseholds,communityMainHouseModel,communityRight,communityParkingSpace,
										communityProvince,communityCity,communityDistrict,communityArea,communityState,communityIsSuggest,communityOrderNum,communityUserId,communityCreateTime,communityUpdateTime) values('"
										.(empty($community['communityName'])?'':$community['communityName'])
										."',".(empty($community['communityRefPrice'])?0:$community['communityRefPrice'])
										.",".(empty($community['communityIsHouseType'])?0:$community['communityIsHouseType'])
										.",".(empty($community['communityIsBusinessType'])?0:$community['communityIsBusinessType'])
										.",".(empty($community['communityIsOfficeType'])?0:$community['communityIsOfficeType'])
										.",".(empty($community['communityIsVillaType'])?0:$community['communityIsVillaType'])
										.",'".(empty($community['communityBuildType'])?'':$community['communityBuildType'])
										."',".(empty($community['communityManagerFee'])?0:$community['communityManagerFee'])
										.",'".(empty($community['communityAddress'])?'':$community['communityAddress'])
										."','".(empty($community['communityProjectFeatures'])?'':$community['communityProjectFeatures'])
										."','".(empty($community['communityFitmentStatus'])?'':$community['communityFitmentStatus'])
										."','".(empty($community['communityCompany'])?'':$community['communityCompany'])
										."','".(empty($community['communityCompanyAddress'])?'':$community['communityCompanyAddress'])
										."','".(empty($community['communityDevCompany'])?'':$community['communityDevCompany'])
										."','".(empty($community['communityDevCompanyAddress'])?'':$community['communityDevCompanyAddress'])
										."','".(empty($community['communitySellHouseAddress'])?'':$community['communitySellHouseAddress'])
										."','".(empty($community['communityTraffic'])?'':$community['communityTraffic'])
										."','".(empty($community['communityPeriInfo'])?'':$community['communityPeriInfo'])
										."',".(empty($community['communityMapX'])?0:$community['communityMapX'])
										.",".(empty($community['communityMapY'])?0:$community['communityMapY'])
										.",".(empty($community['communityVolRate'])?0:$community['communityVolRate'])
										.",".(empty($community['communityGreenRate'])?0:$community['communityGreenRate'])
										.",".(empty($community['communityBuildArea'])?0:$community['communityBuildArea'])
										.",".(empty($community['communityLandArea'])?0:$community['communityLandArea'])
										.",'".(empty($community['communityBuildInfo'])?'':$community['communityBuildInfo'])
										."','".(empty($community['communityParkingSpaces'])?'':$community['communityParkingSpaces'])
										."','".(empty($community['communityHouseholds'])?'':$community['communityHouseholds'])
										."','".(empty($community['communityMainHouseModel'])?'':$community['communityMainHouseModel'])
										."',".(empty($community['communityRight'])?0:$community['communityRight'])
										.",'".(empty($community['communityParkingSpace'])?'':$community['communityParkingSpace'])
										."',".(empty($community['communityProvince'])?0:$community['communityProvince'])
										.",".(empty($community['communityCity'])?0:$community['communityCity'])
										.",".(empty($community['communityDistrict'])?0:$community['communityDistrict'])
										.",".(empty($community['communityArea'])?0:$community['communityArea'])
										.",".(empty($community['communityState'])?0:$community['communityState'])
										.",".(empty($community['communityIsSuggest'])?0:$community['communityIsSuggest'])
										.",".(empty($community['communityOrderNum'])?0:$community['communityOrderNum'])
										.",".(empty($community['communityUserId'])?0:$community['communityUserId'])
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改小区
	public function modify($community){
		$sql="update ecms_community set communityName='"
			.(empty($community['communityName'])?'':$community['communityName'])
			."',communityRefPrice=".(empty($community['communityRefPrice'])?0:$community['communityRefPrice'])
			.",communityIsHouseType=".(empty($community['communityIsHouseType'])?0:$community['communityIsHouseType'])
			.",communityIsBusinessType=".(empty($community['communityIsBusinessType'])?0:$community['communityIsBusinessType'])
			.",communityIsOfficeType=".(empty($community['communityIsOfficeType'])?0:$community['communityIsOfficeType'])
			.",communityIsVillaType=".(empty($community['communityIsVillaType'])?0:$community['communityIsVillaType'])
			.",communityBuildType='".(empty($community['communityBuildType'])?'':$community['communityBuildType'])
			."',communityManagerFee=".(empty($community['communityManagerFee'])?0:$community['communityManagerFee'])
			.",communityAddress='".(empty($community['communityAddress'])?'':$community['communityAddress'])
			."',communityProjectFeatures='".(empty($community['communityProjectFeatures'])?'':$community['communityProjectFeatures'])
			."',communityFitmentStatus='".(empty($community['communityFitmentStatus'])?'':$community['communityFitmentStatus'])
			."',communityCompany='".(empty($community['communityCompany'])?'':$community['communityCompany'])
			."',communityCompanyAddress='".(empty($community['communityCompanyAddress'])?'':$community['communityCompanyAddress'])
			."',communityDevCompany='".(empty($community['communityDevCompany'])?'':$community['communityDevCompany'])
			."',communityDevCompanyAddress='".(empty($community['communityDevCompanyAddress'])?'':$community['communityDevCompanyAddress'])
			."',communitySellHouseAddress='".(empty($community['communitySellHouseAddress'])?'':$community['communitySellHouseAddress'])
			."',communityTraffic='".(empty($community['communityTraffic'])?'':$community['communityTraffic'])
			."',communityPeriInfo='".(empty($community['communityPeriInfo'])?'':$community['communityPeriInfo'])
			."',communityMapX=".(empty($community['communityMapX'])?0:$community['communityMapX'])
			.",communityMapY=".(empty($community['communityMapY'])?0:$community['communityMapY'])
			.",communityVolRate=".(empty($community['communityVolRate'])?0:$community['communityVolRate'])
			.",communityGreenRate=".(empty($community['communityGreenRate'])?0:$community['communityGreenRate'])
			.",communityBuildArea=".(empty($community['communityBuildArea'])?0:$community['communityBuildArea'])
			.",communityLandArea=".(empty($community['communityLandArea'])?0:$community['communityLandArea'])
			.",communityBuildInfo='".(empty($community['communityBuildInfo'])?'':$community['communityBuildInfo'])
			."',communityParkingSpaces='".(empty($community['communityParkingSpaces'])?'':$community['communityParkingSpaces'])
			."',communityHouseholds='".(empty($community['communityHouseholds'])?'':$community['communityHouseholds'])
			."',communityMainHouseModel='".(empty($community['communityMainHouseModel'])?'':$community['communityMainHouseModel'])
			."',communityRight=".(empty($community['communityRight'])?0:$community['communityRight'])
			.",communityParkingSpace='".(empty($community['communityParkingSpace'])?'':$community['communityParkingSpace'])
			."',communityProvince=".(empty($community['communityProvince'])?0:$community['communityProvince'])
			.",communityCity=".(empty($community['communityCity'])?0:$community['communityCity'])
			.",communityDistrict=".(empty($community['communityDistrict'])?0:$community['communityDistrict'])
			.",communityArea=".(empty($community['communityArea'])?0:$community['communityArea'])
			.",communityState=".(empty($community['communityState'])?0:$community['communityState'])
			.",communityIsSuggest=".(empty($community['communityIsSuggest'])?0:$community['communityIsSuggest'])
			.",communityOrderNum=".(empty($community['communityOrderNum'])?0:$community['communityOrderNum'])
			.",communityUserId=".(empty($community['communityUserId'])?0:$community['communityUserId'])
			.",communityUpdateTime=".time()
			." where communityId=".$community['communityId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除小区
	public function delCommunityById($id){
		$sql="delete from  ecms_community where communityId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取小区信息详情
	 * @param string $where 
	 * @return array
	 */
	public function getCommunityById($id) {
		$sql="select * from ecms_community where communityId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 计算小区源信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countCommunity($where = ''){
		$sql="select count(*) as counts from ecms_community $where";
		return $this->db->getQueryValue($sql);
	}
}


?>