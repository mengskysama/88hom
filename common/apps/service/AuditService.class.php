<?php
/**
 * 审核业务操作类
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-07-12
 */
class AuditService{
	private $db=null;
	private $auditDAO=null;
	private $picDAO=null;
	private $area=null;
	public function __construct($db){
		$this->db=$db;
		$this->auditDAO=new AuditDAO($db);
		$this->picDAO=new picDAO($db);
		$this->area=new Area();
	}
	//小区发布审核操作
	public function getCommunityById($auditModel){
		$where='where 1=1 and communityId='.$auditModel->bId;
		return $this->auditDAO->getCommunityById($where);
	}
	public function getCommunityList($auditModel){
		$result=null;
		$where='where 1=1';
		if($auditModel->state!==''){
			$where.=' and communityState='.$auditModel->state;
		}
		if($auditModel->uId!==''){
			$where.=' and communityUserId='.$auditModel->uId;
		}
		if($auditModel->p!==''){
			$where.=' and communityProvince='.$auditModel->p;
		}
		if($auditModel->c!==''){
			$where.=' and communityCity='.$auditModel->c;
		}
		if($auditModel->d!==''){
			$where.=' and communityDistrict='.$auditModel->d;
		}
		if($auditModel->a!==''){
			$where.=' and communityArea='.$auditModel->a;
		}
		if($auditModel->search!=''){
			$where.=' and communityName like "%'.$auditModel->search.'%"';
		}
		$order='order by communityUpdateTime desc ';
		$limit='limit '.$auditModel->begin.','.$auditModel->step;
		$result=$this->auditDAO->getCommunityList($where,$order,$limit);
		if(!empty($result[0]['communityId'])){
			for($i=0;$i<count($result);$i++){
				$result[$i]['communityAreaName']=$this->area->C[$result[$i]['communityProvince']][$result[$i]['communityCity']].'-'.$this->area->D[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']].'-'.$this->area->A[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']][$result[$i]['communityArea']];
			}
		}
		return $result;
	}
	public function countCommunity($auditModel){
		$where='where 1=1';
		if($auditModel->state!==''){
			$where.=' and communityState='.$auditModel->state;
		}
		if($auditModel->uId!==''){
			$where.=' and communityUserId='.$auditModel->uId;
		}
		if($auditModel->p!==''){
			$where.=' and communityProvince='.$auditModel->p;
		}
		if($auditModel->c!==''){
			$where.=' and communityCity='.$auditModel->c;
		}
		if($auditModel->d!==''){
			$where.=' and communityDistrict='.$auditModel->d;
		}
		if($auditModel->a!==''){
			$where.=' and communityArea='.$auditModel->a;
		}
		if($auditModel->search!=''){
			$where.=' and communityName like "%'.$auditModel->search.'%"';
		}
		return $this->auditDAO->countCommunity($where);
	}
	//修改新盘信息
	public function changeCommunityAndModify($info){
		global $cfg;
		$msg=true;
		$areaIndexArr = explode("-",$info['areaIndex']);
		$info['communityProvince'] = $areaIndexArr[0];
		$info['communityCity'] = $areaIndexArr[1];
		$info['communityDistrict'] = $areaIndexArr[2];
		$info['communityArea'] = $areaIndexArr[3];
		$picInfo='';
		$picInfo=$this->area->C[$info['communityProvince']][$info['communityCity']];
		$picInfo.=' '.$info['communityName'];
		$info['communityState'] = 1;
		$info['communityOrderNum'] = 1;
		$info['communityUserId'] = $_SESSION['Admin_User']['userId'];
		$communityMapArr = null;
		if(!empty($info['communityMapXY'])){
			$communityMapArr = explode(',',$info['communityMapXY']);
			$info['communityMapX'] = $communityMapArr[0];
			$info['communityMapY'] = $communityMapArr[1];
		}else{
			$info['communityMapX'] = 0;
			$info['communityMapY'] = 0;
		}
		$result=$this->auditDAO->changeCommunityAndModify($info);
		if($result<0){
			$msg='新增小区基本信息更新失败！';
		}else{
			$result=0;
			$where="where picBuildId=".$info['communityId']." and picBuildFatherType=1";
			$result=$this->picDAO->setPicDel($where);
			if($result<0){
				$msg='小区图片信息删除失败！';
			}else{
				if(!empty($info['path'])){
					foreach($info['path'] as $key=>$value){
						$pic['picBuildId']=$info['communityId'];
						$pic['picBuildFatherType']=1;//1小区，2新盘，3家居
						$pic['pictypeId']=$info['picTypeId'][$key];
						$pic['picUrl']=$info['path'][$key];
						$pic['picThumb']=$info['pathThumb'][$key];
						$pic['picInfo']=$info['name'][$key];
						if(empty($pic['picInfo'])){
							$pic['picInfo']=$picInfo.' '.$cfg['arr_pic']['communityPicType'][$pic['pictypeId']];
						}
						$pic['picLayer']=$info['picLayer'][$key];
						$pic['picState']=1;
						$result=$this->picDAO->release($pic);
						if($result<0){
							$msg='小区图片信息更新失败！';
							break;
						} 
					}
				}
			} 
		}
		return $msg;
	}
	public function changeCommunityStateById($auditModel){
		$msg=true;
		$result=$this->auditDAO->changeCommunityState($auditModel->state,$auditModel->uId,$auditModel->bId);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	public function changeCommunityStateByIds($auditModel){
		$msg=true;
		foreach($auditModel->ids as $key=>$id){
			$result=$this->auditDAO->changeCommunityState($auditModel->state,$auditModel->uId,$id);
			if($result<0){
				$msg='信息状态更改失败！';
				break;
			}
		}
		return $msg;
	}
	//住宅房源发布审核操作
	public function getHouseList($auditModel){
		$result=null;
		$where='where 1=1';
		$order=' order by h.houseUpdateTime desc';
		$limit=' limit '.$auditModel->begin.','.$auditModel->step;
		if($auditModel->state!==''){
			$where.=' and h.houseState='.$auditModel->state;
		}
		if($auditModel->isSellRent!==''){
			$where.=' and h.houseSellRentType='.$auditModel->isSellRent;
		}
		if($auditModel->p!==''){
			$where.=' and c.communityProvince='.$auditModel->p;
		}
		if($auditModel->c!==''){
			$where.=' and c.communityCity='.$auditModel->c;
		}
		if($auditModel->d!==''){
			$where.=' and c.communityDistrict='.$auditModel->d;
		}
		if($auditModel->a!==''){
			$where.=' and c.communityArea='.$auditModel->a;
		}
		if($auditModel->search!=''){
			$where.=' and h.houseTitle like "%'.$auditModel->search.'%"';
		}
		$result=$this->auditDAO->getHouseList($where,$order,$limit);
		if(!empty($result[0]['houseId'])){
			for($i=0;$i<count($result);$i++){
				$result[$i]['houseAreaName']=$this->area->C[$result[$i]['communityProvince']][$result[$i]['communityCity']].'-'.$this->area->D[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']].'-'.$this->area->A[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']][$result[$i]['communityArea']];
			}
		}
		return $result;
	}
	public function countHouse($auditModel){
		$where='where 1=1';
		if($auditModel->state!==''){
			$where.=' and h.houseState='.$auditModel->state;
		}
		if($auditModel->isSellRent!==''){
			$where.=' and h.houseSellRentType='.$auditModel->isSellRent;
		}
		if($auditModel->p!==''){
			$where.=' and c.communityProvince='.$auditModel->p;
		}
		if($auditModel->c!==''){
			$where.=' and c.communityCity='.$auditModel->c;
		}
		if($auditModel->d!==''){
			$where.=' and c.communityDistrict='.$auditModel->d;
		}
		if($auditModel->a!==''){
			$where.=' and c.communityArea='.$auditModel->a;
		}
		if($auditModel->search!=''){
			$where.=' and h.houseTitle like "%'.$auditModel->search.'%"';
		}
		return $this->auditDAO->countHouse($where);
	}
	public function changeHouseStateById($auditModel){
		$msg=true;
		$result=$this->auditDAO->changeHouseState($auditModel->state,$auditModel->bId);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	public function changeHouseStateByIds($auditModel){
		$msg=true;
		foreach($auditModel->ids as $key=>$id){
			$result=$this->auditDAO->changeHouseState($auditModel->state,$id);
			if($result<0){
				$msg='信息状态更改失败！';
				break;
			}
		}
		return $msg;
	}
	public function getHouseDetail($auditModel){
		global $cfg;
		$result=null;
		$where='where 1=1';
		if($auditModel->bId!==''){
			$where.=' and h.houseId='.$auditModel->bId;
		}
		if($auditModel->state!==''){
			$where.=' and h.houseState='.$auditModel->state;
		}
		$result=$this->auditDAO->getHouseDetail($where);
		if(!empty($result['houseId'])){
			$result['houseAreaName']=$this->area->C[$result['communityProvince']][$result['communityCity']].'-'.$this->area->D[$result['communityProvince']][$result['communityCity']][$result['communityDistrict']].'-'.$this->area->A[$result['communityProvince']][$result['communityCity']][$result['communityDistrict']][$result['communityArea']];
			$result['houseType']=empty($cfg['arr_build']['2handHouseType'][$result['houseType']])?'':$cfg['arr_build']['2handHouseType'][$result['houseType']];
			$result['housePayInfo']=empty($cfg['arr_build']['2handHousePayInfo'][$result['housePayInfo']])?'':$cfg['arr_build']['2handHousePayInfo'][$result['housePayInfo']];
			$result['houseForward']=empty($cfg['arr_build']['2handHouseForward'][$result['houseForward']])?'':$cfg['arr_build']['2handHouseForward'][$result['houseForward']];
			$result['houseFitment']=empty($cfg['arr_build']['2handHouseFitment'][$result['houseFitment']])?'':$cfg['arr_build']['2handHouseFitment'][$result['houseFitment']];
			$result['houseLookTime']=empty($cfg['arr_build']['2handHouseLookTime'][$result['houseLookTime']])?'':$cfg['arr_build']['2handHouseLookTime'][$result['houseLookTime']];
			if(!empty($result['houseBaseService'])){
				$arrHouseBaseService=explode(',', $result['houseBaseService']);
				$result['houseBaseServiceStr']='';
				for($i=0;$i<count($arrHouseBaseService);$i++){
					$result['houseBaseServiceStr'].=empty($cfg['arr_build']['2handHouseBaseService'][$arrHouseBaseService[$i]])?'':$cfg['arr_build']['2handHouseBaseService'][$arrHouseBaseService[$i]];
					$result['houseBaseServiceStr'].=' ';
				}
			}
			//出租的属性
			$result['houseRentType']=empty($cfg['arr_build']['2handHouseRentType'][$result['houseRentType']])?'':$cfg['arr_build']['2handHouseRentType'][$result['houseRentType']];
			$result['houseRentRoomType']=empty($cfg['arr_build']['2handHouseRentRoomType'][$result['houseRentRoomType']])?'':$cfg['arr_build']['2handHouseRentRoomType'][$result['houseRentRoomType']];
			$result['houseRentDetail']=empty($cfg['arr_build']['2handHouseRentDetail'][$result['houseRentDetail']])?'':$cfg['arr_build']['2handHouseRentDetail'][$result['houseRentDetail']];
			$result['housePayment']=empty($cfg['arr_build']['2handHousePayment'][$result['housePayment']])?'':$cfg['arr_build']['2handHousePayment'][$result['housePayment']];
			$result['housePayDetailY']=empty($cfg['arr_build']['2handHousePayDetailY'][$result['housePayDetailY']])?'':$cfg['arr_build']['2handHousePayDetailY'][$result['housePayDetailY']];
			$result['housePayDetailF']=empty($cfg['arr_build']['2handHousePayDetailF'][$result['housePayDetailF']])?'':$cfg['arr_build']['2handHousePayDetailF'][$result['housePayDetailF']];
		}
		return $result;
	}
	public function getPicList($auditModel){
		$field='*';
		$where='where picBuildId='.$auditModel->bId;
		$order='order by pictypeId,picLayer desc';
		$limit='limit '.$auditModel->begin.','.$auditModel->step;
		if($auditModel->picBuildFatherType!=''){
			$where.=' and picBuildFatherType='.$auditModel->picBuildFatherType;
		}
		if($auditModel->picBuildType!=''){
			$where.=' and picBuildType='.$auditModel->picBuildType;
		}
		if($auditModel->picSellRent!=''){
			$where.=' and picSellRent='.$auditModel->picSellRent;
		}
		if($auditModel->picTypeId!=''){
			$where.=' and pictypeId='.$auditModel->picTypeId;
		}
		return $this->picDAO->getPicList($field,$where,$order,$limit);
	}
	//商铺房源发布审核操作
	public function getShopsList($auditModel){
		$result=null;
		$where='where 1=1';
		$order=' order by s.shopsUpdateTime desc';
		$limit=' limit '.$auditModel->begin.','.$auditModel->step;
		if($auditModel->state!==''){
			$where.=' and s.shopsState='.$auditModel->state;
		}
		if($auditModel->isSellRent!==''){
			$where.=' and s.shopsSellRentType='.$auditModel->isSellRent;
		}
		if($auditModel->p!==''){
			$where.=' and c.communityProvince='.$auditModel->p;
		}
		if($auditModel->c!==''){
			$where.=' and c.communityCity='.$auditModel->c;
		}
		if($auditModel->d!==''){
			$where.=' and c.communityDistrict='.$auditModel->d;
		}
		if($auditModel->a!==''){
			$where.=' and c.communityArea='.$auditModel->a;
		}
		if($auditModel->search!=''){
			$where.=' and h.shopsTitle like "%'.$auditModel->search.'%"';
		}
		$result=$this->auditDAO->getShopsList($where,$order,$limit);
		if(!empty($result[0]['shopsId'])){
			for($i=0;$i<count($result);$i++){
				$result[$i]['shopsAreaName']=$this->area->C[$result[$i]['communityProvince']][$result[$i]['communityCity']].'-'.$this->area->D[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']].'-'.$this->area->A[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']][$result[$i]['communityArea']];
			}
		}
		return $result;
	}
	public function countShops($auditModel){
		$where='where 1=1';
		if($auditModel->state!==''){
			$where.=' and s.shopsState='.$auditModel->state;
		}
		if($auditModel->isSellRent!==''){
			$where.=' and s.shopsSellRentType='.$auditModel->isSellRent;
		}
		if($auditModel->p!==''){
			$where.=' and c.communityProvince='.$auditModel->p;
		}
		if($auditModel->c!==''){
			$where.=' and c.communityCity='.$auditModel->c;
		}
		if($auditModel->d!==''){
			$where.=' and c.communityDistrict='.$auditModel->d;
		}
		if($auditModel->a!==''){
			$where.=' and c.communityArea='.$auditModel->a;
		}
		if($auditModel->search!=''){
			$where.=' and h.shopsTitle like "%'.$auditModel->search.'%"';
		}
		return $this->auditDAO->countShops($where);
	}
	public function changeShopsState($auditModel){
		$msg=true;
		$result=$this->auditDAO->changeShopsState($auditModel->state,$auditModel->sId);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	public function changeShopsStateById($auditModel){
		$msg=true;
		$result=$this->auditDAO->changeShopsState($auditModel->state,$auditModel->bId);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	public function changeShopsStateByIds($auditModel){
		$msg=true;
		foreach($auditModel->ids as $key=>$id){
			$result=$this->auditDAO->changeShopsState($auditModel->state,$id);
			if($result<0){
				$msg='信息状态更改失败！';
				break;
			}
		}
		return $msg;
	}
	public function getShopsDetail($auditModel){
		global $cfg;
		$result=null;
		$where='where 1=1';
		if($auditModel->bId!==''){
			$where.=' and s.shopsId='.$auditModel->bId;
		}
		if($auditModel->state!==''){
			$where.=' and s.shopsState='.$auditModel->state;
		}
		$result=$this->auditDAO->getShopsDetail($where);
		if(!empty($result['shopsId'])){
			$result['shopsAreaName']=$this->area->C[$result['communityProvince']][$result['communityCity']].'-'.$this->area->D[$result['communityProvince']][$result['communityCity']][$result['communityDistrict']].'-'.$this->area->A[$result['communityProvince']][$result['communityCity']][$result['communityDistrict']][$result['communityArea']];
			$result['shopsType']=empty($cfg['arr_build']['2handShopsType'][$result['shopsType']])?'':$cfg['arr_build']['2handShopsType'][$result['shopsType']];
			$result['shopsDivision']=empty($cfg['arr_build']['2handShopsDivision'][$result['shopsDivision']])?'':$cfg['arr_build']['2handShopsDivision'][$result['shopsDivision']];
			$result['shopsFitment']=empty($cfg['arr_build']['2handShopsFitment'][$result['shopsFitment']])?'':$cfg['arr_build']['2handShopsFitment'][$result['shopsFitment']];
			if(!empty($result['shopsBaseService'])){
				$arrShopsBaseService=explode(',', $result['shopsBaseService']);
				$result['shopsBaseServiceStr']='';
				for($i=0;$i<count($arrShopsBaseService);$i++){
					$result['shopsBaseServiceStr'].=empty($cfg['arr_build']['2handShopsBaseService'][$arrShopsBaseService[$i]])?'':$cfg['arr_build']['2handShopsBaseService'][$arrShopsBaseService[$i]];
					$result['shopsBaseServiceStr'].=' ';
				}
			}
			if(!empty($result['shopsAimOperastion'])){
				$arrShopsAimOperastion=explode(',', $result['shopsAimOperastion']);
				$result['shopsAimOperastionStr']='';
				for($i=0;$i<count($arrShopsAimOperastion);$i++){
					$result['shopsAimOperastionStr'].=empty($cfg['arr_build']['2handShopsAimOperastion'][$arrShopsAimOperastion[$i]])?'':$cfg['arr_build']['2handShopsAimOperastion'][$arrShopsAimOperastion[$i]];
					$result['shopsAimOperastionStr'].=' ';
				}
			}
			
			//出租的属性
			//shopsRentPriceUnit
			
		}
		return $result;
	}
	//写字楼房源发布审核操作
	public function getOfficeList($auditModel){
		$result=null;
		$where='where 1=1';
		$order=' order by o.officeUpdateTime desc';
		$limit=' limit '.$auditModel->begin.','.$auditModel->step;
		if($auditModel->state!==''){
			$where.=' and o.officeState='.$auditModel->state;
		}
		if($auditModel->isSellRent!==''){
			$where.=' and o.officeSellRentType='.$auditModel->isSellRent;
		}
		if($auditModel->p!==''){
			$where.=' and c.communityProvince='.$auditModel->p;
		}
		if($auditModel->c!==''){
			$where.=' and c.communityCity='.$auditModel->c;
		}
		if($auditModel->d!==''){
			$where.=' and c.communityDistrict='.$auditModel->d;
		}
		if($auditModel->a!==''){
			$where.=' and c.communityArea='.$auditModel->a;
		}
		if($auditModel->search!=''){
			$where.=' and o.officeTitle like "%'.$auditModel->search.'%"';
		}
		$result=$this->auditDAO->getOfficeList($where,$order,$limit);
		if(!empty($result[0]['officeId'])){
			for($i=0;$i<count($result);$i++){
				$result[$i]['officeAreaName']=$this->area->C[$result[$i]['communityProvince']][$result[$i]['communityCity']].'-'.$this->area->D[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']].'-'.$this->area->A[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']][$result[$i]['communityArea']];
			}
		}
		return $result;
	}
	public function countOffice($auditModel){
		$where='where 1=1';
		if($auditModel->state!==''){
			$where.=' and o.officeState='.$auditModel->state;
		}
		if($auditModel->isSellRent!==''){
			$where.=' and o.officeSellRentType='.$auditModel->isSellRent;
		}
		if($auditModel->p!==''){
			$where.=' and c.communityProvince='.$auditModel->p;
		}
		if($auditModel->c!==''){
			$where.=' and c.communityCity='.$auditModel->c;
		}
		if($auditModel->d!==''){
			$where.=' and c.communityDistrict='.$auditModel->d;
		}
		if($auditModel->a!==''){
			$where.=' and c.communityArea='.$auditModel->a;
		}
		if($auditModel->search!=''){
			$where.=' and o.officeTitle like "%'.$auditModel->search.'%"';
		}
		return $this->auditDAO->countOffice($where);
	}
	public function changeOfficeStateById($auditModel){
		$msg=true;
		$result=$this->auditDAO->changeOfficeState($auditModel->state,$auditModel->bId);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	public function changeOfficeStateByIds($auditModel){
		$msg=true;
		foreach($auditModel->ids as $key=>$id){
			$result=$this->auditDAO->changeOfficeState($auditModel->state,$id);
			if($result<0){
				$msg='信息状态更改失败！';
				break;
			}
		}
		return $msg;
	}
	public function getOfficeDetail($auditModel){
		global $cfg;
		$result=null;
		$where='where 1=1';
		if($auditModel->bId!==''){
			$where.=' and o.officeId='.$auditModel->bId;
		}
		if($auditModel->state!==''){
			$where.=' and o.officeState='.$auditModel->state;
		}
		$result=$this->auditDAO->getOfficeDetail($where);
		if(!empty($result['officeId'])){
			$result['officeAreaName']=$this->area->C[$result['communityProvince']][$result['communityCity']].'-'.$this->area->D[$result['communityProvince']][$result['communityCity']][$result['communityDistrict']].'-'.$this->area->A[$result['communityProvince']][$result['communityCity']][$result['communityDistrict']][$result['communityArea']];
			$result['officeType']=empty($cfg['arr_build']['2handOfficeType'][$result['officeType']])?'':$cfg['arr_build']['2handOfficeType'][$result['officeType']];
			$result['officeDivision']=empty($cfg['arr_build']['2handOfficeDivision'][$result['officeDivision']])?'':$cfg['arr_build']['2handOfficeDivision'][$result['officeDivision']];
			$result['officeFitment']=empty($cfg['arr_build']['2handOfficeFitment'][$result['officeFitment']])?'':$cfg['arr_build']['2handOfficeFitment'][$result['officeFitment']];
			$result['officeLevel']=empty($cfg['arr_build']['2handOfficeLevel'][$result['officeLevel']])?'':$cfg['arr_build']['2handOfficeLevel'][$result['officeLevel']];
			
			//出租的属性
			//officeRentPriceUnit
			
		}
		return $result;
	}
	//别墅房源发布审核操作
	public function getVillaList($auditModel){
		$result=null;
		$where='where 1=1';
		$order=' order by v.villaUpdateTime desc';
		$limit=' limit '.$auditModel->begin.','.$auditModel->step;
		if($auditModel->state!==''){
			$where.=' and v.villaState='.$auditModel->state;
		}
		if($auditModel->isSellRent!==''){
			$where.=' and v.villaSellRentType='.$auditModel->isSellRent;
		}
		if($auditModel->p!==''){
			$where.=' and c.communityProvince='.$auditModel->p;
		}
		if($auditModel->c!==''){
			$where.=' and c.communityCity='.$auditModel->c;
		}
		if($auditModel->d!==''){
			$where.=' and c.communityDistrict='.$auditModel->d;
		}
		if($auditModel->a!==''){
			$where.=' and c.communityArea='.$auditModel->a;
		}
		if($auditModel->search!=''){
			$where.=' and v.villaTitle like "%'.$auditModel->search.'%"';
		}
		$result=$this->auditDAO->getVillaList($where,$order,$limit);
		if(!empty($result[0]['villaId'])){
			for($i=0;$i<count($result);$i++){
				$result[$i]['villaAreaName']=$this->area->C[$result[$i]['communityProvince']][$result[$i]['communityCity']].'-'.$this->area->D[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']].'-'.$this->area->A[$result[$i]['communityProvince']][$result[$i]['communityCity']][$result[$i]['communityDistrict']][$result[$i]['communityArea']];
			}
		}
		return $result;
	}
	public function countVilla($auditModel){
		$where='where 1=1';
		if($auditModel->state!==''){
			$where.=' and v.villaState='.$auditModel->state;
		}
		if($auditModel->isSellRent!==''){
			$where.=' and v.villaSellRentType='.$auditModel->isSellRent;
		}
		if($auditModel->p!==''){
			$where.=' and c.communityProvince='.$auditModel->p;
		}
		if($auditModel->c!==''){
			$where.=' and c.communityCity='.$auditModel->c;
		}
		if($auditModel->d!==''){
			$where.=' and c.communityDistrict='.$auditModel->d;
		}
		if($auditModel->a!==''){
			$where.=' and c.communityArea='.$auditModel->a;
		}
		if($auditModel->search!=''){
			$where.=' and v.villaTitle like "%'.$auditModel->search.'%"';
		}
		return $this->auditDAO->countVilla($where);
	}
	public function changeVillaStateById($auditModel){
		$msg=true;
		$result=$this->auditDAO->changeVillaState($auditModel->state,$auditModel->bId);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	public function changeVillaStateByIds($auditModel){
		$msg=true;
		foreach($auditModel->ids as $key=>$id){
			$result=$this->auditDAO->changeVillaState($auditModel->state,$id);
			if($result<0){
				$msg='信息状态更改失败！';
				break;
			}
		}
		return $msg;
	}
	public function getVillaDetail($auditModel){
		$where='where 1=1';
		if($auditModel->bId!==''){
			$where.=' and v.villaId='.$auditModel->bId;
		}
		if($auditModel->state!==''){
			$where.=' and v.villaState='.$auditModel->state;
		}
		return $this->auditDAO->getVillaDetail($where);
	}
	//厂房房源发布审核操作
	public function getFactoryList($auditModel){
		$where='';
		$order='';
		$limit='';
		return $this->auditDAO->getFactoryList($where,$order,$limit);
	}
	public function countFactory($auditModel){
		$where='';
		return $this->auditDAO->countFactory($where);
	}
	public function changeFactoryState($auditModel){
		$msg=true;
		$result=$this->auditDAO->changeFactoryState($auditModel->state,$auditModel->fId);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
}
?>