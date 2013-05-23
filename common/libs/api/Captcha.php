<?php  
/* 
 *  $Captcha = new Captcha(); 
 *  //exit($Captcha->get_checkcode()); 
 *  $Captcha->set_checkimage_wh(60, 20); 
 *  $Captcha->out_checkimage(); 
 */  
  
class Captcha {  
    private $mCheckMode = 'number';     //验证模式：'number': 数字 'add': 加法  
    private $mCheckCodeNum = 4;         //验证码位数  
  
    private $mCheckCode = '';           //产生的验证码  
    private $mCheckResult = '';         //加法运算后的答案  
  
    private $mCheckImage = '';          //验证码的图片  
    private $mDisturbColor = '';        //干扰像素  
    private $mCheckImageWidth = '60';   //验证码的图片宽度  
    private $mCheckImageHeight = '20';  //验证码的图片宽度  
  
  
    /** 
     * @brief 构造函数 生成验证码 
     */  
    public function __construct($mode="number") {  
        $this->mCheckMode = $mode;  
        $this->create_checkcode();  
    }  
  
  
    /** 
     * @brief 设置验证码图片的大小 
     * @param  $width 宽 
     * @param  $height 高 
     */  
    public function set_checkimage_wh($width, $height)  {  
        if ($width == '' || $height == '')return false;  
        $this->mCheckImageWidth = $width;  
        $this->mCheckImageHeight = $height;  
        return true;  
    }  
  
  
    /** 
     * @brief 设置验证码位数 
     * @param  $num 位数 
     */  
    public function set_checkcode_num($num) {  
        if ($num == '')return false;  
        $this->mCheckCodeNum = $num;  
        return true;  
    }  
  
  
    /** 
     * @brief 取得验证码 
     */  
    public function get_checkcode() {  
        return $this->mCheckCode;  
    }  
  
  
    /** 
     * @brief 取得验证运算结果 
     */  
    public function get_checkresult() {  
        return $this->mCheckResult;  
    }  
  
  
    /** 
     * @brief 输出验证码图片 
     */  
    public function out_checkimage() {  
        $this->out_fileheader();  
        $this->create_image();  
        $this->set_disturb_color();  
        $this->write_checkcode_to_image();  
        imagepng($this->mCheckImage);  
        imagedestroy($this->mCheckImage);  
    }  
  
  
    /** 
     * @brief 输出头 
     */  
    private function out_fileheader() {  
        header ("Content-type: image/png");  
    }  
  
  
    /** 
     * @brief 产生验证码 
     */  
    private function create_checkcode() {  
        if($this->mCheckMode == 'number') {  
            $this->mCheckCode = strtoupper(substr(md5(rand()), 0, $this->mCheckCodeNum));  
        } else {  
            $num1 = rand(10, 49);  
            $num2 = rand(10, 49);  
            $this->mCheckResult = $num1 + $num2;  
            $this->mCheckCode = $num1 .'+'. $num2 .'=';  
            $this->set_checkcode_num(strlen($this->mCheckCode));  
        }  
        return $this->mCheckCode;  
    }  
  
  
    /** 
     * @brief 产生验证码图片 
     */  
    private function create_image() {  
        $this->mCheckImage = @imagecreate ($this->mCheckImageWidth, $this->mCheckImageHeight);  
        $bgcolor = imagecolorallocate ($this->mCheckImage, 245,245,245);     //背景色  
        $iborder = imagecolorallocate ($this->mCheckImage, 206,206,206);     //边框色  
        imagerectangle($this->mCheckImage, 0, 0, $this->mCheckImageWidth-1, $this->mCheckImageHeight-1, $iborder);  
        return $this->mCheckImage;  
    }  
  
  
    /** 
     * @brief 设置图片的干扰像素 
     */  
    private function set_disturb_color() {  
        for ($i = 0;$i <= 128;$i++) {  
            $this->mDisturbColor = imagecolorallocate ($this->mCheckImage, rand(0, 255), rand(0, 255), rand(0, 255));  
            imagesetpixel($this->mCheckImage, rand(2, 128), rand(2, 38), $this->mDisturbColor);  
        }  
    }  
  
  
    /** 
     * @brief 在验证码图片上逐个画上验证码 
     */  
    private function write_checkcode_to_image() {  
        for ($i = 0;$i <= $this->mCheckCodeNum;$i++) {  
            $bg_color = imagecolorallocate ($this->mCheckImage, rand(0, 255), rand(0, 128), rand(0, 255));  
            $x = floor($this->mCheckImageWidth / $this->mCheckCodeNum) * $i + 3;  
            $y = rand(0, $this->mCheckImageHeight-15);  
            imagechar ($this->mCheckImage, 5, $x, $y, $this->mCheckCode[$i], $bg_color);  
        }  
    }  
  
}  