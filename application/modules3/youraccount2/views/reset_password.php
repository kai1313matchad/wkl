<?php
$first_bit = $this->uri->segment(1);
$form_location = base_url().$first_bit.'/submit_login';

$action_location = base_url().'youraccount/reset_password';
$back_location = base_url().'youraccount/login';
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
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Masukkan alamat email yang terdaftar di Wiklan</label>
                                <input type="email" class="input-text full-width" placeholder="" name="email" value="<?=set_value('email')?>" required />
                            </div>
                            <span class="focus-input100"><?php echo form_error('email'); ?></span>
                        </div>
			                
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-12">
                            <button type="submit" class="full-width btn-large" name="submit" value="Submit">RESET MY PASSWORD</button>
                            &nbsp;
                            <a href="<?= $back_location ?>" class="button full-width orange btn-large" style="font-weight: bold;
    background: #98ce44; ">CANCEL</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sms-4 col-sm-4 col-md-4">

        </div>
        
    </div>
</div>