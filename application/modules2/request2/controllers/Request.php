<?php
class Request extends MX_Controller 
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
    $this->load->model('mdl_request');
    $query = $this->mdl_request->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_request');
    $query = $this->mdl_request->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_request');
    $query = $this->mdl_request->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_request');
    $query = $this->mdl_request->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_request');
    $this->mdl_request->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_request');
    $this->mdl_request->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_request');
    $this->mdl_request->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_request');
    $count = $this->mdl_request->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_request');
    $max_id = $this->mdl_request->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_request');
    $query = $this->mdl_request->_custom_query($mysql_query);
    return $query;
}

}