
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
					Jarak 50 m
				</label>
				<div class="col-6" id="limapuluh">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file" data-id="12" data-type="limapuluh">
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
					Ukuran 1920 x 1200
				</div>
			</div>

		</div>

		<div class="m-separator m-separator--dashed m-separator--md"></div>

		<div class="m-portlet__body">
			
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Jarak 100 m
				</label>
				<div class="col-6" id="seratus">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file2" data-id="13" data-type="seratus">
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
					Jarak 200 m
				</label>
				<div class="col-6" id="duaratus">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file3" data-id="14" data-type="duaratus"> 
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

	</div>	

<!--end::Portlet-->

<script type="text/javascript">
$(document).ready(function() {

// initial process upload
	$('#file').change(function() {
		// set target
		let target = $('#uploaded_image');
		let target2 = $('#ini');
		let wrap = $('#limapuluh label, #limapuluh input');
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

	$('#file2').change(function() {
		// set target
		let target = $('#uploaded_image2');
		let target2 = $('#ini2');
		let wrap = $('#seratus label, #seratus input');
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
		let wrap = $('#duaratus label, #duaratus input');
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
	} else if (e.target.className === 'btn btn-danger tombol-13') {
		console.log('tombol-13 deleted');
		deleteImage(type, wrap, name);	
	} else if (e.target.className === 'btn btn-danger tombol-14') {
		console.log('tombol-14 deleted');
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

			objArr.push({"id": idd, "type": tipe, "segment":'<?= $code ?>'});

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
					target2.html('<button type="button" id="tombol-'+idd+'" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					wrap.hide();

					console.log(data.msg+' '+data.id+' '+data.token+' '+data.type);
				}
			})
		}
	}

// function ngeload process
	function ngeLoad1 () {
		let target = $('#uploaded_image');
		let target2 = $('#ini');
		let idd = 12;
		let type = 'limapuluh';
		$.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $code ?>', tipe:type},
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

	function ngeLoad2 () {
		let target = $('#uploaded_image2');
		let target2 = $('#ini2');
		let idd = 13;
		let type = 'seratus';
		$.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $code ?>', tipe:type},
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
		let idd = 14;
		let type = 'duaratus';
		$.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $code ?>', tipe:type},
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
		if (type == 'limapuluh') {
			target = $('#uploaded_image');
		} else if (type == 'seratus') {
			target = $('#uploaded_image2');
		} else if (type == 'duaratus') {
			target = $('#uploaded_image3');
		} else {
			target = $('#uploaded_image4');
		}
		console.log(type+' '+name);
		$.ajax({
			url:"<?php echo base_url('store_product/do_delete');?>",
			method: "POST",
			data:{code:'<?= $code ?>', tipe:type, name:name},
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

	setTimeout(ngeLoad1(), 2000);
	setTimeout(ngeLoad2(), 2000);
	setTimeout(ngeLoad3(), 2000);

});
</script>