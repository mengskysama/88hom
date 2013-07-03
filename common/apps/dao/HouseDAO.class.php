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
									.",'".(empty($house['houseBuildForm'])?0:$house['houseBuildForm'])
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
	
	public function countProperty($userId,$state){
		$sql = "select count(houseId) as propTotal from ecms_house where houseUserId=".$userId." and houseState=".$state;
		$result = $this->db->getQueryValue($sql);
		return $result['propTotal'];
	}
	
	public function countPropertyList($query_where){
		$sql = "select count(*) as propTotal from vw_get_sell_property_list ".$query_where;
		$result = $this->db->getQueryValue($sql);
		return $result['propTotal'];
	}
	
	public function getPropertyList($query_fields,$query_where,$query_order,$query_limit){
		$sql = "select ".$query_fields." from vw_get_sell_property_list ".$query_where." ".$query_order." ".$query_limit;
		//echo $sql;
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
		
				."',=".empty($house[''])?0:$house['houseRoom']
				.",=".empty($house[''])?0:$house['houseHall']
				.",houseToilet=".empty($house['houseToilet'])?0:$house['houseToilet']
				.",houseKitchen=".empty($house['houseKitchen'])?0:$house['houseKitchen']
				.",houseBalcony=".empty($house['houseBalcony'])?0:$house['houseBalcony']
				.",houseSellPrice=".empty($house['houseSellPrice'])?0:$house['houseSellPrice']
				.",houseBuildArea=".empty($house['houseBuildArea'])?0:$house['houseBuildArea']
				.",houseUseArea=".empty($house['houseUseArea'])?0:$house['houseUseArea']
				.",houseRentArea=".empty($house['houseRentArea'])?0:$house['houseRentArea']
				.",houseType=".empty($house['houseType'])?0:$house['houseType']
				.",houseBuildStructure=".empty($house['houseBuildStructure'])?0:$house['houseBuildStructure']
				.",houseBuildForm=".empty($house['houseBuildForm'])?0:$house['houseBuildForm']
				.",houseForward=".empty($house['houseForward'])?0:$house['houseForward']
				.",houseFitment=".empty($house['houseFitment'])?0:$house['houseFitment']
				.",houseBaseService='".empty($house['houseBaseService'])?'':$house['houseBaseService']
				."',houseEquipment='".empty($house['houseEquipment'])?'':$house['houseEquipment']
				."',houseFloor=".empty($house['houseFloor'])?0:$house['houseFloor']
				.",houseAllFloor=".empty($house['houseAllFloor'])?0:$house['houseAllFloor']
				.",houseBuildYear=".empty($house['houseBuildYear'])?0:$house['houseBuildYear']
				.",houseLookTime=".empty($house['houseLookTime'])?0:$house['houseLookTime']
				.",housePayInfo=".empty($house['housePayInfo'])?0:$house['housePayInfo']
				."',houseRentType=".empty($house['houseRentType'])?0:$house['houseRentType']
				.",houseRentRoomType=".empty($house['houseRentRoomType'])?0:$house['houseRentRoomType']
				.",houseRentDetail=".empty($house['houseRentDetail'])?0:$house['houseRentDetail']
				.",houseLiveTime='".empty($house['houseLiveTime'])?'':$house['houseLiveTime']
				."',houseTags='".empty($house['houseTags'])?'':$house['houseTags']
				."',housePayment=".empty($house['housePayment'])?0:$house['housePayment']
				.",housePayDetailY=".empty($house['housePayDetailY'])?0:$house['housePayDetailY']
				.",housePayDetailF=".empty($house['housePayDetailF'])?0:$house['housePayDetailF']
				.",houseSellRentType=".empty($house['houseSellRentType'])?0:$house['houseSellRentType']
				.",houseState=".empty($house['houseState'])?0:$house['houseState']
				.",housePropertyId=".empty($house['housePropertyId'])?0:$house['housePropertyId']
				.",houseUserId=".empty($house['houseUserId'])?0:$house['houseUserId']
				.",houseUpdateTime=".time()
				." where houseId=".$house['houseId'];
		return $this->db->getQueryExeCute($sql);
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
}


?>