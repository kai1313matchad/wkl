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




<div class="section2 container">
                <h2>Promosi</h2>


                <div class="row image-box hotel listing-style1">
                	<?php
                	$this->load->module('timedate');
                	if (isset($query)) {
                		foreach ($query->result() as $row) {
                			$image_location = base_url().'marketplace/promo/'.$row->featured_image;
                			$view_promo = base_url()."promo/view/".$row->promo_slug;
                			$pic = $row->featured_image;
                			$title = $row->promo_title;
                			$kode_voucher = $row->voucher_code;
                			$desc = word_limiter($row->promo_desc, 18);
                			$start = $this->timedate->get_nice_date($row->start, 'indon2');
                			$end = $this->timedate->get_nice_date($row->end, 'indon2');
                    ?>
                    <div class="col-sms-6 col-sm-6 col-md-4">
                        <article class="box">
                            <figure class="animated fadeInDown" data-animation-type="fadeInDown" data-animation-delay="1.2" style="animation-duration: 1s; animation-delay: 1.2s; visibility: visible;">
                                <a class="hover-effect popup-gallery" href="<?= $view_promo ?>" title=""><img width="270" height="160" src="<?= ($pic != '') ? $image_location : 'http://placehold.it/270x160' ?>" alt=""></a>
                            </figure>
                            <div class="details">
                                <div class="text-center">
                                    <a href="<?= $view_promo ?>"><h3 class="box-title" style="font-weight: bold;"><?= $title ?></h3></a>
                                </div>
                                
                                
                                <div class="feedback" style="text-align: center;">
                                    <div class="col-sms-12">Kode Voucher </div>
                                    <div class="col-sms-12"><span style="color: #7db921; font-weight: bold; font-size: 22px;"><?= $kode_voucher ?></span></div>
                                    
                                </div>
                                <h3 class="box-title"><span style="font-size: 14px; font-weight: bold;">Masa berlaku</span><small><?= $start ?> <span style="text-transform: lowercase;">s/d</span> <?= $end ?></small></h3>
                                <p class="description"><?= $desc ?></p>
                                <div class="action">
                                    <a href="hotel-detailed.html" class="button btn-small">SALIN KODE</a>
                                    <a href="<?= $view_promo ?>" class="button btn-small yellow popup-map">LIHAT PROMO</a>
                                </div>
                            </div>
                        </article>
                        
                    </div>
                <?php } } ?>
                    <div class="pull-right">
                        <?= $pagination ?>
                    </div>
                </div>
            </div>

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