<?php
$first_bit = $this->uri->segment(1);
$form_location = base_url().$first_bit.'/submit_login';
$action_location = base_url().'youraccount/submit_login';
$forgot_location = base_url().'youraccount/reset_password';
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

    	<div class="col-sms-6 col-sm-6 col-md-6">
        	<div class="center pad-6">
        		<div>
        			<a href="<?= base_url() ?>"><img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png"></a>
        		</div>
        		<h2>MASUK WIKLAN</h2>
        		<h4>Belum punya akun Wiklan? Daftar <a href="<?= $signup_page ?>"><span class="skin-color">disini</span></a></h4>
        	</div>

        </div>

        <div id="main" class="col-sms-6 col-sm-6 col-md-6">
            <div class="booking-section travelo-box">
                
                <form class="booking-form" action="<?= $action_location ?>" method="post">
                    <div class="person-information">
			               
	                    <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Username</label>
    	                        <input type="text" class="input-text full-width" placeholder="username" name="username">
                            </div>
	                    </div>
	                    <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Password</label>
    	                        <input type="password" class="input-text full-width" placeholder="password" name="pword">
                            </div>
	                    </div>
	                    <div class="form-group">
	                        <a href="<?= $forgot_location ?>" class="forgot-password pull-right">Forgot password?</a>
	                        <div class="checkbox2 checkbox-inline2">
	                            <label>
	                                <input type="checkbox" name="remember" value="remember-me"> Remember me
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