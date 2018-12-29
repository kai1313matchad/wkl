
<div class="modal-header" style="background-color: rgb(52, 191, 163);">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Mark As Paid
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'invoices/mark_as_paid', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="invoice" value="<?=$param2?>">
	<div class="m-portlet__body">
		<p>A new payment will be recorded for this Invoice</p>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" class="btn btn-success">
		Mark as Paid
	</button>
</div>

</form>