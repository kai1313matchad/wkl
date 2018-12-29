
<?php
$img_50 = ($limapuluh != '') ? base_url().'marketplace/limapuluh/900x500/'.$limapuluh : '';
$img_100 = ($seratus != '') ? base_url().'marketplace/seratus/900x500/'.$seratus : '';
$img_200 = ($duaratus != '') ? base_url().'marketplace/duaratus/900x500/'.$duaratus : '';
$path_vid = base_url().'marketplace/video/'.$video;

$img_50_70x70 = base_url().'marketplace/limapuluh/70x70/'.$limapuluh;
$img_100_70x70 = base_url().'marketplace/seratus/70x70/'.$seratus;
$img_200_70x70 = base_url().'marketplace/duaratus/70x70/'.$duaratus;

$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;

$login_location = base_url().'youraccount/login';

?>

<style type="text/css">
    #map {
        height: 400px;
        width: 100%;
    }
    #street-view {
        height: 100%;
    }
    #hotel-amenities .intro.table-wrapper {
        padding: 0;
        border-spacing: 15px;
        border-collapse: separate;
        table-layout: fixed;
    }
    #hotel-amenities .intro {
        background: #f5f5f5;
    }

    #hotel-amenities .maps, #hotel-amenities .sell_points {
        background: #fff;
        padding: 25px;
    }

    .fasilitas ul {
        margin-left: 2em;
    }
    .fasilitas ul li{
        display: inline-block;
        color: #9e9e9e;
        margin-right: 2em; 
    }

    .fasilitas ul li img.ico-fasilitas {
        width: 3em;
    }

    article.fasilitas ul li {
        float: left;
        text-align: center;
        padding: 0 10px;
        cursor: default;
        font-size: 0.6333em;
    }
    .view ul li a{
        margin-right: 1em;
    }
    .img-with-text {
        text-align: justify;
        width: [width of img];
    }

    .img-with-text img {
        display: block;
        margin: 0 auto;
    }

    .box-title {
        line-height: 1.3em;
    }

    .detailed-logo figure {
        background: transparent;
        text-align: center;
        padding: 0;
    }

    #kudu_login {
        font-size: 11px;
        color: #333;
    }
    #kudu_login a {
        color: #98ce44; 
        font-weight: bold;
    }

    .contact-box p {
        text-align: justify;
    }

    .list-point > span {
        position: absolute;
        right: 0;
    }

    .icon-box.style2.likes {
        margin-left: 10px;
    }

    .detail-review {

    }

    .review-form {
        min-height: 300px;
    }

   .rating2 {
        unicode-bidi: bidi-override;
        direction: rtl;
        width: 15em;
    }

    .rating2 input {
        position: absolute;
        left: -999999px;
    }

    .rating2 label {
        display: inline-block;
        font-size: 0;
    }

    .rating2 > label:before {
        position: relative;
        font: 24px/1 FontAwesome;
        display: block;
        content: "\f005";
        color: #ccc;
        background: -webkit-linear-gradient(-45deg, #d9d9d9 0%, #b3b3b3 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .rating2 > label:hover:before,
    .rating2 > label:hover ~ label:before,
    .rating2 > label.selected:before,
    .rating2 > label.selected ~ label:before {
        color: #f0ad4e;
        background: -webkit-linear-gradient(-45deg, #fcb551 0%, #d69a45 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

</style>

<?php 
    echo Modules::run('templates/_draw_breadcrumbs', $breadcrumbs_data);
?>

<?php
    $url = $this->uri->segment(3);
    $color = ($cat_stat == 2) ? 'red' : 'green';
?>

<?= '' //Modules::run('manage_product/_get_end_tayang', $url) ?>

	<div class="row">

        <div id="main" class="col-md-9">
            
            <div class="tab-container style1" id="hotel-main-content">
                <ul class="tabs">
                    <li class="active"><a data-toggle="tab" href="#photos-tab">photos</a></li>
                    <li><a data-toggle="tab" href="#map-tab">map</a></li>
                    <li><a data-toggle="tab" href="#steet-view-tab">street view</a></li>
                    <li><a data-toggle="tab" href="#video-tab">video</a></li>
                    <li class="pull-right">
                        <a class="button btn-small <?= $color ?>-bg white-color" href="#"><?= $tipe_ketersediaan ?></a>
                        
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="photos-tab" class="tab-pane fade in active">
                        <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                            <ul class="slides">
                                <?php if ($img_50 != '') { ?>
                                    <li><img src="<?= $img_50 ?>" alt="" /></li>
                                <?php } ?>
                                <?php if ($img_100 != '') { ?>
                                    <li><img src="<?= $img_100 ?>" alt="" /></li>
                                <?php } ?>
                                <?php if ($img_200 != '') { ?>    
                                    <li><img src="<?= $img_200 ?>" alt="" /></li>
                                <?php } ?>    
                            </ul>
                        </div>
                        <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                            <ul class="slides">
                                <?php if ($img_50 != '') { ?>
                                    <li><img src="<?= $img_50_70x70 ?>" alt="" /></li>
                                <?php } ?>    
                                <?php if ($img_100 != '') { ?>
                                    <li><img src="<?= $img_100_70x70 ?>" alt="" /></li>
                                <?php } ?>
                                <?php if ($img_200 != '') { ?> 
                                    <li><img src="<?= $img_200_70x70 ?>" alt="" /></li>
                                <?php } ?>    
                            </ul>
                        </div>
                    </div>
                    <div id="map-tab" class="tab-pane fade">
                        <!-- <div id="map"></div> -->
                    </div>
                    <div id="steet-view-tab" class="tab-pane fade" style="height: 500px;">
                        <!-- <div id="street-view"></div> -->
                    </div>
                    <div id="video-tab" class="tab-pane fade">
                        <?php
                        if ($video != "") { 
                        ?>
                        <video id="video1" class="video-js vjs-default-skin" width="480" height="320" poster="http://www.tutorial-webdesign.com/wp-content/themes/nurumah/img/logo-bg.png" data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
                            <source src="<?= $path_vid ?>" type="video/x-flv">
                            <source src="<?= $path_vid ?>" type='video/mp4'>
                        </video>
                        <?php
                        } 
                        ?>
                            
                    </div>
                </div>
            </div>
            
            <div id="hotel-features" class="tab-container">
                <ul class="tabs">
                    <li class="active"><a href="#hotel-description" data-toggle="tab">Deskripsi</a></li>
                    <li><a href="#hotel-availability" data-toggle="tab">Media Iklan Lain</a></li>
                    <li><a href="#hotel-amenities" data-toggle="tab">Tempat Strategis Terdekat</a></li>
                    <li><a href="#hotel-reviews" data-toggle="tab">Ulasan (<?= $jml_ulasan ?>)</a></li>
                    <?php 
                    if ($cat_type != 4) {
                    ?>
                    <li><a href="#history-materi" data-toggle="tab">History Iklan (<?= $jml_history ?>)</a></li>
                    <?php } ?>
                    <!-- <li><a href="#hotel-faqs" data-toggle="tab">FAQs</a></li>
                    <li><a href="#hotel-things-todo" data-toggle="tab">Things to Do</a></li>
                    <li><a href="#hotel-write-review" data-toggle="tab">Write a Review</a></li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="hotel-description">
                        <div class="intro table-wrapper full-width hidden-table-sms">
                            <div class="col-sm-5 col-lg-5 features table-cell">
                                <ul>
                                    <li><label>tipe ooh:</label><?= $tipe_kategori ?></li>
                                    <li><label>tipe jalan:</label><?= $tipe_jalan ?></li>
                                    <li><label>ukuran:</label><?= $tipe_ukuran ?> m</li>
                                    <li><label>pencahayaan:</label><?= $tipe_cahaya ?></li>
                                    <li><label>display:</label><?= $tipe_display ?></li>
                                    <li><label>jumlah sisi:</label><?= $jml_sisi ?></li>
                                    <li><label>keterangan:</label><?= $ket_lokasi ?></li>
                                </ul>
                            </div>
                            <div class="col-sm-7 col-lg-7 table-cell testimonials">
                                <div class="testimonial style1">
                                    
                                    <div class="fasilitas">
                                        <ul>
                                            <li>
                                                <div class="img-with-text">
                                                    <img src="<?= base_url() ?>marketplace/icon/icon-billboard.png" class="ico-fasilitas">
                                                    <p><?= $tipe_kategori ?></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img-with-text">
                                                    <img src="<?= base_url() ?>marketplace/icon/<?= ($cat_type == 1) ? 'icon-tipe-horizontal' : 'icon-tipe-vertical' ?>.png" class="ico-fasilitas">
                                                    <p><?= $tipe_display ?></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img-with-text">
                                                    <img src="<?= base_url() ?>marketplace/icon/icon-kelas.png" class="ico-fasilitas">
                                                    <p><?= $tipe_ukuran ?> m</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img-with-text">
                                                    <img src="<?= base_url() ?>marketplace/icon/icon-penerangan.png" class="ico-fasilitas">
                                                    <p><?= $tipe_cahaya ?></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="long-description">
                            <h2><?= $item_title ?></h2>
                            <span>url : <?= base_url().$shorten ?></span>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><i class="soap-icon-departure yellow-color"></i> <?= $kecamatan ?> - <?= ucwords(strtolower($kota)) ?> - <?= $provinsi ?></h4>
                                </div>
                                <div class="col-md-6">
                                    <span class="icon-box style2 likes pull-right"><i class="soap-icon-heart circle"></i><?= $jml_like ?></span>
                                    <span class="icon-box style2 pull-right"><i class="soap-icon-guideline circle"></i><?= $jml_viewer ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>ID : <strong>#<?= $prod_code ?></strong></h5>
                                </div>
                            </div>
                            <!--  -->
                            <div class="sharethis-inline-share-buttons"></div>
                            <br>
                            <p>
                                <?= $item_description ?>
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hotel-availability">

                        <?= Modules::run('manage_product/_draw_loc_same_own', $prod_id) ?>
                        
                    </div>
                    <div class="tab-pane fade" id="hotel-amenities">
                        <h2>Titik Terdekat</h2>
                        
                        <div class="intro table-wrapper full-width hidden-table-sms">
                            
                            <div class="col-sm-12 col-lg-12 table-cell sell_points">
                                    <?php foreach ($sell_points->result() as $row) { ?>
                                    
                                    <div class="col-md-6" style="padding: 10px;">
                                        <div class="" style="padding-right: 5px; ">
                                            <table>
                                                <tr style="border-bottom: 1px solid #ddd;">
                                                    <td width="300" style="line-height: 1.75em; color: #01b7f2; font-size: 1.1167em; display: inline-block;"><?= $row->desc ?></td>
                                                    <td width="" class="list-point"><?= $row->jarak ?></td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                    </div>
                                    <?php } ?>    
                            </div>
                        </div>
    
                    </div>
                   
                    <div class="tab-pane fade" id="hotel-reviews">
                        <div class="intro table-wrapper full-width hidden-table-sms">
                            <div class="rating table-cell col-sm-4">
                                <span class="score"><?= $jml_rate ?>/5</span>
                                <?php
                                    $rate = $jml_rate * 20;
                                ?>
                                <div class="five-stars-container"><div class="five-stars" style="width: <?= $rate ?>%;"></div></div>
                                <!-- <a href="#" class="goto-writereview-pane button green btn-small full-width" id="writeReview">WRITE A REVIEW</a> -->
                            </div>
                            <div class="table-cell col-sm-8">
                                <div class="detail-review" style="display: none;">

                                    <form class="review-form" id="inputReview">    
                                        <input type="hidden" name="user_id" id="userId" value="<?= $user ?>">
                                        <input type="hidden" name="prod_id" id="prodId" value="<?= $prod_code ?>">
                                        <div class="no-padding no-float">
                                            <div class="form-group">
                                                <div class="col-sms-12 col-sm-12">
                                                    <label>Headline</label>
                                                    <input type="text" class="input-text full-width" placeholder="" name="headline" id="headline" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sms-12 col-sm-12">
                                                    <label>Ulasan</label>
                                                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="ulasan" id="ulasan"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sms-12 col-sm-12">
                                                    <label>Rating</label>

                                                    <div class="rating2">
                                                      <label>
                                                        <input type="radio" name="rating" value="5" title="5 stars"> 5
                                                      </label>
                                                      <label>
                                                        <input type="radio" name="rating" value="4" title="4 stars"> 4
                                                      </label>
                                                      <label>
                                                        <input type="radio" name="rating" value="3" title="3 stars"> 3
                                                      </label>
                                                      <label>
                                                        <input type="radio" name="rating" value="2" title="2 stars"> 2
                                                      </label>
                                                      <label>
                                                        <input type="radio" name="rating" value="1" title="1 star"> 1
                                                      </label>
                                                    </div>

                                                </div>                        
                                            </div>
                                            <hr>
                                            <br><br>

                                            <div class="from-group">
                                                <div class="col-sms-12 col-sm-12">
                                                    
                                                    <button type="button" id="btnReview" class="load-more button green full-width btn-large fourty-space">SUBMIT</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <?= Modules::run('manage_product/_draw_prod_review', $prod_id) ?>

                    </div>
                    
                    <div class="tab-pane fade" id="history-materi">

                        <?= Modules::run('manage_product/_draw_history_materi', $prod_id) ?>
                    </div>
                </div>
            
            </div>
        </div>
        <div class="sidebar col-md-3">
            <!-- create add to cart -->
            <?= Modules::run('cart/_draw_add_to_cart', $update_id) ?>
           
            

             <?= Modules::run('templates/need_help') ?>

            <!-- <div class="travelo-box">
                <h4>Similar Listings</h4>
                <div class="image-box style14">
                    <article class="box">
                        <figure>
                            <a href="#"><img src="http://placehold.it/63x59" alt="" /></a>
                        </figure>
                        <div class="details">
                            <h5 class="box-title"><a href="#">Plaza Tour Eiffel</a></h5>
                            <label class="price-wrapper">
                                <span class="price-per-unit">$170</span>avg/night
                            </label>
                        </div>
                    </article>
                    
                </div>
            </div> -->
            
        </div>
    </div>
 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if (isset($flash)) :?>
    <script>
        swal("Alert!", "Anda sudah menambahkan lokasi tersebut ke keranjang!");
    </script>
<?php endif;?>    
<script>
   
    tjq('.rating2 input').change(function () {
        var $radio = tjq(this);
        tjq('.rating2 .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
    });

    tjq('a[href="#map-tab"]').on('shown.bs.tab', function (e) {
        var center = panorama.getPosition();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
    tjq('a[href="#steet-view-tab"]').on('shown.bs.tab', function (e) {
        fenway = panorama.getPosition();
        panoramaOptions.position = fenway;
        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
        map.setStreetView(panorama);
    });
    var map = null;
    var panorama = null;
    var fenway = new google.maps.LatLng(<?= $lat ?>, <?= $long ?>);
    var mapOptions = {
        center: fenway,
        zoom: 15
    };
    var panoramaOptions = {
        position: fenway,
        pov: {
            heading: 0,
            pitch: 10
        }
    };
    var marker = new google.maps.Marker({
        position: fenway,
        title: 'Hello World!'
      });
   
    function initialize() {
        tjq("#map-tab").height(tjq("#hotel-main-content").width() * 0.6);
        map = new google.maps.Map(document.getElementById('map-tab'), mapOptions);
        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
        map.setStreetView(panorama);
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);

</script>

<script>
    tjq(document).ready(function(){
        getDataProd(0);
 
        tjq("#load_more").click(function(e){
            e.preventDefault();
            var page = tjq(this).data('val');
            getDataProd(page);
 
        });
        //getcountry();
    });
 
    var getDataProd = function(page){
        tjq("#loader").show();
        tjq.ajax({
            url:"<?php echo base_url() ?>manage_product/create_loc_prod",
            type:'GET',
            data: {page:page, update_id:'<?= $prod_id ?>'}
        }).done(function(response){
            tjq("#post-data").append(response);
            tjq("#loader").hide();
            tjq('#load_more').data('val', (tjq('#load_more').data('val')+1));
            scroll();
        });
    };

    var scroll  = function(){
        tjq('html, body').animate({
            scrollTop: tjq('#load_more').offset().top
        }, 1000);
    };

</script>

<script>
    tjq(document).ready(function(){
        getReviewProd(0);
 
        tjq("#load_review").click(function(e){
            console.log('load more review');
            e.preventDefault();
            var page = tjq(this).data('val');
            getReviewProd(page);
 
        });
    });
 
    var getReviewProd = function(page){
        tjq("#loader").show();
        tjq.ajax({
            url:"<?php echo base_url() ?>manage_product/create_review_prod",
            type:'GET',
            data: {page:page, update_id:'<?= $prod_code ?>'}
        }).done(function(response){
            tjq("#post-review").append(response);
            tjq("#loader").hide();
            tjq('#load_review').data('val', (tjq('#load_review').data('val')+1));
            scroll();
        });
    };

    var scroll  = function(){
        tjq('html, body').animate({
            scrollTop: tjq('#load_review').offset().top
        }, 1000);
    };

</script>

<script>
    let userLog = '<?php echo $this->session->userdata('user_id') ?>';

    tjq("#writeReview").click(function() {
        if (userLog != '') {
            tjq(".detail-review").show();
        } else {
            alert("you must login first!");
        }
    });

    tjq("#btnReview").click(function() {
        let produk = tjq('#prodId').val();
        let user = tjq('#userId').val();
        let headline = tjq('#headline').val();
        let ulasan = tjq('#ulasan').val();
        let rating = tjq("input[name=rating]:checked").val();

        console.log(produk +' '+ user +' '+ headline +' '+ ulasan +' '+ rating);

        if (headline != '' && ulasan != '' && rating != '') {
            console.log('you must fill it');
        }

        tjq.ajax({
            url:"<?php echo base_url() ?>review/create_review",
            type:'POST',
            data: {produk:produk, user:user, headline:headline, ulasan:ulasan, rating:rating},
            datatype: 'json'
        }).done(function(response){
            console.log(response);
            tjq('#headline').val('');
            tjq('#ulasan').val('');
        });
    });

    // create meta tag
    var meta=document.createElement('meta');
    meta.name='viewport';

    meta.setAttribute('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0');

    document.getElementsByTagName('head')[0].appendChild(meta);
</script>