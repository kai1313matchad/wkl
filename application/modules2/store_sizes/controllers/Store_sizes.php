<?php
class Store_sizes extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper(array('text', 'tgl_indo_helper'));
}

function get_name_from_size_id($id) {
    $query = $this->get_where_custom('id', $id);
    foreach ($query->result() as $row) {
        $name = $row->size;
    }

    if (!isset($name)) {
        $name = 0;
    }

    return $name;
}

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('store_sizes/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('size', 'Ukuran', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            // $data['item_url'] = url_title($data['item_title']);

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The size were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_sizes/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The size was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_sizes/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Kategori Ukuran";
    } else {
        $data['headline'] = "Update Kategori Ukuran";
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "store_sizes";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "store_sizes";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

    // echo "manage daftar";
}

function fetch_data_from_post() {
    $data['size'] = $this->input->post('size', true);
    $data['status'] = $this->input->post('status', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['size'] = $row->size;
        $data['status'] = $row->status;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}


function delete($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit == "Cancel") {
        redirect('store_sizes/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The road were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('store_sizes/manage');
    }
}

function get($order_by)
{
    $this->load->model('mdl_store_sizes');
    $query = $this->mdl_store_sizes->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_sizes');
    $query = $this->mdl_store_sizes->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_sizes');
    $query = $this->mdl_store_sizes->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_store_sizes');
    $query = $this->mdl_store_sizes->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_store_sizes');
    $this->mdl_store_sizes->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_sizes');
    $this->mdl_store_sizes->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_sizes');
    $this->mdl_store_sizes->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_store_sizes');
    $count = $this->mdl_store_sizes->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_store_sizes');
    $max_id = $this->mdl_store_sizes->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_store_sizes');
    $query = $this->mdl_store_sizes->_custom_query($mysql_query);
    return $query;
}

}