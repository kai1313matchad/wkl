<?php
class Monitoring extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

public function logout_user() {
    $this->load->library('user_agent');
    // $this->load->model('mdl_monitoring');
    // $result = $this->mdl_monitoring->logout_user();
    // return $result;
    $this->db->delete('ci_sessions', array('id' => $this->input->post('id')));
    return true;        
}

function getData() {
    $this->load->module('site_settings');

    $data = array(
            'id',
            'ip_address',
            'timestamp',
            'data'
        );
    $this->db->select($data);
    $query = $this->db->get("ci_sessions");
    
    $no = 1;
    foreach($query->result() as $row){
        $session_data = $row->data;
        $return_data = array();
        $offset = 0;
        while ($offset < strlen($session_data)) {
            if (!strstr(substr($session_data, $offset), "|")) {
                throw new Exception("invalid data, remaining: " . 
                substr($session_data, $offset));
            }
            $pos = strpos($session_data, "|", $offset);
            $num = $pos - $offset;
            $varname = substr($session_data, $offset, $num);
            $offset += $num + 1;
            $data = unserialize(substr($session_data, $offset));
            $return_data[$varname] = $data;
            $offset += strlen(serialize($data));
        }

        $data_persil[] = array(
            "No" => $no++,
            "Tanggal" => date("d-m-Y H:i:s", $return_data['__ci_last_regenerate']),
            "Nama" => $return_data['namapengguna'],
            "IP Address" => $row->ip_address,
            "Browser" => $return_data['browser'],
            "Platform" => $return_data['platform'],
            "Aksi" => "
                <span style='overflow: visible; width: 110px;''>                                             
                <a href='#' onclick='hapus_dokumen(\"".$row->id."\")' class='m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill' title='Delete' data-toggle='modal' data-target=''>                           
                    <i class='la la-trash'></i>                     
                </a>    
                </span>
            "
        );
    }
    echo json_encode($data_persil);
} 

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data = array(
        'id',
        'ip_address',
        'timestamp',
        'data'
    );
    $this->db->select($data);
    
    $data['users'] = $this->db->get("ci_sessions");
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "monitor";
    $this->load->module('templates');
    $this->templates->admin($data);

}

public function index()
    {
        $this->load->view('monitor');
    }

function get($order_by)
{
    $this->load->model('mdl_monitoring');
    $query = $this->mdl_monitoring->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_monitoring');
    $query = $this->mdl_monitoring->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_monitoring');
    $query = $this->mdl_monitoring->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_monitoring');
    $query = $this->mdl_monitoring->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_monitoring');
    $this->mdl_monitoring->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_monitoring');
    $this->mdl_monitoring->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_monitoring');
    $this->mdl_monitoring->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_monitoring');
    $count = $this->mdl_monitoring->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_monitoring');
    $max_id = $this->mdl_monitoring->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_monitoring');
    $query = $this->mdl_monitoring->_custom_query($mysql_query);
    return $query;
}

}