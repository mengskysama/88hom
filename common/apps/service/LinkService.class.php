<?php
/**
 * 信息管理业务操作类
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class LinkService{
	private $db=null;
	private $linkDAO=null;
	public function __construct($db){
		$this->db=$db;
		$this->linkDAO=new LinkDAO($db);
	}
//=================================友情链接操作=============================
	/**
	 * 发布友情链接
	 * @param array $link 友情链接对象 
	 * @return boolean
	 */
	public function release($link){
		$msg=true;
		$result=$this->linkDAO->release($link);
		if($result<0)$msg='发布友情链接失败！';
		else $this->linkDAO->cache();
		return $msg;
	}
	/**
	 * 修改友情链接
	 * @param array $link 友情链接对象 
	 * @return boolean
	 */
	public function saveLink($link){
		$msg=true;
		$result=$this->linkDAO->saveLink($link);
		if($result<0)$msg='修改友情链接失败！';
		else $this->linkDAO->cache();
		return $msg;
	}
	/**
	 * 根据ID删除友情链接
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delLinkById($id){
		$msg=true;
		$result=$this->linkDAO->delLink($id);
		if($result<0)$msg='友情链接删除失败！';
		else $this->linkDAO->cache();
		return $msg;
	}
	/**
	 * 批量删除友情链接
	 * @access public
	 * @param array $arrId
	 * @return bool
	 **/
	public function delLink($arrId){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->linkDAO->delLink($id);
				if($result<0)throw new Exception('友情链接删除错误！');
			}
			$this->db->commit();//事务提交
			$this->linkDAO->cache();
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 获得友情链接列表
	 * @return array
	 */
	public function getLinkDetailById($id){
		return $this->linkDAO->getLinkInfo($id);
	}
	/**
	 * 获得友情链接列表
	 * @return array
	 */
	public function getLinkList($typeId,$type='web'){
		return $this->linkDAO->getLinkList($typeId,$type);
	}
	/**
	 * 根据ID更改友情链接状态
	 * @access public
	 * @param string $state 状态
	 * @param string $id
	 * @return bool
	 **/
	public function changeState($state,$id){
		$msg=true;
		$result=$this->linkDAO->changeState($state,$id);
		if($result<0)$msg='友情链接状态更改失败！';
		else $this->linkDAO->cache();
		return $msg;
	}
	/**
	 * 友情链接排序
	 * @param array $layer 
	 * @return bool
	 **/
	public function orderLink($layer){
		$msg=true;
		$this->db->begin();
		try {
			foreach($layer as $id=>$layer){
				$result=$this->linkDAO->changeLinkLayer($layer,$id);
				if($result<0)throw new Exception('友情链接排序错误！');
			}
			$this->db->commit();//事务提交
			$this->linkDAO->cache();
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 生成一条URL-关键字对照记录
	 * @param unknown_type $postInfo
	 * @param string $id 主键
	 * @param string $prefixURL URL前缀
	 * @param string $suffixUrl URL后缀
	 * @param string $type 类型 1是新闻,2是产品
	 * @return boolean
	 */
	public function releaseUrlKeyWord($keyword,$url,$type){
		return $this->linkDAO->releaseUrlKeyWord($keyword,$url,$type);
	}
	/**
	 *	给内容添加内链
	 * @param string $content 内容
	 * @param string $prefixURL URL前缀
	 * @param string $suffixUrl URL后缀
	 * @return string
	 */
	public function addInnerLink($content){
		$keyWord=$this->linkDAO->getKeywordLinkList();
		foreach($keyWord as $key=>$item){
			if(stripos($content,$item['key_word'])){
				$posi=stripos($content,$item['key_word']);
				$keyWordLength=strlen($item['key_word']);
				if(substr($content,$posi+$keyWordLength,4)!='</a>'){//避免重复添加<a>标签
					$result=$this->linkDAO->getURLByKeyWord($item['key_word']);
					$url=$result['url'];
					$content=substr_replace($content,"<a href=\"".$url."\">".$item['key_word']."</a>",$posi,$keyWordLength);
				}
			}
		}
		return $content;
	}
}
?>