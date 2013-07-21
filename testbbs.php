<?php
require 'path.inc.php';
	/**
	 * 测试论坛同步
	 * @author Max(maxyellow@vip.qq.com)
     * @since 2013-07-8
	 */
	
	$phpbb=new PHPBB();
	//同步登陆论坛
	$phpbb->forumLogin('admin', 'admin110', $admin = false);
	printf ( '已经同步登陆论坛' );
	//同步退出论坛
	//$phpbb->forumLogout();
	//printf ( '<br/>已经同步退出论坛' );
	//已经同步注册论坛
	//$phpbb->forumRegister('testuser132','testbbs1110','');
	//$phpbb->forumRegister('testuser123','testbbs1110','testuserbbss@vip.qq.com');
	//printf ( '<br/>已经同步注册论坛,空邮箱' );
	//同步删除论坛
	//$phpbb->forumDelete('testuser');
	//printf ( '<br/>已经同步删除论坛');
	//同步修改论坛邮箱和密码
	//$phpbb->forumEdit('cooer520','maxyellow@21cn.com','','');
	//printf ( '<br/>已经同步修改论坛邮箱');
	//$phpbb->forumEdit('testbbs','','1234567','5201314bin');
	//printf ( '<br/>已经同步修改论坛密码');
?>