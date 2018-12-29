<style>
    .contact-box p {
        text-align: justify;
    }

    .required {
        color: red;
        font-size: 14px;
    }

    .keterangan {
        color: red;
        font-size: 14px;
        font-style: italic;
    }

    #leftCount {
        color: red;
    }

    .description span {
        font-style: italic;
    }

    /*******************************************/

.tab-container.full-width-style.arrow-left ul.tabs li {
    margin-bottom: 4px;
}

.tab-container.full-width-style ul.tabs li {
    float: none;
    margin: 0;
    padding-right: 0;

}
.tab-container.style1 ul.tabs li {
    padding-right: 10px;
}
.tab-container ul.tabs.full-width li {
    float: none;
    *display: table-cell;
    display: inline-block;
    *vertical-align: middle;
    width: 20%;
}
.tab-container ul.tabs li {
    float: left;
    padding-right: 4px;
}
.tab-container.style1 ul.tabs.full-width li a {
    padding: 0;
    *text-transform: uppercase;
}
.tab-container.style1 ul.tabs li.active > a, .tab-container.style1 ul.tabs li:hover > a {
    *color: #fff;
    *background: #01b7f2;
    color: #01b7f2;
    font-size: 14px !important;
    background: #fff;
    border-left: none !important;
    position: relative;
    border-bottom: 3px solid #01b7f2;
}
.tab-container.style1 ul.tabs li a {
    height: 30px;
    line-height: 30px;
    *background: #f5f5f5;
    background: #fff;
    padding: 0 18px;
    color: #9e9e9e;
    font-weight: normal;
    *font-size: 0.9167em;
    font-size: 12px;
    font-weight: bold;
}
.tab-container ul.tabs.full-width li a {
    padding: 0;
    text-align: center;
}
.tab-container ul.tabs li.active > a, .tab-container ul.tabs li:hover > a {
    color: #01b7f2;
    background: #fff;
    height: 40px;
}
.tab-container ul.tabs li a {
    color: #fff;
    display: block;
    padding: 0 20px;
    background: #d9d9d9;
    font-size: 1em;
    font-weight: bold;
    height: 40px;
    line-height: 40px;
    text-decoration: none;
    text-transform: uppercase;
    white-space: nowrap;
}

.tab-container.style1 ul.tabs li.active > a:after, .tab-container.style1 ul.tabs li:hover > a:after {
    position: absolute;
    bottom: -5px;
    left: 50%;
    margin-left: -10px;
    border-top: 5px solid #01b7f2 !important;
    *border-left: 7px solid transparent;
    *border-right: 7px solid transparent;
    content: "";
    border-left: none !important;
    border-right: none !important;
}

.tab-container.style1 ul.tabs {
    padding: 10px 0 0 0;
}

.tab-container ul.tabs.full-width {
    margin-bottom: -4px;
}

ul#list-trans li {
	font-size: 14px;
	font-weight: 700;
}

.jml_voucher {
    position: relative;
    width: 60px;
    left: 10px;
    *top: -70px;
    padding: 3px 6px;
    background: #ff6000;
    border-radius: 50%;
    color: #fff;
    font-size: 11px;
    font-weight: bold;
    line-height: 20px;
    text-align: center;
}

.tab-container .tab-content .tab-pane .image-box .details {
    padding-right: 15px;
}

.detail-info {
	padding-top: 20px; 
}

.ico {
	display: inline-block;
	width: 20px !important;
}

.ico img {
	width: 15px;
}

.jml-poin, .berlaku {
	color: #ff6000;
	font-size: 14px;
	font-weight: bold;
}

.berlaku {
    display: block;
}


</style>

<div class="tab-pane fade in active">  
    <h2>TokoPoints</h2>
    <!-- alert -->
        <?php 
        if (isset($flash)) {
            echo $flash;
        }
        ?>
    <h5 class="skin-color"><?= $headline ?></h5>

    <div class="col-md-8"></div>
    <div class="col-md-4"></div>

	<div class="tab-container style1" style="border: 1px solid #f5f5f5;">
        <ul class="tabs full-width" id="list-trans" style="border: 1px solid #f5f5f5;">
            <li class="active"><a href="#penukaran-point" data-toggle="tab">Penukaran Point</a></li>
            <li><a href="#voucher-milik-saya" data-toggle="tab">Voucher Milik Saya <span class="jml_voucher"><?= $count_own_voucher ?></span></a></li>
            <li><a href="#riwayat" data-toggle="tab">Riwayat</a></li>
        </ul>
        <div class="tab-content" style="border: 1px solid #f5f5f5; width: 100%;">
            <div class="tab-pane fade in active" id="penukaran-point">

                 <div class="block">
			        <div class="flexslider photo-gallery style3">
			            <ul class="slides">
                            <?php
                            if (isset($slide)) {
                                if ($slide->num_rows() > 0) {
                                    foreach ($slide->result() as $row) {
                                        $img_slide = $row->featured_image;
                                        $path_slide = base_url().'marketplace/voucher/'.$img_slide;
                            ?>
			                <li><img src="<?php echo ($img_slide == '') ? 'http://placehold.it/1170x342' : $path_slide ?>" alt=""></li>
			               
                            <?php } } } ?>
			            </ul>
			        </div>
			    </div>

			    <div class="row image-box hotel listing-style1">
			    	<?php 
			    	foreach ($vouchers->result() as $row) {
			    		$gambar = $row->featured_image;
			    		$path = base_url().'marketplace/voucher/'.$gambar;
			    		$point_use = $row->point_use;
			    		$title = $row->voucher_title;
			    		$url = $row->voucher_slug;
			    		$tukar_act = base_url().'store_voucher/view/'.$url;
			    	
			    	?>
                    <div class="col-sm-6 col-md-4">
                        <article class="box" style="border: 1px solid #f5f5f5; box-shadow: 0 1px 1px 0 rgba(80,106,172,0.1);">
                            <figure>
                                <a href="<?= $tukar_act ?>" class="">
                                    <div style="width: 278px; height: 160px; background-size: 500px 100px; background: url('<?php echo ($gambar == '') ? 'http://placehold.it/270x160' : $path ?>') center center;"></div>
                                    <!-- <img width="270" height="160" alt="" src="<?php echo ($gambar == '') ? 'http://placehold.it/270x160' : $path ?>"> -->
                                </a>
                            </figure>
                            <div class="details">
                                
                                <h4 class="box-title"><?= $title ?></h4>
                                <div class="row detail-info">
	                                <div class="col-md-6">
	                                	<div class="point_use">
		                                    <div class="ico"><img src="<?= base_url().'marketplace/images/002-coin.png' ?>"> </div> 
		                                    <span class="jml-poin"><?= $point_use ?> Points</span>
		                                </div>
	                                </div>
	                                <div class="col-md-6">
	                                	<div class="action2 pull-right">
		                                    <a class="button btn-small yellow" href="<?= $tukar_act ?>">TUKAR</a>
		                                </div>
	                                </div>
 								</div>

                            </div>
                        </article>
                    </div>
                    <?php } ?>	
                    
                   

                </div>

            </div>
            <div class="tab-pane fade" id="voucher-milik-saya">
                
                <div class="row image-box hotel listing-style1">
                    <?php 
                    $this->load->module('timedate');
                    foreach ($my_own_voucher->result() as $row) {
                        $id = $row->id;
                        // get data voucher
                        $voucher = $this->db->where('id', $id)->get('voucher')->row();
                        $gambar = $voucher->featured_image;
                        $path = base_url().'marketplace/voucher/'.$gambar;
                        $title = $voucher->voucher_title;
                        $url = $voucher->voucher_slug;
                        $start = $voucher->start;
                        $end = $voucher->end;
                        $berlaku = $this->timedate->get_nice_date($end, 'indon2');                    
                    ?>
                    <div class="col-sm-6 col-md-4">
                        <article class="box" style="border: 1px solid #f5f5f5; box-shadow: 0 1px 1px 0 rgba(80,106,172,0.1);">
                            <figure>
                                <a href="<?= $tukar_act ?>" class="">
                                    <div style="width: 278px; height: 160px; background-size: 500px 100px; background: url('<?php echo ($gambar == '') ? 'http://placehold.it/270x160' : $path ?>') center center;"></div>
                                    <!-- <img width="270" height="160" alt="" src="<?php echo ($gambar == '') ? 'http://placehold.it/270x160' : $path ?>"> -->
                                </a>
                            </figure>
                            <div class="details">
                                
                                <h4 class="box-title"><?= $title ?></h4>
                                <div class="row detail-info">
                                    <div class="col-md-12">
                                        <div class="point_use">
                                            <span class="berlaku"><i class="soap-icon-clock"></i> Berlaku hingga</span>
                                            <span><?= $berlaku ?></span>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </article>
                    </div>
                    <?php } ?>  
                    
                </div>

            </div>
            <div class="tab-pane fade" id="riwayat">
                riwayat
            </div>
         
        </div>
    </div>
    



</div>

