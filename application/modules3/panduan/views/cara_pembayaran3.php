<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
?>

<style type="text/css">
	section#content {
		min-height: 250px;
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

  	.style102 .description {
  		text-transform: none;
  		font-size: 14px;
  	}

  	#jaminan h3 {
  		font-weight: 200;
    	font-size: 32px;
    	*margin-bottom: 40px;
  	}

  	#jaminan p, #jaminan li {
  		opacity: .65;
  		color: #3f4047;
	    font-weight: 600;
	    font-size: 16px;
	    margin: 20px 0;
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
	    font-size: 14px;
	    margin: 20px 0;
  	}
  	span.description {
  		display: block;
  		line-height: 30px;
  	}
  	ul.cek-profil, ul.klik-purchase {
  		margin-left: 20px;
  		list-style: square outside none;
  	}
  	.tebal {
  		font-weight: 800;
  	}
  	#jaminan {
  		display: block;
  		text-align: center;
  		color: #db3238;
  	}
  	.image-style .container:not(:first-child) {
  		margin-top: 40px;
  	}
  	#justify {
  		text-align: justify;
  	}
  	.image-style , .pad-30{
  		padding-right: 30px !important;
  	}
  	#justify .row2 {
  		margin-top: 30px;
  	}
  	.img-panduan img {
  		width: 300px;
  	}
  	.kanan {
  		float: right;
  		padding-right: 30px;
  	}
</style>

<section id="content">
	<div class="container" id="justify">
		<div class="row">
			


			<div class="image-style style12 box">
			                            
				<div class="container">
			        <div class="row2">
			            <div class="col-sm-6">
			                <div class="style102">
			                	<h3 class="tebal">Pembayaran di Wiklan</h3>
			                    <p class="description">
			                    	Kamu dapat melakukan pembayaran ke rekening Wiklan melalui Transfer Panin Bank, BCA Bank dan banyak lagi metode lainnya. Informasi rekening wiklan bisa di cek di halaman "payment confirmation".
			                    </p>
			                </div>
			            </div>
			            <div class="col-sm-6">
			                <div class="icon-box style102">
			                    <!-- <p class="description">col 2</p> -->
			                </div>
			            </div>
			        </div>
			    </div>

			    <div class="container">
			        <div class="row2">
			            <div class="col-sm-6">
			                <div class=" style102">
			                    <h3 style="font-weight: bold;">Pembayaran dengan Transfer</h3>
								<ul class="klik-purchase">
									<li><span class="description">Setelah berhasil melakukan transfer, kami akan melakukan verifikasi pembayaran Anda. Untuk itu, pastikan Anda membayar sesuai dengan jumlah tagihan pembayaran tepat hingga 3 digit terakhir. Perbedaan nilai transfer akan menghambat proses verifikasi.</span>
									</li>
									<li><span class="description">Masuk ke halaman  <span class="tebal">payment confirmation</span> Wiklan untuk tahapan selanjutnya dalam konfirmasi pembayaran melalui metode transfer kemudian lengkapi data sesuai dengan nominal yang di transfer ke halaman <span class="tebal">payment confirmation.</span>
									</li>
									<li><span class="description">Tekan <span class="tebal">Kirim Konfirmasi Pembayaran.</span>
									</li>
								</ul>
			                </div>
			            </div>
			            <div class="col-sm-6 pad-30">
			                <div class="icon-box style102">
			                    <p class="description">
			                    	<div class="img-panduan kanan">
			                    		<img src="<?= base_url() ?>marketplace/images/transfer_atm.jpg">
			                    	</div>
			                    </p>
			                </div>
			            </div>
			        </div>
			    </div>

			    <div class="clearfix"></div>
			</div>

		</div>
	</div>
</section>

<div class="row" id="jaminan">
	<div class="row">
		<div class="row">
			<div class="row">
				<div class="row">
					<div class="row">

			            <div class="global-map-area-grey section parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 80.6719px;">
			                <div class="container">
			                    <div class="row" id="jaminan">
			                    	<div class="col-sm-2"></div>
			                    	<div class="col-sm-8">
			                    		<h3 class="description" ><span class="tebal">
				                    		Jaminan 100% Uang Kembali
				                    	</span></h3>
				                    	<p>
				                    		Wiklan akan mengembalikan 100% uang pemesan ke pengirim jika pemilik titik / agensi tidak melakukan tahapan produksi dan pemasangan materi iklan.
				                    	</p>
			                    	</div>
			                    	<div class="col-sm-2"></div>
			                    	
			                    </div>
			                </div>
			            </div>

			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>