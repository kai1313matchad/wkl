<?php
class Store_voucher extends MX_Controller 
{

function __construct() {
	parent::__construct();
}

	public function index()
    {
        $this->load->module('site_security');
        $this->load->module('manage_poin');
        $this->load->module('manage_voucher');
        $this->site_security->_make_sure_logged_in();

        $user_id = $this->session->userdata('user_id');
        $this->load->module('manage_daftar');
        $query = $this->manage_daftar->get_where($user_id);
        foreach ($query->result() as $row) {
            $data['username'] = $row->username;
            $data['company'] = $row->company;
            $data['pic'] = $row->pic;
            $data['update_id'] = $row->user_code;
        }

        // get jumlah point
        $query2 = $this->manage_poin->get_where($user_id);
        foreach ($query2->result() as $val) {
        	$data['point'] = $val->points;
        }

        // get voucher yg dimiliki
        $this->load->model('Voucher');
        $data['count_own_voucher'] = Voucher::count_all_own_voucher($user_id);
        $data['my_own_voucher'] = Voucher::get_my_own_voucher($user_id);

        // set slide
        $data['slide'] = $this->manage_voucher->get_img_voucher();

        $data['headline'] = '';
        $data['vouchers'] = $this->manage_voucher->get_data();
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->market($data);
    }

	function view($url) {
	    $this->load->module('timedate');
	    $this->load->module('site_settings');
	    $this->load->module('site_security');
	    $this->load->module('manage_voucher');
	    $this->load->module('manage_poin');
	    $this->site_security->_make_sure_logged_in();
	    $update_id = $this->manage_voucher->_get_id_from_item_url($url);
	    //get user point
	    $user_id = $this->session->userdata('user_id');

	    // get all data from voucher
	    $data = $this->manage_voucher->fetch_data_from_db($update_id);
	    $data['voucher_title'] = $data['voucher_title'];
	    $data['voucher_slug'] = $data['voucher_slug'];
	    $data['ketentuan'] = $data['ketentuan'];
	    $data['featured_image'] = $data['featured_image'];
	    $data['cara_pakai'] = $data['cara_pakai'];
	    $data['point_use'] = $data['point_use'];
	    $data['start'] = $this->timedate->get_nice_date($data['start'], 'indon2');
	    $data['end'] = $this->timedate->get_nice_date($data['end'], 'indon2');
	    $data['cek'] = $this->manage_voucher->check_point_available($user_id, $update_id);
	    $data['is_owned'] = $this->manage_voucher->check_is_owned($user_id, $update_id);
	    $data['is_used'] = $this->manage_voucher->check_is_used($user_id, $update_id);

	    // get jumlah point
        $data['point'] = $this->manage_poin->get_point($user_id);
        
	    // build breadcrumb data array
	    $breadcrumbs_data['template'] = 'public_bootstrap';
	    $breadcrumbs_data['current_page_title'] = $data['voucher_title'];
	    $breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($update_id);
	    $data['breadcrumbs_data'] = $breadcrumbs_data;

	    // CEK MASIH BERLAKU ATO TIDAK
	    $data['cek_expire'] = $this->manage_voucher->check_exp($update_id);

	    $data['update_id'] = $update_id;
	    $data['headline'] = '';
	    $data['flash'] = $this->session->flashdata('item');
	    $data['view_file'] = "view";
	    $this->load->module('templates');
	    $this->templates->market($data);
	}

	function _generate_breadcrumbs_array($update_id) {
	    $homepage_url = base_url('store_voucher');
	    $breadcrumbs_array[$homepage_url] = 'TokoPoints';
	    
	    // $breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
	    return $breadcrumbs_array;
	}

	function tukar() {
		$this->load->module('site_settings');
	    $this->load->module('site_security');
	    $this->load->module('manage_voucher');
	    $this->load->module('manage_poin');
	    $this->site_security->_make_sure_logged_in();

	    $id_voucher = $this->input->post('voucher_id');
	    // get url
	    $url = $this->uri->segment(3);
	    $point_use = $this->input->post('point_use');
	    //get user
	    $user_id = $this->session->userdata('user_id');
	    $point_id = $this->manage_poin->get_id_from_userId($user_id);
	    // get jumlah point
        $point = $this->manage_poin->get_point($user_id);

        // cek point bisa ditukarkan
        $cek = $this->manage_voucher->check_point_available($user_id, $id_voucher);

        if ($cek == 'TRUE') {
        	
        	// proses insert voucher yg dimiliki
	        $data = array(
	        			'user_id' => $user_id,
	        			'voucher_id' => $id_voucher,
	        			'created' => time()
	        		);

	        $this->db->insert('voucher_own', $data);

	        // proses update database points
	        $curr_point = $point - $point_use;
	        $this->manage_poin->_update($point_id, array('points' => $curr_point));

	        // notify
	        $flash_msg = "Penukaran poin berhasil!.";
            $value = '<div class="alert alert-success alert-dismissible fade2 show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_voucher/view/'.$url);

        } else {
        	// notify
        	$flash_msg = "Penukaran poin gagal.";
            $value = '<div class="alert alert-danger alert-dismissible fade2 show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_voucher/view/'.$url);
        }

	}

	function use_voucher() {
		$this->load->module('site_settings');
	    $this->load->module('site_security');
	    $this->load->module('manage_voucher');
	    $this->load->module('manage_poin');
	    $this->site_security->_make_sure_logged_in();

	    $id_voucher = $this->input->post('voucher_id');
	    // get url
	    $url = $this->uri->segment(3);
	    //get user
	    $user_id = $this->session->userdata('user_id');

	    $cek_expire = $this->manage_voucher->check_exp($id_voucher);
	    $cek_null = $this->manage_voucher->check_is_null($user_id, $id_voucher);

	    if ($cek_expire == 'TRUE') {
	    	
	    
		    if ($cek_null == 'TRUE') {
		    	// do it
		    	$this->manage_voucher->used_it($user_id, $id_voucher);
		    	// notify
		    	$flash_msg = "Voucher telah berhasil digunakan!.";
	            $value = '<div class="alert alert-success alert-dismissible fade2 show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
	            $this->session->set_flashdata('item', $value);
	            redirect('store_voucher/view/'.$url);

		    } else {
		    	// notify
		    	$flash_msg = "Voucher gagal digunakan.";
	            $value = '<div class="alert alert-danger alert-dismissible fade2 show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
	            $this->session->set_flashdata('item', $value);
	            redirect('store_voucher/view/'.$url);
		    }

		}    
	}
}