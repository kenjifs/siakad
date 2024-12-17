<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model');
    }

    // Menampilkan daftar pengumuman
    public function index()
    {
        $data['title'] = 'Daftar Pengumuman';
        $data['pengumuman'] = $this->Pengumuman_model->get_all();

        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/pengumuman/index']));
    }

    // Tambahkan pengumuman baru
    public function create()
    {
        if ($this->input->post()) {
            $data = [
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
            ];

            $this->Pengumuman_model->insert($data);
            $this->session->set_flashdata('success', 'Pengumuman berhasil ditambahkan!');
            redirect('admin/pengumuman');
        }

        $data['title'] = 'Tambah Pengumuman';
        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/pengumuman/create']));
    }

    // Edit pengumuman
    public function edit($id)
    {
        $data['title'] = 'Edit Pengumuman';
        $data['pengumuman'] = $this->Pengumuman_model->get_by_id($id);

        if (!$data['pengumuman']) {
            $this->session->set_flashdata('error', 'Pengumuman tidak ditemukan!');
            redirect('admin/pengumuman');
        }

        if ($this->input->post()) {
            $update_data = [
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
            ];

            $this->Pengumuman_model->update($id, $update_data);
            $this->session->set_flashdata('success', 'Pengumuman berhasil diperbarui!');
            redirect('admin/pengumuman');
        }

        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/pengumuman/edit']));
    }

    // Hapus pengumuman
    public function delete($id)
    {
        $this->Pengumuman_model->delete($id);
        $this->session->set_flashdata('success', 'Pengumuman berhasil dihapus.');
        redirect('admin/pengumuman');
    }
}
