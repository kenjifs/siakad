<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas_model extends CI_Model
{

    // Ambil semua tugas berdasarkan dosen_id
    public function get_by_dosen($dosen_id)
    {
        $this->db->where('dosen_id', $dosen_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('tugas')->result();
    }

    // Tambah tugas baru
    public function insert($data)
    {
        return $this->db->insert('tugas', $data);
    }

    // Ambil tugas berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tugas', ['id' => $id])->row();
    }

    // Update tugas
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tugas', $data);
    }

    // Hapus tugas
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tugas');
    }
}
