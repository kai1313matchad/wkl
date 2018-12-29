<?php
class Price_based_duration extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function check_product_in($prod_id) {
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $col = 'prod_id';
    $value = $prod_id;
    $query = $this->get_where_custom($col, $value);

    if ($query->num_rows() > 0) {
        $result = 'TRUE';
    } else {
        $result = 'FALSE';
    }

    return $result;
}

function fetch_data($prod_id) {
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $col = 'prod_id';
    $value = $prod_id;
    $query = $this->get_where_custom($col, $value);

    $data_arr = array();
    $size = 12;
    foreach ($query->result_array() as $row) {
        for ($i=1; $i < 13 ; $i++) { 
            array_push($data_arr, $row[$i.'_month']);
        }
    }

    $result = array_chunk($data_arr, $size);
    return $result;

}

function fetch_price_data($prod_id) {

    $col = 'prod_id';
    $value = $prod_id;
    $query = $this->get_where_custom($col, $value);

    $data_arr = array();
    $size = 12;
    foreach ($query->result_array() as $row) {
        for ($i=1; $i < 13 ; $i++) { 
            array_push($data_arr, $row[$i.'_month']);
        }
    }

    $result = array_chunk($data_arr, $size);
    return $result;

}

function arr_price($prod_id) {
    $result = $this->fetch_price_data($prod_id);
    if ($result != null) {
        return $result[0];
    } else {
        echo 'null';
    }
}

function update_data() {
    $this->load->model('mdl_based_duration');

    $id = $this->input->post("id");
    $value = $this->input->post("value");
    $modul = $this->input->post("modul");
    $this->mdl_based_duration->update_price($id, $value, $modul);
    // echo "{}";
}

function create() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $prod_id = $this->input->post('prod_id');
    $data = array(
        'prod_id' => $prod_id,
        'created_at' => time()
    );

    $this->_insert($data);

    // echo json_encode(array("id" => $this->mdl_based_duration->create()));
}

public function index()
    {
        $this->load->view('hello');
    }

function get($order_by)
{
    $this->load->model('mdl_based_duration');
    $query = $this->mdl_based_duration->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_based_duration');
    $query = $this->mdl_based_duration->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_based_duration');
    $query = $this->mdl_based_duration->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_based_duration');
    $query = $this->mdl_based_duration->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_based_duration');
    $this->mdl_based_duration->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_based_duration');
    $this->mdl_based_duration->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_based_duration');
    $this->mdl_based_duration->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_based_duration');
    $count = $this->mdl_based_duration->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_based_duration');
    $max_id = $this->mdl_based_duration->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_based_duration');
    $query = $this->mdl_based_duration->_custom_query($mysql_query);
    return $query;
}

}