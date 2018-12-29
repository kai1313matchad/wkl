<?php $form_pendaftaran_location = base_url().'templates/pendaftaran'; ?>
<?php $kebijakan_location = base_url().'templates/kebijakan_privasi';?>
<?php $syarat_location = base_url().'templates/syarat_dan_ketentuan';?>
<?php $home_location = base_url().'templates/home'; ?>
<?php $form_location = base_url().'manage_daftar/entry_daftar'; ?>

<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>Wiklan | Billboard Marketplace</title>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Wiklan | Billboard Marketplace">
    <meta name="author" content="SoapTheme">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/animate.min.css">
    
    <!-- Current Page Styles -->
  
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="<?php echo base_url();?>marketplace/css/style.css">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/custom.css">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/updates.css">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>marketplace/css/responsive.css">

    <link href="<?php echo base_url(); ?>LandingPageFiles/img/ico_wiklan.ico" rel="icon">

    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/jquery-1.11.1.min.js"></script>
    
    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>marketplace/css/ie.css" />
    <![endif]-->
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->

    <style>
    	.center {
    		margin: 0 auto;
    		display: block;
    	}
    	.pad-6 {
    		padding: 20px;
    		text-align: center;
    	}
    	.center img {
    		vertical-align: middle;
    	} 
    	.center h2 {
    		margin-top: 20px;
    		font-weight: bold;
    	}
    </style>

</head>
<body>
    
    <div id="page-wrapper">
        

        <section id="content" class="gray-area">

        	
        <?php
		if (isset($view_file)) {
			$this->load->view($view_module.'/'.$view_file);
		}
		?>	
            
        </section>
        
        
    </div>

    <!-- Javascript -->
    
   
    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url();?>marketplace/js/bootstrap.js"></script>
    
   
</body>
</html>

