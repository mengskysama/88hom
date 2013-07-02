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
			  officeTitle,officeContent,officeSellRentType,officeState,officeCommunityId,officeUserId,officeCreateTime,officeUpdateTime) 
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
			  ".(empty($info['officeSellRentType'])?0:$info['officeSellRentType']).",
			  ".(empty($info['officeState'])?0:$info['officeState']).",
			  ".(empty($info['officeCommunityId'])?0:$info['officeCommunityId']).",
			  ".(empty($info['officeUserId'])?0:$info['officeUserId']).",".time().",".time().")";
		//echo 'sql->'.$sql;
		$this->db->query($sql);
		$officeId = $this->db->getInsertNum();
		return $officeId;					
	}

	public function countProperty($userId,$state){
		$sql = "select count(officeId) as propTotal from ecms_office where officeUserId=".$userId." and officeState=".$state;
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
			   "officeTitle,officeContent,officeSellRentType,officeState,".
			   "(select communityName from ecms_community where communityId=officeCommunityId) as propName,officeCommunityId,".
			   "(select picUrl from ecms_pic where picBuildType=3 and picBuildId=officeId limit 1) as propPhoto,officeUserId,officeCreateTime,officeUpdateTime ".
	 
				"from ecms_office ".
				"where officeId=".$propId;
		if($userId > 0){
			$sql .= " and officeUserId=".$userId;
		}
		return $this->db->getQueryArray($sql);
	}
	//end to be added by Cheneil
	public function modify($info){
		$sql="update ecms_office set 
			  officeNumber='".(empty($info['officeNumber'])?'':$info['officeNumber'])."',
			  officeType=".(empty($info['officeType'])?0:$info['officeType']).",
			  officeSellPrice=".(empty($info['officeSellPrice'])?0:$info['officeSellPrice']).",
			  officeRentPrice=".(empty($info['officeRentPrice'])?0:$info['officeRentPrice']).",
			  officeRentPriceUnit=".(empty($info['officeRentPriceUnit'])?0:$info['officeRentPriceUnit']).",
			  officeIncludFee=".(empty($info['officeIncludFee'])?0:$info['officeIncludFee']).",
			  officeProFee=".(empty($info['officeProFee'])?0:$info['officeProFee']).",
			  officePayment=".(empty($info['officePayment'])?0:$info['officePayment']).",
			  officePayDetailY=".(empty($info['officePayDetailY'])?0:$info['officePayDetailY']).",
			  officePayDetailF=".(empty($info['officePayDetailF'])?0:$info['officePayDetailF']).",
			  officeBuildArea=".(empty($info['officeBuildArea'])?0:$info['officeBuildArea']).",
			  officeFloor=".(empty($info['officeFloor'])?0:$info['officeFloor']).",
			  officeAllFloor=".(empty($info['officeAllFloor'])?0:$info['officeAllFloor']).",
			  officeDivision=".(empty($info['officeDivision'])?0:$info['officeDivision']).",
			  officeFitment=".(empty($info['officeFitment'])?0:$info['officeFitment']).",
			  officeLevel=".(empty($info['officeLevel'])?0:$info['officeLevel']).",
			  officeTitle='".(empty($info['officeTitle'])?0:$info['officeTitle'])."',
			  officeContent='".(empty($info['officeContent'])?0:$info['officeContent'])."',
			  officeSellRentType=".(empty($info['officeSellRentType'])?0:$info['officeSellRentType']).",
			  officeState=".(empty($info['officeState'])?0:$info['officeState']).",
			  officeUpdateTime=".time()." 
			  where officeId=".$info['officeId'];
		return $this->db->getQueryExeCute($sql);
	}
	public function getDetail(){
		
	}
}
?>