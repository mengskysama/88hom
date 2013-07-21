<?php
/**
 * 住宅业务操作类
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-07-12
 */
class HouseService{
	private $db=null;
	private $houseDAO=null;
	private $picDAO=null;
	private $area=null;
	public function __construct($db){
		$this->db=$db;
		$this->houseDAO=new HouseDAO($db);
		$this->picDAO=new picDAO($db);
		$this->area=new Area();
	}
	//搜索住宅出售列表信息
	public function getHouseSellListForSearch($searchModel){
		global $cfg;
		$result=null;
		$where='where 1=1';
		$group='GROUP BY h.houseId';
		$order='order by u.userType asc,h.houseUpdateTime desc';
		$limit='limit '.$searchModel->begin.','.$searchModel->step;
		if($searchModel->p!==''){
			$where.=' and c.communityProvince='.$searchModel->p;
		}
		if($searchModel->c!==''){
			$where.=' and c.communityCity='.$searchModel->c;
		}
		if($searchModel->d!==''){
			$where.=' and c.communityDistrict='.$searchModel->d;
		}
		if($searchModel->a!==''){
			$where.=' and c.communityArea='.$searchModel->a;
		}
		if($searchModel->room!==''){
			if($searchModel->room==6){
				$where.=' and h.houseRoom>='.$searchModel->room;
			}else{
				$where.=' and h.houseRoom='.$searchModel->room;
			}
		}
		if($searchModel->hall!==''){
			$where.=' and h.houseHall='.$searchModel->hall;
		}
		if($searchModel->kitchen!==''){
			$where.=' and h.houseKitchen='.$searchModel->kitchen;
		}
		if($searchModel->balcoy!==''){
			$where.=' and h.houseBalcoy='.$searchModel->balcoy;
		}
		if($searchModel->openPriceStart!==''){
			$where.=' and h.houseSellPrice>'.$searchModel->openPriceStart;
		}
		if($searchModel->openPriceEnd!==''){
			$where.=' and h.houseSellPrice<='.$searchModel->openPriceEnd;
		}
		if($searchModel->buildAreaStart!==''){
			$where.=' and h.houseBuildArea>'.$searchModel->buildAreaStart;
		}
		if($searchModel->buildAreaEnd!==''){
			$where.=' and h.houseBuildArea<='.$searchModel->buildAreaEnd;
		}
		if($searchModel->buildYearStart!==''){
			$where.=' and h.houseBuildYear>'.$searchModel->buildYearStart;
		}
		if($searchModel->buildYearEnd!==''){
			$where.=' and h.houseBuildYear<='.$searchModel->buildYearEnd;
		}
		if($searchModel->floorStart!==''){
			$where.=' and h.houseFloor>'.$searchModel->floorStart;
		}
		if($searchModel->floorEnd!==''){
			$where.=' and h.houseFloor<='.$searchModel->floorEnd;
		}
		if($searchModel->type!==''){
			$where.=' and h.houseType='.$searchModel->type;
		}
		if($searchModel->forward!==''){
			$where.=' and h.houseForward='.$searchModel->forward;
		}
		if($searchModel->fitment!==''){
			$where.=' and h.houseFitment='.$searchModel->fitment;
		}
		if(!empty($searchModel->search)){
			$where.=' and h.houseTitle like "%'.$searchModel->search.'%"';
		}
		if($searchModel->orderPrice!==''){
			if($searchModel->orderPrice==1){
				$order.=',h.houseSellPrice asc';
			}else{
				$order.=',h.houseSellPrice desc';
			}
		}
		if($searchModel->orderArea!==''){
			if($searchModel->orderArea==1){
				$order.=',h.houseBuildArea asc';
			}else{
				$order.=',h.houseBuildArea desc';
			}
		}
		$result=$this->houseDAO->getHouseSellListForSearch($where,$group,$order,$limit);
		if(!empty($result[0]['houseId'])){
			for($i=0;$i<count($result);$i++){
				$result[$i]['houseAreaName']=$this->area->C[$result[$i]['communityProvince']][$result[$i]['communityCity']].'-'.$this->area->D[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']].'-'.$this->area->A[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']][$result[$i]['communityArea']];
				$result[$i]['houseForward']=empty($cfg['arr_build']['2handHouseForward'][$result[$i]['houseForward']])?'':$cfg['arr_build']['2handHouseForward'][$result[$i]['houseForward']];
				$result[$i]['houseFitment']=empty($cfg['arr_build']['2handHouseFitment'][$result[$i]['houseFitment']])?'':$cfg['arr_build']['2handHouseFitment'][$result[$i]['houseFitment']];
			}
		}
		return $result;
	}
	//搜索住宅出售总数信息
	public function getHouseSellCountForSearch($searchModel){
		$where='where 1=1';
		$group='GROUP BY h.houseId';
		if($searchModel->p!==''){
			$where.=' and c.communityProvince='.$searchModel->p;
		}
		if($searchModel->c!==''){
			$where.=' and c.communityCity='.$searchModel->c;
		}
		if($searchModel->d!==''){
			$where.=' and c.communityDistrict='.$searchModel->d;
		}
		if($searchModel->a!==''){
			$where.=' and c.communityArea='.$searchModel->a;
		}
		if($searchModel->room!==''){
			if($searchModel->room==6){
				$where.=' and h.houseRoom>='.$searchModel->room;
			}else{
				$where.=' and h.houseRoom='.$searchModel->room;
			}
		}
		if($searchModel->hall!==''){
			$where.=' and h.houseHall='.$searchModel->hall;
		}
		if($searchModel->kitchen!==''){
			$where.=' and h.houseKitchen='.$searchModel->kitchen;
		}
		if($searchModel->balcoy!==''){
			$where.=' and h.houseBalcoy='.$searchModel->balcoy;
		}
		if($searchModel->openPriceStart!==''){
			$where.=' and h.houseSellPrice>'.$searchModel->openPriceStart;
		}
		if($searchModel->openPriceEnd!==''){
			$where.=' and h.houseSellPrice<='.$searchModel->openPriceEnd;
		}
		if($searchModel->buildAreaStart!==''){
			$where.=' and h.houseBuildArea>'.$searchModel->buildAreaStart;
		}
		if($searchModel->buildAreaEnd!==''){
			$where.=' and h.houseBuildArea<='.$searchModel->buildAreaEnd;
		}
		if($searchModel->buildYearStart!==''){
			$where.=' and h.houseBuildYear>'.$searchModel->buildYearStart;
		}
		if($searchModel->buildYearEnd!==''){
			$where.=' and h.houseBuildYear<='.$searchModel->buildYearEnd;
		}
		if($searchModel->floorStart!==''){
			$where.=' and h.houseFloor>'.$searchModel->floorStart;
		}
		if($searchModel->floorEnd!==''){
			$where.=' and h.houseFloor<='.$searchModel->floorEnd;
		}
		if($searchModel->type!==''){
			$where.=' and h.houseType='.$searchModel->type;
		}
		if($searchModel->forward!==''){
			$where.=' and h.houseForward='.$searchModel->forward;
		}
		if($searchModel->fitment!==''){
			$where.=' and h.houseFitment='.$searchModel->fitment;
		}
		if(!empty($searchModel->search)){
			$where.=' and h.houseTitle like "%'.$searchModel->search.'%"';
		}
		return $this->houseDAO->getHouseSellCountForSearch($where,$group);
	}
	//搜索住宅出租列表信息
	public function getHouseRentListForSearch($searchModel){
		
	}
	//搜索住宅出租总数信息
	public function getHouseRentCountForSearch($searchModel){
		
	}
}
?>