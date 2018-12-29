<?php
$delete_product_on_cart = base_url().'cart/delete_product';
?>

<style type="text/css">
	.listing-style3 .box {
		box-shadow: 0 5px 20px 0 rgba(80,106,172,0.3);
	}
	.no_item {
		text-align: center;

	}
	.rel-category {
        position: absolute;
        top: 10px;
        left: 15px;
    }
    .rel-category span.label {
        font-size: 12px !important;
    }
    .jadwal {
    	text-transform: none;
    }
    .jadwal tr td:last {
    	float: right;
    	margin-left: 5px;
    }
    .price {
    	text-transform: none;
    }
    .alamat-lokasi a:hover {
    	color: #01b7f2;
    }
    .datepicker-wrap .ui-datepicker-trigger{
    	z-index: 1151 !important;
    }
</style>

<div class="col-lg-12">
				<div class="block">
                    <div class="row2">
                        
                        <div class="col-lg-12 listing-style3 cruise">


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
							foreach ($query->result() as $row) {
                                $image_location = base_url().'marketplace/limapuluh/900x500/'.$row->limapuluh;
                                $view_product = base_url()."product/billboard/".$row->item_url;
                                $pic = $row->limapuluh;
                                $type = $row->cat_type;
                                $durasi = $row->duration;
                                
                                $tipe_kategori = $this->store_categories->get_name_from_category_id($row->cat_prod);
                                $tipe_jalan = $this->store_roads->get_name_from_road_id($row->cat_road);
                                $tipe_ukuran = $this->store_sizes->get_name_from_size_id($row->cat_size);
                                $tipe_cahaya = $this->manage_product->get_name_from_light_id($row->cat_light);
                                $tipe_display = $this->manage_product->get_name_from_display_id($row->cat_type);

                                $stat_type = $this->store_labels->get_name_from_label_id($row->cat_stat);
                                $kategori = $this->store_categories->_get_cat_title($row->cat_prod);
                                $kode_produk = $row->prod_code;

                                $rate = $this->manage_product->count_rate($kode_produk);
                                $rating = $rate * 20;

                                $count_like = $this->manage_product->count_likes($kode_produk);

                                $jml_viewer = $row->viewer;
                                $jml_sisi = $this->manage_product->show_amount_side($row->jml_sisi);
                                $ket_lokasi = $this->manage_product->show_ket_lokasi($row->ket_lokasi);
                                $jml_ulasan = $this->manage_product->count_review($kode_produk);

                                $nama_provinsi = $this->store_provinces->get_name_from_province_id($row->cat_prov);
                                $nama_kota = $this->store_cities->get_name_from_city_id($row->cat_city);

                                $start = $this->timedate->get_nice_date($row->start, 'indo'); 
                                $end = $this->timedate->get_nice_date($row->end, 'indo');
							?>	

							<?php
							if($durasi <= 2) {
								echo Modules::run('checkout/_draw_checkout_type1');
							} elseif (($durasi > 3) && ($durasi <= 5)) {
								echo Modules::run('checkout/_draw_checkout_type2');
							} 
							if ($durasi > 5) {
								echo Modules::run('checkout/_draw_checkout_type3');
							}
							?>
                           <!--  <article class="box">
                                <figure class="col-sm-4">
                                    <a title="" href="<?= $view_product ?>" class=""><img width="270" height="160" alt="" src="<?= ($pic != '') ? $image_location : 'http://placehold.it/270x160' ?>"></a>
                                    <div class="rel-category">
                                        <span class="label label-warning"><?= $tipe_kategori ?></span>
                                    </div>
                                </figure>
                                
                                <div class="details col-sm-8">
                                    <div class="clearfix">
                                    	<div class="col-xs-7 alamat-lokasi">
                                    		
                                				<h5 class="box-title pull-left" style="line-height: 18px"><i class="soap-icon-departure yellow-color"></i> <a href="<?= $view_product ?>"><?= $row->item_title ?> </a></h5>
                                			
                                        	<div>
                                        		<span class="skin-color"><strong>#<?= $kode_produk ?></strong></span>
                                        	</div>

										</div>
										<div class="col-xs-5">
                                        	<span class="price pull-right">Rp. <?php $this->site_settings->currency_format($row->price); ?></span>
                                        </div>
                                    </div>
                                    <div class="character clearfix">
                                        <div class="col-xs-3 date">
                                            <div class="col-xs-8">
	                                            <i class="soap-icon-clock yellow-color"></i>
	                                            <div>
	                                                <span class="skin-color">Durasi</span><br><?= $row->duration ?> bulan
	                                            </div>
                                            </div>
                                            <div class="col-xs-3">
                                            	<a href="javascript:void(0);" data-id="<?= $row->basket_id ?>" data-title="<?= $row->item_title ?>" class="openPopup" title="edit">
                                            		<div class="icon-box style8">
                                            			<i class="fa fa-pencil-square-o" style="font-size: 18px; float: left; line-height: 28px"></i>
                                            		</div>
                                            	</a>

                                            </div>
                                        </div>
                                        <div class="col-xs-3 date">
                                            <i class="soap-icon-calendar yellow-color"></i>
                                            <div>
                                                <span class="skin-color">Jadwal Tayang</span>
                                                <br>
                                                <table class="jadwal">
                                                	<tbody>
                                                		<tr class="start">
                                                			<td>Awal :</td>
                                                			<td width="10%"> </td>
                                                			<td> 
                                                				<?= $start ?>
                                                			</td>
                                                		</tr>
                                                		<tr class="end">
                                                			<td>Akhir :</td>
                                                			<td width="10%"> </td>
                                                			<td>
                                                				<?= $end ?>
                                                			</td>
                                                		</tr>
                                                	</tbody>
                                                </table>
                                               
                                            </div>
                                        </div>
                                        <div class="col-xs-3 departure">
                                            <div>
                                             
                                                <table class="">
                                                	<tbody>
                                                		<tr class="">
                                                			<td class="skin-color">Ukuran :</td>
                                                			<td width="10%"> </td>
                                                			<td> <?= $tipe_ukuran ?> m</td>
                                                		</tr>
                                                		<tr class="">
                                                			<td class="skin-color">Display :</td>
                                                			<td width="10%"> </td>
                                                			<td> <?= $tipe_display ?></td>
                                                		</tr>
                                                		<tr class="">
                                                			<td class="skin-color">Lampu :</td>
                                                			<td width="10%"> </td>
                                                			<td> <?= $tipe_cahaya ?></td>
                                                		</tr>
                                                	</tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xs-3 departure">
                                        	<div>
	                                            <table class="">
                                                	<tbody>
                                                		<tr class="">
                                                			<td class="skin-color">Sisi :</td>
                                                			<td width="10%"> </td>
                                                			<td> <?= $jml_sisi ?></td>
                                                		</tr>
                                                		<tr class="">
                                                			<td class="skin-color">Jalan :</td>
                                                			<td width="10%"> </td>
                                                			<td> <?= $tipe_jalan ?></td>
                                                		</tr>
                                                		
                                                	</tbody>
                                                </table>
	                                        </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="review pull-left">
                                            <div class="five-stars-container">
                                                <span class="five-stars" style="width: <?= $rating ?>%;"></span>
                                            </div>
                                            <span><?= $jml_ulasan ?> reviews</span>
                                        </div>
                                        <a href="#" class="button btn-small red pull-right"><i class="fa fa-trash"></i> Hapus</a>
                                    </div>
                                </div>
                            </article> -->
                            
                          	<?php } ?> 

                          	<div class="col-md-4"></div>
                          	<div class="col-md-4" >
                          		<div style="background: #fff; padding: 10px; box-shadow: 0 5px 20px 0 rgba(80,106,172,0.3);">
	                          		<h4>Coupon Code</h4>
	                          		<hr>
	                          		<form>
	                          			<div class="form-group">
	                          				<input type="text" class="input-text full-width" placeholder="offer code / coupon" style="">
	                          			</div>

	                          			<div class="form-group">
		                          			<button class="button btn-medium orange full-width">Add</button>
		                          		</div>
	                          		</form>
                          		</div>
                       
                          	</div>
                          	<div class="col-md-4" style="background: #fff; padding: 10px; box-shadow: 0 5px 20px 0 rgba(80,106,172,0.3);"> 
                          		<div >
                          			<h3>Checkout</h3>
                          			<hr>
                          			<table class="tbl-checkout">
                          				<tbody>
                          					<tr>
                          						<td>Subtotal</td>
                          						<td width="30%"></td>
                          						<td>Rp. 800.000.00</td>
                          					</tr>
                          					<tr>
                          						<td>PPN</td>
                          						<td></td>
                          						<td>Rp. 80.000.00</td>
                          					</tr>
                          				</tbody>
                          				<tfoot>
                          					<tr>
                          						<td>ESTIMATED TOTAL</td>
                          						<td></td>
                          						<td>Rp. 880.000.00</td>
                          					</tr>
                          				</tfoot>
                          			</table>
                          			<hr>
                          			<button class="button btn-large orange full-width">Checkout</button>
                          		</div>
                          	</div>
                        </div>
                    </div>
                </div>
            </div> 


<script>
tjq(document).ready(function(){
    tjq('.openPopup').on('click',function(){
        var dataID = tjq(this).attr('data-id');
        var dataTitle = tjq(this).attr('data-title');
        var dataURL = "<?= base_url().'store_basket/alter/'?>"+dataID;
        tjq('.modal-body').load(dataURL,function(){
            tjq('#myModal').modal({show:true});
            tjq('.modal-title').text(dataTitle);
        });

        console.log(dataURL);
    }); 
});
</script>            

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Bootstrap Modal with Dynamic Content</h5>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      
    </div>
</div>