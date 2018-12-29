<ul class="slides" style="width: 1200%; transition-duration: 0.6s; transform: translate3d(0px, 0px, 0px);">
	<?php
    foreach ($query->result() as $row) {
    $location = base_url().'marketplace/clients/160x60/'.$row->image;
    ?>
    <li style="width: 170px; float: left; display: block;">
        <div class="travelo-box">
            <a href="#"><img src="<?= $location ?>" alt="" draggable="false" style="opacity: 1;"></a>
        </div>
    </li>
    <?php } ?>
</ul>