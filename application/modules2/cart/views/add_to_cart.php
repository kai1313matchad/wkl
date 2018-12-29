<?php
$img_50 = base_url().'marketplace/limapuluh/900x500/'.$limapuluh;
$login_location = base_url().'youraccount/login';
$rate = $jml_rate * 20;
?>

<style type="text/css">
	.feedback2 {
		padding: 8px 0 2px;
	    margin-bottom: 10px;
	    border-bottom: 1px solid #f5f5f5;
	}
    #hasil{
        margin-top: 8px;
    }
	#ket-slot, #hasil {
		font-style: italic;
		color: red;
		font-size: 11px;
	}
</style>

<article class="detailed-logo">
        <figure>
            <img src="<?= $img_50 ?>" alt="" width="270" height="160" draggable="false">
        </figure>
        <div class="details">
            <h3 class="box-title">
                <?= $item_title ?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space"><?= $kecamatan ?> - <?= $kota ?> - <?= $provinsi ?></span></small>
            </h3>
            
            <div class="feedback clearfix">
                <div title="" class="five-stars-container" data-toggle="tooltip" data-placement="bottom" data-original-title="4 stars"><span class="five-stars" style="width: <?= $rate ?>%;"></span></div>
                <span class="review pull-right"><?= $jml_ulasan ?> ulasan</span>
            </div>
             <span class="price clearfix">
                <?php
                if ($this->session->userdata('user_id')) {
                ?>
                <span class="pull-right" id="harganya">
                    <?php
                        $this->load->module('site_settings');
                        $price = $this->site_settings->rupiah($item_price);
                    ?>
                </span>
                <?php } else { ?>
                <span id="kudu_login"><a href="<?= $login_location ?>">Login</a> untuk melihat harga</span>
                <?php } ?>
            </span>
            <?php
            echo form_open('store_basket/add_to_basket');
            ?>
	            <div class="feedback clearfix">
	                <div class="datepicker-wrap">
                        <input type="text" placeholder="dd/mm/yy" readonly name="start" class="input-text full-width" id="date-input" dateformat="dd/mm/yyyy" required="required" />
	                </div>
	            </div>
                <input type="hidden" name="price" id="harga"> 
                <input type="hidden" name="end" id="end">
                
	            <div class="selector">
                <?php if ($ket_lokasi == 1) { ?>    
	                <?php 
	                $additional_dd_code = 'class="full-width" id="durasi" required="required"';
	                $kategori_durasi = array('' => 'Please Select',);
	                foreach ($tipe_durasi->result_array() as $row) {
	                    $nama_durasi = explode('_', $row['duration_title']);
	                    $nama_durasi = $nama_durasi[0].' Bulan';

	                    $kategori_durasi[$row['duration_title']] = $nama_durasi;
	                }
	                echo form_dropdown('cat_durasi', $kategori_durasi, '', $additional_dd_code);
	                ?>
	                <span class="custom-select full-width" style="margin-bottom: 20px;">Pilih durasi</span>
	           
                <?php } else { ?>
                    <?php 
                    $additional_dd_code = 'class="full-width" id="durasi" required="required"';
                    $kategori_durasi = array('' => 'Please Select',);
                    foreach ($tipe_durasi->result_array() as $row) {
                        if ($row['id'] > 5) {
                            $nama_durasi = explode('_', $row['duration_title']);
                            $nama_durasi = $nama_durasi[0].' Bulan';

                            $kategori_durasi[$row['duration_title']] = $nama_durasi;
                        }                        
                    }
                    echo form_dropdown('cat_durasi', $kategori_durasi, '', $additional_dd_code);
                    ?>
                    <span class="custom-select full-width" style="margin-bottom: 20px;">Pilih durasi</span>
                </div>    
                <?php } ?>    
	            <span id="hasil"></span>
	            <hr>
	            
	            <?php
	            if (isset($user)) { ?>
    	            <a class="button custom-color full-width uppercase btn-medium" id="" data-prod="<?= $prod_id ?>" data-user="<?= $user ?>">add to wishlist</a>

                    <button type="submit" class="button green full-width uppercase btn-medium" id="btn-permintaan" name="submit" value="Submit">permintaan penawaran</button>

	            <?php } else { ?>
                    <button type="button" class="button green full-width uppercase btn-medium" name="submit" id="fake_btn">permintaan penawaran</button>
                <?php } ?>    
	            
	        <?php
            echo form_hidden('item_id', $item_id);
            echo form_close();
            ?> 


        </div>
    </article>

<script>
    document.getElementById('fake_btn').addEventListener('click', mustLogin);
    document.body.addEventListener('click', wishList);  

    function mustLogin (e) {
        alert('anda harus login terlebih dahulu')
    }

    function wishList(e) {
        let source = e.target;
    
        let prod = source.dataset.prod;
        let user = source.dataset.user;

        if (!isNaN(prod) && !isNaN(user)) {
            tjq.ajax({
                url:"<?php echo base_url('store_product/wish');?>",
                method: "POST",
                data: {user_id:user, prod_id:prod},
                dataType: 'json',
                success: function(data) {
                    alert(data.msg);
                    console.log(data.msg);
                }
            });
        }

        console.log(prod+' '+user);
    }
</script>

<script type="text/javascript">
    let pil = document.getElementById('durasi');
    let res = document.getElementById('hasil');
    let harg = document.getElementById('harganya');
    
    var d;

    pil.addEventListener('change', function(e) {
        let pil_val = this.value;
        let start = document.getElementById('date-input').value;

        console.log(pil_val +' '+ start);

        setTanggal(pil_val, start);
        
        changePrice(pil_val);
        
        e.preventDefault();
    });

    // -------------------------------------------------------
        Date.isLeapYear = function (year) {
            return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
        };

        Date.getDaysInMonth = function (year, month) {
            return [31, (Date.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
        };

        Date.prototype.isLeapYear = function () {
            return Date.isLeapYear(this.getFullYear());
        };

        Date.prototype.getDaysInMonth = function () {
            return Date.getDaysInMonth(this.getFullYear(), this.getMonth());
        };

        Date.prototype.addMonths = function (value) {
            var n = this.getDate();
            var m = this.getMonth();
            var y = this.getFullYear();
            console.log(n + ' ' + m + ' ' + y);
            this.setDate(1);
            // this.setMonth(this.getMonth() + value);
            this.setMonth(m + parseInt(value));
            this.setDate(Math.min(n, this.getDaysInMonth()));
            return this;
        };

        // --------------------------------------------------------------------------------------
        
        function setTanggal(durasi, tgl) {
        	if (tgl != '') {
	            d = new Date(tgl);

	            d.addMonths(durasi);

	            var month = d.getUTCMonth() + 1; //months from 1-12
	            var day = d.getUTCDate();
	            var year = d.getUTCFullYear();

	            newdate = day + "/" + month + "/" + year;

	            res.innerHTML = 'berakhir pada tgl: ' + newdate;
                document.getElementById('end').value = newdate;
            } else {
            	res.innerHTML = 'anda harus memilih tanggal terlebih dahulu!';
            }
        }

        function changePrice (durasi) {
            let arr = <?php $this->load->module('price_based_duration'); echo json_encode($this->price_based_duration->arr_price($item_id)); ?>;
            let res;
            switch (durasi) {
                case '1_month':
                    res = arr[0];
                    break;
                case '2_month':
                    res = arr[1];
                    break;
                case '3_month':
                    res = arr[2];
                    break;
                case '4_month':
                    res = arr[3];
                    break;
                case '5_month':
                    res = arr[4];
                    break;
                case '6_month':
                    res = arr[5];
                    break;
                case '7_month':
                    res = arr[6];
                    break;  
                case '8_month':
                    res = arr[7];
                    break;
                case '9_month':
                    res = arr[8];
                    break;
                case '10_month':
                    res = arr[9];
                    break;
                case '11_month':
                    res = arr[10];
                    break;                         
                default:
                    res = arr[11];
                    break;
            }
            if(res != null) {
                harg.innerHTML = formatRupiah(res);
                document.getElementById('harga').value = res;
                tjq('#btn-permintaan').attr('type', 'submit');
            } else {
                harg.innerHTML = 'tidak tersedia';
                tjq('#btn-permintaan').attr('type', 'button');
            }    
        }

        function formatRupiah (number_string) {
            var sisa    = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                    
            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah;
        }

</script>