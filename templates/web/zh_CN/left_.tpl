<div class="left">
	<div class="menu">
		<ul>
			<li>
				<a href="<!--{$cfg.web_url}-->index.htm">星河首页</a>
			</li>
		</ul>
		<div class="split"></div>
		<div class="navigation_vert">
			<ul>
				<li>
					<a href="<!--{$cfg.web_url}-->about/index.htm" class="<!--{$aboutClass}-->">关于我们</a>
					<div class="dropdown">
						<!--{foreach from=$aboutNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->about/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
						<a target="_blank" href="http://www.chngalaxy.com/GalaxyHuman.aspx">《星河人》内刊</a>
					</div>
				</li>
				<li>
					<a href="<!--{$cfg.web_url}-->business/index.htm" class="<!--{$businessClass}-->">核心业务</a>
					<div class="dropdown">
						<!--{foreach from=$businessNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->business/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
					</div>
				</li>
				<li>
					<a href="<!--{$cfg.web_url}-->project/index_all.htm" class="<!--{$projectClass}-->">项目概览</a>
					<div class="dropdown">
						<!--{foreach from=$projectNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->project/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
					</div>
				</li>
				<li>
					<a href="<!--{$cfg.web_url}-->news/index.htm" class="<!--{$newsClass}-->">新闻中心</a>
					<div class="dropdown">
						<!--{foreach from=$newsNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->news/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
					</div>
				</li>
				<li>
					<a href="<!--{$cfg.web_url}-->service/index.htm" class="<!--{$serviceClass}-->">客户服务</a>
					<div class="dropdown">
						<a target="_blank" href="http://www.galaxyvipclub.com">GCLUB</a><br/>
						<!--{foreach from=$serviceNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->service/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
					</div>
				</li>
				</ul>
		</div>
		<div class="split"></div>
		<div class="navigation_vert">
			<ul>
				<li>
					<a href="<!--{$cfg.web_url}-->job/index.htm" class="<!--{$jobClass}-->">人力资源</a>
					<div class="dropdown">
						<!--{foreach from=$jobNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->job/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
						<a href="<!--{$cfg.web_url}-->job/jobs.htm">人才招聘</a>
					</div>
				</li>
				<li>
					<a href="<!--{$cfg.web_url}-->contact/index.htm" class="<!--{$contactClass}-->">联系我们</a>
					<div class="dropdown">
						<!--{foreach from=$contactNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->contact/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>