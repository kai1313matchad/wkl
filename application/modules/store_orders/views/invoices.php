<style>
	#item_price {
		font-size: 24px; font-weight: bold; color: #f4516c; float: right;
	}
	.m-messenger__message-username {
		font-weight: 600;
	}
	.tanggal-komen {
		font-style: italic;
		font-size: 11px;
		font-weight: normal;
	}

	#alerte {
		color: red;
		font-weight: 600;
		font-size: 11px;
	}

	h5.ket-klien {
	    color: #333;
	    text-align: center;
	    text-transform: uppercase;
	    font-family: "Roboto", sans-serif;
	    font-weight: bold;
	    position: relative;
	    margin: 20px 0 60px;
	}

	h5.ket-klien::after {
	    content: "";
	    width: 100px;
	    position: absolute;
	    margin: 0 auto;
	    height: 3px;
	    background: #8fbc54;
	    left: 0;
	    right: 0;
	    bottom: -10px;
	}
</style>


<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-demo__preview m-demo__preview--btn">
				<?php 
				$timer_status = Project::timer_status('order', $update_id, $shopper_id);
				$label = ($timer_status == 'On') ? 'danger' : 'secondary';	
				if ($timer_status == 'On') : ?>
					<a href="<?=base_url()?>store_orders/tracking/off/<?=$update_id?>" class="btn btn-<?= $label ?> m-btn m-btn--icon"  title="start timer">
						<i class="la la-dashboard"></i>Stop
					</a>
				<?php else: ?>
					<a href="<?=base_url()?>store_orders/tracking/on/<?=$update_id?>" class="btn btn-<?= $label ?> m-btn m-btn--icon"  title="stop timer">
						<i class="la la-dashboard"></i>Start
					</a>
				<?php endif; ?>

				<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/mark_complete/<?=$update_id?>/store_orders');" data-toggle="modal" data-target="#m_modal" class="btn btn-info m-btn m-btn--icon" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Mark as Complete" data-skin="dark">
					<i class="la la-check-square"></i>Done
				</a>

				<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/send_tax/<?=$update_id?>/store_orders');" data-toggle="modal" data-target="#m_modal" class="btn btn-warning m-btn m-btn--icon" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Delete Order" data-skin="dark">
					<i class="la la-file-pdf-o"></i>Kirim Faktur Pajak
				</a>

				<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/delete/<?=$update_id?>/store_orders');" data-toggle="modal" data-target="#m_modal" class="btn btn-danger m-btn m-btn--icon" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Delete Order" data-skin="dark">
					<i class="la la-trash"></i>Delete
				</a>
			</div>
		</div>

		<div class="m-portlet__head-tools">
			<a href="<?= base_url() ?>store_orders/manage" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-reply"></i>
					<span>
						Back
					</span>
				</span>
			</a>
			<a href="<?= base_url() ?>invoices/add" target="_blank" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-plus"></i>
					<span>
						Tambah
					</span>
				</span>
			</a>

			
		</div>

		
		
	</div>
	<!--begin::Form-->

<div class="container">
	<!-- alert -->
<?php 
$this->load->module('site_settings');
if (isset($flash)) {
	echo $flash;
}
?>
</div>
	
		<div class="m-portlet__body">

			<?php require_once('tabs.php'); ?>

			<?php 
			if (isset($info)) {
				echo $info;
			}
			?>

			<div class="tab-content">
				
				<div class="tab-pane active">
					
					<table class="m-datatable" id="html_table" width="100%">
						<thead>
							<tr>
								<th title="Field #1">
									Invoice
								</th>
								<th title="Field #2">
									Nama Klien
								</th>
								<th title="Field #3">
									Status
								</th>
								<th title="Field #4">
									Deadline
								</th>
								
								<th title="Field #6">
									Total
								</th>
								<th>
									Total Tagihan
								</th>
								
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($query->result() as $row) { 
						  		$status = $row->status;

						  		switch ($status) {
			                        case 'fully_paid': $label2 = 'success';  break;
			                        case 'partially_paid': $label2 = 'warning'; break;
			                        case 'not_paid': $label2 = 'danger'; break;
			                        case 'Unpaid': $label2 = 'primary'; break;
			                    }

						  		
						  	?>
							<tr class="<?=($row->status == 'Cancelled') ? 'text-danger' : '';?>">
								<td>
									<span style="overflow: visible; width: 110px;">						
										<!-- <div class="dropdown ">							
											<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                
												<i class="la la-ellipsis-h"></i>                            
											</a>						  	
											<div class="dropdown-menu dropdown-menu-right">						    	
												<a class="dropdown-item" href="<?=base_url()?>invoices/view/<?=$row->inv_id?>"><i class="la la-file-text"></i> Preview Invoice</a>						    	
												<a class="dropdown-item" href="<?=base_url()?>invoices/edit/<?=$row->inv_id?>"><i class="la la-edit"></i> Edit Invoice</a>						    	
												<a class="dropdown-item" href="<?=base_url()?>invoices/timeline/<?=$row->inv_id?>"><i class="la la-files-o"></i> Invoice History</a>						  	
												<a class="dropdown-item" href="<?=base_url()?>invoices/send_invoice/<?=$row->inv_id?>"><i class="la la-envelope"></i> Email Invoice</a>						    	
												<a class="dropdown-item" href="<?=base_url()?>invoices/remind/<?=$row->inv_id?>"><i class="la la-send"></i> Send Reminder</a>						    	
												<a class="dropdown-item" href="<?=base_url()?>invoices/pdf/<?=$row->inv_id?>"><i class="la la-print"></i> PDF</a>

												<a class="dropdown-item" href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/delete_invoice/<?=$row->inv_id?>/invoices');"><i class="la la-trash"></i> Delete Invoice</a>
											</div>						
										</div> -->						
										<a href="<?= base_url() ?>invoices/view/<?= $row->inv_id ?>" target="_blank"><?= $row->reference_no ?></a>					
									</span>
									
								</td>
								<td>
									<?php
									if (Client::view_by_id($row->client)->company == '') {
										echo Client::view_by_id($row->client)->username;
									} else {
										echo Client::view_by_id($row->client)->company;
									}
									?>
								</td>
								<td style="text-align: center;">
									<div class="m-demo__preview m-demo__preview--badge">
										<span class="m-badge m-badge--<?= $label2 ?> m-badge-wide" style="color: #fff; padding: 0 10px;">
											<?= $row->status ?>
										</span>
									</div>
								</td>
								<td>
									<?= $row->due_date ?>
								</td>
								
								<td>
									<?= $this->site_settings->currency_format(Invoice::get_invoice_subtotal($row->inv_id)) ?>
								</td>
								<td>
									<?= $this->site_settings->currency_format(Invoice::get_invoice_due_amount($row->inv_id))  ?>
								</td>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>
				
			</div>

		</div>
</div>
<!--end::Portlet-->



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
