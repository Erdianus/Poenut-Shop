<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
}