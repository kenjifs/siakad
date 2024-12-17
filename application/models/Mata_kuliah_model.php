<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mata_kuliah_model extends CI_Model
{

    // Ambil semua data mata kuliah
    public function get_all()
    {
        return $this->db->get('mata_kuliah')->result();
    }

    // Ambil data mata kuliah berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('mata_kuliah', ['id' => $id])->row();
    }

    // Tambahkan data mata kuliah
    public function insert($data)
    {
        return $this->db->insert('mata_kuliah', $data);
    }

    // Update data mata kuliah
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('mata_kuliah', $data);
    }

    // Hapus data mata kuliah
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('mata_kuliah');
    }

    // Cek apakah kode MK sudah ada
    public function check_kode_exists($kode_mk)
    {
        return $this->db->get_where('mata_kuliah', ['kode_mk' => $kode_mk])->row();
    }
}
