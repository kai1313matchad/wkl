<?php
class Manage_daftar extends MX_Controller {

var $salt = '~@Hy&8%#';
function __construct() {
    parent::__construct();
    $this->load->library(array('form_validation', 'Applib'));
    $this->form_validation->CI=& $this;
    $this->load->helper(array('text', 'tgl_indo_helper'));
}

function _get_customer_coin($update_id) {
    $data = $this->fetch_data_from_db($update_id);
    $coin = $data['coin'];
    if (is_numeric($coin)  && $coin != '') {
        return intval(preg_replace('/[^\d.]/', '', $coin));
    }
}

function update_pword() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if (!is_numeric($update_id)) {
        redirect('manage_daftar/manage');
    } elseif ($submit == "Cancel") {
        redirect('manage_daftar/create/'.$update_id);
    }
    
    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pword', 'Password', 'trim|required|min_length[7]|max_length[35]');
        $this->form_validation->set_rules('repeat_pword', 'Repeat Password', 'trim|required|matches[pword]');

        if ($this->form_validation->run() == TRUE) {
            $pword = $this->input->post('pword', TRUE);
            $this->load->module('site_security');
            $data['pword'] = $this->site_security->_hash_string($pword);

            $this->_update($update_id, $data);
            $flash_msg = "The account password was successfully updated.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('manage_daftar/create/'.$update_id);
            
        }
    }

    $data['headline'] = "Update Akun Password";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "update_pword";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function getData() {
    $this->load->module('site_settings');

    $mysql_query = "SELECT * FROM kliens ORDER BY id DESC";
    $query = $this->_custom_query($mysql_query); //$this->get('id');
    $no = 1;
    foreach($query->result() as $row){
        $edit_daftar = base_url()."manage_daftar/create/".$row->id;
        $disbanned = base_url()."manage_daftar/unblokir_akun/".$row->id;
        $banned = base_url()."manage_daftar/blokir_akun/".$row->id;
        $status = $row->status;

        if ($status == 1) {
            $status_label = "m-badge--success";
            $status_desc = "Active";
        } else {
            $status_label = "m-badge--danger";
            $status_desc = "Inactive";
        }

        if ($status == 2) {
            $title = "Disbanned";
            $link = $disbanned;
            $icon = "check-circle";
        } else {
            $title = "Blokir Akun";
            $link = $banned;
            $icon = "ban";
        }

        $dateArr = explode(' ', $row->waktu_dibuat);
        $onlyDate = $dateArr[0];

        $data_persil[] = array(
            "No" => $no++,
            "#" => "
                <span style='overflow: visible; width: 110px;'>                     
                    <div class='dropdown '>                         
                        <a href='#' class='btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown'>                                
                            <i class='la la-ellipsis-h'></i>                            
                        </a>                            
                        <div class='dropdown-menu dropdown-menu-right'>   
                            <a class='dropdown-item' href='".$edit_daftar."'><i class='la la-edit'></i> Edit</a>
                            <a class='dropdown-item' href='".$link."'><i class='la la-".$icon."'></i> ".$title."</a>
                            <a class='dropdown-item' href='#' onclick='hapus_dokumen(\"".$row->id."\")'><i class='la la-trash'></i> Delete</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/tukar/".$row->id."/manage_daftar\")'><i class='la la-money'></i> Tukar Coin</a>
                        </div>                      
                    </div>                                             
                </span>
            ",
            "Nama" => "<a href='".$edit_daftar."'>".$row->username."</a>",
            "Company" => $row->company,
            "Email" => $row->email,
            "Telpon" => $row->no_telp,
            "Coin" => $row->coin,
            "Alamat" => $row->alamat,
            "Status" => "<span style='width: 110px;'><span class='m-badge ".$status_label." m-badge--wide'>".$status_desc."</span></span>",
            "Tanggal" => tgl_indo($onlyDate),
            "Last Login" => Applib::time_elapsed_string($row->last_login),
            "Aksi" => "
                <span style='overflow: visible; width: 110px;''>                      
                <a href='".$edit_daftar."' class='m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' title='Edit details'>                          
                    <i class='la la-edit'></i>                      
                </a>                        
                <a href='#' onclick='hapus_dokumen(\"".$row->id."\")' class='m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill' title='Delete' data-toggle='modal' data-target=''>                           
                    <i class='la la-trash'></i>                     
                </a>    
                </span>
            "
        );
    }
    echo json_encode($data_persil);
} 

function unblokir_akun($id) {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('manage_product');
    $this->site_security->_make_sure_is_admin();

    if (is_numeric($id)) {
        $data = array(
            'status' => 1
        );

        if ($this->_update($id, $data)) {
            // blokir produk nya persil
            $this->manage_product->get_all_product($id, 1);

            $flash_msg = "The client was successfully unblokir.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('manage_daftar/manage');
        }
    } 
} 

function blokir_akun($id) {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('manage_product');
    $this->site_security->_make_sure_is_admin();

    if (is_numeric($id)) {
        $data = array(
            'status' => 2
        );

        if ($this->_update($id, $data)) {
            // blokir produk nya persil
            $this->manage_product->get_all_product($id, 2);

            $flash_msg = "The client was successfully blokir.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('manage_daftar/manage');
        }
    } 
    
}

function get_foto_from_id($update_id) {
    $data = $this->fetch_data_from_db($update_id);
    @$pic = $data['pic'];

    if (!empty($pic)) {
        $foto = $pic;
    } else {
        $foto = '';
    }

    return $foto;
}

function test() {
    $update_id = 1004;
    $token = $this->_generate_token($update_id);
    echo $token;

    echo "<hr>";
    $this->_get_customer_id_from_token($token);
}

function _generate_token($update_id) {
    $data = $this->fetch_data_from_db($update_id);
    $last_login = $data['last_login'];
    $pword = $data['pword'];

    $pword_length = strlen($pword);
    $start_point = $pword_length - 6;
    $last_six_chars = substr($pword, $start_point, 6);

    if (($pword_length > 5) AND ($last_login > 0)) {
        $token = $last_six_chars.$last_login;
    } else {
        $token = '';
    }

    return $token;
}

function get_id_from_code($code) {
    $query = $this->get_where_custom('user_code', $code);
    foreach ($query->result() as $row) {
        $id = $row->id;
    }

    if (!is_numeric($id)) {
        $id = 0;
    }

    return $id;
}

function get_email_from_id($id) {
    $data = $this->fetch_data_from_db($id);
    $email = $data['email'];
    
    return $email;
}

function _get_customer_id_from_token($token) {
    $last_six_chars = substr($token, 0, 6);
    $last_login = substr($token, 6, 10);

    $sql = "SELECT * FROM kliens WHERE pword lIKE ? AND last_login = ?";
    $query = $this->db->query($sql, array('%'.$last_six_chars, $last_login));
    foreach ($query->result() as $row) {
        $customer_id = $row->id;
    }

    if (!isset($customer_id)) {
        $customer_id = 0;
    }
    // echo $customer_id; die();
    return $customer_id;
}

function _get_customer_name($update_id, $optional_customer_data=NULL) {
    if (!isset($optional_customer_data)) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data['username'] = $optional_customer_data['username'];
        $data['company'] = $optional_customer_data['company'];
    }

    if ($data == "") {
        $customer_name = "Unknown";
    } else {
        $username = trim(ucfirst($data['username']));
        $company = trim(ucfirst($data['company']));

        $company_length = strlen($company);
        if ($company_length > 2) {
            $customer_name = $company;
        } else {
            $customer_name = $username;
        }
    }
    return $customer_name;
}

function verify_reset_password_code($email, $code) {
    $mysql_query = "select * from kliens where email='$email' limit 1";
    $result = $this->_custom_query($mysql_query);

    foreach ($result->result() as $row) {
        $mail = $row->email;
        $user = $row->username;
    } 

    if ($result->num_rows() === 1) {
        return ($code == md5($this->salt . $user)) ? TRUE : FALSE;        
    } else {
        return FALSE;
    }    
}

function email_exists($email) {
    $mysql_query = "select * from kliens where email='$email' limit 1";
    $result = $this->_custom_query($mysql_query);

    foreach ($result->result() as $row) {
        $mail = $row->email;
        $user = $row->username;
    } 

    return ($result->num_rows() === 1 && $mail) ? $user : FALSE;
}

function getPass($email) {
    $col = 'email';
    $value = $email;
    $pass = $this->get_where_custom($col, $value);

    if ($pass->num_rows() > 0) {
        foreach ($pass->result() as $row) {
            return $row->pword;
        } 
    }

}



function getUserId($email) {
    $col = 'email';
    $value = $email;
    $query = $this->get_where_custom($col, $value);

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            return $row->id;
        } 
    }

    
}

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('manage_daftar/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_telp', 'Telpon', 'trim|required|numeric|min_length[5]|max_length[13]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            // $data['item_url'] = url_title($data['item_title']);

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The client were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_daftar/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The client was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_daftar/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Klien";
    } else {
        $data['headline'] = "Update Klien";
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_daftar";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_daftar";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

    // echo "manage daftar";
}

function fetch_data_from_post() {
    $data['username'] = $this->input->post('nama', true);
    $data['company'] = $this->input->post('company', true);
    $data['email'] = $this->input->post('email', true);
    $data['no_telp'] = $this->input->post('no_telp', true);
    $data['alamat'] = $this->input->post('alamat', true);
    $data['waktu_dibuat'] = date('Y-m-d H:i:s');
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');
    $data['status'] = $this->input->post('status', true);
    $data['ktp'] = $this->input->post('ktp', true);
    $data['npwp'] = $this->input->post('npwp', true);
    $data['verified'] = $this->input->post('verified', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['username'] = $row->username;
        $data['company'] = $row->company;
        $data['email'] = $row->email;
        $data['no_telp'] = $row->no_telp;
        $data['alamat'] = $row->alamat;
        $data['status'] = $row->status;
        $data['waktu_dibuat'] = $row->waktu_dibuat;
        $data['created_at'] = $row->created_at;
        $data['pword'] = $row->pword;
        $data['last_login'] = $row->last_login;
        $data['pic'] = $row->pic;
        $data['ktp'] = $row->ktp;
        $data['npwp'] = $row->npwp;
        $data['user_code'] = $row->user_code;
        $data['verified'] = $row->verified;
        $data['coin'] = $row->coin;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function entry_daftar() {
    $submit = $this->input->post('submit');

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_telp', 'Telpon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            $this->_insert($data);

            $flash_msg = "The client was successfully added.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('templates/home');
            
        } else {
            $flash_msg = "The client was fail added.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('templates/pendaftaran');
        }
    }

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_daftar";
    $data['view_file'] = "pendaftaran";
    $this->load->module('templates');
    $this->templates->pendaftaran($data);
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
        redirect('manage_daftar/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The item image were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_daftar/manage');
    }
}   


function _update_upload($id, $data)
{
    if (!isset($id)) {
        die('No token exist!');
    }

    $this->load->model('mdl_manage_daftar');
    $this->mdl_manage_daftar->_update_upload($id, $data);
}

function get($order_by)
{
    $this->load->model('mdl_manage_daftar');
    $query = $this->mdl_manage_daftar->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_daftar');
    $query = $this->mdl_manage_daftar->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_manage_daftar');
    $query = $this->mdl_manage_daftar->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_daftar');
    $query = $this->mdl_manage_daftar->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_manage_daftar');
    $query = $this->mdl_manage_daftar->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_manage_daftar');
    $this->mdl_manage_daftar->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_daftar');
    $this->mdl_manage_daftar->_update($id, $data);

    return TRUE;
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_daftar');
    $this->mdl_manage_daftar->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_manage_daftar');
    $count = $this->mdl_manage_daftar->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_manage_daftar');
    $max_id = $this->mdl_manage_daftar->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_manage_daftar');
    $query = $this->mdl_manage_daftar->_custom_query($mysql_query);
    return $query;
}

}