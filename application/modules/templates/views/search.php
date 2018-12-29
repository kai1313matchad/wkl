<?php
$search_loc = base_url().'store_categories/search_loc';    
?>

<style type="text/css">
    #suggestions a {
        color: #fdb714;
    }    
</style>

   <div class="page-title pull-right" style="width: 80%;">
            <div id="search-box" class="flright">
                <form action="<?= $search_loc ?>" method="post" name="search-form">
                    <input name="keywords" type="text" class="input-text full-width" />
                    <span class="img-search">
                    	<i class="soap-icon-search"></i>
                    </span>
                </form>
            </div>
           
        </div>