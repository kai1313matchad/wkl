<?php
class Store_login extends MX_Controller 
{

function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
    }

    function index() {
        $data['view_file'] = "signin"; // "pendaftaran";
        $this->load->module('templates');
        $this->templates->pendaftaran($data);
    }

    function submit_login() {
        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Submit") {
            
            $this->form_validation->set_rules('username', ' Username', 'required|min_length[5]|max_length[60]|callback_username_check');
            $this->form_validation->set_rules('pword', 'Password', 'required|min_length[5]|max_length[35]');

            if ($this->form_validation->run() == TRUE) {
                $this->_in_you_go();   
                // echo "well done";
            } else {
                echo validation_errors();
            }
        }

    }

     function _in_you_go() {
        $this->session->set_userdata('is_user', 1);
        
        redirect('store_profile');
    }

    function logout() {
        unset($_SESSION['is_user']);
        redirect('store_login');
    }

    function username_check($str) {

        $this->load->module('site_security');
        $pword = $this->input->post('pword', TRUE);
        $error_msg = "You did not enter a correct username or password.";

        $result = $this->site_security->_check_user_login_details($str, $pword);

        if ($result == FALSE) {
           $this->form_validation->set_message('username_check', $error_msg);
           return FALSE;
        } else {
            return TRUE;
        }

        
    }

}