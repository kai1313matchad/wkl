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
					Database Order
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
				<div class="col-xl-4 order-1 order-xl-2 m--align-right">
					
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
						Lokasi
					</th>
					<th title="Field #3">
						Harga
					</th>
					<th title="Field #4">
						Durasi
					</th>
					<th title="Field #5">
						Slot
					</th>
					
					<th title="Field #6">
						Tayang
					</th>
					<th title="Field #7">
						Klien
					</th>
					
					<th title="Field #8">
						Tanggal
					</th>
					<th title="Field #9">
						Status
					</th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
				$this->load->module('timedate');
    			$this->load->module('manage_product');
    			$this->load->module('manage_daftar');
				$no = 1;
				foreach ($query->result() as $row) { 
					$user_id = $row->shopper_id;
					$klien = Client::view_by_id($user_id);
					$persil = Client::view_by_id($row->shop_id);
					$item = App::view_by_id($row->item_id);
					$lokasi = $row->item_title;
					$price = $row->price;
					$durasi = $row->duration;
					$start = $this->timedate->get_nice_date($row->start, 'ok');
					$end = $this->timedate->get_nice_date($row->end, 'ok');
					$date = $this->timedate->get_nice_date($row->date_added, 'ok');
					
					$slot = $row->slot;
					
					
			  	?>
				<tr>
					
					<td>
						<span style="overflow: visible; width: 110px;">						
							<div class="dropdown ">							
								<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                
									<i class="la la-ellipsis-h"></i>                            
								</a>						  	
								<div class="dropdown-menu dropdown-menu-right">						    	
									<a class="dropdown-item" href="<?=base_url()?>store_orders/view/<?=$row->id?>"><i class="la la-file-text"></i> Preview Order</a>						    	
									<a class="dropdown-item" href="<?=base_url()?>store_orders/edit/<?=$row->id?>"><i class="la la-edit"></i> Edit Order</a>						    	
									<a class="dropdown-item" href="<?=base_url()?>store_orders/timeline/<?=$row->id?>"><i class="la la-files-o"></i> Payment History</a>						  	
									<a class="dropdown-item" href="<?=base_url()?>store_orders/approval/<?=$row->id?>"><i class="la la-envelope"></i> Kirim Approval</a>						    	
									
									<a class="dropdown-item" href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/archive/<?=$row->id?>/store_orders');"><i class="la la-trash"></i> Archive</a>
								</div>						
							</div>						
											
						</span>
						
					</td>
					<td>
						<a href="<?= base_url() ?>store_orders/create/<?= $row->id ?>"><?= $lokasi ?></a>	
					</td>
					<td>
						<?= $price ?>
					</td>
					<td>
						<?= $durasi ?> <?= ($durasi != '') ? 'bulan' : '-' ?>
					</td>
					<td>
						<?= $slot ?> <?= ($slot != '') ? 'slot' : '-' ?>
					</td>
					<td>
						<?= $start.' <br> '.$end ?>
					</td>
					<td>
						<?= $klien->username.' <br> '.$klien->company ?>
					</td>
					<td>
						<?= $date ?>
					</td>

					<td>
						status
					</td>
					
					

					
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<!--end: Datatable -->
	</div>
</div>


