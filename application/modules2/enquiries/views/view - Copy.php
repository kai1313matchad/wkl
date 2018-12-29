<!-- <h1><?php echo $headline; ?></h1>
<?= validation_errors("<p style='color:red;'>", "</p>") ?>
<?php 
	if (isset($flash)) {
		echo $flash;
	}
?>

<?php
$create_msg_url = base_url()."enquiries/create/".$update_id;

$this->load->module('timedate');
$this->load->module('store_accounts');
foreach ($query->result() as $row) { 

	$view_url = base_url().'enquiries/view/'.$row->id;

	$opened = $row->opened;
	if ($opened == 1) {
		$icon = '<li class="icon-envelope"></li>';
	} else {
		$icon = '<li class="icon-envelope-alt" style="color: orange;"></li>';
	}

	$date_sent = $this->timedate->get_nice_date($row->date_created, 'full');

	if ($row->sent_by == 0) {
		$sent_by = "Admin";		
	} else {
		$sent_by = $this->store_accounts->_get_customer_name($row->sent_by);
	}	

	$subject = $row->subject;
	$message = $row->message;
	$ranking = $row->ranking;
}	
?>
	<p style="margin-top:30px">
		<a href="<?php echo $create_msg_url; ?>">
			<button type="button" class="btn btn-primary">Reply Message</button>
		</a>
		<a href="#myModal" role="button" class="btn btn-info" data-toggle="modal">Create New Comment</a>
<!-- Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                <h3 id="myModalLabel">Create New Comment</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url().'comments/submit' ?>">
                <p>
                	
                		<div class="control-group">
                			<label class="control-label">Comment</label>
                			<div class="controls">
                				<textarea rows="6" name="comment"></textarea>
                			</div>
                		</div>
                	
                </p>    
            </div>
            <div class="modal-footer">
                <button class="button-small red rounded3" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="button-small blue rounded3">Save changes</button>
            </div>
            <?php
            echo form_hidden('comment_type', 'e');
            echo form_hidden('update_id', $update_id);
            ?>
            </form>
        </div> 

	</p>

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white star"></i><span class="break"></span>Enquiry Ranking</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<?php $form_location = base_url()."enquiries/submit_ranking/".$update_id; ?>
						<form class="form-horizontal" method="post" action="<?= $form_location ?>">
						  <fieldset>
						  	
						  	<div class="control-group">
							  <label class="control-label" for="">Ranking </label>
							  <div class="controls">
							  	<?php 
							  	$additional_dd_code = 'id="selectError3"';  	
							  	if ($ranking > 0) {
							  		unset($options['']);		
							  	}	
							  	echo form_dropdown('ranking', $options, $ranking, $additional_dd_code);
							  	?>
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


<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Enquire detail</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">

			<table class="table table-striped table-bordered bootstrap-datatable">
				 <tbody>
		
					<tr>
						<td style="font-weight: bold;">Date Sent</td><td><?= $date_sent ?></td>
					</tr>
					<tr>	
						<td style="font-weight: bold;">Sent By</td><td><?= $sent_by ?></td>
					</tr>
					<tr>	
						<td style="font-weight: bold;">Subject</td><td><?= $subject ?></td>
					</tr>
					<tr>	
						<td style="font-weight: bold; vertical-align: top;">Message</td><td style="vertical-align: top;"><?= nl2br($message) ?></td>
					</tr>

				  </tbody>
			  </table>        

		</div>
	</div>
</div>		

<?php
	echo Modules::run('comments/_draw_comment', 'e', $update_id);
?>	

 -->




<style>
	.vr {
		background-color: #f5f5f5;
	    border: 1px solid #d9d9d9;
	    cursor: default;
	    *display: block;
	    font-weight: 600;
	    padding: 5px;
	    white-space: nowrap;
	    -webkit-border-radius: 3px;
	    border-radius: 3px;
	    min-width: 90px;
	}
</style>

<?php
$create_msg_url = base_url()."enquiries/create/".$update_id;
$back_location = base_url()."enquiries/inbox";

$this->load->module('timedate');
$this->load->module('store_accounts');
foreach ($query->result() as $row) { 

	$view_url = base_url().'enquiries/view/'.$row->id;

	$opened = $row->opened;
	if ($opened == 1) {
		$icon = '<li class="icon-envelope"></li>';
	} else {
		$icon = '<li class="icon-envelope-alt" style="color: orange;"></li>';
	}

	$date_sent = $this->timedate->get_nice_date($row->date_created, 'full');

	if ($row->sent_by == 0) {
		$sent_by = "Admin";		
	} else {
		$sent_by = $this->store_accounts->_get_customer_name($row->sent_by);
	}	

	$subject = $row->subject;
	$message = $row->message;
	$ranking = $row->ranking;
}	
?>

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Enquiry Detail
				</h3>
			</div>
		</div>
		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<a href="<?= $back_location ?>" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-arrow-circle-left"></i>
					<span>
						Back
					</span>
				</span>
			</a>
			<a href="<?= $create_msg_url ?>" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-arrow-circle-left"></i>
					<span>
						Reply Message
					</span>
				</span>
			</a>
			<div class="m-separator m-separator--dashed d-xl-none"></div>
		</div>
	</div>
	<div class="m-portlet__body">
		<!--begin::Form-->
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>
					<td style="font-weight: bold;">Date Sent</td><td><?= $date_sent ?></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Sent By</td><td><?= $sent_by ?></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Subjek</td><td><?= $subject ?></td>
				</tr>
				<tr>
					<td width="20%" style="font-weight: bold;">Pesan</td><td><?= $message ?></td>
				</tr>
				
			</tbody>
		</table>
	</div>
	
</div>
<!--end::Portlet-->

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					<?= $headline ?>
				</h3>
			</div>
		</div>
		
	</div>
	

</div>
<!--end::Portlet-->



