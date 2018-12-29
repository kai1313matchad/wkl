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
  	}

  	#pemesanan {
  		*font-family: "Open Sans";
  	}

  	#pemesanan h3 {
  		font-weight: 200;
    	font-size: 32px;
    	margin-bottom: 40px;
  	}

  	#pemesanan p, #pemesanan li {
  		opacity: .65;
  		color: #3f4047;
	    font-weight: 400;
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
	    font-size: 16px;
	    margin: 20px 0;
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
  	span.gede {
  		font-weight: 800;
  		font-size: 20px;
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
  	.style102 .description {
	    text-transform: none;
	    font-size: 14px;
	}
</style>

<section id="content">
	<div class="container" id="justify">
		<div class="row">
			
			<div class="image-style style12 box">
			                         
				<div class="container pad-30">
			        <div class="row2">
			            
			            <div class="col-sm-12">
			                <div class="style102">
			                	<div class="container2 pad-30">
									<h1 style="font-weight: bold;">Panduan Cara Pengajuan Pengembalian Dana di Wiklan</h1>
							        <p><span class="description"><span class="gede">Jika Iklan Belum Tayang</span> - Apabila pesanan Anda belum tayang atau terpasang iklan hingga estimasi waktu yang telah diberikan oleh pihak terkait, maka Anda dapat melakukan pengajuan pengembalian dana berdasarkan status produksi dan pemasangan iklan Anda.</span></p>
								</div>   
			                	<h3 style="font-weight: bold;">1. Status produksi dan pemasangan masih dalam proses pengerjaan</h3>
	                            <p class="description">
	                            	Jika pesanan Anda tidak kunjung selesai dalam waktu 1 bulan, Anda bisa mengajukan klaim pengembalian dana. Berikut caranya :
	                            </p>
	                            <ul class="klik-purchase">
									<li><span class="description">Klik, lalu pilih <span class="tebal">Status Pemesanan.</span>
									</li>
									<li><span class="description">Klik <span class="tebal">Komplain</span> pada pesanan produk yang belum selesai.
									</li>
									<li><span class="description">Akan muncul pop up. Silakan pilih <span class="tebal">Belum Selesai.</span>
									</li>
									<li><span class="description">Anda akan masuk ke halaman Pusat Solusi. Jelaskan masalah Anda secara detail di kolom yang sudah disediakan. Klik <span class="tebal">Berikutnya</span>.
									</li>
									<li><span class="description">Tulis jumlah dana yang Anda inginkan. Lalu klik <span class="tebal">Komplain.</span>
									</li>
									<li><span class="description">Jika pemilik titik menyetujui solusi yang Anda ajukan, maka komplain akan dianggap selesai dan dana otomatis akan masuk ke Saldo Rekening Anda. Jika pemilik titik tidak menyetujui solusi yang Anda ajukan, maka tim terkait kami akan membantu dengan memberikan solusi yang terbaik antara kedua belah pihak.</span>
									</li>
								</ul>
								<br>
								<h3 style="font-weight: bold;">2. Status produksi dan pemasangan sudah selesai tetapi iklan belum tayang</h3>
	                            <p class="description">
	                            	Jika status produksi dan pemasangan sudah selesai akan tetapi iklan belum tayang, Anda dapat mengajukan pengembalian dana. Berikut caranya: 
	                            </p>
	                            <ul class="klik-purchase">
									<li><span class="description">Klik, lalu pilih <span class="tebal">Konfirmasi Belum Tayang.</span>
									</li>
									<li><span class="description">Klik <span class="tebal">Komplain</span> pada pesanan produk yang belum selesai.</span>
									</li>
									<li><span class="description">Akan muncul pop up. Silakan pilih <span class="tebal">Belum Selesai.</span>
									</li>
									<li><span class="description">Anda akan masuk ke halaman Pusat Solusi. Jelaskan masalah Anda secara detail di kolom yang sudah disediakan. Klik <span class="tebal">Berikutnya.</span>
									</li>
									<li><span class="description">Tulis jumlah dana yang Anda inginkan. Lalu klik <span class="tebal">Komplain.</span>
									</li>
									<li><span class="description">Jika pemilik titik menyetujui solusi yang Anda ajukan, maka komplain akan dianggap selesai dan dana otomatis akan masuk ke Saldo Rekening Anda. Jika pemilik titik tidak menyetujui solusi yang Anda ajukan, maka tim terkait kami akan membantu dengan memberikan solusi yang terbaik antara kedua belah pihak.</span>
									</li>
								</ul>
			                </div>
			            </div>

			        </div>
			    </div>

			    <div class="container">
			        <div class="row2">
			            <div class="col-sm-12">
			                <div class=" style102">
			                	<div class="container2 pad-30">
				                	<p><span class="description"><span class="gede">Jika Iklan Sudah Tayang</span> - Apabila pesanan Anda belum tayang atau terpasang iklan hingga estimasi waktu yang telah diberikan oleh pihak terkait, maka Anda dapat melakukan pengajuan pengembalian dana berdasarkan status produksi dan pemasangan iklan Anda.</span></p>
				                	<ul class="klik-purchase">
				                		<li><span class="description">Klik pada halaman Dashboard Wiklan, lalu klik <span class="tebal">Status Pemesanan.</span></li>
										<li><span class="description">Klik <span class="tebal">Komplain</span> pada pesanan yang berkendala.</span></li>
										<li><span class="description">Akan muncul pop up, dan silakan pilih <span class="tebal">Sudah Tayang.</span></li>
										<li><span class="description">Silakan pilih masalah yang dihadapi, yaitu:</span>
											<br>
											<h3>A. Masalah pada iklan tayang</h3>
				                            <p><span class="description">Anda bisa memilih opsi ini jika produk yang Anda terima dalam keadaan rusak, tidak sesuai, atau salah materi.</span></p>
											<ul class="klik-purchase">
												<li><span class="description">Setelah memilih kategori masalah <span class="tebal">Terkait Produk</span>, tentukan produk yang ingin Anda komplain. Pilih komplain yang ingin Anda sampaikan ke pemilik titik. Isi juga keterangan produk yang rusak/tidak sesuai/materi salah serta jelaskan masalah Anda dengan lebih detail di kolom yang sudah disediakan.</span>
												</li>
												<li><span class="description">Klik <span class="tebal">Berikutnya.</span>
												</li>
												<li><span class="description">Lampirkan foto media iklan yang bermasalah. Anda bisa melampirkan hingga 5 foto sekaligus.</span>
												</li>
												<li><span class="description">Pilih solusi <span class="tebal">Retur Produk dan Kembalikan Dana</span>. Tentukan jumlah dana yang diinginkan, lalu klik <span class="tebal">Komplain.</span>
												</li>
												<li><span class="description">Selanjutnya, Anda tinggal menunggu tanggapan dari pemilik titik di halaman Pusat Solusi. Jika dalam waktu 14×24 jam tidak ada tanggapan dari pemilik titik, Anda dapat mengklik <span class="tebal">Minta Bantuan</span> untuk meminta bantuan Customer Support Wiklan.</span>
												</li>
												<li><span class="description">Dana akan dikembalikan ke Saldo Rekening Anda saat pemilik titik sudah mengklik <span class="tebal">Selesaikan Komplain</span> dan menyetujui dana dikembalikan.</span>
												</li>
											</ul>

										</li>

				                	</ul>
				                </div>
		                    
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
