<div class="container">
            <h2>Rekomendasi Lokasi</h2>
            <div class="block image-carousel style2 flexslider2" data-animation="slide" data-item-width="270" data-item-margin="30">
                
                <div class="flex-viewport" style="overflow: hidden; position: relative;">
                    <ul class="slides image-box listing-style2" style="width: 1000%; transition-duration: 0.6s; transform: translate3d(0px, 0px, 0px);">

                    	<?= Modules::run('manage_product/draw_recomm_product',$update_id) ?>
                 
                    </ul>
                </div>
                <ol class="flex-control-nav flex-control-paging">
                    <li><a class="flex-active">1</a></li>
                    <li><a class="">2</a></li>
                </ol>
                <ul class="flex-direction-nav">
                    <li><a class="flex-prev" href="#">Previous</a></li>
                    <li><a class="flex-next" href="#">Next</a></li>
                </ul>
            </div>
            
        </div>