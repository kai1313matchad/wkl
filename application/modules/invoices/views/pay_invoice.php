<?php $inv = Invoice::view_by_id($id); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.css">

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			
			<div class="m-demo__preview m-demo__preview--btn">
				
				<a href="<?=site_url()?>invoices/view/<?=$inv->inv_id?>" class="btn btn-info m-btn m-btn--icon m-btn--icon-only" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="View Invoice" data-skin="dark">
					<i class="la la-eye"></i>
				</a>
				<a href="<?= base_url() ?>invoices/edit/<?=$inv->inv_id?>" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Edit Invoice" data-skin="dark">
					<i class="la la-edit"></i>
				</a>
				<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/delete_invoice/<?=$inv->inv_id?>/invoices');" data-toggle="modal" data-target="#m_modal" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Delete Invoice" data-skin="dark">
					<i class="la la-trash"></i>
				</a>

				<!--  -->
				<div class="m-dropdown m-dropdown--inline m-dropdown--arrow" data-dropdown-toggle="click" aria-expanded="true">
					<a href="#" class="m-dropdown__toggle btn btn-success dropdown-toggle">
						More
					</a>
					<div class="m-dropdown__wrapper">
						<span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
						<div class="m-dropdown__inner">
							<div class="m-dropdown__body">
								<div class="m-dropdown__content">
									<ul class="m-nav">
										
										<li class="m-nav__item">
											<a href="#" onclick="showAjaxModal2('<?= base_url()?>modal/popup/email_invoice/<?=$inv->inv_id?>/invoices');" data-toggle="modal" data-target="#m_modal" class="m-nav__link">
												<i class="m-nav__link-icon la la-envelope"></i>
												<span class="m-nav__link-text">
													Email Invoice
												</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="#" onclick="showAjaxModal2('<?= base_url()?>modal/popup/invoice_reminder/<?=$inv->inv_id?>/invoices');" data-toggle="modal" data-target="#m_modal" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-paper-plane"></i>
												<span class="m-nav__link-text">
													Send Reminder
												</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="<?= base_url() ?>invoices/timeline/<?=$inv->inv_id?>" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-time-2"></i>
												<span class="m-nav__link-text">
													Invoice History
												</span>
											</a>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="m-portlet__head-tools">
			<a href="<?= base_url() ?>invoices/pdf/<?= $inv->inv_id ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
				<span>
					<i class="la la-file-pdf-o"></i>
					<span>
						PDF
					</span>
				</span>
			</a>
		</div>
		
	</div>
	<!--begin::Form-->

	<?php 
	$this->load->helper('string');
	$form_location = base_url()."invoices/pay/"; 
	?>
	<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= $form_location ?>">
		<input type="hidden" name="invoice" value="<?=$id?>">
        <input type="hidden" name="currency" value="">
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
					Trans ID
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="trans_id" name="trans_id" value="<?=random_string('nozero', 6);?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('trans_id'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Jumlah
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="amount" name="amount" value="<?= Invoice::get_invoice_due_amount($id) ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('amount'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Tanggal Pembayaran
				</label>
				<div class="col-3">
					<input class="form-control m-input m-input--air" type="text" id="payment_date" name="payment_date" value="<?= date('d-m-Y')?>" data-date-format="dd-mm-yyyy">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('payment_date'); ?></div>
				</div>
			</div>
			
			
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Metode Pembayaran
				</label>
				<div class="col-6">
					<select name="payment_method" class="form-control">
                        <?php
                        foreach (Invoice::payment_methods() as $key => $m) { ?>
                            <option value="<?=$m->method_id?>"><?=$m->method_name?></option>
                        <?php } ?>
                    </select>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('payment_method'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Catatan
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="notes"></textarea>
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
							Submit Pembayaran
						</button>
						
						<a href="<?=base_url()?>invoices/view/<?=$id?>" class="btn btn-secondary">Close</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!--end::Portlet-->

<script type="text/javascript" src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.js"></script>

<script type="text/javascript">
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

    <script type="text/javascript">
    function confirm_modal(delete_url)
    {
        jQuery('#modal-4').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
    </script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Are you sure to delete this ?
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						×
					</span>
				</button>
				</div>
                
                <div class="modal-footer">
                	<a href="#" class="btn btn-danger" id="delete_link">delete</a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Cancel
					</button>
				</div>
			</div>
		</div>
	</div>	

<script>
	$('#payment_date').datepicker({
	    format: 'dd/mm/yyyy'
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