<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>短信息-查看信息</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>

<body>
<!--头部-->
<!--{include file="$header"}-->
<!--中间-->
<div class="gr_zj">
	<div class="zl_b">
	  <div class="zl_b1">
	    <div class="zl_nr">
	      <div class="zl_b11">
          <div class="yhzx1">
	        <ul class="zl_dh">
	          <li><a href="#">用户中心</a></li>
	          <li><a href="userinfo.php">个人资料</a></li>
	          <li><a href="secure_reset_password.php">安全中心</a></li>
	          <li><a href="message_inbox.php">短信息中心</a></li>
            </ul>
             <span class="r f14 aqtc"><a href="logout.php">[安全退出]</a></span>
             </div>
	        <div class="zl_nr">
	          <div class="zl_l"> <span>您好，<font class="red"><!--{$userName}--></font></span>
	            <ul class="zlfl1">
                      <li><a href="message_send.php">写短信息</a></li>
                      <li><a href="message_inbox.php">收件箱</a>
	                <ul class="zlfl2">
                      <li><a href="message_inbox.php?type=s">私信</a></li>
                      <li><a href="message_inbox.php?type=x">系统提醒</a></li>
                      <li><a href="message_inbox.php?type=z">站长公告</a></li>
                    </ul>
                  </li>
	              <li><a href="message_outbox.php">发件箱</a></li>
                </ul>
              </div>
	          <div class="zl_r">
	            <div class="xx_r">
	              <div class="sjbt">
	                <h2 class="sj">写信息</h2>
                  </div>
	              <div class="xxnr1">
	              <form name="form1" action="message_detail.php" method="post">
                  		<table width="100%" border="0" cellspacing="0" cellpadding="0">
 							 <tr>
 							   <td width="80" height="60" align="center" valign="middle" class="z14 " style="font-weight:bolder">写信人：</td>
  							   <td class="grzc_31" >
  							   <input type="hidden" name="msg_sender_id" value="<!--{$msg_sender_id}-->">
  							   <input name="msg_sender" type="text" style="color:#F00; font-weight:bolder"  value="<!--{$msg_sender}-->" readonly /></td>
 							 </tr>
 							 <tr>
   								 <td width="80" height="123" align="center" valign="middle" class="z14 " style="font-weight:bolder">内  容:</td>
   							   <td><textarea class="bdqy2" rows="7" cols="100" name="" readonly><!--{$msg_content}--></textarea></td>
 							 </tr>
                              <tr>
   								 <td width="80" align="right" valign="middle" class="z14 " style="font-weight:bolder"></td>
    							 <td><textarea class="bdqy2" rows="7" cols="100" name="sendContent" id="sendContent"></textarea>
    							 <div class="limit">您还可以输入<span class="forange" id="sendContentE">1000</span>字符</div>
    							 </td>
 							 </tr>
 							 <tr>
							     <td width="80" height="60" align="right" valign="middle">&nbsp;</td>
  							   <td><input name="button2" type="submit" class="mddl2" id="button2" value="发送" /></td>
						      </tr>
                               <tr>
							     <td width="80" height="100" align="right" valign="middle">&nbsp;</td>
  							   <td height="100"><p class="z6">说明：<br />
  							     每天可发送20条短消息(您今日已发送<!--{$msg_count_sent}-->条)</p></td>
					      </tr>
						</table>
				  </form>
                  </div>
	              
                </div>
              </div>
            </div>
          </div>
	    </div>
	  </div>
	</div>
</div>
<!--底部-->
<!--{include file="$footer"}-->
</body>
</html>
