<?php
class Report_maintenance extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper(array('text', 'tgl_indo_helper'));
}

// function fetch_data_from_post() {
//     $data['prod_id'] = $this->input->post('prod_id', true);
//     $data['desc'] = $this->input->post('desc', true);
//     return $data;
// }

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['prod_id'] = $row->prod_id;
        $data['image'] = $row->image;
        $data['type'] = $row->type;
        $data['token'] = $row->token;
        $data['created_at'] = $row->created_at;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function get_id_from_token($token) {
    $query = $this->get_where_custom('token', $token);
    foreach ($query->result() as $row) {
        $id = $row->id;
    }

    if (!isset($id)) {
        $id = 0;
    }

    return $id;
}

function delete($update_id, $token)
{
    if (!isset($update_id)) {
        redirect('site_security/not_user_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('manage_product');
    $this->site_security->_make_sure_logged_in();

    $id = $this->get_id_from_token($token);

    $data = $this->fetch_data_from_db($id);

    $loc = $this->manage_product->location($data['type']);

    $pic = $data['image'];

    $big_pic_path = base_url().$loc.$pic;
    $small_pic_path = base_url().$loc.'300x160/'.$pic;

    if (file_exists($big_pic_path)) {
        unlink($big_pic_path);
    } 

    if (file_exists($small_pic_path)) {
        unlink($small_pic_path);
    } 

    // delete the item record from db
    $this->_delete($id);

    $flash_msg = "The report were successfully deleted.";
    $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
    $this->session->set_flashdata('item', $value);

    redirect('store_product/maintenance/'.$update_id);    
}


function get($order_by)
{
    $this->load->model('mdl_report_maintenance');
    $query = $this->mdl_report_maintenance->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_report_maintenance');
    $query = $this->mdl_report_maintenance->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_report_maintenance');
    $query = $this->mdl_report_maintenance->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_report_maintenance');
    $query = $this->mdl_report_maintenance->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_report_maintenance');
    $this->mdl_report_maintenance->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_report_maintenance');
    $this->mdl_report_maintenance->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_report_maintenance');
    $this->mdl_report_maintenance->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_report_maintenance');
    $count = $this->mdl_report_maintenance->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_report_maintenance');
    $max_id = $this->mdl_report_maintenance->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_report_maintenance');
    $query = $this->mdl_report_maintenance->_custom_query($mysql_query);
    return $query;
}

}