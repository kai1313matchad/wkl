

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
	.thumb img {
		width: 8.6rem;
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
					<a href="<?=base_url()?>store_orders/tracking/off/<?=$update_id?>" class="btn btn-<?= $label ?> m-btn m-btn--icon"  title="stop timer">
						<i class="la la-dashboard"></i>Stop
					</a>
				<?php else: ?>
					<a href="<?=base_url()?>store_orders/tracking/on/<?=$update_id?>" class="btn btn-<?= $label ?> m-btn m-btn--icon"  title="start timer">
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
		</div>

		
		
	</div>
	<!--begin::Form-->

	<!-- alert -->
<?php 
if (isset($flash)) {
	echo $flash;
}
?>

	
		<div class="m-portlet__body">

			<?php require_once('tabs.php'); ?>
			
			<?php 
			if (isset($info)) {
				echo $info;
			}
			?>

			<div class="tab-content">
				
				<div class="tab-pane active">

                    <div class="m-widget4">
                    	<?php
                    	if (isset($query)) {
                    		
                    	$this->load->module('timedate');
                    	foreach ($query->result() as $row) {
                    		$path_img = base_url().'marketplace/laporan/convert/'.$row->image;
                    		$path_download = base_url().'store_orders/download_report/'.$row->id;
                    		$date = $this->timedate->get_nice_date($row->created_at, 'cool');
                    	?>	
                        <div class="m-widget4__item">
							<div class="m-widget4__img thumb">
								<img class="" src="<?= $path_img ?>" alt="">
							</div>
							<div class="m-widget4__info">
								<span class="m-widget4__text">
									<?= $row->waktu.' - '.$date ?> 
								</span>
							</div>
							<div class="m-widget4__ext">
								<a href="<?= $path_download ?>" class="m-widget4__icon">
									<i class="la la-download"></i>
								</a>
							</div>
						</div>
						
					<?php } } ?>

					</div>
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
