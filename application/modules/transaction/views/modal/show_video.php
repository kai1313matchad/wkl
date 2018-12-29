<?php
$this->load->module('store_orders');
$this->load->module('manage_materi');
$session_id = $param2;
// get order id
$order_id = $this->store_orders->get_id_from_session_id($session_id);
// get item id
$item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
// cek materi 
$query = $this->manage_materi->chosen_materi($order_id, $item_id);
if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
        $id_selected = $row->id;
    }
}
// get materi name
$data_materi = $this->manage_materi->fetch_data_from_db($id_selected);
$video_name = $data_materi['materi'];

?>

<link href="<?=base_url('assets/videojs/video-js.css');?>" rel="stylesheet">
<script src="<?=base_url('assets/videojs/video.js');?>"></script>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Materi Videotron</h4>
</div>
<div class="modal-body">
	
	<?php
	$path_vid = base_url().'marketplace/materi/video/'.$video_name;
	if ($video_name != "") { 
	?>

	<div class="row form-group">
        <div class="col-sms-12 col-sm-12">
        	<video id="video1" class="video-js vjs-default-skin" width="480" height="320" poster="http://www.tutorial-webdesign.com/wp-content/themes/nurumah/img/logo-bg.png"
	            data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
	            <source src="<?= $path_vid ?>" type="video/x-flv">
	            <source src="<?= $path_vid ?>" type='video/mp4'>
	        </video>
        </div>
        
    </div>

	<?php } else { ?>
		<h4>belum ada materi video</h4>
	<?php } ?>	
</div>