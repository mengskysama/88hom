<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>委托房源</title>
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
    	<p>你的位置： 我的房不剩房 > 
    	<!--{if $txType eq 1}-->		
    	<a href="user_sale.php">我要出售</a> > 委托出售房源</p>
		<!--{else}-->
    	<a href="user_sale.php">我要出租</a> > 委托出租房源</p>
		<!--{/if}-->
        <div class="qgxq">
       		 <b class="wyqg f14 z3"><img src="<!--{$cfg.web_images}-->ucenter/qg_32.jpg">我要委托</b>
             <div class="qgxq44"><span>1.填写委托信</span><span style="color:#FFF">2.选择经纪人</span></div>
        </div>
        <div class="qgxq2">
       	  <p class="wyqg1"><b>你可以在线委托多个经纪人，请点“立即委托”</b></p>
          <form id="searchAgentFrm" name="searchAgentFrm" action="user_prop_agent_target.php?propId=<!--{$propId}-->&txType=<!--{$txType}-->" method="post">
          <div class="xxjj">
          <input type="hidden" id="propId" name="propId" value="<!--{$propId}-->"/>
          	<table width="0" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="125" height="40" align="center" valign="middle">
			    	<select name="company" id="company" class="select2" onchange="gotolink(52)">			    	
			            <option value="0">选择中介公司</option>
				<!--{foreach from=$companyList item=item key=key}-->
					<!--{if $item.imcpId eq $companyId}-->
			            <option selected="selected" value="<!--{$item.imcpId}-->"><!--{$item.imcpName}--></option>
			        <!--{else}-->
			        	<option value="<!--{$item.imcpId}-->"><!--{$item.imcpName}--></option>
			        <!--{/if}-->
				<!--{/foreach}-->
			        </select>
			        </td>
			    <td width="125" align="center" valign="middle">
			    <select name="district" id="district" class="select2" onchange="gotolink(52)">
					<option value="-1">选择区域</option>
				<!--{foreach from=$districtList item=item key=key}-->
					<!--{if $key eq $districtId}-->
			            <option selected="selected" value="<!--{$key}-->"><!--{$item}--></option>
			        <!--{elseif $item ne "不限"}-->
			        	<option value="<!--{$key}-->"><!--{$item}--></option>
			        <!--{/if}-->
				<!--{/foreach}-->
			    </select></td>
			    <td width="220" align="center" valign="middle" class="grzc_37">
			    	<!--{if $agentName eq ""}-->
			    	<input id="agentName" name="agentName" type="text"  value="搜索经纪人" onfocus="resetEstName()" onblur="resetEstName()"/>
			        <!--{else}-->
			    	<input id="agentName" name="agentName" type="text"  value="<!--{$agentName}-->" />
			        <!--{/if}-->
			    </td>
			    <td width="164" align="left" valign="middle">
			    	<input name="btn_search" type="button" class="mddl3" id="btn_search" onclick="gotolink(52)" value="查询" />
			    </td>
			  </tr>
			</table>
          </div>
          <div class="qgbg_1">
       		<table width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#FFFFFF">
			  <tr>
			    <td height="30" colspan="2" align="center" valign="middle" bgcolor="#f7f6f1"><strong>经纪人基本信息</strong></td>
			    <td width="147" align="center" valign="middle" bgcolor="#f7f6f1"><strong>资质/等级</strong></td>
			    <td width="138" align="center" valign="middle" bgcolor="#f7f6f1"><strong>联系方式</strong></td>
			    <td width="98" align="center" valign="middle" bgcolor="#f7f6f1"><strong>在线委托</strong></td>
			  </tr>
			<!--{foreach from=$agentList item=item key=key}-->
			  <tr>
			    <td width="159" height="150" align="center" valign="middle" class="bor"><img src="<!--{$cfg.web_url}-->uploads/<!--{$item.userdetailPicThumb}-->" class="imgs" /></td>
			    <td width="203" align="left" valign="middle" class="bor pj">
			    	<b><!--{$item.userdetailName}--></b>
			        <p>所属公司： <!--{$item.userdetailImcpName}--></p>
			        <p>所在区域：  <!--{$districtList[$item.userdetailDistrict]}--> - <!--{$areaList[$item.userdetailDistrict][$item.userdetailArea]}--></p>
			        <a href="#">大家对我的评价</a>
			    </td>
			    <td align="center" valign="middle" class="bor pj">
			    <!--{if $item.userdetailCredState == 1 }-->
			    <img src="<!--{$cfg.web_images}-->ucenter/zy.gif" width="25">
			    <!--{/if}-->
			    <!--{if $item.userdetailIdCardState == 1 }-->
			    <img src="<!--{$cfg.web_images}-->ucenter/sf.gif" width="25">
			    <!--{/if}-->
			    <!--{if $item.userdetailCardState == 1 }-->
			    <img src="<!--{$cfg.web_images}-->ucenter/mp.gif" width="25">
			    <!--{/if}-->
			    </td>
			    <td align="center" valign="middle" class="bor"><strong class="f14 red"><!--{$item.userPhone}--></strong></font></td>
			    <td align="center" valign="middle" class="bor">
			    
			    <!--{if $item.isAgent > 0 }-->
			    <a class="yz1">已委托</a>
			    <!--{else}-->
			    <a id="a_agent_<!--{$item.userId}-->" href="javascript:void(0)" onclick="toagent('<!--{$item.userId}-->')" class="yz1">立即委托</a>
			    <!--{/if}-->
			    </td>
			  </tr>
			<!--{/foreach}-->
			</table>

		  </div>
		  <div class="page"><!--{$pagination}-->&nbsp;到第<input type="text" id="destNo" name="destNo" value="<!--{$destNo}-->"/>页 <a href="javascript:void(0)" onclick="gotolink(51)" class="next">确定</a>
		  </div>
        <input type="hidden" id="pageNo" name="pageNo" value="<!--{$pageNo}-->"/>
		</form>
        </div>
             
        </div>
    </div>

<script type="text/javascript">
	function gotolink(id){
		if(id == 51){
			$("#pageNo").val($("#destNo").val());
		}
		if(jQuery.trim($("#agentName").val()) == "搜索经纪人"){
			$("#agentName").val("");
		}
			
		$("#searchAgentFrm").submit();		
	}
	
	function gotopage(id){
		$("#pageNo").val(id);
		if(jQuery.trim($("#agentName").val()) == "搜索经纪人"){
			$("#agentName").val("");
		}
		$("#searchAgentFrm").submit();
	}
	function resetEstName(){
		if(jQuery.trim($("#agentName").val()) == "搜索经纪人"){
			$("#agentName").val("");
		}else if(jQuery.trim($("#agentName").val()) == ""){
			$("#agentName").val("搜索经纪人");
		}
	}
	function searchAgent(){
		if(jQuery.trim($("#agentName").val()) == "搜索经纪人" || jQuery.trim($("#agentName").val()) == ""){
			alert("请填写经纪人名字");
			return false;
		}
		$("#destNo").val("");
		$("#pageNo").val("");
		$("#searchAgentFrm").submit();		
	}
	function toagent(agentId){
		var option={action:"toAgent",propId:$("#propId").val(),agentId:agentId};
        $.ajax({
                    url:"prop_agent_handler.php",
                    dataType:"json",
                    data:option,
                    type:"post",
                    success:function(msg){
                        if(msg.result=="success"){
                            alert("委托成功!");
                            $("#a_agent_"+agentId).html("已委托");
                        }else if(msg.result=="agented"){
                            alert("已委托，无需再委托!");
                        }else{
                            alert("委托失败，请重试!");
                        }
                    },
                    error:function(){
                        alert("委托失败，请重试!");
                    }
		})
	}
</script>
<!--求购底部-->
<!--{include file="$footer"}-->
</body>
</html>
