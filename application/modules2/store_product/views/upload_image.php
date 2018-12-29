<?php
$back = base_url().'store_product/create/'.$update_id;
?>

<div class="tab-pane fade in active">

	<div class="row">
		<div class="col-md-6">
	    	<h2>Upload Foto Media Iklan</h2>
	    </div>

	    <div class="col-md-6">
	        <a href="<?= $back ?>" class="button btn-small yellow pull-right">BACK</a>
	    </div>
	</div>  

    <div class="col-sm-12 no-float no-padding">
    	<!-- alert -->
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>

		<div>
	    	<div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Jarak 50 m</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="limapuluh">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file" data-id="12" data-type="limapuluh" data-placeholder="Pilih Foto">
	                </div>
		            <span id="uploaded_image"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                	<div id="ini"></div>
  
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload foto media iklan jarak 50 Meter dari titik berdiri.</span>
                </div>
            </div>

	        <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Jarak 100 m</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="seratus">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file2" data-id="13" data-type="seratus" data-placeholder="Pilih Foto">
	                </div>
	                <span id="uploaded_image2"></span>
                	
                </div>
                <div class="col-sms-2 col-sm-2">
                	<div id="ini2"></div>
                   
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload foto media iklan jarak 100 Meter dari titik berdiri.</span>
                </div>
            </div>

            <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Jarak 200 m</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="duaratus">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file3" data-id="14" data-type="duaratus" data-placeholder="Pilih Foto">
	                </div>
	                <span id="uploaded_image3"></span>
                	
                </div>
                <div class="col-sms-2 col-sm-2">
                	<div id="ini3"></div>
                  
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload foto media iklan jarak 200 Meter dari titik berdiri.</span>
                </div>
            </div>

	    </div>

	</div>
</div>

<script type="text/javascript">
tjq(document).ready(function() {

// initial process upload
	tjq('#file').change(function() {
		// set target
		let target = tjq('#uploaded_image');
		let target2 = tjq('#ini');
		let wrap = tjq('#limapuluh label, #limapuluh input');
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

	tjq('#file2').change(function() {
		// set target
		let target = tjq('#uploaded_image2');
		let target2 = tjq('#ini2');
		let wrap = tjq('#seratus label, #seratus input');
		let source = document.getElementById('file2');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		

		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	tjq('#file3').change(function() {
		// set target
		let target = tjq('#uploaded_image3');
		let target2 = tjq('#ini3');
		let wrap = tjq('#duaratus label, #duaratus input');
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
	let wrap = tjq('#'+type+' label, #'+type+' input');
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

			objArr.push({"id": idd, "type": tipe, "segment":'<?= $update_id ?>'});

			//JSON obj
			form_data.append('objArr', JSON.stringify( objArr ));

			tjq.ajax({
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
		let target = tjq('#uploaded_image');
		let target2 = tjq('#ini');
		let idd = 12;
		let type = 'limapuluh';
		tjq.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-12" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					tjq('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad2 () {
		let target = tjq('#uploaded_image2');
		let target2 = tjq('#ini2');
		let idd = 13;
		let type = 'seratus';
		tjq.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-12" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					tjq('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad3 () {
		let target = tjq('#uploaded_image3');
		let target2 = tjq('#ini3');
		let idd = 14;
		let type = 'duaratus';
		tjq.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-12" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					tjq('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

// function delete process
	function deleteImage (type, wrap, name) {
		let target;
		if (type == 'limapuluh') {
			target = tjq('#uploaded_image');
		} else if (type == 'seratus') {
			target = tjq('#uploaded_image2');
		} else if (type == 'duaratus') {
			target = tjq('#uploaded_image3');
		} else {
			target = tjq('#uploaded_image4');
		}
		console.log(type+' '+name);
		tjq.ajax({
			url:"<?php echo base_url('store_product/do_delete');?>",
			method: "POST",
			data:{code:'<?= $update_id ?>', tipe:type, name:name},
			dataType: 'json',
			success: function(data) {
				console.log(data);
				target.html(data);
				wrap.show();
				tjq('button[data-type="'+type+'"]').remove();
				tjq('#'+type+' label, #'+type+' input').show();
			}
		})  
	}

	setTimeout(ngeLoad1(), 2000);
	setTimeout(ngeLoad2(), 2000);
	setTimeout(ngeLoad3(), 2000);

});
</script>