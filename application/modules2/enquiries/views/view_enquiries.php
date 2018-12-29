<style type="text/css">
	.urgent {
		color: red;
	}
</style>

<!-- <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
	<div class="m-alert__icon">
		<i class="flaticon-exclamation m--font-brand"></i>
	</div>
	<div class="m-alert__text">
		The Metronic Datatable component supports initialization from HTML table. It also defines the schema model of the data source. In addition to the visualization, the Datatable provides built-in support for operations over data such as sorting, filtering and paging performed in user browser(frontend).
	</div>
</div> -->
<!-- alert -->
<?php 
if (isset($flash)) {
	echo $flash;
}
?>
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Database Enquiry
				</h3>
			</div>
			
		</div>
		
	</div>

<?php
	$create_message_url = base_url()."enquiries/create";
?>

	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row align-items-center">
				<div class="col-xl-8 order-2 order-xl-1">
					<div class="form-group m-form__group row align-items-center">
						<div class="col-md-4">
							<div class="m-input-icon m-input-icon--left">
								<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
								<span class="m-input-icon__icon m-input-icon__icon--left">
									<span>
										<i class="la la-search"></i>
									</span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 order-1 order-xl-2 m--align-right">
					<a href="<?= $create_message_url ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-plus-square"></i>
							<span>
								Tambah Pesan
							</span>
						</span>
					</a>
					<div class="m-separator m-separator--dashed d-xl-none"></div>
				</div>
			</div>
		</div>
		<!--end: Search Form -->
<!--begin: Datatable -->
		<table class="m-datatable" id="html_table" width="100%">
			<thead class="">
				
				<tr>
					<th title="Field #1" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort">
						#
					</th>

					<th title="Field #2">
						
					</th>
					<th title="Field #2">
						Date Sent
					</th>
					<th title="Field #3">
						Sent By
					</th>
					<th title="Field #4">
						Subjek
					</th>

					<th title="Field #7">
						Aksi
					</th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
				$this->load->module('timedate');
				$this->load->module('manage_daftar');
				$no = 1;
				foreach ($query->result() as $row) { 

					$view_url = base_url().'enquiries/view/'.$row->id;

			  		$customer_data['username'] = $row->username;
			  		$customer_data['company'] = $row->company;
			  		
			  		$opened = $row->opened;
			  		$urgent = $row->urgent;
			  		$ranking = $row->ranking;

					if ($opened == 0) {
						$icon = '<i class="fa fa-envelope" style="color:orange; text-align:center;"></i>';
					} else {
						$icon = '<i class="fa fa-envelope-o" style="color:orange;"></i>';
					}

					if ($urgent == 1) {
						$sign = '<span class="m-badge m-badge--danger" style="color:#fff;">urgent</span>';
					} else {
						$sign = '';
					}

					$date_sent = $this->timedate->get_nice_date($row->date_created, 'full');

					// $dateArr = explode(' ', $row->date_created);
					// $onlyDate = $dateArr[0];

		  			if ($row->sent_by == 0) {
		  				$sent_by = "Admin";		
		  			} else {
		  				$sent_by = $this->manage_daftar->_get_customer_name($row->sent_by, $customer_data);
		  			}	
	
			  	?>
				<tr <?php if ($urgent == 1) echo "style='color:red;'"; ?>>
					<td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort">
						<?= $icon ?> 
					</td>
					<td>
						<?= $sign ?>
						<!-- <?php
						if ($ranking < 1) {
							echo "-";
						} else {
							for ($i = 0; $i < $ranking; $i++) {
								echo '<i class="fa fa-star" style="color:#FFD700;"></i>';
							}
						}
						?> -->
					</td>
					<td><?= $date_sent ?></td>
				  	<td><?= $sent_by ?></td>
				  	<td><?= $row->subject ?></td>
					
					<td data-field="Actions" class="m-datatable__cell">
						<span style="overflow: visible; width: 110px;">						
													
							<a href="<?= $view_url ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">							
								<i class="la la-edit"></i>						
							</a>						
							<!-- <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete" data-toggle="modal" data-target="#<?= $row->id ?>">							
								<i class="la la-trash"></i>						
							</a> -->					
						</span>
					</td>

					<!--begin::Modal-->
						<div class="modal fade" id="<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Delete Confirmation
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
										</button>
									</div>
									<div class="modal-body">
										<h4>
											Are you sure that you want to delete this contact?
										</h4>
									</div>
									<?php
									$attributes = array('class' => 'form-horizontal2');
									echo form_open('manage_kontak/delete/'.$row->id, $attributes);
									?>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal" name="submit" value="Cancel">
											Close
										</button>
										<button type="submit" class="btn btn-primary" name="submit" value="Delete">
											Delete Kontak
										</button>
									</div>
									<?php
									echo form_close();
									?>
								</div>
							</div>
						</div>
						<!--end::Modal-->
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<!--end: Datatable -->
	</div>
</div>


