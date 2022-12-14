<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero extends CI_Controller
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
        $sidebar['sidebar'] = 'hero';
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/sidebar', $sidebar);
        $this->load->view($template, $data);
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/js');
    }

    public function create()
    {
        $this->templates('admin/hero/tambah');
    }

    public function store()
    {
        $this->form_validation->set_rules('title', 'Title Hero', 'required|trim');
        $this->form_validation->set_rules('subtitle', 'Sub Title Hero', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            redirect('dashboard/hero');
        } else {
            $title = $this->input->post('title');
            $subtitle = $this->input->post('subtitle');

            $config['upload_path']          = './assets/hero/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']             = 1000;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Eitsss!</strong> Gambar Hero Anda tidak ada atau tidak sesuai!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                redirect('dashboard/hero');
            } else {
                $gambar = $this->upload->data('file_name');

                $data = [
                    'title' => $title,
                    'subtitle' => $subtitle,
                    'gambar' => $gambar,
                    'status' => 'Tidak Ditampilkan'
                ];
                $this->db->insert('hero', $data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Yesss!</strong> Hero berhasil ditambahkan!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                } else {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Yahhhh!</strong> Hero gagal ditambahkan!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                }
                redirect('dashboard/hero');
            }
        }
    }

    public function show($id)
    {
        $this->db->select("*");
        $this->db->from('hero');
        $this->db->where('id', $id);
        $get = $this->db->get();
        $data['hero'] = $get->result_array();
        $this->templates('admin/hero/detail', ...$data);
    }

    public function edit($id)
    {
        $this->db->select("*");
        $this->db->from('hero');
        $this->db->where('id', $id);
        $get = $this->db->get();
        $data['hero'] = $get->result_array();
        $this->templates('admin/hero/edit', ...$data);
    }

    public function update()
    {
        $this->form_validation->set_rules('title', 'Title Hero', 'required|trim');
        $this->form_validation->set_rules('subtitle', 'Sub Title Hero', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            redirect('dashboard/hero');
        } else {
            $id = $this->input->post('id');
            $gambar = $_FILES['gambar']['name'];

            if ($gambar == null) {
            } else {

                $config['upload_path']          = './assets/hero/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 1000;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Eitsss!</strong> Gambar Hero gagal diupload!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
                    redirect('hero/edit/' . $id);
                } else {
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
                }
            }
            $this->db->set('title', $this->input->post('title'));
            $this->db->set('subtitle', $this->input->post('subtitle'));
            $this->db->set('status', $this->input->post('status'));
            $this->db->where('id', $id);
            $this->db->update('hero');

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Yesss!</strong> Hero berhasil diupdate!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
            } else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Yahhhh!</strong> Hero gagal diupdate!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
            }
            redirect('dashboard/hero');
        }
    }

    public function destroy($id)
    {
        $gambar = $this->db->get_where('hero', ['id' => $id])->row_array();
        $this->db->delete('hero', array('id' => $id));
        if ($this->db->affected_rows() > 0) {
            unlink('./assets/hero/' . $gambar['gambar']);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yesss!</strong> Hero berhasil dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yahhhh!</strong> Hero gagal dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
        redirect('dashboard/hero');
    }

    public function tampilkan($id)
    {
        $this->db->set('status', 'Tampilkan');
        $this->db->where('id', $id);
        $this->db->update('hero');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yesss!</strong> Hero berhasil ditampilkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yahhhh!</strong> Hero gagal diproses!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
        redirect('dashboard/hero');
    }

    public function tidakDitampilkan($id)
    {
        $this->db->set('status', 'Tidak Ditampilkan');
        $this->db->where('id', $id);
        $this->db->update('hero');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yesss!</strong> Hero berhasil tidak ditampilkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yahhhh!</strong> Hero gagal diproses!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
        redirect('dashboard/hero');
    }
}