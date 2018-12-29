<?php
$back = base_url().'store_product/create/'.$update_id;
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

<div class="tab-pane fade in active">

    <div class="row">
		<div class="col-md-6">
	    	<h2>Harga Berdasarkan Durasi Sewa</h2>
	    </div>

	    <div class="col-md-6">
	        <a href="<?= $back ?>" class="button btn-small yellow pull-right">BACK</a>
	    </div>
	</div>

    <div class="col-sm-12 no-float no-padding">
    	
    	<?php 
                if (isset($cek_durasi_harga)) {
                    if ($cek_durasi_harga === 'FALSE') {
                ?>
                    <button type="button" class="button btn-small sky-blue1 pull-right" id="tambah-data">
                        <i class="fa fa-fw -square -circle fa-plus-square"></i> create 
                    </button>
                    <br>
                <?php        
                    }
                }
                ?>
                
                <table id="table-data" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>duration</th>
                            <th>price</th>
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

<script>
tjq(function(){

    tjq.ajaxSetup({
        type:"post",
        cache:false,
        dataType: "json"
    })

    tjq(document).on("click","td",function(){
        tjq(this).find("span[class~='caption']").hide();
        tjq(this).find("input[class~='editor']").fadeIn().focus();
    });

    tjq("#tambah-data").click(function(){
        var prod_id = "<?php echo $prod_id ?>";
        tjq.ajax({
            url:"<?php echo base_url('price_based_duration/create'); ?>",
            data:{prod_id:prod_id},
            success: function(a){
                var ele = "";

                for (var i = 1; i <= 12; i++) {
                    ele += "<tr data-id='" + prod_id + "'><td>" + i + " bulan</td><td><span class='span-" + i + " caption' data-id='" + prod_id + "'></span> <input type='text' class='field-harga form-control editor' data-id='" + prod_id + "' data-modul='" + i + "_month'></td></tr>";
                }

                var element = tjq(ele);
                element.hide();
                element.prependTo("#table-body").fadeIn(1500);

            }
        });
    });

    tjq(document).on("keydown",".editor",function(e){
        console.log('update data');
        if(e.keyCode == 13){
            var target = tjq(e.target);
            var value = target.val();
            var id = target.attr("data-id");
            var modul = target.attr('data-modul');
            var data = {id:id, value:value, modul:modul};
            console.log('sedang update');
            tjq.ajax({
                data:data,
                url:"<?php echo base_url('price_based_duration/update_data'); ?>",
                success: function(a){
                	console.log('berhasil');
                 target.hide();
                 target.siblings("span[class~='caption']").html(value).fadeIn();
                }

            })
        }
    });

});    
</script>