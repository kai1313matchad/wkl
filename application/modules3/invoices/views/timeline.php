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
	?>
		<div class="m-portlet__body">
			<div class="form-group m-form__group m--margin-top-10">
				<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>
			</div>
			
			<div id="activity">
				<ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                <?php foreach ($activities as $key => $a) { ?>
                    <li class="list-group-item">

                        <a class="pull-left thumb-sm avatar">
                			<img src="<?= base_url() ?>assets/app/media/img/users/user4.jpg" class="img-rounded" style="border-radius: 6px;">
                        </a>

                		<a href="#" class="clear">
                			<small class="pull-right"><?=strftime("%b %d, %Y %H:%M:%S", strtotime($a->activity_date)) ?></small>
                            <strong class="block m-l-xs"><?=ucfirst(App::get_admin_by_id($a->user)->username)?></strong>
                          	<small class="m-l-xs">
                                <?php
                                if ($a->activity != '') {
                                    if (isset($a->value1)) {
                                        if (isset($a->value2)){
                                            echo str_replace('_', ' ', $a->activity).' <em>'.$a->value1.'</em> '.'<em>'.$a->value2.'</em>';
                                        } else {
                                            echo sprintf($a->activity, '<em>'.$a->value1.'</em>');
                                        }
                                    } else { echo $a->activity; }
                                } else { echo $a->activity; }
                                ?>
                            </small>
                        </a>
                    </li>
                <?php } ?>

                </ul>
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

