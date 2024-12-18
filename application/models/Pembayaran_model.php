<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{

    // Ambil semua tagihan mahasiswa
    public function get_all_tagihan()
    {
        $this->db->select('tagihan.id, mahasiswa.nama, tagihan.jumlah, tagihan.status, tagihan.keterangan');
        $this->db->from('tagihan');
        $this->db->join('mahasiswa', 'mahasiswa.id = tagihan.mahasiswa_id');
        return $this->db->get()->result();
    }

    // Update status pembayaran
    public function update_status_pembayaran($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('tagihan', ['status' => $status]);
    }

    // Ambil bukti pembayaran berdasarkan tagihan
    public function get_bukti_pembayaran($tagihan_id)
    {
        return $this->db->get_where('pembayaran', ['tagihan_id' => $tagihan_id])->row();
    }

    public function get_by_id($id)
    {
        $this->db->select('tagihan.*, mahasiswa.nama');
        $this->db->from('tagihan');
        $this->db->join('mahasiswa', 'mahasiswa.id = tagihan.mahasiswa_id');
        $this->db->where('tagihan.id', $id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        return $this->db->insert('pembayaran', $data);
    }
}
