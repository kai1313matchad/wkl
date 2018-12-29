<?php
$back = base_url().'store_inbox';
?>

<style type="text/css">
	.pengirim {
		margin-left: 10px;
		font-size: 14px;
		font-weight: bold;
	}
	.show_pesan {
		margin-left: 45px;
		margin-right: 30px;
	}
	.tgl {
		margin-left: 10px;
	}
</style>
<div class="tab-pane fade in active">

	<div class="row">
		<div class="col-md-6">
	    	<h2>Detail Pesan Terkirim</h2>
	    </div>

	    <div class="col-md-6">
	        <a href="<?= $back ?>" class="button btn-small yellow pull-right">BACK</a>
	    </div>
	</div>  

	<div class="col-sm-12 no-float no-padding">
		
		<h3 style="margin-top:8px;"><?= $subject ?></h3>
		<hr>
		<div class="row">
			<div class="col-md-6">
				
				<table>
					<tr>
						<td rowspan="2">
							<img src="http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png" class="img-circle" width="40">
						</td>
						<td>
							<span class="pengirim">
							<?php
								echo ($sent_by == 0) ? '  Customer Support' : '';
							?>
							</span>
						</td>
					</tr>
					<tr>	
						<td>
							<span class="tgl"><?= $date_created ?></span>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				
				<?php
				$create_msg_url = base_url()."store_inbox/create/".$code;
				?>
				<div class="pull-right">
					<a href="<?php echo $create_msg_url; ?>">
						<button type="button" class="button btn-small green"><i class="fa fa-reply"></i> Balas Pesan</button>
					</a>
				</div>
			</div>
		</div>

		<div class="show_pesan">
			<?= $message ?>
		</div>
		

	</div>

</div>