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
										factoryHasCapacityMax,factoryRentPrice,factoryIncludFee,factoryPayment,factoryPayDetailY,factoryPayDetailF,factoryLeastYear,
										factorySellRentType,factoryMapX,factoryMapY,factoryAreaId,factoryState,factoryUserId,factoryCreateTime,factoryUpdateTime) values('"
										.empty($factory['factoryNumber'])?'':$factory['factoryNumber']
										."','".empty($factory['factoryName'])?'':$factory['factoryName']
										."','".empty($factory['factoryAddress'])?'':$factory['factoryAddress']
										."',".empty($factory['factoryType'])?0:$factory['factoryType']
										.",".empty($factory['factorySellPrice'])?0:$factory['factorySellPrice']
										.",".empty($factory['factoryProFee'])?0:$factory['factoryProFee']
										.",'".empty($factory['factoryManagentUnits'])?'':$factory['factoryManagentUnits']
										."',".empty($factory['factoryPayInfo'])?0:$factory['factoryPayInfo']
										.",".empty($factory['factoryFloorArea'])?0:$factory['factoryFloorArea']
										.",".empty($factory['factoryBuildArea'])?0:$factory['factoryBuildArea']
										.",".empty($factory['factoryOfficeArea'])?0:$factory['factoryOfficeArea']
										.",".empty($factory['factoryWorkshopArea'])?0:$factory['factoryWorkshopArea']
										.",".empty($factory['factorySpaceArea'])?0:$factory['factorySpaceArea']
										.",'".empty($factory['factoryDormitory'])?'':$factory['factoryDormitory']
										."',".empty($factory['factoryBuildYear'])?0:$factory['factoryBuildYear']
										.",".empty($factory['factorySpan'])?0:$factory['factorySpan']
										.",".empty($factory['factoryAllFloor'])?0:$factory['factoryAllFloor']
										.",".empty($factory['factoryFloorHeight'])?0:$factory['factoryFloorHeight']
										.",".empty($factory['factoryLoadBearing'])?0:$factory['factoryLoadBearing']
										.",'".empty($factory['factoryBuildStructure'])?'':$factory['factoryBuildStructure']
										."','".empty($factory['factoryWater'])?'':$factory['factoryWater']
										."','".empty($factory['factoryHasCapacityNow'])?'':$factory['factoryHasCapacityNow']
										."','".empty($factory['factoryHasCapacityMax'])?'':$factory['factoryHasCapacityMax']
										."',".empty($factory['factoryRentPrice'])?0:$factory['factoryRentPrice']
										.",".empty($factory['factoryIncludFee'])?0:$factory['factoryIncludFee']
										.",".empty($factory['factoryPayment'])?0:$factory['factoryPayment']
										.",".empty($factory['factoryPayDetailY'])?0:$factory['factoryPayDetailY']
										.",".empty($factory['factoryPayDetailF'])?0:$factory['factoryPayDetailF']
										.",".empty($factory['factoryLeastYear'])?0:$factory['factoryLeastYear']
										.",".empty($factory['factorySellRentType'])?0:$factory['factorySellRentType']
										.",".empty($factory['factoryMapX'])?0:$factory['factoryMapX']
										.",".empty($factory['factoryMapY'])?0:$factory['factoryMapY']
										.",'".empty($factory['factoryAreaId'])?'':$factory['factoryAreaId']
										."',".empty($factory['factoryState'])?0:$factory['factoryState']
										.",".empty($factory['factoryUserId'])?0:$factory['factoryUserId']
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}

	public function countProperty($userId,$state){
		$sql = "select count(factoryId) as propTotal from ecms_factory where factoryUserId=".$userId." and factoryState=".$state;
		$result = $this->db->getQueryValue($sql);
		return $result['propTotal'];
	}

	public function delete($factoryId){
		$sql="update ecms_factory set factoryState=2 where factoryId=".$factoryId;
		return $this->db->getQueryExecute($sql);
	}
	
	public function getPropertyById($userId,$propId){ 
		$sql = "select factoryNumber,factoryName,factoryAddress,factoryType,factorySellPrice,factoryProFee,factoryManagentUnits,factoryPayInfo,".
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
		return $this->db->getQueryArray($sql);
	}
	//end to be added by Cheneil
	//修改厂房
	public function modify($factory){
		$sql="update ecms_factory set factoryNumber='"
			.empty($factory['factoryNumber'])?'':$factory['factoryNumber']
			."',factoryName='".empty($factory['factoryName'])?'':$factory['factoryName']
			."',factoryAddress='".empty($factory['factoryAddress'])?'':$factory['factoryAddress']
			."',factoryType=".empty($factory['factoryType'])?0:$factory['factoryType']
			.",factorySellPrice=".empty($factory['factorySellPrice'])?0:$factory['factorySellPrice']
			.",factoryProFee=".empty($factory['factoryProFee'])?0:$factory['factoryProFee']
			.",factoryManagentUnits='".empty($factory['factoryManagentUnits'])?'':$factory['factoryManagentUnits']
			."',factoryPayInfo=".empty($factory['factoryPayInfo'])?0:$factory['factoryPayInfo']
			.",factoryFloorArea=".empty($factory['factoryFloorArea'])?0:$factory['factoryFloorArea']
			.",factoryBuildArea=".empty($factory['factoryBuildArea'])?0:$factory['factoryBuildArea']
			.",factoryOfficeArea=".empty($factory['factoryOfficeArea'])?0:$factory['factoryOfficeArea']
			.",factoryWorkshopArea=".empty($factory['factoryWorkshopArea'])?0:$factory['factoryWorkshopArea']
			.",factorySpaceArea=".empty($factory['factorySpaceArea'])?0:$factory['factorySpaceArea']
			.",factoryDormitory='".empty($factory['factoryDormitory'])?0:$factory['factoryDormitory']
			."',factoryBuildYear=".empty($factory['factoryBuildYear'])?0:$factory['factoryBuildYear']
			.",factorySpan=".empty($factory['factorySpan'])?0:$factory['factorySpan']
			.",factoryAllFloor=".empty($factory['factoryAllFloor'])?0:$factory['factoryAllFloor']
			.",factoryFloorHeight='".empty($factory['factoryFloorHeight'])?'':$factory['factoryFloorHeight']
			."',factoryLoadBearing='".empty($factory['factoryLoadBearing'])?'':$factory['factoryLoadBearing']
			."',factoryBuildStructure='".empty($factory['factoryBuildStructure'])?0:$factory['factoryBuildStructure']
			."',factoryWater='".empty($factory['factoryWater'])?'':$factory['factoryWater']
			."',factoryHasCapacityNow='".empty($factory['factoryHasCapacityNow'])?'':$factory['factoryHasCapacityNow']
			."',factoryHasCapacityMax='".empty($factory['factoryHasCapacityMax'])?0:$factory['factoryHasCapacityMax']
			."',factoryRentPrice=".empty($factory['factoryRentPrice'])?0:$factory['factoryRentPrice']
			.",factoryIncludFee='".empty($factory['factoryIncludFee'])?'':$factory['factoryIncludFee']
			."',factoryPayment=".empty($factory['factoryPayment'])?0:$factory['factoryPayment']
			.",factoryPayDetailY=".empty($factory['factoryPayDetailY'])?0:$factory['factoryPayDetailY']
			.",factoryPayDetailF=".empty($factory['factoryPayDetailF'])?0:$factory['factoryPayDetailF']
			.",factoryLeastYear=".empty($factory['factoryLeastYear'])?0:$factory['factoryLeastYear']
			.",factorySellRentType=".empty($factory['factorySellRentType'])?0:$factory['factorySellRentType']
			.",factoryMapX=".empty($factory['factoryMapX'])?0:$factory['factoryMapX']
			.",factoryMapY=".empty($factory['factoryMapY'])?0:$factory['factoryMapY']
			.",factoryState=".empty($factory['factoryState'])?0:$factory['factoryState']
			.",factoryAreaId='".empty($factory['factoryAreaId'])?'':$factory['factoryAreaId']
			."',factoryUserId=".empty($factory['factoryUserId'])?0:$factory['factoryUserId']
			.",factoryUpdateTime=".time()
			." where factoryId=".$factory['factoryId'];
		return $this->db->getQueryExeCute($sql);
	}
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