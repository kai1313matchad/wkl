<style type="text/css">
    .global-map-area.one {
        height: 730px;
    }

    .text-proses {
        position: relative;
        top: 200px;
    }

    .travelo-process {
        top: 200px;
    }

    p.hidden-xs {
        color: #fff !important;
    }
</style>


            <div class="global-map-area one section parallax" data-stellar-background-ratio="0.5">
                <div class="container description text-center">
                    
                    <div class="text-proses"><h1><b>Langkah mudah sewa lokasi iklan di WIKLAN</b></h1></div>
                    <div class="travelo-process">
                        
                        <img src="<?= base_url() ?>marketplace/images/alur_proses.png" alt="">
                        <div class="process first icon-box style12">
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="1">
                                <h2><b>1. Cek Ketersediaan</b></h2>
                                <p class="hidden-xs">Isi kolom pencarian, pilih lokasi dan bandingkan lokasi strategis yang sesuai dengan kebutuhan anda.</p>
                            </div>
                            <div class="icon-wrapper animated" data-animation-type="slideInLeft" data-animation-delay="0">
                                <!-- <div class="icon-box style7"><i>1</i></div> -->
                                <i class="soap-icon-availability circle"></i>
                            </div>
                        </div>
                        <div class="process second icon-box style12">
                            <div class="icon-wrapper animated" data-animation-type="slideInRight" data-animation-delay="1.5">
                                <i class="soap-icon-departure circle"></i>
                            </div>
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="2.5">
                                <h2><b>2. Penerbitan PO</b></h2>
                                <p class="hidden-xs">Pesan media iklan sesuai kebutuhan, kemudian transfer sesuai harga lokasi anda pesan berdasarkan durasi sewa.</p>
                            </div>
                        </div>
                        <div class="process third icon-box style12">
                            <div class="icon-wrapper animated" data-animation-type="slideInRight" data-animation-delay="2">
                                <i class="soap-icon-magazine circle"></i>
                            </div>
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="3">
                                <h2><b>3. Produksi &amp; Pemasangan</b></h2>
                                <p class="hidden-xs">Proses pembangunan kontruksi media iklan dan pemasangan materi ke media iklan.</p>
                            </div>
                        </div>
                        <div class="process forth icon-box style12">
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="4.5">
                                <h2><b>4. Pelaporan / BAPP</b></h2>
                                <p class="hidden-xs">Memberikan laporan reklame berdiri dan materi iklan terpasang secara real time.</p>
                            </div>
                            <div class="icon-wrapper animated" data-animation-type="slideInLeft" data-animation-delay="3.5">
                                <i class="soap-icon-stories circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?= Modules::run('filter_nav/_draw_filter_loc') ?>

			<?= Modules::run('manage_product/_draw_fav_product') ?>

            <div class="container">
                <div class="section">
            		<h2>Panduan dan Tips WIKLAN</h2>
                    <div class="row">
                        <div class="col-sms-6 col-sm-6 col-md-4">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Pendaftaran Akun</h4>
                                <p>Daftar akun untuk proses cari, pilih, sewa dan bandingkan harga lokasi sesuai kebutuhan anda serta dapatkan promo menarik dari WIKLAN, gratis dan terupdate.</p>
                            </div>
                        </div>
                        <div class="col-sms-6 col-sm-6 col-md-4">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Cara Pemesanan</h4>
                                <p>Cari lokasi yang masih ada label available atau promo kemudian pilih durasi sewa dan klik purchase setelah itu transfer biaya berdasarkan nominal yang tertera.</p>
                            </div>
                        </div>
                        
                        <div class="col-sms-6 col-sm-6 col-md-4">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Keamanan Pemesanan</h4>
                                <p>Pastikan akun anda daftarkan, username dan password tidak diketahui oleh orang lain serta data pelanggan akan dijamin aman di WIKLAN.</p>
                            </div>
                        </div>
                    </div>

                    <?php
                    require_once('our_clients.php');
                    ?>
            	</div>
            </div>

