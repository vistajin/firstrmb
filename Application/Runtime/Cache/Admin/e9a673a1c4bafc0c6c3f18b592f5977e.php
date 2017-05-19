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
<script charset="utf-8" src="/firstrmb/Public/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/firstrmb/Public/kindeditor/lang/zh_CN.js"></script>
<script>
	KindEditor.ready(function(K) {
		window.editor = K.create('#editor_id');
	});
</script>
</head>

<body>
	<div class="container nomargin">
		<div class="page-header">
			<h3>编辑<?php echo ($categoryText); ?></h3>
		</div>
		<form action="<?php echo U('Admin/RichEdit/setSimpleRichText');?>" method="post">
			<textarea id="editor_id" name="content" style="width: 100%; height: 600px;"><?php echo ($richText); ?></textarea>
			<br />
			<div align="center">
				<button class="btn btn-success" type="submit" id="save" value="submit">提交</button>
			</div>
			<input type="hidden" name="category" value="<?php echo ($category); ?>">
		</form>		
	</div>
</body>
<script>
$("#backbtn").click(function() {alert(11)
    $("#form").submit();
});
</script>
</html>