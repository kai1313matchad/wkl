<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Requests extends CI_Model
{
    private static $db;

    public function __construct()
    {
        parent::__construct();
        self::$db = &get_instance()->db;
    }

    public static function view_by_id($request)
    {
        return self::$db->where('id', $request)->get('request')->row();
    }

}