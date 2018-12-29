

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					<?= $headline ?>
				</h3>
			</div>
		</div>
		<?php 
		$upload_image = base_url()."store_categories/upload_image/".$update_id;
		$delete_image = base_url()."store_categories/delete_image/".$update_id;
			if (is_numeric($update_id)) { 
		?>	
		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
				<?php
				if ($big_pic == "") { ?>
					<a href="<?= $upload_image ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-edit"></i>
							<span>
								Upload Image
							</span>
						</span>
					</a>
				<?php } else { ?>
					<a href="<?= $delete_image ?>" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-eraser"></i>
							<span>
								Delete Image
							</span>
						</span>
					</a>
				<?php } ?>
				
				<div class="m-separator m-separator--dashed d-xl-none"></div>
			</div>
		<?php } ?>	
	</div>
	<!--begin::Form-->

	<?php 
	$form_location = base_url()."store_categories/create/".$update_id; 
	$path_image = base_url().'marketplace/place/'.$big_pic;
	?>
	<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= $form_location ?>">
		<div class="m-portlet__body">
			<div class="form-group m-form__group m--margin-top-10">
				<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>
			</div>

		<div class="row">	
		<?php
		$grid = ($big_pic != '') ? '8' : '12';
		if ($big_pic != '') { ?>
			<div class="col-lg-4">
				<div class="form-group m-form__group row2" style="padding-left: 20px;">
					<div class="m-widget4__img thumb2">
						<img src="<?= $path_image ?>" class="img-responsive" width="300">
					</div>
				</div>
			</div>
			
		<?php } ?>
		<div class="col-lg-<?= $grid ?>">	

			<?php if ($num_dropdown_options > 1) { ?>

			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					Parent Category
				</label>
				<div class="col-10">
					<?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air"';  		
					  	echo form_dropdown('parent_cat_id', $options, $parent_cat_id, $additional_dd_code);
					?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('parent_cat_id'); ?></div>
				</div>
			</div>

			<?php } else { echo form_hidden('parent_cat_id', 0); } ?>

			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					Kategori Produk
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="cat_title" name="cat_title" value="<?= $cat_title ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_title'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					Kode Kategori
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="cat_kode" name="cat_kode" value="<?= $cat_kode ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_kode'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Active',
							  		'0' => 'Inactive'  
						  		);
				  	echo form_dropdown('status', $options, $status, $additional_dd_code);
				  	?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('status'); ?></div>
				</div>
			</div>
			
			</div></div>
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-5"></div>
					<div class="col-7">
						<button type="submit" class="btn btn-success" name="submit" value="Submit">
							Submit
						</button>
						<button type="submit" class="btn btn-secondary" name="submit" value="Cancel">
							Cancel
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!--end::Portlet-->

