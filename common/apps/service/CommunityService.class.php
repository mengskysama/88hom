<?php 
/**
 * 
 * 小区服务类
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-24
 */
class CommunityService{
	private $db=null;
	private $communityDAO = null;

	public function __construct($db){
		$this->db=$db;
		$this->communityDAO = new CommunityDAO($db);
	}
	//获取小区列表
	public function getCommunityList($where){
		$sql="select communityId as id,communityName,u.userUsername,communityIsHouseType,communityIsBusinessType,communityIsOfficeType,communityIsVillaType,communityClickCount,communityProvince,communityCity,communityDistrict,communityArea ,communityState,communityUpdateTime from ecms_community c join ecms_user u on c.communityUserId=u.userId $where";
		return $this->db->getQueryArray($sql);
	}
	//获取小区分页参数及过虑数据条件 $params 来自$_REQUEST
	public function getCommunityPageListParam($params){
		$sql = '';
		$pageStr = '';
		if(isset($params['searchType']) && $params['searchType']!=''){
			//名称
			if(!empty($params['name'])){
				if($sql != '')
					$sql .= " and communityName like '%".$params['name']."%'";
				else 
					$sql .= " communityName like '%".$params['name']."%'";
					
				if($pageStr != '')
					$pageStr .= "&name=".$params['name'];
				else 
					$pageStr .= "name=".$params['name'];	
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&name=";
				else 
					$pageStr .= "name=";
			}
			//区域下标
			if(!empty($params['areaIndex'])){
				$areaIndexArr = explode("-",$params['areaIndex']);
				$temp = '';
				if(count($areaIndexArr)<=3)
					$temp = "communityProvince=".$areaIndexArr[0]." and communityCity=".$areaIndexArr[1]." and communityDistrict=".$areaIndexArr[2];
				else 
					$temp = "communityProvince=".$areaIndexArr[0]." and communityCity=".$areaIndexArr[1]." and communityDistrict=".$areaIndexArr[2]." and communityArea=".$areaIndexArr[3];	
				
				if($sql != '')
				{
					$sql .= " and ".$temp;
				}
				else 
				{
					$sql .= " ".$temp;
				}
					
				if($pageStr != '')
					$pageStr .= "&areaIndex=".$params['areaIndex'];
				else 
					$pageStr .= "areaIndex=".$params['areaIndex'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&areaIndex=";
				else 
					$pageStr .= "areaIndex=";
			}
			$houseType = '';
			//是否住宅类
			if(!empty($params['isHouseType'])){
				if($houseType != '')
					$houseType .= " or communityIsHouseType=1";
				else 
					$houseType .= "  (communityIsHouseType=1";
						
				if($pageStr != '')
					$pageStr .= "&isHouseType=1";
				else 
					$pageStr .= "isHouseType=1";	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&isHouseType=";
				else 
					$pageStr .= "isHouseType=";
			}
			//是否商业
			if(!empty($params['isBusinessType'])){
				if($houseType != '')
					$houseType .= " or communityIsBusinessType=1";
				else 
					$houseType .= "  (communityIsBusinessType=1";	
					
				if($pageStr != '')
					$pageStr .= "&isBusinessType=1";
				else 
					$pageStr .= "isBusinessType=1";	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&isBusinessType=";
				else 
					$pageStr .= "isBusinessType=";
			}
			//是否写字楼
			if(!empty($params['isOfficeType'])){
				if($houseType != '')
					$houseType .= " or communityIsOfficeType=1";
				else 
					$houseType .= "  (communityIsOfficeType=1";	
					
				if($pageStr != '')
					$pageStr .= "&isOfficeType=1";
				else 
					$pageStr .= "isOfficeType=1";	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&isOfficeType=";
				else 
					$pageStr .= "isOfficeType=";
			}
			//是否别墅
			if(!empty($params['isVillaType'])){
				if($houseType != '')
					$houseType .= " or communityIsVillaType=1";
				else 
					$houseType .= "  (communityIsVillaType=1";	
					
				if($pageStr != '')
					$pageStr .= "&isVillaType=1";
				else 
					$pageStr .= "isVillaType=1";	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&isVillaType=";
				else 
					$pageStr .= "isVillaType=";
			}
			
			if($houseType != '')
			{	
				$houseType .= ')';
				if($sql != '')
					$sql .= ' and '.$houseType;
				else 
					$sql .= $houseType;	
			}
			$pageStr .= '&searchType=other';
		}
		if($pageStr != '')
			$pageStr .= '&page';
		else 
			$pageStr .= 'page';	
		return array($sql,$pageStr);	
	}
	//小区点击加1
	public function communityClick($state,$id){
		$sql="update ecms_community set commuityClickCount=commuityClickCount+1 where communityId=$id";
		return $this->db->getQueryExecute($sql);
	}
	//获取小区
	public function getCommunityById($id){
		$sql="select c.*,u.userUsername from ecms_community c join ecms_user u on c.communityUserId=u.userId where c.communityId=$id";
		return $this->db->getQueryValue($sql);
	}
	//获取某小区有图片的图片类别
	public function getPicTypeByBuildId($buildId){
		$sql = "select p.pictypeId ,case p.pictypeId 
										 when 1 then '户型图' 
										 when 2 then '交通图'
										 when 3 then '外景图'
										 when 4 then '实景图'
										 when 5 then '效果图'
										 when 6 then '样版间'
										 when 7 then '配套图'
										 when 8 then '装修案例'
										 else '其它' end  as pictypeName
									from ecms_pic p   where p.picBuildFatherType=1 and p.picBuildId=$buildId group by p.pictypeId ";
		return $this->db->getQueryArray($sql);
	} 
	//获取某小区某图片类型图片列表
	public function getPicByBuildIdAndPicTypeId($buildId,$pictypeId){
		$sql = "select * from ecms_pic p where p.picBuildFatherType=1 and picBuildId=$buildId and p.pictypeId=$pictypeId order by picLayer desc ,picUpdateTime desc";
		return $this->db->getQueryArray($sql);
	}
}

?>	