<?php
/**
 * ��Ʒ����
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class MediaDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
//========================��Ϣ����=================================
	/**
	 * ������Ϣ
	 * @param arr $info ��Ϣ����
	 * @return boolean
	 */
	public function release($info){
		$sql="insert into ecms_media(title,file_name,file_path,pic_path,pic_thumb,type,create_time,update_time) 
			  values('".(empty($info['title'])?'':$info['title'])."','".(empty($info['file_name'])?'':$info['file_name'])."','".(empty($info['file_path'])?'':$info['file_path'])."'
			  ,'".(empty($info['pic_path'])?'':$info['pic_path'])."','".(empty($info['pic_thumb'])?'':$info['pic_thumb'])."',".(empty($info['type'])?1:$info['type'])."
			  ,'".time()."','".time()."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �޸���Ϣ
	 * @param array $info
	 * @return bool
	 **/
	public function saveInfo($info){
		$sql="update ecms_media set title='".$info['title']."',
			  file_name='".(empty($info['file_name'])?'':$info['file_name'])."',file_path='".(empty($info['file_path'])?'':$info['file_path'])."',
			  pic_path='".(empty($info['pic_path'])?'':$info['pic_path'])."',pic_thumb='".(empty($info['pic_thumb'])?'':$info['pic_thumb'])."',
			  update_time=".time()." 
			  where id=".$info['id'];
		return $this->db->getQueryExeCute($sql);
	}
	/**
	 * ɾ����Ϣ
	 * @param string $infoId ��ϢID
	 * @return bool
	 **/
	public function delInfo($infoId){
		$sql="delete from ecms_media where id=$infoId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ��ȡ��Ϣ�б�
	 * @access public
	 * @param string $field ���ݿ��ֶ�
	 * @param string $where ��ѯ����
	 * @param string $order ��������
	 * @param string $limit ��Ϣ����
	 * @return array
	 */
	public function getInfoList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_media $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfo($where = ''){
		$sql="select count(*) as counts from ecms_media $where";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ȡ��Ϣ����
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @return array
	 */
	public function getInfoDetailByInfoId($infoId, $type = 'web') {
		if($type=='web'){
			$sql="select * from ecms_media where id=$infoId and state=1";
		}else{
			$sql="select * from ecms_media where id=$infoId";
		}
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ȡ������Ϣ����һ��
	 * @return array
	 */
	public function getInfoDetailByFirst(){
		$sql="select * from ecms_media where state=1 order by create_time desc limit 0,1";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ȡ��һ����Ϣ
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @return array
	 */
	public function getNextInfo($infoId,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_media 
				  where id>$infoId and state=1
				  order by id asc";
		}else{
			$sql="select * from ecms_media 
				  where id>$infoId 
				  order by id asc";
		}
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ȡ��һ����Ϣ
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @return array
	 */
	public function getPreInfo($infoId,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_media 
				  where id<$infoId and state=1
				  order by id desc";
		}else{
			$sql="select * from ecms_media 
				  where id<$infoId 
				  order by id desc";
		}
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ���ͳ��
	 * @param string $infoId ��ϢID
	 * @return boolean
	 **/
	public function clickCount($infoId){
		$sql="update ecms_media set click_count=click_count+1 where id=$infoId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �޸���Ϣ״̬
	 * @param string $state ״̬
	 * @param string $id	����
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_media set state=$state,update_time=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}

}
?>