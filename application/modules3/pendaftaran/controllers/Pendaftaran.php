<?php
class Pendaftaran extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
}

public function index()
{
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_daftar";
    $data['view_file'] = "signup"; // "pendaftaran";
    $this->load->module('templates');
    $this->templates->pendaftaran($data);
}

function fetch_data_from_post() {
    $data['nama'] = $this->input->post('nama', true);
    $data['email'] = $this->input->post('email', true);
    $data['no_telp'] = $this->input->post('no_telp', true);
    // $data['alamat'] = $this->input->post('alamat', true);
    $data['waktu_dibuat'] = date('Y-m-d H:i:s');
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');
    $data['status'] = 1; //$this->input->post('status', true);
    $pword = $this->input->post('pword', TRUE);
    $this->load->module('site_security');
    $data['pword'] = $this->site_security->_hash_string($pword);
    return $data;
}

function entry_daftar() {
    $this->load->library('session');
    $submit = $this->input->post('submit');

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_telp', 'Telpon', 'trim|required|numeric|min_length[5]|max_length[13]');
        $this->form_validation->set_rules('pword', 'Password', 'trim|required|min_length[7]|max_length[35]');
        $this->form_validation->set_rules('repeat_pword', 'Repeat Password', 'trim|required|matches[pword]');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            $this->_insert($data);

            $flash_msg = "Data anda telah ditambahkan!.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            // redirect('pendaftaran/index');
            $this->_in_you_go();
            
        } else {
            $flash_msg = "Ada kesalahan dalam menginput data, silahkan mendaftar kembali!.";
            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            // redirect('pendaftaran/index');
        }
    }

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_daftar";
    $data['view_file'] = "pendaftaran";
    $this->load->module('templates');
    $this->templates->pendaftaran($data);
}





function _in_you_go() {
    // $this->session->set_userdata('is_admin', 1);
    
    redirect('store_profile');
}

function get($order_by)
{
    $this->load->model('mdl_pendaftaran');
    $query = $this->mdl_pendaftaran->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_pendaftaran');
    $query = $this->mdl_pendaftaran->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_pendaftaran');
    $query = $this->mdl_pendaftaran->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_pendaftaran');
    $query = $this->mdl_pendaftaran->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_pendaftaran');
    $this->mdl_pendaftaran->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_pendaftaran');
    $this->mdl_pendaftaran->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_pendaftaran');
    $this->mdl_pendaftaran->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_pendaftaran');
    $count = $this->mdl_pendaftaran->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_pendaftaran');
    $max_id = $this->mdl_pendaftaran->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_pendaftaran');
    $query = $this->mdl_pendaftaran->_custom_query($mysql_query);
    return $query;
}

}