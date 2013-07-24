<?php /* Smarty version Smarty-3.1.8, created on 2013-07-24 23:08:22
         compiled from "E:/workplace/phpprojects/88hom/templates\ucenter\message_outbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2397651ce9af93b2062-24036616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '839ea408f454c058ea16c82b89365e399bd7e4f7' => 
    array (
      0 => 'E:/workplace/phpprojects/88hom/templates\\ucenter\\message_outbox.tpl',
      1 => 1373354854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2397651ce9af93b2062-24036616',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51ce9af94a40f2_28879248',
  'variables' => 
  array (
    'cfg' => 0,
    'jsFiles' => 0,
    'cssFiles' => 0,
    'userName' => 0,
    'pagination' => 0,
    'messageList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ce9af94a40f2_28879248')) {function content_51ce9af94a40f2_28879248($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_charset'];?>
" />
<title>短信息</title>
<?php echo $_smarty_tpl->tpl_vars['jsFiles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['cssFiles']->value;?>

</head>

<body>
<!--头部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--中间-->
<div class="gr_zj">
	<div class="zl_b">
    	<div class="zl_b1">
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
            	<div class="zl_l">
                	<span>您好，<font class="red"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
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
						<h2 class="sj">发件箱</h2>
				  </div>
                    <div class="sjxz">
                    	<div class="l" style="line-height:27px; margin-top:8px; height:27px;">
                        	<label>
                               	<input type="checkbox" id="checkall" value="all" name="checkall">
                            </label>
                            <a href="javascript:" id="delUp" >删除</a>
                        </div>
                        <div class="r">
                        	<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

                        </div>
                    </div>
                    <div class="xxnr">
						<table id="msg_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom: #d6d6d6 solid 1px;">
  							<tr>
 							   <td width="35" height="40" align="center" valign="middle">&nbsp;</td>
						      <td width="35" align="left" valign="middle">状态</td>
 							   <td width="165" align="left" valign="middle">收件人</td>
 							   <td width="410" align="left" valign="middle">消息 </td>
  							  <td align="left" valign="middle">日期</td>
 						 </tr>
 						 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['message'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['message']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['name'] = 'message';
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['messageList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['message']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['message']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['message']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['message']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['message']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['message']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['message']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['message']['total']);
?>
						 <tr>
   							 <td width="35" height="40" align="center" valign="middle">
                           		  <label><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['messageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['message']['index']]['messageId'];?>
" ></label>
                            </td>
					 	   <td width="35" align="center" valign="middle">
                           		<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/xx_11.jpg">
                           </td>
 							  <td width="165" align="left" valign="middle">
                              	<a href="#"><?php echo $_smarty_tpl->tpl_vars['messageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['message']['index']]['receiver'];?>
</a>
                              </td>
   							 <td width="410" align="left" valign="middle">
                             	<a href="message_detail.php?msgid=<?php echo $_smarty_tpl->tpl_vars['messageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['message']['index']]['messageId'];?>
"><?php echo $_smarty_tpl->tpl_vars['messageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['message']['index']]['messageContent'];?>
</a>
                            </td>
						    <td align="left" valign="middle"><?php echo $_smarty_tpl->tpl_vars['messageList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['message']['index']]['sentTime'];?>
</td>
 						 </tr>
 						 <?php endfor; endif; ?>
					</table>

                  </div>
                  <div class="sjxz">
                    	<div class="l" style="margin-top:10px; height:20px; line-height:20px;">
                        	<label>
                               	<input type="checkbox" id="checkalldown" value="all2" name="iptckb">
                            </label>
                           <a href="javascript:" id="delDown">删除</a>
                        </div>
                        <div class="r">
                        	<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

                        </div>
                  </div>
                  </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

    <div class="sysmsg jqmWindow" id="sureDelSelect" style="display: none">
        <div class="tips_div">
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
                <h2>
                    确定删除选中会话？</h2>
                <input type="button" class="but_confirm" onclick="DelSelectedMessage()" />
                <input type="button" class="but_cancel" onclick="$('#sureDelSelect').jqmHide();" />
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
    </div>
    <!--删除提示-->
    <div class="tips_div05 jqmWindow"id="showMess" style="width:240px;margin-left:-120px;top:40%">
          <ul>
            <li class="Rb_3_1">
              <div><span></span></div>
            </li>
            <li class="Rb_3_2"></li>
            <li class="Rb_3_3"></li>
          </ul>
          <div class="tips_div_content05">
            <div class="editsucBox02">
            <span  id="msgClass" class="icon_successSF2 textcenter"></span>
              <h2>删除成功！</h2>
              <div class="clearbth"></div>
            </div>
          </div>
          <ul>
            <li class="Rb_3_3"></li>
            <li class="Rb_3_2"></li>
            <li class="Rb_3_1">
              <div><span></span></div>
            </li>
          </ul>
    </div>

<script type="text/javascript">
	$(document).ready(function() {
	
		$("#sureDelSelect").jqm({ modal: true, overlay: 0 });
        $("#showMess").jqm({ modal: true, overlay: 0 });
        
        $('#wait').ajaxStart(function(){
                 $(this).css({"top":$(window).scrollTop(),"position": "absolute"}).show();
                 }).ajaxStop(function(){
                        $(this).hide();
        });
    
        $("#msg_table a").each(function(){
        	if($(this).attr("link")=="true"){
            	$(this).click(function(){
                	var msgid=$(this).attr("msgid");
                    var isread=$(this).attr('isread');
                    if(isread!="1"){
                    	ReadSend(msgid);
                        $(this).closest("td").removeClass("fontBold");
                        var tdlist=$(this).closest("tr").find("td");//当前信息所在的行
                        tdlist.eq(1).find("span").attr('class','icon_unCheck');
                        tdlist.eq(2).removeClass("fontBold");
                        $(this).attr('isread',"1");
                    }
                });
            }
        });
        $("#msg_table input[type='checkbox']").each(function(){
        	$(this).click(function(){
            	var isDelOk=false;
                $("#msg_table input[type='checkbox']").each(function(){
                	if($(this).attr("checked")){
                    	isDelOk=true;
                        $(this).closest("tr").addClass("checked");
                    }else{
                    	$(this).closest("tr").removeClass("checked");
                   	}
                });
                if(isDelOk){
                	$('#delDown,#delUp').click(function(){
                    	$('#sureDelSelect').jqmShow();
                    });
                    $('#delDown,#delUp').css({"color":"","cursor":'pointer'});
                }else{
                	$('#delDown,#delUp').css({"color":"gray","cursor":''}).unbind("click");
                }
           });
      	});
        $("#checkall,#checkalldown").click(function(){
        	var ischecked = this.checked;
            if(!ischecked){
            	$('#delDown,#delUp').css({"color":"gray","cursor":''}).unbind("click");
            }else{
            	$('#delDown,#delUp').click(function(){
                	$('#sureDelSelect').jqmShow();
                });
                $('#delDown,#delUp').css({"color":"","cursor":'pointer'});
            }
            $("#msg_table input[type='checkbox'],#checkalldown,#checkall").each(function(){
            	this.checked = ischecked;
                if(ischecked){
                	$(this).closest("tr").addClass("checked");
                }else{
                	$(this).closest("tr").removeClass("checked");
                }
                $(this).click(function(){
                	if(!this.checked){
                    	$('#checkall').get(0).checked=false;
                        $('#checkalldown').get(0).checked=false;
                    }
                });
            });
		});
        $("body input[type='checkbox']").each(function(){
        	this.checked=false;
        });
	});
    //页面刷新
    function reflash(){
    	window.location.reload();
	}
    //设为已读
    function ReadSend(msgid){
        var option={action:"read",messageId:msgid};
           $.ajax({
               url:"message_handler.php",
               dataType:"json",
               data:option,
               type: "POST", 
               success:function(msg){
               }   
         });       
    }
    //单击删除
    function DelSelectedMessage(){
    	$("#sureDelSelect").jqmHide();
        var msglist = "";
        var parentlist = "";
        var msgisnull="";
        var parisnull="";
        var r1= /^[1-9]+[0-9]*$/
        $("#msg_table input:checked").each(function(){
        	var ismessage = $(this).attr("ismessage");
            if(ismessage=="1"){
            	if(r1.test($(this).val())){
                	msglist+=$(this).val()+",";
                    msgisnull+="-";
                }
            }else{
            	if($(this).attr("parentid")>0){
                	parentlist+=$(this).attr("parentid")+',';
                    parisnull+="-"
                }else{
                	msglist+=$(this).val()+",";
                    msgisnull+="-";
                }
            }
		});
		
        if(msgisnull==""&&parisnull==""){
        	ShowAlert('icon_crySF2',"选项不可以为空!");
        }else{
        	var option={action:"DelSelectedMessage",msgids:msglist,type:"o"};
            $.ajax({
                    url:"message_handler.php",
                    dataType:"json",
                    data:option,
                    type:"post",
                    success:function(msg){
                        if(msg.result=="success"){
                            ShowAlert('icon_successSF2 textcenter',"删除成功!");
                            window.setTimeout(function(){location.reload();}, 1000);
                        }else{
                            ShowAlert('icon_failed2 textcenter',"删除失败!");
                        }
                    },
                    error:function(){
                        ShowAlert('icon_failed2 textcenter',"提示:删除失败!");
                    }
            })
		}
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
</script>

<!--底部-->
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>