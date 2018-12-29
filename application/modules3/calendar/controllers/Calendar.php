<?php
class Calendar extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function getData() {
    $events = array(
        array(
            'id' => '1',
            'title' => 'event1',
            'start' => '2018-09-10',
            'end' => '2018-09-11',
            'color' => '#FF5B33'
        ),
        array(
            'id' => '2',
            'title' => 'event2',
            'start' => '2018-09-10',
            'end' => '2018-09-11',
            'color' => '#DDDDDD'
        ),
    );
    echo json_encode($events);
}

function get($order_by)
{
    $this->load->model('mdl_calendar');
    $query = $this->mdl_calendar->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_calendar');
    $query = $this->mdl_calendar->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_calendar');
    $query = $this->mdl_calendar->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_calendar');
    $query = $this->mdl_calendar->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_calendar');
    $this->mdl_calendar->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_calendar');
    $this->mdl_calendar->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_calendar');
    $this->mdl_calendar->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_calendar');
    $count = $this->mdl_calendar->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_calendar');
    $max_id = $this->mdl_calendar->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_calendar');
    $query = $this->mdl_calendar->_custom_query($mysql_query);
    return $query;
}

}