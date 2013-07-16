<?php
class SecondHandPropertyService{

	private $houseDAO;
	private $picDAO;
	private $officeDAO;
	private $shopsDAO;
	private $factoryDAO;
	private $villaDAO;
	private $agentPropertyDAO;
	private $userDAO;
	
	public function __construct($db){
		$this->db=$db;
	
		$this->houseDAO = new HouseDAO($db);
		$this->picDAO = new PicDAO($db);
		$this->officeDAO = new OfficeDAO($db);
		$this->shopsDAO = new ShopsDAO($db);
		$this->factoryDAO = new FactoryDAO($db);
		$this->villaDAO = new VillaDAO($db);
		$this->agentPropertyDAO = new AgentPropertyDAO($db);
		$this->userDAO = new UserDAO($db);
	}	
	
	private function savePhoto($property){
		$propId = $property['propId'];
		$picBuildType = $property['picBuildType'];
		if(!empty($property['propertyPhoto'])){
			$photos = $property['propertyPhoto'];
			$len = count($photos);
// 			echo 'size->'.$len;
			for($key=0; $key<$len; $key++){
				$pic['picBuildId'] = $propId;
				$pic['picBuildType'] = $picBuildType;
				$pic['pictypeId'] = $photos[$key]['pictypeId'];
				$pic['picSellRent'] = $photos[$key]['picSellRent'];
				$pic['picUrl'] = $photos[$key]['picUrl'];
				$pic['picThumb'] = $photos[$key]['picThumb'];
				$pic['picInfo'] = $photos[$key]['picInfo'];
				$pic['picLayer'] = $photos[$key]['picLayer'];
				$pic['picState'] = $photos[$key]['picState'];;
				
				$this->picDAO->release($pic);
			}
		}
	}
	
	private function saveProperty($dao,$property){
		$propId = $dao->release($property);
		if(!$propId) return false;
	
		//save the mapping relation of house & photo
		$property['propId'] = $propId;
		$this->savePhoto($property);
		return $propId;
	}
	
	private function updateProperty($dao,$property){

		$result = $dao->modify($property);
		if($result>0){
			$where="where picBuildId=".$property['propId']." and picBuildType=".$property['picBuildType'];
			$result=$this->picDAO->delPic($where);
			if($result<0) return false;
		
			if(!empty($property['propertyPhoto'])){
				$photos = $property['propertyPhoto'];
				$len = count($photos);
				//echo 'len='.$len."<br/>";
				for($key=0; $key<$len; $key++){
					$pic['picBuildId'] = $property['propId'];
					$pic['picBuildType'] = $property['picBuildType'];
					$pic['pictypeId'] = $photos[$key]['pictypeId'];
					$pic['picSellRent'] = $photos[$key]['picSellRent'];
					$pic['picUrl'] = $photos[$key]['picUrl'];
					$pic['picThumb'] = $photos[$key]['picThumb'];
					$pic['picInfo'] = $photos[$key]['picInfo'];
					$pic['picLayer'] = $photos[$key]['picLayer'];
					$pic['picState'] = $photos[$key]['picState'];
					$pic['picBuildFatherType'] = 0;
					//print_r($pic).'<br/>';
					$this->picDAO->release($pic);
						
						
					if($result<0){
						return false;
					}
				}
			}
			return true;
		}
		return false;
		
	}
	

	public function saveHouse($house){
		$house['picBuildType'] = 1;
		return $this->saveProperty($this->houseDAO, $house);
	}

	public function updateHouse($house){
		$house['picBuildType'] = 1;
		$house['propId'] = $house['houseId'];
		return $this->updateProperty($this->houseDAO, $house);
	}
	
	public function saveOffice($office){
		$office['picBuildType'] = 3;
		return $this->saveProperty($this->officeDAO, $office);
	}

	public function updateOffice($office){
		$office['picBuildType'] = 3;
		$office['propId'] = $office['officeId'];
		return $this->updateProperty($this->officeDAO, $office);
	}
	
	public function saveShop($shop){
		$shop['picBuildType'] = 2;
		return $this->saveProperty($this->shopsDAO, $shop);
	}

	public function updateShop($shop){
		$shop['picBuildType'] = 2;
		$shop['propId'] = $shop['shopId'];
		return $this->updateProperty($this->shopsDAO, $shop);
	}
	
	public function saveFactory($factory){
		$factory['picBuildType'] = 5;
		return $this->saveProperty($this->factoryDAO, $factory);
	}

	public function updateFactory($factory){
		$factory['picBuildType'] = 5;
		$factory['propId'] = $factory['factoryId'];
		return $this->updateProperty($this->factoryDAO, $factory);
	}
	
	public function saveVilla($villa){
		$villa['picBuildType'] = 4;
		return $this->saveProperty($this->villaDAO, $villa);
	}

	public function updateVilla($villa){
		$villa['picBuildType'] = 4;
		$villa['propId'] = $villa['villaId'];
		return $this->updateProperty($this->villaDAO, $villa);
	}
	
	public function getHousePropertyById($userId,$propId){
		return $this->houseDAO->getPropertyById($userId,$propId);
	}
	
	public function getVillaPropertyById($userId,$propId){
		return $this->villaDAO->getPropertyById($userId,$propId);
	}
	
	public function getShopPropertyById($userId,$propId){
		return $this->shopsDAO->getPropertyById($userId,$propId);
	}
	
	public function getOfficePropertyById($userId,$propId){
		return $this->officeDAO->getPropertyById($userId,$propId);
	}
	
	public function getFactoryPropertyById($userId,$propId){
		return $this->factoryDAO->getPropertyById($userId,$propId);
	}
	
	public function getPropPhotos($photo){
		$where = "where picBuildId=".$photo['picBuildIdId']." and picBuildType=".$photo['picBuildType']." and picState=1 ";
		if(!empty($photo['pictypeId'])){
			$where .= "and pictypeId=".$photo['pictypeId'];
		}
		return $this->picDAO->getPicList("picId,pictypeId,picBuildId,picBuildType,picSellRent,picUrl,picThumb,picInfo,picLayer",
										$where,
										"order by picLayer",
										"");
	}
	
	public function countPropertiesByState($userId,$propState){
		$house_count = $this->houseDAO->countProperty($userId,$propState);
		$villa_count = $this->villaDAO->countProperty($userId,$propState);
		$office_count = $this->officeDAO->countProperty($userId,$propState);
		$shop_count = $this->shopsDAO->countProperty($userId,$propState);
		$factory_count = $this->factoryDAO->countProperty($userId,$propState);
		//echo '<br/>'.$house_count.','.$villa_count.','.$office_count.','.$shop_count.','.$factory_count;
		return $house_count + $villa_count + $office_count + $shop_count + $factory_count;
	}
	
	public function getLeasePropertyList($condition){

		//where
		$query_where = "where userId=".$condition['userId'];
		if($condition['propState'] != "" && $condition['propState'] != 2){
			$query_where .= " and propState=".$condition['propState'];
		}else{
			$query_where .= " and propState!=2";
		}
		if($condition['propKind'] != "" && $condition['propKind'] != "vv"){
			$query_where .= " and propKind='".$condition['propKind']."'";
		}
		if($condition['propNum'] != ""){
			$query_where .= " and propNumber='".$condition['propNum']."'";
		}
		if($condition['propPriceFrom'] != ""){
			$query_where .= " and totalPrice>=".$condition['propPriceFrom'];
		}
		if($condition['propPriceTo'] != ""){
			$query_where .= " and totalPrice<=".$condition['propPriceTo'];
		}
		if($condition['propRoom'] > 0){
			if($condition['propRoom'] == 99){
				$query_where .= " and room>5";
			}else{
				$query_where .= " and room=".$condition['propRoom'];
			}
		}
		if($condition['propName'] != ""){
			$query_where .= " and propName like '".$condition['propName']."%";
		}
		
		//order
		$query_order = "";
		if($condition['propOrder'] == 1){
			$query_order = " order by propCreateTime desc";
		}else if($condition['propOrder'] == 2){
			$query_order = " order by propCreateTime asc";
		}else if($condition['propOrder'] == 3){
			$query_order = " order by propArea asc";
		}else if($condition['propOrder'] == 4){
			$query_order = " order by propArea desc";
		}
		//limit
		$page = $condition['currentPageNo'];
		$page = ($page == "" || $page == 0) ? 1 : $page;
		$query_limit = "limit ".(($page - 1) * USER_SELL_PROPERTY_LIST_PAGE_SIZE).",".USER_SELL_PROPERTY_LIST_PAGE_SIZE;
		//fields
		$query_fields = "propId,propKind,propName,propNumber,propPrice,propArea,propPriceUnit,userId,propState,from_unixtime(createTime,'%Y-%m-%d') as createDate,from_unixtime(createTime,'%H:%i') as createTime,from_unixtime(updateTime,'%Y-%m-%d') as updateDate,from_unixtime(updateTime,'%H:%i') as updateTime,room,hall,propPhoto,createTime as propCreateTime ";
		$totalNum = $this->houseDAO->countPropertyList('vw_get_lease_property_list',$query_where);
		$propList = $this->houseDAO->getPropertyList('vw_get_lease_property_list',$query_fields,$query_where,$query_order,$query_limit);
		$pagination = pagination2($totalNum,USER_SELL_PROPERTY_LIST_PAGE_SIZE,$page,5);
		$props['data'] = $propList;
		$props['pagination'] = $pagination;
		return $props;
	}
	
	public function getSellPropertyList($condition){
		
		//where
		$query_where = "where userId=".$condition['userId']; 
		if($condition['propState'] != "" && $condition['propState'] != 2){
			$query_where .= " and propState=".$condition['propState'];
		}else{
			$query_where .= " and propState!=2";
		}
		if($condition['propKind'] != "" && $condition['propKind'] != "vv"){
			$query_where .= " and propKind='".$condition['propKind']."'";
		}
		if($condition['propNum'] != ""){
			$query_where .= " and propNumber='".$condition['propNum']."'";
		}
		if($condition['propPriceFrom'] != ""){
			$query_where .= " and propPrice>=".$condition['propPriceFrom'];
		}
		if($condition['propPriceTo'] != ""){
			$query_where .= " and propPrice<=".$condition['propPriceTo'];
		}
		if($condition['propRoom'] > 0){
			if($condition['propRoom'] == 99){
				$query_where .= " and room>5";
			}else{
				$query_where .= " and room=".$condition['propRoom'];
			}
		}
		if($condition['propName'] != ""){
			$query_where .= " and propName like '".$condition['propName']."%";
		}
		
		//order
		$query_order = "";
		if($condition['propOrder'] == 1){
			$query_order = " order by propCreateTime desc";
		}else if($condition['propOrder'] == 2){
			$query_order = " order by propCreateTime asc";
		}else if($condition['propOrder'] == 3){
			$query_order = " order by propArea asc";
		}else if($condition['propOrder'] == 4){
			$query_order = " order by propArea desc";
		} 
		//limit
		$page = $condition['currentPageNo'];
		$page = ($page == "" || $page == 0) ? 1 : $page;
		$query_limit = "limit ".(($page - 1) * USER_SELL_PROPERTY_LIST_PAGE_SIZE).",".USER_SELL_PROPERTY_LIST_PAGE_SIZE;		
		//fields
		$query_fields = "propId,propKind,propName,propNumber,propPrice,propArea,floor(propPrice*10000/propArea) as perPriceArea,userId,propState,from_unixtime(createTime,'%Y-%m-%d') as createDate,from_unixtime(createTime,'%H:%i') as createTime,from_unixtime(updateTime,'%Y-%m-%d') as updateDate,from_unixtime(updateTime,'%H:%i') as updateTime,room,hall,propPhoto,createTime as propCreateTime ";
		$totalNum = $this->houseDAO->countPropertyList('vw_get_sell_property_list',$query_where);
		//echo '<br/>finish to get totalNum --'.date('Ymd His');
		$propList = $this->houseDAO->getPropertyList('vw_get_sell_property_list',$query_fields,$query_where,$query_order,$query_limit);
		//echo '<br/>finish to get propList --'.date('Ymd His');
		$pagination = pagination2($totalNum,USER_SELL_PROPERTY_LIST_PAGE_SIZE,$page,5);
		$props['data'] = $propList;
		$props['pagination'] = $pagination;
		return $props;
	}
	
	public function deletePropertyList($propIds){
		if($propIds == "") return false;
		$propIds = substr($propIds, 0, (strlen($propIds) - 1));
		
		$ids = explode(",",$propIds);
		$len = count($ids);
		
		for($i=0; $i<$len; $i++){
			$id = $ids[$i];
			$dao = "";
			$offset = 0;
			$picBuildType = 0;
			//echo $id."|";
			if(!strpos($id,'zz')){
				$dao = $this->houseDAO;
				$offset = 2;
				$picBuildType = 1;
			}else if(!strpos($id,'bs')){
				$dao = $this->villaDAO;
				$offset = 2;
				$picBuildType = 4;
			}else if(!strpos($id,'sp')){
				$dao = $this->shopsDAO;
				$offset = 2;
				$picBuildType = 2;
			}else if(!strpos($id,'xzl')){
				$dao = $this->officeDAO;
				$offset = 3;
				$picBuildType = 3;
			}else if(!strpos($id,'cf')){
				$dao = $this->factoryDAO;
				$offset = 2;
				$picBuildType = 5;
			}
			if($dao == "") return false;

			//echo $offset."|".$picBuildType;
			$id = substr($id,$offset);
			$dao->delete($id);
			$this->picDAO->delPicByPropIdAndType($picBuildType,$id);
		}
		return true;
	}
	
	public function deletePropPic($picId){
		return $this->picDAO->delPicById($picId);
	}
	
	public function sendPropToAgent($prop){

		$propId = $this->agentPropertyDAO->save($prop);
		if($propId){
			$this->userDAO->deactiveCertCode($prop['contactMobile'],$prop['certcode']);
			return $propId;
		}
		return '';
	}
	public function deleteTopPic($pic){
		$where = "where picBuildId=".$pic['picBuildId']." and pictypeId=".$pic['pictypeId']." and picBuildType=".$pic['picBuildType'];
		return $this->picDAO->delPic($where);
	}
	public function savePropPic($pic){
		return $this->picDAO->release($pic);
	}
	public function refreshProperty($propKind,$propId){
		$dao = "";
		if($propKind == 'zz'){
			$dao = $this->houseDAO;
		}else if($propKind == 'bs'){
			$dao = $this->villaDAO;
		}else if($propKind == 'sp'){
			$dao = $this->shopsDAO;
		}else if($propKind == 'xzl'){
			$dao = $this->officeDAO;
		}else if($propKind == 'cf'){
			$dao = $this->factoryDAO;
		}
		if($dao == "") return false;
		return $dao->refresh($propId);
	}
}