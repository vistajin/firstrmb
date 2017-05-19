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
<link rel="stylesheet" href="/firstrmb/Public/css/style.css?v=20170515-43">
<link rel="stylesheet" href="/firstrmb/Public/css/reset.css?v=20170515-3">

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
     <li class="menu"><a href="/firstrmb/Home/Activity/activity" id="header_link3" title="新闻动态" <?php echo ($activityHover); ?>>新闻动态</a>
     <div class="menu-on about" style="display: none;">
      <span></span>
      <a href="/firstrmb/Home/Activity/activity" title="公司动态" class="first">&nbsp;公司动态</a>
      <a href="/firstrmb/Home/Activity/activity/category/industryNews" title="行业动态" class="last">&nbsp;行业动态</a>
     </div></li>
<!--    <li><a href="/firstrmb/Home/Activity/activity" id="header_link3" title="公司动态" <?php echo ($activityHover); ?>>新闻动态</a></li>-->
<!--    <li><a href="/firstrmb/bbs/upload/forum.php" id="header_link4" title="钱币论坛">钱币论坛</a></li>-->
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
     <li><a href="/firstrmb/Home/Activity/activity/category/pqgs" id="header_link7" title="票券概述" <?php echo ($pqgsHover); ?>>票券概述</a></li>
     <li><a href="/firstrmb/Home/Activity/activity/category/zpbb" id="header_link8" title="正票版别" <?php echo ($zpbbHover); ?>>正票版别</a></li>
     <li><a href="/firstrmb/Home/Activity/activity/category/ypbb" id="header_link9" title="样票版别" <?php echo ($ypbbHover); ?>>样票版别</a></li>
    
   </ul>
  </div>
 </div>
 
		<div class="marquee">
			<ul>
				<?php if(is_array($slideList)): $i = 0; $__LIST__ = $slideList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img src="/firstrmb/Uploads/<?php echo ($vo["path"]); ?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.marquee').kxbdMarquee({
			direction:'left',
			eventA:'mouseenter',
			eventB:'mouseleave'
	});
});
</script>

<script>
//滚动
(function($){

	$.fn.kxbdMarquee = function(options){
		var opts = $.extend({},$.fn.kxbdMarquee.defaults, options);
		
		return this.each(function(){
			var $marquee = $(this);//滚动元素容器
			var _scrollObj = $marquee.get(0);//滚动元素容器DOM
			var scrollW = $marquee.width();//滚动元素容器的宽度
			var scrollH = $marquee.height();//滚动元素容器的高度
			var $element = $marquee.children(); //滚动元素
			var $kids = $element.children();//滚动子元素
			var scrollSize=0;//滚动元素尺寸
			var _type = (opts.direction == 'left' || opts.direction == 'right') ? 1:0;//滚动类型，1左右，0上下

			//防止滚动子元素比滚动元素宽而取不到实际滚动子元素宽度
			$element.css(_type?'width':'height',10000);
			//获取滚动元素的尺寸
			if (opts.isEqual) {
				scrollSize = $kids[_type?'outerWidth':'outerHeight']() * $kids.length;
			}else{
				$kids.each(function(){
					scrollSize += $(this)[_type?'outerWidth':'outerHeight']();
				});
			}
			//滚动元素总尺寸小于容器尺寸，不滚动
			if (scrollSize<(_type?scrollW:scrollH)) return; 
			//克隆滚动子元素将其插入到滚动元素后，并设定滚动元素宽度
			$element.append($kids.clone()).css(_type?'width':'height',scrollSize*2);
			
			var numMoved = 0;
			function scrollFunc(){
				var _dir = (opts.direction == 'left' || opts.direction == 'right') ? 'scrollLeft':'scrollTop';
				if (opts.loop > 0) {
					numMoved+=opts.scrollAmount;
					if(numMoved>scrollSize*opts.loop){
						_scrollObj[_dir] = 0;
						return clearInterval(moveId);
					} 
				}
				if(opts.direction == 'left' || opts.direction == 'up'){
					var newPos = _scrollObj[_dir] + opts.scrollAmount;
					if(newPos>=scrollSize){
						newPos -= scrollSize;
					}
					_scrollObj[_dir] = newPos;
				}else{
					var newPos = _scrollObj[_dir] - opts.scrollAmount;
					if(newPos<=0){
						newPos += scrollSize;
					}
					_scrollObj[_dir] = newPos;
				}
			};
			//滚动开始
			var moveId = setInterval(scrollFunc, opts.scrollDelay);
			//鼠标划过停止滚动
			$marquee.hover(
				function(){
					clearInterval(moveId);
				},
				function(){
					clearInterval(moveId);
					moveId = setInterval(scrollFunc, opts.scrollDelay);
				}
			);
			
			//控制加速运动
			if(opts.controlBtn){
				$.each(opts.controlBtn, function(i,val){
					$(val).bind(opts.eventA,function(){
						opts.direction = i;
						opts.oldAmount = opts.scrollAmount;
						opts.scrollAmount = opts.newAmount;
					}).bind(opts.eventB,function(){
						opts.scrollAmount = opts.oldAmount;
					});
				});
			}
		});
	};
	$.fn.kxbdMarquee.defaults = {
		isEqual:true,//所有滚动的元素长宽是否相等,true,false
		loop: 0,//循环滚动次数，0时无限
		direction: 'left',//滚动方向，'left','right','up','down'
		scrollAmount:1,//步长
		scrollDelay:10,//时长
		newAmount:3,//加速滚动的步长
		eventA:'mousedown',//鼠标事件，加速
		eventB:'mouseup'//鼠标事件，原速
	};
	
	$.fn.kxbdMarquee.setDefaults = function(settings) {
		$.extend( $.fn.kxbdMarquee.defaults, settings );
	};
	
})(jQuery);

</script>


<!-- style for jquery image auto scroll -->
<style>
.marquee {width:980px;height:300px;overflow:hidden;border:0px; margin:auto}
.marquee li{ display:inline; float:left; margin-right:0px;}
.marquee li a{ width:100%; height:200px; display:block; float:left; text-align:center; font-size:14px;}
.marquee li a:hove{ text-decoration:none;}
.marquee li img {width:980px; height:300px;}
.marquee li em{font-style: normal; height:0px; line-height:0px; display:none; margin-top:0px;}
</style>
 
 <!-- 公共头部结束 -->
 
 <!-- 公共头部结束 -->

<!-- <script src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script> -->
<!-- <script src="/firstrmb/Public/js/map.js"></script> -->

<body>
 <div class="w980" id="wrap">

  <div id="leftBar" class="fl">
   <div id="item">
    <h2>关于我们</h2>
    <ul>
     <li><a href="/firstrmb/Home/Aboutus/aboutus/type/corpinfo" <?php echo ($corpinfoHover); ?>>公司简介</a></li>
     <li><a href="/firstrmb/Home/Aboutus/aboutus/type/contactUs" <?php echo ($contactUsHover); ?>>联系我们</a></li>
    </ul>
   </div>
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
    您的位置：关于我们 &gt; <span><?php echo ($pageName); ?></span>
   </div>
   <div id="content">
    <div id="article">
     <?php if($corpinfoHover != null): echo ($corpbrief); ?>
     <?php else: echo ($contactus); endif; ?>
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