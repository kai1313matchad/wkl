<style>
	.text-lt {
		text-decoration: line-through;
	}
</style>

<!-- alert -->
<?php 
if (isset($flash)) {
	echo $flash;
}
?>
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Database request
				</h3>
			</div>
			
		</div>
	</div>

<?php
	$create_request_url = base_url()."request/add";
	$show_active_request = base_url()."request";
?>

	<div class="m-portlet__body">
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row align-items-center">
				<div class="col-xl-6 order-2 order-xl-1">
					<div class="form-group m-form__group row align-items-center">
						<div class="col-md-4">
							<div class="m-form__group m-form__group--inline">
								<div class="m-form__label">
									<label>
										Status:
									</label>
								</div>
								<div class="m-form__control">
									<div class="btn-group bootstrap-select form-control m-bootstrap-select m-bootstrap-select--solid"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" data-id="m_form_status" title="All"><span class="filter-option pull-left">
											All
										</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">
											All
										</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">
											Pending
										</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">
											Closed
										</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">
											Open
										</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="form-control m-bootstrap-select m-bootstrap-select--solid" id="m_form_status" tabindex="-98">
										<option value="">
											All
										</option>
										<option value="1">
											Pending
										</option>
										<option value="2">
											Closed
										</option>
										<option value="3">
											Open
										</option>
									</select></div>
								</div>
							</div>
							<div class="d-md-none m--margin-bottom-10"></div>
						</div>
						
						<div class="col-md-4">
							<div class="m-input-icon m-input-icon--left">
								<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
								<span class="m-input-icon__icon m-input-icon__icon--left">
									<span>
										<i class="la la-search"></i>
									</span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 order-1 order-xl-2 m--align-right">
					<a href="<?= $show_active_request ?>" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
						<span>
<!-- 							<i class="la la-plus"></i>
 -->							<span>
								Lihat Active
							</span>
						</span>
					</a>
					<a href="<?= $create_request_url ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
						<span>
<!-- 							<i class="la la-plus"></i>
 -->							<span>
								Buat Request
							</span>
						</span>
					</a>
					<div class="m-separator m-separator--dashed d-xl-none"></div>
				</div>

			</div>
		</div>
		
		<!--end: Search Form -->
<!--begin: Datatable -->
		<table class="m-datatable" id="html_table" width="100%">
			<thead>
				<tr>
					<th title="Field #1">
						Subject
					</th>
					<th title="Field #2">
						Client
					</th>
					<th title="Field #3">
						Date
					</th>
					<th title="Field #4">
						Priority
					</th>
					<th title="Field #5">
						Assigned To
					</th>
					<th title="Field #6">
						Status
					</th>
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($query->result() as $row) { 
			  		$status = $row->req_status;

			  		switch ($status) {
                        case 1: $stat = 'Resolved'; $label2 = 'primary'; break;
                        case 2: $stat = 'Closed'; $label2 = 'success'; break;
                        case 3: $stat = 'Open'; $label2 = 'warning'; break;
                        default: $stat = 'Pending'; $label2 = 'danger'; break;
                    }

                    $priority = $row->priority;

			  		switch ($priority) {
                        case 1: $prior = 'Low'; $label3 = 'primary'; break;
                        case 2: $prior = 'Medium'; $label3 = 'success'; break;
                        case 3: $prior = 'High'; $label3 = 'warning'; break;
                        default: $prior = 'Urgent'; $label3 = 'danger'; break;
                    }
			  	?>
				<tr>
					<td>
						<span style="overflow: visible; width: 110px;">						
							<div class="dropdown ">							
								<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                
									<i class="la la-ellipsis-h"></i>                            
								</a>						  	
								<div class="dropdown-menu dropdown-menu-right">						    	
									<a class="dropdown-item" href="<?=base_url()?>request/view/<?=$row->id?>"><i class="la la-file-text"></i> Preview</a>						    	
									<a class="dropdown-item" href="<?=base_url()?>request/add/<?=$row->id?>"><i class="la la-edit"></i> Edit</a>						    		
									<a class="dropdown-item" href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/active_request/<?=$row->id?>/request');"><i class="la la-archive"></i> Move to Active</a>						    	
									<a class="dropdown-item" href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/delete_request/<?=$row->id?>/request');"><i class="la la-trash"></i> Delete</a>
								</div>						
							</div>						
							<a href="<?= base_url() ?>request/view/<?= $row->id ?>" class="<?php 
							echo ($status == 2) ? 'text-lt' : '' ?>">[<?= $row->req_code ?>] <?= $row->req_title ?></a>					
						</span>
						
					</td>
					<td>
						<?php
							echo Client::view_by_id($row->client)->username;
						?>
					</td>
					<td>
						<?php
							$this->load->module('request');
							echo $this->request->convert_date($row->deadline);
						?>
					</td>
					<td>
						<span class="m-badge m-badge--<?= $label3 ?> m-badge-wide" style="color: #fff;">
							<?= $prior ?>
						</span>
					</td>
					<td>
						<?php
							echo Client::view_by_id($row->assigned_to)->username;
						?>
					</td>
					<td>
						<span class="m-badge m-badge--<?= $label2 ?> m-badge-wide" style="color: #fff;">
							<?= $stat ?>
						</span>
					</td>

				</tr>
				<?php } ?>
			</tbody>
		</table>
		<!--end: Datatable -->
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