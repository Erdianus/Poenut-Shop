<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('landing_page/templates/header');
        $this->load->view('landing_page/login');
        $this->load->view('landing_page/templates/js');
    }
    public function login()
    {
        $this->form_validation->set_rules('username', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            redirect('auth');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $cek = $this->users->cek_login($username, $password);
            if ($cek == false) {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                        Username atau password anda salah
                    </div>');
                redirect('auth');
            } else {
                switch ($cek->role_id) {
                    case 1:
                        redirect('dashboard');
                        break;
                    case 2:
                        redirect('dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }
}