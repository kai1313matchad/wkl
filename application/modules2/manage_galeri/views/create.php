
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
		$upload_image = base_url()."manage_galeri/upload_image/".$update_id;
		$delete_image = base_url()."manage_galeri/delete_image/".$update_id;
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
	$form_location = base_url()."manage_galeri/create/".$update_id; 
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
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Judul
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="judul" name="judul" value="<?= $judul ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('judul'); ?></div>
				</div>
			</div>
			
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Kategori
				</label>
				<div class="col-10">
					<!-- <?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_jenis = array('' => 'Please Select',);
			        foreach ($jenis->result_array() as $row) {
			            $kategori_jenis[$row['id']] = $row['cat_title'];   
			        }
				  	echo form_dropdown('kategori', $kategori_jenis, $cat_prod, $additional_dd_code);
				  	?> -->

					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = $category;
				  	echo form_dropdown('kategori', $options, $kategori, $additional_dd_code);
				  	?> 
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('kategori'); ?></div>
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
			
			
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-10">
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

<?php
$path_img = base_url().'LandingPageFiles/galeri/big_pics/'.$big_pic;
if ($big_pic != "") { ?>

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Gambar
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="col-6">
			<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
				<img src="<?= $path_img ?>" width="" style="width: 100%;">
			</div>
		</div>
	</div>	
</div>
			
<?php } ?>	