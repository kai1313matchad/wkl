<?php
$back = base_url().'store_product/create/'.$update_id;
?>

<link href="<?=base_url('assets/videojs/video-js.css');?>" rel="stylesheet">
<script src="<?=base_url('assets/videojs/video.js');?>"></script>


<div class="tab-pane fade in active">

    <div class="row">
		<div class="col-md-6">
	    	<h2>Upload Video </h2>
	    </div>

	    <div class="col-md-6">
	        <a href="<?= $back ?>" class="button btn-small yellow pull-right">BACK</a>
	    </div>
	</div>

    <div class="col-sm-12 no-float no-padding">
    	<!-- alert -->
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>
	<?php
	if ($video_file != "") {
	} else { 
	?>
		<?php
	    echo form_open_multipart('store_product/add_video/'.$update_id);
	    ?>	
	    	<div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Tambah Video OOH</label>
                </div>
                <div class="col-sms-7 col-sm-7">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="video" data-placeholder="Pilih Video">
	                </div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload video media iklan sesuai lokasi berdirinya reklame.</span>
                </div>
            </div>
	        
	        <div class="row form-group">
	        	<div class="col-sms-2 col-sm-2"></div>
	        	<div class="col-sms-7 col-sm-7">
	            	<button class="btn-medium" type="submit" name="submit" value="Submit">SIMPAN</button>
	            	<button class="btn-medium red" type="submit" name="submit" value="Cancel">BATAL</button>
	            </div>
	        </div>
	    <?php echo form_close(); ?>
	<?php } ?>
	<hr>



	


		<?php
		$path_vid = base_url().'marketplace/video/'.$video_name;
		$delete_video = base_url().'store_product/delete_video/'.$update_id;
		if ($video_file != "") { 
		?>

<div class="col-sm-12 no-float no-padding">
		    	
		    	<div class="row form-group">
		            <div class="col-sms-2 col-sm-2">
		            </div>
		            <div class="col-sms-7 col-sm-7">
		            	<video id="video1" class="video-js vjs-default-skin" width="480" height="320" poster="http://www.tutorial-webdesign.com/wp-content/themes/nurumah/img/logo-bg.png"
				            data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
				            <source src="<?php echo base_url();?>marketplace/video/<?= $video_file ?>" type="video/x-flv">
				            <source src="<?php echo base_url();?>marketplace/video/<?= $video_file ?>" type='video/mp4'>
				        </video>
		            </div>
		            <div class="col-sms-3 col-sm-3">
		            	<a href="<?= $delete_video ?>" class="button btn-medium red">Delete Video</a>
		            </div>
		        </div>
		        
			</div>
		    
		<?php } ?>	
	

	</div>
</div>