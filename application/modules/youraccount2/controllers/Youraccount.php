<?php
class Youraccount extends MX_Controller 
{
    var $mailFrom;
    var $mailPass;
   
    // var $mailFrom = 'systemmatch@match-advertising.com';
    // var $mailPass = 'Rahasia2017';
    var $salt = '~@Hy&8%#';
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $mailFrom = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
        $mailPass = $this->db->get_where('settings' , array('type'=>'password'))->row()->description;
    }

    function logout() {
        unset($_SESSION['user_id']);
        $this->load->module('site_cookies');

        $this->site_cookies->_destroy_cookie();
        redirect('youraccount/login');
    }

    function welcome() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        redirect('store_profile');

        // $data = $this->fetch_data_from_post();
        // $data['flash'] = $this->session->flashdata('item');
        // $data['view_file'] = "welcome";
        // $this->load->module('templates');
        // $this->templates->public_bootstrap($data);
    }

    function login() {
        $this->load->library('session');
        $data['username'] = $this->input->post('username', TRUE);
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "signin";
        $this->load->module('templates');
        $this->templates->pendaftaran($data);
    }  

    function submit_login() {
        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Submit") {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', ' Username', 'required|min_length[5]|max_length[60]|callback_username_check');
            $this->form_validation->set_rules('pword', 'Password', 'required|min_length[7]|max_length[35]');

            if ($this->form_validation->run() == TRUE) {
                $this->load->module('manage_daftar');
                $col1 = 'username';
                $value1 = $this->input->post('username', TRUE); 
                $col2 = 'email';
                $value2 = $this->input->post('username', TRUE);
                $query = $this->manage_daftar->get_with_double_condition($col1, $value1, $col2, $value2);
                foreach ($query->result() as $row) {
                    $user_id = $row->id;
                }

                $remember = $this->input->post('remember', TRUE);
                if ($remember == "remember-me") {
                    $login_type = "longterm";
                } else {
                    $login_type = "shortterm";
                }

                $data['last_login'] = time();
                $this->manage_daftar->_update($user_id, $data);

                $this->_in_you_go($user_id, $login_type);
                
            } else {
                $flash_msg = "You did not enter a correct username or password.";
                $value = '<div class="alert alert-notice alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('youraccount/login');
                // echo validation_errors();
            }
        }

    }

    function _in_you_go($user_id, $login_type) {
        $this->load->module('site_cookies');
        if ($login_type == "longterm") {
            $this->site_cookies->_set_cookie($user_id);
        } else {
            $this->session->set_userdata('user_id', $user_id);
        }

        // attempt to update cart and divert to cart
        // $this->_attempt_cart_divert($user_id);

        redirect('youraccount/welcome');
    }

    function _attempt_cart_divert($user_id) {
        $this->load->module('store_basket');
        $customer_session_id = $this->session->session_id;

        $col1 = 'session_id';
        $value2 = $customer_session_id;
        $col2 = 'shopper_id';
        $value2 = 0;
        $query = $this->get_with_double_condition($col1, $value1, $col2, $value2);
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
            $mysql_query = "update store_basket set shopper_id=$user_id where session_id='$customer_session_id'";
            $query = $this->store_basket->_custom_query($mysql_query);
            redirect('cart');
        }
    }

    function send_mail_confirmation($email, $username) {
        // $config = Array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => $this->mailFrom,
        //     'smtp_pass' => $this->mailPass,
        //     'mailtype'  => 'html', 
        //     'charset'   => 'utf-8'
        // );

        $user = 'Customer Support';
        $mailTo = $email;
        $message = '<!DOCTYPE html PUBLIC ".//W3C//DTD XHTML 1.0 Strct//EN"
                    "http://www.w3.org/TR/xhtml1-strict.dtd"><html>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    </head><body>';
        $message .= '<p><strong>Selamat Datang</strong> '.$username.',</p>';
        $message .= '<p>Selamat anda berhasil mendaftar akun di Wiklan.com. Pastikan data anda masukan sudah benar dan demi kenyamanan silahkan <strong><a href="' . base_url() .'youraccount/login">Login</a></strong> terlebih dahulu <br>serta <strong><a href="' . base_url() .'store_profile">PERBARUI PROFIL</a></strong> dengan data yang valid dan lengkap sebelum melakukan transaksi lain-nya.</p><br>';
        $message .= '<p>Apabila anda ingin <strong>Promosi Untuk Peningkatan Penjualan</strong>, Silahkan Berkunjung di Situs Tebesar dan Terluas kami serta <strong><a href="' . base_url() .'category/search">Cari Media Promosi Iklan</a></strong> yang sesuai untuk perusahaan anda.</p><br>';
        $message .= '<p>Apabila anda memiliki titik lokasi strategis dan ingin menambah pendapatan bisa <strong><a href="' . base_url() .'youraccount/login">Jual Media Iklan</a></strong> di akun wiklan dengan cara <strong><a href="' . base_url() .'youraccount/login">Login</a></strong> terlebih dahulu.</p><br>';
        $message .= '<p>Jika perlu bantuan bisa <strong><a href="' . base_url() .'templates/home#contact">Hubungi Kami</a></strong> perihal perbarui data profil atau pertanyaan lain terkait kerja sama.</p><br>';
        
        $message .= '<strong><p>Terima Kasih, Salam Hormat.</p></strong>';
        $message .= '<p>Customer Support </p><br>';
        $message .= '<em><p>*Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.</p></em>';
        $message .= '</body></html>';           
        $subjek = 'Selamat Bergabung di Wiklan.com';

        // $this->load->library('email');
        // $this->email->initialize($config);
        // $this->email->set_newline("\r\n");

        // $this->email->set_header('MIME-Version', '1.0; charset= utf-8');
        // $this->email->set_header('Content-type', 'text/html');
        // $this->email->from($this->mailFrom, 'Konfirmasi');
        // $this->email->to($mailTo);
        // $this->email->cc($this->mailFrom);
        // $this->email->subject($subjek);
        // $this->email->message($message);   

        $this->load->library('email');
        $this->email->from('cs@wiklan.com', 'Sistem Wiklan');
        $this->email->to($mailTo);
        $this->email->subject($subjek);
        $this->email->message($message);
        $this->email->bcc('cs@wiklan.com');
        $this->email->cc('cs@wiklan.com');
        // $this->email->send();

        //$this->email->message(strip_tags($message));
        if($this->email->send() == false){
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
        }
    }

    function submit() {
        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Submit") {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', ' Username', 'required|min_length[5]|max_length[60]');
            $this->form_validation->set_rules('email', ' Email', 'required|valid_email|max_length[120]|callback_email_check');
            $this->form_validation->set_rules('pword', 'Password', 'required|min_length[7]|max_length[35]');
            $this->form_validation->set_rules('repeat_pword', 'Repeat Password', 'required|matches[pword]');

            if ($this->form_validation->run() == TRUE) {

                $this->_process_create_account();
                // send mail confirmation
                $this->send_mail_confirmation($this->input->post('email', true), $this->input->post('username', true));
                $flash_msg = "Akun anda telah berhasil didaftarkan!.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('youraccount/login');
                
            } else {
                $flash_msg = "Email Anda sudah terdaftar, Silahkan masukkan email lain atau klik <a href='".base_url() ."youraccount/reset_password'>RESET PASSWORD</a> jika anda tidak ingat sandi anda!";
                $value = '<div class="alert alert-notice alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('youraccount/start');
                // $this->start();
            }
        }

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "start";
        $this->load->module('templates');
        $this->templates->pendaftaran($data);

    }

    function _process_create_account() {
        $this->load->module('manage_daftar');
        $this->load->module('site_security');

        $data = $this->fetch_data_from_post();
        unset($data['repeat_pword']);

        $pword = $data['pword'];
        $data['pword'] = $this->site_security->_hash_string($pword);
        $this->manage_daftar->_insert($data); 
    }

    function start() {
        $data = $this->fetch_data_from_post();
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "start";
        $this->load->module('templates');
        $this->templates->pendaftaran($data);
    }

    function reset_password() {
        $this->load->library('session');
        $this->load->module('manage_daftar');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('email', TRUE);
                $result = $this->manage_daftar->email_exists($email);
                // $password = $this->manage_daftar->getPass($email);

                if ($result) {
                    $this->send_reset_password_email($email, $result);

                    $flash_msg = "Tautan untuk mereset kata sandi Anda telah dikirim ke $email. jika Anda tidak melihatnya, pastikan untuk memeriksa folder spam juga!";
                    $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('youraccount/reset_password');
                } else {
                    $flash_msg = "Unfortunately, your email is not in system, Please input correct email!";
                    $value = '<div class="alert alert-notice alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('youraccount/reset_password');
                }
                
            } else {
                $flash_msg = "Please input correct email!";
                $value = '<div class="alert alert-notice alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('youraccount/reset_password');
            }
        } 

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "reset_password";
        $this->load->module('templates');
        $this->templates->pendaftaran($data);
    }

    function reset_form($email, $email_code) {

        if (isset($email, $email_code)) {
            $email = trim($email);
            $email_hash = sha1($email . $email_code);
            $this->load->module('manage_daftar');
            $verified = $this->manage_daftar->verify_reset_password_code($email, $email_code);

            if ($verified) {
                $data['view_file'] = "form_reset";
                $data['email_hash'] = $email_hash;
                $data['email_code'] = $email_code;
                $data['email'] = $email;
            } else {
                $data['email'] = $email;
                $data['view_file'] = "reset_password";
            }
        }

        $data['flash'] = $this->session->flashdata('item');
        $this->load->module('templates');
        $this->templates->pendaftaran($data);
    }

    function reset_password_proses() {
        $this->load->library('session');
        $this->load->module('manage_daftar');

        $submit = $this->input->post('submit', TRUE);
        $email = $this->input->post('email', TRUE);
        $email_hash = $this->input->post('email_hash', TRUE);
        $email_code = $this->input->post('email_code', TRUE);
        $user_id = $this->manage_daftar->getUserId($email);

        if ($submit == "Submit") {

            if (!isset($email, $email_hash) || $email_hash !== sha1($email . $email_code)) {
                die('Error updating your password');
            }

            $this->load->library('form_validation');
            $this->form_validation->set_rules('email_hash', 'Email Hash', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('pword', 'Password', 'required|min_length[7]|max_length[35]');
            $this->form_validation->set_rules('repeat_pword', 'Repeat Password', 'required|matches[pword]');

            if ($this->form_validation->run() == TRUE) {
                $pword = $this->input->post('pword', TRUE);
                $this->load->module('site_security');
                $data['pword'] = $this->site_security->_hash_string($pword);

                $this->manage_daftar->_update($user_id, $data);
                $flash_msg = "The account password was successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('youraccount/login');
                
            }
        }    

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "signin";
        $this->load->module('templates');
        $this->templates->pendaftaran($data);
    }

    function send_reset_password_email($email, $username) {
        // $config = Array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => $this->mailFrom,
        //     'smtp_pass' => $this->mailPass,
        //     'mailtype'  => 'html', 
        //     'charset'   => 'utf-8'
        // );

        $code = md5($this->salt . $username);
        $user = 'Admin';
        $mailTo = $email;
        $message = '<!DOCTYPE html PUBLIC ".//W3C//DTD XHTML 1.0 Strct//EN"
                    "http://www.w3.org/TR/xhtml1-strict.dtd"><html>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    </head><body>';
        $message .= '<p><strong>Dear</strong> '.$username.',</p>';
        $message .= '<p>Kami ingin membantu Anda mengatur ulang kata sandi! Silahkan <strong><a href="' . base_url() .'youraccount/reset_form/' . $email . '/' . $code . '">Klik Disini</a></strong> untuk mengatur ulang kata sandi Anda.</p><br>';
        $message .= '<p>Jika perlu bantuan bisa <strong><a href="' . base_url() .'templates/home#contact">Hubungi Kami</a></strong> perihal RESET PASSWORD atau pertanyaan lain terkait Perbarui Data.</p><br>';
        $message .= '<p><strong>Terima Kasih, Salam Hormat.</strong></p>';
        $message .= '<p>Customer Support</p><br>';
        $message .= '<em><p>*Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.</p></em>';
        $message .= '</body></html>';           
        $subjek = 'Silahkan Setel Ulang kata Sandi Anda';

        // $this->load->library('email');
        // $this->email->initialize($config);
        // $this->email->set_newline("\r\n");

        // $this->email->set_header('MIME-Version', '1.0; charset= utf-8');
        // $this->email->set_header('Content-type', 'text/html');
        // $this->email->from($this->mailFrom, 'Balasan');
        // $this->email->to($mailTo);
        // $this->email->subject($subjek);
        
        // $this->email->message($message); 

        $this->load->library('email');
        $this->email->from('cs@wiklan.com', 'Sistem Wiklan');
        $this->email->to($mailTo);
        $this->email->subject($subjek);
        $this->email->message($message);
        $this->email->bcc('cs@wiklan.com');
        $this->email->cc('cs@wiklan.com');  

        //$this->email->message(strip_tags($message));
        if($this->email->send() == false){
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
        }
    }


    function fetch_data_from_post() {
        $this->load->module('site_security');
        $data['username'] = $this->input->post('username', true);
        $data['email'] = $this->input->post('email', true);
        $data['no_telp'] = $this->input->post('no_telp', true);
        $data['waktu_dibuat'] = date('Y-m-d H:i:s');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['status'] = 1; //$this->input->post('status', true);
        $data['pword'] = $this->input->post('pword');
        // $data['repeat_pword'] = $this->input->post('repeat_pword');
        $data['user_code'] = $this->site_security->generate_random_string(12);
        return $data;
    }

    function fetch_data_from_db($update_id) {
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['username'] = $row->username;
            $data['email'] = $row->email;
            $data['pword'] = $row->pword;
            $data['no_telp'] = $row->no_telp;
            $data['ktp'] = $row->ktp;
            $data['npwp'] = $row->npwp;
        }

        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

    function username_check($str) {

        $this->load->module('manage_daftar');
        $this->load->module('site_security');

        $error_msg = "You did not enter a correct username or password.";

        $col1 = 'username';
        $value1 = $str; 
        $col2 = 'email';
        $value2 = $str;        
        $query = $this->manage_daftar->get_with_double_condition($col1, $value1, $col2, $value2);
        $num_rows = $query->num_rows();

        if ($num_rows < 1) {
           $this->form_validation->set_message('username_check', $error_msg);
           return FALSE;
        }  

        foreach ($query->result() as $row) {
            $pword_on_table = $row->pword;
        } 

        $pword = $this->input->post('pword', TRUE);
        $result = $this->site_security->_verify_hash($pword, $pword_on_table);

        if ($result == TRUE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('username_check', $error_msg);
            return FALSE;
        }
    }

    function email_check($str) {
        $this->load->module('manage_daftar');

        if ($this->manage_daftar->email_exists($str)) {
            return FALSE;
        } else {
            return TRUE;
        }

    }

}