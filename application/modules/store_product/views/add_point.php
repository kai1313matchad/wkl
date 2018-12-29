<?php
$back = base_url().'store_product/create/'.$update_id;
?>

<div class="tab-pane fade in active">

    <div class="row">
		<div class="col-md-6">
	    	<h2>Tambah Lokasi Strategis Terdekat</h2>
	    </div>

	    <div class="col-md-6">
	        <a href="<?= $back ?>" class="button btn-small yellow pull-right">BACK</a>
	    </div>
	</div>
	
	<!-- alert -->
	<?php 
	if (isset($flash)) {
		echo $flash;
	}
	?>

    <div class="col-sm-12 no-float no-padding">
    	



		<?php
	    echo form_open('store_product/process_add_point/'.$update_id);
	    ?>	
	    	<input type="hidden" name="prod_id" value="<?= $prod_id ?>">

	    	<div id="dynamicInput">

		    	<div class="row form-group">
		    		<input type="hidden" name="urut[]" value="0">
	                <div class="col-sms-2 col-sm-2">
	                    <label>Titik Tempat Terdekat 1</label>
	                </div>
	                <div class="col-sms-5 col-sm-5">
		                <input type="text" class="input-text full-width" name="myInputs[]" required>
	                </div>
	                <div class="col-sms-2 col-sm-2">
		                <input type="text" class="input-text full-width" placeholder="Jarak" name="distances[]" required>
	                </div>
	                <div class="col-sms-3 col-sm-3">
	                    <span>Wajib isi dengan tempat-tempat strategis terdekat dari titik berdiri nya media iklan. (Contoh : SUTOS Mall, Stasiun Kereta Api, Terminal Bus, dll ).</span>
	                </div>
	            </div>

	        </div>    

	        <div class="row form-group">
	        	<div class="col-sms-7 col-sm-7"></div>
	        	<div class="col-sms-3 col-sm-3">
	        		<input type="button" value="Tambah Titik Terdekat" class="button btn-mini sea-blue full-width" onClick="addInput('dynamicInput');">
	        		<input type="button" value="Hapus" class="button btn-mini sea-blue full-width" id="clear-files">
	        	</div>
	        </div>

	        <div class="row form-group">
	        	<div class="col-sms-2 col-sm-2"></div>
	        	<div class="col-sms-7 col-sm-7">
		            <button class="btn-medium" type="submit" name="submit" value="Submit">SIMPAN</button>
		            <button class="btn-medium red" type="submit" name="submit" value="Cancel">BATAL</button>
		        </div>    
	        </div>
	    <?php echo form_close(); ?>

	</div>

	<br>
	<br>
	<hr>

	<div class="col-sm-12 no-float no-padding">
		
	</div>

	<div class="toggle-container question-list">
        <div class="panel style1">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#tgg1" class="">Daftar Tempat Strategis Terdekat</a>
            </h4>
            <div id="tgg1" class="panel-collapse collapse in">
                <div class="panel-content">
					<div class="well">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th width="60%">Nama Lokasi</th>
									<th width="20%">Jarak</th>
									<th width="20%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($sell_points->result() as $row) {
								?>
								<tr>
									<td width="60%"><?= $row->desc ?></td>
									<td width="20%"><?= $row->jarak ?></td>
									<td width="20%"><a href="<?= base_url().'selling_points/delete_point/'.$row->token ?>" class="button btn-mini red"><i class="soap-icon-close"></i></a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>

                </div>
            </div>
        </div>
    </div>


</div>

<script>
var counter = 1;
var urut = 0;
var limit = 10;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.className = "row form-group";
          let son = `<input type="hidden" name="urut[]" value="${urut + 1}">
          			<div class="col-sms-2 col-sm-2">
	                    <label>Titik Tempat Terdekat ${counter + 1}</label>
	                </div>
	                <div class="col-sms-5 col-sm-5">
		                <input type="text" class="input-text full-width" name="myInputs[]" required>
	                </div>
	                <div class="col-sms-2 col-sm-2">
		                <input type="text" class="input-text full-width" placeholder="Jarak" name="distances[]" required>
	                </div>
	                <div class="col-sms-3 col-sm-3">
	                    <span>Wajib isi dengan tempat-tempat strategis terdekat dari titik berdiri nya media iklan. (Contoh : SUTOS Mall, Stasiun Kereta Api, Terminal Bus, dll ).</span>
	                </div>`;
	      newdiv.innerHTML = son;          
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}

tjq('#clear-files').click(function(){
    tjq('#dynamicInput').html(
    "<div class='row form-group'><input type='hidden' name='urut[]' value='0'><div class='col-sms-2 col-sm-2'><label>Titik Tempat Terdekat 1</label></div><div class='col-sms-5 col-sm-5'><input type='text' class='input-text full-width' name='myInputs[]' required></div><div class='col-sms-2 col-sm-2'><input type='text' class='input-text full-width' placeholder='Jarak' name='distances[]' required></div><div class='col-sms-3 col-sm-3'><span>Wajib isi dengan tempat-tempat strategis terdekat dari titik berdiri nya media iklan. (Contoh : SUTOS Mall,Stasiun Kereta Api, Terminal Bus, dll ).</span></div></div>"
    );
});
</script>