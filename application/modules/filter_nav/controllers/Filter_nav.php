<?php
class Filter_nav extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('hello');
    }

    function _draw_filter_top() {
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->load->module('store_categories');
        
        $data['prov'] = $this->store_provinces->get('id_prov');
        $data['city'] = $this->store_cities->get('id_kab');
        $data['jenis'] = $this->store_categories->get('id');
        $this->load->view('filter_top_nav', $data);
    }

    function _draw_filter_cat() {
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->load->module('store_categories');
        $this->load->module('store_duration');
        $this->load->module('store_roads');
        $this->load->module('store_labels');
        $this->load->module('store_sizes');

        $data['tipe_jalan'] = $this->store_roads->get('id');
        $data['prov'] = $this->store_provinces->get('id_prov');
        $data['city'] = $this->store_cities->get('id_kab');
        $data['jenis'] = $this->store_categories->get('id');
        $data['label'] = $this->store_labels->get('id');
        $data['sizes'] = $this->store_sizes->get('id');

        $this->load->view('filter_cat_page', $data);
    }

    function _draw_filter_place() {
        $this->load->module('store_categories');

        $mysql_query = "SELECT * FROM store_categories WHERE parent_cat_id != 0 AND big_pic != '' AND status = 1 LIMIT 10";
        $data['places'] = $this->store_categories->_custom_query($mysql_query);
        $this->load->view('filter_place', $data);
    }

    function _draw_filter_loc() {
        $this->load->module('store_provinces');

        $mysql_query = "select * from provinsi where big_pic != ''";
        // $data['prov'] = $this->store_provinces->get('id_prov');
        $data['prov'] = $this->store_provinces->_custom_query($mysql_query);
        $this->load->view('filter_location', $data);
    }

    function _draw_search_filter() {
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->load->module('store_categories');
        $this->load->module('store_duration');
        $this->load->module('store_roads');

        $data['tipe_durasi'] = $this->store_duration->get('id');
        $data['tipe_jalan'] = $this->store_roads->get('id');
        $data['prov'] = $this->store_provinces->get('id_prov');
        $data['city'] = $this->store_cities->get('id_kab');
        $data['jenis'] = $this->store_categories->get('id');
        $this->load->view('filter_search', $data);
    }

}