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
<link href="/firstrmb/Public/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script charset="utf-8" src="/firstrmb/Public/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script charset="utf-8" src="/firstrmb/Public/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<link href="/firstrmb/Public/bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="/firstrmb/Public/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
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
		<form action="<?php echo U('Admin/RichEdit/updateRichText');?>" method="post">
			<input type="hidden" name="uid" value="<?php echo ($record["uid"]); ?>">
			<div class="form-group">
				<label for="title"><?php echo ($categoryText); ?>标题</label>
				<input type="text" class="form-control" name="title" id="title" value="<?php echo ($record["title"]); ?>">
			</div>
			<div class="form-group">
				<label for="isShow">是否显示？</label>
				<?php if($record["isshow"] == 1): ?><input type="checkbox" class="form-control" name="isShow" id="isShow" data-toggle="toggle" value="1" checked>
				<?php else: ?>
				<input type="checkbox" class="form-control" name="isShow" id="isShow" data-toggle="toggle" value="1"><?php endif; ?>
			</div>
			<div class="form-group">
				<label for="thedate"><?php echo ($categoryText); ?>日期</label>
				<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd"
					data-link-field="thedate" data-link-format="yyyy-mm-dd" style="width: 200px;">
					<input class="form-control" size="16" type="text" value="<?php echo ($record["thedate"]); ?>" readonly> <span class="input-group-addon"><span
						class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"><span
						class="glyphicon glyphicon-calendar"></span></span>
				</div>
				<input type="hidden" id="thedate" name="thedate" value="<?php echo ($record["thedate"]); ?>" />
			</div>
			<div class="form-group">
				<label for="editor_id"><?php echo ($categoryText); ?>内容</label>
				<textarea id="editor_id" name="content" style="width: 100%; height: 400px;"><?php echo ($record["content"]); ?></textarea>
			</div>
			<div align="center">
				<button class="btn btn-success" type="submit" id="save" value="submit">提交</button>
				<button type="button" class="btn btn-default" id="backbtn">取消</button>
				<br/><br/>
			</div>
			<input type="hidden" name="category" value="<?php echo ($record["category"]); ?>">
		</form>
	</div>

	<form id="form" action="/firstrmb/index.php/Admin/RichEdit/getList/category/<?php echo ($record["category"]); ?>" method="post"></form>
</body>
<script>
$("#backbtn").click(function() {
    $("#form").submit();
});
$('.form_date').datetimepicker({
    language:  'zh-CN',
    weekStart: 1,
    todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0
});
</script>
</html>