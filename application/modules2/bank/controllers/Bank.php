<?php
class Bank extends MX_Controller 
{
    var $path_big = './marketplace/bank/big_pics/';
    var $path_small = './marketplace/bank/small_pics/';
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
    }

    function get_nama_and_rek($id_bank) {
        $data = $this->fetch_data_from_db($id_bank);

        return $data['title'].' #'.$data['rekening'].' a/n '.$data['anam'];
    }

    function _generate_thumbnail($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->path_big.$file_name; 
        $config['new_image'] = $this->path_small.$file_name; 
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 200;
        $config['height']       = 200;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    function do_upload($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('bank/create/'.$update_id);
        }

        $nama_baru = str_replace(' ', '_', $_FILES['userfile']['name']);       
        $nmfile = date("ymdHis").'_'.$nama_baru;

        $config['upload_path']          = $this->path_big;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
            $data['headline'] = "Upload error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
        else
        {
    
            $data = array('upload_data' => $this->upload->data());

            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $this->_generate_thumbnail($file_name);

            //update database
            $update_data['image'] = $file_name;
            $this->_update($update_id, $update_data);

            $flash_msg = "The image were successfully uploaded.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            $data['headline'] = "Upload Success";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "bank";
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }

    function delete_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $image = $data['image'];

        $big_pic_path = $this->path_big.$image; //'./LandingPageFiles/big_pics/'.$big_pic;
        $small_pic_path = $this->path_small.$image; //'./LandingPageFiles/small_pics/'.$small_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        unset($data);
        $data['image'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The bank image were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('bank/create/'.$update_id);
    } 

    function upload_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('bank/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Nama bank', 'trim|required');
        $this->form_validation->set_rules('rekening', 'Rekening', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            // $data['item_url'] = url_title($data['item_title']);

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The bank were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('bank/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The bank was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('bank/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
        $data['image'] = "";
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Bank";
    } else {
        $data['headline'] = "Update Bank";
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);
}

    function get_nama_bank($id) {
        $no_bank = 'no bank';
        if ($id != '') {
            $data = $this->fetch_data_from_db($id);
            $bank = $data['title'];
            return $bank;
        } else {
            return $no_bank;
        }
    }

    function fetch_data_from_post() {
        $data['order_id'] = $this->input->post('order_id', true);
        $data['title'] = $this->input->post('title', true);
        $data['rekening'] = $this->input->post('rekening', true);
        $data['anam'] = $this->input->post('anam', true);
        $data['image'] = $this->input->post('image', true);
        $data['status'] = $this->input->post('status', true);
        $data['created_at'] = time();
        return $data;
    }

    function fetch_data_from_db($updated_id) {
        $query = $this->get_where($updated_id);
        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['title'] = $row->title;
            $data['rekening'] = $row->rekening;
            $data['anam'] = $row->anam;
            $data['image'] = $row->image;
            $data['created_at'] = $row->created_at;
            $data['status'] = $row->status;
        }
            
        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

    function get($order_by)
    {
        $this->load->model('mdl_bank');
        $query = $this->mdl_bank->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) 
    {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_bank');
        $query = $this->mdl_bank->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_bank');
        $query = $this->mdl_bank->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) 
    {
        $this->load->model('mdl_bank');
        $query = $this->mdl_bank->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_bank');
        $this->mdl_bank->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_bank');
        $this->mdl_bank->_update($id, $data);
    }

    function _delete($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_bank');
        $this->mdl_bank->_delete($id);
    }

    function count_where($column, $value) 
    {
        $this->load->model('mdl_bank');
        $count = $this->mdl_bank->count_where($column, $value);
        return $count;
    }

    function get_max() 
    {
        $this->load->model('mdl_bank');
        $max_id = $this->mdl_bank->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) 
    {
        $this->load->model('mdl_bank');
        $query = $this->mdl_bank->_custom_query($mysql_query);
        return $query;
    }

}