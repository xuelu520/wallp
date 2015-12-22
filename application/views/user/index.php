<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH."views/common/top.php";
?>
<div class="col-xs-12 col-sm-9">
	<p class="pull-right visible-xs">
		<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
	</p>
	<div class="row bs-example">
		<h1>用户列表
			<button class="btn btn-default" id="user-add">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>
		</h1>
	</div>
	<div class="row">
		<table class="table table-hover">
			<thead>
				<th>ID</th>
				<th>用户名称</th>
				<th>用户类型</th>
				<th>创建时间</th>
				<th>状态</th>
				<th>操作</th>
			</thead>
			<tbody>
				<?php foreach($users as $user):?>
					<tr>
						<td><?=$user->id;?></td>
						<td><?=$user->username;?></td>
						<td><?= empty($user->type)?"本站用户":"三方登录"?></td>
						<td><?=date('Y-m-d H:i:s',$user->create_time);?></td>
						<td>
							<span class="<?php echo $user->status == '1'?'glyphicon glyphicon-ok':
							'glyphicon glyphicon-remove';?>">
							</span>
						</td>
						<td>
							<a class="wg-detail" href="javascript:;" data-wgid="<?=$user->id?>" title="详细">
								<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
							</a>
							&nbsp;&nbsp;
							<?php if($user->status == 1):?>
								<a href="javascript:;" data-key="DOWN" data-uid="<?=$user->id?>" class="user-up-down" title="禁用用户">
									<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
								</a>
							<?php else: ?>
								<a href="javascript:;" data-key="UP" data-uid="<?=$user->id?>" class="user-up-down" title="激活用户">
									<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
								</a>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div><!--/row-->
</div><!--/.col-xs-12.col-sm-9-->
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="title">Loading...</h3>
			</div>
			<div class="row" id="loading">
				<p><h2>Loading...</h2></p>
			</div>
			<div class="row wpview"  >
				<ul id="image_preview" style="display: none;">

				</ul>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="AddModal" style="">
	<div class="modal-dialog">
		<div class="modal-content mt200" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">新增套图</h3>
			</div>
			<div class="modal-body">
				<div class="form-inline" style="">
					<div class="form-group ml140">
						<input type="email" class="form-control" id="wgroup-name" placeholder="套图名称" width="100">
					</div>
					<button type="submit" class="btn btn-default" id="wg-save"> 确认新增</button>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	$(function(){
		nav('nav-user-index');//nav 高亮选择

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
					$('#title').empty();
					$('#image_preview').empty();
					$('#title').html(data.data.name);
					for(var i=0; i<urls.length; ++i){
						var li = $('<li></li>');
						var a = $('<a href="<?=UPYUN_URL?>'+urls[i]['url']+'\" target="_blank"></a>');
						var img = $('<img alt="预览图">');
						img.attr('src',"<?=UPYUN_URL?>"+urls[i]['url']+"<?=THUMB?>");
						a.append(img);
						li.append(a);
						$('#image_preview').append(li);
					}
				}else{
					var p = $("<p>"+data.msg+"</p>");
					$('#image_preview').append(p);
				}
				$('#loading').hide();
				$('#image_preview').show();
			});
		});

		//新增套图-modal
		$('#wgroup-add').bind('click',function() {
			$('#wgroup-name').val("");//打开就清空套图名称
			$('#AddModal').modal('show');
		});

		//保存套图
		$('#wg-save').bind('click', function() {
			var name = $('#wgroup-name').val();
			if(!name) {
				alert('套图名称不能不写喔！');
			}
			$.ajax({
				url:'/wgroup/save',
				type:'POST',
				dataType:'json',
				data:{'wg_name':name},
				success:function(res) {
					alert(res.msg);
					if(res.status == 'success') {
						//添加成功，刷新页面
						location.href = location.href;
					}
				}
			});
		});

		//上架下架操作
		$('.user-up-down').bind('click',function() {

			var key = $(this).attr('data-key');
			var id = $(this).attr('data-uid');
			if(key == 'DOWN') {
				if(!confirm("确认下架该套图么？？")){
					return false;
				}
			}

			$.ajax({
				url:'/user/up_or_down',
				type:'POST',
				dataType:'json',
				data:{'key':key, 'uid':id},
				success: function(res) {
					alert(res.msg);
					if(res.status == 'success') {
						location.href = location.href;
					}
				}
			});
		});
	});
</script>
<?php include APPPATH."views/common/footer.php";?>
