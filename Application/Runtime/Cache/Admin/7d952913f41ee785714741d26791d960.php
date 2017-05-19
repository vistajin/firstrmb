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
<meta name="description" content="东鸣轩" />
<meta name="author" content="Vista JIN" />
<meta name="keywords" CONTENT="东鸣轩" />
<title>东鸣轩商城</title>
<link href="/firstrmb/Public/fileinput-master/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="/firstrmb/Public/fileinput-master/js/fileinput.js"></script>
</head>

<body>
	<div class="container">
		<div class="page-header">
			<h3>添加一张幻灯片</h3>
		</div>
		<form enctype="multipart/form-data" action="/firstrmb/Admin/HomeMaint/doAddSlide" method="post">
			<div class="form-group">
				<label for="description">幻灯片描述</label> <input type="text" class="form-control" name="description" id="description"
					placeholder="输入幻灯片描述">
			</div>
			<br />
			<div class="form-group">
				<label for="photo">选择图片 (jpg, png, gif, jpeg)</label> <input name="photo" id="photo" class="file form-control"
					type="file" multiple data-min-file-count="1">
			</div>
			<div align="center">
				<button type="submit" class="btn btn-info">确定</button>
				<button type="button" class="btn btn-default" id="backbtn">取消</button>
			</div>
		</form>
		
	</div>

	<form id="form" action="/firstrmb/index.php/Admin/HomeMaint/slideList" method="post"></form>
</body>
<script>
$("#photo").fileinput({
    'allowedFileExtensions' : ['jpg', 'png','gif', 'jpeg'],
});

$("#backbtn").click(function() {
    $("#form").submit();
});
</script>
</html>