<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->load->view('landing_page/templates/header');
        $this->load->view('landing_page/login');
        $this->load->view('landing_page/templates/js');
    }
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            redirect('auth');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // select * from login where user = ?
            $cek  = $this->db->get_where('users', ['username' => $username])->row_array();
            // cek username
            if ($cek) {
                if (password_verify($password, $cek['password'])) {
                    // membuat session
                    $session = array(
                        'id'        => $cek['id'],
                        'username'  => $cek['username'],
                        'nama'      => $cek['nama'],
                        'role_id'   => $cek['role_id'],
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($session);

                    // redirect ke admin
                    redirect('dashboard');
                } else {
                    // jika password salah
                    $this->session->set_flashdata('message', 'password salah');
                    redirect('auth');
                }
            } else {
                // jika username salah
                $this->session->set_flashdata('message', 'username salah');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        redirect('auth');
    }
}