<?php
class Store_wishlist extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
}

function count_own_wishlist($user_id) {
    $this->load->module('site_security');
    // $this->site_security->_make_sure_logged_in();
    
    $mysql_query = "SELECT store_item.*, store_item.id AS item_id, store_item.user_id AS item_user, wishlist.*, wishlist.id AS wishlist_id, wishlist.user_id AS wishlist_user FROM wishlist LEFT JOIN store_item ON wishlist.prod_id = store_item.id  WHERE wishlist.user_id = $user_id AND store_item.deleted <> '1'";
    $query = $this->_custom_query($mysql_query);
    $count = $query->num_rows();

    return $count;
}

function fix() {
    $this->load->module('site_security');
    $query = $this->get('id');
    foreach ($query->result() as $row) {
        $data['token'] = $this->site_security->generate_random_string(6);
        $this->_update($row->id, $data);
    }
    echo "selesai";
}

public function index()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $user_id = $this->session->userdata('user_id');
    $mysql_query = "SELECT store_item.*, provinsi.*, kabupaten.*, store_categories.*, store_roads.*, store_labels.*, wishlist.*, store_item.id AS id_produk, store_item.status AS stat_prod, provinsi.nama AS provinsi, kabupaten.nama AS kabupaten, wishlist.user_id AS user, wishlist.id AS wish_id FROM store_item LEFT JOIN provinsi ON store_item.cat_prov=provinsi.id_prov LEFT JOIN kabupaten ON store_item.cat_city=kabupaten.id_kab LEFT JOIN store_categories ON store_item.cat_prod=store_categories.id LEFT JOIN store_roads ON store_item.cat_road=store_roads.id LEFT JOIN store_labels ON store_item.cat_stat=store_labels.id LEFT JOIN wishlist ON store_item.id=wishlist.prod_id WHERE wishlist.user_id = '$user_id' ORDER BY store_item.id DESC";

    $data['flash'] = $this->session->flashdata('item');
    $data['query'] = $this->_custom_query($mysql_query);
    $data['view_file'] = "manage"; // "pendaftaran";
    $this->load->module('templates');
    $this->templates->market($data);
}

function _get_id_from_token($token) {
    $query = $this->get_where_custom('token', $token);
    foreach ($query->result() as $row) {
        $id = $row->id;
    }

    if (!is_numeric($id)) {
        $id = 0;
    }

    return $id;
}

function delete($token) {
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $id = $this->_get_id_from_token($token);

    if ($this->_delete($id)) {
        $flash_msg = "The wishlist were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_wishlist');
    } else {
        $flash_msg = "The wishlist were failed deleted.";
        $value = '<div class="alert alert-notice alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_wishlist');
    }
    
}

function get($order_by)
{
    $this->load->model('mdl_store_wishlist');
    $query = $this->mdl_store_wishlist->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_wishlist');
    $query = $this->mdl_store_wishlist->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_wishlist');
    $query = $this->mdl_store_wishlist->get_where($id);
    return $query;
}

function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_store_wishlist');
    $query = $this->mdl_store_wishlist->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_store_wishlist');
    $query = $this->mdl_store_wishlist->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_store_wishlist');
    $this->mdl_store_wishlist->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_wishlist');
    $this->mdl_store_wishlist->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_wishlist');
    $this->mdl_store_wishlist->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_store_wishlist');
    $count = $this->mdl_store_wishlist->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_store_wishlist');
    $max_id = $this->mdl_store_wishlist->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_store_wishlist');
    $query = $this->mdl_store_wishlist->_custom_query($mysql_query);
    return $query;
}

}