<?php
$form_location = current_url();
?>

<h1><?= $headline ?></h1>

<div class="row">
	<div class="col-md-8">

<?php
	echo validation_errors("<p style='color:red;'>", "</p>");
?>

		<form method="post" action="<?= $form_location ?>" style="margin-top:24px;">
			<?php
			if ($code == "") {
			?>
		  	<div class="form-group">
		    	<label for="subject">Subject</label>
		    	<input type="text" class="form-control" id="subject" placeholder="Enter subject" name="subject" value="<?= $subject ?>">
		  	</div>
		  	<?php
		  	} else {
		  		echo form_hidden('subject', $subject);	
		  	} ?>
		  	<div class="form-group">
		    	<label for="message">Message</label>
		    	<textarea class="form-control" id="message" placeholder="Enter Message" name="message" rows="6"><?= $message ?></textarea>
		  	</div>
		  	<div class="checkbox">
		    	<label>
		      		<input name="urgent" value="1" type="checkbox" <?php if ($urgent == 1) echo " checked"; ?>> Urgent
		    	</label>
		  	</div>
		  	<button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit Message</button>
		  	<button type="submit" name="submit" value="Cancel" class="btn btn-default">Cancel</button>
		  	<?php
		  	echo form_hidden('token', $token);
		  	?>
		</form>

	</div>
	<div class="col-md-4">

	</div>
</div>


