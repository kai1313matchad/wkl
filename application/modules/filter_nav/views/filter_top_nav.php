<?php
$search_form = base_url().'category/search';
?>

<form action="<?= $search_form ?>" method="post" id="filter_top">
    <div class="row">
        
        <div class="form-group col-sm-6 col-md-7">
            <div class="row">
                <div class="col-xs-4">
                    <div class="selector" style="display: flex; align-items: center;">
                        <?php 
                        $additional_dd_code = 'class="full-width" required';
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
                <div class="col-xs-4">
                    <div class="selector">
                        <?php 
                        $additional_dd_code = 'class="full-width" id="province"';
                        $kategori_prov = array('' => '- Pilih Provinsi -',);
                        foreach ($prov->result_array() as $row) {
                            $kategori_prov[$row['id_prov']] = $row['nama'];   
                        }
                        echo form_dropdown('cat_prov', $kategori_prov, '', $additional_dd_code);
                        ?>
                       <span class="custom-select full-width">Provinsi</span>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="selector">
                        <select id="madina" name="cat_city" class="full-width">
                            
                        </select>
                        <span class="custom-select full-width">Kota / kabupaten</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group col-sm-6 col-md-2 col-xs-12 fixheight " style="z-index: 999999;">
            <button type="submit" class="animated" data-animation-type="bounce" data-animation-duration="1" style="width: 100%; z-index: 99999;">Cari Sekarang</button>
        </div>
    </div>
</form>
