<style type="text/css">
    .filters-container ul.filters-option li.check {
        color: inherit;
        display: block;
        padding: 12px 10px;
        text-transform: uppercase;
        font-size: 11px;
    }
</style>

<div class="col-sm-4 col-md-3">
    <h4 class="search-results-title"><i class="soap-icon-search"></i><b><?= (isset($total)) ? $total : '0' ?></b> results found.</h4>
    <div class="search-results-title">
        <div class="form-group">
            <label>KODE PRODUK</label>
            <input type="text" class="input-text full-width" placeholder="" value="">
        </div>
    </div>
                        
    <div class="toggle-container filters-container">
        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#price-filter" class="collapsed">Kategori</a>
            </h4>
            <div id="price-filter" class="panel-collapse collapse">
                <div class="panel-content">
                    <ul class="check-square2 filters-option">
                        <?php 
                        foreach ($jenis->result() as $cat) {
                        ?>
                        
                        <li class="check">
                            <input type="checkbox" name="ccheck" value="<?= $cat->id ?>"> <?= $cat->cat_title ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div><!-- end content -->
            </div>
        </div>
        
        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#cartype-filter" class="collapsed">Status</a>
            </h4>
            <div id="cartype-filter" class="panel-collapse collapse filters-container">
                <div class="panel-content">
                    <ul class="check-square2 filters-option">
                         <?php 
                        foreach ($label->result() as $stat) {
                        ?>
                        <!-- <li><a href="#"><?= $stat->label_title ?></a></li> -->
                        <li class="check">
                            <input type="checkbox" name="scheck" value="<?= $stat->id ?>"> <?= $stat->label_title ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#car-rental-agent-filter" class="collapsed">Kelas Jalan</a>
            </h4>
            <div id="car-rental-agent-filter" class="panel-collapse collapse">
                <div class="panel-content">
                    <ul class="check-square2 filters-option">
                        <?php 
                        foreach ($tipe_jalan->result() as $jalan) {
                        ?>
                        <!-- <li><a href="#"><?= $jalan->road_title ?></a></li> -->
                        <li class="check">
                            <input type="checkbox" name="rcheck" value="<?= $jalan->id ?>"> <?= $jalan->road_title ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#car-preferences-filter" class="collapsed">Ukuran</a>
            </h4>
            <div id="car-preferences-filter" class="panel-collapse collapse">
                <div class="panel-content">
                    <ul class="check-square2 filters-option">
                        <?php 
                        foreach ($sizes->result() as $ukuran) {
                        ?>
                        <!-- <li><a href="#"><?= $ukuran->size ?></a></li> -->
                        <li class="check">
                            <input type="checkbox" name="ucheck" value="<?= $ukuran->id ?>"> <?= $ukuran->size ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#disp-preferences-filter" class="collapsed">Display</a>
            </h4>
            <div id="disp-preferences-filter" class="panel-collapse collapse">
                <div class="panel-content">
                    <ul class="check-square2 filters-option">
                        <li class="check">
                            <input type="checkbox" name="dcheck" value="1>"> Horizontal
                        </li>
                        <li class="check">
                            <input type="checkbox" name="dcheck" value="2>"> Vertical
                        </li>
                      
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Lokasi</a>
            </h4>
            <div id="modify-search-panel" class="panel-collapse collapse">
                <div class="panel-content">
                    <form method="post">
                         <div class="form-group">
                            <label>pilih provinsi</label>
                            <div class="selector">
                                <?php 
                                $additional_dd_code = 'class="full-width" id="province"';
                                $kategori_prov = array('' => 'Please Select',);
                                foreach ($prov->result_array() as $row) {
                                    $kategori_prov[$row['id_prov']] = $row['nama'];   
                                }
                                echo form_dropdown('cat_prov', $kategori_prov, '', $additional_dd_code);
                                ?>
                               <span class="custom-select full-width">Provinsi</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>pilih kota</label>
                            <div class="selector">
                                <select id="madina" name="cat_city" class="full-width">
                            
                                </select>
                                <span class="custom-select full-width">Kota / kabupaten</span>
                            </div>
                        </div>
                       <!--  <div class="form-group">
                            <label>pickup from</label>
                            <input type="text" class="input-text full-width" placeholder="city, district, or specific airpot" value="">
                        </div>
                        -->
                       
                </div>
            </div>
        </div>
    </div>
    <div class="search-results-title">
        <div class="form-group">
            <br>
            <button class="btn-medium uppercase full-width">Cari</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    // let inn = document.querySelector('input[type="checkbox"]');
    
    // inn.addEventListener('click', function(e) {
        
    //     let inp_check = document.querySelector('input[name="ccheck"]:checked');
    //     let cityarray = new Array();        
    //     tjq('input[name="ccheck"]:checked').each(function(){          
    //         cityarray.push(tjq(this).val());
    //     });

    //     console.log(cityarray); 
    // });

    function showValues() {
        let catArray = new Array();   
        let statArray = new Array();
        let roadArray = new Array();
        let sizeArray = new Array();

        let targ = document.getElementById('target');
        let tar = document.getElementById('pageContainer');
        let konten = document.createElement('div');
        konten.classList = 'col-sms-6 col-sm-6 col-md-4';
        konten.innerHTML = `
            
                <article class="box">
                    <figure>
                        <a title="$row->item_title" href="http://localhost:85/hmvc/product/billboard/Jl-Pramuka-View-Dari-Jl-Jenderal-Sudirman-3333020001"><img alt="$row->item_url" src="http://localhost:85/hmvc/marketplace/limapuluh/180404083100_0fa020ba97da80fea3e372e22d08010f.jpg"></a>

                    </figure>

                    <div class="rel-category">
                        <span class="label label-danger">Billboard</span>
                    </div>
                    
                    <div class="details">
                        <a title="Jl. Pramuka ( View Dari Jl. Jenderal Sudirman )" href="http://localhost:85/hmvc/product/billboard/Jl-Pramuka-View-Dari-Jl-Jenderal-Sudirman-3333020001"><small><i class="soap-icon-departure yellow-color"></i> Jl. Pramuka ( View Dari Jl. Jenderal Sudirman )</small></a>
                        <div class="time">
                            <div class="take-off">
                                <div>
                                    <span class="skin-color"><strong>#3333020001</strong></span><br>Jawa Tengah<br>Kab. Banyumas                                                        </div>
                            </div>
                            <div class="landing" style="text-align: right;">
                                <div>
                                    <span class="">Jalan Protokol</span><br>4x8 M<br>Vertikal                                                       </div>
                            </div>
                        </div>
                        <p class="duration">
                            <span class="price">0</span>
                            <span class="skin-color" style="float: left; padding-bottom: 10px;">
                                <label class="label label-success">
                                    Available                                                       </label>
                            </span>
                            
                        </p>
                        <div class="action">
                            <a class="button btn-medium yellow full-width" href="http://localhost:85/hmvc/product/billboard/Jl-Pramuka-View-Dari-Jl-Jenderal-Sudirman-3333020001">Detail</a>
                        </div>
                    </div>
                </article>
            

        `;

        tjq('input[name="ccheck"]:checked').each(function(){          
            catArray.push(tjq(this).val());

            targ.innerHTML = 'sukses pilih';

            console.log(tar);

            tar.appendChild(konten);
        });

        tjq('input[name="scheck"]:checked').each(function(){          
            statArray.push(tjq(this).val());
        });

        tjq('input[name="rcheck"]:checked').each(function(){          
            roadArray.push(tjq(this).val());
        });

        tjq('input[name="ucheck"]:checked').each(function(){          
            sizeArray.push(tjq(this).val());
        });

        if (catArray.length > 0) {
            console.log(catArray); 
        }
    }

   tjq("input[type='checkbox']").on("click", showValues);









  

</script>