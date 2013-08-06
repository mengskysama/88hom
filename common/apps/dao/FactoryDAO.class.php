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
										factorySellRentType,factoryProvince,factoryCity,factoryDistrict,factoryArea,factoryState,factoryUserId,factoryCreateTime,factoryUpdateTime) values('"
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
										.",".($factory['factoryProvince'] == ""?1000000:$factory['factoryProvince'])
										.",".($factory['factoryCity'] == ""?1000000:$factory['factoryCity'])
										.",".($factory['factoryDistrict'] == ""?1000000:$factory['factoryDistrict'])
										.",".($factory['factoryArea'] == ""?1000000:$factory['factoryArea'])
										.",".(empty($factory['factoryState'])?0:$factory['factoryState'])
										.",".(empty($factory['factoryUserId'])?0:$factory['factoryUserId'])
										.",".time()
										.",".time()
										.")";
		//echo "<br>".$sql;return;
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
			   "factorySellRentType,factoryProvince,factoryCity,factoryDistrict,factoryArea,factoryState,".
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
		if(isset($factory['factoryProFee']) && !empty($factory['factoryProFee'])){
			$sql .= "factoryProFee=".$factory['factoryProFee'].",";
		}			
		if(isset($factory['factoryManagentUnits'])){
			$sql .= "factoryManagentUnits='".$factory['factoryManagentUnits']."',";
		}				
		if(isset($factory['factoryPayInfo'])){
			$sql .= "factoryPayInfo=".$factory['factoryPayInfo'].",";
		}			
		if(isset($factory['factoryFloorArea']) && !empty($factory['factoryFloorArea'])){
			$sql .= "factoryFloorArea=".$factory['factoryFloorArea'].",";
		}			
		if(isset($factory['factoryBuildArea']) && !empty($factory['factoryBuildArea'])){
			$sql .= "factoryBuildArea=".$factory['factoryBuildArea'].",";
		}					
		if(isset($factory['factoryOfficeArea']) && !empty($factory['factoryOfficeArea'])){
			$sql .= "factoryOfficeArea=".$factory['factoryOfficeArea'].",";
		}				
		if(isset($factory['factoryWorkshopArea']) && !empty($factory['factoryWorkshopArea'])){
			$sql .= "factoryWorkshopArea=".$factory['factoryWorkshopArea'].",";
		}				
		if(isset($factory['factorySpaceArea']) && !empty($factory['factorySpaceArea'])){
			$sql .= "factorySpaceArea=".$factory['factorySpaceArea'].",";
		}				
		if(isset($factory['factoryDormitory'])){
			$sql .= "factoryDormitory='".$factory['factoryDormitory']."',";
		}				
		if(isset($factory['factoryBuildYear'])){
			$sql .= "factoryBuildYear=".($factory['factoryBuildYear'] == "" ? 0 : $factory['factoryBuildYear']).",";
		}				
		if(isset($factory['factorySpan']) && !empty($factory['factorySpan'])){
			$sql .= "factorySpan=".$factory['factorySpan'].",";
		}				
		if(isset($factory['factoryAllFloor']) && !empty($factory['factoryAllFloor'])){
			$sql .= "factoryAllFloor=".$factory['factoryAllFloor'].",";
		}				
		if(isset($factory['factoryFloorHeight']) && !empty($factory['factoryFloorHeight'])){
			$sql .= "factoryFloorHeight=".$factory['factoryFloorHeight'].",";
		}				
		if(isset($factory['factoryLoadBearing']) && !empty($factory['factoryLoadBearing'])){
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
			$sql .= "factoryIncludFee=".($factory['factoryIncludFee'] == "" ? 0 : $factory['factoryIncludFee']).",";
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
			$sql .= "factoryLeastYear=".($factory['factoryLeastYear'] == "" ? 0 : $factory['factoryLeastYear']).",";
		}				
		if(isset($factory['factorySellRentType'])){
			$sql .= "factorySellRentType=".$factory['factorySellRentType'].",";
		}						
		if(isset($factory['factoryProvince'])){
			$sql .= "factoryProvince=".$factory['factoryProvince'].",";
		}					
		if(isset($factory['factoryCity'])){
			$sql .= "factoryCity=".$factory['factoryCity'].",";
		}					
		if(isset($factory['factoryDistrict'])){
			$sql .= "factoryDistrict=".$factory['factoryDistrict'].",";
		}					
		if(isset($factory['factoryArea'])){
			$sql .= "factoryArea=".$factory['factoryArea'].",";
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
	//added by david 
	//搜索查询获取厂房出售列表信息
	public function getFactorySellListForSearch($where='',$group='',$order='',$limit=''){
		if($where!=''){
			$where.=' AND f.factorySellRentType=1 AND ud.userdetailState=2';
		}else{
			$where='WHERE f.factorySellRentType=1 AND ud.userdetailState=2';
		}
		$sql="SELECT f.*,u.userId,ud.userdetailName,i.imcpId,i.imcpShortName,p.picUrl,p.picThumb,p.picInfo  
			  FROM ecms_factory AS f 
			  INNER JOIN ecms_user AS u ON f.factoryUserId=u.userId AND f.factoryState=5 AND u.userState=1 AND u.userType=2 
			  INNER JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId AND i.imcpState=1 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=f.factoryId AND p.picState=1 AND p.pictypeId=1 AND p.picBuildType=5 AND p.picSellRent=1 
			  $where 
			  $group 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	//搜索查询获取住宅出售总数信息
	public function getFactorySellCountForSearch($where='',$group=''){
		if($where!=''){
			$where.=' AND f.factorySellRentType=1 AND ud.userdetailState=2';
		}else{
			$where='WHERE f.factorySellRentType=1 AND ud.userdetailState=2';
		}
		$sql="SELECT COUNT(*) AS counts FROM (SELECT f.factoryId FROM ecms_factory AS f 
			  INNER JOIN ecms_user AS u ON f.factoryUserId=u.userId AND f.factoryState=5 AND u.userState=1
			  INNER JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId AND i.imcpState=1 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=f.factoryId AND p.picState=1 AND p.pictypeId=1 AND p.picBuildType=5 AND p.picSellRent=1 
			  $where 
			  $group) as tb_new";
		return $this->db->getQueryValue($sql);
	}
	//搜索查询获取厂房出租列表信息
	public function getFactoryRentListForSearch($where='',$group='',$order='',$limit=''){
		if($where!=''){
			$where.=' AND f.factorySellRentType=2 AND ud.userdetailState=2';
		}else{
			$where='WHERE f.factorySellRentType=2 AND ud.userdetailState=2';
		}
		$sql="SELECT f.*,u.userId,ud.userdetailName,i.imcpId,i.imcpShortName,p.picUrl,p.picThumb,p.picInfo  
			  FROM ecms_factory AS f 
			  INNER JOIN ecms_user AS u ON f.factoryUserId=u.userId AND f.factoryState=5 AND u.userState=1 AND u.userType=2 
			  INNER JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId AND i.imcpState=1 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=f.factoryId AND p.picState=1 AND p.pictypeId=1 AND p.picBuildType=5 AND p.picSellRent=2 
			  $where 
			  $group 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	//搜索查询获取厂房出租总数信息
	public function getFactoryRentCountForSearch($where='',$group=''){
		if($where!=''){
			$where.=' AND f.factorySellRentType=2 AND ud.userdetailState=2';
		}else{
			$where='WHERE f.factorySellRentType=2 AND ud.userdetailState=2';
		}
		$sql="SELECT COUNT(*) AS counts FROM (SELECT f.factoryId FROM ecms_factory AS f 
			  INNER JOIN ecms_user AS u ON f.factoryUserId=u.userId AND f.factoryState=5 AND u.userState=1
			  INNER JOIN ecms_user_detail AS ud ON u.userId=ud.userId 
			  LEFT JOIN ecms_imcp AS i ON ud.imcpId=i.imcpId AND i.imcpState=1 
			  LEFT JOIN ecms_pic AS p ON p.picBuildId=f.factoryId AND p.picState=1 AND p.pictypeId=1 AND p.picBuildType=5 AND p.picSellRent=2 
			  $where 
			  $group) as tb_new";
		return $this->db->getQueryValue($sql);
	}
	//点击统计
	public function clickCount($id){
		$sql="update ecms_factory set factoryClickCount=factoryClickCount+1 where factoryId=$id";
		return $this->db->getQueryExecute($sql);
	}
	//end to be added by david
}
?>