<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{

    // Ambil jadwal kuliah berdasarkan mahasiswa_id
    public function get_by_mahasiswa($mahasiswa_id)
    {
        $this->db->where('mahasiswa_id', $mahasiswa_id);
        $this->db->order_by('hari', 'ASC');
        $this->db->order_by('jam_mulai', 'ASC');
        return $this->db->get('jadwal_kuliah')->result();
    }
}
