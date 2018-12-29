<?php $inv = Invoice::view_by_id($id); ?>

<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_kodepos = $this->db->get_where('settings' , array('type'=>'kodepos'))->row()->description;
$shop_wa = $this->db->get_where('settings' , array('type'=>'WA'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
$shop_logo = base_url().'marketplace/logo/'.$system_logo;
$homepage_bg = $this->db->get_where('settings' , array('type'=>'homepage_background'))->row()->description;
// for meta SEO
$meta_author = $this->db->get_where('settings' , array('type'=>'author'))->row()->description;
$meta_keyword = $this->db->get_where('settings' , array('type'=>'keyword'))->row()->description;
$meta_description = $this->db->get_where('settings' , array('type'=>'description'))->row()->description;

?>

<!DOCTYPE html>
<html>
<head>
	<title>listing2</title>
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
			height: 160px;
		}

		.receive-title {
			padding: 10px 0 10px 2px;
			font-size: 18px;
			font-weight: bold;
			color: #5cb85c;
			
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

		.pita {
			position: absolute;
			top: 25px;
			right: 0px;
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


			<div class="invoice">

				<table style="width: 100%">
					<tr>
						<td width="50%">
							<div class="logo">
								<img src="<?= base_url() ?>assets/images/logo_wiklan.png" width="160">
							</div>
						</td>
						<td width="50%">
							<table style="float: right;">
								<tr>
									<td width="160"></td>
									<td width="160" style="font-size: 24px; font-weight: bold; text-align: right;">INVOICE</td>
								</tr>
								<tr>
									<td style="font-weight: bold; color: #5cb85c;">REF. NO</td>
									<td style="text-align: right; font-weight: 800;"><?=$inv->reference_no?></td>
								</tr>
								<tr>
									<td style="font-weight: bold; color: #5cb85c; text-transform: uppercase;">Tanggal Cetak</td>
									<td style="text-align: right;"><?= date('d-m-Y') ?></td>
								</tr>
								<tr>
									<td style="font-weight: bold; color: #5cb85c; text-transform: uppercase;">Jatuh Tempo</td>
									<?php
		                        	$originalDate = explode('-', $inv->due_date);
									$newDate = $originalDate[1].'-'.$originalDate[0].'-'.$originalDate[2];
		                        	?>
									<td style="text-align: right;"><?= $newDate ?></td>
								</tr>

							</table>
						</td>
					</tr>
					
				</table>
	
			</div>

			<div class="receive">

				<table style="width: 100%">
					
					<tr>
						<td width="45%" style="border-bottom: 1px solid #5cb85c;">
							<h5 class="receive-title">TERIMA DARI</h5>
						</td>
						<td width="5%"></td>
						<td width="40%" style="border-bottom: 1px solid #5cb85c;">
							<h5 class="receive-title">DITAGIHKAN KEPADA</h5>
						</td>
						<td width="5%"></td>
					</tr>
					<tr>
						<td colspan="2">
							<p class="inc" style="margin: 10px 0;">PT WIJAYA IKLAN INDONESIA</p>
						</td>
						<td colspan="2">
							<p class="inc" style="margin: 10px 0; text-transform: uppercase;">
								<!-- <?=Client::view_by_id($inv->client)->company;?> -->
								<?php
								if (Client::view_by_id($inv->client)->company == '') {
									echo Client::view_by_id($inv->client)->username;
								} else {
									echo Client::view_by_id($inv->client)->company;
								}
								?>	
							</p>
						</td>
					</tr>
					<tr>
						<td colspan="2">		
							<p><span class="">Jl. Adityawarman No. 2</span></p>
						</td>
						<td colspan="2">		
							<p><span class=""><?=Client::view_by_id($inv->client)->alamat;?></span></p>
						</td>
					</tr>
					<tr>
						<td colspan="2">		
							<p><span class="">Surabaya, Jawa Timur, 60242</span></p>
						</td>
						<td colspan="2">		
							<p><span class=""></span></p>
						</td>
					</tr>

					<tr>
						<td colspan="2">		
							<p><span class="">Indonesia</span></p>
						</td>
						<td colspan="2">		
							<p><span class=""></span></p>
						</td>
					</tr>
					<tr>
						<td colspan="2">		
							<p><span class="">Telp | <?= $shop_phone ?></span></p>
						</td>
						<td colspan="2">		
							<p><span class="">Telp | <?=Client::view_by_id($inv->client)->no_telp;?></span></p>
						</td>
					</tr>

					<tr>
						<td colspan="2">		
							<p><span class=""><?= $shop_email ?></span></p>
						</td>
						<td colspan="2">		
							<p><span class=""><?=Client::view_by_id($inv->client)->email;?></span></p>
						</td>
					</tr>
							
				</table>
				
			</div>

			<div class="items2" style="margin-top: 20px;">
				<table id="inv-details" class="table sorted_table small" type="invoices" style="margin-top: 20px;">
	                <thead style="background-color: #f5f5f5; border: 1px solid #e3e3e3; padding: 20px; font-weight: 800; font-size: 14px;">
	                    <tr>
	                        <th style="background-color: #f5f5f5; border-top: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3; border-left: 1px solid #e3e3e3; padding: 5px;"></th>
	                        <th style="background-color: #f5f5f5; border-top: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3; padding: 5px;" width="45%" class="text-center">Keterangan / Deskripsi </th>
	                        <th style="background-color: #f5f5f5; border-top: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3; padding: 5px;" width="6%" class="text-center">Persentase <i>(%)</i></th>
	                        <th style="background-color: #f5f5f5; border-top: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3; padding: 5px;" width="22%" class="text-center">Harga per Unit <i>(Rp)</i></th>
	                        <th style="background-color: #f5f5f5; border-top: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3; padding: 5px;" width="5%"></th>
	                        <th style="background-color: #f5f5f5; border-top: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3; border-right: 1px solid #e3e3e3; padding: 5px;" width="22%" class="text-center">Total <i>(Rp)</i></th>
	                    </tr>
	                </thead>
	                <tbody style="font-size: 13px;">
	                	<?php foreach (Invoice::has_items($inv->inv_id) as $key => $item) { ?>
	                    <tr class="sortable" data-name="Web Hosting" data-id="11" style="font-size: 13px;">
	                        <td style="padding: 5px;" class="drag-handle"><i class="fa fa-reorder"></i></td>
	                        
	                        <td style="padding: 5px;" class="text-muted"><?=$item->item_desc?></td>
	                        <td style="padding: 5px;" class="text-right"><?= $item->percent ?></td>
	                        <td style="padding: 5px;" class="text-right"><?= $item->unit_cost ?></td>
	                        <td style="padding: 5px;"></td>
	                        <td style="padding: 5px;" class="text-right"><?= $item->total_cost ?></td>
	                        
	                    </tr>
	                    <?php } ?>
	                    
	                    <tr style="margin-bottom: 5px;">
	                    	<td colspan="6" style="border-top: 2px solid #aaa; padding: 3px;">
	                    		
	                    	</td>
	                    </tr>
	                    <tr style="padding: 20px;">
	                    	<td colspan="3" style="padding: 5px; border-bottom: none; border-top: none;">
	                    		Terbilang : <span style="font-weight: bold; font-style: italic;"><?= ucwords(terbilang(Invoice::get_invoice_due_amount($inv->inv_id))) ?> Rupiah</span>
	                    	</td>
	                        <td class="text-right no-border" style="padding: 5px; background-color: #f5f5f5; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3; border-top: 1px solid #e3e3e3;"><strong>Sub Total</strong></td>
	                        <td class="text-right" style="padding: 5px; background-color: #f5f5f5; border-bottom: 1px solid #e3e3e3; border-top: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
	                        <td class="text-right" style="padding: 5px; background-color: #f5f5f5; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3; border-top: 1px solid #e3e3e3;">
	                            <?= Invoice::get_invoice_subtotal($inv->inv_id) ?> </td>
	                    </tr>
	                    <tr style="padding: 20px;">
	                    	<td colspan="3" style="padding: 5px; border-bottom: none; border-top: none;"></td>
	                        <td class="text-right no-border" style="padding: 5px; background-color: #f5f5f5; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
	                            <strong>PPN (10.00%)</strong>
	                        </td>
	                        <td class="text-right" style="padding: 5px; background-color: #f5f5f5; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
	                        <td class="text-right" style="padding: 5px; background-color: #f5f5f5; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
	                            <?= Invoice::get_invoice_tax($inv->inv_id,'tax') ?> 
	                        </td>
	                    </tr>

	                    <?php if ($inv->discount > 0) { ?>
	                    <tr style="padding: 20px;">
	                    	<td colspan="3" style="padding: 5px; border-bottom: none; border-top: none;"></td>
	                        <td class="text-right no-border" style="padding: 5px; background-color: #f5f5f5; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
	                            <strong>Diskon</strong>
	                        </td>
	                        <td class="text-right" style="padding: 5px; background-color: #f5f5f5; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
	                        <td class="text-right" style="padding: 5px; background-color: #f5f5f5; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
	                            <?= Invoice::get_invoice_discount($inv->inv_id) ?> 
	                        </td>
	                    </tr>
	                    <?php } ?>

                		<?php if ($inv->extra_fee > 0) { ?>
	                    <tr style="padding: 20px;">
	                    	<td colspan="3" style="padding: 5px; border-bottom: none; border-top: none;"></td>
	                        <td class="text-right no-border" style="padding: 5px; background-color: #f5f5f5; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
	                            <strong>Biaya Tambahan</strong>
	                        </td>
	                        <td class="text-right" style="padding: 5px; background-color: #f5f5f5; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
	                        <td class="text-right" style="padding: 5px; background-color: #f5f5f5; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
	                            <?= Invoice::get_invoice_fee($inv->inv_id) ?> 
	                        </td>
	                    </tr>
	                    <?php } ?>

                    	<?php if (Invoice::get_invoice_paid($inv->inv_id) > 0) { ?>
	                    <tr style="padding: 20px;">
	                    	<td colspan="3" style="padding: 5px; border-bottom: none; border-top: none;"></td>
	                        <td class="text-right no-border" style="padding: 5px; background-color: #f5f5f5; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
	                            <strong>Kredit</strong>
	                        </td>
	                        <td class="text-right" style="padding: 5px; background-color: #f5f5f5; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
	                        <td class="text-right" style="padding: 5px; background-color: #f5f5f5; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
	                            <?= Invoice::get_invoice_paid($inv->inv_id) ?>
	                        </td>
	                    </tr>
	                    <?php } ?>

	                    <tr style="padding: 20px;">
	                    	<td colspan="3" style="padding: 5px; border-bottom: none; border-top: none;"></td>
	                        <td class="text-right no-border" style="padding: 5px; color: #fff;background-color: #5cb85c; border-color: #4cae4c; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3; font-weight: bold;">
	                        	<strong>Jumlah Tagihan</strong>
	                        </td>
	                        <td class="text-right" style="padding: 5px; color: #fff;background-color: #5cb85c; border-color: #4cae4c; border-bottom: 1px solid #e3e3e3;"><span class="rupiah" >Rp</span></td>
	                        <td class="text-right" style="padding: 5px; color: #fff;background-color: #5cb85c; border-color: #4cae4c; border-right: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3; font-weight: bold;">
	                            <?= Invoice::get_invoice_due_amount($inv->inv_id) ?> 
	                        </td>
	                    </tr>

	                    <tr style="margin-bottom: 5px;">
	                    	<?php
	                    		$this->load->module('store_provinces');
	                    		$this->load->module('store_cities');
	                    		$this->load->module('store_roads');
	                    		$this->load->module('store_sizes');
	                    		$this->load->module('manage_product');
	                    		$orders = $this->db->where('id', $inv->id_transaction)->get('store_orders')->row();
	                    		$lokasi = $orders->item_title;
	                    		$item_id = $orders->item_id;
	                    		$durasi = $orders->duration;
	                    		$products = $this->db->where('id', $item_id)->get('store_item')->row();
	                    		$code = $products->prod_code;
								$prov = $this->store_provinces->get_name_from_province_id($products->cat_prov);
								$kota = $this->store_cities->get_name_from_city_id($products->cat_city);
								$jalan = $this->store_roads->get_name_from_road_id($products->cat_road);
	                    		$ukuran = $this->store_sizes->get_name_from_size_id($products->cat_size);
	                    		$light = $this->manage_product->get_name_from_light_id($products->cat_light);
	                    	?>
	                    	<td colspan="6" style="border-top: 2px solid #aaa; padding: 20px;">
	                    		<table>
	                    			<tr>
	                    				<td>
	                    					<strong>Lokasi</strong>
	                    				</td>
	                    				<td><strong>: </strong></td>
	                    				<td> <?= $lokasi.', '.$kota.', '.strtoupper($prov) ?></td>
	                    			</tr>
	                    			<tr>
	                    				<td>
	                    					<strong>Kode Lokasi</strong>
	                    				</td>
	                    				<td><strong>: </strong></td>
	                    				<td> #<?= $code ?></td>
	                    			</tr>
	                    			<tr>
	                    				<td>
	                    					<strong>Ukuran</strong>
	                    				</td>
	                    				<td><strong>: </strong></td>
	                    				<td> <?= $ukuran ?> m</td>
	                    			</tr>
	                    		</table>
	                    		
	                    	</td>
	                    </tr>
	                </tbody>
	            </table>
			</div>

			<div class="rekening" style="margin-top: 40px;">
				<table style="width: 100%;">
					<tr>
						<td width="50%" style="font-size: 14px; font-weight: bold; padding-bottom: 10px;">
							Rekening Bank
						</td>
						<td width="50%"></td>
					</tr>
					<tr>
						<td width="50%" style="font-size: 11px; padding: 2px 0;">
							Bank BRI
						</td>
						<td width="50%" style="font-size: 11px;">
							<!-- Bank Panin -->
						</td>
					</tr>
					<tr>
						<td width="50%" style="font-size: 11px; padding: 2px 0;">
							No Rek : 115.601.0000.91302 a.n PT. Raja Cahaya Prima
						</td>
						<td width="50%" style="font-size: 11px;">
							<!-- No Rek : 451.5085.789 a.n PT. Multi Artistikacithra -->
						</td>
					</tr>
					<tr>
						<td width="50%" style="font-size: 11px; padding: 2px 0;">
							BRI Surabaya
						</td>
						<td width="50%" style="font-size: 11px;">
							<!-- BCA KC Rungkut - Surabaya -->
						</td>
					</tr>
				</table>
			</div>

</body>
</html>