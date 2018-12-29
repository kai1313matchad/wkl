<?php
class Dvilsf extends MX_Controller 
{

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'user_agent'));
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

                $this->load->module('site_security');

                $username = $this->input->post('username', TRUE); 
                $pword = $this->input->post('pword', TRUE);
                $result = $this->site_security->_check_admin_login_details($username, $pword);

                if ($result == TRUE) {

                    if ($this->agent->is_browser()) {
                        $agent = $this->agent->browser().' '.$this->agent->version();
                    }
                    elseif ($this->agent->is_robot()) {
                        $agent = $this->agent->robot();
                    }
                    elseif ($this->agent->is_mobile()) {
                        $agent = $this->agent->mobile();
                    }
                    else {
                        $agent = 'Unidentified User Agent';
                    }
                    
                    $this->load->module('manage_akun');
                    $id = $this->manage_akun->get_id_from_username($username);
                    $level = $this->manage_akun->get_level_from_id($id);
                    $akun_data = array('last_login' => time());
                    $this->manage_akun->_update($id, $akun_data);

                    $sess = array(
                        'namapengguna' =>$username,
                        'platform' => $this->agent->platform(),
                        'browser' => $agent,
                        'user_admin' => $username,
                        'admin_id' => $id,
                        'level' => $level
                    );

                    $this->session->set_userdata($sess);
                }

                $this->_in_you_go();   

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