<?php
class Store_penilaian extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->market($data);
    }



}