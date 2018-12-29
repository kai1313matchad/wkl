<style type="text/css">
	.breadcrumb>li+li:before {
	    content: "›\00a0";
	    padding: 0 5px;
	    color: #ccc;
	}
</style>

<div class="row">
	
	<ol class="breadcrumb">
		<?php
			foreach ($breadcrumbs_array as $key => $value) {
				echo '<li><a href="'.$key.'">'.$value.'</a></li>';
			}
		?>
		<li class="title"><?= $current_page_title ?></li>
	</ol>
	
</div>

<!-- <ul class="breadcrumbs pull-left">
 	<?php
 		foreach ($breadcrumbs_array as $key => $value) {
 			echo '<li><a href="'.$key.'">'.$value.'</a></li>';
 		}
 	?>
    <li class="active"><?= $current_page_title ?></li>
</ul> -->

