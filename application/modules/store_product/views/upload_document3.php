<?php
$back = base_url().'store_product/create/'.$update_id;
?>

<div class="tab-pane fade in active">

	<div class="row">
		<div class="col-md-6">
	    	<h2>Upload Dokumen</h2>
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
                    <label>SURAT TANAH</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="sertifikat">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file1" data-id="11" data-type="sertifikat" data-placeholder="Pilih Dokumen">
	                </div>
	                <span id="uploaded_image1"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini1"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload scan/foto surat tanah titik berdiri pemilik titik / persil/ media iklan.</span>
                </div>
            </div>

            <hr>

            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Ijin Penyelenggaraan Reklame</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="SIPR">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file2" data-id="12" data-type="SIPR" data-placeholder="Pilih Dokumen">
	                </div>
	                <span id="uploaded_image2"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini2"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload scan/foto Ijin Penyelenggaraan Reklame media iklan.</span>
                </div>
            </div>

	        <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Ijin Mendirikan Bangunan</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="IMB">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file3" data-id="13" data-type="IMB" data-placeholder="Pilih Dokumen">
	                </div>
	                <span id="uploaded_image3"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini3"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload scan/foto Ijin Mendirikan Bangunan media iklan.</span>
                </div>
            </div>

            <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Surat Setoran Pajak Daerah</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="SSPD">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file4" data-id="14" data-type="SSPD" data-placeholder="Pilih Dokumen">
	                </div>
	                <span id="uploaded_image4"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini4"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload scan/foto Surat Setoran Pajak Daerah media iklan.</span>
                </div>
            </div>

            <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Jaminan Bongkar</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="JAMBONG">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file5" data-id="15" data-type="JAMBONG" data-placeholder="Pilih Dokumen">
	                </div>
	                <span id="uploaded_image5"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini5"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload scan/foto Jaminan Bongkar media iklan.</span>
                </div>
            </div>

            <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Surat Ketetapan Rencana Kota</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="SKRK">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file6" data-id="16" data-type="SKRK" data-placeholder="Pilih Dokumen">
	                </div>
	                <span id="uploaded_image6"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini6"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload scan/foto Surat Ketetapan Rencana Kota.</span>
                </div>
            </div>

            <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Bukti Asuransi</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="asuransi">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file7" data-id="17" data-type="asuransi" data-placeholder="Pilih Dokumen">
	                </div>
	                <span id="uploaded_image7"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini7"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload scan/foto Bukti Asuransi.</span>
                </div>
            </div>

	    </div>


	</div>
</div>

<script type="text/javascript">
tjq(document).ready(function() {

// initial process upload
	tjq('#file1').change(function() {
		// set target
		let target = tjq('#uploaded_image1');
		let target2 = tjq('#ini1');
		let wrap = tjq('#sertifikat label, #sertifikat input');
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

	tjq('#file2').change(function() {
		// set target
		let target = tjq('#uploaded_image2');
		let target2 = tjq('#ini2');
		let wrap = tjq('#SIPR label, #SIPR input');
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
		let wrap = tjq('#IMB label, #IMB input');
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

	tjq('#file4').change(function() {
		// set target
		let target = tjq('#uploaded_image4');
		let target2 = tjq('#ini4');
		let wrap = tjq('#SSPD label, #SSPD input');
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

	tjq('#file5').change(function() {
		// set target
		let target = tjq('#uploaded_image5');
		let target2 = tjq('#ini5');
		let wrap = tjq('#JAMBONG label, #JAMBONG input');
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

	tjq('#file6').change(function() {
		// set target
		let target = tjq('#uploaded_image6');
		let target2 = tjq('#ini6');
		let wrap = tjq('#SKRK label, #SKRK input');
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

	tjq('#file7').change(function() {
		// set target
		let target = tjq('#uploaded_image7');
		let target2 = tjq('#ini7');
		let wrap = tjq('#asuransi label, #asuransi input');
		let source = document.getElementById('file7');
 
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
	} else if (e.target.className === 'btn btn-danger tombol-17') {
		console.log('tombol-17 deleted');
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
					// target2.html('<button type="button" id="tombol-'+idd+'" data-token="'+data.token+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					target2.html('<button type="button" id="tombol-'+idd+'" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					wrap.hide();
				}
			})
		}
	}

// function ngeload process
	function ngeLoad1 () {
		let target = tjq('#uploaded_image1');
		let target2 = tjq('#ini1');
		let idd = 11;
		let type = 'sertifikat';
		tjq.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-11" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					tjq('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad2 () {
		let target = tjq('#uploaded_image2');
		let target2 = tjq('#ini2');
		let idd = 12;
		let type = 'SIPR';
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
		let idd = 13;
		let type = 'IMB';
		tjq.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-13" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					tjq('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad4 () {
		let target = tjq('#uploaded_image4');
		let target2 = tjq('#ini4');
		let idd = 14;
		let type = 'SSPD';
		tjq.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-14" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					tjq('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad5 () {
		let target = tjq('#uploaded_image5');
		let target2 = tjq('#ini5');
		let idd = 15;
		let type = 'JAMBONG';
		tjq.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-15" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					tjq('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad6 () {
		let target = tjq('#uploaded_image6');
		let target2 = tjq('#ini6');
		let idd = 16;
		let type = 'SKRK';
		tjq.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-16" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					tjq('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

	function ngeLoad7 () {
		let target = tjq('#uploaded_image7');
		let target2 = tjq('#ini7');
		let idd = 17;
		let type = 'asuransi';
		tjq.ajax({
			url:"<?php echo base_url('store_product/load');?>",
			method: "POST",
			data: {id:'<?= $update_id ?>', tipe:type},
			dataType: 'json',
			success: function(data) {
				if (data.name != '') {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-17" data-name="'+data.name+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					tjq('#'+type+' label, #'+type+' input').hide();
				}

			}
		}) 	
	} 

// function delete process
	function deleteImage (type, wrap, name) {
		let target;
		if (type == 'sertifikat') {
			target = tjq('#uploaded_image1');
		} else if (type == 'SIPR') {
			target = tjq('#uploaded_image2');
		} else if (type == 'IMB') {
			target = tjq('#uploaded_image3');
		} else if (type == 'SSPD') {
			target = tjq('#uploaded_image4');
		} else if (type == 'JAMBONG') {
			target = tjq('#uploaded_image5');
		} else if (type == 'SKRK') {
			target = tjq('#uploaded_image6');
		} else if (type == 'asuransi') {
			target = tjq('#uploaded_image7');
		}
		tjq.ajax({
			url:"<?php echo base_url('store_product/do_delete');?>",
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
	setTimeout(ngeLoad3(), 2000);
	setTimeout(ngeLoad4(), 2000);
	setTimeout(ngeLoad5(), 2000);
	setTimeout(ngeLoad6(), 2000);
	setTimeout(ngeLoad7(), 2000);

});
</script>