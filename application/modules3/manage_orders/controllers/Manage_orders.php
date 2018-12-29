<?php
class Manage_orders extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

public function index()
{
    $this->load->view('hello');
}

function get($order_by)
{
    $this->load->model('mdl_manage_orders');
    $query = $this->mdl_manage_orders->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_orders');
    $query = $this->mdl_manage_orders->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_orders');
    $query = $this->mdl_manage_orders->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_manage_orders');
    $query = $this->mdl_manage_orders->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_manage_orders');
    $this->mdl_manage_orders->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_orders');
    $this->mdl_manage_orders->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_orders');
    $this->mdl_manage_orders->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_manage_orders');
    $count = $this->mdl_manage_orders->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_manage_orders');
    $max_id = $this->mdl_manage_orders->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_manage_orders');
    $query = $this->mdl_manage_orders->_custom_query($mysql_query);
    return $query;
}

}