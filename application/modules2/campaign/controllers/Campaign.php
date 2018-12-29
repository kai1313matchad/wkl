<?php
class Campaign extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->model('App');
}

public function index()
{
    $this->load->library('session');
    $this->load->helper('tgl_indo');
    $this->load->module('site_security');
    $this->load->module('store_basket');

    $this->site_security->_make_sure_logged_in();

    $user_id = $this->session->userdata('user_id');
    $col = 'shopper_id';
    $val = $user_id;
    $data['campaign'] = $this->store_basket->get_where_custom($col, $val);

    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->market($data);
}

function selling() {
    $this->load->library('session');
    $this->load->helper('tgl_indo');
    $this->load->module('site_security');
    $this->load->module('store_basket');

    $this->site_security->_make_sure_logged_in();

    $user_id = $this->session->userdata('user_id');
    $col = 'shop_id';
    $val = $user_id;
    $data['campaign'] = $this->store_basket->get_where_custom($col, $val);

    $data['view_file'] = "selling";
    $this->load->module('templates');
    $this->templates->market($data);
}

function get_request() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();
    
    $data['view_file'] = "request";
    $this->load->module('templates');
    $this->templates->market($data);
}

function get($order_by)
{
    $this->load->model('mdl_campaign');
    $query = $this->mdl_campaign->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_campaign');
    $query = $this->mdl_campaign->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_campaign');
    $query = $this->mdl_campaign->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_campaign');
    $query = $this->mdl_campaign->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_campaign');
    $this->mdl_campaign->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_campaign');
    $this->mdl_campaign->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_campaign');
    $this->mdl_campaign->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_campaign');
    $count = $this->mdl_campaign->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_campaign');
    $max_id = $this->mdl_campaign->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_campaign');
    $query = $this->mdl_campaign->_custom_query($mysql_query);
    return $query;
}

}