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
  		width: 300px;
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
					<h1>Panduan Pemesanan Online di Wiklan</h1>
					<p>Pesan di Wiklan itu mudah dan berkualitas. Transaksi dijamin aman karena ada Payment System yang melindungi pemesan dari penipuan. Dana transaksi dikembalikan 100% jika media iklan tidak di pasang.</p>
				</div>
				<div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                            	<h3 class="tebal">1. Cek Profil</h3>
                            	<p class="description">Kamu wajib melengkapi identitas di halaman profile sebagai pemilik akun resmi.</p>

								<p class="description">Detail Profile</p>
								<p class="description">Sebelum melakukan pemesanan media iklan, kamu wajib melengkapi data profile di halaman akun anda. Pada halaman ini kamu wajib melengkapi data profile sebagai syarat pemesanan di wiklan.</p>
								<ul class="cek-profil">
									<li class="description">Pastikan detail profile sudah sesuai.</li>
									<li class="description">Pastikan upload KTP dan NPWP sudah sesuai.</li>
								</ul>

                                <p class="description"></p>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <div class="img-panduan kanan">
                                	<img src="<?= base_url() ?>marketplace/images/panduan_1.png" class="img-responsive">
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
                                	<img src="<?= base_url() ?>marketplace/images/panduan_2.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                            	<h3>2. Cari Media Iklan</h3>
                                <p class="description">Kamu dapat mencari, pilih lokasi, membandingkan lokasi strategis media iklan yang kamu inginkan dengan fitur <span class="tebal">Search</span> atau berdasarkan kategori sesuai kebutuhan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                            	<h3>3. Klik Purchase</h3>
                            	<p class="description">Pilih media iklan yang kamu inginkan kemudian klik <span class="tebal">Purchase</span>.</p>
								<ul class="klik-purchase">
									<li><span class="description">Pesan Harga Pas</span>
									<span class="description">Kamu bisa langsung klik tombol <span class="tebal">Purchase</span> untuk membeli barang dengan harga pas.</span></li>
									<li><span class="description">Keranjang Belanja</span>
									<span class="description">Kamu dapat memesan lebih dari satu media iklan dari pemilik titik yang sama di Keranjang Belanja. Perhitungan harga media iklan dan PPN akan disatukan untuk setiap Keranjang Belanja.
									Untuk menambah media iklan ke dalam Keranjang Belanja, kamu cukup menekan tombol <span class="tebal">Purchase</span> yang ada di setiap halaman detail media iklan pemilik titik.</span></li>
									<li><span class="description">Cek Email atau halaman akun resmi anda</span>
									<span class="description">Sistem Wiklan akan menerbitkan PO berupa detail invoice sesuai dengan pesanan anda.</span></li>
								</ul>

                                <p class="description"></p>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <div class="img-panduan kanan">
                                	<img src="<?= base_url() ?>marketplace/images/panduan_3.png" class="img-responsive">
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
                                	<img src="<?= base_url() ?>marketplace/images/panduan_4.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <h3>4. Pembayaran</h3>
                                <p class="description">Kamu dapat melakukan pembayaran ke rekening Wiklan melalui Transfer Panin Bank, BCA Bank dan banyak lagi metode lainnya.</p>
                                <p class="description"><span class="tebal">Pembayaran dengan Transfer</span>.</p>
								<ul class="klik-purchase" >
									<li><span class="description">Setelah berhasil melakukan transfer, kami akan melakukan verifikasi pembayaran Anda. Untuk itu, pastikan Anda membayar sesuai dengan jumlah tagihan pembayaran tepat hingga 3 digit terakhir. Perbedaan nilai transfer akan menghambat proses verifikasi</span>
									</li>
									<li><span class="description">Masuk ke halaman <span class="tebal">payment confirmation</span> Wiklan untuk tahapan selanjutnya dalam konfirmasi pembayaran melalui metode transfer kemudian lengkapi data sesuai dengan nominal yang di transfer ke halaman <span class="tebal">payment confirmation</span></span>
									</li>
									<li><span class="description">Tekan <span class="tebal">Kirim Konfirmasi Pembayaran</span></span>
									</li>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class=" style102">
                                <h3 class="tebal">5. Cek Progress Produksi & Pemasangan</h3>
                            	<p class="description">Kamu  dapat mengecek dan melihat progress tahapan produksi sampai pemasangan meteri ke media iklan di halaman akun resmi pemesan secara real time.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                                <div class="img-panduan kanan">
                                	<img src="<?= base_url() ?>marketplace/images/panduan_5.png" class="img-responsive">
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
                                	<img src="<?= base_url() ?>marketplace/images/panduan_6.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pad-30">
                            <div class=" style102">
                            	<h3>6. Konfirmasi Pelaporan / BAPP</h3>
                            	<p class="description">Setelah materi terpasang di media iklan, lakukan konfirmasi dengan menekan Konfirmasi Meteri Terpasang pada halaman Detail Transaksi. Transaksi akan dianggap selesai setelah kamu memberikan konfirmasi materi terpasang kepada pemilik titik yang bersangkutan.</p>
                            	<p class="description"><span class="tebal">Materi Terpasang dan Beri Feedback</span></p>
								<ul class="klik-purchase">
									<li><span class="description">Setelah materi terpasang di media iklan, lakukan konfirmasi dengan menekan Konfirmasi <span class="tebal">Materi Terpasang</span> di halaman Transaksi</span>
									</li>
									<li><span class="description">Transaksi akan dianggap selesai setelah kamu memberikan feedback kepada pemilik titik. Apabila kamu menyukai layanan pemilik titik tersebut, berikan <span class="tebal">feedback</span> positif dengan tanggapanmu mengenai pemilik titik.</span>
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