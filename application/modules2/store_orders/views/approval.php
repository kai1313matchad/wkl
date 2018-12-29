
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

	<?php 
	$attribute = array('class' => 'm-form m-form--fit m-form--label-align-right');
	echo form_open_multipart('approval/send_approval/'.$update_id, $attribute);
	?>
	<input type="hidden" name="order_id" value="<?= $update_id ?>">
		<div class="m-portlet__body">

			<div class="form-group m-form__group row">
				<div class="col-lg-4">
					<label>
						No Order
					</label>
					<input type="text" class="form-control m-input" value="ORD0000001" readonly>
					
				</div>
				<div class="col-lg-4">
					<label class="">
						Klien
					</label>
					<input type="text" class="form-control m-input" value="PT ABC" readonly>
					<span class="m-form__help">
						Jhon Doe
					</span>
				</div>
				<div class="col-lg-4">
					<label>
						Lokasi:
					</label>
					<div class="input-group m-input-group m-input-group--square">
						<span class="m-form__help">
							Jl Tol Gatot Subroto Km 04+500BY
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
						<input type="text" class="form-control m-input" value="6 bulan" readonly>
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
						<input type="text" class="form-control m-input" value="22-07-1986 - 22-07-2019" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-calendar"></i>
							</span>
						</span>
					</div>
					
				</div>
				<div class="col-lg-4">
					<label>
						Slot:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<input type="text" class="form-control m-input" value="2 slot" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-clone"></i>
							</span>
						</span>
					</div>
					
				</div>
			</div>

			<div class="form-group m-form__group row">
				<div class="col-lg-4">
					<label class="">
						Kategori:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<input type="text" class="form-control m-input" value="Billboard" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-bookmark-o"></i>
							</span>
						</span>
					</div>
					
				</div>
				<div class="col-lg-4">
					<label class="">
						Harga <em><small>(Rp)</small></em>:
					</label>
					<div class="input-group m-input-group m-input-group--square" style="text-align: right;">
						<span class="pull-right" style="font-size: 24px; font-weight: bold; color: #f4516c; float: right;">
							300.000.000
						</span>
					</div>
				</div>
				<div class="col-lg-4">
					<label class="">
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
					</div>
					
				</div>
			</div>
			
		</div>
		<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
			<div class="m-form__actions m-form__actions--solid">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-8">
						<button type="submit" class="btn btn-primary" name="submit" value="Submit">
							Submit
						</button>
						<button type="submit" class="btn btn-secondary" name="submit" value="Cancel">
							Cancel
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!--end::Portlet-->

