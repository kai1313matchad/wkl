

<link href="<?=base_url('assets/videojs/video-js.css');?>" rel="stylesheet">
<script src="<?=base_url('assets/videojs/video.js');?>"></script>
<link rel="stylesheet" href="<?=base_url('assets/videojs/style.css');?>">

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					<?= $headline ?>
				</h3>
			</div>
		</div>

		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<?php
			if (isset($error)) {

				foreach ($error as $value) {
					echo $value;
				}
			}
			?>
			<div class="m-separator m-separator--dashed d-xl-none"></div>
		</div>

	</div>
	<!--begin::Form-->
	
	<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
	echo form_open_multipart('manage_product/add_video/'.$update_id, $attributes);
	?>


		<div class="m-portlet__body">
			<div class="form-group m-form__group m--margin-top-10">
				<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>

			</div>
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					File Video
				</label>
				<div class="col-6">
					<label class="custom-file">
						<input type="file" id="file2 video" class="custom-file-input" name="video">
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						Ukuran maks 20 MB
					</span>
				</div>
			</div>
			
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-10">
						<button type="submit" class="btn btn-success" name="submit" value="Submit">
							Submit
						</button>
						<button type="submit" class="btn btn-secondary" name="submit" value="Cancel">
							Cancel
						</button>
					</div>
				</div>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>
<!--end::Portlet-->

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
					Gambar
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="col-6">
			<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
				<small>Click to play</small>
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
