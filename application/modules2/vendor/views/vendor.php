<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;

$vendor_form_location = base_url().'vendor/add_vendor';
?>

<style type="text/css">
	section#content {
        min-height: 200px;
        padding-top: 10px;
    }
    .global-map-area-grey {
        background-color: rgb(245,245,245); 
    }
    .global-map-area-dark-grey {
        background-color: rgb(242, 242, 242);
    }
    .global-map-area-soft-black {
        background: #252d33;
        color: #fff;
    }
    .global-map-area-white {
        background: #fff;
    }
    .global-map-area-red {
        background: #db3238;
        color: #fff;
    }
    .global-map-area-white-dark {
        background: rgba(0,0,0,0.01);
    }
    .tebal {
        font-weight: 800;
    }
    #pembayaran {
        *font-family: "Open Sans";
    }

    #pembayaran h3 {
        font-weight: 200;
        font-size: 32px;
        margin-bottom: 40px;
    }

    #pembayaran p, #pembayaran li {
        opacity: .65;
        color: #3f4047;
        font-weight: 400;
        font-size: 16px;
        margin: 20px 0;
    }

    .description {
        text-transform: none;
        font-size: 14px;
        text-align: justify;
    }
    span.description {
        display: block;
        line-height: 30px;
    }
    ul.cek-profil, ul.klik-purchase {
        margin-left: 20px;
        list-style: square outside none;
    }
    #justify {
        text-align: justify !important;
    }
    .ikon img{
        width: 100px;
    }
    .description2 {
        text-transform: none;
        font-size: 14px;
    }
    h4.box-title {
        font-size: 18px;
        font-weight: bold;
    }

	.contact-box p {
		text-align: justify;
	}

	.required {
        color: red;
        font-size: 14px;
    }

    .keterangan {
    	color: red;
        font-size: 14px;
        font-style: italic;
    }
</style>


<div class="col-md-12">
	<section id="content">
		<div class="global-map-area promo-box parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 45.5px;">
	        <div class="container">
	            <div class="content-section description col-sm-12" style="height: 273px;">
	                <div class="table-wrapper hidden-table-sm" style="height: 100%;">
	                    <div class="table-cell">
	                        <h2 class="m-title" style="margin-left: 30px;">
	                            <em>Vendor Asuransi, Produksi, Pengurusan &amp; Perijinan</em>
	                        </h2>
	                        <h5 style="margin-left: 30px; line-height: 30px; font-size: 16px; *font-weight: bold;">Bergabunglah dengan situs media pemasangan iklan melalui penjualan online.</h5>
	                    </div>
	                    
	                </div>
	            </div>
	            
	        </div>
	    </div>
	</section>
</div>
<!-- alert -->
	<div class="col-md-12">
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>
	</div>
		
<div id="main" class="col-sm-8 col-md-9">
    <div class="tab-container">
        <ul class="tabs">
            <li class="active"><a href="#vendor-asuransi" data-toggle="tab">Vendor Asuransi</a></li>
            <li class=""><a href="#vendor-produksi" data-toggle="tab">Vendor Produksi</a></li>
            <li class=""><a href="#vendor-pengurusan_perijinan" data-toggle="tab">Vendor Pengurusan &amp; Perijinan</a></li>
           
        </ul>
        <div class="tab-content">
        	<!-- VENDOR ASURANSI -->
            <div class="tab-pane fade in active" id="vendor-asuransi">
            	<?php
			    echo form_open_multipart('vendor/add_vendor_produksi');
			    ?>
            	
            		<input type="hidden" name="vendor_cat" value="1">
		            <!-- nama -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama Vendor<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="nama" value="" required>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
		                </div>
		            </div>

		            <!-- pic -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama PIC<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="pic" value="" required>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('pic'); ?></span>
		                </div>
		            </div>

		            <!-- telpon -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>No. Telpon<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" id="telp1" name="telp" value="" required>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('telp'); ?></span>
		                </div>
		            </div>

		            <!-- email -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Email<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="email" class="input-text full-width" name="email" value="" required>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
		                </div>
		            </div>

		            <!-- url -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Link Website</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="url" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('url'); ?></span>
		                </div>
		            </div>

		            <!-- alamat -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Alamat<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="alamat" required></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('alamat'); ?></span>
		                </div>
		            </div>

		            <!-- keuntungan -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Kelebihan Asuransi<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="keuntungan" required></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('keuntungan'); ?></span>
		                </div>
		            </div>

		            <!-- SIUP -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>SIUP<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar" required>
			                    <input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('siup'); ?></span>
		                </div>
		            </div>

		            <!-- TDP -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>TDP<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar" required>
			                    <input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('tdp'); ?></span>
		                </div>
		            </div>

		            <!-- NPWP Perusahaan -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>NPWP Perusahaan<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar" required>
			                    <input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('npwp'); ?></span>
		                </div>
		            </div>

		            <!-- Akte Perusahaan -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Akte Perusahaan<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar" required>
			                    <input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('akte'); ?></span>
		                </div>
		            </div>
		            <hr>
		            <!-- button -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">DAFTAR</button>
		                </div>
		            </div>
		            <span class="keterangan">* wajib diisi</span>
		        </form>

            </div>

            <!-- VENDOR PRODUKSI -->
            <div class="tab-pane fade" id="vendor-produksi">
                
            	<?php
			    echo form_open_multipart('vendor/add_vendor');
			    ?>
            		<input type="hidden" name="vendor_cat" value="2">
		            <!-- nama -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama Vendor<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="nama" value="" >
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
		                </div>
		            </div>

		            <!-- kategori -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Kategori Vendor<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="selector full-width">
                                
                               <?php 
							  	$additional_dd_code = 'class="form-control m-input m-input--air"';
							  	$kategori_vend = array(
							  		'' => 'Pilih Vendor',
							  		'1' => 'Vendor Percetakan',
							  		'2' => 'Vendor Konstruksi Reklame'
							  	);
						        
							  	echo form_dropdown('kategori', $kategori_vend, '', $additional_dd_code);
							  	?>
                            </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('kategori'); ?></span>
		                </div>
		            </div>

		            <!-- pic -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama PIC<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="pic" value="" >
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('pic'); ?></span>
		                </div>
		            </div>

		            <!-- telpon -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>No. Telpon<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" id="telp2" name="telp" value="" >
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('telp'); ?></span>
		                </div>
		            </div>

		            <!-- email -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Email<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="email" class="input-text full-width" name="email" value="" >
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
		                </div>
		            </div>

		            <!-- url -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Link Website</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="url" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('url'); ?></span>
		                </div>
		            </div>

		             <!-- provinsi -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Provinsi<span class="required">*</span></label>
		                    
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="selector full-width">
		                        <?php 
							  	$additional_dd_code = 'class="form-control m-input m-input--air" id="provinsi"';
							  	$kategori_prov = array('' => 'Pilih Provinsi',);
						        foreach ($prov->result_array() as $row) {
						            $kategori_prov[$row['id_prov']] = $row['nama'];   
						        }
							  	echo form_dropdown('cat_prov', $kategori_prov, '', $additional_dd_code);
							  	?>
		                    </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_prov'); ?></span>
		                </div>
		            </div>

		            <!-- kota/kabupaten -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Kota / Kabupaten<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="selector full-width">
		                        <select id="kota" name="cat_city">
		                            
		                        </select>
		                        <span class="custom-select">Pilih Kota</span>
		                    </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_city'); ?></span>
		                </div>
		            </div>

		            <!-- alamat -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Alamat<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="alamat" ></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('alamat'); ?></span>
		                </div>
		            </div>

		            <!-- keuntungan -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Kelebihan<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="keuntungan" required></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('keuntungan'); ?></span>
		                </div>
		            </div>

		            <!-- SIUP -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>SIUP</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar"><input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('siup'); ?></span>
		                </div>
		            </div>

		            <!-- TDP -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>TDP</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar"><input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('tdp'); ?></span>
		                </div>
		            </div>

		            <!-- NPWP Perusahaan -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>NPWP Perusahaan</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar"><input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('npwp'); ?></span>
		                </div>
		            </div>

		            <!-- Akte Perusahaan -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Akte Perusahaan</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar"><input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('akte'); ?></span>
		                </div>
		            </div>
		            <hr>
		         

		            <!-- button -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">DAFTAR</button>
		                </div>
		            </div>
		            <span class="keterangan">* wajib diisi</span>
		        </form>

            </div>

            <!-- VENDOR PENGURUSAN & PERIJINAN -->
            <div class="tab-pane fade" id="vendor-pengurusan_perijinan">
               
            	<?php
			    echo form_open_multipart('vendor/add_vendor_produksi');
			    ?>
            		<input type="hidden" name="vendor_cat" value="3">
		            <!-- nama -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama Vendor<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="nama" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
		                </div>
		            </div>

		            <!-- pic -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama PIC<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="pic" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('pic'); ?></span>
		                </div>
		            </div>

		            <!-- telpon -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>No. Telpon<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" id="telp3" name="telp" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('telp'); ?></span>
		                </div>
		            </div>

		            <!-- email -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Email<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="email" class="input-text full-width" name="email" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
		                </div>
		            </div>

		            <!-- url -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Link Website</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="url" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('url'); ?></span>
		                </div>
		            </div>

		             <!-- provinsi -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Provinsi<span class="required">*</span></label>
		                    
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="selector full-width">
		                        <?php 
							  	$additional_dd_code = 'class="form-control m-input m-input--air" id="wilayah"';
							  	$kategori_prov = array('' => 'Pilih Provinsi',);
						        foreach ($prov->result_array() as $row) {
						            $kategori_prov[$row['id_prov']] = $row['nama'];   
						        }
							  	echo form_dropdown('cat_prov', $kategori_prov, '', $additional_dd_code);
							  	?>
		                    </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_prov'); ?></span>
		                </div>
		            </div>

		            <!-- kota/kabupaten -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Kota / Kabupaten<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="selector full-width">
		                        <select id="kuto" name="cat_city">
		                            
		                        </select>
		                        <span class="custom-select">Pilih Kota</span>
		                    </div>

		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_city'); ?></span>
		                </div>
		            </div>

		            <!-- alamat -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Alamat<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="alamat"></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('alamat'); ?></span>
		                </div>
		            </div>

		            <!-- keuntungan -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Kelebihan<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="keuntungan" required></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('keuntungan'); ?></span>
		                </div>
		            </div>

		           	<!-- SIUP -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>SIUP<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar"><input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('siup'); ?></span>
		                </div>
		            </div>

		            <!-- TDP -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>TDP<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar"><input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('tdp'); ?></span>
		                </div>
		            </div>

		            <!-- NPWP Perusahaan -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>NPWP Perusahaan<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar"><input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('npwp'); ?></span>
		                </div>
		            </div>

		            <!-- Akte Perusahaan -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Akte Perusahaan<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="fileinput full-width" style="line-height: 34px;">
			                    <input type="file" class="input-text" name="multipleFiles[]" data-placeholder="pilih gambar"><input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
			                </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('akte'); ?></span>
		                </div>
		            </div>
		            <hr>

		            <!-- button -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">DAFTAR</button>
		                </div>
		            </div>
		            <span class="keterangan">* wajib diisi</span>
		        </form>

            </div>

        </div>
    
    </div>
</div>

<div class="sidebar col-sm-4 col-md-3">
     <?= Modules::run('templates/need_help') ?>
</div>


<script>
// only number input
tjq("#telp1, #telp2, #telp3").keypress(validateNumber);

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