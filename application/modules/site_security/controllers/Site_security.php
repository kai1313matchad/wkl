<?php
class Site_security extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    function _make_sure_is_mine($code) {
        $this->load->module('manage_product');
        $user_id = $this->session->userdata('user_id');
        if (is_numeric($user_id)) {
            $result = $this->manage_product->check_product_mine($user_id, $code);
            if ($result->num_rows() > 0) {
                $exist = TRUE;
            } else {
                $exist = FALSE;
            }  
        }

        return $exist;
    }

    function _make_sure_is_blank($item) {
        $this->load->module('store_basket');
        $user_id = $this->session->userdata('user_id');
        if (is_numeric($user_id)) {
            $result = $this->store_basket->check_basket_blank($user_id, $item);
            if ($result->num_rows() > 0) {
                $exist = FALSE;
            } else {
                $exist = TRUE;
            }  
        }

        return $exist;
    }

    // function _make_sure_not_double($item) {
    //     $this->load->module('store_wishlist');

    //     $user_id = $this->session->userdata('user_id');
    //     if (is_numeric($user_id)) {
    //         $result = $this->store_wishlist->check_wishlist_blank($user_id, $item);
    //         if ($result->num_rows() > 0) {
    //             $exist = FALSE;
    //         } else {
    //             $exist = TRUE;
    //         }  
    //     }

    //     return $exist;
    // }

    function test() {
        $name = "David";
        $hashed_name = $this->_hash_string($name);
        echo $hashed_name;

        echo "<hr>";
        $submitted_name = $name; //"Andy";
        $result = $this->_verify_hash($submitted_name, $hashed_name);

        if ($result == TRUE) {
            echo "well done";
        } else {
            echo "fail";
        }
    }

    function _check_admin_login_details($username, $pword) {
        // $target_username = "admin";
        // $target_pass = "password";

        // if (($username == $target_username) && ($pword == $target_pass)) {
        //     return TRUE;
        // } else {
        //     return FALSE;
        // }

        $this->load->module('manage_akun');
        $result = $this->manage_akun->get_where_custom('username', $username);

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $pass = $row->pword;
                $mail = $row->email;
                $user = $row->username;
                $user_id = $row->id;

                if (($this->_verify_hash($pword, $pass)) && ($username == $user)) {
                    return TRUE;
                } else {
                    return FALSE;
                }

                // set session user data
                $this->session->set_userdata('username', $user);
                $this->session->set_userdata('id_admin', $user_id);
            }
        }
    }

    function _check_user_login_details($username, $pword) {

        $this->load->module('manage_daftar');
        $result = $this->manage_daftar->get_where_custom('username', $username);

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $pass = $row->pword;
                $mail = $row->email;
                $user = $row->username;

                if (($this->_verify_hash($pword, $pass)) && ($username == $user)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }

    function _make_sure_logged_in() {
        $user_id = $this->_get_user_id();
        if (!is_numeric($user_id)) {
            redirect('youraccount/login');
        }    
    }

    function _get_user_id() {
        $user_id = $this->session->userdata('user_id');
        if (!is_numeric($user_id)) {
            $this->load->module('site_cookies');
            $user_id = $this->site_cookies->_attempt_get_user_id();
        }
        return $user_id;
    }

    function _get_user_mail() {
        $user_id = $this->session->userdata('user_id');
        if (is_numeric($user_id)) {
            $this->load->module('manage_akun');
            $data = $this->manage_akun->fetch_data_from_db($user_id);
            $user_email = $data['email'];
        }
        return $user_email;
    }

    function generate_random_string($length) {
        $characters = '23456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function _hash_string($str) {
        $hashed_string = password_hash($str, PASSWORD_BCRYPT, array(
            'cost' => 10
            ));
        return $hashed_string;
    }

    function _verify_hash($plain_text_str, $hashed_string) {
        $result = password_verify($plain_text_str, $hashed_string);
        return $result; //TRUE or FALSE 
    }

    function _encrypt_string($str) {
        $this->load->library('encryption');
        $encrypted_string = $this->encryption->encrypt($str);
        return $encrypted_string;
    }

    function _decrypt_string($str) {
        $this->load->library('encryption');
        $decrypted_string = $this->encryption->decrypt($str);
        return $decrypted_string;
    }

    function _make_sure_is_admin() {
        // $is_admin = TRUE; 
        $is_admin = $this->session->userdata('is_admin');

        if ($is_admin == 1) {
            return TRUE;
        } else {
            redirect('site_security/not_allowed');
        }

        // if ($is_admin != TRUE) {
        //     redirect('site_security/not_allowed');
        // }
    }    

    function not_user_allowed() {
        redirect('youraccount/login');
    }

    function not_allowed() {
        redirect('dvilsf');
        // echo "Your are not allowed to be here";
    }

}