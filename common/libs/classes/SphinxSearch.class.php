<?php
/**
 * 搜索逻辑处理类
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-07-12
 */
//require_once ECMS_PATH_LIBS.'api/sphinxapi.php';
class SphinxSearch{
	private $db=null;
	private $sphinx=null;
	private $propertyService=null;
	private $communityService=null;
	private $houseService=null;
	public function __construct($db){
		$this->db=$db;
		$this->propertyService=new PropertyService($db);
		$this->houseService=new HouseService($db);
		$this->sphinx=new SphinxClient();
		$this->sphinx->SetServer(SPHINX_SERVER_HOST,SPHINX_SERVER_PORT);
		$this->sphinx->SetConnectTimeout(SPHINX_CONNECTTIMEOUT);//设置连接超时时间
		$this->sphinx->SetMaxQueryTime(SPHINX_MAXQUERYTIME);//设置最大查询时间
		//$this->sphinx->SetRetries(3,1000);//失败重试次数/间隔时间,分布式
		$this->sphinx->SetArrayResult(SPHINX_ARRAYRESULT);//设置结果返回格式,true为普通数组，false为hash格式
	}
	//新盘搜索框自动联想
	public function getCommunityForAutoComplete($searchModel){
		$result=null;
		if(empty($searchModel->search)) return $result;
		$this->sphinx->SetLimits($searchModel->begin,$searchModel->step,SPHINX_LIMIT_MAX_MATCHES,SPHINX_LIMIT_CUTOFF);//通用搜索设置
		$this->sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);//设置查询模式
		//$this->sphinx->SetRankingMode(SPH_RANK_SPH04);//设置评分模式
		$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"@weight DESC");
		$this->sphinx->SetFieldWeights(array('communityname'=>1000));//设置字段权重
		//$this->sphinx->SetFilter('state', array(1),false);//设置属性过滤
		if($searchModel->p==1)$this->sphinx->SetFilter('communityprovince', array(1),false);//设置属性过滤false为匹配、true为拒绝
		if($searchModel->c==1)$this->sphinx->SetFilter('communitycity', array(1),false);//设置属性过滤
		if($searchModel->d==1)$this->sphinx->SetFilter('communitydistrict', array(1),false);//设置属性过滤
		if($searchModel->a==1)$this->sphinx->SetFilter('communityarea', array(1),false);//设置属性过滤

		$result=$this->sphinx->Query('@communityname "'.$searchModel->search.'"','index_ecms_community_main,index_ecms_community_delta');//搜索字段包括communityName
		if(!empty($result['matches'])){
			$communityList=null;
			for($i=0;$i<count($result['matches']);$i++){
				$communityModel=new CommunityModel();
				$communityModel->communityId=$result['matches'][$i]['attrs']['communityid'];
				$communityModel->communityName=$result['matches'][$i]['attrs']['communityname'];
				$communityModel->communityAddress=$result['matches'][$i]['attrs']['communityaddress'];
				$communityModel->communityIsHouseType=$result['matches'][$i]['attrs']['communityishousetype'];
				$communityModel->communityIsBusinessType=$result['matches'][$i]['attrs']['communityisbusinesstype'];
				$communityModel->communityIsOfficeType=$result['matches'][$i]['attrs']['communityisofficetype'];
				$communityModel->communityIsVillaType=$result['matches'][$i]['attrs']['communityisvillatype'];
				$communityModel->communityProvince=$result['matches'][$i]['attrs']['communityprovince'];
				$communityModel->communityCity=$result['matches'][$i]['attrs']['communitycity'];
				$communityModel->communityDistrict=$result['matches'][$i]['attrs']['communitydistrict'];
				$communityModel->communityArea=$result['matches'][$i]['attrs']['communityarea'];
				$communityModel->communityMapX=$result['matches'][$i]['attrs']['communitymapx'];
				$communityModel->communityMapY=$result['matches'][$i]['attrs']['communitymapy'];
				$communityModel->communityIsSuggest=$result['matches'][$i]['attrs']['communityissuggest'];
				$communityModel->communityCreateTime=$result['matches'][$i]['attrs']['communitycreatetime'];
				$communityModel->communityUpdateTime=$result['matches'][$i]['attrs']['communityupdatetime'];
				$communityModel->communityState=$result['matches'][$i]['attrs']['communitystate'];
				$communityModel->picUrl=$result['matches'][$i]['attrs']['picurl'];
				$communityModel->picThumb=$result['matches'][$i]['attrs']['picthumb'];
				$communityModel->picInfo=$result['matches'][$i]['attrs']['picinfo'];
				$communityModel->picState=$result['matches'][$i]['attrs']['picstate'];
				$communityModel->picLayer=$result['matches'][$i]['attrs']['piclayer'];
				$communityList[]=(array)$communityModel;
			}
			return $communityList;
			//return $result['matches'];
		}else{
			return $result;
		}
	}
	//二手房小区自动联想
	public function getPropertyForAutoComplete($searchModel){
		$result=null;
		if(empty($searchModel->search)) return $result;
		$this->sphinx->SetLimits($searchModel->begin,$searchModel->step,SPHINX_LIMIT_MAX_MATCHES,SPHINX_LIMIT_CUTOFF);//通用搜索设置
		$this->sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);//设置查询模式
		//$this->sphinx->SetRankingMode(SPH_RANK_SPH04);//设置评分模式
		$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"@weight DESC");
		$this->sphinx->SetFieldWeights(array('propertyname'=>1000));//设置字段权重
		//$this->sphinx->SetFilter('state', array(1),false);//设置属性过滤
		if($searchModel->p==1)$this->sphinx->SetFilter('propertyprovince', array(1),false);//设置属性过滤false为匹配、true为拒绝
		if($searchModel->c==1)$this->sphinx->SetFilter('propertycity', array(1),false);//设置属性过滤
		if($searchModel->d==1)$this->sphinx->SetFilter('propertydistrict', array(1),false);//设置属性过滤
		if($searchModel->a==1)$this->sphinx->SetFilter('propertyarea', array(1),false);//设置属性过滤

		$result=$this->sphinx->Query('@propertyname "'.$searchModel->search.'"','index_ecms_property_main,index_ecms_property_delta');//搜索字段包括propertyName
		if(!empty($result['matches'])){
			$propertyList=null;
			for($i=0;$i<count($result['matches']);$i++){
				$propertyModel=new PropertyModel();
				$propertyModel->propertyId=$result['matches'][$i]['attrs']['propertyid'];
				$propertyModel->propertyName=$result['matches'][$i]['attrs']['propertyname'];
				$propertyModel->propertyIsHouseType=$result['matches'][$i]['attrs']['propertyishousetype'];
				$propertyModel->propertyIsBusinessType=$result['matches'][$i]['attrs']['propertyisbusinesstype'];
				$propertyModel->propertyIsOfficeType=$result['matches'][$i]['attrs']['propertyisofficetype'];
				$propertyModel->propertyIsVillaType=$result['matches'][$i]['attrs']['propertyisvillatype'];
				$propertyModel->propertyProvince=$result['matches'][$i]['attrs']['propertyprovince'];
				$propertyModel->propertyCity=$result['matches'][$i]['attrs']['propertycity'];
				$propertyModel->propertyDistrict=$result['matches'][$i]['attrs']['propertydistrict'];
				$propertyModel->propertyArea=$result['matches'][$i]['attrs']['propertyarea'];
				$propertyModel->propertyMapX=$result['matches'][$i]['attrs']['propertymapx'];
				$propertyModel->propertyMapY=$result['matches'][$i]['attrs']['propertymapy'];
				$propertyModel->propertyCreateTime=$result['matches'][$i]['attrs']['propertycreatetime'];
				$propertyModel->propertyUpdateTime=$result['matches'][$i]['attrs']['propertyupdatetime'];
				$propertyModel->propertyState=$result['matches'][$i]['attrs']['propertystate'];
				$propertyModel->propertyUserId=$result['matches'][$i]['attrs']['propertyuserid'];
				$propertyModel->propertyIsHot=$result['matches'][$i]['attrs']['propertyishot'];
				$propertyModel->propertyIsBusiness=$result['matches'][$i]['attrs']['propertyisbusiness'];
				$propertyModel->propertyIsSmallAmt=$result['matches'][$i]['attrs']['propertyissmallamt'];
				$propertyModel->propertyIsSubwayLine=$result['matches'][$i]['attrs']['propertyissubwayline'];
				$propertyModel->propertyIsPark=$result['matches'][$i]['attrs']['propertyispark'];
				$propertyModel->propertyIsInvestment=$result['matches'][$i]['attrs']['propertyisinvestment'];
				$propertyModel->propertyIsRecommend=$result['matches'][$i]['attrs']['propertyisrecommend'];
				$propertyModel->propertyIsFine=$result['matches'][$i]['attrs']['propertyisfine'];
				$propertyModel->propertyIsGbuy=$result['matches'][$i]['attrs']['propertyisgbuy'];
				$propertyModel->propertyIsGbuyTop=$result['matches'][$i]['attrs']['propertyisgbuytop'];
				$propertyModel->propertyIsDiscounts=$result['matches'][$i]['attrs']['propertyisdiscounts'];
				$propertyModel->propertyIsPreferential=$result['matches'][$i]['attrs']['propertyispreferential'];
				$propertyModel->propertyOpenPrice=$result['matches'][$i]['attrs']['propertyopenprice'];
				$propertyModel->propertyCompanyFee=$result['matches'][$i]['attrs']['propertycompanyfee'];
				$propertyModel->propertyVolRate=$result['matches'][$i]['attrs']['propertyvolrate'];
				$propertyModel->propertyGreenRate=$result['matches'][$i]['attrs']['propertygreenrate'];
				$propertyModel->propertyBuildArea=$result['matches'][$i]['attrs']['propertybuildarea'];
				$propertyModel->propertyLandArea=$result['matches'][$i]['attrs']['propertylandarea'];
				$propertyModel->propertyBuildingType=$result['matches'][$i]['attrs']['propertybuildingtype'];
				$propertyModel->propertyFitmentStatus=$result['matches'][$i]['attrs']['propertyfitmentstatus'];
				$propertyModel->propertyCompany=$result['matches'][$i]['attrs']['propertycompany'];
				$propertyModel->propertyCompanyAddress=$result['matches'][$i]['attrs']['propertycompanyaddress'];
				$propertyModel->propertySellAddress=$result['matches'][$i]['attrs']['propertyselladdress'];
				$propertyModel->propertyDevCompany=$result['matches'][$i]['attrs']['propertydevcompany'];
				$propertyModel->propertyDevCompanyAddress=$result['matches'][$i]['attrs']['propertydevcompanyaddress'];
				$propertyModel->propertyPreSellPermits=$result['matches'][$i]['attrs']['propertypresellpermits'];
				$propertyModel->propertyProxyCompany=$result['matches'][$i]['attrs']['propertyproxycompany'];
				$propertyModel->propertyOpenPriceRemark=$result['matches'][$i]['attrs']['propertyopenpriceremark'];
				$propertyModel->propertyHotline=$result['matches'][$i]['attrs']['propertyhotline'];
				$propertyModel->propertyFeature=$result['matches'][$i]['attrs']['propertyfeature'];
				$propertyModel->picUrl=$result['matches'][$i]['attrs']['picurl'];
				$propertyModel->picThumb=$result['matches'][$i]['attrs']['picthumb'];
				$propertyModel->picInfo=$result['matches'][$i]['attrs']['picinfo'];
				$propertyModel->picState=$result['matches'][$i]['attrs']['picstate'];
				$propertyModel->picLayer=$result['matches'][$i]['attrs']['piclayer'];
				$propertyList[]=(array)$propertyModel;
			}
			return $propertyList;
			//return $result['matches'];
		}else{
			return $result;
		}
	}
	//新盘搜索列表
	public function getPropertyForList($searchModel){
		$result=null;
		$propertyList=null;
		if(empty($searchModel->search)){
			$result=$this->propertyService->getPropertyListBySearch($searchModel);
			if(!empty($result)){
				for($i=0;$i<count($result);$i++){
					$propertyModel=new PropertyModel();
					$propertyModel->propertyId=$result[$i]['propertyId'];
					$propertyModel->propertyName=$result[$i]['propertyName'];
					$propertyModel->propertyIsHouseType=$result[$i]['propertyIsHouseType'];
					$propertyModel->propertyIsBusinessType=$result[$i]['propertyIsBusinessType'];
					$propertyModel->propertyIsOfficeType=$result[$i]['propertyIsOfficeType'];
					$propertyModel->propertyIsVillaType=$result[$i]['propertyIsVillaType'];
					$propertyModel->propertyProvince=$result[$i]['propertyProvince'];
					$propertyModel->propertyCity=$result[$i]['propertyCity'];
					$propertyModel->propertyDistrict=$result[$i]['propertyDistrict'];
					$propertyModel->propertyArea=$result[$i]['propertyArea'];
					$propertyModel->propertyMapX=$result[$i]['propertyMapX'];
					$propertyModel->propertyMapY=$result[$i]['propertyMapY'];
					$propertyModel->propertyCreateTime=$result[$i]['propertyCreateTime'];
					$propertyModel->propertyUpdateTime=$result[$i]['propertyUpdateTime'];
					$propertyModel->propertyState=$result[$i]['propertyState'];
					$propertyModel->propertyUserId=$result[$i]['propertyUserId'];
					$propertyModel->propertyIsHot=$result[$i]['propertyIsHot'];
					$propertyModel->propertyIsBusiness=$result[$i]['propertyIsBusiness'];
					$propertyModel->propertyIsSmallAmt=$result[$i]['propertyIsSmallAmt'];
					$propertyModel->propertyIsSubwayLine=$result[$i]['propertyIsSubwayLine'];
					$propertyModel->propertyIsPark=$result[$i]['propertyIsPark'];
					$propertyModel->propertyIsInvestment=$result[$i]['propertyIsInvestment'];
					$propertyModel->propertyIsRecommend=$result[$i]['propertyIsRecommend'];
					$propertyModel->propertyIsFine=$result[$i]['propertyIsFine'];
					$propertyModel->propertyIsGbuy=$result[$i]['propertyIsGbuy'];
					$propertyModel->propertyIsGbuyTop=$result[$i]['propertyIsGbuyTop'];
					$propertyModel->propertyIsDiscounts=$result[$i]['propertyIsDiscounts'];
					$propertyModel->propertyIsPreferential=$result[$i]['propertyIsPreferential'];
					$propertyModel->propertyOpenPrice=$result[$i]['propertyOpenPrice'];
					$propertyModel->propertyCompanyFee=$result[$i]['propertyCompanyFee'];
					$propertyModel->propertyVolRate=$result[$i]['propertyVolRate'];
					$propertyModel->propertyGreenRate=$result[$i]['propertyGreenRate'];
					$propertyModel->propertyBuildArea=$result[$i]['propertyBuildArea'];
					$propertyModel->propertyLandArea=$result[$i]['propertyLandArea'];
					$propertyModel->propertyBuildingType=$result[$i]['propertyBuildingType'];
					$propertyModel->propertyFitmentStatus=$result[$i]['propertyFitmentStatus'];
					$propertyModel->propertyCompany=$result[$i]['propertyCompany'];
					$propertyModel->propertyCompanyAddress=$result[$i]['propertyCompanyAddress'];
					$propertyModel->propertySellAddress=$result[$i]['propertySellAddress'];
					$propertyModel->propertyDevCompany=$result[$i]['propertyDevCompany'];
					$propertyModel->propertyDevCompanyAddress=$result[$i]['propertyDevCompanyAddress'];
					$propertyModel->propertyPreSellPermits=$result[$i]['propertyPreSellPermits'];
					$propertyModel->propertyProxyCompany=$result[$i]['propertyProxyCompany'];
					$propertyModel->propertyOpenPriceRemark=$result[$i]['propertyOpenPriceRemark'];
					$propertyModel->propertyHotline=$result[$i]['propertyHotline'];
					$propertyModel->propertyFeature=$result[$i]['propertyFeature'];
					$propertyModel->picUrl=$result[$i]['picUrl'];
					$propertyModel->picThumb=$result[$i]['picThumb'];
					$propertyModel->picInfo=$result[$i]['picInfo'];
					$propertyModel->picState=$result[$i]['picState'];
					$propertyModel->picLayer=$result[$i]['picLayer'];
					$propertyList[]=(array)$propertyModel;
				}
			}
		}else{
			$this->sphinx->SetLimits($searchModel->begin,$searchModel->step,SPHINX_LIMIT_MAX_MATCHES,SPHINX_LIMIT_CUTOFF);//通用搜索设置
			$this->sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);//设置查询模式
			//$this->sphinx->SetRankingMode(SPH_RANK_SPH04);//设置评分模式
			//$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"propertyupdatetime DESC,@weight DESC");
			$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"@weight DESC");
			$this->sphinx->SetFieldWeights(array('propertyname'=>1000));//设置字段权重
			//$this->sphinx->SetFilter('state', array(1),false);//设置属性过滤
			if($searchModel->p==1)$this->sphinx->SetFilter('propertyprovince', array(1),false);//设置属性过滤false为匹配、true为拒绝
			if($searchModel->c==1)$this->sphinx->SetFilter('propertycity', array(1),false);//设置属性过滤
			if($searchModel->d==1)$this->sphinx->SetFilter('propertydistrict', array(1),false);//设置属性过滤
			if($searchModel->a==1)$this->sphinx->SetFilter('propertyarea', array(1),false);//设置属性过滤
			$wordsArr=$this->sphinx->BuildKeywords($searchModel->search, 'index_ecms_property_main' , false);//获取搜索关键字分词
			$wordsStr='';
			for($i=0;$i<count($wordsArr);$i++){
				if($i==count($wordsArr)-1){
					$wordsStr=$wordsStr.$wordsArr[$i]['tokenized'];
				}else{
					$wordsStr=$wordsStr.$wordsArr[$i]['tokenized']." | ";
				}
			}
			//$wordsStr='幸福 | 花园';
			$result=$this->sphinx->Query('@(propertyname,propertyselladdress) '.$wordsStr,'index_ecms_property_main,index_ecms_property_delta');//搜索字段包括propertyName
			if($result==false){
				$result=$this->propertyService->getPropertyListBySearch($searchModel);
				if(!empty($result)){
					for($i=0;$i<count($result);$i++){
						$propertyModel=new PropertyModel();
						$propertyModel->propertyId=$result[$i]['propertyId'];
						$propertyModel->propertyName=$result[$i]['propertyName'];
						$propertyModel->propertyIsHouseType=$result[$i]['propertyIsHouseType'];
						$propertyModel->propertyIsBusinessType=$result[$i]['propertyIsBusinessType'];
						$propertyModel->propertyIsOfficeType=$result[$i]['propertyIsOfficeType'];
						$propertyModel->propertyIsVillaType=$result[$i]['propertyIsVillaType'];
						$propertyModel->propertyProvince=$result[$i]['propertyProvince'];
						$propertyModel->propertyCity=$result[$i]['propertyCity'];
						$propertyModel->propertyDistrict=$result[$i]['propertyDistrict'];
						$propertyModel->propertyArea=$result[$i]['propertyArea'];
						$propertyModel->propertyMapX=$result[$i]['propertyMapX'];
						$propertyModel->propertyMapY=$result[$i]['propertyMapY'];
						$propertyModel->propertyCreateTime=$result[$i]['propertyCreateTime'];
						$propertyModel->propertyUpdateTime=$result[$i]['propertyUpdateTime'];
						$propertyModel->propertyState=$result[$i]['propertyState'];
						$propertyModel->propertyUserId=$result[$i]['propertyUserId'];
						$propertyModel->propertyIsHot=$result[$i]['propertyIsHot'];
						$propertyModel->propertyIsBusiness=$result[$i]['propertyIsBusiness'];
						$propertyModel->propertyIsSmallAmt=$result[$i]['propertyIsSmallAmt'];
						$propertyModel->propertyIsSubwayLine=$result[$i]['propertyIsSubwayLine'];
						$propertyModel->propertyIsPark=$result[$i]['propertyIsPark'];
						$propertyModel->propertyIsInvestment=$result[$i]['propertyIsInvestment'];
						$propertyModel->propertyIsRecommend=$result[$i]['propertyIsRecommend'];
						$propertyModel->propertyIsFine=$result[$i]['propertyIsFine'];
						$propertyModel->propertyIsGbuy=$result[$i]['propertyIsGbuy'];
						$propertyModel->propertyIsGbuyTop=$result[$i]['propertyIsGbuyTop'];
						$propertyModel->propertyIsDiscounts=$result[$i]['propertyIsDiscounts'];
						$propertyModel->propertyIsPreferential=$result[$i]['propertyIsPreferential'];
						$propertyModel->propertyOpenPrice=$result[$i]['propertyOpenPrice'];
						$propertyModel->propertyCompanyFee=$result[$i]['propertyCompanyFee'];
						$propertyModel->propertyVolRate=$result[$i]['propertyVolRate'];
						$propertyModel->propertyGreenRate=$result[$i]['propertyGreenRate'];
						$propertyModel->propertyBuildArea=$result[$i]['propertyBuildArea'];
						$propertyModel->propertyLandArea=$result[$i]['propertyLandArea'];
						$propertyModel->propertyBuildingType=$result[$i]['propertyBuildingType'];
						$propertyModel->propertyFitmentStatus=$result[$i]['propertyFitmentStatus'];
						$propertyModel->propertyCompany=$result[$i]['propertyCompany'];
						$propertyModel->propertyCompanyAddress=$result[$i]['propertyCompanyAddress'];
						$propertyModel->propertySellAddress=$result[$i]['propertySellAddress'];
						$propertyModel->propertyDevCompany=$result[$i]['propertyDevCompany'];
						$propertyModel->propertyDevCompanyAddress=$result[$i]['propertyDevCompanyAddress'];
						$propertyModel->propertyPreSellPermits=$result[$i]['propertyPreSellPermits'];
						$propertyModel->propertyProxyCompany=$result[$i]['propertyProxyCompany'];
						$propertyModel->propertyOpenPriceRemark=$result[$i]['propertyOpenPriceRemark'];
						$propertyModel->propertyHotline=$result[$i]['propertyHotline'];
						$propertyModel->propertyFeature=$result[$i]['propertyFeature'];
						$propertyModel->picUrl=$result[$i]['picUrl'];
						$propertyModel->picThumb=$result[$i]['picThumb'];
						$propertyModel->picInfo=$result[$i]['picInfo'];
						$propertyModel->picState=$result[$i]['picState'];
						$propertyModel->picLayer=$result[$i]['picLayer'];
						$propertyList[]=(array)$propertyModel;
					}
				}
			}else{
				if(!empty($result['matches'])){
					for($i=0;$i<count($result['matches']);$i++){
						$propertyModel=new PropertyModel();
						$propertyModel->propertyId=$result['matches'][$i]['attrs']['propertyid'];
						$propertyModel->propertyName=$result['matches'][$i]['attrs']['propertyname'];
						$propertyModel->propertyIsHouseType=$result['matches'][$i]['attrs']['propertyishousetype'];
						$propertyModel->propertyIsBusinessType=$result['matches'][$i]['attrs']['propertyisbusinesstype'];
						$propertyModel->propertyIsOfficeType=$result['matches'][$i]['attrs']['propertyisofficetype'];
						$propertyModel->propertyIsVillaType=$result['matches'][$i]['attrs']['propertyisvillatype'];
						$propertyModel->propertyProvince=$result['matches'][$i]['attrs']['propertyprovince'];
						$propertyModel->propertyCity=$result['matches'][$i]['attrs']['propertycity'];
						$propertyModel->propertyDistrict=$result['matches'][$i]['attrs']['propertydistrict'];
						$propertyModel->propertyArea=$result['matches'][$i]['attrs']['propertyarea'];
						$propertyModel->propertyMapX=$result['matches'][$i]['attrs']['propertymapx'];
						$propertyModel->propertyMapY=$result['matches'][$i]['attrs']['propertymapy'];
						$propertyModel->propertyCreateTime=$result['matches'][$i]['attrs']['propertycreatetime'];
						$propertyModel->propertyUpdateTime=$result['matches'][$i]['attrs']['propertyupdatetime'];
						$propertyModel->propertyState=$result['matches'][$i]['attrs']['propertystate'];
						$propertyModel->propertyUserId=$result['matches'][$i]['attrs']['propertyuserid'];
						$propertyModel->propertyIsHot=$result['matches'][$i]['attrs']['propertyishot'];
						$propertyModel->propertyIsBusiness=$result['matches'][$i]['attrs']['propertyisbusiness'];
						$propertyModel->propertyIsSmallAmt=$result['matches'][$i]['attrs']['propertyissmallamt'];
						$propertyModel->propertyIsSubwayLine=$result['matches'][$i]['attrs']['propertyissubwayline'];
						$propertyModel->propertyIsPark=$result['matches'][$i]['attrs']['propertyispark'];
						$propertyModel->propertyIsInvestment=$result['matches'][$i]['attrs']['propertyisinvestment'];
						$propertyModel->propertyIsRecommend=$result['matches'][$i]['attrs']['propertyisrecommend'];
						$propertyModel->propertyIsFine=$result['matches'][$i]['attrs']['propertyisfine'];
						$propertyModel->propertyIsGbuy=$result['matches'][$i]['attrs']['propertyisgbuy'];
						$propertyModel->propertyIsGbuyTop=$result['matches'][$i]['attrs']['propertyisgbuytop'];
						$propertyModel->propertyIsDiscounts=$result['matches'][$i]['attrs']['propertyisdiscounts'];
						$propertyModel->propertyIsPreferential=$result['matches'][$i]['attrs']['propertyispreferential'];
						$propertyModel->propertyOpenPrice=$result['matches'][$i]['attrs']['propertyopenprice'];
						$propertyModel->propertyCompanyFee=$result['matches'][$i]['attrs']['propertycompanyfee'];
						$propertyModel->propertyVolRate=$result['matches'][$i]['attrs']['propertyvolrate'];
						$propertyModel->propertyGreenRate=$result['matches'][$i]['attrs']['propertygreenrate'];
						$propertyModel->propertyBuildArea=$result['matches'][$i]['attrs']['propertybuildarea'];
						$propertyModel->propertyLandArea=$result['matches'][$i]['attrs']['propertylandarea'];
						$propertyModel->propertyBuildingType=$result['matches'][$i]['attrs']['propertybuildingtype'];
						$propertyModel->propertyFitmentStatus=$result['matches'][$i]['attrs']['propertyfitmentstatus'];
						$propertyModel->propertyCompany=$result['matches'][$i]['attrs']['propertycompany'];
						$propertyModel->propertyCompanyAddress=$result['matches'][$i]['attrs']['propertycompanyaddress'];
						$propertyModel->propertySellAddress=$result['matches'][$i]['attrs']['propertyselladdress'];
						$propertyModel->propertyDevCompany=$result['matches'][$i]['attrs']['propertydevcompany'];
						$propertyModel->propertyDevCompanyAddress=$result['matches'][$i]['attrs']['propertydevcompanyaddress'];
						$propertyModel->propertyPreSellPermits=$result['matches'][$i]['attrs']['propertypresellpermits'];
						$propertyModel->propertyProxyCompany=$result['matches'][$i]['attrs']['propertyproxycompany'];
						$propertyModel->propertyOpenPriceRemark=$result['matches'][$i]['attrs']['propertyopenpriceremark'];
						$propertyModel->propertyHotline=$result['matches'][$i]['attrs']['propertyhotline'];
						$propertyModel->propertyFeature=$result['matches'][$i]['attrs']['propertyfeature'];
						$propertyModel->picUrl=$result['matches'][$i]['attrs']['picurl'];
						$propertyModel->picThumb=$result['matches'][$i]['attrs']['picthumb'];
						$propertyModel->picInfo=$result['matches'][$i]['attrs']['picinfo'];
						$propertyModel->picState=$result['matches'][$i]['attrs']['picstate'];
						$propertyModel->picLayer=$result['matches'][$i]['attrs']['piclayer'];
						$propertyList[]=(array)$propertyModel;
					}
				}
			}
		}
		return $propertyList;
	}
	//新盘搜索总数
	public function getPropertyForCount($searchModel){
		$result=null;
		$propertyCount=null;
		if(empty($searchModel->search)){
			$result=$this->propertyService->getPropertyCountBySearch($searchModel);
			if(!empty($result['counts'])){
				$propertyCount=$result['counts'];
			}
		}else{
			$this->sphinx->SetLimits($searchModel->begin,$searchModel->step,SPHINX_LIMIT_MAX_MATCHES,SPHINX_LIMIT_CUTOFF);//通用搜索设置
			$this->sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);//设置查询模式
			//$this->sphinx->SetRankingMode(SPH_RANK_SPH04);//设置评分模式
			//$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"propertyupdatetime DESC,@weight DESC");
			$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"@weight DESC");
			$this->sphinx->SetFieldWeights(array('propertyname'=>1000));//设置字段权重
			//$this->sphinx->SetFilter('state', array(1),false);//设置属性过滤
			if($searchModel->p==1)$this->sphinx->SetFilter('propertyprovince', array(1),false);//设置属性过滤false为匹配、true为拒绝
			if($searchModel->c==1)$this->sphinx->SetFilter('propertycity', array(1),false);//设置属性过滤
			if($searchModel->d==1)$this->sphinx->SetFilter('propertydistrict', array(1),false);//设置属性过滤
			if($searchModel->a==1)$this->sphinx->SetFilter('propertyarea', array(1),false);//设置属性过滤
			$wordsArr=$this->sphinx->BuildKeywords($searchModel->search, 'index_ecms_property_main' , false);//获取搜索关键字分词
			$wordsStr='';
			for($i=0;$i<count($wordsArr);$i++){
				if($i==count($wordsArr)-1){
					$wordsStr=$wordsStr.$wordsArr[$i]['tokenized'];
				}else{
					$wordsStr=$wordsStr.$wordsArr[$i]['tokenized']." | ";
				}
			}
	
			$result=$this->sphinx->Query('@(propertyname,propertyselladdress) '.$wordsStr,'index_ecms_property_main,index_ecms_property_delta');//搜索字段包括propertyName
			if($result==false){
				$result=$this->propertyService->getPropertyCountBySearch($searchModel);
				if(!empty($result)){
					$propertyCount=$result['counts'];
				}
			}else{
				if(!empty($result['total'])){
					$propertyCount=$result['total'];
				}
			}
		}
		return $propertyCount;
	}
	//二手房住宅出售搜索列表
	public function getHouseSellListForSearch($searchModel){
		$result=null;
		$infoList=null;
		if(empty($searchModel->search)){
			$result=$this->houseService->getHouseSellListForSearch($searchModel);
			if(!empty($result)){
				for($i=0;$i<count($result);$i++){
					$houseModel=new HouseModel();
					$houseModel->houseId=$result[$i]['houseId'];
					$houseModel->houseTitle=$result[$i]['houseTitle'];
					$houseModel->communityName=$result[$i]['communityName'];
					$houseModel->communityAddress=$result[$i]['communityAddress'];
					$houseModel->houseSellPrice=$result[$i]['houseSellPrice'];
					$houseModel->houseBuildArea=$result[$i]['houseBuildArea'];
					$houseModel->houseRoom=$result[$i]['houseRoom'];
					$houseModel->houseHall=$result[$i]['houseHall'];
					$houseModel->houseToilet=$result[$i]['houseToilet'];
					$houseModel->houseKitchen=$result[$i]['houseKitchen'];
					$houseModel->houseBalcony=$result[$i]['houseBalcony'];
					$houseModel->houseRentArea=$result[$i]['houseRentArea'];
					$houseModel->houseForward=$result[$i]['houseForward'];
					$houseModel->houseFitment=$result[$i]['houseFitment'];
					$houseModel->houseBaseService=$result[$i]['houseBaseService'];
					$houseModel->housePayInfo=$result[$i]['housePayInfo'];
					$houseModel->houseFloor=$result[$i]['houseFloor'];
					$houseModel->houseAllFloor=$result[$i]['houseAllFloor'];
					$houseModel->houseBuildYear=$result[$i]['houseBuildYear'];
					$houseModel->houseRentType=$result[$i]['houseRentType'];
					$houseModel->houseUpdateTime=$result[$i]['houseUpdateTime'];
					$houseModel->picUrl=$result[$i]['picUrl'];
					$houseModel->picThumb=$result[$i]['picThumb'];
					$houseModel->picInfo=$result[$i]['picInfo'];
					$houseModel->imcpId=$result[$i]['imcpId'];
					$houseModel->imcpShortName=$result[$i]['imcpShortName'];
					$houseModel->userId=$result[$i]['userId'];
					$houseModel->userdetailName=$result[$i]['userdetailName'];
					$infoList[]=(array)$houseModel;
				}
			}
		}else{
			$this->sphinx->SetLimits($searchModel->begin,$searchModel->step,SPHINX_LIMIT_MAX_MATCHES,SPHINX_LIMIT_CUTOFF);//通用搜索设置
			$this->sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);//设置查询模式
			//$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"propertyupdatetime DESC,@weight DESC");
			$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"houseupdatetime DESC");
			$this->sphinx->SetFieldWeights(array('housetitle'=>1000));//设置字段权重

			if($searchModel->p==1)$this->sphinx->SetFilter('communityprovince', array(1),false);//设置属性过滤false为匹配、true为拒绝
			if($searchModel->c==1)$this->sphinx->SetFilter('communitycity', array(1),false);//设置属性过滤
			if($searchModel->d==1)$this->sphinx->SetFilter('communitydistrict', array(1),false);//设置属性过滤
			if($searchModel->a==1)$this->sphinx->SetFilter('communityarea', array(1),false);//设置属性过滤
			$wordsArr=$this->sphinx->BuildKeywords($searchModel->search, 'index_ecms_house_main' , false);//获取搜索关键字分词
			$wordsStr='';
			for($i=0;$i<count($wordsArr);$i++){
				if($i==count($wordsArr)-1){
					$wordsStr=$wordsStr.$wordsArr[$i]['tokenized'];
				}else{
					$wordsStr=$wordsStr.$wordsArr[$i]['tokenized']." | ";
				}
			}
			//$wordsStr='幸福 | 花园';
			$result=$this->sphinx->Query('@(housetitle,communityaddress) '.$wordsStr,'index_ecms_house_main,index_ecms_house_delta');//搜索字段包括propertyName
			if($result==false){
				$result=$this->houseService->getHouseSellListForSearch($searchModel);
				if(!empty($result)){
					for($i=0;$i<count($result);$i++){
						$houseModel=new HouseModel();
						$houseModel->houseId=$result[$i]['houseId'];
						$houseModel->houseTitle=$result[$i]['houseTitle'];
						$houseModel->communityName=$result[$i]['communityName'];
						$houseModel->communityAddress=$result[$i]['communityAddress'];
						$houseModel->houseSellPrice=$result[$i]['houseSellPrice'];
						$houseModel->houseBuildArea=$result[$i]['houseBuildArea'];
						$houseModel->houseRoom=$result[$i]['houseRoom'];
						$houseModel->houseHall=$result[$i]['houseHall'];
						$houseModel->houseToilet=$result[$i]['houseToilet'];
						$houseModel->houseKitchen=$result[$i]['houseKitchen'];
						$houseModel->houseBalcony=$result[$i]['houseBalcony'];
						$houseModel->houseRentArea=$result[$i]['houseRentArea'];
						$houseModel->houseForward=$result[$i]['houseForward'];
						$houseModel->houseFitment=$result[$i]['houseFitment'];
						$houseModel->houseBaseService=$result[$i]['houseBaseService'];
						$houseModel->housePayInfo=$result[$i]['housePayInfo'];
						$houseModel->houseFloor=$result[$i]['houseFloor'];
						$houseModel->houseAllFloor=$result[$i]['houseAllFloor'];
						$houseModel->houseBuildYear=$result[$i]['houseBuildYear'];
						$houseModel->houseRentType=$result[$i]['houseRentType'];
						$houseModel->houseUpdateTime=$result[$i]['houseUpdateTime'];
						$houseModel->picUrl=$result[$i]['picUrl'];
						$houseModel->picThumb=$result[$i]['picThumb'];
						$houseModel->picInfo=$result[$i]['picInfo'];
						$houseModel->imcpId=$result[$i]['imcpId'];
						$houseModel->imcpShortName=$result[$i]['imcpShortName'];
						$houseModel->userId=$result[$i]['userId'];
						$houseModel->userdetailName=$result[$i]['userdetailName'];
						$infoList[]=(array)$houseModel;
					}
				}
			}else{
				if(!empty($result['matches'])){
					for($i=0;$i<count($result['matches']);$i++){
						$houseModel=new HouseModel();
						$houseModel->houseId=$result['matches'][$i]['attrs']['houseid'];
						$houseModel->houseTitle=$result['matches'][$i]['attrs']['housetitle'];
						$houseModel->communityName=$result['matches'][$i]['attrs']['communityname'];
						$houseModel->communityAddress=$result['matches'][$i]['attrs']['communityaddress'];
						$houseModel->houseSellPrice=$result['matches'][$i]['attrs']['housesellprice'];
						$houseModel->houseBuildArea=$result['matches'][$i]['attrs']['housebuildarea'];
						$houseModel->houseRoom=$result['matches'][$i]['attrs']['houseroom'];
						$houseModel->houseHall=$result['matches'][$i]['attrs']['househall'];
						$houseModel->houseToilet=$result['matches'][$i]['attrs']['housetoilet'];
						$houseModel->houseKitchen=$result['matches'][$i]['attrs']['housekitchen'];
						$houseModel->houseBalcony=$result['matches'][$i]['attrs']['housebalcony'];
						$houseModel->houseRentArea=$result['matches'][$i]['attrs']['houserentarea'];
						$houseModel->houseForward=$result['matches'][$i]['attrs']['houseforward'];
						$houseModel->houseFitment=$result['matches'][$i]['attrs']['housefitment'];
						$houseModel->houseBaseService=$result['matches'][$i]['attrs']['housebaseservice'];
						$houseModel->housePayInfo=$result['matches'][$i]['attrs']['housepayinfo'];
						$houseModel->houseFloor=$result['matches'][$i]['attrs']['housefloor'];
						$houseModel->houseAllFloor=$result['matches'][$i]['attrs']['houseallfloor'];
						$houseModel->houseBuildYear=$result['matches'][$i]['attrs']['housebuildyear'];
						$houseModel->houseRentType=$result['matches'][$i]['attrs']['houserenttype'];
						$houseModel->houseUpdateTime=$result['matches'][$i]['attrs']['houseupdatetime'];
						$houseModel->picUrl=$result['matches'][$i]['attrs']['picurl'];
						$houseModel->picThumb=$result['matches'][$i]['attrs']['picthumb'];
						$houseModel->picInfo=$result['matches'][$i]['attrs']['picinfo'];
						$houseModel->imcpId=$result[$i]['imcpid'];
						$houseModel->imcpShortName=$result[$i]['imcpshortname'];
						$houseModel->userId=$result[$i]['userid'];
						$houseModel->userdetailName=$result[$i]['userdetailname'];
						$infoList[]=(array)$houseModel;
					}
				}
			}
		}
		return $infoList;
	}
	//二手房住宅出售搜索总数
	public function getHouseSellCountForSearch($searchModel){
		$result=null;
		$infoCount=null;
		if(empty($searchModel->search)){
			$result=$this->houseService->getHouseSellCountForSearch($searchModel);
			if(!empty($result['counts'])){
				$infoCount=$result['counts'];
			}
		}else{
			$this->sphinx->SetLimits($searchModel->begin,$searchModel->step,SPHINX_LIMIT_MAX_MATCHES,SPHINX_LIMIT_CUTOFF);//通用搜索设置
			$this->sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);//设置查询模式
			//$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"propertyupdatetime DESC,@weight DESC");
			$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"houseupdatetime DESC");
			$this->sphinx->SetFieldWeights(array('housetitle'=>1000));//设置字段权重

			if($searchModel->p==1)$this->sphinx->SetFilter('communityprovince', array(1),false);//设置属性过滤false为匹配、true为拒绝
			if($searchModel->c==1)$this->sphinx->SetFilter('communitycity', array(1),false);//设置属性过滤
			if($searchModel->d==1)$this->sphinx->SetFilter('communitydistrict', array(1),false);//设置属性过滤
			if($searchModel->a==1)$this->sphinx->SetFilter('communityarea', array(1),false);//设置属性过滤
			$wordsArr=$this->sphinx->BuildKeywords($searchModel->search, 'index_ecms_house_main' , false);//获取搜索关键字分词
			$wordsStr='';
			for($i=0;$i<count($wordsArr);$i++){
				if($i==count($wordsArr)-1){
					$wordsStr=$wordsStr.$wordsArr[$i]['tokenized'];
				}else{
					$wordsStr=$wordsStr.$wordsArr[$i]['tokenized']." | ";
				}
			}
	
			$result=$this->sphinx->Query('@(housetitle,communityaddress) '.$wordsStr,'index_ecms_house_main,index_ecms_house_delta');
			if($result==false){
				$result=$this->houseService->getHouseSellCountForSearch($searchModel);
				if(!empty($result)){
					$infoCount=$result['counts'];
				}
			}else{
				if(!empty($result['total'])){
					$infoCount=$result['total'];
				}
			}
		}
		return $infoCount;
	}
}
?>