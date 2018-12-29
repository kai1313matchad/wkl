
<div class="modal-header" style="background-color: #f4516c; color: #fff;">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Delete Invoice
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'invoices/delete', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="invoice" value="<?=$param2?>">
	<div class="m-portlet__body">
		<h5>Are you sure you want to delete this invoice?</h5>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" class="btn btn-danger">
		Delete
	</button>
</div>

</form>