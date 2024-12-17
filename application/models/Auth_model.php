<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', hash('sha256', $password));
        $this->db->where('status', 1);
        $query = $this->db->get('users');
        return $query->row();
    }
}
