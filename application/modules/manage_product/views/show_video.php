
<link href="<?=base_url('assets/videojs/video-js.css');?>" rel="stylesheet">
<script src="<?=base_url('assets/videojs/video.js');?>"></script>
<link rel="stylesheet" href="<?=base_url('assets/videojs/style.css');?>">


<?php
$path_vid = base_url().'marketplace/video/'.$video_name;
if ($video_name != "") { 
?>

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Video
				</h3>
			</div>
		</div>
		<?php $cancel = base_url().'manage_product/create/'.$update_id; ?>	

		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<a href="<?= $cancel ?>" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-undo"></i>
					<span>
						Back
					</span>
				</span>
			</a>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="col-6">
			<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
		        <video id="video1" class="video-js vjs-default-skin" width="480" height="320" poster="http://www.tutorial-webdesign.com/wp-content/themes/nurumah/img/logo-bg.png"
		            data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
		            <source src="<?php echo base_url();?>marketplace/video/<?=$video_detail['file_name'];?>" type="video/x-flv">
		            <source src="<?php echo base_url();?>marketplace/video/<?=$video_detail['file_name'];?>" type='video/mp4'>
		        </video>
			</div>
		</div>
	</div>	
</div>
			
<?php } ?>	
