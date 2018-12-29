<?php
class Manage_materi extends MX_Controller 
{

var $path = './marketplace/materi/';
var $path_video = './marketplace/materi/video/';

function __construct() {
    parent::__construct();
    $this->load->model(array('Client', 'App', 'Project'));
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper(array('text', 'tgl_indo_helper'));
}

    function clear_all_materi($order_id) {
        $jml_materi = $this->count_materi_order($order_id);

        $mysql_query = "SELECT * FROM materi WHERE order_id = $order_id";
        $query = $this->_custom_query($mysql_query);

        if ($jml_materi > 0) {
            $id = array();
            foreach ($query->result() as $row) {
                $id[] = $row->id;
            }

            // var_dump($id);

            for ($i=0; $i < $jml_materi; $i++) { 
                // echo "delete id ".$id[$i];
                $this->delete_universal($id[$i]);
            }
        }
    }

    function count_materi_order($order_id) {
        if (!is_numeric($order_id)) {
            redirect('site_security/not_allowed');
        }

        $mysql_query = "SELECT * FROM materi WHERE order_id = $order_id";
        $query = $this->_custom_query($mysql_query)->num_rows();

        return $query;
    }

    function count_materi($item_id) {
        if (!is_numeric($item_id)) {
            redirect('site_security/not_allowed');
        }

        $mysql_query = "SELECT * FROM materi WHERE item_id = $item_id";
        $query = $this->_custom_query($mysql_query);

        return $query;
    }

    function chosen_materi($order_id, $item_id) {
        if (!is_numeric($item_id)) {
            redirect('site_security/not_allowed');
        }

        $mysql_query = "SELECT * FROM materi WHERE item_id = $item_id AND order_id = $order_id AND selected = 1";
        $query = $this->_custom_query($mysql_query);

        return $query;
    }

    function delete_universal($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $materi = $data['materi'];

        $regular_path = $this->path.$materi;
        $video_path = $this->path_video.$materi;

        if (file_exists($regular_path)) {
            unlink($regular_path);
            // echo "delete materi regular ". $regular_path;
        }

        if (file_exists($video_path)) {
            unlink($video_path);
            // echo "delete materi video ".$video_path;
        }
    }

    function delete_video($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $video = $data['materi'];

        $video_path = $this->path_video.$video;

        if (file_exists($video_path)) {
            unlink($video_path);
        } 

        // unset($data);
        $data['materi'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The video were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_materi/create/'.$update_id);
    } 

    function show_video($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data_materi = $this->fetch_data_from_db($update_id);
        $data['video_name'] = $data_materi['materi'];
        $data['headline'] = "Show video";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "view_video";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function add_video($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('manage_materi/create/'.$update_id);
        }

        if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            unset($config);
            $date = date("ymd");
            $configVideo['upload_path'] = $this->path_video;
            $configVideo['max_size'] = '60000';
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name = $date.$_FILES['video']['name'];
            $configVideo['file_name'] = $video_name;

            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);

            if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
                $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
                $data['headline'] = "Upload error";
                $data['video_name'] = '';
                $data['update_id'] = $update_id;
                $data['flash'] = $this->session->flashdata('item');
                $data['view_file'] = "upload_video";
                $this->load->module('templates');
                $this->templates->admin($data);
            } else {
                $videoDetails = $this->upload->data();
                $data['video_name']= $configVideo['file_name'];
                $data['video_detail'] = $videoDetails;

                // $data = array('upload_data' => $this->upload->data());

                // $upload_data = $data['upload_data'];
                $file_name = $configVideo['file_name']; // $upload_data['file_name'];

                //update database
                $update_data['video'] = $this->space_image($file_name);
                $this->_update($update_id, $update_data);

                $flash_msg = "The video were successfully uploaded.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);

                $data['headline'] = "Upload Success";
                $data['update_id'] = $update_id;
                $data['flash'] = $this->session->flashdata('item');
                $data['view_file'] = "show_video";
                $this->load->module('templates');
                $this->templates->admin($data);
            }
            
        }

        
    }

    function do_delete() {
        $this->load->module('manage_product');

        $id = $this->input->post('update_id');
        $type = $this->input->post('tipe');
        $name = $this->input->post('name');

        // check available
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where($type, $name);

        $query = $this->db->get('materi');

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $file = $row[$type];
            }

            $data = array();
            $data[$type] = '';

            $this->db->where('id', $id);
            $this->db->update('materi', $data);

            // get location
            $loc = './marketplace/materi/';

            $pic_path = $loc.$file;

            if (file_exists($pic_path)) {
                unlink($pic_path);
                
                // delete berhasil
                $msg = 'gambar berhasil didelete';
                echo json_encode($msg);
            } else {
                $msg = 'tidak ada gambar';
                echo json_encode($msg);
            }

        }
    }

    function _generate_thumbnail($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './marketplace/materi/'.$file_name; //'./LandingPageFiles/big_pics/'.$file_name;
        $config['new_image'] = './marketplace/materi/convert/'.$file_name; //'./LandingPageFiles/small_pics/'.$file_name;
        $config['maintain_ratio'] = false;
        $config['width']         = 530;
        $config['height']       = 328;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    function process_upload() {
        error_reporting(0);
        $this->load->module('site_security');
        $this->load->module('manage_product');

        $data_json = $this->input->post('objArr');

        $result = json_decode($data_json);

        $update_id = $result[0]->segment;
        $loc = './marketplace/materi/';

        // $token = $this->site_security->generate_random_string(6);
        // ganti titik dengan _
        $filename = $_FILES['file']['name'];
        $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
        $nama_baru = str_replace(' ', '_', $new_filename);
        
        $nmfile = date("ymdHis").'_'.$nama_baru;

        $update_data[$result[0]->type] = $nmfile;

        $this->_update($update_id, $update_data);

        $config['upload_path'] = $loc; //$this->path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000048'; //maksimum besar file 100M
        // $config['max_width']  = '2600'; //lebar maksimum 1288 px
        // $config['max_height']  = '2768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $location = base_url().$loc.$nmfile;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {

            // create thumbnail
            $this->_generate_thumbnail($nmfile);

            $results['gambar'] =  '<img src="'.$location.'" height="150" width="225" id="sumber" class="img-thumbnail" data-id="'.$update_id.'" data-type="'.$result[0]->type.'" />';
            $results['msg'] = 'sukses';
            $results['token'] = $update_id;
            $results['name'] = $nmfile; 
            $results['type'] = $result[0]->type;
            echo json_encode($results);
        } else {
            echo $this->upload->display_errors();
        }
    }

    function load() {

        $update_id = $this->input->post('id');
        $type = $this->input->post('tipe');

        // get file name form db
        $data = $this->fetch_data_from_db($update_id);
        $nmfile = $data['materi'];

        // get location name
        $loc = './marketplace/materi/';

        $full_path = $loc.$nmfile;
        $location = base_url().$full_path;

        if (file_exists($full_path)) {
            $results['gambar'] =  '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
            $results['msg'] = 'sukses';
            $results['name'] = $nmfile; 
            $results['type'] = $type;
            echo json_encode($results);
        } else {
            $msg = 'tidak ada gambar';
            echo json_encode($msg);
        }
    }

    function get_id_from_code($code) {
        $query = $this->get_where_custom('code', $code);
        foreach ($query->result() as $row) {
            $id = $row->id;
        }

        if (!is_numeric($id)) {
            $id = 0;
        }

        return $id;
    }

    function download_file($update_id) {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        header("Content-type:application/image");

        $data_materi = $this->fetch_data_from_db($update_id);
        $nama = $data_materi['materi'];

        $name = $path.$nama;
        $data = file_get_contents('./marketplace/materi/'.$nama);
        $this->load->helper('file');
        $file_name = $nama;

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file_name, $data);
    }

    function getFile($code) {
        header("Content-type:application/image");
        //cek nama image dari database
        $update_id = $this->get_id_from_code($code);
        $data_materi = $this->fetch_data_from_db($update_id);
        $nama = $data_materi['materi'];

        $name = $path.$nama;
        $data = file_get_contents('./marketplace/materi/'.$nama);
        $this->load->helper('file');
        $file_name = $nama;

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file_name, $data);
    }

function pickSelect() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $order_id = $this->input->post('order_id');
    $user_id = $this->input->post('user_id');
    $id_selected_new = $this->input->post('id');

    // get id where selected
    $id_selected_old = $this->_get_id_where_selected($order_id, $user_id);

    // change selected status
    // old one
    $data_old = array('selected' => 0);
    $this->_update($id_selected_old, $data_old);
    // new one
    $data_new = array('selected' => 1);
    $this->_update($id_selected_new, $data_new);
}

function test() {
    $order_id = 5;
    $user_id = 1009;
    $mysql_query = "SELECT * FROM materi WHERE order_id = $order_id AND user_id = $user_id AND selected = 1";
    $query = $this->_custom_query($mysql_query);
    foreach ($query->result() as $row) {
        $id = $row->id;
    }

    echo $id;
}

function _get_id_where_selected($order_id, $user_id) {
    $mysql_query = "SELECT * FROM materi WHERE order_id = $order_id AND user_id = $user_id AND selected = 1";
    $query = $this->_custom_query($mysql_query);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $id = $row->id;
        }
    } else {
        $id = '';
    }
    
    return $id;
}

function _get_id_where_downloaded($order_id, $item_id, $user_id) {
    $mysql_query = "SELECT * FROM materi WHERE order_id = $order_id AND item_id = $item_id AND user_id = $user_id AND download = 1";
    $query = $this->_custom_query($mysql_query);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $id = $row->id;
        }
    } else {
        $id = '';
    }
    
    return $id;
}

function _get_id_where_selected_but_yet_download($order_id, $item_id, $user_id) {
    $mysql_query = "SELECT * FROM materi WHERE order_id = $order_id AND item_id = $item_id AND user_id = $user_id AND selected = 1 AND download <> 1";
    $query = $this->_custom_query($mysql_query);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $id = $row->id;
        }
    } else {
        $id = '';
    }
    
    return $id;
}

function show_archived() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    // $mysql_query = "SELECT * FROM komplain WHERE archive = 1 ORDER BY id DESC";
    // $data['query'] = $this->_custom_query($mysql_query);

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "archived";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function _set_to_opened($update_id) {
    $data['opened'] = 1;
    $this->_update($update_id, $data);
}

function getDataArchive() {
    $this->load->module('manage_daftar');
    $this->load->module('store_orders');
    $this->load->module('timedate');

    $mysql_query = "SELECT * FROM materi WHERE archive = 1 ORDER BY id DESC";
    $query = $this->_custom_query($mysql_query); //$this->get('id');
    $no = 1;
    foreach($query->result() as $row){
        $edit_materi = base_url()."manage_materi/view/".$row->id;
        $status = $row->status;
        $opened = $row->opened;
        $selected = $row->selected;
        $download = $row->download;

        if ($selected == 1) {
            $status_label = "m-badge--success";
            $status_desc = "Selected";
        } else {
            $status_label = "m-badge--danger";
            $status_desc = "Unselected";
        }

        // get data from store_order
        $order_id = $row->order_id;
        $order = $this->db->where('id', $order_id)->get('store_orders')->row();

        $item_id = $order->item_id;
        $lokasi = $order->item_title;

        $klien = $this->manage_daftar->_get_customer_name($row->user_id);
        $toko = $this->manage_daftar->_get_customer_name($order->shop_id);
        $tgl = $this->timedate->get_nice_date($row->created_at,'indo');

        $data_archive[] = array(
            "#" => "
                <span style='overflow: visible; width: 110px;'>                     
                    <div class='dropdown '>                         
                        <a href='#' class='btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown'>                                
                            <i class='la la-ellipsis-h'></i>                            
                        </a>                            
                        <div class='dropdown-menu dropdown-menu-right'>                             
                            <a class='dropdown-item' href='".base_url()."manage_materi/view/".$row->id."'><i class='la la-file-text'></i> Preview</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/set_selected/".$row->id."/manage_materi\")'><i class='la la-check-circle-o'></i> Set resolve</a> 
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/delete/".$row->id."/manage_materi\")'><i class='la la-trash'></i> Delete</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/archive/".$row->id."/manage_materi\")'><i class='la la-briefcase'></i> Archive</a>

                        </div>                      
                    </div>                      
                                    
                </span>
            ",
            "Lokasi" => "<a class='".$this->open($opened)."' href='".base_url()."manage_materi/view/".$row->id."'>".$lokasi."</a>",
            "Order" => $order->no_order,
            "Klien" => $klien,
            "Owner" => $toko,
            "Materi" => $row->materi,
            // "Select" => $this->statuta($row->selected),
            "Status" => "<span style='width: 110px;''><span class='m-badge <?= $status_label ?> m-badge--wide'>".$status_desc." </span></span>",
            "Tanggal" => $tgl,
            "Aksi" => "
                <span style='overflow: visible; width: 110px;''>                      
                <a href='".$edit_materi."' class='m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' title='Edit details'>                          
                    <i class='la la-edit'></i>                      
                </a>                        
                <a href='#' onclick='hapus_dokumen(\"".$row->id."\")' class='m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill' title='Delete' data-toggle='modal' data-target=''>                           
                    <i class='la la-trash'></i>                     
                </a>    
                </span>
            "
        );
    }
    echo json_encode($data_archive);
}

function getData() {
    $this->load->module('manage_daftar');
    $this->load->module('store_orders');
    $this->load->module('timedate');

    $mysql_query = "SELECT * FROM materi ORDER BY id DESC";
    $query = $this->_custom_query($mysql_query); //$this->get('id');
    $no = 1;
    foreach($query->result() as $row){
        $edit_materi = base_url()."manage_materi/view/".$row->id;
        $status = $row->status;
        $opened = $row->opened;
        $selected = $row->selected;
        $download = $row->download;

        if ($selected == 1) {
            $status_label = "m-badge--success";
            $status_desc = "Selected";
        } else {
            $status_label = "m-badge--danger";
            $status_desc = "Unselected";
        }

        // get data from store_order
        $order_id = $row->order_id;
        $order = $this->db->where('id', $order_id)->get('store_orders')->row();

        $item_id = $order->item_id;
        $lokasi = $order->item_title;

        $klien = $this->manage_daftar->_get_customer_name($row->user_id);
        $toko = $this->manage_daftar->_get_customer_name($order->shop_id);
        $tgl = $this->timedate->get_nice_date($row->created_at,'indo');

        $data_materi[] = array(
            "#" => "
                <span style='overflow: visible; width: 110px;'>                     
                    <div class='dropdown '>                         
                        <a href='#' class='btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown'>                                
                            <i class='la la-ellipsis-h'></i>                            
                        </a>                            
                        <div class='dropdown-menu dropdown-menu-right'>                             
                            <a class='dropdown-item' href='".base_url()."manage_materi/view/".$row->id."'><i class='la la-file-text'></i> Preview</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/set_selected/".$row->id."/manage_materi\")'><i class='la la-check-circle-o'></i> Set resolve</a> 
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/delete/".$row->id."/manage_materi\")'><i class='la la-trash'></i> Delete</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/archive/".$row->id."/manage_materi\")'><i class='la la-briefcase'></i> Archive</a>

                        </div>                      
                    </div>                      
                                    
                </span>
            ",
            "Lokasi" => "<a class='".$this->open($opened)."' href='".base_url()."manage_materi/view/".$row->id."'>".$lokasi."</a>",
            "Order" => $order->no_order,
            "Klien" => $klien,
            "Owner" => $toko,
            "Materi" => $row->materi,
            // "Select" => $this->statuta($row->selected),
            "Status" => "<span style='width: 110px;''><span class='m-badge <?= $status_label ?> m-badge--wide'>".$status_desc." </span></span>",
            "Tanggal" => $tgl,
            "Aksi" => "
                <span style='overflow: visible; width: 110px;''>                      
                <a href='".$edit_materi."' class='m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' title='Edit details'>                          
                    <i class='la la-edit'></i>                      
                </a>                        
                <a href='#' onclick='hapus_dokumen(\"".$row->id."\")' class='m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill' title='Delete' data-toggle='modal' data-target=''>                           
                    <i class='la la-trash'></i>                     
                </a>    
                </span>
            "
        );
    }
    echo json_encode($data_materi);
}


function open($opened) {
    return ($opened != 1)? 'seal' : '';
}

function status($status) {
    return ($status == 1)? 'Active' : 'Inactive';
}

function statuta($select) {
    return ($select == 1)? 'Selected' : 'Unselected';
}


function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('timedate');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('manage_materi/manage');
    }

    // if ($submit == "Submit") {
    //     // process the form
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('order_id', 'ID Order', 'required');

    //     if ($this->form_validation->run() == TRUE) {
    //         $data = $this->fetch_data_from_post();

    //         // $data['item_url'] = url_title($data['item_title']);

    //         if (is_numeric($update_id)) {
    //             $this->_update($update_id, $data);
    //             $flash_msg = "The materi were successfully updated.";
    //             $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
    //             $this->session->set_flashdata('item', $value);
    //             redirect('manage_materi/create/'.$update_id);
    //         } else {
    //             $this->_insert($data);
    //             $update_id = $this->get_max();

    //             $flash_msg = "The materi was successfully added.";
    //             $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
    //             $this->session->set_flashdata('item', $value);
    //             redirect('manage_materi/create/'.$update_id);
    //         }
    //     }
    // }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Materi";
    } else {
        $data['headline'] = "Update Materi";
    }

    $data = $this->fetch_data_from_db($update_id);
    $order_id = $data['order_id'];
    $data['status'] = $data['status'];
    $data['selected'] = $data['selected'];
    $data['materi_image'] = $data['materi'];
    $orders = $this->db->where('id', $order_id)->get('store_orders')->row();
    $data['no_order'] = $orders->no_order;
    $data['durasi'] = $orders->duration;
    $data['start'] = $this->timedate->get_nice_date($orders->start, 'indo');
    $data['end'] = $this->timedate->get_nice_date($orders->end, 'indo');
    $data['lokasi'] = $orders->item_title;
    $item_id = $orders->item_id;
    $data['kode_lokasi'] = App::view_by_id($item_id)->prod_code;
    $data['klien'] = Client::view_by_id($orders->shopper_id)->username;
    $data['owner'] = Client::view_by_id($orders->shop_id)->username;

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function view($materi_id = null) {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_product');
    $this->load->module('store_categories');
    $this->load->module('timedate');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('manage_materi/manage');
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Materi";
    } else {
        $data['headline'] = "Update Materi";
    }

    $data = $this->fetch_data_from_db($update_id);
    $order_id = $data['order_id'];
    $data['status'] = $this->status($data['status']);
    $data['selected'] = $this->statuta($data['selected']);
    $data['materi'] = $data['materi'];
    $orders = $this->db->where('id', $order_id)->get('store_orders')->row();
    $data['no_order'] = $orders->no_order;
    $data['durasi'] = $orders->duration;
    $data['start'] = $this->timedate->get_nice_date($orders->start, 'indo');
    $data['end'] = $this->timedate->get_nice_date($orders->end, 'indo');
    $data['lokasi'] = $orders->item_title;
    $item_id = $orders->item_id;
    $data['kode_lokasi'] = App::view_by_id($item_id)->prod_code;
    $data['klien'] = Client::view_by_id($orders->shopper_id)->username;
    $data['owner'] = Client::view_by_id($orders->shop_id)->username;

    // cek kategori produk order
    $category_product = $this->manage_product->get_cat_prod($item_id);
    $category_prod_name = $this->store_categories->get_name_from_category_id($category_product);
    if ($category_prod_name == 'Videotron') {
        $view_file = 'create_videotron';
    } else {
        $view_file = 'create';
    }

    $this->_set_to_opened($materi_id);

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = $view_file;
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    // $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

}

function fetch_data_from_post() {
    $data['order_id'] = $this->input->post('order_id', true);
    $data['user_id'] = $this->input->post('user_id', true);
    $data['item_id'] = $this->input->post('item_id', true);
    // $data['materi'] = $this->input->post('materi', true);
    $data['created_at'] = time();
    $data['status'] = $this->input->post('status', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['order_id'] = $row->order_id;
        $data['user_id'] = $row->user_id;
        $data['item_id'] = $row->item_id;
        $data['materi'] = $row->materi;
        $data['created_at'] = $row->created_at;
        $data['status'] = $row->status;
        $data['opened'] = $row->opened;
        $data['selected'] = $row->selected;
        $data['download'] = $row->download;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function archive() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->input->post('materi_id');
    $submit = $this->input->post('submit', TRUE);

     if ($submit == "Submit") {
        $data = array(
            'archive' => 1
        );

        $this->_update($update_id, $data);

        $flash_msg = "The materi were successfully archived.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_materi/manage');
    }
}

function set_to_selected() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    // cari semua materi yg terkait

    $update_id = $this->input->post('materi_id');
    $submit = $this->input->post('submit', TRUE);

    if ($submit == "Submit") {
        $data = array(
            'selected' => 1
        );

        $this->_update($update_id, $data);

        $flash_msg = "The materi were successfully selected.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_materi/manage');
    }
}

function delete($update_id = null)
{
    if (!is_numeric($update_id)) {
        $update_id = $this->input->post('materi_id');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit == "Cancel") {
        redirect('manage_materi/view/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The materi were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_materi/manage');
    }
}

function get($order_by)
{
    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->get($order_by);
    return $query;
}

function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_materi');
    $this->mdl_materi->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_materi');
    $this->mdl_materi->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_materi');
    $this->mdl_materi->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_materi');
    $count = $this->mdl_materi->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_materi');
    $max_id = $this->mdl_materi->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->_custom_query($mysql_query);
    return $query;
}

}