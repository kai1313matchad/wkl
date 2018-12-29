<div class="tab-pane fade in active">  
    <h2>Foto Profil</h2>
    <h5 class="skin-color"><?= $headline ?></h5>
    <?php
    $attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open_multipart('store_profile/do_upload', $attributes);
    ?>
        <div class="row form-group">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="fileinput full-width">
                    <input type="file" class="input-text" name="userfile" data-placeholder="pilih foto / logo">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn-medium" type="submit" name="submit" value="Submit">SIMPAN</button>
            <button class="btn-medium red" type="submit" name="submit" value="Cancel">BATAL</button>
        </div>
    <?php echo form_close(); ?>
</div>