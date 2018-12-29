<?php
$cart_items = $this->db->where('id', $param2)->get('store_basket')->row();
$item_id = $cart_items->item_id;
$item_product = $this->db->where('id', $item_id)->get('store_item')->row();
// get status produk
$cat_stat = $item_product->cat_stat;
$url = $item_product->item_url;
// get akhir tayang
$end_tayang = ($cat_stat == 2) ? Modules::run('manage_product/_get_end_tayang', $url) : '-0d';
$end_tayang_datepicker = ($cat_stat == 2) ? Modules::run('manage_product/_get_end_tayang_datepicker', $url) : '-0d';
?>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.css">

<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">
		Edit <?= $item_product->item_title ?>
	</h5>
	<!-- <?= $end_tayang ?>, <?= $end_tayang_datepicker ?>, <?= $cat_stat ?> -->
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'store_basket/alter', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="id_cart" value="<?= $cart_items->id ?>">
    <input type="hidden" name="end" id="end">
    <input type="hidden" name="harga" id="fix-price" value="<?= $cart_items->price ?>">
	<!-- <div class="m-portlet__body">
		<div class="form-group m-form__group">
			
		</div>
		
	</div> -->

	

	<div class="harganya" id="harganya" style="text-align:center; font-size:30px; color:#7db921; margin-bottom:30px;">
		Rp. <?php
                $nominal = substr(str_replace( ',', '', $cart_items->price), 0);
                $hasil_rupiah = number_format($nominal,0,',','.');
                echo $hasil_rupiah; 
            ?>
	</div>
                <div class="row">
                
                    <div class="col-xs-6">
                        <div class="datepicker-wrap">
                            <input type="text" placeholder="dd/mm/yy" readonly name="start" class="input-text full-width " id="date" dateformat="dd/mm/yyyy" required="required" />
                            <!-- <img class="ui-datepicker-trigger" src="images/icon/blank.png" alt="" title=""> -->
                            <!-- <input type="" name="" id="date"> -->
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="selector">
                            <select name="cat_durasi" class="full-width" id="durasi" required="required">
                                <option value="" selected="selected">Please Select</option>
                                <option value="1_month">1 Bulan</option>
                                <option value="2_month">2 Bulan</option>
                                <option value="3_month">3 Bulan</option>
                                <option value="4_month">4 Bulan</option>
                                <option value="5_month">5 Bulan</option>
                                <option value="6_month">6 Bulan</option>
                                <option value="7_month">7 Bulan</option>
                                <option value="8_month">8 Bulan</option>
                                <option value="9_month">9 Bulan</option>
                                <option value="10_month">10 Bulan</option>
                                <option value="11_month">11 Bulan</option>
                                <option value="12_month">12 Bulan</option>
                            </select>
                            <span class="custom-select full-width">Pilih durasi</span>
                        </div>
                    </div>
                </div>
                <div id="hasil" style="text-align: center; margin-top: 20px; color: red;"></div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn" data-dismiss="modal">
		Close
	</button>
	<button type="submit" id="btn-ubah" class="btn btn-primary">
		Save Change
	</button>
</div>

<?php
echo form_close();
?> 

<script type="text/javascript" src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // date.setDate(date.getDate()-1);
    tjq('#date').datepicker({
        // format: "mm/dd/yyyy",
        startDate: '<?= $end_tayang_datepicker ?>', //new Date(),
        todayHighlight:'TRUE',
    });
</script>

<script type="text/javascript">
    let pil = document.getElementById('durasi');
    let res = document.getElementById('hasil');
    let harg = document.getElementById('harganya');
    
    var d;

    pil.addEventListener('change', function(e) {
        let pil_val = this.value;
        let start = document.getElementById('date').value;

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
            let arr = <?php $this->load->module('price_based_duration'); echo json_encode($this->price_based_duration->arr_price($cart_items->item_id)); ?>;
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
                document.getElementById('fix-price').value = res;
                tjq('#btn-ubah').attr('type', 'submit');
            } else {
                harg.innerHTML = 'tidak tersedia';
                tjq('#btn-ubah').attr('type', 'button');
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
            return 'Rp. ' + rupiah;
        }

</script>