<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Model
{

	function __construct() {
		parent::__construct();
	}

	public static function view_by_id($client)
    {
        return self::$db->where('id', $client)->get('kliens')->row();
    }

}