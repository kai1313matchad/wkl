<?php
class Site_settings extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    function _get_map_code() {
        $code = "";
        return $code;
    }

    function _get_our_company() {
        $company = "Cool, Inc.";
        return $company;
    }

    function _get_our_address() {
        $address = "88 something Ave, Suite 600<br>";
        $address.= "San Andreas, CA 98374";
        return $address;
    }

    function _get_our_telnum() {
        $telnum = "(021) 88888888";
        return $telnum;
    }

    function _get_paypal_email() {
        $email = 'forheron@gmail.com';
        return $email;
    }

    function _get_support_team_name() {
        $name = "Customer Support";
        return $name;
    }

    function generate_random_id($length) {
        $characters = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function _get_welcome_msg($customer_id) {
        $this->load->module('store_accounts');
        $customer_name = $this->store_accounts->_get_customer_name($customer_id);

        $msg = "Hello ".$customer_name.",<br><br>";
        $msg.= "Thank you for creating an account with xxshop. if you have any question ";
        $msg.= "about any of our products and services then please do get in touch. we are here ";
        $msg.= "seven days a week and would be happy to help you.<br><br>";
        $msg.= "Regards.<br><br>";
        $msg.= "Dave (founder)";
        return $msg;
    }

    function _get_cookie_name() {
        $cookie_name = 'hasbcekcsda';
        return $cookie_name;
    }

    function _get_currency_symbol() {
        $symbol = "&pound;";
        return $symbol;
    }

    function _get_currency_code() {
        $code = "GBP;";
        return $code;
    }

    function _get_item_segments() {
        // return the segments for the store_item pages
        $segments = "category/";
        return $segments;
    }

    function _get_items_segments() {
        // return the segments for the category pages
        $segments = "music/instruments/"; 
        return $segments;
    }

    function _get_page_not_found_msg() {
        $msg = "<h1>Page Not Found!</h1>";
        $msg.= "<p>Please check your vibe and try again.</p>";
        return $msg;
    }

    function rupiah($angka){
        $nominal = substr(str_replace( ',', '', $angka), 0, -1);
        $hasil_rupiah = number_format($nominal,0,',','.');
        echo $hasil_rupiah;
    }

    function currency_format($angka){
        $nominal = substr(str_replace( ',', '', $angka), 0);
        $hasil_rupiah = number_format($nominal,0,',','.');
        echo $hasil_rupiah;
    }

    function currency_rupiah($angka){
        $nominal = substr(str_replace( ',', '', $angka), 0);
        $hasil_rupiah = number_format($nominal,0,',','.');
        return $hasil_rupiah;
        // echo $hasil_rupiah;
    }

    function number_format_short( $n, $precision = 1 ) {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'rb';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'jt';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'mily';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }
      // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
      // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ( $precision > 0 ) {
            $dotzero = '.' . str_repeat( '0', $precision );
            $n_format = str_replace( $dotzero, '', $n_format );
        }

        echo $n_format.$suffix;
        // return $n_format . $suffix;
    }

}