<?php
class Panduan extends MX_Controller 
{

function __construct() {
parent::__construct();
}

    public function index()
    {
        $panduan = $this->input->get('p', TRUE)?$this->input->get('p', TRUE):'general';
        $this->load->library('session');
        $this->load->module('site_security');

        if ($panduan == 'cara-berjualan') {
            $data['view_file'] = "cara_berjualan";
        }
        if ($panduan == 'cara-pembayaran') {
            $data['view_file'] = "cara_pembayaran";
        }
        if ($panduan == 'cara-pemesanan') {
            $data['view_file'] = "cara_pemesanan";
        }
        if ($panduan == 'panduan-keamanan') {
            $data['view_file'] = "panduan_keamanan";
        }
        if ($panduan == 'pengembalian-dana') {
            $data['view_file'] = "pengembalian_dana";
        }
        if ($panduan == 'cara-beriklan') {
            $data['view_file'] = "cara_beriklan";
        }
        
        $this->load->module('templates');
        $this->templates->market($data);
    }



}