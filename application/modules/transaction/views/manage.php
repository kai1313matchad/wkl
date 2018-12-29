<style type="text/css">
	
.content h1 {
	text-align: center;
}
.content .content-footer p {
	color: #6d6d6d;
    font-size: 12px;
    text-align: center;
}
.content .content-footer p a {
	color: inherit;
	font-weight: bold;
}

.panel {
	border: 1px solid #fff;
	*background-color: #fcfcfc;
	box-shadow: none;
}
.panel .btn-group {
	margin: 15px 0 30px;
}
.panel .btn-group .btn {
	transition: background-color .3s ease;
}
.table-filter {
	background-color: #fff;
	*border-bottom: 1px solid #eee;
}
.table-filter tbody tr:hover {
	cursor: pointer;
	background-color: #eee;
}
.table-filter tbody tr td {
	padding: 10px;
	vertical-align: middle;
	border-top-color: #eee;
}
.table-filter tbody tr.selected td {
	background-color: #eee;
}
.table-filter tr td:first-child {
	width: 38px;
}
.table-filter tr td:nth-child(2) {
	width: 35px;
}
.ckbox {
	position: relative;
}
.ckbox input[type="checkbox"] {
	opacity: 0;
}
.ckbox label {
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
.ckbox label:before {
	content: '';
	top: 1px;
	left: 0;
	width: 18px;
	height: 18px;
	display: block;
	position: absolute;
	border-radius: 2px;
	border: 1px solid #bbb;
	background-color: #fff;
}
.ckbox input[type="checkbox"]:checked + label:before {
	border-color: #2BBCDE;
	background-color: #2BBCDE;
}
.ckbox input[type="checkbox"]:checked + label:after {
	top: 3px;
	left: 3.5px;
	content: '\e013';
	color: #fff;
	font-size: 11px;
	font-family: 'Glyphicons Halflings';
	position: absolute;
}
.table-filter .star {
	color: #ccc;
	text-align: center;
	display: block;
}
.table-filter .star.star-checked {
	color: #F0AD4E;
}
.table-filter .star:hover {
	color: #ccc;
}
.table-filter .star.star-checked:hover {
	color: #F0AD4E;
}
.table-filter .media-photo {
	width: 35px;
}
.table-filter .media-body {
    *display: block;
}
.table-filter .media-meta {
	font-size: 11px;
	color: #999;
}
.table-filter .media .title {
	color: #2BBCDE;
	font-size: 14px;
	font-weight: bold;
	line-height: normal;
	margin: 0;
}
.table-filter .media .title span {
	font-size: .8em;
	margin-right: 20px;
}
.table-filter .media .title span.pagado {
	color: #5cb85c;
}
.table-filter .media .title span.pendiente {
	color: #f0ad4e;
}
.table-filter .media .title span.cancelado {
	color: #d9534f;
}
.table-filter .media .summary {
	font-size: 14px;
}

table td.lokasi {
	width: 260px !important;
}

table td.harga {
	width: 180px !important;
	text-align: right;
	font-size: 16px;
	font-weight: bold;
}

table td.tengah {
	text-align: center;
}

table td.up-down {
	text-align: center;
	font-size: 16px;
}

table thead {
	font-size: 16px;
	font-weight: bold;
	text-transform: uppercase;
}

thead th {
	text-align: center;
}

.ghost-btn {
  font-family: "Arial";
  font-size: 1.5167em;
  display: inline-block;
  text-decoration: none;
  border: 1px solid #3f6fa0;
  height: 60px;
  width: 100% !important;
  padding: 0 0 !important;
  line-height: 28px;
  color: #3f6fa0;
  -webkit-border-radius: 5px;
  -webkit-background-clip: padding-box;
  -moz-border-radius: 5px;
  -moz-background-clip: padding;
  border-radius: 2px;
  background-clip: padding-box;
  
  *padding: .4em 1.4em;
  -webkit-transition: all 0.2s ease-out;
  -moz-transition: all 0.2s ease-out;
  -o-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
  background: #fff;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  cursor: pointer;
  zoom: 1;
  -webkit-backface-visibility: hidden;
  position: relative;
}
.ghost-btn:hover {
  -webkit-transition: 0.2s ease;
  -moz-transition: 0.2s ease;
  -o-transition: 0.2s ease;
  transition: 0.2s ease;
  background-color: #3f6fa0;
  color: #fff;
}
.ghost-btn:focus {
  outline: none;
}

.ghost-btn.btn-red {
	border: 1px solid #e44049;
	color: #e44049;
}
.ghost-btn.btn-red:hover {
	background-color: #e44049;
	color: #fff;
}

.ghost-btn.btn-blue {
	border: 1px solid #0ab596;
	color: #0ab596;
}
.ghost-btn.btn-blue:hover {
	background-color: #0ab596;
	color: #fff;
}

.ghost-btn.btn-orange {
	background-color: #f0ad4e;
	border: 1px solid #f0ad4e;
	color: #fff;
}
.ghost-btn.btn-orange:hover {
	background-color: #f0ad4e;
	color: #fff;
}

.ghost-btn.btn-green {
	background-color: #47a447;
	border: 1px solid #47a447;
	color: #47a447;
	color: #fff;
}
.ghost-btn.btn-green:hover {
	background-color: #47a447;
	color: #fff;
}

.ghost-btn.btn-sky-blue1 {
	background-color: #3f6fa0;
	border: 1px solid #3f6fa0;
	color: #47a447;
	color: #fff;
}
.ghost-btn.btn-sky-blue1:hover {
	background-color: #3f6fa0;
	color: #fff;
}

table tfoot {
	background: #eee;
}
.flex {
	display: flex;
	
	text-align: center;
  	font-size: 30px;
  	border: 1px solid #ddd;
}
.code {
	color: #01b7f2;
	font-weight: 800;
	margin: 5px 0;
}

tfoot td.total {
	border-left: 1px solid #ddd;
	font-weight: bolder;
	font-size: 30px;
	vertical-align: middle;
}
.tipe {
	margin: 5px 0;
	font-weight: bold;
}

/*******************************************/

.tab-container.full-width-style.arrow-left ul.tabs li {
    margin-bottom: 4px;
}

.tab-container.full-width-style ul.tabs li {
    float: none;
    margin: 0;
    padding-right: 0;
}
.tab-container.style1 ul.tabs li {
    padding-right: 10px;
}
.tab-container ul.tabs.full-width li {
    float: none;
    display: table-cell;
    vertical-align: middle;
    width: 1%;
}
.tab-container ul.tabs li {
    float: left;
    padding-right: 4px;
}
.tab-container.style1 ul.tabs.full-width li a {
    padding: 0;
}
.tab-container.style1 ul.tabs li.active > a, .tab-container.style1 ul.tabs li:hover > a {
    color: #fff;
    background: #01b7f2;
    border-left: none !important;
    position: relative;
}
.tab-container.style1 ul.tabs li a {
    height: 30px;
    line-height: 30px;
    background: #f5f5f5;
    padding: 0 18px;
    color: #9e9e9e;
    font-weight: normal;
    font-size: 0.9167em;
    font-weight: bold;
}
.tab-container ul.tabs.full-width li a {
    padding: 0;
    text-align: center;
}
.tab-container ul.tabs li.active > a, .tab-container ul.tabs li:hover > a {
    color: #01b7f2;
    background: #fff;
}
.tab-container ul.tabs li a {
    color: #fff;
    display: block;
    padding: 0 20px;
    background: #d9d9d9;
    font-size: 1em;
    font-weight: bold;
    height: 40px;
    line-height: 40px;
    text-decoration: none;
    text-transform: uppercase;
    white-space: nowrap;
}

.tab-container.style1 ul.tabs li.active > a:after, .tab-container.style1 ul.tabs li:hover > a:after {
    position: absolute;
    bottom: -5px;
    left: 50%;
    margin-left: -10px;
    border-top: 5px solid #01b7f2 !important;
    *border-left: 7px solid transparent;
    *border-right: 7px solid transparent;
    content: "";
    border-left: none !important;
    border-right: none !important;
}
ul#list-trans li {
	font-size: 18px;
	font-weight: 700;
}
.Cell
    {
        display: table-cell;
        border: solid;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
    }
article.box {
	width: 950px !important;
}

.item-title {
	line-height: 20px;
	text-align: left;
}

span.price {

}
.rel-category {
    position: absolute;
    top: 10px;
    left: 15px;
}
.konten-title {
	margin: 20px;
}
.konten-title span {
	font-size: 16px;
}

.stay-color {
	color: #01b7f2 !important;
}
/***************************************
div table    
***************************************/
.listing-style3 .box {
    box-shadow: 0 5px 20px 0 rgba(80,106,172,0.3);
}

.listing-style3.flight figure span img {
    *width: 380px !important;
    height: auto;
}


</style>

<div class="tab-container style1">
	<div class="konten-title"><h2>Transaksi <span>- Monitoring Titik Lokasi</span></h2></div>
        <ul class="tabs full-width" id="list-trans">
            <li class="active"><a href="<?= base_url() ?>transaction" >Pembelian</a></li>
            <li><a href="<?= base_url() ?>transaction/selling" >Penjualan</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="pembelian">
                <!-- <h4>Check Complete Layouts</h4> -->
                
                <div class="col-lg-12 listing-style3 flight">
                	<div class="row">

                		<?php
						$grand_total = 0;
						$this->load->module('manage_product');
                        $this->load->module('store_categories');
                        $this->load->module('store_labels');
                        $this->load->module('store_sizes');
                        $this->load->module('store_roads');
                        $this->load->module('store_provinces');
                        $this->load->module('store_cities');
                        $this->load->module('site_settings');
                        $this->load->module('timedate');
						foreach ($campaign->result() as $camp) {
                            $id = $camp->item_id;
                            $no_transaksi = $camp->no_transaksi;
                            $approved = $camp->approved;
                            $order_status = $camp->order_status;
                            if ($order_status == 'Done') {
                            	$pesan = 'Done';
                            	$color = 'sky-blue1';
                        		$link_detail = base_url().'transaction/purchase/'.$camp->session_id;
                        		$colored_approval = 'stay-color';
                            } else {
	                            switch ($approved) {
	                            	case '1':
	                            		$pesan = 'SUKSES';
	                            		$color = 'green';
	                            		$link_detail = base_url().'transaction/purchase/'.$camp->session_id;
	                            		$colored_approval = 'stay-color';
	                            		break;
	                            	
	                            	default:
	                            		$pesan = 'STANDBY';
	                            		$color = 'orange';
	                            		$link_detail = '#';
	                            		$colored_approval = '';
	                            		break;
	                            }
                            }
							$prod = App::view_by_id($id);
							$kategori_produk = $this->store_categories->get_name_from_category_id($prod->cat_prod);
							$view_product = base_url()."product/billboard/".$prod->item_url;
							$image_location = base_url().'marketplace/limapuluh/'.$prod->limapuluh;
							$alamat = $prod->item_title;
							$code = $prod->prod_code;
							$prov = $this->store_provinces->get_name_from_province_id($prod->cat_prov);
							$kota = $this->store_cities->get_name_from_city_id($prod->cat_city);
							$jalan = $this->store_roads->get_name_from_road_id($prod->cat_road);
							$price = $camp->price;
							$display = $this->manage_product->get_name_from_display_id($prod->cat_type);
							$start = $this->timedate->get_nice_date($camp->start, 'indo'); 
					        $end = $this->timedate->get_nice_date($camp->end, 'indo');
					        $jml_sisi = $this->manage_product->show_amount_side($prod->jml_sisi);
							$tipe_cahaya = $this->manage_product->get_name_from_light_id($prod->cat_light);
							$durasi = $camp->duration;
							$size = $this->store_sizes->get_name_from_size_id($prod->cat_size);
							$lat = $prod->lat;
							$lng = $prod->long;

							// untuk progress status
							$order_id = $camp->id; 
							$item_id = $camp->item_id; 
							$user_id = $camp->shopper_id;

							$upl_materi = App::get_materi($order_id, $item_id, $user_id);
							$dl_materi = App::get_materi_download($order_id, $item_id, $user_id);

							switch ($upl_materi) {
								case NULL:
									$colored_upl_materi = '';
									break;
								
								default:
									$colored_upl_materi = 'stay-color';
									break;
							}

							switch ($dl_materi) {
								case NULL:
									$colored_dl_materi = '';
									break;
								
								default:
									$colored_dl_materi = 'stay-color';
									break;
							}
						?>

	                    <article class="box">
	                        <figure class="col-xs-3 col-sm-2">
	                            <div><img style="width: 100%;" alt="" src="<?= ($prod->limapuluh != '') ? $image_location : 'http://placehold.it/270x160' ?>"></div>
	                            <div class="rel-category">
                                    <span class="label label-warning"><?= $kategori_produk ?></span>
                                </div>
	                        </figure>
	                        <div class="details col-xs-9 col-sm-10">
	                            <div class="details-wrapper">
	                                <div class="first-row">
	                                    <div class="col-sm-10">
	                                    	<div class="col-sm-7">
	                                    		 <a href="<?= $view_product ?>"><h4 class="box-title item-title">
												<?= $alamat ?>
												<small style="color: #01b7f2;">#<?= $code ?></small>
												<small style="color: #ff6000">no. transaksi: <?= $no_transaksi ?></small>
												</h4></a>
	                                    	</div>
	                                        
	                                        <!-- <a class="button btn-mini yellow">1 STOP</a> -->
	                                        <div class="col-sm-5">
		                                        <span class="price" style="text-transform: none; text-align: right; padding-right: 10px;">Rp. <?php $this->site_settings->currency_format($price); ?></span>
	                                        </div>
	                                        
	                                        <div class="amenities" style="margin-top: 10px;">
	                                            <i class="soap-icon-stories circle <?= $colored_approval ?>" data-toggle="tooltip" data-placement="bottom" title="proses pembayaran"></i>
	                                            <i class="soap-icon-magazine circle <?= $colored_upl_materi ?>" data-toggle="tooltip" data-placement="bottom" title="kirim materi"></i>
	                                            <i class="soap-icon-lost-found circle <?= $colored_dl_materi ?>" data-toggle="tooltip" data-placement="bottom" title="proses pengerjaaan"></i>
	                                            <i class="soap-icon-grid circle" data-toggle="tooltip" data-placement="bottom" title="materi terpasang"></i>
	                                        </div>
	                                    </div>
	                                    <div class="col-sm-2">
		                                   	<span style="padding: 5px;">
		                                    	<button class="ghost-btn btn-stat btn-<?= $color ?>"><?= $pesan ?></button>
		                                    </span>
	                                    </div>
	                                   
	                                </div>
	                                <div class="second-row">
	                                	<div class="col-sm-10">
		                                    <div class="time">
		                                        <div class="take-off2 col-sm-4">
		                                            <div class="icon"><i class="soap-icon-calendar yellow-color"></i></div>
		                                            <div>
		                                                <span class="skin-color">awal tayang</span><br><?= $start ?>
		                                            </div>
		                                        </div>
		                                        <div class="landing2 col-sm-4">
		                                            <div class="icon"><i class="soap-icon-calendar yellow-color"></i></div>
		                                            <div>
		                                                <span class="skin-color">akhir tayang</span><br><?= $end ?>
		                                            </div>
		                                        </div>
		                                        <div class="total-time col-sm-4">
		                                            <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
		                                            <div>
		                                                <span class="skin-color">durasi</span><br><?= $durasi ?> Bulan
		                                            </div>
		                                        </div>

		                                    </div>
		                                </div>    
		                                <div class="col-sm-2">
		                                    <span style="padding: 5px;">
		                                    	<a href="<?= $link_detail ?>" class="button btn-small green full-width">DETAIL</a>
		                                    </span>
		                                </div>
	                                   
	                                </div>
	                            </div>
	                        </div>
	                    </article>
	                    
	                    <?php } ?>

	                    <!-- this for estimasi -->
	                    <article class="box"></article>
                    </div>
                </div>

            </div>
            
           
        </div>
    </div>

<!-- <div id="profile" class="tab-pane fade in active">

	<section class="content">
		<div class="panel panel-default">
			<div class="panel-body">
				
				<div class="table-container">
					<table class="table table-filter">
						<thead>
							<tr>
								<th class="lokasi">LOKASI</th>
								<th>Durasi</th>
								<th>Start - End</th>
								<th>Status</th>
								<th></th>
								<th><i class="soap-icon-clock"></i></th>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody>
<?php
	if ($campaign->num_rows() > 0) {
		
		$this->load->module('manage_product');
		$this->load->module('store_categories');
		$this->load->module('store_labels');
		$this->load->module('store_sizes');
		$this->load->module('store_roads');
		$this->load->module('store_provinces');
		$this->load->module('store_cities');
		$this->load->module('site_settings');
		foreach ($campaign->result() as $row) {
			$camp = $this->manage_product->view_item_by_id($row->item_id);
			$view_product = base_url()."product/billboard/".$camp->item_url;
			$pic = $camp->limapuluh;
			$lokasi = $row->item_title;
			$ooh_code = $camp->prod_code;
			$jenis = $this->store_categories->get_name_from_category_id($camp->cat_prod);
			$durasi = $row->duration;
			$start = $row->start;
			$end = $row->end;
			$status = '';
			$waktu = $row->date_added;
			$harga = $row->price; 
			$nominal = substr(str_replace( ',', '', $harga), 0);
        	$rupiah = number_format($nominal,0,',','.');
?>
							<tr>
								<td class="lokasi">
									<div>
										<div class="img">
											<img src="">
										</div>
										<div class="title">
											<a href="<?= $view_product ?>">
											<?= $lokasi ?></a>
											<div class="code">#<?= $ooh_code ?></div>
											<div class="tipe"><label class="label label-success" style="font-size: 12px !important;"><?= $jenis ?></label></div>
										</div>
									</div>
								</td>
								<td class="tengah">
									<button class="ghost-btn btn-durasi btn-blue"><?= $durasi ?> bulan</button>
								</td>
								<td class="tengah">
								
								<?php 
								$this->load->module('timedate');
								echo '<span>'.$this->timedate->get_nice_date($start, 'indo').'</span>'.'<br><span>'.$this->timedate->get_nice_date($end, 'indo').'</span>';
								?>
								</td>
								<td class="tengah">
									<a href="<?= base_url() ?>campaign/get_request"><button class="ghost-btn btn-stat btn-green">success</button></a>
								</td>
								<td class="up-down">
									<a href="#" title="download materi"><i class="fa fa-download"></i></a>
								</td>
								<td class="tengah">
									<?php 
									echo timeago($waktu);

									?>
								</td>
								<td class="harga"><?= $rupiah ?></td>
							</tr>
											
<?php
		} 
	} else {
?>				

<tr>
	<td colspan="7">tidak ada data</td>
</tr>

<?php } ?>

						</tbody>
						<tfoot>
							<tr>
								<td><div class="flex">4 Lokasi</div></td>
								<td><div class="flex"></div></td>
								<td><div class="flex"></div></td>
								<td><div class="flex"></div></td>
								<td colspan="3" class="total">Rp. 3,2 Mily</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

		
	</section>
</div> -->

<script type="text/javascript">
	tjq(document).ready(function () {

	tjq('.star').on('click', function () {
      tjq(this).toggleClass('star-checked');
    });

    tjq('.ckbox label').on('click', function () {
      tjq(this).parents('tr').toggleClass('selected');
    });

    tjq('.btn-filter').on('click', function () {
      var $target = tjq(this).data('target');
      if ($target != 'all') {
        tjq('.table tr').css('display', 'none');
        tjq('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        tjq('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
</script>