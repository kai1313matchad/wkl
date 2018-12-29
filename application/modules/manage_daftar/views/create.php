
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

		<?php 
		$update_password = base_url()."manage_daftar/update_pword/".$update_id;
		if (is_numeric($update_id)) { 
		?>	
			<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
				<button type="button" class="btn m-btn--pill btn-secondary">
					<span><?= ($coin != '') ? $coin : 0 ?> <img src="<?= base_url() ?>marketplace/images/coins.png"></span>
				</button>
				<a href="<?= $update_password ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
					<span>
						<i class="la la-edit"></i>
						<span>
							Update Password
						</span>
					</span>
				</a>
				<div class="m-separator m-separator--dashed d-xl-none"></div>
			</div>
		<?php } ?>	
	</div>
	<!--begin::Form-->

	<?php 
	$form_location = base_url()."manage_daftar/create/".$update_id; 
	$path_ktp = base_url().'marketplace/ktp/'.$ktp;
	$path_npwp = base_url().'marketplace/npwp/'.$npwp;
	?>
	<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= $form_location ?>">
		<div class="m-portlet__body">
			<div class="form-group m-form__group m--margin-top-10">
				<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>
			</div>

		<div class="row">	
		<?php
		$grid = ($ktp != '') ? '8' : '12';
		if ($ktp != '') { ?>
			<div class="col-lg-4">
				<div class="form-group m-form__group row2" style="padding-left: 20px;">
					<div class="m-widget4__img thumb2">
						<img src="<?= $path_ktp ?>" class="img-responsive" width="300">
					</div>
					<div>
						<?php if ($npwp != '') { ?>
						<img src="<?= $path_npwp ?>" width="300">
						<?php } ?>
					</div>
					
				</div>
			</div>
			
		<?php } ?>
		<div class="col-lg-<?= $grid ?>">

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Nama
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="nama" name="nama" value="<?= $username ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('nama'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					Email
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="email" id="email" name="email" value="<?= $email ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('email'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					No Telpon
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="phone" id="telp" name="no_telp" value="<?= $no_telp ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('no_telp'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Alamat
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="alamat"><?= $alamat ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('alamat'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Active',
							  		'0' => 'Inactive'  
						  		);
				  	echo form_dropdown('status', $options, $status, $additional_dd_code);
				  	?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('status'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Verifikasi
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Verified',
							  		'0' => 'Unverified'  
						  		);
				  	echo form_dropdown('verified', $options, $verified, $additional_dd_code);
				  	?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('status'); ?></div>
				</div>
			</div>

			</div></div>
			
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-5"></div>
					<div class="col-7">
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

