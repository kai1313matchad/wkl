<?php
class Store_inbox extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function index() {
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "hello";
    $this->load->module('templates');
    $this->templates->market($data);
}

function _draw_customer_inbox($customer_id)
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $this->load->module('enquiries');

    $folder_type = "Inbox";
    $data['customer_id'] = $customer_id;
    $data['query'] = $this->enquiries->_fetch_customer_enquiries($folder_type, $customer_id);
    $data['folder_type'] = ucfirst($folder_type);
    $data['flash'] = $this->session->flashdata('item');
    $this->load->view('manage', $data);
}

    function view() {
        $this->load->module('enquiries');
        $this->load->module('site_security');
        $this->load->module('timedate');
        $this->site_security->_make_sure_logged_in();

        $code = $this->uri->segment(3);
        $col1 = 'sent_to';
        $value1 = $this->site_security->_get_user_id();
        $col2 = 'code';
        $value2 = $code;
        $query = $this->enquiries->get_with_double_condition($col1, $value1, $col2, $value2);
        $num_rows = $query->num_rows();
        if ($num_rows < 1) {
            redirect('site_security/not_allowed');
        }

        foreach ($query->result() as $row) {
            $update_id = $row->id;
            $data['subject'] = $row->subject;
            $data['message'] = nl2br($row->message);
            $data['sent_to'] = $row->sent_to;
            $data['sent_by'] = $row->sent_by;
            $date_created = $row->date_created;
            $data['opened'] = $row->opened;
        }

        $data['code'] = $code;
        $data['date_created'] = $this->timedate->get_nice_date($date_created, 'lengkap');
        $this->enquiries->_set_to_opened($update_id);

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->market($data);          
    }

    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('enquiries');
        $this->load->module('timedate');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_logged_in();
        
        $submit = $this->input->post('submit', TRUE);
        $data = $this->fetch_data_from_post();
        $customer_id = $this->site_security->_get_user_id();
        $code = $this->uri->segment(3);

        if ($submit == "Cancel") {
            redirect('store_inbox');
        }


        if ($submit == "Submit") {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[250]');
            $this->form_validation->set_rules('message', 'Messsage', 'required');
            // $this->form_validation->set_rules('sent_to', 'Recipient', 'required');
         
            if ($this->form_validation->run() == TRUE) {
                //convert datepicker into unix timestamp

                if ((!is_numeric($customer_id)) OR ($customer_id == 0)) {
                    $token = $this->input->post('token', TRUE);
                    $customer_id = $this->manage_daftar->_get_customer_id_from_token($token);
                    $not_logged_in = TRUE;
                }

                $data['date_created'] = time();
                $data['sent_by'] = $customer_id;
                $data['sent_to'] = 0;
                $data['opened'] = 0;
                $data['code'] = $this->site_security->generate_random_string(6);
                if ($data['urgent'] != 1) {
                    $data['urgent'] = 0;
                }

                if ($customer_id > 0) {
                    $this->enquiries->_insert($data);
                   
                    $flash_msg = "The message was successfully sent.";
                    $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);     
                }

                if (isset($not_logged_in)) {
                    $target_url = base_url().'store_inbox/messagesent';
                } else {
                    $target_url = base_url().'store_inbox';
                }

                redirect($target_url);  
            
            } 
        } 
        elseif ($code != "") {
            $data = $this->enquiries->_attempt_get_data_from_code($customer_id, $code);
            $data['message'] = "<br><br>-----------------------------------------------<br>".$data['message'];
        }       

        $this->site_security->_make_sure_logged_in();
        if ($code == "") {
            $data['headline'] = "Compose New Message";
        } else {
            $data['headline'] = "Reply To Message";
        }
        
        $data['message'] = $this->_format_msg($data['message']);
        $data['code'] = $code;
        $data['token'] = $this->manage_daftar->_generate_token($customer_id);
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->market($data);
    }

     function messagesent() {
        $data['headline'] = "Message Sent";
        $data['view_file'] = "message_sent";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function _format_msg($msg) {
        $replace = '

        ';
        $msg = str_replace('<br>', $replace, $msg);
        $msg = strip_tags($msg);

        return $msg;
    }

    function fetch_data_from_post() {
        $data['subject'] = $this->input->post('subject');
        $data['urgent'] = $this->input->post('urgent');
        $data['message'] = $this->input->post('message');
        return $data;
    }


}