<!DOCTYPE html>
<html>
<head>
	<title>upload preview</title>

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>marketplace/css/bootstrap.cs">

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

	<div id="image-preview">
		<div id="tambahan">
			<label for="image-upload" id="image-label" style="display: none;">Choose File</label>
			<div class="photo-container__remove" id="image-delete" style="display: none;">
				<span data-toggle="tooltip" class="picture-action picture-action--delete"><i class="glyphicon glyphicon-trash"></i></span>
			</div>
		</div>
		<input type="file" name="image-ktp" id="image-upload" data-id="13" data-type="ktp">
	</div>


<script type="text/javascript" src="<?= base_url() ?>marketplace/js/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>tes/jquery.uploadPreview.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label",
    delete_field: "#image-delete",
    
  });

  $('#image-delete').click(function() {
  	alert("you gonna delete file!");
  	$('#image-preview').css("background-image", "url(<?= base_url('tes/icon-photo.png')?>)");
  	$("#image-label").hide();
    $("#image-delete").hide();
  });

  let inn = document.getElementById('image-upload');

  // $('input[type=file]').change(function() {
  // 	console.log(inn.dataset.id);
  // 	console.log(inn.dataset.type);
  // });
  

});
</script>

</body>
</html>