<?php
class Log_activity extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

public function index()
{
    $this->load->view('hello');
}

function record($activity_name, $data) { //method untuk merekam aktivitas

    $toRecord = array();
    $toRecord['name'] = $activity_name;
    $toRecord['data'] = json_encode($data);
    $toRecord['created_at'] = time();

    $result = $this->_insert($toRecord); // simpan data ke tabel

    if(!$result):
        return false;
    endif;
    return $result;

   }

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_banner";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function fetch_data_from_post() {
    $data['name'] = $this->input->post('name', true);
    $data['data'] = $this->input->post('data', true);
    $data['created_at'] = time();
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['name'] = $row->name;
        $data['data'] = $row->data;
        $data['created_at'] = $row->created_at;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}


function get($order_by)
{
    $this->load->model('mdl_log_activity');
    $query = $this->mdl_log_activity->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_log_activity');
    $query = $this->mdl_log_activity->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_log_activity');
    $query = $this->mdl_log_activity->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_log_activity');
    $query = $this->mdl_log_activity->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_log_activity');
    $this->mdl_log_activity->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_log_activity');
    $this->mdl_log_activity->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_log_activity');
    $this->mdl_log_activity->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_log_activity');
    $count = $this->mdl_log_activity->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_log_activity');
    $max_id = $this->mdl_log_activity->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_log_activity');
    $query = $this->mdl_log_activity->_custom_query($mysql_query);
    return $query;
}

}