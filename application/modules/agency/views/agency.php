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
    .description2 {
        text-transform: none;
        font-size: 14px;
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
    h4.box-title {
        font-size: 18px;
        font-weight: bold;
    }

    @media only screen and (max-width: 400px) {
        .global-map-area {
            margin-top: 20px;
        }
    }
</style>

<div class="col-md-12">
    <section id="content">
    	<div class="global-map-area promo-box parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 45.5px;">
            <div class="container">
                <div class="content-section description col-sm-12" style="height: 273px;">
                    <div class="table-wrapper hidden-table-sm" style="height: 100%;">
                        <div class="table-cell">
                            <h2 class="m-title" style="margin-left: 30px;">
                                <em>Klien (Pemesan media iklan)</em>
                            </h2>
                            <h5 style="margin-left: 30px; line-height: 30px;">Akses jaringan media iklan online independen terbesar di negara ini.</h5>
                        </div>
                        <div class="table-cell"></div>
                        <div class="table-cell action-section col-md-4 no-float pull-right2">
                        	<a href="<?= base_url('youraccount/start') ?>" class="button green full-width2 btn-large fourty-space2 pull-right2" style="margin-right: 60px;">DAFTAR SEBAGAI KLIEN</a>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>

<div id="main justify" class="col-sm-8 col-md-9">
    <div class="booking-information travelo-box">
        <div class="booking-confirmation clearfix" style="text-align: center;">
           	<div>
           		<h3 class="tebal">Deskripsi WIKLAN</h3>
           	</div>
            <div class="message">
                <p class="main-message2">
                    <span class="description">
                	Wiklan merupakan situs online penyedia titik lokasi yang berfokus pada periklanan media luar ruang. Wiklan bekerja sama dengan biro iklan lokal di seluruh indonesia dan bekerja sama dengan pemilik titik lokasi dengan sistem kerjasama revenue sharing. Wiklan memudahkan klien untuk mendapatkan lokasi sesuai kebutuhan karena di wiklan terdapat banyak pilihan lokasi dengan harga yang bersaing.</span>
				</p>
            </div>
        </div>       
        <hr>


        <div>
        	<h2 style="text-align: center;">Keuntungan Klien</h2>
        	<ul class="klik-purchase">
        		<li><span class="description">Dapat melakukan pencetakan penawaran secara mandiri via website.</span></li>
				<li><span class="description">Report foto akan dikirimkan secara otomatis tiap awal bulan.</span></li>
				<li><span class="description">Tidak perlu mencari lokasi sendiri ke kota tertentu, karena data yang disajikan jelas, lengkap dan valid.</span></li>
				<li><span class="description">Akan mendapatkan score tambahan apabila penilaian mencapai nilai 10 per pemesanan, score tersebut dapat diakumulasikan dan ditukarkan dengan potongan diskon untuk pembelian OOH selanjutnya.</span></li>
				<li><span class="description">Lokasi yang ditawarkan sudah ada ijin dan pajaknya.</span></li>
				<li><span class="description">Lokasi yang ditawarkan sudah tercover oleh asuransi.</span></li>
	
        	</ul>
        </div>
        <hr>
        <a href="<?= base_url('youraccount/start') ?>" class="button green full-width btn-large fourty-space">DAFTAR SEBAGAI KLIEN</a>
    </div>
</div>

<div class="sidebar col-sm-4 col-md-3">
     <?= Modules::run('templates/need_help') ?>
</div>


<br>
<br>

<div class="col-sm-12 col-md-12">
    <div class="block clearfix">
        <div class="col-sm-6 col-md-3">
            <div class="icon-box style8">
                <div class="ikon">
                    <img src="<?= base_url() ?>marketplace/images/efektivitas_waktu.png">
                </div>
                <h4 class="box-title">Efektivitas Waktu</h4>
                <p class="description2">
                    Dengan platform kami proses pencarian, penawaran, pemasangan menjadi lebih mudah dan cepat serta menghemat waktu berharga anda.
                </p>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="icon-box style8">
                <div class="ikon">
                    <img src="<?= base_url() ?>marketplace/images/harga_bersaing.png">
                </div>
                <h4 class="box-title">Harga Bersaing</h4>
                <p class="description2">
                    Dengan banyak pilihan yang kami tawarkan, anda dijamin akan mendapat lokasi dengan harga terbaik serta anda juga bisa memilih lokasi sesuai keinginan.
                </p>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="icon-box style8">
                <div class="ikon">
                    <img src="<?= base_url() ?>marketplace/images/w_koin.png">
                </div>
                <h4 class="box-title">W-Koin</h4>
                <p class="description2">
                    Dengan sistem kami anda bisa mendapat reward dengan syarat dan ketentuan yang berlaku serta koin yang didapat bisa ditukarkan dengan tiket/voucher maupun media iklan kami.
                </p>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="icon-box style8">
                <div class="ikon">
                    <img src="<?= base_url() ?>marketplace/images/jangkauan_luas.png">
                </div>
                <h4 class="box-title">Jangkauan Luas</h4>
                <p class="description2">
                    Lokasi kami menjangkau berbagai titik strategis di Indonesia dan akan terus berkembang ke daerah yang lebih luas serta lokasi berpusat di kota-kota besar.
                </p>
            </div>
        </div>
    </div>
</div>