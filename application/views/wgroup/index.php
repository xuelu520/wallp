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
				<h1>套图列表</h1>
			</div>
			<div class="row">
				<table class="table table-hover">
					<thead>
						<th>ID</th>
						<th>套图名称</th>
						<th>创建时间</th>
						<th>状态</th>
						<th>操作</th>
					</thead>
					<tbody>
						<?php foreach($wgroups as $wg):?>
							<tr>
								<td><?=$wg->id;?></td>
								<td><?=$wg->name;?></td>
								<td><?=date('Y-m-d H:i:s',$wg->create_time);?></td>
								<td>
									<span class="<?php echo $wg->status == '1'?'glyphicon glyphicon-ok':
									'glyphicon glyphicon-remove';?>">
									</span>
								</td>
								<td>
									<a class="wg-detail" href="javascript:;" data-wgid="<?=$wg->id?>">[详细]</a>
									|
									<a href="javascript:;">编辑</a>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div><!--/row-->
		</div><!--/.col-xs-12.col-sm-9-->
	</div><!--/row-->
	<hr>
	<footer>
		<p>&copy; makyu 2015 | 289415287@qq.com</p>
	</footer>
</div><!--/.container-->
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Modal title</h4>
			</div>
				<div class="row" id="loading">
					<p><h2>Loading...</h2></p>
				</div>
				<div class="row" id="image_preview" style="display: none;">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	$(function(){
		$('.wg-detail').bind('click',function(){
			//查询套图壁纸详细数据
			var wg_id = $(this).attr('data-wgid');//套图ID
			$('#myModal').modal('show');
			$.ajax({
				url:'/wgroup/ajax_get_one',
				type:'GET',
				dataType:'json',
				data:{wgid:wg_id}
			}).then(function(data){
				if(data.status == 'success'){
					var urls = data.data.items;
					$('#image_preview').empty();
					for(var i=0; i<urls.length; ++i){
						var div = $('<div class="col-xs-6 col-md-3 img_prev"></div>');
						var a = $('<a href="javascript:void(0);" class="thumbnail"></a>');
						var img = $('<img alt="预览图">');
						img.attr('src',"<?=UPYUN_URL?>"+urls[i]['url']+"<?=THUMB?>");
						a.append(img);
						div.append(a);
						$('#image_preview').append(div);
					}
				}else{
					var p = $("<p>"+data.msg+"</p>");
					$('#image_preview').append(p);
				}
				$('#loading').hide();
				$('#image_preview').show();
			});
		});
	});
</script>
</body>
</html>
