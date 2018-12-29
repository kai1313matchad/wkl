<?php
$this->load->module('timedate');
$this->load->module('manage_daftar');
$this->load->module('store_categories');
$this->load->module('store_provinces');
$this->load->module('store_cities');
$this->load->module('site_settings');

$path = base_url().'/marketplace/limapuluh/';
$orders = $this->db->where('id', $param2)->get('store_orders')->row();
// fetch all data 
$item_id = $orders->item_id;
$no_transaksi = $orders->no_transaksi;
$price = $this->site_settings->currency_rupiah($orders->price);
$durasi = $orders->duration;
$start = $this->timedate->get_nice_date($orders->start, 'indo');
$end = $this->timedate->get_nice_date($orders->end, 'indo');
$klien = $this->manage_daftar->_get_customer_name($orders->shopper_id);
$owner = $this->manage_daftar->_get_customer_name($orders->shop_id);
if ($orders->slot != '') {
	$slot = $orders->slot;
}
$product = $this->db->where('id', $item_id)->get('store_item')->row();
$code_produk = $product->prod_code;
$kategori = $this->store_categories->get_name_from_category_id($product->cat_prod);
$lokasi = $product->item_title;
$image = $product->limapuluh;
$provinsi = $this->store_provinces->get_name_from_province_id($product->cat_prov);
$kota = ucwords(strtolower($this->store_cities->get_name_from_city_id($product->cat_city)));
$path_image = $path.$image;

?>
<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">
		NO Transaksi <?= $no_transaksi ?>
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>

<div class="modal-body">

	<div class="m-portlet__body">

		<div class="m-widget5">
			<div class="m-widget5__item">
				<div class="m-widget5__pic">
					<img class="m-widget7__img" src="<?= $path_image ?>" alt="">
				</div>
				<div class="m-widget5__content">
					<h4 class="m-widget5__title">
						<?= $lokasi.' #'.$code_produk ?>
					</h4>
					<span class="m-widget5__desc">
						<?= $kota.', '.$provinsi ?>
					</span>
					<div class="m-widget5__info">
						<span class="m-widget5__author">
							klien:
						</span>
						<span class="m-widget5__info-label m--font-info">
							<?= $klien ?>
						</span>
						<br>
						<span class="m-widget5__info-author-name">
							owner:
						</span>
						<span class="m-widget5__info-author-name m--font-info">
							<?= $owner ?>
						</span>
						<br>
						<span class="m-widget5__info-label">
							tayang:
						</span>
						<span class="m-widget5__info-date m--font-info">
							<?= $start.' - '.$end ?>
						</span>
					</div>
				</div>
				<div class="m-widget5__stats1">
					<span class="m-widget5__number m--font-info">
						<?= $price ?>
					</span>
					<br>
					<span class="m-widget5__sales">
						<?= $kategori ?>
					</span>
				</div>
				<div class="m-widget5__stats2">
					<span class="m-widget5__number m--font-info">
						<?= $durasi ?>
					</span>
					<br>
					<span class="m-widget5__votes">
						durasi
					</span>
				</div>
			</div>
			
		</div>		

	</div>
    
</div>
