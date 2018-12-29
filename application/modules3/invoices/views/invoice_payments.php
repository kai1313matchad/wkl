<?php $inv = Invoice::view_by_id($id); ?>

<style>
	.block {
		display: block;
	}
	.m-l-xs {
	    margin-left: 5px;
	}
	.avatar {
		margin-right: 5px;
	}
</style>

<div class="m-portlet m-portlet--mobile">
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




	<div class="m-portlet__body">
		
		<!--begin: Datatable -->
		<table class="m-datatable" id="html_table" width="100%">
			<thead>
				<tr>
					<th title="Field #1">
						Trans ID
					</th>
					<th title="Field #2">
						Nama Klien
					</th>
					<th title="Field #3">
						Payment Date
					</th>
					<th title="Field #4">
						Jumlah
					</th>
					
					<th title="Field #6">
						Payment Method
					</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($payments as $key => $p) { ?>
	
				<tr class="<?=($row->status == 'Cancelled') ? 'text-danger' : '';?>">
					<td>
						<a href="<?=base_url()?>payments/view/<?=$p->p_id?>" class="small text-info">
                            <?=$p->trans_id?>
                        </a>
					</td>
					<td>
						<?php echo Client::view_by_id($p->paid_by)->company_name; ?>
					</td>
					<td>
						<?=strftime(config_item('date_format'), strtotime($p->payment_date));?>
					</td>
					<td>
						<?=Applib::format_currency($inv->currency, $p->amount)?>
					</td>
					
					<td>
						<?php echo App::get_method_by_id($p->payment_method); ?>
					</td>
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<!--end: Datatable -->
	</div>
</div>

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
