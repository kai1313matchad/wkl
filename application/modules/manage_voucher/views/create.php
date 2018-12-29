<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.css">

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
	$this->load->module('timedate');
	$attribute = array('class' => 'm-form m-form--fit m-form--label-align-right');
	echo form_open_multipart('manage_voucher/create/'.$update_id, $attribute);
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
					Judul Voucher
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="voucher_title" name="voucher_title" value="<?= $voucher_title ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('voucher_title'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Ketentuan
				</label>
				<div class="col-8">
					<textarea id="summernote" name="ketentuan"><?= $ketentuan ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('ketentuan'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Cara Pakai
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" id="summernote2" name="cara_pakai"><?= $cara_pakai ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cara_pakai'); ?></div>
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
					Poin yang dibutuhkan
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="point_use" name="point_use" value="<?= $point_use ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('point_use'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Minimal Belanja
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="min_transaction" name="min_transaction" value="<?= $min_transaction ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('min_transaction'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Jumlah Voucher
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="num_voucher" name="num_voucher" value="<?= $num_voucher ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('num_voucher'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Durasi Promo
				</label>
				<div class="col-3">
					<input class="form-control m-input m-input--air" type="text" id="start" name="start" value="<?php 
					if(isset($update_id)) {
						echo $this->timedate->get_nice_date($start, 'indo');
					} else {
						echo date('d-m-Y');
					} ?>" data-date-format="dd-mm-yyyy">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('start'); ?></div>
				</div>
				<div class="col-3">
					<input class="form-control m-input m-input--air" type="text" id="end" name="end" value="<?php 
					if(isset($update_id)) {
						echo $this->timedate->get_nice_date($end, 'indo');
					} else {
						echo date('d-m-Y');
					} ?>" data-date-format="dd-mm-yyyy">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('end'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status
				</label>
				<div class="col-3">
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
$path_img = base_url().'marketplace/voucher/'.$featured_image;
if ($featured_image != "") { ?>

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

<script type="text/javascript" src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script>
	$('#start, #end').datepicker({
	    format: 'dd/mm/yyyy',
	    startDate: '-3d'
	});
	
</script>
<script>
	
// only number input
$("#rekening").keypress(validateNumber);

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};
</script>