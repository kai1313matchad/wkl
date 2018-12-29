<style>

.place {
	margin-bottom: 20px;
}

  .b-blocks__item {
    background: #647b86;
    background-clip: content-box;
    border-bottom: 4px solid transparent;
    border-right: 4px solid transparent;
    display: block;
    float: left;
    min-height: 320px;
    overflow: hidden;
    position: relative;
    text-decoration: none;
    vertical-align: top;
    width: 100%
}

@media only screen and (min-width: 600px) and (max-width: 999px) {
    .b-blocks__item {
        width: 33.3%
    }
}

@media only screen and (min-width: 1000px) {
    .b-blocks__item {
        width: 25%
    }
}

.b-blocks__item::after {
    background: rgba(0, 0, 0, 0.35);
    bottom: 0;
    content: '';
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    -webkit-transition: background .25s;
    transition: background .25s
}

.b-blocks__item:hover,
.b-blocks__item:focus {
    text-decoration: none
}

.b-blocks__item:hover::after,
.b-blocks__item:focus::after {
    background: rgba(0, 0, 0, 0.5)
}

.b-blocks__item:hover .b-blocks__item-image,
.b-blocks__item:focus .b-blocks__item-image {
    -webkit-transform: scale(1.05);
    -ms-transform: scale(1.05);
    transform: scale(1.05)
}

.b-blocks__item:hover .b-blocks__item-title,
.b-blocks__item:hover .b-blocks__item-category,
.b-blocks__item:focus .b-blocks__item-title,
.b-blocks__item:focus .b-blocks__item-category {
    -webkit-transform: translateY(-15px);
    -ms-transform: translateY(-15px);
    transform: translateY(-15px)
}

@media only screen and (min-width: 600px) and (max-width: 999px) {
    .b-blocks__item--double {
        width: 66.6%
    }
}

@media only screen and (min-width: 1000px) {
    .b-blocks__item--double {
        width: 50%
    }
}

.b-blocks__item-inner {
    bottom: 0;
    left: 0;
    padding: 20px;
    position: absolute;
    right: 0;
    top: 0;
    width: 100%
}

.b-blocks__item-body {
    bottom: 20px;
    left: 20px;
    position: absolute;
    right: 20px
}

.b-blocks__item-tag,
.b-blocks__item-title,
.b-blocks__item-category {
    color: #fff;
    display: block;
    font-size: 14px;
    position: relative;
    text-shadow: 1px 1px #333;
    -webkit-transition: -webkit-transform .25s;
    transition: -webkit-transform .25s;
    transition: transform .25s;
    transition: transform .25s, -webkit-transform .25s;
    word-break: break-word;
    z-index: 1
}

.b-blocks__item-tag {
    font-size: 22px;
    left: 20px;
    position: absolute;
    top: 30px
}

.b-blocks__item-title {
    font-size: 20px;
    line-height: 1.2;
    margin-bottom: 7px
}

.b-blocks__item-category {
    font-size: 16px
}

.b-blocks__item-image {
    left: 0;
    min-height: 100%;
    min-width: 100%;
    position: absolute;
    top: 0;
    -webkit-transition: -webkit-transform .25s;
    transition: -webkit-transform .25s;
    transition: transform .25s;
    transition: transform .25s, -webkit-transform .25s
}

</style>

<?php
$path_place_location = base_url().'marketplace/place/';
?>

<div class="container">
    <div class="section2 place">     
    <?php
    foreach ($places->result() as $filter) {
    	$place_icon = $path_place_location.$filter->big_pic;	
        $filter_loc = base_url().'category/search/'.$filter->cat_url;
        $place_name = $filter->cat_title;
    ?>   
      <a href="<?= $filter_loc ?>" class=" b-blocks__item">
      	<div class="c-blocks__item-body">
	        <span class="b-blocks__item-title"><?= $place_name ?></span>
	      </div>
        <img class="b-blocks__item-image" src="<?= $place_icon ?>">
      </a>
    <?php } ?>  
      
      <!-- <a class=" b-blocks__item">
      	<div class="c-blocks__item-body">
	        <span class="b-blocks__item-title">Suara dan Gambar SphereTones Fuses</span>
	      </div>
        <img class="b-blocks__item-image" src="<?= base_url() ?>marketplace/place/block-2.png">
      </a>

      <a class=" b-blocks__item">
      	<div class="c-blocks__item-body">
	        <span class="b-blocks__item-title">Suara dan Gambar SphereTones Fuses</span>
	      </div>
        <img class="b-blocks__item-image" src="<?= base_url() ?>marketplace/place/block-3.png">
      </a>

      <a class=" b-blocks__item">
      	<div class="c-blocks__item-body">
	        <span class="b-blocks__item-title">Suara dan Gambar SphereTones Fuses</span>
	      </div>
        <img class="b-blocks__item-image" src="<?= base_url() ?>marketplace/place/block-4.png">
      </a>

      <a class=" b-blocks__item">
      	<div class="c-blocks__item-body">
	        <span class="b-blocks__item-title">Suara dan Gambar SphereTones Fuses</span>
	      </div>
        <img class="b-blocks__item-image" src="<?= base_url() ?>marketplace/place/block-5.png">
      </a>

      <a class=" b-blocks__item">
      	<div class="c-blocks__item-body">
	        <span class="b-blocks__item-title">Suara dan Gambar SphereTones Fuses</span>
	      </div>
        <img class="b-blocks__item-image" src="<?= base_url() ?>marketplace/place/block-6.png">
      </a> -->
    </div>  
</div>
  
<script type="text/javascript">
  var anchor = document.querySelectorAll('.b-blocks__item');
  anchor[0].classList.add('b-blocks__item--double');
  anchor[5].classList.add('b-blocks__item--double');
  anchor[7].classList.add('b-blocks__item--double');
</script>