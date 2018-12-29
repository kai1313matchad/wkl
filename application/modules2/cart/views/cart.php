

<style type="text/css">
	.listing-style3 .box {
		box-shadow: 0 5px 20px 0 rgba(80,106,172,0.3);
	}
	.no_item {
		text-align: center;

	}
</style>

<div class="container">

<div>
    <h1>Keranjang Pemesanan</h1>
    <div class="image-style2 style2 clearfix">
        <div class="row">

            
<?php
if ($num_rows < 1) { ?>
	<div class="no_item">
		<h3>Keranjang pemesanan masih kosong.</h3>
		<div class="">
			<a href="<?= base_url() ?>" class="button btn-medium red">Cari Lokasi Sekarang</a>
		</div>
	</div>
<?php } else { ?>	
	<div class="no_item">
		<h3><?= $showing_statement ?></h3>
	</div>
<?php
$user_type = 'public';
echo Modules::run('cart/_draw_cart_contents', $query, $user_type);
} ?>
			
			   
        </div>
    </div>
</div>

</div>