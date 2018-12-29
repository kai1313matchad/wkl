<?php
$first_bit = $this->uri->segment(1);
$form_location = base_url().$first_bit.'/submit_login';

$action_location = base_url().'store_login/submit_login';
?>

<?php $home_location = base_url().'templates/home'; ?>
<?php $signup_page = base_url().'pendaftaran'; ?>

<style>
	.container {
		height: 100%;
		padding-top: 150px;
		padding-bottom: 150px;
	}
</style>

<div class="container">
    <div class="row">

    	<div class="col-sms-6 col-sm-6 col-md-6">
        	<div class="center pad-6">
        		<div>
        			<img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png">
        		</div>
        		<h2>MASUK WIKLAN</h2>
        		<h4>Belum punya akun Wiklan? Daftar <a href="<?= $signup_page ?>"><span class="skin-color">di sini</span></a></h4>
        	</div>

        </div>

        <div id="main" class="col-sms-6 col-sm-6 col-md-6">
            <div class="booking-section travelo-box">
                
                <form class="booking-form" action="<?= $action_location ?>" method="post">
                    <div class="person-information">
			               
	                    <div class="form-group">
	                        <input type="text" class="input-text full-width" placeholder="username" name="username">
	                    </div>
	                    <div class="form-group">
	                        <input type="password" class="input-text full-width" placeholder="password" name="pword">
	                    </div>
	                    <div class="form-group">
	                        <a href="#" class="forgot-password pull-right">Forgot password?</a>
	                        <div class="checkbox checkbox-inline">
	                            <label>
	                                <input type="checkbox"> Remember me
	                            </label>
	                        </div>
	                    </div>
			                
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-12">
                            <button type="submit" class="full-width btn-large" name="submit" value="Submit">MASUK KE WIKLAN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
        
    </div>
</div>