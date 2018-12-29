<?php
$this->load->module('site_settings');
$prod = $this->db->where('id', $param2)->get('store_item')->row();
?>

<div class="modal-body">
				<div class="m-form m-form--fit m-form--label-align-right">
					
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<div class="form-group m-form__group2 row">
								<div class="col-lg-8">
									<label>
										Harga Persil:
									</label>
									<input type="text" class="form-control m-input" id="harga_target" disabled="disabled" value="<?php echo ($prod->was_price != '') ? $this->site_settings->currency_format2($prod->was_price) : 0; ?>">
								</div>
								<div class="col-lg-4">
									<label class="">
										Persentase:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="number" class="form-control m-input" id="per_cent" value="5" max="100">
										<span class="m-input-icon__icon m-input-icon__icon--right">
											<span>
												<i class="la">%</i>
											</span>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group m-form__group2 row">
								<div class="col-lg-8">
									<label>
										Harga:
									</label>
									<input type="text" class="form-control m-input" id="harga_want" placeholder="Harga diinginkan">
								</div>
								<div class="col-lg-4">
									<label class="">
										Diskon:
									</label>
									<div class="m-input-icon m-input-icon--right">
										<input type="number" class="form-control m-input" id="persen" max="100">
										<span class="m-input-icon__icon m-input-icon__icon--right">
											<span>
												<i class="la">%</i>
											</span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<label class="">
								Harga Rekomendasi:
							</label>
							<input type="text" class="form-control m-input" disabled="disabled" id="rec_price">
							
						</div>
						<div class="col-lg-6">
							
							<label>
								Durasi:
							</label>
							<select class="form-control m-input m-input--air" id="durasi">
								<option value="" selected="selected">Please Select</option>
	                            <option value="1">1 Bulan</option>
	                            <option value="2">2 Bulan</option>
	                            <option value="4">4 Bulan</option>
	                            <option value="6">6 Bulan</option>
	                            <option value="9">9 Bulan</option>
	                            <option value="12">12 Bulan</option>
							</select>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							
							
						</div>
						<div class="col-lg-6">
							<label class="">
								Harga Dibayar:
							</label>
							<div class="m-input-icon m-input-icon--right">
								<div id="harga_bayar"></div>
							</div>
						</div>
					</div>

				</div>
			</div>