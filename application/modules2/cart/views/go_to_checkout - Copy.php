<h1>Please Create An Account</h1>
<p>You do not need to create an Account with us, however, if your do then you'll be able to enjoy:</p>
<p>
	<ul>
		<li>Order Tracking</li>
		<li>Downloadable Order Forms</li>
		<li>Priority Technical Support</li>
	</ul>
</p>
<p>Creating an account only takes a minute or so and it's agood vibe.</p>
<p>Would you like to create an account?</p>

<div class="col-md-10" style="margin-top: 20px;">
	<?php echo form_open('cart/submit_choice'); ?>
		<button type="submit" class="brn btn-success" name="submit" value="Yes">
			Yes - Create Account
		</button>
		
		<button type="submit" style="margin-left: 24px;" class="brn btn-danger" name="submit" value="No">
			No Thanks
		</button>

		<a href="<?= base_url() ?>youraccount/login">
			<button type="submit" style="margin-left: 24px;" class="brn btn-primary" name="submit">
				Already have account (login)
			</button>
		</a>

	<?php 
	echo form_hidden('checkout_token', $checkout_token);
	echo form_close(); ?>
</div>