<div class="modal-body">
                <div class="row form-group">
                    <div class="col-sms-2 col-sm-2">
                        <label>Harga</label>
                    </div>
                    <div class="col-sms-7 col-sm-7">
                        <input type="text" class="input-text full-width" id="harga_target">
                    </div>
                   
                    <div class="col-sms-3 col-sm-3">
                        <span>Isi harga yang akan dijual ke klien</span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sms-2 col-sm-2">
                        <label>Durasi</label>
                    </div>
                    <div class="col-sms-7 col-sm-7">
                        <div class="selector">
                            <select class="full-width" id="durasi">
                                <option value="" selected="selected">Please Select</option>
                                <option value="1">1 Bulan</option>
                                <option value="2">2 Bulan</option>
                                <option value="3">3 Bulan</option>
                                <option value="4">4 Bulan</option>
                                <option value="5">5 Bulan</option>
                                <option value="6">6 Bulan</option>
                                <option value="7">7 Bulan</option>
                                <option value="8">8 Bulan</option>
                                <option value="9">9 Bulan</option>
                                <option value="10">10 Bulan</option>
                                <option value="11">11 Bulan</option>
                                <option value="12">12 Bulan</option>
                            </select>
                            <span class="custom-select full-width">Please Select</span>
                        </div>
                    </div>
                   
                    <div class="col-sms-3 col-sm-3">
                        <span>Durasi sewa</span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sms-2 col-sm-2">
                        <label>Harga</label>
                    </div>
                    <div class="col-sms-7 col-sm-7">
                        <div id="harga_bayar"></div>
                    </div>
                   
                    <div class="col-sms-3 col-sm-3">
                        <span>Harga berdasarkan durasi sewa</span>
                    </div>
                </div>   

            </div>


<script>
let har_targ = document.getElementById('harga_target');
let dur = document.getElementById('durasi');
let targ = document.getElementById('harga_bayar');
let was_price = document.getElementById('was_price');

// live format rupiah
was_price.addEventListener('keyup', liveCurrency);

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



dur.addEventListener('change', function(e) {
    let dur_val = this.value;
    let harg_val = har_targ.value;

    if (harg_val == '') {
        alert('tidak boleh kosong!');
    }

    // get price in month
    let pri = harg_val;
    let perMonth = parseInt(pri) / 12;

    switch(dur_val) {
        case '1':
            ress = perMonth * 1;
        break;

        case '2':
            ress = perMonth * 2;
        break;

        case '3':
            ress = perMonth * 3;
        break;

        case '4':
            ress = perMonth * 4;
        break;

        case '6':
            ress = perMonth * 6;
        break;

        case '9':
            ress = perMonth * 9;
        break;

        default:
            ress = harg_val;
    }

    targ.innerHTML = Math.floor(ress);

})   

// only number input
tjq("#was_price, #harga_target").keypress(validateNumber);

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