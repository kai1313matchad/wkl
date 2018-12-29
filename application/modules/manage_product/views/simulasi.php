
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

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Harga berdasarkan durasi sewa
				</h3>
			</div>
		</div>

		<?php
		$back = base_url()."manage_product/create/".$update_id;
		?>

		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
				<a href="<?= $back ?>" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
					<span>
						<i class="la la-arrow-left"></i>
						<span>
							Kembali
						</span>
					</span>
				</a>
							
			<div class="m-separator m-separator--dashed d-xl-none"></div>
		</div>

		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<?php
			if (isset($error)) {

				foreach ($error as $value) {
					echo $value;
				}
			}
			?>
			<div class="m-separator m-separator--dashed d-xl-none"></div>
		</div>

	</div>


	<div class="m-portlet__body">
		
	<!--begin::Form-->
	
	<?php 
    if (isset($cek_durasi_harga)) {
        if ($cek_durasi_harga === 'FALSE') {
    ?>
        <button type="button" class="btn btn-primary pull-right" id="tambah-data">
            <i class="fa fa-fw -square -circle fa-plus-square"></i> create 
        </button>
        <br>
    <?php        
        }
    }
    ?>
                
        <table id="table-data" class="table table-striped table-bordered">
            <thead>
                <tr style="font-size: 14px; font-weight: bold; text-align: center;">
                    <th>Durasi</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php 
                $no = 1;
                foreach($prices as $row) { 
                    for ($i=0; $i < count($row); $i++) { 
                        $jml = $i + 1;
                        echo '<tr data-id="'. $prod_id .'">
                        <td>'. $jml .' bulan</td>
                        <td><span class="span-'. $jml .' caption" data-id="'. $prod_id .'">' . $row[$i] . '</span> <input type="text" class="field-harga form-control editor" value="' . $row[$i] . '" data-id="'. $prod_id .'" data-modul="'. $jml .'_month" /></td>
                        </tr>';
                    }
                ?>

                <?php } ?>
                
            </tbody>
            
        </table>
	</div>
</div>
<!--end::Portlet-->

<script>
$(function(){

    $.ajaxSetup({
        type:"post",
        cache:false,
        dataType: "json"
    })

    $(document).on("click","td",function(){
        $(this).find("span[class~='caption']").hide();
        $(this).find("input[class~='editor']").fadeIn().focus();
    });

    $("#tambah-data").click(function(){
        var prod_id = "<?php echo $prod_id ?>";
        $.ajax({
            url:"<?php echo base_url('price_based_duration/create'); ?>",
            dataType: "text",
            data:{prod_id:prod_id},
            success: function(a){
                var ele = "";

                for (var i = 1; i <= 12; i++) {
                    ele += "<tr data-id='" + prod_id + "'><td>" + i + " bulan</td><td><span class='span-" + i + " caption' data-id='" + prod_id + "'></span> <input type='text' class='field-harga form-control editor' data-id='" + prod_id + "' data-modul='" + i + "_month'></td></tr>";
                }

                var element = $(ele);
                element.hide();
                $("#tambah-data").hide();
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
                url:"<?php echo base_url('price_based_duration/update_data'); ?>",
                data:{id:id, value:value, modul:modul},
                success: function(resp){
                	console.log('berhasil');
                    target.hide();
                    target.siblings("span[class~='caption']").html(value).fadeIn();
                }

            })
        }
    });

});    
</script>