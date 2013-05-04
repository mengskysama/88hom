<div class="foot_wrap">
	<span class="a">招商热线：0755-23952323</span>
	<span class="b">
		<a href="<!--{$cfg.web_url}-->about/index.htm">关于我们</a> | 
		<a href="<!--{$cfg.web_url}-->about/sitemap.htm">网站地图</a> | 
		<a href="<!--{$cfg.web_url}-->about/flsm.htm">法律声明</a> | 
		<a href="<!--{$cfg.web_url}-->contact/index.htm">联系我们</a> | 
		<select id="friendliks">
             <option value="" selected="selected">友情链接</option>
             <!--{foreach from=$link key=key item=item}-->
             <!--{if $item.type==1}-->
             <option value="<!--{$item.url}-->"><!--{$item.name}--></option>
             <!--{/if}-->
             <!--{/foreach}-->
        </select>
	</span>
	<span class="c">版权所有&copy; 2013 星河商业地产. 技术支持 <a href="http://web.seo7788.com" target="_blank">城旭网络</a></span>
	<!--js统计代码-->
	<!--{$webset.baiduCountJs}-->
	<!--{$webset.googleCountJs}-->
</div>