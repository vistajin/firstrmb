<?php if (!defined('THINK_PATH')) exit();?><meta charset="utf-8">
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
<link href="/firstrmb/Public/fileinput-master/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="/firstrmb/Public/fileinput-master/js/fileinput.js"></script>
<script charset="utf-8" src="/firstrmb/Public/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/firstrmb/Public/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/firstrmb/Public/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<link href="/firstrmb/Public/bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="/firstrmb/Public/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
<script>
	KindEditor.ready(function(K) {
		window.editor = K.create('#editor_id');
	});
</script>

<body>
    <div class="container nomargin">
        <div class="page-header">
            <h4><strong>添加藏品</strong></h4>
        </div>
        <form enctype="multipart/form-data" action="/firstrmb/index.php/Admin/SellMaint/addSellItem" id="addform" method="post">
            <div class="form-group">
				<label for="isShow">在售？</label>
				<input type="checkbox" class="form-control" name="isShow" id="isShow" data-toggle="toggle" value="1" checked>
			</div>
            <div class="form-group">
             <label for="isRecommend">推荐？</label>
             <input type="checkbox" class="form-control" name="isRecommend" id="isRecommend" data-toggle="toggle" value="1" checked>
            </div>
			<div class="form-group">
				<label for="category_uid">藏品目录</label> 
				<select class="form-control" required style="width: 300px"
					name="category_uid" id="category_uid">
					<option value="">请选择</option>
					<?php if(is_array($sellCategoryList)): $i = 0; $__LIST__ = $sellCategoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == $category_uid): ?><option value="<?php echo ($key); ?>" selected><?php echo ($vo); ?></option>
					<?php else: ?>
					<option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
            <div class="form-group">
				<label for="title">藏品名称</label> <input type="text" class="form-control" name="title" id="title"
					required>
			</div>
            <div class="form-group">
                <label for="photo">藏品图片 (jpg, png, gif, jpeg)</label><br>
<!--                 <img src="/firstrmb/Uploads/<?php echo ($record["logo"]); ?>"> -->
                <input name="photo" id="photo" class="file form-control" type="file" multiple data-min-file-count="0">
            </div>
			<div class="form-group">
				<label for="editor_id">藏品详情</label>
				<textarea id="editor_id" name="content" style="width: 100%; height: 400px;"><?php echo ($richText); ?></textarea>
			</div>
            <div align="center">
                <button type="submit" class="btn btn-primary" id="confirmbtn">确定</button>
                <button type="button" class="btn btn-default" id="backbtn">取消</button>
            </div>
        </form>
    </div>
    <form id="form" action="/firstrmb/index.php/Admin/SellMaint/sellItemList/category_uid/<?php echo ($category_uid); ?>" method="post"></form>
</body>
<script>
$("#backbtn").click(function() {
    $("#form").submit();
});
$("#photo").fileinput({
    'allowedFileExtensions' : ['jpg', 'png','gif', 'jpeg'],
});

$("#confirmbtn").click(function() {
    $("#confirmform").submit();
});
</script>
</html>