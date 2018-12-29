<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
?>

<style type="text/css">
	#content2 {
		margin-bottom: 40px;
        padding-bottom: 40px; 
	}
    .tab-container {
        margin-bottom: 80px;
    }
    .text-center {
        text-align: center;
    }
    p.text-center {
        font-size: 14px;
    }
    .besar {
        font-size: 60px;
        display: block;
        text-align: center;
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
        font-size: 14px;
        margin: 20px 0;
    }
    #pembayaran li {
        *opacity: .65;
        color: #3f4047;
        font-weight: 400;
        font-size: 16px;
        margin: 20px 0;
    }
    #pembayaran ul.tabs li {
        opacity: 1;
        color: #3f4047;
        font-weight: 400;
        font-size: 16px;
        margin: 0 0;
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
    #pembayaran ul.tabs li a{
        font-size: 14px;
        font-weight: bold;
    }
    .tab-container.trans-style ul.tabs li a {
        opacity: 0.8;
    }
</style>

<div id="content2" class="block">
    
    <div class="col-md-12" id="pembayaran">
        <img src="<?= base_url() ?>marketplace/images/panduan_cara_berjualan.jpg" alt="" width="570" height="200" style="width: 100%; height: auto;">
        <div class="tab-container trans-style">
            <ul class="tabs">
                <li class="active"><a href="#jual" data-toggle="tab">Jual Media Iklan</a></li>
                <li class=""><a href="#promosi" data-toggle="tab">Promosi Media Iklan</a></li>
                <li class=""><a href="#kelola" data-toggle="tab">Kelola Transaksi</a></li>
                <li><a href="#produksi" data-toggle="tab">Produksi &amp; Pemasangan</a></li>
                <li><a href="#terimaUang" data-toggle="tab">Terima Pembayaran</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="jual">
                    <h3 class="text-center tebal">Upload produk Jualan Kamu ke Wiklan</h3>
                    <div class="col-md-3">
                        <span class="besar">
                            <img src="<?= base_url() ?>marketplace/images/tambah_media_iklan.jpg">
                        </span>
                        <h4 class="text-center tebal">Tentukan Produk Jualanmu</h4>
                        <p class="text-center">Upload produk yang ingin kamu jual pada halaman <span class="tebal">Jual Media Iklan</span>, yang terletak di dashboard website Wiklan.</p>
                    </div>
                    <div class="col-md-3">
                        <span class="besar">
                            <img src="<?= base_url() ?>marketplace/images/deskripsi_media.png">
                        </span>    
                        <h4 class="text-center tebal">Lengkapi Data dan Deskripsi Produk</h4>
                        <p class="text-center">Isilah deskripsi dan informasi detail produk yang akan kamu jual. Kamu wajib mengisi informasi nama produk, harga, deskripsi, alamat, detail produk, dokumen lain nya.</p>
                    </div>
                    <div class="col-md-3">
                        <span class="besar">
                            <img src="<?= base_url() ?>marketplace/images/upload_foto.png">
                        </span>     
                        <h4 class="text-center tebal">Tambahkan Detail-detail Lainnya</h4>
                        <p class="text-center">Kamu juga dapat menambahkan detail lain seperti upload foto, tambah peta lokasi, upload video, tambah lokasi terdekat, upload dokumen.</p>
                    </div>
                    <div class="col-md-3">
                        <span class="besar">
                            <img src="<?= base_url() ?>marketplace/images/jual_media.png">
                        </span>     
                        <h4 class="text-center tebal">Selesaikan Penjualan</h4>
                        <p class="text-center">Jika informasi produk sudah diisi, selesaikan jual media iklan dengan klik tombol <span class="tebal">"Simpan".</span></p>
                    </div>
                </div>

                <div class="tab-pane fade" id="promosi">
                    <h3 class="text-center tebal">Promosikan Produk Jualan Kamu</h3>
                    <div>
                        <div class="col-md-8">
                            <h4 class="tebal">Iklankan Produkmu di Google</h4>
                            <p><span class="description">Promosikan produk jualanmu ke calon pembeli yang sedang mencarinya di mesin pencarian Google dengan cara share URL produk anda di wiklan.</span></p>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div>
                        <div class="col-md-8">
                            <h4 class="tebal">Iklankan Produkmu di Facebook dan Instagram</h4>
                            <p><span class="description">Promosikan produk jualanmu di Facebook dan Instagram ke calon pembeli yang:</span></p>
                            <ul class="klik-purchase">
                                <li><span class="description">Memiliki ketertarikan akan jualanmu dengan cara share URL produk anda di wiklan ke Media Sosial.</span></li>
                                <li><span class="description">Pernah mengunjungi halaman produkmu.</span></li>
                            </ul>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>

                <div class="tab-pane fade" id="kelola">
                    <h3 class="text-center tebal">Kelola Transaksi Penjualanmu</h3>
                    <div>
                        <div class="col-md-8">
                            <h4 class="tebal">Masuk ke Halaman Transaksi</h4>
                            <p><span class="description">Kamu bisa mengelola dan memantau halaman Transaksi, yang terletak di dashboard website Wiklan.</span></p>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div>
                        <div class="col-md-8">
                            <h4 class="tebal">Pelajari Mengenai Status Transaksi</h4>
                            <p><span class="description">Status transaksi terdiri dari Menunggu Pembayaran, Dibayar, Progress Pemasangan, Tayang, dan Selesai. Warna pada Icon status menunjukan status yang sedang aktif atau telah berlalu.</span></p>
                            <ul class="klik-purchase">
                                <li>
                                    <span class="description tebal">Menunggu Pembayaran</span>
                                    <p>Produk telah dipesan oleh pembeli dan menunggu pembayaran dari pembeli.</p>
                                </li>
                                <li>
                                    <span class="description tebal">Dibayar</span>
                                    <p>Pemesan sudah melakukan pembayaran. Silakan klik proses pesanan untuk melanjutkan transaksi.</p>
                                </li>
                                <li>
                                    <span class="description tebal">Diproses Pemilik Titik</span>
                                    <p>Pemilik titik menyetujui untuk memproses pesanan, kemudian pemilik titik melakukan progress pemasangan materi.</p>
                                </li>
                                <li>
                                    <span class="description tebal">Tayang</span>
                                    <p>Materi media iklan sudah tayang berdasarkan hasil pelaporan / BAPP. Selanjutnya menunggu konfirmasi pemasangan materi selesai dari pihak pembeli.</p>
                                </li>
                                <li>
                                    <span class="description tebal">Selesai</span>
                                    <p>Pembeli telah melakukan konfirmasi pemasangan materi selesai, selanjutnya uang akan diteruskan ke rekening pemilik titik yang sudah didaftarkan di dashboard akun wiklan.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>

                <div class="tab-pane fade" id="produksi">
                    <h3 class="text-center tebal">Produksi dan Pemasangan</h3>
                    <div>
                        
                        <h4 class="tebal">Notifikasi Pemesanan Baru</h4>
                        <p>Kamu akan menerima notifikasi (seperti e-mail, push notif) tentang pesanan barumu, setelah wiklan sukses menerima pembayaran dari pembeli.</p>
                        
                    </div>
                    <div>
                        
                        <h4 class="tebal">Langkah-langkah Memproses Pesanan</h4>
                        <p>Lakukan hal-hal di bawah ini begitu mendapatkan notifikasi pesanan baru untuk menyelesaikan pesanan dan meningkatkan penilaian penjualanmu:</p>
                        <ul>
                            <li>
                                <div class="col-md-4">
                                    <span class="besar">
                                        <img src="<?= base_url() ?>marketplace/images/langkah_1.png">
                                    </span> 
                                </div>
                                <div class="col-md-8">
                                    <p><span class="tebal">1. Lihat pesanan barumu dengan melakukan salah satu cara di bawah ini:</span></p>
                                    <ul class="klik-purchase">
                                        <li>
                                            <p>A.  Buka menu "Transaksi" bagian tab <span class="tebal">"Penjualan"</span>. Lakukan filter status transaksi <span class="tebal">"Dibayar"</span>, atau</p>
                                        </li>
                                        <li>
                                            <p>B.  Masuk langsung ke halaman detail transaksimu dengan mengklik link pada notifikasi yang kamu dapatkan</p>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-4">
                                    <span class="besar">
                                        <img src="<?= base_url() ?>marketplace/images/langkah_2.jpg">
                                    </span> 
                                </div>
                                <div class="col-md-8">
                                    <p><span class="tebal">2. Periksa apakah produk yang dipesan tersedia atau tidak.</span></p>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-4">
                                    <span class="besar">
                                        <img src="<?= base_url() ?>marketplace/images/langkah_3.png">
                                    </span> 
                                </div>
                                <div class="col-md-8">
                                    <p><span class="tebal">3. Lakukan konfirmasi pada pembeli bahwa transaksi sedang kamu proses dengan mengklik tombol proses.</span></p>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-4">
                                    <span class="besar">
                                        <img src="<?= base_url() ?>marketplace/images/langkah_4.jpg">
                                    </span> 
                                </div>
                                <div class="col-md-8">
                                    <p><span class="tebal">4. Produksi dan pasang meteri media iklan dengan baik.</span></p>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-4">
                                    <span class="besar">
                                        <img src="<?= base_url() ?>marketplace/images/langkah_5.png">
                                    </span> 
                                </div>
                                <div class="col-md-8">
                                    <p><span class="tebal">5. Pastikan titik berdiri saat pemasangan media iklan sudah sesuai dengan pesanan pembeli.</span></p>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-4">
                                    <span class="besar">
                                        <img src="<?= base_url() ?>marketplace/images/langkah_6.jpg">
                                    </span> 
                                </div>
                                <div class="col-md-8">
                                    <p><span class="tebal">6. Tayangkan materi iklan sesuai dengan pesanan pembeli, sebelum deadline yang tertera di detail transaksi.</span></p>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-4">
                                    <span class="besar">
                                        <img src="<?= base_url() ?>marketplace/images/langkah_7.png">
                                    </span> 
                                </div>
                                <div class="col-md-8">
                                    <p><span class="tebal">7. Tunggu materi iklan pembeli tayang, kemudian uang akan remit (diteruskan dari wiklan) ke rekening bank mu.</span></p>
                                </div>
                            </li>
                        </ul>    
                        
                    </div>
                </div>

                <div class="tab-pane fade" id="terimaUang">
                    <h3 class="text-center tebal">Terima Uang dan Dapatkan Feedback Positif</h3 class="text-center tebal">
                    <div class="col-md-6">
                        <span class="besar">
                            <img src="<?= base_url() ?>marketplace/images/uang_penjualan.png">
                        </span>    
                        <h4 class="text-center tebal">Uang Hasil Penjualan</h4>
                        <p class="text-center">Wiklan akan meneruskan uang pembayaran ke Rekening Bank mu setelah transaksi dinyatakan selesai, baik itu setelah pembeli melakukan konfirmasi materi iklan tayang tanpa komplain. Kamu dapat melakukan pengecekan terima uang di rekening bank yang sudah di daftarkan ke halaman dashboard wiklan.</p>
                    </div>
                    <div class="col-md-6">
                        <span class="besar">
                            <img src="<?= base_url() ?>marketplace/images/feedback.png">
                        </span>    
                        <h4 class="text-center tebal">Feedback dan Penilaian Positif</h4>
                        <p class="text-center">Pelayanan terbaikmu menunjukan penilaianmu. Semakin bagus service kamu, semakin baik penilaianmu. Untuk meningkatkan penilaianmu dan reward, kumpulkan feedback positif dari transaksi penjualan sebanyak-banyaknya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<br>
<br>

