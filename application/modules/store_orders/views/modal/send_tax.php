<?php
$order = $this->db->where('id', $param2)->get('store_orders')->row();
$shopper = $this->db->where('id', $order->shopper_id)->get('kliens')->row();
?>

<style>
	input[type="file"] {
		min-width: 14rem;
	    max-width: 100%;
	    margin: 0;
	    border: 1px solid #ced4da;
	    border-radius: 0.25rem;
	}

.full-width {
	width: 100%;
}

.custom-file-upload-hidden {
  display: none;
  visibility: hidden;
  position: absolute;
  left: -9999px;
}

.custom-file-upload {
  display: block;
  width: auto;
  font-size: 12px;
  *margin-top: 30px;
}
.custom-file-upload label {
  display: block;
  margin-bottom: 5px;
}

.file-upload-wrapper {
  position: relative;
  margin-bottom: 5px;
}

.file-upload-input {
  width: 400px;
  color: #aaa;
  font-size: 12px;
  padding: 0px 17px;
  border: none;
  background-color: #f5f5f5;
  -moz-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  -webkit-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
  float: left;
  /* IE 9 Fix */
}
.file-upload-input:hover, .file-upload-input:focus {
  background-color: #f5f5f5;
  outline: none;
}

.file-upload-button {
  cursor: pointer;
  display: inline-block;
  color: #fff;
  font-size: 12px;
  text-transform: uppercase;
  *padding: 5px 20px;
  border: none;
  margin-left: -1px;
  background-color: #fdb714;
  float: left;
  /* IE 9 Fix */
  -moz-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  -webkit-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}
.file-upload-button:hover {
  background-color: #fdb714;
}
</style>

<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">
		Kirim Faktur Pajak
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open_multipart(base_url().'store_orders/send_tax_report', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="order_id" value="<?= $param2 ?>">
	<input type="hidden" name="user_id" value="<?= $shopper->id ?>">
	<div class="m-portlet__body">
		
		<div class="form-group m-form__group">
			<label for="exampleInputEmail1">
				NO Invoice
			</label>
			<input type="text" class="form-control m-input m-input--air" name="no_invoice" id="invoice" placeholder="no invoice">
		</div>

		<div class="form-group m-form__group">
			
			<label for="exampleInputEmail1">
				Faktur Pajak
			</label>
			<br>
			<div class="custom-file-upload full-width" style="line-height: 28px;">
 	            <input type="file" name="file" style="z-index: 99999; color: black">
	        </div>

			<!-- <label class="custom-file">
				<input type="file" name="file">
				<input type="file" id="file2" name="file" class="custom-file-input">
				<span class="custom-file-control form-control"></span>
			</label> -->
		</div>

	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-primary">
		Kirim
	</button>
</div>

</form>
