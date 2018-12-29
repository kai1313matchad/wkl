<link href="<?=base_url('assets/videojs/video-js.css');?>" rel="stylesheet">
<script src="<?=base_url('assets/videojs/video.js');?>"></script>

<?php
$back = base_url().'store_product/create/'.$update_id;
?>

<div class="tab-pane fade in active">

    <div class="row">
		<div class="col-md-6">
	    	<h2>Show Video</h2>
	    </div>

	    <div class="col-md-6">
	        <a href="<?= $back ?>" class="button btn-small yellow pull-right">BACK</a>
	    </div>
	</div>

<?php
$path_vid = base_url().'marketplace/video/'.$video_name;
if ($video_name != "") { 
?>

    <div class="col-sm-12 no-float no-padding">
    	
    	<div class="row form-group">
            <div class="col-sms-2 col-sm-2">
            </div>
            <div class="col-sms-7 col-sm-7">
            	<video id="video1" class="video-js vjs-default-skin" width="480" height="320" poster="http://www.tutorial-webdesign.com/wp-content/themes/nurumah/img/logo-bg.png"
		            data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
		            <source src="<?php echo base_url();?>marketplace/video/<?=$video_detail['file_name'];?>" type="video/x-flv">
		            <source src="<?php echo base_url();?>marketplace/video/<?=$video_detail['file_name'];?>" type='video/mp4'>
		        </video>
            </div>
            <div class="col-sms-3 col-sm-3">
            </div>
        </div>
        
	</div>
<?php } ?>		
</div>