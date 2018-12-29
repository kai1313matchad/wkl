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

    .tbl-checkout {
        font-size: 14px;
        font-weight: 700;
    }

    .tbl-checkout tr td{
        padding: 5px;
    }
    .right {
        text-align: right;
    }
    .rupiah {
        font-size: 16px;
    }

    .title:before, .title:after { 
        height: 1px; 
        background: #ddd; 
    }


    /* Flex implementation */
    .title { 
        display:flex; 
        flex-direction: row; 
        flex-wrap: nowrap; 
        align-items:center; 
        color: #ddd;
    }
    .title:before { 
        content:" "; 
        display:block; 
        min-width:20px; 
        flex: 1 1 0%; 
    }
    .title:after { 
        content:" "; 
        display:block; 
        min-width:20px; 
        flex: 1 1 0%; 
    }

    h5.comment-title {
        margin-top: 20px;
        font-weight: 600;
    }

    table.tabel7 tr td {
        height: 15px;
    }
</style>

<div class="col-lg-12">

        <?php 
        if (isset($flash)) {
            echo $flash;
        }
        ?>

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

                                $sub_total = $row->price;
                                $grand_total = $grand_total + $sub_total;
                                $tax = ($grand_total * 10)/ 100;

                                $edit = ($kategori == 'Videotron') ? 'edit_cart_videotron' : 'edit_cart';
							?>	
                            <article class="box">
                                <figure class="col-sm-4">
                                    <a title="" href="<?= $view_product ?>" class=""><img width="270" height="160" alt="" src="<?= ($pic != '') ? $image_location : 'http://placehold.it/270x160' ?>"></a>
                                    <div class="rel-category">
                                        <span class="label label-warning"><?= $tipe_kategori ?></span>
                                    </div>
                                </figure>
                                
                                <div class="details col-sm-8">
                                    <div class="clearfix">
                                    	<div class="col-xs-7 alamat-lokasi">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td style="height: 2px !important;">
                                                            <div style="display: block;">
                                                                <h5 class="box-title pull-left" style="line-height: 16px; display: block;">
                                                                    <i class="soap-icon-departure yellow-color"></i> 
                                                                    <a href="<?= $view_product ?>"><?= $row->item_title ?> </a>
                                                                </h5>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                            <span class="skin-color" style="display: block; font-size: 10px;"><strong>#<?= $kode_produk ?></strong></span>
                                        	

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
	                                                <span class="skin-color" style="margin-left: 5px;">Durasi</span><br><?= $row->duration ?> bulan
	                                            </div>
                                            </div>
                                            <div class="col-xs-3">
                                            	<!-- <a href="javascript:void(0);" data-id="<?= $row->basket_id ?>" data-title="<?= $row->item_title ?>" class="openPopup" title="edit"> -->
                                                <a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/<?= $edit ?>/<?= $row->basket_id ?>/cart');" data-toggle="modal" data-target="#m_modal" title="edit">
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
                                                <table class="jadwal tabel7">
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
                                        <div class="col-xs-4 date">
                                            <div>
                                             
                                                <table class="tabel7">
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
                                        <div class="col-xs-2 departure">
                                        	<div>
	                                            <table class="tabel7">
                                                	<tbody style="color: #e44049; font-weight: bold;">
                                                		<tr class="">
                                                			<!-- <td class="skin-color">Sisi :</td>
                                                			<td width="10%"> </td> -->
                                                			<td> <?= $jml_sisi ?></td>
                                                		</tr>
                                                		<tr class="">
                                                			<!-- <td class="skin-color">Jln :</td>
                                                			<td width="10%"> </td> -->
                                                			<td> <?= $tipe_jalan ?></td>
                                                		</tr>
                                                		<tr class="">
                                                            <!-- <td class="skin-color">Ket :</td>
                                                            <td width="10%"> </td> -->
                                                            <td> <?= $ket_lokasi ?></td>
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
                                        <a href="<?= base_url() ?>store_basket/delete_order/<?= $row->basket_id ?>" class="button btn-small red pull-right"><i class="fa fa-trash"></i> Hapus</a>
                                    </div>
                                </div>
                            </article>
                            
                          	<?php } ?> 

                          	<div class="col-md-4">
                               <!-- <div style="background: #fff; padding: 10px; box-shadow: 0 5px 20px 0 rgba(80,106,172,0.3);">
                                    <h4>Cetak PO</h4>
                                    <hr>
                                    <form action="<?= base_url() ?>store_basket/pe_de_ef/<?= $this->session->userdata('user_id') ?>" method="POST">
                                        <button type="submit" class="button btn-medium green full-width">Cetak</button>
                                    </form>
                               </div>  -->
                            </div>
                          	<div class="col-md-4" >
                          		<!-- <div style="background: #fff; padding: 10px; box-shadow: 0 5px 20px 0 rgba(80,106,172,0.3);">
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
                          		</div> -->
                       
                          	</div>
                          	<div class="col-md-4" style="background: #fff; padding: 10px; box-shadow: 0 5px 20px 0 rgba(80,106,172,0.3);"> 
                          		<div >
                          			<h3>Checkout</h3>
                          			<hr>
                          			<table class="tbl-checkout">
                          				<tbody>
                          					<tr>
                          						<td>Subtotal</td>
                          						<td width="10%" class="right">Rp.</td>
                          						<td width="50%" class="right rupiah"><?php $this->site_settings->currency_format($grand_total); ?></td>
                          					</tr>
                          					<tr>
                          						<td>PPN (10%)</td>
                          						<td class="right">Rp.</td>
                          						<td class="right rupiah"><?php $this->site_settings->currency_format($tax); ?></td>
                          					</tr>
                                            <tr>
                                                <td colspan="3"></td>
                                            </tr>
                          				</tbody>
                          				<tfoot>
                          					<tr style="border-top: 1px solid #ddd;">
                          						<td style="padding-top: 10px;"><b>ESTIMATED TOTAL</b></td>
                          						<td class="right">Rp.</td>
                          						<td class="right rupiah"><?php $this->site_settings->currency_format($grand_total + $tax); ?></td>
                          					</tr>
                          				</tfoot>
                          			</table>
                          			<hr>
                                    <a href="<?= base_url() ?>store_basket/pe_de_ef/<?= $this->session->userdata('user_id') ?>" class="button btn-large green full-width">Cetak Penawaran</a>
                                    
                                    <!-- <h5 class="comment-title title">OR</h5> -->
                                    
                                    <?php // Modules::run('cart/_attempt_draw_checkout_btn', $query) ?>

                          			
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

    
    tjq('#datepicker').datepicker({
        language: 'pt-BR'
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


<script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        tjq('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        tjq('#modal_ajax').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        tjq.ajax({
            url: url,
            success: function(response)
            {
                tjq('#modal_ajax .modal-content').html(response);

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