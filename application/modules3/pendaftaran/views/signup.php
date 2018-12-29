<?php $home_location = base_url().'templates/home'; ?>
<?php $form_location = base_url().'pendaftaran/entry_daftar'; ?>
<?php $login_page = base_url().'store_login'; ?>
<?php $kebijakan_location = base_url().'templates/kebijakan_privasi';?>
<?php $syarat_location = base_url().'templates/syarat_dan_ketentuan';?>

<div class="container">
                <div class="row">

                	<div class="col-sms-6 col-sm-6 col-md-6">
                    	<div class="center pad-6">
                    		<div>
                    			<img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png">
                    		</div>
                    		<h2>DAFTAR DI WIKLAN</h2>
                    		<h4>Sudah punya akun Wiklan? Masuk <a href="<?= $login_page ?>"><span class="skin-color">di sini</span></a></h4>
                    	</div>

                    </div>

                    <div id="main" class="col-sms-6 col-sm-6 col-md-6">
                        <div class="booking-section travelo-box">
                            
                            <form class="booking-form" method="post" action="<?= $form_location ?>">
                                <div class="person-information">
                                    <h2>Daftar</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-md-12">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" name="nama" value="<?=set_value('nama')?>" required />
                                        </div>
                                        <span class="focus-input100"><?php echo form_error('nama'); ?></span>
                                    </div>
                                    <div class="form-group row">
                      
                                        <div class="col-sm-12 col-md-12">
                                            <label>nomor telepon</label>
                                            <input type="phone" class="input-text full-width" value="" placeholder="" name="no_telp" value="<?=set_value('no_telp')?>" required />
                                        </div>
                                        <span class="focus-input100"><?php echo form_error('no_telp'); ?></span>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-md-12">
                                            <label>email</label>
                                            <input type="email" class="input-text full-width" value="" placeholder="" name="email" value="<?=set_value('email')?>" required />
                                        </div>
                                        <span class="focus-input100"><?php echo form_error('email'); ?></span>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-md-12">
                                            <label>Kata Sandi</label>
                                            <input type="password" class="input-text full-width" value="" placeholder="" name="pword" value="<?=set_value('pword')?>" required />
                                        </div>
                                        <span class="focus-input100"><?php echo form_error('pword'); ?></span>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 col-md-12">
                                            <label>Konfirmasi Kata Sandi</label>
                                            <input type="password" class="input-text full-width" value="" placeholder="" name="repeat_pword" value="<?=set_value('repeat_pword')?>" required />
                                        </div>
                                        <span class="focus-input100"><?php echo form_error('repeat_pword'); ?></span>
                                    </div>

                                    <hr />
                                    
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Dengan menekan Daftar Akun, saya mengkonfirmasi telah menyetujui, <a href="<?= $syarat_location ?>"><span class="skin-color">Syarat dan Ketentuan</span></a> serta <a href="<?= $kebijakan_location ?>"><span class="skin-color">Kebijakan Privasi</span></a> Wiklan.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-12">
                                        <button type="submit" class="full-width btn-large" name="submit" value="Submit">DAFTAR AKUN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    
                    
                </div>
            </div> 