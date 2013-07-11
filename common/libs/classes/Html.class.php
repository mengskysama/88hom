<?php
//html页面js和css加载类
class Html{
	private $tpl='';
	private $jsFiles='';
	private $cssFiles='';
	private $inJsArea = false;
	private $output = '';
	public function __construct($tpl){
		$this->tpl=$tpl;
	}
	public function __set($key,$value){
		$GLOBALS['cfg']['web_page'][$key]=$value;
	}
	public function __get($key){
		return $GLOBALS['cfg']['web_page'][$key];
	}
	public function addJs($file){
		global $cfg;
		$this->jsFiles=$this->jsFiles.'<script language="JavaScript" type="text/javascript" src="'.ECMS_PATH_JS.$file.'"></script>'.$cfg['line_tag'];
	}
	public function addCss($file){
		global $cfg;
		$this->cssFiles=$this->cssFiles.'<link href="'.ECMS_PATH_CSS.$file.'" type="text/css" rel="stylesheet"/>'.$cfg['line_tag'];
	}
	/**
	 * 添加js代码
	 * @param string $jscode js代码
	 * @param bool $end 是否关闭js 代码块
	 * @return void
	 */
	public function js($jscode = NULL, $end = false) {
		
		if (!$this->inJsArea && $jscode) {
			$this->output .= "\n<script language='JavaScript' type='text/javascript'>\n//<![CDATA[\n";
			$this->inJsArea = true;
		}
		if ($jscode==NULL && $this->inJsArea==true) {
			$this->output .= "\n//]]>\n</script>\n";
			$this->inJsArea = false;
		} else {
			$this->output .= "\t$jscode\n";
			if ($end) {
				$this->js();
			}
		}
		return;
	}
	/**
	 * 添加js提示代码
	 * @param string $message 提示内容
	 * @param bool $end 是否关闭js 代码块
	 * @return void
	 */
	public function jsAlert($message, $end = false) {
		$this->js('alert("' . strtr($message, '"', '\\"') . '");', $end);
	}
	/**
	 * 输出html内容
	 * @param bool $print 是否直接输出，可选，默认返回
	 * @return void
	 */
	public function output($print = false) {
		$this->js();
		if ($print) {
			echo $this->output;
			$this->output = '';
			return;
		} else {
			$output = $this->output;
			$this->output = '';
			return $output;
		}
	}
	/**
	 * 转到URL,并提示信息
	 * @param string $url URL
	 * @param string $msg 提示信息
	 * @access public
	 * @return void
	 */
	public function gotoUrl($url, $msg=NULL) {
		if ($msg) {
			$this->jsAlert($msg);
		}
		$this->js('document.location="' . $url . '";');
		$this->output(true);
		exit;
	}
	/**
	 * 转到URL跳出Frame,并提示信息
	 * @param string $url URL
	 * @param string $msg 提示信息
	 * @access public
	 * @return void
	 */
	public function gotoFrame($url, $msg=NULL) {
		if ($msg) {
			$this->jsAlert($msg);
		}
		$this->js('window.top.location.href="' . $url . '";');
		$this->output(true);
		exit;
	}
	/**
	 * replace方式转到URL,并提示信息
	 * @param string $url URL
	 * @param string $msg 提示信息
	 * @access public
	 * @return void
	 */
	public function replaceUrl($url, $msg=NULL) {
		if ($msg) {
			$this->jsAlert($msg);
		}
		$this->js('location.replace("' . $url . '");');
		$this->output(true);
		exit;
	}
	/**
	 * 返回,并提示信息
	 * @param string $msg 提示信息
	 * @access public
	 * @return void
	 */
	public function backUrl($msg){
		if ($msg) {
			$this->jsAlert($msg);
		}
		$this->js('history.back();');
		$this->output(true);
		exit;
	}
	public function show(){
		$this->tpl->assign('jsFiles',$this->jsFiles);
		$this->tpl->assign('cssFiles',$this->cssFiles);
	}
}
?>