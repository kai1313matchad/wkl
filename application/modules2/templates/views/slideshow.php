<style type="text/css">
	.search-box {
		*margin-top: 140px !important;
	}

	.filter-box > .page-title {
	    font-size: 4.1667em;
	    font-weight: bold;
	    display: none;
	}

	.filter-box > .page-description {
	    font-size: 2.5em;
	    margin-bottom: 50px;
	}

	.filter-box > .page-title, .filter-box > .page-description {
		display: block;
		position: relative;
		z-index: 99999;
		color: #fff;
	}

	.page-title, .page-description {
		top: 340px;
	}

	.search-box {
		top: 400px;
	}

	.filtering h1, .filtering h2 {
		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
	}

	#ghost {
		*color: #00BF5C;
		color: #01b7f2;
		*text-decoration: underline;
	}

	.unshow {
		display: none;
	}
</style>

<section id="content" class="slideshow-bg">

	<div id="slideshow">
	    <div class="flexslider">
	        <?= Modules::run('slideshow/draw_slideshow') ?>
	    </div>
	</div>

	<div class="container">

	    <div id="main" class="filter-box filtering">
	        <!-- <h1 class="page-title unshow">Cari Media Iklan <span id="ghost"></span></h1>
	        <h2 class="page-description col-md-6 no-float no-padding unshow">Kami menghadirkan pengalaman pemesanan media iklan yang modern, nyaman, dan terhubung.</h2> -->
	        <div class="search-box-wrapper style2">
	            <div class="search-box">
	                <?= Modules::run('filter_nav/_draw_search_filter') ?>
	                
	            </div>
	        </div>
	    </div>
	    
	</div>

</section>