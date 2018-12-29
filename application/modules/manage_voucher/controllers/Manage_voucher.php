<?php
class Manage_voucher extends MX_Controller 
{

var $path_voucher = './marketplace/voucher/';
var $path_slide = './marketplace/voucher/slide/';

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper('text');
}

///////////////////////////////////////////////////SLIDE/////////////////////////////////////////////////////////////////////

// function manage_slide() {
//     $this->load->module('site_security');
//     $this->site_security->_make_sure_is_admin();

//     $mysql_query = "SELECT * FROM voucher_sld ORDER BY id DESC";

//     $data['query'] = $this->_custom_query($mysql_query);
//     $data['flash'] = $this->session->flashdata('item');
//     $data['view_file'] = "manage_slide";
//     $this->load->module('templates');
//     $this->templates->admin($data);
// }

// function create_slide() {
//     error_reporting(0);
//         $this->load->library('session');
//         $this->load->module('site_security');
//         $this->site_security->_make_sure_is_admin();

//         $update_id = $this->uri->segment(3);
//         $submit = $this->input->post('submit');

//         if ($submit == "Cancel") {
//             redirect('manage_voucher/manage_slide');
//         }

//         if ($submit == "Submit") {

//             // var_dump($_FILES['featured_image']['name'] == '');
//             // die();

//             // process the form
//             $this->load->library('form_validation');
//             $this->form_validation->set_rules('title', 'Judul', 'trim|required');

//             if ($this->form_validation->run() == TRUE) {

//                 // ganti titik dengan _
//                 $filename = $_FILES['featured_image']['name'];
//                 $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
//                 $nama_baru = str_replace(' ', '_', $new_filename);
                
//                 $nmfile = date("ymdHis").'_'.$nama_baru;
//                 $loc = './marketplace/voucher/slide/';

//                 $config['upload_path']   = $loc;
//                 $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                 $config['max_size'] = '0';
//                 $config['max_size'] = '0';
//                 $config['max_size'] = '0';
//                 $config['overwrite'] = FALSE;
//                 $config['remove_spaces'] = TRUE;
//                 $config['file_name'] = $nmfile;

//                 $this->load->library('upload');
//                 $this->upload->initialize($config);

//                 // jika ada file yg di upload
//                 if ($_FILES['featured_image']['name'] != '') {
//                     if($_FILES['featured_image']['name'])
//                     {
//                         if ($this->upload->do_upload('featured_image'))
//                         {
//                             $data = array(
//                                 'title' => $this->input->post('title', true),
//                                 'featured_image' => $nmfile,
//                                 'status' => $this->input->post('status', true),
//                                 'created' => time(),
//                                 'modified' => time(),
//                             );

//                             if (is_numeric($update_id)) {
//                                 $data_old = $this->fetch_data_slide_from_db($update_id);

//                                 $featured_image = $data_old['featured_image'];

//                                 // hapus gambar
//                                 $this->hapus_img_slide($featured_image);

//                                 $this->_update_slide($update_id, $data);

//                                 $flash_msg = "The slide were successfully updated.";
//                                 $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
//                                 $this->session->set_flashdata('item', $value);
//                                 redirect('manage_voucher/create_slide/'.$update_id);

//                             } else {
//                                 $this->_insert_slide($data);
//                                 $update_id = $this->get_max_slide();

//                                 $flash_msg = "The slide was successfully added.";
//                                 $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
//                                 $this->session->set_flashdata('item', $value);
//                                 redirect('manage_voucher/create_slide/'.$update_id);
//                             }
                            

//                         } else {
//                             $flash_msg = "Upload failed!.";
//                             $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
//                             $this->session->set_flashdata('item', $value);
//                             redirect('manage_voucher/create_slide/'.$update_id);
//                         }
//                     }
//                 } else {
//                     $data = array(
//                         'title' => $this->input->post('title', true),
//                         'status' => $this->input->post('status', true),
//                         'created' => time(),
//                         'modified' => time(),
//                     );

//                     if (is_numeric($update_id)) {
//                         $this->_update_slide($update_id, $data);

//                         $flash_msg = "The slide were successfully updated.";
//                         $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
//                         $this->session->set_flashdata('item', $value);
//                         redirect('manage_voucher/create_slide/'.$update_id);
//                     } else {
//                         $this->_insert_slide($data);
//                         $update_id = $this->get_max_slide();

//                         $flash_msg = "The slide was successfully added.";
//                         $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
//                         $this->session->set_flashdata('item', $value);
//                         redirect('manage_voucher/create_slide/'.$update_id);
//                     }

//                 }

//             }
//         }

//         if ((is_numeric($update_id)) && ($submit!="Submit")) {
//             $data = $this->fetch_data_slide_from_db($update_id);
//         } else {
//             $data = $this->fetch_data_slide_from_post();
//         }

//         if (!is_numeric($update_id)) {
//             $data['headline'] = "Tambah Slide Voucher";
//         } else {
//             $data['headline'] = "Update Slide Voucher";
//         }

//         $data['update_id'] = $update_id;
//         $data['flash'] = $this->session->flashdata('item');
//         $data['view_file'] = "create_slide";
//         $this->load->module('templates');
//         $this->templates->admin($data);
// }

// function delete_slide($slide_id) {
//     if (!is_numeric($slide_id)) {
//         redirect('site_security/not_allowed');
//     }

//     $this->load->library('session');
//     $this->load->module('site_security');
//     $this->site_security->_make_sure_is_admin();

//     $submit = $this->input->post('submit', TRUE);
//     if ($submit == "Cancel") {
//         redirect('manage_voucher/create_slide/'.$slide_id);
//     } elseif ($submit == "Delete") {
//         // delete featured image
//         $this->_process_delete_slide($slide_id);

//         // delete the item record from db
//         $this->_delete_slide($slide_id); 
        
//         $flash_msg = "The slide were successfully deleted.";
//         $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
//         $this->session->set_flashdata('item', $value);

//         redirect('manage_voucher/manage_slide');
//     }
// }

// function _process_delete_slide($slide_id){
//     $data = $this->fetch_data_slide_from_db($slide_id);
//     $big_pic = $data['featured_image'];
//     $small_pic = $big_pic;

//     $path_real = './marketplace/voucher/slide/';
//     $path_compress = $path_real.'compress/';

//     $big_pic_path = $path_real.$big_pic;
//     $small_pic_path = $path_compress.$small_pic;

//     if (file_exists($big_pic_path)) {
//         unlink($big_pic_path);
//     } 

//     if (file_exists($small_pic_path)) {
//         unlink($small_pic_path);
//     } 

//     unset($data);
//     $data['featured_image'] = "";
//     $this->_update_slide($slide_id, $data);
// }


//     function fetch_data_slide_from_post() {
//         $data['title'] = $this->input->post('title', true);
//         $data['status'] = $this->input->post('status', true);
//         $data['created'] = time();
//         $data['modified'] = time();
//         return $data;
//     }

//     function fetch_data_slide_from_db($slide_id) {
//         $mysql_query = "SELECT * FROM voucher_sld WHERE id = $slide_id";
//         $query = $this->db->query($mysql_query);
//         foreach ($query->result() as $row) {
//             $data['id'] = $row->id;
//             $data['title'] = $row->title;
//             $data['featured_image'] = $row->featured_image;
//             $data['status'] = $row->status;
//             $data['created'] = $row->created;
//             $data['modified'] = $row->modified;
//         }
            
//         if (!isset($data)) {
//             $data = "";
//         }

//         return $data;
//     }

//     function hapus_img_slide($image) {
//         $this->load->module('site_security');
//         $this->site_security->_make_sure_is_admin();
//         // lokasi folder image
//         $path_real = './marketplace/voucher/slide/';
//         //lokasi gambar secara spesifik
//         $image = $path_real.$image;
//         //hapus image
//         unlink($image);
//     }

//     function _insert_slide($data) {
//         $this->db->insert('voucher_sld', $data);
//     }

//     function _update_slide($id, $data) {
//         if (!is_numeric($id)) {
//             die('Non-numeric variable!');
//         }

//         $this->db->where('id', $id);
//         $this->db->update('voucher_sld', $data);
//     }

//     function get_max_slide() {
//         $this->db->select_max('id');
//         $query = $this->db->get('voucher_sld');
//         $row = $query->row();
//         $id = $row->id;
//         return $id;
//     }

//     function _delete_slide($slide_id) {
//         if (!is_numeric($slide_id)) {
//             die('Non-numeric variable!');
//         }

//         $this->db->where('id', $slide_id);
//         $this->db->delete('voucher_sld');
//     }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    function check_exp($id_voucher) {
        $data = $this->fetch_data_from_db($id_voucher);
        // get masa berlaku
        $start = $data['start'];
        $end = $data['end'];
        $now = time();

        if (($now - $end) > 0) {
            // masih berlaku
            $result = 'TRUE'; 
        } else {
            // tidak berlaku
            $result = 'FALSE';
        }

        return $result;
    }

    function check_is_null($user_id, $id_voucher) {
        // check is voucher in tabel voucher own
        $table = 'voucher_own';
        $col1 = 'user_id';
        $value1 = $user_id;
        $col2 = 'voucher_id';
        $value2 = $id_voucher;
        $col3 = 'apply';
        $value3 = null;
        $this->db->where($col1, $value1);
        $this->db->where($col2, $value2);
        $this->db->where($col3, $value3);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            $result = 'TRUE';
        } else {
            $result = 'FALSE';
        }

        return $result;
    }

    function used_it($user_id, $id_voucher) {
        $table = 'voucher_own';
        $col1 = 'user_id';
        $value1 = $user_id;
        $col2 = 'voucher_id';
        $value2 = $id_voucher;
        $this->db->where($col1, $value1);
        $this->db->where($col2, $value2);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            // get id
            foreach ($query->result() as $row) {
                $id = $row->id;
            }

            // updating data tabel
            $data = array('apply' => 1);
            $this->db->update($tabel, $data, array('id' => $id));
        } 

        return true;
    }

    function check_point_available($user_id, $id_voucher) {
        $this->load->module('manage_poin');

        // get point
        $point = $this->manage_poin->get_point($user_id);
        // get all data from db voucher
        $data = $this->fetch_data_from_db($id_voucher);
        $point_use = $data['point_use'];

        if ($point >= $point_use) {
            $result = 'TRUE';
        } else {
            $result = 'FALSE';
        }

        return $result;
    }

    function check_is_owned($user_id, $id_voucher) {
        // check is voucher in tabel voucher own
        $table = 'voucher_own';
        $col1 = 'user_id';
        $value1 = $user_id;
        $col2 = 'voucher_id';
        $value2 = $id_voucher;
        $this->db->where($col1, $value1);
        $this->db->where($col2, $value2);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            $result = 'TRUE';
        } else {
            $result = 'FALSE';
        }

        return $result;
    }

    function check_is_used($user_id, $id_voucher) {
        // check is voucher in tabel voucher own
        $table = 'voucher_own';
        $col1 = 'user_id';
        $value1 = $user_id;
        $col2 = 'voucher_id';
        $value2 = $id_voucher;
        $col3 = 'apply';
        $value3 = 1;
        $this->db->where($col1, $value1);
        $this->db->where($col2, $value2);
        $this->db->where($col3, $value3);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            $result = 'TRUE';
        } else {
            $result = 'FALSE';
        }

        return $result;
    }

    function get_img_voucher() {
        $this->db->limit(5);
        $query = $this->db->get('voucher');

        return $query;
    }

    function _get_id_from_item_url($url) {
        $query = $this->get_where_custom('voucher_slug', $url);
        foreach ($query->result() as $row) {
            $id = $row->id;
        }

        if (!isset($id)) {
            $id = 0;
        }

        return $id;
    }

    function hapus_gambar($image) {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        // lokasi folder image
        $path_real = './marketplace/voucher/';
        $path_compress = $path_real.'compress/';
        //lokasi gambar secara spesifik
        $image1 = $path_real.$image;
        $image2 = $path_compress.$image;
        //hapus image
        unlink($image1);
        unlink($image2);
    }

    function create() {
        error_reporting(0);
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
 
        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('manage_voucher/manage');
        }

        if ($submit == "Submit") {

            // var_dump($_FILES['featured_image']['name'] == '');
            // die();

            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('voucher_title', 'Judul Voucher', 'trim|required');
            // $this->form_validation->set_rules('body', 'Isi Artikel', 'required');
            // $this->form_validation->set_rules('featured_image', 'Gambar', 'required|callback_upload_image');

            if ($this->form_validation->run() == TRUE) {
                // $data = $this->fetch_data_from_post();

                // ganti titik dengan _
                $filename = $_FILES['featured_image']['name'];
                $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
                $nama_baru = str_replace(' ', '_', $new_filename);
                
                $nmfile = date("ymdHis").'_'.$nama_baru;
                $loc = './marketplace/voucher/';

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

                $start =  $this->input->post('start', true);
                $end = $this->input->post('end', true);
                //fix start date
                $start_date = explode('/', $start);
                $awal = strtotime($start_date[2].'-'.$start_date[1].'-'.$start_date[0]);

                //fix end date
                $end_date = explode('/', $end);
                $akhir = strtotime($end_date[2].'-'.$end_date[1].'-'.$end_date[0]);

                // jika ada file yg di upload
                if ($_FILES['featured_image']['name'] != '') {
                    if($_FILES['featured_image']['name'])
                    {
                        if ($this->upload->do_upload('featured_image'))
                        {
                            $data = array(
                                'voucher_title' => $this->input->post('voucher_title', true),
                                'voucher_slug' => strtolower(url_title($this->input->post('voucher_slug', true))),
                                'ketentuan' => $this->input->post('ketentuan', true),
                                'cara_pakai' => $this->input->post('cara_pakai', true),
                                'featured_image' => $nmfile,
                                'num_voucher' =>  $this->input->post('num_voucher', true),
                                'min_transaction' => $this->input->post('min_transaction', true),
                                'point_use' =>  $this->input->post('point_use', true),
                                'start' =>  $awal,
                                'end' => $akhir,
                                'status' => $this->input->post('status', true),
                                'created' => time(),
                                'modified' => time(),
                            );

                            if (is_numeric($update_id)) {
                                $data_old = $this->fetch_data_from_db($update_id);

                                $featured_image = $data_old['featured_image'];

                                // hapus gambar
                                $this->hapus_gambar($featured_image);

                                $this->_update($update_id, $data);

                                $flash_msg = "The voucher were successfully updated.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('manage_voucher/create/'.$update_id);

                            } else {
                                $this->_insert($data);
                                $update_id = $this->get_max();

                                $flash_msg = "The voucher was successfully added.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('manage_voucher/create/'.$update_id);
                            }
                            

                        } else {
                            $flash_msg = "Upload failed!.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('manage_voucher/create/'.$update_id);
                        }
                    }
                } else {
                    $data = array(
                        'voucher_title' => $this->input->post('voucher_title', true),
                        'voucher_slug' => strtolower(url_title($this->input->post('voucher_slug', true))),
                        'ketentuan' => $this->input->post('ketentuan', true),
                        'cara_pakai' => $this->input->post('cara_pakai', true),
                        'num_voucher' =>  $this->input->post('num_voucher', true),
                        'min_transaction' => $this->input->post('min_transaction', true),
                        'point_use' =>  $this->input->post('point_use', true),
                        'start' =>  $awal,
                        'end' => $akhir,
                        'status' => $this->input->post('status', true),
                        'created' => time(),
                        'modified' => time(),
                    );

                    if (is_numeric($update_id)) {
                        $this->_update($update_id, $data);

                        $flash_msg = "The voucher were successfully updated.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('manage_voucher/create/'.$update_id);
                    } else {
                        $this->_insert($data);
                        $update_id = $this->get_max();

                        $flash_msg = "The voucher was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('manage_voucher/create/'.$update_id);
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
            $data['headline'] = "Tambah Voucher";
        } else {
            $data['headline'] = "Update Voucher";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function _compress_image($file_name) {
        $path_real = './marketplace/voucher/';
        $path_compress = $path_real.'compress/';

        $config['image_library'] = 'gd2';
        $config['source_image'] = $path_real.$file_name;
        $config['new_image'] = $path_compress.$file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width']         = 870;
        $config['height']       = 342;

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
            redirect('manage_voucher/create/'.$update_id);
        } elseif ($submit == "Delete") {
            // delete featured image
            $this->_process_delete($update_id);

            // delete the item record from db
            $this->_delete($update_id); 
            
            $flash_msg = "The voucher were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('manage_voucher/manage');
        }
    }

    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['featured_image'];
        $small_pic = $big_pic;

        $path_real = './marketplace/voucher/';
        $path_compress = $path_real.'compress/';

        $big_pic_path = $path_real.$big_pic;
        $small_pic_path = $path_compress.$small_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        unset($data);
        $data['featured_image'] = "";
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
        $image = $data['featured_image'];

        $path_real = './marketplace/voucher/';
        $path_compress = $path_real.'compress/';
        $big_pic_path = $path_real.$image;
        $small_pic_path = $path_compress.$image;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        unset($data);
        $data['featured_image'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The voucher image were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_voucher/create/'.$update_id);
    } 

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $mysql_query = "SELECT * FROM voucher ORDER BY id DESC";

        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['voucher_title'] = $this->input->post('voucher_title', true);
        $data['voucher_slug'] = url_title($this->input->post('voucher_slug', true));
        $data['ketentuan'] = $this->input->post('ketentuan', true);
        $data['cara_pakai'] = $this->input->post('cara_pakai', true);
        $data['point_use'] = $this->input->post('point_use', true);
        $data['min_transaction'] =  $this->input->post('min_transaction', true);
        $data['num_voucher'] = $this->input->post('num_voucher', true);
        $start =  $this->input->post('start', true);
        $end = $this->input->post('end', true);
        //fix start date
        $start_date = explode('/', $start);
        $awal = strtotime($start_date[2].'-'.$start_date[1].'-'.$start_date[0]);

        //fix end date
        $end_date = explode('/', $end);
        $akhir = strtotime($end_date[2].'-'.$end_date[1].'-'.$end_date[0]);
        $data['start'] =  $awal;
        $data['end'] = $akhir;
        $data['status'] = $this->input->post('status', true);
        $data['created'] = time();
        $data['modified'] = time();
        return $data;
    }

    function fetch_data_from_db($updated_id) {
        $query = $this->get_where($updated_id);
        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['voucher_title'] = $row->voucher_title;
            $data['voucher_slug'] = $row->voucher_slug;
            $data['ketentuan'] = $row->ketentuan;
            $data['cara_pakai'] = $row->cara_pakai;
            $data['featured_image'] = $row->featured_image;
            $data['num_voucher'] = $row->num_voucher;
            $data['min_transaction'] = $row->min_transaction;
            $data['point_use'] = $row->point_use;
            $data['start'] = $row->start;
            $data['end'] = $row->end;
            $data['status'] = $row->status;
            $data['created'] = $row->created;
            $data['modified'] = $row->modified;
        }
            
        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

    function get_data() {
        $mysql_query = "SELECT * FROM voucher WHERE status = 1 ORDER BY id DESC";
        $query = $this->_custom_query($mysql_query);
        return $query;
    }

function get($order_by)
{
    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_voucher');
    $this->mdl_voucher->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_voucher');
    $this->mdl_voucher->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_voucher');
    $this->mdl_voucher->_delete($id);
}

function num_voucher_where($column, $value) 
{
    $this->load->model('mdl_voucher');
    $num_voucher = $this->mdl_voucher->num_voucher_where($column, $value);
    return $num_voucher;
}

function get_max() 
{
    $this->load->model('mdl_voucher');
    $max_id = $this->mdl_voucher->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->_custom_query($mysql_query);
    return $query;
}

}