<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpan extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$this->load->view('simpan');
		
	}

}
