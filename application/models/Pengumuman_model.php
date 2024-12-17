<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{

    // Ambil semua data pengumuman
    public function get_all()
    {
        return $this->db->get('pengumuman')->result();
    }

    // Ambil data pengumuman berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('pengumuman', ['id' => $id])->row();
    }

    // Tambahkan data pengumuman
    public function insert($data)
    {
        return $this->db->insert('pengumuman', $data);
    }

    // Update data pengumuman
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengumuman', $data);
    }

    // Hapus data pengumuman
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pengumuman');
    }
}
