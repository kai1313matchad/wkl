<?php
$back = base_url().'transaction';
$colored_approval = ($approved == 1) ? 'stay-color' : '';
$colored_upl_materi = ($upl_materi == 1) ? 'stay-color' : '';
$colored_dl_materi = ($dl_materi == 1) ? 'stay-color' : '';
?>

<style>
	/*body {
		background-color: #f5f5f5;
	}*/
	.box-work {
		background-color: #fff;
		border: solid 1px #eee;
		box-shadow: 1px 1px 5px rgba(51,51,51,0.05) !important;
		margin-bottom: 20px;
		padding: 20px;
	}
	.table-request {
		border-spacing: 0.5rem;
		border-collapse: collapse;
		width: 100%;
		max-width: 100%;
		margin-bottom: 20px;
	}

	table tr td {
		text-align: center;
	}
	.table-request td, .table-request th {
	  	*border: 1px solid #ccc;
	  	padding: 0.5rem;
	}
	.actual-detail {
		min-width: 100px;
		text-align: center;
		float: none;
		margin: 0 auto;
	}
	.status-detail {
		text-transform: uppercase;
		font-size: 16px;
		font-weight: bold;
	}
	#comment-side {
		height: 100%;
		width: 390px;
  		*position: absolute;
  		top: 0;
  		right: 0;
  		bottom: 0;
		background-color: #ffffff;
		border-left: solid 1px #eee;
		*box-shadow: 1px 1px 5px rgba(51,51,51,0.05) !important;
	}
	#comment-side .label {
		font-size: 12px;
	}
	.min-wrap,
	.hour-wrap,
	.divider-wrap {
		width:50px;
		height:50px;
		text-align: center;
		display: inline-block;
		position: relative;
	}

	.hour-wrap {
		margin-right: 8px;
	}
	.actual-detail .back {
		width: 60px;
		min-height: 50px;
		*position: absolute;
		*overflow: hidden;
	  	background:#ffffff;
	  	*background:#f5f5f5;
		color: green;
		text-align: center;
		font-size: 25px;
	}
	.actual-detail .divider-wrap {
		width: 3px;
		height: 50px;
		position: relative;
		*float: left;
		*overflow: hidden;
	  	background:#ccc;
		color: green;
		text-align: center; 
		margin-right: 8px;
		margin-left: 8px;
	}
	.actual-detail .text-time {
		font-size: 16px;
	}
	.no-float-center {
		float: none;
		margin: 0 auto;
	}
	.days-detail, .hour-detail {
		font-size: 20px;
		color: #31708f;
		margin-top: 10px;
	}
	.ket-buss-days, span.ital {
		/*font-style: italic;*/
		font-size: 12px !important;
    	color: #a09fa0 !important;
	}
	
	span.ital {
		display: block;
		font-size: 11px !important;
		text-transform: uppercase;
	}

	span.no-transaksi {
		color: #000;
		font-weight: bold;
	}

	/* modify tabs */
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
		background-color: transparent !important;
		border-bottom-color: #fff !important;
	}

	.title:after { 
		height: 1px; 
		background: #02799e; 
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

	.activity-list {
		margin: 0 0 50px 0;
		height: 200px;
		overflow: auto;

	}
	.activity-list span.tgl-activity, .daftar-komen span.comment-content {
		display: block;
		width: 100%;
	}

	span.tgl-activity {
		font-size: 12px !important;
    	color: #a09fa0 !important;
	}

	.comment-list {
		position: relative;
		width: 100%;
		*height: 240px;
	}

	.activity-list {
		font-size: 12px;
		padding: 5px;
	}

	.daftar-komen {
		padding: 5px;
		overflow: scroll;
		height: 280px;
		overflow: auto;
		margin: 0 0 50px 0;
		font-size: 12px;
		font-weight: 400;
		text-align: justify;
		color: #46808e;
	} 

	.daftar-komen ul li a:hover {
	    color: #02799e;
	}

	.activity-list li:not(:first-child) {
		margin-top: 5px;
    	padding-top: 5px;
    	border-top: 1px solid rgba(0,0,0,0.05);
	}

	.daftar-komen li:not(:first-child) {
		margin-top: 10px;
    	padding-top: 10px;
    	border-top: 1px dashed rgba(0,0,0,0.05);
	}

	.daftar-komen ul li {
	    display: flex;
	    -webkit-box-orient: vertical;
	    -webkit-box-direction: reverse;
	    -ms-flex-direction: column-reverse;
	    flex-direction: column-reverse;
	}

	.add-comment {
		position: relative;
		display: block;
		overflow: auto;
		width: 100%;
		border-top: 1px solid #ccc;
		padding: 10px 0;
	}

	.no-border {
		border-collapse: collapse;
		border: 1px solid #fff;
	}

	.materi-detail span {
		font-size: 30px;
		color: orange;
	}
	.materi-detail img {
		width: 140px;
	}
	.tab-pane {
		padding: 20px;
	}

	h4.activity-title, h4.comment-title {
		color: #02799e;
    	font-weight: 800;
	}

	.price {
		font-size: 24px;
		font-weight: bolder;
	}

	.up-title {
		text-transform: uppercase;
		font-size: 12px !important;
		font-weight: bold;
	}

	.aktif {
		width: auto;
	    padding: .2em .6em .3em;
	    font-size: 12px;
	    font-weight: bold;
	    line-height: 16px;
	    color: #fff;
	    border-radius: .25em;
	}

	/***********************CHAT***************************/

	section#comment {
		height: 380px;
		overflow: scroll;
		overflow: auto;
	  	*width: 500px;
	  	margin: 10px auto;
	  	background-color: #fff;
	  	padding: 10px 15px 20px 15px;
	}

	.chat ul {
	  	list-style: none;
	  	padding: 0;
	  	margin: 0;
	}
	.chat ul li {
	  	margin: 45px 0 0 0;
	  	font-weight: 300;
	}
	.chat ul li a.user {
	  	margin: -30px 0 0 0;
	  	display: block;
	  	color: #333;
	}
	.chat ul li a.user img {
	  	width: 45px;
	  	height: 45px;
	  	border-radius: 50%;
	  	background-color: #f3f3f3;
	  	box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
	}
	.chat ul li .date {
	  	font-size: 14px;
	  	color: #a6a6a6;
	}
	.chat ul li .message {
	  	display: block;
	  	padding: 10px;
	  	position: relative;
	  	color: #fff;
	  	font-size: 12px;
	  	background-color: #2ECC71;
	  	border-radius: 3px;
	  	box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
	}
	.chat ul li .message:before {
	  	content: '';
	  	position: absolute;
	  	border-top: 16px solid rgba(0, 0, 0, 0.15);
	  	border-left: 16px solid transparent;
	  	border-right: 16px solid transparent;
	}
	.chat ul li .message:after {
	  	content: '';
	  	position: absolute;
	  	top: 0;
	  	border-top: 17px solid #2ECC71;
	  	border-left: 17px solid transparent;
	  	border-right: 17px solid transparent;
	}
	.chat ul li.other .message:before {
	  	content: '';
	  	position: absolute;
	  	border-top: 16px solid rgba(0, 0, 0, 0.15);
	  	border-left: 16px solid transparent;
	  	border-right: 16px solid transparent;
	}
	.chat ul li.other .message:after {
		content: '';
	  	position: absolute;
	  	top: 0;
	  	border-top: 17px solid #f4f5f8;
	  	border-left: 17px solid transparent;
	  	border-right: 17px solid transparent;
	}
	.chat ul li .message.blur p {
	  	-webkit-filter: blur(3px);
	  	-moz-filter: blur(3px);
	  	-o-filter: blur(3px);
	  	-ms-filter: blur(3px);
	  	filter: blur(3px);
	}
	.chat ul li .message.blur .hider {
	  	opacity: 1;
	  	z-index: 1;
	}
	.chat ul li .message p {
	  	margin: 0;
	  	padding: 0;
	  	transition: all 0.1s;
	}
	.chat ul li .message .hider {
	  	opacity: 0;
	  	z-index: -1;
	  	position: absolute;
	  	height: 100%;
	  	width: 100%;
	  	margin: -10px;
	  	text-align: center;
	  	cursor: pointer;
	  	transform-style: preserve-3d;
	  	transition: all 0.1s;
	}
	.chat ul li .message .hider span {
	  	display: block;
	  	position: relative;
	  	top: 50%;
	  	font-size: 16px;
	  	transform: translateY(-50%);
	}
	.chat ul li.other a.user {
	  	float: right;
	}
	.chat ul li.other .date {
	  	float: right;
	  	margin: -20px 10px 0 0;
	}
	.chat ul li.other .message {
	  	margin: 0 90px 0 0;
	  	background-color: #f4f5f8;
	  	color: #000;
	}
	.chat ul li.other .message:before {
	  	margin: -9px -16px 0 0;
	  	right: 0;
	}
	.chat ul li.other .message:after {
	  	content: '';
	  	right: 0;
	  	margin: 0 -15px 0 0;
	}
	
	.chat ul li.you a.user {
	  	float: left;
	}
	.chat ul li.you .date {
	  	float: left;
	  	margin: -20px 0 0 10px;
	}
	.chat ul li.you .message {
	  	margin: 0 0 0 90px;
	}
	.chat ul li.you .message:before {
	  	margin: -9px 0 0 -16px;
	  	left: 0;
	}
	.chat ul li.you .message:after {
	  	content: '';
	  	left: 0;
	  	margin: 0 0 0 -15px;
	}

	.box-work [class^="soap-icon"].circle {
	    margin-right: 5px;
	}
	.box-work [class^="soap-icon"].circle {
	    color: #d9d9d9;
	    cursor: default;
	    font-size: 16px;
	    overflow: hidden;
	}

	.stay-color {
		color: #01b7f2 !important;
	}

	.tambah-komen {
		background-color: #f5f5f5;
	}
	.dl-btn {
		position: absolute;
		top: 10px;
		right: 15px;
	}
</style>

<div class="tab-pane fade in active">
	<div class="row">
		<div class="row">
			<div class="row" style="margin-top: -15px; border-bottom: 1px solid #eee; *box-shadow: 1px 1px 5px rgba(51,51,51,0.05) !important;">
		        <div class="col-md-6">
		            <h2>Detail Pemesanan</h2>
		        </div>
		        <div class="col-md-6">
		            <a href="<?= $back ?>" class="button btn-small yellow pull-right">Kembali</a>
		        </div>
		    </div>
		</div>
    </div>
	<div class="row">

		<div class="container">

			
		<div class="row" style="margin-top: -25px;">

			<!-- alert -->
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>

			<div class="col-md-6" id="detail-side">
				<div class="detail-info">
					<div class="judul">
						<h3 style="line-height: 28px;"><i class="soap-icon-departure select-color"></i><?= $lokasi ?></h3>
						
					</div>
					<div class="row" style="margin-bottom: -5px !important;">
						<div class="col-md-6">
							<p>
								<span class="ital">nomor transaksi</span>
								<span class="no-transaksi"><?= $no_transaksi ?></span>
							</p>
						</div>
						<div class="col-md-6">
							<span class="price" style="text-transform: none; text-align: right; padding-right: 10px;">Rp.
								<?= $harga ?>		
							 </span>
						</div>
					</div>
				</div>
				<div class="box-work">
					<table class="table-request">
						<tbody>
							<tr>
								<td rowspan="2" style="border-right: 1px solid #ccc; border-bottom: 1px solid #ccc;">
									
									<div class="materi-detail2">
										<a href="#" class="button btn-large green" id="show-video" onclick="showAjaxModal('<?= base_url()?>modal/popup/show_video/<?= $id ?>/transaction');" data-toggle="modal" data-target="#m_modal">Lihat Materi</a>
									</div>
								</td>
								<td colspan="2">
									<span class="up-title">Status</span>
									
								</td>
							</tr>
							<tr>
								
								<td colspan="2" style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">
									<div class="status-detail">
										<div class="amenities" style="margin-top: 10px;">
                                            <i class="soap-icon-stories circle <?= $colored_approval ?>" data-toggle="tooltip" data-placement="bottom" title="proses pembayaran"></i>
                                            <i class="soap-icon-magazine circle <?= $colored_upl_materi ?>" data-toggle="tooltip" data-placement="bottom" title="kirim materi"></i>
                                            <i class="soap-icon-lost-found circle <?= $colored_dl_materi ?>" data-toggle="tooltip" data-placement="bottom" title="proses pengerjaaan"></i>
                                            <i class="soap-icon-grid circle " data-toggle="tooltip" data-placement="bottom" title="materi terpasang"></i>
                                        </div>
                                        
									</div>
								</td>
							</tr>
							<tr>
								<td style="border-right: 1px solid #ccc;">
									<span class="up-title">Durasi</span>
									<div class="days-detail" style="display: none;">5</div>
								</td>
								<td style="border-right: 1px solid #ccc;">
									<span class="up-title">Awal Tayang </span>
									<div class="hour-detail" style="display: none;">0.5 - 2.0</div>
								</td>
								<td>
									<span class="up-title">Akhir Tayang</span>
									<div class="actual-detail" style="display: none;">
										<div class="hour-wrap">
											<div class="back">
												12
												<div class="text-time">Hour</div>
											</div>
										</div>
										<div class="divider-wrap"> </div>
										<div class="min-wrap">
											<div class="back">
												55
												<div class="text-time">Minute</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr class="no-border">
								<td style="border-right: 1px solid #ccc;">
									<div class="days-detail"><?= $durasi ?> bulan</div>
								</td>
								<td style="border-right: 1px solid #ccc;">
									<div class="hour-detail"><?= $awal_tayang ?></div>
								</td>
								<td style="border-collapse: collapse;">
									<div class="hour-detail"><?= $akhir_tayang ?></div>
								</td>
							</tr>
							<tr>
								<td colspan="3"></td>
							</tr>
						</tbody>
						<tfoot style="background: #ddd;">
							<tr >
								<td class="no-border" style="padding-top: 20px; padding-bottom: 20px;">
									<a href="#" class="button btn-large sky-blue1" id="upload-materi" onclick="showAjaxModal('<?= base_url()?>modal/popup/upload_video/<?= $id ?>/transaction');" data-toggle="modal" data-target="#m_modal">Upload Materi</a>
								</td>
								<td class="no-border" style="padding-top: 20px; padding-bottom: 20px;">
									<a href="#" class="button btn-large yellow" onclick="showAjaxModal('<?= base_url()?>modal/popup/komplain/<?= $id ?>/transaction');">Komplain</a>
								</td>
								<td class="no-border" style="padding-top: 20px; padding-bottom: 20px;">
									<a href="#" class="button btn-large green" onclick="showAjaxModal('<?= base_url()?>modal/popup/ulasan/<?= $id ?>/transaction');" data-toggle="modal" data-target="#m_modal">Ulas Lokasi</a>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="tab-desc">
					<div>
					  	<!-- Nav tabs -->
					  	<ul class="nav nav-tabs" role="tablist">
						     <li role="presentation" class="active"><a href="#laporan" aria-controls="laporan" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Laporan</a></li>
					 	 </ul>

					  	<!-- Tab panes -->
					  	<div class="tab-content">
						 
						    <div role="tabpanel" class="tab-pane active" id="laporan">
						    	<div id="laporan-history"></div>
						    </div>

					  	</div>

					</div>
				</div>
			</div>
			<div class="col-md-6" id="comment-side">
				<div class="activity">
					<h4 class="activity-title title">Activities</h4>
					<ul class="activity-list" id="activity-history">
						
					</ul>
				</div>
				<div class="comment-list">
					<h4 class="comment-title title">Chat </h4>
					
					<section id="comment">
					  	<div class="chat">
					    	<ul id="mCSB_8_container">
					      
					      

					    	</ul>
					  	</div>
					</section>
				</div>
				<div class="add-comment">
					
					<div class="form-group">
						<textarea class="tambah-komen form-control" id="comment-body" rows="3" placeholder="ketik pesan kamu..." style="border: 1px solid transparent; box-shadow: none;" onkeypress="return addCommment(event)"></textarea>
					</div>
					<button type="submit" class="btn btn-primary pull-right" id="btn-comment">Submit Comment</button>
					<span id="alerte"></span>
				</div>
			</div>
		</div>
	</div>
		
	</div>  

</div>

<script>
	var interval = 1000;
	setTimeout(showComment, interval);
	setTimeout(showFileLaporan, interval);
	setTimeout(showActivity, interval);

	document.getElementById('btn-comment').addEventListener('click', nambahKomen);

	function nambahKomen() {
		var comment = document.getElementById('comment-body').value;
		var user_id = <?= $user_id ?>;
		console.log(comment);

		if (comment != '') {
			tjq.ajax({
				url: '<?= base_url() ?>transaction/addComment',
				method: 'POST',
				data:{id:'<?=$id?>', user_id:user_id, cat:'Klien', comment:comment},
				success: function(res) {

					tjq('#alerte').html('komentar ditambahkan!')
					.delay(3000)
					.fadeOut();
					showComment();
					tjq('#comment-body').val('');
				}
			})
		} else {
			tjq('#alerte').html('silahkan ketik komentar!')
		}
	}

	function addCommment(e) {
		if (e.keyCode == 13) {
			var comment = document.getElementById('comment-body').value;
			var user_id = <?= $user_id ?>;

			tjq.ajax({
				url: '<?= base_url() ?>transaction/addComment',
				method: 'POST',
				data:{id:'<?=$id?>', user_id:user_id, cat:'Klien', comment:comment},
				success: function(res) {

					tjq('#alerte').html('komentar ditambahkan!')
					.delay(3000)
					.fadeOut();
					showComment();
					tjq('#comment-body').val('');
				}
			})
		}
	}

	// show comment

	function showComment() {
		// console.log('showme');
		tjq.ajax({
			url: '<?= base_url() ?>transaction/getComment',
			method: 'POST',
			data:{id:'<?=$id?>', cat:'Klien'},
			success: function(res) {
				tjq('#mCSB_8_container').html(res);
			},
			complete: function (res) {
                // Schedule the next
                setTimeout(showComment, interval);
            }
		})
	}

	// show laporan
	function showFileLaporan() {
		// e.preventDefault();
		// console.log('showme');
		tjq.ajax({
			url: '<?= base_url() ?>transaction/getReport',
			method: 'POST',
			data:{id:'<?=$id?>'},
			success: function(res) {
				tjq('#laporan-history').html(res);
			},
			complete: function (res) {
                // Schedule the next
                setTimeout(showFileLaporan, interval);
            }
		})
	}

	// show activity
	function showActivity() {
		// console.log('showme');
		tjq.ajax({
			url: '<?= base_url() ?>transaction/getActivity',
			method: 'POST',
			data:{id:'<?=$id?>', subject:'Klien'},
			success: function(res) {
				tjq('#activity-history').html(res);
			},
			complete: function (res) {
                // Schedule the next
                setTimeout(showActivity, interval);
            }
		})
	}

</script>

<script>
	var interval = 1000;
	setTimeout(showMateri, interval);

	function showMateri() {
		tjq.ajax({
			url: '<?= base_url() ?>transaction/getMateri',
			method: 'POST',
			data:{id:'<?=$id?>'},
			success: function(res) {
				tjq('#materi-history').html(res);
				getCountMateri();
				getSelectedMateri();
			},
			complete: function (res) {
                // Schedule the next
                setTimeout(showMateri, interval);
            }
		})
	}

	function getCountMateri() {
		tjq.ajax({
			url: '<?= base_url() ?>transaction/get_count_materi',
			method: 'POST',
			data:{id:'<?=$id?>'},
			success: function(resp) {
				tjq('#jml-materi').html(resp);
				if (resp === '12') {
					document.getElementById('upload-materi').setAttribute('onclick', 'showAjaxModal("<?= base_url()?>modal/popup/no_more_upload/<?= $id ?>/transaction")');
				}
			}
		})
	}

	function selectOnlyThis(id) {
		var count = document.querySelectorAll('#materi-history').textContent;
		console.log(count);
		var user_id = <?= $user_id ?>;
	    for (var i = 1; i <= count; i++)
	    {
	        document.getElementById(i).checked = false;
	    }
	    document.getElementById(id).checked = true;

	    console.log(id);

	    // ajax nya

	    tjq.ajax({
            type: 'POST',
            url: '<?= base_url() ?>transaction/pickSelect',  
            data: {user_id:user_id, session_id:'<?= $id ?>', id:id},
            success: function (resp) {
                console.log("Sukses","data telah di update", "success");
                getSelectedMateri();
            }
        });
	}

	function getSelectedMateri() {
		tjq.ajax({
            type: 'POST',
            url: '<?= base_url() ?>transaction/get_select_materi',  
            data: {user_id:'<?= $user_id ?>', session_id:'<?= $id ?>'},
            success: function (resp) {
                tjq('.materi-detail').html(resp);
            }
        });
	}
</script>

<script>
	tjq(document).ready(function () {
		var tab = tjq('.tab-pane').height();
		tjq('#comment-side').height(tab);
		console.log(tab);
	});

	(function() {
	  tjq('.hider').click(function() {
	    return tjq(this).parent('.message').removeClass('blur');
	  });

	}).call(this);
</script>

<script type="text/javascript" src="<?= base_url() ?>assets/dropzone.js"></script>

<script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        tjq('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        tjq('#modal_ajax').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        tjq.ajax({
            url: url,
            success: function(response)
            {
                tjq('#modal_ajax .modal-content').html(response);

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