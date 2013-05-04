<?php
/**
 * 信息管理业务操作类
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class BbsService{
	private $db=null;
	private $bbsDAO=null;
	public function __construct($db){
		$this->db=$db;
		$this->bbsDAO=new BbsDAO($db);
	}
//=================================信息操作=============================
	/**
	 * 发布信息
	 * @param array $info 信息对象 
	 * @return boolean
	 */
	public function release($info){
		$msg=true;
		$this->db->begin();
		try {
			$result=$this->bbsDAO->release($info);
			if($result<0)throw new Exception('发布信息失败！');
			$this->db->commit();//事务提交
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 修改信息
	 * @param array $info
	 * @return bool
	 **/
	public function saveInfo($info){
		$msg=true;
		$this->db->begin();
		try {
			$result=$this->bbsDAO->saveInfo($info);
			if($result<0)throw new Exception('信息修改失败！');
			$this->db->commit();//事务提交
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 根据信息ID删除信息
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delInfoById($id){
		$msg=true;
		$this->db->begin();
		try {
			$result=null;
			$result=$this->bbsDAO->delInfo($id);
			if($result<0)throw new Exception('信息删除失败！');
			$result=null;
			$result=$this->bbsDAO->delInfoReplyByBid($id);
			if($result<0)throw new Exception('信息删除失败！');
			$this->db->commit();//事务提交
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 根据信息ID获取信息详情
	 * @access public
	 * @param string $id 信息ID
	 * @return Array
	 **/
	public function getInfoDetailById($id,$type='web'){
		if($type=='web'){
			$sql="select b.*,u.uname from ecms_bbs as b 
				  inner join ecms_users_web as u on b.uid=u.id 
				  where b.state=1 and u.state=1 and b.id=$id";
		}else{
			$sql="select * from ecms_bbs as b 
				  inner join ecms_users_web as u on b.uid=u.id 
				  where b.id=$id";
		}
		return $this->bbsDAO->getInfo($sql);
	}
	/**
	 * 取下一条信息
	 * @param string $infoId 信息ID
	 * @param string $field 字段
	 * @param string $typeId 信息类别
	 * @return array
	 */
	public function getNextInfo($infoId,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_bbs 
				  where id>$infoId and state=1
				  order by id asc";
		}else{
			$sql="select * from ecms_bbs 
				  where id>$infoId 
				  order by id asc";
		}
		return $this->bbsDAO->getNextInfo($sql);
	}
	/**
	 * 取上一条信息
	 * @param string $infoId 信息ID
	 * @param string $field 字段
	 * @param string $typeId 信息类别
	 * @return array
	 */
	public function getPreInfo($infoId,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_bbs 
				  where id<$infoId and state=1
				  order by id desc";
		}else{
			$sql="select * from ecms_bbs 
				  where id<$infoId  
				  order by id desc";
		}
		return $this->bbsDAO->getPreInfo($sql);
	}
	/**
	 * 获取信息列表
	 * @param string $field
	 * @param string $where
	 * @param string $order
	 * @param string $limit
	 * @return array
	 **/
	public function getInfoList($where='',$order='',$limit=''){
		$sql="select b.*,u.uname,count(r.id) as replys from ecms_bbs as b 
			  left join ecms_bbs_reply as r on b.id=r.bid 
			  inner join ecms_users_web as u on b.uid=u.id 
			  $where group by b.id $order $limit";
		return $this->bbsDAO->getInfoList($sql);
	}
	/**
	 * 计算信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countInfo($where = ''){
		$sql="select count(*) as counts 
			  from (select b.id from ecms_bbs as b 
			  left join ecms_bbs_reply as r on b.id=r.bid 
			  inner join ecms_users_web as u on b.uid=u.id 
			  $where group by b.id) as newTable";
		return $this->bbsDAO->countInfo($sql);
	}
	/**
	 * 根据产品ID更改信息状态
	 * @access public
	 * @param string $state 状态
	 * @param string $id
	 * @return bool
	 **/
	public function changeState($state,$id){
		$msg=true;
		$result=$this->bbsDAO->changeState($state,$id);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	/**
	 * 点击统计
	 * @param string $infoId 信息ID
	 * @return boolean
	 **/
	public function clickCount($infoId){
		return $this->bbsDAO->clickCount($infoId);
	}
//=================================信息类别操作=============================
	/**
	 * 发布信息类别
	 * @param array $infoReply
	 * @return bool
	 **/
	public function releaseInfoReply($infoReply){
		$msg=true;
		$result=$this->bbsDAO->releaseInfoReply($infoReply);
		if($result<0)$msg='信息发布失败！';
		return $msg;
	}
	/**
	 * 删除信息类别
	 * @param int $id
	 * @return bool
	 **/
	public function delInfoReplyById($id){
		$msg=true;
		$result=$this->bbsDAO->delInfoReply($id);
		if($result<0)$msg='信息删除失败！';
		return $msg;		
	}
	/**
	 * 批量删除信息类别
	 * @param int $arrId
	 * @return bool
	 **/
	public function delInfoReply($arrId){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->bbsDAO->delInfoReply($id);
				if($result<0)throw new Exception('删除错误！');
			}
			$this->db->commit();//事务提交
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 根据信息ID获取信息类别详情
	 * @access public
	 * @param string $id
	 * @return array
	 **/
	public function getInfoReplyDetailById($id){
		return $this->bbsDAO->getInfoReply($id);
	}
	/**
	 * 获取信息类别列表
	 * @param int $typeFatherId 父类产品ID
	 * @access public
	 * @return array
	 */
	public function getInfoReplyList($where,$order,$limit) {
		$sql="select u.uname,r.* from ecms_bbs as b 
			  inner join ecms_bbs_reply as r on b.id=r.bid 
			  inner join ecms_users_web as u on u.id=r.uid 
			  $where $order $limit";
		return $this->bbsDAO->getInfoReplyList($sql);
	}
	/**
	 * 计算信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countInfoReply($where = ''){
		$sql="select count(*) as counts 
			  from ecms_bbs as b 
			  inner join ecms_bbs_reply as r on b.id=r.bid 
			  inner join ecms_users_web as u on r.uid=u.id 
			  $where";
		return $this->bbsDAO->countInfo($sql);
	}
	/**
	 * 根据产品ID更改信息状态
	 * @access public
	 * @param string $state 状态
	 * @param string $id
	 * @return bool
	 **/
	public function changeReplyState($state,$id){
		$msg=true;
		$result=$this->bbsDAO->changeReplyState($state,$id);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
}
?>