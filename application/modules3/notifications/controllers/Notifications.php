<?php
class Notifications extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->model('App');
}

// test log data

function test() {
    $data = array(
        'user_target' => 0,
        'module' => 'Konfirmasi',
        'module_field_id' => 8,
        'notify_title' => 'Yuk ulas barang',
        'notification' => 'ulasanmu sangat berguna bagi pembeli lain dalam menilai kualitas barang.',
        'notification_date' => date('Y-m-d H:i:s'),
        'icon' => 'soap-icon-flexible'
    );

    $table = 'notifications';

    App::save_data($table, $data);
}

function get_my_notification($user_id) {
    $col = 'user_target';
    $val = $user_id;
    // $query = $this->get_where_custom($col, $val);
    $mysql_query = "SELECT * FROM notifications WHERE user_target IN ($user_id, 0) ORDER BY notify_id DESC";
    $query = $this->_custom_query($mysql_query);
    return $query;
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('notify_id');

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_kontak";
    $data['view_file'] = "manage";
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
            redirect('notifications/manage');
        }

        if ($submit == "Submit") {

            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('notify_title', 'Judul notifikasi', 'trim|required');
           
            if ($this->form_validation->run() == TRUE) {

                $nama_baru = str_replace(' ', '_', $_FILES['featured_image']['name']);
                
                $nmfile = date("ymdHis").'_'.$nama_baru;
                $loc = './marketplace/notifikasi/';

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
                            $this->_compress_image($nmfile);

                            $data = array(
                                'user_target' => 0, // 0 untuk semua user // $this->input->post('user_target', true),
                                'module' => url_title($this->input->post('module', true)),
                                'module_field_id' => $this->input->post('module_field_id', true),
                                'notify_title' => $this->input->post('notify_title', true),
                                'notification' => $this->input->post('notification', true),
                                'notification_date' =>  date('Y-m-d H:i:s'),
                                'image' => $nmfile,
                                'icon' => $this->input->post('icon', true),
                                'value1' => $this->input->post('value1', true),
                                'value2' => $this->input->post('value2', true)
                            );

                            if (is_numeric($update_id)) {
                                $data_old = $this->fetch_data_from_db($update_id);

                                $image = $data_old['image'];

                                // hapus gambar
                                $this->hapus_gambar($image);

                                $this->_update($update_id, $data);

                                $flash_msg = "The notification were successfully updated.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('blog/create/'.$update_id);

                            } else {
                                $this->_insert($data);
                                $update_id = $this->get_max();

                                $flash_msg = "The notification was successfully added.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('blog/create/'.$update_id);
                            }
                            

                        } else {
                            $flash_msg = "Upload failed!.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('blog/create/'.$update_id);
                        }
                    }
                } else {
                    $data = array(
                        'user_target' => 0, // $this->input->post('user_target', true),
                        'module' => url_title($this->input->post('module', true)),
                        'module_field_id' => $this->input->post('module_field_id', true),
                        'notify_title' => $this->input->post('notify_title', true),
                        'notification' => $this->input->post('notification', true),
                        'notification_date' =>  date('Y-m-d H:i:s'),
                        // 'image' => $nmfile,
                        'icon' => $this->input->post('icon', true),
                        'value1' => $this->input->post('value1', true),
                        'value2' => $this->input->post('value2', true)
                    );

                    if (is_numeric($update_id)) {
                        $this->_update($update_id, $data);

                        $flash_msg = "The notification were successfully updated.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('blog/create/'.$update_id);
                    } else {
                        $this->_insert($data);
                        $update_id = $this->get_max();

                        $flash_msg = "The notification was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('blog/create/'.$update_id);
                    }

                }

            }
        }

        if ((is_numeric($update_id)) && ($submit!="Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Tambah Notifikasi";
            $data['image'] = '';
        } else {
            $data['headline'] = "Update Notifikasi";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function hapus_gambar($image) {
        // lokasi folder image
        $path_real = './marketplace/notifikasi/';
        $path_compress = $path_real.'870x342/';
        //lokasi gambar secara spesifik
        $image1 = $path_real.$image;
        $image2 = $path_compress.$image;
        //hapus image
        unlink($image1);
        unlink($image2);
    }

    function _compress_image($file_name) {
        $path_real = './marketplace/notifikasi/';
        $path_compress = $path_real.'70x70/';

        $config['image_library'] = 'gd2';
        $config['source_image'] = $path_real.$file_name;
        $config['new_image'] = $path_compress.$file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width']         = 70;
        $config['height']       = 70;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
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
            redirect('blog/create/'.$update_id);
        } elseif ($submit == "Delete") {
            // delete featured image
            $this->_process_delete($update_id);

            // delete the item record from db
            $this->_delete($update_id); 
            
            $flash_msg = "The article were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('blog/manage');
        }
    }

    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['image'];
        $small_pic = $big_pic;

        $path_real = './marketplace/notifikasi/';
        $path_compress = $path_real.'870x342/';

        $big_pic_path = $path_real.$big_pic;
        $small_pic_path = $path_compress.$small_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        unset($data);
        $data['image'] = "";
        $this->_update($update_id, $data);
    }


    function delete_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $image = $data['image'];

        $path_real = './marketplace/notifikasi/';
        $path_compress = $path_real.'870x342/';
        $big_pic_path = $path_real.$image;
        $small_pic_path = $path_compress.$image;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        unset($data);
        $data['image'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The article image were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('blog/create/'.$update_id);
    } 

    function upload_image() {
        $nama_baru = str_replace(' ', '_', $_FILES['featured_image']['name']);
                
        $nmfile = date("ymdHis").'_'.$nama_baru;
        $loc = './marketplace/notifikasi/';

        $config['upload_path']          = $loc; //$this->path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size'] = '20048'; //maksimum besar file 2M
        $config['max_width']  = '1600'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $location = base_url().$loc.$nmfile;

        $this->load->library('upload', $config);

        // update database
        $this->db->update('vendor', array('SIUP' => $nmfile), array('id' => $id));

        if ($this->upload->do_upload('featured_image')) {
            return TRUE;
        } else {
            $error_msg = $this->upload->display_errors();
            $this->form_validation->set_message('featured_image', $this->upload->display_errors());
            return FALSE;
        }

    }

    // $data = array(
    //                     'user_target' => $this->input->post('user_target', true),
    //                     'module' => url_title($this->input->post('module', true)),
    //                     'module_field_id' => $this->input->post('module_field_id', true),
    //                     'notify_title' => $this->input->post('notify_title', true),
    //                     'notification' => $this->input->post('notification', true),
    //                     'notification_date' =>  date('Y-m-d H:i:s'),
    //                     // 'image' => $nmfile,
    //                     'icon' => $this->input->post('icon', true),
    //                     'value1' => $this->input->post('value1', true),
    //                     'value2' => $this->input->post('value2', true)
    //                 );


    function _select_icon($modul) {
        switch ($modul) {
            case 'Tips':
                $icon = 'soap-icon-features';
                break;
            
            case 'Event':
                $icon = 'soap-icon-features';
                break;

            case 'Notifikasi_pembeli':
                $icon = 'soap-icon-features';
                break;
                
            case 'Notifikasi_penjual':
                $icon = 'soap-icon-features';
                break;
                        
            default:
                $icon = 'soap-icon-features';
                break;
        }

        return $icon;
    }

    function _set_to_opened($update_id) {
        $data['opened'] = 1;
        $this->_update($update_id, $data);
    }

    function _set_to_deleted($update_id) {
        $data['deleted'] = 1;
        $this->_update($update_id, $data);
    }

    function fetch_data_from_post() {
        $data['user_target'] = $this->input->post('user_target', true);
        $data['module'] = $this->input->post('module', true);
        $data['module_field_id'] = $this->input->post('module_field_id', true);
        $data['notify_title'] = $this->input->post('notify_title', true);
        $data['notification'] = $this->input->post('notification', true);
        $data['notification_date'] =  date('Y-m-d H:i:s');
        $icon = $this->_select_icon($data['module']);
        $data['icon'] = $icon;
        $data['value1'] = $this->input->post('value1', true);
        $data['value2'] = $this->input->post('value2', true);
        return $data;
    }

    function fetch_data_from_db($updated_id) {
        $query = $this->get_where($updated_id);
        foreach ($query->result() as $row) {
            $data['notify_id'] = $row->notify_id;
            $data['user_target'] = $row->user_target;
            $data['module'] = $row->module;
            $data['image'] = $row->image;
            $data['module_field_id'] = $row->module_field_id;
            $data['notify_title'] = $row->notify_title;
            $data['notification'] = $row->notification;
            $data['notification_date'] = $row->notification_date;
            $data['icon'] = $row->icon;
            $data['value1'] = $row->value1;
            $data['value2'] = $row->value2;
            $data['opened'] = $row->opened;
            $data['deleted'] = $row->deleted;
        }
            
        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

// public function index()
// {
//     $this->load->view('hello');
// }

function get($order_by)
{
    $this->load->model('mdl_notifications');
    $query = $this->mdl_notifications->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_notifications');
    $query = $this->mdl_notifications->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_notifications');
    $query = $this->mdl_notifications->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_notifications');
    $query = $this->mdl_notifications->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_notifications');
    $this->mdl_notifications->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_notifications');
    $this->mdl_notifications->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_notifications');
    $this->mdl_notifications->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_notifications');
    $count = $this->mdl_notifications->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_notifications');
    $max_id = $this->mdl_notifications->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_notifications');
    $query = $this->mdl_notifications->_custom_query($mysql_query);
    return $query;
}

}