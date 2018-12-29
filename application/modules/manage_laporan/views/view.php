<style>
	#item_price {
		font-size: 24px; font-weight: bold; color: #f4516c; float: right;
	}
	.m-messenger__message-username {
		font-weight: 600;
	}
	.tanggal-komen {
		font-style: italic;
		font-size: 11px;
		font-weight: normal;
	}

	#alerte {
		color: red;
		font-weight: 600;
		font-size: 11px;
	}

	h5.ket-klien {
	    color: #333;
	    text-align: center;
	    text-transform: uppercase;
	    font-family: "Roboto", sans-serif;
	    font-weight: bold;
	    position: relative;
	    margin: 20px 0 60px;
	}

	h5.ket-klien::after {
	    content: "";
	    width: 100px;
	    position: absolute;
	    margin: 0 auto;
	    height: 3px;
	    background: #8fbc54;
	    left: 0;
	    right: 0;
	    bottom: -10px;
	}
	.btn-download {
		position: absolute;
		top: 10px;
		left: 25px;
	}
</style>


<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-tools">
			<a href="<?= base_url() ?>manage_laporan/manage" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-reply"></i>
					<span>
						Back
					</span>
				</span>
			</a>
		</div>

	</div>
	<!--begin::Form-->

	<!-- alert -->
<?php 
if (isset($flash)) {
	echo $flash;
}
?>

	
		<div class="m-portlet__body">

			<div class="tab-content">
				<div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
					
					<div class="m-form m-form--fit m-form--label-align-right">
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label>
									No Order
								</label>
								<input type="text" class="form-control m-input" value="<?= $no_order ?>" readonly>
								
							</div>
							<div class="col-lg-4">
								<label class="">
									No Transaksi
								</label>
								<input type="text" class="form-control m-input" value="<?= $no_transaksi ?>" readonly>
								
							</div>
							<div class="col-lg-4">
								<label>
									Lokasi:
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<span class="m-form__help">
										<?= $lokasi ?> - #<?= $kode_lokasi ?>
									</span>
								</div>
								
							</div>
						</div>

						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label class="">
									Klien:
								</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text" class="form-control m-input" value="<?= $klien ?>" readonly>
								</div>
								
							</div>
							<div class="col-lg-4">
								<label class="">
									Owner:
								</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text" class="form-control m-input" value="<?= $owner ?>" readonly>
								</div>
								
							</div>
							<div class="col-lg-4">
								<label class="">
									Kategori:
								</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text" class="form-control m-input" value="<?= $kategori ?>" readonly>
									<span class="m-input-icon__icon m-input-icon__icon--right">
										<span>
											<i class="la la-bookmark-o"></i>
										</span>
									</span>
								</div>
								
							</div>
						</div>

						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label class="">
									Durasi:
								</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text" class="form-control m-input" value="<?= $durasi ?> bulan" readonly>
									<span class="m-input-icon__icon m-input-icon__icon--right">
										<span>
											<i class="la la-clock-o"></i>
										</span>
									</span>
								</div>
								
							</div>
							<div class="col-lg-4">
								<label class="">
									Tayang:
								</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text" class="form-control m-input" value="<?= $start ?> - <?= $end ?>" readonly>
									<span class="m-input-icon__icon m-input-icon__icon--right">
										<span>
											<i class="la la-calendar"></i>
										</span>
									</span>
								</div>
								
							</div>
							<div class="col-lg-4">
								<!-- <label class="">
									File:
								</label>
								<div class="m-input-icon m-input-icon--right">
									<label class="custom-file">
										<input type="file" id="file2" class="custom-file-input" name="approval">
										<span class="custom-file-control form-control"></span>
									</label>
									<span class="m-input-icon__icon m-input-icon__icon--right">
										<span>
											<i class="la la-bookmark-o"></i>
										</span>
									</span>
								</div> -->
								
							</div>
						</div>
						
					</div>
					
				</div>

			</div>
			
		</div>


	
</div>
<!--end::Portlet-->

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-tools">

		</div>
	</div>	

	<div class="m-portlet__body">
		<div class="row">
	 	<?php
	 	foreach ($images->result() as $row) {
	 	$path = base_url().'marketplace/laporan/';
	 	$img = $path.$row->image; 
	 	$path_dl = base_url().'manage_laporan/download_file/'.$row->id;
	 	?>
	 		<div class="col-lg-6">
	 			<img src="<?= $img ?>" class="img-responsive img-thumbnail">
	 			<div class="btn-download">
	 				<a href="<?= $path_dl ?>" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Download</a>
	 			</div>
	 		</div>
	 	<?php } ?>
	 	</div>
	</div>

</div>