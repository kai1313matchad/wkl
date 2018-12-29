<?php
class Agency extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $data['view_file'] = "agency";
        $this->load->module('templates');
        $this->templates->market($data);  
    }


}