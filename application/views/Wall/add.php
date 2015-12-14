<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH."views/common/top.php";
?>

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
	<div class="row wpview">
		<ul id="image_preview">

		</ul>
	</div>
</div><!--/.col-xs-12.col-sm-9-->
<script>
	$(function(){
		nav('nav-wall-add');

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
				var li = $('<li></li>');
				var a = $('<a href="javascript:void(0);" ></a>');
				var img = $('<img alt="预览图">');
				img.attr('src',e.target.result);
				a.append(img);
				li.append(a);
				$('#image_preview').append(li);
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
<?php include APPPATH."views/common/footer.php";?>