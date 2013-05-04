<?php
class AreaDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	public function release($info){
		$sql="insert into ecms_area(areaName,areaFatherId,areaLayer,areaState,areaMapX,areaMapY,areaCreateTime,areaUpdateTime) 
			  values('".(empty($info['areaName'])?'':$info['areaName'])."',
			  ".(empty($info['areaFatherId'])?0:$info['areaFatherId']).",
			  ".(empty($info['areaLayer'])?0:$info['areaLayer']).",
			  ".(empty($info['areaState'])?0:$info['areaState']).",
			  ".(empty($info['areaMapX'])?0:$info['areaMapX']).",
			  ".(empty($info['areaMapY'])?0:$info['areaMapY']).",
			  ".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	public function modify($info) {
		$sql="update ecms_area set 
			  areaName='".(empty($info['areaName'])?'':$info['areaName'])."',
			  areaFatherId=".(empty($info['areaFatherId'])?0:$info['areaFatherId']).",
			  areaLayer=".(empty($info['areaLayer'])?0:$info['areaLayer']).",
			  areaState=".(empty($info['areaState'])?0:$info['areaState']).",
			  areaMapX=".(empty($info['areaMapX'])?0:$info['areaMapX']).",
			  areaMapY=".(empty($info['areaMapY'])?0:$info['areaMapY']).",
			  areaUpdateTime=".time().",
			  where areaId=".$info['areaId'];
		return $this->db->getQueryExecute($sql);
	}
	
	public function getList($areaFatherId=0) {
		$sql="select * from ecms_area 
			  where areaFatherId=$areaFatherId 
			  order by areaLayer";
		return $this->db->getQueryArray($sql);
	}
	
	public function getDetail($areaId){
		$sql="select * from ecms_area 
			  where areaId=$areaId";
		return $this->db->getQueryValue($sql);
	}
	
	public function delete($areaId) {
		$sql="delete from ecms_area 
			  where areaId=$areaId";
		return $this->db->getQueryExecute($sql);
	}
/*	
	public function cache($fatherId) {
		$sql="select id,name from ecms_area where fatherId=$fatherId and lang='".LANG."'";
		$result=$this->db->getQueryHash($sql);
		$fp = fopen(ECMS_PATH_CONF . 'area/'.$fatherId.'_'.LANG.'.php', 'w');
		fputs($fp, '<?php return '.var_export($result, true) . '; ?>');
		fclose($fp);
	}
	
	public function getArray($name) {
		return require(ECMS_PATH_CONF . 'area/'.$name.'_'.LANG.'.php');
	}
*/	
}
?>