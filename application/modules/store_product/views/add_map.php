<?php
$back = base_url().'store_product/create/'.$update_id;
?>

<div class="tab-pane fade in active">

    <div class="row">
		<div class="col-md-6">
	    	<h2>Tambah Map &amp; Street View</h2>
	    </div>

	    <div class="col-md-6">
	        <a href="<?= $back ?>" class="button btn-small yellow pull-right">BACK</a>
	    </div>
	</div>

    <div class="col-sm-12 no-float no-padding">
    	<!-- alert -->
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>

		<?php
	    echo form_open_multipart('store_product/add_map/'.$update_id);
	    ?>	
	    	<div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Cari Lokasi</label>
                </div>
                <div class="col-sms-7 col-sm-7">
	                <input type="text" class="input-text full-width" id="geocomplete" data-placeholder="cari alamat lokasi">
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib isi alamat titik sesuai letak lokasi berdiri nya media iklan milik persil dan nanti akan terkoneksi dengan google map.</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Titik Lokasi OOH</label>
                </div>
                <div class="col-sms-7 col-sm-7">
                    <div class="map_canvas"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih atau geser lokasi marker untuk menampilkan Detail Alamat, Latitude, Longitude secara otomatis yang menunjukkan koordinat titik lokasi milik persil/pemilik titik.</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Detail Alamat</label>
                </div>
                <div class="col-sms-7 col-sm-7">
	                <input type="text" class="input-text full-width" name="sr_address" >
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tampil alamat otomatis yang menunjukan alamat lokasi titik berdasarkan inputan cari lokasi.</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Latitude</label>
                </div>
                <div class="col-sms-7 col-sm-7">
	                <input type="text" class="input-text full-width" name="sr_lat" >
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tampil latitude otomatis yang menunjukan kordinat lokasi titik berdasarkan inputan cari lokasi.</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Longitude</label>
                </div>
                <div class="col-sms-7 col-sm-7">
	                <input type="text" class="input-text full-width" name="sr_lng" >
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tampil longitude otomatis yang menunjukan kordinat lokasi titik berdasarkan inputan cari lokasi.</span>
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
</div>