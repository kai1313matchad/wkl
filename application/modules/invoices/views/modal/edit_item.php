<?php
$items = $this->db->where('item_id', $param2)->get('items')->row();
?>

<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">
		Edit Item
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'invoices/items/edit', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="item_id" value="<?=$items->item_id?>">
    <input type="hidden" name="item_order" value="<?=$items->item_order?>">
    <input type="hidden" name="invoice_id" value="<?=$items->invoice_id?>">
	<div class="m-portlet__body">
		<div class="form-group m-form__group">
			<label for="item_desc">
				Item Description
			</label>
			<textarea class="form-control m-input" id="item_desc" rows="3" name="item_desc"><?= $items->item_desc?></textarea>
			
		</div>
		
		<div class="form-group m-form__group">
			<label for="quantity">
				Quantity
			</label>
			<input type="text" class="form-control m-input" id="quantity" value="<?=$items->quantity?>" name="quantity">
		</div>

		<div class="form-group m-form__group">
			<label for="unit_cost">
				Unit Price
			</label>
			<input type="text" class="form-control m-input" id="unit_cost" value="<?=$items->unit_cost?>" name="unit_cost">
		</div>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" class="btn btn-primary">
		Save Change
	</button>
</div>

</form>

<script>
    // only number input
$("#rekening").keypress(validateNumber);

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};
</script>
