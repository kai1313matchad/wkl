<?php
class Task_order extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function index()
{
    $this->load->view('hello');
}

function set_task_done() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit');
    $update_id = $this->input->post('task_order_id');
    $data_task = $this->fetch_data_from_db($update_id);
    $order_id =  $data_task['order_id'];

    if ($submit == "Submit") {
        $data = array(
            'status' => 'Done'
        );

        $this->_update($update_id, $data);

        $flash_msg = "The status task order was change to done.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_orders/task/'.$order_id);
    }
}

function set_task_undone() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit');
    $update_id = $this->input->post('task_order_id');
    $data_task = $this->fetch_data_from_db($update_id);
    $order_id =  $data_task['order_id'];

    if ($submit == "Undone") {
        $data = array(
            'status' => 'Undone'
        );

        $this->_update($update_id, $data);

        $flash_msg = "The status task order was change to undone.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_orders/task/'.$order_id);
    }
}

function add() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit');
    $update_id = $this->input->post('order_id');

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('order_id', 'ID Order', 'trim|required|numeric');
        $this->form_validation->set_rules('user_id', 'Email', 'trim|required|numeric');
        $this->form_validation->set_rules('task_id', 'Subjek', 'trim|required|numeric');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();
            $this->_insert($data);

            $flash_msg = "The task order was successfully added.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_orders/task/'.$update_id);
        } else {
            $flash_msg = "The task order was failed added.";
            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_orders/task/'.$update_id);
        }
    }
}

function delete() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $submit = $this->input->post('submit', TRUE);

    if ($submit == 'Delete') {


        $update_id = $this->input->post('task_order_id', true);
        // get order id

        $data = $this->fetch_data_from_db($update_id);
        $order_id = $data['order_id'];
        $this->_delete($update_id);

        $flash_msg = "Data successfully delete.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_orders/task/'.$order_id); 
    }
}

function fetch_data_from_post() {
    $data['order_id'] = $this->input->post('order_id', true);
    $data['user_id'] = $this->input->post('user_id', true);
    $data['task_id'] = $this->input->post('task_id', true);
    $data['date_made'] = time();
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['order_id'] = $row->order_id;
        $data['user_id'] = $row->user_id;
        $data['task_id'] = $row->task_id;
        $data['status'] = $row->status;
        $data['date_made'] = $row->date_made;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function get($order_by)
{
    $this->load->model('mdl_task_order');
    $query = $this->mdl_task_order->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_task_order');
    $query = $this->mdl_task_order->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_task_order');
    $query = $this->mdl_task_order->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_task_order');
    $query = $this->mdl_task_order->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_task_order');
    $this->mdl_task_order->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_task_order');
    $this->mdl_task_order->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_task_order');
    $this->mdl_task_order->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_task_order');
    $count = $this->mdl_task_order->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_task_order');
    $max_id = $this->mdl_task_order->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_task_order');
    $query = $this->mdl_task_order->_custom_query($mysql_query);
    return $query;
}

}