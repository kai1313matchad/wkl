
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

	<?php $cancel = base_url().'manage_product/create/'.$update_id; ?>	

		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<a href="<?= $cancel ?>" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-undo"></i>
					<span>
						Back
					</span>
				</span>
			</a>
		</div>

		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<?php
			if (isset($error)) {

				foreach ($error as $value) {
					echo $value;
				}
			}
			?>
			<div class="m-separator m-separator--dashed d-xl-none"></div>
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
					Surat Tanah
				</label>
				<div class="col-6" id="sertifikat">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file1" data-id="11" data-type="sertifikat"> 
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image1"></span>
				</div>
				<div class="col-2">
					<div id="ini1"></div>
				</div>
				<div class="col-2">
					Ukuran 1920 x 1200
				</div>
			</div>

		</div>

		<div class="m-separator m-separator--dashed m-separator--md"></div>

		<div class="m-portlet__body">
			
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Ijin Penyelenggaraan Reklame
				</label>
				<div class="col-6" id="SIPR">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file2" data-id="12" data-type="SIPR"> 
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image2"></span>
				</div>
				<div class="col-2">
					<div id="ini2"></div>
				</div>
				<div class="col-2">
					Ukuran 1920 x 1200
				</div>
			</div>
				
		</div>

		<div class="m-separator m-separator--dashed m-separator--md"></div>

		<div class="m-portlet__body">
			
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Ijin Mendirikan Bangunan
				</label>
				<div class="col-6" id="IMB">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file3" data-id="13" data-type="IMB">
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image3"></span>
				</div>
				<div class="col-2">
					<div id="ini3"></div>
				</div>
				<div class="col-2">
					Ukuran 1920 x 1200
				</div>
			</div>
				
		</div>

		<div class="m-separator m-separator--dashed m-separator--md"></div>

		<div class="m-portlet__body">
			
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Surat Setoran Pajak Daerah
				</label>
				<div class="col-6" id="SSPD">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file4" data-id="14" data-type="SSPD">
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image4"></span>
				</div>
				<div class="col-2">
					<div id="ini4"></div>
				</div>
				<div class="col-2">
					Ukuran 1920 x 1200
				</div>
			</div>
				
		</div>

		<div class="m-separator m-separator--dashed m-separator--md"></div>

		<div class="m-portlet__body">
			
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Jaminan Bongkar
				</label>
				<div class="col-6" id="JAMBONG">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file5" data-id="15" data-type="JAMBONG">
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image5"></span>
				</div>
				<div class="col-2">
					<div id="ini5"></div>
				</div>
				<div class="col-2">
					Ukuran 1920 x 1200
				</div>
			</div>
				
		</div>

		<div class="m-separator m-separator--dashed m-separator--md"></div>

		<div class="m-portlet__body">
			
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Surat Ketetapan Rencana Kota
				</label>
				<div class="col-6" id="SKRK">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file6" data-id="16" data-type="SKRK">
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image6"></span>
				</div>
				<div class="col-2">
					<div id="ini6"></div>
				</div>
				<div class="col-2">
					Ukuran 1920 x 1200
				</div>
			</div>
				
		</div>

	</div>	
</div>
<!--end::Portlet-->


<script type="text/javascript">
$(document).ready(function() {

// initial process upload
	$('#file1').change(function() {
		// set target
		let target = $('#uploaded_image1');
		let target2 = $('#ini1');
		let wrap = $('#sertifikat label, #sertifikat input');
		let source = document.getElementById('file1');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		
		// process upload
		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	$('#file2').change(function() {
		// set target
		let target = $('#uploaded_image2');
		let target2 = $('#ini2');
		let wrap = $('#SIPR label, #SIPR input');
		let source = document.getElementById('file2');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		

		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	$('#file3').change(function() {
		// set target
		let target = $('#uploaded_image3');
		let target2 = $('#ini3');
		let wrap = $('#IMB label, #IMB input');
		let source = document.getElementById('file3');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		
		// process upload
		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	$('#file4').change(function() {
		// set target
		let target = $('#uploaded_image4');
		let target2 = $('#ini4');
		let wrap = $('#SSPD label, #SSPD input');
		let source = document.getElementById('file4');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		
		// process upload
		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	$('#file5').change(function() {
		// set target
		let target = $('#uploaded_image5');
		let target2 = $('#ini5');
		let wrap = $('#JAMBONG label, #JAMBONG input');
		let source = document.getElementById('file5');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		
		// process upload
		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	$('#file6').change(function() {
		// set target
		let target = $('#uploaded_image6');
		let target2 = $('#ini6');
		let wrap = $('#SKRK label, #SKRK input');
		let source = document.getElementById('file6');
 
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
	// console.log(token+' '+type);
	if (e.target.className === 'btn btn-danger tombol-11') {
		console.log('tombol-11 deleted');
		deleteImage(type, wrap, name);
	} else if (e.target.className === 'btn btn-danger tombol-12') {
		console.log('tombol-12 deleted');
		deleteImage(type, wrap, name);
	} else if (e.target.className === 'btn btn-danger tombol-13') {
		console.log('tombol-13 deleted');
		deleteImage(type, wrap, name);	
	} else if (e.target.className === 'btn btn-danger tombol-14') {
		console.log('tombol-14 deleted');
		deleteImage(type, wrap, name);	
	} else if (e.target.className === 'btn btn-danger tombol-15') {
		console.log('tombol-15 deleted');
		deleteImage(type, wrap, name);	
	} else if (e.target.className === 'btn btn-danger tombol-16') {
		console.log('tombol-16 deleted');
		deleteImage(type, wrap, name);	
	}

}
	

// function validation & upload process
	function process(property, idd, tipe, image_extension, image_size, target, target2, wrap) {

		if (jQuery.inArray(image_extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
			alert('Invalid Image File');
		} 

		if (image_size > 2000000) {
			alert('Image size is too big');
		} else {
			let form_data = new FormData();
			form_data.append("file", property);
			var objArr = [];

			objArr.push({"id": idd, "type": tipe, "segment":'<?= $update_id ?>'});

			//JSON obj
			form_data.append('objArr', JSON.stringify( objArr ));

			$.ajax({
				url:"<?php echo base_url('store_product/process_upload');?>",
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
					// target2.html('<button type="button" id="tombol-'+idd+'" data-token="'+data.token+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					target2.html('<button type="button" id="tombol-'+idd+'" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					wrap.hide();
				}
			})
		}
	}

// function ngeload process
	function ngeLoad1 () {
		let target = $('#uploaded_image1');
		let target2 = $('#ini1');
		let idd = 11;
		let type = 'sertifikat';
		$.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-11" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					$('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad2 () {
		let target = $('#uploaded_image2');
		let target2 = $('#ini2');
		let idd = 12;
		let type = 'SIPR';
		$.ajax({
			url:"<?php echo base_url('store_product/load');?>",
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

	function ngeLoad3 () {
		let target = $('#uploaded_image3');
		let target2 = $('#ini3');
		let idd = 13;
		let type = 'IMB';
		$.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-13" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					$('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad4 () {
		let target = $('#uploaded_image4');
		let target2 = $('#ini4');
		let idd = 14;
		let type = 'SSPD';
		$.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-14" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					$('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad5 () {
		let target = $('#uploaded_image5');
		let target2 = $('#ini5');
		let idd = 15;
		let type = 'JAMBONG';
		$.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-15" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					$('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad6 () {
		let target = $('#uploaded_image6');
		let target2 = $('#ini6');
		let idd = 16;
		let type = 'SKRK';
		$.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-16" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					$('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

// function delete process
	function deleteImage (type, wrap, name) {
		let target;
		if (type == 'sertifikat') {
			target = $('#uploaded_image1');
		} else if (type == 'SIPR') {
			target = $('#uploaded_image2');
		} else if (type == 'IMB') {
			target = $('#uploaded_image3');
		} else if (type == 'SSPD') {
			target = $('#uploaded_image4');
		} else if (type == 'JAMBONG') {
			target = $('#uploaded_image5');
		} else if (type == 'SKRK') {
			target = $('#uploaded_image6');
		}
		$.ajax({
			url:"<?php echo base_url('store_product/do_delete');?>",
			method: "POST",
			// data:{id:token, tipe:type},
			data:{code:'<?= $update_id ?>', tipe:type, name:name},
			dataType: 'json',
			success: function(data) {
				target.html(data);
				wrap.show();
				$('button[data-type="'+type+'"]').remove();
				$('#'+type+' label, #'+type+' input').show();
			}
		})  
	}

	setTimeout(ngeLoad1(), 2000);
	setTimeout(ngeLoad2(), 2000);
	setTimeout(ngeLoad3(), 2000);
	setTimeout(ngeLoad4(), 2000);
	setTimeout(ngeLoad5(), 2000);
	setTimeout(ngeLoad6(), 2000);

});
</script>