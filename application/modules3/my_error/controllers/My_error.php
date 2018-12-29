<?php
class My_error extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->output->set_status_header('404'); 
        $this->load->view('err404');
    }



}