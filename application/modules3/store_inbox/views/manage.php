<?php
$create_msg_url = base_url()."store_inbox/create";
?>


<style type="text/css">
	#inbox-table td {
		text-align: center;
		vertical-align:middle;
	}

	#inbox-table thead th {
		font-size: 16px;
		font-weight: bold;
		text-align: center;
		vertical-align:middle;
	}
</style>


<div id="inbox" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-6">
            <h2>Pesan Masuk</h2>
        </div>
        
    </div>
    <div class="row image-box listing-style2 add-clearfix">
        
    	<!-- alert -->
        <?php 
        if (isset($flash)) {
            echo $flash;
        }
        ?>
        
            <div class="container2">
                <div class="row2">
                    <div class="col-md-12 well">
                        <a href="<?= $create_msg_url ?>" class="btn btn-primary pull-right"><i class="fa fa-fw -square -circle fa-plus-square"></i> Tulis Pesan</a>
                    </div>
                </div>
            </div>
       
            <div class="container2">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-striped" id="inbox-table">
                        	<thead>
                        		<tr>
                        			<th><i class="fa fa-eye"></i></th>
                        			<th>Subjek</th>
                        			<th><i class="soap-icon-clock"></i></th>
                        			<th>Pengirim</th>
                        			<th>Aksi</th>
                        		</tr>
                        	</thead>
                            <tbody>
                            	<?php 
							  	$this->load->module('site_settings');
							  	$this->load->module('timedate');
							  	$this->load->module('manage_daftar');
							  	$team_name = $this->site_settings->_get_support_team_name();

							  	foreach ($query->result() as $row) { 

							  		$view_url = base_url().'store_inbox/view/'.$row->code;

							  		$customer_data['username'] = $row->username;
							  		$customer_data['company'] = $row->company;

							  		$opened = $row->opened;

							  		if ($opened == 1) {
						  				$icon = '<i class="fa fa-2x fa-envelope" aria-hidden="true"></i>';
						  			} else {
						  				$icon = '<i class="fa fa-2x fa-envelope" aria-hidden="true" style="color: orange;"></i>';
						  			}

						  			$date_sent = $this->timedate->get_nice_date($row->date_created, 'lengkap');

						  			if ($row->sent_by == 0) {
						  				$sent_by = $team_name;		
						  			} else {
						  				$sent_by = $this->manage_daftar->_get_customer_name($row->sent_by, $customer_data);
						  			}	
							  	?>
                                <tr>
                                    <td>
                                        <?= $icon ?>
                                    </td>
                                    <td><h4><?= $row->subject ?></h4></td>
                                    <td>
                                        <h5>
                                            <b><?= $date_sent ?></b>
                                        </h5>
                                    </td>
                                    <td>
                                    	<img src="http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png" class="img-circle" width="30">
                                        <h4>
                                            <b><?= $sent_by ?></b>
                                        </h4>
                                    </td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-info btn-small sky-blue1" href="<?= $view_url ?>">
												<span class="fa fa-eye" aria-hidden="true"></span> Lihat 
											</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       

    </div>
</div>