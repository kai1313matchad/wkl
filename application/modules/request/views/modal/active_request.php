
<div class="modal-header" style="background-color: #00c5dc; color: #fff;">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Active Request
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= base_url() ?>request/move_active">
<div class="modal-body">

	<input type="hidden" name="request" value="<?=$param2?>">
	<div class="m-portlet__body">
		<h5>Are you sure you want to active this request?</h5>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" class="btn btn-accent">
		Active
	</button>
</div>
</form>