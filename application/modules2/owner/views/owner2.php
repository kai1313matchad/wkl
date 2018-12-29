<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
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
</style>

<div class="col-md-12">
    <section id="content" >
    	<div class="global-map-area promo-box parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 45.5px;">
            <div class="container">
                <div class="content-section description col-sm-12" style="height: 273px;">
                    <div class="table-wrapper hidden-table-sm" style="height: 100%;">
                        <div class="table-cell">
                            <h2 class="m-title" style="margin-left: 30px;">
                                <em>Pemilik Titik / Persil (Jual media iklan)</em>
                            </h2>
                            <h5 style="margin-left: 30px; line-height: 30px;">Bergabunglah dengan jaringan media pemasangan iklan independen online terbesar di negara ini.</h5>
                        </div>
                        <div class="table-cell"></div>
                        <div class="table-cell action-section col-md-4 no-float pull-right2">
                        	<a href="<?= base_url('youraccount/start') ?>" class="button green full-width2 btn-large fourty-space2 pull-right2" style="margin-right: 60px;">DAFTAR PEMILIK TITIK</a>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>

<div>
<div id="main justify" class="col-sm-8 col-md-9">
    <div class="booking-information travelo-box">
        
        <div class="booking-confirmation clearfix" style="text-align: justify;">
           	<div>
           		<h3 class="tebal">Deskripsi WIKLAN</h3>
           	</div>
            <div class="message">
                <p><span class="description">
                	Memperkenalkan WIKLAN, platform pemesanan otomatis pertama untuk media pemasangan iklan.
					Dari pemesanan hingga pembayaran, kami membantu bisnis dan merek lokal, regional, dan nasional dalam membangun, membeli, dan mengeksekusi kampanye OOH online bahkan jika mereka belum pernah membeli OOH sebelumnya.
					</span>
				</p>	
                <br>
                <p>
                    <span class="description">
                        WIKLAN juga memohon kepada ribuan biro/agensi iklan lokal dan regional, serta agensi online, SEO, dan digital yang ingin memasukkan iklan luar ruang ke dalam campuran media klien mereka.
                    </span>
                </p>
            </div>
        </div>
    	<hr>
       	<p><span class="description">
        	WIKLAN adalah mitra pemasaran dan penjualan online lokal Anda serta membantu persil/pemilik titik masuk ke pembeli baru. Tujuan kami adalah membuat billboard mudah dibeli oleh klien. Banyak dari calon pengiklan (klien) ini telah menghabiskan ratusan juta setiap tahun untuk inisiatif pemasaran dan periklanan termasuk iklan cetak, selebaran, rambu jalan, kata iklan online, kampanye media sosial, ledakan email (blast email), dan pusat panggilan. Persil/pemilik titik yang lebih besar dan agensi spesialis OOH tertarik untuk beriklan secara online tetapi harus mampu membeli jaringan display (website katalog) atau media online lain nya. Buat dan daftarkan billboard/media iklan Anda secara gratis dengan jaringan media iklan online independen terbesar dan aktifkan pembelian online hari ini di WIKLAN.</span>
        </p>
        <p><span class="description">
			Tim spesialis periklanan kami, bermitra dengan pemasaran online yang akan memaparkan media iklan Anda kepada pembeli baru. WIKLAN adalah alat berharga yang membantu tim penjualan Anda secara efektif melayani pembeli online, pembeli uji coba, dan meningkatkan penjualan anda.
			Platform WIKLAN dirancang untuk meniru pengalaman bahwa pembeli iklan online telah tumbuh terbiasa dan mendidik mereka tentang manfaat menggabungkan iklan OOH ke dalam campuran media iklan online mereka.
            </span> 
        </p>	
        <hr>
    	<h2 style="text-align: center;">Keuntungan Pemilik Titik / Persil</h2>
    	<ul class="klik-purchase">
    		<li><span class="description">Penjualan dan pemasaran menjadi tanggung jawab Perusahaan</span></li>
			<li><span class="description">Pembayaran yang diterima tidak dipengaruhi oleh pembayaran dari klien</span></li>
			<li><span class="description">Mendapatkan training dari pihak perusahaan terkait pengajuan perijinannya</span></li>
			<li><span class="description">Mendapatkan rekomendasi vendor untuk pembangunan dari pihak perusahaan</span></li>
			<li><span class="description">Komisi yang didapat :</span>
                <ul class="klik-purchase" style="list-style: disc;">
                    <li><span class="description">Apabila dibantu dana pembangunan di awal, maka komisinya 50% : 50%</span></li>
                    <li><span class="description">Apabila dana pembangunan di awal full dari pemilik titik lokasi, maka komisinya 75% : 25%
                        Contoh :</span>
                        <ul class="klik-purchase" style="list-style: lower-alpha;">
                            <li><span class="description">Harga Jual uk.5x10 : 500.000.000</span>
                                    <span class="description">Pemilik titik lokasi dapat 250.000.000 </span>
                                    <span class="description">Perusahaan dapat 250.000.000</span>
                            </li>            
                            <li><span class="description">Harga Jual uk.5x10 : 500.000.000</span>
                                    <span class="description">Pemilik titik lokasi dapat 375.000.000 </span>
                                    <span class="description">Perusahaan dapat 125.000.000</span>
                            </li>
                        </ul>
                    </li>
                </ul>
			</li>
			<li><span class="description">Bangunan Billboard menjadi hak milik pemilik titik lokasi.</span></li>
			<li><span class="description">Akan mendapatkan score tambahan apabila penilaian tiap bulannya mencapai nilai 10, score tersebut dapat. Diakumulasikan dan ditukarkan dengan hadiah menarik (misal tour atau voucher belanja)</span></li>
			<li><span class="description">Pemilik lahan bebas menentukan harga  bottom price untuk penjualan lokasi tersebut.</span></li>
			<li><span class="description">Pemilik lahan mempunyai akun sendiri untuk dapat mengedit atau menambahkan foto, video, atau keterangan dari lokasi yang dimilikinya.</span></li>
    	</ul>
      
        <hr>
        <a href="<?= base_url('youraccount/start') ?>" class="button green full-width btn-large fourty-space">DAFTAR SEBAGAI PEMILIK TITIK</a>
        
    </div>
         
</div>

<div class="sidebar col-sm-4 col-md-3">
    <div class="travelo-box contact-box">
        <h4>Butuh Bantuan WIKLAN?</h4>
        <p id="justify">Kami akan dengan senang hati membantu Anda. Tim kami siap melayani Anda 24/7 (Respon Cepat 24 Jam).</p>
        <address class="contact-details">
            <span class="contact-phone"><i class="soap-icon-phone"></i> <?= $shop_phone ?></span>
            <br>
            <a class="contact-email" href="#"><?= $shop_email ?></a>
        </address>
    </div>
</div>

</div>


<br>
<br>

<div class="col-sm-12 col-md-12">
    <div class="block clearfix">
        <div class="col-sm-6 col-md-3">
            <div class="icon-box style8">
                <div class="ikon">
                    <img src="<?= base_url() ?>marketplace/images/target_pelanggan.png">
                </div>
                <h4 class="box-title">Target Pelanggan</h4>
                <p class="description2">
                    Pemasaran di WIKLAN akan meningkatkan penjualan Anda ke ratusan pengiklan baru.
                </p>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="icon-box style8">
                <div class="ikon">
                    <img src="<?= base_url() ?>marketplace/images/pendapatan_meningkat.png">
                </div>
                <h4 class="box-title">Pendapatan Meningkat</h4>
                <p class="description2">
                    Manfaatkan durasi sewa dan isi deskripsi kelebihan media iklan Anda melalui marketplace penawaran di WIKLAN.
                </p>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="icon-box style8">
                <div class="ikon">
                    <img src="<?= base_url() ?>marketplace/images/penjualan_otomatis.png">
                </div>
                <h4 class="box-title">Penjualan Otomatis</h4>
                <p class="description2">
                    Tidak perlu lagi mendorong kertas penawaran dan menjawab panggilan, penjualan WIKLAN otomatis dari pemesanan ke pembayaran.
                </p>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="icon-box style8">
                <div class="ikon">
                    <img src="<?= base_url() ?>marketplace/images/Dibayar.png">
                </div>
                <h4 class="box-title">Dibayar</h4>
                <p class="description2">
                    Berhenti mengejar piutang dan dapatkan bayaran tepat waktu. Semua transaksi WIKLAN adalah pra-bayar.
                </p>
            </div>
        </div>
    </div>
</div>