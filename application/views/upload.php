<!DOCTYPE html>
<html>
<head>
	<title>upload preview</title>

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>marketplace/css/bootstrap.css">

<style type="text/css">
#image-preview {
  	width: 200px;
  	height: 200px;
  	position: relative;
  	overflow: hidden;
  	background-color: #ffffff;
  	color: #ecf0f1;
  	border: 1px solid #333;
}
#image-preview input {	
  	line-height: 200px;
  	font-size: 200px;
  	position: absolute;
  	opacity: 0;
  	z-index: 10;
  	cursor: pointer
}

#image-preview label {
  position: absolute;
  z-index: 5;
  opacity: 0.8;
  cursor: pointer;
  background-color: #bdc3c7;
  width: 100%;
  height: 30px;
  font-size: 12px;
  line-height: 30px;
  text-transform: uppercase;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  text-align: center;
}

#image-label {
	display: block;
	position: absolute;
	margin: 20px;
	width: 100px;
  	height: 50px;

}

#image-delete {
	background-color: rgba(249,249,249,.9);
	z-index: 15px;
}

#image-preview {
	background-image: url('<?= base_url()?>tes/icon-photo.png');
	background-size: cover;
	background-position: center center;
}

.photo-container__remove {
	width: 23px;
	height: 23px;
	background-color: #bdc3c7;
	position: absolute;
	top: 5px;
	right: 7px;
	padding: 4px;
	z-index: 15;
	border-radius: 16px;
	opacity: 0.8;
	cursor: pointer;
}

.picture-action {
	z-index: 5;
	width: 16px;
	height: 16px;
	background: url('<?= base_url()?>tes/remove.png');
	display: block;
	margin: 0 auto;
}
</style>
</head>
<body>

<div class="container">
	<div class="row">

		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  			Launch demo modal
		</button>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				
			      	<div class="modal-body">
			        
			      		<div id="image-preview">
							<div id="tambahan">
								
							</div>
							<input type="file" name="image-ktp" id="image-upload" data-id="12" data-type="ktp">
						</div>

			      	</div>
      
    			</div>
  			</div>
		</div>

		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
  			Launch demo modal2
		</button>

		<!-- Modal -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				
			      	<div class="modal-body">
			        
			      		<div id="image-preview">
							<div id="tambahan">
								
							</div>
							<input type="file" name="image-ktp" id="image-upload" data-id="12" data-type="ktp">
						</div>

			      	</div>
      
    			</div>
  			</div>
		</div>
	

	</div>
</div>


<script type="text/javascript" src="<?= base_url() ?>marketplace/js/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>marketplace/js/bootstrap.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	// setting
	var settings = {
		input_field: "#image-upload",
    	preview_box: "#image-preview",
    	label_field: "#image-label",
    	delete_field: "#image-delete",
	}


	// let start with upload image
	$('#image-upload').change(function() {
		let property = document.getElementById('image-upload').files[0];
		let idd = document.getElementById('image-upload').dataset.id;
		let tipe = document.getElementById('image-upload').dataset.type;
		let theme = `<label for="image-upload" id="image-label">Choose File</label><div class="photo-container__remove" id="image-delete"><span data-toggle="tooltip" class="picture-action picture-action--delete"><i class="glyphicon glyphicon-trash"></i></span></div>`;

		var files = this.files;

        if (files.length > 0) {
          	var file = files[0];
          	var reader = new FileReader();

          	// Load file
          	reader.addEventListener("load",function(event) {
            	var loadedFile = event.target;

            	// Check format
            	if (file.type.match('image')) {
              		// Image
              		$(settings.preview_box).css("background-image", "url("+loadedFile.result+")");
              		$(settings.preview_box).css("background-size", "cover");
              		$(settings.preview_box).css("background-position", "center center");

              		
              		$('#tambahan').html(theme);

            	} else { 
              		alert("This file type is not supported yet.");
            	}

        	});

        	// aja(idd, tipe, property);
        	// insert file to db
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
					// target.html('<label class="text-success">Image Uploading...</label>');

				},
				success: function(data) {
					// target.html(data);
					alert(data);
				}
			})

        	// Read the file
            reader.readAsDataURL(file);
        } 
	});

	function aja(idd, tipe, property) {
		// insert file to db
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
				// target.html('<label class="text-success">Image Uploading...</label>');

			},
			success: function(data) {
				// target.html(data);
				alert(data);
			}
		})
	}

	// delete image
	$(settings.delete_field).click(function() {
	  	alert("you gonna delete file!");
	  	$('#tambahan').html('');
  	});


});
</script>

</body>
</html>