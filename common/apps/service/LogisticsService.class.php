<?php
/**
 * 仓储系统业务操作类
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class LogisticsService{
	private $db=null;
	private $logisticsDAO=null;
	public function __construct($db){
		$this->db=$db;
		$this->logisticsDAO=new LogisticsDAO($db);
	}
	//====================================门店管理=======================================
	//录入门店信息
	public function releaseStores($stores){
		$msg=true;
		$result=$this->logisticsDAO->releaseStores($stores);
		if($result<=0)$msg='数据录入失败！';
		return $msg;
	}
	//门店信息修改 
	public function saveStores($stores){
		$msg=true;
		$result=$this->logisticsDAO->saveStores($stores);
		if($result<=0)$msg='数据修改失败！';
		return $msg;
	}
	//删除门店
	public function delStoresByNo($storesNo){
		$msg=true;
		$result=$this->logisticsDAO->delStoresByNo($storesNo);
		if($result<=0)$msg='数据删除失败！';
		return $msg;
	}
	//获取门店列表
	public function getStoresList($field='*',$where='',$order='',$limit=''){
		return $this->logisticsDAO->getStoresList($field,$where,$order,$limit);
	}
	//根据ID获取门店信息
	public function getStoresDetailById($id){
		return $this->logisticsDAO->getStoresDetailById($id);
	}
	//根据StoresNo获取门店信息
	public function getStoresDetailByStoresNo($storesNo){
		return $this->logisticsDAO->getStoresDetailByStoresNo($storesNo);
	}
	//============================供应商管理=======================================
	//录入供应商信息
	public function releaseSuppliers($suppliers){
		$msg=true;
		$result=$this->logisticsDAO->releaseSuppliers($suppliers);
		if($result<=0)$msg='数据录入失败！';
		return $msg;
	}
	//供应商信息修改
	public function saveSuppliers($suppliers){
		$msg=true;
		$result=$this->logisticsDAO->saveSuppliers($suppliers);
		if($result<=0)$msg='数据修改失败！';
		return $msg;
	}
	//删除供应商
	public function delSuppliersByNo($suppliersNo){
		$msg=true;
		$result=$this->logisticsDAO->delSuppliersByNo($suppliersNo);
		if($result<=0)$msg='数据删除失败！';
		return $msg;
	}
	//获取供应商列表
	public function getSuppliersList($field='*',$where='',$order='',$limit=''){
		return $this->logisticsDAO->getSuppliersList($field,$where,$order,$limit);
	}
	//根据ID获取供应商信息
	public function getSuppliersDetailById($id){
		return $this->logisticsDAO->getSuppliersDetailById($id);
	}
	//根据SuppliersNo获取供应商信息
	public function getSuppliersDetailBySuppliersNo($suppliersNo){
		return $this->logisticsDAO->getSuppliersDetailBySuppliersNo($suppliersNo);
	}
	//=================================商品信息管理==========================================
	//录入商品信息
	public function releaseGoods($goods){
		$msg=true;
		$result=$this->logisticsDAO->releaseGoods($goods);
		if($result<=0)$msg='数据录入失败！';
		return $msg;
	}
	//修改商品信息
	public function saveGoods($goods){
		$msg=true;
		$result=$this->logisticsDAO->saveGoods($goods);
		if($result<=0)$msg='数据修改失败！';
		return $msg;
	}
	//获取商品信息列表
	public function getGoodsList($where='',$order='',$limit=''){
		return $this->logisticsDAO->getGoodsList($where,$order,$limit);
	}
	//根据ID获取商品信息
	public function getGoodsDetailById($id){
		return $this->logisticsDAO->getGoodsDetailById($id);
	}
	//根据goodsNo获取商品信息
	public function getGoodsDetailByGoodsNo($goodsNo){
		return $this->logisticsDAO->getGoodsDetailByGoodsNo($goodsNo);
	}
	//=================================供应商商品入库管理==========================================
	//录入预约商品入库
	public function releaseStorage($storage){
		$msg=true;
		$result=$this->logisticsDAO->releaseStorage($storage);
		if($result<=0)$msg='数据录入失败！';
		return $msg;
	}
	//修改入库的预约商品
	public function saveStorage($storage){
		$msg=true;
		$result=$this->logisticsDAO->saveStorage($storage);
		if($result<=0)$msg='数据修改失败！';
		return $msg;
	}
	//获取入库的预约商品列表
	public function getStorageList($where='',$order='',$limit=''){
		return $this->logisticsDAO->getStorageList($where,$order,$limit);
	}
	//按供应商和入库时间进行预约汇总
	public function getStorageGoodsListBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		return $this->logisticsDAO->getStorageGoodsListBySuppliersNo($suppliersNo,$storageTime,$goodsType);
	}
	//按供应商和入库时间进行预约门店汇总
	public function getStorageStoresListBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		return $this->logisticsDAO->getStorageStoresListBySuppliersNo($suppliersNo,$storageTime,$goodsType);
	}
	//按供应商，预约门店，和入库时间进行预约商品汇总
	public function getStorageStoresGoodsByStoresNoAndSuppliersNo($storesNo,$suppliersNo,$storageTime,$goodsType){
		return $this->logisticsDAO->getStorageStoresGoodsByStoresNoAndSuppliersNo($storesNo,$suppliersNo,$storageTime,$goodsType);
	}
	//获取预约汇总供应商列表
	public function getStorageSuppliersList($storageTime,$goodsType){
		return $this->logisticsDAO->getStorageSuppliersList($storageTime,$goodsType);
	}
	//根据供应商获取订单号列表 
	public function getStorageStoragePoBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		return $this->logisticsDAO->getStorageStoragePoBySuppliersNo($suppliersNo,$storageTime,$goodsType);
	}
	//根据门店获取配载单信息列表
	public function getStorageListByStoresNo($storesNo,$storageTime,$goodsType){
		return $this->logisticsDAO->getStorageListByStoresNo($storesNo,$storageTime,$goodsType);
	}
	//根据ID获取入库的预约商品信息
	public function getStorageDetailById($id){
		return $this->logisticsDAO->getStorageDetailById($id);
	}
	//根据ID删除入库的预约商品信息
	public function delStorageById($id){
		$msg=true;
		$result=$this->logisticsDAO->delStorageById($id);
		if($result<=0)$msg='数据删除失败！';
		return $msg;
	}
}
?>