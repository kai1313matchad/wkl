    <div class="row1">
    	<h2>Klien</h2>
    	<div class="investor-slideshow image-carousel style2 investor-list" data-animation="slide" data-item-width="170" data-item-margin="30">


    	    <div class="flex-viewport" style="overflow: hidden; position: relative;">
                
    	    	 <!-- <?= Modules::run('client/_draw_our_clients') ?> -->

                 <?= Modules::run('manage_product/_draw_our_clients') ?>

            </div>
            <ol class="flex-control-nav flex-control-paging">
                <li><a class="">1</a></li>
                <li><a class="flex-active">2</a></li>
            </ol>
            <ul class="flex-direction-nav">
                <li><a class="flex-prev" href="#">Previous</a></li>
                <li><a class="flex-next" href="#">Next</a></li>
            </ul>
        </div>
    </div>