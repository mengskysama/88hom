<?php
/**
 * 产品管理
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class MediaDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
//========================信息操作=================================
	/**
	 * 发布信息
	 * @param arr $info 信息对象
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
	 * 修改信息
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
	 * 删除信息
	 * @param string $infoId 信息ID
	 * @return bool
	 **/
	public function delInfo($infoId){
		$sql="delete from ecms_media where id=$infoId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取信息列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getInfoList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_media $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 计算信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countInfo($where = ''){
		$sql="select count(*) as counts from ecms_media $where";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 取信息详情
	 * @param string $infoId 信息ID
	 * @param string $field 字段
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
	 * 取最新信息详情一条
	 * @return array
	 */
	public function getInfoDetailByFirst(){
		$sql="select * from ecms_media where state=1 order by create_time desc limit 0,1";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 取下一条信息
	 * @param string $infoId 信息ID
	 * @param string $field 字段
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
	 * 取上一条信息
	 * @param string $infoId 信息ID
	 * @param string $field 字段
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
	 * 点击统计
	 * @param string $infoId 信息ID
	 * @return boolean
	 **/
	public function clickCount($infoId){
		$sql="update ecms_media set click_count=click_count+1 where id=$infoId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 修改信息状态
	 * @param string $state 状态
	 * @param string $id	主键
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_media set state=$state,update_time=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}

}
?>