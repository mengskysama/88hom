<?php
/**
 * 审核数据库操作类
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-07-12
 */
class AuditDAO{
	private $db=null;
	private $picDAO=null;
	public function __construct($db){
		$this->db=$db;
		$this->picDAO=new PicDAO($db);
	}
	//小区发布审核操作
	public function getCommunityById($where){
		$sql="select * from ecms_community 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	public function getCommunityList($where='',$order='',$limit=''){
		$sql="select * from ecms_community 
			  $where 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	public function countCommunity($where=''){
		$sql="select count(*) as counts from ecms_community 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	public function changeCommunityAndModify($community){
		$sql="update ecms_community set 
			  communityName='".(empty($community['communityName'])?'':$community['communityName'])."',
			  communityIsHouseType=".(empty($community['communityIsHouseType'])?0:$community['communityIsHouseType']).",
			  communityIsBusinessType=".(empty($community['communityIsBusinessType'])?0:$community['communityIsBusinessType']).",
			  communityIsOfficeType=".(empty($community['communityIsOfficeType'])?0:$community['communityIsOfficeType']).",
			  communityIsVillaType=".(empty($community['communityIsVillaType'])?0:$community['communityIsVillaType']).",
			  communityManagerFee=".(empty($community['communityManagerFee'])?0:$community['communityManagerFee']).",
			  communityBuildType='".(empty($community['communityBuildType'])?'':$community['communityBuildType'])."',
			  communityFitmentStatus='".(empty($community['communityFitmentStatus'])?'':$community['communityFitmentStatus'])."',
			  communityCompany='".(empty($community['communityCompany'])?'':$community['communityCompany'])."',
			  communityCompanyAddress='".(empty($community['communityCompanyAddress'])?'':$community['communityCompanyAddress'])."',
			  communityAddress='".(empty($community['communityAddress'])?'':$community['communityAddress'])."',
			  communityDevCompany='".(empty($community['communityDevCompany'])?'':$community['communityDevCompany'])."',
			  communityDevCompanyAddress='".(empty($community['communityDevCompanyAddress'])?'':$community['communityDevCompanyAddress'])."',
			  communityTraffic='".(empty($community['communityTraffic'])?'':$community['communityTraffic'])."',
			  communityPeriInfo='".(empty($community['communityPeriInfo'])?'':$community['communityPeriInfo'])."',
			  communityMapX=".(empty($community['communityMapX'])?0:$community['communityMapX']).",
			  communityMapY=".(empty($community['communityMapY'])?0:$community['communityMapY']).",
			  communityVolRate=".(empty($community['communityVolRate'])?0:$community['communityVolRate']).",
			  communityGreenRate=".(empty($community['communityGreenRate'])?0:$community['communityGreenRate']).",
			  communityBuildArea=".(empty($community['communityBuildArea'])?0:$community['communityBuildArea']).",
			  communityLandArea=".(empty($community['communityLandArea'])?0:$community['communityLandArea']).",
			  communityParkingSpace='".(empty($community['communityParkingSpace'])?'':$community['communityParkingSpace'])."',
			  communityHouseholds='".(empty($community['communityHouseholds'])?'':$community['communityHouseholds'])."',
			  communitySellHouseAddress='".(empty($community['communitySellHouseAddress'])?'':$community['communitySellHouseAddress'])."',
			  communityBuildInfo='".(empty($community['communityBuildInfo'])?'':$community['communityBuildInfo'])."',
			  communityRefPrice=".(empty($community['communityRefPrice'])?0:$community['communityRefPrice']).",
			  communityMainHouseModel='".(empty($community['communityMainHouseModel'])?'':$community['communityMainHouseModel'])."',
			  communityRight=".(empty($community['communityRight'])?0:$community['communityRight']).",
			  communityProjectFeatures='".(empty($community['communityProjectFeatures'])?'':$community['communityProjectFeatures'])."',
			  communityProvince=".(empty($community['communityProvince'])?0:$community['communityProvince']).",
			  communityCity=".(empty($community['communityCity'])?0:$community['communityCity']).",
			  communityDistrict=".(empty($community['communityDistrict'])?0:$community['communityDistrict']).",
			  communityArea=".(empty($community['communityArea'])?0:$community['communityArea']).",
			  communityOrderNum=".(empty($community['communityOrderNum'])?0:$community['communityOrderNum']).",
			  communityState=".(empty($community['communityState'])?0:$community['communityState']).",
			  communityUserId=".(empty($community['communityUserId'])?0:$community['communityUserId']).",
			  communityUpdateTime=".time()." 
			  where communityId=".$community['communityId'];				
//		echo $sql;
//		exit;				
		return $this->db->getQueryExeCute($sql);
	}
	public function changeCommunityState($state,$uId,$bId){
		$sql="update ecms_community set communityState=$state,communityUserId=$uId,communityUpdateTime=".time()." where communityId=$bId";
		return $this->db->getQueryExecute($sql);
	}
	//住宅房源发布审核操作
	public function getHouseList($where='',$order='',$limit=''){
		$sql="select h.*,u.*,c.communityProvince,c.communityCity,c.communityDistrict,c.communityArea 
			  from ecms_house as h 
			  inner join ecms_community as c on h.houseCommunityId=c.communityId 
			  inner join ecms_user as u on h.houseUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	public function countHouse($where){
		$sql="select count(*) as counts 
			  from ecms_house as h 
			  inner join ecms_community as c on h.houseCommunityId=c.communityId 
			  inner join ecms_user as u on h.houseUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	public function changeHouseState($state,$bId){
		$sql="update ecms_house set houseState=$state where houseId=$bId";
		return $this->db->getQueryExecute($sql);
	}
	public function getHouseDetail($where=''){
		$sql="select h.*,u.*,c.* 
			  from ecms_house as h 
			  inner join ecms_community as c on h.houseCommunityId=c.communityId 
			  inner join ecms_user as u on h.houseUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	//商铺房源发布审核操作
	public function getShopsList($where='',$order='',$limit=''){
		$sql="select s.*,u.*,c.communityProvince,c.communityCity,c.communityDistrict,c.communityArea 
			  from ecms_shops as s 
			  inner join ecms_community as c on s.shopsCommunityId=c.communityId 
			  inner join ecms_user as u on s.shopsUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	public function countShops($where){
		$sql="select count(*) as counts 
			  from ecms_shops as s 
			  inner join ecms_community as c on s.shopsCommunityId=c.communityId 
			  inner join ecms_user as u on s.shopsUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	public function changeShopsState($state,$bId){
		$sql="update ecms_shops set shopsState=$state where shopsId=$bId";
		return $this->db->getQueryExecute($sql);
	}
	public function getShopsDetail($where=''){
		$sql="select s.*,u.*,c.* 
			  from ecms_shops as s 
			  inner join ecms_community as c on s.shopsCommunityId=c.communityId 
			  inner join ecms_user as u on s.shopsUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	//写字楼房源发布审核操作
	public function getOfficeList($where='',$order='',$limit=''){
		$sql="select o.*,u.*,c.communityProvince,c.communityCity,c.communityDistrict,c.communityArea 
			  from ecms_office as o 
			  inner join ecms_community as c on o.officeCommunityId=c.communityId 
			  inner join ecms_user as u on o.officeUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	public function countOffice($where){
		$sql="select count(*) as counts 
			  from ecms_office as o 
			  inner join ecms_community as c on o.officeCommunityId=c.communityId 
			  inner join ecms_user as u on o.officeUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	public function changeOfficeState($state,$bId){
		$sql="update ecms_office set officeState=$state where officeId=$bId";
		return $this->db->getQueryExecute($sql);
	}
	public function getOfficeDetail($where=''){
		$sql="select o.*,u.*,c.* 
			  from ecms_office as o 
			  inner join ecms_community as c on o.officeCommunityId=c.communityId 
			  inner join ecms_user as u on o.officeUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	//别墅房源发布审核操作
	public function getVillaList($where='',$order='',$limit=''){
		$sql="select v.*,u.*,c.communityProvince,c.communityCity,c.communityDistrict,c.communityArea 
			  from ecms_villa as v 
			  inner join ecms_community as c on v.villaCommunityId=c.communityId 
			  inner join ecms_user as u on v.villaUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	public function countVilla($where){
		$sql="select count(*) as counts 
			  from ecms_villa as v 
			  inner join ecms_community as c on v.villaCommunityId=c.communityId 
			  inner join ecms_user as u on v.villaUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	public function changeVillaState($state,$bId){
		$sql="update ecms_villa set villaState=$state where villaId=$bId";
		return $this->db->getQueryExecute($sql);
	}
	public function getVillaDetail($where=''){
		$sql="select v.*,u.*,c.* 
			  from ecms_villa as v 
			  inner join ecms_community as c on v.villaCommunityId=c.communityId 
			  inner join ecms_user as u on v.villaUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	//厂房房源发布审核操作
	public function getFactoryList($where='',$order='',$limit=''){
		$sql="select * 
			  from ecms_factory as f 
			  inner join ecms_user as u on f.factoryUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	public function countFactory($where){
		$sql="select count(*) as counts 
			  from ecms_factory as f 
			  inner join ecms_user as u on f.factoryUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	public function changeFactoryState($state,$bId){
		$sql="update ecms_factory set factoryState=$state where factoryId=$bId";
		return $this->db->getQueryExecute($sql);
	}
	public function getFactoryDetail($where=''){
		$sql="select *  
			  from ecms_factory as f 
			  inner join ecms_user as u on f.factoryUserId=u.userId and u.userState=1 and u.userType!=0 
			  $where";
		return $this->db->getQueryValue($sql);
	}
}
?>