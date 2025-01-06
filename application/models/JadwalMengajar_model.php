<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalMengajar_model extends CI_Model
{

    // Ambil jadwal mengajar berdasarkan dosen_id
    public function get_by_dosen($dosen_id)
    {
        $this->db->where('dosen_id', $dosen_id);
        $this->db->order_by('hari', 'ASC');
        $this->db->order_by('jam_mulai', 'ASC');
        return $this->db->get('jadwal_mengajar')->result();
    }
}
