<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Voucher extends CI_Model
{
    private static $db;

    public function __construct()
    {
        parent::__construct();
        self::$db = &get_instance()->db;
    }

    public static function count_all_own_voucher($user_id) {
    	$query = self::$db->query("SELECT COUNT(id) AS jml FROM voucher_own WHERE user_id = $user_id");
    	foreach ($query->result() as $row) {
    		$count = $row->jml;
    	}

    	return $count;
    }

    public static function get_my_own_voucher($user_id) {
    	return self::$db->where('user_id', $user_id)->get('voucher_own');
    }

}