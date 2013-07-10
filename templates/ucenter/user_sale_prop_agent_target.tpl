<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>我要求购—委托</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>

<body>
<!--求购头部-->
<!--{include file="$header_ucenter_user"}-->
<!--求购内容-->
<div class="qg_main">
	<!--{include file="$ucenter_user_left_menu"}-->
    <div class="qg_r">
    	<p>你的位置： 我的房不剩房 > <a href="user_sale.php">我要出售</a> > 委托出售房源</p>
        <div class="qgxq">
       		 <b class="wyqg f14 z3"><img src="images/qg_32.jpg">我要求购</b>
             <div class="qgxq44"><span>1.填写委托信</span><span style="color:#FFF">2.选择经纪人</span><span>3.委托发布成功</span></div>
        </div>
        <div class="qgxq2">
       	  <p class="wyqg1"><b>你可以在线委托多个经纪人，请点“立即委托”</b></p>
          <div class="xxjj">
          <form id="searchAgentFrm" name="searchAgentFrm" action="user_sale_prop_agent_target.php" method="post">
          <input type="hidden" id="propId" name="propId" value="<!--{$propId}-->"/>
          	<table width="0" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="125" height="40" align="center" valign="middle">
			    	<select name="company" id="company" class="select2">
			            <option selected="selected" value="0">选择中介公司</option>
			        </select>
			        </td>
			    <td width="125" align="center" valign="middle">
			    <select name="district" id="district" class="select2">
					<option selected="selected" value="0">选择区域</option>
			    </select></td>
			    <td width="220" align="center" valign="middle" class="grzc_37">
			    	<input id="agentName" name="agentName" type="text"  value="搜索小区名，经纪人" />
			    </td>
			    <td width="164" align="left" valign="middle">
			    	<input name="btn_search" type="button" class="mddl3" id="btn_search" value="查询" />
			    </td>
			  </tr>
			</table>
		  </form>
          </div>
          <div class="qgbg_1">
       		<table width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td height="30" colspan="2" align="center" valign="middle" bgcolor="#f7f6f1"><strong>经纪人基本信息</strong></td>
			    <td width="147" align="center" valign="middle" bgcolor="#f7f6f1"><strong>资质/等级</strong></td>
			    <td width="138" align="center" valign="middle" bgcolor="#f7f6f1"><strong>联系方式</strong></td>
			    <td width="98" align="center" valign="middle" bgcolor="#f7f6f1"><strong>在线委托</strong></td>
			  </tr>
			  <tr>
			    <td width="159" height="150" align="center" valign="middle" class="bor"><img src="images/test/cs3.jpg" class="imgs" /></td>
			    <td width="203" align="left" valign="middle" class="bor pj">
			    	<b>南新店</b>
			        <p>所属公司： 中原地产</p>
			        <p>所在区域： 罗湖 - 莲塘</p>
			        <a href="#">大家对我的评价</a>
			    </td>
			    <td align="center" valign="middle" class="bor pj">
			    	 <img src="images/zy.gif" width="25"> <img src="images/sf.gif" width="25"> <img src="images/mp.gif" width="25">
			    </td>
			    <td align="center" valign="middle" class="bor"><strong class="f14 red">13922778899</strong></font></td>
			    <td align="center" valign="middle" class="bor">
			    	<a href="#" class="yz1">立即委托</a>
			    </td>
			  </tr>
			</table>

		</div>
        </div>
             
        </div>
    </div>

<!--求购底部-->
<!--{include file="$footer"}-->
</body>
</html>
