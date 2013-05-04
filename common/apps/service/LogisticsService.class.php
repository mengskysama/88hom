<?php
/**
 * �ִ�ϵͳҵ�������
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
	//====================================�ŵ����=======================================
	//¼���ŵ���Ϣ
	public function releaseStores($stores){
		$msg=true;
		$result=$this->logisticsDAO->releaseStores($stores);
		if($result<=0)$msg='����¼��ʧ�ܣ�';
		return $msg;
	}
	//�ŵ���Ϣ�޸� 
	public function saveStores($stores){
		$msg=true;
		$result=$this->logisticsDAO->saveStores($stores);
		if($result<=0)$msg='�����޸�ʧ�ܣ�';
		return $msg;
	}
	//ɾ���ŵ�
	public function delStoresByNo($storesNo){
		$msg=true;
		$result=$this->logisticsDAO->delStoresByNo($storesNo);
		if($result<=0)$msg='����ɾ��ʧ�ܣ�';
		return $msg;
	}
	//��ȡ�ŵ��б�
	public function getStoresList($field='*',$where='',$order='',$limit=''){
		return $this->logisticsDAO->getStoresList($field,$where,$order,$limit);
	}
	//����ID��ȡ�ŵ���Ϣ
	public function getStoresDetailById($id){
		return $this->logisticsDAO->getStoresDetailById($id);
	}
	//����StoresNo��ȡ�ŵ���Ϣ
	public function getStoresDetailByStoresNo($storesNo){
		return $this->logisticsDAO->getStoresDetailByStoresNo($storesNo);
	}
	//============================��Ӧ�̹���=======================================
	//¼�빩Ӧ����Ϣ
	public function releaseSuppliers($suppliers){
		$msg=true;
		$result=$this->logisticsDAO->releaseSuppliers($suppliers);
		if($result<=0)$msg='����¼��ʧ�ܣ�';
		return $msg;
	}
	//��Ӧ����Ϣ�޸�
	public function saveSuppliers($suppliers){
		$msg=true;
		$result=$this->logisticsDAO->saveSuppliers($suppliers);
		if($result<=0)$msg='�����޸�ʧ�ܣ�';
		return $msg;
	}
	//ɾ����Ӧ��
	public function delSuppliersByNo($suppliersNo){
		$msg=true;
		$result=$this->logisticsDAO->delSuppliersByNo($suppliersNo);
		if($result<=0)$msg='����ɾ��ʧ�ܣ�';
		return $msg;
	}
	//��ȡ��Ӧ���б�
	public function getSuppliersList($field='*',$where='',$order='',$limit=''){
		return $this->logisticsDAO->getSuppliersList($field,$where,$order,$limit);
	}
	//����ID��ȡ��Ӧ����Ϣ
	public function getSuppliersDetailById($id){
		return $this->logisticsDAO->getSuppliersDetailById($id);
	}
	//����SuppliersNo��ȡ��Ӧ����Ϣ
	public function getSuppliersDetailBySuppliersNo($suppliersNo){
		return $this->logisticsDAO->getSuppliersDetailBySuppliersNo($suppliersNo);
	}
	//=================================��Ʒ��Ϣ����==========================================
	//¼����Ʒ��Ϣ
	public function releaseGoods($goods){
		$msg=true;
		$result=$this->logisticsDAO->releaseGoods($goods);
		if($result<=0)$msg='����¼��ʧ�ܣ�';
		return $msg;
	}
	//�޸���Ʒ��Ϣ
	public function saveGoods($goods){
		$msg=true;
		$result=$this->logisticsDAO->saveGoods($goods);
		if($result<=0)$msg='�����޸�ʧ�ܣ�';
		return $msg;
	}
	//��ȡ��Ʒ��Ϣ�б�
	public function getGoodsList($where='',$order='',$limit=''){
		return $this->logisticsDAO->getGoodsList($where,$order,$limit);
	}
	//����ID��ȡ��Ʒ��Ϣ
	public function getGoodsDetailById($id){
		return $this->logisticsDAO->getGoodsDetailById($id);
	}
	//����goodsNo��ȡ��Ʒ��Ϣ
	public function getGoodsDetailByGoodsNo($goodsNo){
		return $this->logisticsDAO->getGoodsDetailByGoodsNo($goodsNo);
	}
	//=================================��Ӧ����Ʒ������==========================================
	//¼��ԤԼ��Ʒ���
	public function releaseStorage($storage){
		$msg=true;
		$result=$this->logisticsDAO->releaseStorage($storage);
		if($result<=0)$msg='����¼��ʧ�ܣ�';
		return $msg;
	}
	//�޸�����ԤԼ��Ʒ
	public function saveStorage($storage){
		$msg=true;
		$result=$this->logisticsDAO->saveStorage($storage);
		if($result<=0)$msg='�����޸�ʧ�ܣ�';
		return $msg;
	}
	//��ȡ����ԤԼ��Ʒ�б�
	public function getStorageList($where='',$order='',$limit=''){
		return $this->logisticsDAO->getStorageList($where,$order,$limit);
	}
	//����Ӧ�̺����ʱ�����ԤԼ����
	public function getStorageGoodsListBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		return $this->logisticsDAO->getStorageGoodsListBySuppliersNo($suppliersNo,$storageTime,$goodsType);
	}
	//����Ӧ�̺����ʱ�����ԤԼ�ŵ����
	public function getStorageStoresListBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		return $this->logisticsDAO->getStorageStoresListBySuppliersNo($suppliersNo,$storageTime,$goodsType);
	}
	//����Ӧ�̣�ԤԼ�ŵ꣬�����ʱ�����ԤԼ��Ʒ����
	public function getStorageStoresGoodsByStoresNoAndSuppliersNo($storesNo,$suppliersNo,$storageTime,$goodsType){
		return $this->logisticsDAO->getStorageStoresGoodsByStoresNoAndSuppliersNo($storesNo,$suppliersNo,$storageTime,$goodsType);
	}
	//��ȡԤԼ���ܹ�Ӧ���б�
	public function getStorageSuppliersList($storageTime,$goodsType){
		return $this->logisticsDAO->getStorageSuppliersList($storageTime,$goodsType);
	}
	//���ݹ�Ӧ�̻�ȡ�������б� 
	public function getStorageStoragePoBySuppliersNo($suppliersNo,$storageTime,$goodsType){
		return $this->logisticsDAO->getStorageStoragePoBySuppliersNo($suppliersNo,$storageTime,$goodsType);
	}
	//�����ŵ��ȡ���ص���Ϣ�б�
	public function getStorageListByStoresNo($storesNo,$storageTime,$goodsType){
		return $this->logisticsDAO->getStorageListByStoresNo($storesNo,$storageTime,$goodsType);
	}
	//����ID��ȡ����ԤԼ��Ʒ��Ϣ
	public function getStorageDetailById($id){
		return $this->logisticsDAO->getStorageDetailById($id);
	}
	//����IDɾ������ԤԼ��Ʒ��Ϣ
	public function delStorageById($id){
		$msg=true;
		$result=$this->logisticsDAO->delStorageById($id);
		if($result<=0)$msg='����ɾ��ʧ�ܣ�';
		return $msg;
	}
}
?>