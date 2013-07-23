<?php
require_once 'PropertyHandler.class.php';
class VillaPropertyHandler extends PropertyHandler{
	private $db;
	private $estId;
	private $estName;
	private $villaNumber;
	private $privateHouseNumber;
	private $villaBuildForm;
	private $villaBuildStructure;
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
	private $villaParkingPlace;
	private $villaParkingPlaceCount;
	private $villaFitment;
	private $villaBaseService;	
	private $villaLookTime;
	private $villaLiveTime;
	
	private $villaPhoto;
	private $villaTitle;
	private $villaContent;
	private $villaUserId;
	private $villaState;
	private $actionType;
	private $villaId;
	private $propTxType;
	private $villaRentPrice;
	private $villaRentType;
	private $villaPayment;
	private $villaPayDetailY;
	private $villaPayDetailF;
	private $topPic;
	
	private $estateService;
	private $propertyService;
	
	function __construct($db,$estId,$estName,$villaNumber,$privateHouseNumber,$villaBuildForm,$villaBuildStructure,$villaSellPrice,$villaRoom,$villaHall,
						$villaToilet,$villaKitchen,$villaBalcony,$villaBuildArea,$villaUseArea,$villaBuildYear,
						$villaForward,$villaAllFloor,$villaCellar,$villaCellarArea,$villaCellarType,$villaGarden,
						$villaGardenArea,$villaGarage,$villaGarageCount,$villaParkingPlace,$villaParkingPlaceCount,$villaFitment,$villaBaseService,$villaLookTime,
						$villaLiveTime,$villaPhoto,$villaTitle,$villaContent,$villaUserId,$villaState,$actionType,$villaId,
						$propTxType,$villaRentPrice,$villaRentType,$villaPayment,$villaPayDetailY,$villaPayDetailF,$topPic){
		
		$this->db = $db;
		$this->estId = $estId;
		$this->estName = $estName;
		$this->villaNumber = $villaNumber;
		$this->privateHouseNumber = $privateHouseNumber;
		$this->villaBuildForm = $villaBuildForm;
		$this->villaBuildStructure = $villaBuildStructure;
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
		$this->villaParkingPlace = $villaParkingPlace;
		$this->villaParkingPlaceCount = $villaParkingPlaceCount;	
		$this->villaFitment = $villaFitment;
		$this->villaBaseService = $villaBaseService;	
		$this->villaLookTime = $villaLookTime;
		$this->villaLiveTime = $villaLiveTime;
		
		$this->villaPhoto = $villaPhoto;
		$this->villaTitle = $villaTitle;
		$this->villaContent = $villaContent;
		$this->villaUserId = $villaUserId;
		$this->villaState = $villaState;
		$this->actionType = $actionType;
		$this->villaId = $villaId;
		$this->propTxType = $propTxType;
		$this->villaRentPrice = $villaRentPrice;
		$this->villaRentType = $villaRentType;
		$this->villaPayment = $villaPayment;
		$this->villaPayDetailY = $villaPayDetailY;
		$this->villaPayDetailF = $villaPayDetailF;
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

		$this->topPic['picBuildId'] = $this->villaId;
		return $this->handleTopPic($this->propertyService, $this->topPic);
	}
	
	private function updateProperty(){
		$villa = $this->genPropEntity($this->estId,$this->villaState);
		$villa["villaId"] = $this->villaId;
		return $this->propertyService->updateVilla($villa);
	}
	
	private function createProperty(){
		
		$realEstId = $this->getRealEstateId($this->estateService,$this->estId,$this->estName);
		if(!$realEstId) return false;

		$villa = $this->genPropEntity($realEstId,$this->villaState);
		$houseId = $this->propertyService->saveVilla($villa);
		if(!$houseId) return false;
		
		$this->villaId = $houseId;
		return true;
	} 
	
	private function genPropEntity($realEstId,$villaState){
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
		$villa['villaUseArea'] = $this->villaUseArea == "" ? 0 : $this->villaUseArea;
		$villa['villaForward'] = $this->villaForward;
		$villa['villaFitment'] = $this->villaFitment;
		$villa['villaBuildYear'] = $this->villaBuildYear == "" ? 0 : $this->villaBuildYear;
		$villa['villaBaseService'] = $villaBaseService;
		$villa['villaEquipment'] = '';
		$villa['villaLookTime'] = $this->villaLookTime == "" ? 0 : $this->villaLookTime;
		$villa['villaLiveTime'] = $this->villaLiveTime;
		$villa['villaSellPrice'] = $this->villaSellPrice == "" ? 0 : $this->villaSellPrice;
		$villa['villaRentPrice'] = $this->villaRentPrice == "" ? 0 : $this->villaRentPrice;
		$villa['villaRentType'] = $this->villaRentType == "" ? 0 : $this->villaRentType;
		$villa['villaPayment'] = $this->villaPayment == "" ? 0 : $this->villaPayment;
		$villa['villaPayDetailY'] = $this->villaPayDetailY == "" ? 0 : $this->villaPayDetailY;
		$villa['villaPayDetailF'] = $this->villaPayDetailF == "" ? 0 : $this->villaPayDetailF;
		$villa['villaAllFloor'] = $this->villaAllFloor;
		$villa['villaBuildForm'] = $this->villaBuildForm;
		$villa['villaBuildStructure'] = $this->villaBuildStructure;
		$villa['villaCellar'] = $this->villaCellar == "" ? 0 : $this->villaCellar;
		$villa['villaCellarArea'] = $this->villaCellarArea == "" ? 0 : $this->villaCellarArea;
		$villa['villaCellarType'] = $this->villaCellarType == "" ? 0 : $this->villaCellarType;
		$villa['villaGarden'] = $this->villaGarden == "" ? 0 : $this->villaGarden;
		$villa['villaGardenArea'] = $this->villaGardenArea == "" ? 0 : $this->villaGardenArea;
		$villa['villaGarage'] = $this->villaGarage == "" ? 0 : $this->villaGarage;
		$villa['villaGarageCount'] = $this->villaGarageCount == "" ? 0 : $this->villaGarageCount;
		$villa['villaParkingPlace'] = $this->villaParkingPlace == "" ? 0 : $this->villaParkingPlace;
		$villa['villaParkingPlaceCount'] = $this->villaParkingPlaceCount == "" ? 0 : $this->villaParkingPlaceCount;
		if($villaState){
			$villa['villaState'] = $villaState;
		}
		if($realEstId){
			$villa['villaCommunityId'] = $realEstId;
		}
		$villa['villaUserId'] = $this->villaUserId;
		$villa['villaSellRentType'] = $this->propTxType;

		$villa['propertyPhoto'] = $this->villaPhoto;
		return $villa;
	}
}
?>