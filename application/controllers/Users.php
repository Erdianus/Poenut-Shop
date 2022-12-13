<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
        $sidebar['sidebar'] = 'users';
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/sidebar', $sidebar);
        $this->load->view($template, $data);
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/js');
    }

    public function rules()
    {
    }

    public function create()
    {
        $this->templates('admin/users/tambah');
    }

    public function store()
    {
        //$this->rules();
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|max_length[20]|min_length[6]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[255]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[konfirPass]|min_length[6]');
        $this->form_validation->set_rules('konfirPass', 'Konfirmasi Password', 'required|min_length[6]');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $role_id = $this->input->post('role_id');
            $password = $this->input->post('password');

            $data = [
                'username' => $username,
                'nama' => $nama,
                'role_id' => $role_id,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];


            if ($this->user_m->insert_user($data) > 0) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Yesss!</strong> User berhasil ditambahkan.
                </div>');
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Waduhh!</strong> User gagal ditambahkan.
                </div>');
            }
            redirect('dashboard/users');
        }
    }

    public function show($id)
    {
        $data['users'] = $this->user_m->detailUser($id);
        $this->templates('admin/users/detail', ...$data);
    }

    public function showByLogin($username)
    {
        $data['users'] = $this->user_m->detailByLogin($username);
        $this->templates('admin/users/detailByLogin', ...$data);
    }

    public function edit($id)
    {
        $data['users'] = $this->user_m->detailUser($id);
        $this->templates('admin/users/edit', ...$data);
    }

    public function update()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|max_length[20]|min_length[6]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[255]');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id'));
        } else {
            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $role_id = $this->input->post('role_id');

            $data = [
                'username' => $username,
                'nama' => $nama,
                'role_id' => $role_id,
            ];

            if ($this->user_m->updateUser($data, $id) > 0) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Yesss!</strong> User berhasil diupdate.
                </div>');
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Waduhh!</strong> User gagal diupdate.
                </div>');
            }
            redirect('dashboard/users');
        }
    }

    public function updateProfile($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|max_length[20]|min_length[6]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[255]');
        if ($this->form_validation->run() == FALSE) {
            redirect('users/showByLogin/' . $this->input->post('username'));
        } else {
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');

            $data = [
                'username' => $username,
                'nama' => $nama,
            ];

            if ($this->user_m->updateUser($data, $id) > 0) {
                $this->session->set_userdata('username', $username);
                $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Yesss!</strong> Profil anda berhasil diupdate.
                </div>');
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Waduhh!</strong> Profil anda gagal diupdate.
                </div>');
            }
            redirect('users/showByLogin/' . $this->input->post('username'));
        }
    }

    public function destroy($id)
    {
        if ($this->user_m->deleteUser($id) > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yesss!</strong> User berhasil dihapus.
            </div>');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Waduhh!</strong> User gagal dihapus.
            </div>');
        }
        redirect('dashboard/users');
    }

    public function resetPass($username)
    {
        $this->form_validation->set_rules('currentPass', 'Current Password', 'required|max_length[20]|min_length[6]');
        $this->form_validation->set_rules('newPass', 'New Password', 'required|max_length[20]|min_length[6]');
        $this->form_validation->set_rules('konfirPass', 'Confirm Password', 'required|matches[newPass]|max_length[20]|min_length[6]');
        if ($this->form_validation->run() == FALSE) {
            redirect('users/showByLogin/' . $username);
        } else {
            $id = $this->input->post('id');
            $currentPass = $this->input->post('currentPass');
            $newPass = $this->input->post('newPass');
            $getPass = $this->user_m->detailByLogin($username);
            if (password_verify($currentPass, $getPass[0]['password'])) {
                $data = [
                    'password' => password_hash($newPass, PASSWORD_DEFAULT)
                ];

                if ($this->user_m->updateUser($data, $id) > 0) {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Yesss!</strong> Password berhasil direset.
                    </div>');
                } else {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Waduhh!</strong> Password gagal direset.
                    </div>');
                }
            } else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Waduhh!</strong> Current password anda salah.
                    </div>');
            }
            redirect('users/showByLogin/' . $username);
        }
    }
}