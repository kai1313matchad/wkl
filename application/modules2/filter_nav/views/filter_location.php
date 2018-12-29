<?php
$path_prov_location = base_url().'marketplace/city_icon/370x160/';
?>			

			<div class="container">
                <div class="section">
                    <h2>Temukan Lokasi Strategis di seluruh Indonesia</h2>
                    <div class="flexslider2 image-carousel style2 row-2" data-animation="slide" data-item-width="370" data-item-margin="30">
                        <ul class="slides image-box style11">
                        	<!-- <?php
                        	foreach ($prov->result() as $row) {
                        		$city_icon = $path_prov_location.$row->big_pic;
                        	?>
                            <li>
                                <article class="box">
                                    <figure>
                                        <a title="" href="#"><img width="370" height="160" alt="" src="<?= $city_icon ?>"></a>
                                        <figcaption>
                                            <h3 class="caption-title"><?= $row->nama ?></h3>
                                            <span><i class="soap-icon-search yellow-color"></i> Lihat titik OOH</span>
                                        </figcaption>
                                    </figure>
                                </article>
                              
                           </li>
                            <?php } ?>  -->

                            <li>
						        <?php
						        $index = 0;
						        foreach ($prov->result() as $filter) {
						        	$city_icon = $path_prov_location.$filter->big_pic;	
                                    $filter_loc = base_url().'category/search/'.$filter->nama_url;
						        ?>
						            <article class="box">
	                                    <figure>
	                                        <a title="" href="<?= $filter_loc ?>"><img width="370" height="160" alt="" src="<?= $city_icon ?>"></a>
	                                        <figcaption>
	                                            <h3 class="caption-title"><?= $filter->nama ?></h3>
	                                            <span><i class="soap-icon-search yellow-color"></i> Lihat titik OOH</span>
	                                        </figcaption>
	                                    </figure>
	                                </article>
						            
						            <?php $index++;
						            if ($index % 2 == 0 && $index !=count($prov)) {
						                echo '</li><li>';
						            }
						        } ?>
						    </li> 


                        </ul>
                    </div>
                    
                </div>
            </div>