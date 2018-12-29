<?php
class Review extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function index()
{
    $this->load->view('hello');
}

function create_star($rating) {
    $output = ''; 
    $rate = $rating;
    for ($i = 0; $i < $rate ; $i++) { 
        // $output += '<i class="fa fa-star" tyle="color: gold;"></i>';
        // echo "bintang penuh";
        echo '<i class="fa fa-star" style="color: gold;"></i>';
    }
    // fill empty

    for ($i = (5 - $rate); $i >= 1 ; $i--) { 
        // $output += '<i class="fa fa-star-o" tyle="color: black;"></i>';
        // echo "bintang kosong";
        echo '<i class="fa fa-star-o" style="color: black;"></i>';
    }

    // return $output;
}

function delete($update_id) {
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit == "Cancel") {
        redirect('review/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The review were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('review/manage');
    }
}

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('review/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The review were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('review/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The review was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('review/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }



    if (!is_numeric($update_id)) {
        $data['judul'] = "Tambah Review";
    } else {
        $data['judul'] = "Update / Edit Review";
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->load->helper('text');
    $this->site_security->_make_sure_is_admin();

    $mysql_query = "SELECT * FROM reviews ORDER BY rev_id DESC";

    $data['query'] = $this->_custom_query($mysql_query); // $this->get('rev_id');

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function create_review() {
    $this->load->module('site_security');

    $user_id = $this->input->post('user', true);
    $prod_id = $this->input->post('produk', true);
    $headline = $this->input->post('headline', true);
    $ulasan = $this->input->post('ulasan', true);
    $rating = $this->input->post('rating', true);
    $token = $this->site_security->generate_random_string(6);

    $data = array(
        'user_id' => $user_id,
        'prod_id' => $prod_id,
        'headline' => $headline,
        'body' => $ulasan,
        'rating' => $rating,
        'token' => $token,
        'date' => time(),
        'status' => 0 
    );

    if ($this->_insert($data)) {
        $results['stat'] = 'OK';
        $results['flash_msg'] = "The review was successfully added.";
        echo json_encode($results);
    } else {
        $results['stat'] = 'FAIL';
        $results['flash_msg'] = "The review was failed added.";
        echo json_encode($results);
    }

}

function fetch_data_from_post() {
    $this->load->module('site_security');
    $data['user_id'] = $this->input->post('user', true);
    $data['prod_id'] = $this->input->post('produk', true);
    $data['headline'] = $this->input->post('headline', true);
    $data['body'] = $this->input->post('ulasan', true);
    $data['rating'] = $this->input->post('rating', true);
    $data['token'] = $this->site_security->generate_random_string(6);
    $data['date'] = time();
    $data['status'] = $this->input->post('status', true);
   
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['rev_id'] = $row->rev_id;
        $data['user_id'] = $row->user_id;
        $data['prod_id'] = $row->prod_id;
        $data['headline'] = $row->headline;
        $data['body'] = $row->body;
        $data['rating'] = $row->rating;
        $data['token'] = $row->token;
        $data['date'] = $row->date;
        $data['status'] = $row->status;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function get($order_by)
{
    $this->load->model('mdl_review');
    $query = $this->mdl_review->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_review');
    $query = $this->mdl_review->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_review');
    $query = $this->mdl_review->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_review');
    $query = $this->mdl_review->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_review');
    $this->mdl_review->_insert($data);

    return TRUE;
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_review');
    $this->mdl_review->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_review');
    $this->mdl_review->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_review');
    $count = $this->mdl_review->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_review');
    $max_id = $this->mdl_review->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_review');
    $query = $this->mdl_review->_custom_query($mysql_query);
    return $query;
}

}