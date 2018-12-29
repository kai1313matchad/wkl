<?php
class Checkout extends MX_Controller 
{

function __construct() {
parent::__construct();
}

// untuk durasi 1-2 bulan
function _draw_checkout_type1() {
    $this->load->view('checkout_type1');
}

// untuk durasi 3-5 bulan
function _draw_checkout_type2() {
    $this->load->view('checkout_type2');
}

// untuk durasi 6-12 bulan
function _draw_checkout_type3() {
    $this->load->view('checkout_type3');
}

function _draw_cart_contents($query, $user_type) {

    $this->load->module('site_settings');
    $data['currency_symbol'] = $this->site_settings->_get_currency_symbol();

    $view_file = 'checkout_content';

    $data['query'] = $query;
    $this->load->view($view_file, $data);
}

public function index()
{
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "checkout";

    $third_bit = $this->uri->segment(3);
    if ($third_bit != '') {
        $session_id = $this->_check_and_get_session_id($third_bit);
    } else {
        $session_id = $this->session->session_id;    
    }

    $this->load->module('site_security');
    $shopper_id = $this->site_security->_get_user_id();

    if (!is_numeric($shopper_id)) {
        $shopper_id = 0;
    }

    $table = 'store_basket';
    $data['query'] = $this->_fetch_cart_contents($session_id, $shopper_id, $table);
    $data['num_rows'] = $data['query']->num_rows();
    $data['showing_statement'] = $this->_get_showing_statement($data['num_rows']);
    $this->load->module('templates');
    $this->templates->market($data);
}

    function _get_showing_statement($num_items) {
        if ($num_items == 1) {
            $showing_statement = "You have one item in your shopping basket";
        } else {
            $showing_statement = "You have ".$num_items." item in your shopping basket";
        }
        return $showing_statement;
    }

    function _fetch_cart_contents($session_id, $shopper_id, $table) {
        
        $this->load->module('store_basket');

        $mysql_query = "
            SELECT $table.*,
                store_item.*,
                store_item.id AS prod_id,
                $table.id AS basket_id
            FROM $table LEFT JOIN store_item ON $table.item_id = store_item.id    
        ";

        if ($shopper_id > 0) {
            $where_condition = "WHERE $table.shopper_id=$shopper_id";
        } else {
            $where_condition = "WHERE $table.session_id='$session_id'";
        }

        $mysql_query.=$where_condition;
        $query = $this->store_basket->_custom_query($mysql_query);
        return $query;
    }

    function _check_and_get_session_id($checkout_token) {
        $session_id = $this->_get_session_id_from_token($checkout_token);
        
        if ($session_id == '') {
            redirect(base_url());
        }

        $this->load->module('store_basket');
        $query = $this->store_basket->get_where_custom('session_id', $session_id);
        $num_rows = $query->num_rows();
        
        if ($num_rows < 1) {
            redirect(base_url());
        }

        return $session_id;
    }

    function _get_session_id_from_token($checkout_token) {
        $this->load->module('site_security');
       
        //remove dodge characters
        $session_id = str_replace('-plus-', '+', $checkout_token);
        $session_id = str_replace('-fwrd-', '/', $session_id);
        $session_id = str_replace('-eqls-', '=', $session_id);

        $session_id = $this->site_security->_decrypt_string($session_id);
        return $session_id;
    }

function get($order_by)
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_perfectcontroller');
    $count = $this->mdl_perfectcontroller->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_perfectcontroller');
    $max_id = $this->mdl_perfectcontroller->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
    return $query;
}

}