<?php
class Category extends MX_Controller 
{

    function __construct() {
        parent::__construct();

        header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    function _remap($method, $params = array())
    {
        $method_exists = method_exists($this, $method);
        $methodToCall = $method_exists ? $method : 'index';
        $this->$methodToCall($method_exists ? $params : $method);
    } 

    function index($cat_url = '') {
        // echo $cat_url;
        // die();

        $cat_result = array();

        $query = $this->db->get('store_categories');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $cat_result[] = $row['cat_url'];
            }
        }

        if (!in_array($cat_url, $cat_result)) {
            redirect('default_module/no_data');
        }

        if ($cat_url[0] == '') {
            redirect('category/all');
        } 
        // could not work when uri segment 2 not valid 
        // else {
        //     redirect('default_module/no_data');
        // }

        $this->load->module('store_categories');
        $cat_id = $this->store_categories->_get_item_id_from_item_url($cat_url);
        $this->store_categories->view($cat_id);
    }

    function all() {
        $this->load->module('store_categories');
        $this->store_categories->view2();
    }

    function search() {
        $this->load->module('store_categories');
        $this->load->module('store_provinces');

        $loc = $this->uri->segment(3);
        if (!is_numeric($loc)) {
            $loc_id = $this->store_provinces->get_id_from_province_name($loc);
        }

        if ($this->input->post('cat_prod')) {
            $category_id = $this->input->post('cat_prod');
        }

        // var_dump($category_id);
        // die();

        if ($this->input->post('cat_prov')) {
            $province_id = $this->input->post('cat_prov');
        } 

        if (isset($loc)) {
            if (!is_numeric($loc)) {
                $province_id = $loc_id;
            }
        }
        

        // var_dump($province_id);
        // die();

        if ($this->input->post('cat_city')) {
            $city_id = $this->input->post('cat_city');
        }

        if ($this->input->post('cat_road')) {
            $road_id = $this->input->post('cat_road');
        }

        if ($this->input->post('cat_display')) {
            $display_id = $this->input->post('cat_display');
        }

        $this->store_categories->search(isset($category_id) ? $category_id : null, isset($province_id) ? $province_id : null, isset($city_id) ? $city_id : null, isset($road_id) ? $road_id : null, isset($display_id) ? $display_id : null);
    }

    function _check_category() {
        $cat_result = array();

        $query = $this->db->get('store_categories');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $cat_result[] = $row['cat_url'];
            }
        }
        
        return $cat_result;
        
    }


    function filter() {
        $this->load->module('store_categories');

        if ($this->input->post('prod_code')) {
            $code = $this->input->post('prod_code');
        }

        if ($this->input->post('ccheck')) {
            $cat = $this->input->post('ccheck');
        }

        if ($this->input->post('scheck')) {
            $stat = $this->input->post('scheck');
        }

        if ($this->input->post('rcheck')) {
            $road = $this->input->post('rcheck');
        }

        if ($this->input->post('ucheck')) {
            $size = $this->input->post('ucheck');
        }

        if ($this->input->post('dcheck')) {
            $disp = $this->input->post('dcheck');
        }

        if ($this->input->post('filter_prov')) {
            $province_id = $this->input->post('filter_prov');
        }

        if ($this->input->post('filter_city')) {
            $city_id = $this->input->post('filter_city');
        }

        // $categories = array();
        // foreach ($cat as $cat_multi) {
        //     $categories[] = $cat_multi; 
        // }

        // $kategori_id = implode(', ', $categories);

        // var_dump($categories);
        // die();

        $this->store_categories->filter(
            isset($code) ? $code : null, 
            isset($cat) ? $cat : null,
            isset($stat) ? $stat : null,
            isset($road) ? $road : null,
            isset($size) ? $size : null,
            isset($disp) ? $disp : null,
            isset($province_id) ? $province_id : null,
            isset($city_id) ? $city_id : null
        );
    }

}