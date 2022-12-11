<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function templates($template, ...$data)
    {
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/sidebar');
        $this->load->view($template, $data);
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/js');
    }

    public function index()
    {
        $this->templates('admin/dashboard');
    }

    public function users()
    {
        $data['users'] = $this->user_m->get_data();
        $this->templates('admin/users/index', ...$data);
    }

    public function skincare()
    {
        $this->templates('admin/skincare/index');
    }

    public function bodycare()
    {
        $this->templates('admin/bodycare/index');
    }

    public function haircare()
    {
        $this->templates('admin/haircare/index');
    }
}