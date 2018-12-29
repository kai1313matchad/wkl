<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
?>

<style type="text/css">
	section#content {
		min-height: 150px;
		padding-top: 10px;
	}
	.required {
        color: red;
        font-size: 14px;
    }

    .opsi {
    	font-size: 9px;
    	font-style: italic;
    	text-transform: lowercase;
    }

    .keterangan {
    	color: red;
        font-size: 14px;
        font-style: italic;
    }

    .justify {
        text-align: justify !important;
    }
    #hasil-cek {
        font-style: italic;
    }
    p.red {
        color: red;
    }
    p.green {
        color: green;
    }

    /***************verifying***************/
    .verified {
        background-color: #22cd33;
        border-radius: 2px;
        font-size: 9px;
        color: #fff;
        padding: 2px 10px;
    }
    .unverified {
        background-color: #ff5000;
        border-radius: 2px;
        font-size: 9px;
        color: #fff;
        padding: 2px 10px;
    }
    .verified .icon-check {
        margin-right: 4px;
        background-color: #22cd33;
    }
    /*.icon-check {
        vertical-align: baseline;
        position: relative;
        display: -webkit-inline-flex;
        display: -ms-inline-flex;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .icon-add, .icon-check {
        vertical-align: text-top;
    }
    */
    .icon-check{
        width: 20px;
        height: 20px;
        background-color: #22cd33 !important;
    }
    .icon-white:after, .icon-white:before {
        border-color: #fff;
    }
   
</style>

<div class="col-md-12">
	<section id="content">
		<div class="global-map-area promo-box parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 45.5px;">
	        <div class="container">
	            <div class="content-section description col-sm-12" style="height: 273px;">
	                <div class="table-wrapper hidden-table-sm" style="height: 100%;">
	                    <div class="table-cell col-sm-12">
	                        <h2 class="m-title" style="margin-left: 30px;">
	                            Konfirmasi Pembayaran
	                        </h2>
	                    </div>
	                    
	                </div>
	            </div>
	            
	        </div>
	    </div>
	</section>
</div>



<div id="main" class="col-sm-8 col-md-9">

<!-- alert -->
<?php 
if (isset($flash)) {
    echo $flash;
}
?>

    <div class="booking-information travelo-box">
        <?php
	    echo form_open_multipart('confirmation/add_confirm');
	    ?>

	    <!-- order id -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>NO Invoice<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" name="order_id" id="order_id" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('order_id'); ?></span>
            </div>
            <div class="col-sms-3 col-sms-3">
                <span id="hasil-cek"></span>
                <!-- <span class="verified"><span class="icon-check icon-white icon-xs"></span>VERIFIED</span> -->
            </div>
        </div>

        <!-- tanggal transaksi -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Tgl Transaksi<span class="required">*</span></label>
            </div>
            <div class="col-sms-4 col-sm-4">
            	<div class="form-group">
                    <div class="datepicker-wrap">
                        <input type="text" placeholder="Tgl Transaksi" name="tgl_transaksi" class="input-text full-width" />
                    </div>
                </div>
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('tgl_transaksi'); ?></span>
            </div>
        </div>

	    <!-- nama -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Nama Pengirim<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" name="nama" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
            </div>
        </div>

        <!-- rekening -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>No Rekening<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" id="rekening" name="no_rek" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('no_rek'); ?></span>
            </div>
        </div>

        <!-- jumlah ditransfer -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Jumlah Ditransfer<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" id="jml_transfer" name="jml_transfer" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('jml_transfer'); ?></span>
            </div>
        </div>

        <!-- bank -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Pembayaran ke Bank<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
            	
            	<div class="selector" style="display: flex; align-items: center;">
                    <?php 
                    $additional_dd_code = 'class="full-width"';
                    $jenis_bank = array('' => 'Please Select',);
                    foreach ($banks->result_array() as $row) {
                        $jenis_bank[$row['id']] = $row['title'].' #'.$row['rekening'].' a/n '.$row['anam'];   
                    }
                    echo form_dropdown('nama_bank', $jenis_bank, '', $additional_dd_code);
                    ?> 
                    <span class="custom-select full-width">Nama Bank</span>
                </div>
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama_bank'); ?></span>
            </div>
        </div>

        <!-- email -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Email<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" name="email" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
            </div>
        </div>

        <!-- telpon -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>No Telepon<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" name="telpon" id="telpon" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('telpon'); ?></span>
            </div>
        </div>

        <!-- bukti tranfer -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Bukti Transfer<span class="opsi"> (opsional)</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <div class="fileinput full-width" style="line-height: 34px;">
                    <input type="file" class="input-text" name="bukti" data-placeholder="pilih gambar"><input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
                </div>
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('bukti'); ?></span>
            </div>
        </div>

        <!-- catatan -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Catatan</label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <textarea type="text" class="input-text full-width" style="height: 100px;" name="catatan" ></textarea>
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('catatan'); ?></span>
            </div>
        </div>

        <hr>
        <!-- button -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
            </div>
            <div class="col-sms-7 col-sm-7">
                <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">KIRIM</button>
            </div>
        </div>

        <span class="keterangan">* wajib diisi</span>
	    <?= form_close() ?> 
    </div>
</div>

<div class="sidebar col-sm-4 col-md-3">
    <?= Modules::run('templates/need_help') ?>
</div>



<script>
	
    // live format rupiah
    document.getElementById('jml_transfer').addEventListener('keyup', liveCurrency);

    function liveCurrency() {
        var $this = this;
        let input = $this.value;
        input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt( input, 10 ) : 0;

        let show = function() {
            return ( input === 0 ) ? "" : input.toLocaleString( "id-ID" ); 
        };

        $this.value = show();
    }

    document.getElementById('order_id').addEventListener('keyup', function(e) {
        var orderId = this.value;
        // console.log(orderId);

        tjq.ajax({
            url:'<?= base_url() ?>confirmation/check_order_id',
            method: 'post',
            dataType: 'json',
            data:{id:orderId},
            success:function(resp) {
                console.log(resp);
                if (resp['success']) {
                    tjq('#hasil-cek').html('<span class="verified">'+resp['success']+'</span>');
                } 
                if (resp['error']) {
                    tjq('#hasil-cek').html('<span class="unverified">'+resp['error']+'</span>');
                }
            },
            error: function() {
                // 
            }
        })
    })

// only number input
tjq("#rekening, #jml_transfer, #telpon").keypress(validateNumber);

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};
</script>
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