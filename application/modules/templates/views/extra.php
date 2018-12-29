
<?php $form_pendaftaran_location = base_url().'templates/pendaftaran'; ?>
<?php $kebijakan_location = base_url().'templates/kebijakan_privasi';?>
<?php $syarat_location = base_url().'templates/syarat_dan_ketentuan';?>
<?php $home_location = base_url().'templates/home'; ?>
<?php $form_location = base_url().'manage_daftar/entry_daftar'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar Wiklan</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>LandingPageFiles/img/ico_wiklan.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	
	<?php
	if (isset($view_file)) {
		$this->load->view($view_module.'/'.$view_file);
	}
	?>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<!-- <script src="<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/js/main.js"></script> -->

	<script>
    $(document).ready(function() {
      	$("#inputTelp").keypress(validateNumber);

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