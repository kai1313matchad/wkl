<?php
$product = $this->db->where('id', $param2)->get('store_item')->row();
$reward = $product->reward;
?>
<div class="modal-header" style="background-color: #f4516c; color: #fff;">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Add Reward
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'manage_product/add_reward', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="prod_id" value="<?=$param2?>">
	<div class="m-portlet__body">
		<div class="form-group m-form__group row">
			<label for="point_reward" class="col-2 col-form-label">
				Reward
			</label>
			<div class="col-10">
				<input type="text" class="form-control m-input" id="point_reward" value="<?= ($reward != 0)? $reward : 0 ?>" name="point_reward">
			</div>
		</div>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-danger">
		Add
	</button>
</div>

</form>