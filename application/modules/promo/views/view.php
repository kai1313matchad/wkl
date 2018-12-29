
<?php
$search_promo = base_url().'promo/search_promo';    
?>
<div class="row">
	<div class="col-sm-8 col-md-9"></div>
	<div class="sidebar col-sm-4 col-md-3">
		<div class="with-icon full-width">
	        <form class="search-article" action="<?= $search_promo ?>" method="post">
	            <input type="text" class="input-text full-width" placeholder="cari promosi" id="inputPromo" name="keywords" onClick="disAutoCom(this);" style="background: #fff !important; ">
	            <button type="submit" class="icon green-bg white-color"><i class="soap-icon-search"></i></button>
	        </form>
	        <div id="result-suggestions"></div>
	    </div>
	</div>
</div>
<br>
<div class="row">

	<!-- sidebar here -->
    <div class="sidebar col-sm-4 col-md-3">
    	<?= Modules::run('promo/_draw_sidebar') ?>
    </div>

    <div id="main" class="col-sm-8 col-md-9">
        <div class="page">
           	<div class="post-content">
           		<div class="blog-infinite">
           			<div class="post">
                        <div class="post-content-wrapper">
                            <figure class="image-container">
                            	<?php
                            	$image_location = base_url().'marketplace/promo/'.$featured_image;
                            	?>
                                <a href="pages-blog-read.html" class="hover-effect"><img src="<?= ($featured_image != '') ? $image_location : 'http://placehold.it/870x342' ?>" alt=""></a>
                            </figure>
                            <div class="details">
                                <h2 class="entry-title"><a href="pages-blog-read.html"><?= $title ?></a></h2>
                                <div class="excerpt-container">
                                    <?= $promo_desc ?>
                                </div>
                                <div id="flight-details">
	                                <div class="intro table-wrapper full-width hidden-table-sm box">
	                                	<!-- <div class="col-md-4" id="info-promo" style="background: #ff3e3e; padding: 25px 25px 20px 25px;">info</div>
	                                    <div class="col-md-8 travelo-box">
	                                        <dl class="term-description">
	                                            <dt>Minimum Pembayaran:</dt><dd><?= $min_basket_cost ?></dd>
	                                            <dt>Kode Promo:</dt><dd><?= $voucher_code ?></dd>
	                                            <dt>Masa Berlaku:</dt><dd><?= $start.' - '.$end ?></dd>
	                                        </dl>
	                                    </div> -->
	                                    <table class="" style="width: 100%;">
	                                    	<tbody>
	                                    		<tr>
	                                    			<td valign="top" width="20%" class="info-promo" style="padding: 15px 15px 20px 15px; background: #ff3e3e;">
	                                    				<div class="u-pad--3">
	                                    					<img height="24" src="https://s1.bukalapak.com/images/desktop/promo/promo-info.png" width="24" class=""> 
	                                    					<br> 
	                                    					<div class="" style="color: #fff; font-weight: bold;">
																INFO
																<br>
																PROMO
															</div>
														</div>
													</td> 
													<td class="" style="padding: 15px 15px 20px 15px; background: #fff;">
														<table style="font-size: 14px;">
															<tr width="100%">
																<td width="40%">Minimum Pembayaran</td>
																<td width="50%" style="font-weight: bold;">Rp. <?= $min_basket_cost ?></td>
																<td></td>
															</tr>
															<tr>
																<td>Kode Promo</td>
																<td style="font-weight: bold;"><?= $voucher_code ?></td>
																<td style="text-align: right;">Salin</td>
															</tr>
															<tr>
																<td>Masa Berlaku</td>
																<td style="font-weight: bold;"><?= $start.' - '.$end ?></td>
																<td></td>
															</tr>
														</table>
														
												</td>
											</tr>
										</tbody>
									</table>

	                                </div>
                                </div>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					                <div class="panel panel-default">
					                    <div class="panel-heading" role="tab" id="headingTwo">
					                      <h4 class="panel-title">
					                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					                          Syarat dan Ketentuan
					                            <i class="fa fa-chevron-up pull-right"></i>
					                        </a>
					                      </h4>
					                    </div>
					                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
					                      <div class="panel-body">
					                        <?= $term_condition ?>
					                      </div>
					                    </div>
					                </div>
					            </div>
                                
                            </div>
                        </div>
                    </div>
           		</div>
           	</div>
        </div>
    </div>
    

    

</div>

<script type="text/javascript">
tjq(function() {
    function toggleChevron(e) {
        tjq(e.target)
            .prev('.panel-heading')
            .find("i")
            .toggleClass('fa-chevron-down');
    }
    tjq('#accordion').on('hidden.bs.collapse', toggleChevron);
    tjq('#accordion').on('shown.bs.collapse', toggleChevron);
});

var h8 = document.querySelector('.travelo-box').clientHeight;
console.log(h8);
document.getElementById('info-promo').style.height = h8+'px';
</script>

<script>
tjq(document).ready(function() {
    tjq("#inputPromo").keyup(function() {
      var inpstr = tjq(this).val();
      if (inpstr.length > 3) {
          tjq.ajax({
              type: "post",
              url: "<?= base_url('promo/live_search') ?>",
              data: {liveSearch:inpstr},
              cache: false,
              success: function (res) {
                  tjq("#result-suggestions").fadeIn();
                  tjq("#result-suggestions").html(res);
              }
          });
  
          tjq("input#inputPromo").blur(function () {
              tjq('#result-suggestions').fadeOut();
          });
      }
  });
});
/* Disable autocomplete */
var flag = 1;
   function disAutoCom(obj){
        if(flag){
        obj.setAttribute("autocomplete","off");
            flag = 0;
      }
        obj.focus();
}
</script>