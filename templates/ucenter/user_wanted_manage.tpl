<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title><!--{if $isIntermediary==1}-->委托<!--{elseif $isIntermediary==2}-->个人<!--{/if}-->求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->信息管理_我要求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->_用户中心_房不剩房</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>

<body>
<!--个人求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->信息管理头部-->
<!--{include file="$header_ucenter_user"}-->
<!--个人求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->信息管理内容-->
<div class="qg_main">
	<!--{include file="$ucenter_user_left_menu"}-->
  <div class="qg_r">
    	<p>你的位置： <a href="ucenter_user.php"> 我的房不剩房</a> >  <a href="user_wanted.php?wType=<!--{$wType}-->">我要<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->房</a> ><a href="javascript:void(0);"> 个人求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->信息管理</a></p>
    <div class="qg_bs">
       		 <b class="wyqg f14 z3"><img src="<!--{$cfg.web_images}-->ucenter/qg_32.jpg"> 管理我的求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->信息</b>
             <div style="width:700px; border-bottom:1px solid #ddd">
			<ul style="width:292px; font-size:14px; font-weight:bolder;">
   			 	<li><a href="user_wanted_manage.php?wType=<!--{$wType}-->&isIntermediary=2">个人求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->信息管理</a></li>
    		    <li><a href="user_wanted_manage.php?wType=<!--{$wType}-->&isIntermediary=1">委托求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->信息管理</a></li>
   		  </ul>
          </div>
        </div>
        <div class="qgxq5">
		  <table width="0" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="96" height="35" align="center" valign="middle" bgcolor="#eeeeee">序号</td>
    <td width="209" height="35" align="left" valign="middle" bgcolor="#eeeeee">内容</td>
    <td width="92" height="35" align="center" valign="middle" bgcolor="#eeeeee">名称</td>
    <td width="109" height="35" align="center" valign="middle" bgcolor="#eeeeee">价格(元) </td>
    <td width="92" height="35" align="center" valign="middle" bgcolor="#eeeeee">发布时间</td>
    <td width="104" height="35" align="center" valign="middle" bgcolor="#eeeeee">操作</td>
  </tr>
  <!--{foreach from=$infoList item=item key=key}-->
  <tr>
    <td width="96" height="60" align="center" valign="middle"><!--{$item.id}--> </td>
    <td width="209" height="60" align="left" valign="middle"><!--{$item.content|truncate:40:"...":true}--></td>
    <td width="92" height="60" align="center" valign="middle"><!--{$item.f_name|truncate:8:"...":true}--></td>
    <td width="109" height="60" align="center" valign="middle"><!--{$item.price}--></td>
    <td width="92" height="60" align="center" valign="middle"> <!--{$item.create_time|date_format:"%Y-%m-%d"}--></td>
    <td width="104" height="60" align="center" valign="middle" class="lj"><a href="user_wanted_modify.php?id=<!--{$item.id}-->">修改</a><a href="user_wanted_detail.php?id=<!--{$item.id}-->"> 浏览</a><br />
      <a href="javascript:if(confirm('数据删除不能恢复')){document.location='do_user_wanted.php?action=delete&wType=<!--{$wType}-->&isIntermediary=<!--{$isIntermediary}-->&id=<!--{$item.id}-->';}">删除</a></a></td>
  </tr>
  	<!--{/foreach}-->
</table>
	<div class="pagingPanel">
		<!--{$divPage}-->
	</div>
    </div>
             
  </div>
    </div>

<!--个人求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->信息管理底部-->
<!--{include file="$footer"}-->
</body>
</html>
