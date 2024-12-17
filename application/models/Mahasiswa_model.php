<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    // Ambil semua data mahasiswa
    public function get_all()
    {
        return $this->db->get('mahasiswa')->result();
    }

    // Ambil data mahasiswa berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row();
    }

    // Tambahkan data mahasiswa baru
    public function create($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }

    // Update data mahasiswa berdasarkan ID
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('mahasiswa', $data);
    }

    // Hapus data mahasiswa berdasarkan ID
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('mahasiswa');
    }

    // Cek apakah NIM sudah ada (untuk validasi)
    public function check_nim_exists($nim)
    {
        return $this->db->get_where('mahasiswa', ['nim' => $nim])->row();
    }
}
