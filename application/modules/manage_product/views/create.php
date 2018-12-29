

<style>
.panel {
    -webkit-box-shadow: none!important;
    -moz-box-shadow: none!important;
    box-shadow: none!important
}

.panel-group .panel {
    overflow: visible
}

.panel .panel-title>a:hover {
    text-decoration: none
}

.accordion .panel .panel-heading,
.accordion .panel .panel-title {
    padding: 0
}

.accordion .panel .panel-title .accordion-toggle {
    display: block;
    padding: 10px 15px
}

.accordion .panel .panel-title .accordion-toggle.accordion-toggle-styled {
    background: url(../img/accordion-plusminus.png) right -19px no-repeat;
    margin-right: 15px
}

.accordion .panel .panel-title .accordion-toggle.accordion-toggle-styled.collapsed {
    background-position: right 12px
}

.panel-heading {
    background: #eee
}

.panel-heading a,
.panel-heading a:active,
.panel-heading a:focus,
.panel-heading a:hover {
    text-decoration: none;
    font-size: 14px;
    color: #333;
}

.thumb img {
	width: 8.6rem;
}

#map-canvas {
    margin: 0;
    padding: 0;
    height: 100%;
}

#map-canvas {
    width: 100%;
    height: 270px;
}

#map {
    height: 400px;
    width: 100%;
}
</style>


<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					<?= $headline ?>
				</h3>
			</div>

			<!-- <div class="m-demo__preview m-demo__preview--btn">
				<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/promo/<?=$update_id?>/manage_product');" data-toggle="modal" data-target="#m_modal" class="btn btn-warning m-btn m-btn--icon" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Mark as Complete" data-skin="dark">
					<i class="la la-check-square"></i>Promo
				</a>
			</div> -->
		</div>

		<?php 
		$this->load->module('site_settings');
		$upload_image = base_url()."manage_product/upload_image/".$update_id;
		$delete_image = base_url()."manage_product/delete_image/".$update_id;
		$add_map = base_url()."manage_product/add_map/".$update_id;
		$add_document = base_url()."manage_product/upload_document/".$update_id;
		$add_maintenance = base_url()."manage_product/upload_maintenance/".$update_id;
		$upload_video = base_url()."manage_product/upload_video/".$update_id;
		$delete_video = base_url()."manage_product/delete_video/".$update_id;
		$kirim_pesan = base_url()."enquiries/send_message";
		$simulasi_harga = base_url()."manage_product/sim_price/".$update_id;
		$create_qr = base_url()."manage_product/create_qr/".$update_id;
		$delete_qr = base_url()."manage_product/delete_qr/".$update_id;
			if (is_numeric($update_id)) { 
		?>
<?php
$path_fifty = base_url().'marketplace/limapuluh/'.$limapuluh;
$path_hundred = base_url().'marketplace/seratus/'.$seratus;
$path_twohundred = base_url().'marketplace/duaratus/'.$duaratus;
$path_sipr = base_url().'marketplace/SIPR/'.$SIPR;
$path_imb = base_url().'marketplace/IMB/'.$IMB;
$path_sertifikat = base_url().'marketplace/sertifikat/'.$sertifikat;
$path_sspd = base_url().'marketplace/SSPD/'.$SSPD;
$path_jambong = base_url().'marketplace/JAMBONG/'.$JAMBONG;
$path_skrk = base_url().'marketplace/SKRK/'.$SKRK;
$path_vid = base_url().'marketplace/video/'.$video;
$path_qr = base_url().'marketplace/qr/'.$qr_code;
$path_download = base_url().'manage_product/download_file/';
?>


		<div class="m-portlet__head-tools">
			
				<a href="#" onclick="showAjaxModal2('<?= base_url()?>modal/popup/diskon/<?=$update_id?>/manage_product');" data-toggle="modal" data-target="#m_modal" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin-top: 15px;">
					<span>
						<i class="la la-tag"></i> 
						<span>
							Diskon
						</span>
					</span>
				</a>

				<!-- <a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/reward/<?=$update_id?>/manage_product');" data-toggle="modal" data-target="#m_modal" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin-top: 15px;">
					<span>
						<i class="flaticon-coins"></i> 
						<span>
							Reward
						</span>
					</span>
				</a> -->
			
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
						<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
							<i class="la la-ellipsis-h m--font-brand"></i>
						</a>
						<div class="m-dropdown__wrapper">
							<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
							<div class="m-dropdown__inner">
								<div class="m-dropdown__body">
									<div class="m-dropdown__content">
										<ul class="m-nav">
											<li class="m-nav__section m-nav__section--first">
												<span class="m-nav__section-text">
													Upload
												</span>
											</li>
										
											<li class="m-nav__item">
												<a href="<?= $upload_image ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-add"></i>
													<span class="m-nav__link-text">
														Upload Image
													</span>
												</a>
											</li>
										
											<li class="m-nav__item">
												<a href="<?= $add_document ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-folder"></i>
													<span class="m-nav__link-text">
														Upload Dokumen
													</span>
												</a>
											</li>
										<?php if ($video == "") { ?>	
											<li class="m-nav__item">
												<a href="<?= $upload_video ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-add"></i>
													<span class="m-nav__link-text">
														Upload Video
													</span>
												</a>
											</li>
										<?php } else { ?>
											<li class="m-nav__item">
												<a href="<?= $delete_video ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-cancel"></i>
													<span class="m-nav__link-text">
														Delete Video
													</span>
												</a>
											</li>
										<?php } ?>	
										<?php if ($qr_code == "") { ?>	
											<li class="m-nav__item">
												<a href="<?= $create_qr ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-add"></i>
													<span class="m-nav__link-text">
														Create QR code
													</span>
												</a>
											</li>
										<?php } else { ?>
											<li class="m-nav__item">
												<a href="<?= $delete_qr ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-cancel"></i>
													<span class="m-nav__link-text">
														Delete QR code
													</span>
												</a>
											</li>
										<?php } ?>		
											<li class="m-nav__section">
												<span class="m-nav__section-text">
													Any
												</span>
											</li>
											<li class="m-nav__item">
												<a href="<?= $add_map ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-map-location"></i>
													<span class="m-nav__link-text">
														Upload Map Lokasi
													</span>
												</a>
											</li>
											<li class="m-nav__item">
												<a href="<?= $add_maintenance ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-cogwheel"></i>
													<span class="m-nav__link-text">
														Report Maintenance
													</span>
												</a>
											</li>
											<li class="m-nav__item">
												<a href="#" class="m-nav__link" data-toggle="modal" data-target="#modal_pesan">
													<i class="m-nav__link-icon flaticon-chat-1"></i>
													<span class="m-nav__link-text">
														Kirim Pesan
													</span>
												</a>
											</li>
											<li class="m-nav__separator m-nav__separator--fit m--hide"></li>
											
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<?php } ?>
	
<!-- modal kirim pesan -->

<div class="modal fade show" id="modal_pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Pesan
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						×
					</span>
				</button>
			</div>
			<div class="modal-body">
				
				<form method="post" action="<?= $kirim_pesan ?>">
					<input type="hidden" name="sent_to" value="<?= $user_id ?>">	
					<input type="hidden" name="update_id" value="<?= $update_id ?>">
					<div class="form-group m-form__group">
						<label for="exampleInputEmail1">
							Subjek
						</label>
						<input type="text" class="form-control m-input" id="subject" name="subject" placeholder="Enter Subjek">
						<span class="m-form__help">
						</span>
					</div>
					<div class="form-group m-form__group">
						<label for="exampleInputEmail1">
							Pesan
						</label>
						<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="5" name="message"></textarea>
						<span class="m-form__help">
						</span>
					</div>
				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-primary" name="submit" value="Submit">
					Kirim Pesan
				</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- end -->

		
	</div>
	<!--begin::Form-->

	<?php 
	$form_location = base_url()."manage_product/create/".$update_id; 
	?>
	<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= $form_location ?>">
		<div class="m-portlet__body">
			<div class="form-group m-form__group m--margin-top-10">
				<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>
			</div>
		<div class="row">	
			<?php
			$grid = ($limapuluh != '') ? '8' : '12';
			if ($limapuluh != '') { ?>
				<div class="col-lg-4">
					<div class="form-group m-form__group row2" style="padding-left: 20px;">
						<div class="m-widget4__img thumb2">
							<img src="<?= $path_fifty ?>" class="img-responsive" width="300">
						</div>
						<div>
							<?php if ($qr_code != '') { ?>
							<img src="<?= $path_qr ?>" width="300">
							<?php } ?>
						</div>
					</div>
				</div>
				
			<?php } ?>
			<div class="col-lg-<?= $grid ?>">

			<div class="form-group m-form__group row">

				<label for="example-text-input" class="col-2 col-form-label">
					Judul
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="item_title"><?= $item_title ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_title'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Harga Klien <br><span style="font-style: italic; font-size: 10px; color: #f4516c;">harga 1 tahun</span>
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="was_price" name="was_price" value="<?php echo ($was_price != '') ? $this->site_settings->currency_format2($was_price) : 0; ?> 
					" disabled="disabled">
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Harga Fix <br><span style="font-style: italic; font-size: 10px; color: #f4516c;">harga 1 tahun</span>
				</label>
				<div class="col-5">
					<input class="form-control m-input m-input--air" type="text" id="item_price" name="item_price" value="<?php echo ($item_price != '') ? $this->site_settings->currency_format2($item_price) : 0; ?> ">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_price'); ?></div>
				</div>
				<div class="col-5">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGede">Simulasi</button>


<!-- modal gede -->
<div class="modal fade show" id="modalGede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			
			<div class="modal-body">
				<div class="m-form m-form--fit m-form--label-align-right">
					
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<div class="form-group m-form__group2 row">
								<div class="col-lg-8">
									<label>
										Harga Persil:
									</label>
									<input type="text" class="form-control m-input" id="harga_target" disabled="disabled" value="<?php echo ($was_price != '') ? $this->site_settings->currency_format2($was_price) : 0; ?>">
								</div>
								<div class="col-lg-4">
									<label class="">
										Persentase:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="number" class="form-control m-input" id="per_cent" value="5" max="100">
										<span class="m-input-icon__icon m-input-icon__icon--right">
											<span>
												<i class="la">%</i>
											</span>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group m-form__group2 row">
								<div class="col-lg-8">
									<label>
										Harga:
									</label>
									<input type="text" class="form-control m-input" id="harga_want" placeholder="Harga diinginkan">
								</div>
								<div class="col-lg-4">
									<label class="">
										Diskon:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="number" class="form-control m-input" id="persen" max="100">
										<span class="m-input-icon__icon m-input-icon__icon--right">
											<span>
												<i class="la">%</i>
											</span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<label class="">
								Harga Rekomendasi:
							</label>
							<input type="text" class="form-control m-input" disabled="disabled" id="rec_price">
							
						</div>
						<div class="col-lg-6">
							
							<label>
								Durasi:
							</label>
							<select class="form-control m-input m-input--air" id="durasi">
								<option value="" selected="selected">Please Select</option>
	                            <option value="1">1 Bulan</option>
	                            <option value="2">2 Bulan</option>
	                            <option value="4">4 Bulan</option>
	                            <option value="6">6 Bulan</option>
	                            <option value="9">9 Bulan</option>
	                            <option value="12">12 Bulan</option>
							</select>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							
							
						</div>
						<div class="col-lg-6">
							<label class="">
								Harga Dibayar:
							</label>
							<div class="m-input-icon m-input-icon--right">
								<div id="harga_bayar"></div>
							</div>
						</div>
					</div>

				</div>
			</div>
			
		</div>
	</div>
</div>

				<a href="<?= $simulasi_harga ?>" class="btn btn-warning">Add Harga</a>

				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Deskripsi
				</label>
				<div class="col-10">
					<textarea id="summernote" name="item_description"><?= $item_description ?></textarea>
					<!-- <textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="item_description"><?= $item_description ?></textarea> -->
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_description'); ?></div>
				</div>
			</div>
<div class="m-separator m-separator--dashed m-separator--md"></div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Provinsi
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air" id="provinsi"';
				  	$kategori_prov = array('' => 'Please Select',);
			        foreach ($prov->result_array() as $row) {
			            $kategori_prov[$row['id_prov']] = $row['nama'];   
			        }
				  	echo form_dropdown('cat_prov', $kategori_prov, $cat_prov, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_prov'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Kota/kabupaten
				</label>
				<div class="col-10">
					<select class="form-control m-input m-input--air" id="kota" name="cat_city">
						<?php
                            if (isset($update_id)) {
                        ?>
                            <option selected="selected" value="<?= $cat_city ?>"><?= $nama_kota ?></option>
                        <?php } ?>
					</select>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_city'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Kecamatan
				</label>
				<div class="col-10">
					<select class="form-control m-input m-input--air" id="kecamatan" name="cat_distric">
						<?php
                            if (isset($update_id)) {
                        ?>
                            <option selected="selected" value="<?= $cat_distric ?>"><?= $nama_kecamatan ?></option>
                        <?php } ?> 
					</select>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_distric'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Alamat
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="item_address"><?= $item_address ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_address'); ?></div>
				</div>
			</div>
<div class="m-separator m-separator--dashed m-separator--md"></div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Jenis
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_jenis = array('' => 'Please Select',);
			        foreach ($jenis->result_array() as $row) {
			            if ($row['cat_title'] != 'Indoor' && $row['cat_title'] != 'Branding') {
                    		$kategori_jenis[$row['id']] = $row['cat_title']; 
                    	}   
			        }
				  	echo form_dropdown('cat_prod', $kategori_jenis, $cat_prod, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_prod'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Kategori Jalan
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_jalan = array('' => 'Please Select',);
			        foreach ($jalan->result_array() as $row) {
			            $kategori_jalan[$row['id']] = $row['road_title'];   
			        }
				  	echo form_dropdown('cat_road', $kategori_jalan, $cat_road, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_road'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Ukuran
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_ukuran = array('' => 'Please Select',);
			        foreach ($ukuran->result_array() as $row) {
			            $kategori_ukuran[$row['id']] = $row['size'];   
			        }
				  	echo form_dropdown('cat_size', $kategori_ukuran, $cat_size, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_size'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Ketersediaan
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_ketersediaan = array(NULL => 'Please Select',);
			        foreach ($ketersediaan->result_array() as $row) {
			            $kategori_ketersediaan[$row['id']] = $row['label_title'];   
			        }
				  	echo form_dropdown('cat_stat', $kategori_ketersediaan, $cat_stat, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_stat'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Tipe
				</label>
				<div class="col-10">
					<div class="m-radio-inline">
						<label class="m-radio">
							<input type="radio" name="cat_type" value="1" <?php if($cat_type == 1){ ?> checked=checked <?php } ?> >
							Horizontal
							<span></span>
						</label>
						<label class="m-radio">
							<input type="radio" name="cat_type" value="2" <?php if($cat_type == 2){ ?> checked=checked <?php } ?> >
							Vertical
							<span></span>
						</label>
					</div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_type'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Light
				</label>
				<div class="col-10">
					<div class="m-radio-inline">
						<label class="m-radio">
							<input type="radio" name="cat_light" value="1" <?php if($cat_light == 1){ ?> checked=checked <?php } ?> >
							Front Light
							<span></span>
						</label>
						<label class="m-radio">
							<input type="radio" name="cat_light" value="2" <?php if($cat_light == 2){ ?> checked=checked <?php } ?> >
							Back Light
							<span></span>
						</label>
						<label class="m-radio">
							<input type="radio" name="cat_light" value="3" <?php if($cat_light == 3){ ?> checked=checked <?php } ?> >
							Tanpa Penerangan
							<span></span>
						</label>
					</div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_light'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Jumlah Sisi
				</label>
				<div class="col-10">
					<div class="m-radio-inline">
						<label class="m-radio">
							<input type="radio" name="jml_sisi" value="1" <?php if($jml_sisi == 1){ ?> checked=checked <?php } ?> >
							Satu Sisi
							<span></span>
						</label>
						<label class="m-radio">
							<input type="radio" name="jml_sisi" value="2" <?php if($jml_sisi == 2){ ?> checked=checked <?php } ?> >
							Dua Sisi
							<span></span>
						</label>
					</div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('jml_sisi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status Lokasi
				</label>
				<div class="col-10">
					<div class="m-radio-inline">
						<label class="m-radio">
							<input type="radio" name="ket_lokasi" value="1" <?php if($ket_lokasi == 1){ ?> checked=checked <?php } ?> >
							Reklame Sudah Berdiri
							<span></span>
						</label>
						<label class="m-radio">
							<input type="radio" name="ket_lokasi" value="2" <?php if($ket_lokasi == 2){ ?> checked=checked <?php } ?> >
							Reklame Belum Berdiri
							<span></span>
						</label>
					</div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('ket_lokasi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Active',
							  		'0' => 'Inactive'  
						  		);
				  	echo form_dropdown('status', $options, $status, $additional_dd_code);
				  	?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('status'); ?></div>
				</div>
			</div>
			
			</div></div>
			
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-5"></div>
					<div class="col-7">
						<button type="submit" class="btn btn-success" name="submit" value="Submit">
							Submit
						</button>
						<button type="submit" class="btn btn-secondary" name="submit" value="Cancel">
							Cancel
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!--end::Portlet-->

<?php
$path_img = base_url().'marketplace/big_pics/'.$big_pic;
if ($big_pic != "") { ?>

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Gambar
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="col-6">
			<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
				<img src="<?= $path_img ?>" width="" style="width: 100%;">
			</div>
		</div>
	</div>	
</div>
			
<?php } ?>	




<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Gambar
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">

		<!--begin::Section-->
		<div class="m-accordion m-accordion--default m-accordion--solid" id="m_accordion_5" role="tablist">
			<!--begin::Item-->
		
			<div class="m-accordion__item">
				<div class="m-accordion__item-head collapsed"  role="tab" id="m_accordion_5_item_1_head" data-toggle="collapse" href="#m_accordion_5_item_1_body" aria-expanded="    false">
					<span class="m-accordion__item-icon">
						<i class="fa flaticon-web"></i>
					</span>
					<span class="m-accordion__item-title">
						Upload Foto Lokasi
					</span>
					<span class="m-accordion__item-mode">
						<i class="la la-plus"></i>
					</span>
				</div>
				<div class="m-accordion__item-body collapse" id="m_accordion_5_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_1_head" data-parent="#m_accordion_5">
					<div class="m-portlet__body">
                    	<div class="m-widget4">
                    		<?php
							if ($limapuluh != "") { 
							?>
	                        <div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<a href="<?= $path_fifty ?>" data-fancybox>
										<img class="" src="<?= $path_fifty ?>" alt="">
									</a>
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Foto Lokasi jarak 50 m
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $path_download ?>limapuluh/<?= $update_id ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($seratus != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<a href="<?= $path_hundred ?>" data-fancybox>
										<img class="" src="<?= $path_hundred ?>" alt="">
									</a>
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Foto Lokasi jarak 100 m
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $path_download ?>seratus/<?= $update_id ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($duaratus != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<a href="<?= $path_twohundred ?>" data-fancybox>
										<img class="" src="<?= $path_twohundred ?>" alt="">
									</a>
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Foto Lokasi jarak 200 m
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $path_download ?>duaratus/<?= $update_id ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

		
			<!--end::Item--> 
<!--begin::Item-->
			<div class="m-accordion__item">
				<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_2_head" data-toggle="collapse" href="#m_accordion_5_item_2_body" aria-expanded="    false">
					<span class="m-accordion__item-icon">
						<i class="fa  flaticon-tabs"></i>
					</span>
					<span class="m-accordion__item-title">
						Upload Dokumen
					</span>
					<span class="m-accordion__item-mode">
						<i class="la la-plus"></i>
					</span>
				</div>
				<div class="m-accordion__item-body collapse" id="m_accordion_5_item_2_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_2_head" data-parent="#m_accordion_5">
					<div class="m-portlet__body">
                    	<div class="m-widget4">
                    		<?php
							if ($SIPR != "") { 
							?>
	                        <div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_sipr ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Surat Ijin Penyelenggaraan Reklame 
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $path_download ?>SIPR/<?= $update_id ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($IMB != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_imb ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Ijin Mendirikan Bangunan
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $path_download ?>IMB/<?= $update_id ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($SSPD != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_sspd ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Surat Setoran Pajak Daerah
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $path_download ?>SSPD/<?= $update_id ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($sertifikat != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_sertifikat ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Sertifikat
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $path_download ?>sertifikat/<?= $update_id ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($JAMBONG != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_jambong ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Jaminan Bongkar
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $path_download ?>JAMBONG/<?= $update_id ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($SKRK != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_skrk ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Surat Ketetapan Rencana Kota
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $path_download ?>SKRK/<?= $update_id ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!--end::Item--> 
<!--begin::Item-->
			<div class="m-accordion__item">
				<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_5_head" data-toggle="collapse" href="#m_accordion_5_item_5_body" aria-expanded="    false">
					<span class="m-accordion__item-icon">
						<i class="fa  flaticon-laptop"></i>
					</span>
					<span class="m-accordion__item-title">
						Upload Video
					</span>
					<span class="m-accordion__item-mode">
						<i class="la la-plus"></i>
					</span>
				</div>
				<div class="m-accordion__item-body collapse" id="m_accordion_5_item_5_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_5_head" data-parent="#m_accordion_5">
					<span>
						<?php
						if ($video != "") { 
						?>
						<video id="video1" class="video-js vjs-default-skin" width="480" height="320" poster="http://www.tutorial-webdesign.com/wp-content/themes/nurumah/img/logo-bg.png" data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
				            <source src="<?= $path_vid ?>" type="video/x-flv">
				            <source src="<?= $path_vid ?>" type='video/mp4'>
				        </video>
						<?php
						} 
						?>
					</span>
				</div>
			</div>
			<!--end::Item--> 			

			<div class="m-accordion__item">
				<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_4_head" data-toggle="collapse" href="#m_accordion_5_item_4_body" aria-expanded="    false">
					<span class="m-accordion__item-icon">
						<i class="fa  flaticon-cogwheel"></i>
					</span>
					<span class="m-accordion__item-title">
						Report Maintenance
					</span>
					<span class="m-accordion__item-mode">
						<i class="la la-plus"></i>
					</span>
				</div>
				<div class="m-accordion__item-body collapse" id="m_accordion_5_item_4_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_4_head" data-parent="#m_accordion_5">
					<div class="m-portlet__body">
                    	<div class="m-widget4">
	                        <?php 
	                        $this->load->module('manage_product');
	                        $this->load->module('timedate');
	                        foreach ($reports->result() as $report) {
	                        	$loc = $this->manage_product->location($report->type);
								$image_location = base_url().$loc.'300x160/'.$report->image;
								$image_big_location = base_url().$loc.$report->image;
	           					$download_url = base_url().'manage_product/getFile/'.$report->token;
	                        ?>
	                        <div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<a href="<?= $image_location ?>" data-fancybox data-caption="<?= $report->type.'  tgl : '.$report->created_at ?>">
										<img class="" src="<?= $image_big_location ?>" alt="">
									</a>	
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										<?= $report->type.'  tgl : '.$this->timedate->get_nice_date($report->created_at, 'indo') ?>
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $download_url ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php }
	                        ?>
							
						</div>
					</div>
				</div>
			</div>
			<!--end::Item-->
			<!--begin::Item-->
			<div class="m-accordion__item" id="toTheMap">
				<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_3_head" data-toggle="collapse" href="#m_accordion_5_item_3_body" aria-expanded="    false">
					<span class="m-accordion__item-icon">
						<i class="fa  flaticon-placeholder"></i>
					</span>
					<span class="m-accordion__item-title">
						Peta Lokasi
					</span>
					<span class="m-accordion__item-mode">
					</span>
				</div>
				<!-- <div class="m-accordion__item-body collapse" id="m_accordion_5_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_3_head" data-parent="#m_accordion_5">
					<span>
						<div id="map2"></div>
					</span>
				</div> -->
			</div>
			<!--end::Item-->
		</div>
		<!--end::Section-->

		<div id="map"></div>
		
	</div>	
</div>

<script>

	// $('#toTheMap').on('shown.bs.collapse', function (e) {
	// 	initia();
 //  	})

	(function initia() {
		var uluru = {lat: <?= $lat ?>, lng: <?= $long ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
	})();


 
</script>



<script>

	var item_price = document.getElementById('item_price');

// live format rupiah
item_price.addEventListener('keyup', liveCurrency);

function liveCurrency() {

	console.log('update');

    var $this = this;
    let input = $this.value;
    input = input.replace(/[\D\s\._\-]+/g, "");
    input = input ? parseInt( input, 10 ) : 0;

    let show = function() {
        return ( input === 0 ) ? "" : input.toLocaleString( "id-ID" ); 
    };

    $this.value = show();
}
	
// only number input
$("#item_price").keypress(validateNumber);

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
