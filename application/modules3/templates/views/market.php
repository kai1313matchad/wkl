<?php
$login_location = base_url().'youraccount/login';
$daftar_location = base_url().'youraccount/start';	
$logout_location = base_url().'youraccount/logout';
?>

<!-- main setting -->
<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_whatsapp = $this->db->get_where('settings' , array('type'=>'WA'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
$shop_logo = base_url().'marketplace/logo/'.$system_logo;
$homepage_bg = $this->db->get_where('settings' , array('type'=>'homepage_background'))->row()->description;
// for meta SEO
$meta_author = $this->db->get_where('settings' , array('type'=>'author'))->row()->description;
$meta_keyword = $this->db->get_where('settings' , array('type'=>'keyword'))->row()->description;
$meta_description = $this->db->get_where('settings' , array('type'=>'description'))->row()->description;

$cart_location = base_url('cart');
 
?>


<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title><?= $shop_name ?> | Advertising Indonesia</title>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="<?= (isset($seo_keywords)) ? $seo_keywords : $meta_keyword ?>" />
    <meta name="description" content="<?= (isset($seo_description)) ? $seo_description : $meta_description ?>">
    <meta name="author" content="<?= $meta_author ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/animate.min.css">
    
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>marketplace/components/revolution_slider/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>marketplace/components/revolution_slider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>marketplace/components/jquery.bxslider/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>marketplace/components/flexslider/flexslider.css" media="screen" />
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="<?php echo base_url();?>marketplace/css/style.css">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/custom.css">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/updates.css">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/responsive.css">

    <link href="<?php echo base_url(); ?>LandingPageFiles/img/ico_wiklan.ico" rel="icon">
    
    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>marketplace/css/ie.css" />
    <![endif]-->
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoUOdMzbYns5TcDrLZYMEuXhUGkV5QIoo&libraries=places"
        async defer></script>

    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery.noconflict.js"></script>

    <link href="<?=base_url('assets/videojs/video-js.css');?>" rel="stylesheet">
    <script src="<?=base_url('assets/videojs/video.js');?>"></script>

    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5ab86d681243c10013440bfb&product=inline-share-buttons"></script>

    <script type="text/javascript" src="<?php echo base_url();?>marketplace/tinymce/tinymce.min.js"></script>

    <style type="text/css">
        #filter_top {
            position: relative;
            top: 10px;
        }

        #search-box {
            position: relative;
            top: 10px;
        }

        #suggestions {
            *position:absolute;
            z-index:10000;
            *left:-1px;
        }

        #searchresults {
            background-color:#eee;
            position:absolute;
            *width:100%;
            width: 250px;
            margin-top:1px;
            *left: 1005px;
            z-index:10001;
        }

        #searchresults .search-odd,#searchresults .search-even {
            margin-top:1px;
            margin-bottom:1px;
        }

        #searchresults .search-even {
            background-color:rgba(255,255,255,0.5);
        }

        #searchresults a small {
            display:block;
            line-height:1.2em;
            color:#777;
            font-weight: normal;
        }

        #searchresults a {
            display:block;
            text-decoration:none;
            padding:5px;
            font-weight: bold;
        }

        #search-box .img-search {
            position: absolute;
            right: 10px;
            top: 6px;
            cursor: pointer;
            background-color: transparent;
            z-index: 1;
        }

        .img-search i {
            font-size: 20px;
            *padding: 10px;
        }
            
        .homepage {
            padding-top: 0 !important;
        }

        ul.menu a, #footer a {
            color: #eee;
        }

        .footer-newsletter input[type="email"] {
            border: 0;
            padding: 6px 8px;
            width: 65% !important;
        }

        .footer-newsletter input[type="submit"] {
            background: #19abce;
            border: 0;
            width: 31% !important;
            padding: 6px 0;
            text-align: center;
            color: #fff;
            transition: 0.3s;
            cursor: pointer;
            margin-left: -2px;
            margin-top: -2px;
        }

        .jml_pesan {
            position: relative;
            width: 60px;
            left: 55px;
            top: -70px;
            padding: 3px 6px;
            background: #ff6000;
            border-radius: 50%;
            color: #fff;
            font-size: 11px;
            font-weight: bold;
            line-height: 20px;
            text-align: center;
        }

        .cart num {
            position: relative;
            color: white;
            left: -9px;
            top: -8px;
            padding: 3px 6px;
            border-radius: 50%;
            
            font-size: 11px;
            background-color: #98ce44;
        }

       /* form#subscribeForm {
            *display: block;
        }*/

        .keranjang i {
            font-size: 30px;
        }

        .keranjang i:hover{
            color: #ff6000;
        }

        li a .keranjang:hover {
            color: #ff6000
        }
    </style>

</head>
<body class="<?php
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);

if($segment1 == 'blog' && $segment2 == 'view') {
    echo 'single single-pos';
}
?>">
    
    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">
            <div class="topnav hidden-xs">
                <div class="container">
                    <!-- <ul class="quick-menu pull-left">
                        <li class="ribbon">
                            <a href="#">English</a>
                            <ul class="menu mini">
                               
                                <li class="active"><a href="#" title="English">English</a></li>
                                <li><a href="#" title="Español">Español</a></li>
                                
                               
                            </ul>
                        </li>
                    </ul> -->
                    <ul class="quick-menu pull-right">
                        <?php
                        if ($this->session->userdata('user_id') != '') : ?>
                            <li class="ribbon">
                                <a href="#">MY ACCOUNT</a>
                                <ul class="menu mini">
                                    <li><a href="<?= base_url().'store_profile' ?>" title="My Profil">My Profil</a></li>
                                    <li><a href="<?= $logout_location ?>" class="">LOGOUT</a></li>
                                </ul>
                            </li>
                        <?php else : ?>
                            <li><a href="<?= $login_location ?>" class="">LOGIN</a></li>
                            <li><a href="<?= $daftar_location ?>" class="">SIGNUP</a></li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
            
            <div class="main-header">
                
                <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
                    Mobile Menu Toggle
                </a>

                <div class="container">
                    <h1 class="logo2 navbar-brand">
                        <a href="<?php echo base_url(); ?>" title="Wiklan">
                            <img src="<?php echo base_url(); ?>assets/images/logo_wiklan.png" alt="Wiklan OOH marketplace" style="width: 110px;"/>
                        </a>
                    </h1>
                   
                    <nav id="main-menu" role="navigation">
                        <ul class="menu">
                            <li class="menu-item-has-children">
                                <a href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li class="menu-item-has-children <?= ($this->uri->segment(1) == 'owner') ? 'active' : '' ?>">
                                <a href="<?php echo base_url('owner'); ?>">Pemilik Titik</a>
                            </li>
                            <li class="menu-item-has-children <?= ($this->uri->segment(1) == 'agency') ? 'active' : '' ?>">
                                <a href="<?php echo base_url('agency'); ?>">Klien</a>
                            </li>
                            <li class="menu-item-has-children <?= ($this->uri->segment(1) == 'vendor') ? 'active' : '' ?>">
                                <a href="<?php echo base_url('vendor'); ?>">Vendor</a>
                            </li>
                            <li class="menu-item-has-children <?= ($this->uri->segment(1) == 'blog') ? 'active' : '' ?>">
                                <a href="<?php echo base_url('blog/list'); ?>">Blog</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="<?= $cart_location ?>">
                                    <div class="keranjang cart">
                                        <i class="soap-icon-shopping-1"></i>
                                        <num>
                                            <?php
                                            if ($this->session->userdata('user_id')) {
                                                echo Modules::run('store_basket/get_count_cart',$this->session->userdata('user_id'));
                                            } else {
                                                echo 0;
                                            } 
                                            ?>
                                                
                                        </num>
                                    </div>    
                                </a>
                            </li>
                            <li>
                                <?php require_once('auto_suggestion.php') ?>
                            </li>

                        </ul>
                    </nav> 
                </div> 
                
                <!-- <nav id="mobile-menu-01" class="mobile-menu collapse">
                    <ul id="mobile-primary-menu" class="menu">
                        <li class="menu-item-has-children">
                            <a href="index.html">Home</a>
                            <ul>
                                <li><a href="index.html">Home Layout 1</a></li>
                                <li><a href="homepage2.html">Home Layout 2</a></li>
                                <li><a href="homepage3.html">Home Layout 3</a></li>
                                <li><a href="homepage4.html">Home Layout 4</a></li>
                                <li><a href="homepage5.html">Home Layout 5</a></li>
                                <li><a href="homepage6.html">Home Layout 6</a></li>
                                <li><a href="homepage7.html">Home Layout 7</a></li>
                                <li><a href="homepage8.html">Home Layout 8</a></li>
                                <li><a href="homepage9.html">Home Layout 9</a></li>
                                <li><a href="homepage10.html">Home Layout 10</a></li>
                                <li><a href="homepage11.html">Home Layout 11</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="hotel-index.html">Hotels</a>
                            <ul>
                                <li><a href="hotel-index.html">Home Hotels</a></li>
                                <li><a href="hotel-list-view.html">List View</a></li>
                                <li><a href="hotel-grid-view.html">Grid View</a></li>
                                <li><a href="hotel-block-view.html">Block View</a></li>
                                <li><a href="hotel-detailed.html">Detailed</a></li>
                                <li><a href="hotel-booking.html">Booking</a></li>
                                <li><a href="hotel-thankyou.html">Thank You</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="flight-index.html">Flights</a>
                            <ul>
                                <li><a href="flight-index.html">Home Flights</a></li>
                                <li><a href="flight-list-view.html">List View</a></li>
                                <li><a href="flight-grid-view.html">Grid View</a></li>
                                <li><a href="flight-block-view.html">Block View</a></li>
                                <li><a href="flight-detailed.html">Detailed</a></li>
                                <li><a href="flight-booking.html">Booking</a></li>
                                <li><a href="flight-thankyou.html">Thank You</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="car-index.html">Cars</a>
                            <ul>
                                <li><a href="car-index.html">Home Cars</a></li>
                                <li><a href="car-list-view.html">List View</a></li>
                                <li><a href="car-grid-view.html">Grid View</a></li>
                                <li><a href="car-block-view.html">Block View</a></li>
                                <li><a href="car-detailed.html">Detailed</a></li>
                                <li><a href="car-booking.html">Booking</a></li>
                                <li><a href="car-thankyou.html">Thank You</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="cruise-index.html">Cruises</a>
                            <ul>
                                <li><a href="cruise-index.html">Home Cruises</a></li>
                                <li><a href="cruise-list-view.html">List View</a></li>
                                <li><a href="cruise-grid-view.html">Grid View</a></li>
                                <li><a href="cruise-block-view.html">Block View</a></li>
                                <li><a href="cruise-detailed.html">Detailed</a></li>
                                <li><a href="cruise-booking.html">Booking</a></li>
                                <li><a href="cruise-thankyou.html">Thank You</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul>
                                <li class="menu-item-has-children">
                                    <a href="#">Standard Pages</a>
                                    <ul>
                                        <li><a href="pages-aboutus1.html">About Us 1</a></li>
                                        <li><a href="pages-aboutus2.html">About Us 2</a></li>
                                        <li><a href="pages-services1.html">Services 1</a></li>
                                        <li><a href="pages-services2.html">Services 2</a></li>
                                        <li><a href="pages-photogallery-4column.html">Gallery 4 Column</a></li>
                                        <li><a href="pages-photogallery-3column.html">Gallery 3 Column</a></li>
                                        <li><a href="pages-photogallery-2column.html">Gallery 2 Column</a></li>
                                        <li><a href="pages-photogallery-fullview.html">Gallery Read</a></li>
                                        <li><a href="pages-blog-rightsidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="pages-blog-leftsidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="pages-blog-fullwidth.html">Blog Full Width</a></li>
                                        <li><a href="pages-blog-read.html">Blog Read</a></li>
                                        <li><a href="pages-faq1.html">Faq 1</a></li>
                                        <li><a href="pages-faq2.html">Faq 2</a></li>
                                        <li><a href="pages-layouts-leftsidebar.html">Layouts Left Sidebar</a></li>
                                        <li><a href="pages-layouts-rightsidebar.html">Layouts Right Sidebar</a></li>
                                        <li><a href="pages-layouts-twosidebar.html">Layouts Two Sidebar</a></li>
                                        <li><a href="pages-layouts-fullwidth.html">Layouts Full Width</a></li>
                                        <li><a href="pages-contactus1.html">Contact Us 1</a></li>
                                        <li><a href="pages-contactus2.html">Contact Us 2</a></li>
                                        <li><a href="pages-contactus3.html">Contact Us 3</a></li>
                                        <li><a href="pages-WIKLAN-policies.html">WIKLAN Policies</a></li>
                                        <li><a href="pages-sitemap.html">Site Map</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Extra Pages</a>
                                    <ul>
                                        <li><a href="extra-pages-holidays.html">Holidays</a></li>
                                        <li><a href="extra-pages-hotdeals.html">Hot Deals</a></li>
                                        <li><a href="extra-pages-before-you-fly.html">Before You Fly</a></li>
                                        <li><a href="extra-pages-inflight-experience.html">Inflight Experience</a></li>
                                        <li><a href="extra-pages-things-todo1.html">Things To Do 1</a></li>
                                        <li><a href="extra-pages-things-todo2.html">Things To Do 2</a></li>
                                        <li><a href="extra-pages-travel-essentials.html">Travel Essentials</a></li>
                                        <li><a href="extra-pages-travel-stories.html">Travel Stories</a></li>
                                        <li><a href="extra-pages-travel-guide.html">Travel Guide</a></li>
                                        <li><a href="extra-pages-travel-ideas.html">Travel Ideas</a></li>
                                        <li><a href="extra-pages-travel-insurance.html">Travel Insurance</a></li>
                                        <li><a href="extra-pages-group-booking.html">Group Bookings</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Special Pages</a>
                                    <ul>
                                        <li><a href="pages-404-1.html">404 Page 1</a></li>
                                        <li><a href="pages-404-2.html">404 Page 2</a></li>
                                        <li><a href="pages-404-3.html">404 Page 3</a></li>
                                        <li><a href="pages-coming-soon1.html">Coming Soon 1</a></li>
                                        <li><a href="pages-coming-soon2.html">Coming Soon 2</a></li>
                                        <li><a href="pages-coming-soon3.html">Coming Soon 3</a></li>
                                        <li><a href="pages-loading1.html">Loading Page 1</a></li>
                                        <li><a href="pages-loading2.html">Loading Page 2</a></li>
                                        <li><a href="pages-loading3.html">Loading Page 3</a></li>
                                        <li><a href="pages-login1.html">Login Page 1</a></li>
                                        <li><a href="pages-login2.html">Login Page 2</a></li>
                                        <li><a href="pages-login3.html">Login Page 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Shortcodes</a>
                            <ul>
                                <li><a href="shortcode-accordions-toggles.html">Accordions &amp; Toggles</a></li>
                                <li><a href="shortcode-tabs.html">Tabs</a></li>
                                <li><a href="shortcode-buttons.html">Buttons</a></li>
                                <li><a href="shortcode-icon-boxes.html">Icon Boxes</a></li>
                                <li><a href="shortcode-gallery-styles.html">Image &amp; Gallery Styles</a></li>
                                <li><a href="shortcode-image-box-styles.html">Image Box Styles</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Listing Styles</a>
                                    <ul>
                                        <li><a href="shortcode-listing-style1.html">Listing Style 01</a></li>
                                        <li><a href="shortcode-listing-style2.html">Listing Style 02</a></li>
                                        <li><a href="shortcode-listing-style3.html">Listing Style 03</a></li>
                                    </ul>
                                </li>
                                <li><a href="shortcode-dropdowns.html">Dropdowns</a></li>
                                <li><a href="shortcode-pricing-tables.html">Pricing Tables</a></li>
                                <li><a href="shortcode-testimonials.html">Testimonials</a></li>
                                <li><a href="shortcode-our-team.html">Our Team</a></li>
                                <li><a href="shortcode-gallery-popup.html">Gallery Popup</a></li>
                                <li><a href="shortcode-map-popup.html">Map Popup</a></li>
                                <li><a href="shortcode-style-changer.html">Style Changer</a></li>
                                <li><a href="shortcode-typography.html">Typography</a></li>
                                <li><a href="shortcode-animations.html">Animations</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Bonus</a>
                            <ul>
                                <li><a href="dashboard1.html">Dashboard 1</a></li>
                                <li><a href="dashboard2.html">Dashboard 2</a></li>
                                <li><a href="dashboard3.html">Dashboard 3</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">7 Footer Styles</a>
                                    <ul>
                                        <li><a href="#">Default Style</a></li>
                                        <li><a href="footer-style1.html">Footer Style 1</a></li>
                                        <li><a href="footer-style2.html">Footer Style 2</a></li>
                                        <li><a href="footer-style3.html">Footer Style 3</a></li>
                                        <li><a href="footer-style4.html">Footer Style 4</a></li>
                                        <li><a href="footer-style5.html">Footer Style 5</a></li>
                                        <li><a href="footer-style6.html">Footer Style 6</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">8 Header Styles</a>
                                    <ul>
                                        <li><a href="#">Default Style</a></li>
                                        <li><a href="header-style1.html">Header Style 1</a></li>
                                        <li><a href="header-style2.html">Header Style 2</a></li>
                                        <li><a href="header-style3.html">Header Style 3</a></li>
                                        <li><a href="header-style4.html">Header Style 4</a></li>
                                        <li><a href="header-style5.html">Header Style 5</a></li>
                                        <li><a href="header-style6.html">Header Style 6</a></li>
                                        <li><a href="header-style7.html">Header Style 7</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">7 Inner Start Styles</a>
                                    <ul>
                                        <li><a href="#">Default Style</a></li>
                                        <li><a href="inner-starts-style1.html">Inner Start Style 1</a></li>
                                        <li><a href="inner-starts-style2.html">Inner Start Style 2</a></li>
                                        <li><a href="inner-starts-style3.html">Inner Start Style 3</a></li>
                                        <li><a href="inner-starts-style4.html">Inner Start Style 4</a></li>
                                        <li><a href="inner-starts-style5.html">Inner Start Style 5</a></li>
                                        <li><a href="inner-starts-style6.html">Inner Start Style 6</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">3 Search Styles</a>
                                    <ul>
                                        <li><a href="search-style1.html">Search Style 1</a></li>
                                        <li><a href="search-style2.html">Search Style 2</a></li>
                                        <li><a href="search-style3.html">Search Style 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                    <ul class="mobile-topnav container">
                        <li><a href="#">MY ACCOUNT</a></li>
                        <li class="ribbon language menu-color-skin">
                            <a href="#" data-toggle="collapse">ENGLISH</a>
                            <ul class="menu mini">
                                <li><a href="#" title="Dansk">Dansk</a></li>
                                <li><a href="#" title="Deutsch">Deutsch</a></li>
                                <li class="active"><a href="#" title="English">English</a></li>
                                <li><a href="#" title="Español">Español</a></li>
                                <li><a href="#" title="Français">Français</a></li>
                                <li><a href="#" title="Italiano">Italiano</a></li>
                                <li><a href="#" title="Magyar">Magyar</a></li>
                                <li><a href="#" title="Nederlands">Nederlands</a></li>
                                <li><a href="#" title="Norsk">Norsk</a></li>
                                <li><a href="#" title="Polski">Polski</a></li>
                                <li><a href="#" title="Português">Português</a></li>
                                <li><a href="#" title="Suomi">Suomi</a></li>
                                <li><a href="#" title="Svenska">Svenska</a></li>
                            </ul>
                        </li>
                        <li><a href="#WIKLAN-login" class="soap-popupbox">LOGIN</a></li>
                        <li><a href="#WIKLAN-signup" class="soap-popupbox">SIGNUP</a></li>
                        <li class="ribbon currency menu-color-skin">
                            <a href="#">USD</a>
                            <ul class="menu mini">
                                <li><a href="#" title="AUD">AUD</a></li>
                                <li><a href="#" title="BRL">BRL</a></li>
                                <li class="active"><a href="#" title="USD">USD</a></li>
                                <li><a href="#" title="CAD">CAD</a></li>
                                <li><a href="#" title="CHF">CHF</a></li>
                                <li><a href="#" title="CNY">CNY</a></li>
                                <li><a href="#" title="CZK">CZK</a></li>
                                <li><a href="#" title="DKK">DKK</a></li>
                                <li><a href="#" title="EUR">EUR</a></li>
                                <li><a href="#" title="GBP">GBP</a></li>
                                <li><a href="#" title="HKD">HKD</a></li>
                                <li><a href="#" title="HUF">HUF</a></li>
                                <li><a href="#" title="IDR">IDR</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                </nav> -->
            </div> 
            <!-- <div id="WIKLAN-signup" class="WIKLAN-signup-box WIKLAN-box">
                <div class="login-social">
                    <a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>
                    <a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>
                </div>
                <div class="seperator"><label>OR</label></div>
                <div class="simple-signup">
                    <div class="text-center signup-email-section">
                        <a href="#" class="signup-email"><i class="soap-icon-letter"></i>Sign up with Email</a>
                    </div>
                    <p class="description">By signing up, I agree to WIKLAN's Terms of Service, Privacy Policy, Guest Refund olicy, and Host Guarantee Terms.</p>
                </div>
                <div class="email-signup">
                    <form>
                        <div class="form-group">
                            <input type="text" class="input-text full-width" placeholder="first name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="input-text full-width" placeholder="last name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="input-text full-width" placeholder="email address">
                        </div>
                        <div class="form-group">
                            <input type="password" class="input-text full-width" placeholder="password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="input-text full-width" placeholder="confirm password">
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Tell me about WIKLAN news
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="description">By signing up, I agree to WIKLAN's Terms of Service, Privacy Policy, Guest Refund Policy, and Host Guarantee Terms.</p>
                        </div>
                        <button type="submit" class="full-width btn-medium">SIGNUP</button>
                    </form>
                </div>
                <div class="seperator"></div>
                <p>Already a WIKLAN member? <a href="#WIKLAN-login" class="goto-login soap-popupbox">Login</a></p>
            </div>
            <div id="WIKLAN-login" class="WIKLAN-login-box WIKLAN-box">
                <div class="login-social">
                    <a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>
                    <a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>
                </div>
                <div class="seperator"><label>OR</label></div>
                <form>
                    <div class="form-group">
                        <input type="text" class="input-text full-width" placeholder="email address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="input-text full-width" placeholder="password">
                    </div>
                    <div class="form-group">
                        <a href="#" class="forgot-password pull-right">Forgot password?</a>
                        <div class="checkbox checkbox-inline">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </form>
                <div class="seperator"></div>
                <p>Don't have an account? <a href="#WIKLAN-signup" class="goto-signup soap-popupbox">Sign up</a></p>
            </div> -->
        </header>

        

         <?php 
        if (isset($page_url)) {
            if ($page_url == "") {  
                require_once('slideshow.php');
            } elseif ($page_url == "detail_produk") {
                require_once('filter_top.php');
            }
        } else {
            require_once('filter_top.php');
        } ?>
        <section id="content" class="<?php 
                                    if (isset($page_url)) {
                                        echo ($page_url == "")? 'homepage' : 'gray-area';
                                    } else { echo 'gray-area'; }     
                                    ?>">

        <?php 
        if (isset($page_url)) {
            if ($page_url != "") {   
        ?>
            <div class="container">
                <div id="main">
        <?php } } else { ?>
            <div class="container">
                <div id="main">
        <?php } ?>            
                    <?php
                    

                    switch ($this->uri->segment(1)) {
                        case 'store_dashboard':
                            $res = true;    
                        break;

                        case 'store_profile':
                            $res = true;    
                        break;

                        case 'store_wishlist':
                            $res = true;    
                        break;

                        case 'store_product':
                            $res = true;    
                        break;

                        case 'store_inbox':
                            $res = true;    
                        break;

                        case 'campaign':
                            $res = true;    
                        break;

                        case 'store_penilaian':
                            $res = true;    
                        break;

                        case 'store_vendor':
                            $res = true;    
                        break;

                        default:
                            $res = false;
                        break;
                    }

                    if ($customer_id > 0 && $res) {

                        $this->load->module('store_wishlist');
                        $this->load->module('store_product');
                        $this->load->module('enquiries');

                        $jml_wish = $this->store_wishlist->count_own_wishlist($customer_id);
                        $jml_prod = $this->store_product->count_own_product($customer_id);
                        $jml_mess = $this->enquiries->count_own_message($customer_id);
                    ?>
                    <div class="tab-container full-width-style arrow-left dashboard">
                        <ul class="tabs">
                            <li class="<?= ($this->uri->segment(1) == 'store_dashboard') ? 'active' : '' ?>"><a href="<?= base_url().'store_dashboard'?>"><i class="soap-icon-anchor circle"></i>Dashboard</a></li>
                            <li class="<?= ($this->uri->segment(1) == 'store_profile') ? 'active' : '' ?>"><a href="<?= base_url().'store_profile'?>"><i class="soap-icon-user circle"></i>Profile</a></li>
                            <li class="<?= ($this->uri->segment(1) == 'store_wishlist') ? 'active' : '' ?>">
                                <a href="<?= base_url().'store_wishlist'?>">
                                    <i class="soap-icon-wishlist circle"></i>Wishlist<br>
                                    <?php if ($jml_wish != 0) { ?>
                                    <span class="jml_pesan"><?= $jml_wish ?></span>
                                    <?php } ?>
                                </a>
                            </li>
                            <li class="<?= ($this->uri->segment(1) == 'store_product') ? 'active' : '' ?>">
                                <a href="<?= base_url().'store_product'?>">
                                    <i class="soap-icon-doc-plus circle"></i>Jual Media Iklan<br>
                                    <?php if ($jml_prod != 0) { ?>
                                    <span class="jml_pesan"><?= $jml_prod ?></span>
                                    <?php } ?>
                                </a>
                            </li>
                            <li class="<?= ($this->uri->segment(1) == 'campaign') ? 'active' : '' ?>"><a href="<?= base_url().'campaign'?>"><i class="soap-icon-shopping circle"></i>Transaksi</a></li>
                            <li class="<?= ($this->uri->segment(1) == 'store_inbox') ? 'active' : '' ?>">
                                <a href="<?= base_url().'store_inbox'?>">
                                    <i class="soap-icon-generalmessage circle"></i>Inbox<br>
                                    <?php if ($jml_mess != 0) { ?>
                                    <span class="jml_pesan" id="inbox"><?= $jml_mess ?></span>
                                    <?php } ?>
                                </a>    
                            </li>
                           <!--  <li class="<?= ($this->uri->segment(1) == 'store_penilaian') ? 'active' : '' ?>"><a href="<?= base_url().'store_penilaian'?>"><i class="soap-icon-star circle"></i>Penilaian</a></li> -->
                            <li class="<?= ($this->uri->segment(1) == 'store_vendor') ? 'active' : '' ?>"><a href="<?= base_url().'store_vendor'?>"><i class="soap-icon-insurance circle"></i>Vendor</a></li>
                    
                        </ul>
                        <div class="tab-content">
 
                    	<?php
            				if (isset($view_file)) {
            					$this->load->view($view_module.'/'.$view_file);
            				}
            			?>

                        </div>
                    </div>
                    <?php 
                    } else { 

                        if (isset($page_content)) {
                            echo nl2br($page_content);

                            // if (!isset($page_url)) {
                            //     $page_url = 'homepage';
                            // }

                            if ($page_url == "") {
                                require_once('homepage_content.php');
                            }    
                            // } elseif ($page_url == "contactus") {
                            //     echo Modules::run('contactus/_draw_form');
                            // }
                            
                        } elseif (isset($view_file)) {
                            $this->load->view($view_module.'/'.$view_file);
                        }

                        // if (isset($view_file)) {
                        //     $this->load->view($view_module.'/'.$view_file);
                        // }
                    }    
                    ?>

                    <?php
                    if (isset($page_url)) {
                        if ($page_url == "detail_produk") {
                            require_once('recommended_product.php');
                        }
                    }
                    ?>
        <?php
        if (isset($page_url)) {
            if ($page_url != "") {   
        ?>
                </div>
            </div> 
        <?php } } ?>   
                         
           
        </section>
        
        <footer id="footer">
            <div class="footer-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-9">
                            <div class="col-sm-6 col-md-3">
                                <h2>WIKLAN</h2>
                                <ul class="discover triangle hover row">
                                    <li class=""><a href="<?php echo base_url() ?>templates/home">Tentang Kami</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>blog/list">Blog</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>templates/home#clients">Partner</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>templates/home">Karir</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>templates/home">Kegiatan kami</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <h2>Klien</h2>
                                <ul class="discover triangle hover row">
                                    <!-- <li class=""><a href="#">Pesan di WIKLAN</a></li> -->
                                    <li class=""><a href="<?php echo base_url() ?>panduan/?p=cara-pendaftaran">Cara Pendaftran</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>panduan/?p=cara-pemesanan">Mendapatkan Penawaran</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>panduan/?p=cara-pembayaran">Cara Pembayaran</a></li> 
                                    <li class=""><a href="<?php echo base_url() ?>agency">Keuntungan</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>panduan/?p=negoisasi">Negoisasi</a></li>
                                    <!-- <li class=""><a href="<?php echo base_url() ?>panduan/?p=pengembalian-dana">Pengembalian Dana</a></li>-->

                                    <li class=""><a href="<?= base_url() ?>confirmation">Konfirmasi Pembayaran</a></li>
                                </ul>
                            </div>
                             <div class="col-sm-6 col-md-3">
                                <h2>Pemilik Titik</h2>
                                <ul class="discover triangle hover row">
                                    <!-- <li class=""><a href="#">Jual di WIKLAN</a></li> -->
                                    <li class=""><a href="<?php echo base_url() ?>panduan/?p=cara-berjualan">Cara Pendaftaran Titik</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>owner">Keuntungan</a></li>                        
                                    <li class=""><a href="<?php echo base_url() ?>panduan/?p=cara-berjualan">Terima Pembayaran</a></li>                                    
                                    <!--<li class=""><a href="<?php echo base_url() ?>panduan/?p=cara-beriklan">Beriklan / Promo</a></li>-->
                                    <!--<li class=""><a href="<?php echo base_url() ?>templates/home">Contact Center</a></li>-->
                                </ul>
                            </div>
                             <div class="col-sm-6 col-md-3">
                                <h2>Bantuan</h2>
                                <ul class="discover triangle hover row">
                                    <li class=""><a href="<?php echo base_url() ?>templates/syarat_dan_ketentuan">Syarat &amp; Ketentuan</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>templates/kebijakan_privasi" >Kebijakan Privasi</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>templates/home#contact">Hubungi Kami</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>panduan/?p=panduan-keamanan">Panduan Keamanan</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--  -->
                        <div class="col-sm-6 col-md-3 footer-newsletter">
                            <h2>Langganan Informasi</h2>
                            <p>Dapatkan Promo dan Artikel Menarik dari WIKLAN, Gratis dan Terupdate!</p>
                            <div class="icon-check2">
                                <div id="subscribeSuccess" style="display: none; color: #19abce;">success!</div>
                                <div id="subscribeError" style="display: none; color: red;">error!</div>
                                <form id="subscribeForm">
                                  <input type="email" class="input-text full-width" placeholder="Tulis email Anda.." name="email" id="email_subscribe">
                                  <input type="hidden" name="status" id="status" value="1">
                                  <input type="submit" name="submit" id="submit" value="Submit" style="height: 34px;">
                                </form>
                                
                            </div>
                            <br>
                            <!-- <h2>Kontak Pelayanan</h2> -->
                            <address class="contact-details">
                                <span class="contact-phone" style="font-size: 14px !important;"><i class="soap-icon-phone"></i> <?= $shop_phone ?></span>
                                <br>
                                <span class="contact-phone whatsapp" style="font-size: 14px !important;"><i class="soap-icon-conference"></i> <?= $shop_whatsapp ?></span>
                                <br>
                                <span class="contact-phone" style="font-size: 14px !important;"><i class="soap-icon-letter"></i> <a href="#" class="contact-email2"><?= $shop_email ?></a></span>
                            </address>
                            <ul class="social-icons clearfix">
                                
                                <li class="facebook"><a title="Facebook" href="https://www.facebook.com/wiklanindonesia" data-toggle="tooltip" target="_blank"><i class="soap-icon-facebook"></i></a></li>
                                <li class="twitter"><a title="Twitter" href="https://twitter.com/wiklanindonesia" data-toggle="tooltip" target="_blank"><i class="soap-icon-twitter"></i></a></li>
                                <li class="instagram"><a title="Instagram" href="https://www.instagram.com/wiklanindonesia/" data-toggle="tooltip" target="_blank"><i class="soap-icon-instagram"></i></a></li>
                                <li class="linkedin"><a title="Linkedin" href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" data-toggle="tooltip" target="_blank"><i class="soap-icon-linkedin"></i></a></li>
                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom gray-area">
                <div class="container">
                    <div class="logo pull-left">
                         <a href="<?php echo base_url(); ?>" title="Wiklan">
                            <img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png" alt="Wiklan OOH marketplace" style="width: 110px; z-index: 100"/>
                        </a>
                    </div>
                    <div class="pull-right">
                        <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
                    </div>
                    <div class="copyright pull-right">
                        <p>&copy; <?= date('Y') ?> WIKLAN</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery.noconflict.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/modernizr.2.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery-ui.1.10.4.min.js"></script>
    
    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/bootstrap.js"></script>
    
    <!-- load revolution slider scripts -->
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/components/revolution_slider/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/components/revolution_slider/js/jquery.themepunch.revolution.min.js"></script>
    
    <!-- load BXSlider scripts -->
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/components/jquery.bxslider/jquery.bxslider.min.js"></script>
    
    <!-- load FlexSlider scripts -->
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/components/flexslider/jquery.flexslider-min.js"></script>
    
    <!-- Google Map Api -->
    <!-- <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> -->
    
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/calendar.js"></script>
    
    <!-- parallax -->
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery.stellar.min.js"></script>
    
    <!-- waypoint -->
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/waypoints.min.js"></script>

    <!-- load page Javascript -->
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/theme-scripts.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/scripts.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/list.js"></script>
    <script>
        var monkeyList = new List('test-list', {
            valueNames: ['kota'],
            page: 6,
            pagination: true
        });

        var monkeyList2 = new List('legal-list', {
            valueNames: ['kota'],
            page: 6,
            pagination: true
        });

        var monkeyList3 = new List('wishlist-list', {
            valueNames: ['kota', 'provinsi'],
            page: 6,
            pagination: true
        });

        var monkeyList4 = new List('productMe-list', {
            valueNames: ['kota', 'provinsi'],
            page: 9,
            pagination: true
        });
    </script>

    <script src="<?php echo base_url();?>marketplace/js/ghost-typer.js"></script>
    <script>
        tjq("#ghost").ghosttyper({
            messages: ['Billboard', 'Baliho', 'JPO', 'JPU', 'Videotron', 'Road Sign'],
            timeWrite: 200,
            timeDelete: 250,
            timePause: 3000
        });
    </script>

     <script type="text/javascript">
        tjq(document).ready(function() {
            tjq("#profile .edit-profile-btn").click(function(e) {
                e.preventDefault();
                tjq(".view-profile").fadeOut();
                tjq(".edit-profile").fadeIn();
            });

            tjq("#daftar-produk .add-produk-btn").click(function(e) {
                e.preventDefault();
                tjq(".image-box").fadeOut();
                tjq(".add-produk").fadeIn();
            });

            setTimeout(function() {
                tjq(".notification-area").append('<div class="info-box block"><span class="close"></span><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ab quis a dolorem, placeat eos doloribus esse repellendus quasi libero illum dolore. Esse minima voluptas magni impedit, iusto, obcaecati dignissimos.</p></div>');
            }, 10000);
        });
        tjq('a[href="#profile"]').on('shown.bs.tab', function (e) {
            tjq(".view-profile").show();
            tjq(".edit-profile").hide();
        });

        tjq('a[href="#daftar-produk"]').on('shown.bs.tab', function (e) {
            tjq(".image-box").show();
            tjq(".add-produk").hide();
        });

        tjq('#provinsi').change(function(){
            tjq.post("<?php echo base_url();?>store_cities/get_city/"+tjq('#provinsi').val(),{},function(obj){
                tjq('#kota').html(obj);
            });
        });
       
        tjq('#kota').change(function(){
            tjq.post("<?php echo base_url();?>store_districs/get_distric/"+tjq('#kota').val(),{},function(obj){
                tjq('#kecamatan').html(obj);
            });
        });

        tjq('#province').change(function(){
            tjq.post("<?php echo base_url();?>store_cities/get_city/"+tjq('#province').val(),{},function(obj){
                tjq('#madina').html(obj);
            });
        });

        tjq('#wilayah').change(function(){
            tjq.post("<?php echo base_url();?>store_cities/get_city/"+tjq('#wilayah').val(),{},function(obj){
                tjq('#kuto').html(obj);
            });
        });


    </script>

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/geocomplete/map.css">
        
<script src="<?= base_url() ?>assets/geocomplete/geocomplete.js"></script>

<script>
      // tjq(function(){
      //   tjq("#geocomplete").geocomplete({
      //     map: ".map_canvas",
      //     details: "form ",
      //     markerOptions: {
      //       draggable: true
      //     }
      //   });

        
      //   tjq("#geocomplete").bind("geocode:dragged", function(event, latLng){
      //     tjq("input[name=lat]").val(latLng.lat());
      //     tjq("input[name=lng]").val(latLng.lng());
      //     tjq("#reset").show();
      //   });
        
        
      //   tjq("#reset").click(function(){
      //     tjq("#geocomplete").geocomplete("resetMarker");
      //     tjq("#reset").hide();
      //     return false;
      //   });
        
      //   tjq("#find").click(function(){
      //     tjq("#geocomplete").trigger("geocode");
      //   }).click();
      // });
</script>

<script>
    tjq(function () {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showLocation, showError,
                {
                    enableHighAccuracy: true,
                    timeout: 10000 // 10s
                    //maximumAge : 0
                }
            );
        }
        function showError(error) {
            var x = document.getElementById("alert");

            // switch (error.code) {
            //     case error.PERMISSION_DENIED:
            //         x.innerHTML = "User denied the request for Geolocation.";
            //         break;
            //     case error.POSITION_UNAVAILABLE:
            //         x.innerHTML = "Location information is unavailable.";
            //         break;
            //     case error.TIMEOUT:
            //         x.innerHTML = "The request to get user location timed out.";
            //         break;
            //     case error.UNKNOWN_ERROR:
            //         x.innerHTML = "An unknown error occurred.";
            //         break;
            // }
            tjq(x).show();

            tjq("#geocomplete").geocomplete({
                map: ".map_canvas",
                details: "form ",
                markerOptions: {
                    draggable: true
                }
            });

            tjq("#geocomplete").bind("geocode:dragged", function (event, latLng) {
                tjq("input[name=sr_lat]").val(latLng.lat());
                tjq("input[name=sr_lng]").val(latLng.lng());
                tjq("input[name=sr_address]").geocomplete("find", latLng.lat() + "," + latLng.lng()).val();
                tjq(this).geocomplete('marker')
                    .setOptions({position: latLng, map: tjq(this).geocomplete("map")});

                tjq("#reset,#sr_lat,#sr_lng").show();
            });

        }

        function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            tjq("input[name=sr_lat]").val(latitude);
            tjq("input[name=sr_lng]").val(longitude);
            getAddress(latitude, longitude);
            tjq("#geocomplete").geocomplete({
                map: ".map_canvas",
                details: "form ",
                location: [latitude, longitude],
                markerOptions: {
                    draggable: true
                }

            });

            tjq("#geocomplete").bind("geocode:dragged", function (event, latLng) {
                tjq("input[name=sr_lat]").val(latLng.lat());
                tjq("input[name=sr_lng]").val(latLng.lng());
                tjq("input[name=sr_address]").geocomplete("find", latLng.lat() + "," + latLng.lng()).val();
                tjq(this).geocomplete('marker')
                    .setOptions({position: latLng, map: tjq(this).geocomplete("map")});

                tjq("#reset,#sr_lat,#sr_lng").show();
            });
        }

        function getAddress(myLatitude, myLongitude) {

            var geocoder = new google.maps.Geocoder();                          // create a geocoder object
            var location = new google.maps.LatLng(myLatitude, myLongitude);     // turn coordinates into an object

            geocoder.geocode({'latLng': location}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {                      // if geocode success
                    var ad = results[0].formatted_address;
                    tjq("input[name=sr_address]").val(ad);                                    // write address to field
                } else {
                    alert("Geocode failure: " + status);                                // alert any other error(s)
                    return false;
                }
            });
        }

    });
</script>
<!-- autocomplete -->
<script>
tjq(document).ready(function() {
    tjq("#inputString").keyup(function() {
      var inpstr = tjq(this).val();
      if (inpstr.length > 3) {
          tjq.ajax({
              type: "post",
              url: "<?= base_url('store_product/live_search') ?>",
              data: {liveSearch:inpstr},
              cache: false,
              success: function (res) {
                  tjq("#suggestions").fadeIn();
                  tjq("#suggestions").html(res);
              }
          });
  
          tjq("input#inputString").blur(function () {
              tjq('#suggestions').fadeOut();
          });
      }
  });
});
/* Disable autocomplete */
var flag = 1;
   function disAutoComplete(obj){
        if(flag){
        obj.setAttribute("autocomplete","off");
            flag = 0;
      }
        obj.focus();
}
</script>
<script type="text/javascript">
    tjq(document).ready(function() {
        tjq('.revolution-slider').revolution(
        {
            dottedOverlay:"none",
            delay:9000,
            startwidth:1200,
            startheight:646,
            onHoverStop:"on",
            hideThumbs:10,
            fullWidth:"on",
            forceFullWidth:"on",
            navigationType:"none",
            shadow:0,
            spinner:"spinner4",
            hideTimerBar:"on",
        });
    });
</script>

<script type="text/javascript">
    tjq(".flexslider").flexslider({
        animation: "fade",
        controlNav: false,
        animationLoop: true,
        directionNav: false,
        slideshow: true,
        slideshowSpeed: 5000
    });
</script>

<script>
    tjq(document).ready(function() {
      tjq("#subscribeForm").submit(function(e) {
        e.preventDefault();
        subscribeInitiate();
        // console.log('ok');
      });

      function subscribeInitiate() {
        tjq.post("<?php echo site_url('manage_subscribe/entry_subscribe')?>", {
          email : tjq("#email_subscribe").val(),
          submit : tjq("#submit").val(),
          status : tjq("#status").val()
        }, function(data) {
          console.log(status);
          if (data.status == 'OK') {
            tjq("#subscribeSuccess").show();
            closeMsg();
          } else {
            tjq("#subscribeError").show();
            closeMsg();
          }
        }, "json");
      }

      function closeMsg() {
        setTimeout(function() {
          tjq("#subscribeSuccess").hide();
          tjq("#subscribeError").hide();
        }, 3000);
      }

    });
  </script>  

</body>
</html>

