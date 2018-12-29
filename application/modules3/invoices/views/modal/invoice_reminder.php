
<?php
$invoice = $this->db->where('inv_id', $param2)->get('invoices')->row();
?>
<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">
		Invoice Reminder
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'invoices/send_invoice', $attributes); 
?>	
<div class="modal-body">
    
	<input type="hidden" name="invoice" value="<?=$invoice->inv_id?>">
	<div class="m-portlet__body">
		
		<div class="form-group m-form__group">
			<label for="subject">
				Subject
			</label>
			<input type="text" class="form-control m-input" id="subject" value="Invoice Reminder <?=$invoice->reference_no?>" name="subject">
		</div>

		<div class="form-group m-form__group">
			
			<textarea id="summernote" name="body"></textarea>
			<div class="form-control-feedback" style="color: #f4516c;"></div>
			
		</div>

	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" class="btn btn-primary">
		Send Reminder
	</button>
</div>

</form>