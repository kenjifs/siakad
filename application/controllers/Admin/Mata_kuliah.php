<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mata_kuliah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mata_kuliah_model');
    }

    // Menampilkan daftar mata kuliah
    public function index()
    {
        $data['title'] = 'Daftar Mata Kuliah';
        $data['mata_kuliah'] = $this->Mata_kuliah_model->get_all();

        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/mata_kuliah/index']));
    }

    // Tambahkan mata kuliah baru
    public function create()
    {
        if ($this->input->post()) {
            $data = [
                'kode_mk' => $this->input->post('kode_mk'),
                'nama_mk' => $this->input->post('nama_mk'),
                'sks' => $this->input->post('sks'),
            ];

            if ($this->Mata_kuliah_model->check_kode_exists($data['kode_mk'])) {
                $this->session->set_flashdata('error', 'Kode Mata Kuliah sudah terdaftar!');
            } else {
                $this->Mata_kuliah_model->insert($data);
                $this->session->set_flashdata('success', 'Mata Kuliah berhasil ditambahkan!');
            }
            redirect('admin/mata_kuliah');
        }

        $data['title'] = 'Tambah Mata Kuliah';
        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/mata_kuliah/create']));
    }

    // Edit mata kuliah
    public function edit($id)
    {
        $data['title'] = 'Edit Mata Kuliah';
        $data['mata_kuliah'] = $this->Mata_kuliah_model->get_by_id($id);

        if (!$data['mata_kuliah']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin/mata_kuliah');
        }

        if ($this->input->post()) {
            $update_data = [
                'nama_mk' => $this->input->post('nama_mk'),
                'sks' => $this->input->post('sks'),
            ];

            $this->Mata_kuliah_model->update($id, $update_data);
            $this->session->set_flashdata('success', 'Mata Kuliah berhasil diperbarui!');
            redirect('admin/mata_kuliah');
        }

        $this->load->view('layouts/main', array_merge($data, ['content' => 'admin/mata_kuliah/edit']));
    }

    // Hapus mata kuliah
    public function delete($id)
    {
        $this->Mata_kuliah_model->delete($id);
        $this->session->set_flashdata('success', 'Mata Kuliah berhasil dihapus.');
        redirect('admin/mata_kuliah');
    }
}
