<?php
defined('BASEPATH') or exit('Not Allowed Direct Access');

class User_m extends CI_Model
{
    public function cek_login($username, $password)
    {
        $result = $this->db->where('username', $username)->where('password', $password)->limit(1)->get('users');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function get_data()
    {
        return $this->db->get('users')->result_array();
    }

    public function insert_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }

    public function detailUser($id)
    {
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where('id', $id);
        $get = $this->db->get();
        return $get->result_array();
    }

    public function updateUser($data, $id)
    {
        $this->db->update('users', $data, array('id' => $id));
        return $this->db->affected_rows();
    }

    public function deleteUser($id)
    {
        $this->db->delete('users', array('id' => $id));
        return $this->db->affected_rows();
    }
}