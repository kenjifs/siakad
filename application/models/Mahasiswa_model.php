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
    public function insert($data)
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

    // Ambil jadwal kuliah mahasiswa berdasarkan mahasiswa_id
    public function get_jadwal_kuliah($mahasiswa_id)
    {
        $this->db->select('jadwal_kuliah.*, mata_kuliah.nama_mk, mata_kuliah.sks');
        $this->db->from('jadwal_kuliah');
        $this->db->join('mata_kuliah', 'mata_kuliah.id = jadwal_kuliah.mata_kuliah_id');
        $this->db->where('jadwal_kuliah.mahasiswa_id', $mahasiswa_id);
        return $this->db->get()->result();
    }

    // Ambil nilai mahasiswa berdasarkan mahasiswa_id
    public function get_nilai($mahasiswa_id)
    {
        $this->db->select('nilai.*, mata_kuliah.nama_mk, mata_kuliah.sks');
        $this->db->from('nilai');
        $this->db->join('mata_kuliah', 'mata_kuliah.id = nilai.mata_kuliah_id');
        $this->db->where('nilai.mahasiswa_id', $mahasiswa_id);
        return $this->db->get()->result();
    }

    // Ambil pengumuman terbaru
    public function get_pengumuman()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('pengumuman')->result();
    }

    public function get_pembayaran_by_mahasiswa($mahasiswa_id)
    {
        return $this->db->get_where('pembayaran', ['mahasiswa_id' => $mahasiswa_id])->result();
    }
}
