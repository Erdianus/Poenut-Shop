<?php
defined('BASEPATH') or exit('Not Allowed Direct Access');

class Users extends CI_Model
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
}