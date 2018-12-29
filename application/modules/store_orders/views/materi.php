<style>
	#item_price {
		font-size: 24px; font-weight: bold; color: #f4516c; float: right;
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

	h5.ket-klien {
	    color: #333;
	    text-align: center;
	    text-transform: uppercase;
	    font-family: "Roboto", sans-serif;
	    font-weight: bold;
	    position: relative;
	    margin: 20px 0 60px;
	}

	h5.ket-klien::after {
	    content: "";
	    width: 100px;
	    position: absolute;
	    margin: 0 auto;
	    height: 3px;
	    background: #8fbc54;
	    left: 0;
	    right: 0;
	    bottom: -10px;
	}
	.check {
		position: absolute;
		top: 390px;
		right: 40px;
	}
	input[type="checkbox"] {
		border-radius: 3px;
	    background: none;
	    position: absolute;
	    top: 1px;
	    left: 0;
	    height: 18px;
	    width: 18px;
	}

	.m-portlet.m-portlet--full-height {
	    *height: calc(100% - 12.2rem);
	}
</style>


<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-demo__preview m-demo__preview--btn">
				<?php 
				$timer_status = Project::timer_status('order', $update_id, $shopper_id);
				$label = ($timer_status == 'On') ? 'danger' : 'secondary';	
				if ($timer_status == 'On') : ?>
					<a href="<?=base_url()?>store_orders/tracking/off/<?=$update_id?>" class="btn btn-<?= $label ?> m-btn m-btn--icon"  title="stop timer">
						<i class="la la-dashboard"></i>Stop
					</a>
				<?php else: ?>
					<a href="<?=base_url()?>store_orders/tracking/on/<?=$update_id?>" class="btn btn-<?= $label ?> m-btn m-btn--icon"  title="start timer">
						<i class="la la-dashboard"></i>Start
					</a>
				<?php endif; ?>

				<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/mark_complete/<?=$update_id?>/store_orders');" data-toggle="modal" data-target="#m_modal" class="btn btn-info m-btn m-btn--icon" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Mark as Complete" data-skin="dark">
					<i class="la la-check-square"></i>Done
				</a>

				<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/send_tax/<?=$update_id?>/store_orders');" data-toggle="modal" data-target="#m_modal" class="btn btn-warning m-btn m-btn--icon" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Delete Order" data-skin="dark">
					<i class="la la-file-pdf-o"></i>Kirim Faktur Pajak
				</a>

				<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/delete/<?=$update_id?>/store_orders');" data-toggle="modal" data-target="#m_modal" class="btn btn-danger m-btn m-btn--icon" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Delete Order" data-skin="dark">
					<i class="la la-trash"></i>Delete
				</a>

			</div>
		</div>

		<div class="m-portlet__head-tools">
			<a href="<?= base_url() ?>store_orders/manage" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-reply"></i>
					<span>
						Back
					</span>
				</span>
			</a>
		</div>
	</div>
	<!--begin::Form-->

	<!-- alert -->
<?php 
if (isset($flash)) {
	echo $flash;
}
?>

	
		<div class="m-portlet__body">
			
			<?php require_once('tabs.php'); ?>
			
			<?php 
			if (isset($info)) {
				echo $info;
			}
			?>

			<div class="tab-content">
				
				<div class="tab-pane active">
					

					<div class="row">

						<?php
						if (isset($query)) {
						?> 	

						<?php
						$no = 0;
						$color = array('accent', 'danger', 'accent2', 'success', 'warning', 'info', 'primary', 'brand', 'focus');
						$this->load->module('timedate');
						foreach ($query->result() as $row) {
							$pic = $row->materi;
							$date = $this->timedate->get_nice_date($row->created_at, 'cool');
							$select = $row->selected;

							if ($select == 1) {
								$checked = "checked";
							} else {
								$checked = "";
							}
						?>	

							<div class="col-xl-4">
								<!--begin:: Widgets/Blog-->
								<div class="m-portlet m--bg-<?= $color[$no++] ?> m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
									<div class="m-portlet__head m-portlet__head--fit">
										
									</div>
									<div class="m-portlet__body" style="">
										<div class="m-widget19">
											<div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
												<img src="<?= base_url() ?>marketplace/materi/convert/<?= $pic ?>" alt="">
												
											</div>
										</div>
										<div class="m-widget7 m-widget7--skin-dark">
											<div class="m-widget7__user">
												
												<div class="m-widget7__info">
													<span class="m-widget7__username">
														<?= $row->materi ?>
													</span>
													<br>
													<span class="m-widget7__time">
														<?= $date ?>
													</span>
												</div>
											</div>
											
										</div>

									</div>
									<div class="row1">
										<div class="col-lg-10"></div>
										<div class="col-lg-2">
											<input type="checkbox" id="<?= $row->id ?>" value="Value<?= $row->id ?>" name="" class="pull-right" onclick="selectOnlyThis(this.id)" <?= $checked ?> >
										</div>
									</div>
								</div>
								<!--end:: Widgets/Blog-->
							</div>

						<?php } } ?>	

							

							
						</div>


				</div>
				
			</div>

		</div>
	
</div>
<!--end::Portlet-->

<script>
	var count = document.querySelectorAll('input.pull-right').length; // document.querySelector('.row1').getElementsByTagName('input').length;
	console.log(count);

	function selectOnlyThis(id) {
	    for (var i = 1; i <= count; i++)
	    {
	        document.getElementById(i).checked = false;
	    }
	    document.getElementById(id).checked = true;

	    console.log(id);

	    // ajax nya

	    jQuery.ajax({
            type: 'POST',
            url: '<?= base_url() ?>manage_materi/pickSelect',  
            data: {user_id:<?= $user_id ?>, order_id:<?= $update_id ?>, id:id},
            success: function (resp) {
                swal("Sukses","data telah di update", "success");
            }
        });

	}
</script>