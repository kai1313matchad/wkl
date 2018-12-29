
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
	$form_location = base_url()."confirmation/update/".$update_id; 
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
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Order ID
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="order_id" name="order_id" value="<?= $order_id ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('order_id'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					No Rekening
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="no_rek" name="no_rek" value="<?= $no_rek ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('no_rek'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Tgl Transaksi
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="tgl_transaksi" name="tgl_transaksi" value="<?= $tgl_transaksi ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('tgl_transaksi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Nama Kustomer
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="customer" name="customer" value="<?= $customer ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('customer'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Email
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="email" id="email" name="email" value="<?= $email ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('email'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Nominal Transfer 
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="jml_transfer" name="jml_transfer" value="<?= $jml_transfer ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('jml_transfer'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Bank
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$jenis_bank = array('' => 'Please Select',);
			        foreach ($banks->result_array() as $row) {
			            $jenis_bank[$row['id']] = $row['title'];   
			        }
				  	echo form_dropdown('nama_bank', $jenis_bank, $nama_bank, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('nama_bank'); ?></div>
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
							  		'1' => 'Terkonfirmasi',
							  		'0' => 'Belum Terkonfirmasi'  
						  		);
				  	echo form_dropdown('status', $options, $status, $additional_dd_code);
				  	?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('status'); ?></div>
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
$path_img = base_url().'LandingPageFiles/banner/'.$big_pic;
if ($big_pic != "") { ?>

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