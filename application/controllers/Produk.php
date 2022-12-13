<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
        $sidebar['sidebar'] = 'produk';
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/sidebar', $sidebar);
        $this->load->view($template, $data);
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/js');
    }

    public function rules()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required|integer');
        $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('dibuat_oleh', 'dibuat_oleh', 'required');
    }

    public function redirectTambah($jenisProduk)
    {
        if ($jenisProduk == 1) {
            redirect('produk/createSkincare');
        } else if ($jenisProduk == 2) {
            redirect('produk/createBodycare');
        } else {
            redirect('produk/createHaircare');
        }
    }

    public function redirectTable($jenisProduk)
    {
        if ($jenisProduk == 1) {
            redirect('dashboard/skincare');
        } else if ($jenisProduk == 2) {
            redirect('dashboard/bodycare');
        } else {
            redirect('dashboard/haircare');
        }
    }

    public function createSkincare()
    {
        $this->templates('admin/produk/skincare/tambah',);
    }
    public function createBodycare()
    {
        $this->templates('admin/produk/bodycare/tambah');
    }
    public function createHaircare()
    {
        $this->templates('admin/produk/haircare/tambah');
    }

    public function store()
    {
        $this->rules();
        if ($this->form_validation->run() == FALSE) {
            $this->redirectTambah($this->input->post('jenis_id'));
        } else {
            $nama_produk = $this->input->post('nama_produk');
            $deskripsi = $this->input->post('deskripsi');
            $stok = $this->input->post('stok');
            $harga = $this->input->post('harga');
            $jenis_id = $this->input->post('jenis_id');
            $status = $this->input->post('status');
            $dibuat_oleh = $this->input->post('dibuat_oleh');

            $config['upload_path']          = './assets/produk/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']             = 1000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Eitsss!</strong> Gambar Produk Anda tidak ada!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                $this->redirectTambah($this->input->post('jenis_id'));
            } else {
                $file_gmbr = $this->upload->data('file_name');

                $data = [
                    'nama_produk' => $nama_produk,
                    'deskripsi' => $deskripsi,
                    'stok' => $stok,
                    'harga' => $harga,
                    'file_gmbr' => $file_gmbr,
                    'jenis_id' => $jenis_id,
                    'status' => $status,
                    'dibuat_oleh' => $dibuat_oleh,
                ];
                if ($this->produk_m->insert_product($data) > 0) {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Yesss!</strong> Produk berhasil ditambahkan!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                } else {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Yahhhh!</strong> Produk gagal ditambahkan!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                }
                $this->redirectTable($this->input->post('jenis_id'));
            }
        }
    }

    public function show($id)
    {
        $data['produk'] = $this->produk_m->detailProduk($id);
        $this->templates('admin/produk/detail', ...$data);
    }

    public function edit($id)
    {
        $data['produk'] = $this->produk_m->detailProduk($id);
        $this->templates('admin/produk/edit', ...$data);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required|decimal');
        $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('dibuat_oleh', 'dibuat_oleh', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('produk/edit/' . $this->input->post('id'));
        } else {
            $id = $this->input->post('id');
            $gambar = $_FILES['gambar']['name'];

            if ($gambar == null) {
            } else {

                $config['upload_path']          = './assets/produk/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 1000;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    $this->db->set('file_gmbr', $gambar);
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Eitsss!</strong> Gambar Produk gagal diupload!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
                    redirect('produk/edit/' . $id);
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }
            $this->db->set('nama_produk', $this->input->post('nama_produk'));
            $this->db->set('deskripsi', $this->input->post('deskripsi'));
            $this->db->set('stok', $this->input->post('stok'));
            $this->db->set('harga', $this->input->post('harga'));
            $this->db->set('jenis_id', $this->input->post('jenis_id'));
            $this->db->set('status', $this->input->post('status'));
            $this->db->set('dibuat_oleh', $this->input->post('dibuat_oleh'));
            $this->db->where('id', $id);
            $this->db->update('product');

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Yesss!</strong> Produk berhasil diupdate!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
            } else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Yahhhh!</strong> Produk gagal diupdate!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
            }
            $this->redirectTable($this->input->post('jenis_id'));
        }
    }

    public function destroy($id)
    {
        $gambar = $this->db->get_where('product', ['id' => $id])->row_array();

        if ($this->produk_m->deleteProduk($id) > 0) {
            unlink('./assets/produk/' . $gambar['file_gmbr']);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yesss!</strong> Produk berhasil dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yahhhh!</strong> Produk gagal dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
        $this->redirectTable($gambar['jenis_id']);
    }

    public function approved($id)
    {
        $status = [
            'status' => 'Disetujui'
        ];
        if ($this->produk_m->approved($status, $id) > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yesss!</strong> Produk berhasil disetujui!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yahhhh!</strong> Produk gagal diproses!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
        redirect('dashboard/approval');
    }

    public function rejected($id)
    {
        $status = [
            'status' => 'Ditolak'
        ];
        if ($this->produk_m->rejected($status, $id) > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yesss!</strong> Produk berhasil ditolak!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yahhhh!</strong> Produk gagal diproses!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
        redirect('dashboard/approval');
    }
}