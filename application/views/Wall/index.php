<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>哇扑-后台管理</title>
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="/public/js/offcanvas.js"></script>
	<link href="/public/css/offcanvas.css" rel="stylesheet">
<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="/">哇扑-后台管理</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="/">用户主页</a></li>
				<li><a href="/login/logout">登出系统</a></li>
			</ul>
		</div><!-- /.nav-collapse -->
	</div><!-- /.container -->
</nav><!-- /.navbar -->

<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas fixed" id="sidebar">
			<div class="list-group">
				<a href="/user/" class="list-group-item active">用户列表</a>
				<a href="/wall/index" class="list-group-item">壁纸干货</a>
				<a href="/wall/add" class="list-group-item">上传</a>
				<a href="/wgroup/index" class="list-group-item">套图列表</a>
				<a href="#" class="list-group-item">Link</a>
				<a href="#" class="list-group-item">Link</a>
				<a href="#" class="list-group-item">Link</a>
				<a href="#" class="list-group-item">Link</a>
				<a href="#" class="list-group-item">Link</a>
			</div>
		</div><!--/.sidebar-offcanvas-->
		<div class="col-xs-12 col-sm-9">
			<p class="pull-right visible-xs">
				<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
			</p>
			<div class="row bs-example">
				<h1>壁纸列表</h1>
			</div>
			<div class="row">
				<?php foreach($walls as $wall):?>
				<div class="col-xs-6 col-md-3 img_prev">
					<a href="javascript:void(0);" class="thumbnail">
						<img alt="预览图" src="<?= UPYUN_URL.($wall->url).THUMB;?>">
					</a>
				</div>
				<?php endforeach;?>
			</div><!--/row-->
		</div><!--/.col-xs-12.col-sm-9-->
	</div><!--/row-->
	<hr>
	<footer>
		<p>&copy; makyu 2015 | 289415287@qq.com</p>
	</footer>
</div><!--/.container-->
</body>
</html>
