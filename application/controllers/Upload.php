<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MX_Controller 
{
	var $path = './tes/';
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'file', 'form'));
    }

    function other() {
    	$this->load->view('upload');
    }

    function lain() {
    	$this->load->view('upl');
    	// $this->load->view('upload');
    }

    public function index()
	{
		// $this->load->view('upload');
		$this->load->view('upload2');
	}

	function test_del() {
		$token = 'T13T3V';

		// cek avilabel
		$this->db->select('*');
		$this->db->where('token', $token);
		$query = $this->db->get('gambar');

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$file = $row->gambar;
			}

    		$this->db->where('token', $token);
    		$this->db->delete('gambar');

    		echo 'data sukses di hapus!';
		}
	}

	function delete() {
		$id = $this->input->post('id');
		$type = $this->input->post('tipe');

		// check available
		$this->db->select('*');
		$this->db->where('token', $id);
		$query = $this->db->get('gambar');

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$file = $row->image;
			}

			// delete di DB
			$this->db->delete('gambar',array('token'=>$id));

			// get location
			$loc = $this->location($type);

			$pic_path = $loc.$file;

	        if (file_exists($pic_path)) {
	            unlink($pic_path);
	            // delete berhasil
	            $msg = 'gambar berhasil didelete';
	            echo json_encode($msg);
	        } else {
	        	$msg = 'tidak ada gambar';
				echo json_encode($msg);
	        }

		}
	}

	function load() {
		// cek image
		$file = 'cute-2500929__340.jpg';
		$full_path = $this->path.$file; // './tes/cute-2500929__340.jpg';
		$location = base_url().$full_path;
		if (file_exists($full_path)) {
			$gambar =  '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
        	$msg = 'sukses';
        	echo json_encode($gambar);
		} else {
			$msg = 'tidak ada gamabr';
			echo json_encode($msg);
		}
	}

	function generate_random_string($length = '') {
        $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $length = 6;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function fixme() {
    	$arr = array(
    		'id' => 29,
    		'name' => 'ratri',
    		'age' => 31
    	);

    	$js = json_encode($arr);

    	$newjs = json_decode($js);

    	// var_dump($newjs);

    	echo $newjs->id;
    	echo '<br>';
    	echo $newjs->name;
    	echo '<br>';
    	echo $newjs->age;
    }

    function location($type) {
    	switch ($type) {
			// foto dokumen
			case 'ktp':
				$loc = './marketplace/ktp/';
				break;

			case 'sertifikat':
				$loc = './marketplace/sertifikat/';
				break;

			case 'ijin':
				$loc = './marketplace/ijin/';
				break;
				
			case 'npwp':
				$loc = './marketplace/npwp/';
				break;		

			// foto lokasi path
			case 'limapuluh':
				$loc = './marketplace/50/';
				break;

			case 'seratus':
				$loc = './marketplace/100/';
				break;
				
			case 'duaratus':
				$loc = './marketplace/200/';
				break;	

			// foto report path
			case 'listrik':
				$loc = './marketplace/listrik/';
				break;

			case 'lokasi':
				$loc = './marketplace/lokasi/';
				break;
			// asuransi
			default:
				$loc = './marketplace/asuransi/';
				break;
		}

		$path = $loc;
		return $path;
    }

	function do_upload() {
		$data_json = $this->input->post('objArr');

		$result = json_decode($data_json);

		$loc = $this->location($result[0]->type);

		$token = $this->generate_random_string(6);
		
		// insert to db
		$data = array(
			'image' => $_FILES['file']['name'],
			'type' => $result[0]->type,
			'token' => $token
		);

		$this->db->insert('gambar', $data);

		$config['upload_path']          = $loc; //$this->path;
        $config['allowed_types']        = 'gif|jpg|png';

        $location = base_url().$loc.$_FILES['file']['name'];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
        	$results['gambar'] =  '<img src="'.$location.'" height="150" width="225" id="sumber" class="img-thumbnail" data-id="'.$token.'" data-type="'.$result[0]->type.'" />';
        	$results['msg'] = 'sukses';
        	$results['token'] = $token; 
        	$results['type'] = $result[0]->type;
        	echo json_encode($results);
        } else {
        	echo $this->upload->display_errors();
        }
	}

	function proses_upload(){

        $config['upload_path']   = FCPATH.'/upload-foto/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('foto',array('nama_foto'=>$nama,'token'=>$token));
        }


	}

	//Untuk menghapus foto
	function remove_foto(){

		//Ambil token foto
		$token=$this->input->post('token');

		$foto=$this->db->get_where('foto',array('token'=>$token));

		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->nama_foto;
			if(file_exists($file=FCPATH.'/upload-foto/'.$nama_foto)){
				unlink($file);
			}
			$this->db->delete('foto',array('token'=>$token));
		}

		echo "{}";
	}
}
