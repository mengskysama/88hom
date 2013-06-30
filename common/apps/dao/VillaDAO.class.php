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
									villaParkingPlace,villaParkingPlaceCount,villaSellRentType,villaState,villaPropertyId,villaUserId,villaCreateTime,
									villaUpdateTime	) values('"
										.empty($villa['villaTitle'])?'':$villa['villaTitle']
										."','".empty($villa['villaContent'])?'':$villa['villaContent']
										."','".empty($villa['villaNumber'])?'':$villa['villaNumber']
										."',".empty($villa['villaRoom'])?0:$villa['villaRoom']
										.",".empty($villa['villaHall'])?0:$villa['villaHall']
										.",".empty($villa['villaToilet'])?0:$villa['villaToilet']
										.",".empty($villa['villaKitchen'])?0:$villa['villaKitchen']
										.",".empty($villa['villaBalcony'])?0:$villa['villaBalcony']
										.",".empty($villa['villaBuildArea'])?0:$villa['villaBuildArea']
										.",".empty($villa['villaUseArea'])?0:$villa['villaUseArea']
										.",".empty($villa['villaForward'])?0:$villa['villaForward']
										.",".empty($villa['villaFitment'])?0:$villa['villaFitment']
										.",".empty($villa['villaBuildYear'])?0:$villa['villaBuildYear']
										.",'".empty($villa['villaBaseService'])?'':$villa['villaBaseService']
										."','".empty($villa['villaEquipment'])?'':$villa['villaEquipment']
										."',".empty($villa['villaLookTime'])?0:$villa['villaLookTime']
										.",'".empty($villa['villaLiveTime'])?0:$villa['villaLiveTime']
										."',".empty($villa['villaSellPrice'])?0:$villa['villaSellPrice']
										.",".empty($villa['villaRentPrice'])?0:$villa['villaRentPrice']
										.",".empty($villa['villaRentType'])?0:$villa['villaRentType']
										.",".empty($villa['villaPayment'])?0:$villa['villaPayment']
										.",".empty($villa['villaPayDetailY'])?0:$villa['villaPayDetailY']
										.",".empty($villa['villaPayDetailF'])?0:$villa['villaPayDetailF']
										.",".empty($villa['villaAllFloor'])?0:$villa['villaAllFloor']
										.",".empty($villa['villaBuildForm'])?0:$villa['villaBuildForm']
										.",".empty($villa['villaBuildStructure'])?0:$villa['villaBuildStructure']
										.",".empty($villa['villaCellar'])?0:$villa['villaCellar']
										.",".empty($villa['villaCellarArea'])?0:$villa['villaCellarArea']
										.",".empty($villa['villaCellarType'])?0:$villa['villaCellarType']
										.",".empty($villa['villaGarden'])?0:$villa['villaGarden']
										.",".empty($villa['villaGardenArea'])?0:$villa['villaGardenArea']
										.",".empty($villa['villaGarage'])?0:$villa['villaGarage']
										.",".empty($villa['villaGarageCount'])?0:$villa['villaGarageCount']
										.",".empty($villa['villaParkingPlace'])?0:$villa['villaParkingPlace']
										.",".empty($villa['villaParkingPlaceCount'])?0:$villa['villaParkingPlaceCount']
										.",".empty($villa['villaSellRentType'])?0:$villa['villaSellRentType']
										.",".empty($villa['villaState'])?0:$villa['villaState']
										.",".empty($villa['villaPropertyId'])?0:$villa['villaPropertyId']
										.",".empty($villa['villaUserId'])?0:$villa['villaUserId']
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
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
	//end to be added by Cheneil
	//修改别墅
	public function modify($villa){
		$sql="update ecms_villa set villaTitle='"
			.empty($villa['villaTitle'])?'':$villa['villaTitle']
			."',villaContent='".empty($villa['villaContent'])?'':$villa['villaContent']
			."',villaNumber='".empty($villa['villaNumber'])?'':$villa['villaNumber']
			."',villaRoom=".empty($villa['villaRoom'])?0:$villa['villaRoom']
			.",villaHall=".empty($villa['villaHall'])?0:$villa['villaHall']
			.",villaToilet=".empty($villa['villaToilet'])?0:$villa['villaToilet']
			.",villaKitchen=".empty($villa['villaKitchen'])?0:$villa['villaKitchen']
			.",villaBalcony=".empty($villa['villaBalcony'])?0:$villa['villaBalcony']
			.",villaBuildArea=".empty($villa['villaBuildArea'])?0:$villa['villaBuildArea']
			.",villaUseArea=".empty($villa['villaUseArea'])?0:$villa['villaUseArea']
			.",villaForward=".empty($villa['villaForward'])?0:$villa['villaForward']
			.",villaFitment=".empty($villa['villaFitment'])?0:$villa['villaFitment']
			.",villaBuildYear=".empty($villa['villaBuildYear'])?0:$villa['villaBuildYear']
			.",villaBaseService='".empty($villa['villaBaseService'])?'':$villa['villaBaseService']
			."',villaEquipment='".empty($villa['villaEquipment'])?'':$villa['villaEquipment']
			."',villaLookTime=".empty($villa['villaLookTime'])?0:$villa['villaLookTime']
			.",villaLiveTime='".empty($villa['villaLiveTime'])?'':$villa['villaLiveTime']
			."',villaSellPrice=".empty($villa['villaSellPrice'])?0:$villa['villaSellPrice']
			.",villaRentPrice=".empty($villa['villaRentPrice'])?0:$villa['villaRentPrice']
			."',villaRentType=".empty($villa['villaRentType'])?0:$villa['villaRentType']
			.",villaPayment=".empty($villa['villaPayment'])?0:$villa['villaPayment']
			.",villaPayDetailY=".empty($villa['villaPayDetailY'])?0:$villa['villaPayDetailY']
			.",villaPayDetailF=".empty($villa['villaPayDetailF'])?0:$villa['villaPayDetailF']
			."',villaAllFloor=".empty($villa['villaAllFloor'])?0:$villa['villaAllFloor']
			.",villaBuildForm=".empty($villa['villaBuildForm'])?0:$villa['villaBuildForm']
			.",villaAllFloor=".empty($villa['villaAllFloor'])?0:$villa['villaAllFloor']
			.",villaBuildForm=".empty($villa['villaBuildForm'])?0:$villa['villaBuildForm']
			.",villaBuildStructure=".empty($villa['villaBuildStructure'])?0:$villa['villaBuildStructure']
			.",villaCellar=".empty($villa['villaCellar'])?0:$villa['villaCellar']
			.",villaCellarArea=".empty($villa['villaCellarArea'])?0:$villa['villaCellarArea']
			.",villaCellarType=".empty($villa['villaCellarType'])?'':$villa['villaCellarType']
			.",villaGarden=".empty($villa['villaGarden'])?0:$villa['villaGarden']
			.",villaGardenArea=".empty($villa['villaGardenArea'])?0:$villa['villaGardenArea']
			.",villaGarage=".empty($villa['villaGarage'])?0:$villa['villaGarage']
			.",villaGarageCount=".empty($villa['villaGarageCount'])?0:$villa['villaGarageCount']
			.",villaParkingPlace=".empty($villa['villaParkingPlace'])?0:$villa['villaParkingPlace']
			.",villaParkingPlaceCount=".empty($villa['villaParkingPlaceCount'])?0:$villa['villaParkingPlaceCount']
			.",villaSellRentType=".empty($villa['villaSellRentType'])?0:$villa['villaSellRentType']
			.",villaState=".empty($villa['villaState'])?0:$villa['villaState']
			.",villaPropertyId=".empty($villa['villaPropertyId'])?0:$villa['villaPropertyId']
			.",villaUserId=".empty($villa['villaUserId'])?0:$villa['villaUserId']
			.",villaUpdateTime=".time()
			." where villaId=".$villa['villaId'];
		return $this->db->getQueryExeCute($sql);
	}
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