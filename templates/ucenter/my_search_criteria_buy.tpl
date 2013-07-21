<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的找房条件_用户中心_房不剩房</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>

<body>
<!--我的找房条件头部-->
<!--{include file="$header_ucenter_user"}-->
<!--我的找房条件内容-->
<div class="qg_main">
<!--{include file="$ucenter_user_left_menu"}-->
    <div class="qg_r">
    	<p>你的位置： 我的房不剩房 > <a href="#">我要买房</a> > <a href="#">我的找房条件</a></p>
        <div class="qgxq">
       		 <b class="wyqg f14 z3"><img src="<!--{$cfg.web_images}-->ucenter/qg_32.jpg"> 编辑我的找房条件</b>
             <div class="qgxq3"><span style="color:#FFF">1.设置房源条件</span><span>2.定制成功</span></div>
        </div>
        <div class="qgxq2">
       	  <p class="wyqg1"><b class="z14">基本资料</b><font class="red">*</font>为必填项</p>
              <table width="680" height="251" border="0" cellpadding="0" cellspacing="0" class="mt10">
                  <tr>
                      <td width="70">房屋类型：</td>
                      <td width="270"><select name="select" id="select"><option value="1">住宅</option></select></td>
                      <td width="55">租金：</td>
                      <td width="285"><select name="select5" id="select5">
                        <option value="1">100以下</option>
                      </select>
                        (万元/套)</td>
                  </tr>
                  <tr>
                      <td>区域：</td>
                      <td colspan="3"><select name="select2" id="select2"><option value="1">罗湖</option></select> <select name="select3" id="select3"><option value="1">东门</option></select></td>
                  </tr>
                  <tr>
                      <td>户型：</td>
                      <td><select name="select4" id="select4"><option value="1">三居</option></select></td>
                      <td>面积：</td>
                      <td><select name="select6" id="select6">
                        <option value="1">50-70平米</option>
                      </select></td>
                  </tr>
                  <tr>
                      <td><span class="red">*</span> 验证码：</td>
                      <td colspan="3"><input name="" type="text"  value="" class="input01" /> 看不清？<span class="blue"><a href="#">换一个</a></span></td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td colspan="3">输入下图中的字符<br><img src="<!--{$cfg.web_images}-->ucenter/yz.jpg"></td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td colspan="3"><input name="button2" type="submit" class="denglu1 l" id="button2" value="下一步" /></td>
                  </tr>
              </table>
        	</div>
        </div>
    </div>

<!--我的找房条件底部-->
<!--{include file="$footer"}-->
</body>
</html>
