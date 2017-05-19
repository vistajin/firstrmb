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

<body>
    <div class="container nomargin">
        <div class="page-header">
            <h4><strong>基本信息</strong></h4>
        </div>
        <form enctype="multipart/form-data" action="/firstrmb/index.php/Admin/HomeMaint/updateBasicInfo" id="updateform" method="post">
            <input type="hidden" name="uid" value="<?php echo ($basicInfo["uid"]); ?>">
            <div class="form-group">
				<label for="name">公司名称</label> <input type="text" class="form-control" name="name" id="name"
					value="<?php echo ($basicInfo["name"]); ?>" required>
			</div>
            <div class="form-group">
                <label for="photo">LOGO图片 (jpg, png, gif, jpeg)</label><br>
                <img src="/firstrmb/Uploads/<?php echo ($basicInfo["logo"]); ?>">
                <input name="photo" id="photo" class="file form-control" type="file" multiple data-min-file-count="0">
            </div>
            <div class="form-group">
				<label for="network_record">网络备案号</label> <input type="text" class="form-control" name="network_record" id="network_record"
					value="<?php echo ($basicInfo["network_record"]); ?>">
			</div>
			<div class="form-group">
				<label for="address">地址</label> <input type="text" class="form-control" name="address" id="address"
					value="<?php echo ($basicInfo["address"]); ?>">
			</div>
			<div class="form-group">
				<label for="postal_code">邮编</label> <input type="text" class="form-control" name="postal_code" id="postal_code"
					value="<?php echo ($basicInfo["postal_code"]); ?>">
			</div>
			<div class="form-group">
				<label for="copyright">版权信息</label> <input type="text" class="form-control" name="copyright" id="copyright"
					value="<?php echo ($basicInfo["copyright"]); ?>">
			</div>
			<div class="form-group">
				<label for="email">客服邮箱</label> <input type="text" class="form-control" name="email" id="email"
					value="<?php echo ($basicInfo["email"]); ?>">
			</div>
			<div class="form-group">
				<label for="phone">客服电话</label> <input type="text" class="form-control" name="phone" id="phone"
					value="<?php echo ($basicInfo["phone"]); ?>">
			</div>
            <div align="center">
                <button type="submit" class="btn btn-primary" id="confirmbtn">保存</button>
            </div>
        </form>
    </div>
</body>
<script>
$("#photo").fileinput({
    'allowedFileExtensions' : ['jpg', 'png','gif', 'jpeg'],
});

$("#confirmbtn").click(function() {
    $("#confirmform").submit();
});
</script>
</html>