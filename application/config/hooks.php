<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_system'][] = array(
	'class' => 'maintenance_hook',
	'function' => 'offline_check',
	'filename' => 'maintenance_hook.php',
	'filepath' => 'hooks'
);

$hook['pre_controller'][] = array(
    'class'    => '',
    'function' => 'set_lang',
    'filename' => 'App_lang.php',
    'filepath' => 'hooks'
);

$hook['pre_controller'][] = array(
     'class'         => 'App_hooks',
     'function'      => 'save_requested',
     'filename'      => 'App_hooks.php',
     'filepath'      => 'hooks',
     'params'        => ''
);

// Allows us to perform good redirects to previous pages.
$hook['post_controller'][] = array(
     'class'         => 'App_hooks',
     'function'      => 'prep_redirect',
     'filename'      => 'App_hooks.php',
     'filepath'      => 'hooks',
     'params'        => ''
);
