<?php
class Store_dashboard extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->model('Client');
}

public function index()
{
    $this->load->module('site_security');
    $this->load->module('manage_daftar');
    $this->load->module('activity');
    $this->load->module('notifications');

    $this->site_security->_make_sure_logged_in();
    
    // get user id
    $user_id = $this->site_security->_get_user_id();
    // get activity
    $data['activities'] = $this->activity->get_my_activity($user_id);
    // get notifikasi
    $data['notifications'] = $this->notifications->get_my_notification($user_id);
    $data['username'] = $this->manage_daftar->_get_customer_name($user_id);
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->market($data);
}

function notification() {
    $this->load->module('site_security');
    $this->load->module('notifications');
    $this->site_security->_make_sure_logged_in();

    // get user id
    $user_id = $this->site_security->_get_user_id();
    // get notifikasi
    $data['notifications'] = $this->notifications->get_my_notification($user_id);
    $data['view_file'] = "notification";
    $this->load->module('templates');
    $this->templates->market($data);
}

function _set_to_opened($update_id) {
    $this->load->module('notifications');
    $data['opened'] = 1;
    $this->notifications->_update($update_id, $data);
}

function view_notification($notif_id) {
    

    $this->_set_to_opened($notif_id);
}

function get($order_by)
{
    $this->load->model('mdl_store_dashboard');
    $query = $this->mdl_store_dashboard->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_dashboard');
    $query = $this->mdl_store_dashboard->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_dashboard');
    $query = $this->mdl_store_dashboard->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_store_dashboard');
    $query = $this->mdl_store_dashboard->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_store_dashboard');
    $this->mdl_store_dashboard->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_dashboard');
    $this->mdl_store_dashboard->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_dashboard');
    $this->mdl_store_dashboard->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_store_dashboard');
    $count = $this->mdl_store_dashboard->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_store_dashboard');
    $max_id = $this->mdl_store_dashboard->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_store_dashboard');
    $query = $this->mdl_store_dashboard->_custom_query($mysql_query);
    return $query;
}

}