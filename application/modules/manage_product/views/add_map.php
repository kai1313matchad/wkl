
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

		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<?php
			if (isset($error)) {

				foreach ($error as $value) {
					echo $value;
				}
			}
			?>
			<div class="m-separator m-separator--dashed d-xl-none"></div>
		</div>

	</div>
	<!--begin::Form-->
	
	<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
	echo form_open_multipart('manage_product/add_map/'.$update_id, $attributes);
	?>


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
					Search Location
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="geocomplete">
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Alamat
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" name="sr_address" value="">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('sr_address'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Latitude
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" name="sr_lat" value="">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('sr_lat'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Longitude
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" name="sr_lng" value="">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('sr_lng'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Select Location with marker
				</label>
				<div class="col-10">
					<div class="map_canvas"></div>
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
	<?php echo form_close(); ?>
</div>
<!--end::Portlet-->

