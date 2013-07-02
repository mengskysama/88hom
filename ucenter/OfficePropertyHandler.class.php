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
	
	private $estateService;
	private $propertyService;
	
	function __construct($db,$estId,$estName,$officeNumber,$officeType,$officeSellPrice,
						$officeProFee,$officeBuildArea,$officeFloor,$officeAllFloor,$officeDivision,$officeFitment,
						$officeLevel,$officePhoto,$officeTitle,$officeContent,$officeUserId,$officeState){
		
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
		
		$this->estateService = new EstateService($db);
		$this->propertyService = new SecondHandPropertyService($db);
	}
	
	public function handle(){
		$photoName = $this->uploadPhoto($this->officePhoto,$this->officeUserId);
		if(!$photoName) return false;
		
		$realEstId = $this->getRealEstateId($this->estateService,$this->estId,$this->estName);
		if(!$realEstId) return false;
		
		//save the property$office['officeNumber'] = $this->;
		$office['officeType'] = $this->officeType;
		$office['officeSellPrice'] = $this->officeSellPrice;
		$office['officeRentPrice'] = 0;
		$office['officeRentPriceUnit'] = 0;
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
		$office['officeSellRentType'] = 1;
		$office['officeState'] = $this->officeState;
		$office['officeCommunityId'] = $realEstId;
		$office['officeUserId'] = $this->officeUserId;

		$office['propertyPhoto']['picBuildType'] = 3;
		$office['propertyPhoto']['picSellRent'] = 1;
		$office['propertyPhoto']['picUrl'] = $photoName;		
				
		$officeId = $this->propertyService->saveOffice($office);
		if(!$officeId) return false;
		return true;
	} 
}
?>