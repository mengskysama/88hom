<?php
/**
 * 
 * 友情链接
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-11
 */
class LinkDAO1  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布友情链接
	public function release($link){
		$sql="insert into ecms_link(linkName,linkUrl,linkPic,linkPicThumb,linkLayer,linkState,linktypeId,linkCreateTime,linkUpdateTime) values('"
										.empty($link['linkName'])?'':$link['linkName']
										."','".empty($link['linkUrl'])?'':$link['linkUrl']
										."','".empty($link['linkPic'])?'':$link['linkPic']
										."','".empty($link['linkPicThumb'])?'':$link['linkPicThumb']
										."',".empty($link['linkLayer'])?0:$link['linkLayer']
										.",".empty($link['linkState'])?0:$link['linkState']
										.",".empty($link['linktypeId'])?0:$link['linktypeId']
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改友情链接
	public function modify($link){
		$sql="update ecms_link set linkName='"
			.empty($link['linkName'])?'':$link['linkName']
			."',linkUrl='".empty($link['linkUrl'])?'':$link['linkUrl']
			."',linkPic='".empty($link['linkPic'])?'':$link['linkPic']
			."',linkPicThumb='".empty($link['linkPicThumb'])?'':$link['linkPicThumb']
			."',linkLayer=".empty($link['linkLayer'])?0:$link['linkLayer']
			.",linkState=".empty($link['linkState'])?0:$link['linkState']
			.",linktypeId=".empty($link['linktypeId'])?0:$link['linktypeId']
			.",linkUpdateTime=".time()
			." where linkId=".$link['linkId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除友情链接
	public function delLinkById($id){
		$sql="delete from  ecms_link where linkId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取友情链接
	 * @param string $where 
	 * @return array
	 */
	public function getLinkById($id) {
		$sql="select * from ecms_link where linkId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取友情链接列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getLinkList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_link $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改友情链接
	 * @param string $state 状态
	 * @param string $linkId	主键
	 * @return boolean
	 */
	public function changeState($state,$linkId){
		$sql="update ecms_link set linkState=$state,linkUpdateTime=".time()." where linkId=$linkId";
		return $this->db->getQueryExecute($sql);
	}
	//计算友情链接条数
	public function countLink($where = ''){
		$sql="select count(*) as counts from ecms_link $where";
		return $this->db->getQueryValue($sql);
	}

}


?>