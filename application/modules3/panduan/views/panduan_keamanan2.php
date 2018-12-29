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
  		font-size: 16px;
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
  	.info-terkait {
		padding: 20px;
		border: 2px solid #ff6000;
		color: #ff6000;
	}
	#alert-sign {
		color: #ff6000;
	}
	#alert-sign span {
		padding: 20px;
		font-size: 70px;
	}
	
	.global-map-area-dark-grey:nth-of-type(3) {
		border-top: 1px dashed #ccc;
	}
	.phising-img img, .scam-img img {
		width: 300px;
	}
	.phising-img img {
		float: right;
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
			                	<h3 class="tebal">Panduan Keamanan Wiklan</h3>
			                    
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
								<ul class="klik-purchase">
									<li><span class="description">Ketika ingin mengakses www.wiklan.com, periksa boks alamat (address bar). Pastikan alamat yang Anda akses menggunakan domain wiklan.com dan diawali https://, seperti https://www.wiklan.com, https://wiklan.business.site/. Jika situs yang Anda akses menyerupai halaman wiklan namun memiliki alamat berbeda, segera tutup halaman tersebut.</span>
									</li>
									
									<li><span class="description">Sistem Wiklan hanya meminta para pengguna untuk memasukkan nama akun dan kata sandi (username and password) ketika login, pembaruan profil, pembaruan rekening bank, jual media iklan dan transaksi pemesanan. Selain keempat aktivitas tersebut, Anda bisa menggunakan segala fitur Wiklan tanpa memerlukan username dan password.</span>
									</li>

									<li><span class="description">Seluruh info tentang acara atau promosi resmi dari Wiklan akan dipublikasikan melalui media resmi Wiklan, seperti media sosial (akun resmi Facebook, Twitter, dan Instagram dan LinkedIn). Jangan mudah tergiur dengan tawaran atau hadiah apa pun dari pihak lain yang mengatasnamakan Wiklan. Apabila Anda tidak dapat menemukan informasi mengenai tawaran tersebut di media resmi Wiklan, mohon abaikan.</span>
									</li>
									
								</ul>
			                </div>
			            </div>
			            <div class="col-sm-6 pad-30">
			                <div class="icon-box style102">
			                    <ul class="klik-purchase">
												
									<li><span class="description">Anda diminta untuk bersikap waspada terhadap tautan eksternal yang diberikan via pesan pribadi atau private message (PM). Untuk semua tautan yang berada di luar sistem https://www.wiklan.com, sistem akan langsung mengarahkan ke halaman peringatan terlebih dulu. Dengan mengakses tautan di luar sistem https://www.wiklan.com, Wiklan tidak bisa menjamin keamanan transaksi Anda.</span>
									</li>
									
									<li><span class="description">Wiklan tidak pernah meminta data pribadi, nama akun (username), dan/atau kata sandi (password) melalui e-mail, telepon, ataupun pesan pribadi (PM/private message). Jika ada pihak yang mengatasnamakan Wiklan dan meminta data-data tersebut mohon abaikan.</span>
									</li>

									<li><span class="description">Panduan keamanan ini bersifat imbauan resmi dan bukan jaminan bahwa Anda akan terbebas dari segala tindak kejahatan daring (online). Namun, dengan memahami imbauan ini, Anda bisa berbelanja dengan aman dan nyaman di Wiklan.com.</span>
									</li>

								</ul>
			                </div>
			            </div>
			        </div>
			    </div>

			    <div class="container">
			        <div class="row2">
			        	<h4 class="tebal"><span class="description">Ada apa aja modus kejahatan diluar sana menggunakan media online? Yuk ikuti Wiklan dalam mengenali modus-modus kejahatan online serta cara mencegahnya</span></h4>
			            <div class="col-sm-6">
			                <div class="style102">
			                	<p class="description"><span class="tebal">Phishing - Mirip tapi palsu!</span>.</p>
                        		<p class="description" style="text-align: justify;">Pada modus phishing, peretas membuat situs tiruan yang sangat mirip dengan situs aslinya sehingga Anda tidak sadar Anda telah memasukkan informasi akun Anda ke situs palsu.</p>
			                </div>
			            </div>
			            <div class="col-sm-6" style="text-align: center;">
			                <div class="icon-box2 style102">
			                    <div class="scam-img ">
                                	<img src="<?= base_url() ?>marketplace/images/phising.png">
                                </div>
			                </div>
			            </div>
			        </div>
			    </div>

			    <div class="container">
			        <div class="row2">
			            <div class="col-sm-6" style="text-align: center;">
			                <div class="style102">
			                	<div class="scam-img">
                                	<img src="<?= base_url() ?>marketplace/images/scam.png">
                                </div>
			                </div>
			            </div>
			            <div class="col-sm-6 pad-30">
			                <div class="icon-box style102">
			                    <p class="description"><span class="tebal">Scam - "PAPA minta pulsa"</span>.</p>
                                <p class="description" style="text-align: justify;">Pada modus scam, peretas mengaku sebagai pihak terpercaya untuk meminta berbagai informasi penting anda seperti username dan password Anda. Ingat, pihak Wiklan tidak akan meminta informasi sensitif terkait akun Anda.</p>
			                </div>
			            </div>
			        </div>
			    </div>

			    <div class="clearfix"></div>
			</div>

		</div>
	</div>
</section>

<div class="row" id="pembayaran">
	<div class="row">
		<div class="row">
			<div class="row">
				<div class="row">
					<div class="row">
						

			            <div class="global-map-area-white section parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 80.6719px;">
			                <div class="container">
			                    <div class="row">
			                        <div class="col-sm-4">
			                            <div class=" style102">
			                                <div class="prisoner">
			                                	<img src="<?= base_url() ?>marketplace/images/cartoon-prisoner.jpg" width="40%" style="display: block; margin: 0 auto; float: none; vertical-align: middle;">
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-sm-8">
			                            <div class=" style102">
			                            	<div class="info-terkait">
			                            		<div class="row">
			                            		<div class="col-sm-2" id="alert-sign">
			                            			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			                            		</div>
			                            		<div class="col-sm-10">
			                            			<p class="description" style="color: #ff6000;">Panduan keamanan ini bersifat imbauan resmi dan bukan jaminan bahwa Anda akan terbebas dari segala tindak kejahatan daring (online). Namun, dengan memahami imbauan ini, Anda bisa berbelanja dengan aman dan nyaman di Wiklan.com.</p>
			                            		</div>
			                                	</div>
			                            	</div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			           
			            

			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>

