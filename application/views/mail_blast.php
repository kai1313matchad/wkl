<!DOCTYPE html>
<html>
<head>
	<title>mail</title>
</head>
<body>
	<ul>
	<?php foreach ($products->result() as $produk) { 
		$image_location = base_url().'marketplace/limapuluh/900x500/'.$produk->limapuluh;
	?>
		<li><img src="<?= $image_location ?>" width="200px"></li>	
	<?php } ?>
	</ul>
</body>
</html>