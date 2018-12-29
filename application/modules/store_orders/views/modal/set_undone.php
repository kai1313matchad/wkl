
<div class="modal-header" style="background-color: #f4516c; color: #fff;">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Set Undone
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'task_order/set_task_undone', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="task_order_id" value="<?=$param2?>">
	<div class="m-portlet__body">
		<h5>Set Task to Undone</h5>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Undone" class="btn btn-danger">
		Undone
	</button>
</div>

</form>