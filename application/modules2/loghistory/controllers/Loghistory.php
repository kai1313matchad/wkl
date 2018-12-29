<?php
class Loghistory extends MX_Controller 
{

    function __construct() {
        parent::__construct();
        $this->load->helper(array('text', 'tgl_indo_helper'));
    }

    function _draw_customer_inbox($customer_id) {
        $folder_type = "Inbox";
        $data['customer_id'] = $customer_id;
        $data['query'] = $this->_fetch_customer_enquiries($folder_type, $customer_id);
        $data['folder_type'] = ucfirst($folder_type);
        $data['flash'] = $this->session->flashdata('item');
        $this->load->view('customer_inbox', $data);
    }

    function fetch_data_from_post() {
        $data['subjek'] = $this->input->post('subjek');
        $data['sent_to'] = 'All'; // $this->input->post('id');
        $data['sent_by'] = 1; //$this->input->post('sent_by');
        $data['pesan'] = $this->input->post('pesan');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s'); 
        return $data;
    }

    function fetch_data_from_db($update_id) {
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['subjek'] = $row->subjek;
            $data['sent_to'] = $row->sent_to;
            $data['sent_by'] = $row->sent_by;
            $data['pesan'] = $row->pesan;
            $data['created_at'] = $row->created_at;
            $data['opened'] = $row->opened;
        }

        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

    function view() {
        $this->load->module('site_security');
        $this->load->module('manage_subscribe');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);

        // get id kontak
        $query = $this->get_where($update_id);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $kontak_id = $row->sent_to;
            }
        }

        $this->_set_to_opened($update_id);

        $data['update_id'] = $update_id;
        $folder_type = "inbox";
        $data['query2'] = $this->manage_subscribe->get_where($kontak_id);
        $data['query'] = $this->_fetch_enquiries_with_condition($update_id);
        $data['headline'] = "Detail Balasan - Enquirie ID ".$update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->admin($data);          
    }

    function _set_to_opened($update_id) {
        $data['opened'] = 1;
        $this->_update($update_id, $data);
    }

    function inbox() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $folder_type = "inbox";
        $data['query'] = $this->_fetch_enquiries($folder_type);
        $data['folder_type'] = ucfirst($folder_type);

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "view_loghistory";
        $this->load->module('templates');
        $this->templates->admin($data);  
    }

    function _fetch_enquiries_with_condition($condition) {
        $mysql_query = "
            SELECT loghistory.*,
            subscribe.id as contact_id,
            subscribe.email
            FROM loghistory LEFT JOIN subscribe ON loghistory.sent_to = subscribe.id
            WHERE loghistory.id='$condition'
            ORDER BY loghistory.created_at DESC
        ";
        $query = $this->_custom_query($mysql_query);
        return $query;
    }

    function _fetch_enquiries($folder_type) {
        $mysql_query = "
            SELECT loghistory.*,
            subscribe.id as contact_id,
            subscribe.email
            FROM loghistory LEFT JOIN subscribe ON loghistory.sent_by = subscribe.id
            -- WHERE loghistory.sent_to=0 
            ORDER BY loghistory.created_at DESC
        ";
        $query = $this->_custom_query($mysql_query);
        return $query;
    }

    function get($order_by)
    {
        $this->load->model('mdl_loghistory');
        $query = $this->mdl_loghistory->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) 
    {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_loghistory');
        $query = $this->mdl_loghistory->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_with_double_condition($col1, $value1, $col2, $value2) 
    {
        $this->load->model('mdl_loghistory');
        $query = $this->mdl_loghistory->get_with_double_condition($col1, $value1, $col2, $value2) ;
        return $query;
    }

    function get_where($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_loghistory');
        $query = $this->mdl_loghistory->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) 
    {
        $this->load->model('mdl_loghistory');
        $query = $this->mdl_loghistory->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_loghistory');
        $this->mdl_loghistory->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_loghistory');
        $this->mdl_loghistory->_update($id, $data);
    }

    function _delete($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_loghistory');
        $this->mdl_loghistory->_delete($id);
    }

    function count_where($column, $value) 
    {
        $this->load->model('mdl_loghistory');
        $count = $this->mdl_loghistory->count_where($column, $value);
        return $count;
    }

    function get_max() 
    {
        $this->load->model('mdl_loghistory');
        $max_id = $this->mdl_loghistory->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) 
    {
        $this->load->model('mdl_loghistory');
        $query = $this->mdl_loghistory->_custom_query($mysql_query);
        return $query;
    }

}