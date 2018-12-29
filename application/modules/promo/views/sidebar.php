

<?php
foreach ($recents->result() as $row) {
	$image_location = base_url().'marketplace/promo/'.$row->featured_image;

?>
<article class="detailed-logo">
    <figure>
        <img src="<?= ($row->featured_image != '') ? $image_location : 'http://placehold.it/270x160' ?>" alt="">
    </figure>
    <div class="details">
        <h2 class="box-title"><?= $row->promo_title ?></h2>
       <!--  <span class="price clearfix">
            <small class="pull-left">avg/person</small>
            <span class="pull-right">$620</span>
        </span>
         -->
       <!--  <div class="duration">
            <dl>
                <dt class="skin-color">masa berlaku:</dt>
                <dd>13 Hour, 40 minutes</dd>
            </dl>
        </div> -->
        
        <a href="<?= base_url().'promo/view/'.$row->promo_slug ?>" class="button green full-width uppercase btn-medium">Lihat Promo</a>
    </div>
</article>

<?php } ?>