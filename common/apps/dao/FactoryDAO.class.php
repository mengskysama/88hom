<?php
/**
 * 
 * 厂房
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-09
 */
class FactoryDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布厂房
	//added by Cheneil
	public function release($factory){
		$sql="insert into ecms_factory(factoryNumber,factoryName,factoryAddress,factoryType,factorySellPrice,factoryProFee,factoryManagentUnits,factoryPayInfo,
										factoryFloorArea,factoryBuildArea,factoryOfficeArea,factoryWorkshopArea,factorySpaceArea,factoryDormitory,factoryBuildYear,
										factorySpan,factoryAllFloor,factoryFloorHeight,factoryLoadBearing,factoryBuildStructure,factoryWater,factoryHasCapacityNow,
										factoryHasCapacityMax,factoryTraffic,factoryContent,factoryRentPrice,factoryIncludFee,factoryPayment,factoryPayDetailY,factoryPayDetailF,factoryLeastYear,
										factorySellRentType,factoryMapX,factoryMapY,factoryAreaId,factoryState,factoryUserId,factoryCreateTime,factoryUpdateTime) values('"
										.(empty($factory['factoryNumber'])?'':$factory['factoryNumber'])
										."','".(empty($factory['factoryName'])?'':$factory['factoryName'])
										."','".(empty($factory['factoryAddress'])?'':$factory['factoryAddress'])
										."',".(empty($factory['factoryType'])?0:$factory['factoryType'])
										.",".(empty($factory['factorySellPrice'])?0:$factory['factorySellPrice'])
										.",".(empty($factory['factoryProFee'])?0:$factory['factoryProFee'])
										.",'".(empty($factory['factoryManagentUnits'])?'':$factory['factoryManagentUnits'])
										."',".(empty($factory['factoryPayInfo'])?0:$factory['factoryPayInfo'])
										.",".(empty($factory['factoryFloorArea'])?0:$factory['factoryFloorArea'])
										.",".(empty($factory['factoryBuildArea'])?0:$factory['factoryBuildArea'])
										.",".(empty($factory['factoryOfficeArea'])?0:$factory['factoryOfficeArea'])
										.",".(empty($factory['factoryWorkshopArea'])?0:$factory['factoryWorkshopArea'])
										.",".(empty($factory['factorySpaceArea'])?0:$factory['factorySpaceArea'])
										.",'".(empty($factory['factoryDormitory'])?'':$factory['factoryDormitory'])
										."',".(empty($factory['factoryBuildYear'])?0:$factory['factoryBuildYear'])
										.",".(empty($factory['factorySpan'])?0:$factory['factorySpan'])
										.",".(empty($factory['factoryAllFloor'])?0:$factory['factoryAllFloor'])
										.",".(empty($factory['factoryFloorHeight'])?0:$factory['factoryFloorHeight'])
										.",".(empty($factory['factoryLoadBearing'])?0:$factory['factoryLoadBearing'])
										.",'".(empty($factory['factoryBuildStructure'])?'':$factory['factoryBuildStructure'])
										."','".(empty($factory['factoryWater'])?'':$factory['factoryWater'])
										."','".(empty($factory['factoryHasCapacityNow'])?'':$factory['factoryHasCapacityNow'])
										."','".(empty($factory['factoryHasCapacityMax'])?'':$factory['factoryHasCapacityMax'])
										."','".(empty($factory['factoryTraffic'])?'':$factory['factoryTraffic'])
										."','".(empty($factory['factoryContent'])?'':$factory['factoryContent'])
										."',".(empty($factory['factoryRentPrice'])?0:$factory['factoryRentPrice'])
										.",".(empty($factory['factoryIncludFee'])?0:$factory['factoryIncludFee'])
										.",".(empty($factory['factoryPayment'])?0:$factory['factoryPayment'])
										.",".(empty($factory['factoryPayDetailY'])?0:$factory['factoryPayDetailY'])
										.",".(empty($factory['factoryPayDetailF'])?0:$factory['factoryPayDetailF'])
										.",".(empty($factory['factoryLeastYear'])?0:$factory['factoryLeastYear'])
										.",".(empty($factory['factorySellRentType'])?0:$factory['factorySellRentType'])
										.",".(empty($factory['factoryMapX'])?0:$factory['factoryMapX'])
										.",".(empty($factory['factoryMapY'])?0:$factory['factoryMapY'])
										.",'".(empty($factory['factoryAreaId'])?'':$factory['factoryAreaId'])
										."',".(empty($factory['factoryState'])?0:$factory['factoryState'])
										.",".(empty($factory['factoryUserId'])?0:$factory['factoryUserId'])
										.",".time()
										.",".time()
										.")";
		$this->db->query($sql);
		$factoryId = $this->db->getInsertNum();
		return $factoryId;										
	}

	public function countProperty($userId,$state,$txType=1){
		$sql = "select count(factoryId) as propTotal from ecms_factory where factoryUserId=".$userId." and factorySellRentType=".$txType;
		if($state == 1){
			$sql .= " and factoryState in(1,5)";
		}else{
			$sql .= " and factoryState=".$state;
		}
		$result = $this->db->getQueryValue($sql);
		return $result['propTotal'];
	}

	public function delete($factoryId){
		$sql="update ecms_factory set factoryState=2 where factoryId=".$factoryId;
		return $this->db->getQueryExecute($sql);
	}
	
	public function getPropertyById($userId,$propId){ 
		$sql = "select factoryTraffic,factoryContent,factoryNumber,factoryName,factoryAddress,factoryType,factorySellPrice,factoryProFee,factoryManagentUnits,factoryPayInfo,".
			   "factoryFloorArea,factoryBuildArea,factoryOfficeArea,factoryWorkshopArea,factorySpaceArea,factoryDormitory,factoryBuildYear,".
			   "factorySpan,factoryAllFloor,factoryFloorHeight,factoryLoadBearing,factoryBuildStructure,factoryWater,factoryHasCapacityNow,".
			   "factoryHasCapacityMax,factoryRentPrice,factoryIncludFee,factoryPayment,factoryPayDetailY,factoryPayDetailF,factoryLeastYear,".
			   "factorySellRentType,factoryMapX,factoryMapY,factoryAreaId,factoryState,".
			   "(select picUrl from ecms_pic where picBuildType=5 and picBuildId=factoryId limit 1) as propPhoto,factoryUserId,factoryCreateTime,factoryUpdateTime ".	 
				"from ecms_factory ".
				"where factoryId=".$propId;
		if($userId > 0){
			$sql .= " and factoryUserId=".$userId;
		}
		return $this->db->getQueryValue($sql);
	}
	//修改厂房
	public function modify($factory){
		$sql="update ecms_factory set ";
		if(isset($factory['factoryNumber'])){
			$sql .= "factoryNumber='".$factory['factoryNumber']."',";
		}				
		if(isset($factory['factoryAddress'])){
			$sql .= "factoryAddress='".$factory['factoryAddress']."',";
		}				
		if(isset($factory['factoryType'])){
			$sql .= "factoryType=".$factory['factoryType'].",";
		}				
		if(isset($factory['factorySellPrice'])){
			$sql .= "factorySellPrice=".($factory['factorySellPrice'] == "" ? 0 : $factory['factorySellPrice']).",";
		}				
		if(isset($factory['factoryProFee'])){
			$sql .= "factoryProFee=".$factory['factoryProFee'].",";
		}			
		if(isset($factory['factoryManagentUnits'])){
			$sql .= "factoryManagentUnits='".$factory['factoryManagentUnits']."',";
		}				
		if(isset($factory['factoryPayInfo'])){
			$sql .= "factoryPayInfo=".$factory['factoryPayInfo'].",";
		}			
		if(isset($factory['factoryFloorArea'])){
			$sql .= "factoryFloorArea=".$factory['factoryFloorArea'].",";
		}			
		if(isset($factory['factoryBuildArea'])){
			$sql .= "factoryBuildArea=".$factory['factoryBuildArea'].",";
		}					
		if(isset($factory['factoryOfficeArea'])){
			$sql .= "factoryOfficeArea=".$factory['factoryOfficeArea'].",";
		}				
		if(isset($factory['factoryWorkshopArea'])){
			$sql .= "factoryWorkshopArea=".$factory['factoryWorkshopArea'].",";
		}				
		if(isset($factory['factorySpaceArea'])){
			$sql .= "factorySpaceArea=".$factory['factorySpaceArea'].",";
		}				
		if(isset($factory['factoryDormitory'])){
			$sql .= "factoryDormitory='".$factory['factoryDormitory']."',";
		}				
		if(isset($factory['factoryBuildYear'])){
			$sql .= "factoryBuildYear=".($factory['factoryBuildYear'] == "" ? 0 : $factory['factoryBuildYear']).",";
		}				
		if(isset($factory['factorySpan'])){
			$sql .= "factorySpan=".$factory['factorySpan'].",";
		}				
		if(isset($factory['factoryAllFloor'])){
			$sql .= "factoryAllFloor=".$factory['factoryAllFloor'].",";
		}				
		if(isset($factory['factoryFloorHeight'])){
			$sql .= "factoryFloorHeight=".$factory['factoryFloorHeight'].",";
		}				
		if(isset($factory['factoryLoadBearing'])){
			$sql .= "factoryLoadBearing=".$factory['factoryLoadBearing'].",";
		}				
		if(isset($factory['factoryBuildStructure'])){
			$sql .= "factoryBuildStructure='".$factory['factoryBuildStructure']."',";
		}			
		if(isset($factory['factoryWater'])){
			$sql .= "factoryWater='".$factory['factoryWater']."',";
		}				
		if(isset($factory['factoryHasCapacityNow'])){
			$sql .= "factoryHasCapacityNow='".$factory['factoryHasCapacityNow']."',";
		}				
		if(isset($factory['factoryHasCapacityMax'])){
			$sql .= "factoryHasCapacityMax='".$factory['factoryHasCapacityMax']."',";
		}				
		if(isset($factory['factoryRentPrice'])){
			$sql .= "factoryRentPrice=".($factory['factoryRentPrice'] == "" ? 0 : $factory['factoryRentPrice']).",";
		}					
		if(isset($factory['factoryIncludFee'])){
			$sql .= "factoryIncludFee=".$factory['factoryIncludFee'].",";
		}					
		if(isset($factory['factoryPayment'])){
			$sql .= "factoryPayment=".($factory['factoryPayment'] == "" ? 0 : $factory['factoryPayment']).",";
		}				
		if(isset($factory['factoryPayDetailY'])){
			$sql .= "factoryPayDetailY=".($factory['factoryPayDetailY'] == "" ? 0 : $factory['factoryPayDetailY']).",";
		}				
		if(isset($factory['factoryPayDetailF'])){
			$sql .= "factoryPayDetailF=".($factory['factoryPayDetailF'] == "" ? 0 : $factory['factoryPayDetailF']).",";
		}				
		if(isset($factory['factoryLeastYear'])){
			$sql .= "factoryLeastYear=".$factory['factoryLeastYear'].",";
		}				
		if(isset($factory['factorySellRentType'])){
			$sql .= "factorySellRentType=".$factory['factorySellRentType'].",";
		}						
		if(isset($factory['factoryAreaId'])){
			$sql .= "factoryAreaId='".$factory['factoryAreaId']."',";
		}					
		if(isset($factory['factoryContent'])){
			$sql .= "factoryContent='".$factory['factoryContent']."',";
		}					
		if(isset($factory['factoryTraffic'])){
			$sql .= "factoryTraffic='".$factory['factoryTraffic']."',";
		}				
		if(isset($factory['factoryState'])){
			$sql .= "factoryState=".($factory['factoryState'] == "" ? 0 : $factory['factoryState']).",";
		}						
		$sql .= "factoryUpdateTime=".time()." where factoryId=".$factory['factoryId'];
		return $this->db->getQueryExeCute($sql);
	}
	public function refresh($propId){
		$sql = "update ecms_factory set factoryUpdateTime=".time()." where factoryId=".$propId;
		return $this->db->getQueryExeCute($sql);
	}
	//end to be added by Cheneil
	//删除厂房
	public function delFactoryById($id){
		$sql="delete from  ecms_factory where factoryId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取厂房信息详情
	 * @param string $where 
	 * @return array
	 */
	public function getFactoryById($id) {
		$sql="select * from ecms_factory where factoryId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取厂房源信息列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getFactoryList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_factory $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改厂房源信息状态
	 * @param string $state 状态
	 * @param string $factoryId	主键
	 * @return boolean
	 */
	public function changeState($state,$factoryId){
		$sql="update ecms_factory set factoryState=$state,factoryUpdateTime=".time()." where factoryId=$factoryId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 计算厂房源信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countFactory($where = ''){
		$sql="select count(*) as counts from ecms_factory $where";
		return $this->db->getQueryValue($sql);
	}
}


?>