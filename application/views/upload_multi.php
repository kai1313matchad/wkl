<?php echo validation_errors('<p class="form_error">','</p>'); ?>
<?php echo form_open_multipart('upload_callback/multi/'); ?>

<input type="file" name="multipleFiles[]" required>
<br>
<input type="file" name="multipleFiles[]" required>
<br>
<input type="file" name="multipleFiles[]" required>

<input type="submit" name="submit" value="Submit">
</form>