<?php
class Slideshow extends MX_Controller 
{

    var $path_big = './marketplace/banner/';
    var $path_small = './marketplace/banner/2080x646/';
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
        $this->load->helper(array('text', 'tgl_indo_helper'));
    }

    function draw_slideshow() {
        $mysql_query = "SELECT * FROM slideshow WHERE status = 1 ORDER BY id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
        $this->load->view('slideshow', $data);
    }

    function do_upload($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
 
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('slideshow/create/'.$update_id);
        }

        $nama_baru = str_replace(' ', '_', $_FILES['userfile']['name']);
                
        $nmfile = date("ymdHis").'_'.$nama_baru;

        $config['upload_path']          = $this->path_big; //'./LandingPageFiles/big_pics/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['file_name']            = $nmfile;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
            $data['headline'] = "Upload error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "slideshow";
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
        else
        {
    
            $data = array('upload_data' => $this->upload->data());

            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];

            // create thumb
            $this->_compress_image($file_name);

            //update database
            $update_data['big_pic'] = $nmfile;
            $this->_update($update_id, $update_data);

            $flash_msg = "The image were successfully uploaded.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            $data['headline'] = "Upload Success";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "slideshow";
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }

    function _compress_image($file_name) {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->path_big.$file_name;
        $config['new_image'] = $this->path_small.$file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width']         = 1350;
        $config['height']       = 550;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    function delete_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['big_pic'];

        $big_pic_path = $this->path_big.$big_pic; //'./LandingPageFiles/big_pics/'.$big_pic;
        $thumb_path = $this->path_small.$big_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
            unlink($thumb_path);
        } 

        unset($data);
        $data['big_pic'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The galery image were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('slideshow/create/'.$update_id);
    } 

    function upload_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "slideshow";
        $data['view_file'] = "upload_image";
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
        redirect('slideshow/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            // $data['item_url'] = url_title($data['item_title']);

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The slideshow were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('slideshow/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The slideshow was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('slideshow/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
        $data['big_pic'] = "";
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Slideshow";
    } else {
        $data['headline'] = "Update Slideshow";
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "slideshow";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "slideshow";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

    // echo "manage daftar";
}

function fetch_data_from_post() {
    $data['judul'] = $this->input->post('judul', true);
    $data['created_at'] = time();
    $data['updated_at'] = time();
    $data['status'] = $this->input->post('status', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['judul'] = $row->judul;
        $data['big_pic'] = $row->big_pic;
        $data['status'] = $row->status;
        $data['updated_at'] = $row->updated_at;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function _process_delete($update_id){
    $data = $this->fetch_data_from_db($update_id);
    $big_pic = $data['big_pic'];
    $small_pic = $data['big_pic'];

    $big_pic_path = $this->path_big.$big_pic;
    $small_pic_path = $this->path_small.$small_pic;

    if (file_exists($big_pic_path)) {
        unlink($big_pic_path);
    } 

    if (file_exists($small_pic_path)) {
        unlink($small_pic_path);
    } 
    
    unset($data);
    $data['big_pic'] = "";
    $this->_update($update_id, $data);
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
        redirect('slideshow/create/'.$update_id);
    } elseif ($submit == "Delete") {
        $this->_process_delete($update_id);
        // delete the item record from db
        $this->_delete($update_id);
        

        $flash_msg = "The slideshow were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('slideshow/manage');
    }
}


function get($order_by)
{
    $this->load->model('mdl_slideshow');
    $query = $this->mdl_slideshow->get($order_by);
    return $query;
}

function get_where_with_limit($col, $value, $limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_slideshow');
    $query = $this->mdl_slideshow->get_where_with_limit($col, $value, $limit, $offset, $order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_slideshow');
    $query = $this->mdl_slideshow->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_slideshow');
    $query = $this->mdl_slideshow->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_slideshow');
    $query = $this->mdl_slideshow->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_slideshow');
    $this->mdl_slideshow->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_slideshow');
    $this->mdl_slideshow->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_slideshow');
    $this->mdl_slideshow->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_slideshow');
    $count = $this->mdl_slideshow->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_slideshow');
    $max_id = $this->mdl_slideshow->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_slideshow');
    $query = $this->mdl_slideshow->_custom_query($mysql_query);
    return $query;
}

}