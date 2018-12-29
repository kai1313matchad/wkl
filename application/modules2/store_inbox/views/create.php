<?php
$back = base_url().'store_inbox';
$form_location = base_url().'store_inbox/create/'.$code;
?>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>marketplace/css/jquery.wysiwygEditor.css">

<div class="tab-pane fade in active">

	<div class="row">
		<div class="col-md-6">
	    	<h2>Kirim Pesan Baru</h2>
	    </div>

	    <div class="col-md-6">
	    </div>
	</div>  

	<div class="col-sm-12 no-float no-padding">
		<!-- alert -->
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>

		<form method="post" action="<?= $form_location ?>">
			<?php
			if ($code == "") {
			?>
            <div class="row form-group">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <label>Subjek</label>
                    <input type="text" class="input-text full-width" id="subject" placeholder="" name="subject" value="<?= $subject ?>">
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('subject'); ?></span>
                </div>
            </div>
            <?php
		  	} else {
		  		echo form_hidden('subject', $subject);	
		  	} ?>
            <div class="row form-group">
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <label>Pesan</label>
                    <textarea type="text" class="input-text full-width" style="height: 100px;" id="mytextarea" placeholder="" name="message" rows="10"><?= $message ?></textarea>

                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('message'); ?></span>
                </div>

            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="urgent" value="1" 
                    <?php 
                    	if ($urgent == 1) {
                    		echo "checked";
                    	}
                    ?>
                    >Urgent
                </label>
            </div>
            <div class="form-group">
            	<button type="submit" class="btn-medium" name="submit" value="Submit">Kirim Pesan</button>
	            <button type="submit" class="btn-medium red" name="submit" value="Cancel">Batal</button>
            </div>
            <?php
		  	echo form_hidden('token', $token);
		  	?>
        </form>

	</div>

</div>

<script>
  tinymce.init({
    selector: '#mytextarea',
    height : 300
  });
</script>
