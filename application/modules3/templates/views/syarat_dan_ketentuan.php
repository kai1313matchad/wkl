
<?php $form_pendaftaran_location = base_url().'templates/pendaftaran'; ?>
<?php $kebijakan_location = base_url().'templates/kebijakan_privasi';?>
<?php $syarat_location = base_url().'templates/syarat_dan_ketentuan';?>
<?php $home_location = base_url(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WIKLAN - Syarat dan Ketentuan</title>
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

  </style>
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header-kebijakan">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#intro" class="scrollto">wiklan</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="<?= $home_location ?>"><img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png" alt="" title="logo wiklan" style="width: 100px; height: auto; margin-top: -5px" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Syarat dan Ketentuan</a></li>
          <li><a href="<?= $home_location ?>">Tentang Kami</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about" style="padding-top:100px">
      <div class="container">
        <div class="row about-cols">

          <div class="col-md-12 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/syarat.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Syarat dan Ketentuan</a></h2>
              <p style="text-align: justify;">
                <!-- <p style="text-indent: 30px">Kebijakan privasi yang dimaksud di Wiklan adalah acuan yang mengatur dan melindungi penggunaan data dan informasi penting para Pengguna Wiklan. Data dan informasi yang telah dikumpulkan pada saat mendaftar, mengakses dan menggunakan layanan di Wiklan, seperti alamat, no.kontak, alamat e-mail, foto, gambar, dll.
                <br><br> Kebijakan tersebut diantaranya : </p>  -->

                <ol>
                <li>Wiklan.com tidak memungut biaya untuk pendaftaraan</li>
                <li>Pengisian data untuk pendaftaran harus lengkap dan terjamin validitasnya</li>
                <li>Setiap pemilik titik wajib mengikuti prosedur yang kami tetapkan</li> 
                <li>Pengguna bertanggung jawab secara pribadi untuk menjaga kerahasiaan akun dan password yang dimilikinya</li>
                <li>Apabila terjadi aktivitas yang mencurigakan pada akun Anda, segera hubungi kami di 031-51201088.</li>
                <li>Wiklan.com berhak menghapus, mengedit, atau menangguhkan akun Anda jika terjadi sesuatu diluar ketentuan yang berlaku. Dan kami akan melakukan pemberitahuan ke email Anda</li>
                <li>Jika dalam keadaan tertentu, terdapat kesalahan harga untuk lokasi tertentu, Wiklan berhak untuk menolak / membatalkan pesanan.</li>
                <li>Website ini dimiliki, dioperasikan dan diselenggarakan oleh Wiklan.com, perseroan terbatas yang berdiri atas dasar hokum Republik Indonesia, Surat Ijin Usaha Tetap No……………………… tertanggal………………, website dan layanan kami tersedia secara online melalui www.wiklan.com</li>
                <li>Syarat dan Ketentuan Penggunaan Wiklan.com dapat kami ubah, modifikasi, tambah, hapus atau koreksi setiap saat. Setiap perubahan itu berlaku sejak kami nyatakan berlaku, Anda kami anjurkan untuk mengunjungi website kami secara berkala agar dapat mengetahui adanya perubahan tersebut</li>
                <li>Dengan mengakses dan menggunakan website dan layanan kami, berarti Anda telah membaca, memahami, dan menyetujui syarat dan ketentuan yang berlaku.</li>
                <li>W-Koin didapat setelah Anda mendaftarkan akun anda.</li>
                <li>Setiap transaksi di situs kami, anda berhak mendapatkan tambahan W-Koin berlaku kelipatan.</li>
                <li>W-Koin dapat ditukarkan dengan pilihan hadiah menarik maupun potongan diskon untuk transaksi selanjutnya.</li>
                <li>W-Koin hanya dapat diakumulasikan tiap tahun.</li>
                </ol>
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">

            <h3><a href="<?= $home_location ?>"><img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png" alt="" title="logo wiklan" style="width: 120px; height: auto;" /></a></h3>
            <p>Dapatkan lokasi dengan mudah yang sesuai kebutuhan, atau tawarkan lahan Anda dan dapatkan keuntungannya!</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul class="nav-menu-bawah">
              <!-- <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li> -->
              <li><i class="ion-ios-arrow-right"></i> <a href="<?= $home_location ?>">Tentang Kami</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?= $home_location ?>">Layanan</a></li>
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
              <a href="https://www.instagram.com/wiklanindonesia/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
              <a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
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
  <script src="<?php echo base_url(); ?>LandingPageFiles/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url(); ?>LandingPageFiles/js/main.js"></script>

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

</body>
</html>
