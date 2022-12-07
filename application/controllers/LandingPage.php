<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LandingPage extends CI_Controller
{

    public function index()
    {
        $this->load->view('landing_page/templates/header');
        $this->load->view('landing_page/templates/navbar');
        $this->load->view('landing_page/index');
        $this->load->view('landing_page/templates/footer');
        $this->load->view('landing_page/templates/js');
    }
}