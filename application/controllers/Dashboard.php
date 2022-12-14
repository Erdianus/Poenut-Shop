<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!empty($this->session->userdata('logged_in') == FALSE)) {
            redirect('auth');
        }
    }
    public function templates($template, ...$data)
    {
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view($template, $data);
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/js');
    }

    public function index()
    {
        $data['sidebar'] = 'dashboard';
        $data['totalProduct'] = $this->produk_m->countAll();
        $data['totalSkincare'] = $this->produk_m->countSkincare();
        $data['totalBodycare'] = $this->produk_m->countBodycare();
        $data['totalHaircare'] = $this->produk_m->countHaircare();
        $data['totalHaircare'] = $this->produk_m->countHaircare();
        $data['pegawai'] = $this->user_m->countPegawai();
        $this->db->from('hero');
        $data['hero'] = $this->db->count_all_results();
        $this->templates('admin/dashboard', ...$data);
    }

    public function users()
    {
        $data['users'] = $this->user_m->get_data();
        $data['sidebar'] = 'users';
        $this->templates('admin/users/index', ...$data);
    }

    public function produk()
    {
        $data['produk'] = $this->produk_m->get_data();
        $data['sidebar'] = 'produk';
        $this->templates('admin/produk/index', ...$data);
    }

    public function skincare()
    {
        $data['produk'] = $this->produk_m->get_dataProduk(1);
        $data['sidebar'] = 'produk';
        $this->templates('admin/produk/skincare/index', ...$data);
    }

    public function bodycare()
    {
        $data['produk'] = $this->produk_m->get_dataProduk(2);
        $data['sidebar'] = 'produk';
        $this->templates('admin/produk/bodycare/index', ...$data);
    }

    public function haircare()
    {
        $data['produk'] = $this->produk_m->get_dataProduk(3);
        $data['sidebar'] = 'produk';
        $this->templates('admin/produk/haircare/index', ...$data);
    }

    public function hero()
    {
        $this->db->select("*");
        $this->db->from('hero');
        $get = $this->db->get();
        $data['hero'] = $get->result_array();
        $data['sidebar'] = 'hero';
        $this->templates('admin/hero/hero', ...$data);
    }

    public function approval()
    {
        $data['products'] = $this->produk_m->getBelumDisetujui();
        $data['sidebar'] = 'approval';
        $this->templates('admin/approval', ...$data);
    }
}