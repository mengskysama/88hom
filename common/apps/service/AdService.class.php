<?php 
/**
 * 
 * 广告服务类
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-20
 */
class AdService{
	private $db=null;
	private $adTypeDAO = null;
	private $adDAO = null;
	public function __construct($db){
		$this->db=$db;
		$this->adTypeDAO = new AdTypeDAO($db);
		$this->adDAO = new AdDAO($db);
	}
	/**
	 * 根据广告位置获取一条或多条广告,按序号倒序返回数组
	 * @param $site 广告位置
	 * @return 广告详细html代码
	 */
	public function getAdBySite($site){
		$sql = "select adtypeKey,adTitle,adUrl,adPic,adFiles,adSite,adSiteDesc,adEId,adEClass,width,height 
				from ecms_ad_type t,ecms_ad a where t.adtypeId=a.adtypeId and t.adtypeState=1 and a.adState=1 and a.adSite=".$site." order by adLayer desc ";
		$ad = $this->db->getQueryValue($sql);
		$adArr = array();
		for($i=0;$i<count($ad);$i++)
		{
			$html = '';
			$attr = $ad[$i]['adEId']==''?'':' id="'.$ad[$i]['adEId'].'"';
			$attr .= $ad[$i]['adEClass']==''?'':' class="'.$ad[$i]['adEClass'].'"';
			$width = ($ad[$i]['width'] == '' || $ad[$i]['width'] == 0)?'':'width="'.$ad[$i]['width'].'"';
			$height = ($ad[$i]['height'] == '' || $ad[$i]['height'] == 0)?'':'height="'.$ad[$i]['height'].'"';
			
			if($ad[$i]['adtypeKey'] == 'url')//一般文本链接
				$html ='<a '.$attr.' target="_blank" href="'.$ad[$i]['adUrl'].'">'.$ad[$i]['adTitle'].'</a>';
			else if($ad[$i]['adtypeKey'] == 'pic')//图片
			{
				if($ad[$i]['adUrl'] != '')
				{
					$html ='<a '.$attr.' target="_blank" href="'.$ad[$i]['adUrl'].'"><img '.$width.' '.$height.' src="'.ECMS_PATH_AD_URL.'/'.$ad[$i]['adPic'].'"/></a>';
				}
				else {
					$html ='<img '.$attr.'  '.$width.' '.$height.'  src="'.ECMS_PATH_AD_URL.'/'.$ad[$i]['adPic'].'">';
				}
			}
			else if($ad[$i]['adtypeKey'] == 'swf')//swf的flash
			{
				$html ='<object '.$attr.' classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"  '.$width.' '.$height.'  >';
				$html .='<param name="movie" value="'.ECMS_PATH_AD_URL.'/'.$ad[$i]['adFiles'].'" />';
				$html .='<param name="wmode" value="transparent" />';
				$html .='<param name="quality" value="high" />';
				$html .='<embed wmode="transparent" src="'.ECMS_PATH_AD_URL.'/'.$ad[$i]['adFiles'].'" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"   '.$width.' '.$height.'  ></embed>';
				$html .='</object>';
			}
			
			$adArr[$i] = $html;
		}	
		return $adArr;
	}
	/**
	 * 根据广告Id获取某条广告
	 * @param $id 广告id
	 * @return 广告详细html代码
	 */
	public function getAdById($id){
		$sql = "select adtypeKey,adTitle,adUrl,adPic,adFiles,adSite,adSiteDesc,adEId,adEClass,width,height 
				from ecms_ad_type t,ecms_ad a where t.adtypeId=a.adtypeId and a.adId=".$id;
		$ad = $this->db->getQueryValue($sql);
		$html = '';
		$attr = $ad['adEId']==''?'':' id="'.$ad['adEId'].'"';
		$attr .= $ad['adEClass']==''?'':' class="'.$ad['adEClass'].'"';
		$width = ($ad['width'] == '' || $ad['width'] == 0)?'':'width="'.$ad['width'].'"';
		$height = ($ad['height'] == '' || $ad['height'] == 0)?'':'height="'.$ad['height'].'"';
		
		if($ad['adtypeKey'] == 'url')//一般文本链接
			$html ='<a '.$attr.' target="_blank" href="'.$ad['adUrl'].'">'.$ad['adTitle'].'</a>';
		else if($ad['adtypeKey'] == 'pic')//图片
		{
			if($ad['adUrl'] != '')
			{
				$html ='<a '.$attr.' target="_blank" href="'.$ad['adUrl'].'"><img '.$width.' '.$height.' src="'.ECMS_PATH_AD_URL.$ad['adPic'].'"/></a>';
			}
			else {
				$html ='<img '.$attr.'  '.$width.' '.$height.'  src="'.ECMS_PATH_AD_URL.$ad['adPic'].'">';
			}
		}
		else if($ad['adtypeKey'] == 'swf')//swf的flash
		{
			$html ='<object '.$attr.' classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"  '.$width.' '.$height.'  >';
			$html .='<param name="movie" value="'.ECMS_PATH_AD_URL.$ad['adFiles'].'" />';
			$html .='<param name="wmode" value="transparent" />';
			$html .='<param name="quality" value="high" />';
			$html .='<embed wmode="transparent" src="'.ECMS_PATH_AD_URL.$ad['adFiles'].'" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"   '.$width.' '.$height.'  ></embed>';
			$html .='</object>';
		}
		return $html;
	}
	/**
	 * 根据广告类别id获取所属广告记录条数
	 */
	public function getAdCountByTypeId($typeId){
		$sql = 'select count(*) as cnt from ecms_ad a where adtypeId='.$typeId;
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 根据广告类别id删除类别，并同时删除类别以下所有广告及其附属文件
	 * @param $id 类别id
	 */
	public function delAdTypeById($id){//缺少事务 -_-
		$ads = $this->adDAO->getAdList('*','where adtypeId='.$id,'','');//获取某类别的所有广告
		for($i=0;$i<count($ads);$i++){
			if($ads[$i]['adPic'] != '')
				unlink(ECMS_PATH_AD_FILE/$ads[$i]['adPic']);//删除图片
			if($ads[$i]['adFiles'] != '')
				unlink(ECMS_PATH_AD_FILE/$ads[$i]['adFiles']);//删除flash	
		}
		$sql = 'delete from ecms_ad where adtypeId='.$id;
		$this->db->getQueryExecute($sql);//删除类别以下所有广告
		$this->adTypeDAO->delAdTypeById($id);//删除类别
	}
	/**
	 * 
	 * 获取包含类别信息的广告列表
	 */
	public function getAdList(){
		$sql = "select a.*,t.adtypeName,t.adtypeKey from ecms_ad_type t,ecms_ad a where t.adtypeId=a.adtypeId order by adUpdateTime desc";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 添加广告，并可能上传图像
	 */
	public function addAd($ad){
		$fileName = time();
		$temp = $this->adTypeDAO->getAdTypeById($ad['adtypeId']);
		if($_FILES["file"]["name"]!='' && $temp['adtypeKey']!='url')
		{
			$ext = extend_file($_FILES["file"]["name"]);
			if($temp['adtypeKey']=='pic')
				$ad['adPic'] = $fileName.'.'.$ext;
			else if($temp['adtypeKey']=='swf') 
				$ad['adFiles'] = $fileName.'.'.$ext;
			move_uploaded_file($_FILES["file"]["tmp_name"], ECMS_PATH_AD_FILE . $fileName.'.'.$ext);	//复制文件
		}
		$this->adDAO->release($ad);
	}
	/**
	 * 更新广告，并可能上传图像
	 */
	public function updateAd($ad){
		$old_ad = $this->adDAO->getAdById($ad['adId']);
		
		$ad['adPic'] = $old_ad['adPic'];
		$ad['adFiles'] = $old_ad['adFiles'];
		
		$fileName = time();
		$temp = $this->adTypeDAO->getAdTypeById($ad['adtypeId']);
		$old_type = $this->adTypeDAO->getAdTypeById($old_ad['adtypeId']);
		if($_FILES["file"]["name"]!='' && $temp['adtypeKey']!='url')
		{
			$ext = extend_file($_FILES["file"]["name"]);
			if($temp['adtypeKey']=='pic')
				$ad['adPic'] = $fileName.'.'.$ext;
			else if($temp['adtypeKey']=='swf') 
				$ad['adFiles'] = $fileName.'.'.$ext;
			move_uploaded_file($_FILES["file"]["tmp_name"], ECMS_PATH_AD_FILE . $fileName.'.'.$ext);	//复制文件
			
			if(!empty($old_ad['adPic']) && $old_ad['adPic']!='')//删除图片
			unlink(ECMS_PATH_AD_FILE.$old_ad['adPic']);
			if(!empty($old_ad['adFiles']) && $old_ad['adFiles']!='')//删除flash
			unlink(ECMS_PATH_AD_FILE.$old_ad['adFiles']);

		}
		if($_FILES["file"]["name"]=='' && $temp['adtypeKey']=='url' && $old_type['adtypeKey'] !='url'){
			if(!empty($old_ad['adPic']) && $old_ad['adPic']!='')//删除图片
			unlink(ECMS_PATH_AD_FILE.$old_ad['adPic']);
			if(!empty($old_ad['adFiles']) && $old_ad['adFiles']!='')//删除flash
			unlink(ECMS_PATH_AD_FILE.$old_ad['adFiles']);
			
			$ad['adPic'] = '';
			$ad['adFiles'] = '';
		}

		$this->adDAO->modify($ad);
	}
	/**
	 * 删除广告，同时删除其文件
	 */
	public function delAdById($id){
		$temp = $this->adDAO->getAdById($id);
		if(!empty($temp['adPic']) && $temp['adPic']!='')//删除图片
		unlink(ECMS_PATH_AD_FILE.$temp['adPic']);
		if(!empty($temp['adFiles']) && $temp['adFiles']!='')//删除flash
		unlink(ECMS_PATH_AD_FILE.$temp['adFiles']);
		$this->adDAO->delAdById($id);//删除记录
	}
}

?>