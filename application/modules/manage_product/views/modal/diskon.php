<?php
$this->load->module('price_based_duration');
$this->load->module('timedate');
$prices = $this->price_based_duration->fetch_discount($param2);
$cek_durasi_harga = $this->price_based_duration->check_discount_in($param2);
$product = $this->db->where('id', $param2)->get('store_item')->row();
$discount = $this->db->where('prod_id', $param2)->get('discount')->row();
$discount_price = $product->discount_price;
if ($discount_price != '') {
	// $discount->prod_id;
	if ($discount->start != '') {
		$start = $this->timedate->get_nice_date($discount->start, 'indo');
	}
	if ($discount->end) {
		$end = $this->timedate->get_nice_date($discount->end, 'indo');
	}
} else {
	$start = '';
	$end = '';
}

?>

<style>
	ul.search-tabs li {
		border: 1px solid #f4f4f4;
	}
    .required {
        color: red;
    }
    td {
        cursor: pointer;
    }

    .editor{
        display: none;
    }
</style>

<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">
		Diskon
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>

<div class="m-form m-form--fit m-form--label-align-right" id="form-diskon">	
<div class="modal-body">

	<input type="hidden" name="prod_id" id="prod_id" value="<?= $param2 ?>">
	<div class="m-portlet__body">
		
		<div class="form-group m-form__group row">
			<label for="discount_price" class="col-2 col-form-label">
				Harga Diskon
			</label>
			<div class="col-10">
				<input type="text" class="form-control m-input" id="discount_price" value="<?= ($discount_price != '')? $discount_price : 0 ?>" name="discount_price">
			</div>
		</div>

		<div class="form-group m-form__group row">
			<label for="discount_price" class="col-2 col-form-label">
				Periode
			</label>
			<div class="col-3">
				<input type="text" class="form-control m-input" id="m_datepicker_1" dateformat="dd/mm/yyyy" class="start" name="start">
				<span class="m-form__help">
					<?= ($start != '')? $start : '' ?>
				</span>
			</div>
			-
			<div class="col-3">
				<input type="text" class="form-control m-input" id="m_datepicker_2" dateformat="dd/mm/yyyy" class="end" name="end">
				<span class="m-form__help">
					<?= ($end != '')? $end : '' ?>
				</span>
			</div>
			<div class="col-2">
				<?php 
			    if (isset($cek_durasi_harga)) {
			        if ($cek_durasi_harga === 'FALSE') {
			    ?>
				<button type="button" class="btn btn-success" id="btn-click">
					Create
				</button>
				<?php        
			        }
			    }
			    ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<!-- harga durasi nya -->
				<table id="table-data" class="table table-striped table-bordered">
		            <thead>
		                <tr style="font-size: 14px; font-weight: bold; text-align: center;">
		                    <th>Durasi</th>
		                    <th>Harga Diskon</th>
		                </tr>
		            </thead>
		            <tbody id="table-body">
		            	<?php 
		                $no = 1;
		                foreach($prices as $row) { 
		                    for ($i=0; $i < count($row); $i++) { 
		                        $jml = $i + 1;
		                        echo '<tr data-id="'. $param2 .'">
		                        <td>'. $jml .' bulan</td>
		                        <td style="text-align:right;"><span class="span-'. $jml .' caption" data-id="'. $param2 .'">' . $row[$i] . '</span> <input type="text" class="field-harga form-control editor" value="' . $row[$i] . '" data-id="'. $param2 .'" data-modul="'. $jml .'_month" /></td>
		                        </tr>';
		                    }
		                ?>

		                <?php } ?>
		               
		            </tbody>
		            
		        </table>
			</div>
			<div class="col-md-2"></div>
		</div>

	</div>
    
</div>
<div class="modal-footer">
	<span id="pesan"></span>
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="button" class="btn btn-primary" id="btn-submit">
		Submit
	</button>
</div>

</div>

<script>
$(function(){

	$('#m_datepicker_1, #m_datepicker_2').datepicker({
		todayHighlight: true,
		orientation: "bottom left",
		format: 'dd/mm/yyyy'
	});

    // $.ajaxSetup({
    //     type:"post",
    //     cache:false,
    //     dataType: "json"
    // })

    $(document).on("click","td",function(){
        $(this).find("span[class~='caption']").hide();
        $(this).find("input[class~='editor']").fadeIn().focus();
    });

    $("#btn-click").click(function(){
        var prod_id = "<?php echo $param2 ?>";
        $.ajax({
        	type: "post",
            url:"<?php echo base_url('price_based_duration/create_discount'); ?>",
            dataType: "text",
            data:{prod_id:prod_id},
            success: function(a){
            	console.log('tambah row sukses');
            	var ele = "";

            	for (var i = 1; i <= 12; i++) {
                    ele += "<tr data-id='" + prod_id + "'><td>" + i + " bulan</td><td><span class='span-" + i + " caption' data-id='" + prod_id + "'></span> <input type='text' class='field-harga form-control editor' data-id='" + prod_id + "' data-modul='" + i + "_month'></td></tr>";
                }

                var element = $(ele);
                element.hide();
                $("#btn-click").hide();
                element.prependTo("#table-body").fadeIn(1500);
            }
        });
    });

    $(document).on("keydown",".editor",function(e){
        console.log('update data');
        if(e.keyCode == 13){
            var target = $(e.target);
            var value = target.val();
            var id = target.attr("data-id");
            var modul = target.attr('data-modul');
            var data = {id:id, value:value, modul:modul};
            console.log('sedang update');
            console.log(data);

            $.ajax({
                type:"post",
                dataType: "text",
                url:"<?php echo base_url('price_based_duration/update_discount'); ?>",
                data:{id:id, value:value, modul:modul},
                success: function(resp){
                	console.log('berhasil');
                    target.hide();
                    target.siblings("span[class~='caption']").html(value).fadeIn();
                }

            })
        }
    });

    document.getElementById('btn-submit').addEventListener('click', submitDiscount);

    function submitDiscount(e){
    	e.preventDefault();

    	let prod_id = "<?php echo $param2 ?>";
    	let disc_price = document.getElementById('discount_price');
    	let start = $("#m_datepicker_1").val();
    	let end = $("#m_datepicker_2").val();
    	const message = `<div class="m-alert m-alert--outline alert alert-warning alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
							<strong>
								Warning!
							</strong>
							Silahkan input nilai.
						</div>`;

    	// cek value
    	if (disc_price.value != 0 && start != '' && end != '') {
    		$.ajax({
    			type: "post",
    			dataType: "text",
    			url: "<?php echo base_url('manage_product/add_discount_price'); ?>",
    			data:{prod_id:prod_id, discount_price:disc_price.value, start:start, end:end},
    			success: function(resp) {
    				console.log('submit berhasil');
    				$('#m_modal_4').modal('hide');
    			}
    		})
    	} else {
    		document.getElementById('pesan').innerHTML = message; 
    	}
    }

});    
</script>