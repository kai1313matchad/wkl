<?php
class Promo extends MX_Controller 
{

    private $perPage = 2;

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper('text');
}

function getAjaxRes($word) {
    $mysql_query = "SELECT * FROM articles WHERE title LIKE ? OR body LIKE ? AND status = '1' ORDER BY id ASC LIMIT 6";
    $search = '%'.$word.'%';
    $query = $this->db->query($mysql_query, array($search, $search));

    $no = 1;
    echo "<div id='searchresults'>";
    foreach ($query->result_array() as $row)
    {   
        $class = ($no % 2 == 0) ? 'search-even' : 'search-odd';
        $path = base_url()."blog/view/".$row['slug'];
        
        echo "<div class='searchresults-wrapper'>";
        echo "<div class=".$class.">";
        echo "<a href=".$path.">".$row['title']."<small>".word_limiter($row['body'],10)."</small></a>";
        echo "</div>";
        echo "</div>";
        
        $no++;
   }
   echo "</div>";
}

function live_search() {
    if (!$this->input->is_ajax_request()) {
        exit('No direct script access allowed');
    }
    $word = $this->input->post('liveSearch');
    $result = $this->getAjaxRes($word);
    return $result;
}

function search_promo() {
    $this->load->module('site_settings');
    $this->load->module('custom_pagination');

    $word = $this->input->post('keywords');

    $mysql_query = "SELECT * FROM promo WHERE promo_title LIKE ? OR promo_desc LIKE ? AND status = '1' ORDER BY id ASC";
    $search = '%'.$word.'%';
    $query = $this->db->query($mysql_query, array($search, $search));

    // count items for the category
    $use_limit = FALSE;
    $total_items = $query->num_rows();

    // start pagination
    $pagination_data['template'] = 'market';
    $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
    $pagination_data['total_rows'] = $total_items;
    $pagination_data['offset_segment'] = 3;
    $pagination_data['limit'] = $this->get_limit();
    $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data); 

    $pagination_data['offset'] = $this->get_offset();
    $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data); 
    
    $data['query'] = $query;
    $data['view_file'] = "list";
    $this->load->module('templates');
    $this->templates->market($data);
}

function _draw_sidebar() {
    $mysql_query = "SELECT * FROM promo WHERE status = 1 ORDER BY id DESC LIMIT 0,2";  

    $data['test'] = 'test'; 
    $data['recents'] = $this->_custom_query($mysql_query);
    $this->load->view('sidebar', $data);
}

function get_month_name($month) {
    switch ($month) {
        case '01':
            $bulan = 'JAN';
            break;
        case '02':
            $bulan = 'FEB';
            break;
        case '03':
            $bulan = 'MAR';
            break;
        case '04':
            $bulan = 'APR';
            break;
        case '05':
            $bulan = 'MEI';
            break;
        case '06':
            $bulan = 'JUN';
            break;
        case '07':
            $bulan = 'JUL';
            break;
        case '08':
            $bulan = 'AGU';
            break;  
        case '09':
            $bulan = 'SEP';
            break;
        case '10':
            $bulan = 'OKT';
            break;
        case '11':
            $bulan = 'NOP';
            break;                          
        default:
            $bulan = 'DES';
            break;
    }

    return $bulan;
}

function view($url) {
    $this->load->module('timedate');
    $this->load->module('site_settings');
    $update_id = $this->_get_id_from_item_url($url);

    $data = $this->fetch_data_from_db($update_id);
    $data['title'] = $data['promo_title'];
    $data['promo_desc'] = $data['promo_desc'];
    $data['term_condition'] = $data['term_condition'];
    $data['featured_image'] = $data['featured_image'];
    $data['voucher_code'] = $data['voucher_code'];
    $data['min_basket_cost'] = $this->site_settings->currency_format2($data['min_basket_cost']);
    $data['discount_amount'] = $data['discount_amount'];
    $data['start'] = $this->timedate->get_nice_date($data['start'], 'indon2');
    $data['end'] = $this->timedate->get_nice_date($data['end'], 'indon2');
    // $date = explode('-', $data['created']);
    // $data['year'] = $date[0];
    // $month = $date[1];
    // $data['month'] = $this->get_month_name($month);
    // $data['day'] = $date[2]; 

    $data['next_data'] = $this->get_next_article_url($update_id);
    $data['prev_data'] = $this->get_prev_article_url($update_id);

    // build breadcrumb data array
    $breadcrumbs_data['template'] = 'public_bootstrap';
    $breadcrumbs_data['current_page_title'] = $data['title'];
    $breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($update_id);
    $data['breadcrumbs_data'] = $breadcrumbs_data;

    $data['view_file'] = "view";
    $this->load->module('templates');
    $this->templates->market($data);
}

function _generate_breadcrumbs_array($update_id) {
    $homepage_url = base_url();
    $breadcrumbs_array[$homepage_url] = 'Home';
    
    // get sub cat title
    $sub_cat_title = 'Promo';
    // get sub cat url
    $sub_cat_url = base_url('promo/list');

    $breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
    return $breadcrumbs_array;
}

function get_next_article_url($id = '') {
    $mysql_next = "SELECT * FROM promo WHERE id = (SELECT MIN(id) FROM promo WHERE id > $id AND status = 1);";
    $query = $this->_custom_query($mysql_next);

    foreach ($query->result() as $row) {
        $result = $row->slug;
    }

    if (isset($result)) {
        return $result;
    } 

}

function get_prev_article_url($id = '') {
    $mysql_prev = "SELECT * FROM promo WHERE id = (SELECT MAX(id) FROM promo WHERE id < $id AND status = 1);";
    $query = $this->_custom_query($mysql_prev);
    
    foreach ($query->result() as $row) {
        $result = $row->slug;
    }

    if (isset($result)) {
        return $result;
    } 
}

    function get_target_pagination_base_url() {
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        $target_base_url = base_url().$first_bit."/".$second_bit;
        // $target_base_url = base_url().$first_bit;
        return $target_base_url;
    }

    function _generate_mysql_query($use_limit) {
        
        $mysql_query = "SELECT * FROM promo WHERE status = 1 ORDER BY id DESC";                        
            
        if ($use_limit == TRUE) {
            $limit = $this->get_limit();
            $offset = $this->get_offset();
            $mysql_query.= " limit ".$offset.", ".$limit;
        }                        

        return $mysql_query;                        
    }

    function get_limit() {
        $limit = 6;
        return $limit;
    }

    function get_offset() {
        $offset = $this->uri->segment(3);
        if (!is_numeric($offset)) {
            $offset = 0;
        }

        // echo $offset;
        return $offset;
    }

function _get_id_from_item_url($url) {
    $query = $this->get_where_custom('promo_slug', $url);
    foreach ($query->result() as $row) {
        $article_id = $row->id;
    }

    if (!isset($article_id)) {
        $article_id = 0;
    }

    return $article_id;
}

public function list() {
    $this->load->module('site_settings');
    $this->load->module('custom_pagination');

    // count items for the category
    $use_limit = FALSE;
    $mysql_query = $this->_generate_mysql_query($use_limit);
    $query = $this->_custom_query($mysql_query);
    $total_items = $query->num_rows();

    // fetch items for this page
    $use_limit = TRUE;
    $mysql_query = $this->_generate_mysql_query($use_limit);

    // start pagination
    $pagination_data['template'] = 'market';
    $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
    $pagination_data['total_rows'] = $total_items;
    $pagination_data['offset_segment'] = 3;
    $pagination_data['limit'] = $this->get_limit();
    $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data); 

    $pagination_data['offset'] = $this->get_offset();
    $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data); 
    
    $data['query'] = $this->_custom_query($mysql_query);
    $data['view_file'] = "list";
    $this->load->module('templates');
    $this->templates->market($data);
}

public function index()
{
   $this->list();
}
    
    function hapus_gambar($image) {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        // lokasi folder image
        $path_real = './marketplace/promo/';
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
            redirect('promo/manage');
        }

        if ($submit == "Submit") {

            // var_dump($_FILES['featured_image']['name'] == '');
            // die();

            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('promo_title', 'Judul Promo', 'trim|required');
            // $this->form_validation->set_rules('body', 'Isi Artikel', 'required');
            // $this->form_validation->set_rules('featured_image', 'Gambar', 'required|callback_upload_image');

            if ($this->form_validation->run() == TRUE) {
                // $data = $this->fetch_data_from_post();

                // ganti titik dengan _
                $filename = $_FILES['featured_image']['name'];
                $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
                $nama_baru = str_replace(' ', '_', $new_filename);
                
                $nmfile = date("ymdHis").'_'.$nama_baru;
                $loc = './marketplace/promo/';

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
                                'promo_title' => $this->input->post('promo_title', true),
                                'promo_slug' => strtolower(url_title($this->input->post('promo_title', true))),
                                'promo_desc' => $this->input->post('promo_desc', true),
                                'term_condition' => $this->input->post('term_condition', true),
                                'featured_image' => $nmfile,
                                'voucher_code' => strtoupper($this->input->post('voucher_code', true)),
                                'min_basket_cost' =>  $this->input->post('min_basket_cost', true),
                                'discount_operator' => $this->input->post('discount_operator', true),
                                'discount_amount' =>  $this->input->post('discount_amount', true),
                                'num_voucher' => $this->input->post('num_voucher', true),
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

                                $flash_msg = "The promo were successfully updated.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('promo/create/'.$update_id);

                            } else {
                                $this->_insert($data);
                                $update_id = $this->get_max();

                                $flash_msg = "The promo was successfully added.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('promo/create/'.$update_id);
                            }
                            

                        } else {
                            $flash_msg = "Upload failed!.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('promo/create/'.$update_id);
                        }
                    }
                } else {
                    $data = array(
                        'promo_title' => $this->input->post('promo_title', true),
                        'promo_slug' => strtolower(url_title($this->input->post('promo_title', true))),
                        'promo_desc' => $this->input->post('promo_desc', true),
                        'term_condition' => $this->input->post('term_condition', true),
                        'voucher_code' => strtoupper($this->input->post('voucher_code', true)),
                        'min_basket_cost' =>  $this->input->post('min_basket_cost', true),
                        'discount_operator' => $this->input->post('discount_operator', true),
                        'discount_amount' =>  $this->input->post('discount_amount', true),
                        'num_voucher' => $this->input->post('num_voucher', true),
                        'start' =>  $awal,
                        'end' => $akhir,
                        'status' => $this->input->post('status', true),
                        'created' => time(),
                        'modified' => time(),
                    );

                    if (is_numeric($update_id)) {
                        $this->_update($update_id, $data);

                        $flash_msg = "The promo were successfully updated.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('promo/create/'.$update_id);
                    } else {
                        $this->_insert($data);
                        $update_id = $this->get_max();

                        $flash_msg = "The promo was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('promo/create/'.$update_id);
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
            $data['headline'] = "Tambah Promo";
        } else {
            $data['headline'] = "Update Promo";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function _compress_image($file_name) {
        $path_real = './marketplace/promo/';
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
            redirect('promo/create/'.$update_id);
        } elseif ($submit == "Delete") {
            // delete featured image
            $this->_process_delete($update_id);

            // delete the item record from db
            $this->_delete($update_id); 
            
            $flash_msg = "The promo were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('promo/manage');
        }
    }

    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['featured_image'];
        $small_pic = $big_pic;

        $path_real = './marketplace/promo/';
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

        $path_real = './marketplace/promo/';
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

        $flash_msg = "The promo image were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('promo/create/'.$update_id);
    } 

    // function upload_image() {
    //     $nama_baru = str_replace(' ', '_', $_FILES['featured_image']['name']);
                
    //     $nmfile = date("ymdHis").'_'.$nama_baru;
    //     $loc = './marketplace/promo/';

    //     $config['upload_path']          = $loc; //$this->path;
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['max_size'] = '20048'; //maksimum besar file 2M
    //     $config['max_width']  = '1600'; //lebar maksimum 1288 px
    //     $config['max_height']  = '768'; //tinggi maksimu 768 px    
    //     $config['file_name'] = $nmfile; //nama yang terupload nantinya

    //     $location = base_url().$loc.$nmfile;

    //     $this->load->library('upload', $config);

    //     // update database
    //     $this->db->update('vendor', array('SIUP' => $nmfile), array('id' => $id));

    //     if ($this->upload->do_upload('featured_image')) {
    //         return TRUE;
    //     } else {
    //         $error_msg = $this->upload->display_errors();
    //         $this->form_validation->set_message('featured_image', $this->upload->display_errors());
    //         return FALSE;
    //     }

    // }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $mysql_query = "SELECT * FROM promo ORDER BY id DESC";

        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['promo_title'] = $this->input->post('promo_title', true);
        $data['promo_slug'] = url_title($this->input->post('promo_title', true));
        $data['promo_desc'] = $this->input->post('promo_desc', true);
        $data['term_condition'] = $this->input->post('term_condition', true);
        $data['voucher_code'] = strtoupper($this->input->post('voucher_code', true));
        $data['min_basket_cost'] =  $this->input->post('min_basket_cost', true);
        $data['discount_operator'] = $this->input->post('discount_operator', true);
        $data['discount_amount'] =  $this->input->post('discount_amount', true);
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
            $data['promo_title'] = $row->promo_title;
            $data['promo_slug'] = $row->promo_slug;
            $data['promo_desc'] = $row->promo_desc;
            $data['term_condition'] = $row->term_condition;
            $data['featured_image'] = $row->featured_image;
            $data['voucher_code'] = $row->voucher_code;
            $data['min_basket_cost'] = $row->min_basket_cost;
            $data['discount_operator'] = $row->discount_operator;
            $data['discount_amount'] = $row->discount_amount;
            $data['num_voucher'] = $row->num_voucher;
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


function get($order_by)
{
    $this->load->model('mdl_promo');
    $query = $this->mdl_promo->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_promo');
    $query = $this->mdl_promo->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_promo');
    $query = $this->mdl_promo->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_promo');
    $query = $this->mdl_promo->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_promo');
    $this->mdl_promo->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_promo');
    $this->mdl_promo->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_promo');
    $this->mdl_promo->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_promo');
    $count = $this->mdl_promo->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_promo');
    $max_id = $this->mdl_promo->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_promo');
    $query = $this->mdl_promo->_custom_query($mysql_query);
    return $query;
}

}