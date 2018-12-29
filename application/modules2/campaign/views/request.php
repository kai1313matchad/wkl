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
		width: 290px;
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
</style>

<div class="tab-pane fade in active">

	<div class="row">

		<div class="container">
		<div class="row">
			<div class="col-md-7" id="detail-side">
				<div class="detail-info">
					<div class="judul">
						<h3>Testing 3</h3>
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
						</tbody>
						<tfoot>
							<tr >
								<td colspan="3" class="no-border" style="padding-top: 20px;">
									<button type="button" class="btn btn-primary">Bill & Archive</button>
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
			<div class="col-md-4" id="comment-side">
				<div class="activity">
					<h4 class="activity-title title">Activities</h4>
					<ul class="activity-list">
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="">Request By <b>Admin.</b></span>
						</li>
						<li>
							<span class="tgl-activity">Juli 13, 2018, 6:35 pm</span>
							<span class="">Request By <b>Admin.</b></span>
						</li>
					</ul>
				</div>
				<div class="comment-list">
					<h4 class="comment-title title">Comments  <i class="fa fa-comments"></i> (0)</h4>
					<ul class="daftar-komen">
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
					</ul>
				</div>
				<div class="add-comment">
					<form>
						<div class="form-group">
							<textarea class="tambah-komen form-control" rows="3" placeholder="leave a comment.." style="border: 1px solid transparent; box-shadow: none;"></textarea>
						</div>
						<div class="checkbox">
						    <label>
						      	<input type="checkbox"> Allow client to see comment
						    </label>
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
	})
</script>