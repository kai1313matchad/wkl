<?php $inv = Invoice::view_by_id($id); ?>

<style>
@media print {
	.hidden-print,tr.hidden-print,th.hidden-print,td.hidden-print{
		display:none !important;
	}
}

	.well {
	    min-height: 20px;
	    padding: 19px;
	    margin-bottom: 20px;
	    background-color: #ffff;
	    border: 1px solid #eeef;
	    color: rgba(255, 255, 255, 1.);
	    border-radius: 4px;
	    -webkit-box-shadow: inset 0 1px 1px rgb(0, 0, 0);
	    box-shadow: inset 0 1px 1px rgb(0, 0, 0);
	}
	.bg-success {
	    background-color: #1b9;
	    color: #ebf4e4;
	}
	.bg-danger {
	    background-color: #f55f;
	    color: #fff;
	}
	.text-right {
	    text-align: right;
	}
	.text-center {
	    text-align: center;
	}
	.no-gutter-right {
	    padding-right: 0;
	}
	.no-gutter {
	    padding-right: 0;
	    padding-left: 0;
	}
	.drag-handle {
	    cursor: ns-resize;
	}
	.btn-dark {
	    color: rgba(255, 255, 255, 1.) !important;
	    background-color: #334f;
	    border-color: #234f;
	}
	.btn-dark:hover, .btn-dark:focus, .btn-dark:active, .btn-dark.active, .open .dropdown-toggle.btn-dark {
	    color: rgba(255, 255, 255, 1.) !important;
	    background-color: #233f;
	    border-color: #1f2a34;
	}
	.m-t {
	    margin-top: 15px;
	}
	.line {
	    height: 2px;
	    margin: 10px 0;
	    font-size: 0;
	    overflow: hidden;
	    background-color: transparent;
	    border-width: 0;
	    border-top: 1px solid #e8e8e8;
	}
	blockquote {
	    padding: 10px 20px;
	    margin: 0 0 20px;
	    border-left: 5px solid #eeeeee;
	    font-size: 13px;
	}
	.logo-in-here {
		margin-top: 20px;
	}
	.ie-logo {
		width: 250px;
	}
	.info-terkait {
		padding: 20px;
		border: 1px dashed rgba(187, 187, 187, 1.);
	}
	.judul-info {
		font-weight: 800;
		text-transform: uppercase;
	}
	.rupiah {
		text-align: left;
		*display: block;
		margin-right: 20px;
	}

	.border-me {
		border-top: 1px solid #e3e3e3 !important; 
		border-bottom: 1px solid #eeef !important;
	}
	.border-me-top {
		border-top: 1px solid #eeef !important; 
	}

	/*.ribbon {
	    position: absolute!important;
	    *top: -5px;
	    *left: -5px;
	    *overflow: hidden;
	    width: 96px;
	    height: 94px;
	    border-bottom-right-radius: 92px;
	    *z-index: 999;
	}
	.ribbon .ribbon-inner {
	    text-align: center;
	    color: rgba(255, 255, 255, 1.);
	    top: -7px;
	    left: -60px;
	    width: 135px;
	    padding: 3px;
	    position: relative;
	    -webkit-transform: rotate(-45deg);
	    -ms-transform: rotate(-45deg);
	    transform: rotate(-45deg);

	}
	.ribbon .ribbon-success {
	    background: #1fcd6d;
	    border-color: #1a5f;
	}*/
	/*.ribbon-wrapper {
	  	width: 85px;
	  	height: 88px;
	  	*overflow: hidden;
	  	position: absolute;
	  	top: -3px;
	  	left: -3px;
	}
	.ribbon-wrapper .ribbon {
	  	font: bold 15px sans-serif;
	  	color: rgba(51, 51, 51, 1.);
	  	text-align: center;
	  	-webkit-transform: rotate(-45deg);
	  	-moz-transform: rotate(-45deg);
	  	-ms-transform: rotate(-45deg);
	  	-o-transform: rotate(-45deg);
	  	position: relative;
	  	padding: 7px 0;
	  	top: 105px;
	  	left: 300px;
	  	width: 120px;
	  	background-color: #ebb134;
	  	color: rgba(255, 255, 255, 1.);
	}*/
[class^="ribbon-"] {
  	position: relative;
 	*margin-bottom: 80px;
}
[class^="ribbon-"]:before, [class^="ribbon-"]:after {
  	content: "";
  	position: absolute;
}

.ribbon-2 {
  	width: 80px;
  	height: 30px;
  	background: #1c6;
	border-color: #1a5f;
	color: #fff;
  	top: -20px;
  	left: -38px;
}
.ribbon-text {
	text-align: center;
	padding-left: 20px;
	padding-top: 15px;
	line-height: 30px;
	font-weight: bold;
}
.ribbon-2:before {
  	height: 0;
  	width: 0;
  	border-bottom: 8px solid #1c6;
  	border-left: 8px solid transparent;
  	top: -8px;
}
.ribbon-2:after {
  	height: 0;
  	width: 0;
  	border-top: 15px solid transparent;
  	border-bottom: 15px solid transparent;
  	border-left: 15px solid #1c6f;
  	right: -15px;
}
</style>

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head hidden-print">
		<div class="m-portlet__head-caption ">
			
			<div class="m-demo__preview m-demo__preview--btn">
				<a href="#" class="btn btn-secondary m-btn m-btn--icon m-btn--icon-only" onclick="window.print();" title="print">
					<i class="la la-print"></i>
				</a>

				<a href="<?=base_url()?>invoices/pay/<?=$inv->inv_id?>" class="btn btn-info m-btn m-btn--icon m-btn--icon-only" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Pay Invoice" data-skin="dark">
					<i class="la la-money"></i>
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
										<li class="m-nav__item">
											<a href="<?= base_url() ?>invoices/transactions/<?=$inv->inv_id?>" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-coins"></i>
												<span class="m-nav__link-text">
													Payments
												</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="#" class="m-nav__link" onclick="showAjaxModal('<?= base_url()?>modal/popup/mark_as_paid/<?=$inv->inv_id?>/invoices');" data-toggle="modal" data-target="#m_modal">
												<i class="m-nav__link-icon la 	la-cc-visa"></i>
												<span class="m-nav__link-text">
													Mark as Paid
												</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="#>" class="m-nav__link" onclick="showAjaxModal('<?= base_url()?>modal/popup/cancel/<?=$inv->inv_id?>/invoices');" data-toggle="modal" data-target="#m_modal">
												<i class="m-nav__link-icon flaticon-cancel"></i>
												<span class="m-nav__link-text">
													Cancelled
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

		<?php if(Invoice::payment_status($inv->inv_id) == 'fully_paid'){ ?>
		<div class="ribbon-2">
			<span class="ribbon-text">Lunas</span>
		</div>
		<?php } ?>

		<!-- Start Display Details -->
        <?php if($inv->status != 'Cancelled') : ?>
        <?php
        	if (!$this->session->flashdata('message')) :
            	if (strtotime($inv->due_date) < time() && Invoice::get_invoice_due_amount($inv->inv_id) > 0) :
        ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
					<strong>
						Warning!
					</strong>
					This invoice is overdue!
				</div>
				<?php endif; ?>
            <?php endif; ?>
        <?php else: ?>	

        		<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
					<strong>
						Warning!
					</strong>
					This Invoice is Cancelled!
				</div>

        <?php endif; ?>	

		<section class="scrollable wrapper">
            <div class="row">
                <div class="col-xl-6">
                    <div style="height: 60px" class="logo-in-here">
                        <img class="ie-logo img-responsive" src="<?= base_url() ?>assets/images/logo_wiklan.png">
                    </div>
                </div>
                <div class="col-xl-6 text-right" style="color: #877f;">
                    <p class="h4">
                        <span style="font-size: 28pt;"><?=$inv->reference_no?></span>
                    </p>
                    <div>
                        Tanggal Cetak 
                        <span class="col-xl-3 no-gutter-right pull-right">
                            <strong><?= date('d-m-Y') ?></strong>
                        </span>
                    </div>
                    <div>
                        Jatuh Tempo
                        <span class="col-xl-3 no-gutter-right pull-right">
                        	<?php
                        	$originalDate = explode('-', $inv->due_date);
							$newDate = $originalDate[1].'-'.$originalDate[0].'-'.$originalDate[2];
                        	?>
                            <strong><?= $newDate ?></strong>
                        </span>
                    </div>
                    <?php
                    $pay_status = Invoice::payment_status($inv->inv_id);
                    switch ($pay_status) {
                    	case 'cancelled':
                    		$payment_status = 'Cancelled';
                    		break;

                    	case 'not_paid':
                    		$payment_status = 'Not paid';
                    		break;

                    	case 'fully_paid':
                    		$payment_status = 'Fully paid';
                    		break;	

                    	default:
                    		$payment_status = 'Partially Paid';
                    		break;
                    }
                    ?>
                    <div>
                        Status Pembayaran
                        <span class="col-xl-3 no-gutter-right pull-right">
                        	<span class="m-badge m-badge--danger m-badge--wide m-badge--rounded">
								<?= $payment_status ?>
							</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="well m-t">
                <div class="row">
                    <div class="col-xl-6 col-xs-6">
                        <strong>Ditagihkan Kepada:</strong>
                        <h4><?=Client::view_by_id($inv->client)->company;?> <br></h4>
                        <p>
                            <span class="col-xl-3 no-gutter">Alamat:</span>
                            <span class="col-xl-9 no-gutter">
                            	<?=Client::view_by_id($inv->client)->alamat;?>
                            </span><br>
                            <span class="col-xl-3 no-gutter">Telpon:</span>
                            <span class="col-xl-9 no-gutter">
                                <a href="tel:<?=Client::view_by_id($inv->client)->no_telp;?>"><?=Client::view_by_id($inv->client)->no_telp;?></a>&nbsp;
                            </span><br>
                            <span class="col-xl-3 no-gutter">Email:</span>
                            <span class="col-xl-9 no-gutter">
                                <?=Client::view_by_id($inv->client)->email;?>&nbsp;
                            </span>
                        </p>
                        <span class="text-info hidden-print">
                        	<?php
                        	$item_id = Invoice::view_basket_by_id($inv->id_transaction)->item_id;
                        	$url = Invoice::view_item_by_id($item_id)->item_url;
                        	$view_product = base_url()."product/billboard/".$url;
                        	?>
                        	
    						<div class="m-alert m-alert--outline alert alert-warning alert-dismissible fade show" role="alert" style="background-color: transparent;">
								<i class="m-nav__link-icon flaticon-map-location"></i>
								<a href="<?= $view_product ?>" style="color: #fb2f;" target="_blank"><?= Invoice::view_basket_by_id($inv->id_transaction)->item_title .' - #'. Invoice::view_ooh_by_id(Invoice::view_basket_by_id($inv->id_transaction)->item_id)->prod_code ?></a>
							</div>
    					</span>
                    </div>
                    <div class="col-xl-6 col-xs-6">
                        <strong>Terima Dari:</strong>
                        <h4>PT Wijaya Iklan (Wiklan)</h4>
                        <p>
                            <span class="col-xl-3 no-gutter">Alamat:</span>
                            <span class="col-xl-9 no-gutter">Jl. Adityawarman No. 2 Surabaya 60241</span><br>
                            <span class="col-xl-3 no-gutter">Telpon:</span>
                            <span class="col-xl-9 no-gutter">
                                <a href="tel:(031) 5616649">(031) 5616649</a>
							</span><br>
                            <span class="col-xl-3 no-gutter">Email:</span>
                            <span class="col-xl-9 no-gutter">
                            	cs@wiklan.com<br><span></span>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <table id="inv-details" class="table sorted_table small" type="invoices">
                <thead style="background-color: #ffff; border: 1px solid #e3e3e3; padding: 20px;">
                    <tr>
                        <th class="border-me"></th>
                        <th width="43%" class="text-center border-me">Keterangan / Deskripsi </th>
                        <th width="8%" class="text-right border-me">Qty </th>
                        <th width="22%" class="text-right border-me">Harga per Unit <i>(Rp)</i></th>
                        <th width="5%" class="border-me"></th>
                        <th width="22%" class="text-right border-me">Total <i>(Rp)</i></th>
                        <th class="text-right inv-actions border-me"></th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach (Invoice::has_items($inv->inv_id) as $key => $item) { ?>
                    <tr class="sortable" class="sortable" data-name="<?=$item->item_name?>" data-id="<?=$item->item_id?>">
                        <td class="drag-handle"><i class="fa fa-reorder"></i></td>
                        
                        <td class="text-muted">
                        	<a class="text-info" href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/edit_item/<?=$item->item_id?>/invoices');" data-toggle="modal" data-target="#m_modal"><?=$item->item_desc?>
                            </a>
                        </td>
                        <td class="text-right"><?= $item->quantity ?></td>
                        <td class="text-right"><?= $item->unit_cost ?></td>
                        <td></td>
                        <td class="text-right"><?= $item->total_cost ?></td>
                        <td>
                            <a class="hidden-print" href="#" onclick="confirm_modal('<?= base_url();?>invoices/items/delete/<?=$item->item_id?>/<?=$item->invoice_id ?>');" data-toggle="ajaxModal"><i class="fa fa-trash-o text-danger"></i>
                            </a>
                        </td>
                    </tr>
                	<?php } ?>
                    <?php
                    $this->load->module('invoices');
                    $item_order = count($this->invoices->has_items(1));
                    ?>

                    <tr class="hidden-print">
                        <form action="<?= base_url() ?>invoices/items/add" class="bs-example form-horizontal" method="post" accept-charset="utf-8">
	                        <input type="hidden" name="invoice_id" value="<?=$inv->inv_id ?>">
	                        <input type="hidden" name="item_order" value="<?=count(Invoice::has_items($inv->inv_id)) + 1?>">
	                        <input id="hidden-item-name" type="hidden" name="item_name">
	                        <td></td>
	                        
	                        <td>
	                            <textarea id="auto-item-desc" rows="1" name="item_desc" placeholder="Item Description" class="form-control js-auto-size"></textarea>
	                        </td>
	                        <td>
	                            <input id="auto-quantity" type="text" name="quantity" value="1" class="form-control">
	                        </td>
	                       
	                        <td>
	                            <input id="auto-unit-cost" type="text" name="unit_cost" required="" class="form-control">
	                        </td>
	                        
	                        <td></td>
	                        <td></td>
	                        <td>
	                            <button type="submit" class="btn btn-dark"><i class="fa fa-check"></i> Save</button>
	                        </td>
                        </form>
                    </tr>
                    <tr>
                    	<td colspan="7" style="border-top: 2px solid rgb(170, 170, 170);">
                    		
                    	</td>
                    </tr>
                    <tr style="background-color: #f5f5f5; border: 1px solid #eee; padding: 20px;">
                        <td colspan="4" class="text-right no-border border-me-top"><strong>Sub Total</strong></td>
                        <td class="text-right"><span class="rupiah">Rp</span></td>
                        <td class="text-right">
                            <?= Invoice::get_invoice_subtotal($inv->inv_id) ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr style="background-color: #f5f5f5; border: 1px solid #eee; padding: 20px;">
                        <td colspan="4" class="text-right no-border">
                            <strong>PPN (10.00%)</strong>
                        </td>
                        <td class="text-right"><span class="rupiah">Rp</span></td>
                        <td class="text-right">
                            <?= Invoice::get_invoice_tax($inv->inv_id,'tax') ?>
                        </td>
                        <td></td>
                    </tr>
                    <?php if ($inv->discount > 0) { ?>
                    <tr style="background-color: #f5f5f5; border: 1px solid #eee; padding: 20px;">
                        <td colspan="4" class="text-right no-border">
                        	<strong>Diskon</strong>
                        </td>
                        <td class="text-right"><span class="rupiah">Rp</span></td>
                        <td class="text-right">
                            <?= Invoice::get_invoice_discount($inv->inv_id) ?> 
                        </td>
                        <td></td>
                    </tr>
                	<?php } ?>

                	<?php if ($inv->extra_fee > 0) { ?>
                    <tr style="background-color: #f5f5f5; border: 1px solid #eee; padding: 20px;">
                        <td colspan="4" class="text-right no-border">
                        	<strong>Biaya Tambahan</strong>
                        </td>
                        <td class="text-right"><span class="rupiah">Rp</span></td>
                        <td class="text-right">
                            <?= Invoice::get_invoice_fee($inv->inv_id) ?>
                        </td>
                        <td></td>
                    </tr>
                    <?php } ?>

                    <?php if (Invoice::get_invoice_paid($inv->inv_id) > 0) { ?>
                    <tr style="background-color: #f5f5f5; border: 1px solid #eee; padding: 20px;">
                        <td colspan="4" class="text-right no-border">
                        	<strong>Kredit</strong>
                        </td>
                        <td class="text-right"><span class="rupiah">Rp</span></td>
                        <td class="text-right text-danger">
                            <?= Invoice::get_invoice_paid($inv->inv_id) ?> 
                        </td>
                        <td></td>
                    </tr>
                    <?php } ?>

                    <tr style="background-color: #f5f5f5; border: 1px solid #eee; padding: 20px;">
                        <td colspan="4" class="text-right no-border">
                        	<strong>Jumlah Dibayar</strong>
                        </td>
                        <td class="text-right"><span class="rupiah"><b>Rp</b></span></td>
                        <td class="text-right">
                            <b><?= Invoice::get_invoice_due_amount($inv->inv_id) ?></b> 
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <?php if ($inv->notes != '') { ?>
        <div class="m-alert m-alert--outline alert alert-info alert-dismissible fade show" role="alert">
			<?= $inv->notes ?>
		</div>
		<?php } ?>

        <p></p>
        <div class="info-terkait">
        	<h5 class="judul-info">Informasi Penting</h5>
    		<p>
    			1. Saat ini anda dapat melakukan pembayaran melalui <b>ATM BCA</b>, <b>ATM Mandiri</b>, <b>Klik BCA</b>.
    		</p>
    		<p>
    			2. Abaikan tagihan ini apabila Anda sudah melakukan pembayaran.
    		</p>
        </div>
        <p></p>

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