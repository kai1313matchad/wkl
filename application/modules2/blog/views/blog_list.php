<div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="page">
                            
                            <div class="post-content">
                                <div class="blog-infinite" id="post-data">

                                	<?php
                                	if (isset($query)) {
                                		foreach ($query->result() as $row) {
                                			$image_location = base_url().'marketplace/artikel/870x342/'.$row->featured_image;
                                			$view_blog = base_url()."blog/view/".$row->slug;
                                			$pic = $row->featured_image;
                                			$title = $row->title;
                                			$body = word_limiter($row->body, 58);
                                			$date = explode('-', date('Y-m-d', $row->created));
                                			$created = $date[0];
                                			$year = $date[0];
                                			$month = $date[1];
                                			$day = $date[2];

                                			switch ($month) {
                                				case '01':
                                					$bulan = 'JAN';
                                					break;
                                				case '02':
                                					$bulan = 'FEB';
                                					break;
                                				case '03':
                                					$bulan = 'MAR';
                                					break;
                                				case '04':
                                					$bulan = 'APR';
                                					break;
                                				case '05':
                                					$bulan = 'MEI';
                                					break;
                                				case '06':
                                					$bulan = 'JUN';
                                					break;
                                				case '07':
                                					$bulan = 'JUL';
                                					break;
                                				case '08':
                                					$bulan = 'AGU';
                                					break;	
                                				case '09':
                                					$bulan = 'SEP';
                                					break;
                                				case '10':
                                					$bulan = 'OKT';
                                					break;
                                				case '11':
                                					$bulan = 'NOP';
                                					break;							
                                				default:
                                					$bulan = 'DES';
                                					break;
                                			}
                                	?>	
                                    <div class="post">
                                        <div class="post-content-wrapper">
                                            <figure class="image-container">
                                                <a href="<?= $view_blog ?>" class="hover-effect2"><img src="<?= ($pic != '') ? $image_location : 'http://placehold.it/870x342' ?>" alt=""></a>
                                            </figure>
                                            <div class="details">
                                                <h2 class="entry-title"><a href="<?= $view_blog ?>"><?= $title ?></a></h2>
                                                <div class="excerpt-container">
                                                    <?= $body ?>
                                                </div>
                                                <div class="post-meta">
                                                    <div class="entry-date">
                                                        <label class="date"><?= $day ?></label>
                                                        <label class="month"><?= $bulan ?></label>
                                                        <br>
                                                        <label class="year"><?= $year ?></label>
                                                    </div>
                                                    <div class="entry-author fn">
                                                        <i class="icon soap-icon-user"></i> Ditulis Oleh:
                                                        <a href="#" class="author">Admin</a>
                                                    </div>
                                                    <div class="entry-action">
                                                        <!-- <a href="#" class="button entry-comment btn-small"><i class="soap-icon-comment"></i><span>30 Comments</span></a>
                                                        <a href="#" class="button btn-small"><i class="soap-icon-wishlist"></i><span>22 Likes</span></a> -->
                                                        <!-- <span class="entry-tags"><i class="soap-icon-features"></i><span><a href="#">Adventure</a>, <a href="#">Romance</a></span></span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } } ?>    
                                    
                                <!-- </div> -->   
                                <div class="pull-right">
                                    <?= $pagination ?>
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


