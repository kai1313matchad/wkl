<?php
class Hometest extends MX_Controller 
{
  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('hometest');
  }
}