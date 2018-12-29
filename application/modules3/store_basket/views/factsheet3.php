
<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_kodepos = $this->db->get_where('settings' , array('type'=>'kodepos'))->row()->description;
$shop_wa = $this->db->get_where('settings' , array('type'=>'WA'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
$shop_logo = base_url().'marketplace/logo/'.$system_logo;
$homepage_bg = $this->db->get_where('settings' , array('type'=>'homepage_background'))->row()->description;
// for meta SEO
$meta_author = $this->db->get_where('settings' , array('type'=>'author'))->row()->description;
$meta_keyword = $this->db->get_where('settings' , array('type'=>'keyword'))->row()->description;
$meta_description = $this->db->get_where('settings' , array('type'=>'description'))->row()->description;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>.</title>

	<!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>marketplace/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>marketplace/css/bootstrap2.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>marketplace/css/style-factsheet2.css">
	<style type="text/css">
	

	/*::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }*/

	body {
		background-color: #fff;
		margin: 40px;
		font-family: Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	html, body, {
	    position:fixed;
	    top:0;
	    bottom:0;
	    left:0;
	    right:0;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	a,
	a:active,
	a:focus,
	a:active {
	    text-decoration : none;
	    outline         : none
	}

	h5 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 12px;
		font-weight: normal;
		margin: 0 0 12px 0;
		padding: 10px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 20px;
		padding: 0 5px 0 5px;
		margin: 15px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}

	#note p {
		font-weight: bold;
	}

	#note span {
		display: block;
		font-size: 11px;
	}

	#map {
        height: 450px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
   	}

   	@media print {
	   	.hidden-print,tr.hidden-print,th.hidden-print,td.hidden-print{
			display:none !important;
		}

		#title {
			font-size: 14px !important;
		}

		#cat {
			font-size: 12px !important;
		}

		#map {
	        height: 220px !important;  /* The height is 400 pixels */
	        width: 100% !important;  /* The width is the width of the web page */
	   	}

	   	#detail {
	   		padding-left: 90px !important;
	   	}
	}

	/*table, td, th {
	    border: 1px solid black;
	}*/

	#table1 {
		border-collapse: collapse;
	}

	#table2 {
		display: block;
		position: relative;
		top: 10px;
	}

	table#table2 tr td {
		height: 10px !important;
	}

	

	/******************************/
	img {
	    max-width: 100%;
	    max-height: 100%;
	}

	.portrait {
	    height: 80px;
	    width: 30px;
	}


	.landscape {
	    height: 30px;
	    width: 80px;
	}

	.square {
	    height: 105px;
	    width: 105px;
	}

	#title {
		font-size: 18px;
		font-weight: bold;
		text-align: center;
		margin: 10px 0 10px 0;
	}

	.btn {
		display: inline-block;
		margin-bottom: 0;
		font-weight: normal;
		text-align: center;
		vertical-align: middle;
		cursor: pointer;
		background-image: none;
		border: 1px solid transparent;
		white-space: nowrap;
		padding: 6px 12px;
		font-size: 14px;
		line-height: 1.42857143;
		border-radius: 4px;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	.btn:focus,
	.btn:active:focus,
	.btn.active:focus {
	  	outline: thin dotted;
	  	outline: 5px auto -webkit-focus-ring-color;
	  	outline-offset: -2px;
	}

	.btn:hover,
	.btn:focus {
	  	color: #333333;
	  	text-decoration: none;
	}

	.btn-primary {
	  	color: #ffffff;
	  	background-color: #428bca;
	  	border-color: #357ebd;
	}

	.btn-primary:hover,
	.btn-primary:focus,
	.btn-primary:active,
	.btn-primary.active,
	.open .dropdown-toggle.btn-primary {
	  	color: #ffffff;
	  	background-color: #3276b1;
	  	border-color: #285e8e;
	}

	.btn-primary:active,
	.btn-primary.active,
	.open .dropdown-toggle.btn-primary {
	  	background-image: none;
	}

	.row:before,
	.row:after {
		content: " ";
  		*display: table;
	}

	.row:after {
		clear: both;
	}

	.row {
	  margin-left: -45px;
	  margin-right: -45px;
	}

	#kaki {
		margin-top: 10px;
		position: relative;
		width: 100%;
		height: 200px;
  		*clear: both;
  		margin-bottom: -100px;
	}

	#kaki img {
		width: 100%;
	}

	.grayscale { filter: grayscale(100%); }
	#detail {
	   		padding-left: 170px;
	   	}
	#detail span {
		display: block;
		text-align:  center;
	}
	</style>
</head>
<body>

	<div class="logo" style="position: relative; display: block; top: -25px;">

		<table style="width: 100%;">
			<tr>
				<td width="50%">
					<div class="logo">
						<img src="<?= base_url() ?>assets/images/logo_wiklan.png" width="150">
					</div>
				</td>
				<td width="50%">
					<table style="float: right;">
						
						<tr>
							<!-- <td style="font-weight: bold; color: #5cb85c;">REF. NO</td> -->
							<td style="font-size: 12px; text-align: right; font-weight: bold;"><?= $meta_author ?></td>
						</tr>
						<tr>
							<!-- <td style="font-weight: bold; color: #5cb85c;">PT Wijaya Iklan (Wiklan)</td> -->
							<td style="font-size: 12px; text-align: right;"><?= $shop_address ?></td>
						</tr>
						<tr>
							<!-- <td style="font-weight: bold; color: #5cb85c;">PAYMENT DUE</td> -->
							<td style="font-size: 12px; text-align: right;"><?= $shop_phone ?> - <?= $shop_wa ?></td>
						</tr>
						<tr>
							<!-- <td style="font-weight: bold; color: #5cb85c;">PAYMENT DUE</td> -->
							<td style="font-size: 12px; text-align: right;"><?= $shop_email ?></td>
						</tr>
					</table>
				</td>
			</tr>
			
		</table>
		
	</div>
	<div>
		<a href="#" onclick="window.print();" class="btn btn-primary hidden-print" style="font-weight: bold; text-transform: uppercase;">cetak factsheet</a>
	</div>
	
	<div id="title">
		<?= $alamat ?>
	</div>

<div id="container2">

	<div id="body2">
		
		<table id="table1" width="100%">
			<tr>
				<td width="75%" style="background-color: #f9f9f9; border: 1px solid #eaeaea; vertical-align: top; padding-bottom: 10px; padding-left: 10px;">
					<table id="table2" width="100%">
						
						<tr>
							<td id="detail" style="font-weight: bold;">
								<span style="font-size: 18px; text-transform: uppercase;"><?= $kota ?></span>
								<span style="font-size: 12px;"><?= $kategori_produk.' '.$size.'m - '.$display ?></span>
								<span style="font-size: 12px;"><?= $jml_sisi.' - '.$display ?></span>
							</td>
						</tr>
						
					</table>

				</td>
				<td width="" style="border: 1px solid #eaeaea; text-align: center; padding: 5px;" vertical-align="midle">
					<div class="img square" style="text-align: center;">	
						<img src="<?= $code ?>" class="img-responsive">
					</div>
				</td>	

			</tr>
			
		</table>
		
		

		<table id="table1" width="100%">
			<tr>
				<td width="50%" style="border: 1px solid #eaeaea; vertical-align: top; padding: 10px;">
					<div id="map"></div>
				</td>
			</tr>
		</table>

		<table id="table1" width="100%">
			<tr>
				<td width="50%" style="border: 1px solid #eaeaea; text-align: center; vertical-align: center; padding: 10px;">
					<div class="img" style="width: 100%; text-align: center;">
						<?php
						if ($image_location2 != '') { ?>
							<img src="<?= $image_location2 ?>" class="img-responsive" style='height: 100%; width: 100%; object-fit: contain'>
						<?php } else { ?>
						<span>Tidak ada gambar</span>
						<?php } ?>
					</div>
				</td>
				<td width="50%" style="border: 1px solid #eaeaea; text-align: center; vertical-align: center; padding: 10px;">
					<div class="img" style="width: 100%; text-align: center;">
						<?php
						if ($image_location3 != '') { ?>
							<img src="<?= $image_location3 ?>" class="img-responsive" style='height: 100%; width: 100%; object-fit: contain'>
						<?php } else { ?>
						<span>Tidak ada gambar</span>
						<?php } ?>
					</div>
				</td>
			</tr>
		</table>

	</div>

	<div class="footer" ></div>
</div>	

<!-- <div class="row">
	<div id="kaki">
		<img src="<?= base_url() ?>marketplace/images/footer.png" class="grayscale">
	</div>
</div> -->



<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: <?= $lat ?>, lng: <?= $long ?>};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 16, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoUOdMzbYns5TcDrLZYMEuXhUGkV5QIoo&callback=initMap">
    </script>


</body>
</html>