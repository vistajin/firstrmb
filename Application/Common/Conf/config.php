<?php
return array (

		// 数据库配置信息
		'DB_TYPE' => 'mysql', // 数据库类型
		'DB_HOST' => 'localhost', // 服务器地址
		'DB_NAME' => 'firstrmb', // 数据库名
		'DB_USER' => 'root', // 用户名
		'DB_PWD' => 'dmx88010!', // 密码
		// update user set password=PASSWORD('dmx88010!') where user='root'; 
		// flush privileges;
		// phpmyadmin:
		// C:\wamp\apps\phpmyadmin4.1.14\config.inc.php
		// $cfg['Servers'][$i]['auth_type'] = 'cookie';
		'DB_PORT' => 3306, // 端口
		'DB_PREFIX' => 'firstrmb_', // 数据库表前缀
		'DB_CHARSET' => 'utf8', // 字符集
		'DefaultCharset' => 'utf8',
		'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
		
		'SHOW_PAGE_TRACE' => TRUE,
		//'COMPANY_NAME' => '第一套人民币展销馆'
		'LIST_PAGE_SIZE' => 12,
		'PRODUCT_PAGE_SIZE' => 12
		
		
		// TMPL_PARSE_STRING => array(
		// '__APP_PATH__' => './Application' ,
		// '__UPLOAD__' => '/Public/Uploads/' , // 增加新的上传路径替换规则
		// )
		
		// Auth权限设置,采用系统默认配置Auth.class.php
		// 'AUTH_CONFIG' => array(
		// 'AUTH_ON' => true, // 认证开关
		// 'AUTH_TYPE' => 1, // 认证方式，1为实时认证；2为登录认证。
		// 'AUTH_GROUP' => 'auth_group', // 用户组数据表名
		// 'AUTH_GROUP_ACCESS' => 'auth_group_access', // 用户-用户组关系表
		// 'AUTH_RULE' => 'auth_rule', // 权限规则表
		// 'AUTH_USER' => 'member', // 用户信息表
		// ),
		
// 		// 富文本类别配置
// 		"corpbrief" => "公司简介",
// 		"contactus" => "联系我们",
// 		"position" => "位置信息",
// 		"announcement" => "商城公告",
// 		"activity" => "商城活动",
// 		"freeservice" => "免费服务",
// 		"story" => "商城故事",
// 		"news" => "商城新闻",
		
// 		// 广告
// 		"homeleftads" => "首页左侧广告",
// 		"homerightads" => "首页右侧广告",
// 		"otherleftads" => "其他页左侧广告",
		
// 		// 拍卖
// 		"latestAuction" => "V6竞投会",//"最新拍卖",
// 		"historyAuction" => "历史拍卖",
		
// 		// 物品状态
// 		"goodsStatus" => array (
// 				"可拍卖","拍卖中","已成交","流拍"
// 		),
);