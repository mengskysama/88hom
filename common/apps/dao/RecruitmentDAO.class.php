<?php
/**
 * ��Ƹ����
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class RecruitmentDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
//========================��Ƹ��Ϣ����=======================================================================
	/**
	 * ������Ƹ��Ϣ
	 * @param array $rm
	 * @return boolean
	 */
	public function release($rm){
		$sql="insert into ecms_recruitment(type_id,text_content,persons,dept,address,create_time,update_time,expired_time,lang)
			  values(".$rm['typeId'].",'".$rm['content']."','".$rm['persons']."','".(empty($rm['dept'])?'':$rm['dept'])."'
			  ,'".(empty($rm['address'])?'':$rm['address'])."',".time().",".time().",".(time()+(86400*$rm['expired'])).",'".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �޸���Ƹ��Ϣ
	 * @param array $rm
	 * @return bool
	 **/
	function saveRecruiment($rm){
		$sql="update ecms_recruitment set type_id=".$rm['typeId'].",persons='".$rm['persons']."',text_content='".$rm['content']."'
			 ,dept='".(empty($rm['dept'])?'':$rm['dept'])."',address='".(empty($rm['address'])?'':$rm['address'])."',
			 update_time=".time().",expired_time=".(time()+(86400*$rm['expired']))." where id=".$rm['id'];
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ɾ����Ƹ��Ϣ
	 * @param int $id 
	 * @return bool
	 **/
	function delRecruitemt($id){
		$sql="delete from ecms_recruitment where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ��ȡ��Ƹ��Ϣ�б�
	 * @access public
	 * @param string $field ���ݿ��ֶ�
	 * @param string $where ��ѯ����
	 * @param string $order ��������
	 * @param string $limit ��Ϣ����
	 * @return array
	 */
	public function getRmList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_recruitment $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ��ȡ��Ƹ��Ϣ����
	 * @param string $id 
	 * @return array
	 */
	function getRmInfoDetail($id,$type='web') {
		if($type=='web'){
			$sql="select * from ecms_recruitment where id=$id and state=1";
		}else{
			$sql="select * from ecms_recruitment where id=$id";
		}
		return $this->db->getQueryValue($sql);
	}
	/**
	 * �޸���Ƹ��Ϣ״̬
	 * @param string $state 
	 * @param string $id	
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_recruitment set state=$state,update_time=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	function countInfo($where = ''){
		$sql="select count(*) as counts from ecms_recruitment $where";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ���ͳ��
	 * @param string $infoId ��ϢID
	 * @return boolean
	 **/
	public function clickCount($id){
		$sql="update ecms_recruitment set click_count=click_count+1 where id=$id";
		return $this->db->getQueryExecute($sql);
	}
//========================��Ƹ��Ϣ������===============================================================
	/**
	 * ������Ƹ��Ϣ���
	 * @param array $rmType 
	 * @return bool
	 */
	public function releaseRmType($rmType){
		$rmType['typeLayer']=$this->getMaxRmTypeLayer($rmType['fid']);
		$sql="insert into ecms_recruitment_type(type_name,type_father_id,type_layer,lang) 
			  values('".$rmType['typeName']."',".$rmType['fid'].",".$rmType['typeLayer'].",'".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ��ȡ��Ƹ��Ϣ�������layer����һ�����
	 * @param array $fid 
	 * @return boolean
	 */
	public function getMaxRmTypeLayer($fid){
		$sql="select max(type_layer) as layer from ecms_recruitment_type where type_father_id=$fid and lang='".LANG."'";
		$result=$this->db->getQueryValue($sql);
		if(empty($result)){
			$result=1;
		}else{
			$result=$result['layer']+1;
		}
		return $result;
	}
	/**
	 * �޸���Ƹ��Ϣ���
	 * @param array $rmType 
	 * @return boolean
	 */
	public function saveRmType($rmType) {
		$sql="update ecms_recruitment_type set type_name='".$rmType['typeName']."' where id=".$rmType['id'];
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ��ȡ��Ƹ��Ϣ����б�
	 * @param int $fid 
	 * @return array
	 **/
	public function getRmTypeList($fid=1) {
		$sql="select * from ecms_recruitment_type 
			  where type_father_id=$fid and lang='".LANG."' 
			  order by type_layer";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ������ϢID��ȡ��Ƹ��Ϣ�������
	 * @param string $id 
	 * @return array
	 **/
	public function getRmTypeDetail($id){
		$sql="select * from ecms_recruitment_type where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * �޸���Ƹ��Ϣ�������
	 * @param int $typeLayer 
	 * @param int $id 
	 * @return bool
	 */
	public function changeRmTypeLayer($typeLayer,$id){
		$sql="update ecms_recruitment_type set type_layer=$typeLayer where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �����Ƹ��Ϣ���Ψһ��
	 * @param int $typeName 
	 * @return array
	 **/
	public function checkRmTypeUnique($typeName) {
		$sql="select count(*) as counts from ecms_recruitment_type where type_name='".$typeName."' and lang='".LANG."'";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ɾ����Ƹ��Ϣ���
	 * @param int $id
	 * @return bool
	 */
	public function delRmType($id) {
		$sql="delete from ecms_recruitment_type where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ������Ƹ��Ϣ���
	 * @param int $fid 
	 * @return void
	 */
	public function cache($fid) {
		$sql="select id,type_name from ecms_recruitment_type where type_father_id=$fid order by type_layer";
		$result=$this->db->getQueryHash($sql);
		$fp = fopen(ECMS_PATH_CONF . 'rm/'.$fid.'_'.LANG.'.php', 'w');
		fputs($fp, '<?php return '.var_export($result, true) . '; ?>');
		fclose($fp);
	}
	/**
	 * ��ȡ��Ƹ���������
	 * @param string $name �ֵ���
	 * @return array
	 */
	public function getArray($name) {
		return require(ECMS_PATH_CONF . 'rm/'.$name.'_'.LANG.'.php');
	}
}
?>