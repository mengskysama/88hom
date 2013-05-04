<?php
//htmlҳ��js��css������
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
	 * ���js����
	 * @param string $jscode js����
	 * @param bool $end �Ƿ�ر�js �����
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
	 * ���js��ʾ����
	 * @param string $message ��ʾ����
	 * @param bool $end �Ƿ�ر�js �����
	 * @return void
	 */
	public function jsAlert($message, $end = false) {
		$this->js('alert("' . strtr($message, '"', '\\"') . '");', $end);
	}
	/**
	 * ���html����
	 * @param bool $print �Ƿ�ֱ���������ѡ��Ĭ�Ϸ���
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
	 * ת��URL,����ʾ��Ϣ
	 * @param string $url URL
	 * @param string $msg ��ʾ��Ϣ
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
	 * ת��URL����Frame,����ʾ��Ϣ
	 * @param string $url URL
	 * @param string $msg ��ʾ��Ϣ
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
	 * replace��ʽת��URL,����ʾ��Ϣ
	 * @param string $url URL
	 * @param string $msg ��ʾ��Ϣ
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
	 * ����,����ʾ��Ϣ
	 * @param string $msg ��ʾ��Ϣ
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