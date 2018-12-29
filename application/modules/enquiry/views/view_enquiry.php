
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
				
			</div>
		</div>
		<!--end: Search Form -->
<!--begin: Datatable -->
		<table class="m-datatable" id="html_table" width="100%">
			<thead>
				<tr>
					<th title="Field #1">
						#
					</th>
					<th title="Field #2">
						Date Sent
					</th>
					<th title="Field #3">
						Sent To
					</th>
					<th title="Field #4">
						Sent By
					</th>
					<th title="Field #5">
						Subjek
					</th>
					
					<th title="Field #6">
						Aksi
					</th>
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($query->result() as $row) { 
			  		$view_url = base_url().'enquiry/view/'.$row->id;
			  		$opened = $row->opened;

			  		if ($opened == 0) {
						$icon = '<i class="fa fa-envelope" style="color:orange;"></i>';
					} else {
						$icon = '<i class="fa fa-envelope-o" style="color:orange;"></i>';
					}

					if ($row->sent_by > 0) {
		  				$sent_by = "Admin";		
		  			} else {
		  				// $sent_by = $this->store_accounts->_get_customer_name($row->sent_by, $customer_data);
		  				// $sent_by = $firstname." ".$lastname
		  			}

		  			$dateArr = explode(' ', $row->created_at);
					$onlyDate = $dateArr[0];
			  	?>
				<tr>
					<td>
						<?= $icon ?>
					</td>
					
					<td>
						<?= tgl_indo($onlyDate) ?>
					</td>
					<td>
						<?= $row->email ?>
					</td>
					
					<td>
						<?= $sent_by ?>
					</td>

					<td>
						<?= $row->subjek ?>
					</td>
					
					<td data-field="Actions" class="m-datatable__cell">
						<span style="overflow: visible; width: 110px;">						
							<a href="<?= $view_url ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="Views details">							
								<i class="la la-eye"></i>						
							</a>						
												
						</span>
					</td>
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<!--end: Datatable -->
	</div>
</div>

