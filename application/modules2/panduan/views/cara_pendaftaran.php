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
					<h1>Cara Pendaftaran Online di Wiklan</h1>
					<p>Daftar di Wiklan itu mudah dan efektif. Anda cukup <span class="tebal">Signup</span> dan isi data identitas yang valid untuk login serta Anda dapat melihat detail titik lokasi yang strategis seluruh indonesia.</p>
				</div>
				<div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                            	<h3 class="tebal">1. Klik Signup</h3>
                            	<p class="description"><span class="tebal">Signup</span> adalah proses pendaftaran awal yang wajib dilakukan dalam melakukan proses transaksi, permintaan penawaran secara mandiri, melihat detail harga dan titik lokasi secara lengkap, monitoring atau tracking tahapan pemesanan titik lokasi. </p>

                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <div class="img-panduan kanan">
                                	<img src="<?= base_url() ?>marketplace/images/signup_1.jpg" class="img-responsive">
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
                                	<img src="<?= base_url() ?>marketplace/images/signup_2.jpg" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                            	<h3>2. Proses Pendaftaran</h3>
                                <p class="description">Lengkapi dan isi data secara lengkap sebagai syarat pendaftaran di wiklan seperti : <span class="tebal">Nama Lengkap /Nama Perusahaan, Nomor Telepon Pribadi / Kantor, Email Pribadi / Kantor, Kata Sandi, Centang Syarat dan Ketentuan serta Kebijakan Privasi di Wiklan.</span>  </br></br>

                                Setelah data sudah dilengkapi klik tombol "<span class="tebal">DAFTAR AKUN</span>", kemudian cek notifikasi pesan masuk pada email yang sudah di daftarkan. Jika ada notifikasi anda sudah terdaftar di wiklan, jika belum anda bisa ulang kembali proses pendaftaran. </br></br>

                                Jika anda kesulitan mendaftar bisa <a href="<?php echo base_url() ?>templates/home#contact"><span class="tebal">Hubungi Kami</span></a>, nanti team kami akan mengarahkan proses pendaftaran di wiklan dengan benar.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                            	<h3>3. Login ke Dashboard User</h3>
                            	<p class="description">Setelah anda terima notifkasi pesan masuk di email, Anda bisa langsung login menggunakan <span class="tebal">Nama Lengkap/Nama Perusahaan</span> dan <span class="tebal">Kata Sandi</span> yang sudah didaftarkan sebelumnya. </br></br>

                              Pastikan <span class="tebal">username</span> dan <span class="tebal">password</span> saat login sudah benar serta sesuai dengan yang sudah didaftarkan.

                              </p>


                                <p class="description"></p>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <div class="img-panduan kanan">
                                	<img src="<?= base_url() ?>marketplace/images/signup_3.jpg" class="img-responsive">
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
                                	<img src="<?= base_url() ?>marketplace/images/signup_4.jpg" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <h3>4. Dashboard User</h3>
                                <p class="description"><span class="tebal">Dashboard user</span> adalah halaman yang digunakan untuk monitoring proses transaksi saat pemesanan maupun jual titik lokasi secara online. Sebelum melakukan proses lainnya, "<span class="tebal">PERBARUI PROFIL</span>" terlebih dahulu untuk bisa melakukan proses transaksi, permintaan penawaran titik lokasi secara mandiri, melihat detail harga dan titik lokasi secara lengkap, monitoring atau tracking tahapan pemesanan titik lokasi.</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                                <h3 class="tebal">5. Kembali ke Halaman Home</h3>
                            	<p class="description">Setelah proses pendaftran, login, dan perbarui profil dengan data yang valid selesai. Anda bisa melakukan proses transaksi, permintaan penawaran titik lokasi secara mandiri sesuai kebutuhan, melihat detail harga maupun titik lokasi secara lengkap, monitoring tahapan pemesanan titik lokasi. </p>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <div class="img-panduan kanan">
                                	<img src="<?= base_url() ?>marketplace/images/signup_5.jpg" class="img-responsive">
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