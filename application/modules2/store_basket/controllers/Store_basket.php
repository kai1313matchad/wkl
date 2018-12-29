<?php
class Store_basket extends MX_Controller 
{

    function __construct() {
        parent::__construct();
        $this->load->model('App');
    }

    function get_count_cart($user_id) {
        $column = 'shopper_id';
        $value = $user_id;
        return $this->count_where($column, $value); 
    }

    function pe_de_ef($id = null) {
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
        exit;
    }

    function pdf(){
        $this->load->view('cetak');
    }

    function delete_order($basket_id) {
        $this->load->library('session');
        $this->load->module('site_security');

        $this->_delete($basket_id);

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
        $this->load->library('session');
        $this->load->module('timedate');
        $this->load->module('manage_product');

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
                // Log activity
                $data = array(
                    'module' => 'tambah produk ke keranjang',
                    'user' => $this->session->userdata('user_id'),
                    'activity' => 'tambah_produk_ke_keranjang',
                    'icon' => 'fa-usd',
                   
                );
                App::Log($data);
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