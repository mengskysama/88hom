<?php
require_once 'PropertyHandler.class.php';
class ShopPropertyHandler extends PropertyHandler{
	private $db;
	private $estId;
	private $estName;
	private $shopsAddress;
	private $shopsType;
	private $shopsAreaId;
	private $shopsNumber;
	private $shopsSellPrice;
	private $shopsPropFee;
	private $shopsIncludFee;
	private $shopsTransfer;
	private $shopsTransferFee;
	private $shopsBuildArea;
	private $shopsFloor;
	private $shopsAllFloor;
	private $shopsDivision;
	private $shopsFitment;
	private $shopsBaseService;
	private $shopsAimOperastion;
	private $shopPhoto;
	private $shopsTitle;
	private $shopsContent;
	private $shopUserId;
	private $shopsState;
	private $actionType;
	private $shopId;
	private $propTxType;
	private $shopsRentPrice;
	private $shopsRentPriceUnit;
	private $shopsTraffic;
	private $shopsSet;
	private $topPic;
	private $shopsRentState;
	private $shopsPayment;
	private $shopsPayDetailY;
	private $shopsPayDetailF;
	
	private $estateService;
	private $propertyService;
	
	function __construct($db,$estId,$estName,$shopsAddress,$shopsType,$shopsAreaId,$shopsNumber,
						$shopsSellPrice,$shopsIncludFee,$shopsPropFee,$shopsTransfer,$shopsTransferFee,
						$shopsBuildArea,$shopsFloor,$shopsAllFloor,$shopsDivision,
						$shopsFitment,$shopsBaseService,$shopsAimOperastion,$shopPhoto,$shopsTitle,
						$shopContent,$shopUserId,$shopsState,$actionType,$shopId,$propTxType,$shopsRentPrice,$shopsRentPriceUnit,
						$shopsTraffic,$shopsSet,$topPic,$shopsRentState,$shopsPayment,$shopsPayDetailY,$shopsPayDetailF){
		
		$this->db = $db;
		$this->estId = $estId;
		$this->estName = $estName;
		$this->shopsAddress = $shopsAddress;
		$this->shopsType = $shopsType;
		$this->shopsAreaId = $shopsAreaId;
		$this->shopsNumber = $shopsNumber;
		$this->shopsSellPrice = $shopsSellPrice;
		$this->shopsPropFee = $shopsPropFee;
	    $this->shopsIncludFee = $shopsIncludFee;
		$this->shopsTransfer = $shopsTransfer;
		$this->shopsTransferFee = $shopsTransferFee;
		$this->shopsBuildArea = $shopsBuildArea;
		$this->shopsFloor = $shopsFloor;
		$this->shopsAllFloor = $shopsAllFloor;
		$this->shopsDivision = $shopsDivision;
		$this->shopsFitment = $shopsFitment;
		$this->shopsBaseService = $shopsBaseService;
		$this->shopsAimOperastion = $shopsAimOperastion;
		$this->shopPhoto = $shopPhoto;
		$this->shopsTitle = $shopsTitle;
		$this->shopsContent = $shopContent;
		$this->shopUserId = $shopUserId;
		$this->shopsState = $shopsState;
		$this->actionType = $actionType;
		$this->shopId = $shopId;
		$this->propTxType = $propTxType;
		$this->shopsRentPrice = $shopsRentPrice;
		$this->shopsRentPriceUnit = $shopsRentPriceUnit;
	    $this->shopsTraffic = $shopsTraffic;
		$this->shopsSet = $shopsSet;
		$this->topPic = $topPic;
		$this->shopsRentState = $shopsRentState;
		$this->shopsPayment = $shopsPayment;
		$this->shopsPayDetailY = $shopsPayDetailY;
		$this->shopsPayDetailF = $shopsPayDetailF;
		
		$this->estateService = new EstateService($db);
		$this->propertyService = new SecondHandPropertyService($db);
	}
	
	public function handle(){
		$result = false;
		if($this->actionType == "update"){
			$result = $this->updateProperty();
		}else{
			$result = $this->createProperty();
		}
		if(!$result) return false;

		$this->topPic['picBuildId'] = $this->shopId;
		return $this->handleTopPic($this->propertyService, $this->topPic);
	}
	
	private function updateProperty(){

		$shop = $this->genPropEntity($this->estId,$this->shopsState);
		$shop["shopId"] = $this->shopId;
		return $this->propertyService->updateShop($shop);
	}
	
	private function createProperty(){
		
		$realEstId = $this->getRealEstateId($this->estateService,$this->estId,$this->estName);
		if(!$realEstId) return false;

		$shop = $this->genPropEntity($realEstId,$this->shopsState);
		$shopId = $this->propertyService->saveShop($shop);
		if(!$shopId) return false;
		
		$this->shopId = $shopId;
		return true;
	} 

	private function genPropEntity($realEstId,$shopState){

		//save the property
		$shopsBaseService = "";
		if(!empty($this->shopsBaseService)){
			$shopsBaseService = ",";
			$len = count($this->shopsBaseService);
			for($i=0; $i<$len; $i++){
				$shopsBaseService .= $this->shopsBaseService[$i].",";
			}
		}
		$shopsAimOperastion = "";
		if(!empty($this->shopsAimOperastion)){
			$shopsAimOperastion = ",";
			$len = count($this->shopsAimOperastion);
			for($i=0; $i<$len; $i++){
				$shopsAimOperastion .= $this->shopsAimOperastion[$i].",";
			}
		}
		
		$shop['shopsName'] = $this->estName;
		$shop['shopsAddress'] = $this->shopsAddress;
		$shop['shopsTitle'] = $this->shopsTitle;
		$shop['shopsContent'] = $this->shopsContent;
		$shop['shopsType'] = $this->shopsType;
		$shop['shopsSellPrice'] = $this->shopsSellPrice == "" ? 0 : $this->shopsSellPrice;
		
		$shop['shopsRentPriceUnit'] = $this->shopsRentPriceUnit == "" ? 0 : $this->shopsRentPriceUnit;
		if($this->shopsRentPriceUnit == 1){
			$shop['shopsRentPrice'] = $this->shopsRentPrice * 30 * $this->shopsBuildArea;
		}else if($this->shopsRentPriceUnit == 2){
			$shop['shopsRentPrice'] = $this->shopsRentPrice * $this->shopsBuildArea;
		}else{
			$shop['shopsRentPrice'] = $this->shopsRentPrice;
		}
		
		$shop['shopsRentState'] = $this->shopsRentState;
		$shop['shopsPayment'] = $this->shopsPayment;
		$shop['shopsPayDetailY'] = $this->shopsPayDetailY == "" ? -1 : $this->shopsPayDetailY;
		$shop['shopsPayDetailF'] = $this->shopsPayDetailF == "" ? -1 : $this->shopsPayDetailF;
		$shop['shopsBuildArea'] = $this->shopsBuildArea;
		$shop['shopsFloor'] = $this->shopsFloor;
		$shop['shopsAllFloor'] = $this->shopsAllFloor;
		$shop['shopsDivision'] = $this->shopsDivision;
		$shop['shopsFitment'] = $this->shopsFitment;
		$shop['shopsBaseService'] = $shopsBaseService;
		$shop['shopsAimOperastion'] = $shopsAimOperastion;
		$shop['shopsIncludFee'] = $this->shopsIncludFee;
		$shop['shopsPropFee'] = $this->shopsPropFee;
		$shop['shopsTransfer'] = $this->shopsTransfer;
		$shop['shopsTransferFee'] = $this->shopsTransferFee;
		$shop['shopsNumber'] = $this->shopsNumber;
		$shop['shopsSellRentType'] = $this->propTxType;
		$shop['shopsMapX'] = 0;
		$shop['shopsMapY'] = 0;
		$shop['shopsUserId'] = $this->shopUserId;
	    $shop['shopsTraffic'] = $this->shopsTraffic;
		$shop['shopsSet'] = $this->shopsSet;

		if($shopState){
			$shop['shopsState'] = $shopState;
		}
		if($realEstId){
			$shop['shopsCommunityId'] = $realEstId;
		}
		$shop['propertyPhoto'] = $this->shopPhoto;
		return $shop;
	}
}
?>