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
            <h4><strong>编辑公司LOGO</strong></h4>
        </div>
        <form enctype="multipart/form-data" action="/firstrmb/index.php/Admin/LogoMaint/updateLogo" id="updateform" method="post">
            <input type="hidden" name="uid" value="<?php echo ($record["uid"]); ?>">
            <div class="form-group">
                <label for="photo">LOGO图片 (jpg, png, gif, jpeg)</label><br>
                <img src="/firstrmb/Uploads/<?php echo ($record["path"]); ?>">
                <input name="photo" id="photo" class="file form-control" type="file" multiple data-min-file-count="0">
            </div>        
            <div align="center">
                <button type="submit" class="btn btn-primary" id="confirmbtn">确定</button>
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