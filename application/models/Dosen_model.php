<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{

    // Ambil semua data dosen
    public function get_all()
    {
        return $this->db->get('dosen')->result();
    }

    // Ambil data dosen berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('dosen', ['id' => $id])->row();
    }

    // Tambahkan data dosen
    public function create($data)
    {
        return $this->db->insert('dosen', $data);
    }

    // Update data dosen
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('dosen', $data);
    }

    // Hapus data dosen
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('dosen');
    }

    // Cek apakah NIDN sudah ada
    public function check_nidn_exists($nidn)
    {
        return $this->db->get_where('dosen', ['nidn' => $nidn])->row();
    }
}
