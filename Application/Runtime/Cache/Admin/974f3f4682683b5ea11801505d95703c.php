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
	<div class="container" align="center" style="margin: 20px;">
		<button class="btn btn-info" id="addbutton">
			<span class="glyphicon glyphicon-plus"></span>添加目录
		</button>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th style="text-align: center; width:50px">序号</th>
					<th>目录名称</th>
					<th style="text-align: center; width:300px">操作</th>
				</tr>
			</thead>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td align="center"><?php echo ($key+1); ?></td>
				<td><?php echo ($vo["text"]); ?></td>
				<td width="250px">
					<button class="btn btn-info" onclick="editSellCategoryInput(<?php echo ($vo["uid"]); ?>)" title="编辑">
						<span class="glyphicon glyphicon-pencil"></span>
					</button>
					<button class="btn btn-danger" data-toggle="modal" data-target="#myModal" 
						onclick="deleteSellCategory(<?php echo ($vo["uid"]); ?>)" title="删除">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
					<button class="btn btn-success" onclick="upSellCategory(<?php echo ($vo["uid"]); ?>)" title="上移">
						<span class="glyphicon glyphicon-arrow-up"></span>
					</button>
					<button class="btn btn-success" onclick="downSellCategory(<?php echo ($vo["uid"]); ?>)" title="下移">
						<span class="glyphicon glyphicon-arrow-down"></span>
					</button>
					
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		<div class="container" align="center" style="margin-top: 0; margin-bottom:20px;">
			<ul class="pagination nomargin"><?php echo ($page); ?>
			</ul>
		</div>
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
				<div class="modal-body">确定要删除该出售目录吗？</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-danger" onclick="doDeleteSellCategory()">确定删除</button>
				</div>
			</div>
		</div>
	</div>

	<form id="theform" method="post">
		<input type="hidden" id="uid" name="uid">
	</form>
</body>
<script>
function submitForm(url) {
    $("#theform").attr("action", url);
    $("#theform").submit();
}

$("#addbutton").click(function() {
    submitForm("/firstrmb/index.php/Admin/SellMaint/addSellCategoryInput");
});

function editSellCategoryInput(uid) {
    $("#uid").val(uid);
    submitForm("/firstrmb/index.php/Admin/SellMaint/editSellCategoryInput");
}

function upSellCategory(uid) {
    $("#uid").val(uid);
    submitForm("/firstrmb/index.php/Admin/SellMaint/upSellCategory");
}
function downSellCategory(uid) {
    $("#uid").val(uid);
    submitForm("/firstrmb/index.php/Admin/SellMaint/downSellCategory");
}

function deleteSellCategory(uid) {
    $("#uid").val(uid);
}

function doDeleteSellCategory() {
    submitForm("/firstrmb/index.php/Admin/SellMaint/deleteSellCategory")
}
</script>
</html>