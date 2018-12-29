<?php
class Calendar extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->model(array('App'));
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

function test2() {
    $data = [["event1","2018-09-20","lorem ipsum dolor sit amet","2018-09-23","m-fc-event--danger m-fc-event--solid-warning"],["event2","2018-09-10","lorem ipsum dolor sit amet","2018-09-13","m-fc-event--danger m-fc-event--solid-warning"]];
}

function test() {
    
    $query = $this->db->get('events');
    $events = array();
    
    foreach ($query->result() as $row) {
        $events[] = array(
                'title' => $row->title,
                'start' => $row->start,
                'description' => $row->description,
                'end' => $row->end,
                'className' => $row->className
        );

        // $events['title'] = $row->title;
        // $events['start'] = $row->start;
        // $events['description'] = $row->description;
        // $events['end'] = $row->end;
        // $events['className'] = $row->className;

        // echo json_encode($events);

    }
    
    echo json_encode($events);
}

function getData() {
    // $mysql_query = "SELECT * FROM events ORDER BY id DESC";
    // $query = $this->_custom_query($mysql_query);
    $query = $this->db->get('events');
    $events = array();
    foreach ($query->result() as $row) {
        $events[] = array(
                'title' => $row->title,
                'start' => $row->start,
                'description' => $row->description,
                'end' => $row->end,
                'className' => $row->className
        );
    }

    // $events = array(
    //     array(
    //         'title'=> 'All Day Event',
    //         'start'=> '2018-09-10',
    //         'description'=> 'Lorem ipsum dolor sit incid idunt ut',
    //         'className'=> "m-fc-event--danger m-fc-event--solid-warning"  
    //     ),
    //     array(
    //         'title'=> 'Reporting',
    //         'start'=> '2018-09-14',
    //         'description'=> 'Lorem ipsum dolor incid idunt ut labore',
    //         'end'=> '2018-09-18',
    //         'className'=> "m-fc-event--accent"
    //     ),
    //     array(
    //         'title'=> 'Company Trip',
    //         'start'=> '2018-09-16',
    //         'description'=> 'Lorem ipsum dolor sit tempor incid',
    //         'end'=> '2018-09-20',
    //         'className'=> "m-fc-event--primary"
    //     ),
        
    // );
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