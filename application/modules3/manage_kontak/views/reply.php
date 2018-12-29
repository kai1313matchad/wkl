<style>
	.vr {
		background-color: #f5f5f5;
	    border: 1px solid #d9d9d9;
	    cursor: default;
	    *display: block;
	    font-weight: 600;
	    padding: 5px;
	    white-space: nowrap;
	    -webkit-border-radius: 3px;
	    border-radius: 3px;
	    min-width: 90px;
	}
</style>

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
	<div class="m-portlet__body">
		<!--begin::Form-->
		<table class="table table-striped table-bordered">
			<tbody>
				<?php
				foreach ($query->result() as $row) {
					$mail = '<span class="vr">'.$row->email.'</span>';
					$valid_email = $row->email;
					$id_contact = $row->id;
				?>
				<tr>
					<td style="font-weight: bold;">Date Sent</td><td><?= $row->waktu_dibuat ?></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Sent By</td><td><?= $row->nama.' '.$mail ?></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Subjek</td><td><?= $row->subjek ?></td>
				</tr>
				<tr>
					<td width="20%" style="font-weight: bold;">Pesan</td><td><?= $row->pesan ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	
</div>
<!--end::Portlet-->


<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Balas Pesan
				</h3>
			</div>
		</div>
	</div>

	<?php 
	$form_location = base_url()."manage_kontak/reply/".$update_id; 
	?>
	<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= $form_location ?>">
		<div class="m-portlet__body">
			<div class="form-group m-form__group m--margin-top-10">
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>
			</div>

			<input type="hidden" name="id" value="<?= $id_contact ?>">
			
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					To
				</label>
				<div class="col-10">
					<p class="form-control-static"><?= $mail ?></p>
					<input class="form-control m-input m-input--air" type="hidden" id="email" name="email" value="<?= $valid_email ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('email'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Subjek
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="subj" name="subjek" value="">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('subjek'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Pesan
				</label>
				<div class="col-10">
					<div name="summernote" id="summernote_1"> </div>
					<textarea id="summernote" name="pesan"></textarea>
					<div class="form-control-feedback" rows="8" name="pesan" style="color: #f4516c;"><?php echo form_error('pesan'); ?></div>
				</div>
			</div>

			
			
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-10">
						<button type="submit" class="btn btn-success" name="submit" value="Submit">
							Send
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

