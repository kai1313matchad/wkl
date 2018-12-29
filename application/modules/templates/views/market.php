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

$no_whatsapp = '62'.substr($shop_whatsapp, 1);

$cart_location = base_url('cart');

$tot_uri = $this->uri->total_segments();
$one = $this->uri->segment(1);
$two = $this->uri->segment(2);
$three = $this->uri->segment(3);
$last = $this->uri->segment($tot_uri);
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
    <meta name="author" content="<?= $meta_author ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="" />


<?php
    if ($this->uri->segment(3) == $this->uri->segment($tot_uri)) {
        // echo 'match';
        echo Modules::run('manage_seo/_get_open_graph', $one, $last);
    }
?>    

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
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/modernizr.2.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery-ui.1.10.4.min.js"></script>

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

        /**************fix image***************/
        .c-blocks__item {
            background: #647b86;
            background-clip: content-box;
            *border-bottom: 4px solid transparent;
            *border-right: 4px solid transparent;
            display: block;
            float: left;
            height: 200px;
            overflow: hidden;
            position: relative;
            text-decoration: none;
            vertical-align: top;
            width: 100%;
            margin-bottom: 10px;
        }

        @media only screen and (min-width: 600px) and (max-width: 999px) {
            .c-blocks__item {
                *width: 33.3%
            }
        }

        @media only screen and (min-width: 1000px) {
            .c-blocks__item {
                *width: 25%
            }
        }

        .c-blocks__item::after {
            *background: rgba(0, 0, 0, 0.1);
            bottom: 0;
            content: '';
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            -webkit-transition: background .25s;
            transition: background .25s
        }

        .c-blocks__item:hover::after,
        .c-blocks__item:focus::after {
            background: rgba(0, 0, 0, 0.2)
        }

        .c-blocks__item:hover .c-blocks__item-image,
        .c-blocks__item:focus .c-blocks__item-image {
            -webkit-transform: scale(1.05);
            -ms-transform: scale(1.05);
            transform: scale(1.05)
        }


        @media only screen and (min-width: 600px) and (max-width: 999px) {
            .c-blocks__item--double {
                width: 66.6%;
            }
            .c-blocks__item-image {
                width: 100%;
            }
        }

        @media only screen and (min-width: 1000px) {
            .c-blocks__item--double {
                width: 50%
            }
        }

        .c-blocks__item-inner {
            bottom: 0;
            left: 0;
            padding: 20px;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%
        }

        .c-blocks__item-body {
            bottom: 20px;
            left: 20px;
            position: absolute;
            right: 20px
        }

        .c-blocks__item-image {
            left: 0;
            min-height: 100%;
            min-width: 100%;
            position: absolute;
            top: 0;
            -webkit-transition: -webkit-transform .25s;
            transition: -webkit-transform .25s;
            transition: transform .25s;
            transition: transform .25s, -webkit-transform .25s
        }

        /*****************RESPONSIVE**********************/

        @media only screen and (max-width: 360px) {
            .page-title h4 {
                display: none;
            }
        }

        /*********************sticky side sosmed**************************/

        .floating-wpp {
            position: fixed;
            bottom: 15px;
            left: 15px;
            font-family: 'Open sans';
            font-size: 14px;
            transition: bottom 0.2s
        }

        .floating-wpp .floating-wpp-button {
            width: 52px;
            height: 52px;
            background-color: #25D366;
            background-image: url(<?= base_url() ?>marketplace/images/WhatsApp.png);
            background-position: center;
            background-size: 110%;
            border-radius: 50%;
            box-shadow: 1px 1px 4px rgba(60, 60, 60, .4);
            transition: box-shadow 0.2s;
            cursor: pointer
        }

        .floating-wpp:hover {
            bottom: 17px
        }

        .floating-wpp:hover .floating-wpp-button {
            box-shadow: 1px 2px 8px rgba(60, 60, 60, .4)
        }

        /*************************/

        #share {
            
            position: fixed;
            z-index: 9999;
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

        <div id="share">

            <!-- sticky button whatsapp -->
            <a class="whatsapp" href="https://wa.me/<?= $no_whatsapp ?>?text=Saya%20tertarik%20untuk%20menyewa%20media%20iklan" target="blank">
                <div class="floating-wpp" style="left: unset; right: 15px;"> 
                    <div class="floating-wpp-button">
                    </div>
                </div>
            </a>
            <!--  -->

        </div> 

        

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
                            <li class="menu-item-has-children <?= ($this->uri->segment(1) == 'category') ? 'active' : '' ?>">
                                <a href="<?php echo base_url(); ?>category/search">List</a>
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
                           <!--  <li class="menu-item-has-children <?= ($this->uri->segment(1) == 'testimoni') ? 'active' : '' ?>">
                                <a href="<?php echo base_url('testimoni'); ?>">Testimoni</a>
                            </li> -->
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
                
                <nav id="mobile-menu-01" class="mobile-menu collapse">
                    <ul id="mobile-primary-menu" class="menu">
                        <li class="menu-item-has-children2">
                            <a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li class="menu-item-has-children2 <?= ($this->uri->segment(1) == 'category') ? 'active' : '' ?>">
                            <a href="<?php echo base_url(); ?>category/search">List</a>
                        </li>
                        <li class="menu-item-has-children2 <?= ($this->uri->segment(1) == 'owner') ? 'active' : '' ?>">
                            <a href="<?php echo base_url('owner'); ?>">Pemilik Titik</a> 
                        </li>
                        <li class="menu-item-has-children2 <?= ($this->uri->segment(1) == 'agency') ? 'active' : '' ?>">
                            <a href="<?php echo base_url('agency'); ?>">Klien</a>
                        </li>
                        <li class="menu-item-has-children2 <?= ($this->uri->segment(1) == 'vendor') ? 'active' : '' ?>">
                            <a href="<?php echo base_url('vendor'); ?>">Vendor</a> 
                        </li>
                        <li class="menu-item-has-children2 <?= ($this->uri->segment(1) == 'blog') ? 'active' : '' ?>">
                            <a href="<?php echo base_url('blog/list'); ?>">Blog</a>
                        </li>
                        <!-- <li class="menu-item-has-children2 <?= ($this->uri->segment(1) == 'testimoni') ? 'active' : '' ?>">
                            <a href="<?php echo base_url('testimoni'); ?>">Testimoni</a>
                        </li> -->
                        <li>
                            <div class="page-title pull-left" style="width: 20%;">
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
                            </div>
                            <?php require_once('search.php') ?>
                        </li>
                       
                       
                    </ul>
                    
                    <ul class="mobile-topnav container">
                        <?php
                        if ($this->session->userdata('user_id') != '') : ?>
                            <li><a href="<?= base_url().'store_profile' ?>" title="My Profil">MY PROFIL</a></li>
                            <li><a href="<?= $logout_location ?>" class="">LOGOUT</a></li>
                        <?php else : ?>
                            <li><a href="<?= $login_location ?>" class="">LOGIN</a></li>
                            <li><a href="<?= $daftar_location ?>" class="">SIGNUP</a></li>
                        <?php endif; ?>
                       
                    </ul>
                    
                </nav>
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

                        case 'transaction':
                            $res = true;    
                        break;

                        case 'store_penilaian':
                            $res = true;    
                        break;

                        case 'store_vendor':
                            $res = true;    
                        break;

                        case 'store_testimoni':
                            $res = true;    
                        break;

                        case 'store_voucher':
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
                            <li class="<?= ($this->uri->segment(1) == 'transaction') ? 'active' : '' ?>"><a href="<?= base_url().'transaction'?>"><i class="soap-icon-shopping circle"></i>Transaksi</a></li>
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
                            <li class="<?= ($this->uri->segment(1) == 'store_testimoni') ? 'active' : '' ?>"><a href="<?= base_url().'store_testimoni'?>"><i class="soap-icon-conference circle"></i>Testimoni</a></li>
                        </ul>
                        <div class="tab-content">
 
                    	<?php
            				if (isset($view_file)) {
            					$this->load->view($view_module.'/'.$view_file);
            				}
            			?>

                        </div>
                    </div>

                    <!-- start vendor dashboard -->

                   <!--  <div class="search-box-wrapper style2">
                        <div class="search-box container">
                            <ul class="search-tabs clearfix">
                                <li class="active"><a href="#profil-tab" data-toggle="tab"><span>PROFIL</span></a></li>
                                <li><a href="#news-tab" data-toggle="tab"><span>KELENGKAPAN</span></a></li>
                                <li class="advanced-search visible-lg"><a href="#notifikasi-tab" data-toggle="tab"><span>NOTIFIKASI</span></a></li>
                            </ul>
                            <div class="visible-mobile">
                                <ul id="mobile-search-tabs" class="search-tabs clearfix">
                                    <li class="active"><a href="#profil-tab">PROFIL</a></li>
                                    <li><a href="#news-tab">KELENGKAPAN</a></li>
                                    <li><a href="#notifikasi-tab">NOTIFIKASI</a></li>
                                </ul>
                            </div>
                            
                            <div class="search-tab-content">
                                
                                <style>
                                ul.common-info li {
                                    margin-bottom: 8px;
                                }
                                .common-info a:hover {
                                    text-decoration: underline;
                                }    
                                </style>

                                <div class="tab-pane fade active in" id="profil-tab">
                                    <article class="image-box style2 box innerstyle personal-details">
                                        <figure>
                                            <a title="" href="#">
                                                <img width="270" height="263" alt="" src="<?php echo base_url(); ?>marketplace/images/default_v3-usrnophoto1.png">
                                            </a>

                                            <div class="detail-profil">
                                                <div class="tag-name" style="margin: 20px 0 0 0; font-size: 18px; font-weight: bold;">PT ASTRA</div>
                                                <div class="pic" style="font-size: 14px;">lupi</div>
                                                <div class="tag-category" style="margin: 15px 0; font-size: 14px;">Vendor Asuransi</div>
                                                <hr>
                                                <ul class="common-info" style="font-size: 14px;">
                                                    <li>
                                                        <i class="soap-icon-departure"></i>
                                                        <span>Singapore</span>
                                                    </li>
                                                    <li>
                                                        <i class="soap-icon-phone"></i>
                                                        <span>08888888888</span>
                                                    </li>
                                                    <li>
                                                        <i class="soap-icon-letter"></i>
                                                        <span>@mail.com</span>
                                                    </li>
                                                    <li>
                                                        <i class="soap-icon-globe"></i>
                                                        <span style="color: #0366d6;"><a href="#">http://sonnylab.com/</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </figure>
                                        <div class="details">
                                            <a href="#" class="button btn-small yellow pull-right edit-profile-btn">PERBARUI PROFIL</a>
                                            <br><br>
                                            <div class="term-description">
                                                <div class="info-box block">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ab quis a dolorem, placeat eos doloribus esse repellendus quasi libero illum dolore. Esse minima voluptas magni impedit, iusto, obcaecati dignissimos.</p>

                                                    <p>Sweet dessert caramels sugar plum brownie. Chupa chups caramels brownie tootsie roll marzipan wafer jelly-o gummies cheesecake. Tootsie roll dessert lollipop lemon drops marzipan chocolate chocolate cake wafer bonbon. Oat cake cake macaroon marzipan dessert marshmallow cotton candy sweet. Dessert tart lollipop cheesecake biscuit cake croissant. Cake pie chupa chups apple pie jelly-o jelly marshmallow. Toffee ice cream liquorice cotton candy pastry pie. Caramels macaroon pie cake dessert.</p>

                                                    <p>Gingerbread pie soufflé chocolate candy muffin toffee. Caramels sweet roll apple pie muffin pudding wafer icing gummies. Sesame snaps sugar plum cookie jujubes topping bear claw fruitcake toffee. Toffee tart pie dragée. Liquorice soufflé donut. Chocolate bar marzipan gummies. Tiramisu topping jelly beans gingerbread carrot cake jelly beans sugar plum sweet chocolate. Chocolate sweet roll tart icing cake tootsie roll jelly beans cheesecake. Sweet roll candy marshmallow cotton candy topping dessert icing cake gummi bears. Sweet jujubes biscuit pie halvah apple pie fruitcake dragée fruitcake.</p>

                                                    <p>Marshmallow ice cream brownie. Cake lollipop dragée bonbon muffin gummi bears fruitcake halvah. Jelly-o muffin bear claw pudding cotton candy bear claw. Halvah candy canes pudding jelly. Marshmallow croissant chocolate cake. Lemon drops macaroon chocolate bar halvah chocolate cake biscuit pie sweet chocolate bar. Biscuit ice cream donut gingerbread jujubes. Gingerbread cake topping dragée dragée danish macaroon tart. Carrot cake wafer powder cheesecake. Bear claw cookie dessert candy canes tart muffin cookie jujubes.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="tab-pane fade" id="news-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2>Kelengkapan</h2>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="#" class="button btn-small yellow pull-right">Upload Dokumen</a>
                                        </div>
                                    </div>

                                    <article class="image-box style2 box innerstyle personal-details">
                                        <div class="col-md-3">
                                            <h4 class="panel-title">
                                                SIUP
                                            </h4>
                                            <article class="box">
                                                <figure>
                                                    <img src="<?= base_url() ?>marketplace/ktp/180907121055_KTP.jpg" class="img-responsive">
                                                </figure>
                                            </article>
                                        </div>
                                        <div class="col-md-3">
                                            <h4 class="panel-title">
                                                NPWP
                                            </h4>
                                            <article class="box">
                                                <figure>
                                                    <img src="<?= base_url() ?>marketplace/ktp/180907121055_KTP.jpg" class="img-responsive">
                                                </figure>
                                            </article>
                                        </div>
                                        <div class="col-md-3">
                                            <h4 class="panel-title">
                                                TDP
                                            </h4>
                                            <article class="box">
                                                <figure>
                                                    <img src="<?= base_url() ?>marketplace/ktp/180907121055_KTP.jpg" class="img-responsive">
                                                </figure>
                                            </article>
                                        </div>
                                        <div class="col-md-3">
                                            <h4 class="panel-title">
                                                Akte
                                            </h4>
                                            <article class="box">
                                                <figure>
                                                    <img src="<?= base_url() ?>marketplace/ktp/180907121055_KTP.jpg" class="img-responsive">
                                                </figure>
                                            </article>
                                        </div>
                                    </article>

                                </div>
                                <div class="tab-pane fade" id="notifikasi-tab">
                                    notifikasi
                                </div>
                           
                                
                            </div>
                        </div>
                    </div> -->

                    <!-- end part of vendor dashboard -->

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
                                    <li class=""><a href="https://docs.google.com/forms/d/e/1FAIpQLScuIVr7qL-8IGhRq6cYTWtZqqjQ-94IzSg566qseg6DPVzc3A/viewform?usp=sf_link" target="_blank">Karir</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>templates/home">Kegiatan kami</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>testimoni">Testimoni</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <h2>Klien</h2>
                                <ul class="discover triangle hover row">
                                    <!-- <li class=""><a href="#">Pesan di WIKLAN</a></li> -->
                                    <li class=""><a href="<?php echo base_url() ?>panduan/cara_pendaftaran">Cara Pendaftaran</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>panduan/cara_pemesanan">Mendapatkan Penawaran</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>panduan/cara_pembayaran">Cara Pembayaran</a></li> 
                                    <li class=""><a href="<?php echo base_url() ?>agency">Keuntungan</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>panduan/negosiasi">Negosiasi</a></li>
                                    <!-- <li class=""><a href="<?php echo base_url() ?>panduan/?p=pengembalian-dana">Pengembalian Dana</a></li>-->

                                    <li class=""><a href="<?= base_url() ?>confirmation">Konfirmasi Pembayaran</a></li>
                                </ul>
                            </div>
                             <div class="col-sm-6 col-md-3">
                                <h2>Pemilik Titik</h2>
                                <ul class="discover triangle hover row">
                                    <!-- <li class=""><a href="#">Jual di WIKLAN</a></li> -->
                                    <li class=""><a href="<?php echo base_url() ?>panduan/cara_berjualan">Cara Pendaftaran Titik</a></li>
                                    <li class=""><a href="<?php echo base_url() ?>owner">Keuntungan</a></li>                        
                                    <li class=""><a href="<?php echo base_url() ?>panduan/cara_berjualan">Terima Pembayaran</a></li>                                    
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
                                    <li class=""><a href="<?php echo base_url() ?>panduan/panduan_keamanan">Panduan Keamanan</a></li>
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
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127555752-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127555752-1');
</script>
    
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
            valueNames: ['kota', 'provinsi', 'namaLokasi'],
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

            tjq('<h1 class="logo navbar-brand"><a title="Wiklan" href="<?= base_url() ?>"><img alt="" src="<?php echo base_url(); ?>assets/images/logo_wiklan.png"></a></h1>').insertBefore('.chaser .menu');

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

        tjq('#profi').change(function(){
            tjq.post("<?php echo base_url();?>store_cities/get_city/"+tjq('#profi').val(),{},function(obj){
                tjq('#metro').html(obj);
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

