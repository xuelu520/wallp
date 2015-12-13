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
	<link href="/public/css/public.css" rel="stylesheet">
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
				<a href="/user/" class="list-group-item">用户列表</a>
				<a href="/wall/index" class="list-group-item">壁纸干货</a>
				<a href="/wall/add" class="list-group-item active">上传</a>
				<a href="/wgroup/index" class="list-group-item">套图列表</a>
				<a href="#" class="list-group-item">Link</a>
				<a href="#" class="list-group-item">Link</a>
				<a href="#" class="list-group-item">Link</a>
				<a href="#" class="list-group-item">Link</a>
				<a href="#" class="list-group-item">Link</a>
			</div>
		</div><!--/.sidebar-offcanvas-->
		<div class="col-xs-12 col-sm-9">
			<div class="row">
				<div class="panel panel-primary">
					<div class="panel-heading"><h3>上传图片</h3></div>
					<div class="panel-body">
						<a href="javascript:void(0);" class="file">选择文件
							<input type="file" id="file" multiple="true">
						</a>
					</div>
				</div>
			</div>
			<div class="row" id="image_preview">

			</div>
		</div><!--/.col-xs-12.col-sm-9-->
	</div><!--/row-->
	<hr>
	<footer>
		<p>&copy; makyu 2015 | 289415287@qq.com</p>
	</footer>
</div><!--/.container-->
<script>
	$(function(){
		$('#file').bind('change',function(){
			var files = $(this)[0].files;
			for(var i=0; i<files.length;++i) {
				var ifile = files[i];
				console.log(ifile);
				preview(ifile);
				upload(ifile);
			}
		});
	});

	/**
	 * 上传预览
	 * @param file
	 */
	function preview(file){
		if(window.FileReader) {
			var fr = new FileReader();
			fr.onload = function(e) {
				console.log(e.target.result);
				var div = $('<div class="col-xs-6 col-md-3 img_prev"></div>');
				var a = $('<a href="javascript:void(0);" class="thumbnail"></a>');
				var img = $('<img alt="预览图">');
				img.attr('src',e.target.result);
				a.append(img);
				div.append(a);
				$('#image_preview').append(div);
			};
			fr.readAsDataURL(file);
		}
	}

	/**
	 * 上传
	 * @param ifile
	 * @returns {boolean}
	 */
	function upload(ifile){
		var data = new FormData();
		data.append('file', ifile);
		$.ajax({
			url: '/wall/upload',
			type: 'POST',
			dataType:'json',
			data: data,
			processData: false,  // 告诉jQuery不要去处理发送的数据
			contentType: false  // 告诉jQuery不要去设置Content-Type请求头
		}).done(function(ret){
			if (ret.status == 'success') {
//				$('#pic_url').val(ret.data.url);
			}else{
				console.log(ret.msg);
			}
		});
		return false;
	}
</script>
</body>
</html>
