<div class="left">
	<div class="menu">
		<ul>
			<li>
				<a href="<!--{$cfg.web_url}-->index.htm">�Ǻ���ҳ</a>
			</li>
		</ul>
		<div class="split"></div>
		<div class="navigation_vert">
			<ul>
				<li>
					<a href="<!--{$cfg.web_url}-->about/index.htm" class="<!--{$aboutClass}-->">��������</a>
					<div class="dropdown">
						<!--{foreach from=$aboutNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->about/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
						<a target="_blank" href="http://www.chngalaxy.com/GalaxyHuman.aspx">���Ǻ��ˡ��ڿ�</a>
					</div>
				</li>
				<li>
					<a href="<!--{$cfg.web_url}-->business/index.htm" class="<!--{$businessClass}-->">����ҵ��</a>
					<div class="dropdown">
						<!--{foreach from=$businessNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->business/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
					</div>
				</li>
				<li>
					<a href="<!--{$cfg.web_url}-->project/index_all.htm" class="<!--{$projectClass}-->">��Ŀ����</a>
					<div class="dropdown">
						<!--{foreach from=$projectNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->project/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
					</div>
				</li>
				<li>
					<a href="<!--{$cfg.web_url}-->news/index.htm" class="<!--{$newsClass}-->">��������</a>
					<div class="dropdown">
						<!--{foreach from=$newsNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->news/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
					</div>
				</li>
				<li>
					<a href="<!--{$cfg.web_url}-->service/index.htm" class="<!--{$serviceClass}-->">�ͻ�����</a>
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
					<a href="<!--{$cfg.web_url}-->job/index.htm" class="<!--{$jobClass}-->">������Դ</a>
					<div class="dropdown">
						<!--{foreach from=$jobNavList key=key item=item}-->
						<a href="<!--{$cfg.web_url}-->job/index-<!--{$key}-->.htm"><!--{$item}--></a><br/>
						<!--{/foreach}-->
						<a href="<!--{$cfg.web_url}-->job/jobs.htm">�˲���Ƹ</a>
					</div>
				</li>
				<li>
					<a href="<!--{$cfg.web_url}-->contact/index.htm" class="<!--{$contactClass}-->">��ϵ����</a>
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