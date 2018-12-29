<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qr_code extends MX_Controller {

	function __construct()
    {
        parent::__construct();	
        $this->load->helper(array('form'));	
    }
	
	public function index()
	{
		$this->load->module('manage_product');
		$id = 2;

		// get data

		$data = $this->manage_product->fetch_data_from_db($id);
		$item_url = $data['item_url'];


		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './marketplace/qr/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name = $item_url.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = base_url().'product/billboard/'.$item_url; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		// simpan DB
		$item = array(
			'qr_code' => $image_name,
		);

		$this->manage_product->_update($id, $item);
	        
	}

	
}

