<?php
class Panduan extends MX_Controller 
{

function __construct() {
parent::__construct();
}

    public function index()
    {
        $this->output->cache(5);
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
        if ($panduan == 'cara-pendaftaran') {
            $data['view_file'] = "cara_pendaftaran";
        }
        if ($panduan == 'negosiasi') {
            $data['view_file'] = "negosiasi";
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

    function cara_berjualan() {
        $this->output->cache(5);
        $this->load->library('session');
        $this->load->module('site_security');
        $data['view_file'] = "cara_berjualan";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function cara_pembayaran() {
        $this->output->cache(5);
        $this->load->library('session');
        $this->load->module('site_security');
        $data['view_file'] = "cara_pembayaran";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function cara_pemesanan() {
        $this->output->cache(5);
        $this->load->library('session');
        $this->load->module('site_security');
        $data['view_file'] = "cara_pemesanan";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function panduan_keamanan() {
        $this->output->cache(5);
        $this->load->library('session');
        $this->load->module('site_security');
        $data['view_file'] = "panduan_keamanan";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function cara_pendaftaran() {
        $this->output->cache(5);
        $this->load->library('session');
        $this->load->module('site_security');
        $data['view_file'] = "cara_pendaftaran";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function negosiasi() {
        $this->output->cache(5);
        $this->load->library('session');
        $this->load->module('site_security');
        $data['view_file'] = "negosiasi";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function pengembalian_dana() {
        $this->output->cache(5);
        $this->load->library('session');
        $this->load->module('site_security');
        $data['view_file'] = "pengembalian_dana";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function cara_beriklan() {
        $this->output->cache(5);
        $this->load->library('session');
        $this->load->module('site_security');
        $data['view_file'] = "cara_beriklan";
        $this->load->module('templates');
        $this->templates->market($data);
    }
}