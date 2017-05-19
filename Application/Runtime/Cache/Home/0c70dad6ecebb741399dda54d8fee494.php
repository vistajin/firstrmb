<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1>
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- 搜索信息 -->
<meta name="description" content="<?php echo (session('company_name')); ?>" />
<meta name="author" content="<?php echo (session('company_name')); ?>" />
<meta name="keywords" CONTENT="<?php echo (session('company_name')); ?>" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/firstrmb/Public/images/band.jpg" rel="shortcut icon">

<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="/firstrmb/Public/bootstrap/css/bootstrap.css"> -->
<link rel="stylesheet" href="/firstrmb/Public/css/style.css?v=20170513">
<link rel="stylesheet" href="/firstrmb/Public/css/reset.css?v=20170513">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="/firstrmb/Public/html5shiv/html5shiv.min.js"></script>
	<script src="/firstrmb/Public/respond/respond.min.js"></script>
<![endif]-->
    

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="/firstrmb/Public/bootstrap/css/bootstrap-theme.css"> -->

<!-- jquery must before bootstrap js -->
<script src="/firstrmb/Public/jquery/jquery.min.js"></script>
<script src="/firstrmb/Public/js/common.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="/firstrmb/Public/bootstrap/js/bootstrap.min.js"></script>

<!-- 手机浏览器处理 -->
<!-- <?php if($isMobile == 1): ?>-->
<!-- 	<?php $nopaddingright = 'nopaddingright'; ?> -->
<!-- 	<?php $nopaddingleft = 'nopaddingleft'; ?> -->
<!-- <?php else: ?> -->
<!-- 	<script src="/firstrmb/Public/qqonline/qqonline.jss"></script> -->
<!--<?php endif; ?> -->

<script src="/firstrmb/Public/jquery-cxscroll/jquery.cxscroll.min.js"></script>
<link rel="stylesheet" href="/firstrmb/Public/jquery-cxscroll/jquery.cxscroll.css">
<title><?php echo (session('company_name')); ?></title>

</head>

<body>
 <!-- 公共头部开始 -->
 <div class="w980">
  <div id="top">
      <div class="top_txt">商务馈赠、体面大方、投资收藏、保值增值</div>
   <h1>
    <a href="/firstrmb/Home/index" title="<?php echo (session('company_name')); ?>"
     style="background: url(/firstrmb/Uploads/<?php echo ($basicInfo["logo"]); ?>) no-repeat"><?php echo (session('company_name')); ?></a>
   </h1>
  </div>
  <div id="nav">
   <ul>
    <li><a href="/firstrmb/Home/index" id="header_link1" title="首页" <?php echo ($homeHover); ?>>首页</a></li>
    <li class="menu"><a href="/firstrmb/Home/Aboutus/aboutus/type/corpinfo" id="header_link2" title="关于我们" <?php echo ($aboutUsHover); ?>>关于我们</a>
     <div class="menu-on about" style="display: none;">
      <span></span><a href="/firstrmb/Home/Aboutus/aboutus/type/corpinfo" title="公司简介" class="first">&nbsp;公司简介</a><a href="/firstrmb/Home/Aboutus/aboutus/type/contact" title="联系我们"
       class="last">&nbsp;联系我们</a>
     </div></li>
    <li><a href="/firstrmb/Home/Activity/activity" id="header_link3" title="公司动态" <?php echo ($activityHover); ?>>公司动态</a></li>
    <li><a href="/firstrmb/bbs/upload/forum.php" target="_blank" id="header_link4" title="钱币论坛">钱币论坛</a></li>
    <li class="menu"><a href="/firstrmb/Home/Sell/sell" id="header_link5" title="藏品出售目录" <?php echo ($sellHover); ?>>出售目录</a>
     <div class="menu-on sale" style="display: none;">
      <span></span>
      <?php if(is_array($sellCategoryList)): $i = 0; $__LIST__ = $sellCategoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == 0): ?><a href="/firstrmb/Home/Sell/sell/category_uid/<?php echo ($vo["category_uid"]); ?>" title="<?php echo ($vo["text"]); ?>" class="first">&nbsp;<?php echo ($vo["text"]); ?></a>
       <?php elseif(($key+1 == count($sellCategoryList))): ?>
        <a href="/firstrmb/Home/Sell/sell/category_uid/<?php echo ($vo["category_uid"]); ?>" title="<?php echo ($vo["text"]); ?>" class="last">&nbsp;<?php echo ($vo["text"]); ?></a>
       <?php else: ?>
        <a href="/firstrmb/Home/Sell/sell/category_uid/<?php echo ($vo["category_uid"]); ?>" title="<?php echo ($vo["text"]); ?>">&nbsp;<?php echo ($vo["text"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
     </div></li>
    <li><a href="/firstrmb/Home/BuyInfo/detail" id="header_link6" title="藏品求购" <?php echo ($buyInfoHover); ?>>藏品求购</a></li>
   </ul>
  </div>
 </div>
 <!-- 公共头部结束 -->

<!-- <script src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script> -->
<!-- <script src="/firstrmb/Public/js/map.js"></script> -->

<body>
 <div class="w980" id="wrap">

  <div id="leftBar" class="fl">
  <div id="hot">
 <h2>推荐藏品</h2>
 <ul>
  <?php if(is_array($recommendSellItems)): $i = 0; $__LIST__ = $recommendSellItems;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li title="<?php echo ($vo["title"]); ?>"><?php echo ($key+1); ?>、<?php echo ($vo["titleShort"]); ?>
   <div>
    <a href="/firstrmb/Home/Sell/detail/uid/<?php echo ($vo["uid"]); ?>" title="<?php echo ($vo["title"]); ?>"> <img src="/firstrmb/Uploads/<?php echo ($vo["img"]); ?>" width="160" height="90"
     alt="" /></a>
   </div>
  </li><?php endforeach; endif; else: echo "" ;endif; ?>
 </ul>
</div>
<div id="contactus">
 <h2>联系我们</h2>
 <?php echo ($contactusSimple); ?>
</div>
</div>
  <script type="text/javascript">
			$(function() {
				$("#hot ul li:first div").show();
			})
		</script>

  <div id="main" class="fl">

   <div id="position">
    您的位置：<span><?php echo ($pageName); ?></span>
   </div>
   <div id="content">
    <div id="article"><?php echo ($content); ?>
    </div>
   </div>
  </div>
  <div class="clear"></div>
 </div>


 
<div id="bottom">
 <div class="w980">
  <div class="flinks">

   友情链接：
   <?php if(is_array($friendLinks)): $i = 0; $__LIST__ = $friendLinks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["text"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>

  </div>
  <div id="bottom-l">
   <p><?php echo ($basicInfo["network_record"]); ?></p>
   <p><?php echo ($basicInfo["copyright"]); ?></p>
  </div>
  <div id="bottom-r">
   <p>地址：<?php echo ($basicInfo["address"]); ?> 邮政编码：<?php echo ($basicInfo["postal_code"]); ?></p>
   <p>
    客服邮箱：<a href="mailto:<?php echo ($basicInfo["email"]); ?>"><?php echo ($basicInfo["email"]); ?></a> 客服电话：<?php echo ($basicInfo["phone"]); ?>
   </p>
  </div>
 </div>
</div>
</body>

</html>