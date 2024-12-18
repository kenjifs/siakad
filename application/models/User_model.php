<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // Ambil data pengguna berdasarkan username
    public function get_by_username($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row();
    }

    // Ambil data pengguna berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    // Tambahkan data pengguna baru
    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    // Update data pengguna berdasarkan ID
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Hapus data pengguna berdasarkan ID
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    // Verifikasi login: cek username dan password
    public function verify_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', hash('sha256', $password));
        $this->db->where('status', 1);
        $query = $this->db->get('users');
        return $query->row();
    }

    // Ambil semua data pengguna
    public function get_all_users()
    {
        return $this->db->get('users')->result();
    }

    // Cek apakah username sudah ada (validasi unik)
    public function is_username_exist($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }
}
