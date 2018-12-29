<ul>
 	 <?php
    foreach ($query->result() as $row) {
    $location = base_url().'marketplace/banner/2080x646/'.$row->big_pic;
    $link = $row->anchor;
    ?>
    <li data-transition="zoomin" data-slotamount="7" data-masterspeed="1500">
    	<img src="<?= $location ?>" alt="">
        <a href="<?= ($link != '')? $link : '#' ?>">
            
        </a>
    </li>

   <?php } ?>
</ul>  