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
</head>

<body>
	<div class="container" align="center" style="margin: 20px;">
		<button class="btn btn-success" id="addbutton">
			<span class="glyphicon glyphicon-plus"></span>添加
		</button>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th align="center">序号</th>
					<th>描述</th>
					<th>路径</th>
					<th>上传时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td align="center"><?php echo ($key+1); ?></td>
				<td><?php echo ($vo["description"]); ?></td>
				<td>./Uploads/<?php echo ($vo["path"]); ?></td>
				<td><?php echo ($vo["upload_time"]); ?></td>
				<td>
					<button class="btn btn-info" onclick="editSlide(<?php echo ($vo["uid"]); ?>)">
						<span class="glyphicon glyphicon-pencil"></span>
					</button>
					<button class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="deleteSlide(<?php echo ($vo["uid"]); ?>)">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">警告</h4>
				</div>
				<div class="modal-body">确定要删除该幻灯片吗？</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-danger" onclick="doDeleteSlide()">确定删除</button>
				</div>
			</div>
		</div>
	</div>

	<form id="theform" method="post">
		<input type="hidden" id="uid" name="uid">
	</form>
</body>

<script>

//$("td > button").click(function(id) {
    //alert(this.outerHTML);
//});

function submitForm(url) {
    $("#theform").attr("action", url);
    $("#theform").submit();
}

$("#addbutton").click(function() {
    submitForm("/firstrmb/index.php/Admin/HomeMaint/addSlide");
});

function editSlide(uid) {
    $("#uid").val(uid);
    submitForm("/firstrmb/index.php/Admin/HomeMaint/editSlide");
}

function deleteSlide(uid) {
    $("#uid").val(uid);
    //submitForm("/firstrmb/index.php/Admin/HomeMaint/deleteSlide")
}

function doDeleteSlide() {
    submitForm("/firstrmb/index.php/Admin/HomeMaint/deleteSlide")
}

// var json;
// ajax();
// function ajax(){
//     $.ajax({
//         url: '/firstrmb/Admin/HomeMaint/getListInJson',//提交访问的URL
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