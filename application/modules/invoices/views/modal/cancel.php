<?php
$items = $this->db->where('inv_id', $param2)->get('invoices')->row();
?>
<div class="modal-header" style="background-color: #f4516c; color: #fff;">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Cancel Invoice #<?=$items->reference_no?>
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'invoices/cancel', $attributes); 
?>	
<div class="modal-body">
    
	<input type="hidden" name="id" value="<?=$param2?>">
	<div class="m-portlet__body">
		<p>Invoice <?=$items->reference_no?> will be marked as Cancelled.</p>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" class="btn btn-danger">
		Cancelled
	</button>
</div>

</form>