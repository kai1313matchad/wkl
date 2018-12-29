<?php
class Store_basket extends MX_Controller 
{
    var $mailFrom;
    var $mailPass;
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('App', 'Invoice', 'Client'));
        date_default_timezone_set('Asia/Jakarta');
        $mailFrom = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
        $mailPass = $this->db->get_where('settings' , array('type'=>'password'))->row()->description;
    }

    function check_basket_blank($shopper, $item) {
        $col1 = 'item_id';
        $value1 = $item;
        $col2 = 'shopper_id';
        $value2 = $shopper;

        $hasil = $this->get_with_double_condition($col1, $value1, $col2, $value2);
        $num_rows = $hasil->num_rows();
        return $hasil;
        // var $hasil;
    }

    function deleteAllRow() {
        $mysql_query = "DELETE FROM store_basket";
        $this->db->query($mysql_query);
    }

    public function num_exists($next_number) {
        $next_number = sprintf('%06d', $next_number);
        $records = $this->db->where('no_order', 'ORD'.$next_number)->get('store_orders')->num_rows();
        if ($records > 0) {
            return $this->num_exists($next_number + 1);
        } else {
            return $next_number;
        }
    }

    function generate_order_number() {
        $query = $this->db->query('SELECT no_order, id FROM store_orders WHERE id = (SELECT MAX(id))');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $ord_number = intval(substr($row->no_order, -4));
            $next_number = $ord_number + 1;
            if ($next_number < 1) {
                $next_number = 1;
            }
            $next_number = $this->num_exists($next_number);

            return sprintf('%06d', $next_number);
        } else {
            return sprintf('%06d', 1);
        }
    }

    function tes_no_order() {
        $no_order = 'ORD'.$this->generate_order_number();
        echo $no_order;
    } 

    function generate_po_number() {
        $query = $this->db->query('SELECT counter, id FROM counter WHERE id = (SELECT MAX(id))');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $ref_number = intval(substr($row->reference_no, -4));
            $next_number = $ref_number + 1;
            if ($next_number < 1) {
                $next_number = 1;
            }
            $next_number = $this->ref_exists($next_number);

            return sprintf('%04d', $next_number);
        } else {
            return sprintf('%04d', 1);
        }
    }

    public function ref_exists($next_number)
    {
        $next_number = sprintf('%04d', $next_number);
        $records = $this->db->where('counter', $next_number)->get('counter')->num_rows();
        if ($records > 0) {
            return $this->ref_exists($next_number + 1);
        } else {
            return $next_number;
        }
    }

    function get_count_cart($user_id) {
        $column = 'shopper_id';
        $value = $user_id;
        return $this->count_where($column, $value); 
    }

    function pe_de_ef($id) {
        $this->load->module('manage_product');
        
        $mysql_query = "SELECT * FROM store_basket WHERE shopper_id = $id";
        $data['products'] = $this->_custom_query($mysql_query);
        
        //load the view and saved it into $html variable
        $html=$this->load->view('cetak', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "penawaran.pdf";



        include('./resource/lib/mpdf60/mpdf.php');
        $mpdf=new mPDF('','F4','','',15,15,15,16,9,9,'P');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        
        $mpdf->Output($pdfFilePath, "D");

        // kirim email 
        $this->sendMail($id);

        exit;
    }

    function pdf() {
        $this->load->view('cetak');
    }

    function test_mail() {
        $recipient1 = 'mail1';
        $recipient2 = 'mail2';

        $email = array($recipient1, $recipient2);

        $mailTo = implode(', ', $email);

        var_dump($mailTo);
    }

    function getRomawi($bln){
        switch ($bln){
            case 1: 
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }

    function testme() {
        $no_penawaran = $this->generate_po_number();
        $format_no_penawaran = $no_penawaran.'/MKT-WIKLAN/'.$this->getRomawi(date('n')).'/'.date('Y');
        echo $format_no_penawaran;
    }

    function sendMail($id = null) {
        $data = [];
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->load->module('site_settings');

        $user_id = $this->site_security->_get_user_id();

        // get email from id user
        $recipient1 = 'felicia@wiklan.com'; //$this->manage_daftar->get_email_from_id($user_id);
        $recipient2 = 'webdeveloper@wiklan.com'; // emailnya marketing

        $email = array($recipient1, $recipient2);

        $customer_name = $this->manage_daftar->_get_customer_name($id);

        $user = 'Admin';
        $mailTo = implode(', ', $email);
        $no_penawaran = $this->generate_po_number();
        $format_no_penawaran = $no_penawaran.'/MKT-WIKLAN/'.$this->getRomawi(date('n')).'/'.date('Y');
        // $message = '';
        $subjek = 'Penawaran '.$customer_name.' '.$format_no_penawaran;

        // buat template
        $data['user_id'] = ($user_id != '') ? $user_id : $id;
        $mysql_query = "SELECT * FROM store_basket WHERE shopper_id = $id";
        $data['products'] = $this->_custom_query($mysql_query);
        $body = $this->load->view('mail_temp', $data, true);

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

            // insert to tabel counter
            $object = array(
                'counter' => $this->generate_po_number(),
                'date' => date('Y-m-d H:i:s'),
            );
            
            $this->db->insert('counter', $object);

            return TRUE;
        }
    }

    function test_mailTemp() {
        $data = [];
        $data['user_id'] = 1009;
        // $id = 1009;        
        // $mysql_query = "SELECT * FROM store_basket WHERE shopper_id = $id";
        // $data['products'] = $this->_custom_query($mysql_query);

        $this->load->view('mail_temp', $data);
    }

    function factsheet($code = null) {
        $this->load->module('site_security');
        // $this->site_security->_make_sure_logged_in();

        $this->load->module('manage_product');
        $this->load->module('store_categories');
        $this->load->module('store_labels');
        $this->load->module('store_sizes');
        $this->load->module('store_roads');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->load->module('site_settings');
        $this->load->module('timedate');

        $id = $this->manage_product->get_id_from_code($code);
        $prod = App::view_by_id($id);
        $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);
        $data['image_location'] = base_url().'marketplace/limapuluh/70x70/'.$prod->limapuluh;
        // iki nyoba gambar 
        if ($prod->limapuluh != '') {
            $limapuluh = base_url().'marketplace/limapuluh/900x500/'.$prod->limapuluh;
        } else {
            $limapuluh = '';
        }
        $data['image_location2'] = $limapuluh;
        if ($prod->seratus != '') {
            $seratus = base_url().'marketplace/seratus/900x500/'.$prod->seratus;
        } else {
            $seratus = '';
        }
        $data['image_location3'] = $seratus;
        $data['alamat'] = strtoupper($prod->item_title);
        $qr_code = $prod->qr_code;
        if ($prod->qr_code != '') {
            $qr = base_url().'marketplace/qr/'.$prod->qr_code;
        } else {
            $qr = '';
        }
        $data['code'] = $qr;
        $data['prov'] = $this->store_provinces->get_name_from_province_id($prod->cat_prov);
        $data['kota'] = $this->store_cities->get_name_from_city_id($prod->cat_city);
        $data['jalan'] = $this->store_roads->get_name_from_road_id($prod->cat_road);
        $data['price'] = $prod->item_price;
        $data['display'] = $this->manage_product->get_name_from_display_id($prod->cat_type);
        $data['jml_sisi'] = ucwords($this->manage_product->show_amount_side($prod->jml_sisi));
        $data['tipe_cahaya'] = $this->manage_product->get_name_from_light_id($prod->cat_light);
        $data['size'] = $this->store_sizes->get_name_from_size_id($prod->cat_size);        
        $data['ket_lokasi'] = $this->manage_product->show_ket_lokasi($prod->ket_lokasi);
        $data['lat'] = $prod->lat;
        $data['long'] = $prod->long;
        $data['detail'] = base_url().'product/billboard/'.$prod->item_url; 

        // $data = $this->manage_product->fetch_data_from_db($id);

        // $data['alamat'] = $data[''];

        $this->load->view('factsheet', $data);
    }

    function delete_order($basket_id) {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_orders');
        $this->site_security->_make_sure_logged_in();

        $this->_delete($basket_id);
        // delete di store orders db
        $this->store_orders->_delete($basket_id);

        $flash_msg = "Delete success.";
        $value = '<div class="alert alert-success alert-dismissible fade2 show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('cart');
    }

    function get_all_own_cart($shopper_id) {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_item');
        $this->site_security->_make_sure_is_admin();

        // get all location fron specific user
        $now = time();
        $mysql_query = "SELECT * FROM store_basket WHERE shopper_id = $shopper_id AND store_basket.end > $now";
        $query = $this->_custom_query($mysql_query);
        $count = $query->num_rows();

        if ($count > 0) {

            $all_result = array();
            $location = array();
            $final_result = array();

             // get all id from store_item
            $this->db->where('status', 1);
            $this->db->where('deleted <>', '1');
            $all_id = $this->db->get('store_item')->result_array();

            foreach ($all_id as $row) {
                $all_result[] = $row['id'];
            }

            // get array data from store basket
            $location = array();
            foreach ($query->result_array() as $key) {
               $location[] = $key['item_id'];
            }

            $final_result = array_intersect($all_result, $location);

            if (count($final_result) !== 0) {
                $this->db->order_by('id', 'desc');
                $this->db->where('deleted <>', '1');
                $this->db->where_in('id', $final_result);
                $data = $this->db->get('store_item');

                return $data->result();
            }

            
        } 
    }

    function get_location($shopper_id) {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_item');
        $this->site_security->_make_sure_is_admin();

        // get all location fron specific user
        $now = time();
        $mysql_query = "SELECT store_basket.*, store_basket.id AS id_basket FROM store_basket WHERE shopper_id = $shopper_id AND store_basket.end > $now";
        $query = $this->_custom_query($mysql_query);
        $count = $query->num_rows();

        if ($count > 0) {

            $all_result = array();
            $location = array();
            $final_result = array();

             // get all id from store_item
            $this->db->where('status', 1);
            $this->db->where('deleted <>', '1');
            $all_id = $this->db->get('store_item')->result_array();

            foreach ($all_id as $row) {
                $all_result[] = $row['id'];
            }

            // get array data from store basket
            $location = array();
            foreach ($query->result_array() as $key) {
               $location[] = $key['item_id'];
            }

            $final_result = array_intersect($all_result, $location);

            if (count($final_result) !== 0) {
                $this->db->order_by('id', 'desc');
                $this->db->where('deleted <>', '1');
                $this->db->where_in('id', $final_result);
                $data = $this->db->get('store_item');
            }

            $tmp    = '';
            if(!empty($query)){
                $tmp .= "<option value=''>Pilih Lokasi</option>"; 
                foreach($query->result() as $row) {    
                    $tmp .= "<option value='".$row->id."'>".$row->item_title."</option>";
                }
            } else {
                $tmp .= "<option value=''>Pilih Lokasi</option>"; 
            }
            die($tmp);
        } 
        
        // echo $count;
    }

    function coba($timestamp) {
        $date = date('d\/m\/Y', $timestamp);
        echo $date;
        $data_tgl = explode('/', $date);
        $tgl = $data_tgl[0];
        $bulan = $data_tgl[1];
        $thn = $data_tgl[2];
        var_dump($tgl);
        echo $tgl.' '.$bulan.' '.$thn;
    } 

    function str() {
        //fix end date

        $date = '23/11/2018';
        $end_date = explode('/', (string)$date);
        $akhir = strtotime($end_date[2].'-'.$end_date[1].'-'.$end_date[0]);

        echo $akhir;
    }

    function alter() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $this->load->library('session');
        $this->load->module('timedate');
        $this->load->module('manage_product');
        $this->load->module('store_orders');
        $this->load->module('store_categories');
        // get data from table where
        $basket_id = $this->input->post('id_cart');
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $price = $this->input->post('harga');
        $duration = $this->input->post('cat_durasi');
        $slot = $this->input->post('slot');

        // fix durasi
        $fix_duration = explode('_', $duration);
        $durasi = $fix_duration[0];

        //fix start date
        $start_date = explode('/', $start);
        $awal = strtotime($start_date[2].'-'.$start_date[0].'-'.$start_date[1]);

        //fix end date
        $end_date = explode('/', $end);
        $akhir = strtotime($end_date[2].'-'.$end_date[1].'-'.$end_date[0]);

        $data = array(
            'start' => $awal,
            'end' => $akhir,
            'duration' => $durasi,
            'price' => $price,
            'slot' => $slot
        );

        // update data
        $this->_update($basket_id, $data);

        // update data di store order tabel
        $this->store_orders->_update($basket_id, $data);

        $flash_msg = "Update success.";
        $value = '<div class="alert alert-success alert-dismissible fade2 show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('cart','refresh');

        // $query = $this->get_where($basket_id);
        // // fetching
        // if ($query->num_rows() > 0){
        //     foreach ($query->result() as $row) {
        //         $item_title = $row->item_title;
        //         $price = $row->price;
        //         $duration = $row->duration;
        //         $start = $this->timedate->get_nice_date($row->start, 'indo');
        //         $end = $this->timedate->get_nice_date($row->end, 'indo');
        //         $slot = $row->slot;
        //         $item_id = $row->item_id;
        //     }
        //     // cek tipe kategori item
        //     $data = $this->manage_product->fetch_data_from_db($item_id);
        //     $tipe_cat = $data['cat_prod']; // $this->store_categories->get_name_from_category_id($data['cat_prod']);
        //     if ($tipe_cat == 4) {
        //         echo '<h2>produk videotron</h2>';
        //     } else {
        //         $this->form_for_reguler($item_title, $price, $start, $end, $duration);
        //     }    
        // } else {
        //     echo 'Content not found....';
        // }
    }

    function form_for_videotron() {

    }

    function form_for_reguler($item_title, $price, $start, $end, $duration) {
        $this->load->module('site_settings');
        echo "<form>
                <div class='harganya' style='text-align:center; font-size:30px; color:#7db921; margin-bottom:30px;'>".$this->site_settings->currency_rupiah($price)."</div>
                <div class='row'>
                
                    <div class='col-xs-6'>
                        <div class='datepicker-wrap'>
                            <input type='text' placeholder='dd/mm/yy' name='start' class='input-text full-width hasDatepicker' id='date-input datepicker' dateformat='dd/mm/yyyy' required='required' />
                            <img class='ui-datepicker-trigger' src='images/icon/blank.png' alt='' title=''>
                        </div>
                    </div>
                    <div class='col-xs-6'>
                        <div class='selector'>
                            <select name='cat_durasi' class='full-width' id='durasi' required='required'>
                                <option value='' selected='selected'>Please Select</option>
                                <option value='1_month'>1 Bulan</option>
                                <option value='2_month'>2 Bulan</option>
                                <option value='3_month'>3 Bulan</option>
                                <option value='4_month'>4 Bulan</option>
                                <option value='5_month'>5 Bulan</option>
                                <option value='6_month'>6 Bulan</option>
                                <option value='7_month'>7 Bulan</option>
                                <option value='8_month'>8 Bulan</option>
                                <option value='9_month'>9 Bulan</option>
                                <option value='10_month'>10 Bulan</option>
                                <option value='11_month'>11 Bulan</option>
                                <option value='12_month'>12 Bulan</option>
                            </select>
                            <span class='custom-select full-width'>Pilih durasi</span>
                        </div>
                    </div>
                    <input type='hidden' name='end' id='end'>
                </div>
                <div id='hasil'></div>
            </form>";

    } 

    function _avoid_cart_conflicts($data) {
        $this->load->module('store_shoppertrack');
        $original_session_id = $data['session_id'];
        $shopper_id = $data['shopper_id'];

        $col1 = 'session_id';
        $value1 = $original_session_id;
        $col2 = 'shopper_id';
        $value2 = $shopper_id;
        $query = $this->store_shoppertrack->get_with_double_condition($col1, $value1, $col2, $value2);
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            session_regenerate_id();

            $new_session_id = $this->session->session_id;
            $data['session_id'] = $new_session_id;
        }

        return $data;
    }

    function get_with_double_condition($col1, $value1, $col2, $value2) 
    {
        $this->load->model('mdl_store_basket');
        $query = $this->mdl_store_basket->get_with_double_condition($col1, $value1, $col2, $value2) ;
        return $query;
    }

    function remove() {
        $update_id = $this->uri->segment(3);
        $allowed = $this->_make_sure_remove_allowed($update_id);
        if ($allowed == FALSE) {
            redirect('cart');
        }

        $this->_delete($update_id);
        redirect('cart');
    }

    function _make_sure_remove_allowed($update_id) {
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $session_id = $row->session_id;
            $shopper_id = $row->shopper_id;
        }

        if (!isset($shopper_id)) {
            return FALSE;
        }

        $customer_session_id = $this->session->session_id;
        $this->load->module('site_security');
        $customer_shopper_id = $this->site_security->_get_user_id();

        if (($session_id == $customer_session_id) OR ($shopper_id == $customer_shopper_id)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function add_to_basket() {
        $this->load->module('site_security');
        $this->load->module('site_settings');
        $this->load->module('store_orders');
        $this->load->module('manage_product');
        $this->load->library('session');
        $this->site_security->_make_sure_logged_in();

        $user_id = $this->site_security->_get_user_id();
        $item_id = $this->input->post('item_id');

        // get item_url from item_id
        $data_item = $this->manage_product->fetch_data_from_db($item_id);
        $item_url = $data_item['item_url'];

        // cek apakah sudah ada di keranjang
        $result = $this->site_security->_make_sure_is_blank($item_id);

        if (!$result) {
            // end process and redirect to produk detail
            $flash_msg = "You already add that.";
            $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('product/billboard/'.$item_url);
        }

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Submit") {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('item_id', 'Item ID', 'required|numeric');
            $this->form_validation->set_rules('cat_durasi', 'Durasi', 'required');
            $this->form_validation->set_rules('start', 'Tanggal mulai', 'required');
            $this->form_validation->set_rules('end', 'Tanggal berakhir', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->_fetch_the_data();
                // $data = $this->_avoid_cart_conflicts($data);
                $this->_insert($data);

                // insert data to store orders
                $this->store_orders->_insert($data);
                // generate and update no_order
                $basket_id = $this->store_orders->get_max();
                $no_order = 'ORD'.$this->generate_order_number();
                $no_transaksi = $this->site_settings->generate_transaksi_number();
                $data_order = array(
                    'no_order' => $no_order,
                    'no_transaksi' => $no_transaksi,
                );

                $this->store_orders->_update($basket_id, $data_order);

                $item = $this->input->post('item_id', TRUE);
                $item_title = Invoice::view_item_by_id($item)->item_title;
                // Log activity
                $data = array(
                    'module' => 'tambah produk ke keranjang',
                    'user' => $user_id,
                    'activity' => 'tambah_produk_ke_keranjang',
                    'icon' => 'fa-usd',
                   
                );
                App::Log($data);
                // log notification
                $data_notif = array(
                    'user_target' => $user_id,
                    'module' => 'order',
                    'module_field_id' => $item,
                    'notify_title' => 'Order Berhasil!',
                    'notification' => 'lokasi '.$item_title.' berhasil ditambahkan ke keranjang',
                    'notification_date' => date('Y-m-d H:i:s'),
                    'icon' => 'soap-icon-shopping',
                );
                App::save_data('notifications', $data_notif);
                redirect('cart');
            } else {
                $refer_url = $_SERVER['HTTP_REFERER'];
                $error_msg = validation_errors("<p style='color:red;'>", "</p>");
                $this->session->flashdata('item', $error_msg);
                redirect($refer_url);
            }
        }
    }



    function _fetch_the_data() {
        $this->load->module('site_security');
        $this->load->module('manage_product');

        $item_id = $this->input->post('item_id', TRUE);
        $duration = $this->input->post('cat_durasi', TRUE);
        $start = $this->input->post('start', TRUE);
        $end = $this->input->post('end', TRUE);
        $slot = $this->input->post('slot', TRUE);
        $item_data = $this->manage_product->fetch_data_from_db($item_id);
        $item_price = ($this->input->post('price', TRUE)) ? ($this->input->post('price', TRUE)) : $item_data['item_price'];
        $shopper_id = $this->site_security->_get_user_id();
        $shop_id = $this->manage_product->get_user_from_code($item_id);

        // fix durasi
        $fix_duration = explode('_', $duration);
        $durasi = $fix_duration[0];

        //fix start date
        $start_date = explode('/', $start);
        $awal = strtotime($start_date[2].'-'.$start_date[0].'-'.$start_date[1]);

        //fix end date
        $end_date = explode('/', $end);
        $akhir = strtotime($end_date[2].'-'.$end_date[1].'-'.$end_date[0]);

        if (!is_numeric($shopper_id)) {
            $shopper_id = 0;
        }

        $data['session_id'] = $this->session->session_id;
        $data['item_title'] = $item_data['item_title'];
        $data['price'] = $item_price;
        // $data['tax'] = '0';
        $data['item_id'] = $item_id;       
        $data['date_added'] = time();
        $data['shopper_id'] = $shopper_id;
        $data['shop_id'] = $shop_id;
        $data['ip_address'] = $this->input->ip_address();
        $data['duration'] = $durasi;
        $data['start'] = $awal;
        $data['end'] = $akhir;
        $data['slot'] = $slot;
        return $data;
    }

    function test() {
        $session_id = $this->session->session_id;
        echo $session_id;
        echo "<hr>";
        $this->load->module('site_security');
        $shopper_id = $this->site_security->_get_user_id();
        echo "You are shopper ID ".$shopper_id;
        echo "<hr>";
        session_regenerate_id();
        echo "<h1>New session id has been generated </h1>";
        $session_id = $this->session->session_id;
        echo $session_id;
        echo "<hr>";
        $this->load->module('site_security');
        $shopper_id = $this->site_security->_get_user_id();
        echo "You are shopper ID ".$shopper_id;
        echo "<hr>"; 
    }

    function get($order_by)
    {
        $this->load->model('mdl_store_basket');
        $query = $this->mdl_store_basket->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) 
    {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_basket');
        $query = $this->mdl_store_basket->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_basket');
        $query = $this->mdl_store_basket->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) 
    {
        $this->load->model('mdl_store_basket');
        $query = $this->mdl_store_basket->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_store_basket');
        $this->mdl_store_basket->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_basket');
        $this->mdl_store_basket->_update($id, $data);
    }

    function _delete($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_basket');
        $this->mdl_store_basket->_delete($id);
    }

    function count_where($column, $value) 
    {
        $this->load->model('mdl_store_basket');
        $count = $this->mdl_store_basket->count_where($column, $value);
        return $count;
    }

    function get_max() 
    {
        $this->load->model('mdl_store_basket');
        $max_id = $this->mdl_store_basket->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) 
    {
        $this->load->model('mdl_store_basket');
        $query = $this->mdl_store_basket->_custom_query($mysql_query);
        return $query;
    }

}