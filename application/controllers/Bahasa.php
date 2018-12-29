<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bahasa extends MX_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->library('session');
	}

	public function index() {
		$lang =  $this->session->userdata('lang') == null ? 'english' : $this->session->userdata('lang');
		$this->lang->load('homepage', $lang);
		$this->load->view('multi_bahasa');		
	}

	function change($type) {
		$this->load->library('session');

		$this->session->set_userdata('lang', $type);

		redirect('bahasa','refresh');
	}

	function page2() {
		$lang =  $this->session->userdata('lang') == null ? 'english' : $this->session->userdata('lang');
		$this->lang->load('homepage', $lang);
		$this->load->view('page2');
	}

}