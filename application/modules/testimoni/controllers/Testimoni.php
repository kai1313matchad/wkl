<?php
class Testimoni extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    public function index()
    {   
        $this->load->library('session');
        $this->load->module('manage_testimoni');
        $mysql_query = "SELECT * FROM testimoni WHERE status = 1 ORDER BY id DESC LIMIT 6";
        $data['testimoni'] = $this->manage_testimoni->_custom_query($mysql_query);

        $this->load->library('session');
        $data['view_file'] = "testi";
        $data['flash'] = $this->session->flashdata('item');
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
            $this->form_validation->set_rules('profil', 'Profil', 'trim|required');
            $this->form_validation->set_rules('testimoni', 'Testimoni', 'trim|required|min_length[5]');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->manage_testimoni->fetch_data_from_post();

                $this->manage_testimoni->_insert($data);

                $flash_msg = "The testimoni was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade2 show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('testimoni');
                
            } else {
                $flash_msg = "The testimoni was failed added.";
                $value = '<div class="alert alert-danger alert-dismissible fade2 show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('testimoni');
            }
        }
    }
}