<?php
class Store_cities extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper(array('text', 'tgl_indo_helper'));
}

function get_name_from_city_id($id) {
    $query = $this->get_where_custom('id_kab', $id);
    foreach ($query->result() as $row) {
        $name = $row->nama;
    }

    if (!isset($name)) {
        $name = 0;
    }

    return $name;
}

function get_city($id) {
    $tmp    = '';
    $data   = $this->get_where_custom('id_prov', $id);
    if(!empty($data)){
        $tmp .= "<option value=''>Pilih Kota / Kabupaten</option>"; 
        foreach($data->result() as $row) {    
            $tmp .= "<option value='".$row->id_kab."'>".$row->nama."</option>";
        }
    } else {
        $tmp .= "<option value=''>Pilih Kota / Kabupaten</option>"; 
    }
    die($tmp);
}

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_provinces');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('store_cities/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama Kota', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            // $data['item_url'] = url_title($data['item_title']);

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The city were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_cities/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The city was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_cities/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Kota/kabupaten";
    } else {
        $data['headline'] = "Update Kota/kabupaten";
    }

    $data['update_id'] = $update_id;
    $data['prov'] = $this->store_provinces->get('id_prov');
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "store_cities";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $mysql_query = "select kabupaten.*, provinsi.*, kabupaten.nama as kota, provinsi.id_prov as id_provinsi, provinsi.nama as provinsi from kabupaten left join provinsi on kabupaten.id_prov=provinsi.id_prov";
    $result = $this->_custom_query($mysql_query);

    $data['query'] = $result;

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "store_cities";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

    // echo "manage daftar";
}

function fetch_data_from_post() {
    $data['id_prov'] = $this->input->post('id_prov', true);
    $data['id_kab'] = $this->input->post('id_kab', true);
    $data['nama'] = $this->input->post('nama', true);
    $data['status'] = $this->input->post('status', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id_prov'] = $row->id_prov;
        $data['id_kab'] = $row->id_kab;
        $data['nama'] = $row->nama;
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
        redirect('store_cities/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The city were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('store_cities/manage');
    }
}


function get($order_by)
{
    $this->load->model('mdl_store_cities');
    $query = $this->mdl_store_cities->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_cities');
    $query = $this->mdl_store_cities->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_cities');
    $query = $this->mdl_store_cities->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_store_cities');
    $query = $this->mdl_store_cities->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_store_cities');
    $this->mdl_store_cities->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_cities');
    $this->mdl_store_cities->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_cities');
    $this->mdl_store_cities->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_store_cities');
    $count = $this->mdl_store_cities->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_store_cities');
    $max_id = $this->mdl_store_cities->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_store_cities');
    $query = $this->mdl_store_cities->_custom_query($mysql_query);
    return $query;
}

}