<?php
$inv = Invoice::view_by_id($id);
?>

<!DOCTYPE html>
<html>
<head>
	<title>invoice</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>marketplace/css/bootstrap.css">
	<style>
		body {
	    	font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
		    *font-family: 'Roboto';
		    *font-size: 13px;
    		color: #656D78;
    		-webkit-font-smoothing: antialiased;
		}
    	h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
		    font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
		}
    	.bg-success {
		    background-color: #1ab394;
		    color: #ebf4e4;
		}
		.bg-danger {
		    background-color: #F05050;
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
		    color: #fff !important;
		    background-color: #38354a;
		    border-color: #2e3e4e;
		}
		.btn-dark:hover, .btn-dark:focus, .btn-dark:active, .btn-dark.active, .open .dropdown-toggle.btn-dark {
		    color: #fff !important;
		    background-color: #25313e;
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
			border: 1px solid #bbb;
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
		.invoice {
			height: 200px;
		}

		.receive-title {
			padding: 0 0 5px 2px;
			font-size: 16px;
			font-weight: bold;
			color: #5cb85c;
			border-bottom: 1px solid #5cb85c;
		}
		.receive {
			padding-bottom: 10px;
		}
		.receive span, .well span {
			display: block;
		}
		.inc, .remind {
			font-weight: bold;
			font-size: 18px;
		}
		#topper {
			padding: 20px;
		}
		.logo-top {
			text-align: center;
			margin-bottom: 20px;
		}

		/* The ribbons */

		.corner-ribbon{
		  width: 200px;
		  background: #e43;
		  position: absolute;
		  top: 25px;
		  left: -50px;
		  text-align: center;
		  line-height: 50px;
		  letter-spacing: 1px;
		  color: #f0f0f0;
		  transform: rotate(-45deg);
		  -webkit-transform: rotate(-45deg);
		}

		/* Custom styles */

		.corner-ribbon.sticky{
		  position: fixed;
		}

		.corner-ribbon.shadow{
		  box-shadow: 0 0 3px rgba(0,0,0,.3);
		}

		/* Different positions */

		.corner-ribbon.top-left{
		  top: 25px;
		  left: -50px;
		  transform: rotate(-45deg);
		  -webkit-transform: rotate(-45deg);
		}

		.corner-ribbon.top-right{
		  top: 25px;
		  right: -50px;
		  left: auto;
		  transform: rotate(45deg);
		  -webkit-transform: rotate(45deg);
		}

		.corner-ribbon.bottom-left{
		  top: auto;
		  bottom: 25px;
		  left: -50px;
		  transform: rotate(45deg);
		  -webkit-transform: rotate(45deg);
		}

		.corner-ribbon.bottom-right{
		  top: auto;
		  right: -50px;
		  bottom: 25px;
		  left: auto;
		  transform: rotate(-45deg);
		  -webkit-transform: rotate(-45deg);
		}

		/* Colors */

		.corner-ribbon.white{background: #f0f0f0; color: #555;}
		.corner-ribbon.black{background: #333;}
		.corner-ribbon.grey{background: #999;}
		.corner-ribbon.blue{background: #39d;}
		.corner-ribbon.green{background: #2c7;}
		.corner-ribbon.turquoise{background: #1b9;}
		.corner-ribbon.purple{background: #95b;}
		.corner-ribbon.red{background: #e43;}
		.corner-ribbon.orange{background: #e82;}
		.corner-ribbon.yellow{background: #ec0;}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
		
			<?php if(Invoice::payment_status($inv->inv_id) == 'fully_paid'){ ?>
			<div class="corner-ribbon top-left sticky green shadow" style="font-size: 16px; font-weight: bold;">LUNAS</div>
			<?php } ?>

			<?php if(Invoice::payment_status($inv->inv_id) == 'Unpaid'){ ?>
			<div class="corner-ribbon top-left sticky red shadow" style="font-size: 16px; font-weight: bold;">UNPAID</div>
			<?php } ?>

			<!-- <div class="row">
				<div id="topper">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="logo-top">
							<img src="images/logo.png" width="120">
						</div>
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>
			

			<div class="well">
				<h5 class="remind">Invoice INV0022</h5>
				<p>
					<span>Hello Sample Tours</span>
					<span>Here is the invoice of XCDT34</span>
				</p>
				<br>
				<p>Best Regards, <span style="font-weight: bold;">GITBENCH Inc.</span></p>
				
			</div> -->

			<div class="invoice">
				<div class="col-md-6">
					<div class="logo">
						<img src="<?= base_url() ?>assets/images/logo_wiklan.png" width="100">
					</div>
				</div>
				<div class="col-md-6">
					<table style="float: right;">
						<tr>
							<td width="160"></td>
							<td width="160" style="font-size: 22px; font-weight: 700; text-align: right;">INVOICE</td>
						</tr>
						<tr>
							<td style="font-weight: bold; color: #5cb85c;">REF. NO</td>
							<td style="text-align: right;"><?=$inv->reference_no?></td>
						</tr>
						<tr>
							<td style="font-weight: bold; color: #5cb85c;">INVOICE DATE</td>

							<td style="text-align: right;">
								<?php
								$this->load->module('timedate');
								echo $this->timedate->get_nice_date($inv->date_added, 'ok');
								?>
							</td>
						</tr>
						<tr>
							<td style="font-weight: bold; color: #5cb85c;">PAYMENT DUE</td>
							<?php
                        	$originalDate = explode('-', $inv->due_date);
							$newDate = $originalDate[1].'-'.$originalDate[0].'-'.$originalDate[2];
                        	?>
							<td style="text-align: right;"><?= $newDate ?></td>
						</tr>

					</table>
				</div>
			</div>

			<div class="receive" style="margin-bottom: 60px !important;">
				<div class="col-md-6" style="padding-right: 80px;">
					<h5 class="receive-title">RECIEVED FROM</h5>
					<p class="inc">PT Wijaya Iklan (Wiklan)</p>
					<p>
						<span class="">Jl. Adityawarman no. 2 Surabaya</span>
						<span class="">Phone | (031) 5616649</span>
						<span class="">Email | cs@wiklan.com</span>
					</p>
				</div>
				<div class="col-md-6" style="padding-right: 80px;">
					<h5 class="receive-title">BILL TO</h5>
					<p class="inc"><?=Client::view_by_id($inv->client)->company;?></p>
					<p>
						<span class=""><?=Client::view_by_id($inv->client)->alamat;?></span>
						<span class="">Phone | <?=Client::view_by_id($inv->client)->no_telp;?></span>
						<span class="">Email | <?=Client::view_by_id($inv->client)->email;?>&nbsp;</span>
					</p>
				</div>
				
			</div>

			<div class="separator"></div>

			<div class="items2" style="margin-top: 50px; padding-top: 50px;">
				<table id="inv-details" class="table sorted_table small" type="invoices" style="margin-top: 20px;">
                <thead style="background-color: #f5f5f5; border: 1px solid #e3e3e3; padding: 20px; font-weight: 800; font-size: 14px;">
                    <tr>
                        <th></th>
                        <th width="45%" class="text-center">Keterangan / Deskripsi </th>
                        <th width="6%" class="text-right">Qty </th>
                        <th width="22%" class="text-right">Harga per Unit <i>(Rp)</i></th>
                        <th width="5%"></th>
                        <th width="22%" class="text-right">Total <i>(Rp)</i></th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                	<?php foreach (Invoice::has_items($inv->inv_id) as $key => $item) { ?>
                    <tr class="sortable" data-name="Web Hosting" data-id="11" style="font-size: 13px;">
                        <td class="drag-handle"><i class="fa fa-reorder"></i></td>
                        
                        <td class="text-muted"><?=$item->item_desc?></td>
                        <td class="text-right"><?= $item->quantity ?></td>
                        <td class="text-right"><?= $item->unit_cost ?></td>
                        <td></td>
                        <td class="text-right"><?= $item->total_cost ?></td>
                        
                    </tr>
                    <?php } ?>
                    <?php
                    $this->load->module('invoices');
                    $item_order = count($this->invoices->has_items(1));
                    ?>
                    
                    <tr>
                    	<td colspan="6" style="border-top: 2px solid #aaa;">
                    		
                    	</td>
                    </tr>
                    <tr style="padding: 20px;">
                    	<td colspan="3" style="border-bottom: none; border-top: none;"></td>
                        <td class="text-right no-border" style="background-color: #f5f5f5; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;"><strong>Sub Total</strong></td>
                        <td class="text-right" style="background-color: #f5f5f5; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
                        <td class="text-right" style="background-color: #f5f5f5; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                            <?= Invoice::get_invoice_subtotal($inv->inv_id) ?> </td>
                    </tr>
                    <tr style="padding: 20px;">
                    	<td colspan="3" style="border-bottom: none; border-top: none;"></td>
                        <td class="text-right no-border" style="background-color: #f5f5f5; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                            <strong>PPN (10.00%)</strong>
                        </td>
                        <td class="text-right" style="background-color: #f5f5f5; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
                        <td class="text-right" style="background-color: #f5f5f5; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                            <?= Invoice::get_invoice_tax($inv->inv_id,'tax') ?> 
                        </td>
                    </tr>
                    <!-- diskon -->
                    <?php if ($inv->discount > 0) { ?>
                    <tr style="padding: 20px;">
                    	<td colspan="3" style="border-bottom: none; border-top: none;"></td>
                        <td class="text-right no-border" style="background-color: #f5f5f5; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                            <strong>Diskon</strong>
                        </td>
                        <td class="text-right" style="background-color: #f5f5f5; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
                        <td class="text-right" style="background-color: #f5f5f5; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                            <?= Invoice::get_invoice_discount($inv->inv_id) ?> 
                        </td>
                    </tr>
                    <?php } ?>
                    <!-- end diskon -->
                    <!-- extra fee -->
                    <?php if ($inv->extra_fee > 0) { ?>
                    <tr style="padding: 20px;">
                    	<td colspan="3" style="border-bottom: none; border-top: none;"></td>
                        <td class="text-right no-border" style="background-color: #f5f5f5; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                            <strong>Biaya Tambahan</strong>
                        </td>
                        <td class="text-right" style="background-color: #f5f5f5; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
                        <td class="text-right" style="background-color: #f5f5f5; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                            <?= Invoice::get_invoice_fee($inv->inv_id) ?> 
                        </td>
                    </tr>
                    <?php } ?>
                    <!-- end extra fee -->
                    <!-- kredit -->
                    <?php if (Invoice::get_invoice_paid($inv->inv_id) > 0) { ?>
                    <tr style="padding: 20px;">
                    	<td colspan="3" style="border-bottom: none; border-top: none;"></td>
                        <td class="text-right no-border" style="background-color: #f5f5f5; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                            <strong>Kredit</strong>
                        </td>
                        <td class="text-right" style="background-color: #f5f5f5; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
                        <td class="text-right" style="background-color: #f5f5f5; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                            <?= Invoice::get_invoice_paid($inv->inv_id) ?> 
                        </td>
                    </tr>
                    <?php } ?>
                    <!-- end kredit -->
                    <tr style="padding: 20px;">
                    	<td colspan="3" style="border-bottom: none; border-top: none;"></td>
                        <td class="text-right no-border" style="color: #fff;background-color: #5cb85c; border-color: #4cae4c; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                        	<strong>Jumlah Dibayar</strong>
                        </td>
                        <td class="text-right" style="color: #fff;background-color: #5cb85c; border-color: #4cae4c; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
                        <td class="text-right" style="color: #fff;background-color: #5cb85c; border-color: #4cae4c; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
                            <b><?= Invoice::get_invoice_due_amount($inv->inv_id) ?></b> 
                        </td>
                    </tr>
                </tbody>
            </table>
			</div>

			<div class="panel panel-default" style="padding: 10px; background: #ddd; margin-top: 150px;">
				<div style="text-align: right; font-size: 10px;"><em>cetak tgl: <?= date('d-m-Y, H:i:s') ?> </em></div>
			</div>

		</div>
	</div>

</body>
</html>