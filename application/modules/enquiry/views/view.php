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


<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Detail Pesan
				</h3>
			</div>
		</div>
		<?php $back_location = base_url()."enquiry/inbox"; ?>
		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<a href="<?= $back_location ?>" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-arrow-circle-left"></i>
					<span>
						Back
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
				<?php
				foreach ($query2->result() as $row) {
					$mail = '<span class="vr">'.$row->email.'</span>';
					$id_contact = $row->id;
					$dateArr = explode(' ', $row->waktu_dibuat);
					$onlyDate = $dateArr[0];
					$onlyHour = $dateArr[1];
				?>
				<tr>
					<td style="font-weight: bold;">Date Sent</td><td><?= tgl_indo($onlyDate).',  '.$onlyHour ?></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Sent By</td><td><?= $row->nama.' '.$mail ?></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Subjek</td><td><?= $row->subjek ?></td>
				</tr>
				<tr>
					<td width="20%" style="font-weight: bold;">Pesan</td><td><?= $row->pesan ?></td>
				</tr>
				<?php } ?>
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
	<!--begin::Form-->
	<div class="m-portlet__body">
		<table class="table table-striped table-bordered">
			<tbody>
				<?php
				foreach ($query->result() as $row) {
					$mail = '<span class="vr">'.$row->email.'</span>';
					$nama = $row->nama;
					$id_contact = $row->id;

					if ($row->sent_by > 0) {
		  				$sent_by = "Admin";		
		  			} else {
		  				// $sent_by = $firstname." ".$lastname
		  			}

		  			$dateArr = explode(' ', $row->created_at);
					$onlyDate = $dateArr[0];
					$onlyHour = $dateArr[1];
				?>
				<tr>
					<td style="font-weight: bold;">Date Sent</td><td><?= tgl_indo($onlyDate).',  '.$onlyHour ?></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Sent To</td><td><?= $nama.' '.$mail ?></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Sent By</td><td><?= $sent_by ?></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Subjek</td><td><?= $row->subjek ?></td>
				</tr>
				<tr>
					<td width="20%" style="font-weight: bold;">Pesan</td><td><?= $row->pesan ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

</div>
<!--end::Portlet-->



