<?php
class OfficeDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//added by Cheneil
	public function release($info){
		$sql="insert into ecms_office(officeNumber,officeType,officeSellPrice,officeRentPrice,officeRentPriceUnit,officeIncludFee,officeProFee,
			  officePayment,officePayDetailY,officePayDetailF,officeBuildArea,officeFloor,officeAllFloor,officeDivision,officeFitment,officeLevel,
			  officeTitle,officeContent,officeTraffic,officeSellRentType,officeState,officeCommunityId,officeUserId,officeCreateTime,officeUpdateTime) 
			  values('".(empty($info['officeNumber'])?'':$info['officeNumber'])."',
			  ".(empty($info['officeType'])?0:$info['officeType']).",
			  ".(empty($info['officeSellPrice'])?0:$info['officeSellPrice']).",
			  ".(empty($info['officeRentPrice'])?0:$info['officeRentPrice']).",
			  ".(empty($info['officeRentPriceUnit'])?0:$info['officeRentPriceUnit']).",
			  ".(empty($info['officeIncludFee'])?0:$info['officeIncludFee']).",
			  ".(empty($info['officeProFee'])?0:$info['officeProFee']).",
			  ".(empty($info['officePayment'])?0:$info['officePayment']).",
			  ".(empty($info['officePayDetailY'])?0:$info['officePayDetailY']).",
			  ".(empty($info['officePayDetailF'])?0:$info['officePayDetailF']).",
			  ".(empty($info['officeBuildArea'])?0:$info['officeBuildArea']).",
			  ".(empty($info['officeFloor'])?0:$info['officeFloor']).",
			  ".(empty($info['officeAllFloor'])?0:$info['officeAllFloor']).",
			  ".(empty($info['officeDivision'])?0:$info['officeDivision']).",
			  ".(empty($info['officeFitment'])?0:$info['officeFitment']).",
			  ".(empty($info['officeLevel'])?0:$info['officeLevel']).",
			  '".(empty($info['officeTitle'])?'':$info['officeTitle'])."',
			  '".(empty($info['officeContent'])?'':$info['officeContent'])."',
			  '".(empty($info['officeTraffic'])?'':$info['officeTraffic'])."',
			  ".(empty($info['officeSellRentType'])?0:$info['officeSellRentType']).",
			  ".(empty($info['officeState'])?0:$info['officeState']).",
			  ".(empty($info['officeCommunityId'])?0:$info['officeCommunityId']).",
			  ".(empty($info['officeUserId'])?0:$info['officeUserId']).",".time().",".time().")";
		//echo 'sql->'.$sql;
		$this->db->query($sql);
		$officeId = $this->db->getInsertNum();
		return $officeId;					
	}

	public function countProperty($userId,$state,$txType=1){
		$sql = "select count(officeId) as propTotal from ecms_office where officeUserId=".$userId." and officeSellRentType=".$txType;
		if($state == 1){
			$sql .= " and officeState in(1,5)";
		}else{
			$sql .= " and officeState=".$state;
		}
		$result = $this->db->getQueryValue($sql);
		return $result['propTotal'];
	}

	public function delete($officeId){
		$sql="update ecms_office set officeState=2 where officeId=".$officeId;
		return $this->db->getQueryExecute($sql);
	}

	public function getPropertyById($userId,$propId){ 
		$sql = "select officeNumber,officeType,officeSellPrice,officeRentPrice,officeRentPriceUnit,officeIncludFee,officeProFee,".
			   "officePayment,officePayDetailY,officePayDetailF,officeBuildArea,officeFloor,officeAllFloor,officeDivision,officeFitment,officeLevel,".
			   "officeTitle,officeContent,officeTraffic,officeSellRentType,officeState,".
			   "(select communityName from ecms_community where communityId=officeCommunityId) as propName,officeCommunityId,".
			   "picId,picURl as propPhoto,officeUserId,officeCreateTime,officeUpdateTime ".	 
				"from ecms_office prop left join ecms_pic pic on picBuildType=3 and picBuildId=officeId and picState=1 ".
				"where officeId=".$propId;
		if($userId > 0){
			$sql .= " and officeUserId=".$userId;
		}
		return $this->db->getQueryValue($sql);
	}
	public function modify($info){
		$sql = "update ecms_office set ";
		if(isset($info['officeNumber'])){
			$sql .= "officeNumber='".$info['officeNumber']."',";
		} 
		if(isset($info['officeType'])){
			$sql .= "officeType=".$info['officeType'].",";
		} 
		if(isset($info['officeNumber'])){
			$sql .= "officeNumber='".$info['officeNumber']."',";
		} 
		if(isset($info['officeSellPrice']) && $info['officeSellPrice'] > 0){
			$sql .= "officeSellPrice=".$info['officeSellPrice'].",";
		} 
		if(isset($info['officeRentPrice']) && $info['officeRentPrice'] > 0){
			$sql .= "officeRentPrice=".$info['officeRentPrice'].",";
		} 
		if(isset($info['officeRentPriceUnit']) && $info['officeRentPriceUnit'] > 0){
			$sql .= "officeRentPriceUnit=".$info['officeRentPriceUnit'].",";
		} 
		
		if(isset($info['officeIncludFee'])){
			$sql .= "officeIncludFee=".$info['officeIncludFee'].",";
		} 
		
		if(isset($info['officeProFee'])){
			$sql .= "officeProFee=".$info['officeProFee'].",";
		} 
		
		if(isset($info['officePayment'])){
			$sql .= "officePayment=".$info['officePayment'].",";
		} 
		
		if(isset($info['officePayDetailY'])){
			$sql .= "officePayDetailY=".$info['officePayDetailY'].",";
		} 
		
		if(isset($info['officePayDetailF'])){
			$sql .= "officePayDetailF=".$info['officePayDetailF'].",";
		} 
		if(isset($info['officeBuildArea'])){
			$sql .= "officeBuildArea=".$info['officeBuildArea'].",";
		} 
		if(isset($info['officeFloor'])){
			$sql .= "officeFloor=".$info['officeFloor'].",";
		} 
		if(isset($info['officeFloor'])){
			$sql .= "officeFloor=".$info['officeFloor'].",";
		} 
		if(isset($info['officeAllFloor'])){
			$sql .= "officeAllFloor=".$info['officeAllFloor'].",";
		} 
		if(isset($info['officeDivision'])){
			$sql .= "officeDivision=".$info['officeDivision'].",";
		} 
		if(isset($info['officeFitment'])){
			$sql .= "officeFitment=".$info['officeFitment'].",";
		} 
		if(isset($info['officeLevel'])){
			$sql .= "officeLevel=".$info['officeLevel'].",";
		} 
		if(isset($info['officeTitle'])){
			$sql .= "officeTitle='".$info['officeTitle']."',";
		} 
		if(isset($info['officeContent'])){
			$sql .= "officeContent='".$info['officeContent']."',";
		} 
		if(isset($info['officeTraffic'])){
			$sql .= "officeTraffic='".$info['officeTraffic']."',";
		} 
		if(isset($info['officeSellRentType'])){
			$sql .= "officeSellRentType=".$info['officeSellRentType'].",";
		} 
		if(isset($info['officeState'])){
			$sql .= "officeState=".$info['officeState'].",";
		} 
		$sql .= "officeUpdateTime=".time()." where officeId=".$info['officeId'];
		return $this->db->getQueryExeCute($sql);
	}
	public function refresh($propId){
		$sql = "update ecms_office set officeUpdateTime=".time()." where officeId=".$propId;
		return $this->db->getQueryExeCute($sql);
	}
	//end to be added by Cheneil
	public function getDetail(){
		
	}
}
?>