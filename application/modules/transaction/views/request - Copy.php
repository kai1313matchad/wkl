<?php
$back = base_url().'store_product';
?>

<style>
	/*body {
		background-color: #f5f5f5;
	}*/
	.box-work {
		background-color: #fff;
		border: solid 1px #eee;
		box-shadow: 1px 1px 5px rgba(51,51,51,0.05) !important;
		margin: 30px 0;
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
		font-size: 20px;
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
		font-size: 35px;
		color: #31708f;
		margin-top: 10px;
	}
	.ket-buss-days, span.ital {
		/*font-style: italic;*/
		font-size: 12px !important;
    	color: #a09fa0 !important;
	}
	
	/* modify tabs */
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
		background-color: transparent !important;
		border-bottom-color: #f5f5f5 !important;
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

	.priority-detail span {
		font-size: 30px;
		color: orange;
	}
	.tab-pane {
		padding: 20px;
	}

	h4.activity-title, h4.comment-title {
		color: #02799e;
    	font-weight: 800;
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
</style>

<div class="tab-pane fade in active">

	<div class="row">

		<div class="container">
		<div class="row">
			<div class="col-md-6" id="detail-side">
				<div class="detail-info">
					<div class="judul">
						<h3>Jl. Ahmad Yani ( Depan Suzuya Plaza, View Dari Pusat Kota Rantau Parapat, Sisi B )</h3>
						<p><span class="ital">Submitted by <b>shinigami</b> on <b>July 8, 2018, 7:55 am.</b></span></p>
					</div>
				</div>
				<div class="box-work">
					<table class="table-request">
						<tbody>
							<tr>
								<td style="border-right: 1px solid #ccc;">
									Priority
									
								</td>
								<td colspan="2">
									Status
									
								</td>
							</tr>
							<tr>
								<td style="border-right: 1px solid #ccc; border-bottom: 1px solid #ccc;">
									<div class="priority-detail">
										<span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span> <span class="">High</span>
									</div>
								</td>
								<td colspan="2" style="border-bottom: 1px solid #ccc; padding-bottom: 30px;">
									<div class="status-detail">
										delivery accepted
									</div>
								</td>
							</tr>
							<tr>
								<td style="border-right: 1px solid #ccc;">
									Estimated Time
									<div class="ket-buss-days">(in bussiness days)</div>
									<div class="days-detail" style="display: none;">1.0</div>
								</td>
								<td style="border-right: 1px solid #ccc;">
									Estimated Hours
									<div class="hour-detail" style="display: none;">0.5 - 2.0</div>
								</td>
								<td>
									Actual Hour
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
									<div class="days-detail">1.0</div>
								</td>
								<td style="border-right: 1px solid #ccc;">
									<div class="hour-detail">0.5 - 2.0</div>
								</td>
								<td style="border-collapse: collapse;">
									<div class="actual-detail">
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
							<tr>
								<td colspan="3"></td>
							</tr>
						</tbody>
						<tfoot style="background: #ddd;">
							<tr >
								<td class="no-border" style="padding-top: 20px; padding-bottom: 20px;">
									<button type="button" class="btn btn-success">Upload Materi</button>
									
								</td>
								<td class="no-border" style="padding-top: 20px; padding-bottom: 20px;">
									<button type="button" class="btn btn-warning">Komplain</button>
								</td>
								<td class="no-border" style="padding-top: 20px; padding-bottom: 20px;">
									<button type="button" class="btn btn-default">Ulas Lokasi</button>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="tab-desc">
					<div>
					  	<!-- Nav tabs -->
					  	<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Description</a></li>
						    <li role="presentation"><a href="#environments" aria-controls="environments" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Environments (2)</a></li>
						    <li role="presentation"><a href="#attachments" aria-controls="attachments" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Attachments (1)</a></li>
					 	 </ul>

					  	<!-- Tab panes -->
					  	<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="description">
						    	<p>ID - <b>29</b></p>
								<p>Client - <b>Kingpin</b></p>
								<p>Partner - <b>GreenReaper</b></p>
								<p>Engineer - <b>shinigami@mail.com</b></p>
								<p>Actual Time - <b>24 hours, 21 minutes</b></p>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="environments">
						    	
						    </div>
						    <div role="tabpanel" class="tab-pane" id="attachments">
						    	<div class="row">
								  	<div class="col-xs-6 col-md-3">
								    	<a href="#" class="thumbnail">
								      		<img src="images/data.png" class="img-responsive" alt="...">
								    	</a>
								  	</div>
								  	<div class="col-xs-6 col-md-3">
								    	<a href="#" class="thumbnail">
								      		<img src="images/data.png" class="img-responsive" alt="...">
								    	</a>
								  	</div>
								  	<div class="col-xs-6 col-md-3">
								    	<a href="#" class="thumbnail">
								      		<img src="images/data.png" class="img-responsive" alt="...">
								    	</a>
								  	</div>
								  	<div class="col-xs-6 col-md-3">
								    	<a href="#" class="thumbnail">
								      		<img src="images/data.png" class="img-responsive" alt="...">
								    	</a>
								  	</div>
								</div>
						    </div>
					  	</div>

					</div>
				</div>
			</div>
			<div class="col-md-6" id="comment-side">
				<div class="activity">
					<h4 class="activity-title title">Activities</h4>
					<ul class="activity-list">
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="label label-primary">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="label label-success">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="label label-info">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="label label-primary">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="label label-warning">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="label label-danger">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="label label-primary">Request By <b>Admin.</b></span>
						</li>
					</ul>
				</div>
				<div class="comment-list">
					<h4 class="comment-title title">Chat </h4>
					<!-- <ul class="daftar-komen">
						<li>
							<span class="comment-content">Fruitcake bonbon brownie dessert muffin. Oat cake candy macaroon cake marzipan sweet chupa chups cake. </span>
							<span class="ital">By <b>Admin.</b> Juli 13, 2018, 6:35 pm</span>
						</li>
						<li>
							<span class="comment-content">Fruitcake bonbon brownie dessert muffin. Oat cake candy macaroon cake marzipan sweet chupa chups cake. </span>
							<span class="ital">By <b>Admin.</b> Juli 13, 2018, 6:35 pm</span>
						</li>
						<li>
							<span class="comment-content">Fruitcake bonbon brownie dessert muffin. Oat cake candy macaroon cake marzipan sweet chupa chups cake. </span>
							<span class="ital">By <b>Admin.</b> Juli 13, 2018, 6:35 pm</span>
						</li>
						<li>
							<span class="comment-content">Fruitcake bonbon brownie dessert muffin. Oat cake candy macaroon cake marzipan sweet chupa chups cake. </span>
							<span class="ital">By <b>Admin.</b> Juli 13, 2018, 6:35 pm</span>
						</li>
					</ul> -->
					<section id="comment">
					  <div class="chat">
					    <ul>
					      <li class="other">
					        <a class="user" href="#"><img alt="" src="https://s3.amazonaws.com/uifaces/faces/twitter/toffeenutdesign/128.jpg" /></a>
					        <div class="date">
					          2 minutes ago
					        </div>
					        <div class="message blur">
					          <div class="hider">
					            <span>Click to read</span>
					          </div>
					          <p>
					            Itaque quod et dolore accusantium. Labore aut similique ab voluptas rerum quia. Reprehenderit voluptas doloribus ut nam tenetur ipsam.
					          </p>
					        </div>
					      </li>
					      <li class="other">
					        <a class="user" href="#"><img alt="" src="https://s3.amazonaws.com/uifaces/faces/twitter/toffeenutdesign/128.jpg" /></a>
					        <div class="date">
					          5 minutes ago
					        </div>
					        <div class="message">
					          <div class="hider">
					            <span>Click to read</span>
					          </div>
					          <p>
					            Modi ratione aliquid non. Et porro deserunt illum sed velit necessitatibus. Quis fuga et et fugit consequuntur. Et veritatis fugiat veniam pariatur maxime iusto aperiam.
					          </p>
					        </div>
					      </li>
					      <li class="you">
					        <a class="user" href="#"><img alt="" src="https://s3.amazonaws.com/uifaces/faces/twitter/igorgarybaldi/128.jpg" /></a>
					        <div class="date">
					          7 minutes ago
					        </div>
					        <div class="message">
					          <div class="hider">
					            <span>Click to read</span>
					          </div>
					          <p>
					            Provident impedit atque nemo culpa et modi molestiae. Error non dolorum voluptas non a. Molestiae et nobis nisi sed.
					          </p>
					        </div>
					      </li>
					      <li class="other">
					        <a class="user" href="#"><img alt="" src="https://s3.amazonaws.com/uifaces/faces/twitter/toffeenutdesign/128.jpg" /></a>
					        <div class="date">
					          8 minutes ago
					        </div>
					        <div class="message">
					          <div class="hider">
					            <span>Click to read</span>
					          </div>
					          <p>
					            Id vel ducimus perferendis fuga excepturi nulla. Dolores dolores amet et laborum facilis. Officia magni ut non autem et qui incidunt. Qui similique fugit vero porro qui cupiditate.
					          </p>
					        </div>
					      </li>
					      <li class="you">
					        <a class="user" href="#"><img alt="" src="https://s3.amazonaws.com/uifaces/faces/twitter/igorgarybaldi/128.jpg" /></a>
					        <div class="date">
					          10 minutes ago
					        </div>
					        <div class="message">
					          <div class="hider">
					            <span>Click to read</span>
					          </div>
					          <p>
					            Provident impedit atque nemo culpa et modi molestiae. Error non dolorum voluptas non a. Molestiae et nobis nisi sed.
					          </p>
					        </div>
					      </li>
					      <li class="you">
					        <a class="user" href="#"><img alt="" src="https://s3.amazonaws.com/uifaces/faces/twitter/igorgarybaldi/128.jpg" /></a>
					        <div class="date">
					          10 minutes ago
					        </div>
					        <div class="message">
					          <div class="hider">
					            <span>Click to read</span>
					          </div>
					          <p>
					            Est ut at eum sed perferendis ea hic. Tempora perspiciatis magnam aspernatur explicabo ea. Sint atque quod.
					          </p>
					        </div>
					      </li>
					    </ul>
					  </div>
					</section>
				</div>
				<div class="add-comment">
					<form>
						<div class="form-group">
							<textarea class="tambah-komen form-control" rows="3" placeholder="ketik pesan kamu..." style="border: 1px solid transparent; box-shadow: none;"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Submit Comment</button>
					</form>
					
				</div>
			</div>
		</div>
	</div>
		
	</div>  

</div>

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