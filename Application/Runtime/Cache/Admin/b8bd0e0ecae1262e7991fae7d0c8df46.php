<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link href="/firstrmb/Public/images/band.jpg" rel="shortcut icon">
<link href="/firstrmb/Public/bui/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="/firstrmb/Public/bui/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="/firstrmb/Public/bui/assets/css/main-min.css" rel="stylesheet" type="text/css" />
<script src="/firstrmb/Public/bui/assets/js/jquery-1.8.1.min.js"></script>
<script src="/firstrmb/Public/bui/assets/js/bui-min.js"></script>
<script src="/firstrmb/Public/bui/assets/js/common/main-min.js"></script>
<script src="/firstrmb/Public/bui/assets/js/config-min.js"></script>
<title><?php echo (session('company_name')); ?> - 后台管理系统</title>
</head>
<body>
	<div class="header">
		<div class="dl-title">
			<span class="lp-title-port"><?php echo (session('company_name')); ?> - 后台管理系统</span>
		</div>
		<div class="dl-log">
			<?php echo (date('Y年m月d日',(isset($data["time"]) && ($data["time"] !== ""))?($data["time"]):time())); ?> 欢迎您，<span class="dl-log-user"><?php echo ($_SESSION['user_auth']['display_name']); ?></span>
			<a href="/firstrmb/Admin/Login/logout" title="退出系统" class="dl-log-quit">[退出]</a>
		</div>
	</div>
	<div class="content">
		<div class="dl-main-nav">
			<div class="dl-inform">
				<div class="dl-inform-title">
					<s class="dl-inform-icon dl-up"></s>
				</div>
			</div>
			<ul id="J_Nav" class="nav-list ks-clear">
				<li class="nav-item dl-selected">
					<div class="nav-item-inner nav-home">首页管理</div>
				</li>
				<li class="nav-item">
					<div class="nav-item-inner nav-sample">关于我们</div>
				</li>
				<li class="nav-item">
					<div class="nav-item-inner nav-supplier">新闻动态</div>
				</li>
				<li class="nav-item">
					<div class="nav-item-inner nav-supplier">出售目录</div>
				</li>
				<li class="nav-item">
					<div class="nav-item-inner nav-supplier">藏品求购</div>
				</li>
				<li class="nav-item">
					<div class="nav-item-inner nav-supplier">票券概述</div>
				</li>
				<li class="nav-item">
					<div class="nav-item-inner nav-supplier">正票版别</div>
				</li>
				<li class="nav-item">
					<div class="nav-item-inner nav-supplier">样票版别</div>
				</li>
				<?php if($_SESSION['firstrmb_user_auth']['user_group']== 1): ?><li class="nav-item">
						<div class="nav-item-inner nav-supplier">用户管理</div>
					</li><?php endif; ?>
			</ul>
		</div>

		<ul id="J_NavContent" class="dl-tab-content"></ul>
	</div>
	
	<script>
		BUI.use('common/main', function() {
			var config = [ {
				id : 'homeMaint',
				homePage : 'basic_info',
				menu : [ {
					text : '首页管理',
					items : [ {
						id : 'basic_info',
						text : '基本信息',
						href : '/firstrmb/Admin/HomeMaint/editBasicInfo'
					},{
						id : 'homeslide',
						text : '首页幻灯片',
						href : '/firstrmb/Admin/HomeMaint/slideList'
					},{
						id : 'basic_info',
						text : '友情链接',
						href : '/firstrmb/Admin/HomeMaint/friendLinkList'
					}/*,{						
						id : 'quickLinkInHomeMaint',
						text : '快速链接',
						href : '/firstrmb/Admin/RichEdit/getList/category/quickLinkInHome'						
					}*/]
				}]
			}, {
				id : 'aboutUs',
				homePage : 'corpbrief',
				menu : [ {
					text : '关于我们',
					items : [{
						id : 'aboutUsSimple',
						text : '关于我们',
						href : '/firstrmb/Admin/RichEdit/editSimpleRichText/category/aboutUs'
					},{
						id : 'corpbrief',
						text : '公司简介',
						href : '/firstrmb/Admin/RichEdit/editSimpleRichText/category/corpbrief'
					},{
						id : 'contactus',
						text : '联系我们',
						href : '/firstrmb/Admin/RichEdit/editSimpleRichText/category/contactus'
					},{
						id : 'contactusSimple',
						text : '联系我们(简版)',
						href : '/firstrmb/Admin/RichEdit/editSimpleRichText/category/contactusSimple'
					}]
				}]
			}, {
				id : 'activity',
				homePage : 'activityMaint',
				menu : [ {
					text : '新闻动态',
					items : [{
						id : 'activityMaint',
						text : '公司动态',
						href : '/firstrmb/Admin/RichEdit/getList/category/activity'
					},{
						id : 'industryNewsMaint',
						text : '行业动态',
						href : '/firstrmb/Admin/RichEdit/getList/category/industryNews'
					}]
				}]
			}, {
				id : 'sellList',
				homePage : 'sellMenuMaint',
				menu : [ {
					text : '出售目录',
					items : [{
						id : 'sellMenuMaint',
						text : '目录管理',
						href : '/firstrmb/Admin/SellMaint/sellCategoryList'
					}
					/*,{
						id : 'sellItemMaint',
						text : '藏品管理',
						href : '/firstrmb/Admin/SellMaint/sellItemList'
					}*/
					]
				},{
					text : '藏品管理',
					items : <?php echo ($treeSellCategory); ?>
				}]
			}, {
				id : 'buyInfo',
				homePage : 'buyInfoMaint',
				menu : [ {
					text : '藏品求购',
					items : [{
						id : 'buyInfoMaint',
						text : '求购信息',
						href : '/firstrmb/Admin/RichEdit/editBuyInfoInput/category/buyInfo'
					}]
				}]
			}, {
				id : 'pqgs',
				homePage : 'pqgsMaint',
				menu : [ {
					text : '票券概述',
					items : [{
						id : 'pqgsMaint',
						text : '票券概述',
						href : '/firstrmb/Admin/RichEdit/getList/category/pqgs'
					}]
				}]
			}, {
				id : 'zpbb',
				homePage : 'zpbbMaint',
				menu : [ {
					text : '正票版别',
					items : [{
						id : 'zpbbMaint',
						text : '正票版别',
						href : '/firstrmb/Admin/RichEdit/getList/category/zpbb'
					}]
				}]
			}, {
				id : 'ypbb',
				homePage : 'ypbbMaint',
				menu : [ {
					text : '样票版别',
					items : [{
						id : 'ypbbMaint',
						text : '样票版别',
						href : '/firstrmb/Admin/RichEdit/getList/category/ypbb'
					}]
				}]
			},{
				id : 'user_maintain',
				homePage: 'userList',
				menu : [ {
					text : '用户管理',
					items : [
					  {
						id : 'userList',
						text : '用户列表',
						href : '/firstrmb/Admin/User/userList'
					  },{
						id : 'addUser',
						text : '添加用户',
						href : '/firstrmb/Admin/User/addUserIn'
					  }
					]
				}]
			}];
			new PageUtil.MainPage({
				modulesConfig : config
			});
		});
		// alert('<?php echo ($treeSellCategory); ?>');
	</script>
</body>
</html>