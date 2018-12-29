<?php
class Manage_seo extends MX_Controller 
{

function __construct() {
parent::__construct();
}

    function _get_open_graph($first, $last) {
        $this->load->module('manage_product');
        $this->load->module('blog');

        // global var
        $data['sitename'] = 'Wiklan.com';
        $data['creator'] = 'wiklan.com';
        $data['app_id'] = '';
        $data['domain'] = 'www.wiklan.com';

        if (isset($last)) {
            if ($first == 'product') {
                // get id from manage product with slug
                $item_id = $this->manage_product->_get_item_id_from_item_url($last);
                // get detail product
                $product = $this->manage_product->fetch_data_from_db($item_id);
                $data['url'] = base_url().'product/billboard/'.$product['item_url']; 
                $data['title'] = $product['item_title'];
                $data['desc'] = strip_tags($product['item_description']);
                $data['image'] = base_url().'marketplace/limapuluh/900x500/'.$product['limapuluh'];

                $this->load->view('seo', $data);
            } elseif ($first == 'blog') {
               
                // get id from blog url
                $blog_id = $this->blog->_get_id_from_item_url($last);
                // get detail blog
                $blog = $this->blog->fetch_data_from_db($blog_id);
                $data['url'] = base_url().'blog/view/'.$blog['slug']; 
                $data['title'] = $blog['title'];
                $data['desc'] = strip_tags($blog['body']);
                $data['image'] = base_url().'marketplace/artikel/'.$blog['featured_image'];

                $this->load->view('seo', $data);
            }

            
        }

        
    }

}