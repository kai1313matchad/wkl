<style type="text/css">
	.slidebg {
		height: 550px;
	}
</style>

<ul class="slides">
 	 <?php
    foreach ($query->result() as $row) {
    $location = base_url().'marketplace/banner/2080x646/'.$row->big_pic;
    ?>
    <li>
        <div class="slidebg" style="background-image: url('<?= $location ?>');"></div>
    </li>

   <?php } ?>
</ul>              