<?php $req = Requests::view_by_id($id); ?>

<style>
	.title:after { 
		height: 1px; 
		background: #ddd; 
		margin-left: 5px;
	}

	#detail-req {
		font-size: 14px;
		font-weight: 600;
	}

	#detail-req tr td {
		border-collapse: collapse;
		border: none;
	}

	/* Flex implementation */
	.title { 
		display:flex; 
		flex-direction: row; 
		flex-wrap: nowrap; 
		align-items:center; 
		color: #31708f;
	}
	.title:after { 
		content:" "; 
		display:block; 
		min-width:50px; 
		flex: 1 1 0%; 
	}
	.m-messenger__message-username {
		font-weight: 600;
	}
	.tanggal-komen {
		font-style: italic;
		font-size: 11px;
		font-weight: normal;
	}

	#alerte {
		color: red;
		font-weight: 600;
		font-size: 11px;
	}

</style>

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head hidden-print">
		<div class="m-portlet__head-caption ">
			
			<div class="m-demo__preview m-demo__preview--btn">
				
				<a href="<?= base_url() ?>request/add/<?=$id?>" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Edit Request" data-skin="dark">
					<i class="la la-edit"></i>
				</a>
				
				<!--  -->
				<div class="m-dropdown m-dropdown--inline m-dropdown--arrow" data-dropdown-toggle="click" aria-expanded="true">
					<a href="#" class="m-dropdown__toggle btn btn-success dropdown-toggle">
						Ubah Status
					</a>
					<div class="m-dropdown__wrapper">
						<span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
						<div class="m-dropdown__inner">
							<div class="m-dropdown__body">
								<div class="m-dropdown__content">
									<ul class="m-nav">
										
										<li class="m-nav__item">
											<a href="<?= base_url() ?>request/status/<?=$id?>/?status=1" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-interface-4"></i>
												<span class="m-nav__link-text">
													Resolved
												</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="<?= base_url() ?>request/status/<?=$id?>/?status=2" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-close"></i>
												<span class="m-nav__link-text">
													Closed
												</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="<?= base_url() ?>request/status/<?=$id?>/?status=3" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-interface-5"></i>
												<span class="m-nav__link-text">
													Open
												</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="<?= base_url() ?>request/status/<?=$id?>/?status=4" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-refresh"></i>
												<span class="m-nav__link-text">
													Pending
												</span>
											</a>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="m-portlet__head-tools">
			<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/delete_request/<?=$id?>/request');" data-toggle="modal" data-target="#m_modal" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
				<span>
					<i class="la la-trash"></i>
					<span>
						Delete Request
					</span>
				</span>
			</a>
		</div>
		
	</div>

	<div class="m-portlet__body">

		<div class="container">

			<div class="judul2">
				<h4>[<?= $req->req_code ?>]: <?= $req->req_title ?></h4>
				<p><span class="ital">Submitted by <b>Shinigami</b> on <b><?php
				$this->load->module('timedate');
				echo $this->timedate->get_nice_date($req->created_at, 'full');
				?></b></span></p>
			</div>
			<div class="row">
		
<?php

switch ($req->priority) {
	case 1:
		$prior = 'Low';
		$alert = 'primary';
	break;

	case 2:
		$prior = 'Medium';
		$alert = 'success';
	break;

	case 3:
		$prior = 'High';
		$alert = 'warning';
	break;
	
	default:
		$prior = 'Urgent';
		$alert = 'danger';
	break;
}

switch ($req->req_status) {
	case 1:
		$stat = 'Resolved';
	break;

	case 2:
		$stat = 'Closed';
	break;

	case 3:
		$stat = 'Open';
	break;
	
	default:
		$stat = 'Pending';
	break;
}

?>			

		<div class="col-md-7" id="left-side">
			
			<div class="detail-info">
				
				<?php
            	$item_id = Invoice::view_basket_by_id($req->id_transaction)->item_id;
            	$url = Invoice::view_item_by_id($item_id)->item_url;
            	$view_product = base_url()."product/billboard/".$url;
            	?>
            	
				<div class="m-alert m-alert--outline alert alert-warning alert-dismissible fade show" role="alert" style="background-color: transparent;">
					<i class="m-nav__link-icon flaticon-map-location"></i>
					<a href="<?= $view_product ?>" style="color: #fb2f;" target="_blank"><?= Invoice::view_basket_by_id($req->id_transaction)->item_title .' - #'. Invoice::view_ooh_by_id(Invoice::view_basket_by_id($req->id_transaction)->item_id)->prod_code ?></a>
				</div>

				<div class="detail-status">
					<div class="alert alert-<?= $alert ?>" role="alert">
						<div class="row">
							<div class="col-md-6">
								<table class="table" id="detail-req">
									<tbody>
										<tr>
											<td class="desc-title">Priority</td>
											<td>:</td>
											<td><?= $prior ?></td>
										</tr>
										<tr>
											<td>Status</td>
											<td>:</td>
											<td><?= $stat ?></td>
										</tr>
									</tbody>
								</table>		
							</div>
							<div class="col-md-6">
								<table class="table" id="detail-req">
									<tbody>
										<tr>
											<td class="desc-title">Deadline</td>
											<td>:</td>
											<td><?php 
											$this->load->module('timedate');
											echo $this->timedate->get_nice_date($req->deadline, 'mini');
											?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="detail-user">
					<div class="col-md-10">
						<table class="table" id="detail-req">
							<tbody>
								<tr>
									<td class="desc-title">Klien</td>
									<td>:</td>
									<td><strong><?= Client::view_by_id($req->client)->username ?></strong></td>
								</tr>
								<tr>
									<td class="desc-title">Assigned to</td>
									<td>:</td>
									<td><strong><?= Client::view_by_id($req->assigned_to)->username ?></strong></td>
								</tr>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
			<div class="description">
				<h4 class="description-title title">Description</h4>
				<p><?= $req->req_desc ?></p>
			</div>
			<div class="tambahan">
				<!-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  	<div class="panel panel-default">
				    	<div class="panel-heading" role="tab" id="headingOne">
				      		<h4 class="panel-title">
				        		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          			Environments
				        		</a>
				      		</h4>
				    	</div>
				    	<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				      		<div class="panel-body">
				        		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      		</div>
				    	</div>
				  	</div>
				  	<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
					      	<h4 class="panel-title">
					        	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					          		Attachments
					        	</a>
					      	</h4>
					    </div>
					    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					      	<div class="panel-body">
					        	<div class="pull-right">
					        		<div class="box-file">
					        			<span class="title-drop">Drop an image or file here</span>
					        		</div>
					        	</div>
					      	</div>
					    </div>
				  	</div>
				  	
				</div> -->

				<!-- <ul class="accordion">
					<li class="accordion-item is-active">
						<h5 class="accordion-thumb">Environments</h5>
						<div class="accordion-panel">
							Lorem ipsum dolor sit amet, consectetur adipisicing
							elit. Placeat, quibusdam! Voluptate nobis, beatae
							tempora praesentium, illum quis illo, maiores quod
							similique placeat, saepe mollitia dolor officiis
							aspernatur deleniti debitis commodi!
						</div>
					</li>
					
					<li class="accordion-item">
						<h5 class="accordion-thumb">Attachments</h5>
						<div class="accordion-panel">
							<div class="pull-right2">
				        		<div class="box-file">
				        			<span class="title-drop">Drop an image or file here</span>
				        		</div>
				        	</div>
						</div>
					</li>
				</ul> -->

			</div>

			<div class="m-accordion m-accordion--bordered" id="m_accordion_2" role="tablist">
				<!--begin::Item-->
				<div class="m-accordion__item">
					<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_1_head" data-toggle="collapse" href="#m_accordion_2_item_1_body" aria-expanded="    false">
						
						<span class="m-accordion__item-title">
							Environments
						</span>
						<span class="m-accordion__item-mode">
							<i class="la la-plus"></i>
						</span>
					</div>
					<div class="m-accordion__item-body collapse" id="m_accordion_2_item_1_body" role="tabpanel" aria-labelledby="m_accordion_2_item_1_head" data-parent="#m_accordion_2">
						<span>
							Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
						</span>
					</div>
				</div>
				<!--end::Item--> 
<!--begin::Item-->
				<div class="m-accordion__item">
					<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_2_head" data-toggle="collapse" href="#m_accordion_2_item_2_body" aria-expanded="    false">
						
						<span class="m-accordion__item-title">
							Attachments
						</span>
						<span class="m-accordion__item-mode">
							<i class="la la-plus"></i>
						</span>
					</div>
					<div class="m-accordion__item-body collapse" id="m_accordion_2_item_2_body" role="tabpanel" aria-labelledby="m_accordion_2_item_2_head" data-parent="#m_accordion_2">
						
						<span>
							<div class="col-lg-7 col-md-9 col-sm-12 pull-right">
								<div class="m-dropzone dropzone dz-clickable" action="inc/api/dropzone/upload.php" id="m-dropzone-one ">
									<div class="m-dropzone__msg dz-message needsclick">
										<h3 class="m-dropzone__msg-title">
											Drop files here or click to upload.
										</h3>
										<span class="m-dropzone__msg-desc">
											
										</span>
									</div>
								</div>
							</div>
						</span>

					</div>
				</div>
				<!--end::Item--> 

			</div>

			<!-- <div class="comments">
				<h4 class="title">Comments</h4>
				<div class="panel panel-default">
				  	<div class="panel-body">
				    	<div class="col-md-8">
				    		<p class="">
				    			<b>shinigami@mail.com :</b>
				    		</p>
				    		<p>Sweet roll caramels lollipop danish candy canes candy halvah sweet roll. Cookie sugar plum tootsie roll powder carrot cake jelly beans.</p>
				    	</div>
				    	<div class="col-md-4">
				    		<div class="pull-right">
				    			<i><span class="glyphicon glyphicon-time" aria-hidden="true"></span> 2018-07-07 08:55</i>
				    		</div>
				    		
				    	</div>
				  	</div>
				</div>
				<h4>Comment *</h4>
				<form class="">
					<div class="form-group">
						<textarea class="form-control" rows="3" placeholder="Leave a Comment .."></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Submit Comment</button>
				</form>
			</div> -->

		</div>
		<div class="col-md-5" id="right-side" style="border-left: 1px dashed #ddd;">
			
			<div class="tab-content" >
					<div class="tab-pane m-scrollable active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
						<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
							<div class="m-messenger__messages mCustomScrollbar _mCS_8 mCS-autoHide" style="height: 550px; position: relative; overflow: visible; "><div id="mCSB_8" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_8_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
								
								<!--  -->

							</div></div><div id="mCSB_8_scrollbar_vertical" class="mCSB_scrollTools mCSB_8_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_8_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 36px; max-height: 177px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
							<div class="m-messenger__seperator"></div>
							<div class="m-messenger__form">
								<div class="m-messenger__form-controls">
									<input type="text" name="" id="comment-body" placeholder="Type here..." class="m-messenger__form-input" onkeypress="return addCommment(event)">
								</div>
								<div class="m-messenger__form-tools">
									<a href="#" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
										<i class="fa flaticon-speech-bubble"></i>
									</a>
									<!-- <a href="" class="m-messenger__form-attachment">
										<i class="la la-paperclip"></i>
									</a> -->
								</div>
							</div>
							<span id="alerte"></span>
						</div>
					</div>
					
					
				</div>

		</div>
		
	</div>
</div>	

    </div>
</div>


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

</script>
    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
			</div>
		</div>
	</div>
    

    <script type="text/javascript">
    function confirm_modal(delete_url)
    {
        jQuery('#modal-4').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
    </script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Are you sure to delete this ?
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						×
					</span>
				</button>
				</div>
                
                <div class="modal-footer">
                	<a href="#" class="btn btn-danger" id="delete_link">delete</a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Cancel
					</button>
				</div>
			</div>
		</div>
	</div>	

<!-- <script type="text/javascript" src="<?= base_url() ?>assets/dropzone.js"></script>	 -->

<script>
	$(document).ready(function () {
		var tab = $('.m-portlet__body').height();
		$('.m-messenger__messages').height(tab);
		console.log(tab);
	})
</script>

<script>
	// add comment

	function addCommment(e) {
		if (e.keyCode == 13) {
			var comment = document.getElementById('comment-body').value;
			var user_id = 0;

			$.ajax({
				url: '<?= base_url() ?>request/addComment',
				method: 'POST',
				data:{req_id:<?=$id?>, user_id:user_id, comment:comment},
				success: function(res) {

					$('#alerte').html('komentar ditambahkan!')
					.delay(3000)
					.fadeOut();
					showComment();
					$('#comment-body').val('');
				}
			})
		}
	}


	// show comment

	function showComment() {
		$.ajax({
			url: '<?= base_url() ?>request/getComment',
			method: 'POST',
			data:{req_id:<?=$id?>},
			success: function(res) {
				$('#mCSB_8_container').html(res);
				$('#comment-body').attr('value', '');

			}
		})
	}

	showComment();

</script>

<script>
	Dropzone.autoDiscover = false;

	var myDropzone = new Dropzone('.dropzone', {
		url: '<?= base_url() ?>request/file_upload/<?= $id ?>',
		maxFilesize: 1,
		acceptedFiles:"image/*",
		renameFile: function (file) {
        	file.name = new Date().getTime() + '_' + file.name;
    	}
		// paramName:"userfile",
		// addRemoveLinks:true,
	});

</script>