<?php 
	$form_location = base_url()."invoices/edit/".$id; 
	$i = Invoice::view_by_id($id);
?>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.css">

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					<?= $headline ?> - <?=$i->reference_no?>
				</h3>
			</div>
		</div>

		<div class="m-portlet__head-tools">
			<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link active" href="<?=base_url()?>invoices/view/<?=$i->inv_id?>" role="tab" aria-expanded="true">
						Invoice Detail
					</a>
				</li>
			</ul>
		</div>
		
	</div>
	<!--begin::Form-->

	
	<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= $form_location ?>">
		<input type="hidden" name="inv_id" value="<?=$i->inv_id?>">
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
					Ref No
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="reference_no" name="reference_no" value="<?=$i->reference_no?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('reference_no'); ?></div>
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
                        echo form_dropdown('client', $daftar_klien, $i->client, $additional_dd_code);
                        ?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('client'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Lokasi
				</label>
				<div class="col-6">
					<select class="form-control m-input m-input--air" id="lokasi" name="lokasi">
						<option value="<?=$i->id_transaction?>">
                            <?=ucfirst(Invoice::view_item_by_id($i->id_transaction)->item_title)?></option>
                        </option>
						<?php foreach ($locations as $location): ?>
                            <option value="<?= $location->id ?>">
                                <?= $location->item_title ?></option>
                        <?php endforeach;  ?>
					</select>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('lokasi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Deadline
				</label>
				<div class="col-3">
					<input class="form-control m-input m-input--air" type="text" id="m_datepicker_1" name="due_date" value="<?=strftime('%d-%m-%Y', strtotime($i->due_date));?>" data-date-format="dd-mm-yyyy">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('due_date'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					PPN
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <span class="input-group-addon" id="basic-addon1">
                            %
                        </span>
                        <input type="text" name="ppn" class="form-control m-input" value="<?=$i->tax?>">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('ppn'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					PPH
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <span class="input-group-addon" id="basic-addon1">
                            %
                        </span>
                        <input type="text" name="pph" class="form-control m-input" value="<?=$i->tax2?>">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('pph'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Discount
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <span class="input-group-addon" id="basic-addon1">
                            %
                        </span>
                        <input type="text" name="discount" class="form-control m-input" value="<?=$i->discount?>">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('discount'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Extra Fee
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <span class="input-group-addon" id="basic-addon1">
                            %
                        </span>
                        <input type="text" name="extra_fee" class="form-control m-input" value="<?=$i->extra_fee?>">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('extra_fee'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Catatan
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="notes"><?=$i->notes?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('notes'); ?></div>
				</div>
			</div>
			
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-6">
						<button type="submit" class="btn btn-success" name="submit" value="Submit">
							Save Change
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

<script type="text/javascript" src="<?= base_url() ?>assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script>
	$('#due_date').datepicker({
	    format: 'mm/dd/yyyy',
	    startDate: '-3d'
	});

	// get lokasi
	$('#klien').change(function(){
		$.post("<?php echo base_url();?>store_basket/get_location/"+$('#klien').val(),{},function(obj){
			$('#lokasi').html(obj);
		});
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