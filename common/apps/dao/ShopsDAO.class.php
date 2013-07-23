<?php
class ShopsDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//added by Cheneil
	public function release($info){
		$sql="insert into ecms_shops(shopsName,shopsAddress,shopsTitle,shopsContent,shopsType,shopsSellPrice,shopsRentPrice,
			  shopsRentPriceUnit,shopsRentState,shopsPayment,shopsPayDetailY,shopsPayDetailF,shopsBuildArea,shopsFloor,shopsAllFloor,shopsDivision,
			  shopsFitment,shopsBaseService,shopsAimOperastion,shopsIncludFee,shopsPropFee,shopsTransfer,shopsTransferFee,shopsNumber,shopsSellRentType,
			  shopsMapX,shopsMapY,shopsState,shopsUserId,shopsCommunityId,shopsTraffic,shopsSet,shopsCreateTime,shopsUpdateTime) 
			  values('".(empty($info['shopsName'])?'':$info['shopsName'])."',
			  '".(empty($info['shopsAddress'])?'':$info['shopsAddress'])."',
			  '".(empty($info['shopsTitle'])?'':$info['shopsTitle'])."',
			  '".(empty($info['shopsContent'])?'':$info['shopsContent'])."',
			  ".(empty($info['shopsType'])?0:$info['shopsType']).",
			  ".(empty($info['shopsSellPrice'])?0:$info['shopsSellPrice']).",
			  ".(empty($info['shopsRentPrice'])?0:$info['shopsRentPrice']).",
			  ".(empty($info['shopsRentPriceUnit'])?0:$info['shopsRentPriceUnit']).",
			  ".(empty($info['shopsRentState'])?0:$info['shopsRentState']).",
			  ".(empty($info['shopsPayment'])?0:$info['shopsPayment']).",
			  ".(empty($info['shopsPayDetailY'])?0:$info['shopsPayDetailY']).",
			  ".(empty($info['shopsPayDetailF'])?0:$info['shopsPayDetailF']).",
			  ".(empty($info['shopsBuildArea'])?0:$info['shopsBuildArea']).",
			  ".(empty($info['shopsFloor'])?0:$info['shopsFloor']).",
			  ".(empty($info['shopsAllFloor'])?0:$info['shopsAllFloor']).",
			  ".(empty($info['shopsDivision'])?0:$info['shopsDivision']).",
			  ".(empty($info['shopsFitment'])?0:$info['shopsFitment']).",
			  '".(empty($info['shopsBaseService'])?'':$info['shopsBaseService'])."',
			  '".(empty($info['shopsAimOperastion'])?'':$info['shopsAimOperastion'])."',
			  ".(empty($info['shopsIncludFee'])?0:$info['shopsIncludFee']).",
			  ".(empty($info['shopsPropFee'])?0:$info['shopsPropFee']).",
			  ".(empty($info['shopsTransfer'])?0:$info['shopsTransfer']).",
			  '".(empty($info['shopsTransferFee'])?'':$info['shopsTransferFee'])."',
			  '".(empty($info['shopsNumber'])?'':$info['shopsNumber'])."',
			  ".(empty($info['shopsSellRentType'])?0:$info['shopsSellRentType']).",
			  ".(empty($info['shopsMapX'])?0:$info['shopsMapX']).",
			  ".(empty($info['shopsMapY'])?0:$info['shopsMapY']).",
			  ".(empty($info['shopsState'])?0:$info['shopsState']).",
			  ".(empty($info['shopsUserId'])?0:$info['shopsUserId']).",
			  ".(empty($info['shopsCommunityId'])?0:$info['shopsCommunityId']).",
			  '".(empty($info['shopsTraffic'])?'':$info['shopsTraffic'])."',
			  '".(empty($info['shopsSet'])?'':$info['shopsSet'])."',".time().",".time().")";
		
		$this->db->query($sql);
		$shopId = $this->db->getInsertNum();
		return $shopId;					
	}

	public function countProperty($userId,$state,$txType=1){
		$sql = "select count(shopsId) as propTotal from ecms_shops where shopsUserId=".$userId." and shopsSellRentType=".$txType;
		if($state == 1){
			$sql .= " and shopsState in(1,5)";
		}else{
			$sql .= " and shopsState=".$state;
		}
		$result = $this->db->getQueryValue($sql);
		return $result['propTotal'];
	}

	public function delete($shopsId){
		$sql="update ecms_shops set shopsState=2 where shopsId=".$shopsId;
		return $this->db->getQueryExecute($sql);
	}

	public function getPropertyById($userId,$propId){
		$sql = "select shopsName,shopsAddress,shopsTitle,shopsContent,shopsType,shopsSellPrice,shopsRentPrice,".
			   "shopsRentPriceUnit,shopsRentState,shopsPayment,shopsPayDetailY,shopsPayDetailF,shopsBuildArea,shopsFloor,shopsAllFloor,shopsDivision,".
			   "shopsFitment,shopsBaseService,shopsAimOperastion,shopsIncludFee,shopsPropFee,shopsTransfer,shopsTransferFee,shopsNumber,shopsSellRentType,(select communityName from ecms_community where communityId=shopsCommunityId) as propName,".
			   "shopsMapX,shopsMapY,shopsState,shopsUserId,shopsCommunityId,shopsTraffic,shopsSet,picId,picURl as propPhoto,shopsCreateTime,shopsUpdateTime ". 
				"from ecms_shops prop left join ecms_pic pic on picBuildType=2 and picBuildId=shopsId and picState=1 ".
				"where shopsId=".$propId;
		if($userId > 0){
			$sql .= " and shopsUserId=".$userId;
		}
		return $this->db->getQueryValue($sql);
	}
	public function modify($info){
		$sql = "update ecms_shops set ";
		if(isset($info['shopsAddress'])){
			$sql .= "shopsAddress='".$info['shopsAddress']."',";
		}
		if(isset($info['shopsTitle'])){
			$sql .= "shopsTitle='".$info['shopsTitle']."',";
		} 
		if(isset($info['shopsContent'])){
			$sql .= "shopsContent='".$info['shopsContent']."',";
		} 
		if(isset($info['shopsType']) && $info['shopsType'] > 0){
			$sql .= "shopsType=".$info['shopsType'].",";
		} 
		if(isset($info['shopsSellPrice'])){
			$sql .= "shopsSellPrice=".$info['shopsSellPrice'].",";
		} 
		if(isset($info['shopsBuildArea'])){
			$sql .= "shopsBuildArea=".$info['shopsBuildArea'].",";
		} 
		if(isset($info['shopsFloor'])){
			$sql .= "shopsFloor=".$info['shopsFloor'].",";
		} 
		if(isset($info['shopsAllFloor'])){
			$sql .= "shopsAllFloor=".$info['shopsAllFloor'].",";
		} 
		if(isset($info['shopsDivision'])){
			$sql .= "shopsDivision=".$info['shopsDivision'].",";
		} 
		if(isset($info['shopsFitment'])){
			$sql .= "shopsFitment=".$info['shopsFitment'].",";
		} 
		if(isset($info['shopsBaseService'])){
			$sql .= "shopsBaseService='".$info['shopsBaseService']."',";
		}
		if(isset($info['shopsAimOperastion'])){
			$sql .= "shopsAimOperastion='".$info['shopsAimOperastion']."',";
		}
		if(isset($info['shopsIncludFee'])){
			$sql .= "shopsIncludFee=".$info['shopsIncludFee'].",";
		}
		if(isset($info['shopsPropFee'])){
			$sql .= "shopsPropFee=".$info['shopsPropFee'].",";
		}
		if(isset($info['shopsTransfer'])){
			$sql .= "shopsTransfer=".$info['shopsTransfer'].",";
		}
		if(isset($info['shopsTransferFee'])){
			$sql .= "shopsTransferFee=".$info['shopsTransferFee'].",";
		}
		if(isset($info['shopsRentState'])){
			$sql .= "shopsRentState=".$info['shopsRentState'].",";
		}
		if(isset($info['shopsPayment'])){
			$sql .= "shopsPayment=".$info['shopsPayment'].",";
		}
		if(isset($info['shopsPayDetailY'])){
			$sql .= "shopsPayDetailY=".$info['shopsPayDetailY'].",";
		}
		if(isset($info['shopsPayDetailF'])){
			$sql .= "shopsPayDetailF=".$info['shopsPayDetailF'].",";
		}
		if(isset($info['shopsNumber'])){
			$sql .= "shopsNumber='".$info['shopsNumber']."',";
		}
		if(isset($info['shopsState'])){
			$sql .= "shopsState=".$info['shopsState'].",";
		}
		if(isset($info['shopsRentPrice'])){
			$sql .= "shopsRentPrice=".$info['shopsRentPrice'].",";
		}
		if(isset($info['shopsRentPriceUnit'])){
			$sql .= "shopsRentPriceUnit=".$info['shopsRentPriceUnit'].",";
		}
		if(isset($info['shopsTraffic'])){
			$sql .= "shopsTraffic='".$info['shopsTraffic']."',";
		}
		if(isset($info['shopsSet'])){
			$sql .= "shopsSet='".$info['shopsSet']."',";
		}
		$sql .= "shopsUpdateTime=".time()." where shopsId=".$info['shopId'];
		return $this->db->getQueryExeCute($sql);
	}
	public function refresh($propId){
		$sql = "update ecms_shops set shopsUpdateTime=".time()." where villaId=".$propId;
		return $this->db->getQueryExeCute($sql);
	}
	//end to be added by Cheneil
	public function getDetail(){
		
	}
}
?>