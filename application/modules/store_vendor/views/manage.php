<style type="text/css">
	#info-general span {
		margin: 5px 10px;
	}
	
	.list img {
		border: 1px solid #ddd;
	}

	.list .details {
		border: 1px solid #ddd;
		padding: 3px;
	}

	.list .details .box-title {
		min-height: 35px;
	}

	.list .details .description {
		min-height: 100px;
	}

	.keuntungan p {
		text-align: justify !important;
	}

	.rel-category {
        position: absolute;
        top: 135px;
        right: 20px;

    }

	.rel-category span.label {
    	font-size: 12px !important;
    }

    #vendorBenefit {
    	text-align: justify;
    }
</style>

<div id="vendor" class="tab-pane fade in active">
	
	<div class="toggle-container box" id="accordion1">
        <div class="panel style1">
            <h4 class="panel-title">
                <a href="#acc1" data-toggle="collapse" data-parent="#accordion1">Daftar Vendor Asuransi</a>
            </h4>
            <div class="panel-collapse collapse" id="acc1">
                <div class="panel-content">

                    <div class="block">
	                    <div class="row">
	                        
	                        <div class="col-lg-12 listing-style3 hotel" id="vendor-asuransi">
	                            
	                            
	                        </div>
	                    </div>
	                </div>

                    <a href="#" class="load-more button green full-width btn-large fourty-space" id="load_more_asuransi" data-val="0">MUAT LAINNYA</a>
                </div><!-- end content -->


            </div>
        </div>
        
        <div class="panel style1">
            <h4 class="panel-title">
                <a class="collapsed" href="#acc2" data-toggle="collapse" data-parent="#accordion1">Daftar Vendor Konstruksi</a>
            </h4>
            <div class="panel-collapse collapse" id="acc2">
                <div class="panel-content">
                    
                	<div class="row image-box hotel listing-style1">

                    	<div id="test-list">

                    		<div class="row">
                    			<div class="col-md-12">
                    				<div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <input type="text" class="search pull-right input-text full-width" placeholder="cari kota / provinsi" style="" />
                                    </div>
                    			</div>
                    		</div>
						    
						    <div class="list">

						    	<?php
						    		$this->load->module('store_provinces');
    								$this->load->module('store_cities');
    								$this->load->module('timedate');
						    		foreach ($productions->result() as $production) {
        								$nama = $production->nama;
						                $email = $production->email;
						                $telp = $production->telp;
						                $alamat = $production->alamat;
						                $nama_provinsi = $this->store_provinces->get_name_from_province_id($production->cat_prov);
						                $nama_kota = ucwords(strtolower($this->store_cities->get_name_from_city_id($production->cat_city)));
						                $link = $production->url;
						                $pic = $production->pic;
						                $id = $production->id;

						                $siup = $production->SIUP;
						                $tdp = $production->TDP;
						                $npwp = $production->NPWP;
						                $akte = $production->Akte;

						                $tipe = $production->kategori;
						                $keuntungan = $production->keuntungan;
						    		
						    	?>
						    		<div class='col-sm-6 col-md-4'>
			                            <article class='box'>
			                                <figure>
			                                    <a href='#'><img width='270' height='160' alt='' src='<?= base_url() ?>marketplace/vendor/vendor_produksi.jpg'></a>
			                                </figure>
			                                <div class="rel-category">
								                <span class="label label-warning"><?= ($tipe == 1) ? 'percetakan' : 'kontruksi reklame' ?></span>
								            </div>
			                                <div class='details'>
			                                    
			                                    <h4 class='box-title'><?= $nama ?><br><small><?= $pic ?></small></h4>
			                                    <div class='feedback'>
			                                        <span><i class='soap-icon-phone yellow-color'></i> <?= $telp ?></span>
			                                        <br>
			                                        <span><i class='soap-icon-message yellow-color'></i> <?=$email ?></span>
			                                        <?php if ($link != '') { ?>
			                                       
			                                        <br>
			                                        <a href="<?=$link ?>" target="_blank"><span><i class='soap-icon-globe yellow-color'></i> <?=$link ?></span></a>
			                                    	<?php } else { ?>
			                                    	<br><span><i class='soap-icon-globe yellow-color'></i> -</span>	
			                                    	<?php } ?>
			                                    </div>
			                                   
			                                    <p class='description kota'>
			                                        <span><i class='soap-icon-departure yellow-color'></i> <?= $alamat ?></span>
			                                        <br>
			                                        <span><?= $nama_kota ?> - <?= $nama_provinsi ?></span>
			                                    </p>
			                                    <hr>
			                                    <div>
				                                    <button class="button button-medium orange" data-toggle="modal" data-target="#myModal<?= $id ?>">Kelebihan</button>
			                                    </div>
			                                    <!-- 
			                                    <div class="row">
			                                    	<?php if ($siup != '' || $tdp != '') { ?>
			                                    	<div class="col-sm-4">
				                                    	<ul>
				                                    		<?php if ($siup != '') { ?>
				                                    			<li><a href="<?= base_url().'store_vendor/download_file/SIUP/'.$id ?>"><i class="fa fa-download"></i> SIUP</a></li>
				                                    		<?php } ?>
				                                    		<?php if ($tdp != '') { ?>
				                                    			<li><a href="<?= base_url().'store_vendor/download_file/TDP/'.$id ?>"><i class="fa fa-download"></i> TDP</a></li>
				                                    		<?php } ?>
				                                    	</ul>
			                                    	</div>
			                                    	<?php } ?>
			                                    	<?php if ($npwp != '' || $akte != '') { ?>
			                                    	<div class="col-sm-8">
				                                    	<ul style="text-align: right; margin-right: 10px;">
				                                    		<?php if ($npwp != '') { ?>
				                                    			<li><a href="<?= base_url().'store_vendor/download_file/NPWP/'.$id ?>"><i class="fa fa-download"></i> NPWP Perusahaan</a></li>
				                                    		<?php } ?>	
				                                    		<?php if ($akte != '') { ?>	
				                                    			<li><a href="<?= base_url().'store_vendor/download_file/Akte/'.$id ?>"><i class="fa fa-download"></i> Akte Perusahaan</a></li>
				                                    		<?php } ?>
				                                    	</ul>
			                                    	</div>
			                                    	<?php } ?>
			                                    </div>
			                                    -->
			                                </div>
			                            </article>
			                        </div>

<!-- modal keuntungan -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal<?= $id ?>">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Kelebihan Vendor <?= $nama ?></span></h4>
      		</div>
      		<div class="modal-body">
      			<div id="vendorBenefit">
      				<?= $keuntungan ?>
      			</div>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

						    	<?php } ?>
						     
						    </div>

						    <div class="row pagin">
						    	<div class="col-md-12">
						    		<ul class="pagination pull-right"></ul>
						    	</div>	
						    </div>

						</div>

					</div>	
	               
                </div><!-- end content -->
            </div>
        </div>
        

<div class="panel style1">
            <h4 class="panel-title">
                <a class="collapsed" href="#acc3" data-toggle="collapse" data-parent="#accordion1">Daftar Vendor Percetakan</a>
            </h4>
            <div class="panel-collapse collapse" id="acc3">
                <div class="panel-content">
                    
                	<div class="row image-box hotel listing-style1">

                    	<div id="test-list">

                    		<div class="row">
                    			<div class="col-md-12">
                    				<div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <input type="text" class="search pull-right input-text full-width" placeholder="cari kota / provinsi" style="" />
                                    </div>
                    			</div>
                    		</div>
						    
						    <div class="list">

						    	<?php
						    		$this->load->module('store_provinces');
    								$this->load->module('store_cities');
    								$this->load->module('timedate');
						    		foreach ($printing->result() as $print) {
        								$nama = $print->nama;
						                $email = $print->email;
						                $telp = $print->telp;
						                $alamat = $print->alamat;
						                $nama_provinsi = $this->store_provinces->get_name_from_province_id($print->cat_prov);
						                $nama_kota = ucwords(strtolower($this->store_cities->get_name_from_city_id($print->cat_city)));
						                $link = $print->url;
						                $pic = $print->pic;
						                $id = $print->id;

						                $siup = $print->SIUP;
						                $tdp = $print->TDP;
						                $npwp = $print->NPWP;
						                $akte = $print->Akte;

						                $tipe = $print->kategori;
						                $keuntungan = $print->keuntungan;
						    		
						    	?>
						    		<div class='col-sm-6 col-md-4'>
			                            <article class='box'>
			                                <figure>
			                                    <a href='#'><img width='270' height='160' alt='' src='<?= base_url() ?>marketplace/vendor/vendor_produksi.jpg'></a>
			                                </figure>
			                                <div class="rel-category">
								                <span class="label label-warning"><?= ($tipe == 1) ? 'percetakan' : 'kontruksi reklame' ?></span>
								            </div>
			                                <div class='details'>
			                                    
			                                    <h4 class='box-title'><?= $nama ?><br><small><?= $pic ?></small></h4>
			                                    <div class='feedback'>
			                                        <span><i class='soap-icon-phone yellow-color'></i> <?= $telp ?></span>
			                                        <br>
			                                        <span><i class='soap-icon-message yellow-color'></i> <?=$email ?></span>
			                                        <?php if ($link != '') { ?>
			                                       
			                                        <br>
			                                        <a href="<?=$link ?>" target="_blank"><span><i class='soap-icon-globe yellow-color'></i> <?=$link ?></span></a>
			                                    	<?php } else { ?>
			                                    	<br><span><i class='soap-icon-globe yellow-color'></i> -</span>	
			                                    	<?php } ?>
			                                    </div>
			                                   
			                                    <p class='description kota'>
			                                        <span><i class='soap-icon-departure yellow-color'></i> <?= $alamat ?></span>
			                                        <br>
			                                        <span><?= $nama_kota ?> - <?= $nama_provinsi ?></span>
			                                    </p>
			                                    <hr>
			                                    <div>
				                                    <button class="button button-medium orange" data-toggle="modal" data-target="#myModal<?= $id ?>">Kelebihan</button>
			                                    </div>
			                                    
			                                </div>
			                            </article>
			                        </div>

<!-- modal keuntungan -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal<?= $id ?>">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Kelebihan Vendor <?= $nama ?></span></h4>
      		</div>
      		<div class="modal-body">
      			<div id="vendorBenefit">
      				<?= $keuntungan ?>
      			</div>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

						    	<?php } ?>
						     
						    </div>

						    <div class="row pagin">
						    	<div class="col-md-12">
						    		<ul class="pagination pull-right"></ul>
						    	</div>	
						    </div>

						</div>

					</div>	
	               
                </div><!-- end content -->
            </div>
        </div>
        
        
        <div class="panel style1">
            <h4 class="panel-title">
                <a class="collapsed" href="#acc4" data-toggle="collapse" data-parent="#accordion1">Daftar Vendor Pengurusan &amp; Perijinan</a>
            </h4>
            <div class="panel-collapse collapse" id="acc4">
                <div class="panel-content">
                    
                	<div class="row image-box hotel listing-style1">
	                    
	                    <div id="legal-list">
						    
	                    	<div class="row">
                    			<div class="col-md-12">
                    				<div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <input type="text" class="search pull-right input-text full-width" placeholder="cari kota / provinsi" style="" />
                                    </div>
                    			</div>
                    		</div>

						    <div class="list">

						    	<?php
						    		$this->load->module('store_provinces');
    								$this->load->module('store_cities');
    								$this->load->module('timedate');
						    		foreach ($legals->result() as $legal) {
        								$nama = $legal->nama;
						                $email = $legal->email;
						                $telp = $legal->telp;
						                $alamat = $legal->alamat;
						                $nama_provinsi = $this->store_provinces->get_name_from_province_id($legal->cat_prov);
						                $nama_kota = ucwords(strtolower($this->store_cities->get_name_from_city_id($legal->cat_city)));
						                $link = $legal->url;
						                $pic = $legal->pic;
						    			$id = $legal->id;

						    			$siup2 = $legal->SIUP;
						                $tdp2 = $legal->TDP;
						                $npwp2 = $legal->NPWP;
						                $akte2 = $legal->Akte;
						                $keuntungan2 = $legal->keuntungan;
						    	?>
						    		<div class='col-sm-6 col-md-4'>
			                            <article class='box'>
			                                <figure>
			                                    <a href='#'><img width='270' height='160' alt='' src='<?= base_url() ?>marketplace/vendor/vendor_pengurusan.jpg'></a>
			                                </figure>
			                                <div class='details'>
			                                    
			                                    <h4 class='box-title'><?= $nama ?><br><small><?= $pic ?></small></h4>
			                                    <div class='feedback'>
			                                        <span><i class='soap-icon-phone yellow-color'></i> <?= $telp ?></span>
			                                        <br>
			                                        <span><i class='soap-icon-message yellow-color'></i> <?=$email ?></span>
			                                        <?php if ($link != '') { ?>
			                                        <br>
			                                        <a href="<?=$link ?>" target="_blank"><span><i class='soap-icon-globe yellow-color'></i> <?=$link ?></span></a>
			                                    	<?php } else { ?>
			                                    	<br><span><i class='soap-icon-globe yellow-color'></i> -</span>	
			                                    	<?php } ?>
			                                    </div>
			                                    <p class='description kota'>
			                                        <span><i class='soap-icon-departure yellow-color'></i> <?= $alamat ?></span>
			                                        <br>
			                                        <span><?= $nama_kota ?> - <?= $nama_provinsi ?></span>
			                                    </p>

			                                    <hr>
			                                    <div>
				                                    <button class="button button-medium orange" data-toggle="modal" data-target="#myModal<?= $id ?>">Kelebihan</button>
			                                    </div>
			                                    <!-- 
			                                    <div class="row">
			                                    	<?php if ($siup2 != '' || $tdp2 != '') { ?>
			                                    	<div class="col-sm-4">
				                                    	<ul>
				                                    		<?php if ($siup2 != '') { ?>
				                                    			<li><a href="<?= base_url().'store_vendor/download_file/SIUP/'.$id ?>"><i class="fa fa-download"></i> SIUP</a></li>
				                                    		<?php } ?>
				                                    		<?php if ($tdp2 != '') { ?>
				                                    			<li><a href="<?= base_url().'store_vendor/download_file/TDP/'.$id ?>"><i class="fa fa-download"></i> TDP</a></li>
				                                    		<?php } ?>
				                                    	</ul>
			                                    	</div>
			                                    	<?php } ?>
			                                    	<?php if ($npwp2 != '' || $akte2 != '') { ?>
			                                    	<div class="col-sm-8">
				                                    	<ul style="text-align: right; margin-right: 10px;">
				                                    		<?php if ($npwp2 != '') { ?>
				                                    			<li><a href="<?= base_url().'store_vendor/download_file/NPWP/'.$id ?>"><i class="fa fa-download"></i> NPWP Perusahaan</a></li>
				                                    		<?php } ?>
				                                    		<?php if ($akte2 != '') { ?>
				                                    			<li><a href="<?= base_url().'store_vendor/download_file/Akte/'.$id ?>"><i class="fa fa-download"></i> Akte Perusahaan</a></li>
				                                    		<?php } ?>
				                                    	</ul>
			                                    	</div>
			                                    	<?php } ?>
			                                    </div>
			                                    -->
			                                </div>
			                            </article>
			                        </div>

<!-- modal keuntungan -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal<?= $id ?>">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Kelebihan Vendor <?= $nama ?></span></h4>
      		</div>
      		<div class="modal-body">
      			<div id="vendorBenefit">
      				<?= $keuntungan2 ?>
      			</div>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

						    	<?php } ?>
						     

						    </div>
						    
						    <div class="row pagin">
						    	<div class="col-md-12">
						    		<ul class="pagination pull-right"></ul>
						    	</div>	
						    </div>

						</div>

	                </div>

                </div><!-- end content -->
            </div>
        </div>
    </div>

</div>




<script>
    tjq(document).ready(function(){
        getVendorInsurance(0);
       
        tjq("#load_more_asuransi").click(function(e){
            e.preventDefault();
            var page = tjq(this).data('val');
            getVendorInsurance(page);
 
        });

    });
 
    var getVendorInsurance = function(page){
        tjq("#loader").show();
        tjq.ajax({
            url:"<?php echo base_url() ?>store_vendor/create_vendor_insurance",
            type:'GET',
            data: {page:page}
        }).done(function(response){
            tjq("#vendor-asuransi").append(response);
            tjq("#loader").hide();
            tjq('#load_more_asuransi').data('val', (tjq('#load_more_asuransi').data('val')+1));
            // scroll();
        });
    };

    var scroll  = function(){
        tjq('html, body').animate({
            scrollTop: tjq('#load_more_asuransi').offset().top
        }, 1000);
    };

</script>

