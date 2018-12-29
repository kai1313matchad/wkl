<?php
class Store_profile extends MX_Controller 
{

    var $path_big = './marketplace/photo_profil/';
    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'user_agent'));
        $this->form_validation->CI=& $this;
        $this->load->helper(array('text', 'tgl_indo_helper'));
        $this->load->model('App');
    }

    function next($user_code) {
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_logged_in();

        // get id user 
        $update_id = $this->manage_daftar->get_id_from_code($user_code);

        // check availability doc ktp & npwp
        $result = $this->check_document($update_id);

        if ($result == 'FALSE') {
            $flash_msg = "Alert ! you must upload KTP and NPWP.";
            $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_profile/upload_document/'.$user_code);
        } else {
            redirect('store_profile');
        }
    }

    function check_document($user_id) {
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_logged_in();

        $data = $this->manage_daftar->fetch_data_from_db($user_id);
        $ktp = $data['ktp'];
        $npwp = $data['npwp'];

        if ($ktp != '' && $npwp != '') {
            $status = 'TRUE';
        } else {
            $status = 'FALSE';
        }

        return $status;

    }

    public function index()
    {
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $user_id = $this->session->userdata('user_id');
        $this->load->module('manage_daftar');
        $query = $this->manage_daftar->get_where($user_id);
        foreach ($query->result() as $row) {
            // pecah jadi array
            $tgl_lahir = explode('-', $row->tgl_lahir);
            $data['tgl'] = $tgl_lahir[1];
            $data['bln'] = $tgl_lahir[2];
            $data['thn'] = $tgl_lahir[0];

            $data['id'] = $row->id;
            $data['username'] = $row->username;
            $data['company'] = $row->company;
            $data['email'] = $row->email;
            $data['no_telp'] = $row->no_telp;
            $data['alamat'] = $row->alamat;
            $data['gender'] = $row->gender;
            $data['tgl_lahir'] = $row->tgl_lahir;
            $data['status'] = $row->status;
            $data['waktu_dibuat'] = $row->waktu_dibuat;
            $data['pic'] = $row->pic;
            $data['update_id'] = $row->user_code;
            $data['ktp'] = $row->ktp;
            $data['npwp'] = $row->npwp;
            $data['atasnama'] = $row->atasnama;
            $data['bank'] = $row->bank;
            $data['rekening'] = $row->rekening;
        }

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function upload_document($user_code) {
        if (!isset($user_code)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->module('manage_daftar');

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $user_code;

        // get id user 
        $update_id = $this->manage_daftar->get_id_from_code($user_code);

        // check availability doc ktp & npwp
        $result = $this->check_document($update_id);

        if ($result == 'FALSE') {
            $data['rerun'] = 'true';
            // $flash_msg = "Alert ! you must upload KTP and NPWP.";
            // $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            // $this->session->set_flashdata('item', $value);
        } else {
            $data['rerun'] = 'false';
        }

        $db = $this->manage_daftar->fetch_data_from_db($update_id);
        $data['ktp'] = $db['ktp'];
        $data['npwp'] = $db['npwp'];
        $data['user_code'] = $user_code;

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "upload_document";
        $this->load->module('templates');
        $this->templates->market($data);   
    }

   

    function process_upload() {
        error_reporting(0);
        $this->load->module('site_security');
        $this->load->module('manage_product');
        $this->load->module('manage_daftar');

        $data_json = $this->input->post('objArr');

        $result = json_decode($data_json);

        $update_id = $result[0]->segment;
        $loc = $this->manage_product->location($result[0]->type);

        $token = $this->site_security->generate_random_string(6);

        // ganti titik dengan _
        $filename = $_FILES['file']['name'];
        $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
        $nama_baru = str_replace(' ', '_', $new_filename);
        
        $nmfile = date("ymdHis").'_'.$nama_baru;

        $update_data[$result[0]->type] = $nmfile;

        $this->manage_daftar->_update_upload($update_id, $update_data);

        $config['upload_path'] = $loc; //$this->path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '20048'; //maksimum besar file 2M
        $config['max_width']  = '2600'; //lebar maksimum 1288 px
        $config['max_height']  = '2768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $location = base_url().$loc.$nmfile;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {

            if ($result[0]->type == 'limapuluh' || $result[0]->type == 'seratus' || $result[0]->type == 'duaratus') {
                $this->_compress_image($nmfile, $result[0]->type);
                $this->_create_thumb($nmfile, $result[0]->type);
            }

            $results['gambar'] =  '<img src="'.$location.'" height="150" width="225" id="sumber" class="img-thumbnail" data-id="'.$token.'" data-type="'.$result[0]->type.'" />';
            $results['msg'] = 'sukses';
            $results['token'] = $token;
            $results['name'] = $nmfile; 
            $results['type'] = $result[0]->type;
            echo json_encode($results);
        } else {
            echo $this->upload->display_errors();
        }
    }

    function do_upload()
    {
        $user_id = $this->session->userdata('user_id');
        if (!is_numeric($user_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_logged_in();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('store_profile');
        }

        $config['upload_path']          = $this->path_big; //'./LandingPageFiles/big_pics/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
            $data['headline'] = "Upload error";
            $data['update_id'] = $user_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "manage_banner";
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->market($data);
        }
        else
        {
    
            $data = array('upload_data' => $this->upload->data());

            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];

            //update database
            $update_data['pic'] = $file_name;
            $this->manage_daftar->_update($user_id, $update_data);

            // Log activity
            $data_pro = array(
                'module' => 'update foto profil',
                'user' => $this->session->userdata('user_id'),
                'activity' => 'update_foto_profil',
                'icon' => 'fa-usd',
               
            );
            App::Log($data_pro);

            $flash_msg = "The image were successfully uploaded.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            $data['headline'] = "Upload Success";
            $data['update_id'] = $user_id;
            $data['flash'] = $this->session->flashdata('item');
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->market($data);
        }
    }

    function load() {
        $this->load->module('manage_product');

        $update_id = $this->input->post('id');
        $type = $this->input->post('tipe');

        // get file name form db
        $nmfile = $this->file_select($type, $update_id);

        // get location name
        $loc = $this->manage_product->location($type);

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

    function file_select($type, $user_code) {
        $this->load->module('manage_daftar');

        // get id user 
        $update_id = $this->manage_daftar->get_id_from_code($user_code);
        // cek image
        $data = $this->manage_daftar->fetch_data_from_db($update_id);
        $ktp = $data['ktp'];
        $npwp = $data['npwp'];

        switch ($type) {
            case 'ktp':
                if (!empty($ktp)) {
                    $file = $ktp;
                } else {
                    $file = '';
                }
            break;

            case 'npwp':
                if (!empty($npwp)) {
                    $file = $npwp;
                } else {
                    $file = '';
                }
            break;
        }

        return $file;
        // var_dump($file);
        // echo $file;
    }

    function do_delete() {
        $this->load->module('manage_product');
        $this->load->module('manage_daftar');

        $code = $this->input->post('code');
        $type = $this->input->post('tipe');
        $name = $this->input->post('name');

        // get id from code

        $id = $this->manage_daftar->get_id_from_code($code);

        // check available
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where($type, $name);

        $query = $this->db->get('kliens');

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $file = $row[$type];
            }

            $data = array();
            $data[$type] = '';

            $this->db->where('id', $id);
            $this->db->update('kliens', $data);

            // get location
            $loc = $this->manage_product->location($type);

            $pic_path = $loc.$file;
            $pic_thumb_path = $loc.'70x70/'.$file;
            $pic_rez_path = $loc.'900x500/'.$file;

            if (file_exists($pic_path)) {
                unlink($pic_path);

                if ($type == 'limapuluh' || $type == 'seratus' || $type == 'duaratus') {
                    unlink($pic_thumb_path);
                    unlink($pic_rez_path);
                }
                
                // delete berhasil
                $msg = 'gambar berhasil didelete';
                echo json_encode($msg);
            } else {
                $msg = 'tidak ada gambar';
                echo json_encode($msg);
            }

        }
    }

    function upload_image() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $user_id = $this->session->userdata('user_id');
        
        $data['headline'] = "Upload Foto / Logo";
        $data['update_id'] = $user_id;
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_banner";
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->market($data);   
    }

    function update_pword() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_logged_in();

        $user_id = $this->session->userdata('user_id');
        $submit = $this->input->post('submit');

        if (!is_numeric($user_id)) {
            redirect('store_profile');
        } elseif ($submit == "Cancel") {
            redirect('store_profile');
        }
        
        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pword', 'Password', 'trim|required|min_length[7]|max_length[35]');
            $this->form_validation->set_rules('repeat_pword', 'Repeat Password', 'trim|required|matches[pword]');

            if ($this->form_validation->run() == TRUE) {
                // Log activity
                $data_pro = array(
                    'module' => 'update password',
                    'user' => $this->session->userdata('user_id'),
                    'activity' => 'update_password',
                    'icon' => 'fa-usd',
                   
                );
                App::Log($data_pro);

                $pword = $this->input->post('pword', TRUE);
                $this->load->module('site_security');
                $data['pword'] = $this->site_security->_hash_string($pword);

                $this->manage_daftar->_update($user_id, $data);
                $flash_msg = "The account password was successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_profile');
                
            }
        }

        $data['headline'] = "Update Akun Password";
        $data['update_id'] = $user_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "update_pword";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function update_profil() {
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_logged_in();
        $user_id = $this->session->userdata('user_id');
        $submit = $this->input->post('submit');
        $user_code = $this->input->post('user_code');

        if ($submit == "Cancel") {
            redirect('store_profile');
        }

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Nama', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('no_telp', 'Telpon', 'trim|required|numeric|min_length[5]|max_length[13]');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($user_id)) {
                    // Log activity
                    $data_pro = array(
                        'module' => 'update profil',
                        'user' => $this->session->userdata('user_id'),
                        'activity' => 'update profil',
                        'icon' => 'fa-usd',
                       
                    );
                    App::Log($data_pro);

                    $this->manage_daftar->_update($user_id, $data);
                    $flash_msg = "The client were successfully updated.";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);

                    if ($this->check_document($user_id) == 'FALSE') {
                        redirect('store_profile/upload_document/'.$user_code);
                    } else {
                        redirect('store_profile');
                    }
                }
            } else {
                $flash_msg = "The client were failed updated.";
                $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_profile');
            }
        }
    }

    function fetch_data_from_post() {
        $data['username'] = $this->input->post('username', true);
        $data['company'] = $this->input->post('company', true);
        $data['email'] = $this->input->post('email', true);
        $data['no_telp'] = $this->input->post('no_telp', true);
        $data['alamat'] = $this->input->post('alamat', true);
        $data['gender'] = $this->input->post('gender', true);
        $data['atasnama'] = $this->input->post('atasnama', true);
        $data['rekening'] = $this->input->post('rekening', true);
        $data['bank'] = $this->input->post('bank', true);
        $tgl = $this->input->post('tgl_mulai', true);
        $bulan = $this->input->post('bln_mulai', true);
        $tahun = $this->input->post('thn_mulai', true);
        $data['tgl_lahir'] = $tahun.':'.$bulan.':'.$tgl;
        return $data;
    }

}