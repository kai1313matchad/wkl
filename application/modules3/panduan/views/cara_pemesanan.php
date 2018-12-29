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
  	.img-panduan img {
      width: 700px;
      height: 300px
  	}
  	.kanan {
  		float: right;
  	}
  	.white, .white li {
  		color: #fff !important;
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
</style>

<section id="content">
	<div class="container" id="justify">
		<div class="row">
			<div class="image-style style12 box" id="pemesanan">
				<div class="container pad-30">
					<h1>Cara Mendapatkan Penawaran di Wiklan</h1>
					<p>Permintaan penawaran titik lokasi di Wiklan itu mudah dan cepat. Transaksi dijamin aman karena ada Payment System yang melindungi pemesan dari penipuan. Dana transaksi dikembalikan 100% jika media iklan tidak di pasang.</p>
				</div>
				<div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                            	<h3 class="tebal">1. Login ke Dashboard User</h3>
                            	<p class="description">Login terlebih dahulu untuk memulai proses <span class="tebal">Permintaan Penawaran</span>. Pastikan <span class="tebal">username</span> dan <span class="tebal">password</span> saat login sudah benar serta sesuai dengan yang sudah didaftarkan.</p>

                                <p class="description"></p>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <div class="img-panduan kanan">
                                	<img src="<?= base_url() ?>marketplace/images/penawaran_1.jpg" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                                <div class="img-panduan kiri">
                                	<img src="<?= base_url() ?>marketplace/images/penawaran_2.jpg" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                            	<h3>2. Cari Titik Lokasi Media Iklan</h3>
                                <p class="description">Dengan fitur mesin pencarian titik lokasi Wiklan, Anda dapat  <span class="tebal">pilih titik lokasi, membandingkan titik lokasi strategis media iklan, dan sewa titik lokasi media iklan </span> seluruh indonesia dengan cepat berdasarkan kebutuhan serta budget anda.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                            	<h3>3. Klik Detail</h3>
                            	<p class="description">Klik <span class="tebal">Detail</span> untuk melihat titik lokasi lebih lengkap, mulai dari Foto, Map, Street View, Video, Deskripsi, Media Iklan Lain, Tempat Strategis Terdekat, Ulasan, Rekomendasi Lokasi, dan proses permintaan penawaran titik lokasi.</p>

                                <p class="description"></p>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <div class="img-panduan kanan">
                                	<img src="<?= base_url() ?>marketplace/images/penawaran_3.jpg" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                                <div class="img-panduan kiri">
                                	<img src="<?= base_url() ?>marketplace/images/penawaran_4.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <h3>4. Permintaan Penawaran</h3>
                                <p class="description">Pastikan  <span class="tebal">Tanggal Awal Tayang</span> dan  <span class="tebal">Durasi Sewa</span> sudah benar sebelum klik tombol  <span class="tebal">Permintaan Penawaran</span>.</p>

                                <p class="description"> Sebelum melakukan permintaan penawaran pastikan titik lokasi yang akan dipesan sudah sesuai kebutuhan dan setiap permintaan penawaran bisa lebih dari 1 titik lokasi .</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                                <h3 class="tebal">5. Cetak Penawaran</h3>
                            	<p class="description">Setelah klik tombol <span class="tebal">Permintaan Penawaran</span> maka akan diarahkan pada halaman cart. Halaman tersebut menampilkan semua pesanan titik lokasi media iklan beserta estimasi sub total dan PPN 10%. 
                              </br></br>

                              Setelah sudah di cek dan sesuai kebutuhan, anda bisa klik tombol <span class="tebal">Cetak Penawaran</span> di bawah sendiri.



                              </p>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <div class="img-panduan kanan">
                                	<img src="<?= base_url() ?>marketplace/images/penawaran_5.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                            	<div class="img-panduan kiri">
                                	<img src="<?= base_url() ?>marketplace/images/penawaran_6.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                            	<h3>6. Dokumen Penawaran dari Wiklan</h3>
                            	<p class="description">Setelah klik tombol <span class="tebal">Cetak Penawaran</span>, anda proses mendownload penawaran titik lokasi media iklan berupa format .pdf yang sesuai dengan kebutuhan anda.</p>
                            	<p class="description"><span class="tebal">Dokumen Penawaran Titik Lokasi :</span></p>
								<ul class="klik-purchase">
									<li><span class="description">Proses selanjutnya, anda bisa langsung melakukan proses pembayaran sesuai rekening wiklan yang terlampir di dokumen saat  <span class="tebal">Cetak Penawaran.</span>
									</li>
									<li><span class="description">Stempel atau TTD di dokumen penawaran kemudian scan kirim ke email cs@wiklan.com.</span>
                  </li>
                  <li><span class="description">Jika masih ada kendala dengan budget anda, bisa  <span class="tebal">Hubungi Kami</span> untuk penawaran lain yang sesuai dengan budget anda.</span>
                  </li>
								</ul>
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