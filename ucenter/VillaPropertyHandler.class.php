<?php
require_once 'PropertyHandler.class.php';
class VillaPropertyHandler extends PropertyHandler{
	private $db;
	private $estId;
	private $estName;
	private $villaNumber;
	private $privateHouseNumber;
	private $villaBuildForm;
	private $villaSellPrice;
	private $villaRoom;
	private $villaHall;
	private $villaToilet;
	private $villaKitchen;
	private $villaBalcony;
	private $villaBuildArea;
	private $villaUseArea;
	private $villaBuildYear;
	private $villaForward;
	private $villaAllFloor;
	private $villaCellar;
	private $villaCellarArea;
	private $villaCellarType;
	private $villaGarden;
	private $villaGardenArea;
	private $villaGarage;
	private $villaGarageCount;	
	private $villaFitment;
	private $villaBaseService;	
	private $villaLookTime;
	
	private $villaPhoto;
	private $villaTitle;
	private $villaContent;
	private $villaUserId;
	private $villaState;
	private $actionType;
	private $villaId;
	
	private $estateService;
	private $propertyService;
	
	function __construct($db,$estId,$estName,$villaNumber,$privateHouseNumber,$villaBuildForm,$villaSellPrice,$villaRoom,$villaHall,
						$villaToilet,$villaKitchen,$villaBalcony,$villaBuildArea,$villaUseArea,$villaBuildYear,
						$villaForward,$villaAllFloor,$villaCellar,$villaCellarArea,$villaCellarType,$villaGarden,
						$villaGardenArea,$villaGarage,$villaGarageCount,$villaFitment,$villaBaseService,$villaLookTime,
						$villaPhoto,$villaTitle,$villaContent,$villaUserId,$villaState,$actionType,$villaId){
		
		$this->db = $db;
		$this->estId = $estId;
		$this->estName = $estName;
		$this->villaNumber = $villaNumber;
		$this->privateHouseNumber = $privateHouseNumber;
		$this->villaBuildForm = $villaBuildForm;
		$this->villaSellPrice = $villaSellPrice;
		$this->villaRoom = $villaRoom;
		$this->villaHall = $villaHall;
		$this->villaToilet = $villaToilet;
		$this->villaKitchen = $villaKitchen;
		$this->villaBalcony = $villaBalcony;
		$this->villaBuildArea = $villaBuildArea;
		$this->villaUseArea = $villaUseArea;
		$this->villaBuildYear = $villaBuildYear;
		$this->villaForward = $villaForward;
		$this->villaAllFloor = $villaAllFloor;
		$this->villaCellar = $villaCellar;
		$this->villaCellarArea = $villaCellarArea;
		$this->villaCellarType = $villaCellarType;
		$this->villaGarden = $villaGarden;
		$this->villaGardenArea = $villaGardenArea;
		$this->villaGarage = $villaGarage;
		$this->villaGarageCount = $villaGarageCount;	
		$this->villaFitment = $villaFitment;
		$this->villaBaseService = $villaBaseService;	
		$this->villaLookTime = $villaLookTime;
		
		$this->villaPhoto = $villaPhoto;
		$this->villaTitle = $villaTitle;
		$this->villaContent = $villaContent;
		$this->villaUserId = $villaUserId;
		$this->villaState = $villaState;
		$this->actionType = $actionType;
		$this->villaId = $villaId;
		
		$this->estateService = new EstateService($db);
		$this->propertyService = new SecondHandPropertyService($db);
	}
	
	public function handle(){
		if($this->actionType == "update"){
			$this->updateProperty();
		}else{
			$this->createProperty();
		}
	}
	
	private function updateProperty(){
		$photoName = "";
		if(!empty($this->villaPhoto)){
			$photoName = $this->uploadPhoto($this->villaPhoto,$this->villaUserId);
			if(!$photoName) return false;
		}

		$villa = $this->genPropEntity($this->estId,$photoName,"");
		$villa["villaId"] = $this->villaId;
		return $this->propertyService->updateVilla($villa);
	}
	
	public function createProperty(){
		$photoName = $this->uploadPhoto($this->villaPhoto,$this->villaUserId);
		if(!$photoName) return false;
		
		$realEstId = $this->getRealEstateId($this->estateService,$this->estId,$this->estName);
		if(!$realEstId) return false;

		$villa = $this->genPropEntity($realEstId,$photoName,$this->villaState);
		$houseId = $this->propertyService->saveVilla($villa);
		if(!$houseId) return false;
		return true;
	} 
	
	private function genPropEntity($realEstId,$photoName,$houseState){
		//save the property
		$villaBaseService = "";
		if(!empty($this->villaBaseService)){
			$villaBaseService = ",";
			$len = count($this->villaBaseService);
			for($i=0; $i<$len; $i++){
				$villaBaseService .= $this->villaBaseService[$i].","; 
			}
		}
		
		$villa['villaTitle'] = $this->villaTitle;
		$villa['villaContent'] = $this->villaContent; 
		$villa['villaNumber'] = $this->villaNumber; 
		$villa['villaRoom'] = $this->villaRoom; 
		$villa['villaHall'] = $this->villaHall; 
		$villa['villaToilet'] = $this->villaToilet;
		$villa['villaKitchen'] = $this->villaKitchen;
		$villa['villaBalcony'] = $this->villaBalcony;
		$villa['villaBuildArea'] = $this->villaBuildArea;
		$villa['villaUseArea'] = $this->villaUseArea;
		$villa['villaForward'] = $this->villaForward;
		$villa['villaFitment'] = $this->villaFitment;
		$villa['villaBuildYear'] = $this->villaBuildYear;
		$villa['villaBaseService'] = $villaBaseService;
		$villa['villaEquipment'] = '';
		$villa['villaLookTime'] = $this->villaLookTime;
		$villa['villaLiveTime'] = '';
		$villa['villaSellPrice'] = $this->villaSellPrice;
		$villa['villaRentPrice'] = 0;
		$villa['villaRentType'] = 0;
		$villa['villaPayment'] = 0;
		$villa['villaPayDetailY'] = 0;
		$villa['villaPayDetailF'] = 0;
		$villa['villaAllFloor'] = $this->villaAllFloor;
		$villa['villaBuildForm'] = $this->villaBuildForm;
		$villa['villaBuildStructure'] = '';
		$villa['villaCellar'] = $this->villaCellar;
		$villa['villaCellarArea'] = $this->villaCellarArea;
		$villa['villaCellarType'] = $this->villaCellarType;
		$villa['villaGarden'] = $this->villaGarden;
		$villa['villaGardenArea'] = $this->villaGardenArea;
		$villa['villaGarage'] = $this->villaGarage;
		$villa['villaGarageCount'] = $this->villaGarageCount;
		$villa['villaParkingPlace'] = '';
		$villa['villaParkingPlaceCount'] = 0;
		$villa['villaState'] = $this->villaState;
		if($realEstId){
			$villa['villaCommunityId'] = $realEstId;
		}
		$villa['villaUserId'] = $this->villaUserId;
		$villa['villaSellRentType'] = 1;

		if($photoName){
			$villa['propertyPhoto']['picBuildType'] = 4;
			$villa['propertyPhoto']['picSellRent'] = 1;
			$villa['propertyPhoto']['picUrl'] = $photoName;	
		}	
	}
}
?>