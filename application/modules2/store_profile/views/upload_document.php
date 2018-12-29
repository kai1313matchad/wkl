<?php
$back = base_url().'store_profile';
$next = base_url().'store_profile/next/'.$user_code;
?>

<div class="tab-pane fade in active">

	<div class="row">
		<div class="col-md-6">
	    	<h2>Upload KTP &amp; NPWP</h2>
	    </div>

	    <div class="col-md-6">
	    	<a href="<?= $next ?>" class="button btn-small yellow pull-right">NEXT</a>
	    	<!-- <?php if (isset($rerun)) { ?>
	    	<?php if ($rerun == 'true') { ?>
	    		<a href="<?= $next ?>" class="button btn-small yellow pull-right">NEXT</a>
	        <?php } } ?>
			<?php if (isset($rerun)) { ?>
	        <?php if ($rerun == 'false') { ?>
	        	<a href="<?= $back ?>" class="button btn-small yellow pull-right">BACK</a>	
	        <?php } } ?> -->
	    </div>
	</div>  

    <div class="col-sm-12 no-float no-padding">
    	<!-- alert -->
    	<?php if ($rerun == 'true') { ?>
		<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>Alert ! you must upload KTP and NPWP.</div>
		<?php } ?>
		
		<div>
	    	<div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>KTP</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="ktp">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file" data-id="12" data-type="ktp" data-placeholder="">
	                </div>
	                <span id="uploaded_image"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload scan/foto KTP pemilik titik / persil/ media iklan.</span>
                </div>
            </div>

	        <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>NPWP</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="npwp">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file2" data-id="13" data-type="npwp" data-placeholder="">
	                </div>
	                <span id="uploaded_image2"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini2"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload scan/foto NPWP pemilik titik / persil/ media iklan.</span>
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
		let wrap = tjq('#ktp label, #ktp input');
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
		let wrap = tjq('#npwp label, #npwp input');
		let source = document.getElementById('file2');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		

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
	// console.log(token+' '+type);
	if (e.target.className === 'btn btn-danger tombol-12') {
		console.log('tombol-12 deleted');
		deleteImage(type, wrap, name);
	} else if (e.target.className === 'btn btn-danger tombol-13') {
		console.log('tombol-13 deleted');
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
				url:"<?php echo base_url('store_profile/process_upload');?>",
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
		let target = tjq('#uploaded_image');
		let target2 = tjq('#ini');
		let idd = 12;
		let type = 'ktp';
		tjq.ajax({
			url:"<?php echo base_url('store_profile/load');?>",
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
		let type = 'npwp';
		tjq.ajax({
			url:"<?php echo base_url('store_profile/load');?>",
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
		if (type == 'ktp') {
			target = tjq('#uploaded_image');
		} else if (type == 'npwp') {
			target = tjq('#uploaded_image2');
		}
		tjq.ajax({
			url:"<?php echo base_url('store_profile/do_delete');?>",
			method: "POST",
			// data:{id:token, tipe:type},
			data:{code:'<?= $update_id ?>', tipe:type, name:name},
			dataType: 'json',
			success: function(data) {
				target.html(data);
				wrap.show();
				tjq('button[data-type="'+type+'"]').remove();
				tjq('#'+type+' label, #'+type+' input').show();
			}
		})  
	}

	setTimeout(ngeLoad1(), 2000);
	setTimeout(ngeLoad2(), 2000);

});
</script>
