<?php
class HousePropertyHandler{
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
	
	private $estateService;
	private $propertyService;
	
	function __construct($db,$estId,$estName,$houseNumber,$privateHouseNumber,$housePayInfo,
						$houseType,$houseSellPrice,$houseRoom,$houseHall,$houseToilet,$houseKitchen,
						$houseBalcony,$houseBuildArea,$houseUseArea,$houseBuildYear,$houseFloor,
						$houseForward,$houseFitment,$houseBaseService,$houseLookTime,$housePhoto,$houseTitle,
						$houseContent,$houseUserId,$houseBuildForm,$houseAllFloor){
		
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
		
		$this->estateService = new EstateService($db);
		$this->propertyService = new $propertyService($db);
	}
	
	public function handler(){
		$photoName = $this->uploadPhoto();
		if(!$photoName) return false;
				
		//save the estate if it's a new one
		if($this->estId == ""){
			$estate['communityName'] = $this->estName;
			$this->estId = $this->estateService->saveEstate($estate);
			if(!$this->estId) return false;
		}else{
			//check if the estId is samed. if it's not same, create a new estate
			$existingEstate = $this->estateService->getEstateById($this->estId);
			if($existingEstate['communityName'] != $this->estName){
				$estate['communityName'] = $this->estName;
				$this->estId = $this->estateService->saveEstate($estate);
				if(!$this->estId) return false;
			}
		}
		
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
		$house['houseCommunityId'] = $this->estId;
		$house['houseUserId'] = $this->houseUserId;
		$house['housePhoto']['picBuildType'] = 1;
		$house['housePhoto']['picSellRent'] = 2;
		$house['housePhoto']['picUrl'] = $photoName;		
		$houseId = $this->propertyService->saveProperty($house);
		if(!$houseId) return false;
		return true;
	} 
	
	private function uploadPhoto(){

		$targetFolder = ECMS_PATH.'uploads/'; // Relative to the root
		
		if((($this->housePhoto["type"] != "image/gif")
				&& ($this->housePhoto["type"] != "image/jpeg")
				&& ($this->housePhoto["type"] != "image/pjpeg"))
				|| ($this->housePhoto["size"] >= 20000)) {
			return false;
		}
			
		if($this->housePhoto["error"] > 0) return false;
			
		$newfileName = $targetFolder.rand(10,20).$this->houseUserId.randon(1000000,9999999).".".$this->housePhoto["type"];
		$renameResult = move_uploaded_file($_FILES["file"]["tmp_name"],$newfileName);
		if($renameResult){
			return $renameResult;
		}else{
			return false;
		}
	}
}
?>