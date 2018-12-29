<?php
class Transaction extends MX_Controller 
{

var $mailFrom;
var $mailPass;
var $path_video = './marketplace/materi/video';
function __construct() {
    parent::__construct();
    $this->load->model(array('App', 'Client'));
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $mailFrom = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
    $mailPass = $this->db->get_where('settings' , array('type'=>'password'))->row()->description;
}

function download_report($report_id) {
    $this->load->module('site_security');
    $this->load->module('manage_laporan');
    $this->site_security->_make_sure_logged_in();

    $data_laporan = $this->manage_laporan->fetch_data_from_db($report_id);
    $nama = $data_laporan['image'];

    // $name = $path.$nama;
    $data = file_get_contents('./marketplace/laporan/'.$nama);
    $this->load->helper('file');
    $file_name = $nama;

    // Load the download helper and send the file to your desktop
    $this->load->helper('download');
    force_download($file_name, $data);
}

function getActivity() {
    $this->load->module('site_security');
    $this->load->module('timedate');
    $this->load->module('store_orders');
    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('id');
    $subject = $this->input->post('subject');
    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get item id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;

    $user_id = $this->session->userdata('user_id');

    // get materi from shopper id & order id
    $col1 = 'subject';
    $value1 = $subject;
    $col2 = 'order_id';
    $value2 = $order_id;

    $this->db->where($col1, $value1);
    $this->db->where($col2, $value2);
    $hasil = $this->db->get('activity_transaction');

    if ($hasil->num_rows() > 0) {
        $mysql_query = "SELECT * FROM activity_transaction WHERE subject = '$subject' AND order_id = $order_id AND item_id = $item_id ORDER BY id DESC";
        $data_query = $this->db->query($mysql_query);

        foreach ($data_query->result() as $act) {
            $activity = $act->activity;
            $date = $this->timedate->get_nice_date($act->activity_date, 'lengkap');
            $label = $act->color;

            echo "<li>
                        <span class='tgl-activity'>".$date."</span>
                        <div class='aktif label-".$label."'>".$activity."</div>
                    </li>";
        }
    } 
}

function getReport() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_laporan');
    $this->load->module('timedate');
    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('id');
    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);

    $query = $this->store_orders->get_where($order_id);
    foreach ($query->result() as $row) {
        $shopper_id = $row->shopper_id;
    }

    // get materi from shopper id & order id
    $col1 = 'user_id';
    $value1 = $shopper_id;
    $col2 = 'order_id';
    $value2 = $order_id;

    $hasil = $this->manage_laporan->get_with_double_condition($col1, $value1, $col2, $value2);

    if ($hasil->num_rows() > 0) {
        $mysql_query = "SELECT * FROM laporan WHERE user_id = $shopper_id AND order_id = $order_id ORDER BY id DESC";
        $data_query = $this->manage_laporan->_custom_query($mysql_query);

        foreach ($data_query->result() as $report) {
            $pic = $report->image;
            $img_report = base_url().'marketplace/laporan/convert/'.$pic;
            $date = $this->timedate->get_nice_date($report->created_at, 'cool');
            $waktu = $report->waktu;
            $download = base_url().'transaction/download_report/'.$report->id;

            echo "<div class='col-md-6 grid-item'>
                    <div class='thumbnail'>
                        <img src='".$img_report."' class='img-responsive' alt='...'>
                        <div class='dl-btn'>
                            <a href='".$download."' class='button btn-small sky-blue1'>download</a>
                        </div>
                        <div class=''>
                            <div>".$waktu."</div>
                            <span>".$date."</span>
                        </div>
                    </div>

                </div>";
        }
    } 
}

function upload_laporan() {
    error_reporting(0);
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->load->module('manage_laporan');
    $this->site_security->_make_sure_logged_in();

    $submit = $this->input->post('submit', TRUE);
    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get order id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;

    if ($submit == "Submit") {
         
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        // $this->form_validation->set_rules('featured_image', 'Image', 'required');

        if ($this->form_validation->run() == TRUE) {
            $filename = $_FILES['featured_image']['name'];
            $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
            $nama_baru = str_replace(' ', '_', $new_filename);
        
            $nmfile = date("ymdHis").'_'.$nama_baru;
            
            $loc = './marketplace/laporan/';

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
                        $data = array(
                            'order_id' => $order_id,
                            'item_id' => $item_id,
                            'user_id' => $user_id,
                            'waktu' => $this->input->post('waktu', true),
                            'image' => $nmfile,
                            'status' =>  1,
                            'created_at' => time(),
                        );

                        $this->manage_laporan->_insert($data);
                        $this->manage_laporan->_generate_thumbnail($nmfile);

                        // Log activity transaction
                        $data_act = array(
                            'user_id' => $user_id,
                            'order_id' => $order_id,
                            'item_id' => $item_id,
                            'subject' => 'Owner',
                            'activity' => 'upload laporan',
                            'color' => 'primary',
                            'activity_date' => time(),
                        );
                        App::Log_transaction($data_act);

                        $flash_msg = "The upload laporan was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('transaction/sell/'.$session_id);

                    } else {
                        $flash_msg = "Upload failed!.";
                        $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('transaction/sell/'.$session_id);
                    }
                }

            }

        }
        
    }
}

function download_file($session_id) {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->load->module('store_categories');
    $this->site_security->_make_sure_logged_in();

    header("Content-type:application/image");

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get item id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
    // get item category
    $category_item = $this->db->where('id', $item_id)->get('store_item')->row()->cat_prod;
    // cek kategori
    $category_name = $this->store_categories->get_name_from_category_id($category_item);

    if (strtolower($category_name) == 'videotron') {
        $path_dl = 'marketplace/materi/video/';
    } else {
        $path_dl = 'marketplace/materi/';
    }
    // shopper id
    $shopper_id = $this->db->where('id', $order_id)->get('store_orders')->row()->shopper_id;
    // get id where selected
    $id_downloaded_old = $this->manage_materi->_get_id_where_downloaded($order_id, $item_id, $shopper_id);

    // cek materi 
    $query = $this->manage_materi->chosen_materi($order_id, $item_id);
    // get id where selected
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $id_selected = $row->id;
        }

        // change status download
        if ($id_downloaded_old != '') {
            $this->manage_materi->_update($id_downloaded_old, array('download' => 0));
        }
       
        $this->manage_materi->_update($id_selected, array('download' => 1));

        // Log activity transaction
        $data_act = array(
            'user_id' => $this->session->userdata('user_id'),
            'order_id' => $order_id,
            'item_id' => $item_id,
            'subject' => 'Owner',
            'activity' => 'download materi',
            'color' => 'success',
            'activity_date' => time(),
        );
        App::Log_transaction($data_act);

        $data_materi = $this->manage_materi->fetch_data_from_db($id_selected);
        $nama = $data_materi['materi'];

        // $name = $path.$nama;
        $data = file_get_contents($path_dl.$nama);
        $this->load->helper('file');
        $file_name = $nama;

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file_name, $data);
        
    } else {
        $flash_msg = "Belum ada materi yang diupload.";
        $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('transaction/sell/'.$session_id);
    }
    
}

function get_chosen_materi() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('session_id');
    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get item id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
    // get shopper id
    $shopper_id = $this->db->where('id', $order_id)->get('store_orders')->row()->shopper_id;
    
    $query = $this->manage_materi->chosen_materi($order_id, $item_id);
    // get id where selected
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $id_selected = $row->id;
        }
    } else {
        $id_selected = '';
    }
        
    if ($id_selected != '') {

        // cek already download or not
        $id_yet_download = $this->manage_materi->_get_id_where_selected_but_yet_download($order_id, $item_id, $shopper_id);
        // get image materi
        $data_materi = $this->manage_materi->fetch_data_from_db($id_selected);
        $img_materi = $data_materi['materi'];
        $path_materi = base_url().'marketplace/materi/convert/'.$img_materi;
        

        if ($id_selected == $id_yet_download) {
            echo "<div class='materi blur'>
                    <div class='hider'>
                        <span>materi baru!</span>
                    </div>
                    <img src='".$path_materi."'>
                </div>";
        } else {
            echo "<img src='".$path_materi."'>";
        }
    } else {
        echo "";
    }
}

function get_select_materi() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $user_id = $this->input->post('user_id');
    $session_id = $this->input->post('session_id');
    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get id where selected
    $id_selected = $this->manage_materi->_get_id_where_selected($order_id, $user_id);
    
    if ($id_selected != '') {
        // get image materi
        $data_materi = $this->manage_materi->fetch_data_from_db($id_selected);
        $img_materi = $data_materi['materi'];
        $path_materi = base_url().'marketplace/materi/convert/'.$img_materi;
        echo "<img src='".$path_materi."'>";
    } else {
        echo "";
    }

}

function get_count_materi() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('id');
    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);

    $query = $this->manage_materi->count_materi_order($order_id);
    // count it
    if ($query->num_rows() > 0) {
        $count = $query->num_rows();
    } else {
        $count = 0;
    }

    echo $count;
}

function pickSelect() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');
    $id_selected_new = $this->input->post('id');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get item id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
    // get id where selected
    $id_selected_old = $this->manage_materi->_get_id_where_selected($order_id, $user_id);

    // change selected status
    // old one
    $data_old = array('selected' => 0);
    $this->manage_materi->_update($id_selected_old, $data_old);
    // new one
    $data_new = array('selected' => 1);
    $this->manage_materi->_update($id_selected_new, $data_new);

    // Log activity transaction
    $data_act = array(
        'user_id' => $user_id,
        'order_id' => $order_id,
        'item_id' => $item_id,
        'subject' => 'Klien',
        'activity' => 'pilih materi',
        'color' => 'info',
        'activity_date' => time(),
    );
    App::Log_transaction($data_act);
}

function getMateri() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->load->module('timedate');
    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('id');
    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);

    $query = $this->store_orders->get_where($order_id);
    foreach ($query->result() as $row) {
        $shopper_id = $row->shopper_id;
    }

    // get materi from shopper id & order id
    $col1 = 'user_id';
    $value1 = $shopper_id;
    $col2 = 'order_id';
    $value2 = $order_id;

    $hasil = $this->manage_materi->get_with_double_condition($col1, $value1, $col2, $value2);

    if ($hasil->num_rows() > 0) {
        $mysql_query = "SELECT * FROM materi WHERE user_id = $shopper_id AND order_id = $order_id ORDER BY id DESC";
        $data_query = $this->manage_materi->_custom_query($mysql_query);

        foreach ($data_query->result() as $materi) {
            $pic = $materi->materi;
            $img_materi = base_url().'marketplace/materi/convert/'.$pic;
            $date = $this->timedate->get_nice_date($materi->created_at, 'cool');
            $select = $materi->selected;

            if ($select == 1) {
                $checked = "checked";
            } else {
                $checked = "";
            }

            echo "<div class='col-md-6'>
                    <input type='checkbox' id='" .$materi->id."' value='Value".$materi->id."' name='' class='pull-right' onclick='selectOnlyThis(this.id)' ".$checked." >
                    <a href='#' class='thumbnail'>
                        <img src='".$img_materi."' class='img-responsive' alt='...'>
                    </a>

                </div>";
        }
    } 
}

function addComment() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->site_security->_make_sure_logged_in();

    $user_id = $this->input->post('user_id');
    $session_id = $this->input->post('id');
    $chat_body = $this->input->post('comment');
    $cat = $this->input->post('cat');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);

    $data = array(
        'order_id' => $order_id,
        'cat_chat' => $cat,
        'user_id' => $user_id,
        'chat_body' => $chat_body,
        'created_at' => time()
    );

    if ($this->db->insert('chats', $data)) {
        return TRUE;
    }

}

function getComment() {
    $this->load->module('site_security');
    $this->load->module('manage_daftar');
    $this->load->module('store_orders');
    $this->load->module('timedate');

    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('id');
    $cat = $this->input->post('cat');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);

    // get all comment by req id
    $this->db->where('order_id', $order_id);
    $this->db->where('cat_chat', $cat);
    $this->db->order_by('id', 'asc');
    $query = $this->db->get('chats');

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            if ($row->user_id != 0) {
                $username = $this->manage_daftar->_get_customer_name($row->user_id);
                $alias = $this->store_orders->get_initial_name($username);
                $message = 'you';
                $image = $this->db->where('id', $row->user_id)->get('kliens')->row()->pic;
                $pic = ($image != '') ? 'marketplace/photo_profil/'.$image : 'marketplace/images/default_v3-usrnophoto1.png';
            } else {
                $message = 'other';
                $username = 'Admin';
                $pic = 'marketplace/images/adm.png';
            }

            $date = $this->timedate->get_nice_date($row->created_at, 'lengkap');

            echo "<li class='".$message."'>
                    <a class='user' href='#'><img alt='' src='".base_url().$pic."' /></a>
                    <div class='date'>
                      ".$date."
                    </div>
                    <div class='message'>
                      <p>
                        ".$row->chat_body."
                      </p>
                    </div>
                  </li>";    

        }
    }
}

function count_sell($user_id) {
    $mysql_query = "SELECT SUM(price) AS harga FROM store_orders WHERE shop_id = $user_id";
    $query = $this->_custom_query($mysql_query);
    foreach ($query->result() as $row) {
        $income = $row->harga; 
    }

    if ($query->num_rows() > 0) {
        $profit = $income;
    } else {
        $profit = 0;
    }

    return $profit;
}

function count_purchase($user_id) {
    $mysql_query = "SELECT SUM(price) AS harga FROM store_orders WHERE shopper_id = $user_id";
    $query = $this->_custom_query($mysql_query);
    foreach ($query->result() as $row) {
        $loss = $row->harga; 
    }

    if ($query->num_rows() > 0) {
        $spent = $loss;
    } else {
        $spent = 0;
    }

    return $spent;
}

public function index()
{
    $this->load->library('session');
    $this->load->helper('tgl_indo');
    $this->load->module('site_security');
    $this->load->module('store_orders');

    $this->site_security->_make_sure_logged_in();

    $user_id = $this->session->userdata('user_id');
    $col = 'shopper_id';
    $val = $user_id;
    $mysql_query = "SELECT * FROM store_orders WHERE shopper_id = $val ORDER BY id DESC";
    $data['campaign'] = $this->_custom_query($mysql_query); //$this->store_orders->get_where_custom($col, $val);

    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->market($data);
}

function delete_video($update_id) {
    if (!isset($update_id)) {
        redirect('site_security/not_user_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $data = $this->manage_materi->fetch_data_from_db($update_id);
    $video = $data['materi'];

    $video_path = $this->path_video.$video;

    if (file_exists($video_path)) {
        unlink($video_path);
    } 
} 

function upload_materi_video() {
    error_reporting(0);
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $submit = $this->input->post('submit', TRUE);
    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get order id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;

    if ($submit == "Submit") {
        // ganti titik dengan _
        $filename = $_FILES['video']['name'];
        $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
        $nama_baru = str_replace(' ', '_', $new_filename);
        
        $nmfile = date("ymdHis").'_'.$nama_baru;

        if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            unset($config);
            $configVideo['upload_path'] = $this->path_video;
            $configVideo['max_size'] = '60000';
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $configVideo['file_name'] = $nmfile;

            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);

            if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
            } else {
                // get id where selected
                $id_old_materi = $this->manage_materi->_get_id_where_selected($order_id, $user_id);
                if ($id_old_materi != '') {
                    // hapus materi video yang lama
                    $this->delete_video($id_old_materi);
                    // hapus data di db
                    $this->manage_materi->_delete($id_old_materi);

                }
                
                // hapus video
                $data = array(
                    'order_id'      => $order_id,
                    'item_id'       => $item_id,
                    'user_id'       => $user_id,
                    'materi'        => $nmfile,
                    'created_at'    => time(),
                    'status'        => 1,
                    'selected'      => 1,
                    'download'      => 0
                );

                // insert to db
                $this->manage_materi->_insert($data);

                // Log activity transaction
                $data_act = array(
                    'user_id' => $user_id,
                    'order_id' => $order_id,
                    'item_id' => $item_id,
                    'subject' => 'Klien',
                    'activity' => 'upload materi',
                    'color' => 'success',
                    'activity_date' => time(),
                );
                App::Log_transaction($data_act);

                $flash_msg = "The video were successfully uploaded.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('transaction/purchase/'.$session_id,'refresh');
            }    
        }
    }
}

function upload_materi() {
    error_reporting(0);
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $submit = $this->input->post('submit', TRUE);
    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get order id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;

    if ($submit == "Submit") {
        $filename = $_FILES['file']['name'];
        $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
        $nama_baru = str_replace(' ', '_', $new_filename);
        
        $nmfile = date("ymdHis").'_'.$nama_baru;

        $loc = './marketplace/materi/';
        $config['upload_path']          = $loc;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = '1000048';
        $config['file_name']            = $nmfile; //nama yang terupload nantinya

        $this->load->library('upload', $config);

        // cek jumlah materi so far
        $query = $this->manage_materi->count_materi_order($order_id);
        // count it
        if ($query->num_rows() > 0) {
            $count = $query->num_rows();
        } 

        // jika jml materi >= 12 maka tidak dapat upload
        if ($count >= 12) {
            
            $flash_msg = "Tidak dapat upload materi lagi.";
            $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('transaction/purchase/'.$session_id,'refresh');

        } else {

            if ( ! $this->upload->do_upload('file'))
            {
                $flash_msg = "Tidak dapat upload materi.";
                $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('transaction/purchase/'.$session_id,'refresh');

            } else {

                // get id where selected
                $id_selected_old = $this->manage_materi->_get_id_where_selected($order_id, $user_id);

                // change selected status
                // old one
                if ($id_selected_old != '') {
                    $data_old = array('selected' => 0);
                    $this->manage_materi->_update($id_selected_old, $data_old);
                }
                
                $data = array(
                    'order_id'      => $order_id,
                    'item_id'       => $item_id,
                    'user_id'       => $user_id,
                    'materi'        => $nmfile,
                    'created_at'    => time(),
                    'status'        => 1,
                    'selected'      => 1,
                    'download'      => 0
                );

                $this->manage_materi->_generate_thumbnail($nmfile);
                // insert to db
                $this->manage_materi->_insert($data);

                // Log activity transaction
                $data_act = array(
                    'user_id' => $user_id,
                    'order_id' => $order_id,
                    'item_id' => $item_id,
                    'subject' => 'Klien',
                    'activity' => 'upload materi',
                    'color' => 'success',
                    'activity_date' => time(),
                );
                App::Log_transaction($data_act);

                $flash_msg = "The image were successfully uploaded.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('transaction/purchase/'.$session_id,'refresh');
            }
        }
    }
}


function sendMail($complain_id = null) {
    $data = [];
    $this->load->module('manage_product');
    $this->load->module('store_categories');
    $this->load->module('store_labels');
    $this->load->module('store_sizes');
    $this->load->module('store_roads');
    $this->load->module('store_provinces');
    $this->load->module('store_cities');
    $this->load->module('timedate');
    $this->load->module('site_security');
    $this->load->module('manage_daftar');
    $this->load->module('store_orders');
    $this->load->module('manage_complain');
    $this->load->module('site_settings');

    $data_complains = $this->manage_complain->fetch_data_from_db($complain_id);
    $data['judul'] = $data_complains['headline'];
    $data['komplain'] = $data_complains['komplain_body'];
    $order_id = $data_complains['order_id'];
    // get item id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
    $prod = App::view_by_id($item_id);
    $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);
    $data['image_location'] = base_url().'marketplace/limapuluh/70x70/'.$prod->limapuluh;
    $data['image_location2'] = base_url().'marketplace/limapuluh/'.$prod->limapuluh;
    $data['alamat'] = $prod->item_title;
    $data['code'] = base_url().'marketplace/qr/'.$prod->qr_code;
    $data['prov'] = $this->store_provinces->get_name_from_province_id($prod->cat_prov);
    $data['kota'] = ucwords(strtolower($this->store_cities->get_name_from_city_id($prod->cat_city)));
    $data['jalan'] = $this->store_roads->get_name_from_road_id($prod->cat_road);
    $data['display'] = $this->manage_product->get_name_from_display_id($prod->cat_type);
    $data['jml_sisi'] = $this->manage_product->show_amount_side($prod->jml_sisi);
    $data['tipe_cahaya'] = $this->manage_product->get_name_from_light_id($prod->cat_light);
    $data['size'] = $this->store_sizes->get_name_from_size_id($prod->cat_size);
    $data['lat'] = $prod->lat;
    $data['lng'] = $prod->long;
    $data['ket_lokasi'] = $this->manage_product->show_ket_lokasi($prod->ket_lokasi);
    $data['prod_code'] = $prod->prod_code;

    $orders = $this->db->where('id', $order_id)->get('store_orders')->row();
    $data['durasi'] = $orders->duration;
    $data['price'] = $this->site_settings->currency_format2($orders->price);
    $data['user_id'] = $orders->shopper_id;
    $data['start'] = $this->timedate->get_nice_date($orders->start, 'indo'); 
    $data['end'] = $this->timedate->get_nice_date($orders->end, 'indo');
    $data['customer_name'] = $this->manage_daftar->_get_customer_name($orders->shopper_id);
    $data['no_transaksi'] = $orders->no_transaksi;
    $data['lokasi'] = $orders->item_title;

    $customer_name = $this->manage_daftar->_get_customer_name($orders->shopper_id);
    $no_transaksi = $orders->no_transaksi;

    $this->load->view('mail_complain', $data);
    
    // proses emailnya
    $recipient1 = 'felicia@wiklan.com';
    $recipient2 = 'webdeveloper@wiklan.com';

    $email = array($recipient1, $recipient2);

    $user = 'Admin';
    $mailTo = implode(', ', $email);
    
    $subjek = 'Komplain '.$customer_name.' '.$no_transaksi;

    // buat template
    $body = $this->load->view('mail_complain', $data, true);

    $this->load->library('email');
    $this->email->from('cs@wiklan.com', 'Sistem Wiklan');
    $this->email->to($mailTo);
    $this->email->subject($subjek);
    $this->email->message($body);
    $this->email->bcc('cs@wiklan.com');
    $this->email->cc('cs@wiklan.com');

    if($this->email->send() == false){
        show_error($this->email->print_debugger());
    } else {
        return TRUE;
    }
}

function komplain() {
    error_reporting(0);
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_complain');
    $this->site_security->_make_sure_logged_in();

    $submit = $this->input->post('submit', TRUE);
    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get item id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;

    if ($submit == "Submit") {

        // var_dump($_FILES['featured_image']['name'] == '');
        // die();

        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('headline', 'Judul', 'trim|required');
        $this->form_validation->set_rules('komplain', 'komplain', 'required');

        if ($this->form_validation->run() == TRUE) {
            $filename = $_FILES['featured_image']['name'];
            $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
            $nama_baru = str_replace(' ', '_', $new_filename);
        
            $nmfile = date("ymdHis").'_'.$nama_baru;
            
            $loc = './marketplace/komplain/';

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
                        $data = array(
                            'order_id' => $order_id,
                            'user_id' => $user_id,
                            'headline' => $this->input->post('headline', true),
                            'komplain_body' => $this->input->post('komplain', true),
                            'image' => $nmfile,
                            'created_at' => time(),
                        );
                        // insert to db
                        $this->manage_complain->_insert($data);
                        $complain_id = $this->manage_complain->get_max();
                        // send email
                        $this->sendMail($complain_id);

                        // Log activity transaction
                        $data_act = array(
                            'user_id' => $user_id,
                            'order_id' => $order_id,
                            'item_id' => $item_id,
                            'subject' => 'Klien',
                            'activity' => 'submit komplain',
                            'color' => 'danger',
                            'activity_date' => time(),
                        );
                        App::Log_transaction($data_act);

                        $flash_msg = "The komplain was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('transaction/purchase/'.$session_id);

                    } else {
                        $flash_msg = "Upload failed!.";
                        $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('transaction/purchase/'.$session_id);
                    }
                }
            } else {
                $data = array(
                    'order_id' => $order_id,
                    'user_id' => $user_id,
                    'headline' => $this->input->post('headline', true),
                    'komplain_body' => $this->input->post('komplain', true),
                    'created_at' => time(),
                );

                $this->manage_complain->_insert($data);
                $complain_id = $this->manage_complain->get_max();
                // send email
                $this->sendMail($complain_id);

                // Log activity transaction
                $data_act = array(
                    'user_id' => $user_id,
                    'order_id' => $order_id,
                    'item_id' => $item_id,
                    'subject' => 'Klien',
                    'activity' => 'submit komplain',
                    'color' => 'danger',
                    'activity_date' => time(),
                );
                App::Log_transaction($data_act);

                $flash_msg = "The komplain was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('transaction/purchase/'.$session_id);

            }

        }
    }
}

function ulas_lokasi() {
    $this->load->library('session');
    $this->load->module('review');
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $submit = $this->input->post('submit', TRUE);
    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');

    if ($submit == 'Submit') {
        // get id from session order
        $order_id = $this->store_orders->get_id_from_session_id($session_id);

        $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
        $prod_id = $item_id;
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

        // Log activity transaction
        $data_act = array(
            'user_id' => $user_id,
            'order_id' => $order_id,
            'item_id' => $item_id,
            'subject' => 'Klien',
            'activity' => 'review lokasi',
            'color' => 'alert',
            'activity_date' => time(),
        );
        App::Log_transaction($data_act);

        if ($this->review->_insert($data)) {
            $flash_msg = "berhasil menambahkan ulasan.";
            $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('transaction/purchase/'.$session_id,'refresh');
        } else {
            $flash_msg = "Gagal menambahkan ulasan!.";
            $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('transaction/purchase/'.$session_id);
        }
    }
    
}

 
function selling() {
    $this->load->library('session');
    $this->load->helper('tgl_indo');
    $this->load->module('site_security');
    $this->load->module('store_orders');

    $this->site_security->_make_sure_logged_in();

    $user_id = $this->session->userdata('user_id');
    $col = 'shop_id';
    $val = $user_id;
    $mysql_query = "SELECT * FROM store_orders WHERE shop_id = $val ORDER BY id DESC";
    $data['campaign'] = $this->_custom_query($mysql_query); //$this->store_orders->get_where_custom($col, $val);

    $data['view_file'] = "selling";
    $this->load->module('templates');
    $this->templates->market($data);
}

function purchase($session_id) {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('timedate');
    $this->load->module('site_settings');
    $this->load->module('store_categories');
    $this->site_security->_make_sure_logged_in();

    $this->load->library('session');
    // get id from session order
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    $data_order = $this->db->where('id', $order_id)->get('store_orders')->row();
    // get item id 
    $item_id = $data_order->item_id;
    // get item category
    $category_item = $this->db->where('id', $item_id)->get('store_item')->row()->cat_prod;
    // cek kategori
    $category_name = $this->store_categories->get_name_from_category_id($category_item);

    if (strtolower($category_name) == 'videotron') {
        $view_file = 'detail_purchase_videotron';
    } else {
        $view_file = 'detail_purchase';
    }
    // get all data order
    $data['lokasi'] = $data_order->item_title;
    $data['no_transaksi'] = $data_order->no_transaksi;
    $data['harga'] = $this->site_settings->currency_rupiah($data_order->price);
    $data['durasi'] = $data_order->duration;
    $data['awal_tayang'] = $this->timedate->get_nice_date($data_order->start, 'ok');
    $data['akhir_tayang'] = $this->timedate->get_nice_date($data_order->end, 'ok');

    // untuk icon progrees
    $data['order_id'] = $order_id;
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
    $user_id = $this->db->where('id', $order_id)->get('store_orders')->row()->shopper_id;
    $data['approved'] = $this->db->where('id', $order_id)->get('store_orders')->row()->approved;

    $data['upl_materi'] = App::get_materi($order_id, $item_id, $user_id);
    $data['dl_materi']= App::get_materi_download($order_id, $item_id, $user_id);

    $data['user_id'] = $this->session->userdata('user_id');
    $data['id'] = $session_id;

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = $view_file;
    $this->load->module('templates');
    $this->templates->market($data);
}

function sell($session_id) {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('timedate');
    $this->load->module('site_settings');
    $this->load->module('store_categories');
    $this->site_security->_make_sure_logged_in();

    $this->load->library('session');
    // get id from session order
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    $data_order = $this->db->where('id', $order_id)->get('store_orders')->row();
    // get item id 
    $item_id = $data_order->item_id;
    // get item category
    $category_item = $this->db->where('id', $item_id)->get('store_item')->row()->cat_prod;
    // cek kategori
    $category_name = $this->store_categories->get_name_from_category_id($category_item);

    if (strtolower($category_name) == 'videotron') {
        $view_file = 'detail_sell_videotron';
    } else {
        $view_file = 'detail_sell';
    }
    // get all data order
    $data['lokasi'] = $data_order->item_title;
    $data['no_transaksi'] = $data_order->no_transaksi;
    $data['harga'] = $this->site_settings->currency_rupiah($data_order->price);
    $data['durasi'] = $data_order->duration;
    $data['awal_tayang'] = $this->timedate->get_nice_date($data_order->start, 'ok');
    $data['akhir_tayang'] = $this->timedate->get_nice_date($data_order->end, 'ok');

    // untuk icon progrees
    $data['order_id'] = $order_id;
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
    $user_id = $this->db->where('id', $order_id)->get('store_orders')->row()->shopper_id;
    $data['approved'] = $this->db->where('id', $order_id)->get('store_orders')->row()->approved;

    $data['upl_materi'] = App::get_materi($order_id, $item_id, $user_id);
    $data['dl_materi']= App::get_materi_download($order_id, $item_id, $user_id);

    $data['user_id'] = $this->session->userdata('user_id');
    $data['id'] = $session_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = $view_file;
    $this->load->module('templates');
    $this->templates->market($data);
}

function get($order_by)
{
    $this->load->model('mdl_transaction');
    $query = $this->mdl_transaction->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_transaction');
    $query = $this->mdl_transaction->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_transaction');
    $query = $this->mdl_transaction->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_transaction');
    $query = $this->mdl_transaction->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_transaction');
    $this->mdl_transaction->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_transaction');
    $this->mdl_transaction->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_transaction');
    $this->mdl_transaction->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_transaction');
    $count = $this->mdl_transaction->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_transaction');
    $max_id = $this->mdl_transaction->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_transaction');
    $query = $this->mdl_transaction->_custom_query($mysql_query);
    return $query;
}

}