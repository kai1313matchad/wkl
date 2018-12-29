
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
	</div>
	<!--begin::Form-->

	<?php $form_location = base_url()."enquiries/create/".$update_id; ?> 
	
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
			
			<?php
		  	if (!isset($sent_by)) {
		  	?>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					Recipient
				</label>
				<div class="col-10">
					<?php
					$additional_dd_code = 'class="form-control m-input m-input--air"';
					echo form_dropdown('sent_to', $options, $sent_to, $additional_dd_code);
					?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('sent_to'); ?></div>
				</div>
			</div>
			<?php } ?>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Subjek
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="subj" name="subject" value="<?= $subject ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('subject'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Pesan
				</label>
				<div class="col-10">
					<div name="summernote" id="summernote_1"> </div>
					<textarea id="summernote" name="message"><?= $message ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('message'); ?></div>
				</div>
			</div>

			<?php 
			if (isset($sent_by)) {
				echo form_hidden('sent_to', $sent_by);
			}
			?>
			
			
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

