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

    public function countAll()
    {
        $this->db->from('product');
        return $this->db->count_all_results();
    }

    public function countSkincare()
    {
        $this->db->like('jenis_id', 1);
        $this->db->from('product');
        return $this->db->count_all_results();
    }

    public function countBodycare()
    {
        $this->db->like('jenis_id', 2);
        $this->db->from('product');
        return $this->db->count_all_results();
    }

    public function countHaircare()
    {
        $this->db->like('jenis_id', 3);
        $this->db->from('product');
        return $this->db->count_all_results();
    }
}