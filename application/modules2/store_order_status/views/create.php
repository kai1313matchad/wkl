<h1><?php echo $headline; ?></h1>
<?= validation_errors("<p style='color:red;'>", "</p>") ?>
<?php 
	if (isset($flash)) {
		echo $flash;
	}
?>

<?php
if (is_numeric($update_id)) {
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Order Status </h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			
			<a href="<?= base_url() ?>store_order_status/deleteconf/<?= $update_id ?>"><button type="button" class="btn btn-danger">Delete Order Status</button></a>
		
		</div>
	</div>
</div>			
<?php } ?>
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Order Status Option detail</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<?php $form_location = base_url()."store_order_status/create/".$update_id; ?>
						<form class="form-horizontal" method="post" action="<?= $form_location ?>">
						  <fieldset>
						

							<div class="control-group">
							  <label class="control-label" for="">Status Title </label>
							  <div class="controls">
								<input type="text" class="span4" name="status_title" value="<?php echo $status_title; ?>">
							  </div>
							</div>   

											

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
							  <button type="submit" class="btn" name="submit" value="Cancel">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

