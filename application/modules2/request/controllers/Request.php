<?php
class Request extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->model(array('Client', 'Requests', 'Invoice', 'App'));
}

public function index()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $mysql_query = "SELECT * FROM request WHERE archived IS NULL AND deleted IS NULL ORDER BY id DESC";

    $data['query'] = $this->_custom_query($mysql_query);

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function archive() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $mysql_query = "SELECT * FROM request WHERE archived = 1 AND deleted IS NULL ORDER BY id DESC";

    $data['query'] = $this->_custom_query($mysql_query);

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "archive";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function file_upload($id_req) {
    if (!empty(($_FILES))) {
        $tempFile   = $_FILES['file']['tmp_name'];
        $fileName   = $_FILES['file']['name'];
        $fileType   = $_FILES['file']['type'];
        $fileSize   = $_FILES['file']['size'];
        $targetPath = './marketplace/requests/';
        $targetFile = $targetPath . $fileName;

        move_uploaded_file($tempFile, $targetFile);

        $data = array(
            'id_req' => $id_req,
            'nama_file' => $fileName,
            'tipe' => $fileType,
            'ukuran' => $fileSize

        );

        $this->db->insert('file_req', $data);
    }
}

function get_initial_name($username) {
    $alias = substr($username, 0, 1);
    return strtoupper($alias);
}

function addComment() {
    $user_id = $this->input->post('user_id');
    $req_id = $this->input->post('req_id');
    $comment_body = $this->input->post('comment');

    $data = array(
        'req_id' => $req_id,
        'user_id' => $user_id,
        'comment_body' => $comment_body,
        'created_at' => time()
    );

    if ($this->db->insert('comment', $data)) {
        return TRUE;
    }

}

function getComment() {
    $this->load->module('manage_daftar');
    $this->load->module('timedate');
    $req_id = $this->input->post('req_id');

    // get all comment by req id
    $this->db->where('req_id', $req_id);
    $this->db->order_by('id', 'asc');
    $query = $this->db->get('comment');

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            if ($row->user_id != 0) {
                $username = $this->manage_daftar->_get_customer_name($row->user_id);
                $alias = $this->get_initial_name($username);
                $message = 'm-messenger__message--in';
            } else {
                $message = 'm-messenger__message--out';
                $username = 'Admin';
            }

            $date = $this->timedate->get_nice_date($row->created_at, 'lengkap');
            
            echo "<div class='m-messenger__message ".$message."'>";
                if ($row->user_id != 0) {
                    echo "<div class='m-messenger__message-no-pic m--bg-fill-danger'>
                        <span>
                            ".$alias."
                        </span>
                    </div>";
                }
                    
              echo "<div class='m-messenger__message-body'>
                        <div class='m-messenger__message-arrow'></div>
                        <div class='m-messenger__message-content'>
                            <div class='m-messenger__message-username'>
                                ".$username." <span class='tanggal-komen'>".$date."</span>
                            </div>
                            <div class='m-messenger__message-text'>
                                ".$row->comment_body."
                            </div>
                        </div>
                    </div>
                </div>";

        }
    }
}

function delete() {
    $this->load->library('session');
    $request_id = $this->input->post('request');

    if (is_numeric($request_id)) {
        $data = array(
            'deleted' => 1
        );

        if($this->_update($request_id, $data)) {
            return TRUE;
        }

        $flash_msg = "The request were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('request/');

    }
}

function add_archive() {
    $this->load->library('session');
    $request_id = $this->input->post('request');

    if (is_numeric($request_id)) {
        $data = array(
            'archived' => 1
        );

        if($this->_update($request_id, $data)) {
            return TRUE;
        }

        $flash_msg = "The request were successfully archived.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('request/archive');

    }
}

function move_active() {
    $this->load->library('session');
    $request_id = $this->input->post('request');

    if (is_numeric($request_id)) {
        $data = array(
            'archived' => NULL
        );

        if($this->_update($request_id, $data)) {
            return TRUE;
        }

        $flash_msg = "The request were successfully active.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('request/');
    }
}

function status($request = NULL){
    $this->load->library('session');
    $this->load->module('site_security');
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        $data_req = $this->fetch_data_from_db($request);
        $current_status = $data_req['req_status']; // Ticket::view_by_id($ticket)->status;

        if($current_status == 2 && $status != 2){
            // $this->_notify_ticket_reopened($ticket);
        }

        $data = array('req_status' => $status);
        // Ticket::update_data('tickets',array('id' => $ticket),$data);
        $this->_update($request, $data);

        if ($status == 2 && $current_status != 2) {
            // Send email to ticket reporter
            // $this->_ticket_closed($request);
        }

        // Post to slack channel
        // if(config_item('slack_notification') == 'TRUE'){
        //     $this->load->helper('slack');
        //     $slack = new Slack_Post;
        //     $slack->slack_ticket_changed($ticket,$status,User::get_id());
        // }

        $data = array(
            'module' => 'requests',
            'module_field_id' => $request,
            'user' => $this->site_security->_get_user_id(), // User::get_id(),
            'activity' => 'activity_ticket_status_changed',
            'icon' => 'fa-ticket',
            'value1' => $data_req['assigned_to'],
            'value2' => ''
            );
        App::Log($data);

        $flash_msg = "The request were successfully change status.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('request/view/'.$request);
    }else{
        $this->index();
    }
}

function view($request_id = null) {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('manage_daftar');
    $this->site_security->_make_sure_is_admin();

    $data['id'] = $request_id;

    // invoice::evaluate_invoice($request_id);

    $data['update_id'] = $request_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "view";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function generate_request_code() {
    $query = $this->db->query('SELECT req_code, id FROM request WHERE id = (SELECT MAX(id))');

    if ($query->num_rows() > 0) {
        $row = $query->row();
        $ref_number = intval(substr($row->req_code, -4));
        $next_number = $ref_number + 1;
        if ($next_number < 1) {
            $next_number = 1;
        }
        $next_number = $this->ref_exists($next_number);

        return sprintf('%04d', $next_number);
    } else {
        return sprintf('%04d', 1);
    }
}

public function ref_exists($next_number)
{
    $next_number = sprintf('%04d', $next_number);
    $records = $this->db->where('req_code', $next_number)->get('request')->num_rows();
    if ($records > 0) {
        return $this->ref_exists($next_number + 1);
    } else {
        return $next_number;
    }
}

function add() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('manage_daftar');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('request');
    }

    if ($submit == "Submit") {

        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('req_code', 'Request Code', 'trim|required');
        $this->form_validation->set_rules('client', 'Klien', 'trim|required');
        $this->form_validation->set_rules('deadline', 'Deadline', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The request were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('request/add/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The request was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('request/view/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
        $data['deadline'] = $this->convert_date($data['deadline']);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['deadline'] = '';
        $data['headline'] = "Tambah Request";
    } else {
        $data['headline'] = "Update Request";
    }

    $data['clients'] = $this->manage_daftar->get('id');

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function convert_date($date) {
        $this->load->module('timedate');
        $result = $this->timedate->get_nice_date($date, 'indo');
        return $result; 
    }

function change_format_date($date) {
    $newDate = str_replace('/', '-', $date);
    $time = strtotime($newDate);
    return $time;
}

function fetch_data_from_post() {
    $data['req_code'] = $this->input->post('req_code', true);
    $data['client'] = $this->input->post('client', true);
    $data['req_title'] = $this->input->post('req_title', true);
    $data['priority'] = $this->input->post('priority', true);
    $data['req_status'] = $this->input->post('req_status', true);
    $data['progress'] = $this->input->post('progress', true);
    $data['assigned_to'] = $this->input->post('assigned_to', true);
    $data['start_date'] = time();
    $data['deadline'] = $this->change_format_date($this->input->post('deadline', true));
    $data['archived'] = $this->input->post('archived', true);
    $data['created_at'] = time();
    $data['est_hour'] = $this->input->post('est_hour', true);
    $data['verifying'] = $this->input->post('verifying', true);
    $data['req_desc'] = $this->input->post('req_desc', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['req_code'] = $row->req_code;
        $data['req_title'] = $row->req_title;
        $data['client'] = $row->client;
        $data['priority'] = $row->priority;
        $data['req_status'] = $row->req_status;
        $data['progress'] = $row->progress;
        $data['assigned_to'] = $row->assigned_to;
        $data['start_date'] = $row->start_date;
        $data['deadline'] = $row->deadline;
        $data['est_hour'] = $row->est_hour;
        $data['verifying'] = $row->verifying;
        $data['archived'] = $row->archived;
        $data['req_desc'] = $row->req_desc;
        $data['created_at'] = $row->created_at;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function get($order_by)
{
    $this->load->model('mdl_request');
    $query = $this->mdl_request->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_request');
    $query = $this->mdl_request->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_request');
    $query = $this->mdl_request->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_request');
    $query = $this->mdl_request->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_request');
    $this->mdl_request->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_request');
    $this->mdl_request->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_request');
    $this->mdl_request->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_request');
    $count = $this->mdl_request->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_request');
    $max_id = $this->mdl_request->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_request');
    $query = $this->mdl_request->_custom_query($mysql_query);
    return $query;
}

}