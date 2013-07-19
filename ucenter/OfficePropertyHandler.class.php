<?php
require_once 'PropertyHandler.class.php';
class OfficePropertyHandler extends PropertyHandler{
	private $db;
	private $estId;
	private $estName;
	private $officeNumber;
	private $officeType;
	private $officeSellPrice;
	private $officeProFee;
	private $officeBuildArea;
	private $officeFloor;
	private $officeAllFloor;
	private $officeDivision;
	private $officeFitment;
	private $officeLevel;
	private $officePhoto;
	private $officeTitle;
	private $officeContent;
	private $officeUserId;
	private $officeState;
	private $actionType;
	private $officeId;
	private $propTxType;
	private $officeRentPrice;
	private $officeRentPriceUnit;
	private $officeTraffic;
	private $topPic;
		
	private $estateService;
	private $propertyService;
	
	function __construct($db,$estId,$estName,$officeNumber,$officeType,$officeSellPrice,
						$officeProFee,$officeBuildArea,$officeFloor,$officeAllFloor,$officeDivision,$officeFitment,
						$officeLevel,$officePhoto,$officeTitle,$officeContent,$officeUserId,$officeState,$actionType,
						$officeId,$propTxType,$officeRentPrice,$officeRentPriceUnit,$officeTraffic,$topPic){
		
		$this->db = $db;
		$this->estId = $estId;
		$this->estName = $estName;
		$this->officeNumber = $officeNumber;
		$this->officeType = $officeType;
		$this->officeSellPrice = $officeSellPrice;
		$this->officeProFee = $officeProFee;
		$this->officeBuildArea = $officeBuildArea;
		$this->officeFloor = $officeFloor;
		$this->officeAllFloor = $officeAllFloor;
		$this->officeDivision = $officeDivision;
		$this->officeFitment = $officeFitment;
		$this->officeLevel = $officeLevel;
		$this->officePhoto = $officePhoto;
		$this->officeTitle = $officeTitle;
		$this->officeContent = $officeContent;
		$this->officeUserId = $officeUserId;
		$this->officeState = $officeState;
		$this->actionType = $actionType;
		$this->officeId = $officeId;
		$this->propTxType = $propTxType;
		$this->officeRentPrice = $officeRentPrice;
		$this->officeRentPriceUnit = $officeRentPriceUnit;
		$this->officeTraffic = $officeTraffic;
		$this->topPic = $topPic;
		
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

		$this->topPic['picBuildId'] = $this->officeId;
		return $this->handleTopPic($this->propertyService, $this->topPic);
	}
	
	private function updateProperty(){

		$office = $this->genPropEntity($this->estId,$this->officeState);
		$office["officeId"] = $this->officeId;
		return $this->propertyService->updateOffice($office);
	}	
	
	public function createProperty(){
		$realEstId = $this->getRealEstateId($this->estateService,$this->estId,$this->estName);
		if(!$realEstId) return false;

		$office = $this->genPropEntity($this->estId,$this->officeState);
		$officeId = $this->propertyService->saveOffice($office);
		if(!$officeId) return false;
		
		$this->officeId = $officeId;
		return true;
	} 
	
	private function genPropEntity($realEstId,$officeState){

		//save the property
		$office['officeNumber'] = $this->officeNumber;
		$office['officeType'] = $this->officeType;
		$office['officeSellPrice'] = $this->officeSellPrice;
		$office['officeRentPrice'] = $this->officeRentPrice;
		$office['officeRentPriceUnit'] = $this->officeRentPriceUnit;
		$office['officeIncludFee'] = 0;
		$office['officeProFee'] = $this->officeProFee;
		$office['officePayment'] = 0;
		$office['officePayDetailY'] = 0;
		$office['officePayDetailF'] = 0;
		$office['officeBuildArea'] = $this->officeBuildArea;
		$office['officeFloor'] = $this->officeFloor;
		$office['officeAllFloor'] = $this->officeAllFloor;
		$office['officeDivision'] = $this->officeDivision;
		$office['officeFitment'] = $this->officeFitment;
		$office['officeLevel'] = $this->officeLevel;
		$office['officeTitle'] = $this->officeTitle;
		$office['officeContent'] = $this->officeContent;
		$office['officeSellRentType'] = $this->propTxType;
		$office['officeTraffic'] = $this->officeTraffic;
		if($officeState){
			$office['officeState'] = $this->officeState;
		}
		if($realEstId){
			$office['officeCommunityId'] = $realEstId;
		}
		$office['officeUserId'] = $this->officeUserId;
		$office['propertyPhoto'] = $this->officePhoto;
		return $office;
	}
}
?>