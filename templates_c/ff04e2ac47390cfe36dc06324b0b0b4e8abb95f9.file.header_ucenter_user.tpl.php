<?php /* Smarty version Smarty-3.1.8, created on 2013-06-18 11:34:53
         compiled from "E:/workspace/projects/88hom/templates\ucenter\header_ucenter_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2851751bfd55d35bff6-19549119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff04e2ac47390cfe36dc06324b0b0b4e8abb95f9' => 
    array (
      0 => 'E:/workspace/projects/88hom/templates\\ucenter\\header_ucenter_user.tpl',
      1 => 1371526480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2851751bfd55d35bff6-19549119',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51bfd55d374620_22975751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51bfd55d374620_22975751')) {function content_51bfd55d374620_22975751($_smarty_tpl) {?>
<div class="qg_tb">
	<div class="qg_tb1">
    	<span class="qgtb">
        	<a href="#">房不剩房首页</a> | <a href="#">资讯</a> |  <a href="#">新房</a> <a href="#">二手房</a> <a href="#">租房</a> | <a href="#">装修家居</a> | <a href="#">业主论坛</a>
         </span>
         <div class="logo">
         	<div class="qg_logo">
            	<img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/qg_06.jpg">
            </div>
            <div class="qg_ss">
            	<div class="qg_ssl">
    	<ul class="qg_ssfl z3 f14">
        	<li><a href="#">新房</a></li>
            <li><a href="#">二手房</a></li>
            <li><a href="#">租房</a></li>
            <li><a href="#">家居</a></li>
            <li><a href="#">资讯</a></li>
        </ul>
        <div class="qg_ssk">
        	<span class="qg_ssk1"><input type="text" id="keyWords" value="搜索小区名、中介、经纪人、网店等"/></span>
			<span class="qg_ssk2"><a href="#" title="">搜 索</a></span>
			<div class="qg_ssk3">
						<select>
							<option value="">区域/地铁</option>
						</select>
						<select>
							<option value="">物业类型</option>
							<option value="新房">新房</option>
							<option value="二手房">二手房</option>
						</select>
						<select>
							<option value="">价格范围</option>	
						</select>
                        <span class="qg_zf"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/qg_16.jpg"><a href="#">[地图找房]</a></span>
                        <span class="qg_zf"><img src="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['web_images'];?>
ucenter/qg_19.jpg"><a href="#">[地铁找房]</a></span>
			</div>
        </div>
    </div>
            </div>
         </div>
    </div>
</div><?php }} ?>