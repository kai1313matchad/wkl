<?php
class Activity extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function index()
{
    $this->load->view('hello');
}

function get_my_activity($user_id) {
    $col = 'user';
    $val = $user_id;
    $query = $this->get_where_custom($col, $val);
    return $query;
}

function get($order_by)
{
    $this->load->model('mdl_activity');
    $query = $this->mdl_activity->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_activity');
    $query = $this->mdl_activity->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_activity');
    $query = $this->mdl_activity->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_activity');
    $query = $this->mdl_activity->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_activity');
    $this->mdl_activity->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_activity');
    $this->mdl_activity->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_activity');
    $this->mdl_activity->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_activity');
    $count = $this->mdl_activity->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_activity');
    $max_id = $this->mdl_activity->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_activity');
    $query = $this->mdl_activity->_custom_query($mysql_query);
    return $query;
}

}