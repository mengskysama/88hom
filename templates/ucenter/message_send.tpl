<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>短信息-写信息</title>
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
	          <li><a href="ucenter_user.php">用户中心</a></li>
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
	              <form name="form1" id="form1" action="message_send.php" method="post">
                  		<table width="100%" border="0" cellspacing="0" cellpadding="0">
 							 <tr>
 							   <td width="80" height="60" align="right" valign="middle" class="z14 " style="font-weight:bolder">收件人：</td>
  							   <td class="grzc_31"><input id="toSendName" name="toSendName" type="text"  value="" /></td>
 							 </tr>
 							 <tr>
   								 <td width="80" align="right" valign="middle" class="z14 " style="font-weight:bolder">内  容:</td>
    							 <td><textarea class="bdqy" rows="7" cols="100" name="sendContent" id="sendContent"></textarea>
                                     <div class="limit">您还可以输入<span class="forange" id="sendContentE">1000</span>字符</div>
    							 </td>
 							 </tr>
 							 <tr>
							     <td width="80" height="60" align="right" valign="middle">&nbsp;</td>
  							   <td><input name="btnsendMsg" type="button" class="mddl2" id="btnsendMsg" value="发送" />
                                                <div class="send">
                                                    [按Ctrl+Enter发送]
                                                </div></td>
						      </tr>
                               <tr>
							     <td width="80" height="100" align="right" valign="middle">&nbsp;</td>
  							   <td height="100"><p class="z6">说明：<br />
  							     ①可以用英文状态下的逗号将用户名隔开实现群发，最多5个用户<br />
  							     ②每天可发送20条短消息(您今日已发送<!--{$msg_count_sent}-->条)</p></td>
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

    <script type="text/javascript">
        var second = 3;
        
        $.ajaxSetup({
            beforeSend: function(XMLHttpRequest) {
                if ($(window).data("currentid")) {
                    $("#" + $(window).data("currentid")).data("isdisable", true);
                }
            },
            complete: function() {
                if ($(window).data("currentid")) {
                    $("#" + $(window).data("currentid")).data("isdisable", false);
                    $(window).removeData("currentid");
                }
            }
        });

        function  GatherBtnSend(obj) {
              $(window).data("currentid", obj.id);
            if (!$(obj).data("isdisable")) {
                SendMessageClick();
            }
        }


        $(document).ready(function() {
              $('#btnsendMsg').click(function() {
                    GatherBtnSend(this);
              });
            
            
            $('#wait').ajaxStart(function(){
                 $(this).css({"top":$(window).scrollTop(),"position": "absolute"}).show();
                 }).ajaxStop(function(){
                        $(this).hide();
            });
            
            $("#tipMessage").jqm({ modal: true, overlay: 0 });
            
            $("#showMess").jqm({ modal: true, overlay: 0 });
            
            $("body").keyup(function(event) {
                if (event.ctrlKey && event.keyCode == 13) {
                    GatherBtnSend($('#btnsendMsg'));
                    }
            });
            
           
            $('#toSendName').keydown(function(e) {
                if (e.keyCode == 13) {
                    e.keyCode = 9;
                    return false;
                }
            });
            
            GetSendCount();
            
        });


        //更新发送内容字数
        $('#sendContent').InitFontLength("#sendContentE", 1000);


        //已发送数
        function GetSendCount() {
            var option = { action: "getcount" };
            $.ajax({
                url: "message_handler.php",
                dataType: "json",
                data: option,
                type: "POST",
                success: function(msg) {
                    if (msg) {
                        $('#sendCount').html(msg.result);
                    }
                },
                error: function() {
                    $('#sendCount').val('-');
                }
            });
        }
        //发送信息
        function SendMessageClick() {
        /*
            if('False'=='False')
            {
                ShowAlertMsg('必须通过验证才可以发送短消息!');
                return false;
            }
        */
            var toSendName = document.getElementById('toSendName');
            var sendcontent = $('#sendContent').val();


            if (toSendName.value == '') 
            {
                alert('请输入短消息收件人!');
                return false;
            }

            var namesp = toSendName.value;
            namesp = namesp.replace(/，/g, ",");

            while (namesp.indexOf(',,') > -1) {
                namesp = namesp.replace(/,,/gi, ",");
            }
            if (namesp.indexOf(',') == 0) {
                namesp = namesp.substring(1, namesp.length);
            }
            if (namesp.lastIndexOf(',') == namesp.length - 1) {
                namesp = namesp.substring(0, namesp.length - 1);
            }
            var strs = [];
            strs = namesp.split(',');
            if (strs.length > 5) { 
            	alert('抱歉，系统每次最多发送5人!'); 
            	return false; 
            }

            var i = 0;
            for (i = 0; i < strs.length; i++){
                if (strs[i] == '<!--{$userName}-->'){
                    alert('短消息不能发送给自己!');
                    return false;
                }
            }
            if (sendcontent.replace(/(^\s*)|(\s*$)/g, "").replace('\r\n', "") == '') {
                alert('请输入短消息内容!');
                $('#sendContent').val("");
                return false;
            }

            $(this).data("currentid", "btnsendMsg");
            var option = { action: "sendMessage", toName: escape(namesp), content: escape(sendcontent)};
            $.ajax({
                url: "message_handler.php",
                dataType: "json",
                data: option,
                type: 'post',
                success: function(msg){
                    if (msg != null){
                        if(msg.err=="error"){
                            alert(msg.msg);
                        }else{
                            if (msg.result == "1"){
                                alert("发送成功!");
                                setTimeout(function(){location.reload();},1000);
                            }else{
                                alert(msg.msg);
                            }
                        }
                    }
                },
                error: function() {
                    alert("发送失败!");
                }
            });
        }        
    </script>


<!--底部-->
<!--{include file="$footer"}-->
</body>
</html>
