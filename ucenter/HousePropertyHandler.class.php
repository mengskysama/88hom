<?php
require_once 'PropertyHandler.class.php';
class HousePropertyHandler extends PropertyHandler{
	private $db;
	private $estId;
	private $estName;
	private $houseNumber;
	private $privateHouseNumber;
	private $housePayInfo;
	private $houseType;
	private $houseSellPrice;
	private $houseRoom;
	private $houseHall;
	private $houseToilet;
	private $houseKitchen;
	private $houseBalcony;
	private $houseBuildArea;
	private $houseUseArea;
	private $houseBuildYear;
	private $houseFloor;
	private $houseForward;
	private $houseFitment;
	private $houseBaseService;
	private $houseLookTime;
	private $housePhoto;
	private $houseTitle;
	private $houseContent;
	private $houseUserId;
	private $houseBuildForm;
	private $houseAllFloor;
	private $houseState;
	
	private $estateService;
	private $propertyService;
	
	function __construct($db,$estId,$estName,$houseNumber,$privateHouseNumber,$housePayInfo,
						$houseType,$houseSellPrice,$houseRoom,$houseHall,$houseToilet,$houseKitchen,
						$houseBalcony,$houseBuildArea,$houseUseArea,$houseBuildYear,$houseFloor,
						$houseForward,$houseFitment,$houseBaseService,$houseLookTime,$housePhoto,$houseTitle,
						$houseContent,$houseUserId,$houseBuildForm,$houseAllFloor,$houseState){
		
		$this->db = $db;
		$this->estId = $estId;
		$this->estName = $estName;
		$this->houseNumber = $houseNumber;
		$this->privateHouseNumber = $privateHouseNumber;
		$this->housePayInfo = $housePayInfo;
		$this->houseType = $houseType;
		$this->houseSellPrice = $houseSellPrice;
		$this->houseRoom = $houseRoom;
		$this->houseHall = $houseHall;
		$this->houseToilet = $houseToilet;
		$this->houseKitchen = $houseKitchen;
		$this->houseBalcony = $houseBalcony;
		$this->houseBuildArea = $houseBuildArea;
		$this->houseUseArea = $houseUseArea;
		$this->houseBuildYear = $houseBuildYear;
		$this->houseFloor = $houseFloor;
		$this->houseForward = $houseForward;
		$this->houseFitment = $houseFitment;
		$this->houseBaseService = $houseBaseService;
		$this->houseLookTime = $houseLookTime;
		$this->housePhoto = $housePhoto;
		$this->houseTitle = $houseTitle;
		$this->houseContent = $houseContent;
		$this->houseUserId = $houseUserId;
		$this->houseBuildForm = $houseBuildForm;
		$this->houseAllFloor = $houseAllFloor;
		$this->houseState = $houseState;
		
		$this->estateService = new EstateService($db);
		$this->propertyService = new SecondHandPropertyService($db);
	}
	
	public function handle(){
		$photoName = $this->uploadPhoto($this->housePhoto,$this->houseUserId);
		if(!$photoName) return false;
		
		$realEstId = $this->getRealEstateId($this->estateService,$this->estId,$this->estName);
		if(!$realEstId) return false;
		
		//save the property
		$houseBaseService = "";
		if(!empty($this->houseBaseService)){
			$houseBaseService = ",";
			$len = count($this->houseBaseService);
			for($i=0; $i<$len; $i++){
				$houseBaseService .= $this->houseBaseService[$i].","; 
			}
		}
		$house['houseTitle'] = $this->houseTitle;
		$house['houseContent'] = $this->houseContent;
		$house['houseNumber'] = $this->houseNumber;
		$house['houseRoom'] = $this->houseRoom;
		$house['houseHall'] = $this->houseHall;
		$house['houseToilet'] = $this->houseToilet;
		$house['houseKitchen'] = $this->houseKitchen;
		$house['houseBalcony'] = $this->houseBalcony;
		$house['houseSellPrice'] = $this->houseSellPrice;
		$house['houseBuildArea'] = $this->houseBuildArea;
		$house['houseUseArea'] = $this->houseUseArea;
		$house['houseType'] = $this->houseType;
		$house['houseBuildForm'] = $this->houseBuildForm;
		$house['houseForward'] = $this->houseForward;
		$house['houseFitment'] = $this->houseFitment;
		$house['houseBaseService'] = $houseBaseService;
		$house['houseFloor'] = $this->houseFloor;
		$house['houseAllFloor'] = $this->houseAllFloor;
		$house['houseBuildYear'] = $this->houseBuildArea;
		$house['houseLookTime'] = $this->houseLookTime;
		$house['houseCommunityId'] = $realEstId;
		$house['houseSellRentType'] = 1;
		$house['houseUserId'] = $this->houseUserId;
		$house['propertyPhoto']['picBuildType'] = 1;
		$house['propertyPhoto']['picSellRent'] = 1;
		$house['propertyPhoto']['picUrl'] = $photoName;		
		
		$house['houseRentArea'] = "";
		$house['houseBuildStructure'] = "";
		$house['housePayInfo'] = "";
		$house['houseRentRoomType'] = "";
		$house['houseLiveTime'] = "";
		$house['housePayment'] = "";
		$house['housePayDetailY'] = "";
		$house['housePayDetailF'] = "";
		$house['houseState'] = $this->houseState;
		
		$houseId = $this->propertyService->saveHouse($house);
		if(!$houseId) return false;
		return true;
	} 
}
?>