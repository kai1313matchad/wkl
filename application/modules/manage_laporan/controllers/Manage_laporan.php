<?php
class Manage_laporan extends MX_Controller 
{

var $path = './marketplace/laporan/';

function __construct() {
    parent::__construct();
    $this->load->model(array('Client', 'App', 'Project'));
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper(array('text', 'tgl_indo_helper'));
}

function _generate_thumbnail($file_name) {
    $config['image_library'] = 'gd2';
    $config['source_image'] = './marketplace/laporan/'.$file_name; //'./LandingPageFiles/big_pics/'.$file_name;
    $config['new_image'] = './marketplace/laporan/convert/'.$file_name; //'./LandingPageFiles/small_pics/'.$file_name;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 530;
    $config['height']       = 328;

    $this->load->library('image_lib', $config);

    $this->image_lib->resize();
}

function download_file($update_id) {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    header("Content-type:application/image");

    $data_laporan = $this->fetch_data_from_db($update_id);
    $nama = $data_laporan['image'];

    $name = $path.$nama;
    $data = file_get_contents('./marketplace/laporan/'.$nama);
    $this->load->helper('file');
    $file_name = $nama;

    // Load the download helper and send the file to your desktop
    $this->load->helper('download');
    force_download($file_name, $data);
}

function _set_to_opened($update_id) {
    $data['opened'] = 1;
    $this->_update($update_id, $data);
}

function view($order_id = null) {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_product');
    $this->load->module('store_categories');
    $this->load->module('timedate');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);

    $data['headline'] = "Detail Laporan";

    $orders = $this->db->where('id', $order_id)->get('store_orders')->row();
    $item_id = $orders->item_id;
    $user_id = $orders->shop_id;
    // query utk menampilkan gambar
    $mysql_query = "SELECT * FROM laporan WHERE order_id = $order_id AND item_id = $item_id AND user_id = $user_id";
    $data['images'] = $this->_custom_query($mysql_query);
    $data['no_order'] = $orders->no_order;
    $data['durasi'] = $orders->duration;
    $data['start'] = $this->timedate->get_nice_date($orders->start, 'indo');
    $data['end'] = $this->timedate->get_nice_date($orders->end, 'indo');
    $data['lokasi'] = $orders->item_title;
    $item_id = $orders->item_id;
    $data['no_transaksi'] = $orders->no_transaksi;
    $data['kode_lokasi'] = App::view_by_id($item_id)->prod_code;
    $data['klien'] = Client::view_by_id($orders->shopper_id)->username.' - '.Client::view_by_id($orders->shopper_id)->company;
    $data['owner'] = Client::view_by_id($orders->shop_id)->username.' - '.Client::view_by_id($orders->shopper_id)->company;

    // cek kategori produk order
    $category_product = $this->manage_product->get_cat_prod($item_id);
    $category_prod_name = $this->store_categories->get_name_from_category_id($category_product);
    $data['kategori'] = $category_prod_name;
    if ($category_prod_name == 'Videotron') {
        $view_file = 'view_videotron';
    } else {
        $view_file = 'view';
    }

    $this->_set_to_opened($order_id);

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = $view_file;
    $this->load->module('templates');
    $this->templates->admin($data);
}

function getData() {
    $this->load->module('manage_daftar');
    $this->load->module('store_orders');
    $this->load->module('timedate');

    $mysql_query = "SELECT * FROM laporan GROUP BY order_id DESC";
    $query = $this->_custom_query($mysql_query); //$this->get('id');
    $no = 1;
    $path = base_url().'marketplace/laporan/';
    foreach($query->result() as $row){
        $edit_laporan = base_url()."manage_laporan/view/".$row->id;
        $opened = $row->opened;
        $status = $row->status;

        if ($status == 1) {
            $status_label = "m-badge--success";
            $status_desc = "Aktive";
        } else {
            $status_label = "m-badge--danger";
            $status_desc = "Inactive";
        }

        // get data from store_order
        $order_id = $row->order_id;
        $order = $this->db->where('id', $order_id)->get('store_orders')->row();

        $item_id = $order->item_id;
        $lokasi = $order->item_title;

        $klien = $this->manage_daftar->_get_customer_name($row->user_id);
        $toko = $this->manage_daftar->_get_customer_name($order->shop_id);
        $tgl = $this->timedate->get_nice_date($row->created_at,'indo');

        $data_laporan[] = array(
            "#" => "
                <span style='overflow: visible; width: 110px;'>                     
                    <div class='dropdown '>                         
                        <a href='#' class='btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown'>                                
                            <i class='la la-ellipsis-h'></i>                            
                        </a>                            
                        <div class='dropdown-menu dropdown-menu-right'>                             
                            <a class='dropdown-item' href='".base_url()."manage_laporan/view/".$row->order_id."'><i class='la la-file-text'></i> Preview</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/delete/".$row->order_id."/manage_laporan\")'><i class='la la-trash'></i> Delete</a>

                        </div>                      
                    </div>                      
                                    
                </span>
            ",
            "Lokasi" => "<a class='".$this->open($opened)."' href='".base_url()."manage_laporan/view/".$row->order_id."'>".$lokasi."</a>",
            "Order" => $order->no_order,
            "Klien" => $klien,
            "Owner" => $toko,
            "Tanggal" => $tgl,
            "Aksi" => "
                <span style='overflow: visible; width: 110px;''>                      
                <a href='".$edit_laporan."' class='m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' title='Edit details'>                          
                    <i class='la la-edit'></i>                      
                </a>                        
                <a href='#' onclick='hapus_dokumen(\"".$row->id."\")' class='m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill' title='Delete' data-toggle='modal' data-target=''>                           
                    <i class='la la-trash'></i>                     
                </a>    
                </span>
            "
        );
    }
    echo json_encode($data_laporan);
}

function open($opened) {
    return ($opened != 1)? 'seal' : '';
}

function status($status) {
    return ($status == 1)? 'Active' : 'Inactive';
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
    $data['waktu'] = $this->input->post('waktu', true);
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
        $data['image'] = $row->image;
        $data['waktu'] = $row->waktu;
        $data['created_at'] = $row->created_at;
        $data['status'] = $row->status;
        $data['opened'] = $row->opened;
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

        redirect('manage_laporan/manage');
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
        redirect('manage_laporan/view/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The materi were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_laporan/manage');
    }
}

function get($order_by)
{
    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->get($order_by);
    return $query;
}

function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_laporan');
    $this->mdl_laporan->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_laporan');
    $this->mdl_laporan->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_laporan');
    $this->mdl_laporan->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_laporan');
    $count = $this->mdl_laporan->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_laporan');
    $max_id = $this->mdl_laporan->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->_custom_query($mysql_query);
    return $query;
}

}