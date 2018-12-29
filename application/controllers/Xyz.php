<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xyz extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		// $this->load->view('welcome_message');
        $this->generate_random_string();
	}

	function generate_random_string($length = '') {
        $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $length = 6;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        echo $randomString;
    }
}
