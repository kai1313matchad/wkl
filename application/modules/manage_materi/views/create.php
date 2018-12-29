<style>
	#uploaded_image {
		color: #f4516c;
		font-size: 10px;
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
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<a href="<?= base_url() ?>manage_materi/download_file/<?= $update_id ?>" class="btn btn-focus m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill2">
				<span>
					<i class="la la-download"></i>
					<span>
						Download
					</span>
				</span>
			</a>
			<a href="<?= base_url() ?>manage_materi/manage" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill2">
				<span>
					<i class="la la-mail-reply"></i>
					<span>
						Back
					</span>
				</span>
			</a>
		</div>
		
	</div>
	<!--begin::Form-->

	
	<div class="m-form m-form--fit m-form--label-align-right">
		<div class="m-portlet__body">
			<div class="form-group m-form__group m--margin-top-10">
				<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Order ID
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="no_order" name="no_order" value="<?= $no_order ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('no_order'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Lokasi
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" readonly><?= $lokasi ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('lokasi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Kode Lokasi
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="kode_lokasi" name="kode_lokasi" value="#<?= $kode_lokasi ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('kode_lokasi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Klien
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="klien" name="klien" value="<?= $klien ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('klien'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Owner
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="owner" name="owner" value="<?= $owner ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('owner'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Waktu Tayang
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" value="<?= $durasi.' bulan, '.$start.' - '.$end ?>" readonly>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Gambar
				</label>
				<div class="col-6" id="materi">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file" data-id="12" data-type="materi">
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image"></span>
				</div>
				<div class="col-2">
					<div id="ini"></div>
				</div>
				<div class="col-2">
					maks 10 mb
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status
				</label>
				<div class="col-3">
					<!-- <?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Active',
							  		'0' => 'Inactive'  
						  		);
				  	echo form_dropdown('status', $options, $status, $additional_dd_code);
				  	?>
					 -->
					<input class="form-control m-input m-input--air" type="text" id="status" name="status" value="<?= $status ?>" readonly> 
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('status'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Selected
				</label>
				<div class="col-3">
					<!-- <?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Selected',
							  		'0' => 'Unselected'  
						  		);
				  	echo form_dropdown('selected', $options, $selected, $additional_dd_code);
				  	?> -->
					<input class="form-control m-input m-input--air" type="text" id="selected" name="selected" value="<?= $selected ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('selected'); ?></div>
				</div>
			</div>
			
			
		</div>
		
	</div>
</div>
<!--end::Portlet-->

<!-- <?php
$path_img = base_url().'marketplace/materi/'.$materi_image;
if ($materi_image != "") { ?>

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Gambar
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="col-6">
			<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
				<img src="<?= $path_img ?>" width="" style="width: 100%;">
			</div>
		</div>
	</div>	
</div>
			
<?php } ?>	
 -->
<script type="text/javascript">
$(document).ready(function() {

// initial process upload
	$('#file').change(function() {
		// set target
		let target = $('#uploaded_image');
		let target2 = $('#ini');
		let wrap = $('#materi label, #materi input');
		let source = document.getElementById('file');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		
		// process upload
		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	
// end initial process upload


// initial process delete	

document.body.addEventListener('click', deleteItem);

function deleteItem(e) {
	// console.log(e.target);
	let source = e.target;
	// let token = source.dataset.token;
	let type = source.dataset.type;
	let name = source.dataset.name;
	let wrap = $('#'+type+' label, #'+type+' input');
	// console.log(+' '+type);
	if (e.target.className === 'btn btn-danger tombol-12') {
		console.log('tombol-12 deleted');
		deleteImage(type, wrap, name);
	} 
}
	

// function validation & upload process
	function process(property, idd, tipe, image_extension, image_size, target, target2, wrap) {

		if (jQuery.inArray(image_extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
			alert('Invalid Image File');
		} 

		if (image_size > 100000000) {
			alert('Image size is too big');
		} else {
			let form_data = new FormData();
			form_data.append("file", property);
			var objArr = [];

			objArr.push({"id": idd, "type": tipe, "segment":'<?= $update_id ?>'});

			//JSON obj
			form_data.append('objArr', JSON.stringify( objArr ));

			$.ajax({
				url:"<?php echo base_url('manage_materi/process_upload');?>",
				method: "POST",
				data: form_data,
				dataType: 'json',
				contentType:false,
				cache:false,
				processData:false,
				beforeSend: function() {
					target.html('<label class="text-success">Image Uploading...</label>');
				},
				success: function(data) {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-'+idd+'" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					wrap.hide();

					console.log(data.msg+' '+data.id+' '+data.type);
				}
			})
		}
	}

// function ngeload process
	function ngeLoad () {
		let target = $('#uploaded_image');
		let target2 = $('#ini');
		let idd = 12;
		let type = 'materi';
		$.ajax({
			url:"<?php echo base_url('manage_materi/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-12" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					$('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 



// function delete process
	function deleteImage (type, wrap, name) {
		let target;
		if (type == 'materi') {
			target = $('#uploaded_image');
		} 
		console.log(type+' '+name);
		$.ajax({
			url:"<?php echo base_url('manage_materi/do_delete');?>",
			method: "POST",
			data:{update_id:'<?= $update_id ?>', tipe:type, name:name},
			dataType: 'json',
			success: function(data) {
				console.log(data);
				target.html(data);
				wrap.show();
				$('button[data-type="'+type+'"]').remove();
				$('#'+type+' label, #'+type+' input').show();
			}
		})  
	}

	setTimeout(ngeLoad(), 2000);
	

});
</script>