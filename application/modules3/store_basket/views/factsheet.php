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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Penawaran</title>
  <style type="text/css">
  body {
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   margin:0 !important;
   width: 100% !important;
   -webkit-text-size-adjust: 100% !important;
   -ms-text-size-adjust: 100% !important;
   -webkit-font-smoothing: antialiased !important;
 }
 .tableContent img {
   border: 0 !important;
   display: block !important;
   outline: none !important;
 }
 a{
  color:#382F2E;
}

p, h1,h2,ul,ol,li,div{
  margin:0;
  padding:0;
}

h1,h2{
  font-weight: normal;
  background:transparent !important;
  border:none !important;
}

@media only screen and (max-width:480px)
		
{
		
table[class="MainContainer"], td[class="cell"] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class="specbundle"] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:15px !important;
	}	
td[class="specbundle2"] 
	{
		width:80% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:10px !important;
		padding-left:10% !important;
		padding-right:10% !important;
	}
		
td[class="spechide"] 
	{
		display:none !important;
	}
	    img[class="banner"] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class="left_pad"] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		 
}
	
@media only screen and (max-width:540px) 

{
		
table[class="MainContainer"], td[class="cell"] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class="specbundle"] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:15px !important;
	}	
td[class="specbundle2"] 
	{
		width:80% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:10px !important;
		padding-left:10% !important;
		padding-right:10% !important;
	}
		
td[class="spechide"] 
	{
		display:none !important;
	}
	    img[class="banner"] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class="left_pad"] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		
}

.contentEditable h2.big,.contentEditable h1.big{
  font-size: 26px !important;
}

 .contentEditable h2.bigger,.contentEditable h1.bigger{
  font-size: 37px !important;
}

td,table{
  vertical-align: top;
}
td.middle{
  vertical-align: middle;
}

a.link1{
  font-size:13px;
  color:#27A1E5;
  line-height: 24px;
  text-decoration:none;
}
a{
  text-decoration: none;
}

.link2{
color:#ffffff;
border-top:10px solid #27A1E5;
border-bottom:10px solid #27A1E5;
border-left:18px solid #27A1E5;
border-right:18px solid #27A1E5;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
background:#27A1E5;
}

.link3{
color:#555555;
border:1px solid #cccccc;
padding:10px 18px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
background:#ffffff;
}

.link4{
color:#27A1E5;
line-height: 24px;
}

h2,h1{
line-height: 20px;
}
p{
  font-size: 14px;
  line-height: 21px;
  color:#AAAAAA;
}

.contentEditable li{
 
}

.appart p{
 
}
.bgItem{
background: #ffffff;
}
.bgBody{
background: #ffffff;
}

img { 
  outline:none; 
  text-decoration:none; 
  -ms-interpolation-mode: bicubic;
  width: auto;
  max-width: 100%; 
  clear: both; 
  display: block;
  float: none;
}

#map {
    height: 200px;  /* The height is 400 pixels */
    width: 100%;  /* The width is the width of the web page */
}

@media print {
   	.hidden-print,tr.hidden-print,th.hidden-print,td.hidden-print{
		display:none !important;
	}
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

.btn-warning {
  color: #ffffff;
  background-color: #f0ad4e;
  border-color: #eea236;
}
.btn-warning:hover,
.btn-warning:focus,
.btn-warning:active,
.btn-warning.active,
.open .dropdown-toggle.btn-warning {
  color: #ffffff;
  background-color: #ed9c28;
  border-color: #d58512;
}
.btn-warning:active,
.btn-warning.active,
.open .dropdown-toggle.btn-warning {
  background-image: none;
}

td img{
    display: block;
    margin-left: auto;
    margin-right: auto;

}

</style>


<script type="colorScheme" class="swatch active">
{
    "name":"Default",
    "bgBody":"ffffff",
    "link":"27A1E5",
    "color":"AAAAAA",
    "bgItem":"ffffff",
    "title":"444444"
}
</script>


</head>
<body paddingwidth="0" paddingheight="0" bgcolor="#d1d3d4"  style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">




  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="font-family:helvetica, sans-serif;" class="MainContainer">
      <!-- =============== START HEADER =============== -->
  <tbody>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="20">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="movableContentContainer">
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="15"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="60"><img src="<?= base_url() ?>assets/images/logo_wiklan.png" alt="Logo" title="Logo" width="150" height="60" data-max-width="100"></td>
      <td width="10" valign="top">&nbsp;</td>
      
    </tr>
  </tbody>
</table>
</td>
      <td valign="top" width="90" class="spechide">&nbsp;</td>
      <td valign="middle" style='vertical-align: middle;'>
      	<div class='contentEditableContainer contentTextEditable'>
            <div class='contentEditable' style='text-align: right;'>
            	<a href="<?= $detail ?>" class="btn btn-warning hidden-print" style="font-weight: bold;">Back</a>
            </div>
          </div>
      </td>
      <td valign="middle" style='vertical-align: middle;' width='150'>
          <div class='contentEditableContainer contentTextEditable'>
            <div class='contentEditable' style='text-align: right;'>
            	<a href="#" onclick="window.print();" class="btn btn-primary hidden-print" style="font-weight: bold;">Cetak Factsheet</a>
            </div>
          </div>
        </td>
    </tr>
  </tbody>
</table></td>
    </tr>
    <tr>
       <td height='5'></td>
    </tr>
    <tr>
       <td ><hr style='height:1px;background:#DDDDDD;border:none;'></td>
     </tr>
  </tbody>
</table>
	  </div>
      <!-- =============== END HEADER =============== -->
<!-- =============== START BODY =============== -->
      
<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height='5'></td>
    </tr>
    <tr>
      <td style="border: 1px solid #EEEEEE; border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="40">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr><td height='10'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: center;'>
                              <h2 style="font-size: 14px; font-weight: bold;"><?= $alamat ?></h2>
                          
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr><td height='10'></td></tr>
                    </table></td>
      <td valign="top" width="40">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    <tr>
      <td height='15'></td>
    </tr>
  </tbody>
</table>

      
      
      </div>

      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="1"></td>
    </tr>
    <tr>
      <td valign="middle" style='vertical-align: middle;' width="580" align="center">
      	<div class='contentEditableContainer contentImageEditable'>
           	<div class='contentEditable' style="text-align: center;">
           		<?php
				if ($image_location2 != '') { ?>
					<img class="banner" src="<?= $image_location2 ?>" alt="Logo" title="Lokasi" width="580" height="221" border="0" >
					<!-- <img src="<?= $image_location2 ?>" class="img-responsive" style='height: 100%; width: 100%; object-fit: contain'> -->
				<?php } else { ?>
				<span>Tidak ada gambar</span>
				<?php } ?>
           	</div>
        </div>
      </td>
    </tr>
    <tr>
    	<td valign="top" height="20">&nbsp;</td>
    </tr>
  </tbody>
</table>

      
      
      </div>
      

      <div id="map"></div>

      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="20"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="specbundle" width="70%">
      	<div class='contentEditableContainer contentTextEditable'>
            <div class='contentEditable' style='text-align: left;'>
                              <h2 style="font-size: 16px; font-weight: bold;"><?= $kota ?></h2>
                              <p><?= $kategori_produk.' '.$size.'m - '.$display ?></p>
                              <p><?= $jml_sisi.' - '.$tipe_cahaya ?></p>
                            </div>
          </div>
      </td>
      <td valign="top" width="75" class="specbundle">&nbsp;</td>
      <td class="specbundle">
      	<div class='contentEditableContainer contentTextEditable'>
            <div class='contentEditable' style='text-align: left;'>
            	<?php
            	if ($code != '') { ?>
              		<img src="<?= $code ?>" class="img-responsive">
              	<?php } else { ?>
              		<span style="font-size: 10px;">Tidak ada gambar</span>
              	<?php } ?>	
            </div>
          </div>
      </td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>

      
      
      </div>

      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td style="background:#F6F6F6; border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="40" valign="top">&nbsp;</td>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr><td height='25'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: center;'>
                              <h2 style="font-size: 16px;"><?= $meta_author ?></h2>
                              <p><?= $shop_address ?></p>
                              <p><?= $shop_phone ?> - <?= $shop_wa ?></p>
                              <p><?= $shop_email ?></p>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr><td height='24'></td></tr>
                    </table></td>
      <td width="40" valign="top">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>

      
      
      </div>

      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  		<tbody>
		    <tr>
		      <td height="20"></td>
		    </tr>
		</tbody>
	</table>
</div>

    <!--   <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="specbundle" valign="top" width="142" align="center"><div class='contentEditableContainer contentImageEditable'>
                      <div class='contentEditable'>
                        <img src="<?= base_url() ?>marketplace/images/side.png" alt="side image" width='142' height='142' data-default="placeholder" border="0">
                      </div>
                    </div></td>
      <td width="20" valign="top" class="spechide"></td>
      <td class="specbundle"><table width="100%" cellpadding="0" cellspacing="0" align="center">
                      <tr><td height='15'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: left;'>
                              <h2 style='font-size:16px;'>Sub Feature 1</h2>
                              <br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.</p>
                              <br>
                              <a target='_blank' href="#" class='link4' style='color:#27A1E5;' >read more</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table></td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>

      
      
      </div> -->
     <!--  <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" class="specbundle"><table width="100%" cellpadding="0" cellspacing="0" align="center">
                      <tr><td height='15'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: left;'>
                              <h2 style='font-size:16px;'>Sub Feature 2</h2>
                              <br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.</p>
                              <br>
                              <a target='_blank' href="#" class='link4' style='color:#27A1E5;' >read more</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table></td>
      <td width="20" class="spechide">&nbsp;</td>
      <td class="specbundle" valign="top" width="142" align="center"><div class='contentEditableContainer contentImageEditable'>
                      <div class='contentEditable'>
                        <img src="<?= base_url() ?>marketplace/images/side2.png" alt="side image" width='142' height='142' data-default="placeholder" border="0">
                      </div>
                    </div></td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
      
      
      </div>
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="specbundle" valign="top" width="142" align="center"><div class='contentEditableContainer contentImageEditable'>
                      <div class='contentEditable'>
                        <img src="<?= base_url() ?>marketplace/images/side3.png" alt="side image" width='142' height='142' data-default="placeholder" border="0">
                      </div>
                    </div></td>
      <td width="20" valign="top" class="spechide"></td>
      <td class="specbundle"><table width="100%" cellpadding="0" cellspacing="0" align="center">
                      <tr><td height='15'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: left;'>
                              <h2 style='font-size:16px;'>Sub Feature 3</h2>
                              <br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.</p>
                              <br>
                              <a target='_blank' href="#" class='link4' style='color:#27A1E5;' >read more</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table></td>
    </tr>
  </tbody>
</table></td>
    </tr>
    <tr><td height='40' colspan="3"></td></tr>
                <tr><td colspan="3"><hr style='height:1px;background:#DDDDDD;border:none;'></td></tr>
  </tbody>
</table>
      </div> -->
      
      <!-- =============== END BODY =============== -->
<!-- =============== START FOOTER =============== -->

     <!--  <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="48"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="90" class="spechide">&nbsp;</td>
      <td><table width="100%" cellpadding="0" cellspacing="0" align="center">
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: center;color:#AAAAAA;'>
                              <p>
                              Sent by [SENDER_NAME] <br/>
                              [CLIENTS.ADDRESS] <br/>
                              [CLIENTS.PHONE] <br/>
                              <a target='_blank' href="[FORWARD]" style='color:#AAAAAA;'>Forward to a friend</a> <br/>
                              <a target='_blank' href="[UNSUBSCRIBE]" style='color:#AAAAAA;' >Unsubscribe</a>
                              </p>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table></td>
      <td valign="top" width="90" class="spechide">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
      
      
      </div>
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="40"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="185" class="spechide">&nbsp;</td>
      <td class="specbundle2"><table width="100%" cellpadding="0" cellspacing="0" align="center">
                      <tr>
                        <td width='40'>
                          <div class='contentEditableContainer contentFacebookEditable'>
                            <div class='contentEditable' style='text-align: center;color:#AAAAAA;'>
                              <img src="<?= base_url() ?>marketplace/images/facebook.png" alt="facebook" width='40' height='40' data-max-width="40" data-customIcon="true" border="0" >
                            </div>
                          </div>
                        </td>
                        <td width='10'></td>
                        <td width='40'>
                          <div class='contentEditableContainer contentTwitterEditable'>
                            <div class='contentEditable' style='text-align: center;color:#AAAAAA;'>
                              <img src="<?= base_url() ?>marketplace/images/twitter.png" alt="twitter" width='40' height='40' data-max-width="40" data-customIcon="true" border="0">
                            </div>
                          </div>
                        </td>
                        <td width='10'></td>
                        <td width='40'>
                          <div class='contentEditableContainer contentImageEditable'>
                            <div class='contentEditable' style='text-align: center;color:#AAAAAA;'>
                              <img src="<?= base_url() ?>marketplace/images/red.png" alt="Pinterest" width='40' height='40' data-max-width="40" border="0">
                            </div>
                          </div>
                        </td>
                        <td width='10'></td>
                        <td width='40'>
                          <div class='contentEditableContainer contentImageEditable'>
                            <div class='contentEditable' style='text-align: center;color:#AAAAAA;'>
                              <img src="<?= base_url() ?>marketplace/images/blue.png" alt="Social media" width='40' height='40' data-max-width="40" border="0">
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table></td>
      <td valign="top" width="185" class="spechide">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    <tr>
    	<td height='40'></td>
    </tr>
  </tbody>
</table> -->

     <!-- =============== END FOOTER =============== --> 
      </div>
      </td>
    </tr>
  </tbody>
</table>
</td>
      <td valign="top" width="20">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>

<!--Default Zone

      <div class="customZone" data-type="image">
          <div class='movableContent'>
              <table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr><td height='40'></td></tr>
                <tr>
                  <td>
                    <div class='contentEditableContainer contentImageEditable'>
                      <div class='contentEditable' style="text-align: center;">
                        <img src="<?= base_url() ?>marketplace/images/bigImg.png" alt="Logo" width='580' height='221' data-default="placeholder" data-max-width="580">
                      </div>
                    </div>
                  </td>
                </tr>
              </table>  
            </div>
      </div>
      
      <div class='customZone' data-type="text">
      <div class='movableContent'>
              <table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr><td height='40'></td></tr>
                <tr>
                  <td style='border: 1px solid #EEEEEE; border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px'>
                    <table width="480" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr><td height='25'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: center;color:#AAAAAA;'>
                              <h2 style="font-size: 20px;">First Feature</h2>
                              <br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.</p>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr><td height='24'></td></tr>
                    </table>
                  </td>
                </tr>
              </table>  
            </div>          
              </div>
      
      <div class="customZone" data-type="imageText">
          <div class='movableContent'>
              <table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr><td height='40' colspan="3"></td></tr>
                <tr>
                  <td width='150'>
                    <div class='contentEditableContainer contentImageEditable'>
                      <div class='contentEditable'>
                        <img src="<?= base_url() ?>marketplace/images/side.png" alt="side image" width='142' height='142' data-default="placeholder" data-max-width="150">
                      </div>
                    </div>
                  </td>
                  <td width='20'></td>
                  <td width='410'>
                    <table width="410" cellpadding="0" cellspacing="0" align="center">
                      <tr><td height='15'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable'>
                              <h2 style='font-size:16px;'>Sub Feature 2</h2>
                              <br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.</p>
                              <br>
                              <a target='_blank' href="#" class='link4'  >read more</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr><td height='40' colspan="3"></td></tr>
                <tr><td colspan='3'><hr style='height:1px;background:#DDDDDD;border:none;'></td></tr>
              </table>  
            </div>
      </div>
      
      <div class="customZone" data-type="Textimage">
          <div class='movableContent'>
              <table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr><td height='40' colspan="3"></td></tr>
                <tr>
                  <td width='410'>
                    <table width="410" cellpadding="0" cellspacing="0" align="center">
                      <tr><td height='15'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable'>
                              <h2 style='font-size:16px;'>Sub Feature 2</h2>
                              <br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.</p>
                              <br>
                              <a target='_blank' href="#" class='link4' >read more</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td width='20'></td>
                  <td width='150'>
                    <div class='contentEditableContainer contentImageEditable'>
                      <div class='contentEditable'>
                        <img src="<?= base_url() ?>marketplace/images/side2.png" alt="side image" width='142' height='142' data-default="placeholder" data-max-width="150">
                      </div>
                    </div>
                  </td>
                </tr>
                <tr><td height='40' colspan="3"></td></tr>
                <tr><td colspan='3'><hr style='height:1px;background:#DDDDDD;border:none;'></td></tr>
              </table>  
            </div>
      </div>

      <div class="customZone" data-type="textText">
          <div class='movableContent'>
              <table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr><td height='40' colspan="3"></td></tr>
                <tr>
                  <td width='252'>
                    <table width='252' border='0' cellpadding="0" cellspacing="0" align="center">
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: left;'>
                              <h2 style="font-size: 20px;">Subtitle</h2>
                              <br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.
                              </p>
                              <br><br>
                              <a target='_blank' href="#" class='link2'>Call to action</a>
                              <br>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td width='75'></td>
                  <td width='252'>
                    <table width='252' border='0' cellpadding="0" cellspacing="0" align="center">
                      <tr>
                        <td>
                           <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: left;'>
                              <h2 style="font-size: 20px;">Subtitle</h2>
                              <br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.
                              </p>
                              <br><br>
                              <a target='_blank' href="#" class='link2'>Call to action</a>
                              <br>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>  
            </div>
      </div>

      <div class="customZone" data-type="qrcode">
          <div class='movableContent'>
              <table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr><td height='40' colspan="3"></td></tr>
                <tr>
                  <td width='75' valign='middle' style='vertical-align:middle;'>
                    <div class='contentEditableContainer contentQrcodeEditable'>
                      <div class='contentEditable' style='text-align:center;'>
                        <img src="/applications/Mail_Interface/3_3/modules/User_Interface/core/v31_campaigns/<?= base_url() ?>marketplace/images/neweditor/default/qr_code.png" width="75" height='75'>
                      </div>
                    </div>
                  </td>
                  <td width='20'></td>
                  <td width='485'>
                    <table width="485" cellpadding="0" cellspacing="0" align="center">
                      <tr><td height='15'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable'>
                              <h2 style='font-size:16px;'>Sub Feature 1</h2>
                              <br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.</p>
                              <br>
                              <a target='_blank' href="#" class='link4'  >read more</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr><td height='40' colspan="3"></td></tr>
                <tr><td colspan='3'><hr style='height:1px;background:#DDDDDD;border:none;'></td></tr>
              </table>  
            </div>
      </div>
      
      <div class="customZone" data-type="gmap">
          <div class='movableContent'>
              <table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr><td height='40' colspan="3"></td></tr>
                <tr>
                  <td width='250' valign='middle' style='vertical-align:middle;'>
                    <div class='contentEditableContainer contentGmapEditable'>
                      <div class='contentEditable' >
                        <img src="/applications/Mail_Interface/3_3/modules/User_Interface/core/v31_campaigns/<?= base_url() ?>marketplace/images/neweditor/default/gmap_example.png" width="150" height='150' data-default="placeholder">
                      </div>
                    </div>
                  </td>
                  <td width='20'></td>
                  <td width='310'>
                    <table width="310" cellpadding="0" cellspacing="0" align="center">
                      <tr><td height='15'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable'>
                              <h2 style='font-size:16px;'>Sub Feature 3</h2>
                              <br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.</p>
                              <br>
                              <a target='_blank' href="#" class='link4'  >read more</a>
                            </div>
                          </div>
                        </td>

                      </tr>
                    </table>
                  </td>
                </tr>
                <tr><td height='40' colspan="3"></td></tr>
                <tr><td colspan='3'><hr style='height:1px;background:#DDDDDD;border:none;'></td></tr>
              </table>  
            </div>
      </div>

      <div class="customZone" data-type="social">
          <div class="movableContent">
              <div >
                  <table width='600' cellpadding="0" cellspacing="0" border="0" >
                    <tr>
                    <td height='42' colspan='4'>&nbsp;</td>
              </tr>
                      <tr>
                          <td valign='top' colspan="4" style='padding:0 20px;'>
                              <div class="contentTextEditable contentEditableContainer">
                                  <div style='text-align:center;' class="contentEditable">
                                      <h2 class='big'>This is a subtitle</h2>
                                  </div>
                              </div>
                          </td>
                      </tr>
                      <tr><td height='30'></td></tr>
                      <tr>
                          <td width='62' valign='top' valign="top" width="62" style='padding:0 0 0 20px;'>
                              <div class="contentEditableContainer contentTwitterEditable">
                                  <div class="contentEditable">
                                      <img src="/applications/Mail_Interface/3_3/modules/User_Interface/core/v31_campaigns/<?= base_url() ?>marketplace/images/neweditor/default/icon_twitter.png" width="42" height="42" data-customIcon="true" data-noText="false" data-max-width='42'>
                                  </div>
                              </div>
                          </td>
                          <td width='216' valign='top' >
                              <div class="contentEditableContainer contentTextEditable">
                                  <div  class="contentEditable">
                                      <p >Follow us on Twitter to stay up to date with company news and other information.</p>
                                  </div>
                              </div>
                          </td>
                          <td width='62' valign='top' valign="top" width="62">
                              <div class="contentEditableContainer contentFacebookEditable">
                                  <div class="contentEditable">
                                      <img src="/applications/Mail_Interface/3_3/modules/User_Interface/core/v31_campaigns/<?= base_url() ?>marketplace/images/neweditor/default/icon_facebook.png" width="42" height="42" data-customIcon="true" data-noText="false" data-max-width='42'>
                                  </div>
                              </div>
                          </td>
                          <td width='216' valign='top' style='padding:0 20px 0 0;'>
                              <div class="contentEditableContainer contentTextEditable">
                                  <div  class="contentEditable">
                                      <p >Like us on Facebook to keep up with our news, updates and other discussions.</p>
                                  </div>
                              </div>
                          </td>
                      </tr>
                  </table>
              </div>
          </div>
      </div>

      <div class="customZone" data-type="twitter">
          <div class="movableContent">
              <div '>
                  <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                    <td height='42'>&nbsp;</td>
                    <td height='42'>&nbsp;</td>
              </tr>
                      <tr>
                          <td valign='top' valign="top" width="62" style='padding:0 0 0 20px;'>
                              <div class="contentEditableContainer contentTwitterEditable">
                                  <div class="contentEditable">
                                      <img src="/applications/Mail_Interface/3_3/modules/User_Interface/core/v31_campaigns/<?= base_url() ?>marketplace/images/neweditor/default/icon_twitter.png" width="42" height="42" data-customIcon="true" data-noText="false" data-max-width='42'>
                                  </div>
                              </div>
                          </td>
                          <td valign='top' style='padding:0 20px 0 0;'>
                              <div class="contentEditableContainer contentTextEditable">
                                  <div  class="contentEditable">
                                      <p >Follow us on Twitter to stay up to date with company news and other information.</p>
                                  </div>
                              </div>
                          </td>
                      </tr>
                  </table>
              </div>
          </div>
      </div>
      
      <div class="customZone" data-type="facebook">
          <div class="movableContent">
              <div >
                  <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                    <td height='42'>&nbsp;</td>
                    <td height='42'>&nbsp;</td>
              </tr>
                      <tr>
                          <td valign='top' valign="top" width="62" style='padding:0 0 0 20px;'>
                              <div class="contentEditableContainer contentFacebookEditable">
                                  <div class="contentEditable">
                                      <img src="/applications/Mail_Interface/3_3/modules/User_Interface/core/v31_campaigns/<?= base_url() ?>marketplace/images/neweditor/default/icon_facebook.png" width="42" height="42" data-customIcon="true" data-noText="false" data-max-width='42'>
                                  </div>
                              </div>
                          </td>
                          <td valign='top' style='padding:0 20px 0 0;'>
                              <div class="contentEditableContainer contentTextEditable">
                                  <div  class="contentEditable">
                                      <p >"Like us on Facebook to keep up with our news, updates and other discussions.</p>
                                  </div>
                              </div>
                          </td>
                      </tr>
                  </table>
              </div>
          </div>
      </div>

      <div class="customZone" data-type="line">
          <div class='movableContent'>
                <table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr><td height='40'></td></tr>
                  <tr><td height='1' bgcolor='#DDDDDD'></td></tr>
                </table>
              </div>
      </div>


      <div class="customZone" data-type="colums1v2"><div class='movableContent'>
                          <table width="580" border="0" cellspacing="0" cellpadding="0" align="center" >
                            <tr><td height='40'></td></tr>
                            <tr>
                              <td align="left" valign="top" class="newcontent">
                                
                              </td>
                            </tr>
                          </table>
                    </div>
      </div>

      <div class="customZone" data-type="colums2v2"><div class='movableContent'>
                      <table width="580" border="0" cellspacing="0" cellpadding="0" align="center" valign='top'>
                        <tr><td colspan='3' height='40'></td></tr>
                        <tr>
                          <td width='280'  valign='top' class="newcontent">
                            
                          </td>

                          <td width='20'></td>
                          
                          <td width='280' valign='top' class="newcontent">
                            
                          </td>
                        </tr>
                      </table>
                    </div>
      </div>

      <div class="customZone" data-type="colums3v2"><div class='movableContent'>
                      <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" valign='top'>
                        <tr><td colspan='5' height='40'></td></tr>
                        <tr>
                          <td width='186'  valign='top' class="newcontent">
                            
                          </td>

                          <td width='10'></td>
                          
                          <td width='187'  valign='top' class="newcontent">
                            
                          </td>

                          <td width='10'></td>
                          
                          <td width='186'  valign='top' class="newcontent">
                            
                          </td>
                        </tr>
                      </table>
                    </div>
      </div>

      <div class="customZone" data-type="textv2">
              
        <div class='contentEditableContainer contentTextEditable'>
          <div class='contentEditable' style='text-align: center;'>
            <h2 style="font-size: 20px;">First Feature</h2>
            <br>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
        </div>
                        
      </div>





    -->
    <!--Default Zone End-->

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
