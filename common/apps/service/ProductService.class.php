<?php
/**
 * 产品管理业务操作类
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class ProductService{
	private $db=null;
	private $productDAO=null;
	private $linkService=null;
	public function __construct($db){
		$this->db=$db;
		$this->productDAO=new ProductDAO($db);
		$this->linkService=new LinkService($db);
	}
//=================================产品操作=============================
	/**
	 * 发布产品
	 * @param array $product 产品对象 
	 * @return boolean
	 */
	public function release($product){
		$msg=true;
		$this->db->begin();//事务开始
		try {
			if(empty($product['content'])){
				throw new Exception ( '内容详细信息不能为空！' );
			}
			//$product['content']=$this->linkService->addInnerLink($product['content']);//给内容添加内链
			$result = $this->productDAO->release ( $product );
			if ($result < 0)
				throw new Exception ( '发布产品失败！' );
			$productId = $this->db->getInsertNum ();
			//插入产品图片
			if(!empty($product['picUrl'])){
				foreach($product['picUrl'] as $key=>$value){
					$result=$this->productDAO->insertProductPic($product['picUrl'][$key],$product['picThumb'][$key],$product['picDesc'][$key],$productId);
					if($result<0) throw new Exception('发布产品图片失败！');
				}
			}
			//产品额外属性
			$exList=$this->productDAO->getExList();
			foreach($exList as $key=>$item){
				if(!empty($product['property_'.$item['en']])){
					$result=$this->productDAO->insertExinfo($productId,$item['id'],$product['property_'.$item['en']]);
					if($result<0) throw new Exception('发布产品额外属性失败！');
				}
			}
//			$keyword=$product['keyword'];//添加内链列表
//			if($keyword){
//				$result=$this->linkService->releaseUrlKeyWord($keyword,ECMS_WEB_URL.'product/d-'.$productId.'.htm',2);
//				if($result<0)throw new Exception('发布关键字内链失败！');
//			}
			$this->db->commit();//事务提交
		}catch(Exception $e){
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();//事务结束
		return $msg;
	}
	/**
	 * 修改产品
	 * @param array $product
	 * @return bool
	 **/
	public function saveProduct($product){
		$msg=true;
		$this->db->begin();//事务开始
		try {
			if(empty($product['content'])){
				throw new Exception ( '内容详细信息不能为空！' );
			}
			//$product['content']=$this->linkService->addInnerLink($product['content']);
			$result=$this->productDAO->saveProduct($product);
			if($result<0) throw new Exception('修改产品失败！');
			//删除产品图片
			$result=$this->productDAO->delProductPic($product['id']);
			if($result<0) throw new Exception('删除产品图片失败！');
			//插入产品图片
			if(!empty($product['picUrl'])){
				foreach($product['picUrl'] as $key=>$value){
					$result=$this->productDAO->insertProductPic($product['picUrl'][$key],$product['picThumb'][$key],$product['picDesc'][$key],$product['id']);
					if($result<0) throw new Exception('插入产品图片失败！');
				}
			}
			//产品额外属性先删除
			$result=$this->productDAO->delProductExInfo($product['id']);
			if($result<0) throw new Exception('删除产品属性失败！');
			//产品额外属性
			$exList=$this->productDAO->getExList();
			foreach($exList as $key=>$item){
				if(!empty($product['property_'.$item['en']])){
					$result=$this->productDAO->insertExinfo($product['id'],$item['id'],$product['property_'.$item['en']]);
					if($result<0) throw new Exception('插入产品属性失败！');
				}
			}
			$this->db->commit();//事务提交
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();//事务结束
		return $msg;
	}
	/**
	 * 根据产品ID删除产品信息
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delProductById($id){
		$msg=true;
		$this->db->begin();//事务开始
		try {
			$result=$this->productDAO->delProduct($id);
			if($result<0) throw new Exception('产品信息删除失败！');
			$result=$this->productDAO->delProductPic($id);
			if($result<0) throw new Exception('产品信息图片删除失败！');
			$result=$this->productDAO->delProductExInfo($id);
			if($result<0) throw new Exception('产品信息属性删除失败！');
			$this->db->commit();//事务提交
		}catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();//事务结束
		return $msg;
	}
	/**
	 * 根据产品ID更改产品状态
	 * @access public
	 * @param string $state 状态
	 * @param string $id
	 * @return bool
	 **/
	public function changeState($state,$id){
		$msg=true;
		$result=$this->productDAO->changeState($state,$id);
		if($result<0)$msg='产品状态更改失败！';
		return $msg;
	}
	/**
	 * 根据产品ID获取产品详情
	 * @access public
	 * @param string $productId 产品ID
	 * @param string $field 字段
	 * @return Array
	 **/
	public function getProductDetailByProductId($productId,$type='web'){
		return $this->productDAO->getProductDetailByProductId($productId,$type);
	}
	public function getProductDetail($where=''){
		return $this->productDAO->getProductDetail($where);
	}
	/**
	 * 获取产品列表
	 * @param string $field
	 * @param string $where
	 * @param string $order
	 * @param string $limit
	 * @return array
	 **/
	public function getProductList($field = '*',$where='',$order='',$limit=''){
		return $this->productDAO->getProductList($field,$where,$order,$limit);
	}
//=================================产品图片操作=============================
	/**
	 * 根据产品ID获取产品图片列表
	 * @param array $productId
	 * @return bool
	 **/
	public function getProductPicListByProductId($productId){
		return $this->productDAO->getProductPicListByProductId($productId);
	}
//=================================产品类别操作=============================
	/**
	 * 发布产品类别
	 * @param array $productType
	 * @return bool
	 **/
	public function releaseProductType($productType){
		$msg=true;
		$checkUnique=$this->productDAO->checkProductTypeUnique($productType['typeName']);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='产品类别名称不可重复！';
		}else{
			$result=$this->productDAO->releaseProductType($productType);
			if($result<0)$msg='产品类别发布失败！';
			else $this->productDAO->cache($productType['fid']);
		}
		return $msg;
	}
	public function releaseProductTypeSearch($productTypeSearch){
		$msg=true;
		if(!empty($productTypeSearch['typeSearch'])){
			$typeSearchList=$this->getProductTypeSearch();
			$typeSearch=$productTypeSearch['typeSearch'];
			$typeSearchName=$productTypeSearch['typeSearchName'];
			$productTypeList=$this->getProductTypeListByCache(0);
			$typeStrId='';
			$typeStrName='';
			$typeSearchObj=array();
			for($i=0;$i<count($typeSearch);$i++){
				if(($i+1)==count($typeSearch)){
					$typeStrId.='l-'.$typeSearch[$i].'-l';
					$typeStrName.=$productTypeList[$typeSearch[$i]];
				}else{
					$typeStrId.='l-'.$typeSearch[$i].'-l'.',';
					$typeStrName.=$productTypeList[$typeSearch[$i]].'/';
				}
			}
			$typeSearchObj=array('id'=>$typeStrId,'name'=>$typeStrName);
			$typeSearchList[$typeStrId]=array('name'=>$typeSearchName,'typeSearch'=>$typeSearchObj);
			$this->cacheProductTypeSearch($typeSearchList);
		}else{
			$msg='请选择要发布的搜索类别！';	
		}
		return $msg;
	}
	//递归找出第一级类别
	public function getProductFirstType($id){
		$typeInfo=$this->productDAO->getProductTypeInfo($id);
		if(!empty($typeInfo)){
			if($typeInfo['type_father_id']==0){
				return $typeInfo['id'];
			}else{
				return $this->getProductFirstType($typeInfo['type_father_id']);
			}
		}else{
			return $id;
		}
	}
	public function cacheProductTypeSearch($typeSearchList){
		$fp = fopen(ECMS_PATH_CONF . 'product/typeSearch.php', 'w');
		fputs($fp, '<?php return '.var_export($typeSearchList, true) . '; ?>');
		fclose($fp);
	}
	public function getProductTypeSearch(){
		if(file_exists(ECMS_PATH_CONF . 'product/typeSearch.php')){
			return require(ECMS_PATH_CONF . 'product/typeSearch.php');
		}else{
			return null;
		}
	}
	/**
	 * 修改产品类别
	 * @param array $productType
	 * @return bool
	 **/
	public function saveProductType($productType){
		$msg=true;
		$resultProductType=$this->productDAO->getProductTypeInfo($productType['id']);
		if($productType['typeName']==$resultProductType['type_name']){
			$result=$this->productDAO->saveProductType($productType);
			if($result<0)$msg='产品类别修改失败！';
			else $this->productDAO->cache($productType['fid']);
		}else{
			$checkUnique=$this->productDAO->checkProductTypeUnique($productType['typeName']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				$msg='产品类别名称不可重复！';
			}else{
				$result=$this->productDAO->saveProductType($productType);
				if($result<0)$msg='产品类别修改失败！';
				else $this->productDAO->cache($productType['fid']);
			}
		}
		return $msg;
	}
	public function saveProductTypeSearch($productTypeSearch,$typeSearchName,$id){
		$msg=true;
		$typeSearchList=$this->getProductTypeSearch();
		$productTypeList=$this->getProductTypeListByCache(0);
		$typeSearchListNew='';
		foreach ($typeSearchList as $key=>$value){
			if($key!=$id){
				$typeSearchListNew[$key]=$value;
			}
		}
		$typeStrId='';
		$typeStrName='';
		$typeSearchObj=array();
		for($i=0;$i<count($productTypeSearch);$i++){
			if(($i+1)==count($productTypeSearch)){
				$typeStrId.='l-'.$productTypeSearch[$i].'-l';
				$typeStrName.=$productTypeList[$productTypeSearch[$i]];
			}else{
				$typeStrId.='l-'.$productTypeSearch[$i].'-l'.',';
				$typeStrName.=$productTypeList[$productTypeSearch[$i]].'/';
			}
		}
		$typeSearchObj=array('id'=>$typeStrId,'name'=>$typeStrName);
		$typeSearchListNew[$typeStrId]=array('name'=>$typeSearchName,'typeSearch'=>$typeSearchObj);
		$this->cacheProductTypeSearch($typeSearchListNew);
		return $msg;
	}
	/**
	 * 删除产品类别
	 * @param int $id
	 * @return bool
	 **/
	public function delProductTypeById($id,$fid){
		$msg=true;
		$result=$this->productDAO->delProductType($id);
		if($result<0)$msg='产品类别删除失败！';
		else $this->productDAO->cache($fid);
		return $msg;
	}
	public function delProductTypeSearchById($id){
		$msg=true;
		$typeSearchList=$this->getProductTypeSearch();
		$typeSearchListNew='';
		foreach ($typeSearchList as $key=>$value){
			if($key!=$id){
				$typeSearchListNew[$key]=$value;
			}
		}
		$this->cacheProductTypeSearch($typeSearchListNew);
		return $msg;
	}
	/**
	 * 批量删除产品类别
	 * @param array $arrId
	 * @return bool
	 **/
	public function delProductType($arrId,$fid){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->productDAO->delProductType($id);
				if($result<0)throw new Exception('类别删除错误！');
			}
			$this->db->commit();//事务提交
			$this->productDAO->cache($fid);
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 产品类别排序
	 * @param array $typeLayer
	 * @return bool
	 **/
	public function orderProductType($typeLayer,$fid){
		$msg=true;
		$this->db->begin();
		try {
			foreach($typeLayer as $id=>$layer){
				$result=$this->productDAO->changeProductTypeLayer($layer,$id);
				if($result<0)throw new Exception('类别排序错误！');
			}
			$this->db->commit();//事务提交
			$this->productDAO->cache($fid);
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 根据产品ID获取产品类别详情
	 * @access public
	 * @param string $id
	 * @return array
	 **/
	public function getProductTypeDetailById($id){
		return $this->productDAO->getProductTypeInfo($id);
	}
	/**
	 * 获取产品类别列表
	 * @param int $typeFatherId 父类产品ID
	 * @access public
	 * @return array
	 */
	public function getProductTypeList($typeFatherId=1) {
		return $this->productDAO->getProductTypeList($typeFatherId);
	}
	/**
	 * 获取产品类别列表(cache)
	 * @param int $typeFatherId 父类产品ID
	 * @access public
	 * @return array
	 */
	public function getProductTypeListByCache($typeFatherId=1) {
		return $this->productDAO->getArray($typeFatherId);
	}
//=================================产品属性类别操作=============================
	/**
	 * 获取产品属性类别列表
	 * @access public
	 * @return array
	 */
	public function getProductPropertyList(){
		return $this->productDAO->getExList();
	}
	/**
	 * 获取产品属性类别列表
	 * @access public
	 * @return array
	 */
	public function getProductExInfoList($id){
		return $this->productDAO->getProductExInfoList($id);
	}
	/**
	 * 根据产品ID获取产品属性详情
	 * @access public
	 * @param string $id
	 * @return array
	 **/
	public function getProductPropertyDetailById($id){
		return $this->productDAO->getProductPropertyById($id);
	}
	/**
	 * 发布产品属性
	 * @param array $productProperty
	 * @return bool
	 **/
	public function releaseProductProperty($productProperty){
		$msg=true;
		$checkUnique=$this->productDAO->checkProductExUnique($productProperty);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='产品属性名称不可重复！';
		}else{
			$result=$this->productDAO->releaseProductProperty($productProperty);
			if($result<0)$msg='产品属性发布失败！';
		}
		return $msg;
	}
	/**
	 * 修改产品属性
	 * @param array $productProperty
	 * @return bool
	 **/
	public function saveProductProperty($productProperty){
		$msg=true;
		$productProperty['en']='';
		$checkUnique=$this->productDAO->checkProductExUnique($productProperty);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='产品属性名称不可重复！';
		}else{
			$result=$this->productDAO->saveProductProperty($productProperty);
			if($result<0)$msg='产品属性修改失败！';
		}
		return $msg;
	}
	/**
	 * 删除产品属性类别
	 * @param int $id
	 * @return bool
	 **/
	public function delProductPropertyById($id){
		$msg=true;
		$result=$this->productDAO->delProductExProperty($id);
		if($result<0)$msg='产品属性类别删除失败！';
		return $msg;
	}
	/**
	 * 批量删除产品属性类别
	 * @param array $arrId
	 * @return bool
	 **/
	public function delProductProperty($arrId){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->productDAO->delProductExProperty($id);
				if($result<0)throw new Exception('属性删除错误！');
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
	 * 产品属性类别排序
	 * @param array $propertyLayer
	 * @return bool
	 **/
	public function orderProductProperty($propertyLayer){
		$msg=true;
		$this->db->begin();
		try {
			foreach($propertyLayer as $id=>$layer){
				$result=$this->productDAO->changeProductExLayer($layer,$id);
				if($result<0)throw new Exception('类别排序错误！');
			}
			$this->db->commit();//事务提交
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
}
?>