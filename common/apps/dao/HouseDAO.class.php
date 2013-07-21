<?php
/**
 * 
 * 住宅房源，包括出售或出租
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-08
 */
class HouseDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布住宅房源
	//added by Cheneil
	public function release($house){
		
		$sql="insert into ecms_house(houseTitle,houseContent,houseNumber,houseRoom,houseHall,houseToilet,houseKitchen,houseBalcony,houseSellPrice,
									houseBuildArea,houseUseArea,houseRentArea,houseType,houseBuildStructure,houseBuildForm,houseForward,houseFitment,
									houseBaseService,houseEquipment,houseFloor,houseAllFloor,houseBuildYear,houseLookTime,housePayInfo,houseRentType,
									houseRentRoomType,houseRentDetail,houseLiveTime,houseTags,housePayment,housePayDetailY,housePayDetailF,houseSellRentType,
									houseState,houseCommunityId,houseUserId,houseCreateTime,houseUpdateTime) values('"
									.(empty($house['houseTitle'])?'':$house['houseTitle'])
									."','".(empty($house['houseContent'])?'':$house['houseContent'])
									."','".(empty($house['houseNumber'])?'':$house['houseNumber'])
									."',".(empty($house['houseRoom'])?0:$house['houseRoom'])
									.",".(empty($house['houseHall'])?0:$house['houseHall'])
									.",".(empty($house['houseToilet'])?0:$house['houseToilet'])
									.",".(empty($house['houseKitchen'])?0:$house['houseKitchen'])
									.",".(empty($house['houseBalcony'])?0:$house['houseBalcony'])
									.",".(empty($house['houseSellPrice'])?0:$house['houseSellPrice'])
									.",".(empty($house['houseBuildArea'])?0:$house['houseBuildArea'])
									.",".(empty($house['houseUseArea'])?0:$house['houseUseArea'])
									.",".(empty($house['houseRentArea'])?0:$house['houseRentArea'])
									.",".(empty($house['houseType'])?0:$house['houseType'])
									.",".(empty($house['houseBuildStructure'])?0:$house['houseBuildStructure'])
									.",'".(empty($house['houseBuildForm'])?'':$house['houseBuildForm'])
									."',".(empty($house['houseForward'])?0:$house['houseForward'])
									.",".(empty($house['houseFitment'])?0:$house['houseFitment'])
									.",'".(empty($house['houseBaseService'])?'':$house['houseBaseService'])
									."','".(empty($house['houseEquipment'])?'':$house['houseEquipment'])
									."',".(empty($house['houseFloor'])?0:$house['houseFloor'])
									.",".(empty($house['houseAllFloor'])?0:$house['houseAllFloor'])
									.",".(empty($house['houseBuildYear'])?0:$house['houseBuildYear'])
									.",".(empty($house['houseLookTime'])?0:$house['houseLookTime'])
									.",".(empty($house['housePayInfo'])?0:$house['housePayInfo'])
									.",".(empty($house['houseRentType'])?0:$house['houseRentType'])
									.",".(empty($house['houseRentRoomType'])?0:$house['houseRentRoomType'])
									.",".(empty($house['houseRentDetail'])?0:$house['houseRentDetail'])
									.",'".(empty($house['houseLiveTime'])?'':$house['houseLiveTime'])
									."','".(empty($house['houseTags'])?'':$house['houseTags'])
									."',".(empty($house['housePayment'])?0:$house['housePayment'])
									.",".(empty($house['housePayDetailY'])?0:$house['housePayDetailY'])
									.",".(empty($house['housePayDetailF'])?0:$house['housePayDetailF'])
									.",".(empty($house['houseSellRentType'])?0:$house['houseSellRentType'])
									.",".(empty($house['houseState'])?0:$house['houseState'])
									.",".(empty($house['houseCommunityId'])?0:$house['houseCommunityId'])
									.",".(empty($house['houseUserId'])?0:$house['houseUserId'])
									.",".time()
									.",".time()
									.")";
		//echo 'sql->'.$sql.'<br/>';
		$this->db->query($sql);
		$houseId = $this->db->getInsertNum();
		return $houseId;					
	}
	
	public function countProperty($userId,$state,$txType){
		$sql = "select count(houseId) as propTotal from ecms_house where houseUserId=".$userId." and houseSellRentType=".$txType;
		if($state == 1){
			$sql .= " and houseState in(1,5)";
		}else{
			$sql .= " and houseState=".$state;
		}
		//echo '<br/>'.$sql;
		$result = $this->db->getQueryValue($sql);
		return $result['propTotal'];
	}
	
	public function countPropertyList($table,$query_where){
		$sql = "select count(*) as propTotal from ".$table." ".$query_where;
		$result = $this->db->getQueryValue($sql);
		return $result['propTotal'];
	}
	
	public function getPropertyList($table,$query_fields,$query_where,$query_order,$query_limit){
		$sql = "select ".$query_fields." from ".$table." ".$query_where." ".$query_order." ".$query_limit;
		//echo '<br/>SQL->'.$sql;
		return $this->db->getQueryArray($sql);
	}
	
	public function delete($houseId){
		$sql="update ecms_house set houseState=2 where houseId=".$houseId;
		return $this->db->getQueryExecute($sql);
	}
	
	public function getPropertyById($userId,$propId){
		$sql = "select houseTitle,houseContent,houseNumber,houseRoom,houseHall,houseToilet,houseKitchen,houseBalcony,houseSellPrice,".
				"houseBuildArea,houseUseArea,houseRentArea,houseType,houseBuildStructure,houseBuildForm,houseForward,houseFitment,".
				"houseBaseService,houseEquipment,houseFloor,houseAllFloor,houseBuildYear,houseLookTime,housePayInfo,houseRentType,".
				"houseRentRoomType,houseRentDetail,houseLiveTime,houseTags,housePayment,housePayDetailY,housePayDetailF,houseSellRentType,".
				"houseState,(select communityName from ecms_community where communityId=houseCommunityId) as propName,houseCommunityId,".
				"picId,picURl as propPhoto,houseCreateTime,houseUpdateTime ".
				"from ecms_house prop left join ecms_pic pic on picBuildType=1 and picBuildId=houseId and picState=1 ".
				"where houseId=".$propId;
		if($userId > 0){
			$sql .= " and houseUserId=".$userId;
		}
		return $this->db->getQueryValue($sql);
	}

	//修改住宅房源
	public function modify($house){
		$sql = "update ecms_house set ";
		if(isset($house['houseTitle'])){
			$sql .= "houseTitle='".$house['houseTitle']."',";
		}
		if(isset($house['houseContent'])){
			$sql .= "houseContent='".$house['houseContent']."',";
		}
		if(isset($house['houseNumber'])){
			$sql .= "houseNumber='".$house['houseNumber']."',";
		}			
		if(isset($house['houseRoom'])){
			$sql .= "houseRoom=".$house['houseRoom'].",";
		}
		if(isset($house['houseHall'])){
			$sql .= "houseHall=".$house['houseHall'].",";
		}
		if(isset($house['houseHall'])){
			$sql .= "houseHall=".$house['houseHall'].",";
		}
		if(isset($house['houseToilet'])){
			$sql .= "houseToilet=".$house['houseToilet'].",";
		}
		if(isset($house['houseKitchen'])){
			$sql .= "houseKitchen=".$house['houseKitchen'].",";
		}
		if(isset($house['houseBalcony'])){
			$sql .= "houseBalcony=".$house['houseBalcony'].",";
		}
		if(isset($house['houseSellPrice'])){
			$sql .= "houseSellPrice=".$house['houseSellPrice'].",";
		}
		if(isset($house['houseBuildArea'])){
			$sql .= "houseBuildArea=".$house['houseBuildArea'].",";
		}
		if(isset($house['houseUseArea'])){
			$sql .= "houseUseArea=".$house['houseUseArea'].",";
		}
		if(isset($house['houseType'])){
			$sql .= "houseType=".$house['houseType'].",";
		}
		if(isset($house['houseBuildForm'])){
			$sql .= "houseBuildForm='".$house['houseBuildForm']."',";
		}		
		if(isset($house['houseForward'])){
			$sql .= "houseForward=".$house['houseForward'].",";
		}
		if(isset($house['houseFitment'])){
			$sql .= "houseFitment=".$house['houseFitment'].",";
		}
		if(isset($house['houseBaseService'])){
			$sql .= "houseBaseService='".$house['houseBaseService']."',";
		}
		if(isset($house['houseFloor'])){
			$sql .= "houseFloor=".$house['houseFloor'].",";
		}
		if(isset($house['houseAllFloor'])){
			$sql .= "houseAllFloor=".$house['houseAllFloor'].",";
		}
		if(isset($house['houseBuildYear'])){
			$sql .= "houseBuildYear=".$house['houseBuildYear'].",";
		}
		if(isset($house['houseLookTime'])){
			$sql .= "houseLookTime=".$house['houseLookTime'].",";
		}
		if(isset($house['housePayInfo'])){
			$sql .= "housePayInfo=".$house['housePayInfo'].",";
		}
		if(isset($house['houseLiveTime'])){
			$sql .= "houseLiveTime='".$house['houseLiveTime']."',";
		}
		if(isset($house['houseSellRentType'])){
			$sql .= "houseSellRentType=".$house['houseSellRentType'].",";
		}
		if(isset($house['houseState'])){
			$sql .= "houseState=".$house['houseState'].",";
		}
		if(isset($house['houseRentArea'])){
			$sql .= "houseRentArea=".$house['houseRentArea'].",";
		}
		if(isset($house['housePayDetailF'])){
			$sql .= "housePayDetailF=".$house['housePayDetailF'].",";
		}
		if(isset($house['housePayDetailY'])){
			$sql .= "housePayDetailY=".$house['housePayDetailY'].",";
		}
		if(isset($house['housePayment'])){
			$sql .= "housePayment=".$house['housePayment'].",";
		}
		if(isset($house['houseRentType'])){
			$sql .= "houseRentType=".$house['houseRentType'].",";
		}
		if(isset($house['houseRentDetail'])){
			$sql .= "houseRentDetail=".$house['houseRentDetail'].",";
		}
		if(isset($house['houseRentRoomType'])){
			$sql .= "houseRentRoomType=".$house['houseRentRoomType'].",";
		}
	
		$sql .= "houseUpdateTime=".time()." where houseId=".$house['houseId'];
		//echo $sql;
		return $this->db->getQueryExeCute($sql);
	}
	public function refresh($propId){
		$sql = "update ecms_house set houseUpdateTime=".time()." where houseId=".$propId;
		return $this->db->getQueryExeCute($sql);
	}
	public function getExpiredPropStat($userId,$txType){
		$sql="select * from ecms_expired_prop_stat where userId=".$userId." and txType=".$txType;
		return $this->db->getQueryValue($sql);
	}
	//end to be added by Cheneil
	//删除住宅房源
	public function delHouseById($id){
		$sql="delete from  ecms_house where houseId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取住宅房源信息详情
	 * @param string $where 
	 * @return array
	 */
	public function getHouseById($id) {
		$sql="select * from ecms_house where houseId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取住宅房源信息列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getHouseList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_house $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改住宅房源信息状态
	 * @param string $state 状态
	 * @param string $houseId	主键
	 * @return boolean
	 */
	public function changeState($state,$houseId){
		$sql="update ecms_house set houseState=$state,houseUpdateTime=".time()." where houseId=$houseId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 计算住宅房源信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countHouse($where = ''){
		$sql="select count(*) as counts from ecms_house $where";
		return $this->db->getQueryValue($sql);
	}
	//added by david 
	//搜索查询获取住宅出售列表信息
	public function getHouseSellListForSearch($where='',$group='',$order='',$limit=''){
		if($where!=''){
			$where.=' AND h.houseSellRentType=1 AND (ud.userdetailState=2 OR ud.userdetailState IS NULL)';
		}else{
			$where='WHERE h.houseSellRentType=1 AND (ud.userdetailState=2 OR ud.userdetailState IS NULL)';
		}
		$sql="SELECT h.*,c.communityId,c.communityName,c.communityAddress,c.communityProvince,c.communityCity,
			  c.communityDistrict,c.communityArea,u.userId,ud.userdetailName,i.imcpId,i.imcpShortName,p.picUrl,p.picThumb,p.picInfo 
			  FROM ecms_house AS h 
			  INNER JOIN ecms_community AS c ON h.houseCommunityId=c.communityId AND h.houseState=5 AND c.communityState=1 
			  INNER JOIN ecms_user AS u ON h.houseUserId=u.userId AND u.userState=1 AND u.userType<>0 
			  LEFT JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=h.houseId AND p.pictypeId=1 AND p.picBuildType=1 AND p.picSellRent=1 
			  $where 
			  $group 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	//搜索查询获取住宅出售总数信息
	public function getHouseSellCountForSearch($where='',$group=''){
		if($where!=''){
			$where.=' AND h.houseSellRentType=1 AND (ud.userdetailState=2 OR ud.userdetailState IS NULL)';
		}else{
			$where='WHERE h.houseSellRentType=1 AND (ud.userdetailState=2 OR ud.userdetailState IS NULL)';
		}
		$sql="SELECT COUNT(*) AS counts FROM (SELECT h.houseId FROM ecms_house AS h 
			  INNER JOIN ecms_community AS c ON h.houseCommunityId=c.communityId AND h.houseState=5 AND c.communityState=1 
			  INNER JOIN ecms_user AS u ON h.houseUserId=u.userId AND u.userState=1 AND u.userType<>0 
			  LEFT JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=h.houseId AND p.pictypeId=1 AND p.picBuildType=1 AND p.picSellRent=1 
			  $where 
			  $group) as tb_new";
		return $this->db->getQueryValue($sql);
	}
	//搜索查询获取住宅出租列表信息
	public function getHouseRentListForSearch($where='',$group='',$order='',$limit=''){
		if($where!=''){
			$where.=' AND h.houseSellRentType=2 AND (ud.userdetailState=2 OR ud.userdetailState IS NULL)';
		}else{
			$where='WHERE h.houseSellRentType=2 AND (ud.userdetailState=2 OR ud.userdetailState IS NULL)';
		}
		$sql="SELECT h.*,c.communityId,c.communityName,c.communityAddress,c.communityProvince,c.communityCity,
			  c.communityDistrict,c.communityArea,u.userId,ud.userdetailName,i.imcpId,i.imcpShortName,p.picUrl,p.picThumb,p.picInfo 
			  FROM ecms_house AS h 
			  INNER JOIN ecms_community AS c ON h.houseCommunityId=c.communityId AND h.houseState=5 AND c.communityState=1 
			  INNER JOIN ecms_user AS u ON h.houseUserId=u.userId AND u.userState=1 AND u.userType<>0 
			  LEFT JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=h.houseId AND p.pictypeId=1 AND p.picBuildType=1 AND p.picSellRent=2 
			  $where 
			  $group 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	//搜索查询获取住宅出租总数信息
	public function getHouseRentCountForSearch($where='',$group=''){
		if($where!=''){
			$where.=' AND h.houseSellRentType=2 AND (ud.userdetailState=2 OR ud.userdetailState IS NULL)';
		}else{
			$where='WHERE h.houseSellRentType=2 AND (ud.userdetailState=2 OR ud.userdetailState IS NULL)';
		}
		$sql="SELECT COUNT(*) AS counts FROM (SELECT h.houseId FROM ecms_house AS h 
			  INNER JOIN ecms_community AS c ON h.houseCommunityId=c.communityId AND h.houseState=5 AND c.communityState=1 
			  INNER JOIN ecms_user AS u ON h.houseUserId=u.userId AND u.userState=1 AND u.userType<>0 
			  LEFT JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=h.houseId AND p.pictypeId=1 AND p.picBuildType=1 AND p.picSellRent=2 
			  $where 
			  $group) as tb_new";
		return $this->db->getQueryValue($sql);
	}
	//end to be added by david
}


?>