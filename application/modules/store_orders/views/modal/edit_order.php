
<?php
$this->load->module('site_settings');
$this->load->module('timedate');
$this->load->module('store_categories');
$order = $this->db->where('id', $param2)->get('store_orders')->row();
$shopper = $this->db->where('id', $order->shopper_id)->get('kliens')->row();
$prod = $this->db->where('id', $order->item_id)->get('store_item')->row();

$kategori_produk = $this->store_categories->get_name_from_category_id($prod->cat_prod);
$price = $this->site_settings->currency_rupiah($order->price);
$durasi = $order->duration;
$slot = ($order->slot != '') ? $order->slot : '';
$start = $this->timedate->get_nice_date($order->start, 'indo');
$end = $this->timedate->get_nice_date($order->end, 'indo');
?>
<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">
		Edit Order
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'store_orders/edit', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="order_id" value="<?= $param2 ?>">
	<div class="m-portlet__body">
		
		<div class="form-group m-form__group row">
			<div class="col-lg-4">
				<label>
					No Order
				</label>
				<input type="text" class="form-control m-input" value="<?= $order->no_order ?>" readonly>
				
			</div>
			<div class="col-lg-4">
				<label class="">
					Klien
				</label>
				<input type="text" class="form-control m-input" value="<?= $shopper->company ?>" readonly>
				<span class="m-form__help">
					
				</span>
			</div>
			<div class="col-lg-4">
				<label>
					Lokasi:
				</label>
				<div class="input-group m-input-group m-input-group--square">
					<span class="m-form__help">
						<?= $order->item_title ?>
					</span>
				</div>
				
			</div>
		</div>

		<div class="form-group m-form__group row">
				<div class="col-lg-4">
					<label class="">
						Durasi:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<input type="text" class="form-control m-input" value="<?= $durasi ?> bulan" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-clock-o"></i>
							</span>
						</span>
					</div>
					
				</div>
				<div class="col-lg-4">
					<label class="">
						Tayang:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<input type="text" class="form-control m-input" value="<?= $start ?> - <?= $end ?>" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-calendar"></i>
							</span>
						</span>
					</div>
					
				</div>
				<div class="col-lg-4">
					<?php if($slot != '') { ?>
					<label>
						Slot:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<input type="text" class="form-control m-input" value="<?= $slot ?> slot" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-clone"></i>
							</span>
						</span>
					</div>
					<?php } ?>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<div class="col-lg-4">
					<label class="">
						Kategori:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<input type="text" class="form-control m-input" value="<?= $kategori_produk ?>" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-bookmark-o"></i>
							</span>
						</span>
					</div>
					
				</div>
				<div class="col-lg-4">
					<label class="">
						Harga <em><small>(Rp)</small></em>:
					</label>
					<div class="input-group m-input-group m-input-group--square" style="text-align: right;">
						<input type="text" class="form-control m-input" id="item_price" value="<?= $price ?>" style="font-size: 24px; font-weight: bold; color: #f4516c; float: right;">
						<!-- <span class="pull-right" style="font-size: 24px; font-weight: bold; color: #f4516c; float: right;">
							<?= $price ?>
						</span> -->
					</div>
				</div>
				<div class="col-lg-4">
					
					
				</div>
			</div>

	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-primary">
		Edit Order
	</button>
</div>

</form>


<script>

var item_price = document.getElementById('item_price');

// live format rupiah
item_price.addEventListener('keyup', liveCurrency);

function liveCurrency() {

	console.log('update');

    var $this = this;
    let input = $this.value;
    input = input.replace(/[\D\s\._\-]+/g, "");
    input = input ? parseInt( input, 10 ) : 0;

    let show = function() {
        return ( input === 0 ) ? "" : input.toLocaleString( "id-ID" ); 
    };

    $this.value = show();
}
	
// only number input
$("#item_price").keypress(validateNumber);

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