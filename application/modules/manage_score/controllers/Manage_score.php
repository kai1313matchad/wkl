<?php
class Manage_score extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

function tukar() {
    $this->load->module('manage_daftar');
    $this->load->module('manage_poin');

    $user_id = $this->input->post('user_id');
    $poin = $this->input->post('poin');
    $koin = $this->input->post('koin');

    // update coin di table kliens
    $this->manage_daftar->_update($user_id, array('coin' => $koin));

    // update poin di table points
    // get id poin
    $poin_id = $this->get_id_from_userId($user_id);    
    $this->manage_poin->_update($poin_id, array('points' => $poin));
}

function get_old_score($order_id, $user_id, $month) {
    $col1 = 'order_id';
    $value1 = $order_id;
    $col2 = 'user_id';
    $value2 = $user_id;
    $col3 = 'bulan';
    $value3 = $month;
    $query = $this->get_with_triple_condition($col1, $value1, $col2, $value2, $col3, $value3);

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $visual = $row->visual;
            $penerangan = $row->penerangan;
            $view = $row->view;
            $report = $row->report;
            $konstruksi = $row->konstruksi;
            $maintenance = $row->maintenance;
        }

        $total = $visual + $penerangan + $view + $report + $konstruksi + $maintenance;
    } else {
        $total = 0;
    }

    return $total;
}

// function get_total_score($user_id) {
//     $col = 'user_id';
//     $value = $user_id;
//     $cek = $this->get_where_custom($col, $value);    

//     if ($cek->num_rows() > 0) {
//         $mysql_query = "SELECT SUM(visual) AS vis,
//                     SUM(penerangan) AS pen,
//                     SUM(view) AS vie,
//                     SUM(report) AS rep,
//                     SUM(konstruksi) AS kon,
//                     SUM(maintenance) AS mai FROM scores WHERE user_id = $user_id";

//         $query = $this->_custom_query($mysql_query);

//         if ($query->num_rows() > 0) {
//             foreach ($query->result() as $row) {
//                 $visual = $row->vis;
//                 $penerangan = $row->pen;
//                 $view = $row->vie;
//                 $report = $row->rep;
//                 $konstruksi = $row->kon;
//                 $maintenance = $row->mai;
//             }

//             $total = $visual + $penerangan + $view + $report + $konstruksi + $maintenance;
//         }

//         return $total;
//     }
// }

function check_availability2($order_id, $user_id, $month) {
    $col1 = 'order_id';
    $value1 = $order_id;
    $col2 = 'user_id';
    $value2 = $user_id;
    $col3 = 'bulan';
    $value3 = $month;
    $cek = $this->get_with_triple_condition($col1, $value1, $col2, $value2, $col3, $value3);

    if ($cek->num_rows() > 0) {
        $result = 'TRUE';
    } else {
        $result = 'FALSE';
    }

    return $result;
}

function check_availability($order_id, $user_id) {
    $col1 = 'order_id';
    $value1 = $order_id;
    $col2 = 'user_id';
    $value2 = $user_id;
    $cek = $this->get_with_double_condition($col1, $value1, $col2, $value2);

    if ($cek->num_rows() > 0) {
        $result = 'TRUE';
    } else {
        $result = 'FALSE';
    }

    return $result;
}

function get_score2($order_id, $user_id, $month) {
    $col1 = 'order_id';
    $value1 = $order_id;
    $col2 = 'user_id';
    $value2 = $user_id;
    $col3 = 'bulan';
    $value3 = $month;
    $query = $this->get_with_triple_condition($col1, $value1, $col2, $value2, $col3, $value3);

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $visual = $row->visual;
            $penerangan = $row->penerangan;
            $view = $row->view;
            $report = $row->report;
            $konstruksi = $row->konstruksi;
            $maintenance = $row->maintenance;
        }

        $total = $visual + $penerangan + $view + $report + $konstruksi + $maintenance;
    }

    return $total;
}

function get_score($order_id, $user_id, $month) {
    $col1 = 'order_id';
    $value1 = $order_id;
    $col2 = 'user_id';
    $value2 = $user_id;
    $query = $this->get_with_double_condition($col1, $value1, $col2, $value2);

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $visual = $row->visual;
            $penerangan = $row->penerangan;
            $view = $row->view;
            $report = $row->report;
            $konstruksi = $row->konstruksi;
            $maintenance = $row->maintenance;
        }

        $total = $visual + $penerangan + $view + $report + $konstruksi + $maintenance;
    }

    return $total;
}

function get_id2($order_id, $user_id, $month) {
    $col1 = 'order_id';
    $value1 = $order_id;
    $col2 = 'user_id';
    $col3 = 'bulan';
    $value3 = $month;
    $query = $this->get_with_triple_condition($col1, $value1, $col2, $value2, $col3, $value3);

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $id_score = $row->id;
        }
    }

    return $id_score;
}

function get_id($order_id, $user_id) {
    $col1 = 'order_id';
    $value1 = $order_id;
    $col2 = 'user_id';
    $value2 = $user_id;
    $query = $this->get_with_double_condition($col1, $value1, $col2, $value2);

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $id_score = $row->id;
        }
    }

    return $id_score;
}

function get($order_by)
{
    $this->load->model('mdl_score');
    $query = $this->mdl_score->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_score');
    $query = $this->mdl_score->get_with_limit($limit, $offset, $order_by);
    return $query;
}


function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_score');
    $query = $this->mdl_score->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function get_with_triple_condition($col1, $value1, $col2, $value2, $col3, $value3) 
{
    $this->load->model('mdl_score');
    $query = $this->mdl_score->get_with_triple_condition($col1, $value1, $col2, $value2, $col3, $value3) ;
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_score');
    $query = $this->mdl_score->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_score');
    $query = $this->mdl_score->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_score');
    $this->mdl_score->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_score');
    $this->mdl_score->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_score');
    $this->mdl_score->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_score');
    $count = $this->mdl_score->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_score');
    $max_id = $this->mdl_score->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_score');
    $query = $this->mdl_score->_custom_query($mysql_query);
    return $query;
}

}