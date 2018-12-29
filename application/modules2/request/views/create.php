
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
		
		<?php
		$detail_request = base_url()."request/view/".$update_id;
		?>

		<?php
		if (isset($update_id)) {
		?>
		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
				<a href="<?= $detail_request ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
					<span>
						<span>
							Lihat Detail
						</span>
					</span>
				</a>
							
			<div class="m-separator m-separator--dashed d-xl-none"></div>
		</div>
		<?php } ?>
	</div>
	<!--begin::Form-->

	<?php 
	$form_location = base_url()."request/add/".$update_id; 
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
					Request Code
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="req_code" name="req_code" value="<?php
                        $this->load->module('request');
                        if(isset($req_code)) {
                        	echo $req_code;
                    	} else {
                    		echo $this->request->generate_request_code();
                    	}
					?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('req_code'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Klien
				</label>
				<div class="col-6">
					<?php 
                        $additional_dd_code = 'class="form-control m-input m-input--air" id="klien"';
                        $daftar_klien = array('' => 'Please Select',);
                        foreach ($clients->result_array() as $row) {
                            $daftar_klien[$row['id']] = $row['username'];   
                        }
                        echo form_dropdown('client', $daftar_klien, $client, $additional_dd_code);
                        ?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('client'); ?></div>
				</div>
			</div>

			<!-- <div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Lokasi
				</label>
				<div class="col-6">
					<select class="form-control m-input m-input--air" id="lokasi" name="lokasi"></select>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('lokasi'); ?></div>
				</div>
			</div> -->

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Ditugaskan Ke
				</label>
				<div class="col-6">
					<?php 
                        $additional_dd_code = 'class="form-control m-input m-input--air" id="klien"';
                        $client_list = array('' => 'Please Select',);
                        foreach ($clients->result_array() as $row) {
                            $client_list[$row['id']] = $row['username'];   
                        }
                        echo form_dropdown('assigned_to', $client_list, $assigned_to, $additional_dd_code);
                        ?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('assigned_to'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Request Title
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="req_title" name="req_title" value="<?= $req_title ?>" data-date-format="dd-mm-yyyy">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('req_title'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					Priority
				</label>
				<div class="col-6">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Low',
							  		'2' => 'Medium',
							  		'3' => 'High',
							  		'4' => 'Urgent'
						  		);
				  	echo form_dropdown('priority', $options, $priority, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('priority'); ?></div>
				</div>
			</div>
			<!-- <div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					Request Status
				</label>
				<div class="col-6">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Resolved',
							  		'2' => 'Closed',
							  		'3' => 'Open',
							  		'4' => 'Pending'
						  		);
				  	echo form_dropdown('req_status', $options, $req_status, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('req_status'); ?></div>
				</div>
			</div> -->
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Deadline
				</label>
				<div class="col-3">
					<input class="form-control m-input m-input--air" type="text" id="due_date" name="deadline" value="<?= $deadline ?>" data-date-format="dd-mm-yyyy">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('deadline'); ?></div>
				</div>
			</div>
			
			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Catatan
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="req_desc"><?= $req_desc ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('req_desc'); ?></div>
				</div>
			</div>
			
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-6">
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

<script type="text/javascript" src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script>
	$('#due_date').datepicker({
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