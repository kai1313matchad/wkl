<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;

$vendor_form_location = base_url().'vendor/add_vendor';
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

    @media only screen and (max-width: 400px) {
        .global-map-area {
            margin-top: 20px;
        }

        .imagebg-container {
            *width: 200px;
            display: none;
        }
    }

    .description span {
        font-style: italic;
    }


h2.testi {
    color: #333;
    text-align: center;
    text-transform: uppercase;
    font-family: "Roboto", sans-serif;
    font-weight: bold;
    position: relative;
    margin: 30px 0 60px;
}
h2.testi::after {
    content: "";
    width: 100px;
    position: absolute;
    margin: 0 auto;
    height: 3px;
    background: #8fbc54;
    left: 0;
    right: 0;
    bottom: -10px;
}
.col-center {
    margin: 0 auto;
    float: none !important;
}
.carousel {
    margin: 20px auto;
    padding: 0 70px;
    margin-bottom: 50px;
}
.carousel .item {
    color: #999;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    min-height: 290px;
}
.carousel .item .img-box {
    width: 135px;
    height: 135px;
    margin: 0 auto;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 50%;
}
.carousel .img-box img {
    width: 100%;
    height: 100%;
    display: block;
    border-radius: 50%;
}
.carousel .testimonial {
    padding: 30px 0 10px;
}
.carousel .overview {   
    font-style: italic;
}
.carousel .overview b {
    text-transform: uppercase;
    color: #7AA641;
}
.carousel .carousel-control {
    width: 40px;
    height: 40px;
    margin-top: -20px;
    top: 50%;
    background: none;
}
.carousel-control i {
    font-size: 68px;
    line-height: 42px;
    position: absolute;
    display: inline-block;
    color: rgba(0, 0, 0, 0.8);
    text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
}
.carousel .carousel-indicators {
    bottom: -40px;
}
.carousel-indicators li, .carousel-indicators li.active {
    width: 10px;
    height: 10px;
    margin: 1px 3px;
    border-radius: 50%;
}
.carousel-indicators li {   
    background: #999;
    border-color: transparent;
    box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
}
.carousel-indicators li.active {    
    background: #555;       
    box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
}
</style>

<!-- alert -->
	<div class="col-md-12">
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>
	</div>
		
<div class="row" style="margin-top: -10px;">
    <div class="row">
        <div class="row">
            <div class="row">
                <div class="row">
                    <div class="row">

                        <div class="banner2 imagebg-container" style="background-color: #ddd; height: 350px; background-image: url('<?= base_url() ?>marketplace/images/testimonials.png');">
                            <div class="container">
                                <!-- <h1 class="big-caption">Coverage for every step of <em><strong>your</strong></em> journey!</h1>
                                <h2 class="med-caption">We all know the unexpected can occur, even when you are travelling.</h2> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>  
        </div> 
    </div>  
</div>        

<br>
<br>            

<div id="main" class="col-sm-8 col-md-9">

        <div class="col-center m-auto">
            <h2 class="testi">Testimonials</h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $count = 0;
                    foreach ($testimoni->result() as $row) {
                        if ($count == 0) { ?>
                            <li data-target="#myCarousel" data-slide-to="<?= $count ?>" class="active"></li>
                    <?php } else { ?>
                        <li data-target="#myCarousel" data-slide-to="<?= $count ?>"></li>
                    <?php } $count++; } ?>
                   
                </ol>   
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <?php 
                    $count = 0;
                    foreach ($testimoni->result() as $testi) { 
                    ?>
                    <div class="item carousel-item <?= ($count == 0) ? 'active' : '' ?>">
                        <div class="img-box"><img src="<?= base_url() ?>marketplace/images/default_v3-usrnophoto1.png" alt=""></div>
                        <p class="testimonial"><?= $testi->testimoni ?></p>
                        <p class="overview"><b><?= $testi->nama ?></b>, <?= $testi->profil ?></p>
                    </div>
                    <?php
                    $count++;
                     } ?>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

    
    
    <!-- <div class="tab-container">
       
        <div class="tab-content">

            <div class="tab-pane fade in active">
               <h3>Kirim Testimoni</h3>
            	<?php
			    echo form_open_multipart('testimoni/submit_testimoni');
			    ?>
            		<input type="hidden" name="status" value="0">
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama Lengkap<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="nama" onkeydown="return alphaOnly(event);" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
		                </div>
		            </div>

		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Profesi</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="profil" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('profil'); ?></span>
		                </div>
		            </div>


		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Email<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="email" class="input-text full-width" name="email" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
		                </div>
		            </div>

		          
		          
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Testimoni<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" id="myText" class="input-text full-width" style="height: 100px;" name="testimoni"></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('testimoni'); ?></span>
		                </div>
                        <span id="leftCount">200</span> karakter tersisa
		            </div>

		           
		            <hr>

		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">SIMPAN TESTIMONI</button>
		                </div>
		            </div>
		            <span class="keterangan">* wajib diisi</span>
		        </form>

            </div>

        </div>
    
    </div> -->
</div>

<div class="sidebar col-sm-4 col-md-3">
     <?= Modules::run('templates/need_help') ?>
</div>
