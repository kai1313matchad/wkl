<style>
    .contact-box p {
        text-align: justify;
    }

    .required {
        color: red;
        font-size: 14px;
    }

    .keterangan {
        color: red;
        font-size: 14px;
        font-style: italic;
    }

    #leftCount {
        color: red;
    }

    .description span {
        font-style: italic;
    }
</style>

<div class="tab-pane fade in active">  
    <h2>Testimoni</h2>
    <!-- alert -->
        <?php 
        if (isset($flash)) {
            echo $flash;
        }
        ?>
    <h5 class="skin-color"><?= $headline ?></h5>
    <?php
    $attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open_multipart('store_testimoni/submit_testimoni', $attributes);
    ?>
        <input type="hidden" name="status" value="0">
        <!-- nama -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Nama Lengkap<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" name="nama" onkeydown="return alphaOnly(event);" value="<?= $username ?>">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
            </div>
        </div>

          <!-- profil -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Company</label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" name="profil" value="<?= $company ?>">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('profil'); ?></span>
            </div>
        </div>


        <!-- email -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Email<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="email" class="input-text full-width" name="email" value="<?= $email ?>">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
            </div>
        </div>

      
      
        <!-- testimoni -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Testimoni<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <textarea type="text" id="myText" class="input-text full-width" style="height: 100px;" name="testimoni"></textarea>
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('testimoni'); ?></span>
            </div>
            <span id="leftCount">200</span> karakter tersisa
        </div>

        <hr>

        <!-- button -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
            </div>
            <div class="col-sms-7 col-sm-7">
                <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">SIMPAN TESTIMONI</button>
            </div>
        </div>
        <span class="keterangan">* wajib diisi</span>
    <?php echo form_close(); ?>
</div>


<script>
// only number input
tjq("#telp1, #telp2, #telp3").keypress(validateNumber);

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

// only alpha input
// tjq("#telp1, #telp2, #telp3").keypress(alphaOnly);

function alphaOnly(event) {
    var key = event.keyCode;
    // if (event.keyCode === 8 || event.keyCode === 46) {
   //      return true;
   //  } else if ( key >= 65 && key <= 90 ) {
   //      return false;
   //  } else {
   //      return true;
   //  }
    return ((key >= 65 && key <= 90) || key == 8 || key == 9 || key == 32 || (key >= 188 && key <= 190) || key == 222);
};

var myText = document.getElementById("myText");
var leftCount = document.getElementById("leftCount");
var limitNum = 200;

myText.addEventListener("keyup", function() {
    var characters = myText.value.split('');
    if (characters.length > limitNum) {
        myText.value = myText.value.substring(0, limitNum);
    } else {
        leftCount.innerText = limitNum - characters.length;
    }
})

</script>