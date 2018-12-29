<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends MX_Controller {
    
    function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }
/*
    public function do_it() {
        $this->load->dbutil();
        
        $prefs = array(
            //'tables'      => array('barang', 'kota', 'kecamatan'),  
            'ignore'      => array(),           
            'format'      => 'txt',             
            'filename'    => 'mybackup.sql',    
            'add_drop'    => TRUE,              
            'add_insert'  => TRUE,              
            'newline'     => "\n"               
        );
        
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup($prefs);
        //$backup = $this->dbutil->backup();
        // Load the file helper and write the file to your server
        $this->load->helper('file');
        $file_name = 'backup_data.sql';
        write_file('/'.$file_name, $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file_name, $backup);
     }
*/
     public function do_now() {
        $this->load->dbutil();
        
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();
        // Load the file helper and write the file to your server
        $this->load->helper('file');
        $file_name = 'backup_db.sql';
        write_file('/'.$file_name, $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file_name, $backup);
     }

    
}   