<?php 
/**
 * 
 * 家居服务类
 * @author Sam(semovy@gmail.com)
 * @since 2013-06-17
 */
class FurnitureService{
	private $db=null;
	private $picDAO = null;

	public function __construct($db){
		$this->db=$db;
		$this->picDAO = new PicDAO($db);
	}
	public function getFurnitureDesignPicById($id){
		
	}
	//返回家居装修设计图库某大类下某小类的json格式
	public function getSubPicTypeJsonByParentId($id){
		global $cfg;
		$arr = $cfg['arr_pic']['furnitureDesignPicSubType'][$id];
		$str = '[';
		
		$len = 0;
		foreach ($arr as $key=>$value)
		{
			if($len != count($arr)-1)
			$str .='{id:'.$key.',text:"'.$value.'"},';
			else 
			$str .='{id:'.$key.',text:"'.$value.'"}';
			$len++;
		}

		$str.=']';
		return $str;
	}
}

?>