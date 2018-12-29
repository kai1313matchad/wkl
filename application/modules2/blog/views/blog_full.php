<?php 
    echo Modules::run('templates/_draw_breadcrumbs', $breadcrumbs_data);
?>
<div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="post">
                            <figure class="image-container">
                            	<?php
                            	$image_location = base_url().'marketplace/artikel/870x342/'.$featured_image;
                            	?>
                                <a href="#"><img src="<?= ($featured_image != '') ? $image_location : 'http://placehold.it/870x342' ?>" alt=""></a>
                            </figure>
                            <div class="details">
                                <h1 class="entry-title"><?= $title ?></h1>
                                <div class="sharethis-inline-share-buttons"></div>
                                <br>
                                <div class="post-content" style="text-align: justify;">
                                    <?= $body ?>
                                </div>
                                <div class="post-meta">
                                    <div class="entry-date">
                                        <label class="date"><?= $day ?></label>
                                        <label class="month"><?= $month ?></label><br>
                                        <label class="year"><?= $year ?></label>
                                    </div>
                                    <div class="entry-author fn">
                                        <i class="icon soap-icon-user"></i> Posted By:
                                        <a href="#" class="author">Admin</a>
                                    </div>
                                    <div class="entry-action">
                                       <!--  <a href="#" class="button entry-comment btn-small"><i class="soap-icon-comment"></i><span>30 Comments</span></a>
                                        <a href="#" class="button btn-small"><i class="soap-icon-wishlist"></i><span>22 Likes</span></a> -->
                                        <!-- <span class="entry-tags"><i class="soap-icon-features"></i><span><a href="#">Adventure</a>, <a href="#">Romance</a></span></span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="single-navigation block">
                                <div class="row">
                                	
                                    <div class="col-xs-6">
                                    	<?php if(isset($prev_data)) { ?>
                                    	<a rel="prev" href="<?= base_url() ?>blog/view/<?= $prev_data ?>" class="button btn-large prev green full-width"><i class="soap-icon-longarrow-left"></i><span>Artikel Sebelumnya</span></a>
                                    	<?php } ?>
                                    </div>
                                	
                                	
                                    <div class="col-xs-6">
                                    	<?php if(isset($next_data)) { ?>
                                    	<a rel="next" href="<?= base_url() ?>blog/view/<?= $next_data ?>" class="button btn-large next green full-width"><span>Artikel Selanjutnya</span><i class="soap-icon-longarrow-right"></i></a>
                                    	<?php } ?>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="about-author block">
                                <h2>Tentang Penulis</h2>
                                <div class="about-author-container">
                                    <div class="about-author-content">
                                        <div class="avatar">
                                            <img src="<?= base_url() ?>marketplace/images/logo_blog.jpg" width="96" height="96" alt="">
                                        </div>
                                        <div class="description" style="text-align: justify;">
                                            <h4><a href="#">PT. Wijaya Iklan Indonesia (Wiklan) | Situs Belanja Online Media Iklan Indoor dan Outdoor</a></h4>
                                            <p>Wiklan sebagai startup marketplace media promosi terlengkap dan terluas di Indonesia. Wiklan hadir dengan mengusung slogan "Cari, Bandingkan dan Sewa Media Promosi Dimana Saja Bisa" berfungsi mempertemukan dan menjawab kebutuhan anda sebagai Agensy/Klien dalam meningkatkan promosi penjualan. Wiklan menyediakan beragam kategori pilihan dari Pemilik Titik seluruh Indonesia media promosi yang dapat anda cari dalam memenuhi kebutuhan pemasangan iklan untuk meningkatkan profit bisnis Anda, mulai dari kebutuhan pencarian lokasi strategis media promosi outdoor seperti Billboard, Baliho, Videotron, Neonbox, Bando Jalan, JPO, Road Sign, Media Iklan Dibandara, Media Iklan Stadion, dan Pemasangan Iklan Media Indoor, dll.</p>
                                        </div>
                                    </div>
                                    <div class="about-author-meta clearfix">
                                        <ul class="social-icons">
                                
                                            <li class="facebook"><a title="" href="https://www.facebook.com/wiklanindonesia" data-toggle="tooltip" target="_blank" data-original-title="Facebook"><i class="soap-icon-facebook"></i></a></li>
                                            <li class="twitter"><a title="" href="https://twitter.com/wiklanindonesia" data-toggle="tooltip" target="_blank" data-original-title="Twitter"><i class="soap-icon-twitter"></i></a></li>
                                            <li class="instagram"><a title="" href="https://www.instagram.com/wiklanindonesia/" data-toggle="tooltip" target="_blank" data-original-title="Instagram"><i class="soap-icon-instagram"></i></a></li>
                                            <li class="linkedin"><a title="" href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" data-toggle="tooltip" target="_blank" data-original-title="Linkedin"><i class="soap-icon-linkedin"></i></a></li>
                            
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    

                    <!-- sidebar here -->
                    <div class="sidebar col-sm-4 col-md-3">
                    <?= Modules::run('blog/_draw_sidebar') ?>
                    </div>

                </div>