<?php
/**
 * 
 * 别墅
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-09
 */
class VillaDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布厂房
	//added by Cheneil
	public function release($villa){
		$sql="insert into ecms_villa(villaTitle,villaContent,villaNumber,villaRoom,villaHall,villaToilet,villaKitchen,villaBalcony,villaBuildArea,
									villaUseArea,villaForward,villaFitment,villaBuildYear,villaBaseService,villaEquipment,villaLookTime,villaLiveTime,
									villaSellPrice,villaRentPrice,villaRentType,villaPayment,villaPayDetailY,villaPayDetailF,villaAllFloor,villaBuildForm,
									villaBuildStructure,villaCellar,villaCellarArea,villaCellarType,villaGarden,villaGardenArea,villaGarage,villaGarageCount,
									villaParkingPlace,villaParkingPlaceCount,villaSellRentType,villaState,villaCommunityId,villaUserId,villaCreateTime,
									villaUpdateTime	) values('"
										.(empty($villa['villaTitle'])?'':$villa['villaTitle'])
										."','".(empty($villa['villaContent'])?'':$villa['villaContent'])
										."','".(empty($villa['villaNumber'])?'':$villa['villaNumber'])
										."',".(empty($villa['villaRoom'])?0:$villa['villaRoom'])
										.",".(empty($villa['villaHall'])?0:$villa['villaHall'])
										.",".(empty($villa['villaToilet'])?0:$villa['villaToilet'])
										.",".(empty($villa['villaKitchen'])?0:$villa['villaKitchen'])
										.",".(empty($villa['villaBalcony'])?0:$villa['villaBalcony'])
										.",".(empty($villa['villaBuildArea'])?0:$villa['villaBuildArea'])
										.",".(empty($villa['villaUseArea'])?0:$villa['villaUseArea'])
										.",".(empty($villa['villaForward'])?0:$villa['villaForward'])
										.",".(empty($villa['villaFitment'])?0:$villa['villaFitment'])
										.",".(empty($villa['villaBuildYear'])?0:$villa['villaBuildYear'])
										.",'".(empty($villa['villaBaseService'])?'':$villa['villaBaseService'])
										."','".(empty($villa['villaEquipment'])?'':$villa['villaEquipment'])
										."',".(empty($villa['villaLookTime'])?0:$villa['villaLookTime'])
										.",'".(empty($villa['villaLiveTime'])?0:$villa['villaLiveTime'])
										."',".(empty($villa['villaSellPrice'])?0:$villa['villaSellPrice'])
										.",".(empty($villa['villaRentPrice'])?0:$villa['villaRentPrice'])
										.",".(empty($villa['villaRentType'])?0:$villa['villaRentType'])
										.",".(empty($villa['villaPayment'])?0:$villa['villaPayment'])
										.",".(empty($villa['villaPayDetailY'])?0:$villa['villaPayDetailY'])
										.",".(empty($villa['villaPayDetailF'])?0:$villa['villaPayDetailF'])
										.",".(empty($villa['villaAllFloor'])?0:$villa['villaAllFloor'])
										.",".(empty($villa['villaBuildForm'])?0:$villa['villaBuildForm'])
										.",".(empty($villa['villaBuildStructure'])?0:$villa['villaBuildStructure'])
										.",".(empty($villa['villaCellar'])?0:$villa['villaCellar'])
										.",".(empty($villa['villaCellarArea'])?0:$villa['villaCellarArea'])
										.",".(empty($villa['villaCellarType'])?0:$villa['villaCellarType'])
										.",".(empty($villa['villaGarden'])?0:$villa['villaGarden'])
										.",".(empty($villa['villaGardenArea'])?0:$villa['villaGardenArea'])
										.",".(empty($villa['villaGarage'])?0:$villa['villaGarage'])
										.",".(empty($villa['villaGarageCount'])?0:$villa['villaGarageCount'])
										.",".(empty($villa['villaParkingPlace'])?0:$villa['villaParkingPlace'])
										.",".(empty($villa['villaParkingPlaceCount'])?0:$villa['villaParkingPlaceCount'])
										.",".(empty($villa['villaSellRentType'])?0:$villa['villaSellRentType'])
										.",".(empty($villa['villaState'])?0:$villa['villaState'])
										.",".(empty($villa['villaCommunityId'])?0:$villa['villaCommunityId'])
										.",".(empty($villa['villaUserId'])?0:$villa['villaUserId'])
										.",".time()
										.",".time()
										.")";

		$this->db->query($sql);
		$houseId = $this->db->getInsertNum();
		return $houseId;						
	}

	public function countProperty($userId,$state){
		$sql = "select count(villaId) as propTotal from ecms_villa where villaUserId=".$userId." and villaState=".$state;
		$result = $this->db->getQueryValue($sql);
		return $result['propTotal'];
	}
	
	public function delete($villaId){
		$sql="update ecms_villa set villaState=2 where villaId=".$villaId;
		return $this->db->getQueryExecute($sql);
	}
	
	public function getPropertyById($userId,$propId){
		$sql = "select villaTitle,villaContent,villaNumber,villaRoom,villaHall,villaToilet,villaKitchen,villaBalcony,villaBuildArea,".
				"villaUseArea,villaForward,villaFitment,villaBuildYear,villaBaseService,villaEquipment,villaLookTime,villaLiveTime,".
				"villaSellPrice,villaRentPrice,villaRentType,villaPayment,villaPayDetailY,villaPayDetailF,villaAllFloor,villaBuildForm,".
				"villaBuildStructure,villaCellar,villaCellarArea,villaCellarType,villaGarden,villaGardenArea,villaGarage,villaGarageCount,".
				"villaParkingPlace,villaParkingPlaceCount,villaSellRentType,villaState,(select communityName from ecms_community where communityId=villaCommunityId) as propName,".
				"villaCommunityId,picId,picURl as propPhoto,villaCreateTime,villaUpdateTime ".
				"from ecms_villa prop left join ecms_pic pic on picBuildType=4 and picBuildId=villaId and picState=1 ".
				"where villaId=".$propId;
		if($userId > 0){
			$sql .= " and villaUserId=".$userId;
		}
		return $this->db->getQueryValue($sql);
	}
	//修改别墅
	public function modify($villa){
		$sql = "update ecms_villa set ";
		if(isset($villa['villaTitle'])){
			$sql .= "villaTitle='".$villa['villaTitle']."',";
		}
		if(isset($villa['villaContent'])){
			$sql .= "villaContent='".$villa['villaContent']."',";
		}
		if(isset($villa['villaNumber'])){
			$sql .= "villaNumber='".$villa['villaNumber']."',";
		}
		if(isset($villa['villaRoom'])){
			$sql .= "villaRoom=".$villa['villaRoom'].",";
		}
		if(isset($villa['villaHall'])){
			$sql .= "villaHall=".$villa['villaHall'].",";
		}
		if(isset($villa['villaToilet'])){
			$sql .= "villaToilet=".$villa['villaToilet'].",";
		}
		if(isset($villa['villaKitchen'])){
			$sql .= "villaKitchen=".$villa['villaKitchen'].",";
		}
		if(isset($villa['villaBalcony'])){
			$sql .= "villaBalcony=".$villa['villaBalcony'].",";
		}
		if(isset($villa['villaBuildArea'])){
			$sql .= "villaBuildArea=".$villa['villaBuildArea'].",";
		}
		if(isset($villa['villaUseArea'])){
			$sql .= "villaUseArea=".$villa['villaUseArea'].",";
		}
		if(isset($villa['villaForward'])){
			$sql .= "villaForward=".$villa['villaForward'].",";
		}
		if(isset($villa['villaFitment'])){
			$sql .= "villaFitment=".$villa['villaFitment'].",";
		}
		if(isset($villa['villaBuildYear'])){
			$sql .= "villaBuildYear=".$villa['villaBuildYear'].",";
		}
		if(isset($villa['villaBaseService'])){
			$sql .= "villaBaseService='".$villa['villaBaseService']."',";
		}
		if(isset($villa['villaLookTime'])){
			$sql .= "villaLookTime=".$villa['villaLookTime'].",";
		}
		if(isset($villa['villaSellPrice'])){
			$sql .= "villaSellPrice=".$villa['villaSellPrice'].",";
		}
		if(isset($villa['villaAllFloor'])){
			$sql .= "villaAllFloor=".$villa['villaAllFloor'].",";
		}
		if(isset($villa['villaBuildForm'])){
			$sql .= "villaBuildForm=".$villa['villaBuildForm'].",";
		}
		if(isset($villa['villaCellar'])){
			$sql .= "villaCellar=".$villa['villaCellar'].",";
		}
		if(isset($villa['villaCellarArea'])){
			$sql .= "villaCellarArea=".$villa['villaCellarArea'].",";
		}
		if(isset($villa['villaCellarType'])){
			$sql .= "villaCellarType=".$villa['villaCellarType'].",";
		}
		if(isset($villa['villaGarden'])){
			$sql .= "villaGarden=".$villa['villaGarden'].",";
		}
		if(isset($villa['villaGardenArea'])){
			$sql .= "villaGardenArea=".$villa['villaGardenArea'].",";
		}
		if(isset($villa['villaGarage'])){
			$sql .= "villaGarage=".$villa['villaGarage'].",";
		}
		if(isset($villa['villaGarageCount'])){
			$sql .= "villaGarageCount=".$villa['villaGarageCount'].",";
		}
		if(isset($villa['villaSellRentType'])){
			$sql .= "villaSellRentType=".$villa['villaSellRentType'].",";
		}
		if(isset($villa['villaState'])){
			$sql .= "villaState=".$villa['villaState'].",";
		}
		$sql .= "villaUpdateTime=".time()." where villaId=".$villa['villaId'];
		return $this->db->getQueryExeCute($sql);
	}
	//end to be added by Cheneil
	//删除别墅
	public function delVillaById($id){
		$sql="delete from  ecms_villa where villaId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取别墅信息详情
	 * @param string $where 
	 * @return array
	 */
	public function getVillaById($id) {
		$sql="select * from ecms_villa where villaId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取别墅源信息列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getVillaList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_villa $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改别墅源信息状态
	 * @param string $state 状态
	 * @param string $villaId	主键
	 * @return boolean
	 */
	public function changeState($state,$villaId){
		$sql="update ecms_villa set villaState=$state,villaUpdateTime=".time()." where villaId=$villaId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 计算别墅源信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countVilla($where = ''){
		$sql="select count(*) as counts from ecms_villa $where";
		return $this->db->getQueryValue($sql);
	}
}


?>