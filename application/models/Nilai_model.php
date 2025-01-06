<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{

    // Ambil nilai berdasarkan mahasiswa_id
    public function get_by_mahasiswa($mahasiswa_id)
    {
        $this->db->where('mahasiswa_id', $mahasiswa_id);
        $this->db->order_by('semester', 'ASC');
        return $this->db->get('nilai')->result();
    }
}
