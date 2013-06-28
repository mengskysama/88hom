<?php
class SecondHandPropertyService{

	private $houseDAO;
	private $picDAO;
	private $officeDAO;
	private $shopsDAO;
	private $factoryDAO;
	private $villaDAO;
	
	public function __construct($db){
		$this->db=$db;
	
		$this->houseDAO = new HouseDAO($db);
		$this->picDAO = new PicDAO($db);
		$this->officeDAO = new OfficeDAO($db);
		$this->shopsDAO = new ShopsDAO($db);
		$this->factoryDAO = new FactoryDAO($db);
		$this->villaDAO = new VillaDAO($db);
	}	
	
	private function savePhoto($property){
		$pic['picBuildId'] = $property['propId'];
		$pic['picBuildType'] = $property['propertyPhoto']['picBuildType'];
		$pic['picSellRent'] = $property['propertyPhoto']['picSellRent'];
		$pic['picUrl'] = $property['propertyPhoto']['picUrl'];
	
		$pic['pictypeId'] = 0;
		$pic['picThumb'] = '';
		$pic['picState'] = 0;	
	
		$this->picDAO->release($pic);
	}
	
	private function saveProperty($dao,$property){
		$propId = $dao->release($property);
		if(!$propId) return false;
	
		//save the mapping relation of house & photo
		$property['propId'] = $propId;
		$this->savePhoto($property);
		return $propId;
	}

	public function saveHouse($house){
		return $this->saveProperty($this->houseDAO, $house);
	}
	
	public function saveOffice($office){
		return $this->saveProperty($this->officeDAO, $office);
	}
	
	public function saveShop($shop){
		return $this->saveProperty($this->shopsDAO, $shop);
	}
	
	public function saveFactory($factory){
		return $this->saveProperty($this->factoryDAO, $factory);
	}
	
	public function saveVilla($villa){
		return $this->saveProperty($this->villaDAO, $villa);
	}
	
	public function countPropertiesByState($userId,$propState){
		$house_count = $this->houseDAO->countProperty($userId,$propState);
		$villa_count = $this->villaDAO->countProperty($userId,$propState);
		$office_count = $this->officeDAO->countProperty($userId,$propState);
		$shop_count = $this->shopsDAO->countProperty($userId,$propState);
		$factory_count = $this->factoryDAO->countProperty($userId,$propState);
		return $house_count + $villa_count + $office_count + $shop_count + $factory_count;
	}
	
	public function getPropertyList($condition){

		$condition['userId'] = $userId;
		$condition['propState'] = $propState;
		$condition['propNum'] = $propNum;
		$condition['propPriceFrom'] = $propPriceFrom;
		$condition['propPriceTo'] = $propPriceTo;
		$condition['propRoom'] = $propRoom;
		$condition['propKind'] = $propKind;
		$condition['propOrder'] = $propOrder;
		$condition['propName'] = $propName;
		$condition['currentPageNo'] = $pageNo;
	}
}