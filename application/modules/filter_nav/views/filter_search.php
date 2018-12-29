<?php
$search_form = base_url().'category/search';
?>					

<style>
	@media only screen and (max-width: 360px) {
		.title-search {
			text-align:  center;
		}
        h4.title-search {
            font-size: 14px;
            font-weight: 800;
        }
    }
</style>

					<div class="search-tab-content">
	                    <div class="tab-pane fade active in" id="hotels-tab">
	                        <form action="<?= $search_form ?>" method="post">
	                            <h4 class="title-search">WIKLAN - Cari, Bandingkan dan Sewa</h4>
	                            <p class="title-search">"Silahkan pilih lokasi sesuai kebutuhan Anda"</p>
	                            <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
	                                        <div class="selector">
						                        <?php 
						                        $additional_dd_code = 'class="full-width" id="provinsi"';
						                        $kategori_prov = array('' => '- Pilih Provinsi -',);
						                        foreach ($prov->result_array() as $row) {

						                            $kategori_prov[$row['id_prov']] = $row['nama'];   
						                        }
						                        echo form_dropdown('cat_prov', $kategori_prov, '', $additional_dd_code);
						                        ?>
						                       <span class="custom-select full-width">Provinsi</span>
						                    </div>
						                </div>
                                        <div class="form-group">
                                            <div class="selector">
						                        <select id="kota" name="cat_city" class="full-width">
						                            
						                        </select>
						                        <span class="custom-select full-width">Kota / kabupaten</span>
						                    </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                    	<div class="form-group">
                                    		<div class="selector">
						                        <?php 
						                        $additional_dd_code = 'class="full-width" id="kategori"';
						                        $kategori_jenis = array('' => '- Pilih Kategori -',);
						                        foreach ($jenis->result_array() as $row) {
						                        	if ($row['cat_title'] != 'Indoor' && $row['cat_title'] != 'Branding') {
						                        		$kategori_jenis[$row['id']] = $row['cat_title']; 
						                        	}
						                              
						                        }
						                        echo form_dropdown('cat_prod', $kategori_jenis, '', $additional_dd_code);
						                        ?>
						                        <span class="custom-select full-width">Kategori</span>
						                    </div>
                                    	</div>
                                        <div class="form-group">
                                            <div class="datepicker-wrap">
					                            <input type="text" placeholder="Waktu tayang" name="tgl_pilih" class="input-text full-width" />
					                        </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="selector">
                                               <?php 
						                        $additional_dd_code = 'class="full-width" id="jalan"';
						                        $kategori_jalan = array('' => '- Pilih Kategori Jalan -',);
						                        foreach ($tipe_jalan->result_array() as $row) {
						                            $kategori_jalan[$row['id']] = $row['road_title'];   
						                        }
						                        echo form_dropdown('cat_road', $kategori_jalan, '', $additional_dd_code);
						                        ?>
						                        <span class="custom-select full-width">Kategori Jalan</span>
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <div class="selector">
                                            	<?php
													$add_info = 'class="full-width" id="display"';
													$options = array(
														'' => '- Pilih Tipe Display -',
														'1' => 'Horisontal',
														'2' => 'Vertikal'
														);
													echo form_dropdown('cat_display', $options, '', $add_info);
												?>
                                                <span class="custom-select full-width">Tipe Display</span>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                    	<div class="form-group">
                                    		<button type="submit" class="full-width" id="tombol">CARI SEKARANG</button>
                                    	</div>
                                    </div>
                                </div>
	                            
	                        </form>
	                    </div>
	                          
	                </div>

<script type="text/javascript">
    // datepicker
tjq('.datepicker-wrap input').datepicker({
    showOn: 'button',
    buttonImage: 'images/icon/blank.png',
    buttonText: '',
    buttonImageOnly: true,
    /*showOtherMonths: true,*/
    minDate: 0,
    dayNamesMin: ["M", "S", "S", "R", "K", "J", "S"],
    beforeShow: function(input, inst) {
        var themeClass = tjq(input).parent().attr("class").replace("datepicker-wrap", "");
        tjq('#ui-datepicker-div').attr("class", "");
        tjq('#ui-datepicker-div').addClass("ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all");
        tjq('#ui-datepicker-div').addClass(themeClass);
    }
});
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

		let inputSubmit = tjq('#tombol');
		let inputProvinsi = tjq('select#provinsi');
		let inputKota = tjq('select#kota');
		let inputKategori = tjq('select#kategori');
		let inputJalan = tjq('select#jalan');
		let inputDisplay = tjq('select#display');

		

		inputSubmit.attr('disabled', 'true');

		inputProvinsi.change(function() {
			console.log('select provinsi');
            inputSubmit.removeAttr('disabled');
        });

		inputKota.change(function() {
			console.log('select kota');
            inputSubmit.removeAttr('disabled');
        });

        inputKategori.change(function() {
			console.log('select kategori');
            inputSubmit.removeAttr('disabled');
        });

        inputJalan.change(function() {
			console.log('select jalan');
            inputSubmit.removeAttr('disabled');
        });

        inputDisplay.change(function() {
			console.log('select display');
            inputSubmit.removeAttr('disabled');
        });

</script>	                