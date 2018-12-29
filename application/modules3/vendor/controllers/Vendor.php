<?php
class Vendor extends MX_Controller 
{

    var $mailFrom;
    var $mailPass;

    // var $mailFrom = 'systemmatch@match-advertising.com';
    // var $mailPass = 'Rahasia2017';

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
        $mailFrom = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
        $mailPass = $this->db->get_where('settings' , array('type'=>'password'))->row()->description;
    }

    public function index()
    {
        $this->load->library('session');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');

        $data['prov'] = $this->store_provinces->get('id_prov');
        $data['city'] = $this->store_cities->get('id_kab');
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "vendor";
        $this->load->module('templates');
        $this->templates->market($data);  
    }

    function send_mail_confirmation($email, $username, $vendor_cat) {

        // select vendor 
        switch ($vendor_cat) {
            case 1:
                $vendor = 'Asuransi';
                break;

            case 2:
                $vendor = 'Produksi';
                break;    
            
            default:
                $vendor = 'Pengurusan & Perijinan';
                break;
        }

        // $config = Array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => $this->mailFrom,
        //     'smtp_pass' => $this->mailPass,
        //     'mailtype'  => 'html', 
        //     'charset'   => 'utf-8'
        // );

        $user = 'Customer Support';
        $mailTo = $email;
        $message = '<!DOCTYPE html PUBLIC ".//W3C//DTD XHTML 1.0 Strct//EN"
                    "http://www.w3.org/TR/xhtml1-strict.dtd"><html>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    </head><body>';
        $message .= '<strong><p>Dear '.$username.',</p></strong>';
        $message .= '<p>Selamat perusahaan anda berhasil mendaftar sebagai Vendor di Wiklan.com. Pastikan data anda masukan sudah benar dan valid.</p> <p>Jika perlu bantuan bisa <strong><a href="' . base_url() .'templates/home#contact">Hubungi Kami</a></strong> perihal perbarui data vendor atau pertanyaan lain terkait kerja sama.</p><br>';
        
        $message .= '<p><strong>Terima Kasih, Salam Hormat.</strong></p>';
        $message .= '<p>Customer Support </p><br>';
        $message .= '<em><p>*Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.</p></em>';
        $message .= '</body></html>';           
        $subjek = 'Wiklan - Daftar Vendor '.$vendor;

        // $this->load->library('email');
        // $this->email->initialize($config);
        // $this->email->set_newline("\r\n");

        // $this->email->set_header('MIME-Version', '1.0; charset= utf-8');
        // $this->email->set_header('Content-type', 'text/html');
        // $this->email->from($this->mailFrom, 'Konfirmasi');
        // $this->email->to($mailTo);
        // $this->email->cc($this->mailFrom);
        // $this->email->subject($subjek);
        // $this->email->message($message);   

        $this->load->library('email');
        $this->email->from('cs@wiklan.com', 'Sistem Wiklan');
        $this->email->to($mailTo);
        $this->email->subject($subjek);
        $this->email->message($message);
        $this->email->bcc('cs@wiklan.com');
        $this->email->cc('cs@wiklan.com');
        // $this->email->send();

        //$this->email->message(strip_tags($message));
        if($this->email->send() == false){
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
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

    function do_delete() {
        // $code = $this->input->post('id');
        $type = $this->input->post('tipe');
        $name = $this->input->post('name');

        // get id from code

        $id = $this->input->post('id');

        // check available
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where($type, $name);

        $query = $this->db->get('vendor');

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $file = $row[$type];
            }

            $data = array();
            $data[$type] = '';

            $this->db->where('id', $id);
            $this->db->update('vendor', $data);

            // get location
            $loc = $this->location($type);

            $file_path = $loc.$file;

            if (file_exists($file_path)) {
                unlink($file_path);
                
                // delete berhasil
                $msg = 'file berhasil didelete';
                echo json_encode($msg);
            } else {
                $msg = 'tidak ada file';
                echo json_encode($msg);
            }

        }
    }

    function file_select($type, $update_id) {
        // cek image
        $data = $this->fetch_data_from_db($update_id);
        $siup = $data['SIUP'];
        $tdp = $data['TDP'];
        $npwp = $data['NPWP'];
        $akte = $data['Akte'];

        switch ($type) {
            case 'SIUP':
                if (!empty($siup)) {
                    $file = $siup;
                } else {
                    $file = '';
                }
            break;

            case 'TDP':
                if (!empty($tdp)) {
                    $file = $tdp;
                } else {
                    $file = '';
                }
            break;

            case 'NPWP':
                if (!empty($npwp)) {
                    $file = $npwp;
                } else {
                    $file = '';
                }
            break;
            
            default:
                if (!empty($akte)) {
                    $file = $akte;
                } else {
                    $file = '';
                }
            break;
        }

        return $file;
        // var_dump($file);
        // echo $file;
    }

    function load() {

        $update_id = $this->input->post('id');
        $type = $this->input->post('tipe');

        // get file name form db
        $nmfile = $this->file_select($type, $update_id);

        // get location name
        $loc = $this->location($type);

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

    function process_upload() {
        $this->load->module('site_security');

        $data_json = $this->input->post('objArr');

        $result = json_decode($data_json);

        $update_id = $result[0]->segment;
        $loc = $this->location($result[0]->type);

        $token = $this->site_security->generate_random_string(6);

        $nama_baru = str_replace(' ', '_', $_FILES['file']['name']);
        
        $nmfile = date("ymdHis").'_'.$nama_baru;

        $update_data[$result[0]->type] = $nmfile;

        $this->_update($update_id, $update_data);

        $config['upload_path']          = $loc; //$this->path;
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size'] = '0'; //maksimum besar file 2M
        $config['max_width']  = '0'; //lebar maksimum 1288 px
        $config['max_height']  = '0'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $location = base_url().$loc.$nmfile;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $results['gambar'] =  '<img src="'.$location.'" height="150" width="225" id="sumber" class="img-thumbnail" data-id="'.$token.'" data-type="'.$result[0]->type.'" />';
            $results['msg'] = 'sukses';
            $results['token'] = $token; 
            $results['type'] = $result[0]->type;
            echo json_encode($results);
        } else {
            echo $this->upload->display_errors();
        }
    }

    function upload_file($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        
        $data['headline'] = "Upload File";
        $data['update_id'] =  $update_id;
        $data['code'] = $data['code'];
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_file";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

    function download_file($type, $update_id) {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        header("Content-type:application/image");

        $data = $this->fetch_data_from_db($update_id);
        $nama = $data[$type];
        $loc = $this->location($type);
        $path = base_url().$loc;

        $name = $path.$nama;
        $data = file_get_contents($path.$nama);
        $this->load->helper('file');
        $file_name = $nama;

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file_name, $data);
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $mysql_query = "SELECT * FROM vendor ORDER BY id DESC";
        $data['query'] = $this->_custom_query($mysql_query);

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);

    }

    function define_cat_name($cat) {
        switch ($cat) {
            case 1:
                $kate = 'Vendor Asuransi';
                break;

            case 2:
                $kate = 'Vendor Produksi';
                break;

            default:
                $kate = 'Vendor Pengurusan & Perijinan';
                break;
        }

        return $kate;
    }

    function location($type) {
        switch ($type) {
            // foto dokumen
            case 'SIUP':
                $loc = './marketplace/vendor/SIUP/';
                break;

            case 'TDP':
                $loc = './marketplace/vendor/TDP/';
                break;
                
            case 'NPWP':
                $loc = './marketplace/vendor/NPWP/';
                break;   
  
            // akte
            default:
                $loc = './marketplace/vendor/Akte/';
                break;
        }

        $path = $loc;
        return $path;
    }

    function add_vendor_produksi() {
        $this->load->module('site_security');
        $this->load->library('session');
        $this->load->library('upload');

        $submit = $this->input->post('submit');
        if ($submit == "Submit") {
            // process the form
            $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[204]');
            $this->form_validation->set_rules('telp', 'No telpon', 'required|numeric');
            $this->form_validation->set_rules('email', 'Alamat email', 'trim|required|valid_email');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();
                // generate random code
                $data['code'] = $this->site_security->generate_random_string(12);
                $this->_insert($data);
                $this->send_mail_confirmation($this->input->post('email', true), $this->input->post('nama', true), $this->input->post('vendor_cat', true));

                if (count($_FILES['multipleFiles']['name']) > 0) {
               
                    $number_of_files = count($_FILES['multipleFiles']['name']);

                    $id = $this->get_max();
                    $files = $_FILES;
                    $loca = array('./marketplace/vendor/SIUP/', './marketplace/vendor/TDP/', './marketplace/vendor/NPWP/', './marketplace/vendor/akte/');
                    $column = array('SIUP', 'TDP', 'NPWP', 'Akte');
                    
                    for ($i=0; $i < $number_of_files ; $i++) {
                        // $nama_baru = str_replace(' ', '_', $_FILES['multipleFiles']['name'][$i]);
                        $nmfile = date("ymdHis").'_'.$files['multipleFiles']['name'][$i];

                        $_FILES['multipleFiles']['name'] = $files['multipleFiles']['name'][$i];
                        $_FILES['multipleFiles']['type'] = $files['multipleFiles']['type'][$i];
                        $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                        $_FILES['multipleFiles']['error'] = $files['multipleFiles']['error'][$i];
                        $_FILES['multipleFiles']['size'] = $files['multipleFiles']['size'][$i];

                        $config['upload_path']   = $loca[$i];
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = '0';
                        $config['max_size'] = '0';
                        $config['max_size'] = '0';
                        $config['overwrite'] = FALSE;
                        $config['remove_spaces'] = TRUE;
                        $config['file_name'] = $nmfile;

                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('multipleFiles')){
                            $error = array('error' => $this->upload->display_errors());
                        }   
                        else{
                            $data = array('upload_data' => $this->upload->data());
                        }   

                        // update database
                        $this->db->update('vendor', array( $column[$i] => $nmfile ), array('id' => $id));
                    }
                }

                $flash_msg = "Selamat data vendor berhasil dikirim ke admin wiklan.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('vendor');
            } else {
                $flash_msg = "The vendor was failed added.";
                $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('vendor');
            }
        }
    }

    function add_vendor_asuransi() {
        $this->load->module('site_security');
        $this->load->library('session');
        $this->load->library('upload');

        $submit = $this->input->post('submit');
        if ($submit == "Submit") {
            // process the form
            $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[204]');
            $this->form_validation->set_rules('telp', 'No telpon', 'required|numeric');
            $this->form_validation->set_rules('email', 'Alamat email', 'trim|required|valid_email');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();
                // generate random code
                $data['code'] = $this->site_security->generate_random_string(12);
                $this->_insert($data);
                $this->send_mail_confirmation($this->input->post('email', true), $this->input->post('nama', true), $this->input->post('vendor_cat', true));

                if (count($_FILES['multipleFiles']['name']) > 0) {
               
                    $number_of_files = count($_FILES['multipleFiles']['name']);

                    $id = $this->get_max();
                    $files = $_FILES;
                    $loca = array('./marketplace/vendor/SIUP/', './marketplace/vendor/TDP/', './marketplace/vendor/NPWP/', './marketplace/vendor/akte/');
                    $column = array('SIUP', 'TDP', 'NPWP', 'Akte');
                    
                    for ($i=0; $i < $number_of_files ; $i++) {
                        // $nama_baru = str_replace(' ', '_', $_FILES['multipleFiles']['name'][$i]);
                        $nmfile = date("ymdHis").'_'.$files['multipleFiles']['name'][$i];

                        $_FILES['multipleFiles']['name'] = $files['multipleFiles']['name'][$i];
                        $_FILES['multipleFiles']['type'] = $files['multipleFiles']['type'][$i];
                        $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                        $_FILES['multipleFiles']['error'] = $files['multipleFiles']['error'][$i];
                        $_FILES['multipleFiles']['size'] = $files['multipleFiles']['size'][$i];

                        $config['upload_path']   = $loca[$i];
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = '0';
                        $config['max_size'] = '0';
                        $config['max_size'] = '0';
                        $config['overwrite'] = FALSE;
                        $config['remove_spaces'] = TRUE;
                        $config['file_name'] = $nmfile;

                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('multipleFiles')){
                            $error = array('error' => $this->upload->display_errors());
                        }   
                        else{
                            $data = array('upload_data' => $this->upload->data());
                        }   

                        // update database
                        $this->db->update('vendor', array( $column[$i] => $nmfile ), array('id' => $id));
                    }
                }

                $flash_msg = "Selamat data vendor berhasil dikirim ke admin wiklan.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('vendor');
            } else {
                $flash_msg = "The vendor was failed added.";
                $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('vendor');
            }
        }
    }

    function add_vendor() {
        $this->load->module('site_security');
        $this->load->library('session');
        $this->load->library('upload');

        $submit = $this->input->post('submit');

        if ($submit == "Submit") {
            // process the form
            // $count = count($_FILES['multipleFiles']['name']);
            // echo "<pre>";
            // echo print_r($_FILES['multipleFiles']);
            // echo "</pre>";

            // echo "<br>";
            // echo $count;

            // echo "<hr>";

            // $files = $_FILES;
            // for ($i=0; $i < $count ; $i++) {
            //     // check nama file
            //     if ($files['multipleFiles']['name'][$i] != '') {
            //         $nmfile = date("ymdHis").'_'.$files['multipleFiles']['name'][$i];
            //     } else {
            //         $nmfile = '';
            //     }

            //     echo $nmfile;
            //     echo "<br>";
            // }



            // die();
           
            $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[204]');
            $this->form_validation->set_rules('telp', 'No telpon', 'required|numeric');
            $this->form_validation->set_rules('email', 'Alamat email', 'trim|required|valid_email');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');

            // if ($_FILES['siup']) {
            //     $this->form_validation->set_rules('siup', 'SIUP', 'required|callback_upload_image_siup');
            // }

            // if ($_FILES['tdp']) {
            //     $this->form_validation->set_rules('tdp', 'TDP', 'required|callback_upload_image_tdp');
            // }

            // if ($_FILES['npwp']) {
            //     $this->form_validation->set_rules('npwp', 'NPWP', 'required|callback_upload_image_npwp');
            // }

            // if ($_FILES['akte']) {
            //     $this->form_validation->set_rules('akte', 'Akte', 'required|callback_upload_image_akte');
            // }
            
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();
                // generate random code
                $data['code'] = $this->site_security->generate_random_string(12);

                $this->_insert($data);
                $this->send_mail_confirmation($this->input->post('email', true), $this->input->post('nama', true), $this->input->post('vendor_cat', true));

                if (count($_FILES['multipleFiles']['name']) > 0) {
               
                    $number_of_files = count($_FILES['multipleFiles']['name']);

                    $id = $this->get_max();
                    $files = $_FILES;
                    $loca = array('./marketplace/vendor/SIUP/', './marketplace/vendor/TDP/', './marketplace/vendor/NPWP/', './marketplace/vendor/akte/');
                    $column = array('SIUP', 'TDP', 'NPWP', 'Akte');
                    
                    for ($i=0; $i < $number_of_files ; $i++) {
                        // $nama_baru = str_replace(' ', '_', $_FILES['multipleFiles']['name'][$i]);
                        // check nama file
                        if ($files['multipleFiles']['name'][$i] != '') {
                            $nmfile = date("ymdHis").'_'.$files['multipleFiles']['name'][$i];
                        } else {
                            $nmfile = '';
                        }
                        

                        $_FILES['multipleFiles']['name'] = $files['multipleFiles']['name'][$i];
                        $_FILES['multipleFiles']['type'] = $files['multipleFiles']['type'][$i];
                        $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                        $_FILES['multipleFiles']['error'] = $files['multipleFiles']['error'][$i];
                        $_FILES['multipleFiles']['size'] = $files['multipleFiles']['size'][$i];

                        $config['upload_path']   = $loca[$i];
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = '0';
                        $config['max_size'] = '0';
                        $config['max_size'] = '0';
                        $config['overwrite'] = FALSE;
                        $config['remove_spaces'] = TRUE;
                        $config['file_name'] = $nmfile;

                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('multipleFiles')){
                            $error = array('error' => $this->upload->display_errors());
                        }   
                        else{
                            $data = array('upload_data' => $this->upload->data());
                        }   

                        // update database
                        $this->db->update('vendor', array( $column[$i] => $nmfile ), array('id' => $id));
                    }
                }

                // if ($_FILES['siup']) {
                //     $this->form_validation->set_rules('siup', 'SIUP', 'required|callback_upload_image_siup['.$id.']');
                // }

                // if ($_FILES['tdp']) {
                //     $this->form_validation->set_rules('tdp', 'TDP', 'required|callback_upload_image_tdp['.$id.']');
                // }

                // if ($_FILES['npwp']) {
                //     $this->form_validation->set_rules('npwp', 'NPWP', 'required|callback_upload_image_npwp['.$id.']');
                // }

                // if ($_FILES['akte']) {
                //     $this->form_validation->set_rules('akte', 'Akte', 'required|callback_upload_image_akte['.$id.']');
                // }

                //////////////////////////////////////////////////////////////////////////////////////////////////

                // if ($_FILES['siup']) {
                //     $loc = './marketplace/vendor/SIUP/';
                //     $column = 'SIUP';
                //     $name_input = 'siup';
                // }

                // if ($_FILES['tdp']) {
                //     $loc = './marketplace/vendor/TDP/';
                //     $column = 'TDP';
                //     $name_input = 'tdp';
                // }

                // if ($_FILES['npwp']) {
                //     $loc = './marketplace/vendor/NPWP/';
                //     $column = 'NPWP';
                //     $name_input = 'npwp';
                // }

                // if ($_FILES['akte']) {
                //     $loc = './marketplace/vendor/Akte/';
                //     $column = 'Akte';
                //     $name_input = 'akte';
                // }

                // $nama_baru = str_replace(' ', '_', $_FILES[$name_input]['name']);
            
                // $nmfile = date("ymdHis").'_'.$nama_baru;

                // $config['upload_path'] = $loc; //$this->path;
                // $config['allowed_types'] = 'gif|jpg|png';
                // $config['max_size'] = '20048'; //maksimum besar file 2M
                // $config['max_width'] = '1600'; //lebar maksimum 1288 px
                // $config['max_height'] = '768'; //tinggi maksimu 768 px    
                // $config['file_name'] = $nmfile; //nama yang terupload nantinya

                // $this->load->library('upload', $config);

                // // update database
                // $this->db->update('vendor', array($column => $nmfile), array('id' => $id));

                // if (!$this->upload->do_upload('siup')) {
                //     $error = array('error' => $this->upload->display_errors());
                // } 

                /////////////////////////////////////////////////////////////////////////////////////////////////
                
                // if ($_FILES['siup']['size'] > 0) {

                //     $nama_baru = str_replace(' ', '_', $_FILES['siup']['name']);
                
                //     $nmfile = date("ymdHis").'_'.$nama_baru;
                //     $type = 'SIUP';
                //     $loc = $this->location($type);

                //     $config['upload_path'] = './marketplace/vendor/SIUP/'; //$this->path;
                //     $config['allowed_types'] = 'gif|jpg|png';
                //     $config['max_size'] = '20048'; //maksimum besar file 2M
                //     $config['max_width'] = '1600'; //lebar maksimum 1288 px
                //     $config['max_height'] = '768'; //tinggi maksimu 768 px    
                //     $config['file_name'] = $nmfile; //nama yang terupload nantinya

                //     $this->load->library('upload', $config);

                //     // update database
                //     $this->db->update('vendor', array('SIUP' => $nmfile), array('id' => $id));

                //     if (!$this->upload->do_upload('siup')) {
                //         $error = array('error' => $this->upload->display_errors());
                //     } 
                // }
               

                // if ($_FILES['tdp']['size'] > 0) {
                //     $nama_baru = str_replace(' ', '_', $_FILES['tdp']['name']);
                
                //     $nmfile = date("ymdHis").'_'.$nama_baru;
                //     $type = 'TDP';
                //     $loc = $this->location($type);

                //     $config['upload_path'] = './marketplace/vendor/TDP/'; //$this->path;
                //     $config['allowed_types'] = 'gif|jpg|png';
                //     $config['max_size'] = '20048'; //maksimum besar file 2M
                //     $config['max_width'] = '1600'; //lebar maksimum 1288 px
                //     $config['max_height'] = '768'; //tinggi maksimu 768 px    
                //     $config['file_name'] = $nmfile; //nama yang terupload nantinya

                //     $this->load->library('upload', $config);

                //     // update database
                //     $this->db->update('vendor', array('TDP' => $nmfile), array('id' => $id));

                //     if (!$this->upload->do_upload('tdp')) {
                //         $error = array('error' => $this->upload->display_errors());
                //     }
                // }
              

                // if ($_FILES['npwp']['size'] > 0) {
                //     $nama_baru = str_replace(' ', '_', $_FILES['npwp']['name']);
                
                //     $nmfile = date("ymdHis").'_'.$nama_baru;
                //     $type = 'NPWP';
                //     $loc = $this->location($type);

                //     $config['upload_path'] = './marketplace/vendor/NPWP/'; //$this->path;
                //     $config['allowed_types'] = 'gif|jpg|png';
                //     $config['max_size'] = '20048'; //maksimum besar file 2M
                //     $config['max_width'] = '1600'; //lebar maksimum 1288 px
                //     $config['max_height'] = '768'; //tinggi maksimu 768 px    
                //     $config['file_name'] = $nmfile; //nama yang terupload nantinya

                //     $this->load->library('upload', $config);

                //     // update database
                //     $this->db->update('vendor', array('NPWP' => $nmfile), array('id' => $id));

                //     if (!$this->upload->do_upload('npwp')) {
                //         $error = array('error' => $this->upload->display_errors());
                //     }
                // }


                // if ($_FILES['akte']['size'] > 0) {
                //     $nama_baru = str_replace(' ', '_', $_FILES['akte']['name']);
                
                //     $nmfile = date("ymdHis").'_'.$nama_baru;
                //     $type = 'Akte';
                //     $loc = $this->location($type);

                //     $config['upload_path'] = './marketplace/vendor/Akte/'; //$this->path;
                //     $config['allowed_types'] = 'gif|jpg|png';
                //     $config['max_size'] = '20048'; //maksimum besar file 2M
                //     $config['max_width'] = '1600'; //lebar maksimum 1288 px
                //     $config['max_height'] = '768'; //tinggi maksimu 768 px    
                //     $config['file_name'] = $nmfile; //nama yang terupload nantinya

                //     $this->load->library('upload', $config);

                //     // update database
                //     $this->db->update('vendor', array('Akte' => $nmfile), array('id' => $id));

                //     if (!$this->upload->do_upload('akte')) {
                //         $error = array('error' => $this->upload->display_errors());
                //     } 
                // }
                

                $flash_msg = "Selamat data vendor berhasil dikirim ke admin wiklan.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('vendor');
            } else {
                $flash_msg = "The vendor was failed added.";
                $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('vendor');
            }
        }
    }

    function upload_image_siup($str, $id) {
        $nama_baru = str_replace(' ', '_', $_FILES['siup']['name']);
                
        $nmfile = date("ymdHis").'_'.$nama_baru;
        $type = 'SIUP';
        $loc = $this->location($type);

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

        if ($this->upload->do_upload('siup')) {
            return TRUE;
        } else {
            $error_msg = $this->upload->display_errors();
            $this->form_validation->set_message('siup', $this->upload->display_errors());
            return FALSE;
        }

    }

    function upload_image_tdp($str, $id) {
        $nama_baru = str_replace(' ', '_', $_FILES['tdp']['name']);
                
        $nmfile = date("ymdHis").'_'.$nama_baru;
        $type = 'TDP';
        $loc = $this->location($type);

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

        if ($this->upload->do_upload('tdp')) {
            return TRUE;
        } else {
            $error_msg = $this->upload->display_errors();
            $this->form_validation->set_message('tdp', $this->upload->display_errors());
            return FALSE;
        }

    }

    function upload_image_npwp($str, $id) {
        $nama_baru = str_replace(' ', '_', $_FILES['npwp']['name']);
                
        $nmfile = date("ymdHis").'_'.$nama_baru;
        $type = 'NPWP';
        $loc = $this->location($type);

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

        if ($this->upload->do_upload('npwp')) {
            return TRUE;
        } else {
            $error_msg = $this->upload->display_errors();
            $this->form_validation->set_message('npwp', $this->upload->display_errors());
            return FALSE;
        }

    }

    function upload_image_akte($str, $id) {
        $nama_baru = str_replace(' ', '_', $_FILES['akte']['name']);
                
        $nmfile = date("ymdHis").'_'.$nama_baru;
        $type = 'Akte';
        $loc = $this->location($type);

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

        if ($this->upload->do_upload('akte')) {
            return TRUE;
        } else {
            $error_msg = $this->upload->display_errors();
            $this->form_validation->set_message('akte', $this->upload->display_errors());
            return FALSE;
        }

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
        if ($submit == "Delete") {
            // delete the item record from db
            $this->_delete($update_id);

            $flash_msg = "The vendor were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('vendor/manage');
        }
    }

    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('vendor/manage');
        }

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('telp', 'Deskripsi', 'required');
            $this->form_validation->set_rules('email', 'Alamat email', 'trim|required|valid_email');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                // $data['item_url'] = url_title($data['item_title']);

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The vendor were successfully updated.";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('vendor/create/'.$update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();

                    $flash_msg = "The vendor was successfully added.";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('vendor/create/'.$update_id);
                }
            }
        }

        if ((is_numeric($update_id)) && ($submit!="Submit")) {
            $data = $this->fetch_data_from_db($update_id);

        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Tambah Vendor";
        } else {
            $data['headline'] = "Update Vendor";
        }

        $data['prov'] = $this->store_provinces->get('id_prov');
        $data['city'] = $this->store_cities->get('id_kab');
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['nama'] = $this->input->post('nama', true);
        $data['pic'] = $this->input->post('pic', true);
        $data['url'] = $this->input->post('url', true);
        $data['email'] = $this->input->post('email', true);
        $data['alamat'] = $this->input->post('alamat', true);
        $data['vendor_cat'] = $this->input->post('vendor_cat', true);
        $data['telp'] = $this->input->post('telp', true);
        $data['keuntungan'] = $this->input->post('keuntungan', true);
        $data['cat_prov'] = $this->input->post('cat_prov', true);
        $data['cat_city'] = $this->input->post('cat_city', true);
        $data['created_at'] = time();
        $data['status'] = $this->input->post('status', true);
        $data['SIUP'] = $this->input->post('SIUP', true);
        $data['TDP'] = $this->input->post('TDP', true);
        $data['NPWP'] = $this->input->post('NPWP', true);
        $data['Akte'] = $this->input->post('Akte', true);
        $data['kategori'] = $this->input->post('kategori', true);
        return $data;
    }

    function fetch_data_from_db($update_id) {
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['nama'] = $row->nama;
            $data['pic'] = $row->pic;
            $data['url'] = $row->url;
            $data['email'] = $row->email;
            $data['alamat'] = $row->alamat;
            $data['vendor_cat'] = $row->vendor_cat;
            $data['created_at'] = $row->created_at;
            $data['telp'] = $row->telp;
            $data['keuntungan'] = $row->keuntungan;
            $data['cat_prov'] = $row->cat_prov;
            $data['cat_city'] = $row->cat_city;
            $data['kategori'] = $row->kategori;
            $data['code'] = $row->code;
            $data['status'] = $row->status;
            $data['SIUP'] = $row->SIUP;
            $data['TDP'] = $row->TDP;
            $data['NPWP'] = $row->NPWP;
            $data['Akte'] = $row->Akte;
        }

        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

    function get($order_by)
    {
        $this->load->model('mdl_vendor');
        $query = $this->mdl_vendor->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) 
    {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_vendor');
        $query = $this->mdl_vendor->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_vendor');
        $query = $this->mdl_vendor->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) 
    {
        $this->load->model('mdl_vendor');
        $query = $this->mdl_vendor->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_vendor');
        $this->mdl_vendor->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_vendor');
        $this->mdl_vendor->_update($id, $data);
    }

    function _delete($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_vendor');
        $this->mdl_vendor->_delete($id);
    }

    function count_where($column, $value) 
    {
        $this->load->model('mdl_vendor');
        $count = $this->mdl_vendor->count_where($column, $value);
        return $count;
    }

    function get_max() 
    {
        $this->load->model('mdl_vendor');
        $max_id = $this->mdl_vendor->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) 
    {
        $this->load->model('mdl_vendor');
        $query = $this->mdl_vendor->_custom_query($mysql_query);
        return $query;
    }

}