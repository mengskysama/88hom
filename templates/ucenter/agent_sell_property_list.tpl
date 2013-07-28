<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<!--{$cfg.web_charset}-->" />
<title>管理出售房源</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>

<body>
<!--求购头部-->
<!--{include file="$ucenter_agent_header"}-->
<!--求购内容-->
<div class="qg_main">
	<!--{include file="$ucenter_agent_left_menu"}-->
  	<div class="qg_r">
    <p>你的位置: <a href="#">房源管理</a></p>
   	<div class="qg_bs">
      <div class="bs_tx" style="border:0">
            <p><b>管理出售房源</b></p>
            <div class="bs_tx1">发 布 量：已使用  <!--{$usedLivePropsCount}-->    还可使用<!--{$restLivePropsCount}--><br />               
即将过期房源：<!--{$soonBeExpiredCount}-->  已刷新次数 <a id="d_usedRefreshTimes"><!--{$usedRefreshTimes}--></a> 还可刷新次数 <a id="d_restRefreshTimes"><!--{$restRefreshTimes}--></a></div>
<div style="width:700px; border-bottom:1px solid #ddd">
			<ul style="width:584px; font-size:14px; font-weight:bolder;">
   			 	<li><a href="javascript:void(0)" onclick="gotolink(1)">已发布房源</a></li>
    		    <li><a href="javascript:void(0)" onclick="gotolink(0)">待发布房源(<!--{$unlivePropsCount}-->)</a></li>
     		    <li><a href="javascript:void(0)" onclick="gotolink(3)">已过期房源(<!--{$expiredPropsCount}-->) </a></li>
      		 	<li><a href="javascript:void(0)" onclick="gotolink(4)">违规房源(<!--{$illegalPropsCount}-->)</a></li>
   		  </ul>
          </div>
          <form id="searchFrm" name="searchFrm" action="agent_sell_property_list.php" method="post">
          <div class="sx">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="204" height="38" align="left" valign="middle" class="grzc_32" style="color:#333">房源编号：
			      <input id="propNum" name="propNum" type="text" style="height:20px;" value="<!--{$propNum}-->"/></td>
			    <td width="175" align="center" valign="middle"  class="grzc_36" style="color:#333">价格：
			    <input id="propPriceFrom" name="propPriceFrom" type="text" value="<!--{$propPriceFrom}-->" />—<input id="propPriceTo" name="propPriceTo" type="text" value="<!--{$propPriceTo}-->" />万元</td>
			    <td width="151" align="center" valign="middle"> 户型：
			      <select name="propRoom" id="propRoom">
			        <option <!--{if $propRoom eq 0 }--> selected="selected" <!--{/if}--> value="0">不限</option>
					<option <!--{if $propRoom eq 1 }--> selected="selected" <!--{/if}--> value="1">1室</option>
			        <option <!--{if $propRoom eq 2 }--> selected="selected" <!--{/if}--> value="2">2室</option>
			        <option <!--{if $propRoom eq 3 }--> selected="selected" <!--{/if}--> value="3">3室</option>
			        <option <!--{if $propRoom eq 4 }--> selected="selected" <!--{/if}--> value="4">4室</option>
			        <option <!--{if $propRoom eq 5 }--> selected="selected" <!--{/if}--> value="5">5室</option>
			        <option <!--{if $propRoom eq 99 }--> selected="selected" <!--{/if}--> value="99">5室以上</option>        
			      </select></td>
			    <td width="140" align="center" valign="middle">类型： 
			    <select name="propKind" id="propKind" onchange="gotolink(52)">
			      	<option <!--{if $propKind == "vv" }--> selected="selected" <!--{/if}--> value="vv">不限</option>
					<option <!--{if $propKind == "zz" }--> selected="selected" <!--{/if}--> value="zz">住宅</option>
			        <option <!--{if $propKind == "bs" }--> selected="selected" <!--{/if}--> value="bs">别墅</option>
					<option <!--{if $propKind == "sp" }--> selected="selected" <!--{/if}--> value="sp">商铺</option>
					<option <!--{if $propKind == "xzl" }--> selected="selected" <!--{/if}--> value="xzl">写字楼</option>     
			    </select></td>
			  </tr>
		  </table>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="124" height="38" align="left" valign="middle">
			    <select name="propOrder" id="propOrder" onchange="gotolink(52)">
			      <option <!--{if $propOrder eq 0 }--> selected="selected" <!--{/if}--> value="0">默认排序</option>
				  <option <!--{if $propOrder eq 1 }--> selected="selected" <!--{/if}--> value="1">最后录入时间</option>
			      <option <!--{if $propOrder eq 2 }--> selected="selected" <!--{/if}--> value="2">最早录入时间</option>
			      <option <!--{if $propOrder eq 3 }--> selected="selected" <!--{/if}--> value="3">面积由小到大</option>
			      <option <!--{if $propOrder eq 4 }--> selected="selected" <!--{/if}--> value="4">面积由大到小</option>
			    </select></td>
			    <td width="342" align="left" valign="middle" class="grzc_31" style="color:#333">名称： 
			      <input id="propName" name="propName" type="text" value="<!--{$propName}-->"/></td>
			    <td width="204" colspan="2" align="left" valign="middle"> <a href="javascript:void(0)" onclick="gotolink(50)" class="xx0">搜索</a></td>
			    </tr>
		  </table>
		  </div>
        <div class="glcx">
       	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td width="55" height="50" align="center" valign="middle" bgcolor="#eeece1"><label><input id="checkall" name="checkall" type="checkbox" value="" / >选中</label></td>
			    <td width="225" height="50" align="center" valign="middle" bgcolor="#eeece1">房源基本信息</td>
			    <td width="120" height="50" align="center" valign="middle" bgcolor="#eeece1">最后更新</td>
			    <td width="120" height="50" align="center" valign="middle" bgcolor="#eeece1">录入时间</td>
			    <td width="92" height="50" align="center" valign="middle" bgcolor="#eeece1">浏览次数</td>
			    <td height="50" align="center" valign="middle" bgcolor="#eeece1">房源管理</td>
			  </tr>
		  </table>
		  <table id="prop_table" width="100%" border="0" cellspacing="0" cellpadding="0">
		  
			  <!--{section name=prop loop=$propList}-->
			  <tr>
			    <td width="55" height="80" align="center" valign="middle" class="bor">
			    	<label><input name="" type="checkbox" value="<!--{$propList[prop].propKind}--><!--{$propList[prop].propId}-->" / ></label></td>
			    <td width="225" align="left" valign="middle" class="bor">
			    	<img width="74px" height="58px" src="<!--{$cfg.web_url}-->uploads/<!--{$propList[prop].propPhoto}-->" class="l">
			        <span class="l wz">
			        	名称：<!--{$propList[prop].propName}--><br /> 			        	
					 	<!--{if $propList[prop].propKind eq 'zz' or $propList[prop].propKind eq 'bs'}-->
						户型：<!--{$propList[prop].room}-->室<!--{$propList[prop].hall}-->厅 面积：<!--{$propList[prop].propArea}-->m<sup>2</sup><br />
						单价：<!--{$propList[prop].perPriceArea}-->/m<sup>2</sup><br />
                        <!--{elseif $propList[prop].propKind eq 'xzl' }-->
						售价：<!--{$propList[prop].propPrice}-->元/平方米  面积：<!--{$propList[prop].propArea}-->m<sup>2</sup><br />
                        <!--{else}-->
						售价：<!--{$propList[prop].propPrice}-->万 面积：<!--{$propList[prop].propArea}-->m<sup>2</sup><br />
					 	<!--{/if}-->
			        </span>
			        </td>
			    <td id="t_update_time_<!--{$propList[prop].propKind}-->_<!--{$propList[prop].propId}-->" width="120" align="center" valign="middle" style="line-height:22px;" class="bor"><!--{$propList[prop].updateDate}--><br /><!--{$propList[prop].updateTime}--></td>
			    <td width="120" align="center" valign="middle" class="bor"><!--{$propList[prop].createDate}--><br /><!--{$propList[prop].createTime}--></td>
			    <td width="92" align="center" valign="middle" class="bor"><font class="red"><!--{$propList[prop].hitCount}--></font> 次</td>
			    <td align="center" valign="middle" class="bor">
			    <!--{if $propList[prop].propKind eq 'zz'}-->
			    <a href="agent_sale_zz_edit.php?propId=<!--{$propList[prop].propId}-->">编辑</a>
			    <!--{elseif $propList[prop].propKind eq 'bs'}-->
			    <a href="agent_sale_bs_edit.php?propId=<!--{$propList[prop].propId}-->">编辑</a>
			    <!--{elseif $propList[prop].propKind eq 'sp'}-->
			    <a href="agent_sale_sp_edit.php?propId=<!--{$propList[prop].propId}-->">编辑</a>
			    <!--{elseif $propList[prop].propKind eq 'xzl'}-->
			    <a href="agent_sale_xzl_edit.php?propId=<!--{$propList[prop].propId}-->">编辑</a>
			    <!--{elseif $propList[prop].propKind eq 'gc'}-->
			    <a href="agent_sale_cf_edit.php?propId=<!--{$propList[prop].propId}-->">编辑</a>
			    <!--{/if}-->			    
			     <a href="javascript:void(0);" onclick="deleteProp('<!--{$propList[prop].propKind}--><!--{$propList[prop].propId}-->')">删除</a><br />
				 <!--{if $propList[prop].propState eq 1}-->
			    	<a class="xx0" style="margin:8px 12px;">发布待审核</a>
			     <!--{elseif $propList[prop].propState eq 5}-->
			    	<a href="javascript:void(0)" onclick="refreshProp('<!--{$propList[prop].propKind}-->','<!--{$propList[prop].propId}-->')" class="xx0" style="margin:8px 12px;">刷新</a>
			     <!--{elseif $propList[prop].propState eq 0}-->
			    	<a class="xx0" style="margin:8px 12px;">待发布</a>
			     <!--{/if}-->			    
			    </td>
			  </tr>
			  <!--{/section}-->
			  <tr>
			    <td height="30" align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle">&nbsp;</td>
			    <td align="center" valign="middle"><a href="javascript:void(0);" onclick="DelSelectedProp()" class="xx0" style="margin:8px 12px;">批量删除</a></td>
			  </tr>
		  </table>
		  <div class="page"><!--{$pagination}-->&nbsp;到第<input type="text" id="destNo" name="destNo" value="<!--{$destNo}-->"/>页 <a href="javascript:void(0)" onclick="gotolink(51)" class="next">确定</a>
		  </div>
        </div>
        <input type="hidden" id="pageNo" name="pageNo" value="<!--{$pageNo}-->"/>
        <input type="hidden" id="propState" name="propState" value="<!--{$propState}-->"/>
        </form>
		<div style=" width:680px; padding:35px 15px 20px; line-height:25px; color:#999">
        	房源管理使用说明：<br />
			1.房源一旦删除不能恢复，请慎重使用。<br />
			2.房源取消发布后，房源不在店铺页面以及网站搜索结果中显示，可到待发布房源栏目下重新发布。<br />
			3.房源预约刷新执行后，可以点击刷新栏目下的查看，查看执行情况。<br />
			4.房源预约刷新设置后，将按照端口剩余发布条数进行预约刷新。<br />
			5.房源预约刷新将在设置的时间点之后的五分钟之内执行。<br />
			6.每日房源发布量统计周期为当日的00:00起至次日的00:00，其中00:00~01:00为系统更新时间，不建议这个时间进行刷新以及房源录入等房源发布操作。
        </div>
      </div>
        
    </div>
    </div>
    </div>

<script type="text/javascript">
	
    //页面刷新
    function reflash(){
    	window.location.reload();
	}

    //单击批量删除
    function DelSelectedProp(){
    	
    	if(!confirm("确认删除选中房源？")) return false;
    	
    	
        var proplist = "";
        $("#prop_table input:checked").each(function(){
            proplist += $(this).val()+",";
		});
		
        if(proplist==""){
        	alert("选项不可以为空!");
        	return false;
        }
		
		var option={action:"delProp",propIds:proplist};
        $.ajax({
				url:"property_handler.php",
				dataType:"json",
                data:option,
                type:"post",
                success:function(msg){
					if(msg.result=="success"){
						alert("删除成功!");
                        window.setTimeout(function(){location.reload();}, 1000);
                    }else{
                        alert("删除失败!");
                    }
                },
                error:function(){
					alert("提示:删除失败!");
                }
        })
	}
	
	function gotolink(id){
		if(id >= 0 && id < 5){
			$("#propState").val(id);
			$("#propNum").val("");
			$("#propPriceFrom").val("");
			$("#propPriceTo").val("");
			$("#propRoom").val(0);
			$("#propKind").val("vv");
			$("#propOrder").val(0);
			$("#pageNo").val("");
			$("#propName").val("");
			$("#destNo").val("");
		}else if(id == 51){
			$("#pageNo").val($("#destNo").val());
		}
		$("#searchFrm").submit();		
	}
	
	function gotopage(id){
		$("#pageNo").val(id);
		$("#searchFrm").submit();
	}
</script>
<!--求购底部-->
<!--{include file="$footer"}-->
</body>
</html>
