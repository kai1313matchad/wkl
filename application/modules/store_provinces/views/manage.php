<!-- <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
	<div class="m-alert__icon">
		<i class="flaticon-exclamation m--font-brand"></i>
	</div>
	<div class="m-alert__text">
		The Metronic Datatable component supports initialization from HTML table. It also defines the schema model of the data source. In addition to the visualization, the Datatable provides built-in support for operations over data such as sorting, filtering and paging performed in user browser(frontend).
	</div>
</div> -->
<?php
$path = base_url().'marketplace/city_icon/';
	
?>
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
					Database Provinsi
				</h3>
			</div>
			
		</div>
		
	</div>

<?php
	$create_province_url = base_url()."store_provinces/create";
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
					<a href="<?= $create_province_url ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-plus-square"></i>
							<span>
								Tambah Provinsi
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
			<thead>
				<tr>
					<th title="Field #1">
						#
					</th>

					<th title="Field #2">
						ID Provinsi
					</th>
					
					<th title="Field #3">
						Nama Provinsi
					</th>
					<th title="Field #4">
						Image
					</th>
					<th title="Field #5">
						Status
					</th>
					
					<th title="Field #6">
						Aksi
					</th>
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($query->result() as $row) { 
			  		$edit_province = base_url()."store_provinces/create/".$row->id_prov;
			  		$gambar = $path.$row->big_pic;
			  		$status = $row->status;

			  		if ($status == 1) {
			  			$status_label = "m-badge--success";
			  			$status_desc = "Active";
			  		} else {
			  			$status_label = "m-badge--danger";
			  			$status_desc = "Inactive";
			  		}

			  	?>
				<tr>
					<td>
						<?= $no++ ?>
					</td>
					<td>
						<?= $row->id_prov ?>
					</td>
					<td>
						<?= $row->nama ?>
					</td>
					<td>
						<?php echo ($row->big_pic == '') ? '' : '<img src="'.$gambar.'" class="img-responsive" width="80px">' ?>
						
					</td>
					<td>
						<span style="width: 110px;"><span class="m-badge <?= $status_label ?> m-badge--wide"><?= $status_desc ?></span></span>
					</td>
					
					<td data-field="Actions" class="m-datatable__cell">
						<span style="overflow: visible; width: 110px;">						
													
							<a href="<?= $edit_province ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">							
								<i class="la la-edit"></i>						
							</a>						
							<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete" data-toggle="modal" data-target="#<?= $row->id_prov ?>">							
								<i class="la la-trash"></i>						
							</a>					
						</span>
					</td>

					<!--begin::Modal-->
						<div class="modal fade" id="<?= $row->id_prov ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
											Are you sure that you want to delete this?
										</h4>
									</div>
									<?php
									$attributes = array('class' => 'form-horizontal2');
									echo form_open('store_provinces/delete/'.$row->id_prov, $attributes);
									?>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal" name="submit" value="Cancel">
											Close
										</button>
										<button type="submit" class="btn btn-primary" name="submit" value="Delete">
											Delete Provinsi
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


