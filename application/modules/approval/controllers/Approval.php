<?php
class Approval extends MX_Controller 
{

function __construct() {
parent::__construct();
}

public function index()
{
    $this->load->view('hello');
}

    function auto_generate_no() {

    }

    function send_approval($order_id) {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $order_id;
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Cancel") {
            redirect('store_orders/manage');
        }

        if ($submit == "Submit") {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('order_id', 'ID Order', 'trim|required');

            if ($this->form_validation->run() == TRUE) {

                $nama_baru = str_replace(' ', '_', $_FILES['featured_image']['name']);
                
                $nmfile = date("ymdHis").'_'.$nama_baru;
                $loc = './marketplace/approval/';

                $config['upload_path']   = $loc;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '0';
                $config['max_size'] = '0';
                $config['max_size'] = '0';
                $config['overwrite'] = FALSE;
                $config['remove_spaces'] = TRUE;
                $config['file_name'] = $nmfile;

                $this->load->library('upload');
                $this->upload->initialize($config);

                // jika ada file yg di upload
                if ($_FILES['featured_image']['name'] != '') {
                    if($_FILES['featured_image']['name'])
                    {
                        if ($this->upload->do_upload('featured_image'))
                        {
                            // compress image
                            // $this->_compress_image($nmfile);

                            $data = array(
                                'approval_no' => url_title($this->input->post('module', true)),
                                'description' => $this->input->post('module_field_id', true),
                                'order_id' => $this->input->post('notify_title', true),
                                'notification_date' =>  date('Y-m-d H:i:s'),
                                'featured_image' => $nmfile,
                                'icon' => $this->input->post('icon', true),
                                'value1' => $this->input->post('value1', true),
                                'value2' => $this->input->post('value2', true)
                            );

                            if (is_numeric($update_id)) {
                                $data_old = $this->fetch_data_from_db($update_id);

                                $featured_image = $data_old['featured_image'];

                                // hapus gambar
                                $this->hapus_gambar($featured_image);

                                $this->_update($update_id, $data);

                                $flash_msg = "The notification were successfully updated.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('store_orders/manage/');

                            } else {
                                $this->_insert($data);
                                $update_id = $this->get_max();

                                $flash_msg = "The notification was successfully added.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('store_orders/manage/');
                            }
                            

                        } else {
                            $flash_msg = "Upload failed!.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('store_orders/manage/');
                        }
                    }
                }
            }
        }
    }

function get($order_by)
{
    $this->load->model('mdl_approval');
    $query = $this->mdl_approval->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_approval');
    $query = $this->mdl_approval->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_approval');
    $query = $this->mdl_approval->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_approval');
    $query = $this->mdl_approval->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_approval');
    $this->mdl_approval->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_approval');
    $this->mdl_approval->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_approval');
    $this->mdl_approval->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_approval');
    $count = $this->mdl_approval->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_approval');
    $max_id = $this->mdl_approval->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_approval');
    $query = $this->mdl_approval->_custom_query($mysql_query);
    return $query;
}

}