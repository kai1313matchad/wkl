<?php
class Store_categories extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    function _get_item_id_from_item_url($url) {
        $query = $this->get_where_custom('cat_url', $url);
        foreach ($query->result() as $row) {
            $id = $row->id;
        }

        if (!isset($id)) {
            $id = 0;
        }

        return $id;
    }

    function get_name_from_category_id($id) {
        $query = $this->get_where_custom('id', $id);
        foreach ($query->result() as $row) {
            $name = $row->cat_title;
        }

        if (!isset($name)) {
            $name = 0;
        }

        return $name;
    }

    function _get_full_cat_url($update_id) {
        $this->load->module('site_settings');
        $items_segments = $this->site_settings->_get_item_segments();
        $data = $this->fetch_data_from_db($update_id);
        $cat_url = $data['cat_url'];
        $full_cat_url = base_url().$items_segments.$cat_url;
        return $full_cat_url;
    }

    // search
    function search_loc() {
        $this->load->module('site_settings');
        $this->load->module('custom_pagination');

        $word = $this->input->post('keywords');

        $mysql_query = "SELECT * FROM store_item WHERE item_title LIKE ? OR item_description LIKE ? OR item_address LIKE ? AND deleted <> '1' ORDER BY id ASC";
        $search = '%'.$word.'%';
        $query = $this->db->query($mysql_query, array($search, $search, $search));

        if ($query->num_rows() > 0) {
            $error = FALSE;
        } else {
            $error = TRUE;
        }

        // count items for the category
        $use_limit = FALSE;
        $total_items = $query->num_rows();

        // pagination
        $pagination_data['template'] = 'market';
        $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
        $pagination_data['total_rows'] = $total_items;
        $pagination_data['offset_segment'] = 4;
        $pagination_data['limit'] = $this->get_limit();
        $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data); 

        $pagination_data['offset'] = $this->get_offset();
        $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data);

        
        $data['query'] = $query;
        $data['error'] = ($error) ? TRUE : FALSE;
        $data['total'] = ($error == TRUE) ? 0 : $total_items ;
        $data['currency_symbol'] = $this->site_settings->_get_currency_symbol();
        $data['item_segments'] = $this->site_settings->_get_item_segments();
        $data['view_module'] = "store_categories";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function filter($code_id = '', $cat = '', $stat = '', $road = '', $size = '', $disp = '', $province_id = '', $city_id = '') {

        $this->load->module('site_settings');
        $this->load->module('custom_pagination');

        // mulai
        $all_result = array();
        $cat_result = array();
        $prov_result = array();
        $city_result = array();
        $road_result = array();
        $display_result = array();
        $status_result = array();
        $size_result = array();
        $code_result = array();
        $final_result = array();

        // get all id
        $this->db->where('status', 1);
        $this->db->where('deleted <>', '1');
        $all_id = $this->db->get('store_item')->result_array();
        
        foreach ($all_id as $row) {
            $all_result[] = $row['id'];
        }

        // for category
        $categories = array();
        if (isset($cat)) {
            if ($cat !== '') {
                foreach ($cat as $cat_multi) {
                    $categories[] = $cat_multi; 
                }
                $this->db->where_in('cat_prod', $categories);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $cat_search = $this->db->get('store_item')->result_array();
                foreach ($cat_search as $row) {
                    $cat_result[] = $row['id'];
                }
            }
        } else {
            $cat_result = $all_result;
        }

        // for status
        $status = array();
        if (isset($stat)) {
            if ($stat !== '') {
                foreach ($stat as $stat_multi) {
                    $status[] = $stat_multi; 
                }
                $this->db->where_in('cat_stat', $status);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $stat_search = $this->db->get('store_item')->result_array();
                foreach ($stat_search as $row) {
                    $status_result[] = $row['id'];
                }
            }
        } else {
            $status_result = $all_result;
        }

        // for road
        $roads = array();
        if (isset($road)) {
            if ($road !== '') {
                foreach ($road as $road_multi) {
                    $roads[] = $road_multi; 
                }
                $this->db->where_in('cat_road', $roads);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $road_search = $this->db->get('store_item')->result_array();
                foreach ($road_search as $row) {
                    $road_result[] = $row['id'];
                }
            }
        } else {
            $road_result = $all_result;
        }
        
        // for size
        $sizes = array();
        if (isset($size)) {
            if ($size !== '') {
                foreach ($size as $size_multi) {
                    $sizes[] = $size_multi; 
                }
                $this->db->where_in('cat_size', $sizes);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $size_search = $this->db->get('store_item')->result_array();
                foreach ($size_search as $row) {
                    $size_result[] = $row['id'];
                }
            }
        } else {
            $size_result = $all_result;
        }
        
        // for display
        $displays = array();
        if (isset($disp)) {
            if ($disp !== '') {
                foreach ($disp as $disp_multi) {
                    $displays[] = $disp_multi; 
                }
                $this->db->where_in('cat_type', $displays);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $display_search = $this->db->get('store_item')->result_array();
                foreach ($display_search as $row) {
                    $display_result[] = $row['id'];
                }
            }
        } else {
            $display_result = $all_result;
        }
        
        // for provinsi
        if (isset($province_id)) {
            if ($province_id !== '') {
                $this->db->where('cat_prov', $province_id);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $prov_search = $this->db->get('store_item')->result_array();
                foreach ($prov_search as $row) {
                    $prov_result[] = $row['id'];
                }
            }
        } else {
            $prov_result = $all_result;
        }

        // for kota
        if (isset($city_id)) {
            if ($city_id !== '') {
                $this->db->where('cat_city', $city_id);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $city_search = $this->db->get('store_item')->result_array();
                foreach ($city_search as $row) {
                    $city_result[] = $row['id'];
                }
            }
        } else {
            $city_result = $all_result;
        }

        // for kode
        if (isset($code_id)) {
            if ($code_id !== '') {
                $this->db->where('prod_code', $code_id);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $code_search = $this->db->get('store_item')->result_array();
                foreach ($code_search as $row) {
                    $code_result[] = $row['id'];
                }
            }
        } else {
            $code_result = $all_result;
        }

        $final_result = array_intersect($all_result, $cat_result, $city_result, $prov_result, $road_result, $display_result, $status_result, $code_result, $size_result);

        if (count($final_result) !== 0) {
            $error = FALSE;
            $this->db->order_by('id', 'desc');
            $this->db->where('deleted <>', '1');
            $this->db->where_in('id', $final_result);
            $query = $this->db->get('store_item');
          
        } else {
            $error = TRUE;
            $this->db->where('status', 1);
            $this->db->where('deleted <>', '1');
            $this->db->order_by('id', 'desc');
            $query = $this->db->get('store_item');
        }

        $final = implode(', ', $final_result);
        $limit = $this->get_limit();
        $offset = $this->get_offset();

        // count items for the category
        $total_items = $query->num_rows();

        // fetch the item for this page
        if (count($final_result) !== 0) {
            $mysql_query = "SELECT * FROM store_item WHERE id IN ($final) AND deleted <> '1' ORDER BY id DESC LIMIT $offset, $limit";
            $query2 = $this->_custom_query($mysql_query);
        } else {
            $query2 = 0;
        }
        
        // pagination
        $pagination_data['template'] = 'market';
        $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
        $pagination_data['total_rows'] = $total_items;
        $pagination_data['offset_segment'] = 3;
        $pagination_data['limit'] = $this->get_limit();
        $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data); 

        $pagination_data['offset'] = $this->get_offset();
        $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data);

        
        $data['query'] = $query2;
        $data['error'] = ($error) ? TRUE : FALSE;
        $data['total'] = ($error == TRUE) ? 0 : $total_items ;
        $data['currency_symbol'] = $this->site_settings->_get_currency_symbol();
        $data['item_segments'] = $this->site_settings->_get_item_segments();
        $data['view_module'] = "store_categories";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->market($data);

    }

    function search($category_id = '', $province_id = '', $city_id = '', $road_id = '', $display_id = '') {
        $this->load->module('site_settings');
        $this->load->module('custom_pagination');

        // mulai
        $all_result = array();
        $cat_result = array();
        $prov_result = array();
        $city_result = array();
        $road_result = array();
        $display_result = array();
        $final_result = array();

        $this->db->where('status', 1);
        $this->db->where('deleted <>', '1');
        $all_id = $this->db->get('store_item')->result_array();
        
        foreach ($all_id as $row) {
            $all_result[] = $row['id'];
        }

        if (isset($category_id)) {
            if ($category_id !== '') {
                $this->db->where('cat_prod', $category_id);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $cat_search = $this->db->get('store_item')->result_array();
                foreach ($cat_search as $row) {
                    $cat_result[] = $row['id'];
                }
            }
        } else {
            $cat_result = $all_result;
        }

        // var_dump($cat_result);
        // die();

        if (isset($province_id)) {
            if ($province_id !== '') {
                $this->db->where('cat_prov', $province_id);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $prov_search = $this->db->get('store_item')->result_array();
                foreach ($prov_search as $row) {
                    $prov_result[] = $row['id'];
                }
            }
        } else {
            $prov_result = $all_result;
        }

        // var_dump($prov_result);

        if (isset($city_id)) {
            if ($city_id !== '') {
                $this->db->where('cat_city', $city_id);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $city_search = $this->db->get('store_item')->result_array();
                foreach ($city_search as $row) {
                    $city_result[] = $row['id'];
                }
            }
        } else {
            $city_result = $all_result;
        }

        if (isset($road_id)) {
            if ($road_id !== '') {
                $this->db->where('cat_road', $road_id);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $road_search = $this->db->get('store_item')->result_array();
                foreach ($road_search as $row) {
                    $road_result[] = $row['id'];
                }
            }
        } else {
            $road_result = $all_result;
        }

        if (isset($display_id)) {
            if ($display_id !== '') {
                $this->db->where('cat_type', $display_id);
                $this->db->where('status', 1);
                $this->db->where('deleted <>', '1');
                $display_search = $this->db->get('store_item')->result_array();
                foreach ($display_search as $row) {
                    $display_result[] = $row['id'];
                }
            }
        } else {
            $display_result = $all_result;
        }

        $final_result = array_intersect($all_result, $cat_result, $city_result, $prov_result, $road_result, $display_result);
    
        // var_dump($final_result);
        // die();

        if (count($final_result) !== 0) {
            $error = FALSE;
            $this->db->order_by('id', 'desc');
            $this->db->where_in('id', $final_result);
            $this->db->where('deleted <>', '1');
            $query = $this->db->get('store_item');
          
        } else {
            $error = TRUE;
            $this->db->where('status', 1);
            $this->db->where('deleted <>', '1');
            $this->db->order_by('id', 'desc');
            $query = $this->db->get('store_item');
        }

        $final = implode(', ', $final_result);
        $limit = $this->get_limit();
        $offset = $this->get_offset();

        // count items for the category
        $total_items = $query->num_rows();

        // fetch the item for this page
        if (count($final_result) !== 0) {
            $mysql_query = "SELECT * FROM store_item WHERE id IN ($final) AND deleted <> '1' ORDER BY id DESC LIMIT $offset, $limit";
            $query2 = $this->_custom_query($mysql_query);
        } else {
            $query2 = 0;
        }
        
        // pagination
        $pagination_data['template'] = 'market';
        $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
        $pagination_data['total_rows'] = $total_items;
        $pagination_data['offset_segment'] = 3;
        $pagination_data['limit'] = $this->get_limit();
        $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data); 

        $pagination_data['offset'] = $this->get_offset();
        $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data);

        
        $data['query'] = $query2;
        $data['error'] = ($error) ? TRUE : FALSE;
        $data['total'] = ($error == TRUE) ? 0 : $total_items ;
        $data['currency_symbol'] = $this->site_settings->_get_currency_symbol();
        $data['item_segments'] = $this->site_settings->_get_item_segments();
        $data['view_module'] = "store_categories";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function view2() {
        $this->load->module('site_settings');
        $this->load->module('custom_pagination');

        // count items for the category
        $use_limit = FALSE;
        // $mysql_query = "select * from store_item where status = 1 order by id desc";
        $mysql_query = $this->_generate_mysql_query($update_id = '', $use_limit);
        $query = $this->_custom_query($mysql_query);
        $total_items = $query->num_rows();

        //fetch the item for this page
        $use_limit = TRUE;
        $mysql_query = $this->_generate_mysql_query($update_id = '', $use_limit);

        // pagination
        $pagination_data['template'] = 'market';
        $pagination_data['target_base_url'] = $this->get_target_pagination_base_url(); // base_url().'category/all'; // 
        $pagination_data['total_rows'] = $total_items;
        $pagination_data['offset_segment'] = 3;
        $pagination_data['limit'] = $this->get_limit();
        $data['pagination'] = $this->custom_pagination->_generate_pagination2($pagination_data); 

        $pagination_data['offset'] = $this->get_offset();
        $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data);

        $data['query'] = $this->_custom_query($mysql_query);
        $data['total'] = $total_items ;
        $data['currency_symbol'] = $this->site_settings->_get_currency_symbol();
        $data['item_segments'] = $this->site_settings->_get_item_segments();
        $data['view_module'] = "store_categories";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function view($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->module('site_settings');
        $this->load->module('custom_pagination');

        $data = $this->fetch_data_from_db($update_id);

        // count items for the category
        $use_limit = FALSE;
        $mysql_query = $this->_generate_mysql_query($update_id, $use_limit);
        $query = $this->_custom_query($mysql_query);
        $total_items = $query->num_rows();

        // fetch items for this page
        $use_limit = TRUE;
        $mysql_query = $this->_generate_mysql_query($update_id, $use_limit);

        // 
        $pagination_data['template'] = 'market';
        $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
        $pagination_data['total_rows'] = $total_items;
        $pagination_data['offset_segment'] = 4;
        $pagination_data['limit'] = $this->get_limit();
        $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data); 

        $pagination_data['offset'] = $this->get_offset();
        $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data);        

        $data['total'] = $total_items;
        $data['currency_symbol'] = $this->site_settings->_get_currency_symbol();
        $data['item_segments'] = $this->site_settings->_get_item_segments();
        $data['query'] = $this->_custom_query($mysql_query);
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_module'] = "store_categories";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->market($data);
    } 

    function get_target_pagination_base_url() {
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        $third_bit = $this->uri->segment(3);
        // $target_base_url = base_url().$first_bit."/".$second_bit."/".$third_bit;
        $target_base_url = base_url().$first_bit."/".$second_bit;
        return $target_base_url;
    }

    function _generate_mysql_query($update_id = '', $use_limit) {
        
        if ($update_id != '') {
            $mysql_query = "SELECT store_item.*, store_categories.*,
                                store_item.id AS id_prod,
                                store_categories.id AS id_cat,
                                store_item.status AS status_prod,
                                store_item.status AS status_cat
                                FROM store_categories INNER JOIN store_item ON store_categories.id = store_item.cat_prod
                                WHERE store_categories.id=$update_id AND store_item.status=1 AND store_item.deleted <> '1'";
        } else {    
            $mysql_query = "SELECT * FROM store_item WHERE status = 1 AND deleted <> '1' ORDER BY id DESC";                        
        }
            
        if ($use_limit == TRUE) {
            $limit = $this->get_limit();
            $offset = $this->get_offset();
            $mysql_query.= " limit ".$offset.", ".$limit;
        }                        

        return $mysql_query;                        
    }

    function get_limit() {
        $limit = 12;
        return $limit;
    }

    function get_offset() {
        $offset = $this->uri->segment(3);
        if (!is_numeric($offset)) {
            $offset = 0;
        }
        return $offset;
    }

    function _get_cat_id_from_cat_url($cat_url) {
        $query = $this->get_where_custom('cat_url', $cat_url);
        foreach ($query->result() as $row) {
            $cat_id = $row->id;
        }

        if (!isset($cat_id)) {
            $cat_id = 0;
        }

        return $cat_id;
    }

    function _draw_top_nav() {
        $mysql_query = "select * from store_categories where parent_cat_id=0 order by priority";
        $query = $this->_custom_query($mysql_query);
        foreach ($query->result() as $row) {
            $parent_categories[$row->id] = $row->cat_title; 
        }

        $this->load->module('site_settings');
        $items_segments = $this->site_settings->_get_items_segments();
        $data['target_url_start'] = base_url().$items_segments;
        $data['parent_categories'] = $parent_categories;
        $this->load->view('top_nav', $data);
    }

    function _get_parent_cat_title($update_id) {
        $data = $this->fetch_data_from_db($update_id);
        $parent_cat_id = $data['parent_cat_id'];
        $parent_cat_title = $this->_get_cat_title($parent_cat_id);
        return $parent_cat_title;
    }

    function _get_all_sub_cats_for_dropdown() {
        $mysql_query = "select * from store_categories where parent_cat_id!=0 order by parent_cat_id, cat_title";
        $query = $this->_custom_query($mysql_query);
        foreach ($query->result() as $row) {
            $parent_cat_title = $this->_get_cat_title($row->parent_cat_id);
            $sub_categories[$row->id] = $parent_cat_title.">".$row->cat_title; 
        }

        if (!isset($sub_categories)) {
            $sub_categories = "";
        }
        return $sub_categories;
    }

    function sort() {
       
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $number = $this->input->post('number', TRUE);
        for ($i = 1; $i <= $number; $i++) {
            $update_id = $_POST['order'.$i];
            //$update_id = $this->input->post('order'.$i);
            $data['priority'] = $i;
            $this->_update($update_id, $data);
        }
        
    }

    function _draw_sortable_list($parent_cat_id) {
        $mysql_query = "select * from store_categories where parent_cat_id=$parent_cat_id order by priority";
        $data['query'] = $this->_custom_query($mysql_query);
        $this->load->view('sortable_list', $data);
    }

    function _count_sub_cats($update_id) {
        $query = $this->get_where_custom('parent_cat_id', $update_id);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function _get_cat_title($update_id) {
        $data = $this->fetch_data_from_db($update_id);
        $cat_title = $data['cat_title'];
        return $cat_title;
    }

    function _get_dropdown_options($update_id) {
        if (!is_numeric($update_id)) {
            $update_id = 0;
        }

        $options[''] = 'Please Select';

        $mysql_query = "select * from store_categories where parent_cat_id=0 and id!=$update_id";
        $query = $this->_custom_query($mysql_query);

        foreach ($query->result() as $row) {
            $options[$row->id] = $row->cat_title;
        }
        return $options;
    }

    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Cancel") {
            redirect('store_categories/manage');
        }

        if ($submit == "Submit") {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('cat_title', 'Category title', 'required|max_length[204]');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();
                $data['cat_url'] = url_title($data['cat_title']);

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The category details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('store_categories/create/'.$update_id);
                } else {

                    $this->_insert($data);
                    $update_id = $this->get_max();

                    $flash_msg = "The category details was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('store_categories/create/'.$update_id);
                }
            } 
        }

        if ((is_numeric($update_id)) && ($submit!="Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Category";
        } else {
            $data['headline'] = "Update Category Details";
        }

        $data['options'] = $this->_get_dropdown_options($update_id);
        $data['num_dropdown_options'] = count($data['options']);

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        //$data['view_module'] = "Store_items";
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $parent_cat_id = $this->uri->segment(3);
        if (!is_numeric($parent_cat_id)) {
            $parent_cat_id = 0;
        }

        $data['sort_this'] = TRUE;
        $data['query'] = $this->get('id');  // $this->get_where_custom('parent_cat_id', $parent_cat_id);
        $data['parent_cat_id'] = $parent_cat_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

    function delete($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('store_categories/create/'.$update_id);
        } elseif ($submit == "Delete") {
            // delete the item record from db
            $this->_delete($update_id);
            // $this->_process_delete($update_id);

            $flash_msg = "The category were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('store_categories/manage');
        }
    }

    function fetch_data_from_post() {
        $data['cat_title'] = $this->input->post('cat_title');
        $data['cat_kode'] = strtoupper($this->input->post('cat_kode'));
        $data['parent_cat_id'] = $this->input->post('parent_cat_id');
        $data['status'] = $this->input->post('status');

        return $data;
    }

    function fetch_data_from_db($update_id) {

        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['cat_title'] = $row->cat_title;
            $data['cat_kode'] = $row->cat_kode;
            $data['cat_url'] = $row->cat_url;
            $data['parent_cat_id'] = $row->parent_cat_id;
            $data['status'] = $row->status;
        }

        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

    function get($order_by)
    {
        $this->load->model('mdl_store_categories');
        $query = $this->mdl_store_categories->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) 
    {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_categories');
        $query = $this->mdl_store_categories->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_categories');
        $query = $this->mdl_store_categories->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) 
    {
        $this->load->model('mdl_store_categories');
        $query = $this->mdl_store_categories->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_store_categories');
        $this->mdl_store_categories->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_categories');
        $this->mdl_store_categories->_update($id, $data);
    }

    function _delete($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_categories');
        $this->mdl_store_categories->_delete($id);
    }

    function count_where($column, $value) 
    {
        $this->load->model('mdl_store_categories');
        $count = $this->mdl_store_categories->count_where($column, $value);
        return $count;
    }

    function get_max() 
    {
        $this->load->model('mdl_store_categories');
        $max_id = $this->mdl_store_categories->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) 
    {
        $this->load->model('mdl_store_categories');
        $query = $this->mdl_store_categories->_custom_query($mysql_query);
        return $query;
    }

}