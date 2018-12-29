<div class="tab-pane fade in active">
    <?php $form_location = base_url()."store_profile/update_pword"; ?>
    <h2>Ubah Password</h2>
    <h5 class="skin-color">Perbarui Password Anda</h5>
    <form method="post" action="<?= $form_location ?>">
        <div class="row form-group">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <label>Password</label>
                <input type="password" id="pword" name="pword" class="input-text full-width">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <label>Ulangi Password</label>
                <input type="password" id="repeat_pword" name="repeat_pword" class="input-text full-width">
            </div>
        </div>
        <div class="form-group">
            <button class="btn-medium" type="submit" name="submit" value="Submit">SIMPAN</button>
            <button class="btn-medium red" type="submit" name="submit" value="Cancel">BATAL</button>
        </div>
    </form>
</div>