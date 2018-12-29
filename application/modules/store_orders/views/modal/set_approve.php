
<div class="modal-header" style="background-color: rgb(52, 191, 163);">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Set as approved
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'store_orders/set_to_approve', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="order_id" value="<?=$param2?>">
	<div class="m-portlet__body">
		<p>Set approved into this order</p>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-success">
		Approve
	</button>
</div>

</form>