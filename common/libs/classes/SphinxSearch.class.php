<?php
require ECMS_PATH_LIBS.'api/sphinxapi.php';
class SphinxSearch{
	private $db=null;
	private $sphinx=null;
	public function __construct($db){
		$this->db=$db;
		$this->sphinx=new SphinxClient();
		$this->sphinx->SetServer(SPHINX_SERVER_HOST,SPHINX_SERVER_PORT);
		$this->sphinx->SetConnectTimeout(SPHINX_CONNECTTIMEOUT);//设置连接超时时间
		$this->sphinx->SetMaxQueryTime(SPHINX_MAXQUERYTIME);//设置最大查询时间
		//$this->sphinx->SetRetries(3,1000);//失败重试次数/间隔时间,分布式
		$this->sphinx->SetArrayResult(SPHINX_ARRAYRESULT);//设置结果返回格式,true为普通数组，false为hash格式
	}
	public function getCommunityForAutoComplete($searchModel){
		$result=null;
		if(empty($searchModel->search)) return $result;
		$this->sphinx->SetLimits($searchModel->begin,$searchModel->step,SPHINX_LIMIT_MAX_MATCHES,SPHINX_LIMIT_CUTOFF);//通用搜索设置
		$this->sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);//设置查询模式
		//$this->sphinx->SetRankingMode(SPH_RANK_SPH04);//设置评分模式
		$this->sphinx->SetSortMode(SPH_SORT_EXTENDED,"@weight DESC,communityupdatetime DESC");
		$this->sphinx->SetFieldWeights(array('communityname'=>1000));//设置字段权重
		//$this->sphinx->SetFilter('state', array(1),false);//设置属性过滤
		if($searchModel->p==1)$this->sphinx->SetFilter('communityprovince', array(1),false);//设置属性过滤false为匹配、true为拒绝
		if($searchModel->c==1)$this->sphinx->SetFilter('communitycity', array(1),false);//设置属性过滤
		if($searchModel->d==1)$this->sphinx->SetFilter('communitydistrict', array(1),false);//设置属性过滤
		if($searchModel->a==1)$this->sphinx->SetFilter('communityarea', array(1),false);//设置属性过滤

		$result=$this->sphinx->Query('@communityname "'.$searchModel->search.'"','index_ecms_community_main');//搜索字段包括communityName和communityAddress
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
				$communityList[]=$communityModel;
			}
			return $communityList;
			//return $result['matches'];
		}else{
			return $result;
		}
	}
	public function getPropertyForAutoComplete($searchModel){
		$result=null;
		if(empty($searchModel->search)) return $result;
	}
	
}
?>