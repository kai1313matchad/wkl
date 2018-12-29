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
      			<td>
      				<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="font-family:helvetica, sans-serif;" class="MainContainer">
      <!-- =============== START HEADER =============== -->
  						<tbody>
    						<tr>
      							<td>
      								<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
      <td valign="middle" style='vertical-align: middle;' width='150'>
          <div class='contentEditableContainer contentTextEditable'>
            <div class='contentEditable' style='text-align: right; font-size: 16px; font-weight: bold; color: #AAAAAA;'>
            	Penawaran
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
 
<?php
$client = Client::view_by_id($user_id);  
?>      
    
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height='20'></td>
    </tr>
    <tr>
      <td style="background: #f6f6f6; border: 1px solid #EEEEEE; border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="40">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr><td height='25'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: center;'>
                              <h2 style="font-size: 20px; font-weight: bold;"><?= ucwords($client->username) ?> - <?= $client->company ?></h2>
                              <p><?= $client->alamat ?></p>
                              <p><?= $client->no_telp ?></p>
                              <p><?= $client->email ?></p>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr><td height='24'></td></tr>
                    </table></td>
      <td valign="top" width="40">&nbsp;</td>
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
      			<td height='20'></td>
    		</tr>
    		<tr>
      			<td style="font-size: 18px; font-weight: bold; color: #AAAAAA;">Lokasi</td>
    		</tr>
    	</tbody>
    </table>
</div>    
    
      
<?php
  $i = 1; 
  $this->load->module('manage_product');
    $this->load->module('store_categories');
    $this->load->module('store_labels');
    $this->load->module('store_sizes');
    $this->load->module('store_roads');
    $this->load->module('store_provinces');
    $this->load->module('store_cities');
    $this->load->module('site_settings');
    $this->load->module('timedate');
    // $products = $this->db->get_where('store_basket', array('shopper_id' => 1009));
  foreach ($products->result() as $produk) {
    $id = $produk->item_id;
    $prod = App::view_by_id($id);
    $kategori_produk = $this->store_categories->get_name_from_category_id($prod->cat_prod);
    $image_location = base_url().'marketplace/limapuluh/70x70/'.$prod->limapuluh;
    // iki nyoba gambar 
    $image_location2 = base_url().'marketplace/limapuluh/'.$prod->limapuluh;
    $alamat = $prod->item_title;
    $code = base_url().'marketplace/qr/'.$prod->qr_code;
    $prov = $this->store_provinces->get_name_from_province_id($prod->cat_prov);
    $kota = ucwords(strtolower($this->store_cities->get_name_from_city_id($prod->cat_city)));
    $jalan = $this->store_roads->get_name_from_road_id($prod->cat_road);
    $price = $produk->price;
    $display = $this->manage_product->get_name_from_display_id($prod->cat_type);
    $start = $this->timedate->get_nice_date($produk->start, 'indo'); 
    $end = $this->timedate->get_nice_date($produk->end, 'indo');
    $jml_sisi = $this->manage_product->show_amount_side($prod->jml_sisi);
    $tipe_cahaya = $this->manage_product->get_name_from_light_id($prod->cat_light);
    $durasi = $produk->duration;
    $size = $this->store_sizes->get_name_from_size_id($prod->cat_size);
    $lat = $prod->lat;
    $lng = $prod->long;
    $ket_lokasi = $this->manage_product->show_ket_lokasi($prod->ket_lokasi);
    $prod_code = $prod->prod_code;
  ?>


      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>

              <td width="20" valign="top" class="spechide"></td>
              <td class="specbundle">
                <table width="100%" cellpadding="0" cellspacing="0" align="center">
                    <tr><td height='5'></td></tr>
                    <tr>
                    	<td width="5%" style="font-weight: bold; color: #AAAAAA;"><?= $i++ ?>.</td>
                      <td>
                        <div class='contentEditableContainer contentTextEditable'>
                          <div class='contentEditable' style='text-align: left;'>
                            <h2 style='font-size:16px; font-weight: bold; color: #AAAAAA;'><?= $alamat ?></h2>
                            <p><span class="" style="color: blue; font-size: 11px;">#<?= $prod_code ?> - <?= $kategori_produk ?></span></p>
                            <p><?= $prov ?> - <?= $kota ?> - <?= $jalan ?></p>
                            <p><?= $durasi ?> bulan (<?= $start ?> - <?= $end ?>) <span><?= $price ?></span></p>
                            <p><?= $display ?> - <?= $size ?> m</p>
                            <p><?= $jml_sisi ?> - <?= $tipe_cahaya ?></p>
                            </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    
    <tr><td height='5' colspan="3"></td></tr>
    <tr><td colspan="3"><hr style='height:1px;background:#eee;border:none;'></td></tr>

  </tbody>
</table>
      </div>


<?php } ?>

      <!-- <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
            <tr><td height='40' colspan="3"></td></tr>
                <tr><td colspan="3"><hr style='height:1px;background:#DDDDDD;border:none;'></td></tr>
          </tbody>
        </table>
      </div> -->
      
      <!-- =============== END BODY =============== -->
<!-- =============== START FOOTER =============== -->

      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
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
                              <span style="font-weight: bold; font-size: 16px;"><?= $meta_author ?></span> <br/>
                              <?= $shop_address ?> <br/>
                              <?= $shop_phone ?> - <?= $shop_wa ?> <br/>
                              <?= $shop_email ?> <br/>
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
		      <td height="48"></td>
		    </tr>
		</tbody>
	</table>
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

  </body>
  </html>
