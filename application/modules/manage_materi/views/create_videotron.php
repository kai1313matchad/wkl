
<style>
	#uploaded_image {
		color: #f4516c;
		font-size: 10px;
	}
</style>

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
				</h3>
			</div>
		</div>

		<?php 
		$upload_video = base_url()."manage_materi/upload_video/".$update_id;
		$delete_video = base_url()."manage_materi/delete_video/".$update_id;
		$show_video = base_url()."manage_materi/show_video/".$update_id;
			if (is_numeric($update_id)) { 
		?>	
			<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
				<?php
				if ($materi == "") { ?>
					<a href="<?= $upload_video ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-edit"></i>
							<span>
								Upload Video
							</span>
						</span>
					</a>
				<?php } else { ?>
					<a href="<?= $show_video ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-play"></i>
							<span>
								View Video
							</span>
						</span>
					</a>
					<a href="<?= $delete_video ?>" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-eraser"></i>
							<span>
								Delete Video
							</span>
						</span>
					</a>
				<?php } ?>
				
				<div class="m-separator m-separator--dashed d-xl-none"></div>
			</div>
		<?php } ?>	

		<div class="m-portlet__head-tools">
			<a href="<?= base_url() ?>manage_materi/download_file/<?= $update_id ?>" class="btn btn-focus m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill2">
				<span>
					<i class="la la-download"></i>
					<span>
						Download
					</span>
				</span>
			</a>
			<a href="<?= base_url() ?>manage_materi/manage" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill2">
				<span>
					<i class="la la-mail-reply"></i>
					<span>
						Back
					</span>
				</span>
			</a>
		</div>
		
	</div>
	<!--begin::Form-->

	
	<div class="m-form m-form--fit m-form--label-align-right">
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
					Order ID
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="no_order" name="no_order" value="<?= $no_order ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('no_order'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Lokasi
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" readonly><?= $lokasi ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('lokasi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Kode Lokasi
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="kode_lokasi" name="kode_lokasi" value="#<?= $kode_lokasi ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('kode_lokasi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Klien
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="klien" name="klien" value="<?= $klien ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('klien'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Owner
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="owner" name="owner" value="<?= $owner ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('owner'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Waktu Tayang
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" value="<?= $durasi.' bulan, '.$start.' - '.$end ?>" readonly>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status
				</label>
				<div class="col-3">
					<!-- <?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Active',
							  		'0' => 'Inactive'  
						  		);
				  	echo form_dropdown('status', $options, $status, $additional_dd_code);
				  	?>
					 -->
					<input class="form-control m-input m-input--air" type="text" id="status" name="status" value="<?= $status ?>" readonly> 
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('status'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Selected
				</label>
				<div class="col-3">
					<!-- <?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Selected',
							  		'0' => 'Unselected'  
						  		);
				  	echo form_dropdown('selected', $options, $selected, $additional_dd_code);
				  	?> -->
					<input class="form-control m-input m-input--air" type="text" id="selected" name="selected" value="<?= $selected ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('selected'); ?></div>
				</div>
			</div>
			
			
		</div>
		
	</div>
</div>
<!--end::Portlet-->

<!-- <?php
$path_img = base_url().'marketplace/materi/'.$materi_image;
if ($materi_image != "") { ?>

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
				<img src="<?= $path_img ?>" width="" style="width: 100%;">
			</div>
		</div>
	</div>	
</div>
			
<?php } ?>	
 -->
