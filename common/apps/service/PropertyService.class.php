<?php
/**
 * 
 * 新盘业务处理类
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-06-09
 */
class PropertyService{
	private $db=null;
	private $propertyDAO = null;
	private $picDAO=null;

	public function __construct($db){
		$this->db=$db;
		$this->propertyDAO = new PropertyDAO($db);
		$this->picDAO=new PicDAO($db);
	}
	//发布新盘信息
	public function release($info){
		global $cfg;
		require_once ECMS_PATH_ROOT.'includes/area.inc.php';
		$msg=true;
		$areaIndexArr = explode("-",$info['areaIndex']);
		$info['propertyProvince'] = $areaIndexArr[0];
		$info['propertyCity'] = $areaIndexArr[1];
		$info['propertyDistrict'] = $areaIndexArr[2];
		$info['propertyArea'] = $areaIndexArr[3];
		$info['propertyUserId'] = $_SESSION['Admin_User']['userId'];
		$picInfo='';
		$picInfo=$C[$info['propertyProvince']][$info['propertyCity']];
		$picInfo.=' '.$info['propertyName'];
		if(!empty($info['propertyIsGbuy'])&&$info['propertyIsGbuy']!=1){
			$info['propertyIsGbuyTop']='';
			$info['propertyGbuyPrice']='';
			$info['propertyGbuyTitle']='';
			$info['propertyGbuyTime']='';
		}
		if(!empty($info['propertyIsDiscounts'])&&$info['propertyIsDiscounts']!=1){
			$info['propertyDiscountsPrice']='';
			$info['propertyDiscountsTitle']='';
		}
		if(!empty($info['propertyIsPreferential'])&&$info['propertyIsPreferential']!=1){
			$info['propertyPreferentialPrice']='';
			$info['propertyPreferentialTitle']='';
		}
		$propertyMapArr = null;
		if(!empty($info['propertyMapXY'])){
			$propertyMapArr = explode(',',$info['propertyMapXY']);
			$info['propertyMapX'] = $propertyMapArr[0];
			$info['propertyMapY'] = $propertyMapArr[1];
		}else{
			$info['propertyMapX'] = 0;
			$info['propertyMapY'] = 0;
		}
		$result=$this->propertyDAO->release($info);
		if($result<0){
			$msg='发布新盘基本信息失败！';
		}else{
			$propertyId=$this->db->getInsertNum();
			if(!empty($info['path'])){
				foreach($info['path'] as $key=>$value){
					$pic['picBuildId']=$propertyId;
					$pic['picBuildFatherType']=2;//1小区，2新盘，3家居
					$pic['pictypeId']=$info['picTypeId'][$key];
					$pic['picUrl']=$info['path'][$key];
					$pic['picThumb']=$info['pathThumb'][$key];
					$pic['picInfo']=$info['name'][$key];
					if(empty($pic['picInfo'])){
						$pic['picInfo']=$picInfo.' '.$cfg['arr_pic']['propertyPicType'][$pic['pictypeId']];
					}
					$pic['picLayer']=$info['picLayer'][$key];
					$pic['picState']=1;
					$result=$this->picDAO->release($pic);
					if($result<0){
						$msg='发布新盘图片信息失败！';
					} 
				}
			}
		}
		return $msg;
	}
	//修改新盘信息
	public function modify($info){
		global $cfg;
		require_once ECMS_PATH_ROOT.'includes/area.inc.php';
		$msg=true;
		$areaIndexArr = explode("-",$info['areaIndex']);
		$info['propertyProvince'] = $areaIndexArr[0];
		$info['propertyCity'] = $areaIndexArr[1];
		$info['propertyDistrict'] = $areaIndexArr[2];
		$info['propertyArea'] = $areaIndexArr[3];
		$picInfo='';
		$picInfo=$C[$info['propertyProvince']][$info['propertyCity']];
		$picInfo.=' '.$info['propertyName'];
		$info['propertyUserId'] = $_SESSION['Admin_User']['userId'];
		if(!empty($info['propertyIsGbuy'])&&$info['propertyIsGbuy']!=1){
			$info['propertyIsGbuyTop']='';
			$info['propertyGbuyPrice']='';
			$info['propertyGbuyTitle']='';
			$info['propertyGbuyTime']='';
		}
		if(!empty($info['propertyIsDiscounts'])&&$info['propertyIsDiscounts']!=1){
			$info['propertyDiscountsPrice']='';
			$info['propertyDiscountsTitle']='';
		}
		if(!empty($info['propertyIsPreferential'])&&$info['propertyIsPreferential']!=1){
			$info['propertyPreferentialPrice']='';
			$info['propertyPreferentialTitle']='';
		}
		$propertyMapArr = null;
		if(!empty($info['propertyMapXY'])){
			$propertyMapArr = explode(',',$info['propertyMapXY']);
			$info['propertyMapX'] = $propertyMapArr[0];
			$info['propertyMapY'] = $propertyMapArr[1];
		}else{
			$info['propertyMapX'] = 0;
			$info['propertyMapY'] = 0;
		}
		$result=$this->propertyDAO->modify($info);
		if($result<0){
			$msg='新盘基本信息更新失败！';
		}else{
			$result=0;
			$where="where picBuildId=".$info['propertyId']." and picBuildFatherType=2";
			$result=$this->picDAO->delPic($where);
			if($result<0){
				$msg='新盘图片信息删除失败！';
			}else{
				if(!empty($info['path'])){
					foreach($info['path'] as $key=>$value){
						$pic['picBuildId']=$info['propertyId'];
						$pic['picBuildFatherType']=2;//1小区，2新盘，3家居
						$pic['pictypeId']=$info['picTypeId'][$key];
						$pic['picUrl']=$info['path'][$key];
						$pic['picThumb']=$info['pathThumb'][$key];
						$pic['picInfo']=$info['name'][$key];
						if(empty($pic['picInfo'])){
							$pic['picInfo']=$picInfo.' '.$cfg['arr_pic']['propertyPicType'][$pic['pictypeId']];
						}
						$pic['picLayer']=$info['picLayer'][$key];
						$pic['picState']=1;
						$result=$this->picDAO->release($pic);
						if($result<0){
							$msg='新盘图片信息更新失败！';
							break;
						} 
					}
				}
			} 
		}
		return $msg;
	}
	//获取新盘列表
	public function getPropertyList($info){
		$field='*';
		$where='where 1=1 ';
		$order='order by property.propertyUpdateTime desc';
		$limit='limit '.$info['begin'].','.$info['step'];
		if($info['type']=='propertyAndUser'){
			if($info['propertyIsHouseType']==1){
				$where.='and propertyIsHouseType=1 ';
			}
			if($info['propertyIsBusinessType']==1){
				$where.='and propertyIsBusinessType=1 ';
			}
			if($info['propertyIsOfficeType']==1){
				$where.='and propertyIsOfficeType=1 ';
			}
			if($info['propertyIsVillaType']==1){
				$where.='and propertyIsVillaType=1 ';
			}
			if($info['propertyIsHot']==1){
				$where.='and propertyIsHot=1 ';
			}
			if($info['propertyIsBusiness']==1){
				$where.='and propertyIsBusiness=1 ';
			}
			if($info['propertyIsSmallAmt']==1){
				$where.='and propertyIsSmallAmt=1 ';
			}
			if($info['propertyIsSubwayLine']==1){
				$where.='and propertyIsSubwayLine=1 ';
			}
			if($info['propertyIsPark']==1){
				$where.='and propertyIsPark=1 ';
			}
			if($info['propertyIsInvestment']==1){
				$where.='and propertyIsInvestment=1 ';
			}
			if($info['propertyIsRecommend']==1){
				$where.='and propertyIsRecommend=1 ';
			}
			if($info['propertyIsFine']==1){
				$where.='and propertyIsFine=1 ';
			}
			if($info['propertyIsGbuy']==1){
				$where.='and propertyIsGbuy=1 ';
			}
			if($info['propertyIsDiscounts']==1){
				$where.='and propertyIsDiscounts=1 ';
			}
			if($info['propertyIsPreferential']==1){
				$where.='and propertyIsPreferential=1 ';
			}
			if($info['propertyState']==1){
				$where.='and propertyState=1 ';
			}
			if(trim($info['search'])!=''){
				$where.='and propertyName like "%'.trim($info['search']).'%" ';
			}
			if(!empty($info['areaIndex'])){
				$areaIndexArr = explode("-",$info['areaIndex']);
				$temp = '';
				if(count($areaIndexArr)==2)
					$where .= 'and propertyProvince='.$areaIndexArr[0].' and propertyCity='.$areaIndexArr[1].' ';
				else if(count($areaIndexArr)==3) 
					$where .= 'and propertyProvince='.$areaIndexArr[0].' and propertyCity='.$areaIndexArr[1].' and propertyDistrict='.$areaIndexArr[2].' ';
				else 
					$where .= 'and propertyProvince='.$areaIndexArr[0].' and propertyCity='.$areaIndexArr[1].' and propertyDistrict='.$areaIndexArr[2].' and propertyArea='.$areaIndexArr[3].' ';	
			}
//			echo $where;
//			exit;
			$result=$this->propertyDAO->getPropertyListByUser($field,$where,$order,$limit);
			return $result;
		}else if($info['type']=='propertyAndUserAndPic'){
			
		}
	}
	//获取新盘总数
	public function countProperty($info){
		$where='where 1=1 ';
		if($info['type']=='propertyAndUser'){
			if($info['propertyIsHouseType']==1){
				$where.='and propertyIsHouseType=1 ';
			}
			if($info['propertyIsBusinessType']==1){
				$where.='and propertyIsBusinessType=1 ';
			}
			if($info['propertyIsOfficeType']==1){
				$where.='and propertyIsOfficeType=1 ';
			}
			if($info['propertyIsVillaType']==1){
				$where.='and propertyIsVillaType=1 ';
			}
			if($info['propertyIsHot']==1){
				$where.='and propertyIsHot=1 ';
			}
			if($info['propertyIsBusiness']==1){
				$where.='and propertyIsBusiness=1 ';
			}
			if($info['propertyIsSmallAmt']==1){
				$where.='and propertyIsSmallAmt=1 ';
			}
			if($info['propertyIsSubwayLine']==1){
				$where.='and propertyIsSubwayLine=1 ';
			}
			if($info['propertyIsPark']==1){
				$where.='and propertyIsPark=1 ';
			}
			if($info['propertyIsInvestment']==1){
				$where.='and propertyIsInvestment=1 ';
			}
			if($info['propertyIsRecommend']==1){
				$where.='and propertyIsRecommend=1 ';
			}
			if($info['propertyIsFine']==1){
				$where.='and propertyIsFine=1 ';
			}
			if($info['propertyIsGbuy']==1){
				$where.='and propertyIsGbuy=1 ';
			}
			if($info['propertyIsDiscounts']==1){
				$where.='and propertyIsDiscounts=1 ';
			}
			if($info['propertyIsPreferential']==1){
				$where.='and propertyIsPreferential=1 ';
			}
			if($info['propertyState']==1){
				$where.='and propertyState=1 ';
			}
			if(trim($info['search'])!=''){
				$where.='and propertyName like "%'.trim($info['search']).'%" ';
			}
			if(!empty($info['areaIndex'])){
				$areaIndexArr = explode("-",$info['areaIndex']);
				$temp = '';
				if(count($areaIndexArr)==2)
					$where .= 'and propertyProvince='.$areaIndexArr[0].' and propertyCity='.$areaIndexArr[1].' ';
				else if(count($areaIndexArr)==3) 
					$where .= 'and propertyProvince='.$areaIndexArr[0].' and propertyCity='.$areaIndexArr[1].' and propertyDistrict='.$areaIndexArr[2].' ';
				else 
					$where .= 'and propertyProvince='.$areaIndexArr[0].' and propertyCity='.$areaIndexArr[1].' and propertyDistrict='.$areaIndexArr[2].' and propertyArea='.$areaIndexArr[3].' ';	
			}
			$result=$this->propertyDAO->countPropertyByUser($where);
			return $result;
		}else if($info['type']=='propertyAndUserAndPic'){
			
		}
	}
	//改变新盘发布状态
	public function changeState($state,$propertyId){
		$msg=true;
		$result=$this->propertyDAO->changeState($state,$propertyId);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	/**
	 * 点击统计
	 * @param string $id 信息ID
	 * @return boolean
	 **/
	public function clickCount($id){
		return $this->propertyDAO->clickCount($id);
	}
	//根据新盘ID获取新盘详情
	public function getPropertyById($info){
		$where='where 1=1 ';
		if($info['type']=='admin'){
			$where.='and property.propertyId='.$info['id'];
		}else{
			$where.='and property.propertyState=1 and property.propertyId='.$info['id'];
		}
		return $this->propertyDAO->getPropertyById($where);
	}
	//获取新盘详情的图片列表
	public function getPropertyPicList($info){
		$field='*';
		$where='where picBuildId='.$info['picBuildId'].' and picBuildFatherType='.$info['picBuildFatherType'];
		$order='';
		$limit='';
		return $this->picDAO->getPicList($field,$where,$order,$limit);
	}
	//删除某个新盘的信息
	public function delInfo($id){
		$msg=true;
		$result=0;
		$result=$this->propertyDAO->delPropertyById($id);
		if($result<0){
			$msg='楼盘信息删除失败！';
		}else{
			$result=0;
			$where="where picBuildId=$id and picBuildFatherType=2";
			$result=$this->picDAO->delPic($where);
			if($result<0)$msg='图片信息删除失败！';
		}
		return $msg;
	}
	//获取新盘列表信息For搜索
	public function getPropertyListBySearch($searchModel){
		$where='WHERE 1=1 AND propertyState=1 ';
		$order='ORDER BY propertyUpdateTime DESC ';
		$limit='LIMIT '.$searchModel->begin.','.$searchModel->step;
		if($searchModel->isHouseType==1){
			$where.='and propertyIsHouseType=1 ';
		}
		if($searchModel->isBusinessType==1){
			$where.='and propertyIsBusinessType=1 ';
		}
		if($searchModel->isOfficeType==1){
			$where.='and propertyIsOfficeType=1 ';
		}
		if($searchModel->isVillaType==1){
			$where.='and propertyIsVillaType=1 ';
		}
		if($searchModel->p!=''){
			$where.='and propertyProvince='.$searchModel->p.' ';
		}
		if($searchModel->c!=''){
			$where.='and propertyCity='.$searchModel->c.' ';
		}
		if($searchModel->d!=''){
			$where.='and propertyDistrict='.$searchModel->d.' ';
		}
		if($searchModel->a!=''){
			$where.='and propertyArea='.$searchModel->a.' ';
		}
		if($searchModel->openPriceStart!=''){
			$where.='and propertyOpenPrice>='.$searchModel->openPriceStart.' ';
		}
		if($searchModel->openPriceEnd!=''){
			$where.='and propertyOpenPrice<'.$searchModel->openPriceEnd.' ';
		}
		if(!empty($searchModel->search)){
			$where.='AND propertyName like "%'.$searchModel->search.'%"';
		}
		return $this->propertyDAO->getPropertyListBySearch($where,$order,$limit);
	}
	//获取新盘总数For搜索
	public function getPropertyCountBySearch($searchModel){
		$where='WHERE 1=1 AND propertyState=1 ';
		if($searchModel->isHouseType==1){
			$where.='and propertyIsHouseType=1 ';
		}
		if($searchModel->isBusinessType==1){
			$where.='and propertyIsBusinessType=1 ';
		}
		if($searchModel->isOfficeType==1){
			$where.='and propertyIsOfficeType=1 ';
		}
		if($searchModel->isVillaType==1){
			$where.='and propertyIsVillaType=1 ';
		}
		if($searchModel->p!=''){
			$where.='and propertyProvince='.$searchModel->p.' ';
		}
		if($searchModel->c!=''){
			$where.='and propertyCity='.$searchModel->c.' ';
		}
		if($searchModel->d!=''){
			$where.='and propertyDistrict='.$searchModel->d.' ';
		}
		if($searchModel->a!=''){
			$where.='and propertyArea='.$searchModel->a.' ';
		}
		if($searchModel->openPriceStart!=''){
			$where.='and propertyOpenPrice>='.$searchModel->openPriceStart.' ';
		}
		if($searchModel->openPriceEnd!=''){
			$where.='and propertyOpenPrice<'.$searchModel->openPriceEnd.' ';
		}
		if(!empty($searchModel->search)){
			$where.='AND propertyName like "%'.$searchModel->search.'%"';
		}
		return $this->propertyDAO->getPropertyCountBySearch($where);
	}
	public function getPropertyListForWeb($where,$order,$limit){
		return $this->propertyDAO->getPropertyListBySearch($where,$order,$limit);
	}
	public function getPropertyCountForWeb($where){
		$where='where 1=1 ';
		return $this->propertyDAO->getPropertyCountBySearch($where);
	}
}
?>