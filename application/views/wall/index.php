<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH."views/common/top.php";
?>
<div class="col-xs-12 col-sm-9">
	<div class="row bs-example">
		<h1>壁纸列表</h1>
	</div>
	<div class="row wpview">
		<ul >
		<?php foreach($walls as $wall):?>
		<li class="">
			<a href="<?= UPYUN_URL.($wall->url);?>" target="_blank" class="">
				<img alt="预览图" src="<?= UPYUN_URL.($wall->url).THUMB;?>">
			</a>
		</li>
		<?php endforeach;?>
	</div>
</div>
<script>
	$(function() {
		nav('nav-wall-index');
	});
</script>
<?php include APPPATH."views/common/footer.php";?>
