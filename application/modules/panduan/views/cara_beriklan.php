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
  	.global-map-area-fucia {
  		background: #E0306E;
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

  	#pembayaran p {
  		opacity: .65;
  		color: #3f4047;
	    font-weight: 400;
	    font-size: 16px;
	    margin: 20px 0;
  	}
  	#pembayaran li {
  		opacity: .85;
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
  	ul.klik-purchase3 {
  		margin-left: 20px;
  		list-style: decimal outside none;
  	}
  	.tebal {
  		font-weight: 800;
  	}
  	#jaminan {
  		display: block;
  		text-align: center;
  		color: #db3238;
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

				<div class="image-container block">
                <img src="<?= base_url() ?>marketplace/images/fitur_diskon.jpg" alt="">
            </div>
			                         
				<div class="container pad-30">
			        <div class="row2">
			            
			            <div class="col-sm-12">
			                <div class="style102">
			                	<div class="container2 pad-30">
									<h1 class="tebal">Hai Pemilik Titik!</h1>
	                                <p class="description">
	                                	Wiklan membawa kabar gembira untuk Anda semua, pemesan dan penjual, pengguna loyal kami. Kini, Wiklan memberikan fitur baru, yakni <span class="tebal">fitur diskon</span>.
	                                </p>
	                                <p class="description">
	                                	Fitur diskon diharapkan bisa mempertemukan keinginan pemilik titik agar media iklan yang dijual lebih cepat laku dan keinginan pemesan untuk mendapatkan media iklan dengan harga yang lebih murah. Sehingga dengan adanya fitur diskon ini, baik pemesan dan penjual, mampu menjalin kesepakatan transaksi yang saling menguntungkan.
	                                </p>
								</div>   
			                	<p style="font-weight: bold;"><span class="description">Berikut syarat dan ketentuan yang berlaku terkait fitur diskon ini:</span></p>
								<ul class="klik-purchase3">
									<li><span class="description">Pemilik titik yang ingin mengajukan diskon untuk media iklan yang dijual mesti memenuhi syarat-syarat di bawah ini :</span>
										<ul class="klik-purchase">
											<li><span class="description">Judul nama produk jelas</span></li>
											<li><span class="description">Label kategori harus tersedia bukan soldout</span></li>
											<li><span class="description">Harga sesuai dengan harga pasar</span></li>
											<li><span class="description">Banyak pemesan yang berminat</span></li>
											<li><span class="description">Foto media iklan sesuai, jelas dan dokumen lengkap</span></li>
										</ul>
									</li>
									<li><span class="description">Pemilik titik tidak dapat melakukan perubahan nominal dan tanggal berlaku diskon jika diskon sudah diset.</span>
									</li>
									<li><span class="description">Pemilik Titik dapat menghapus diskon.</span>
									</li>
									<li><span class="description">Setiap produk yang sedang aktif didiskon secara otomatis akan muncul di urutan teratas di halaman pemilik titik.</span>
									</li>
									<li><span class="description">Pengaturan diskon dapat dilakukan di semua platform wiklan, yaitu desktop web, dan mobile web wiklan.</span>
									</li>
								</ul>
								<br>
								<p style="font-weight: bold;"><span class="description">Silakan simak langkah-langkah untuk mengajukan diskon di Wiklan seperti yang dicantumkan di bawah ini:</span></p>
								<ul class="klik-purchase">
									<li><span class="description">Buka halaman <span class="tebal">Jual Media Iklan.</span>
									</li>
									<li><span class="description">Pilih produk yang akan didiskon > <span class="tebal">Apa yang dijual</span> pilih <span class="tebal">Set Diskon.</span>
									</li>
									<li><span class="description">Pemilik titik dapat mengajukan diskon untuk beberapa media iklan dengan cara mencentang beberapa media iklan lalu pilih tombol <span class="tebal">Set Diskon.</span>
									</li>
									<li><span class="description">Pemilik titik memasukkan <span class="tebal">besarnya diskon</span> dan <span class="tebal">tanggal berlaku diskon</span>. Tanggal berlaku diskon dapat dimulai dari hari saat melakukan set diskon sampai dengan 1 hari atau 1 bulan ke depan.</span>
									</li>
									<li><span class="description">Pemilik titik tidak dapat melakukan perubahan nominal dan tanggal berlaku diskon jika diskon sudah diset</span>
									</li>
									<li><span class="description">Pemilik titik dapat melihat detail diskon yang akan atau sedang berlaku pada halaman <span class="tebal">Jual Media Iklan</span>, menu <span class="tebal">Lihat Rincian</span> pada media iklan yang sedang didiskon.</span>
									</li>
									<li><span class="description">Pemilik titik juga dapat menghapus diskon yang sudah diset pada halaman barang Jual Media Iklan, menu lihat rincian, klik text button <span class="tebal">Hapus Diskon.</span>
									</li>
								</ul>
								<br><br>
                <p align="center"><span class="description">Semoga fitur ini bisa mengakomodasi keinginan para sahabat Wiklan. Terima kasih.</span></p>

			                </div>
			            </div>

			        </div>
			    </div>

			   

			    <div class="clearfix"></div>
			</div>

		</div>
	</div>
</section>
