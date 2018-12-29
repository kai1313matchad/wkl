<?php
class Store_product extends MX_Controller 
{

    var $path_video = './marketplace/video/';
    var $path_qr = './marketplace/qr/';
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
        $this->load->helper(array('text', 'tgl_indo_helper'));
        $this->load->model('App');
    }

    function create_qr($update_id) {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();
        
        $data = $this->fetch_data_from_db($update_id);
        $item_url = $data['item_url'];

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './marketplace/qr/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)

        $this->ciqrcode->initialize($config);

        $image_name = $item_url.'.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = base_url().'product/billboard/'.$item_url; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        //update database
        $update_data['qr_code'] = $image_name;
        $this->_update($update_id, $update_data);

        $flash_msg = "The qr code were successfully created.";
        $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('store_product/create/'.$update_id);
    }

    function delete_qr($update_id) {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $data = $this->fetch_data_from_db($update_id);
        $qr_code = $data['qr_code'];

        $qr_code_path = $this->path_qr.$qr_code;

        if (file_exists($qr_code_path)) {
            unlink($qr_code_path);
        } 

        unset($data);
        $data['qr_code'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The qr code were successfully deleted.";
        $value = '<div class="alert alert-success  alert-dismissible show" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('store_product/create/'.$update_id);
    } 

    function count_own_product($user_id) {
        $this->load->module('site_security');
        $this->load->module('manage_product');
        // $this->site_security->_make_sure_logged_in();

        $mysql_query = "SELECT * FROM store_item WHERE user_id = $user_id AND deleted <> '1'";
        $query = $this->manage_product->_custom_query($mysql_query);
        $count = $query->num_rows();

        return $count;
    }

    function live_search() {
        $this->load->module('manage_product');
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $word = $this->input->post('liveSearch');
        $result = $this->manage_product->getAjaxRes($word);
        return $result;
    }

    function wish() {
        $this->load->module('store_wishlist');
        $this->load->module('site_security');

        $user_id = $this->input->post('user_id');
        $prod_id = $this->input->post('prod_id');
        $token = $this->site_security->generate_random_string(6);

        $data = array(
            'prod_id' => $prod_id,
            'user_id' => $user_id,
            'token' => $token,
            'created_at' => time()
        ); 

        $col1 = 'user_id';
        $value1 = $user_id;
        $col2 = 'prod_id';
        $value2 = $prod_id;
        $query = $this->store_wishlist->get_with_double_condition($col1, $value1, $col2, $value2);
        $num_rows = $query->num_rows();

        if ($num_rows < 1) {
            $this->store_wishlist->_insert($data);

            // Log activity
            $data_log = array(
                'module' => 'tambah wishlist',
                'user' => $this->session->userdata('user_id'),
                'activity' => 'tambah_wishlish',
                'icon' => 'fa-usd',
               
            );
            App::Log($data_log);

            $results['msg'] = 'sukses';
            echo json_encode($results);
            
        } else {
            $results['msg'] = 'you already add that';
            echo json_encode($results);
            // $results['msg'] = 'gagal';
            // echo json_encode($results);
        }

    }

    function _compress_report($file_name, $type) {
        $this->load->module('manage_product');
        $loc = $this->manage_product->location($type);
        // create thumbnail

        $config['image_library'] = 'gd2';
        $config['source_image'] = $loc.$file_name;
        $config['new_image'] = $loc.'300x160/'.$file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 300;
        $config['height']       = 160;

        // $this->image_lib->initialize($config);
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    function process_add_maintenance($update_id) {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();
        $this->load->module('manage_product');

        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('store_product');
        }

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('type', 'Tipe File', 'required|callback_check_default');

            if ($this->form_validation->run() == TRUE) {

                $type = $this->input->post('type');
                $prod_id = $this->input->post('prod_id');

                $loc = $this->manage_product->location($type);

                $token = $this->site_security->generate_random_string(6);

                $nama_baru = str_replace(' ', '_', $_FILES['userfile']['name']);
                
                $nmfile = date("ymdHis").'_'.$nama_baru;

                $config['upload_path']          = $loc; //$this->path;
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size'] = '50048'; //maksimum besar file 5 mb
                $config['max_width']  = '1600'; //lebar maksimum 1288 px
                $config['max_height']  = '768'; //tinggi maksimu 768 px    
                $config['file_name'] = $nmfile; //nama yang terupload nantinya

                $location = base_url().$loc.$nmfile;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                    $error_msg = $this->upload->display_errors();

                    $flash_msg = "The file were could not be added.";
                    $value = '<div class="alert alert-notice alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('store_product/maintenance/'.$update_id);
                }
                else
                {
                    $this->_compress_report($nmfile, $type);

                    $this->db->insert('maintain_report', array('prod_id' => $prod_id, 'image' => $nmfile, 'type' => $type, 'token' => $token, 'created_at' => time()));

                    $flash_msg = "The file were successfully added.";
                    $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('store_product/maintenance/'.$update_id);
                }
            } else {
                $flash_msg = "You must choose type report.";
                $value = '<div class="alert alert-notice alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_product/maintenance/'.$update_id);
            }
        }  
    }

    function check_default($post_string) {
        return $post_string == '0' ? FALSE : TRUE;
    }

    function maintenance($update_id) {
        
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();
        
        $data['headline'] = "Maintenance";
        $data['update_id'] = $update_id;

        $db = $this->fetch_data_from_db($update_id);
        $id = $db['id'];
        $data['prod_id'] = $id;

        // get data from table selling point
        $this->db->where('prod_id', $id);
        $mysql_query = $this->db->get('maintain_report');

        $data['reports'] = $mysql_query;

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "maintenance";
        $this->load->module('templates');
        $this->templates->market($data);  

    }

    function tes_pro($code) {
        $this->load->module('site_security');
        if ($this->site_security->_make_sure_is_mine($code)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    function no_data() {
        $data['headline'] = "Upload Success";
        $data['view_file'] = "no_data";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function tes_fetch($code) {
        $this->load->module('manage_product');
        $this->load->module('site_security');
        $results = $this->manage_product->match($code);
        $hasil = $this->site_security->_make_sure_is_mine($code);

        if ($results->num_rows() > 0 && $hasil) {
            foreach ($results->result() as $row) {
                $data['id'] = $row->id;
                $data['prod_code'] = $row->prod_code;
                $data['item_title'] = $row->item_title;
                $data['item_url'] = $row->item_url;
                $data['item_price'] = $row->item_price;
                $data['item_description'] = $row->item_description;
                $data['item_address'] = $row->item_address;
                $data['big_pic'] = $row->big_pic;
                $data['small_pic'] = $row->small_pic;
                $data['video'] = $row->video;
                $data['was_price'] = $row->was_price;
                $data['cat_prod'] = $row->cat_prod;
                $data['cat_road'] = $row->cat_road;
                $data['cat_size'] = $row->cat_size;
                $data['cat_stat'] = $row->cat_stat;
                $data['cat_type'] = $row->cat_type;
                $data['cat_light'] = $row->cat_light;
                $data['address'] = $row->address;
                $data['lat'] = $row->lat;
                $data['long'] = $row->long;
                $data['cat_prov'] = $row->cat_prov;
                $data['cat_city'] = $row->cat_city;
                $data['created_at'] = $row->created_at;
                $data['updated_at'] = $row->updated_at;
                $data['status'] = $row->status;
                //
                $data['sertifikat'] = $row->sertifikat;
                $data['SIPR'] = $row->SIPR;
                $data['IMB'] = $row->IMB;
                $data['SSPD'] = $row->SSPD;
                $data['JAMBONG'] = $row->JAMBONG;
                $data['SKRK'] = $row->SKRK;

                $data['limapuluh'] = $row->limapuluh;
                $data['seratus'] = $row->seratus;
                $data['duaratus'] = $row->duaratus;
            }
        }

        if (!isset($data)) {
            $data = "tidak ada data";
        }

        var_dump($data);
        die();
    }

    public function index()
    {
        $this->load->module('site_security');
        $this->load->module('manage_product');
        $this->site_security->_make_sure_logged_in();

        $user_id = $this->session->userdata('user_id');

        $mysql_query = "SELECT store_item.*, provinsi.*, kabupaten.*, store_categories.*, store_roads.*, store_labels.*, store_item.id AS id_produk, store_item.status AS stat_prod, provinsi.nama AS provinsi, kabupaten.nama AS kabupaten FROM store_item LEFT JOIN provinsi ON store_item.cat_prov=provinsi.id_prov LEFT JOIN kabupaten ON store_item.cat_city=kabupaten.id_kab LEFT JOIN store_categories ON store_item.cat_prod=store_categories.id LEFT JOIN store_roads ON store_item.cat_road=store_roads.id LEFT JOIN store_labels ON store_item.cat_stat=store_labels.id WHERE store_item.user_id = '$user_id' AND store_item.deleted <> '1' ORDER BY store_item.id DESC";

        // $result = $this->_custom_query($mysql_query);
        $data['query'] = $this->manage_product->_custom_query($mysql_query); // $this->get('id');

        $data['flash'] = $this->session->flashdata('item');

        $data['view_file'] = "manage"; // "pendaftaran";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function file_select($type, $update_id) {
        // cek image
        $data = $this->fetch_data_from_db($update_id);
        $limapuluh = $data['limapuluh'];
        $seratus = $data['seratus'];
        $duaratus = $data['duaratus'];
        
        $sertifikat = $data['sertifikat'];
        $SIPR = $data['SIPR'];
        $IMB = $data['IMB'];
        $SSPD = $data['SSPD'];
        $JAMBONG = $data['JAMBONG'];
        $SKRK = $data['SKRK'];
        $asuransi = $data['asuransi'];

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

            case 'sertifikat':
                if (!empty($sertifikat)) {
                    $file = $sertifikat;
                } else {
                    $file = '';
                }
            break;

            case 'asuransi':
                if (!empty($asuransi)) {
                    $file = $asuransi;
                } else {
                    $file = '';
                }
            break;

            case 'SIPR':
                if (!empty($SIPR)) {
                    $file = $SIPR;
                } else {
                    $file = '';
                }
            break;

            case 'IMB':
                if (!empty($IMB)) {
                    $file = $IMB;
                } else {
                    $file = '';
                }
            break;

            case 'SSPD':
                if (!empty($SSPD)) {
                    $file = $SSPD;
                } else {
                    $file = '';
                }
            break;

            case 'JAMBONG':
                if (!empty($JAMBONG)) {
                    $file = $JAMBONG;
                } else {
                    $file = '';
                }
            break;

            case 'SKRK':
                if (!empty($SKRK)) {
                    $file = $SKRK;
                } else {
                    $file = '';
                }
            break;

            case 'limapuluh':
                if (!empty($limapuluh)) {
                    $file = $limapuluh;
                } else {
                    $file = '';
                }
            break;

            case 'seratus':
                if (!empty($seratus)) {
                    $file = $seratus;
                } else {
                    $file = '';
                }
            break;
            
            default:
                if (!empty($duaratus)) {
                    $file = $duaratus;
                } else {
                    $file = '';
                }
            break;
        }

        return $file;
        // var_dump($file);
        // echo $file;
    }

// start
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

   function _compress_image($file_name, $type) {
        // $this->load->library('image_lib');
        $loc = $this->manage_product->location($type);

        $config['image_library'] = 'gd2';
        $config['source_image'] = $loc.$file_name;
        $config['new_image'] = $loc.'900x500/'.$file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width']         = 900;
        $config['height']       = 500;

        // $this->image_lib->initialize($config);
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        
    }

    function _create_thumb($file_name, $type) {
        // create thumbnail
        $loc = $this->manage_product->location($type);

        $config['source_image'] = $loc.$file_name;
        $config['new_image'] = $loc.'70x70/'.$file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width']         = 70;
        $config['height']       = 70;

        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

    function process_upload() {
        $this->load->module('site_security');
        $this->load->module('manage_product');

        $data_json = $this->input->post('objArr');

        $result = json_decode($data_json);

        $update_id = $result[0]->segment;
        $loc = $this->manage_product->location($result[0]->type);

        $token = $this->site_security->generate_random_string(6);

        $nama_baru = str_replace(' ', '_', $_FILES['file']['name']);
        
        $nmfile = date("ymdHis").'_'.$nama_baru;

        $update_data[$result[0]->type] = $nmfile;

        $this->manage_product->_update_upload($update_id, $update_data);

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

    function view($update_id) {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }
        
        $data = $this->fetch_data_from_db($update_id);
        
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function add_map($secure_code) {
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $secure_code = $this->uri->segment(3);

        $this->load->module('manage_product');
        // get id from secure code
        $update_id = $this->manage_product->get_id_from_code($secure_code);

        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $submit = $this->input->post('submit', true);
        if ($submit == "Cancel") {
            redirect('store_product/create/'.$secure_code);
        }

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('sr_address', 'Alamat', 'required');
            $this->form_validation->set_rules('sr_lat', 'Latitude', 'required');
            $this->form_validation->set_rules('sr_lng', 'Longitude', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data['address'] = $this->input->post('sr_address', true);
                $data['lat'] = $this->input->post('sr_lat', true);
                $data['long'] = $this->input->post('sr_lng', true);

                if (isset($update_id)) {
                    $this->manage_product->_update($update_id, $data);
                    $flash_msg = "The map were successfully updated.";
                    $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('store_product/create/'.$secure_code);
                }
            }
        }    

        $this->load->library('session');

        $data['headline'] = "Add Map";
        $data['update_id'] = $secure_code;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "add_map";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function _generate_thumbnail($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path_big.$file_name;
        $config['new_image'] = $path_small.$file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 200;
        $config['height']       = 200;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    function add_video($update_id)
    {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_product');
        $this->site_security->_make_sure_logged_in();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('store_product/create/'.$update_id);
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
                $this->templates->market($data);
            } else {
                $videoDetails = $this->upload->data();
                $data['video_name']= $configVideo['file_name'];
                $data['video_detail'] = $videoDetails;

                // $upload_data = $data['upload_data'];
                $file_name = $configVideo['file_name']; // $upload_data['file_name'];

                //update database
                // get real product id
                $prod_id = $this->manage_product->get_id_from_code($update_id); 
                $update_data['video'] = $this->manage_product->space_image($file_name);
                $this->manage_product->_update($prod_id, $update_data);

                $flash_msg = "The video were successfully uploaded.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);

                $data['headline'] = "Upload Success";
                $data['update_id'] = $update_id;
                $data['flash'] = $this->session->flashdata('item');
                $data['view_file'] = "show_video";
                $this->load->module('templates');
                $this->templates->market($data);
            }
            
        }    
    }

    function process_add_point($update_id) {
         if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $submit = $this->input->post('submit', TRUE);
        
        if ($submit == "Cancel") {
            redirect('store_product/create/'.$update_id);
        }

        if ($submit == "Submit") {
            // get from form
            $uruts = $this->input->post('urut');
            $points = $this->input->post('myInputs');
            $distances = $this->input->post('distances');
            $prod_id = $this->input->post('prod_id');
            $token = $this->site_security->generate_random_string(6);

            foreach ($uruts as $i) {
                // insert to db
                $this->db->insert('selling_point', array('desc' => $points[$i], 'jarak' => $distances[$i], 'prod_id' => $prod_id, 'token' => $this->site_security->generate_random_string(6)));
            }


            $flash_msg = "The selling point were successfully added.";
            $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('store_product/create/'.$update_id);           

        }        

    }

    function do_upload($update_id)
    {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('store_product/create/'.$update_id);
        }

        $config['upload_path']          = $this->path_big;
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
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "manage_product";
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
            $update_data['big_pic'] = $file_name;
            $update_data['small_pic'] = $file_name;
            $this->_update($update_id, $update_data);

            $flash_msg = "The image were successfully uploaded.";
            $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            $data['headline'] = "Upload Success";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "manage_product";
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->market($data);
        }
    }

    // soft delete

    function delete_product($code) {
        $this->load->module('log_activity');
        $this->load->module('manage_product');
        $this->load->module('manage_daftar');
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $submit = $this->input->post('submit', TRUE);

        // get id from code
        $id = $this->manage_product->get_id_from_code($code);
        // get all info
        $data = $this->manage_product->fetch_data_from_db($id);
        $prod_code = $data['prod_code'];
        $location_name = $data['item_title']; 
        $user_id = $this->session->userdata('user_id');

        // get name from user id
        $name = $this->manage_daftar->_get_customer_name($user_id);

        // update store_item
        $data['deleted'] = 1;
        $this->manage_product->_update($id, $data);

        // create log activity
        $activity_name = 'Delete OOH';
        $this->log_activity->record($activity_name, array('name' => $name, 'lokasi' => $location_name, 'code_produk' => $prod_code));

        $flash_msg = "The location were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('store_product');
    }

    function do_delete() {
        $this->load->module('manage_product');

        $code = $this->input->post('code');
        $type = $this->input->post('tipe');
        $name = $this->input->post('name');

        // get id from code

        $id = $this->manage_product->get_id_from_code($code);

        // check available
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where($type, $name);

        $query = $this->db->get('store_item');

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $file = $row[$type];
            }

            $data = array();
            $data[$type] = '';

            $this->db->where('id', $id);
            $this->db->update('store_item', $data);

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

    function delete_image($update_id) {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['big_pic'];
        $small_pic = $data['small_pic'];

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
        $data['small_pic'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The product image were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('store_product/create/'.$update_id);
    } 

    function delete_video($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_product');
        $this->site_security->_make_sure_logged_in();

        // get product id
        $prod_id = $this->manage_product->get_id_from_code($update_id);
        $data = $this->manage_product->fetch_data_from_db($prod_id);
        $video = $data['video'];

        $video_path = $this->path_video.$video;

        if (file_exists($video_path)) {
            unlink($video_path);
        } 

        unset($data);
        $data['video'] = "";
        $this->manage_product->_update($prod_id, $data);

        $flash_msg = "The video were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        // redirect('store_product/create/'.$update_id);
        redirect('store_product/upload_video/'.$update_id);
    } 

    function add_point($update_id, $segment2 = '') {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();
        
        $data['headline'] = "Tambah Selling Point";
        $data['update_id'] = $update_id;

        $db = $this->fetch_data_from_db($update_id);
        $id = $db['id'];
        $data['prod_id'] = $id;

        // get data from table selling point
        $this->db->where('prod_id', $id);
        $mysql_query = $this->db->get('selling_point');

        $data['sell_points'] = $mysql_query;

        // if ($segment2 != '') {
        //     $flash_msg = "The point were successfully deleted.";
        //     $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        //     $this->session->set_flashdata('item', $value);
        // }
       
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "add_point";
        $this->load->module('templates');
        $this->templates->market($data);   
    }

    function upload_image($update_id) {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;

        $db = $this->fetch_data_from_db($update_id);
        $data['limapuluh'] = $db['limapuluh'];
        $data['seratus'] = $db['seratus'];
        $data['duaratus'] = $db['duaratus'];

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->market($data);   
    }

    function upload_document($update_id) {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;

        $db = $this->fetch_data_from_db($update_id);
        
        $data['sertifikat'] = $db['sertifikat'];
        $data['SIPR'] = $db['SIPR'];
        $data['IMB'] = $db['IMB'];
        $data['SSPD'] = $db['SSPD'];
        $data['JAMBONG'] = $db['JAMBONG'];
        $data['SKRK'] = $db['SKRK'];

        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_document";
        $this->load->module('templates');
        $this->templates->market($data);   
    }

    function upload_maintenance($update_id) {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_maintenance";
        $this->load->module('templates');
        $this->templates->market($data);   
    }

    function upload_video($update_id) {
        if (!isset($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_product');
        $this->site_security->_make_sure_logged_in();
        
        // get product id
        $prod_id = $this->manage_product->get_id_from_code($update_id);

        $data = $this->manage_product->fetch_data_from_db($prod_id);
        $data['video_file'] = $data['video'];

        $data['headline'] = "Upload Video";
        $data['update_id'] = $update_id;
        $data['video_name'] = '';
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_video";
        $this->load->module('templates');
        $this->templates->market($data);   
    }

    function sim_price() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('price_based_duration');
        $this->site_security->_make_sure_logged_in();

        $update_id = $this->uri->segment(3);
        $data = $this->fetch_data_from_db($update_id);

         // cek data di price based duration
        $data['cek_durasi_harga'] = $this->price_based_duration->check_product_in($data['id']);

        $data['prices'] = $this->price_based_duration->fetch_data($data['id']); 
        $data['prod_id'] = $data['id'];
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "simulasi";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->load->module('store_districs');
        $this->load->module('store_categories');
        $this->load->module('store_roads');
        $this->load->module('store_sizes');
        $this->load->module('store_labels');
        $this->load->module('manage_product');
        $this->load->module('price_based_duration');
        $this->site_security->_make_sure_logged_in();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('store_product');
        }

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('item_title', 'Item title', 'required|max_length[204]');
            // $this->form_validation->set_rules('item_price', 'Item price', 'required|numeric');
            $this->form_validation->set_rules('was_price', 'Was price', 'numeric');
            $this->form_validation->set_rules('item_description', 'Item description', 'required');
            // $this->form_validation->set_rules('status', 'Status', 'required|numeric');
            $this->form_validation->set_rules('cat_prod', 'Kategori', 'required|numeric');
            $this->form_validation->set_rules('cat_road', 'Jenis Jalan', 'required|numeric');
            $this->form_validation->set_rules('cat_size', 'Ukuran', 'required|numeric');
            $this->form_validation->set_rules('cat_stat', 'Status ketersediaan', 'required|numeric');
            $this->form_validation->set_rules('cat_type', 'Tipe', 'required|numeric');
            $this->form_validation->set_rules('cat_light', 'Pencahayaan', 'required|numeric');
            $this->form_validation->set_rules('cat_prov', 'Provinsi', 'required|numeric');
            $this->form_validation->set_rules('cat_city', 'Kota/Kabupaten', 'required|numeric');
            $this->form_validation->set_rules('cat_distric', 'Kecamatan', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                // generate kode produk dari id provinsi & kota
                if ($this->input->post('cat_prov') && $this->input->post('cat_city') && $this->input->post('cat_distric')) {
                    $keyCode = $data['cat_prov'].$data['cat_city'];

                    $cek_kode = $this->manage_product->checkCode($keyCode);
                    $kode = "";
                    foreach($cek_kode->result() as $ck)
                    {
                        if($ck->prod_code == NULL)
                        {
                            $kode = $keyCode.'0001';
                        }
                        else
                        {
                            $kd_lama = $ck->prod_code ;
                            $kode = $kd_lama + 1;
                        }
                    }

                    $data['prod_code'] = $kode;
                    $data['item_url'] = url_title($data['item_title'].' '.$data['prod_code']);
                }
                // check if code exist
                if (!isset($update_id)) {
                   // generate random code
                    $data['code'] = $this->site_security->generate_random_string(12);

                    // Log activity
                    $data = array(
                        'module' => 'create location',
                        'user' => $this->session->userdata('user_id'),
                        'activity' => 'create_location',
                        'icon' => 'fa-usd',
                       
                    );
                    App::Log($data);
                }
                
                if (isset($update_id)) {
                    $id = $this->manage_product->get_id_from_code($update_id);
                    $this->manage_product->_update($id, $data);
                    
                    // Log activity
                    $data = array(
                        'module' => 'update location',
                        'user' => $this->session->userdata('user_id'),
                        'activity' => 'edit_location',
                        'icon' => 'fa-usd',
                       
                    );
                    App::Log($data);

                    $flash_msg = "The product were successfully updated.";
                    $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('store_product/create/'.$update_id);
                } else {
                    $this->manage_product->_insert($data);
                    $prod_id = $this->manage_product->get_max();

                    $update_id = $this->manage_product->get_code_from_prod_id($prod_id);

                    $flash_msg = "The product was successfully added.";
                    $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('store_product/create/'.$update_id);
                }
            } 
            else {
                redirect('store_product/create');
            }
        }

        if ((isset($update_id)) && ($submit!="Submit")) {
            $result = $this->site_security->_make_sure_is_mine($update_id);

            if (!$result) {
                redirect('store_product/no_data');
            }

            $data = $this->fetch_data_from_db($update_id);
            $data['video'] = $data['video'];
            $data['nama_kota'] = $this->store_cities->get_name_from_city_id($data['cat_city']);
            $data['nama_kecamatan'] = $this->store_districs->get_name_from_distric_id($data['cat_distric']);
        } else {
            $data = $this->fetch_data_from_post();
            $data['big_pic'] = "";
            $data['video'] = "";
            $data['qr_code'] = "";

            $data['lat'] = "";
            $data['long'] = "";

            $data['sertifikat'] = "";
            $data['SIPR'] = "";
            $data['IMB'] = "";
            $data['SSPD'] = "";
            $data['JAMBONG'] = "";
            $data['SKRK'] = "";

            $data['limapuluh'] = "";
            $data['seratus'] = "";
            $data['duaratus'] = "";

            $data['nama_kota'] = "Please Select";
            $data['nama_kecamatan'] = "Please Select";
        }

        if (!isset($update_id)) {
            $data['headline'] = "Tambah Produk";
        } else {
            $data['headline'] = "Update Produk";
        }

        $data['prov'] = $this->store_provinces->get('id_prov');
        $data['city'] = $this->store_cities->get('id_kab');
        $data['jenis'] = $this->store_categories->get('id');
        $data['jalan'] = $this->store_roads->get('id'); 
        $data['ukuran'] = $this->store_sizes->get('id');
        $data['ketersediaan'] = $this->store_labels->get('id');

        // cek data di price based duration
        // $data['cek_durasi_harga'] = $this->price_based_duration->check_product_in($data['id']);

        // $data['prices'] = $this->price_based_duration->fetch_data($data['id']); 
        // $data['prod_id'] = $data['id'];
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function fetch_data_from_post() {
        $data['user_id'] = $this->input->post('user_id', true);
        $data['item_title'] = $this->input->post('item_title', true);
        $data['item_price'] = $this->input->post('item_price', true);
        $data['item_description'] = $this->input->post('item_description', true);
        $data['was_price'] = $this->input->post('was_price', true);
        $data['cat_prod'] = $this->input->post('cat_prod', true);
        $data['cat_road'] = $this->input->post('cat_road', true);
        $data['cat_size'] = $this->input->post('cat_size', true);
        $data['cat_stat'] = $this->input->post('cat_stat', true);
        $data['cat_type'] = $this->input->post('cat_type', true);
        $data['cat_light'] = $this->input->post('cat_light', true);

        $data['jml_sisi'] = $this->input->post('jml_sisi', true);
        $data['ket_lokasi'] = $this->input->post('ket_lokasi', true);

        $data['item_address'] = $this->input->post('item_address', true);
        $data['cat_prov'] = $this->input->post('cat_prov', true);
        $data['cat_city'] = $this->input->post('cat_city', true);
        $data['cat_distric'] = $this->input->post('cat_distric', true);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['status'] = $this->input->post('status', true);
        return $data;
    }

    function fetch_data_from_db($code) {
        // $this->load->module('manage_product');
        // $query = $this->manage_product->get_where($updated_id);

        $this->load->module('manage_product');
        $this->load->module('site_security');
        $query = $this->manage_product->match($code);
        $result = $this->site_security->_make_sure_is_mine($code);
        
        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            // $data['user_id'] = $row->user_id;
            $data['prod_code'] = $row->prod_code;
            $data['item_title'] = $row->item_title;
            $data['item_url'] = $row->item_url;
            $data['item_price'] = $row->item_price;
            $data['item_description'] = $row->item_description;
            $data['item_address'] = $row->item_address;
            $data['big_pic'] = $row->big_pic;
            $data['small_pic'] = $row->small_pic;
            $data['video'] = $row->video;
            $data['was_price'] = $row->was_price;
            $data['cat_prod'] = $row->cat_prod;
            $data['cat_road'] = $row->cat_road;
            $data['cat_size'] = $row->cat_size;
            $data['cat_stat'] = $row->cat_stat;
            $data['cat_type'] = $row->cat_type;
            $data['cat_light'] = $row->cat_light;

            $data['jml_sisi'] = $row->jml_sisi;
            $data['ket_lokasi'] = $row->ket_lokasi;

            $data['address'] = $row->address;
            $data['lat'] = $row->lat;
            $data['long'] = $row->long;
            $data['cat_prov'] = $row->cat_prov;
            $data['cat_city'] = $row->cat_city;
            $data['cat_distric'] = $row->cat_distric;
            $data['created_at'] = $row->created_at;
            $data['updated_at'] = $row->updated_at;
            $data['status'] = $row->status;
            $data['code'] = $row->code; 
            $data['qr_code'] = $row->qr_code; 
            //
            $data['sertifikat'] = $row->sertifikat;
            $data['IMB'] = $row->IMB;
            $data['SIPR'] = $row->SIPR;
            $data['SSPD'] = $row->SSPD;
            $data['JAMBONG'] = $row->JAMBONG;
            $data['SKRK'] = $row->SKRK;
            $data['asuransi'] = $row->asuransi;

            $data['limapuluh'] = $row->limapuluh;
            $data['seratus'] = $row->seratus;
            $data['duaratus'] = $row->duaratus;
        } 
        
        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['big_pic'];
        $small_pic = $data['small_pic'];

        $big_pic_path = $this->path_big.$big_pic;
        $small_pic_path = $this->path_small.$small_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        // delete the item record from db
        $this->_delete($update_id);
    }

    function delete($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_user_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('store_product/create/'.$update_id);
        } elseif ($submit == "Delete") {
            // delete the item record from db
            $this->_delete($update_id);
            $this->_process_delete($update_id);

            $flash_msg = "The banner were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('store_product/manage');
        }
    }

   

}