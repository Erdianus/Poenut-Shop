<?php
defined('BASEPATH') or exit('Not Allowed Direct Access');

class Produk_m extends CI_Model
{

    public function get_data()
    {
        $this->db->select("*");
        $this->db->from('product');
        $get = $this->db->get();
        return $get->result_array();
    }

    public function get_dataProduk($id)
    {
        $this->db->select("*");
        $this->db->from('product');
        $this->db->where('jenis_id', $id);
        $get = $this->db->get();
        return $get->result_array();
    }

    public function insert_product($data)
    {
        $this->db->insert('product', $data);
        return $this->db->affected_rows();
    }

    public function detailProduk($id)
    {
        $this->db->select("*");
        $this->db->from('product');
        $this->db->where('id', $id);
        $get = $this->db->get();
        return $get->result_array();
    }

    // public function updateProduk($data, $id)
    // {
    //     if ($data['file_gambar'] == '') {
    //         $this->db->set('nama_produk', $data['nama_produk']);
    //         $this->db->set('deskripsi', $data['deskripsi']);
    //         $this->db->set('stok', $data['stok']);
    //         $this->db->set('harga', $data['harga']);
    //         $this->db->set('jenis_id', $data['jenis_id']);
    //         $this->db->set('status', $data['status']);
    //         $this->db->set('dibuat_oleh', $data['dibuat_oleh']);
    //     } else {
    //         $this->db->set('file_gmbr', $data['file_gmbr']);
    //     }
    //     $this->db->where('id', $id);
    //     $this->db->update('product');
    //     return $this->db->affected_rows();
    // }

    public function deleteProduk($id)
    {
        $this->db->delete('product', array('id' => $id));
        return $this->db->affected_rows();
    }

    public function getBelumDisetujui()
    {
        return $this->db->query('SELECT product.*, jenis_produk.nama AS "jenis_produk"
        FROM product
        INNER JOIN jenis_produk
        ON product.jenis_id = jenis_produk.id
        WHERE product.status = "Belum disetujui";')->result_array();
    }

    public function approved($data, $id)
    {
        $this->db->update('product', $data, array('id' => $id));
        return $this->db->affected_rows();
    }

    public function rejected($data, $id)
    {
        $this->db->update('product', $data, array('id' => $id));
        return $this->db->affected_rows();
    }

    public function jenisProduk()
    {
        $this->db->query('SELECT product.*, jenis_produk.nama AS "jenis_produk"
        FROM product
        INNER JOIN jenis_produk
        ON product.jenis_id = jenis_produk.id;');
        $this->db->get()->result_array();
    }
}