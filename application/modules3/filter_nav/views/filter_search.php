<?php
$search_form = base_url().'category/search';
?>					

					<div class="search-tab-content">
	                    <div class="tab-pane fade active in" id="hotels-tab">
	                        <form action="<?= $search_form ?>" method="post">
	                            <h4 class="title">WIKLAN - Cari, Bandingkan dan Sewa</h4>
	                            <p class="title">"Silahkan pilih lokasi sesuai kebutuhan Anda"</p>
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
						                        $additional_dd_code = 'class="full-width"';
						                        $kategori_jenis = array('' => '- Pilih Kategori -',);
						                        foreach ($jenis->result_array() as $row) {
						                            $kategori_jenis[$row['id']] = $row['cat_title'];   
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
						                        $additional_dd_code = 'class="full-width"';
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
													$add_info = 'class="full-width"';
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
                                    		<button type="submit" class="full-width">CARI SEKARANG</button>
                                    	</div>
                                    </div>
                                </div>
	                            
	                        </form>
	                    </div>
	                          
	                </div>