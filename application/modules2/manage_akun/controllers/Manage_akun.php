<?php
class Manage_akun extends MX_Controller {

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper(array('text', 'tgl_indo_helper'));
}

function update_pword() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if (!is_numeric($update_id)) {
        redirect('manage_akun/manage');
    } elseif ($submit == "Cancel") {
        redirect('manage_akun/create/'.$update_id);
    }
    
    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pword', 'Password', 'trim|required|min_length[7]|max_length[35]');
        $this->form_validation->set_rules('repeat_pword', 'Repeat Password', 'trim|required|matches[pword]');

        if ($this->form_validation->run() == TRUE) {
            $pword = $this->input->post('pword', TRUE);
            $this->load->module('site_security');
            $data['pword'] = $this->site_security->_hash_string($pword);

            $this->_update($update_id, $data);
            $flash_msg = "The account password was successfully updated.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('manage_akun/create/'.$update_id);
            
        }
    }

    $data['headline'] = "Update Akun Password";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "update_pword";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('manage_akun/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Telpon', 'trim|required|numeric|min_length[5]|max_length[13]');
        // $this->form_validation->set_rules('address', 'Alamat', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            // $data['item_url'] = url_title($data['item_title']);

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The account were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_akun/create/'.$update_id);
            } else {
                $data['date_made'] = date('Y-m-d H:i:s');
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The account was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_akun/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Akun";
    } else {
        $data['headline'] = "Update Akun";
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_akun";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_akun";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

    // echo "manage daftar";
}

function fetch_data_from_post() {
    $data['firstname'] = $this->input->post('firstname', true);
    $data['lastname'] = $this->input->post('lastname', true);
    $data['username'] = $this->input->post('username', true);
    $data['email'] = $this->input->post('email', true);
    $data['phone'] = $this->input->post('phone', true);
    // $data['address'] = $this->input->post('address', true);
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');
    $data['status'] = $this->input->post('status', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['firstname'] = $row->firstname;
        $data['lastname'] = $row->lastname;
        $data['username'] = $row->username;
        $data['email'] = $row->email;
        $data['pword'] = $row->pword;
        $data['phone'] = $row->phone;
        // $data['address'] = $row->address;
        $data['status'] = $row->status;
        $data['date_made'] = $row->date_made;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function delete($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit == "Cancel") {
        redirect('manage_akun/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The item image were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_akun/manage');
    }
}   

public function index()
{
    $this->load->view('hello');
}

function get($order_by)
{
    $this->load->model('mdl_manage_akun');
    $query = $this->mdl_manage_akun->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_akun');
    $query = $this->mdl_manage_akun->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_akun');
    $query = $this->mdl_manage_akun->get_where($id);
    return $query;
}

// function get_data_where($key) {
//     $this->load->model('mdl_manage_akun');
//     $query = $this->mdl_manage_akun->get_data_where($key);
//     return $query;
// }

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_manage_akun');
    $query = $this->mdl_manage_akun->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_manage_akun');
    $this->mdl_manage_akun->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_akun');
    $this->mdl_manage_akun->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_akun');
    $this->mdl_manage_akun->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_manage_akun');
    $count = $this->mdl_manage_akun->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_manage_akun');
    $max_id = $this->mdl_manage_akun->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_manage_akun');
    $query = $this->mdl_manage_akun->_custom_query($mysql_query);
    return $query;
}

function autogen() {
    $mysql_query = "show columns from accounts";
    $query = $this->_custom_query($mysql_query);
    foreach ($query->result() as $row) {
        $column_name = $row->Field;

        if ($column_name != "id") {
            echo '$data[\''.$column_name.'\'] = $this->input->post(\''.$column_name.'\', TRUE);<br>';
        }
    }

    echo "<br>";

    foreach ($query->result() as $row) {
        $column_name = $row->Field;

        if ($column_name != "id") {
            echo '$data[\''.$column_name.'\'] = $row->'.$column_name.';<br>';
        }
    }
}

}