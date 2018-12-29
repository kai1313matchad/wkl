<!DOCTYPE html>
<html>
<head>
	<title>upload without form</title>

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>marketplace/css/bootstrap.css">

</head>
<body>

	<div class="container" align="center">
		<div id="ktp">
			<label>Select image</label>
			<input type="file" name="file" id="file" data-id="11" data-type="ktp"> 
			<br>
			<span id="uploaded_image"></span>
			<br>
			<div id="ini"></div>	
		</div>
<hr>
		<div id="npwp">
			<label>Select image</label>
			<input type="file" name="file" id="file2" data-id="12" data-type="npwp"> 
			<br>
			<span id="uploaded_image2"></span>
			<br>
			<div id="ini2"></div>	
		</div>

<hr>
		<div id="sertifikat">
			<label>Select image</label>
			<input type="file" name="file" id="file3" data-id="13" data-type="sertifikat"> 
			<br>
			<span id="uploaded_image3"></span>
			<br>
			<div id="ini3"></div>	
		</div>		

<hr>
		<div id="ijin">
			<label>Select image</label>
			<input type="file" name="file" id="file4" data-id="14" data-type="ijin"> 
			<br>
			<span id="uploaded_image4"></span>
			<br>
			<div id="ini4"></div>	
		</div>		
		
	</div>
	
<div>
	<ul class="col"></ul>
</div>

<script type="text/javascript" src="<?= base_url() ?>marketplace/js/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>marketplace/js/bootstrap.js"></script>

<script type="text/javascript">
$(document).ready(function() {

// initial process upload
	$('#file').change(function() {
		// set target
		let target = $('#uploaded_image');
		let target2 = $('#ini');
		let wrap = $('#ktp label, #ktp input');
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
		let wrap = $('#npwp label, #npwp input');
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
		let wrap = $('#sertifikat label, #sertifikat input');
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
		let wrap = $('#ijin label, #ijin input');
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

// end initial process upload

// TEST
document.body.addEventListener('click', deleteItem);

function deleteItem(e) {
	// console.log(e.target);
	let source = e.target;
	let token = source.dataset.token;
	let type = source.dataset.type;
	let wrap = $('#'+type+' label, #'+type+' input');
	console.log(token+' '+type);
	if (e.target.className === 'btn btn-danger tombol-12') {
		console.log('tombol-12 deleted');
		deleteImage(token, type, wrap);
	} else if (e.target.className === 'btn btn-danger tombol-13') {
		console.log('tombol-13 deleted');
		deleteImage(token, type, wrap);	
	} else if (e.target.className === 'btn btn-danger tombol-14') {
		console.log('tombol-14 deleted');
		deleteImage(token, type, wrap);	
	} else if (e.target.className === 'btn btn-danger tombol-15') {
		console.log('tombol-15 deleted');
		deleteImage(token, type, wrap);	
	}

}


// initial process delete	
	
	// $('#ini').on('click', '.tombol-12', function(e) {
	// 	let source = document.getElementById('tombol-12');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = $('#ktp label, #ktp input');
	// 	console.log(token+' '+type);
	// 	console.log(e.target);

	// 	deleteImage(token, type, wrap);

	// 	e.preventDefault();
	// })

	// $('#ini2').on('click', '.tombol-13', function(e) {
	// 	let source = document.getElementById('tombol-13');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = $('#npwp label, #npwp input');
	// 	console.log(token+' '+type);
	// 	console.log(e.target);

	// 	deleteImage(token, type, wrap);

	// 	e.preventDefault();
	// })

	// $('#ini3').on('click', '.tombol-14', function() {
	// 	let source = document.getElementById('tombol-14');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = $('#sertifikat label, #sertifikat input');
	// 	console.log(token+' '+type);

	// 	deleteImage(token, type, wrap);
	// })

	// $('#ini4').on('click', '.tombol-15', function() {
	// 	let source = document.getElementById('tombol-15');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = $('#ijin label, #ijin input');
	// 	console.log(token+' '+type);

	// 	deleteImage(token, type, wrap);
	// })


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

			objArr.push({"id": idd, "type": tipe});

			//JSON obj
			form_data.append('objArr', JSON.stringify( objArr ));

			$.ajax({
				url:"<?php echo base_url('Upload/do_upload');?>",
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
					target2.html('<button type="button" id="tombol-'+idd+'" data-token="'+data.token+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					wrap.hide();
				}
			})
		}
	}

// function ngeload process
	function ngeLoad () {
		let target = $('#uploaded_image');
		$.ajax({
			url:"<?php echo base_url('Upload/load');?>",
			method: "POST",
			dataType: 'json',
			success: function(data) {
				target.html(data);
			}
		}) 	
	} 

// function delete process
	function deleteImage (token, type, wrap) {
		let target;
		if (type == 'ktp') {
			target = $('#uploaded_image');
		} else if (type == 'npwp') {
			target = $('#uploaded_image2');
		} else if (type == 'sertifikat') {
			target = $('#uploaded_image3');
		} else {
			target = $('#uploaded_image4');
		}
		$.ajax({
			url:"<?php echo base_url('Upload/delete');?>",
			method: "POST",
			data:{id:token, tipe:type},
			dataType: 'json',
			success: function(data) {
				target.html(data);
				wrap.show();
				$('button[data-type="'+type+'"]').remove();
			}
		})  
	}

	setTimeout(ngeLoad(), 5000);


// membuat elemen

// const li = document.createElement('li');

// li.className = 'coll-list';

// li.id = 'new-list';

// li.setAttribute('title', 'new-item');

// li.appendChild(document.createTextNode('hello im new'));

// document.querySelector('ul.col').appendChild(li);

// console.log(li);

});
</script>

</body>
</html>