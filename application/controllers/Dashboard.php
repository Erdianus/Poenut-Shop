<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function templates($template)
    {
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/sidebar');
        $this->load->view($template);
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/js');
    }

    public function index()
    {
        $this->templates('admin/dashboard');
    }

    public function users()
    {
        $this->templates('admin/users/index');
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