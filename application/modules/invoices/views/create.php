
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

  

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
	$form_location = base_url()."invoices/add/".$update_id; 
	?>
	<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= $form_location ?>">
		<input type="hidden" name="id_transaction" id="id_order">
		<input type="hidden" name="status" id="" value="Unpaid">
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
					<input class="form-control m-input m-input--air" type="text" id="reference_no" name="reference_no" value="INV<?php
			
                        $this->load->module('invoices');
                        echo $this->invoices->generate_invoice_number();
					?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('reference_no'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					NO Approval
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <input type="text" name="approve_no" class="form-control m-input" value="">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('approve_no'); ?></div>
				</div>
			</div>

			

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					No transaksi
				</label>
				<div class="col-6">
					<select name="no_transaksi" id="no_transaksi" class="form-control selectpicker" data-live-search="true">
						<?php
						$this->db->order_by('id', 'DESC');
						$orders = $this->db->get('store_orders');
                        foreach ($orders->result_array() as $row) { ?>
                            <option value="<?= $row['no_transaksi'] ?>"><?= $row['no_transaksi'] ?></option>
                        <?php } ?>
				    </select>
				</div>
				<div class="col-4">
					<span id="pesan"></span>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Klien
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <input type="text" name="klien" id="klien" class="form-control m-input">
                        <input type="hidden" name="client" id="client" class="form-control m-input">
                    </div>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('client'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Lokasi
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" id="lokasi" rows="3"></textarea>
					<!-- <select class="form-control m-input m-input--air" id="lokasi" name="lokasi"></select> -->
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('lokasi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Deadline
				</label>
				<div class="col-3">
					<input class="form-control m-input m-input--air" type="text" id="due_date" name="due_date" value="<?= $due_date ?>" data-date-format="dd-mm-yyyy">
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
                        <input type="text" name="ppn" class="form-control m-input" value="10.00">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('ppn'); ?></div>
				</div>
			</div>
			<!-- <div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					PPH
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <span class="input-group-addon" id="basic-addon1">
                            %
                        </span>
                        <input type="text" name="pph" class="form-control m-input" value="">
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
                        <input type="text" name="discount" class="form-control m-input" value="">
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
                        <input type="text" name="extra_fee" class="form-control m-input" value="">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('extra_fee'); ?></div>
				</div>
			</div> -->
			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Catatan
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="notes"><?= $notes ?></textarea>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script>
	$('#due_date').datepicker({
	    format: 'mm-dd-yyyy',
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
	$('.selectpicker').selectpicker();

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

document.getElementById('no_transaksi').addEventListener('change', selectTransaction);

function selectTransaction(e) {
	var trans_num = e.target.value;
	var lokasi = document.getElementById('lokasi');
	var klien = document.getElementById('klien');
	var client = document.getElementById('client');
	var id_order = document.getElementById('id_order');
	var pesan = document.getElementById('pesan');

	jQuery.ajax({
        type: 'POST',
        url: '<?= base_url() ?>invoices/getOrder',
        data: {no_transaksi:trans_num},  
        dataType: 'json',
        success: function (resp) {
            console.log(resp);
            lokasi.value = resp.lokasi;
            klien.value = resp.klien;
            client.value = resp.shopper_id;
            id_order.value = resp.id_order;
            pesan.innerHTML = resp.remaining;
            var url = '<?= base_url()?>modal/popup/detail_order/'+resp.id_order+'/invoices';
            showAjaxModal2(url);
        },
       	error: function (xhr,status,error) {             
            swal("Data tidak ditemukan!","Silahkan cek database","warning")
        }
    });
}

    function showAjaxModal(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal_ajax .modal-content').html(response);

            }
        });
    }

    function showAjaxModal2(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#m_modal_4 .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#m_modal_4').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#m_modal_4 .modal-content').html(response);
                $('#summernote').summernote({
                	height: 200,
			    	dialogsInBody: true
			    });
            }
        });
    }
</script>
    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
			</div>
		</div>
	</div>

	<!-- modal width -->

    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				
			</div>
		</div>
	</div>
    
    <!-- end modal width -->