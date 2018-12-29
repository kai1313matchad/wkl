<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_callback extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
        $this->load->library('upload');
    }

    public function index()
	{
		$this->load->view('upload_call');
		
	}

	function multi() {
		if ($this->input->post('submit') && count($_FILES['multipleFiles']['name']) > 0) {
			// echo "<pre>";
			// print_r($_FILES);
			// echo "</pre>";

			$number_of_files = count($_FILES['multipleFiles']['name']);

			$id = 1;
			$files = $_FILES;
			$loca = array('./tes/1/', './tes/2/', './tes/3/'); //'./tes/';
			$column = array('SIUP', 'TDP', 'NPWP', 'Akte');

			
			for ($i=0; $i < $number_of_files ; $i++) {
				// $nama_baru = str_replace(' ', '_', $_FILES['multipleFiles']['name'][$i]);
        		$nmfile = date("ymdHis").'_'.$files['multipleFiles']['name'][$i];

				$_FILES['multipleFiles']['name'] = $files['multipleFiles']['name'][$i];
				$_FILES['multipleFiles']['type'] = $files['multipleFiles']['type'][$i];
				$_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
				$_FILES['multipleFiles']['error'] = $files['multipleFiles']['error'][$i];
				$_FILES['multipleFiles']['size'] = $files['multipleFiles']['size'][$i];

				$config['upload_path']   = $loca[$i];
			    $config['allowed_types'] = 'gif|jpg|png|jpeg';
			    $config['max_size'] = '0';
			    $config['max_size'] = '0';
			    $config['max_size'] = '0';
			    $config['overwrite'] = FALSE;
			    $config['remove_spaces'] = TRUE;
			    $config['file_name'] = $nmfile;

			    $this->upload->initialize($config);

			    if (!$this->upload->do_upload('multipleFiles')){
			        $error = array('error' => $this->upload->display_errors());
			    }   
			    else{
			        $data = array('upload_data' => $this->upload->data());
			    }   

			    // update database
			    $this->db->update('vendor', array( $column[$i] => $nmfile ), array('id' => $id));

			}

			echo "<ul>";
			for ($n=0; $n < $number_of_files; $n++) { 
				echo "<li>".$files['multipleFiles']['name'][$n]." - ".$nmfile."</li>";
			}
		    echo "</ul>";

		} else {}
		$this->load->view('upload_multi');
	}

	public function register(){
 		$this->load->library('form_validation');
 		$this->form_validation->set_rules('firstname', 'First Name', 'required|trim|xss_clean');
 		$this->form_validation->set_rules('city', 'City', 'required|trim|xss_clean');
 		$this->form_validation->set_rules('userimage', 'Profile Image', 'callback_image_upload'); 
 
 		if($this->form_validation->run() == TRUE){

     		echo "image file in here - how to get image file from validation callback_image_upload ?";
  
 		}
 		
 		$this->load->view('register'); 
	} 

	function image_upload(){
  		if($_FILES['userimage']['size'] != 0) {
    		$upload_dir = './tes/';

    		if (!is_dir($upload_dir)) {
         		mkdir($upload_dir);
    		}   

		    $config['upload_path']   = './tes/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg';
		    $config['file_name']     = 'userimage_'.substr(md5(rand()),0,7);
		    $config['overwrite']     = false;
		    $config['max_size']  = '5120';

    		$this->load->library('upload', $config);
		    if (!$this->upload->do_upload('userimage')){
		        $this->form_validation->set_message('image_upload', $this->upload->display_errors());
		        return false;
		    }   
		    else{
		        // $this->upload_data['file'] =  $this->upload->data();
		        return true;
		    }   
		}   
		else{
		    $this->form_validation->set_message('image_upload', "No file selected");
		    return false;
		} 
	}	

}
