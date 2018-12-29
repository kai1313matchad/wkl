
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

		
	</div>
	<!--begin::Form-->

	<?php 
	$attribute = array('class' => 'm-form m-form--fit m-form--label-align-right');
	echo form_open_multipart('notifications/create/'.$update_id, $attribute);
	?>
	<input type="hidden" name="author" value="1">
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
					Kategori
				</label>
				<div class="col-6">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'Promo' => 'Promo',
							  		'Tips' => 'Tips',
							  		'Event' => 'Event',
							  		'Notifikasi_pembeli' => 'Notifikasi Pembeli',
							  		'Notifikasi_penjual' => 'Notifikasi Penjual',
							  		'Lain-lain' => 'Lain-lain' 
						  		);
				  	echo form_dropdown('module', $options, $module, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('module'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Judul Notifikasi
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="notify_title" name="notify_title" value="<?= $notify_title ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('notify_title'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Notifikasi
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="notification" name="notification" value="<?= $notification ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('notification'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Gambar
				</label>
				<div class="col-6">
					<label class="custom-file">
						<input type="file" id="file2" class="custom-file-input" name="featured_image">
						<span class="custom-file-control form-control"></span>
					</label>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('featured_image'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Value 1
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="value1" name="value1" value="<?= $value1 ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('value1'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Value 2
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="value2" name="value2" value="<?= $value2 ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('value2'); ?></div>
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
	</form>
</div>
<!--end::Portlet-->

<?php
if (isset($image)) $path_img = base_url().'marketplace/notifikasi/'.$image;
if ($image != "") { ?>

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
