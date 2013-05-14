<?php /* Smarty version Smarty-3.1.8, created on 2013-05-14 15:22:07
         compiled from "E:/workspace/projects/88hom/templates\ucenter\message_send.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4336518dc9762071e4-45403334%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab54820f089f9a4e57f64bf0b0c0269c41b4c2db' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\message_send.tpl',
      1 => 1368516105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4336518dc9762071e4-45403334',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_518dc97628f615_16668015',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518dc97628f615_16668015')) {function content_518dc97628f615_16668015($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>短信息-写信息</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--头部-->
<div class="gr_top">
	<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/grzc_03.jpg" />
    <span><a href="#">房不剩房首页</a> | <a href="#">资讯</a> |  <a href="#">新房</a> <a href="#">二手房</a> <a href="#">租房</a> | <a href="#">装修家居</a> | <a href="#">业主论坛</a></span>
</div>
<!--中间-->
<div class="gr_zj">
	<div class="zl_b">
	  <div class="zl_b1">
	    <div class="zl_nr">
	      <div class="zl_b11">
          <div class="yhzx1">
	        <ul class="zl_dh">
	          <li><a href="userinfo.php">用户中心</a></li>
	          <li><a href="secure_reset_password.php">安全中心</a></li>
	          <li><a href="message_inbox.php">短信息中心</a></li>
            </ul>
             <span class="r f14 aqtc"><a href="logout.php">[安全退出]</a></span>
             </div>
	        <div class="zl_nr">
	          <div class="zl_l"> <span>您好，<font class="red"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</font></span>
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
  							     ②每天可发送20条短消息(您今日已发送0条)</p></td>
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

    <!--发送提示-->
    <div class="tips_div05 jqmWindow" id="showMess" style="width: 240px; margin-left: -120px;
        top: 40%">
        <ul>
            <li class="Rb_3_1">
                <div>
                    <span></span>
                </div>
            </li>
            <li class="Rb_3_2"></li>
            <li class="Rb_3_3"></li>
        </ul>
        <div class="tips_div_content05">
            <div class="editsucBox02">
                <span id="msgClass" class="icon_successSF2 textcenter"></span>
                <h2>
                    发送成功！</h2>
                <div class="clearbth">
                </div>
            </div>
        </div>
        <ul>
            <li class="Rb_3_3"></li>
            <li class="Rb_3_2"></li>
            <li class="Rb_3_1">
                <div>
                    <span></span>
                </div>
            </li>
        </ul>
    </div>
    <!--提示消息栏-->
    <div class="tips_div jqmWindow" id="tipMessage">
        <ul>
            <li class="Rb_3_1">
                <div>
                    <span></span>
                </div>
            </li>
            <li class="Rb_3_2"></li>
            <li class="Rb_3_3"></li>
        </ul>
        <div class="tips_div_content">
            <h2 id="textValue">
            </h2>
            <input type="button" class="but_confirm jqmClose" onclick="document.getElementById('tipMessage').style.display='none'"
                style="cursor: pointer;" />
        </div>
        <ul>
            <li class="Rb_3_3"></li>
            <li class="Rb_3_2"></li>
            <li class="Rb_3_1">
                <div>
                    <span></span>
                </div>
            </li>
        </ul>
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
                ShowAlertMsg('请输入短消息收件人!');
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
            if (strs.length > 5) { ShowAlertMsg('抱歉，系统每次最多发送5人!'); return false; }

            var i = 0;
            for (i = 0; i < strs.length; i++){
                if (strs[i] == '<?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
'){
                    ShowAlertMsg('短消息不能发送给自己!');
                    return false;
                }
            }
            if (sendcontent.replace(/(^\s*)|(\s*$)/g, "").replace('\r\n', "") == '') {
                ShowAlertMsg('请输入短消息内容!');
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
                            ShowAlertMsg(msg.msg);
                        }else{
                            if (msg.result == "1"){
                                ShowAlert("icon_successSF2 textcenter","发送成功!");
                                $("#toSendName").val("");
                                $("#sendContent").val("");
                                setTimeout(function(){location.reload();},1000);
                            }
                            else{
                                ShowAlert("icon_crySF2",msg.msg);
                            }
                        }
                    }
                },
                error: function() {
                    ShowAlert("icon_failed2 textcenter","发送失败!");
                }
            });
        }
        //提示窗口
        function ShowAlert(msgclass,msg){
            $('#msgClass').attr("class",msgclass);
            $('#showMess h2').html(msg);
            $('#showMess h1').html(msg);
            if(msgclass=='icon_crySF2'){
                var h = $('#showMess h2');
                h.replaceWith('<h1>' + msg + '</h1>');
            }else{
                var h = $('#showMess h1');
                h.replaceWith('<h2>' + msg + '</h2>');
            }
            $('#showMess').show();
            window.setTimeout(function(){$('#showMess').hide()}, 1000);
        }
        function ShowAlertMsg(msg){
            $('#textValue').html(msg);
            $('#tipMessage').jqmShow();
        }
        
    </script>


<!--底部-->
<div class="gr_bot">
	<div class="gr_bot1">
		<div class="c">
					<div class="c1">
						<a href="#">今日头条</a>
						<a href="#">楼市要闻</a><br/>
						<a href="#">政策解读</a>
						<a href="#">行情数据</a>
					</div>
					<div class="s"></div>
					<div class="c2">
						<a href="#">最新开盘</a>
						<a href="#">热门楼盘</a><br/>
						<a href="#">优惠团购</a>
						<a href="#">地图看房</a>
					</div>
					<div class="s"></div>
					<div class="c2">
						<a href="#">设计修饰</a>
						<a href="#">促销团购</a><br/>
						<a href="#">家具卖场</a>
						<a href="#">装修指南</a>
					</div>
                    <div class="s"></div>
					<div class="c3">
						<a href="#">设计修饰</a>
						<a href="#">促销团购</a><br/>
						<a href="#">家具卖场</a>
						<a href="#">装修指南</a>
					</div>
					<div class="s"></div>
					<div class="c4">
						<a href="#">业主论坛</a>
						<a href="#">论坛热贴</a><br/>
						<a href="#">人气板块</a>
					</div>
				</div>
             <div class="gr_bot2">
             广告投放：0755-88886666  投诉邮箱：tousu@tianyue.com  投诉电话：400-6666-888<br/>
				版权所有2013-2016 房不剩房 天境文化传播有限公司 备粤10110011号 
             </div>
		</div>
	</div>
</body>
</html>
<?php }} ?>