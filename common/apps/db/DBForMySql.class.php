<?php
/**
 * MySQL数据库封装类
 *
 * @author David chunliumang@gmail.com
 * @version 1.0
 */

/**
 * DBForMySql 数组库连接类
 * @package db
 */
class DBForMySql {
	/**
	 * 当前连接
	 */
	private $connect		= NULL ;
	
	/**
	 * 数据库名称
	 */
	private $dataBaseName	= '' ; 
	
	/**
	 * 数据库服务器登录密码
	 */
	private $passWord		= '' ; 
	
	/**
	 * 数据库服务器名称或IP
	 */
	private $host			= 'localhost' ;
	
	/**
	 * 数据库服务器登录用户名
	 */
	private $userName		= 'root' ;
	
	/**
	 * 数据库访问类型
	 */
	private $dataType		= '' ;
	
	/**
	 * 数据库访问编码类型
	 */
	private $charSet		= 'utf8' ;
	
	/**
	 * 测试阶段，显示所有错误,具有安全隐患,默认关闭
	 */
	private $errorShow = true; 
	
	/**
	 * 发现错误是否立即终止,默认true,建议不启用，因为当有问题时用户什么也看不到是很苦恼的
	 */
	private $errorStop = false; 
	
	/**
	 * 是否开启错误日志记录，默认开启
	 */
	private $errorWirte = true; 
	
	/**
	 * 错误日志保存位置,目录形式例如：/error/
	 */
	private $errorFile = ECMS_PATH_ERROR;
	
	/**
	 * SQL语句
	 */
	private $sql = ''; 
	
	/**
	 * SQL执行返回的结果标示
	 */
	private $queryId = '';
	
	/**
	 * SQL执行返回的结果
	 */
	private $result = ''; 
	
	/**
	 * 构造函数
	 * @param string $dataType			数据库服务器名称或IP
	 * @param string $dataBaseName		用户名
	 * @param string $coding			数据库编码
	 * @access public
	 */
	public function __construct($host,$userName,$passWord,$dataBaseName,$charSet) {
		$this->host				= $host;
		$this->userName 		= $userName;
		$this->passWord 		= $passWord;
		$this->dataBaseName		= $dataBaseName;
		$this->charSet  		= $charSet;
		$this->connect();
	}
	
	/**
	 * 创建连接
	 * @param string $dataType			数据库服务器名称或IP
	 * @param string $dataBaseName		用户名
	 * @param string $coding			数据库编码
	 * @access public
	 */
	public function connect() {
		if ($this->connect == "pconn") {
			//永久链接
			//echo "永久链接";
			$this->connect = mysql_pconnect($this->host, $this->userName, $this->passWord);
		} else {
			//即时链接
			//echo "即时链接";
			$this->connect = mysql_connect($this->host, $this->userName, $this->passWord);
		}
		if (!mysql_select_db($this->dataBaseName, $this->connect)) {
			if ($this->errorShow) {
				$this->showError("数据库不可用：", $this->dataBaseName);
			}
		}
		$this->setCharacter();
	}
	/**
	 * 设置数据库查询连接编码
	 * @access public
	 */
	public function setCharacter(){
		if(mysql_get_server_info() > '4.1') {
			mysql_query("SET character_set_connection=$this->charSet, character_set_results=$this->charSet, character_set_client=binary");
			if(mysql_get_server_info() > '5.0.1') {
				mysql_query("SET SESSION sql_mode='STRICT_TRANS_TABLES'");
			}
		}else{
			mysql_query("SET NAMES $this->charSet");
		}
	}
	/**
	 * 数据库执行语句，可执行查询添加修改删除等任何sql语句
	 * @param string $sql			SQL语句
	 * @return queryId  返回sql执行结果集标示
	 * @access public
	 */
	public function query($sql) {
		if ($sql == "") {
			$this->showError("SQL语句错误：SQL查询语句为空", $this->sql);
		}
		$this->sql = $sql;
		if (NULL==$this->connect){
			$this->connect();
		}
		$queryId = mysql_query($this->sql, $this->connect);
		if (!$queryId) {
			//调试中使用，sql语句出错时会自动打印出来
			$this->queryId=$queryId;
			if ($this->errorWirte) {
				$this->showError("错误SQL语句：", $this->sql);
			}
		} else {
			$this->queryId = $queryId;
		}
		return $this->queryId;
	}
	/**
     * 通过SQL进行查询输出，输出类型Array
	 * @param string $sql			SQL语句
	 * @return array 返回sql执行结果集标示
	 * @access public
     */
	public function getQueryValue($sql){
		$this->queryId=$this->query($sql);
		$result=@mysql_fetch_array($this->queryId);
		return $result;
	}
	public function getQueryHash($sql){
		$result=array();
		$this->queryId=$this->query($sql);
		$num_rows=@mysql_num_rows($this->queryId);
		for($i=0;$i<$num_rows;$i++){
			$data = $this->fetchRecord($this->queryId);
			$result[$data[0]]=$data[1];
		}
		return $result;
	}
	/**
     * 通过SQL进行查询输出，输出类型Array
	 * @param string $sql			SQL语句
	 * @return array (resultArray) 返回sql执行结果集标示
	 * @access public
     */
	public function getQueryArray($sql){
		$this->queryId=$this->query($sql);
		$num_rows=@mysql_num_rows($this->queryId);
		$resultArray=array();
		for($i=0;$i<$num_rows;$i++){
			$resultArray[$i]=@mysql_fetch_array($this->queryId);
		}
		return $resultArray;
	}
	/**
     * 通过SQL进行增删改操作，输出影像数据数目>=0均为执行成功
     */
	public function getQueryExecute($sql){
		$this->queryId=$this->query($sql);
		$result=mysql_affected_rows($this->connect);
		return $result;
	}
	/**
     * 获取插入数据的自动增长ID号
     */
	public function getInsertNum(){
		$dataSet=$this->query("select LAST_INSERT_ID()");
		$result=$this->fetchRecord($dataSet);
		if($result){
			return $result[0];
		}else{
			return false;
		}
	}
	/**
	 * 将一行的各字段值拆分到一个数组中
	 * @param object $dataSet 结果集
	 * @param integer $resultType 返回类型，OCI_ASSOC、OCI_NUM 或 OCI_BOTH
	 * @return array
	 */
	public function fetchRecord($dataSet=NULL, $resultType=MYSQL_BOTH) {
		return @mysql_fetch_array($dataSet, $resultType);
	}
	/**
	 * 取得字段数量
	 * @param object $dataSet 结果集
	 * @return integer
	 */
	public function getFieldCount($dataSet = NULL) {
		return @mysql_num_fields($dataSet);
	}
	/**
     * 错误输出、错误日志保存
     */
    public function showError($message="",$sql=""){
    	global $cfg;
        if($this->errorShow){
            if(!$sql){
                //非sql语句错误
                echo "错误提示：<font color=\"red\">".$message."</font>"."<br/>";
            }else{
				//sql语句错误
				echo "<div class='mysql_error'>";
                echo "<h3>数据库操作错误提示</h3>";
                echo "<ul><li class='mesage'>".$message."</li>";
                echo "<li class='error' >错误原因：" . mysql_error() . "</li>";
                echo "<li class='sql'><pre>SQL:".$sql."</pre></li></ul></div>";
            }
        }
        if($this->errorWirte){
			//保存错误日期
            $ip=getClinetIP();
            $time=date("Y-m-d H:i:s");
            $message="------------------------".$time.$cfg['line_tag'].$message;
            $message=$message.$cfg['line_tag'].$sql.$cfg['line_tag']."客户端:".$ip.$cfg['line_tag']."时间:".$time.$cfg['line_tag'];
            $filename=date("Y-m-d").".txt";
            $file_dir=str_replace('\\', '/',$this->errorFile);
            $file_path=$file_dir.$filename;
            if(!file_exists($file_dir)){
                if(!mkdir($file_dir)){
                   if($this->errorShow) echo "创建目录".$this->errorFile."失败";
                }
            }
            if(!file_exists($file_path)){
                fopen($file_path,"w+");//创建文件
            }
            if(is_writable($file_path)){
                if(!$handle=fopen($file_path,"a")){
                	if($this->errorShow) echo "不能打开文件".$file_path;
                   	exit;
                }
                if(!fwrite($handle,$message)){
                   	echo $file_path."文件写入失败";
                  	exit;
                }
                fclose($handle);
                    if($this->errorShow) echo "错误日志被保存在".$file_path;
            }else{
                if($this->errorShow) echo "文件".$filename."不可写入";
            }
         	if($this->errorStop) exit;
        }
    }
	/**
     * 返回mysql数据库基本信息
     * 1:服务器信息，2：主机信息，3：协议信息，4：客户端信息
     */
    public function mysql_server($num=''){
        switch ($num){
            case 1:
                return mysql_get_server_info();
                break;
			case 2:
                return mysql_get_host_info();
                break;
            case 3:
                return mysql_get_proto_info();
                break;
            case 4:
                return mysql_get_client_info();
                break;
			default:
                return mysql_get_client_info();
                break;
        }
    }
	
	/**
	 * 开始事务
	 * @access public
	 */
	public function begin() {
		@mysql_query('START TRANSACTION',$this->connect);
	}
	
	/**
	 * 提交事务
	 * @access public
	 */
	public function commit() {
		@mysql_query('COMMIT',$this->connect);
	}
	
	/**
	 * 回滚事务
	 * @access public
	 */
	public function rollback() {
		@mysql_query('ROLLBACK',$this->connect);
	}
	
	/**
	 * 事务结束
	 * @access public
	 */
	public function end() {
		@mysql_query('END',$this->connect);
	}
	
	/**
    * 释放数据库结果集
    */
    public function free(){
        @mysql_free_result($this->queryId);
    }
	
	/**
     * 析构函数、释放结果集关闭连接
     */
    public function __destruct(){
        if(!empty($this->queryId)){
            $this->free();
        }
        @mysql_close($this->connect);
    }
}
?>