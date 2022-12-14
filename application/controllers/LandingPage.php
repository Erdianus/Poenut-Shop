<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LandingPage extends CI_Controller
{

    public function templates($template, ...$data)
    {
        $this->load->view('landing_page/templates/header');
        $this->load->view('landing_page/templates/navbar');
        $this->load->view($template, $data);
        $this->load->view('landing_page/templates/footer');
        $this->load->view('landing_page/templates/js');
    }

    public function index()
    {
        $this->db->select("*");
        $this->db->from('hero');
        $this->db->where('status', 'Tampilkan');
        $get = $this->db->get();
        $data['hero'] = $get->result_array();
        $this->templates('landing_page/index', ...$data);
    }

    public function skincare()
    {
        $data['skincare'] = $this->produk_m->get_dataProduk(1);
        $this->templates('landing_page/skincare', ...$data);
    }

    public function bodycare()
    {
        $data['bodycare'] = $this->produk_m->get_dataProduk(2);
        $this->templates('landing_page/bodycare', ...$data);
    }

    public function haircare()
    {
        $data['haircare'] = $this->produk_m->get_dataProduk(3);
        $this->templates('landing_page/haircare', ...$data);
    }
}