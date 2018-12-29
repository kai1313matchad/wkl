
<style>
	.merah {
		color: #f4516c;
	}

	.hijau {
		color: #34bfa3;
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
					<?= $headline ?>
				</h3>
			</div>

		</div>
		<div class="m-portlet__head-tools">
			<a href="<?= base_url() ?>manage_complain/manage" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-reply"></i>
					<span>
						Back
					</span>
				</span>
			</a>
			<?php if ($status != 'Solved') { ?>
			<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/set_resolve/<?=$update_id?>/manage_complain');" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" data-toggle="modal" data-target="#m_modal">
				<span>
					<i class="la la-check-square"></i>
					<span>
						Solved
					</span>
				</span>
			</a>
			<?php } ?>
			<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/delete/<?=$update_id?>/manage_complain');" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" data-toggle="modal" data-target="#m_modal">
				<span>
					<i class="la la-trash"></i>
					<span>
						Delete
					</span>
				</span>
			</a>
		</div>
	</div>
	<!--begin::Form-->

	<?php 
	$path_komplain = base_url().'marketplace/komplain/'.$image;
	?>
	<form class="m-form m-form--fit m-form--label-align-right" method="post" >
		<div class="m-portlet__body">
			<div class="form-group m-form__group m--margin-top-10">
				<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>
			</div>

		<div class="row">	
		<?php
		$grid = ($image != '') ? '8' : '12';
		if ($image != '') { ?>
			<div class="col-lg-4">
				<div class="form-group m-form__group row2" style="padding-left: 20px;">
					<div class="m-widget4__img thumb2">
						<img src="<?= $path_komplain ?>" class="img-responsive" width="300">
					</div>
				</div>
			</div>
			
		<?php } ?>
		<div class="col-lg-<?= $grid ?>">

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Tanggal
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="tgl_komplain" name="tgl_komplain" value="<?= $tgl_komplain ?>" readonly>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Order ID
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="id_order" name="id_order" value="<?= $id_order ?>" readonly>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Lokasi
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="lokasi" name="lokasi" value="<?= $lokasi ?>" readonly>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					Klien
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="klien" name="klien" value="<?= $klien ?>" readonly>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					Owner
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="owner" name="owner" value="<?= $owner ?>" readonly>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Judul
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="headline" name="headline" value="<?= $judul ?>" readonly>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Komplain
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="komplain_body" readonly><?= $komplain_body ?></textarea>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status
				</label>
				<div class="col-10">
					<span id="span-status" class="pull-right <?= ($status == 'Solved')? 'hijau' : 'merah' ?>" style="font-size: 24px; font-weight: bold; float: left;">
						<?= $status ?>
					</span>
				</div>
			</div>


			</div></div>
			
		</div>
		
	</form>
</div>
<!--end::Portlet-->

<script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal_ajax .modal-content').html(response);

            }
        });
    }

    function showAjaxModal2(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#m_modal_4 .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#m_modal_4').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#m_modal_4 .modal-content').html(response);
                $('#summernote').summernote({
                	height: 200,
			    	dialogsInBody: true
			    });
            }
        });
    }
    </script>
    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
			</div>
		</div>
	</div>

	<!-- modal width -->

    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				
			</div>
		</div>
	</div>
    
    <!-- end modal width -->
