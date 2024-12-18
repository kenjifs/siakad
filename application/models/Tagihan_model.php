<?php
class Tagihan_model extends CI_Model
{

    public function get_tagihan_by_mahasiswa($mahasiswa_id)
    {
        return $this->db->get_where('tagihan', ['mahasiswa_id' => $mahasiswa_id])->result();
    }

    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('tagihan', ['status' => $status]);
    }
}
