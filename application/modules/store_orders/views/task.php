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
			<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/tambah_task/<?=$update_id?>/store_orders');" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
									#
								</th>

								<th title="Field #2">
									Task
								</th>
								<th title="Field #3">
									Status
								</th>
								<th title="Field #4">
									Waktu
								</th>
							
								<th title="Field #5">
									Aksi
								</th>
								
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							$this->load->module('timedate');
							foreach ($query->result() as $row) { 
						  		$status = $row->stat_task_order;

						  		if ($status == 'Done') {
						  			$status_label = "m-badge--success";
						  			$status_desc = "Done";
						  			$logo = 'ban';
						  			$modal = 'set_undone';
						  			$title = 'Set Undone';
						  		} else {
						  			$status_label = "m-badge--danger";
						  			$status_desc = "Undone";
						  			$logo = 'check-square';
						  			$modal = 'set_done';
						  			$title = 'Set Done';
						  		}

						  		$date = $this->timedate->get_nice_date($row->date_made, 'indo');
						  	?>
							<tr>
								<td>
									<?= $no++ ?>
								</td>
								<td>
									<?= $row->task_name ?>
								</td>
								<td>
									<span style="width: 110px;"><span class="m-badge <?= $status_label ?> m-badge--wide"><?= $status_desc ?></span></span>
								</td>
								<td>
									<?= $date ?>
								</td>
								
								<td data-field="Actions" class="m-datatable__cell">
									<span style="overflow: visible; width: 110px;">						
																			
										<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/delete_task/<?=$row->id?>/store_orders');" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete" data-toggle="modal" data-target="#<?= $row->id_task_order ?>">							
											<i class="la la-trash"></i>						
										</a>

										<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/<?= $modal ?>/<?=$row->id?>/store_orders');" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="<?= $title ?>" data-toggle="modal" data-target="#<?= $row->id_task_order ?>">
											<i class="la la-<?= $logo ?>"></i>						
										</a>
														
									</span>
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
