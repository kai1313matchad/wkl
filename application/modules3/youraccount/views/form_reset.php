<?php
$first_bit = $this->uri->segment(1);
$form_location = base_url().$first_bit.'/submit_login';

$action_location = base_url().'youraccount/reset_password_proses';
?>

<?php $home_location = base_url().'templates/home'; ?>
<?php $signup_page = base_url().'youraccount/start'; ?>

<style>
	.container {
		height: 100%;
		padding-top: 150px;
		padding-bottom: 150px;
	}
</style>

<div class="container">
    <div class="row">

    	<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>

    	<div class="col-sms-4 col-sm-4 col-md-4">

        </div>
    	
        <div id="main" class="col-sms-4 col-sm-4 col-md-4">
            <div class="booking-section travelo-box">
                
                <form class="booking-form" action="<?= $action_location ?>" method="post">
                    <div class="person-information">
			            <h2>Reset Password</h2>
                        <input type="hidden" name="email_hash" value="<?= $email_hash ?>">
                        <input type="hidden" name="email_code" value="<?= $email_code ?>">
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Email Anda</label>
                                <input type="email" class="input-text full-width" placeholder="" name="email" value="<?= (isset($email)) ? $email : '' ?>" required />
                            </div>
                            <span class="focus-input100"><?php echo form_error('email'); ?></span>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Password Baru</label>
                                <input type="password" class="input-text full-width" placeholder="" name="pword" value="<?=set_value('pword')?>" required />
                            </div>
                            <span class="focus-input100"><?php echo form_error('pword'); ?></span>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" class="input-text full-width" placeholder="" name="repeat_pword" value="<?=set_value('repeat_pword')?>" required />
                            </div>
                            <span class="focus-input100"><?php echo form_error('repeat_pword'); ?></span>
                        </div>
			                
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-12">
                            <button type="submit" class="full-width btn-large" name="submit" value="Submit">UPDATE MY PASSWORD</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sms-4 col-sm-4 col-md-4">

        </div>
        
    </div>
</div>