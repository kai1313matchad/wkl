
<?php $form_pendaftaran_location = base_url().'pendaftaran'; ?>
<?php $kebijakan_location = base_url().'templates/kebijakan_privasi';?>
<?php $syarat_location = base_url().'templates/syarat_dan_ketentuan';?>
<?php $form_contact_location = base_url().'manage_kontak/entry_contact_us'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WIKLAN</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>LandingPageFiles/img/ico_wiklan.ico" rel="icon">
  <link href="<?php echo base_url(); ?>LandingPageFiles/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/bootstrap/css/bootstrap.min2.css" rel="stylesheet">


  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url(); ?>LandingPageFiles/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  <style type="text/css">
    ol > li {
      padding:0 20px 7px 7px;
      text-align: justify;
      font-size: 14px;
      color: #333;
      line-height: 24px;
      transition-duration: 1s;
    }

    .jus{
      text-align: justify;
    }

    .visi{
    }

    .visi:hover, ol > li:hover{
      color: #1E90FF !important;
    }

    #subscribeSuccess {
      color: #19abce;
      display: none;
      border: 1px solid #19abce;
      text-align: center;
      padding: 5px;
      font-weight: 600;
      margin-bottom: 5px;
    }

    #subscribeError {
      color: red;
      display: none;
      border: 1px solid red;
      text-align: center;
      padding: 5px;
      font-weight: 600;
      margin-bottom: 5px;
    }

    #google_translate_element {
      color: #fff !important;
      background: transparent !important;
    }

    table#medsos {
      text-align: left;
    }
    #medsos td {
      padding: 5px;
    }

    #medsos td span {
      display: block;
      width: 100%;
    }
    .text-medsos {
      position: absolute;
      top: 55px;
    }
  </style>

<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5ivN6oqdJLQn00zwpEvDD6VsAiwXHV8a";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

  
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#intro" class="scrollto">wiklan</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="<?= base_url() ?>"><img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png" alt="" title="logo wiklan" style="width: 100px; height: auto; margin-top: -5px" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <!-- <li class="menu-active"><a href="#intro">Home</a></li> -->
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#services">Layanan</a></li>
          <li><a href="#portfolio">Galeri</a></li>
          <li><a href="#team">Team</a></li>
          <!-- <li class="menu-has-children"><a href="#">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <li><a href="#contact">Kontak</a></li>
          <li>
            
        
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->

<?php
  echo Modules::run('templates/banner');
?>

  

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <!-- <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a href="">Lorem Ipsum Delino</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-ios-stopwatch-outline"></i>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>

        </div>
      </div>
    </section> --><!-- #featured-services -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <div class="row">
           <div class="col-md-3 offset-md-9" id="google_translate_element"></div><script type="text/javascript">
          function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'id', includedLanguages: 'en,id', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
          }
          </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </div>
        

        <header class="section-header">
          <h3>Tentang Kami</h3>
          <div class="row">
            <div class="col-md-3 push-md-9">
              <center><a href="#intro"><img src="<?php echo base_url(); ?>LandingPageFiles/img/billboard-wiklan.png" alt="" title="logo wiklan" style="width: 200px; height: auto; padding: 0; margin-top: -10px"/></a></center>
            </div>
            <div class="col-md-9 pull-md-3">
              <p style="text-align: justify; line-height: 40px; text-indent: 50px"><b>PT. Wijaya Iklan Indonesia</b> adalah Perusahaan Nasional yang berpusat di Surabaya, dimana Perusahaan kami menyediakan lokasi media luar ruang yang menyebar di seluruh Indonesia. Kami berpengalaman sejak tahun 1990 dan pada tahun 2018 kami telah meresmikan <b>PT. Wijaya Iklan Indonesia</b> sebagai perusahaan jasa periklanan berbasis teknologi.</p>
            </div>
          </div>
        </header>

        <div class="row about-cols">

          

          <!-- <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Plan</a></h2>
              <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem  doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
              </p>
            </div>
          </div> -->

          <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s" >
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Visi Kami</a></h2>
              <p class="visi" style="text-align: justify; padding-bottom: 245px; padding-top: 15px">
               Menjadi Perusahaan Swasta Nasional yang berfokus pada bidang periklanan dengan berbasis teknologi dalam menyediakan titik lokasi terbaik dan terus bertumbuh secara berkesinambungan, memberikan kesejahteraan dan menjadi saluran berkat bagi semua yang berhubungan dengan kami.
              </p>
            </div>
          </div>

          <div class="col-md-6 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Misi Kami</a></h2>
              <p style="text-align: justify;">
                <ol>
                <li>Memastikan lokasi yang ditawarkan adalah lokasi yang aman secara perijinannya dari bagus secara sudut pandang.</li>
                <li>Mengembangkan kemitraaan dengan pemilik lahan / persil dan biro periklanan untuk memperluas jangkauan penjualan perusahaan.</li>
                <li>Memberikan pengalaman sewa – menyewa media iklan yang terpercaya, konsisten dan saling menguntungkan kepada seluruh pelanggan dengan teknologi modern.</li> 
                <li>Memahami beragam kebutuhan lokasi dari klien dan memberikan layanan penyediaan lokasi yang tepat demi tercapainya kepuasaan klien.</li>
                <li>Mengoptimalkan sinergi dengan pemilik lahan / persil, klien, biro periklanan, kontraktor / vendor dan pemerintah daerah.</li>
                </ol>
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Mengapa harus Wiklan ?</h3>
        </header>

        <div class="row">

          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-clock-outline"></i></div>
            <h4 class="title"><a href="">Efektivitas Waktu</a></h4>
            <p class="description jus">Melalui situs kami proses pencarian, penawaran, pemasangan media iklan menjadi lebih mudah dan cepat serta menghemat waktu berharga anda.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-box-outline"></i></div>
            <h4 class="title"><a href="">W-Koin</a></h4>
            <p class="description jus">Dengan sistem kami anda bisa mendapat reward dengan syarat dan ketentuan yang berlaku serta reward tersebut bisa ditukarkan dengan hadiah menarik/potongan diskon untuk transaksi selanjutnya.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-social-buffer-outline"></i></div>
            <h4 class="title"><a href="">Harga Bersaing</a></h4>
            <p class="description jus">Dengan banyak pilihan yang kami tawarkan, anda dijamin akan mendapat lokasi dengan harga terbaik sesuai budget anda.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-arrow-expand"></i></div>
            <h4 class="title"><a href="">Jangkuan Luas</a></h4>
            <p class="description jus">Lokasi kami menjangkau berbagai titik strategis di seluruh Indonesia dan akan terus berkembang ke daerah yang lebih luas.</p>
          </div>
          <!-- <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people-outline"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div> -->

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
        <h3>Daftar Sekarang</h3>
        <p> Mari daftarkan diri Anda dan dapatkan keuntungannya!</p>
        <a class="cta-btn" href="<?= $form_pendaftaran_location ?>">Daftar</a>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Skills Section
    ============================-->
    <!-- <section id="skills"> -->
    <section id="services">
      <div class="container">

        <header class="section-header">
          <h3>Apa keuntungan yang diberikan Wiklan?</h3>
          <p></p>
        </header>

        <div class="row">
          <div class="col-lg-4 col-md-4 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-star-outline"></i></div>
            <!-- <h4 class="title"><a href="">Efektivitas Waktu</a></h4> -->
            <p class="description jus">Penjualan dan pemasaran menjadi tanggung jawab Wiklan. Dengan demikian, anda tidak perlu lagi pusing mencari klien/potensi pembeli untuk lokasi anda. Semua akan kami urus sampai lokasi anda laku terjual.</p>
          </div>
          <div class="col-lg-4 col-md-4 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-social-usd-outline"></i></div>
            <!-- <h4 class="title"><a href="">Pengawasan Berhadiah</a></h4> -->
            <p class="description jus">Pembayaran yang diterima tidak dipengaruhi oleh pembayaran dari klien. Apabila terjadi keterlambatan pembayaran dari klien, kami menjamin anda tetap mendapatkan pembayaran sesuai perjanjian.</p>
          </div>
          <div class="col-lg-4 col-md-4 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people"></i></div>
            <!-- <h4 class="title"><a href="">Harga Bersaing</a></h4> -->
            <p class="description jus">Mendapatkan rekomendasi vendor untuk pembangunan dan perijinan dari pihak perusahaan serta kami akan memberikan trainning.</p>
          </div>
        </div>

        <!-- <div class="skills-content">

          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">HTML <i class="val">100%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">CSS <i class="val">90%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">JavaScript <i class="val">75%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Photoshop <i class="val">55%</i></span>
            </div>
          </div>

        </div> -->

      </div>
    </section>

    <?php
      echo Modules::run('templates/faq');
    ?>

    <!--==========================
      Facts Section
    ============================-->
    <!-- <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Facts</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">274</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">18</span>
            <p>Hard Workers</p>
          </div>

        </div>

        <div class="facts-img">
          <img src="<?php echo base_url(); ?>LandingPageFiles/img/facts-img.png" alt="" class="img-fluid">
        </div>

      </div>
    </section> --><!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <?php
      echo Modules::run('templates/galeri');
    ?>

    <!--==========================
      Clients Section
    ============================-->
    <?php
      echo Modules::run('templates/client');
    ?>

    <!--==========================
      Clients Section
    ============================-->
    <?php
      echo Modules::run('templates/testimoni');
    ?>

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Team</h3>
          <p>Di WIKLAN, kami percaya bahwa berkembang menjadi manusia yang lebih baik adalah perjalanan yang tak berkesudahan yang hanya bisa dicapai dengan ketulusan untuk berbagi seperti manajer, dan keinginan untuk selalu belajar seperti karyawan.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/woman.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Maria Felicia N</h4>
                  <span>CEO WIKLAN</span>
                  <div class="social">
                    <a href="https://twitter.com/wiklanindonesia" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/wiklanindonesia/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/wiklanindonesia/" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/woman.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Idaramanthasia</h4>
                  <span>Secretary WIKLAN</span>
                  <div class="social">
                    <a href="https://twitter.com/wiklanindonesia" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/wiklanindonesia/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/wiklanindonesia/" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/man.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Willy Kusuma Wijaya</h4>
                  <span>CTO & Business Development WIKLAN</span>
                  <div class="social">
                    <a href="https://twitter.com/wiklanindonesia" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/wiklanindonesia/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/wiklanindonesia/" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/man.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>L. Efendi</h4>
                  <span>Project Manager WIKLAN</span>
                  <div class="social">
                    <a href="https://twitter.com/wiklanindonesia" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/wiklanindonesia/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/wiklanindonesia/" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div> <br/>

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/woman.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Mrs.</h4>
                  <span>Accounting WIKLAN</span>
                  <div class="social">
                    <a href="https://twitter.com/wiklanindonesia" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/wiklanindonesia/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/wiklanindonesia/" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/man.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Mr.</h4>
                  <span>Marketing WIKLAN</span>
                  <div class="social">
                    <a href="https://twitter.com/wiklanindonesia" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/wiklanindonesia/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/wiklanindonesia/" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div> 

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/man.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>M. Zamroni</h4>
                  <span>Web Developer WIKLAN</span>
                  <div class="social">
                    <a href="https://twitter.com/wiklanindonesia" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/wiklanindonesia/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/wiklanindonesia/" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/man.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Mr.</h4>
                  <span>Web Developer WIKLAN</span>
                  <div class="social">
                    <a href="https://twitter.com/wiklanindonesia" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/wiklanindonesia/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/wiklanindonesia/" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>            

        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Hubungi Kami</h3>
          <p>Silahkan hubungi dan bertanya pada kami :</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-3">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address>Jl. Adityawarman no. 2 <br> Surabaya 60241 <br>Jawa Timur – Indonesia</address>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telp & WA</h3>
              <p><a href="#">031-51201088</a></p>
              &
              <p><a href="#">0822-3111-3648</a></p>
            </div>

          </div>

          <div class="col-md-3">
            <div class="contact-email" style="border-right: 1px solid #ddd;">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:cs@wiklan.com">cs@wiklan.com</a></p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-sosmed" style="padding: 20px 0;">
              <i class="ion-social-google-outline"></i>
              <h3>Media Sosial</h3>
              <table id="medsos">
                <tbody>
                  <tr>
                    <td>Facebook</td>
                    <td>:</td>
                    <td>
                      <span>Wiklan</span>
                      <span>Wiklan Jatim</span>
                      Wiklan Jakarta
                    </td>
                  </tr>
                  <tr>
                    <td>Twitter</td>
                    <td>:</td>
                    <td>@wiklanindonesia</td>
                  </tr>
                  <tr>
                    <td>LinkedIn</td>
                    <td>:</td>
                    <td>wiklan indonesia</td>
                  </tr>
                </tbody>
              </table>
              <p><a href="mailto:cs@wiklan.com"></a></p>
            </div>
          </div>

        </div>

        <!-- alert -->
        <?php 
        if (isset($flash)) {
          echo $flash;
        }
        ?>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <div id="status_error" style="display: none;">Failed!</div>
          <form id="contactForm">
            <div class="form-row">
              <div class="form-group col-md-4">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control" name="telpon" id="telpon" placeholder="No telpon" data-rule="email" data-msg="Please enter a valid number" maxlength="13" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-4">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Please enter a valid email" required/>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <select class="form-control" name="subjek" id="subjek">
                <option>Pilih Subjek</option>
                <option value="Permintaan penawaran"> Permintaan penawaran </option>
                <option value="tanya"> Tanya </option>
                <option value="komplain"> Komplain </option>
                <option value="lain-lain"> Lain-lain </option>
              </select>
              <!-- <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Judul" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div> -->
            </div>
            <div class="form-group">
              <textarea class="form-control" name="pesan" id="pesan" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Isi Pesan"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center">
              <button type="submit" name="submit" id="submit" value="Submit"><span class="ion-paper-airplane"></span> Kirim Pesan</button>
            </div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">

            <h3><a href="#intro"><img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png" alt="" title="logo wiklan" style="width: 120px; height: auto;" /></a></h3>
            <p>Dapatkan lokasi dengan mudah yang sesuai kebutuhan, atau tawarkan lahan Anda dan dapatkan keuntungannya!</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul class="nav-menu-bawah">
              <!-- <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li> -->
              <li><i class="ion-ios-arrow-right"></i> <a href="#about">Tentang Kami</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#services">Layanan</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?= $syarat_location ?>">Syarat dan Ketentuan</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?= $kebijakan_location ?>">Kebijakan Privasi</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak Kami</h4>
            <p>
              Jl. Adityawarman no. 2 Surabaya 60241 <br>
              Jawa Timur – Indonesia <br>
              <strong>Phone :</strong> 031-51201088 <br>
              <strong>WA :</strong> 0822-3111-3648 <br>
              
              cs@wiklan.com
            </p>

            <div class="social-links">
              <a href="https://twitter.com/wiklanindonesia" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/wiklanindonesia" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/wiklanindonesia/" class="instagram" target="_blank"><i class="fa fa-instagram" ></i></a>
              <a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" class="linkedin" target="_blank"><i class="fa fa-linkedin" ></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Langganan Informasi WIKLAN</h4>
            <p>Dapatkan Promo dan Artikel Menarik dari WIKLAN, Gratis dan Terupdate!</p>
            <div id="subscribeSuccess" style="display: none; color: #19abce;">success!</div>
            <div id="subscribeError" style="display: none; color: red;">error!</div>
            <form id="subscribeForm">
              <input type="email" placeholder="Tulis email Anda.." name="email" id="email_subscribe"><input type="hidden" name="status" id="status" value="1"><input type="submit" name="submit" id="submit" value="Submit">
            </form>
          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>wiklan</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        <!-- Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade -->
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/easing/easing.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/superfish/superfish.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/wow/wow.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/waypoints/waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <!-- <script src="<?php echo base_url(); ?>LandingPageFiles/contactform/contactform.js"></script> -->

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url(); ?>LandingPageFiles/js/main.js"></script>

  <script>
    $(document).ready(function() {
      $("#contactForm").submit(function(e) {
        e.preventDefault();
        contactInitiate();
      });

      function contactInitiate() {
        $.post("<?php echo site_url('manage_kontak/entry_contact_us')?>", { 
          nama : $("#nama").val(),
          email : $("#email").val(),
          telpon : $("#telpon").val(),
          subjek : $("#subjek").val(),
          pesan : $("#pesan").val(),
          submit : $("#submit").val()
        }, function(data) { 
          resultStatus(data); 
          // console.log(data);
          // console.log(nama + ' ' + email + ' ' + telpon + ' ' + subjek + ' ' + pesan + ' ' + submit)
        }, "json");
      }

      function resultStatus(data) {
        if (data.status == 'OK') {
          $("#sendmessage").addClass("show");
          $("#errormessage").removeClass("show");
          $('.contactForm').find("input, textarea").val("");
          closeMe();
        } else {
          // $("#status_error").show();
          $("#errormessage").addClass("show");
          $('#errormessage').html(data.msg);
          closeMe(); 
        }
      }

      function closeMe() {
        setTimeout(function() {
          $("#sendmessage").removeClass("show");
          $("#errormessage").removeClass("show");
        }, 3000);
      }

    })
  </script>

  <script>
    $(document).ready(function() {
      $("#subscribeForm").submit(function(e) {
        e.preventDefault();
        subscribeInitiate();
        // console.log('ok');
      });

      function subscribeInitiate() {
        $.post("<?php echo site_url('manage_subscribe/entry_subscribe')?>", {
          email : $("#email_subscribe").val(),
          submit : $("#submit").val(),
          status : $("#status").val()
        }, function(data) {
          console.log(status);
          if (data.status == 'OK') {
            $("#subscribeSuccess").show();
            closeMsg();
          } else {
            $("#subscribeError").show();
            closeMsg();
          }
        }, "json");
      }

      function closeMsg() {
        setTimeout(function() {
          $("#subscribeSuccess").hide();
          $("#subscribeError").hide();
        }, 3000);
      }

    });
  </script>

  <script>
    $(document).ready(function() {
      $("#telpon").keypress(validateNumber);

      function validateNumber(event) {
          var key = window.event ? event.keyCode : event.which;
          if (event.keyCode === 8 || event.keyCode === 46) {
              return true;
          } else if ( key < 48 || key > 57 ) {
              return false;
          } else {
              return true;
          }
      };
    })
  </script>

</body>
</html>
