<?php
class Store_testimoni extends MX_Controller 
{

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'user_agent'));
        $this->form_validation->CI=& $this;
        $this->load->helper(array('text', 'tgl_indo_helper'));
        $this->load->model('Client');
    }

    public function index()
    {
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();
        $this->load->library('session');
        $user_id = $this->session->userdata('user_id');
        $data['username'] = Client::view_by_id($user_id)->username;
        $data['email'] = Client::view_by_id($user_id)->email;
        $data['company'] = Client::view_by_id($user_id)->company;
        $data['view_file'] = "manage";
        $data['flash'] = $this->session->flashdata('item');
        $data['headline'] = '';
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function submit_testimoni() {
        $this->load->module('manage_testimoni');
        $this->load->library('session');

        $submit = $this->input->post('submit');

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            //$this->form_validation->set_rules('profil', 'Profil', 'trim|required');
            $this->form_validation->set_rules('testimoni', 'Testimoni', 'trim|required|min_length[5]');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->manage_testimoni->fetch_data_from_post();

                $this->manage_testimoni->_insert($data);

                $flash_msg = "The testimoni was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade2 show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_testimoni');
                
            } else {
                $flash_msg = "The testimoni was failed added.";
                $value = '<div class="alert alert-danger alert-dismissible fade2 show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                // redirect('store_testimoni');
                $this->store_testimoni();
            }
        }
    }

}