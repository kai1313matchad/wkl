<?php
class Product extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    function billboard() {
        // figure out what the item ID is
        $this->load->module('manage_product');
        $item_url = $this->uri->segment(3);
        // make sure that exactly in DB
        $result = $this->manage_product->_make_sure_is_in_db($item_url);
        if (!$result) {
            redirect('default_module/no_data');
        }
        $this->load->module('manage_product');
        $item_id = $this->manage_product->_get_item_id_from_item_url($item_url);
        $this->manage_product->view($item_id);
    }

}