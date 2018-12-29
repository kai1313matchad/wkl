

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
$this->load->module('manage_daftar');
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
		$sent_by = $this->manage_daftar->_get_customer_name($row->sent_by);
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
			<a href="<?= $create_msg_url ?>" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-envelope"></i>
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
