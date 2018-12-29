
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
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Penawaran</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h5 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 14px;
		font-weight: normal;
		margin: 0 0 12px 0;
		padding: 10px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	.footer{
		text-align: right;
		font-size: 8px;
		background-color: #D0D0D0;
		border-top: 1px solid #D0D0D0;
		line-height: 10px;
		padding: 0 5px 0 5px;
		margin: 10px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}

	#note p {
		font-weight: bold;
	}

	#note span {
		display: block;
		font-size: 11px;
	}
	</style>
</head>
<body>

	<div class="logo">

		<table style="width: 100%">
			<tr>
				<td width="50%">
					<div class="logo" style="margin: -10px;">
						<img src="<?= base_url() ?>assets/images/logo_wiklan.png" width="200">
					</div>
				</td>
				<td width="50%">
					<table style="float: right;">
						<!-- <tr> -->
							<!-- <td width="160"></td> -->
							<!-- <td width="160" style="font-size: 24px; font-weight: 800; text-align: right; text-transform: uppercase;">Penawaran</td> -->
						<!-- </tr> -->
						<tr>
							<!-- <td style="font-weight: bold; color: #5cb85c;">REF. NO</td> -->
							<td style="text-align: right; font-weight: bold;"><?= $meta_author ?></td>
						</tr>
						<tr>
							<!-- <td style="font-weight: bold; color: #5cb85c;">PT Wijaya Iklan (Wiklan)</td> -->
							<td style="text-align: right;"><?= $shop_address ?></td>
						</tr>
						<tr>
							<!-- <td style="font-weight: bold; color: #5cb85c;">PAYMENT DUE</td> -->
							<td style="text-align: right;"><?= $shop_phone ?> - <?= $shop_wa ?></td>
						</tr>
						
						<tr>
							<!-- <td style="font-weight: bold; color: #5cb85c;">PAYMENT DUE</td> -->
							<td style="text-align: right;"><?= $shop_email ?></td>
						</tr>
					</table>
				</td>
			</tr>
			
		</table>
		
	</div>
	<div>
		<table width="100%">
			<tr>
				<td width="50%"><p style="font-weight: bold;">Daftar Penawaran Titik Lokasi</p></td>
				<td width="50%" style="text-align: right;"><?= date('d F Y') ?></td>
			</tr>
		</table>
		
	</div>
	<hr>

	<?php
	$i = 1; 
	$this->load->module('manage_product');
    $this->load->module('store_categories');
    $this->load->module('store_labels');
    $this->load->module('store_sizes');
    $this->load->module('store_roads');
    $this->load->module('store_provinces');
    $this->load->module('store_cities');
    $this->load->module('site_settings');
    $this->load->module('timedate');
    // $products = $this->db->get_where('store_basket', array('shopper_id' => 1009));
	foreach ($products->result() as $produk) {
		$id = $produk->item_id;
		$prod = App::view_by_id($id);
		$kategori_produk = $this->store_categories->get_name_from_category_id($prod->cat_prod);
		$image_location = base_url().'marketplace/limapuluh/70x70/'.$prod->limapuluh;
		// iki nyoba gambar 
		$image_location2 = base_url().'marketplace/limapuluh/'.$prod->limapuluh;
		$alamat = $prod->item_title;
		$code = base_url().'marketplace/qr/'.$prod->qr_code;
		$prov = $this->store_provinces->get_name_from_province_id($prod->cat_prov);
		$kota = $this->store_cities->get_name_from_city_id($prod->cat_city);
		$jalan = $this->store_roads->get_name_from_road_id($prod->cat_road);
		$price = $produk->price;
		$display = $this->manage_product->get_name_from_display_id($prod->cat_type);
		$start = $this->timedate->get_nice_date($produk->start, 'indo'); 
        $end = $this->timedate->get_nice_date($produk->end, 'indo');
        $jml_sisi = $this->manage_product->show_amount_side($prod->jml_sisi);
		$tipe_cahaya = $this->manage_product->get_name_from_light_id($prod->cat_light);
		$durasi = $produk->duration;
		$size = $this->store_sizes->get_name_from_size_id($prod->cat_size);
		$lat = $prod->lat;
		$lng = $prod->long;
		$ket_lokasi = $this->manage_product->show_ket_lokasi($prod->ket_lokasi);
	?>

<div id="container">
	<!-- <h5><?= $i++ ?>. </h5> -->

	<div id="body">
		
		<table width="100%">
			<tr>
				<td>
					<img src="<?= ($prod->limapuluh != '') ? $image_location2 : 'http://placehold.it/270x160' ?>" width="450">
				</td>
				<td style="padding-left: 20px;">
					<table width="100%">
						<tr>
							<td style="font-size: 20px; font-weight: bold; line-height: 30px;">
								<?= $alamat ?>
							</td>
						</tr>
						
					</table>
					<table width="100%">
						<tr>
							<td rowspan="" width="50%">
								<table width="100%">
									<tr>
										<td colspan="2">
											<?= $kategori_produk ?>
										</td>
									</tr>
									<tr>
										<td colspan="2" height="10" style="background-color: #ff6000;"></td>
										<td></td>
									</tr>
									<tr>
										<td style="font-size: 16px; font-weight: bold;">
											Provinsi
										</td>
										<td style="font-size: 16px; font-weight: bold;">
											:
										</td>
										<td style="font-size: 16px; font-weight: bold;">
											<?= $prov ?>
										</td>
									</tr>
									<tr>
										<td style="font-size: 16px; font-weight: bold;">
											Kota / Kab
										</td>
										<td style="font-size: 16px; font-weight: bold;">
											:
										</td>
										<td style="font-size: 16px; font-weight: bold;">
											<?= $kota ?>
										</td>
									</tr>
									<tr>
										<td style="font-size: 16px; font-weight: bold;">
											Kelas Jalan
										</td>
										<td style="font-size: 16px; font-weight: bold;">
											:
										</td>
										<td style="font-size: 16px; font-weight: bold;">
											<?= $jalan ?>
										</td>
									</tr>
								</table>
							</td>
							<td width="50%" style="text-align: right; font-size: 24px; font-weight: bold; color: #98ce44; border-left: 1px solid #e3e3e3; border-bottom: 1px solid #e3e3e3;">
								Rp. <?php
										$nominal = substr(str_replace( ',', '', $price), 0);
								        $hasil_rupiah = number_format($nominal,0,',','.');
								        echo $hasil_rupiah; 
						 			?>
							</td>
						</tr>
						<tr>
							<td>

							</td>
							<td style="border-left: 1px solid #e3e3e3; text-align: center; padding: 20px;">
								<img src="<?= ($prod->qr_code != '') ? $code : '' ?>" width="200">
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
		<table width="100%">
			<tr>
				<td width="25%" style="text-align: center; border-bottom: 1px solid #e3e3e3; border-right: 1px solid #e3e3e3;">
					<p style="font-size: 10px;">Lampu</p>
					<p style="font-size: 12px; font-weight: bold; color: #5867dd;"><?= $tipe_cahaya ?></p>
				</td>
				<td width="25%" style="text-align: center; border-bottom: 1px solid #e3e3e3; border-right: 1px solid #e3e3e3;">
					<p style="font-size: 10px;">Tipe</p>
					<p style="font-size: 12px; font-weight: bold; color: #5867dd;"><?= $display ?></p>
				</td>
				<td width="25%" style="text-align: center; border-bottom: 1px solid #e3e3e3; border-right: 1px solid #e3e3e3;">
					<p style="font-size: 10px;">Durasi</p>
					<p style="font-size: 12px; font-weight: bold; color: #5867dd;"><?= $durasi ?> bulan</p>
				</td>
				<td width="25%" style="text-align: center; border-bottom: 1px solid #e3e3e3;">
					<p style="font-size: 10px;">Awal Tayang</p>
					<p style="font-size: 12px; font-weight: bold; color: #5867dd;"><?= $start ?></p>
				</td>
			</tr>
			<tr>
				<td style="text-align: center; border-right: 1px solid #e3e3e3;">
					<p style="font-size: 10px;">Jumlah Sisi</p>
					<p style="font-size: 12px; font-weight: bold; color: #5867dd;"><?= $jml_sisi ?></p>
				</td>
				<td style="text-align: center; border-right: 1px solid #e3e3e3;">
					<p style="font-size: 10px;">Ukuran</p>
					<p style="font-size: 12px; font-weight: bold; color: #5867dd;"><?= $size ?> m</p>
				</td>
				<td style="text-align: center; border-right: 1px solid #e3e3e3;">
					<p style="font-size: 10px;">Keterangan</p>
					<p style="font-size: 12px; font-weight: bold; color: #5867dd;"><?= $ket_lokasi ?></p>
				</td>
				<td style="text-align: center;">
					<p style="font-size: 10px;">Akhir Tayang</p>
					<p style="font-size: 12px; font-weight: bold; color: #5867dd;"><?= $end ?></p>
				</td>
			</tr>
		</table>

	</div>

	<div class="footer" ><?= $lat.', '.$lng ?></div>
</div>



<?php } ?>

<div id="note">
	<p>Catatan :</p>
	<span>1. Harga yang tertera pada penawaran ini merupakan harga publish rate dan belum termasuk diskon.</span><br>
	<span>2. Harga penawaran ini hanya berlaku 14 hari sejak tanggal terbitnya penawaran ini.</span><br>
	<span>3. Harga yang tertera ini belum termasuk PPN 10%.</span><br>
	<span>4. Penawaran ini tidak mengikat sebelum terbitnya approval.</span>
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