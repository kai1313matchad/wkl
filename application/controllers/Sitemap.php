<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends MX_Controller {
	
	function __construct() {
        parent::__construct();
	}

	public function index()
    {
        $this->load->database();
        $query = $this->db->get("store_item");
        $data['items'] = $query->result();

        $this->load->view('sitemap', $data);
    }

}