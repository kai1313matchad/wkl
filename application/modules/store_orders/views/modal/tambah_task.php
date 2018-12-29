
<?php
$this->load->module('manage_task');
$mysql_query = "SELECT * FROM tasks WHERE status = 1";
$tasks = $this->manage_task->_custom_query($mysql_query);

$order = $this->db->where('id', $param2)->get('store_orders')->row();
$shopper = $this->db->where('id', $order->shopper_id)->get('kliens')->row();
?>
<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">
		Tambah Task
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'task_order/add', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="order_id" value="<?= $param2 ?>">
	<input type="hidden" name="user_id" value="<?= $shopper->id ?>">
	<div class="m-portlet__body">
		
		<div class="form-group m-form__group row">
			<label for="example-text-input" class="col-2 col-form-label">
				Task
			</label>
			<div class="col-10">
				<?php 
					$this->load->module('manage_task');
                    $additional_dd_code = 'class="form-control m-input m-input--air"';
                    $daftar_task = array('' => 'Please Select',);
                    foreach ($tasks->result_array() as $row) {
                        $daftar_task[$row['id']] = $this->manage_task->_get_task_name($row['id']);     
                    }
                    echo form_dropdown('task_id', $daftar_task, '', $additional_dd_code);
                    ?>
				
				<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('task'); ?></div>
			</div>
		</div>

	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-primary">
		Tambah Task
	</button>
</div>

</form>
