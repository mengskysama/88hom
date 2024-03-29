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
	private $houseBuildStructure;
	private $houseBuildForm;
	private $houseAllFloor;
	private $houseState;
	private $actionType;
	private $houseId;
	private $propTxType;
	private $houseRentType;
	private $houseRentRoomType;
	private $houseRentDetail;
	private $housePayment; 
	private $housePayDetailY;
	private $housePayDetailF;
	private $houseRentArea;
	private $topPic;
	
	private $estateService;
	private $propertyService;
	
	function __construct($db,$estId,$estName,$houseNumber,$privateHouseNumber,$housePayInfo,
						$houseType,$houseSellPrice,$houseRoom,$houseHall,$houseToilet,$houseKitchen,
						$houseBalcony,$houseBuildArea,$houseUseArea,$houseBuildYear,$houseFloor,
						$houseForward,$houseFitment,$houseBaseService,$houseLookTime,$housePhoto,$houseTitle,
						$houseContent,$houseUserId,$houseBuildStructure,$houseBuildForm,$houseAllFloor,$houseState,$actionType,$houseId,
						$propTxType,$houseRentType,$houseRentRoomType,$houseRentDetail,$housePayment,$housePayDetailY,
						$housePayDetailF,$houseRentArea,$topPic){
		
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
		$this->houseBuildStructure = $houseBuildStructure;
		$this->houseBuildForm = $houseBuildForm;
		$this->houseAllFloor = $houseAllFloor;
		$this->houseState = $houseState;
		$this->actionType = $actionType;
		$this->houseId = $houseId;
		$this->propTxType = $propTxType;
		$this->houseRentType = $houseRentType;
		$this->houseRentRoomType = $houseRentRoomType;
		$this->houseRentDetail = $houseRentDetail;
		$this->housePayment = $housePayment; 
		$this->housePayDetailY = $housePayDetailY;
		$this->housePayDetailF = $housePayDetailF;
		$this->houseRentArea = $houseRentArea;
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

		$this->topPic['picBuildId'] = $this->houseId;
		return $this->handleTopPic($this->propertyService, $this->topPic);
	}
	
	private function updateProperty(){
		$house = $this->genPropEntity($this->estId,$this->houseState);
		$house["houseId"] = $this->houseId;
		return $this->propertyService->updateHouse($house);
	}
	
	private function createProperty(){		
		$realEstId = $this->getRealEstateId($this->estateService,$this->estId,$this->estName);
		if(!$realEstId) return false;
		
		$house = $this->genPropEntity($realEstId,$this->houseState);
		$houseId = $this->propertyService->saveHouse($house);
		if(!$houseId) return false;
		
		$this->houseId = $houseId;
		return true;
	} 
	
	private function genPropEntity($realEstId,$houseState){
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
		$house['houseBuildArea'] = $this->houseBuildArea == "" ? 0 : $this->houseBuildArea;
		$house['houseUseArea'] = $this->houseUseArea == "" ? 0 : $this->houseUseArea;
		$house['houseType'] = $this->houseType == "" ? 0 : $this->houseType;
		$house['houseBuildStructure'] = $this->houseBuildStructure == "" ? 0 : $this->houseBuildStructure;
		$house['houseBuildForm'] = $this->houseBuildForm == "" ? 0 : $this->houseBuildForm;
		$house['houseForward'] = $this->houseForward;
		$house['houseFitment'] = $this->houseFitment;
		$house['houseBaseService'] = $houseBaseService;
		$house['houseFloor'] = $this->houseFloor;
		$house['houseAllFloor'] = $this->houseAllFloor;
		$house['houseBuildYear'] = $this->houseBuildYear == "" ? 0 : $this->houseBuildYear;
		$house['houseLookTime'] = $this->houseLookTime == "" ? 0 : $this->houseLookTime;
		if($realEstId){
			$house['houseCommunityId'] = $realEstId;
		}
		$house['houseSellRentType'] = $this->propTxType;
		$house['houseUserId'] = $this->houseUserId;
		$house['propertyPhoto'] = $this->housePhoto;
		$house['houseRentType'] = $this->houseRentType == "" ? 0 : $this->houseRentType;
		$house['houseRentArea'] = $this->houseRentArea == "" ? 0 : $this->houseRentArea;
		$house['housePayInfo'] = $this->housePayInfo == "" ? 0 : $this->housePayInfo;
		$house['houseRentRoomType'] = $this->houseRentRoomType == "" ? 0 : $this->houseRentRoomType;
		$house['houseRentDetail'] = $this->houseRentDetail == "" ? 0 : $this->houseRentDetail;
		
		$house['houseLiveTime'] = "";
		$house['housePayment'] = $this->housePayment == "" ? 0 : $this->housePayment;
		$house['housePayDetailY'] = $this->housePayDetailY == "" ? 0 : $this->housePayDetailY;
		$house['housePayDetailF'] = $this->housePayDetailF == "" ? 0 : $this->housePayDetailF;
		if($houseState){
			$house['houseState'] = $houseState;
		}
		return $house;
	}
}
?>