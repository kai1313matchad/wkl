<?php
class Owner extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $data['view_file'] = "owner";
        $this->load->module('templates');
        $this->templates->market($data);  
    }


}