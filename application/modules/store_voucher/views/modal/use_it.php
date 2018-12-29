
<div class="modal-header" style="background-color: rgb(52, 191, 163);">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Gunakan Voucher
	</h5>
	
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'store_voucher/use_voucher', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="voucher_id" value="<?=$param2?>">

	<div class="m-portlet__body">
		<p>Gunakan Voucer?</p>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn silver" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-success">
		Gunakan
	</button>
</div>

</form>