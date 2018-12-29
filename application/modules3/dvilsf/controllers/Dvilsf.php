<?php
class Dvilsf extends MX_Controller 
{

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
    }

    function index() {
        $this->load->library('session');

        $data['flash'] = $this->session->flashdata('item');
        $data['username'] = $this->input->post('username', TRUE);
        $this->load->module('templates');
        $this->templates->login($data);
    }

    function submit_login() {
        $this->load->library('session');
        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Submit") {
            
            $this->form_validation->set_rules('username', ' Username', 'required|min_length[5]|max_length[60]|callback_username_check');
            $this->form_validation->set_rules('pword', 'Password', 'required|min_length[5]|max_length[35]');

            if ($this->form_validation->run() == TRUE) {
                $this->_in_you_go();   
                // echo "well done";
            } else {
                $flash_msg = "You did not enter a correct username or password.";
                $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('dvilsf');
                // echo validation_errors();
            }
        }

    }

     function _in_you_go() {
        $this->session->set_userdata('is_admin', 1);
        
        redirect('dashboard/home');
    }

    function logout() {
        unset($_SESSION['is_admin']);
        redirect('dvilsf');
    }

    function username_check($str) {

        $this->load->module('site_security');
        $pword = $this->input->post('pword', TRUE);
        $error_msg = "You did not enter a correct username or password.";

        $result = $this->site_security->_check_admin_login_details($str, $pword);

        if ($result == FALSE) {
           $this->form_validation->set_message('username_check', $error_msg);
           return FALSE;
        } else {
            return TRUE;
        }

        // return TRUE;

        
    }


}