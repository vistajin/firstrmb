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

<body>
	<div class="box">
		<div class="login-box">
			<div class="login-title text-center">
				<h4>
					<small><?php echo (session('company_name')); ?></small>
				</h4>
				<h1>
					<small>后台管理系统</small>
				</h1>
			</div>
			<div class="login-content ">
				<div class="form">
					<form action="<?php echo U('Login/login');?>" method="post">
						<div class="form-group">
							<div class="col-xs-12">
								<div class="input-group input-group2">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> <input type="text"
										id="username" name="username" class="form-control" placeholder="用户名" required autofocus>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<div class="input-group input-group2">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span> <input type="password"
										id="password" name="password" class="form-control" placeholder="密码" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<div class="input-group input-group2">
									<span class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></span> <input type="text"
										id="code" name="code" class="form-control" placeholder="验证码" required style="width: 150px">&nbsp;&nbsp;
									<img class="verify" title="点击刷新验证码" src="/firstrmb/Home/Common/genverify">
								</div>
							</div>
						</div>
						<!-- <div class="form-group form-actions">
              <div class="col-xs-4 col-xs-offset-2">
                <img class="verify" title="点击刷新验证码" src="<?php echo U('Login/genverify');?>" >
              </div>
            </div> -->
						<div class="form-group form-actions">
							<div class="col-xs-4 col-xs-offset-4">
								<button type="submit" class="btn btn-sm btn-info">
									<span class="glyphicon glyphicon-off"></span>登录
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$(".verify").click();
	});
	$(".verify").click(function() {
		var newUrl = $(this).attr("src") + "?F=" + Math.random();
		$(this).attr("src", newUrl);
	});
</script>
</html>