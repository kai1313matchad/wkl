<?php
class Manage_poin extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

function get_point($user_id) {
    if (!is_numeric($user_id)) {
        die('Non-numeric variable!');
    }

    $query = $this->get_where_custom('user_id', $user_id);
    foreach ($query->result() as $row) {
        $point = $row->points;
    }

    if (!is_numeric($point)) {
        $point = 0;
    }

    return $point;
}

public function index()
{
    $this->load->view('hello');
}

function date_precision() {
    date_default_timezone_set('Asia/Jakarta');
    
    $now = date("d-m");
    $day = '01-01';
    // perbandingan

    if ($day == $now) {
        echo "tgl sama";

        // get id from table points
        $mysql_query = "SELECT id FROM points";
        $query = $this->_custom_query($mysql_query);
        foreach ($query->result() as $row) {
            $data[] = $row->id;
        }

        // proses pengurangan
        $this->substr_process($data);
    } else {
        echo "tgl berbeda";
    }

    echo "pengurangan poin berhasil";
}

function substr_process($arr_id) {
    // $size = sizeof($arr_id);
    // for ($i=0; $i < $size; $i++) { 
    //     // echo $arr_id[$i].'<br>';
    //     $this->_substr($arr_id[$i]);
    // }
    if (is_array($arr_id)) {
        foreach ($arr_id as $id) {
            // echo $id.'<br>';
            $this->_substr($id);
        }
    }
}

function _substr($id) {
    // get point
    $data = $this->fetch_data_from_db($id);
    $points = $data['points'];

    if ($points > 100) {
        // update poin dengan mengurangi 100
        $this->_update($id, array('points' => $points - 100));
    } else {
        $this->_update($id, array('points' => NULL));
    }

    return TRUE;
}

function get_total_score($user_id) {
    $col = 'user_id';
    $value = $user_id;
    $cek = $this->get_where_custom($col, $value);    

    if ($cek->num_rows() > 0) {
        // get poin
        $point = $this->db->where('user_id', $user_id)->get('points')->row()->points;
    }

    if (isset($point)) {
        if ($point >= 10) {
            $poin = $point;
        } else {
            $poin = 0;
        }
    } else {
        $poin = 0;
    }
    
    return $poin;
}

function get_id_from_userId($user_id) {
    $col = 'user_id';
    $value = $user_id;
    $query = $this->get_where_custom($col, $value);

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            return $row->id;
        } 
    }
}

function update_poin($user_id, $old_poin = 0, $new_poin) {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    // cek available data
    if ($this->check_availability($user_id) == 'TRUE') {
        // get id
        $id_points = $this->db->where('user_id', $user_id)->get('points')->row()->id;
        // get poin
        $point = $this->db->where('user_id', $user_id)->get('points')->row()->points;

        // proses pengurangan poin
        $this->substract_poin($id_points, $user_id, $point, $old_poin);

        // current poin
        $curr_point = $this->db->where('id', $id_points)->get('points')->row()->points;

        // proses penambahan poin
        $this->add_poin($id_points, $user_id, $curr_point, $new_poin);
    }
}

function substract_poin($id, $user_id, $point, $old_poin) {
    $curr_point = $point - $old_poin;

    $this->_update($id, 
        array(
            'user_id' => $user_id,
            'points' => $curr_point,
            'modified' => time()
        )
    );

    return TRUE;
}

function add_poin($id, $user_id, $curr_point, $new_poin) {
    $now_point = $curr_point + $new_poin;

    $this->_update($id, 
        array(
            'user_id' => $user_id,
            'points' => $now_point,
            'modified' => time()
        )
    );
    return TRUE;
}

function check_availability($user_id) {
    $col = 'user_id';
    $value = $user_id;
    $cek = $this->get_where_custom($col, $value);

    if ($cek->num_rows() > 0) {
        $result = 'TRUE';
    } else {
        $result = 'FALSE';
    }

    return $result;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['user_id'] = $row->user_id;
        $data['points'] = $row->points;
        $data['created'] = $row->created;
        $data['modified'] = $row->modified;
        $data['status'] = $row->status;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function get($order_by)
{
    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_poin');
    $this->mdl_poin->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_poin');
    $this->mdl_poin->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_poin');
    $this->mdl_poin->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_poin');
    $count = $this->mdl_poin->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_poin');
    $max_id = $this->mdl_poin->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->_custom_query($mysql_query);
    return $query;
}

}