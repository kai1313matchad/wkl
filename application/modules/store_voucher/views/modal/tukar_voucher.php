<?php
$voucher = $this->db->where('id', $param2)->get('voucher')->row();
$point_use = $voucher->point_use;
?>

<div class="modal-header" style="background-color: #f4516c; color: #fff;">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Tukar Voucher
	</h5>
	
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'store_voucher/tukar', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="voucher_id" value="<?=$param2?>">
	<input type="hidden" name="point_use" value="<?=$point_use?>">
	<div class="m-portlet__body">
		<h5>Apakah anda yakin tukar voucher?</h5>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn silver" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-danger">
		Tukar
	</button>
</div>

</form>