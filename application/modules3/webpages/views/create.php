
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
		if (is_numeric($update_id)) {
			$view_page_url = base_url().$page_url;
		?>	
		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<a href="<?= $view_page_url ?>" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-envelope"></i>
					<span>
						View Page
					</span>
				</span>
			</a>
			<div class="m-separator m-separator--dashed d-xl-none"></div>
		</div>
		<?php } ?>
	</div>
	<!--begin::Form-->

	<?php 
	$form_location = base_url()."webpages/create/".$update_id;
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
					Page Title
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="page_title" name="page_title" value="<?= $page_title ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('page_title'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Page Keyword
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="page_keyword"><?= $page_keyword ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('page_keyword'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Page Description
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="page_description"><?= $page_description ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('page_description'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Page Content 
				</label>
				<div class="col-10">
					<div name="summernote" id="summernote_1"> </div>
   					<textarea id="summernote" name="page_content"><?= $page_content ?></textarea>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('page_content'); ?></div>
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

