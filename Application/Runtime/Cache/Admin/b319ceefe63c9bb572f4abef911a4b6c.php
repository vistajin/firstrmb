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
<script charset="utf-8" src="/firstrmb/Public/kindeditor/lang/zh_CN.js"></script>
<link href="/firstrmb/Public/bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="/firstrmb/Public/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="page-header">
			<h3>添加友情链接</h3>
		</div>
		<form action="<?php echo U('Admin/HomeMaint/addFriendLink');?>" method="post">
			<div class="form-group">
				<label for="isShow">是否显示？</label>
				<input type="checkbox" class="form-control" name="isShow" id="isShow" data-toggle="toggle" value="1" checked>
			</div>
			<div class="form-group">
				<label for="text">友情链接名称</label> <input type="text" class="form-control" name="text" id="text"
					placeholder="请输入友情链接名称" required>
			</div>			
			<div class="form-group">
				<label for="url">友情链接URL</label> <input type="text" class="form-control" name="url" id="url"
					placeholder="请输入友情链接URL" required>
			</div>

			<div align="center">
				<button class="btn btn-success" type="submit" id="save" value="submit">提交</button>
				<button type="button" class="btn btn-default" id="backbtn">取消</button>
				<BR />
				<BR />
				<BR />
			</div>
			<input type="hidden" name="category" value="<?php echo ($category); ?>">
		</form>
	</div>

	<form id="form" action="/firstrmb/index.php/Admin/HomeMaint/friendLinkList" method="post"></form>
</body>
<script>
$("#backbtn").click(function() {
    $("#form").submit();
});

</script>
</html>