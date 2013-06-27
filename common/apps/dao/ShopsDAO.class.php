<?php
class ShopsDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	public function release($info){
		$sql="insert into ecms_shops(shopsName,shopsAddress,shopsTitle,shopsContent,shopsType,shopsSellPrice,shopsRentPrice,
			  shopsRentPriceUnit,shopsRentState,shopsPayment,shopsPayDetailY,shopsPayDetailF,shopsBuildArea,shopsFloor,shopsAllFloor,shopsDivision,
			  shopsFitment,shopsBaseService,shopsAimOperastion,shopsIncludFee,shopsPropFee,shopsTransferFee,shopsNumber,shopsSellRentType,
			  shopsMapX,shopsMapY,shopsState,shopsUserId,shopsCommunityId,shopsCreateTime,shopsUpdateTime) 
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
			  '".(empty($info['shopsAimOperasion'])?'':$info['shopsAimOperasion'])."',
			  ".(empty($info['shopsIncludFee'])?0:$info['shopsIncludFee']).",
			  ".(empty($info['shopsPropFee'])?0:$info['shopsPropFee']).",
			  '".(empty($info['shopsTransferFee'])?'':$info['shopsTransferFee'])."',
			  '".(empty($info['shopsNumber'])?'':$info['shopsNumber'])."',
			  ".(empty($info['shopsSellRentType'])?0:$info['shopsSellRentType']).",
			  ".(empty($info['shopsMapX'])?0:$info['shopsMapX']).",
			  ".(empty($info['shopsMapY'])?0:$info['shopsMapY']).",
			  ".(empty($info['shopsState'])?0:$info['shopsState']).",
			  ".(empty($info['shopsUserId'])?0:$info['shopsUserId']).",
			  ".(empty($info['shopsPropertyId'])?0:$info['shopsPropertyId']).",".time().",".time().")";
		
		$this->db->query($sql);
		$shopId = $this->db->getInsertNum();
		return $shopId;					
	}
	public function modify($info){
		$sql="update ecms_shops set 
			  shopsName='".(empty($info['shopsName'])?'':$info['shopsName'])."',
			  shopsAddress='".(empty($info['shopsAddress'])?0:$info['shopsAddress'])."',
			  shopsTitle='".(empty($info['shopsTitle'])?0:$info['shopsTitle'])."',
			  shopsContent='".(empty($info['shopsContent'])?0:$info['shopsContent'])."',
			  shopsType=".(empty($info['shopsType'])?0:$info['shopsType']).",
			  shopsSellPrice=".(empty($info['shopsSellPrice'])?0:$info['shopsSellPrice']).",
			  shopsRentPrice=".(empty($info['shopsRentPrice'])?0:$info['shopsRentPrice']).",
			  shopsRentPriceUnit=".(empty($info['shopsRentPriceUnit'])?0:$info['shopsRentPriceUnit']).",
			  shopsRentState=".(empty($info['shopsRentState'])?0:$info['shopsRentState']).",
			  shopsPayment=".(empty($info['shopsPayment'])?0:$info['shopsPayment']).",
			  shopsPayDetailY=".(empty($info['shopsPayDetailY'])?0:$info['shopsPayDetailY']).",
			  shopsPayDetailF=".(empty($info['shopsPayDetailF'])?0:$info['shopsPayDetailF']).",
			  shopsBuildArea=".(empty($info['shopsBuildArea'])?0:$info['shopsBuildArea']).",
			  shopsFloor=".(empty($info['shopsFloor'])?0:$info['shopsFloor']).",
			  shopsAllFloor=".(empty($info['shopsAllFloor'])?0:$info['shopsAllFloor']).",
			  shopsDivision=".(empty($info['shopsDivision'])?0:$info['shopsDivision']).",
			  shopsFitment=".(empty($info['shopsFitment'])?0:$info['shopsFitment']).",
			  shopsBaseService='".(empty($info['shopsBaseService'])?0:$info['shopsBaseService'])."',
			  shopsAimOperasion='".(empty($info['shopsAimOperasion'])?0:$info['shopsAimOperasion'])."',
			  shopsIncludFee=".(empty($info['shopsIncludFee'])?0:$info['shopsIncludFee']).",
			  shopsPropFee=".(empty($info['shopsPropFee'])?0:$info['shopsPropFee']).",
			  shopsTransferFee=".(empty($info['shopsTransferFee'])?0:$info['shopsTransferFee']).",
			  shopsNumber='".(empty($info['shopsNumber'])?0:$info['shopsNumber'])."',
			  shopsSellRentType=".(empty($info['shopsSellRentType'])?0:$info['shopsSellRentType']).",
			  shopsMapX=".(empty($info['shopsMapX'])?0:$info['shopsMapX']).",
			  shopsMapY=".(empty($info['shopsMapY'])?0:$info['shopsMapY']).",
			  shopsState=".(empty($info['shopsState'])?0:$info['shopsState']).",
			  shopsUserId=".(empty($info['shopsUserId'])?0:$info['shopsUserId']).",
			  shopsPropertyId=".(empty($info['shopsPropertyId'])?0:$info['shopsPropertyId']).",
			  shopsUpdateTime=".time()." 
			  where officeId=".$info['officeId'];
		return $this->db->getQueryExeCute($sql);
	}
	public function getDetail(){
		
	}
	public function delete(){
		
	}
}
?>