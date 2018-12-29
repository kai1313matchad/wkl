
<?php $home_location = base_url().'templates/home'; ?>
<?php $form_location = base_url().'pendaftaran/entry_daftar'; ?>

<style>
	.focus-input100 {
		color: #721c24 !important;
		font-style: italic;
		font-size: 8px;
		margin-top: 40px;
	}
</style>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?php echo base_url(); ?>LandingPageFiles/halaman_daftar/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Daftar
					</span>
				</div>

				<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>

				<form class="login100-form validate-form" method="post" action="<?= $form_location ?>">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Nama Lengkap</span>
						<input class="input100" type="text" name="nama" placeholder="Inputkan Nama" value="<?=set_value('nama')?>" required>
						<span class="focus-input100"><?php echo form_error('nama'); ?></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Inputkan email" value="<?=set_value('email')?>">
						<span class="focus-input100"><?php echo form_error('email'); ?></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "phone number is required">
						<span class="label-input100">No. Telpon</span>
						<input class="input100" type="phone" name="no_telp" id="inputTelp" maxlength="13" placeholder="Inputkan no telpon" value="<?=set_value('no_telp')?>" required>
						<span class="focus-input100"><?php echo form_error('no_telp'); ?></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "address is required">
						<span class="label-input100">Alamat </span>
						<textarea class="input100" name="alamat" placeholder="Inputkan alamat" required><?=set_value('alamat')?></textarea>
						<span class="focus-input100"><?php echo form_error('alamat'); ?></span>
					</div>

					<input type="hidden" name="status" value="1">

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="margin-right:20px;" type="submit" name="submit" value="Submit">
							Daftar
						</button>

						<a href="<?= $home_location ?>"><button type="button" class="login100-form-btn">Kembali ke Home</button></a>
					</div>
				</form>
			</div>
		</div>
	</div>