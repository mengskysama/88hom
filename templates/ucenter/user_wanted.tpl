<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我要求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}-->_用户中心_房不剩房</title>
<!--{$jsFiles}-->
<!--{$cssFiles}-->
</head>

<body>
<!--我要求购头部-->
<!--{include file="$header_ucenter_user"}-->
<!--我要求购内容-->
<div class="qg_main">
	<!--{include file="$ucenter_user_left_menu"}-->
    <div class="qg_r">
   	  <p>你的位置： <a href="ucenter_user.php"> 我的房不剩房</a> >  <a href="user_wanted.php?wType=<!--{$wType}-->">我要<!--{if $wType==1}-->买<!--{elseif $wType==2}-->租<!--{/if}-->房</a> ><a href="user_wanted.php?wType=<!--{$wType}-->"> 我要求<!--{if $wType==1}-->购<!--{elseif $wType==2}-->租<!--{/if}--></a> </p>
       <div class="qgxq2">
        	<div class="wyqg2">
            	<dl>
             		<dt><a href="user_buy_intermediary.php"><img alt="" src="<!--{$cfg.web_images}-->ucenter/qg_img1.jpg" /></a></dt>
              		  <dd>
   					  <b class="title">委托中介网店找房</b>
                      <p>足不出户，找到你的心水房子，推优中介网店帮您买房！高效、免骚扰。</p>
  					  <p style=" margin-top:15px;"><a href="user_wanted_intermediary.php?wType=<!--{$wType}-->">去委托</a></p>
  					 </dd>
              </dl>
              <dl>
             		<dt><a href="user_buy_person.php"><img alt="" src="<!--{$cfg.web_images}-->ucenter/qg_img2.jpg" /></a></dt>
              		  <dd>
   					  <b class="title">自己直接发布</b>
                      <p>您可以直接发布求购信息，让业主联系您，买房过程，自主掌握。</p>
  					  <p style=" margin-top:15px;"><a href="user_wanted_person.php?wType=<!--{$wType}-->">去发布</a></p>
  					 </dd>
              </dl>
            </div>
      </div>
             
  </div>
    </div>


<!--我要求购底部-->
<!--{include file="$footer"}-->
</body>
</html>
