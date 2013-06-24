<?php
/**
 * ���̹���
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class ShopDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * ������Ϣ
	 * @param array $info ��Ϣ����
	 * @return boolean
	 */
	public function release($info){
		$sql="insert into ecms_shop(shopId,shopName,shopTel,areaId,createTime,updateTime,lang) 
			  values('".$info['shopId']."','".(empty($info['shopName'])?'':$info['shopName'])."'
			  ,'".(empty($info['shopTel'])?'':$info['shopTel'])."'
			  ,".$info['areaId'].",'".time()."','".time()."','".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �޸���Ϣ
	 * @param array $info
	 * @return boolean
	 **/
	public function save($info){
		$sql="update ecms_shop set shopId='".$info['shopId']."',shopName='".(empty($info['shopName'])?'':$info['shopName'])."',
			  shopTel='".(empty($info['shopTel'])?'':$info['shopTel'])."',
			  areaId=".$info['areaId'].",updateTime=".time()." 
			  where id=".$info['id']." and lang='".LANG."'";
		return $this->db->getQueryExeCute($sql);
	}
	/**
	 * ɾ����Ϣ
	 * @param int $id ��ϢID
	 * @return boolean
	 **/
	public function delInfo($id){
		$sql="delete from ecms_shop where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ��ȡ��Ϣ����
	 * @param public
	 * @return array
	 */
	public function getInfo($sql) {
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ��ȡ��Ϣ�б�
	 * @access public
	 * @return array
	 */
	public function getInfoList($sql){
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ������Ϣ����
	 * @param public
	 * @return int
	 */
	public function countInfo($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * �޸���Ϣ״̬
	 * @param string $state ״̬
	 * @param string $id	����
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_shop set state=$state,updateTime=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
}
?>