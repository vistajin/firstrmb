<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/firstrmb/Public/images/band.jpg" rel="shortcut icon">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/firstrmb/Public/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/firstrmb/Public/css/my-admin.css?v=20170504">

<!-- Optional theme -->
<link rel="stylesheet" href="/firstrmb/Public/bootstrap/css/bootstrap-theme.min.css">

<!-- jquery must before bootstrap js -->
<script src="/firstrmb/Public/jquery/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="/firstrmb/Public/bootstrap/js/bootstrap.min.js"></script>

<!-- <link rel="stylesheet" href="/firstrmb/Public/bootstrap-select/js/bootstrap-select.min.css"> -->
<!-- <script src="/firstrmb/Public/bootstrap-select/js/bootstrap-select.min.js"></script> -->

<title><?php echo (session('company_name')); ?> - 后台管理系统</title>
<link rel="stylesheet" href="/firstrmb/Public/treeview/bootstrap-treeview.css">
<script src="/firstrmb/Public/treeview/bootstrap-treeview.js"></script>
</head>

<body>
	<div class="container nomargin">
		<div class="row">
            <div class="col-md-12" align="center" style="margin:20px">
				<button class="btn btn-success" id="addbutton">
					<span class="glyphicon glyphicon-plus"></span>添加菜单
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 nopaddingleft">
				<div id="tree"></div>
			</div>
			<div class="col-md-9">
			</div>
		</div>
		
	</div>
	
	
</body>

<script>
	function getTree() {
		// Some logic to retrieve, or generate tree structure
		htmlobj = $.ajax({
			url : "/firstrmb/Admin/HomeMenu/getHomeMenuListData",
			async : false
		});
		$("#modalBody").html(htmlobj.responseText);
		var tree = htmlobj.responseText;
		// 	[{
		// 		"text": "首页",
		// 		enableLinks: true,
		// 		href: "www.baidu.com",
		// 		uid:123
		// 	  },{
		// 		text: "关于我们",
		// 		nodes: [{
		// 			text: "企业介绍",
		// 			selectable: false
		// 			},{
		// 			text: "联系我们"
		// 			}
		// 	    ]
		// 	  },{
		// 		text: "新闻动态"
		// 	  },{
		// 		text: "Parent 4"
		// 	  },{
		// 		text: "Parent 5"
		// 	  }
		// 	];
		return tree;
	}

	$('#tree').treeview({
		data : getTree()
	});
	$('#tree').on('nodeSelected', function(event, data) {
		// alert(data.nodes);
	});

	// var json;
	// ajax();
	// function ajax(){
	//     $.ajax({
	//         url: '/firstrmb/Admin/HomeSlide/getListInJson',//提交访问的URL
	//         type: 'GET',//提交的方法
	//         dataType: 'text',//返回的内容的类型，由于PHP文件是直接echo的，那么这里就是text
	//         timeout: 5000,//超时时间
	//         error: function(){ //如果出错，执行函数
	//             alert('Error loading XML document' + url);
	//         },
	//         success: function(data){
	//             //alert(data);//如果成功，弹出数据
	//             json = data;
	//             alert(json);
	//         }
	//     });
	// }
</script>
</html>