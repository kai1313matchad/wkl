<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Author Message
|--------------------------------------------------------------------------
|
| Set the default App Language
| 
*/


  //Loads configuration from database into global CI config
  function set_lang()
  {
   	$CI =& get_instance();
     $CI->lang->load('homepage', 'english');   
  }
